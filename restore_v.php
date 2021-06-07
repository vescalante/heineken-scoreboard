<?php
 session_start();
 
 include('conn.php');
 include('function.php');

$json = file_get_contents('php://input');
$data = json_decode($json);
$id_sales = $data->id;
$activo = 1;

if($id_sales==""){
	$response_array['status'] = 'error';
	$response_array['message'] = 'No Seleccionaste ningun registro para restaurar';
	echo json_encode($response_array);
}else{
	$sql5 = "UPDATE `sales-force` SET
	`activo` = '$activo' 
	WHERE `id_sales` = '{$id_sales}'";

	if($conn->query($sql5)){
		$response_array['status'] = 'success';
		$response_array['message'] = 'El vendedor ha sido reactivado correctamente.';
		echo json_encode($response_array);
	}
	else{
		$response_array['status'] = 'error';
		$response_array['message'] = $conn->error;
		echo json_encode($response_array);
	}
}
?>