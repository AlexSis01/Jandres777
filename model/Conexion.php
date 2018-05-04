<?php 
$data = require_once '../app/config.php';

	    function conectar()
		{
			$con = new mysqli(HOST, USER, PASS, BD);
			if ($con->connect_errno){
				echo "Error en la Conexion";
				die();
			}

			
			return $con;
		}

	

 ?>