<?php

  include_once('src/Entities/TurmaEntity.php');
  include_once('src/Entities/ArquivoEntity.php');
  include_once('src/Entities/MensagemEntity.php');
  include_once('src/Models/TurmaModel.php');
  include_once('src/Models/ArquivoModel.php');
  include_once('src/Models/MensagemModel.php');

  include_once('src/Models/LoginModel.php');

class SistemaController{

  private $turmaModel;
  private $arquivoModel;
  public function __Construct(){
    $this->turmaModel = new TurmaModel();
    $this->arquivoModel = new ArquivoModel();
    $this->mensagemModel = new MensagemModel();
    $this->loginModel = new LoginModel();
  }

  public function index(){
    if (isset($_SESSION['siape'])) {
      $turmas = $this->turmaModel->obter();
      $nome = $this->loginModel->obterNome($_SESSION['siape']);
      require_once 'src/Views/Sistema/index.php';
    }else{
      require_once 'src/Views/Login/index.php';
    }

  }

  public function sair(){
    if(session_destroy()){
    header("Location: /");
    }
  }


  public function cadastrarTurma($params){
    $ano = $params["ano"];
    $curso = $params["curso"];

    if ($ano=="" || $curso =="") {
      echo json_encode(array('caso' => 1));
    }else{
      $turma = new TurmaEntity(null,$ano,$curso);
      if ($this->turmaModel->cadastrar($turma)) {
          echo json_encode(array('caso' => 2));
      }else{
        echo json_encode(array('caso' => 3));
      }
    }

  }

  public function cadastrarArquivo($params){
    $siape = $_SESSION['siape'];
    $ano = $params['ano'];
    $nome = $params['nome'];
    $arquivo = $_FILES['arquivo'];


    $local = "arquivos"."/". $ano;
    $nome_antigo= explode(".",$arquivo["name"]);
    $novo_nome = $siape."_".$nome.".".$nome_antigo[1];
    $local_novo = "arquivos"."/".$ano."/".str_replace(" ","",$novo_nome);

    if (!file_exists($local)) {
        mkdir($local, 0775,true);
    }

    if (move_uploaded_file($arquivo["tmp_name"], $local."/".str_replace(" ","",$novo_nome))) {
      chmod($local."/".$novo_nome, 0666);
      $file = new ArquivoEntity(null,$siape,$ano,str_replace(" ","",$novo_nome),$local_novo);
      if ($this->arquivoModel->cadastrar($file)) {
        include "showTableFile.php";
        $table =  GetTable($siape);
        echo json_encode($table);

      }else{
        echo json_encode("erro");
      }
    }
  }
  public function obterArquivos($params){
    if ($this->arquivoModel->existencia($params["turma"])) {

      $arquivos = $this->arquivoModel->obterPorTurma($params["turma"]);
      $retorno = array();
      foreach ($arquivos as $arquivo){
        $arqs = ["local"=> $arquivo->getLocal(), "siape"=> $arquivo->getDocenteSiape() , "nome"=> $arquivo->getNome()];
        array_push($retorno, $arqs);


      }
      echo json_encode($retorno);
    }

  }

  public function cadastrar($params){
    $mensagem = new MensagemEntity(null,$params["nome"],$params["mensagem"],$params['turma']);
    if ($this->mensagemModel->cadastrar($mensagem)) {
      echo "ok";
    }else{
      echo "erro";
    }
  }
  public function obterMensagens($params){
      if ($this->turmaModel->existencia($params["turma"])) {
        if ($this->mensagemModel->existenciaMSG($params["turma"])) {
          $mensagens = $this->mensagemModel->obterPorTurma($params["turma"]);
          $retorno = array();
          foreach ($mensagens as $mensagem){
            $arqs = ["id"=> $mensagem->getId(), "nome"=> $mensagem->getNome(), "mensagem"=> $mensagem->getMensagem()];
            array_push($retorno, $arqs);

          }
          echo json_encode($retorno);


        }
      }


  }

  public function obterTurmas(){
    $turmas = $this->turmaModel->obter();
    $retorno = array();
    foreach ($turmas as $turma){
      $arqs = ["id"=> $turma->getId(), "ano"=> $turma->getAno(), "curso"=> $turma->getCurso()];
      array_push($retorno, $arqs);

    }
    echo json_encode($retorno);

  }
}


 ?>
