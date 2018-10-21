  <?php

  include_once 'src/DAO/BaseDAO.php';
  include_once 'src/Entities/ArquivoEntity.php';

  class ArquivoDAO extends BaseDAO{

    function cadastrar($arquivo){
        $sql = "insert into arquivo values(NULL,".$arquivo->getDocenteSiape().",".$arquivo->getTurmaId().",'".$arquivo->getNome()."','".$arquivo->getLocal()."')";
        if($this->executaSQL($sql)){
          return true;
        }else{
          return false;
        }
    }

    function obterPorSiape($siape){
      $sql = "select ano, local,nome from arquivo,turma where docente_siape = $siape and turma.id = turma_id;";

      $res = $this->selecionar($sql);
      $retorno = array();

      if ($res->num_rows > 0) {
        while($row = $res->fetch_assoc()) {
          $user = new ArquivoEntity(null,$siape,$row["ano"],$row["nome"],$row["local"]);
  				array_push($retorno, $user);
  			}
      }
      return $retorno;
    }

    public function existencia($turma_id){
      $sql = "SELECT turma_id FROM arquivo WHERE turma_id = $turma_id";

      $res = $this->selecionar($sql);

      if ($res->num_rows > 0) {
        return true;
      }
      return false;
    }

      public function obterPorTurma($turma_id){
        $sql = "select id,docente_siape,local,nome from arquivo where turma_id = $turma_id;";

        $res = $this->selecionar($sql);
        $retorno = array();

        if ($res->num_rows > 0) {
          while($row = $res->fetch_assoc()) {
            $arq = new ArquivoEntity($row["id"],$row["docente_siape"],$turma_id,$row["nome"],$row["local"]);
    				array_push($retorno, $arq);
    			}
        }
        return $retorno;
      }

}




 ?>
