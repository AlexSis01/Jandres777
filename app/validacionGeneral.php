<?php 

	session_start();
	if ($_SESSION['ROL']=='ADMIN' || $_SESSION['ROL']=='USUARIO') {
		
	
	}else{
		header("Location:../indexLogin.php");
	}

 ?>