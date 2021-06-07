<?php
 session_start();
 
 include('conn.php');
 include('function.php');

$id_board 	= $_POST['id_board'];
$user = $_COOKIE['USERADM'];
$category = $_COOKIE['USERCAT'];
$id_acceso = $_COOKIE['IDADMINADM'];
$identificador_user = $_COOKIE['IDENTIFICADOR'];
$nombre_user  = $_COOKIE['USERNAME'];

if($_FILES['foto']['tmp_name']==''){
	$response_array['status'] = 'error';
	$response_array['message'] = 'El archivo para importación, selecciona un archivo e intenta de nuevo';
	echo json_encode($response_array);
}else{
	$fileName = $_FILES['foto']['name'];
	$tmpName  = $_FILES['foto']['tmp_name'];
	$fileSize = $_FILES['foto']['size'];
	$fileType = $_FILES['foto']['type'];

	$mimes = array(    		
		'text/csv',
		'application/csv',
		'application/vnd.ms-excel',
		'application/x-csv',
		'text/comma-separated-values',
		'text/x-comma-separated-values',
		'text/x-csv'
	);
	
	$random_digit=rand(000,999);
	$new_fileName=str_replace(" ",'_',$random_digit.$fileName);
	$new_fileName=utf8_decode($new_fileName);

	$uploaddir = 'uploads/';
	$uploadfile = $uploaddir . basename($new_fileName);

	if (!in_array($fileType,$mimes)or($fileSize > 50000000)) {
		$response_array['status'] = 'error';
		$response_array['message'] = 'El archivo no corresponde al formato permitido (csv) o pesa mas de 5MB';
		echo json_encode($response_array);
	}else{


    	$sql7 = "DELETE FROM `imagen_exterior` WHERE `id_board` = '{$id_board}'";
		$query7 = $conn->query($sql7);
		$conn->query($sql7);


		$handle = fopen($tmpName, "r");
		$flag = true;

		while(($filesop = fgetcsv($handle, 1000, ",")) !== false){
			if($flag) { $flag = false; continue; }
			
			$id_board_eq 	= $id_board;
			$jv			 	= $filesop[0];
			$con_imagen		= $filesop[1];
			$sin_imagen		= $filesop[2];
			$total			= $filesop[3];

			 
			$sqlupload = "INSERT INTO `imagen_exterior` (id_board, jv, con_imagen, sin_imagen, total) VALUES ('$id_board_eq', '$jv', '$con_imagen', '$sin_imagen', '$total')";
			if($conn->query($sqlupload)){
				$error = 0;
			}else{
				$error = 1;
				break;
			}
		}

		if($error==0){
			$response_array['status'] = 'success';
			$response_array['message'] = 'Los datos de EQ (IMAGEN EXTERIOR) para el tablero activo se subieron correctamente.';
			echo json_encode($response_array);
		}
		else{
			$response_array['status'] = 'error';
			$response_array['message'] = 'Ocurrió un error en la carga de la información.';
			echo json_encode($response_array);
		}
	}
}

?>