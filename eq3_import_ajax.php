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


    	$sql7 = "DELETE FROM `analisis_enfriadores` WHERE `id_board` = '{$id_board}'";
		$query7 = $conn->query($sql7);
		$conn->query($sql7);


		$handle = fopen($tmpName, "r");
		$flag = true;

		while(($filesop = fgetcsv($handle, 1000, ",")) !== false){
			if($flag) { $flag = false; continue; }
			
			$id_board_eq 	= $id_board;
			$jv			 	= $filesop[0];
			$row144			= $filesop[1];
			$row190			= $filesop[2];
			$row192			= $filesop[3];
			$row320			= $filesop[4];
			$row376			= $filesop[5];
			$row500			= $filesop[6];
			$row900			= $filesop[7];
			$row1350		= $filesop[8];
			$total			= $filesop[9];

			 
			$sqlupload = "INSERT INTO `analisis_enfriadores` (id_board, jv, row144, row190, row192, row320, row376, row500, row900, row1350, total) VALUES ('$id_board_eq', '$jv', '$row144', '$row190', '$row192', '$row320', '$row376', '$row500', '$row900', '$row1350', '$total')";
			if($conn->query($sqlupload)){
				$error = 0;
			}else{
				$error = 1;
				break;
			}
		}

		if($error==0){
			$response_array['status'] = 'success';
			$response_array['message'] = 'Los datos de EQ (ANALISIS ENFRIADORES) para el tablero activo se subieron correctamente.';
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