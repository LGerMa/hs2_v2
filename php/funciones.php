<?php 
	include_once 'cn.php';
	include_once 'include_classes.php';

	function estadoCnx(){
		return pruebaCnx();
	}

	function isUserExist($user){
		$cnx=cnx();
		$flag=FALSE;
		$query=sprintf("SELECT * FROM usuario where correoUsuario='%s'",mysqli_real_escape_string($cnx,$user));
		$resul=mysqli_query($cnx,$query);
		$row=mysqli_fetch_array($resul);
		if($row[0]!="")
			$flag=TRUE;
		mysqli_close($cnx);
		return $flag;
	}

	function isCooperExist($cooper){
		$cnx=cnx();
		$flag=FALSE;
		$query=sprintf("SELECT * FROM cooperativa where codCooperativa='%s'",mysqli_real_escape_string($cnx,$cooper));
		$resul=mysqli_query($cnx,$query);
		$row=mysqli_fetch_array($resul);
		if($row[0]!="")
			$flag=TRUE;
		mysqli_close($cnx);
		return $flag;
	}

	function isLoginOk($user,$pass){
		$cnx=cnx();
		$query=sprintf("SELECT passUsuario FROM usuario where correoUsuario='%s'", mysqli_real_escape_string($cnx,$user));
		$result=mysqli_query($cnx,$query);
		$flag=FALSE;
		while($row=mysqli_fetch_array($result)){
			if($row["passUsuario"]==md5($pass)){
				$flag=TRUE;
			}
		}
		mysqli_close($cnx);
		return $flag;
	}
	function isAdmin($user){
		$cnx=cnx();
		$query=sprintf("SELECT idTipoUsuario FROM usuario where correoUsuario='%s'", mysqli_real_escape_string($cnx,$user));
		$result=mysqli_query($cnx,$query);
		$flag=FALSE;
		while($row=mysqli_fetch_array($result)){
			if($row["idTipoUsuario"]=="1"){
				$flag=TRUE;
			}
		}
		mysqli_close($cnx);
		return $flag;		
	}

	function getInfoUser($user){
		$cnx=cnx();
		$query=sprintf("SELECT * FROM usuario where correoUsuario='%s'",mysqli_real_escape_string($cnx,$user));
		$result=mysqli_query($cnx,$query);
		while ($row=mysqli_fetch_array($result)) {
			$usuario = new usuario_class();
			$usuario->_setCorreoUsuario($row["correoUsuario"]);
			$usuario->_setPassUsuario(md5($row["passUsuario"]));
			$usuario->_setNombreUsuario($row["nombreUsuario"]);
			$usuario->_setApellidoUsuario($row["apellidoUsuario"]);
			$usuario->_setIdTipoUsuario($row["idTipoUsuario"]);
			$usuario->_setIdUnidad($row["idUnidad"]);
			$usuario->_setIdPuesto($row["idPuesto"]);
			$usuario->_setIdZona($row["idZona"]);
			$usuario->_setIdEstadoUsuario($row["idEstadoUsuario"]);
			$usuario->_setFechaRegistroUsuario($row["fechaRegistroUsuario"]);
			$usuario->_setFechaModificadoUsuario($row["fechaModificadoUsuario"]);
		}
		mysqli_close($cnx);
		return $usuario;
	}

	function getInfoCooper($cooper){
		$cnx = cnx();
		$query = sprintf("SELECT * FROM cooperativa WHERE codCooperativa='%s'",
			mysqli_real_escape_string($cnx,$cooper));
		$result = mysqli_query($cnx,$query);
		while ($row=mysqli_fetch_array($result)) {
			$cooperativa = new cooperativa_class();
			$cooperativa->_setCodCooperativa($row["codCooperativa"]);
			$cooperativa->_setPassCooperativa(md5($row["passCooperativa"]));
			$cooperativa->_setNombreCooperativa($row["nombreCooperativa"]);
			$cooperativa->_setDireccionCooperativa($row["direccionCooperativa"]);
			$cooperativa->_setContactoCooperativa($row["contactoCooperativa"]);
			$cooperativa->_setCorreoContactoCooperativa($row["correoContactoCooperativa"]);
			$cooperativa->_setTelefonoCooperativa($row["telefonoCooperativa"]);			
			$cooperativa->_setFechaRegistroCooperativa($row["fechaRegistroCooperativa"]);
			$cooperativa->_setFechaModificadoCooperativa($row["fechaModificadoCooperativa"]);
		}
		mysqli_close($cnx);
		return $cooperativa;
	}

	function getAllTipoUser(){
		$cnx=cnx();
		$query="SELECT * FROM tipoUsuario";
		$result=mysqli_query($cnx,$query);
		while ($row=mysqli_fetch_array($result)) {
			$tipoUsuario = new tipoUsuario_class();
			$tipoUsuario->_setIdTipoUsuario($row["idtipoUsuario"]);
			$tipoUsuario->_setTipoUsuario($row["tipoUsuario"]);
			$vectTipoUsuario[]=$tipoUsuario;
		}
		mysqli_close($cnx);
		return $vectTipoUsuario;
	}
	function getTipoUser($tipo){
		$cnx = cnx();
		$query=sprintf("SELECT tipoUsuario FROM tipoUsuario where idTipoUsuario = '%s' ",mysqli_real_escape_string($cnx,$tipo));
		$result = mysqli_query($cnx,$query);
		$row = mysqli_fetch_array($result);
		$tipoUsuario = $row["tipoUsuario"];
		mysqli_close($cnx);
		return $tipoUsuario;
	}
	function getUnidad($idUnidad){
		$cnx = cnx();
		$query=sprintf("SELECT unidad FROM unidad where idUnidad = '%s' ",mysqli_real_escape_string($cnx,$idUnidad));
		$result = mysqli_query($cnx,$query);
		$row = mysqli_fetch_array($result);
		$unidad = $row["unidad"];
		mysqli_close($cnx);
		return $unidad;
	}
	function getPuesto($idPuesto){
		$cnx = cnx();
		$query=sprintf("SELECT puesto FROM puesto where idPuesto = '%s' ",mysqli_real_escape_string($cnx,$idPuesto));
		$result = mysqli_query($cnx,$query);
		$row = mysqli_fetch_array($result);
		$puesto = $row["puesto"];
		mysqli_close($cnx);
		return $puesto;
	}
	function getAllUnidad(){
		$cnx=cnx();
		$query="SELECT * FROM unidad";
		$result=mysqli_query($cnx,$query);
		while ($row=mysqli_fetch_array($result)) {
			$unidad = new unidad_class();
			$unidad->_setIdUnidad($row["idUnidad"]);
			$unidad->_setUnidad($row["unidad"]);
			$vectUnidad[]=$unidad;
		}
		mysqli_close($cnx);
		return $vectUnidad;
	}
	function getAllPuesto(){
		$cnx=cnx();
		$query="SELECT * FROM puesto";
		$result=mysqli_query($cnx,$query);
		while ($row=mysqli_fetch_array($result)) {
			$puesto = new puesto_class();
			$puesto->_setIdPuesto($row["idPuesto"]);
			$puesto->_setPuesto($row["puesto"]);
			$vectPuesto[]=$puesto;
		}
		mysqli_close($cnx);
		return $vectPuesto;
	}
	function getAllZona(){
		$cnx=cnx();
		$query="SELECT * FROM zona";
		$result=mysqli_query($cnx,$query);
		while ($row=mysqli_fetch_array($result)) {
			$zona = new zona_class();
			$zona->_setIdZona($row["idZona"]);
			$zona->_setTipoZona($row["tipoZona"]);
			$vectZona[]=$zona;
		}
		mysqli_close($cnx);
		return $vectZona;
	}
	function getAllEstadoUsuario(){
		$cnx=cnx();
		$query="SELECT * FROM estadoUsuario";
		$result=mysqli_query($cnx,$query);
		while ($row=mysqli_fetch_array($result)) {
			$estado = new estadoUsuario_class();
			$estado->_setIdEstadoUsuario($row["idEstadoUsuario"]);
			$estado->_setEstadoUsuario($row["estadoUsuario"]);
			$vectEstadoUsuario[]=$estado;
		}
		mysqli_close($cnx);
		return $vectEstadoUsuario;
	}
	function getSizeUser(){
		$cnx = cnx();
		$query="SELECT * FROM usuario";
		$result = mysqli_query($cnx,$query);
		$tam=mysqli_num_rows($result);
		mysqli_close($cnx);
		return $tam;
	}
	function getUsers($inicio,$tamanio){
		$cnx=cnx();
		$query="SELECT * FROM usuario order by fechaRegistroUsuario DESC LIMIT ".$inicio.",".$tamanio;
		$result=mysqli_query($cnx,$query);
		while ($row=mysqli_fetch_array($result)) {
			$usuario = new usuario_class();
			$usuario->_setCorreoUsuario($row["correoUsuario"]);
			$usuario->_setPassUsuario(md5($row["passUsuario"]));
			$usuario->_setNombreUsuario($row["nombreUsuario"]);
			$usuario->_setApellidoUsuario($row["apellidoUsuario"]);
			$usuario->_setIdTipoUsuario($row["idTipoUsuario"]);
			$usuario->_setIdUnidad($row["idUnidad"]);
			$usuario->_setIdPuesto($row["idPuesto"]);
			$usuario->_setIdZona($row["idZona"]);
			$usuario->_setIdEstadoUsuario($row["idEstadoUsuario"]);
			$usuario->_setFechaRegistroUsuario($row["fechaRegistroUsuario"]);
			$usuario->_setFechaModificadoUsuario($row["fechaModificadoUsuario"]);
			$vectUsuario[]=$usuario;
		}
		mysqli_close($cnx);
		return $vectUsuario;
	}
	function getCooperativas($inicio,$tamanio){
		$cnx=cnx();
		$query="SELECT * FROM cooperativa order by fechaRegistroCooperativa DESC LIMIT ".$inicio.",".$tamanio;
		$result=mysqli_query($cnx,$query);
		while ($row=mysqli_fetch_array($result)) {
			$cooperativa = new cooperativa_class();
			$cooperativa->_setCodCooperativa($row["codCooperativa"]);
			$cooperativa->_setPassCooperativa(md5($row["passCooperativa"]));
			$cooperativa->_setNombreCooperativa($row["nombreCooperativa"]);
			$cooperativa->_setDireccionCooperativa($row["direccionCooperativa"]);
			$cooperativa->_setContactoCooperativa($row["contactoCooperativa"]);
			$cooperativa->_setCorreoContactoCooperativa($row["correoContactoCooperativa"]);
			$cooperativa->_setTelefonoCooperativa($row["telefonoCooperativa"]);			
			$cooperativa->_setFechaRegistroCooperativa($row["fechaRegistroCooperativa"]);
			$cooperativa->_setFechaModificadoCooperativa($row["fechaModificadoCooperativa"]);
			$vectCooperativa[]=$cooperativa;
		}
		mysqli_close($cnx);
		return $vectCooperativa;
	}
	function insertarUsuario($usuario){
		$cnx=cnx();
		$query = sprintf("INSERT INTO usuario(correoUsuario,passUsuario,nombreUsuario,apellidoUsuario,idTipoUsuario,idUnidad,idPuesto,idZona,idEstadoUsuario,fechaRegistroUsuario,fechaModificadoUsuario) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s',now(), null)",
			mysqli_real_escape_string($cnx,$usuario->getCorreoUsuario()),
			mysqli_real_escape_string($cnx,md5($usuario->getPassUsuario())),
			mysqli_real_escape_string($cnx,$usuario->getNombreUsuario()),
			mysqli_real_escape_string($cnx,$usuario->getApellidoUsuario()),
			mysqli_real_escape_string($cnx,$usuario->getIdTipoUsuario()),
			mysqli_real_escape_string($cnx,$usuario->getIdUnidad()),
			mysqli_real_escape_string($cnx,$usuario->getIdPuesto()),
			mysqli_real_escape_string($cnx,$usuario->getIdZona()),
			mysqli_real_escape_string($cnx,$usuario->getIdEstadoUsuario())
			);
		$estado = mysqli_query($cnx,$query);
		mysqli_close($cnx);
		return $estado;
	}
	function insertarCooperativa($cooperativa){
		$cnx=cnx();
		$query = sprintf("INSERT INTO cooperativa(codCooperativa,passCooperativa,nombreCooperativa,direccionCooperativa,contactoCooperativa,correoContactoCooperativa,telefonoCooperativa,fechaRegistroCooperativa,fechaModificadoCooperativa) VALUES ('%s','%s','%s','%s','%s','%s','%s',now(), null)",
			mysqli_real_escape_string($cnx,$cooperativa->getCodCooperativa()),
			mysqli_real_escape_string($cnx,md5($cooperativa->getPassCooperativa())),
			mysqli_real_escape_string($cnx,$cooperativa->getNombreCooperativa()),
			mysqli_real_escape_string($cnx,$cooperativa->getDireccionCooperativa()),
			mysqli_real_escape_string($cnx,$cooperativa->getContactoCooperativa()),
			mysqli_real_escape_string($cnx,$cooperativa->getCorreoContactoCooperativa()),
			mysqli_real_escape_string($cnx,$cooperativa->getTelefonoCooperativa())
			);
		//echo("estado: ".$estado);
		$estado = mysqli_query($cnx,$query);
		mysqli_close($cnx);
		return $estado;
	}
	function actualizarUsuario($usuario){
		$cnx = cnx();
		$query = sprintf("UPDATE usuario SET passUsuario = '%s', nombreUsuario ='%s', apellidoUsuario = '%s', idTipoUsuario = '%s', idUnidad = '%s', idPuesto = '%s', idZona = '%s', fechaModificadoUsuario = now() WHERE correoUsuario = '%s'",
			mysqli_real_escape_string($cnx, md5($usuario->getPassUsuario())),
			mysqli_real_escape_string($cnx, $usuario->getNombreUsuario()),
			mysqli_real_escape_string($cnx, $usuario->getApellidoUsuario()),
			mysqli_real_escape_string($cnx, $usuario->getIdTipoUsuario()),
			mysqli_real_escape_string($cnx, $usuario->getIdUnidad()),
			mysqli_real_escape_string($cnx, $usuario->getIdPuesto()),
			mysqli_real_escape_string($cnx, $usuario->getIdZona()),
			mysqli_real_escape_string($cnx, $usuario->getCorreoUsuario())
			);
		$estado = mysqli_query($cnx, $query);
		mysqli_close($cnx);
		return $estado;
	}
	function actualizarCooperativa($cooper){
		$cnx = cnx();
		$query = sprintf("UPDATE cooperativa SET passCooperativa = '%s', nombreCooperativa ='%s', direccionCooperativa = '%s', contactoCooperativa = '%s', correoContactoCooperativa = '%s', telefonoCooperativa = '%s',fechaModificadoCooperativa = now() WHERE codCooperativa = '%s'",
			mysqli_real_escape_string($cnx, md5($cooper->getPassCooperativa())),
			mysqli_real_escape_string($cnx, $cooper->getNombreCooperativa()),
			mysqli_real_escape_string($cnx, $cooper->getDireccionCooperativa()),
			mysqli_real_escape_string($cnx, $cooper->getContactoCooperativa()),
			mysqli_real_escape_string($cnx, $cooper->getCorreoContactoCooperativa()),
			mysqli_real_escape_string($cnx, $cooper->getTelefonoCooperativa()),
			mysqli_real_escape_string($cnx, $cooper->getCodCooperativa())
			);
		$estado = mysqli_query($cnx, $query);
		mysqli_close($cnx);
		return $estado;
	}
?>