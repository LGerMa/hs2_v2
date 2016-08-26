<?php 
	include '../php/funciones.php';
	include '../php/verificar_sesion.php';
   // include '../php/verificar_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Proyectado - Insafocoop</title>
	<?php include 'addCss.php'; ?>
</head>
<body>
	<div id="wrapper">
		<?php include 'menu.php'; ?>

		<div id="page-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-10">
						<h1 class="page-header">Agregar Proyectado</h1>
						<form id="form_agregarProyectado">
							<div class="form-group col-md-6">
								<label>Usuario: </label>
								<input type="text" class="form-control text-center" id="correoUsuario" disabled value="<?php echo $_SESSION['usuario_sesion']->getCorreoUsuario(); ?>">
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