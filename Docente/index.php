<?php

session_start();

include_once 'src/Controllers/LoginController.php';
include_once 'src/Controllers/SistemaController.php';

$controller = 'logincontroller';
$action = 'index';

/*
Se for diferente da index, por exemplo localhost/usuairo/inserir
*/
if ($_SERVER['REQUEST_URI'] != '/') {

		$class = explode('/', substr($_SERVER['REQUEST_URI'], 1));

		$controller =  $class[0] . 'Controller';


		if(count($class) > 1){
			//die($class[1]);
			$pos = strpos($class[1], "?");

			if ($pos === false) {
				$action = $class[1];
			}
			else {
				$action = substr($class[1], 0, $pos);
			}
		}

}

switch ($_SERVER['REQUEST_METHOD']) {
		case 'POST':
			$param = $_POST;
			break;
		case 'GET':
			$param = $_GET;
			break;
		default:
			break;
	}
$controller = new $controller;
$controller->$action($param);

 ?>
