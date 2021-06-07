<?php
 session_start();
 
 include('conn.php');
 include('function.php');

$id_msg 	= $_POST['idmsg'];


$sql2 = "DELETE FROM `messages` WHERE `id_message` = '{$id_msg}'";

if($conn->query($sql2)){
	$response_array['status'] = 'success';
	$response_array['message'] = 'El mensaje se eliminó correctamente';
	echo json_encode($response_array);
}
else{
	$response_array['status'] = 'error';
	$response_array['message'] = $conn->error;
	echo json_encode($response_array);
}


?>