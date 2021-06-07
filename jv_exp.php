<?php
 include('conn.php');
 include('function.php');

	$day=date('Y-m-d');
	$v=explode("-",$day);
	$filename="jefes_de_ventas_".$v[2]."_".$v[1]."_".$v[0].".xls";
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
	echo "\n<td class='tabla_dato' colspan='9' style='background:#00b2ed; color:#ffffff; padding:14px; font-size:18px; text-align:left'>Jefes de Ventas</td>";
	echo "\n</tr>";
	echo "\n<tr>";	
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Id</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Nombre</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Apellido</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Socio</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Puesto</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Zona</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Antig&uuml;edad</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Fecha de ingreso</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Email</td>";

	echo "\n</tr>";
	
	$sql ="SELECT * FROM `sales-manager` WHERE `activo` = '$activo' order by id_manager DESC";
 	$query = $conn->query($sql);
		   
	while($row = $query->fetch_assoc())
	{
		echo "\n<tr>";		
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>$row[id_manager]</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>".utf8_encode($row[nombre])."</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>".utf8_encode($row[apellido])."</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>".utf8_encode($row[socio])."</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>".utf8_encode($row[puesto])."</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>".utf8_encode($row[zona])."</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>".utf8_encode($row['antiguedad'])."</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>".$row['fecha_ingreso']."</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>".utf8_encode($row[email])."</td>";
		echo "\n</tr>";	
	}
	
	echo "</table>";
		
?>