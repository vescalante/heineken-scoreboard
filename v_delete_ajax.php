<?php
 session_start();
 
 include('conn.php');
 include('function.php');

$identificador 	= $_POST['identificador'];


$sql5 = "UPDATE `sales-force` SET
`activo` = '0'  
WHERE `identificador` = '{$identificador}'";

if($conn->query($sql5)){
	$response_array['status'] = 'success';
	$response_array['message'] = 'El vendedor ha sido borrado correctamente.';
	echo json_encode($response_array);
}
else{
	$response_array['status'] = 'error';
	$response_array['message'] = $conn->error;
	echo json_encode($response_array);
}


?>