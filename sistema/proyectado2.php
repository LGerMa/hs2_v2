 <?php 
    include '../php/funciones.php';
    include '../php/verificar_sesion.php';
    $userCod  = $_SESSION['usuario_sesion']->getCorreoUsuario();
    $SemanalCod = explode("@",$userCod);
    $userCod=$SemanalCod[0];
    $userCod.="-".(date("W")+1);
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
    

 </head>
 <body>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'menu.php'; ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-11">
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
                                        <input type="hidden" id="CodigoSemanal"/>
                                        <script type="text/javascript">
                                        document.getElementById("CodigoSemanal").value = "<?php Print($userCod); ?>";
                                        </script>
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
                                            function getStartAndEndDate($week, $year) {
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
                                        <select class="form-control" id="diaSemana">
                                            <?php
                                            $NWeek=(date("W"));
                                            $NYear=date("Y");
                                            $week_array = getStartAndEndDate($NWeek,$NYear);
                                            foreach($week_array as $key => $value){
                                                echo '<option value='.$value.'>'.$key.' '.$value.'</option>'; //close your tags!!
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
                                  
                                </form>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-11 col-lg-11">
                                                <div class="table-responsive">
                                                    <table id="proyectado-grid" class="table table-striped table-bordered">
                                                        <thead>
                                                          <tr>
                                                            <th>HORA</th>
                                                            <th>NOMBRE DE LA ASOCIACION COOPERATIVA</th>
                                                            <th>DIRECCION-TELEFONO</th>
                                                            <th>CONTACTO</th>
                                                            <th>TIEMPO</th>
                                                            <th>ACTIVIDAD</th>
                                                          </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                                <div id="respuestaAlert"></div>
                                                <br>
                                            </div>
                                            <!-- /.col-lg-12 -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.container-fluid -->
                                <?php
                            }else{
                                 ?>
                                <a class="btn btn-info" onclick="insertarSemanal('<?php echo $userCod ?>',<?php echo (date("W")+1);?>,'<?php echo $_SESSION['usuario_sesion']->getCorreoUsuario() ?>','<?php echo date(("Y-m-d G:i:s"));?>')">Agregar</a>
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