<?php


include_once 'src/DAO/BaseDAO.php';
include_once 'src/Entities/TurmaEntity.php';



class TurmaDAO extends BaseDAO{

  public function cadastrar($turma){
    $sql = "insert into turma values(null,'".$turma->getAno()."','".$turma->getCurso()."')";
    if($this->executaSQL($sql)){
      return true;
    }
      return false;
  }
  public function obter(){
    $sql = "select id,ano,curso from turma";

    $res = $this->selecionar($sql);
    $retorno = array();

    if ($res->num_rows > 0) {
      while($row = $res->fetch_assoc()) {
        $user = new TurmaEntity($row["id"],
        $row["ano"],$row["curso"]);
				array_push($retorno, $user);
			}
    }
    return $retorno;
  }

  public function existencia($turma_id){
    $sql = "SELECT id FROM turma WHERE id = $turma_id";

    $res = $this->selecionar($sql);

    if ($res->num_rows > 0) {
      return true;
    }
    return false;
  }

}


 ?>
