	<?php
		require('../pdf/fpdf.php');
		$pdf = new FPDF('L','mm',array(215,325));
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',8);
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		$pdf->SetXY($x+5, $y);
		$col1="Sistema de Gestion de Calidad\n";
		$pdf->MultiCell(189, 5, $col1);
		//F-RP-SN
		$pdf->SetXY($x + 285, $y);
		$col2="F-RP-SN-05\n";
		$pdf->MultiCell(18, 5, $col2);
		//INSAFOCOOP
		$pdf->SetXY($x +5, $y+3);
		$col3="INSAFOCOOP\n";
		$pdf->MultiCell(63, 5, $col3);
		//Formato de programas de labores proyectados.
		$pdf->SetXY($x + 240, $y+3);
		$col2="Formato de programas de labores proyectados.\n";
		$pdf->MultiCell(68, 5, $col2);
		//Imagen INSAFOCOOP
		$pdf->Image('../imagenes/logo1.jpg',10,20,-250);
		$pdf->Image('../imagenes/logo2.jpg',300,20,-250);

		//Guardar en PDF
		$pdf->Output();
		//Para agregarlo
		//<div class="form-group col-md-6">
        //<a href="pdf.php" class="btn btn-primary btn-lg" id="btnHacerPDF">Agregar</a>
        //</div>
	?>