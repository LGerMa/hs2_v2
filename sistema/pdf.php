	<?php
		require('../pdf/fpdf.php');
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(40,10,'Hello World!');
		$pdf->Output();
		//<div class="form-group col-md-6">
        //<a href="pdf.php" class="btn btn-primary btn-lg" id="btnHacerPDF">Agregar</a>
        //</div>
	?>