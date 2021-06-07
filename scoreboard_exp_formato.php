<?php
 include('conn.php');
 include('function.php');

	$day=date('Y-m-d');
	$v=explode("-",$day);
	$filename="formato_importar_".$v[2]."_".$v[1]."_".$v[0].".xls";
	$activo = 1;
	$idboard = isset($_GET["id"]) ? $_GET["id"] : "";
	$my_category = $_COOKIE['USERCAT'];
  	$my_identificador_user = $_COOKIE['IDENTIFICADOR'];
	
	header("Pragma:no-cache");
	header("Expires:0");
	header("Content-Transfer-Encoding:binary");
	header("Content-Type: application/octet-stream");
	header("Content-type:application/force-download");

   if (strstr($_SERVER["HTTP_USER_AGENT"], "MSIE")){
		header("Content-Disposition: filename=$filename");
	} else {
		header("Content-Disposition: attachment;filename=$filename");
	}
	
	
	echo "\n<table border='0' width='100%' cellpadding='2' cellspacing='2'>";
	echo "\n<tr>";	
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>id_tablero</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>id_vendedor</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Nombre_del_vendedor</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>ner_miss</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>eq</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Real_(No._Hetolitros)</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Meta_(No._Hectolitros)</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>%_Avance_vs_Meta</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Tendencia</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>vol_heineken</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>productividad</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>vol_nr</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>efectividad</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>dentro_rango</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>fuera_frecuencia</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>cartera_vencida</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>ejecucion</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>prod_enfriadores</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>enf_sc</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>prod1</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>prod1_cuota</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>prod2</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>prod2_cuota</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>prod3</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>prod3_cuota</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>prod4</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>prod4_cuota</td>";

	echo "\n</tr>";
	
	if ($my_category == "JVENTAS") {
      $sql1 = "SELECT * FROM `sales-force` WHERE `asignado_a` = '$my_identificador_user' and  `activo` = '1'";
    }else{
      $sql1 = "SELECT * FROM `sales-force` WHERE `activo` = '1'";
    }
    $query1 = $conn->query($sql1);
    while($row1 = $query1->fetch_assoc()){
      $asignado_a = $row1['asignado_a'];
      $id_vendedor = $row1['id_sales'];

		echo "\n<tr>";		
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>$idboard</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>$id_vendedor</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>".utf8_encode($row1['nombre'])." ".utf8_encode($row1['apellido'])."</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>0</td>";
		echo "\n</tr>";	
	}
	
	echo "</table>";
		
?>