
  <?php

  include_once 'src/DAO/BaseDAO.php';
  include_once 'src/Entities/LoginEntity.php';

  class LoginDAO extends BaseDAO{
    function entrar($login){
      $sql="SELECT * FROM docente WHERE siape='".$login->getSiape()."' and senha='".$login->getSenha()."'";
      $res = $this->selecionar($sql);
      if ($res->num_rows > 0) {
        return true;
      }
      return false;
    }

    function cadastrar($login){
        $sql="INSERT INTO docente VALUES('".$login->getSiape()."','".$login->getNomeCompleto()."','".$login->getEmail()."','".$login->getDataNascimento()."','".$login->getAreaAtuacao()."','".$login->getLotacao()."','".$login->getCargo()."','".$login->getSenha()."')";
        if($this->executaSQL($sql)){
          return true;
        }else{
          return false;
        }
    }
    function existeSiape($siape){
      $sql="SELECT * FROM docente WHERE siape='$siape'";
      $res = $this->selecionar($sql);
      if ($res->num_rows > 0) {
        return true;
      }
      return false;
    }
  }
   ?>
