<?php
 session_start();
 
 include('conn.php');
 include('function.php');

$nombre 		= utf8_decode($_POST['nombre']);
$apellido 		= utf8_decode($_POST['apellido']);
$socio 			= $_POST['socio'];
$email 			= $_POST['email'];
$puesto 		= utf8_decode($_POST['puesto']);
$zona 			= utf8_decode($_POST['zona']);
$antiguedad 	= utf8_decode($_POST['antiguedad']);
$ingreso 		= $_POST['ingreso'];
$idAleatorio	= GenerarCodigoGafete(3);

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

	$uploaddir = 'img/jefe_ventas/';
	$uploadfile = $uploaddir . basename($new_fileName);

	if (!in_array($fileType,$mimes)or($fileSize > 50000000)) {
		$response_array['status'] = 'error';
		$response_array['message'] = 'El archivo no corresponde al formato permitido o pesa mas de 5MB';
		echo json_encode($response_array);
	}else{
		$sql7 = "SELECT * FROM `sales-manager` WHERE `email` = '$email'";
		$query7 = $conn->query($sql7);
		if ($query7->num_rows < 1) {
			if (move_uploaded_file($tmpName, $uploadfile)) {
				$sql2 = "INSERT INTO `sales-manager` (nombre, apellido, socio, puesto, zona, antiguedad, fecha_ingreso, identificador, foto, email) VALUES ('$nombre', '$apellido', '$socio', '$puesto', '$zona', '$antiguedad', '$ingreso', '$idAleatorio', '$new_fileName', '$email')";
				if($conn->query($sql2)){
					$response_array['status'] = 'success';
					$response_array['message'] = 'El nuevo Jefe de ventas se agregó correctamente.';
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
		}else{
			$response_array['status'] = 'error';
			$response_array['message'] = 'Ya existe ese correo en la lista de Jefes de ventas, verifica si no estas intentando duplicar un registro';
			echo json_encode($response_array);
		}
	}
}

?>