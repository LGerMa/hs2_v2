<?php 
	include '../php/funciones.php';
	include '../php/verificar_sesion.php';
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
                    <div class="col-sm-11 col-lg-11">
                                             	
                       	<div class="panel panel-default">
	                        <div class="panel-heading">
	                           <h1>Seguimiento</h1>
	                        </div>
	                        <!-- /.panel-heading -->
	                        <div class="panel-body">
	                            <!-- Nav tabs -->
	                            <ul class="nav nav-tabs">
	                                <li class="active"><a href="#creado" data-toggle="tab">Creado</a>
	                                </li>
	                                <li><a href="#espera" data-toggle="tab">En Espera</a>
	                                </li>
	                                <li><a href="#aprobado" data-toggle="tab">Aprobado</a>
	                                </li>
	                                <li><a href="#rechazado" data-toggle="tab">Rechazado</a>
	                                </li>
	                                <li><a href="#realizado" data-toggle="tab">Realizado</a>
	                                </li>

	                            </ul>

	                            <!-- Tab panes -->
	                            <div class="tab-content">
	                                <div class="tab-pane fade in active" id="creado">
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
	                                <div class="tab-pane fade" id="espera">
	                                    <table id="seguimiento-grid2" class="table table-striped table-bordered">
                       					<thead>
			                              <tr>
			                                <th>CodSemanal</th>
			                                <th>Correo Usuario</th>
			                                <th>Fecha Registro</th>
			                              </tr>
                           				 </thead>
                       					</table>
	                                </div>
	                                <div class="tab-pane fade" id="aprobado">
	                                    <table id="seguimiento-grid3" class="table table-striped table-bordered">
                       					<thead>
			                              <tr>
			                                <th>CodSemanal</th>
			                                <th>Correo Usuario</th>
			                                <th>Fecha Registro</th>
			                              </tr>
                           				 </thead>
                       					</table>
	                                </div>
	                                <div class="tab-pane fade" id="rechazado">
	                                    <table id="seguimiento-grid4" class="table table-striped table-bordered">
                       					<thead>
			                              <tr>
			                                <th>CodSemanal</th>
			                                <th>Correo Usuario</th>
			                                <th>Fecha Registro</th>
			                              </tr>
                           				 </thead>
                       					</table>
	                                </div>
	                                <div class="tab-pane fade" id="realizado">
	                                    <table id="seguimiento-grid5" class="table table-striped table-bordered">
                       					<thead>
			                              <tr>
			                                <th>CodSemanal</th>
			                                <th>Correo Usuario</th>
			                                <th>Fecha Registro</th>
			                              </tr>
                           				 </thead>
                       					</table>
	                                </div>
	                            </div>
	                        </div>
                        <!-- /.panel-body -->
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
        var dataTable = $('#seguimiento-grid').DataTable( {
          "processing": true,
          "serverSide": true,
          
          "ajax":{
            url :"seguimientos-grid-data.php", // json datasource
            type: "post",  // method  , by default get
            data:{
          		opc: "1"
          	},
            error: function(){  // error handling
              $(".employee-grid-error").html("");
              $("#seguimiento-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#employee-grid_processing").css("display","none");
              
            }
          }
        } );
        dataTable = $('#seguimiento-grid2').DataTable( {
          "processing": true,
          "serverSide": true,
          
          "ajax":{
            url :"seguimientos-grid-data.php", // json datasource
            type: "post",  // method  , by default get
            data:{
          		opc: "2"
          	},
            error: function(){  // error handling
              $(".employee-grid-error").html("");
              $("#seguimiento-grid2").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#employee-grid_processing").css("display","none");
              
            }
          }
        } );
        dataTable = $('#seguimiento-grid3').DataTable( {
          "processing": true,
          "serverSide": true,
          
          "ajax":{
            url :"seguimientos-grid-data.php", // json datasource
            type: "post",  // method  , by default get
            data:{
          		opc: "3"
          	},
            error: function(){  // error handling
              $(".employee-grid-error").html("");
              $("#seguimiento-grid3").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#employee-grid_processing").css("display","none");
              
            }
          }
        } );
        dataTable = $('#seguimiento-grid4').DataTable( {
          "processing": true,
          "serverSide": true,
          
          "ajax":{
            url :"seguimientos-grid-data.php", // json datasource
            type: "post",  // method  , by default get
            data:{
          		opc: "4"
          	},
            error: function(){  // error handling
              $(".employee-grid-error").html("");
              $("#seguimiento-grid4").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#employee-grid_processing").css("display","none");
              
            }
          }
        } );
        dataTable = $('#seguimiento-grid5').DataTable( {
          "processing": true,
          "serverSide": true,
          
          "ajax":{
            url :"seguimientos-grid-data.php", // json datasource
            type: "post",  // method  , by default get
            data:{
          		opc: "5"
          	},
            error: function(){  // error handling
              $(".employee-grid-error").html("");
              $("#seguimiento-grid5").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#employee-grid_processing").css("display","none");
              
            }
          }
        } );
      } );
    </script>
</body>
</html>