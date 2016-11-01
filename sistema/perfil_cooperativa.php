<?php 
	include '../php/funciones.php';
	include '../php/verificar_sesion.php';
	include '../php/verificar_admin.php';
	$codCooper = $_GET["codCooper"];
	$cooper = new cooperativa_class();
	$cooper = getInfoCooper($codCooper);
	if($cooper->getCorreoContactoCooperativa()=="null"){
		$correoCooper = "";
	}else{
		$correoCooper = $cooper->getCorreoContactoCooperativa();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Perfil Cooperativa</title>
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
						<a href="cooperativas.php" class="btn btn-success">Atr&aacute;s</a>
						<h1 class="page-header">Perfil: <?php echo "codCooper->".$cooper->getCodCooperativa(); ?>	
						</h1>
						<form id="form_perfilCooperativa">
							<div class="form-group col-md-6">
                                <label>C&oacute;digo Cooperativa</label>
                        		<input type="text" id="codigoCoop" name="codigoCoop" autofocus class="form-control" placeholder="C&oacute;digo Cooperativa" disabled value="<?php echo $cooper->getCodCooperativa(); ?>">	
                        	</div>
                        	<div class="form-group col-md-6">
								<label>Password: </label>
								<input type="password" id="pass" class="form-control" value="<?php echo $cooper->getPassCooperativa(); ?>" disabled>
							</div>
                            <div class="form-group col-md-6 newPass hidden">
                                <label>Nuevo Password:</label>
                                <input type="password" id="newPass" class="form-control" minlength="5" maxlength="10">
                            </div>
                            <div class="form-group col-md-6 newPass hidden">
                                <label>Confirmar nuevo password: </label>
                                <input type="password" id="confirmarPass" class="form-control" minlength="5" maxlength="10">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Abreviatura Cooperativa</label>
                                <input type="text" id="abreviaturaCoop" name="abreviaturaCoop" class="form-control" placeholder="Abreviatura Cooperativa" required disabled value="<?php echo $cooper->getAbreviaturaCooperativa(); ?>">    
                            </div>
							<div class="form-group col-md-6">
                                <label>Nombre Cooperativa</label>
                        		<input type="text" id="nombreCoop" name="nombreCoop" class="form-control" placeholder="Nombre Cooperativa" required disabled value="<?php echo $cooper->getNombreCooperativa(); ?>">	
                        	</div>
                            <div class="form-group col-md-4">
                                <label>Contacto</label>
                                <input type="text" id="contactoCoop" name="contactoCoop" class="form-control" placeholder="Contacto" required disabled value="<?php echo $cooper->getContactoCooperativa(); ?>"> 
                            </div>
                            <div class="form-group col-md-4">
                                <label>Correo Contacto</label>
                                <input type="email" id="emailContactoCoop" name="emailContactoCoop" class="form-control" placeholder="Correo Contacto" disabled value="<?php echo $correoCooper; ?>"> 
                            </div>
                            <div class="form-group col-md-4">
                                <label>Tel&eacute;fono Cooperativa</label>
                                <input type="text" id="telefonoCoop" name="telefonoCoop" class="form-control" placeholder="Tel&eacute;fono Cooperativa" maxlength="9" required disabled value="<?php echo $cooper->getTelefonoCooperativa(); ?>">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Direci&oacute;n Cooperativa</label>
                        		<textarea id="direccionCoop" name="direccionCoop" class="form-control" placeholder="Direci&oacute;n Cooperativa" required disabled><?php echo $cooper->getDireccionCooperativa(); ?></textarea>	
                        	</div>
                            <div id="respuestaAlert"></div>
                            <div class="col-md-10">
                            	<a href="#" class="btn btn-info" id="btnModificarPerfilCooper">Modificar</a>
                            	<button type="submit" class="btn btn-success hidden" id="btnGuardarPerfilCooper">Guardar</button>
                            	<a href="#" class="btn btn-info hidden" id="btnCancelarPerfilCooper" onclick="recargarPagina('perfil_cooperativa.php?codCooper=<?php echo $codCooper?>')">Cancelar</a>
                            	<div class="checkbox checkOculto hidden">
                            		<label>
                            			<input type="checkbox" id="chkCambiarPassPerfil"> Cambiar Contrase&ntilde;a
                            		</label>
                            	</div>
                            </div>  
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
    <script type="text/javascript" language="javascript" >
                                          $(document).ready(function() {
                                            cargarCooper();
                                            function cargarCooper(){
                                                var selectValue = $("#selectCoop").val();
                                                $.ajax({
                                                    url: 'getInfoCooper.php',
                                                    type: 'GET',
                                                    data:{
                                                        valor:selectValue
                                                    },
                                                    dataType: "json",
                                                    success: function(data){
                                                        console.log(data);
                                                        $("#direccion").val(data.direccion+" - "+data.telefono);
                                                        $("#contacto").val(data.contacto);
                                                    }
                                                });
                                            }
                                            $("#selectCoop").change(function(){
                                               cargarCooper(); 
                                            });
                                          } );
                                        </script>
	<?php include 'addJs.php'; ?>
</body>
</html>