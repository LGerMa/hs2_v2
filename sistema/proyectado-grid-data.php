<?php
/* Database connection start */
include '../php/funciones.php';
//include '../hs2_v2/php/funciones.php';
/*$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "insafocoop";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
*/
/* Database connection end */
$conn = cnx();

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;
$tipo = $_REQUEST["opc"];

$userCod = $_POST['userCod'];
$opc = $userCod;
//$opc = $_GET["opc"];

$columns = array( 
// datatable column index  => database column name
	0 =>'idActividad', 
	1 =>'actividadProgramada',
	2 =>'codCooperativa',
	3 =>'idEstadoActividad',
	4 =>'codSemanal',
	5 =>'diaSemana',
	6 =>'HoraIni',
	7 =>'HoraFin'
);

// getting total number records without any search
// getting total number records without any search
$sql = "SELECT * ";
$sql.=" FROM actividad where codSemanal='".$opc."'";
$query=mysqli_query($conn, $sql) or die("proyectado-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there isset(var) no search parameter then total number rows = total number filtered rows.


$sql = "SELECT * ";
$sql.=" FROM actividad where codSemanal='".$opc."'";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( actividadProgramada LIKE '%".$requestData['search']['value']."%' )"; 
}
$query=mysqli_query($conn, $sql) or die("proyectado-grid-data.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("proyectado-grid-data.php: get employees");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
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
	$direcTele= "Direccion:".$row2["direccionCooperativa"]. str_repeat('&nbsp;', 8)."Telefono:".$row2["telefonoCooperativa"];
	$hora=$row["HoraIni"]." hasta ".$row["HoraFin"];
	$secs=strtotime($row["HoraFin"])-strtotime($row["HoraIni"]);
	$tiempoTotal= gmdate("H:i:s", $secs);
	if($tipo=="1")
		$nestedData[] = "<a href='perfil_semanal.php?actividad=".$idActividad."'>".$diaSemanaG."</a>";
	$nestedData[] = $row2["abreviaturaCooperativa"];
	$nestedData[] = $direcTele;
	$nestedData[] = $row2["contactoCooperativa"];
	$nestedData[] = $tiempoTotal;
	$nestedData[] = $row["actividadProgramada"];
	
	$data[] = $nestedData;
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>