<?php 
	include '../php/funciones.php';
	//include '../php/verificar_sesion.php';
	include '../php/verificar_jefe_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Seguimiento</title>
	<?php include 'addCss.php' ?>
</head>
<body>
	<div id="wrapper">
		<?php include 'menu.php'; ?>
		<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-lg-10">
                        <h2 class="page-header">Seguimiento</h2><br>
                        <div class="form-group col-md-4">
                          <label>Estado proyectado</label>
                          <select class="form-control" id="selectEstadoProyectado">
                            <?php 
                              $vectEstadoSemanal = getAllEstadoSemanal();
                              for ($i=0; $i < count($vectEstadoSemanal); $i++) { 
                                $estado = strtoupper($vectEstadoSemanal[$i]->getEstadoSemanal());
                                echo "<option value=".$vectEstadoSemanal[$i]->getIdEstadoSemanal().">".$estado."</option>";
                              }
                            ?>
                          </select>
                        </div> 
                        <input type="text" value="<?php echo $_SESSION['usuario_sesion']->getCorreoUsuario(); ?>" id="correoJefe" class="hidden">
                        <div class="form-group col-md-2">
                          <label>Filtrar</label>
                          <a href="#" id="btnBuscarSeguimiento" class="form-control btn btn-info">Buscar</a>
                        </div>
                    </div>
                    <div class="col-sm-10 col-lg-10">
                      <div class="table-responsive">
                        <table id="seguimiento-grid" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                                <th>CodSemanal</th>
                                <th>Correo Usuario</th>
                                <th>Fecha Registro</th>
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
        </div>
        <!-- /#page-wrapper -->
	</div>
	<?php include 'addJs.php'; ?>
	<script type="text/javascript" language="javascript" >
      $(document).ready(function() {

        var selectEstadoProyectado = "";
        var dataTable = "";
        $("#btnBuscarSeguimiento").click(function(){
          selectEstadoProyectado = $("#selectEstadoProyectado").val();
          $(".page-header").text("Seguimiento: ["+$("#selectEstadoProyectado option:selected").text()+"]");
          dataTable = $('#seguimiento-grid').DataTable( {
            "processing": true,
            "serverSide": true,
            "destroy": true,
            "ajax":{
              url :"seguimientos-grid-data.php", // json datasource
              type: "post",  // method  , by default get
              data:{
                opc: selectEstadoProyectado,
                correoJefe: $("#correoJefe").val()
              },
              error: function(){  // error handling
                $(".employee-grid-error").html("");
                $("#seguimiento-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                $("#employee-grid_processing").css("display","none");
                
              }
            }
          });
        });
      } );
    </script>
</body>
</html>