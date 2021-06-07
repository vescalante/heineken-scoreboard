<?php
 session_start();
 
 include('conn.php');
 include('function.php');

	$nombre 	= $_POST['nombre'];
	$id_scores 	= $_POST['id_scores'];
	$id_board 	= $_POST['id_board'];

	$ner_miss = $_POST['ner_miss'];
    $eq = $_POST['eq'];
    $vol_s1 = $_POST['vol_s1'];
    $vol_s2 = $_POST['vol_s2'];
    $vol_s3 = $_POST['vol_s3'];
    $vol_s4 = $_POST['vol_s4'];
    $vol_heineken = $_POST['vol_heineken'];
    $productividad = $_POST['productividad'];
    $vol_nr = $_POST['vol_nr'];
    $efectividad = $_POST['efectividad'];
    $dentro_rango = $_POST['dentro_rango'];
    $fuera_frecuencia = $_POST['fuera_frecuencia'];
    $cartera_vencida = $_POST['cartera_vencida'];
    $ejecucion = $_POST['ejecucion'];
    $prod_enfriadores = $_POST['prod_enfriadores'];
    $enf_sc = $_POST['enf_sc'];
    $prod1 = $_POST['prod1'];
    $prod2 = $_POST['prod2'];
    $prod3 = $_POST['prod3'];
    $prod4 = $_POST['prod4'];
    $prod1_cuota = $_POST['prod1_cuota'];
    $prod2_cuota = $_POST['prod2_cuota'];
    $prod3_cuota = $_POST['prod3_cuota'];
    $prod4_cuota = $_POST['prod4_cuota'];


	date_default_timezone_set("America/Mexico_City");
	$today		= date("Y-m-d H:i:s");

	if ($id_scores==0) {
		$sql2 = "INSERT INTO `scores` (id_board, id_vendedor, ner_miss, eq, vol_s1, vol_s2, vol_s3, vol_s4, vol_heineken, productividad, vol_nr, efectividad, dentro_rango, fuera_frecuencia, cartera_vencida, ejecucion, prod_enfriadores, enf_sc, prod1, prod1_cuota, prod2, prod2_cuota, prod3, prod3_cuota, prod4, prod4_cuota) VALUES ('$id_board', '$nombre', '$ner_miss', '$eq', '$vol_s1', '$vol_s2', '$vol_s3', '$vol_s4', '$vol_heineken', '$productividad', '$vol_nr', '$efectividad', '$dentro_rango', '$fuera_frecuencia', '$cartera_vencida', '$ejecucion', '$prod_enfriadores', '$enf_sc', '$prod1', '$prod1_cuota', '$prod2', '$prod2_cuota', '$prod3', '$prod3_cuota', '$prod4', '$prod4_cuota')";
		if($conn->query($sql2)){
			$response_array['status'] = 'success';
			$response_array['message'] = 'Los datos agregaron al tablero de resultados correctamente.';
			echo json_encode($response_array);
		}
		else{
			$response_array['status'] = 'error';
			$response_array['message'] = $conn->error;
			echo json_encode($response_array);
		}
	}else{
		$sql2 = "UPDATE `scores` SET
			`id_board` 	= '$id_board',
			`id_vendedor` = '$nombre',
			`ner_miss` = '$ner_miss',
		    `eq` = '$eq',
		    `vol_s1` = '$vol_s1',
		    `vol_s2` = '$vol_s2',
		    `vol_s3` = '$vol_s3',
		    `vol_s4` = '$vol_s4',
		    `vol_heineken` = '$vol_heineken',
		    `productividad` = '$productividad',
		    `vol_nr` = '$vol_nr',
		    `efectividad` = '$efectividad',
		    `dentro_rango` = '$dentro_rango',
		    `fuera_frecuencia` = '$fuera_frecuencia',
		    `cartera_vencida` = '$cartera_vencida',
		    `ejecucion` = '$ejecucion',
		    `prod_enfriadores` = '$prod_enfriadores',
		    `enf_sc` = '$enf_sc',
		    `prod1` = '$prod1',
		    `prod2` = '$prod2',
		    `prod3` = '$prod3',
		    `prod4` = '$prod4',
		    `prod1_cuota` = '$prod1_cuota',
		    `prod2_cuota` = '$prod2_cuota',
		    `prod3_cuota` = '$prod3_cuota',
		    `prod4_cuota` = '$prod4_cuota'
			WHERE `id_scores` = '{$id_scores}'";

		if($conn->query($sql2)){
			$response_array['status'] = 'success';
			$response_array['message'] = 'Los datos  de este tablero se modificaron correctamente.';
			echo json_encode($response_array);
		}
		else{
			$response_array['status'] = 'error';
			$response_array['message'] = $conn->error;
			echo json_encode($response_array);
		}
	}

?>