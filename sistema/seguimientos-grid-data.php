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
//$opc = $_GET["opc"];

$columns = array( 
// datatable column index  => database column name
	0 =>'codSemanal', 
	1 => 'correoUsuario'
);

// getting total number records without any search
switch ($opc) {
	case '1':
		$sql = "SELECT * ";
		$sql.=" FROM semanal where idEstadoSemanal='".$opc."'";
		$query=mysqli_query($conn, $sql) or die("seguimientos-grid-data.php: get employees");
		$totalData = mysqli_num_rows($query);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


		$sql = "SELECT * ";
		$sql.=" FROM semanal WHERE 1=1 && idEstadoSemanal='".$opc."'";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			$sql.=" AND ( codSemanal LIKE '".$requestData['search']['value']."%' ";    
			$sql.=" OR correoUsuario LIKE '".$requestData['search']['value']."%' ";

			$sql.=" OR idEstadoSemanal LIKE '".$requestData['search']['value']."%' )";
		}
		$query=mysqli_query($conn, $sql) or die("seguimientos-grid-data.php: get employees");
		$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
		
		break;
	case '2':
		$sql = "SELECT * ";
		$sql.=" FROM semanal where idEstadoSemanal='".$opc."'";
		$query=mysqli_query($conn, $sql) or die("seguimientos-grid-data.php: get employees");
		$totalData = mysqli_num_rows($query);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


		$sql = "SELECT * ";
		$sql.=" FROM semanal WHERE 1=1 && idEstadoSemanal='".$opc."'";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			$sql.=" AND ( codSemanal LIKE '".$requestData['search']['value']."%' ";    
			$sql.=" OR correoUsuario LIKE '".$requestData['search']['value']."%' ";

			$sql.=" OR idEstadoSemanal LIKE '".$requestData['search']['value']."%' )";
		}
		$query=mysqli_query($conn, $sql) or die("seguimientos-grid-data.php: get employees");
		$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
		break;
	case '3':
		$sql = "SELECT * ";
		$sql.=" FROM semanal where idEstadoSemanal='".$opc."'";
		$query=mysqli_query($conn, $sql) or die("seguimientos-grid-data.php: get employees");
		$totalData = mysqli_num_rows($query);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


		$sql = "SELECT * ";
		$sql.=" FROM semanal WHERE 1=1 && idEstadoSemanal='".$opc."'";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			$sql.=" AND ( codSemanal LIKE '".$requestData['search']['value']."%' ";    
			$sql.=" OR correoUsuario LIKE '".$requestData['search']['value']."%' ";

			$sql.=" OR idEstadoSemanal LIKE '".$requestData['search']['value']."%' )";
		}
		$query=mysqli_query($conn, $sql) or die("seguimientos-grid-data.php: get employees");
		$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
		
		break;
	case '4':
		$sql = "SELECT * ";
		$sql.=" FROM semanal where idEstadoSemanal='".$opc."'";
		$query=mysqli_query($conn, $sql) or die("seguimientos-grid-data.php: get employees");
		$totalData = mysqli_num_rows($query);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


		$sql = "SELECT * ";
		$sql.=" FROM semanal WHERE 1=1 && idEstadoSemanal='".$opc."'";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			$sql.=" AND ( codSemanal LIKE '".$requestData['search']['value']."%' ";    
			$sql.=" OR correoUsuario LIKE '".$requestData['search']['value']."%' ";

			$sql.=" OR idEstadoSemanal LIKE '".$requestData['search']['value']."%' )";
		}
		$query=mysqli_query($conn, $sql) or die("seguimientos-grid-data.php: get employees");
		$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
		break;
	case '5':
		$sql = "SELECT * ";
		$sql.=" FROM semanal where idEstadoSemanal='".$opc."'";
		$query=mysqli_query($conn, $sql) or die("seguimientos-grid-data.php: get employees");
		$totalData = mysqli_num_rows($query);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


		$sql = "SELECT * ";
		$sql.=" FROM semanal WHERE 1=1 && idEstadoSemanal='".$opc."'";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			$sql.=" AND ( codSemanal LIKE '".$requestData['search']['value']."%' ";    
			$sql.=" OR correoUsuario LIKE '".$requestData['search']['value']."%' ";

			$sql.=" OR idEstadoSemanal LIKE '".$requestData['search']['value']."%' )";
		}
		$query=mysqli_query($conn, $sql) or die("seguimientos-grid-data.php: get employees");
		$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
		break;
	default:
		# code...
		break;
}

$query=mysqli_query($conn, $sql) or die("seguimientos-grid-data.php: get employees");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
	$fecha = $row["registroSemanal"];
	$fecha = strtotime($fecha);
	$nuevoFomato = date("d/m/y g:i A",$fecha);
	$codSemanal = $row["codSemanal"];
	$nestedData[] = "<a href='perfil_semanal.php?codSemanal=".$codSemanal."'>".$codSemanal."</a>";
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
