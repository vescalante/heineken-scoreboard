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


    	$sql7 = "DELETE FROM `frecuencia_vs_gec` WHERE `id_board` = '{$id_board}'";
		$query7 = $conn->query($sql7);
		$conn->query($sql7);


		$handle = fopen($tmpName, "r");
		$flag = true;

		while(($filesop = fgetcsv($handle, 1000, ",")) !== false){
			if($flag) { $flag = false; continue; }
			
			$id_board_eq 	= $id_board;
			$jv			 	= $filesop[0];
			$L				= $filesop[1];
			$M				= $filesop[2];
			$R				= $filesop[3];
			$J				= $filesop[4];
			$V				= $filesop[5];
			$S				= $filesop[6];
			$LJ				= $filesop[7];
			$LJ2			= $filesop[8];
			$LV				= $filesop[9];
			$MV				= $filesop[10];
			$RS				= $filesop[11];
			$JS				= $filesop[12];
			$RV				= $filesop[13];
			$LRV			= $filesop[14];
			$LRJ			= $filesop[15];
			$total			= $filesop[16];

			 
			$sqlupload = "INSERT INTO `frecuencia_vs_gec` (id_board, jv, L, M, R, J, V, S, LJ, LJ2, LV, MV, RS, JS, RV, LRV, LRJ ,total) VALUES ('$id_board_eq', '$jv', '$L', '$M', '$R', '$J', '$V', '$S', '$LJ', '$LJ2', '$LV', '$MV', '$RS', '$JS', '$RV', '$LRV', '$LRJ' ,'$total')";
			if($conn->query($sqlupload)){
				$error = 0;
			}else{
				$error = 1;
				break;
			}
		}

		if($error==0){
			$response_array['status'] = 'success';
			$response_array['message'] = 'Los datos de EQ (FRECUENCIA VS GEC) para el tablero activo se subieron correctamente.';
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