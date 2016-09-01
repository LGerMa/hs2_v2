<?php 
	session_start();
	if(!($_SESSION["usuario_sesion"]->getIdPuesto()=="1") && !isAdmin($_SESSION["usuario_sesion"]->getCorreoUsuario())){
		header("location:./home.php");
		exit();
	}
?>