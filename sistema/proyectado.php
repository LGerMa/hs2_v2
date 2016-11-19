 <?php 
    include '../php/funciones.php';
    include '../php/verificar_sesion.php';
    $userCod  = $_SESSION['usuario_sesion']->getCorreoUsuario();
    $SemanalCod = explode("@",$userCod);
    $userCod=$SemanalCod[0];
    $userCod.="-".(date("W"));
    $userCod.="-".date("Y");
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Sistema</title>
    <?php include 'addCss.php'; ?>
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css"/>
     <link rel="stylesheet" href="../bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css"/>
    <script type="text/javascript" src="../bower_components/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
      <script type="text/javascript" src="../bower_components/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!--Codigo para los Dias de la semana-->
    <script language="javascript">
    $(document).ready(function(){
        $("#semana").change(function () {
           $("#semana option:selected").each(function () {
                elegido=$(this).val();
                $.post("dias.php", { elegido: elegido }, function(data){
                    $("#diaSemana").html(data);
                });            
            });
        })
    });
</script>

 </head>
 <body>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'menu.php'; ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10">
                        <h1 class="page-header">Proyectado:</h1><br>
                            <!-- Si desea agregar una nueva -->           
                            <div class="row">
                                <form id="form_Proyectado" method="get" name="proyectado" action="semanal.php">
                                    <div class="col-md-6">
                                        <label>Agregar un nuevo semanal</label>
                                            <select class="form-control" id="semanalN" name="semanalN">
                                                <?php for ($i = 1; $i <= 52; $i++) { 
                                                    $j=$i;
                                                    if($i<10){
                                                        $j='0'.$i;
                                                    };
                                                ?> 
                                                    <option value="<?php echo $i; ?>" <?php if ($i == date('W')) { echo 'selected="selected"';} ?>><?php echo 'Semana '.$i."\n";echo 'Lunes '.date("Y-m-d", strtotime(date('Y').'W'.$j.'-'.'1'));echo ' Domingo '.date("Y-m-d", strtotime(date('Y').'W'.$j.'-'.'7')); ?></option> 
                                                <?php } ?>
                                            </select>
                                    </div>
                                    <br>
                                    <div class="col-md-4">
                                        <button  type="submit" class="btn btn-info" id="btnIS">
                                        Ir  
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <br>
                            <br>
                         <div id="respuestaAlert"></div>
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