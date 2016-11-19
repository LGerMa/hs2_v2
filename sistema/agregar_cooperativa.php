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
 	<title>Cooperativa - Insafocoop</title>
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
                        <h1 class="page-header">Agregar nueva cooperativa</h1>
                        <?php 
                        $palabra = "cp".date("y")."_".md5(time());
                        $palabra2 = substr($palabra,0,-25);
                        $palabra2 = strtoupper($palabra2);
                        echo "<br> palabra2: ".$palabra2." size: ".strlen($palabra2);
                        ?>
                        <form id="form_agregarCooper">
                        	<div class="form-group col-md-6">
                                <label>C&oacute;digo Cooperativa</label>
                        		<input type="text" id="codigoCoop" name="codigoCoop" autofocus class="form-control" placeholder="C&oacute;digo Cooperativa" required value="<?php echo $palabra2; ?>">	
                        	</div>
                            <div class="form-group col-md-6">
                                <label>Abreviatura Cooperativa</label>
                                <input type="text" id="abreviaturaCoop" name="abreviaturaCoop" class="form-control" placeholder="Abreviatura Cooperativa" required>
                            </div>
							<div class="form-group col-md-12">
                                <label>Nombre Cooperativa</label>
                        		<input type="text" id="nombreCoop" name="nombreCoop" class="form-control" placeholder="Nombre Cooperativa" required>	
                        	</div>
                        	<div class="form-group col-md-12">
                                <label>Direci&oacute;n Cooperativa</label>
                        		<textarea id="direccionCoop" name="direccionCoop" class="form-control" placeholder="Direci&oacute;n Cooperativa" required></textarea>	
                        	</div>
                            <div class="form-group col-md-6">
                                <label>Contacto</label>
                                <input type="text" id="contactoCoop" name="contactoCoop" class="form-control" placeholder="Contacto" required> 
                            </div>
                            <div class="form-group col-md-6">
                                <label>Correo Contacto</label>
                                <input type="email" id="emailContactoCoop" name="emailContactoCoop" class="form-control" placeholder="Correo Contacto"> 
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tel&eacute;fono Cooperativa</label>
                                <input type="text" id="telefonoCoop" name="telefonoCoop" class="form-control" placeholder="Tel&eacute;fono Cooperativa" maxlength="9" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Fecha Registro</label>
                                <input type="text" class="form-control" value="<?php echo date('d-m-y'); ?>" disabled>
                            </div>
                            <div id="respuestaAlert"></div>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-info"> Enviar </button>
                            </div>
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