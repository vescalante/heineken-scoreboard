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
$validar		= $_POST['validar'];
$activo			= $_POST['activo'];
$user_id		= $_POST['user_id'];
if ($categoria=="JVENTAS") {
	$identificador 	= $_POST['jventas_select'];
}else{
	$identificador	= GenerarCodigoGafete(3);
}

$jventas_select = $_POST['jventas_select'];


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

	$uploaddir = 'img/avatars/';
	$uploadfile = $uploaddir . basename($new_fileName);
}


if ($foto_change == "NO") {
	$sql7 = "SELECT * FROM `admin` WHERE (`usuario` = '$usuario' OR `email` = '$email') AND `id_admin` != '$user_id'";
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
					$response_array['message'] = 'Debes seleccionar un Jefe de Ventas para asociar el usuario';
					echo json_encode($response_array);
				}else{
					$sql8 = "SELECT id_admin FROM `sales-manager`,`admin` WHERE `admin`.`identificador`='$identificador' and `sales-manager`.`identificador` =`admin`.`identificador`"; 
					$query8 = $conn->query($sql8);
					if ($query8->num_rows < 1) {
						$password = password_hash($pass, PASSWORD_DEFAULT);
						$sql4 = "UPDATE `admin` SET
						`usuario` = '$usuario',
						`password` = '$password',
						`nombre` = '$nombre', 
						`apellido` = '$apellido',
						`categoria` = '$categoria', 
						`email` = '$email',
						`validado` = '$validar',
						`activo` = '$activo',
						`identificador` = '$identificador'
						WHERE `id_admin` = '{$user_id}'";

						if($conn->query($sql4)){
							$response_array['status'] = 'success';
							$response_array['message'] = 'El usuario se modificó correctamente.';
							echo json_encode($response_array);
						}	
						else{
							$response_array['status'] = 'error';
							$response_array['message'] = $conn->error;
							echo json_encode($response_array);
						}
					}else{
						$sql9 = "SELECT * FROM `admin` WHERE `identificador`='$identificador' and `id_admin` ='$user_id'"; 
						$query9 = $conn->query($sql9);
						if ($query9->num_rows < 1) {
							$response_array['status'] = 'error';
							$response_array['message'] = 'El Jefe de ventas ya esta relacionado a un usuario, selecciona un Jefe de ventas diferente';
							echo json_encode($response_array);

						}else{
							$password = password_hash($pass, PASSWORD_DEFAULT);
							$sql4 = "UPDATE `admin` SET
							`usuario` = '$usuario',
							`password` = '$password',
							`nombre` = '$nombre', 
							`apellido` = '$apellido',
							`categoria` = '$categoria', 
							`email` = '$email',
							`validado` = '$validar',
							`activo` = '$activo',
							`identificador` = '$identificador'
							WHERE `id_admin` = '{$user_id}'";
							
							if($conn->query($sql4)){
								$response_array['status'] = 'success';
								$response_array['message'] = 'El usuario se modificó correctamente.';
								echo json_encode($response_array);
							}	
							else{
								$response_array['status'] = 'error';
								$response_array['message'] = $conn->error;
								echo json_encode($response_array);
							}
						}
					}
				}
			}else{
				$password = password_hash($pass, PASSWORD_DEFAULT);
				$sql4 = "UPDATE `admin` SET
					`usuario` = '$usuario',
					`password` = '$password',
					`nombre` = '$nombre', 
					`apellido` = '$apellido',
					`categoria` = '$categoria', 
					`email` = '$email',
					`validado` = '$validar',
					`activo` = '$activo',
					`identificador` = '$identificador'
					WHERE `id_admin` = '{$user_id}'";
				if($conn->query($sql4)){
					$response_array['status'] = 'success';
					$response_array['message'] = 'El usuario se modificó correctamente.';
					echo json_encode($response_array);
				}	
				else{
					$response_array['status'] = 'error';
					$response_array['message'] = $conn->error;
					echo json_encode($response_array);
				}
			}
		}
	}else{
		$response_array['status'] = 'error';
		$response_array['message'] = 'El nombre de usuario o correo ya han sido utilizados para crear un usuario de sistema';
		echo json_encode($response_array);
	}
}else{
	if (!in_array($fileType,$mimes)or($fileSize > 50000000)) {
		$response_array['status'] = 'error';
		$response_array['message'] = 'El archivo no corresponde al formato permitido o pesa mas de 5MB';
		echo json_encode($response_array);
	}else{
		$sql7 = "SELECT * FROM `admin` WHERE (`usuario` = '$usuario' OR `email` = '$email') AND `id_admin` != '$user_id'";
		$query7 = $conn->query($sql7);
		if ($query7->num_rows < 1) {
			if ($usuario =="" or $pass =="") {
				$response_array['status'] = 'error';
				$response_array['message'] = 'Debes ingresar un usuario y un password para modificar la cuenta';
				echo json_encode($response_array);
			}else{
				if ($categoria=="JVENTAS") {
					if ($jventas_select =="") {
						$response_array['status'] = 'error';
						$response_array['message'] = 'Debes seleccionar un Jefe de Ventas para asociar el usuario';
						echo json_encode($response_array);
					}else{
						$sql8 = "SELECT id_admin FROM `sales-manager`,`admin` WHERE `admin`.`identificador`='$identificador' and `sales-manager`.`identificador` =`admin`.`identificador`"; 
						$query8 = $conn->query($sql8);
						if ($query8->num_rows < 1) {
							if (move_uploaded_file($tmpName, $uploadfile)) {
								$password = password_hash($pass, PASSWORD_DEFAULT);
								$sql4 = "UPDATE `admin` SET
								`usuario` = '$usuario',
								`password` = '$password',
								`nombre` = '$nombre', 
								`apellido` = '$apellido',
								`foto` = '$new_fileName',
								`categoria` = '$categoria', 
								`email` = '$email',
								`validado` = '$validar',
								`activo` = '$activo',
								`identificador` = '$identificador'
								WHERE `id_admin` = '{$user_id}'";

								if($conn->query($sql4)){
									$response_array['status'] = 'success';
									$response_array['message'] = 'El usuario se modificó correctamente.';
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
							$sql9 = "SELECT * FROM `admin` WHERE `identificador`='$identificador' and `id_admin` ='$user_id'"; 
							$query9 = $conn->query($sql9);
							if ($query9->num_rows < 1) {
								$response_array['status'] = 'error';
								$response_array['message'] = 'El Jefe de ventas ya esta relacionado a un usuario, selecciona un Jefe de ventas diferente';
								echo json_encode($response_array);

							}else{
								if (move_uploaded_file($tmpName, $uploadfile)) {
									$password = password_hash($pass, PASSWORD_DEFAULT);
									$sql4 = "UPDATE `admin` SET
									`usuario` = '$usuario',
									`password` = '$password',
									`nombre` = '$nombre', 
									`apellido` = '$apellido',
									`foto` = '$new_fileName',
									`categoria` = '$categoria', 
									`email` = '$email',
									`validado` = '$validar',
									`activo` = '$activo',
									`identificador` = '$identificador'
									WHERE `id_admin` = '{$user_id}'";
									
									if($conn->query($sql4)){
										$response_array['status'] = 'success';
										$response_array['message'] = 'El usuario se modificó correctamente.';
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
					}
				}else{
					if (move_uploaded_file($tmpName, $uploadfile)) {
						$password = password_hash($pass, PASSWORD_DEFAULT);
						$sql4 = "UPDATE `admin` SET
						`usuario` = '$usuario',
						`password` = '$password',
						`nombre` = '$nombre', 
						`apellido` = '$apellido',
						`foto` = '$new_fileName',
						`categoria` = '$categoria', 
						`email` = '$email',
						`validado` = '$validar',
						`activo` = '$activo',
						`identificador` = '$identificador'
						WHERE `id_admin` = '{$user_id}'";

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