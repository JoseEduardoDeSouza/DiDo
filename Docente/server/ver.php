<?php




  include 'conexao.php';

  $sql_get = "select * from arquivo;";
  $sql=$dbcon->query($sql_get);

  $retorno  = array();
  while($aux = mysqli_fetch_assoc($sql)) {
      $arquivo = array(
        'turma_id'   => $aux['turma_id'],
        'nome'     => $aux['nome'],
        'local' => $aux['local']
      );
      $final = array($aux['docente_siape'] => $arquivo );
      array_push($retorno,$final);   

    }
echo json_encode($retorno);


   ?>
