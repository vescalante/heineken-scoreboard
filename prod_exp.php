<?php
 include('conn.php');
 include('function.php');

	$day=date('Y-m-d');
	$v=explode("-",$day);
	$filename="productos".$v[2]."_".$v[1]."_".$v[0].".xls";
	$activo = 1;
	
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
	echo "\n<td class='tabla_dato' colspan='3' style='background:#00b2ed; color:#ffffff; padding:14px; font-size:18px; text-align:left'>Productos</td>";
	echo "\n</tr>";
	echo "\n<tr>";	
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Id</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Nombre</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>&Uacute;ltima modificaci&oacute;n</td>";

	echo "\n</tr>";
	
	$sql ="SELECT * FROM `products` WHERE `activo` = '$activo' order by id_product DESC";
 	$query = $conn->query($sql);
		   
	while($row = $query->fetch_assoc())
	{
		$date = $row['fecha_mod'];
		echo "\n<tr>";		
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>$row[id_product]</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>".utf8_encode($row[nombre])."</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>".date("d-m-Y H:i", strtotime($date))."</td>";
		echo "\n</tr>";	
	}
	
	echo "</table>";
		
?>