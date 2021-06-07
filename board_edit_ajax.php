<?php
 session_start();
 
 include('conn.php');
 include('function.php');

	$nombre 	= utf8_decode($_POST['nombre']);
	$inicio		= $_POST['inicio'];
	$fin		= $_POST['fin'];
	$prod1 		= utf8_decode($_POST['prod1']);
	$prod2 		= utf8_decode($_POST['prod2']);
	$prod3 		= utf8_decode($_POST['prod3']);
	$prod4 		= utf8_decode($_POST['prod4']);
	$activo		= $_POST['activo'];
	$identificador	= $_POST['identificador'];

	date_default_timezone_set("America/Mexico_City");
	$today		= date("Y-m-d H:i:s");
	if ($activo==1) {
		$sql = "SELECT * FROM `board` WHERE `activo` = '1' AND `identificador` != '$identificador'";
		$query = $conn->query($sql);

		if ($query->num_rows < 1){ 
			$sql2 = "UPDATE `board` SET
				`nombre` = '$nombre', 
				`inicio` = '$inicio', 
				`fin` = '$fin', 
				`activo` = '$activo', 
				`prod1` = '$prod1', 
				`prod2` = '$prod2', 
				`prod3` = '$prod3', 
				`prod4` = '$prod4'
				WHERE `identificador` = '{$identificador}'";
			if($conn->query($sql2)){
				$response_array['status'] = 'success';
				$response_array['message'] = 'El nuevo tablero se modificó correctamente.';
				echo json_encode($response_array);
			}
			else{
				$response_array['status'] = 'error';
				$response_array['message'] = $conn->error;
				echo json_encode($response_array);
			}
		}else{
			$sql5 = "UPDATE `board` SET
				`activo` = '0'
				WHERE `activo` = '1' AND `identificador` != '$identificador'";
			if($conn->query($sql5)){
				$sql2 = "UPDATE `board` SET
				`nombre` = '$nombre', 
				`inicio` = '$inicio', 
				`fin` = '$fin', 
				`activo` = '$activo', 
				`prod1` = '$prod1', 
				`prod2` = '$prod2', 
				`prod3` = '$prod3', 
				`prod4` = '$prod4'
				WHERE `identificador` = '{$identificador}'";
				if($conn->query($sql2)){
					$response_array['status'] = 'success';
					$response_array['message'] = 'El nuevo tablero se modificó correctamente.';
					echo json_encode($response_array);
				}
				else{
					$response_array['status'] = 'error';
					$response_array['message'] = $conn->error;
					echo json_encode($response_array);
				}
			}
			else{
				$response_array['status'] = 'error';
				$response_array['message'] = $conn->error;
				echo json_encode($response_array);
			}
		}
	}else{
		$sql2 = "UPDATE `board` SET
				`nombre` = '$nombre', 
				`inicio` = '$inicio', 
				`fin` = '$fin', 
				`activo` = '$activo', 
				`prod1` = '$prod1', 
				`prod2` = '$prod2', 
				`prod3` = '$prod3', 
				`prod4` = '$prod4'
				WHERE `identificador` = '{$identificador}'";
		if($conn->query($sql2)){
			$response_array['status'] = 'success';
			$response_array['message'] = 'El nuevo tablero se modificó correctamente.';
			echo json_encode($response_array);
		}
		else{
			$response_array['status'] = 'error';
			$response_array['message'] = $conn->error;
			echo json_encode($response_array);
		}
	}

?>