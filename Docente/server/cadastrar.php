<?php

include_once 'conexao.php';

$siape = $_POST['siape'];
$nomeCompleto = $_POST['nome'];
$email = $_POST['email'];
$data = $_POST['data'];
$area = $_POST['area'];
$lotacao = $_POST['lotacao'];
$cargo = $_POST['cargo'];
$senha = md5($_POST['senha']);

if ($siape == "" || $nomeCompleto == "" ||$email == "" ||$data == "" ||$area == "" ||$lotacao == "" ||$cargo == "" ||$senha == "") {
  echo "Preencha todos os campos!";
}else{

  $sql1=$dbcon->query("SELECT * FROM docente WHERE siape='$siape'");
  if(mysqli_num_rows($sql1)>0){
		echo "Conta já cadastrada.";
	} else {
    $sql2 = $dbcon->query("INSERT INTO docente VALUES('$siape','$nomeCompleto','$email','$data','$area','$lotacao','$cargo','$senha')");
		if ($sql2){
      echo "ok";
		}else{
			echo "erro";
		}
  }



}


 ?>
