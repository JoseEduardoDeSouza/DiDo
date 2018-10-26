<?php


include_once('src/DAO/TurmaDAO.php');

class TurmaModel{
  private $dao;

  public function __construct(){
    $this->dao = new TurmaDAO();
  }

  public function cadastrar($turma){
    if ($this->dao->cadastrar($turma)) {
      return true;
    }
    return false;
  }
  public function existencia($turma){
    if ($this->dao->existencia($turma)) {
      return true;
    }
    return false;
  }
  public function obter(){
    return $this->dao->obter();
    }
}

 ?>
