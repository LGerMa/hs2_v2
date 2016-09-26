<?php 
	include '../php/funciones.php';
	$codCooper = $_GET["valor"];
	$infoCooper = new cooperativa_class();
	//echo "Info PHP: ".$var."<br>";

	$book = array(
    "title" => $codCooper,
    "author" => "David Flanagan",
    "edition" => 6
	);
	$infoCooper = getInfoCooper($codCooper);
	if(isset($infoCooper)){
		$info = array(
			"codCooper" => $infoCooper->getCodCooperativa(),
			"nombre" => $infoCooper->getNombreCooperativa(),
			"direccion" => $infoCooper->getDireccionCooperativa(),
			"telefono" => $infoCooper->getTelefonoCooperativa(),
			"contacto" => $infoCooper->getContactoCooperativa()
		);
	}
	//pensar que hacer si no esta definida la variable
	echo json_encode($info);
?>