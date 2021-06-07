<?php
 session_start();
 
 include('conn.php');
 include('function.php');
$category 		= $_COOKIE['USERCAT'];
$nombre 		= utf8_decode($_POST['nombre']);
$apellido 		= utf8_decode($_POST['apellido']);
$socio 			= $_POST['socio'];
$email 			= $_POST['email'];
$puesto 		= utf8_decode($_POST['puesto']);
$zona 			= utf8_decode($_POST['zona']);
$ruta 			= utf8_decode($_POST['zona']);
$antiguedad 	= utf8_decode($_POST['antiguedad']);
$ingreso 		= $_POST['ingreso'];
$identificador 	= $_POST['identificador'];
$identificador_user = $_COOKIE['IDENTIFICADOR'];

$asignado 		= $_POST['select_user_asignado'];

if ($category=="JVENTAS") {
	$asignado_a = $identificador_user;
}else{
	$asignado_a = $_POST['select_user_asignado'];
}

if($_FILES['foto']['tmp_name']==''){
	$foto_change = "NO";
}else{
	$foto_change = "SI";
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

	$uploaddir = 'img/vendedores/';
	$uploadfile = $uploaddir . basename($new_fileName);
}


if ($foto_change == "NO") {
	if($asignado =="0"){
		$response_array['status'] = 'error';
		$response_array['message'] = 'Selecciona al jefe de ventas a quien se le asignará este vendedor';
		echo json_encode($response_array);
	}else{
		$sql5 = "UPDATE `sales-force` SET
		`nombre` = '$nombre', 
		`apellido` = '$apellido', 
		`socio` = '$socio', 
		`puesto` = '$puesto', 
		`zona` = '$zona',
		`ruta` = '$ruta', 
		`antiguedad` = '$antiguedad', 
		`fecha_ingreso` = '$ingreso', 
		`asignado_a` = '$asignado_a', 
		`email` = '$email'  
		WHERE `identificador` = '{$identificador}'";

		if($conn->query($sql5)){
			$response_array['status'] = 'success';
			$response_array['message'] = 'El vendedor seleccionado se actualizó correctamente.';
			echo json_encode($response_array);
		}
		else{
			$response_array['status'] = 'error';
			$response_array['message'] = $conn->error;
			echo json_encode($response_array);
		}
	}
}else{
	if($asignado =="0"){
		$response_array['status'] = 'error';
		$response_array['message'] = 'Selecciona al jefe de ventas a quien se le asignará este vendedor';
		echo json_encode($response_array);
	}else{
		if (!in_array($fileType,$mimes)or($fileSize > 50000000)) {
			$response_array['status'] = 'error';
			$response_array['message'] = 'El archivo no corresponde al formato permitido o pesa mas de 5MB';
			echo json_encode($response_array);
		}else{
			if (move_uploaded_file($tmpName, $uploadfile)) {
				$sql7 = "SELECT * FROM `sales-force` WHERE `email` = '$email' and `identificador` != '$identificador'";
				$query7 = $conn->query($sql7);

				if ($query7->num_rows < 1) {
					$sql5 = "UPDATE `sales-force` SET
					`nombre` = '$nombre', 
					`apellido` = '$apellido', 
					`socio` = '$socio', 
					`puesto` = '$puesto', 
					`zona` = '$zona',
					`ruta` = '$ruta', 
					`antiguedad` = '$antiguedad', 
					`fecha_ingreso` = '$ingreso', 
					`asignado_a` = '$asignado_a', 
					`foto` = '$new_fileName',
					`email` = '$email'  
					WHERE `identificador` = '{$identificador}'";

					if($conn->query($sql5)){
						$response_array['status'] = 'success';
						$response_array['message'] = 'El vendedor seleccionado se actualizó correctamente.';
						echo json_encode($response_array);
					}
					else{
						$response_array['status'] = 'error';
						$response_array['message'] = $conn->error;
						echo json_encode($response_array);
					}
				}else{
					$response_array['status'] = 'error';
					$response_array['message'] = 'Verifica la dirección de correo, ya ha sido utilizada por otro contacto anteriormente';
					echo json_encode($response_array);
				}
			}else{
				$response_array['status'] = 'error';
				$response_array['message'] = 'Hubo un error en la carga del archivo, intentalo de nuevo mas tarde';
				echo json_encode($response_array);
			}
		}
	}
}

?>