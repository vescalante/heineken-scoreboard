<?php
 include('conn.php');
 include('function.php');

	$day=date('Y-m-d');
	$v=explode("-",$day);
	$filename="formato_cierre_qualifiers_".$v[2]."_".$v[1]."_".$v[0].".xls";
	
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
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>JV</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>1</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>2</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>3</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>4</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>5</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>6</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>7</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>8</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>9</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>Grand Total</td>";
	echo "\n</tr>";
	

	echo "\n<tr>";		
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n</tr>";	

	echo "\n<tr>";		
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n</tr>";	

	echo "\n<tr>";		
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#ffffff;border:1px solid #000000'>0</td>";
	echo "\n</tr>";	

	echo "\n<tr>";		
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>Grand Total</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>0</td>";
	echo "\n<td class='tabla_etiqueta' style='text-align:center; background:#007f2d;border:1px solid #000000; color: #ffffff'>0</td>";
	echo "\n</tr>";	

	
	echo "</table>";
		
?>