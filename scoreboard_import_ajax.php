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
		if($category=="SADMIN" || $category=="ADMIN"){
			$sql8 = "SELECT * FROM `sales-force`";
		}else{
			$sql8 = "SELECT * FROM `sales-force` WHERE `asignado_a` = '{$identificador_user}'";
		}

		$query8 = $conn->query($sql8);
        while($row8 = $query8->fetch_assoc()){
        	$id_sales_table = $row8['id_sales'];
        	$sql7 = "DELETE FROM `scores` WHERE `id_vendedor` = '{$id_sales_table}'";
			$query7 = $conn->query($sql7);
			$conn->query($sql7);
        }

		$handle = fopen($tmpName, "r");
		$flag = true;

		while(($filesop = fgetcsv($handle, 1000, ",")) !== false){
			if($flag) { $flag = false; continue; }
			
			$id_board 		= $filesop[0];
			$id_vendedor 	= $filesop[1];
			$ner_miss 		= $filesop[3];
			$eq 		 	= $filesop[4];
			$vol_s1 		= $filesop[5];
			$vol_s2 		= $filesop[6];
			$vol_s3 		= $filesop[7];
			$vol_s4 		= $filesop[8];
			$vol_heineken 	= $filesop[9];
			$productividad 	= $filesop[10];
			$vol_nr 		= $filesop[11];
			$efectividad 	= $filesop[12];
			$dentro_rango 	= $filesop[13];
			$fuera_frecuencia 	= $filesop[14];
			$cartera_vencida 	= $filesop[15];
			$ejecucion 		= $filesop[16];
			$prod_enfriadores 	= $filesop[17];
			$enf_sc 		= $filesop[18];
			$prod1 			= $filesop[19];
			$prod1_cuota 	= $filesop[20];
			$prod2 			= $filesop[21];
			$prod2_cuota 	= $filesop[22];
			$prod3 			= $filesop[23];
			$prod3_cuota 	= $filesop[24];
			$prod4 			= $filesop[25];
			$prod4_cuota	= $filesop[26];
			 
			$sqlupload = "INSERT INTO `scores` (id_board, id_vendedor, ner_miss, eq, vol_s1, vol_s2, vol_s3, vol_s4, vol_heineken, productividad, vol_nr, efectividad, dentro_rango, fuera_frecuencia, cartera_vencida, ejecucion, prod_enfriadores, enf_sc, prod1, prod1_cuota, prod2, prod2_cuota, prod3, prod3_cuota, prod4, prod4_cuota) VALUES ('$id_board', '$id_vendedor', '$ner_miss', '$eq', '$vol_s1', '$vol_s2', '$vol_s3', '$vol_s4', '$vol_heineken', '$productividad', '$vol_nr', '$efectividad', '$dentro_rango', '$fuera_frecuencia', '$cartera_vencida', '$ejecucion', '$prod_enfriadores', '$enf_sc', '$prod1', '$prod1_cuota', '$prod2', '$prod2_cuota', '$prod3', '$prod3_cuota', '$prod4', '$prod4_cuota')";
			if($conn->query($sqlupload)){
				$error = 0;
			}else{
				$error = 1;
				break;
			}
		}

		if($error==0){
			$response_array['status'] = 'success';
			$response_array['message'] = 'Los datos de este tablero se subieron correctamente.';
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