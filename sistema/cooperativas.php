<?php 
	include '../php/funciones.php';
	include '../php/verificar_sesion.php';
  include '../php/verificar_admin.php';

	$num_total_reg=getSizeUser();
	echo "Total usuarios bd: ".$num_total_reg;
	$tam_pagina = 10;
	$url = "cooperativas.php";
	@$pagina=$_GET["pagina"];
	if(!$pagina){
		$inicio = 0;
		$pagina = 1;
	}else{
		$inicio = ($pagina-1)*$tam_pagina;
	}
	$total_paginas=ceil($num_total_reg/$tam_pagina);
	echo "numero de paginas: ".$total_paginas;
	$vectCooper = getCooperativas($inicio,$tam_pagina);
  echo "size: ".count($vectCooper);
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
                       		<table class="table table-striped table-bordered">
                       			<tr>
                              <th class="text-center">#</th>
                       				<th class="text-center">COD COOPERATIVA</th>
                       				<th class="text-center">NOMBRE COOPERATIVA</th>
                       				<th class="text-center">CONTACTO COOPERATIVA</th>
                       				<th class="text-center">TELEFONO COOPERATIVA</th>
                              <th class="text-center">FECHA REGISTRO</th>
                       				<th class="text-center">VER PERFIL</th>
                       			</tr>
                       			<?php 
                       				for ($i=0; $i < count($vectCooper); $i++) { 
                                $fecha = $vectCooper[$i]->getFechaRegistroCooperativa();
                                $fecha = strtotime($fecha);
                                $nuevoFomato = date("d/m/y g:i A",$fecha);
                       					echo "<tr>";
                                echo "<td class='text-center'>".($i+1)."</td>";
                       					echo "<td class='text-center'>".$vectCooper[$i]->getCodCooperativa()."</td>";
                       					echo "<td class='text-center'>".$vectCooper[$i]->getNombreCooperativa()."</td>";
                       					echo "<td class='text-center'>".$vectCooper[$i]->getContactoCooperativa()."</td>";
                       					echo "<td class='text-center'>".$vectCooper[$i]->getTelefonoCooperativa()."</td>";
                                echo "<td class='text-center'>".$nuevoFomato."</td>";
                       					echo "<td class='text-center'><a href='perfil_cooperativa.php?codCooper=".$vectCooper[$i]->getCodCooperativa()."'><i class='fa fa-eye'></i></a></td>";
                       					echo "</tr>";
                       				}
                       			?>
                       		</table>
                       	</div>
                       	<div id="respuestaAlert"></div>
                       	<br>
                       	<nav class="navbar">
                       		<h2>Paginacion</h2>
                          <ul class="pagination">
                            <?php 
                            $totalMaximoPaginas=2;
                              if($total_paginas>1){
                                if($pagina!=1){
                                  echo "<li><a href=".$url."?pagina=1 title='Inicio'><span class='glyphicon glyphicon-step-backward'></span></a></li>";
                                  echo "<li><a href=".$url."?pagina=".($pagina-1)." title='Anterior'><span class='glyphicon glyphicon-chevron-left'></span></a></li>";
                                }
                                for($j=1;$j<=$total_paginas;$j++){
                                  if($pagina==$j){
                                    echo "<li class='active'><a href='#' title=".$j.">".$pagina."</a></li>";
                                  }else{
                                    if($j>=$pagina-$totalMaximoPaginas && $j<=$pagina+$totalMaximoPaginas){
                                      echo "<li><a href=".$url."?pagina=".$j." title=".$j.">".$j."</a></li>";
                                    }                   
                                  }

                                }
                                if($pagina !=$total_paginas){
                                  echo "<li><a href=".$url."?pagina=".($pagina+1)." title='Siguiente'><span class='glyphicon glyphicon-chevron-right'></span></a></li>";
                                  echo "<li><a href=".$url."?pagina=".$total_paginas." title='Fin'><span class='glyphicon glyphicon-step-forward'></span></a></li>";
                                }
                              }
                             ?>
                          </ul>
                       	</nav>
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