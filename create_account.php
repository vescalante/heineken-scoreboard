<?php
 session_start();
 
 include('conn.php');
 include('function.php');

$nombre 	= utf8_decode($_POST["nombre"]);
$apellido 	= utf8_decode($_POST["apellido"]);
$email 		= utf8_decode($_POST["email"]);
$username 	= utf8_decode($_POST["username"]);
$pass 		= utf8_decode($_POST["password"]);
$repeat 	= utf8_decode($_POST["repeat"]);



if($nombre=="" or $apellido=="" or $email=="" or $username=="" or $pass=="" or $repeat==""){
	$response_array['status'] = 'error';
	$response_array['message'] = 'Llena correctamente todos los campos';
	echo json_encode($response_array);
}else{
	if($pass != $repeat){
		$response_array['status'] = 'error';
		$response_array['message'] = 'Comprueba que el password sea el mismo en ambos campos';
		echo json_encode($response_array);
	}else{
		$sql = "SELECT * FROM `admin` WHERE `usuario` = '$username' OR `email` = '$email'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$password = password_hash($pass, PASSWORD_DEFAULT);
			$idAleatorio=GenerarCodigoGafete(3);

			$sql2 = "INSERT INTO admin (usuario, password, nombre, apellido, email, identificador) VALUES ('$username', '$password', '$nombre', '$apellido', '$email', '$idAleatorio')";
			if($conn->query($sql2)){
				$response_array['status'] = 'success';
				$response_array['message'] = 'Pronto recibiras mas información sobre el estatus de tu solicitud.';
				echo json_encode($response_array);
			}
			else{
				$response_array['status'] = 'error';
				$response_array['message'] = $conn->error;
				echo json_encode($response_array);
			}
		}else{
			$response_array['status'] = 'error';
			$response_array['message'] = 'El nombre de usuario o correo ya han sido utilizados';
			echo json_encode($response_array);
		}
	}
}
?>