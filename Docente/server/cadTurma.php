<?php

include_once 'conexao.php';
session_start();

$ano = $_POST['ano'];
$curso = $_POST['curso'];



if ($ano == "" || $curso =="") {
  echo "Preencha todos os campos!";
}else{

    $sql2 = $dbcon->query("INSERT INTO turma VALUES(null,'$ano','$curso')");
		if ($sql2){
      echo "Cadastrado com Sucesso";
		}else{
			echo "Erro ao cadastrar.";
		}



}


 ?>
