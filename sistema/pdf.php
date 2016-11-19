<?php 
    include '../php/funciones.php';
    include '../php/verificar_sesion.php';
    $userCod  = $_SESSION['usuario_sesion']->getCorreoUsuario();
    $semanalCod=$_GET["semanalN"];
    $codSeparado = explode("-",$semanalCod);
    $email = $userCod;
	$usuario = new usuario_class();
	$usuario = getInfoUser($email);
	$semanal = new usuario_class();
	$semanal = getInfoSemanal($semanalCod);
		require('../pdf/cellfit.php');
		$pdf = new FPDF_CellFit('L','mm',array(215,325));
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',8);
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		$pdf->SetXY($x+10, $y);
		$col1="Sistema de Gestion de Calidad\n";
		$pdf->MultiCell(189, 5, $col1);
		//F-RP-SN
		$pdf->SetXY($x + 285, $y);
		$col2="F-RP-SN-05\n";
		$pdf->MultiCell(18, 5, $col2);
		//INSAFOCOOP
		$pdf->SetXY($x +10, $y+3);
		$col3="INSAFOCOOP.\n";
		$pdf->MultiCell(63, 5, $col3);
		//Formato de programas de labores proyectados.
		$pdf->SetXY($x + 240, $y+3);
		$col2="Formato de programas de labores proyectados.\n";
		$pdf->MultiCell(68, 5, $col2);
		//Imagen INSAFOCOOP
		$pdf->Image('../imagenes/logo1.jpg',13,20,-250);
		$pdf->Image('../imagenes/logo2.jpg',300,20,-250);
		//Departamento
		$pdf->SetXY($x + 1, $y+28);
		$col2="Departamento de";
		$pdf->MultiCell(68, 5, $col2);
		//Departamento del Usuario
		$pdf->SetXY($x + 27, $y+28);
		$vectUnidad = getAllUnidad();
        for ($i=0; $i < count($vectUnidad); $i++) { 
            $unidad = strtoupper($vectUnidad[$i]->getUnidad());
            if($usuario->getIdUnidad()==($i+1))
                $col2=$unidad;
        }
        $pdf->MultiCell(68, 5, $col2);
        //Nombre
        $pdf->SetXY($x + 1, $y+38);
		$col2="NOMBRE";
		$pdf->MultiCell(68, 5, $col2);
        //Nombre Usuario
        $pdf->SetXY($x + 18, $y+38);
		$col2=strtoupper($usuario->getNombreUsuario()." ".$usuario->getApellidoUsuario());
		$pdf->MultiCell(80, 5, $col2);
		//Semanal
		$pdf->SetXY($x + 210, $y+38);
		$lunes=date("Y-m-d", strtotime($codSeparado[2].'W'.$codSeparado[1].'-'.'1'));
		$domingo=date("Y-m-d", strtotime($codSeparado[2].'W'.$codSeparado[1].'-'.'7'));
		$col2='Semana del '.'Lunes '.$lunes.' Domingo '.$domingo.'.';
		$pdf->MultiCell(120, 5, $col2);
		//Tabla
			$pdf->SetFont('Arial','B',6);
			//encabezado
				//Fecha
				$pdf->SetXY($x + 1, $y+48);
				$col2="FECHA";
				$pdf->MultiCell(20, 5, $col2,1);
				//Nombre Asociacion
				$pdf->SetXY($x + 21, $y+48);
				$col2="NOMBRE DE LA ASOCIACION COOPERATIVA";
				$pdf->MultiCell(50, 5, $col2,1);
				//Direccion
				$pdf->SetXY($x + 71, $y+48);
				$col2="DIRECCION-TELEFONO";
				$pdf->MultiCell(60, 5, $col2,1);
				//CONTACTO
				$pdf->SetXY($x + 131, $y+48);
				$col2="CONTACTO";
				$pdf->MultiCell(40, 5, $col2,1);
				//TIEMPO
				$pdf->SetXY($x + 171, $y+48);
				$col2="TIEMPO";
				$pdf->MultiCell(30, 5, $col2,1);
				//ACTIVIDAD
				$pdf->SetXY($x + 201, $y+48);
				$col2="ACTIVIDAD";
				$pdf->MultiCell(100, 5, $col2,1);
			//Sacar de la base
			$conn = cnx();
			$sql = "SELECT * ";
			$sql.=" FROM actividad where codSemanal='".$semanalCod."'";
			$query=mysqli_query($conn, $sql);
			//Valores de y
			$y=$y+48;
			//todas las filas
			$countTotF=1;
			$countPag=1;
			while( $row=mysqli_fetch_array($query) ) {  // preparing an array
				if($countTotF==(13*$countPag)){
					$countPag=$countPag+1;
					$y=30;
					$pdf->AddPage();
				};
				//Buscando el nombre de la cooperativa y todo eso
				$cop= $row["codCooperativa"];
				$sql2 = "SELECT * ";
				$sql2.=" FROM cooperativa where codCooperativa='".$cop."'";
				$result = $conn->query($sql2);
				$row2 = $result->fetch_assoc();
				$diaSemanaG=$row["diaSemana"];
				//Fin de la busqueda
				$nestedData=array(); 
				$idActividad = $row["idActividad"];
				$direcTele=$row2["direccionCooperativa"]." ".$row2["telefonoCooperativa"];
				$hora=$row["HoraIni"]." hasta ".$row["HoraFin"];
				$secs=strtotime($row["HoraFin"])-strtotime($row["HoraIni"]);
				$tiempoTotal= gmdate("H:i:s", $secs);
				//imprimiendo en el PDF
					//Fecha**********************************************************
					$pdf->SetXY($x + 1, $y+5);
					$col2 = " ";
					$pdf->MultiCell(20, 10, $col2,1);
					$col2 = $diaSemanaG;
					$pdf->SetXY($x + 1, $y+2+2);
					$pdf->CellFitScale(50, 5, $col2);
					//Nombre Coop*****************************************************
					$pdf->SetXY($x + 21, $y+5);
					$col2=$row2["nombreCooperativa"];
					$nombreCo=explode(" ", $col2);
					$col2=" ";
					$pdf->MultiCell(50, 10, $col2,1);
					$col=1;
					for ($i=0; $i<sizeof($nombreCo); $i++) {
						if ($i==6*$col){
							$pdf->SetXY($x + 21, $y+($col*2)+2);
							$pdf->CellFitScale(50, 5, $col2);
							$col2=$nombreCo[$i]." ";
							$col=$col+1;
						}else{
							$col2.=$nombreCo[$i]." ";
						}; 
						
					};
					$col=$col+1;
					$pdf->SetXY($x + 21, $y+($col*2));
					$pdf->CellFitScale(50, 5, $col2);
					//Direccion******************************************************
					$pdf->SetXY($x + 71, $y+5);
					$direcTele=explode(" ",$direcTele);
					$col2=" ";
					$pdf->MultiCell(60, 10, $col2,1, 'L', FALSE);
					$col=1;
					for ($i=0; $i<sizeof($direcTele); $i++) {
						if ($i==6*$col){
							$pdf->SetXY($x + 71, $y+($col*2)+2);
							$pdf->CellFitScale(60, 5, $col2);
							$col2=$direcTele[$i]." ";
							$col=$col+1;
						}else{
							$col2.=$direcTele[$i]." ";
						}; 
						
					};
					$col=$col+1;
					$pdf->SetXY($x + 71, $y+($col*2));
					$pdf->CellFitScale(60, 5, $col2);
					//CONTACTO**************************************************
					$pdf->SetXY($x + 131, $y+5);
					$col2=$row2["contactoCooperativa"];
					$nombreCo=explode(" ", $col2);
					$col2=" ";
					$pdf->MultiCell(40, 10, $col2,1, 'L', FALSE);
					$col=1;
					for ($i=0; $i<sizeof($nombreCo); $i++) {
						if ($i==6*$col){
							$pdf->SetXY($x + 131, $y+($col*2)+2);
							$pdf->CellFitScale(40, 5, $col2);
							$col2=$nombreCo[$i]." ";
							$col=$col+1;
						}else{
							$col2.=$nombreCo[$i]." ";
						}; 
						
					};
					$col=$col+1;
					$pdf->SetXY($x + 131, $y+($col*2));
					$pdf->CellFitScale(40, 5, $col2);
					//TIEMPO******************************************************************
					$pdf->SetXY($x + 171, $y+5);
					$col2=" ";
					$pdf->MultiCell(30, 10, $col2,1, 'L', FALSE);
					$col2=$tiempoTotal." hr";
					$pdf->SetXY($x + 171, $y+2+2);
					$pdf->CellFitScale(50, 5, $col2);
					//ACTIVIDAD***************************************************************
					$pdf->SetXY($x + 201, $y+5);
					$col2=$row["actividadProgramada"];
					$nombreCo=explode(" ", $col2);
					$col2=" ";
					$pdf->MultiCell(100, 10, $col2,1,'L', FALSE);
					$col=1;
					for ($i=0; $i<sizeof($nombreCo); $i++) {
						if ($i==20*$col){
							$pdf->SetXY($x + 201, $y+($col*2)+2);
							$pdf->CellFitScale(100, 5, $col2);
							$col2=$nombreCo[$i]." ";
							$col=$col+1;
						}else{
							$col2.=$nombreCo[$i]." ";
						}; 
						
					};
					$col=$col+1;
					$pdf->SetXY($x + 201, $y+($col*2));
					$pdf->CellFitScale(100, 5, $col2);
				//valores de y
				$y=$y+10;
				$countTotF=$countTotF+1;
			}
					//Guardar en PDF
		$pdf->Output();
		//Para agregarlo
		//<div class="form-group col-md-6">
        //<a href="pdf.php" class="btn btn-primary btn-lg" id="btnHacerPDF">Agregar</a>
        //</div>
	?>