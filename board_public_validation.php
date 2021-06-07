<?php
    $category = isset($_COOKIE['USERCAT']) ? $_COOKIE['USERCAT'] : "";
    $idboard = isset($_GET["id"]) ? $_GET["id"] : "";
    $temp = isset($_GET["temp"]) ? $_GET["temp"] : "";

    switch ($category) {
    	case '':
    		if ($idboard=="") {
    			if ($temp=="") {
    				header('login.php');
    			}else{
    				$category_tab = "TAB";
					setcookie("USERCAT",$category_tab);
					$_SESSION['login_admin_adm'] = 1;

	    			header('Location:board_public.php?id='.$idboard);
    			}
    		}else{
    			$category_tab = "TAB";
				setcookie("USERCAT",$category_tab);
				$_SESSION['login_admin_adm'] = 1;

    			header('Location:board_public.php?id='.$idboard);
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