<?php

include_once 'conexao.php';
session_start();

$siape = $_SESSION['siape'];
$ano = $_POST['ano'];
$nome = $_POST['nome'];
$arquivo = $_FILES['arquivo'];


$local = "arquivos/".$ano;
$nome_antigo= explode(".",$arquivo["name"]);
$novo_nome = $siape."_".$nome.".".$nome_antigo[1];
$local_novo = "/server/arquivos/".$ano."/".$novo_nome;

if (!file_exists($local)) {
    mkdir($local, 0577,true);
}

if (move_uploaded_file($arquivo["tmp_name"], $local."/".$novo_nome)) {
  $sql = "insert into arquivo values(NULL,'$siape','$ano','$nome','$local_novo')";
  $sql2 = $dbcon->query($sql);
  if($sql2){
    include "showTableFile.php";
    $table =  GetTable($siape);
    echo json_encode($table);
  }else{
    echo json_encode("<h2>$sql</h2>");
  }

}

 ?>
