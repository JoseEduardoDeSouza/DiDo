<?php
	$host = "localhost";
	$usuario="root";
	$senha="riese";
	$banco= "sistemaDocente";

	$dbcon=new MySQLi("$host","$usuario","$senha","$banco");

	if($dbcon->connect_error){
		echo "conexão_erro";
	}
?>
