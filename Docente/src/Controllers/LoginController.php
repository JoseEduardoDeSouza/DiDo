<?php

include_once('src/Entities/LoginEntity.php');
include_once('src/Models/LoginModel.php');

class LoginController{
  private $model;
   public function __Construct(){
      $this->model = new LoginModel();

   }

  public function index(){
    
    require_once 'src/Views/Login/index.php';
  }

  public function verificarLogin($params){
    $siape = $params['siape'];
    $senha = $params['senha'];

    $login = new LoginEntity();
    $login->setSiape($siape);
    $login->setSenha($senha);

    if ($siape == "" || $senha == "") {
      echo json_encode(array('caso' => 1));
    }else{
      if ($this->model->verificar($login)) {
        $_SESSION['siape'] = $siape;

        echo json_encode(array('caso' => 2));

      }else {
        echo json_encode(array('caso' => 3));
      }
    }
  }

  public function cadastrar($params){
    $siape = $params['siape'];
    $nomeCompleto = $params['nome'];
    $email = $params['email'];
    $data = $params['data'];
    $area = $params['area'];
    $lotacao = $params['lotacao'];
    $cargo = $params['cargo'];
    $senha = $params['senha'];

    $login = new LoginEntity($siape,$nomeCompleto,$email,$data,$area,$lotacao,$cargo,$senha);
    if ($siape == "" || $nomeCompleto == "" ||$email == "" ||$data == "" ||$area == "" ||$lotacao == "" ||$cargo == "" ||$senha == "") {
      echo json_encode(array('caso' => 1));
    }else{
      $ct=$this->model->cadastrar($login);
      if ($ct=="foi") {
        echo json_encode(array('caso' => 2));

      }else if ($ct=="existe") {
        echo json_encode(array('caso' => 3));
      }else if($ct=="erro"){
        echo json_encode(array('caso' => 4));
      }

  }

}

}

 ?>
