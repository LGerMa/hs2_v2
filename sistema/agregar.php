<?php 
	include '../php/funciones.php';
	include '../php/verificar_sesion.php';

	$opc=$_POST["opc"];
	switch ($opc) {
		case "1":
			//Agregar nuevo usuario
			//echo "valooor: ".$opc;
			if(isUserExist($_POST["email"])){
				echo "0";
			}else{
				$usuario = new usuario_class();
				$usuario->_setCorreoUsuario($_POST["email"]);
				$usuario->_setPassUsuario($_POST["pass"]);
				$usuario->_setNombreUsuario($_POST["nombre"]);
				$usuario->_setApellidoUsuario($_POST["apellido"]);
				$usuario->_setIdTipoUsuario("2");
				$usuario->_setIdUnidad($_POST["unidad"]);
				$usuario->_setIdPuesto($_POST["puesto"]);
				$usuario->_setIdZona($_POST["zona"]);
				$usuario->_setIdEstadoUsuario("1");
				$usuario->_setFechaRegistroUsuario("");
				$usuario->_setFechaModificadoUsuario("");
				if(insertarUsuario($usuario)){
					echo "2";
				}else{
					echo "1";
				}
			}
			//echo "correo: ".$usuario->getCorreoUsuario();
			/*if(insertarUsuario($usuario)){
				echo "Se ha creado correctamente!";
			}else{
				echo "Error";
			}*/
			# code...
			break;
		
		default:
			# code...
			echo "entra aqui";
			break;
	}

?>