<?php
 session_start();
 
 include('conn.php');
 include('function.php');

$nombre 		= utf8_decode($_POST['nombre']);
$idAleatorio	= GenerarCodigoGafete(3);
date_default_timezone_set("America/Mexico_City");
$today = date("Y-m-d H:i:s");

if($_FILES['foto']['tmp_name']==''){
	$response_array['status'] = 'error';
	$response_array['message'] = 'El archivo de foto esta vacio, selecciona una imagen e intenta de nuevo';
	echo json_encode($response_array);
}else{
	$fileName = $_FILES['foto']['name'];
	$tmpName  = $_FILES['foto']['tmp_name'];
	$fileSize = $_FILES['foto']['size'];
	$fileType = $_FILES['foto']['type'];

	$mimes = array(    		
		'image/jpeg',
		'image/png'
	);
	
	$random_digit=rand(000,999);
	$new_fileName=str_replace(" ",'_',$random_digit.$fileName);
	$new_fileName=utf8_decode($new_fileName);

	$uploaddir = 'img/productos/';
	$uploadfile = $uploaddir . basename($new_fileName);

	if (!in_array($fileType,$mimes)or($fileSize > 50000000)) {
		$response_array['status'] = 'error';
		$response_array['message'] = 'El archivo no corresponde al formato permitido o pesa mas de 5MB';
		echo json_encode($response_array);
	}else{
		if (move_uploaded_file($tmpName, $uploadfile)) {
			$sql2 = "INSERT INTO `products` (nombre, foto, identificador, fecha_mod) VALUES ('$nombre', '$new_fileName', '$idAleatorio', '$today')";
			if($conn->query($sql2)){
				$response_array['status'] = 'success';
				$response_array['message'] = 'El producto se agregó correctamente.';
				echo json_encode($response_array);
			}
			else{
				$response_array['status'] = 'error';
				$response_array['message'] = $conn->error;
				echo json_encode($response_array);
			}
		}else{
			$response_array['status'] = 'error';
			$response_array['message'] = 'Hubo un error en la carga del archivo, intentalo de nuevo mas tarde';
			echo json_encode($response_array);
		}
	}
}

?>