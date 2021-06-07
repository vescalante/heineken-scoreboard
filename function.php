<?php
/**
 * Connect to mysql server
 * @param bool
 * @use true to connect false to close
 */
function dbConnect($close=true){

	if (!$close) {
		mysql_close($link);
		return true;
	}

	$link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('No se logro coneccion con la base de datos ') . mysql_error();
	
	if (!mysql_select_db(DB_NAME, $link))
		return false;
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function enviar_correo($fromname, $fromaddress, $toname, $toaddress, $bcc ,$subject, $message)
{
	$headers  = "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\n";
	$headers .= "X-Priority: 3\n";
	//$headers .= "X-MSMail-Priority: Normal\n";
	$headers .= "X-Mailer: PHP 5.2\n";
	$headers .= "From: \"".$fromname."\" <".$fromaddress.">\n";
	$headers .= "Reply-To: $fromaddress\n";
	//$headers .= "Bcc: \"Alexandria\" <".$bcc.">\n";
	$headers .= "Bcc: ".$bcc."\r\n";
	return mail($toaddress, $subject, $message, $headers);
//return 1;
}


function normaliza ($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuy
bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}

function Sustituto_Cadena($rb){ 
        ## Sustituyo caracteres en la cadena final
        $rb = str_replace("Ã¡", "&aacute;", $rb);
        $rb = str_replace("Ã©", "&eacute;", $rb);
        $rb = str_replace("Â®", "&reg;", $rb);
        $rb = str_replace("Ã­", "&iacute;", $rb);
        $rb = str_replace("ï¿½", "&iacute;", $rb);
        $rb = str_replace("Ã³", "&oacute;", $rb);
        $rb = str_replace("Ãº", "&uacute;", $rb);
        $rb = str_replace("n~", "&ntilde;", $rb);
        $rb = str_replace("Âº", "&ordm;", $rb);
        $rb = str_replace("Âª", "&ordf;", $rb);
        $rb = str_replace("ÃƒÂ¡", "&aacute;", $rb);
        $rb = str_replace("Ã±", "&ntilde;", $rb);
        $rb = str_replace("Ã‘", "&Ntilde;", $rb);
        $rb = str_replace("ÃƒÂ±", "&ntilde;", $rb);
        $rb = str_replace("n~", "&ntilde;", $rb);
        $rb = str_replace("Ãš", "&Uacute;", $rb);
        return $rb;
    } 

function GenerarCodigoGafete($bloques)
{
	$numeros=array(0,1,2,3,4,5,6,7,8,9,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z);
	for($j=0;$j<$bloques;$j++)
	{
		$clave="";
		for($i=0;$i<4;$i++)
		{
			$valor = rand(0,count($numeros)-1);
			$clave.=$numeros[$valor];

		}
		$codigoGafete.=$clave;
		//if ( $j<($bloques-1) )
			//$codigoGafete.="-";
	}
	
	return $codigoGafete;
}

?>