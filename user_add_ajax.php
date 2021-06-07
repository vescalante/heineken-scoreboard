<?php
 session_start();
 
 include('conn.php');
 include('function.php');

$nombre 		= utf8_decode($_POST['nombre']);
$apellido 		= utf8_decode($_POST['apellido']);
$categoria 		= utf8_decode($_POST['cat']);
$email 			= $_POST['email'];
$usuario 		= utf8_decode($_POST['usuario']);
$pass 	 		= utf8_decode($_POST['password']);
$jventas_select = $_POST['jventas_select'];
$validado		= 1;

if ($categoria=="JVENTAS") {
	$idAleatorio 	= $_POST['jventas_select'];
}else{
	$idAleatorio	= GenerarCodigoGafete(3);
}


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

	$uploaddir = 'img/avatars/';
	$uploadfile = $uploaddir . basename($new_fileName);

	if (!in_array($fileType,$mimes)or($fileSize > 50000000)) {
		$response_array['status'] = 'error';
		$response_array['message'] = 'El archivo no corresponde al formato permitido o pesa mas de 5MB';
		echo json_encode($response_array);
	}else{
		$sql7 = "SELECT * FROM `admin` WHERE `usuario` = '$usuario' OR `email` = '$email'";
		$query7 = $conn->query($sql7);
		if ($query7->num_rows < 1) {
			if ($usuario =="" or $pass =="") {
				$response_array['status'] = 'error';
				$response_array['message'] = 'Debes ingresar un usuario y un password para crear la cuenta';
				echo json_encode($response_array);
			}else{
				if ($categoria=="JVENTAS") {
					if ($jventas_select =="") {
						$response_array['status'] = 'error';
						$response_array['message'] = 'Debes seleccionar un Jefe de Ventas para asociar el nuevo usuario';
						echo json_encode($response_array);
					}else{
						$sql8 = "SELECT * FROM `admin` WHERE `identificador` = '$idAleatorio'";
						$query8 = $conn->query($sql8);
						if ($query8->num_rows < 1) {
							if (move_uploaded_file($tmpName, $uploadfile)) {
								$password = password_hash($pass, PASSWORD_DEFAULT);
								$sql4 = "INSERT INTO admin (usuario, password, nombre, apellido, foto, categoria, email, identificador, validado) VALUES ('$usuario', '$password', '$nombre', '$apellido', '$new_fileName', '$categoria', '$email', '$idAleatorio', '$validado')";
								if($conn->query($sql4)){
									$response_array['status'] = 'success';
									$response_array['message'] = 'El usuario se agregó correctamente.';
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
							$response_array['message'] = 'El Jefe de ventas ya esta relacionado a un usuario, selecciona un Jefe de ventas diferente';
							echo json_encode($response_array);
						}
					}
				}else{
					if (move_uploaded_file($tmpName, $uploadfile)) {
						$password = password_hash($pass, PASSWORD_DEFAULT);
						$sql4 = "INSERT INTO admin (usuario, password, nombre, apellido, foto, categoria, email, identificador, validado) VALUES ('$usuario', '$password', '$nombre', '$apellido', '$new_fileName', '$categoria', '$email', '$idAleatorio', '$validado')";
						if($conn->query($sql4)){
							$response_array['status'] = 'success';
							$response_array['message'] = 'El usuario se agregó correctamente.';
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
		}else{
			$response_array['status'] = 'error';
			$response_array['message'] = 'El nombre de usuario o correo ya han sido utilizados para crear un usuario de sistema';
			echo json_encode($response_array);
		}
	}
}

?>