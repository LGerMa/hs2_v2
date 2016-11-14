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
						<h2 class="page-header">Proyectado - Historial - <?php echo $userCod; ?></h2>
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
                        <div class="form-group col-md-2">
                          <label>Filtrar</label>
                          <a href="#" id="btnBuscarSeguimiento" class="form-control btn btn-info">Buscar</a>
                        </div>
                       </div>
                       <div class="col-sm-10">
                       	<div class="table-responsive">
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
			$("#btnBuscarSeguimiento").click(function(){
				var selectEstadoProyectado = $("#selectEstadoProyectado").val();
				$(".page-header").text("Historial: "+$("#correoUser").val()+" - ["+$("#selectEstadoProyectado option:selected").text()+"]");
				var dataTable = $("#historico-grid").DataTable({
					"processing" : true,
					"serverSide" : true,
					"destroy" : true,
					"ajax":{
						url : "proyectado-historial-grid-data.php",
						type: "post",
						data:{
							correoUser : $("#correoUser").val(),
							opc : selectEstadoProyectado
						},
						error: function(){  // error handling
			              $(".employee-grid-error").html("");
			              $("#historico-grid").append('<tbody class="historico-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
			              $("#employee-grid_processing").css("display","none");
			              
	           			 }
					}
				});
			});
		});
	</script>
</body>
</html>