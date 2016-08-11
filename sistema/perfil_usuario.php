<?php 
	include '../php/funciones.php';
	include '../php/verificar_sesion.php';
	include '../php/verificar_admin.php';
	$email = $_GET["email"];
	$usuario = new usuario_class();
	$usuario = getInfoUser($email);
	$flagUser = 0;
	if(strcmp($_SESSION['usuario_sesion']->getCorreoUsuario(), $usuario->getCorreoUsuario()) == 0)
		$flagUser = 1; //si el perfil de la sesion es igual del usuario que se va a modificar
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Perfil Usuario</title>
	<?php include 'addCss.php'; ?>
</head>
<body>
	<div id="wrapper">
	 <!-- Navigation -->
	<?php include 'menu.php'; ?>
		<div id="page-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-10 col-md-10">
						<br>
						<a href="usuarios.php" class="btn btn-success">Atr&aacute;s</a>
						<h1 class="page-header">Perfil: 
						<?php echo $usuario->getCorreoUsuario()." - "; 
							if(isAdmin($usuario->getCorreoUsuario())){
								echo "<i class='fa fa-star'></i>";
								if($flagUser){
									echo "<i class='fa fa-unlock'></i>";
								}else{
									echo "<i class='fa fa-lock'></i>";
								}
							}
							else
								echo "<i class='fa fa-user'></i>";
						?>	
						</h1>
						<form id="form_perfilUsuario">
							<div class="form-group col-md-6">
								<label>Correo: </label>
								<input type="email" id="email" class="form-control" value="<?php echo $usuario->getCorreoUsuario(); ?>" disabled>
							</div>
							<div class="form-group col-md-6">
								<label>Password: </label>
								<input type="password" id="pass" class="form-control" value="<?php echo $usuario->getPassUsuario(); ?>" disabled>
							</div>
                            <div class="form-group col-md-6 newPass hidden">
                                <label>Nuevo Password:</label>
                                <input type="password" id="newPass" class="form-control">
                            </div>
                            <div class="form-group col-md-6 newPass hidden">
                                <label>Confirmar nuevo password: </label>
                                <input type="password" id="confirmarNewPass" class="form-control">
                            </div>
							<div class="form-group col-md-6">
								<label>Nombre: </label>
								<input type="text" id="nombre" class="form-control" value="<?php echo $usuario->getNombreUsuario(); ?>" disabled required>
							</div>
							<div class="form-group col-md-6">
								<label>Apellido: </label>
								<input type="text" id="apellido" class="form-control" value="<?php echo $usuario->getApellidoUsuario(); ?>" disabled required>
							</div>
							<div class="form-group col-md-6">
								<label>Tipo Usuario:</label>
								<select class="form-control" id="selectUnidad" disabled>
									<?php 
                                    	$vectTipoUser = getAllTipoUser();
                                    	for ($i=0; $i < count($vectTipoUser); $i++) { 
                                    		$tipoUser = strtoupper($vectTipoUser[$i]->getTipoUsuario());
                                    		if($usuario->getIdTipoUsuario()==($i+1))
                                    			echo "<option value=".$vectTipoUser[$i]->getIdTipoUsuario()." selected>".$tipoUser."</option>";
                                    		else
                                    			echo "<option value=".$vectTipoUser[$i]->getIdTipoUsuario().">".$tipoUser."</option>";
                                    	}
                                    ?>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label>Unidad: </label>
								<select class="form-control" id="selectUnidad" disabled>
									<?php 
                                    	$vectUnidad = getAllUnidad();
                                    	for ($i=0; $i < count($vectUnidad); $i++) { 
                                    		$unidad = strtoupper($vectUnidad[$i]->getUnidad());
                                    		if($usuario->getIdUnidad()==($i+1))
                                    			echo "<option value=".$vectUnidad[$i]->getIdUnidad()." selected>".$unidad."</option>";
                                    		else
                                    			echo "<option value=".$vectUnidad[$i]->getIdUnidad().">".$unidad."</option>";
                                    	}
                                    ?>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label>Puesto:</label>
                                <select class="form-control" id="selectPuesto" disabled>
                                    <?php 
                                    	$vectPuesto = getAllPuesto();
                                    	for ($i=0; $i < count($vectPuesto); $i++) { 
                                    		$puesto = strtoupper($vectPuesto[$i]->getPuesto());
                                    		if($usuario->getIdPuesto()==($i+1))
                                    			echo "<option value=".$vectPuesto[$i]->getIdPuesto()." selected>".$puesto."</option>";
                                    		else
                                    			echo "<option value=".$vectPuesto[$i]->getIdPuesto().">".$puesto."</option>";
                                    	}
                                    ?>
                                </select>
							</div>
							<div class="form-group col-md-6">
                                <label>Zona: </label>
                                <select class="form-control" id="selectZona" disabled>
                                    <?php 
                                    	$vectZona = getAllZona();
                                    	for ($i=0; $i < count($vectZona); $i++) { 
                                    		$zona = strtoupper($vectZona[$i]->getTipoZona());
                                    		if($usuario->getIdZona()==($i+1))
                                    			echo "<option value=".$vectZona[$i]->getIdZona()." selected>".$zona."</option>";
                                    		else
                                    			echo "<option value=".$vectZona[$i]->getIdZona().">".$zona."</option>";
                                    	}
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Estado Usuario: </label>
                                <select class="form-control" id="selectZona" disabled>
                                    <?php 
                                    	$vectEstadoUsuario = getAllEstadoUsuario();
                                    	for ($i=0; $i < count($vectEstadoUsuario); $i++) { 
                                    		$estado = strtoupper($vectEstadoUsuario[$i]->getEstadoUsuario());
                                    		if($usuario->getIdEstadoUsuario()==($i+1))
                                    			echo "<option value=".$vectEstadoUsuario[$i]->getIdEstadoUsuario()." selected>".$estado."</option>";
                                    		else
                                    			echo "<option value=".$vectEstadoUsuario[$i]->getIdEstadoUsuario().">".$estado."</option>";
                                    	}
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                            	<a href="#" class="btn btn-info" id="btnModificarPerfil">Modificar</a>
                            	<button type="submit" class="btn btn-success hidden" id="btnGuardarPerfil">Guardar</button>
                            	<a href="#" class="btn btn-info hidden" id="btnCancelarPerfil">Cancelar</a>
                            </div>    
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'addJs.php'; ?>
</body>
</html>