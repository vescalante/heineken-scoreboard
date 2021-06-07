<?php
 session_start();
 
 include('conn.php');
 include('function.php');

$identificador 	= $_POST['user_id'];


$sql5 = "UPDATE `admin` SET
`activo` = '0'  
WHERE `id_admin` = '{$identificador}'";

if($conn->query($sql5)){
	$response_array['status'] = 'success';
	$response_array['message'] = 'El usuario ha quedado inactivo correctamente.';
	echo json_encode($response_array);
}
else{
	$response_array['status'] = 'error';
	$response_array['message'] = $conn->error;
	echo json_encode($response_array);
}


?>