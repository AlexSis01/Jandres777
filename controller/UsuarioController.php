<?php 
require_once '../model/Usuario.php';

if (isset($_POST['key'])) {
	
	$key = $_POST['key'];

	switch ($key) {
		case 'agregar': agregar();
			
		break;

		case 'findUser': findUser();
		break;

		case 'getUser': getUser();
		break;
		default:
			
		break;
	}
	//fin del isset
}

function getUser()
{
	$objUsuario = new Usuario();
	$idUsuario = $_POST['idUsuario'];
	$res = $objUsuario->getUser($idUsuario);
	var_dump($res);
}

function findUser()
{
	$objUsuario = new Usuario();
	$user = $_POST['valor'];
	$res = $objUsuario->findUser($user);
	echo($res);
}
function agregar()
{
	$info = $_POST['dataUsuario'];
	$decodeInfo = json_decode($info);
	//var_dump($decodeInfo);
	$objUsuario = new Usuario();
	$objUsuario->setUsername($decodeInfo[0]->value);
	$objUsuario->setPassword($decodeInfo[2]->value);
	$objUsuario->setSalt();
	$objUsuario->setEstado(1);
	$objUsuario->setRol($decodeInfo[3]->value);
	$res = $objUsuario->saveUser();
	echo $res;
}
	



 ?>