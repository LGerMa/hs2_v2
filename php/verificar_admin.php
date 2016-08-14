<?php 
	if(!isAdmin($_SESSION["usuario_sesion"]->getCorreoUsuario())){
		header("location:./home.php");
		exit();
	}
?>