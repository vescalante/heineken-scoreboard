<?php
session_start();
if(!isset($_SESSION['login_admin_adm'])){
            ?>
            <script type="text/javascript">
                window.location.href = "login.php"
            </script>
            <?php 
}else{
    include('conn.php');
    include('function.php');

    $category = $_COOKIE['USERCAT'];

    $activo = 1;
    $idboard = isset($_GET["id"]) ? $_GET["id"] : "";
    if ($idboard=="") {
        $sql = "SELECT * FROM `board` WHERE `activo` = '$activo'";
    }else{
        $sql = "SELECT * FROM `board` WHERE `id_board` = '$idboard'";
    }

    $query = $conn->query($sql);
    if ($query->num_rows < 1){ 
        ?>
            <script type="text/javascript">
                window.location.href = "login.php"
            </script>
        <?php 
    }else{
        $row = $query->fetch_assoc();
        $idboard=$row["id_board"];
        $nombreboard=$row["nombre"];
        $prod1_db=$row["prod1"];
        $prod2_db=$row["prod2"];
        $prod3_db=$row["prod3"];
        $prod4_db=$row["prod4"];

        $sqlprod1 = "SELECT * FROM `products` WHERE `identificador` = '$prod1_db'";
        $queryprod1 = $conn->query($sqlprod1);
        if ($queryprod1->num_rows < 1){ 
            $prod1_image= "img/avatars/profile-image.jpg";
            $prod1_name="Prod 1";
        }else{
            $rowprod1 = $queryprod1->fetch_assoc();
            $prod1_image="img/productos/".$rowprod1["foto"];
            $prod1_name=utf8_encode($rowprod1["nombre"]);
        }

        $sqlprod2 = "SELECT * FROM `products` WHERE `identificador` = '$prod2_db'";
        $queryprod2 = $conn->query($sqlprod2);
        if ($queryprod2->num_rows < 1){ 
            $prod2_image= "img/avatars/profile-image.jpg";
            $prod2_name="Prod 2";
        }else{
            $rowprod2 = $queryprod2->fetch_assoc();
            $prod2_image="img/productos/".$rowprod2["foto"];
            $prod2_name=utf8_encode($rowprod2["nombre"]);
        }

        $sqlprod3 = "SELECT * FROM `products` WHERE `identificador` = '$prod3_db'";
        $queryprod3 = $conn->query($sqlprod3);
        if ($queryprod3->num_rows < 1){ 
            $prod3_image= "img/avatars/profile-image.jpg";
            $prod3_name="Prod 3";
        }else{
            $rowprod3 = $queryprod3->fetch_assoc();
            $prod3_image="img/productos/".$rowprod3["foto"];
            $prod3_name=utf8_encode($rowprod3["nombre"]);
        }

        $sqlprod4 = "SELECT * FROM `products` WHERE `identificador` = '$prod4_db'";
        $queryprod4 = $conn->query($sqlprod4);
        if ($queryprod4->num_rows < 1){ 
            $prod4_image= "img/avatars/profile-image.jpg";
            $prod4_name="Prod 4";
        }else{
            $rowprod4 = $queryprod4->fetch_assoc();
            $prod4_image="img/productos/".$rowprod4["foto"];
            $prod4_name=utf8_encode($rowprod4["nombre"]);
        }
    }
}

?>
<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.15
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Heineken Execution Qualifiers">
    <meta name="author" content="Heineken Ermita">
    <meta name="keyword" content="Heineken,Execution,Qualifiers,ermita">
    <title>Heineken Execution Qualifiers | Ermita</title>
    <script type="text/JavaScript">
        function timeRefresh(timeoutPeriod) {
            setTimeout("location.reload(true);", timeoutPeriod);
        }
    </script>
    <!-- Icons-->
    <link href="node_modules/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="node_modules/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="./img/favicon.png" sizes="any" />
    <!-- Main styles for this application-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/board-public.css" rel="stylesheet">
    <link href="vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    
  </head>
<!-- BEGIN HEADER -->
    <body onLoad="JavaScript:timeRefresh(300000);">
        <div class="outter">
          <div class="container-fluid">
            <div class="header row">
              <div class="col-sm-4 col-lg-3 logo-board">
                <a href="board_public.php?id=<?php echo $idboard; ?>">
                <img src="/img/brand/nuevos/board_logo.png" class="img-fluid">
                </a>
              </div>
              <div class="col-sm-4 col-lg-4 board-title" style="display: flex; align-items: center; justify-content: center;">
                <h1><?php echo $nombreboard; ?></h1>
              </div>
              <div class="col-sm-4 col-lg-2 p-2 btn-group-vertical">
                <button class="btn btn-board" onClick="location.href = 'board_public_top10.php';">
                  <i class="fa fa-certificate"></i>TOP 10
                </button>
                <button class="btn btn-board" onClick="location.href = 'board_public_podium.php';">
                  <i class="fa fa-trophy"></i>PODIUM
                </button>
              </div>
              <div class="col-sm-12 col-lg-3 products-list" style="text-align:right">

                <div class="item-card"><img src="<?php echo $prod1_image; ?>" class="img-fluid"></div>
                <div class="item-card"><img src="<?php echo $prod2_image; ?>" class="img-fluid"></div>
                <div class="item-card"><img src="<?php echo $prod3_image; ?>" class="img-fluid"></div>
                <div class="item-card"><img src="<?php echo $prod4_image; ?>" class="img-fluid"></div>
                
              </div>
            </div>
          </div>