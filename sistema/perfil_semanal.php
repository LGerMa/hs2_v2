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

                        <form action="" method="post">
                            <?php 
                                echo '<td>
                                    <input type="submit" href="proyectado.php" class="btn btn-danger" name="deleteItem" value="'.$idActividad.'"/>  
                                    </td>';
                                if(isset($_POST['deleteItem']) and is_numeric($_POST['deleteItem'])){
                                    $cnx=cnx();
                                    $query=sprintf("DELETE FROM actividad WHERE idActividad ='%s'",mysqli_real_escape_string($cnx,$idActividad));
                                    $resul=mysqli_query($cnx,$query);
                                    mysqli_close($cnx);
                                    echo"<script language='javascript'>window.location='proyectado.php'</script>;";
                                }
                            ?>
                        </form>

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