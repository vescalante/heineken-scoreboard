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


    	$sql7 = "DELETE FROM `cierre_qualifiers` WHERE `id_board` = '{$id_board}'";
		$query7 = $conn->query($sql7);
		$conn->query($sql7);


		$handle = fopen($tmpName, "r");
		$flag = true;

		while(($filesop = fgetcsv($handle, 1000, ",")) !== false){
			if($flag) { $flag = false; continue; }
			
			$id_board_eq 	= $id_board;
			$jv			 	= $filesop[0];
			$row0			= $filesop[1];
			$row1			= $filesop[2];
			$row2			= $filesop[3];
			$row3			= $filesop[4];
			$row4			= $filesop[5];
			$row5			= $filesop[6];
			$row6			= $filesop[7];
			$row7			= $filesop[8];
			$row8			= $filesop[9];
			$row9			= $filesop[10];
			$total			= $filesop[11];

			 
			$sqlupload = "INSERT INTO `cierre_qualifiers` (id_board, jv, row0, row1, row2, row3, row4, row5, row6, row7, row8, row9, total) VALUES ('$id_board_eq', '$jv', '$row0', '$row1', '$row2', '$row3', '$row4', '$row5', '$row6', '$row7', '$row8', '$row9', '$total')";
			if($conn->query($sqlupload)){
				$error = 0;
			}else{
				$error = 1;
				break;
			}
		}

		if($error==0){
			$response_array['status'] = 'success';
			$response_array['message'] = 'Los datos de EQ (CIERRE QUALIFIERS) para el tablero activo se subieron correctamente.';
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