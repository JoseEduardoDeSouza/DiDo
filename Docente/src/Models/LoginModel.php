<?php

include_once('src/DAO/LoginDAO.php');


class LoginModel{
  private $dao;

  public function __construct(){
    $this->dao = new LoginDAO();
  }

  public function verificar($login){
    if ($this->dao->entrar($login)) {
      return true;
    }else {
        return false;
    }
  }

  
  public function cadastrar($login){
    if (!$this->dao->existeSiape($login->getSiape())) {
        if ($this->dao->cadastrar($login)) {
          return "foi";
        }else{
          return "erro";
        }
    }else{
        return "existe";
    }

  }
}


 ?>
