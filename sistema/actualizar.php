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
		case "2":
			$cooperativa = new cooperativa_class();
			$cooperativa->_setCodCooperativa($_POST["codigoCoop"]);
			$cooperativa->_setPassCooperativa($_POST["pass"]);
			$cooperativa->_setNombreCooperativa($_POST["nombreCoop"]);
			$cooperativa->_setAbreviaturaCooperativa($_POST["abreviaturaCoop"]);
			$cooperativa->_setDireccionCooperativa($_POST["direccionCoop"]);
			$cooperativa->_setContactoCooperativa($_POST["contactoCoop"]);
			$cooperativa->_setCorreoContactoCooperativa($_POST["emailContactoCoop"]);
			$cooperativa->_setTelefonoCooperativa($_POST["telefonoCoop"]);
			//echo json_encode($cooperativa);
			if(actualizarCooperativa($cooperativa)){
				echo "1";
			}else{
				echo "0";
			}
			break;
		case "3":
			$actividad = new actividad_class();
			$actividad->_setIdActividad($_POST["idActividad"]);
			$actividad->_setActividadProgramada($_POST["actividadProgramada"]);
			$actividad->_setCodCooperativa($_POST["codCooperativa"]);
			$actividad->_setIdEstadoActividad($_POST["idEstadoActividad"]);
			$actividad->_setCodSemanal($_POST["codSemanal"]);
			$actividad->_setDiaSemana($_POST["diaSemana"]);
			$actividad->_setHoraIni($_POST["HoraIni"]);
			$actividad->_setHoraFin($_POST["HoraFin"]);
			if(actualizarActividad($actividad)){
				echo "1";
			}else{
				echo "0";
			}
			break;
		default:
			# code...
			break;
	}
?>