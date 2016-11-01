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
                    <div class="col-sm-11 col-lg-11">
                        <h1 class="page-header">Usuarios</h1><br>
                       	<div class="table-responsive">
                       		<table id="employee-grid" class="table table-striped table-bordered">
                       			<thead>
                              <tr>
                                <th>CORREO</th>
                                <th>NOMBRE</th>
                                <th>APELLIDO</th>
                                <th>UNIDAD</th>
                                <th>TIPO</th>
                                <th>FECHA REG</th>
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
    <!-- /#wrapper -->
    <?php include 'addJs.php'; ?>
    <script type="text/javascript" language="javascript" >
      $(document).ready(function() {
        var dataTable = $('#employee-grid').DataTable( {
          "processing": true,
          "serverSide": true,
          "ajax":{
            url :"usuarios-grid-data.php", // json datasource
            type: "post",  // method  , by default get
            error: function(data){  // error handling
              console.log(data);
              $(".employee-grid-error").html("");
              $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#employee-grid_processing").css("display","none");
              
            }
          }
        } );
      } );
    </script>
 </body>
 </html>