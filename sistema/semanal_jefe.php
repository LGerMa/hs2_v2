 <?php 
    include '../php/funciones.php';
    //include '../php/verificar_sesion.php';
    include '../php/verificar_jefe_admin.php';
    /*$semana = explode("-", $codSemanal);
    $semana = $semana[1];*/
    $codSemanal = $_GET["codSemanal"];
    $semana = explode("-", $codSemanal);
    $semana = $semana[1];
    /*$userCod  = $_SESSION['usuario_sesion']->getCorreoUsuario();
    $SemanalCod = explode("@",$userCod);
    $userCod=$SemanalCod[0];
    $semanaSelect = $_GET["semanalN"];
    $userCod.="-".$semanaSelect;
    $userCod.="-".date("Y");*/
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
                        <h1 class="page-header">Proyectado: <?php echo $codSemanal."-".$semana; ?></h1><br>
                        <?php 
                            $userCod = $codSemanal;
                            $semanaSelect = $semana;
                            $estadoSemanal = getEstadoSemanal($userCod);
                            $tipoAlert = "";
                            switch ($estadoSemanal) {
                                case '1':
                                    //creado
                                    $tipoAlert = "alert-info";
                                    break;
                                case '2':
                                    //en espera
                                    $tipoAlert = "alert-warning";
                                    break;
                                case '3':
                                    //aprobado
                                    $tipoAlert = "alert-info";
                                    break;
                                case '4':
                                    //rechazado
                                    $tipoAlert = "alert-danger";
                                    break;
                                case '5':
                                    //realizado
                                    $tipoAlert = "alert-success";
                                    break;
                                }
                                echo "<div class='alert ".$tipoAlert."'>ESTADO SEMANAL: [".strtoupper(getEstadoSemanal_Semanal($userCod))."]-[".$semanaSelect."]-{".$estadoSemanal."}</div>";
                            ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="table-responsive">
                                                <table id="proyectado-grid" class="table table-striped table-bordered">
                                                    <thead>
                                                      <tr>
                                                        <th>COOPERATIVA</th>
                                                        <th>DIRECCION-TELEFONO</th>
                                                        <th>CONTACTO</th>
                                                        <th>TIEMPO</th>
                                                        <th>ACTIVIDAD</th>
                                                      </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                            <br>
                                        <div class="form-group col-md-6">
                                        <input type='text' id='semanalN' name='semanalN' class='hidden' value="<?php echo $semanaSelect; ?>">
                                        <?php 
                                            echo "<input type='text' id='CodigoSemanal' class='hidden' value='".$userCod."'>";
                                                echo "<a href='seguimientos.php' class='btn btn-success btn-lg'>Atras</a>";
                                            if($estadoSemanal == 2){
                                                echo "<a href='#' class='btn btn-info btn-lg' id='btnAprobar'>Aprobar semanal</a>";
                                                echo "<a href='#' class='btn btn-danger btn-lg' id='btnRechazar'>Rechazar semanal</a>";
                                            }
                                            if($estadoSemanal==3){
                                                echo "
                                                    <input type='text' id='semanalN' name='semanalN' class='hidden' value='".$userCod."'>
                                                    <a  href='pdf.php?semanalN=".$userCod."&estado=0' class='btn btn-primary btn-lg' id='btnHacerPDF'>PDF</a>";
                                            }
                                            if($estadoSemanal == 5){
                                                echo "
                                                    <input type='text' id='semanalN' name='semanalN' class='hidden' value='".$userCod."'>
                                                    <a  href='pdf.php?semanalN=".$userCod."&estado=1' class='btn btn-primary btn-lg' id='btnHacerPDF'>PDF</a>";
                                                echo "<a href='#' class='btn btn-warning btn-lg' id='btnModificarRealizado'>Modificar realizado</a>"; 
                                            }
                                        ?>
                                        </div>
                                        </div>
                                        <!-- /.col-lg-12 -->    
                                    </div>
                                    <!-- /.row -->
                                </div>
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
    <script type="text/javascript" language="javascript" >
      $(document).ready(function() {
        var dataTable = $('#proyectado-grid').DataTable( {
          "processing": true,
          "serverSide": true,
          "ajax":{
            url :"proyectado-grid-data.php", // json datasource
            type: "post",  // method  , by default get
            data: { 
                userCod: "<?php Print($userCod); ?>",
                opc : "2" 
            },
            error: function(){  // error handling
              $(".employee-grid-error").html("");
              $("#proyectado-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#employee-grid_processing").css("display","none");
              
            }
          }
        } );
      } );
    </script>
 </body>
 </html>
<!--<h2>Home!</h2>
    <h3>Bienvenido: <?php //echo $_SESSION["usuario_sesion"]->getCorreoUsuario()." : ".$_SESSION["usuario_sesion"]->getNombreUsuario(); ?></h3>
    <a href="../php/logout.php">Cerrar sesion</a>-->