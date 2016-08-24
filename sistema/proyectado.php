 <?php 
	include '../php/funciones.php';
	include '../php/verificar_sesion.php';
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
                    <div class="col-lg-12">
                        <h1 class="page-header">HOME: <?php echo $_SESSION['usuario_sesion']->getCorreoUsuario(); ?></h1><br>
                        <?php 
                        	if($_SESSION['usuario_sesion']->getIdTipoUsuario()=="1")
                        		echo "Eres de tipo admin";
                        	else
                        	echo "CodSemanal:  ";
                            $userCod  = $_SESSION['usuario_sesion']->getCorreoUsuario();
                            $SemanalCod = explode("@",$userCod);
                            $userCod=$SemanalCod[0];
                            $userCod.="-".(date("W")+1);
                            $userCod.="-".date("Y");
                            echo $userCod;
                            echo "</br>dia de semana: ".(date("W")+1);

                            echo "</br>";
                            $flag=rtnSemanal($userCod);
                            if($flag)
                                    echo '<span class="label label-success"> Encontro </span>';
                                else
                                    echo '<span class="label label-danger"> Agregar </span>';
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