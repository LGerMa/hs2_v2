<?php 
	include '../php/funciones.php';
	include '../php/verificar_sesion.php';
  include '../php/verificar_admin.php';

	$num_total_reg=getSizeUser();
	echo "Total usuarios bd: ".$num_total_reg;
	$tam_pagina = 10;
	$url = "usuarios.php";
	@$pagina=$_GET["pagina"];
	if(!$pagina){
		$inicio = 0;
		$pagina = 1;
	}else{
		$inicio = ($pagina-1)*$tam_pagina;
	}
	$total_paginas=ceil($num_total_reg/$tam_pagina);
	echo "numero de paginas: ".$total_paginas;
	$vectUsuarios = getUsers($inicio,$tam_pagina);
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
                        <h1 class="page-header">Usuarios</h1><br>
                       	<div class="table-responsive">
                       		<table class="table table-striped table-bordered">
                       			<tr>
                              <th class="text-center">#</th>
                       				<th class="text-center">CORREO</th>
                       				<th class="text-center">NOMBRE</th>
                       				<th class="text-center">APELLIDO</th>
                       				<th class="text-center">UNIDAD</th>
                       				<th class="text-center">TIPO USUARIO</th>
                       				<th class="text-center">EDITAR</th>
                       			</tr>
                       			<?php 
                       				for ($i=0; $i < count($vectUsuarios); $i++) { 
                       					echo "<tr>";
                                echo "<td class='text-center'>".($i+1)."</td>";
                       					echo "<td class='text-center'>".$vectUsuarios[$i]->getCorreoUsuario()."</td>";
                       					echo "<td class='text-center'>".$vectUsuarios[$i]->getNombreUsuario()."</td>";
                       					echo "<td class='text-center'>".$vectUsuarios[$i]->getApellidoUsuario()."</td>";
                       					echo "<td class='text-center'>".getUnidad($vectUsuarios[$i]->getIdUnidad())."</td>";
                       					echo "<td class='text-center'>".strtoupper(getTipoUser($vectUsuarios[$i]->getIdTipoUsuario()))."</td>";
                       					echo "<td class='text-center'><a href='perfil_usuario.php?email=".$vectUsuarios[$i]->getCorreoUsuario()."'><i class='fa fa-pencil'></i></a></td>";
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