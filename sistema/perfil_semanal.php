<?php 
    include '../php/funciones.php';
    include '../php/verificar_sesion.php';
    $idActividad = $_GET["actividad"];
    $actividad = new actividad_class();
    $actividad = getInfoActividad($idActividad);
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
                        <a href="proyectado.php" class="btn btn-success">Atr&aacute;s</a>
                        <a href="proyectado.php" class="btn btn-danger" onclick="eliminarActividad('<?php echo $idActividad ?>')">Eliminar</a>
                        <h1 class="page-header">Perfil: <?php echo "idActividad:".$actividad->getIdActividad(); ?> 
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'addJs.php'; ?>
</body>
</html>