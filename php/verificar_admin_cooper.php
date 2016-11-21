<?php 
	if(!isAdmin($_SESSION["usuario_sesion"]->getCorreoUsuario()) && $_SESSION['usuario_sesion']->getIdTipoUsuario()!="3"){
		header("location:./home.php");
		exit();
	}
?>