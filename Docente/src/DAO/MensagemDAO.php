<?php


include_once 'src/DAO/BaseDAO.php';
include_once 'src/Entities/MensagemEntity.php';

class MensagemDAO extends BaseDAO{

  function cadastrar($mensagem){
      $sql = "insert into mensagens values(null,'".$mensagem->getNome()."','".$mensagem->getMensagem()."',".$mensagem->getTurma().")";
      if($this->executaSQL($sql)){
        return true;
      }else{
        return false;
      }
  }

  public function existenciaMSG($turma_id){
    $sql = "SELECT turma_id FROM mensagens WHERE turma_id = $turma_id";

    $res = $this->selecionar($sql);

    if ($res->num_rows > 0) {
      return true;
    }
    return false;
  }

  public function obterPorTurma($turma_id){
    $sql = "select id,nome,msg,turma_id from mensagens where turma_id = $turma_id;";

    $res = $this->selecionar($sql);
    $retorno = array();

    if ($res->num_rows > 0) {
      while($row = $res->fetch_assoc()) {
        $arq = new MensagemEntity($row["id"],$row["nome"],$row["msg"],$row["turma_id"]);
        array_push($retorno, $arq);
      }
    }
    return $retorno;
  }




}
 ?>
