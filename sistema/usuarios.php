<?php 
	include '../php/funciones.php';
	include '../php/verificar_sesion.php';
  include '../php/verificar_admin.php';
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title>Usuarios</title>
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
                    <div class="col-sm-10 col-lg-10">
                      <h2 class="page-header" id="page-header">Usuarios</h2><br>
                        <div class="form-group col-md-4">
                          <label>Unidad</label>
                              <select class="form-control" id="selectUnidad">
                                <?php 
                                  $vectUnidad = getAllUnidad();
                                  for ($i=0; $i < count($vectUnidad); $i++) { 
                                    $unidad = strtoupper($vectUnidad[$i]->getUnidad());
                                    echo "<option value=".$vectUnidad[$i]->getIdUnidad().">".$unidad."</option>";
                                  }
                                ?>
                              </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Zona</label>
                            <select class="form-control" id="selectZona">
                                <?php 
                                  $vectZona = getAllZona();
                                  for ($i=0; $i < count($vectZona); $i++) { 
                                    $zona = strtoupper($vectZona[$i]->getTipoZona());
                                    echo "<option value=".$vectZona[$i]->getIdZona().">".$zona."</option>";
                                  }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label>Filtrar</label>
                          <a href="#" id="btnBuscarUsuario" class="form-control btn btn-info">Buscar</a>
                        </div>
                    </div>
                    <br>
                    <div class="col-sm-10 col-lg-10">
                        <div class="table-responsive">
                          <table id="employee-grid" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                  <th>CORREO</th>
                                  <th>NOMBRE</th>
                                  <th>TIPO</th>
                                  <th>FECHA REGISTRO</th>
                              </tr>
                                </thead>
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
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php include 'addJs.php'; ?>
    <script type="text/javascript" language="javascript" >
      $(document).ready(function() {
        var selectUnidad = "";
        var selectZona = "";
        var dataTable = "";
        //var dataTable = $('#employee-grid').DataTable({});
        $("#btnBuscarUsuario").click(function(){
         // dataTable.destroy();
          selectUnidad = $("#selectUnidad").val();
         selectZona = $("#selectZona").val();
          //alert($("#selectUnidad option:selected").text());
         $(".page-header").text("Usuarios: ["+$("#selectUnidad option:selected").text()+"] - ["+$("#selectZona option:selected").text()+"]");
          dataTable = $('#employee-grid').DataTable( {
          "processing": true,
          "serverSide": true,
          "destroy" : true,
          "ajax":{
            url :"usuarios-grid-data.php", // json datasource
            type: "post",  // method  , by default get
            data:{
              unidad: selectUnidad,
              zona : selectZona
            },
            error: function(data){  // error handling
              console.log(data);
              $(".employee-grid-error").html("");
              $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#employee-grid_processing").css("display","none");  
            }
            }
          });
          //dataTable.destroy();
        });
      } );
    </script>
 </body>
 </html>