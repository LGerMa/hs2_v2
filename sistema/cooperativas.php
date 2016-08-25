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
 	<title>Cooperativas</title>
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
                    <div class="col-sm-11">
                        <h1 class="page-header">Cooperativas</h1><br>
                       	<div class="table-responsive">
                       		<table id="cooperativas-grid" class="table table-striped table-bordered">
                       			<thead>
                              <tr>
                                <th class="text-center">COD COOPERATIVA</th>
                                <th class="text-center">NOMBRE COOPERATIVA</th>
                                <th class="text-center">CONTACTO COOPERATIVA</th>
                                <th class="text-center">TELEFONO COOPERATIVA</th>
                                <th class="text-center">FECHA REGISTRO</th>
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
        var dataTable = $('#cooperativas-grid').DataTable( {
          "processing": true,
          "serverSide": true,
          "ajax":{
            url :"cooperativas-grid-data.php", // json datasource
            type: "post",  // method  , by default get
            error: function(){  // error handling
              $(".employee-grid-error").html("");
              $("#cooperativas-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#employee-grid_processing").css("display","none");
              
            }
          }
        } );
      } );
    </script>
 </body>
 </html>