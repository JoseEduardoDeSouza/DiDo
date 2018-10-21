<?php


include_once('src/DAO/ArquivoDAO.php');

class ArquivoModel{
  private $dao;

  public function __construct(){
    $this->dao = new ArquivoDAO();
  }

  public function cadastrar($arquivo){
    if ($this->dao->cadastrar($arquivo)) {
      return true;
    }
    return false;
  }

  public function obterPorSiape($siape){
    return $this->dao->obterPorSiape($siape);
    }

    public function existencia($turma_id){
      if ($this->dao->existencia($turma_id)) {
        return true;
      }
      return false;
    }
    public function obterPorTurma($turma_id){
      return $this->dao->obterPorTurma($turma_id);
      }
}

 ?>
