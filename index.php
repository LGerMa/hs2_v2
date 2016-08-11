<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Sistema Insafocoop</title>
    <!-- Bootstrap Core CSS -->
    <link href="./bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">
		<div class="row">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<h2>Logo</h2>
					</div>
				</div>
			</nav>
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">
							Inicio de sesi&oacute;n -
							<?php 
							include 'php/funciones.php';
							$flag=estadoCnx();
							if($flag)
									echo '<span class="label label-success"> Conectado</span>';
								else
									echo '<span class="label label-danger"> Desconectado</span>';
			 				?>			
						</h3>
					</div>
					<div class="panel-body">
						<form role="form">
							<div class="form-group">
								<input type="email" id="email" name="email" autofocus class="form-control" placeholder="E-mail" required>
							</div>
							<div class="form-group">
								<input type="password" id="pass" name="password" class="form-control" placeholder="Contrase&ntilde;a" required>
							</div>
							<?php 
								if($flag)
									echo '<a href="#" id="btnLogin" class="btn btn-lg btn-success btn-block">Login</a>';
								else
									echo '<a href="#" disabled class="btn btn-lg btn-warning btn-block">No puedes iniciar sesi&oacute;n</a>';
							?>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-md-offset-4" id="respuestaAlert"></div>
	</div>
    <!-- jQuery -->
    <script src="./bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./dist/js/sb-admin-2.js"></script>

    <script src="./js/main.js"></script>
</body>
</html>