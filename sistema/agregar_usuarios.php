<?php 
	include '../php/funciones.php';
	include '../php/verificar_sesion.php';
    include '../php/verificar_admin.php';
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title>Usuarios - Insafocoop</title>
 	<?php include 'addCss.php'; ?>
 </head>
 <body>
  	<div id="wrapper">

        <!-- Navigation -->
		<?php include 'menu.php'; ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-lg-10">
                        <h1 class="page-header">Agregar nuevo usuario</h1>
                        <form id="form_agregarUser">
                        	<div class="form-group col-md-6">
                                <label>Email</label>
                        		<input type="email" id="email" name="email" autofocus class="form-control" placeholder="E-mail" required>	
                        	</div>
                        	<div class="form-group col-md-6">
                                <label>Contrase&ntilde;a</label>
								<input type="password" id="pass" name="password" class="form-control" placeholder="Contrase&ntilde;a" required minlength="5" maxlength="10">
							</div>
							<div class="form-group col-md-6">
                                <label>Confirmar Contrase&ntilde;a</label>
								<input type="password" id="confirmarPass" name="confirmarPass" class="form-control" placeholder="Confirmar Contrase&ntilde;a" required minlength="5" maxlength="10">
							</div>
							<div class="form-group col-md-6">
                                <label>Nombre</label>
                        		<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>	
                        	</div>
                        	<div class="form-group col-md-6">
                                <label>Apellido</label>
                        		<input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido" required>	
                        	</div>
                            <div class="form-group col-md-6">
                                <label>Unidad</label>
                                <select class="form-control" id="selectUnidad">
									<?php 
                                    	$vectUnidad = getAllUnidad();
                                    	for ($i=0; $i < count($vectUnidad); $i++) { 
                                    		$unidad = strtoupper($vectUnidad[$i]->getUnidad());
                                    		echo "<option value=".$vectUnidad[$i]->getIdUnidad().">".$unidad."</option>";
                                    	}
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Puesto</label>
                                <select class="form-control" id="selectPuesto">
                                    <?php 
                                    	$vectPuesto = getAllPuesto();
                                    	for ($i=0; $i < count($vectPuesto); $i++) { 
                                    		$puesto = strtoupper($vectPuesto[$i]->getPuesto());
                                    		echo "<option value=".$vectPuesto[$i]->getIdPuesto().">".$puesto."</option>";
                                    	}
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Zona</label>
                                <select class="form-control" id="selectZona">
                                    <?php 
                                    	$vectZona = getAllZona();
                                    	for ($i=0; $i < count($vectZona); $i++) { 
                                    		$zona = strtoupper($vectZona[$i]->getTipoZona());
                                    		echo "<option value=".$vectZona[$i]->getIdZona().">".$zona."</option>";
                                    	}
                                    ?>
                                </select>
                            </div>
                            <div id="respuestaAlert"></div>
                            <button type="submit" class="btn btn-info"> Enviar </button>
                            <a href="#" class="btn btn-primary btn-lg" id="btnRegistrarUsuario">Registrar</a>
                        </form>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <?php include 'addJs.php'; ?>
 </body>
 </html>