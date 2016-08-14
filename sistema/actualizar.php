<?php 
	include '../php/funciones.php';
	include '../php/verificar_sesion.php';

	$opc = $_POST["opc"];
	switch ($opc) {
		case "1": 
			//actualizar usuario
			# code...
			$usuario = new usuario_class();
				$usuario->_setCorreoUsuario($_POST["email"]);
				$usuario->_setPassUsuario($_POST["pass"]);
				$usuario->_setNombreUsuario($_POST["nombre"]);
				$usuario->_setApellidoUsuario($_POST["apellido"]);
				$usuario->_setIdTipoUsuario($_POST["tipoUsuario"]);
				$usuario->_setIdUnidad($_POST["unidad"]);
				$usuario->_setIdPuesto($_POST["puesto"]);
				$usuario->_setIdZona($_POST["zona"]);
				if(actualizarUsuario($usuario)){
					echo "1";
					//si se actualizo correctamente
				}else{
					echo "0";
					//si hubo algun error
				}
			break;
		
		default:
			# code...
			break;
	}
?>