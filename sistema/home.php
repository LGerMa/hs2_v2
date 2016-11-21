<?php 
	include '../php/funciones.php';
	include '../php/verificar_sesion.php';
    //$flagUser = 0; //si es 0 es porque es usuario, si es 1 es admin
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title>Sistema</title>
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
                    <div class="col-lg-10">
                        <h2 class="page-header">Bienvenido: <?php echo $_SESSION['usuario_sesion']->getNombreUsuario()." ".$_SESSION['usuario_sesion']->getApellidoUsuario(); ?></h2><br>
                        <div class='panel panel-danger'>
                            <div class='panel-heading'>
                                PERMISOS DE: <?php echo $_SESSION['usuario_sesion']->getCorreoUsuario()." #### ".$_SESSION['usuario_sesion']->getNombreUsuario()." ".$_SESSION['usuario_sesion']->getApellidoUsuario(); ?>
                            </div>
                            <div class='panel-body'>
                                <p>EN ESTA SECCI&Oacute;N SE MUESTRAN, LOS PERMISOS QUE POSEES DENTRO DEL SISTEMA</p>
                            </div>
                        </div>
                        <?php 
                        	if($_SESSION['usuario_sesion']->getIdTipoUsuario()=="1"){
                        		echo "
                                    <div class='panel panel-info'>
                                        <div class='panel-heading'>
                                            ADMINISTRADOR
                                        </div>
                                        <div class='panel-body'>
                                            <ul class='list-group'>
                                                <li class='list-group-item'>VER Y MODIFICAR SU PERFIL PERSONAL</li>
                                                <li class='list-group-item'>AGREGAR, MODIFICAR USUARIOS</li>
                                                <li class='list-group-item'>AGREGAR, MODIFICAR COOPERATIVAS</li>
                                            </ul>
                                        </div>
                                    </div>
                                ";
                               // $flagUser = 1;
                            }
                        	else if($_SESSION['usuario_sesion']->getIdTipoUsuario()=="2"){
                                if($_SESSION['usuario_sesion']->getIdPuesto()=="1"){ //es usuario y jefe
                                    echo "
                                        <div class='panel panel-success'>
                                            <div class='panel-heading'>
                                                JEFE
                                            </div>
                                            <div class='panel-body'>
                                                <ul class='list-group'>
                                                    <li class='list-group-item'>VER Y MODIFICAR SU PERFIL PERSONAL</li>
                                                    <li class='list-group-item'>APROBAR SEMANALES</li>
                                                    <li class='list-group-item'>RECHAZAR SEMANALES</li>
                                                    <li class='list-group-item'>SEGUIMIENTO DE SEMANALES</li>
                                                    <li class='list-group-item'>GENERAR PDF DE SEMANALES</li>
                                                </ul>
                                            </div>
                                        </div>
                                    ";
                                }else{
                                    echo "
                                        <div class='panel panel-primary'>
                                            <div class='panel-heading'>
                                                USUARIO
                                            </div>
                                            <div class='panel-body'>
                                                <ul class='list-group'>
                                                    <li class='list-group-item'>VER Y MODIFICAR SU PERFIL PERSONAL</li>
                                                    <li class='list-group-item'>AGREGAR SEMANAL</li>
                                                    <li class='list-group-item'>MODIFICAR SEMANALES</li>
                                                    <li class='list-group-item'>HISTORIAL DE SEMANALES</li>
                                                    <li class='list-group-item'>GENERAR PDF DE SEMANALES</li>
                                                </ul>
                                            </div>
                                        </div>
                                    ";
                                }
                                //$flagUser = 0;
                            }else{
                                echo "
                                    <div class='panel panel-warning'>
                                        <div class='panel-heading'>
                                            USUARIO - COOPERATIVAS
                                        </div>
                                        <div class='panel-body'>
                                            <ul class='list-group'>
                                                <li class='list-group-item'>VER Y MODIFICAR SU PERFIL PERSONAL</li>
                                                <li class='list-group-item'>AGREGAR, MODIFICAR COOPERATIVAS</li>
                                            </ul>
                                        </div>
                                    </div>
                                ";
                            }
                         ?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php include 'addJs.php'; ?>
 </body>
 </html>
<!--<h2>Home!</h2>
 	<h3>Bienvenido: <?php //echo $_SESSION["usuario_sesion"]->getCorreoUsuario()." : ".$_SESSION["usuario_sesion"]->getNombreUsuario(); ?></h3>
 	<a href="../php/logout.php">Cerrar sesion</a>-->