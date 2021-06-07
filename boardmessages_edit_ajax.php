<?php
 session_start();
 
 include('conn.php');
 include('function.php');

$contenido	= utf8_decode($_POST['contenido']);
$id_msg 	= $_POST['idmsg'];
$my_category = $_COOKIE['USERCAT'];

if($my_category=="SADMIN" || $my_category=="ADMIN"){
	$activo = $_POST['activo'];
}else{
	$activo = 0;
}

date_default_timezone_set("America/Mexico_City");
$today = date("Y-m-d H:i:s");


if ($contenido == "") {
	$response_array['status'] = 'error';
	$response_array['message'] = 'El mensaje no puede estar vacio';
	echo json_encode($response_array);
}else{
	if (strlen($contenido)>140) {
		$response_array['status'] = 'error';
		$response_array['message'] = 'El mensaje supera los 140 caractéres, debe ser mas corto';
		echo json_encode($response_array);
	}else{
		$sql2 = "UPDATE `messages` SET
			`contenido` = '$contenido', 
			`activo` = '$activo'
			WHERE `id_message` = '{$id_msg}'";

		if($conn->query($sql2)){
			$response_array['status'] = 'success';
			$response_array['message'] = 'El mensaje se modificó correctamente';
			echo json_encode($response_array);
		}
		else{
			$response_array['status'] = 'error';
			$response_array['message'] = $conn->error;
			echo json_encode($response_array);
		}
	}
}
?>