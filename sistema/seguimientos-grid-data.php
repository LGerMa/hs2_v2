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

$opc = $_REQUEST["opc"];
$correoJefe = $_REQUEST["correoJefe"];
$infoJefe = getInfoUser($correoJefe);
//$opc = $_GET["opc"];

$columns = array( 
// datatable column index  => database column name
	0 =>'codSemanal', 
	1 => 'correoUsuario',
	2 => 'registroSemanal'
);
/*$sql = "SELECT * ";
$sql.=" FROM semanal where idEstadoSemanal='".$opc."'";*/
$sql = "SELECT * ";
$sql.=" FROM semanal s 
		inner join usuario u
		on s.correoUsuario = u.correoUsuario 
		where s.idEstadoSemanal = '".$opc."' &&
		u.idUnidad= '".$infoJefe->getIdUnidad()."' &&
		u.idZona = '".$infoJefe->getIdZona()."'";
$query=mysqli_query($conn, $sql) or die("seguimientos-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


/*$sql = "SELECT * ";
$sql.=" FROM semanal WHERE 1=1 && idEstadoSemanal='".$opc."'";*/
$sql = "SELECT * ";
$sql.=" FROM semanal s 
		inner join usuario u
		on s.correoUsuario = u.correoUsuario 
		where s.idEstadoSemanal = '".$opc."' &&
		u.idUnidad= '".$infoJefe->getIdUnidad()."' &&
		u.idZona = '".$infoJefe->getIdZona()."'";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( codSemanal LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR correoUsuario LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR registroSemanal LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("seguimientos-grid-data.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
// getting total number records without any search

$query=mysqli_query($conn, $sql) or die("seguimientos-grid-data.php: get employees");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
	$fecha = $row["registroSemanal"];
	$fecha = strtotime($fecha);
	$nuevoFomato = date("d/m/y g:i A",$fecha);
	$codSemanal = $row["codSemanal"];
	//$nestedData[] = $codSemanal;
	$nestedData[] = "<a href='semanal_jefe.php?codSemanal=".$codSemanal."'>".$codSemanal."</a>";
	//$nestedData[] = "<a href='perfil_semanal.php?codSemanal=".$codSemanal."'>".$codSemanal."</a>";
	$nestedData[] = $row["correoUsuario"];
	$nestedData[] = $nuevoFomato;
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
