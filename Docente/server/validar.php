<?php

include_once 'conexao.php';

$siape = $_POST['siape'];
$senha = md5($_POST['senha']);

if ($siape == "" || $senha == "") {
  echo "Preencha todos os campos!";
}else{

  $sql1=$dbcon->query("SELECT * FROM docente WHERE siape='$siape' and senha='$senha'");
  if(mysqli_num_rows($sql1)>0){
    session_start();
    $_SESSION['siape'] = $siape;
    echo "1";
	} else {
			echo "Usuario ou senha incorreto!";

  }
}


 ?>
