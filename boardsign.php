<?php
 	session_start();
	include('function.php');

    $category = isset($_COOKIE['USERCAT']) ? $_COOKIE['USERCAT'] : "";
    $idboard = isset($_GET["id"]) ? $_GET["id"] : "";
    $opc = isset($_GET["opc"]) ? $_GET["opc"] : "";
	

    switch ($category) {
    	case '':
    		if ($idboard=="") {
    			header('Location:login.php');
    		}else{
    			if ($opc=="tmp"){
    				$category_tab = "TAB";
					setcookie("USERCAT",$category_tab);
					$_SESSION['login_admin_adm'] = 1;
					echo "Redireccionando...";
					?>
					<script>
				        var timer = setTimeout(function() {
				            window.location='board_public.php?id=<?php echo $idboard; ?>'
				        }, 3000);
				    </script>
	    			<?php
    			}else{
    				header('Location:login.php');
    			}			
    		}
    	break;
    	
    	case 'TAB':
    		header('Location:board_public.php');
    	break;

    	case 'SADMIN':
    		if ($idboard==""){
    			header('Location:board_public.php');
    		}else{
    			header('Location:board_public.php?id='.$idboard);
    		}
    	break;

    	case 'ADMIN':
    		if ($idboard==""){
    			header('Location:board_public.php');
    		}else{
    			header('Location:board_public.php?id='.$idboard);
    		}
    	break;

    	case 'JVENTAS':
    		if ($idboard==""){
    			header('Location:board_public.php');
    		}else{
    			header('Location:board_public.php?id='.$idboard);
    		}
    	break;
    }


?>