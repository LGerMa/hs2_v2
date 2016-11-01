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
                        <h1 class="page-header">Proyectado: <?php echo $userCod; ?></h1><br>
                        <?php 
                            if($_SESSION['usuario_sesion']->getIdTipoUsuario()=="1")
                                echo "Eres de tipo admin";
                            else

                            $flag=rtnSemanal($userCod);

                            if($flag){
                                ?>

                                <form id="form_agregarActividad">
                                    <div class="form-group col-md-6">
                                        <?php echo "<input type='text' id='CodigoSemanal' class='hidden' value='".$userCod."'>";?>
                                        <label>Hora de permanencia</label><br>
                                        <div class="form-group col-md-6">
                                            <label>Inicio:</label>
                                            <div class='input-group date' id='datetimepicker3'>
                                                <input type='text' class="form-control" id="HoraIni"/>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                            <script type="text/javascript">
                                                $(function ($) {
                                                    $('#datetimepicker3').datetimepicker({
                                                        format: 'HH:mm:ss'
                                                    });
                                                });
                                            </script>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Fin:</label><br>
                                            <div class='input-group date' id='datetimepicker4'>
                                                <input type='text' class="form-control" id="HoraFin"/>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                                  <script type="text/javascript">
                                                $(function ($) {
                                                    $('#datetimepicker4').datetimepicker({
                                                        format: 'HH:mm:ss'
                                                    });
                                                });
                                            </script>
                                            </div>
                                        </div>
                                        <br>
                                        <label>Dia de la semana</label>
                                            <?php
                                            function getSemana($week, $year) {
                                              $dto = new DateTime();
                                              $dto->setISODate($year, $week);
                                              $ret['Lunes'] = $dto->format('Y-m-d');
                                              $dto->modify('+1 days');
                                              $ret['Martes'] = $dto->format('Y-m-d');
                                              $dto->modify('+1 days');
                                              $ret['Miercoles'] = $dto->format('Y-m-d');
                                              $dto->modify('+1 days');
                                              $ret['Jueves'] = $dto->format('Y-m-d');
                                              $dto->modify('+1 days');
                                              $ret['Viernes'] = $dto->format('Y-m-d');
                                              $dto->modify('+1 days');
                                              $ret['Sabado'] = $dto->format('Y-m-d');
                                              $dto->modify('+1 days');
                                              $ret['Domingo'] = $dto->format('Y-m-d');
                                              return $ret;
                                            }
                                            ?>
                                         <!-- Numero Semana -->   
                                        <select class="form-control" id="semana" name="semana">
                                            <?php for ($i = 1; $i <= 52; $i++) { ?> 
                                                <option value="<?php echo $i; ?>" <?php if ($i == date('W')) { echo 'selected="selected"';} ?>><?php echo $i; ?></option> 
                                            <?php } ?>
                                        </select>
                                        <br>   
                                        <!-- Dias Semana --> 
                                        <select class="form-control" id="diaSemana" name="diaSemana">
                                            <?php
                                                $NWeek=(date("W"));
                                                $NYear=date("Y");
                                                $week_array = getSemana($NWeek,$NYear);
                                                foreach($week_array as $key => $value){
                                                    echo '<option value='.$value.'>'.$key.' '.$value.'</option>'; //dia de la semana
                                                }
                                            ?>
                                        </select>
                                        <br>
                                        <label>Actividad Programada</label>
                                        <textarea rows="2" cols="50" id="actProgramada" name="actProgramada" placeholder="Escriba actividad..." class="form-control" ></textarea> 
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Nombre de la asociaci&oacute;n cooperativa</label>
                                        <select class="form-control" id="selectCoop">
                                            <?php 
                                            $vectUnidad = getAllCoop();
                                            for ($i=0; $i < count($vectUnidad); $i++) { 
                                                $unidad = strtoupper($vectUnidad[$i]->getNombreCooperativa());
                                                echo "<option value=".$vectUnidad[$i]->getCodCooperativa().">".$unidad."</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Direccion y telefono</label>
                                        <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Seleccione Cooperativa" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Contacto</label>
                                        <input type="text" id="contacto" name="contacto" class="form-control" placeholder="Seleccione Cooperativa" disabled>    
                                    </div>
                                    <div class="form-group col-md-6">
                                        <a href="#" class="btn btn-primary btn-lg" id="btnRegistrarActividad">Agregar</a>
                                    </div>
                                  <div id="respuestaAlert"></div>
                                </form>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <div class="table-responsive">
                                                    <table id="proyectado-grid" class="table table-striped table-bordered">
                                                        <thead>
                                                          <tr>
                                                            <th>FECHA</th>
                                                            <th>NOMBRE DE LA ASOCIACION COOPERATIVA</th>
                                                            <th>DIRECCION-TELEFONO</th>
                                                            <th>CONTACTO</th>
                                                            <th>TIEMPO</th>
                                                            <th>ACTIVIDAD</th>
                                                          </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                                <br>
                                            </div>
                                            <!-- /.col-lg-12 -->    
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.container-fluid -->
                                        <script type="text/javascript" language="javascript" >
                                          $(document).ready(function() {
                                            cargarCooper();
                                            function cargarCooper(){
                                                var selectValue = $("#selectCoop").val();
                                                $.ajax({
                                                    url: 'getInfoCooper.php',
                                                    type: 'GET',
                                                    data:{
                                                        valor:selectValue
                                                    },
                                                    dataType: "json",
                                                    success: function(data){
                                                        console.log(data);
                                                        $("#direccion").val(data.direccion+" - "+data.telefono);
                                                        $("#contacto").val(data.contacto);
                                                    }
                                                });
                                            }
                                            $("#selectCoop").change(function(){
                                               cargarCooper(); 
                                            });
                                            var dataTable = $('#proyectado-grid').DataTable( {
                                              "processing": true,
                                              "serverSide": true,
                                              "ajax":{
                                                url :"proyectado-grid-data.php", // json datasource
                                                type: "post",  // method  , by default get
                                                data: { userCod: "<?php Print($userCod); ?>" },
                                                error: function(){  // error handling
                                                  $(".employee-grid-error").html("");
                                                  $("#proyectado-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                                                  $("#employee-grid_processing").css("display","none");
                                                  
                                                }
                                              }
                                            } );
                                          } );
                                        </script>
                                <?php
                            }else{
                                 ?>
                                <a class="btn btn-info" onclick="insertarSemanal('<?php echo $userCod ?>',<?php echo (date("W"));?>,'<?php echo $_SESSION['usuario_sesion']->getCorreoUsuario() ?>','<?php echo date(("Y-m-d G:i:s"));?>')">Agregar</a>
                                <?php
                            }
                         ?>
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