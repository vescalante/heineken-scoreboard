<?php
session_start();
//logout script
if(isset($_REQUEST['ch']) && $_REQUEST['ch'] == 'logout'){
	unset($_SESSION['login_admin_adm']);
	if (isset($_SERVER['HTTP_COOKIE']))
	{
    	$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    	foreach($cookies as $cookie)
    	{
    	    $mainCookies = explode('=', $cookie);
        	$name = trim($mainCookies[0]);
        	setcookie($name, '', time()-1000);
        	setcookie($name, '', time()-1000, '/');
    	}
	}
	header('Location:login.php');
}

if(!isset($_SESSION['login_admin_adm'])){
				?>
				<script type="text/javascript">
            		window.location.href = "login.php"
        		</script>
                <?php 
     }
?>