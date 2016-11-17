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
$flag = $_REQUEST["flag"];
$unidad = $_REQUEST["unidad"];
$zona = $_REQUEST["zona"];

$columns = array( 
// datatable column index  => database column name
	0 =>'correoUsuario', 
	1 => 'nombreUsuario',
	2=> 'idTipoUsuario',
	3=> 'fechaRegistroUsuario'
);

$sql = "SELECT * ";
if($flag)
	$sql.= " FROM usuario where idUnidad = idUnidad && idZona = idZona";
else
	$sql.= " FROM usuario where idUnidad ='".$unidad."' && idZona = '".$zona."'";
$query=mysqli_query($conn, $sql) or die("usuarios-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$sql = "SELECT * ";
if($flag)
	$sql.=" FROM usuario WHERE 1=1 && idUnidad= idUnidad && idZona = idZona";
else
	$sql.=" FROM usuario WHERE 1=1 && idUnidad='".$unidad."' && idZona = '".$zona."'";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( correoUsuario LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR nombreUsuario LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR idPuesto LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR fechaRegistroUsuario LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("usuarios-grid-data.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";

$query=mysqli_query($conn, $sql) or die("usuarios-grid-data.php: get employees");

//echo "prueba!!!";
$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
	$fecha = $row["fechaRegistroUsuario"];
	$fecha = strtotime($fecha);
	$correo = $row["correoUsuario"];
	$nuevoFomato = date("d/m/y g:i A",$fecha);
	$nestedData[] = "<a href='perfil_usuario.php?email=".$correo."'>".$correo."</a>";
	$nestedData[] = $row["nombreUsuario"]." ".$row["apellidoUsuario"];
	//$nestedData[] = $row["apellidoUsuario"];
	if(isAdmin($correo)){
		$nestedData[] = "<i class='fa fa-star' title='Administrador'></i>";
	}else{
		if($row["idPuesto"]=="1"){
			$nestedData[] = "<i class='fa fa-star-o' title='Jefe'></i>";
		}else{
			$nestedData[] = "<i class='fa fa-user' title='Usuario'></i>";
		}
	}
	//$nestedData[] = strtoupper(getTipoUser($row["idTipoUsuario"]));
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
