<?php 
	include 'funciones.php';
	$user=$_POST["user"];
	$pass=$_POST["pass"];
	if(isUserExist($user)){
		if(isLoginOk($user,$pass)){
			$usuario=new usuario_class();
			$usuario=getInfoUser($user);
			//var_dump($usuario);
			session_start();
			$_SESSION["usuario_sesion"]=$usuario;

			echo "2";
		}else{
			echo "1";
		}
	}else{
		echo "0";
	}
?>