<?php 
	include '../php/funciones.php';
    include '../php/verificar_sesion.php';
    $userCod  = $_SESSION['usuario_sesion']->getCorreoUsuario();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Proyectado</title>
	<?php include 'addCss.php'; ?>
</head>
<body>
	<div id="wrapper">
		<?php include 'menu.php'; ?>
		<div id="page-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-10">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h1>Proyectado - Historial - <?php echo $userCod; ?></h1>
							</div>
							<div class="panel-body">
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
			                       		<table id="historico-grid" class="table table-striped table-bordered">
			                       			<thead>
				                         	<tr>
					                            <th>CodSemanal</th>
					                            <th>Semana</th>
					                            <th>Fecha Registro</th>
				                         	</tr>
				                            </thead>

			                       		</table>
	                                </div>
	                                <div class="tab-pane fade" id="espera">
	                                    <table id="historico-grid2" class="table table-striped table-bordered">
                       					<thead>
			                              <tr>
			                                <th>CodSemanal</th>
			                                <th>Semana</th>
			                                <th>Fecha Registro</th>
			                              </tr>
                           				 </thead>
                       					</table>
	                                </div>
	                                <div class="tab-pane fade" id="aprobado">
	                                    <table id="historico-grid3" class="table table-striped table-bordered">
                       					<thead>
			                              <tr>
			                                <th>CodSemanal</th>
			                                <th>Semana</th>
			                                <th>Fecha Registro</th>
			                              </tr>
                           				 </thead>
                       					</table>
	                                </div>
	                                <div class="tab-pane fade" id="rechazado">
	                                    <table id="historico-grid4" class="table table-striped table-bordered">
                       					<thead>
			                              <tr>
			                                <th>CodSemanal</th>
			                                <th>Semana</th>
			                                <th>Fecha Registro</th>
			                              </tr>
                           				 </thead>
                       					</table>
	                                </div>
	                                <div class="tab-pane fade" id="realizado">
	                                    <table id="historico-grid5" class="table table-striped table-bordered">
                       					<thead>
			                              <tr>
			                                <th>CodSemanal</th>
			                                <th>Semana</th>
			                                <th>Fecha Registro</th>
			                              </tr>
                           				 </thead>
                       					</table>
	                                </div>
	                            </div>
							</div>
						</div>
						<?php echo "<input type='text' id='correoUser' class='hidden' value='".$userCod."'>";?>	
						<div id="respuestaAlert"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'addJs.php'; ?>
	<script type="text/javascript" languaje="javascript">
		$(document).ready(function(){
			var dataTable = $("#historico-grid").DataTable({
				"processing" : true,
				"serverSide" : true,
				"ajax":{
					url : "proyectado-historial-grid-data.php",
					type: "post",
					data:{
						correoUser : $("#correoUser").val(),
						opc : 1
					},
					error: function(){  // error handling
		              $(".employee-grid-error").html("");
		              $("#historico-grid").append('<tbody class="historico-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
		              $("#employee-grid_processing").css("display","none");
		              
           			 }
				}
			});
			dataTable = $("#historico-grid2").DataTable({
				"processing" : true,
				"serverSide" : true,
				"ajax":{
					url : "proyectado-historial-grid-data.php",
					type: "post",
					data:{
						correoUser : $("#correoUser").val(),
						opc : 2
					},
					error: function(){  // error handling
		              $(".employee-grid-error").html("");
		              $("#historico-grid2").append('<tbody class="historico-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
		              $("#employee-grid_processing").css("display","none");
		              
           			 }
				}
			});
			dataTable = $("#historico-grid3").DataTable({
				"processing" : true,
				"serverSide" : true,
				"ajax":{
					url : "proyectado-historial-grid-data.php",
					type: "post",
					data:{
						correoUser : $("#correoUser").val(),
						opc : 3
					},
					error: function(){  // error handling
		              $(".employee-grid-error").html("");
		              $("#historico-grid3").append('<tbody class="historico-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
		              $("#employee-grid_processing").css("display","none");
		              
           			 }
				}
			});
			dataTable = $("#historico-grid4").DataTable({
				"processing" : true,
				"serverSide" : true,
				"ajax":{
					url : "proyectado-historial-grid-data.php",
					type: "post",
					data:{
						correoUser : $("#correoUser").val(),
						opc : 4
					},
					error: function(){  // error handling
		              $(".employee-grid-error").html("");
		              $("#historico-grid4").append('<tbody class="historico-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
		              $("#employee-grid_processing").css("display","none");
		              
           			 }
				}
			});
			dataTable = $("#historico-grid5").DataTable({
				"processing" : true,
				"serverSide" : true,
				"ajax":{
					url : "proyectado-historial-grid-data.php",
					type: "post",
					data:{
						correoUser : $("#correoUser").val(),
						opc : 5
					},
					error: function(){  // error handling
		              $(".employee-grid-error").html("");
		              $("#historico-grid5").append('<tbody class="historico-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
		              $("#employee-grid_processing").css("display","none");
		              
           			 }
				}
			});
		});
	</script>
</body>
</html>