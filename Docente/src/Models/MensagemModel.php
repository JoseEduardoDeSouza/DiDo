<?php


include_once('src/DAO/MensagemDAO.php');

class MensagemModel{
  private $dao;

  public function __construct(){
    $this->dao = new MensagemDAO();
  }

  public function cadastrar($mensagem){
    if ($this->dao->cadastrar($mensagem)) {
      return true;
    }
    return false;
  }

  public function existenciaMSG($turma){
    if ($this->dao->existenciaMSG($turma)) {
      return true;
    }
    return false;
  }

  public function obterPorTurma($turma_id){
    return $this->dao->obterPorTurma($turma_id);
    }

}

 ?>
