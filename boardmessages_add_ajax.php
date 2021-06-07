<?php
 session_start();
 
 include('conn.php');
 include('function.php');

$contenido	= utf8_decode($_POST['contenido']);
$id_acceso 	= $_COOKIE['IDADMINADM'];
$tab_id = $_POST['tab_id'];

date_default_timezone_set("America/Mexico_City");
$today = date("Y-m-d H:i:s");


if ($contenido == "") {
	$response_array['status'] = 'error';
	$response_array['message'] = 'El mensaje no puede estar vacio';
	echo json_encode($response_array);
}else{
	$sql2 = "INSERT INTO `messages` (contenido, fecha_creacion, id_board, id_admin) VALUES ('$contenido', '$today', '$tab_id', '$id_acceso')";
	if($conn->query($sql2)){
		$response_array['status'] = 'success';
		$response_array['message'] = 'El mensaje se envio para aprobación por el administrador';
		echo json_encode($response_array);
	}
	else{
		$response_array['status'] = 'error';
		$response_array['message'] = $conn->error;
		echo json_encode($response_array);
	}
}
?>