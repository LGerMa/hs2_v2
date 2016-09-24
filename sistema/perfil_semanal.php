<?php 
    include '../php/funciones.php';
    include '../php/verificar_sesion.php';
    $idActividad = $_GET["actividad"];
    $actividad = new actividad_class();
    $actividad = getInfoActividad($idActividad);
    if(!($actividad->getIdActividad())){
        echo"<script language='javascript'>window.location='proyectado.php'</script>;";
    }
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
                 <h1 class="page-header"><?php echo "idActividad:".$actividad->getIdActividad(); ?> 
                 </h1>
                <div class="row">
                    
                       

                             <div class="col-sm-10 col-md-10">

                                <form id="form_agregarActividad">
                                    <div class="form-group col-md-6">
                                        <?php echo "<input type='text' id='idSemanal' class='hidden' value='".$idActividad."'>";?>
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
                                        <select class="form-control" id="selectCoop" value="<?php echo $actividad->getCodCooperativa(); ?>">
                                            <?php 
                                            $vectUnidad = getAllCoop();
                                            for ($i=0; $i < count($vectUnidad); $i++) {
                                                if($actividad->getCodCooperativa()==$i){
                                                    $unidad = strtoupper($vectUnidad[$i]->getNombreCooperativa());
                                                    echo "<option value='<?php echo $actividad->getCodCooperativa(); ?>' disabled selected>".$unidad."</option>";
                                                } 
                                            }
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
                                        <a href="#" class="btn btn-primary btn-lg" id="btnRegistrarActividad">Modificar</a>
                                    </div>
                                  <div id="respuestaAlert"></div>
                                </form>

                            </div>



                    <div class="col-sm-10 col-md-10">
                        <div class="form-group col-md-6">
                            <br>
                            <a href="proyectado.php" class="btn btn-success">Atr&aacute;s</a>
                        </div>
                        <div class="form-group col-md-6">
                            <br>
                            <form action="" method="post">
                                <?php 
                                    echo '<td>
                                        <input type="submit" href="proyectado.php" class="btn btn-danger" name="deleteItem" value="Borrar" placeholder="Borrar"/>  
                                        </td>';
                                    if(isset($_POST['deleteItem'])){
                                        $cnx=cnx();
                                        $idActividad = $_GET["actividad"];
                                        $query=sprintf("DELETE FROM actividad WHERE idActividad ='%s'",mysqli_real_escape_string($cnx,$idActividad));
                                        $resul=mysqli_query($cnx,$query);
                                        mysqli_close($cnx);
                                        echo"<script language='javascript'>window.location='proyectado.php'</script>;";
                                    }
                                ?>
                            </form>
                    </div>





                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'addJs.php'; ?>
</body>
</html>