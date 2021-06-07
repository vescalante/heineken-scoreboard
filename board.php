<?php 
  include('conn.php');
  include('function.php');

  $category = 'JVENTAS';

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
?>
<!doctype html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Heineken Execution Qualifiers">
    <meta name="author" content="Heineken Ermita">
    <meta name="keyword" content="Heineken,Execution,Qualifiers,ermita">
    <link rel="icon" type="image/png" href="./img/favicon.png" sizes="any" />
    <title>Heineken Execution Qualifiers | Ermita</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/sticky-footer-navbar/">

    <!-- Main styles for this application-->
    <link href="css/style.css" rel="stylesheet">
    <link href="node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style type="text/css">
      /* Sticky footer styles
      -------------------------------------------------- */
      html {
        position: relative;
        min-height: 100%;
      }
      body {
        /* Margin bottom by footer height */
        margin-bottom: 70px;
      }
      .main-content{
        margin-top: 20px;
      }
      .footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        /* Set the fixed height of the footer here */
        height: 70px;
        line-height: 70px; /* Vertically center the text there */
        background-color: #262626;
      }
      .comments-marquee{
        line-height: 70px; 
        height: 70px;
        overflow: hidden;
        color: #fff;
      }

      .comments-marquee ul{
        list-style: none;
        margin-left: 0px;
      }
      
      .item-card{
        display: inline-block;
        margin: 5px;
        border: 1px solid #f1f1f1;
        background: #fff;
        border-radius: 5px;
        padding: 5px;
      }
      .item-card img{
        height: 120px;
      }
      .navbar-brand {
        padding: 0 15px;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .navbar-brand img{
        max-width: 200px;
      }
      .navbar-brand span{
        font-size: 40px;
        padding-top: 9px;
        padding-left: 20px;
        font-weight: 200;
      }
      .btn-board{
        width:100%; 
        background: #0cb149 !important; 
        color: #fff; 
        font-size:1em; 
        font-size: 16px;
        margin: 2px;
        border-radius: 0px;
      }
      .btn-board:hover{
        color: #fff !important;
        background: #05993d !important;
      }
      .tableClass {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      .tableClass td, .tableClass th {
        border: 1px solid #ddd;
        padding: 15px;
        font-size:11px;
        text-align: center;
      }

      .tableClass tr:nth-child(even){background-color: #f2f2f2;}

      .tableClass tr:hover {background-color: #ddd;}

      .tableClass th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #008c2b;
        color: white;
        line-height: 15px;
        text-align: center;
        position: sticky;
        top: 130px;
        z-index: 1;
      }
      .tableClass th.green-weak{
        background: #02a635;
        border: 1px solid #02a635;
      }
      .tableClass th.green-strong{
        background: #008c2b;
        border: 1px solid #008c2b;
      }
      .tableClass td.success-cell{
        background-color: #02a635;
        color: #fff;
      }
      .tableClass td.success-cell:hover{
        background-color: #027e29;
        color: #fff;
      }
      .tableClass td.danger-cell{
        background-color: #cc0000;
        color: #fff;
      }
      .tableClass td.danger-cell:hover{
        background-color: #990000;
        color: #fff;
      }
      .tableClass td.normal-cell{
        background-color: none;
        color: #000;
      }
      .iconLabel {
          position: relative;
          top: 0px;
          padding-left: 4px;
      }
      .menu-hide{
        display: none;
      }
      .buttons-menu{
        display: flex; 
        flex-direction: row; 
        justify-content: flex-end; 
        align-items: center;
      }
      @media screen and (max-width: 1198px) {
        .navbar-brand img{
        max-width: 170px;
        }
        .navbar-brand span{
          font-size: 26px;
          padding-top: 6px;
          padding-left: 20px;
          font-weight: 200;
        }
        .main-content{
          margin-top: 35px;
        }
        .tableClass th {
          top: 150px;
        }
      }
      @media screen and (max-width: 991px) {
        .products-list{
          display:none;
        }
        .menu-hide{
          display: block;
        }
        .buttons-menu{
          display: none;
        }
        .main-content{
          margin-top: -20px;
        }
        .tableClass th {
          top: 90px;
        }
      }
      @media screen and (min-width: 1199px) {
        .products-list img{
          height: 100px;
        }
      }
      @media screen and (max-width: 496px) {
        .navbar-brand img{
          max-width: 96px;
        }
        .navbar-brand span{
          font-size: 16px;
          padding-top: 0px;
          padding-left: 10px;
        }
      }

      /* Custom page CSS
      -------------------------------------------------- */
      /* Not required for template or sticky footer method. */

      body > .container-fluid {
        padding: 120px 15px 0;
      }

      .footer > .container {
        padding-right: 15px;
        padding-left: 15px;
      }

    </style>
  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="board_public.php?id=<?php echo $idboard; ?>">
            <img src="/img/brand/nuevos/board_logo.png" class="img-fluid">
            <span><?php echo $nombreboard; ?></span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto menu-hide">
              <li class="nav-item active">
                <a class="nav-link" href="#">TOP 10</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">PODIUM</a>
              </li>
            </ul>
          </div>
          <div class="buttons-menu">
            <div style="margin-right: 30px">
              <button class="btn btn-board navbar-btn" onClick="location.href = 'board_public_top10.php';"><i class="fa fa-certificate"></i> TOP 10</button>
              <button class="btn btn-board navbar-btn" onClick="location.href = 'board_public_podium.php';"> <i class="fa fa-trophy"></i> PODIUM</button>
            </div>
            <div class="products-list">
              <div class="item-card"><img src="<?php echo $prod1_image; ?>" class="img-fluid"></div>
              <div class="item-card"><img src="<?php echo $prod2_image; ?>" class="img-fluid"></div>
              <div class="item-card"><img src="<?php echo $prod3_image; ?>" class="img-fluid"></div>
              <div class="item-card"><img src="<?php echo $prod4_image; ?>" class="img-fluid"></div>
            </div>
          </div>
        </div>
      </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container-fluid">
      <div class="content main-content">
          <table class="tableClass">
            <thead>
              <tr>
                <th class="green-weak">Ruta</th>
                <th class="green-weak">Jefe Ventas</th>
                <th class="green-weak">Vendedor</th>
                <th class="green-strong">Ner Miss</th>
                <th class="green-strong">EQ</th>
                <th class="green-strong">Vol S1</th>
                <th class="green-strong">Vol S2</th>
                <th class="green-strong">Vol S3</th>
                <th class="green-strong">Vol S4</th>
                <th class="green-strong">Vol Heineken</th>
                <th class="green-strong">Productividad</th>
                <th class="green-strong">Vol NR</th>
                <th class="green-strong">Efectividad</th>
                <th class="green-strong">Dentro Rango</th>
                <th class="green-strong">Fuera Frecuencia</th>
                <th class="green-strong">Cartera Vencida</th>
                <th class="green-strong">Ejecucion</th>
                <th class="green-strong">Prod Enfriadores</th>
                <th class="green-strong">Enf SC</th>
                <th class="green-strong"><?php echo $prod1_name; ?></th>
                <th class="green-strong"><?php echo $prod2_name; ?></th>
                <th class="green-strong"><?php echo $prod3_name; ?></th>
                <th class="green-strong"><?php echo $prod4_name; ?></th>
              </tr>
            </thead>
            <tbody>
              <?php
                $sql1 = "SELECT * FROM `sales-force` WHERE `activo` = '1'";
                $query1 = $conn->query($sql1);
                while($row1 = $query1->fetch_assoc()){
                  $asignado_a = $row1['asignado_a'];
                  $id_vendedor = $row1['id_sales'];

                  $sqljv = "SELECT * FROM `sales-manager` WHERE `identificador` = '$asignado_a'";
                  $queryjv = $conn->query($sqljv);
                  $rowjv = $queryjv->fetch_assoc();
                  $jv_name=utf8_encode($rowjv["nombre"]);
                  $jv_foto=utf8_encode($rowjv["foto"]);

                  $sqlbo = "SELECT * FROM `scores` WHERE `id_vendedor` = '$id_vendedor' and id_board = '$idboard'";
                  $querybo = $conn->query($sqlbo);
                  $rowbo = $querybo->fetch_assoc();

                  if (empty($rowbo['id_scores'])) {
                    $ner_miss = 0;
                    $eq = 0;
                    $vol_s1 = 0;
                    $vol_s2 = 0;
                    $vol_s3 = 0;
                    $vol_s4 = 0;
                    $vol_heineken = 0;
                    $productividad = 0;
                    $vol_nr = 0;
                    $efectividad = 0;
                    $dentro_rango = 0;
                    $fuera_frecuencia = 0;
                    $cartera_vencida = 0;
                    $ejecucion = 0;
                    $prod_enfriadores = 0;
                    $enf_sc = 0;
                    $prod1 = 0;
                    $prod2 = 0;
                    $prod3 = 0;
                    $prod4 = 0;
                    $prod1_cuota = 0;
                    $prod2_cuota = 0;
                    $prod3_cuota = 0;
                    $prod4_cuota = 0;

                  }else{
                    $ner_miss = $rowbo['ner_miss'];
                    $eq = $rowbo['eq'];
                    $vol_s1 = $rowbo['vol_s1'];
                    $vol_s2 = $rowbo['vol_s2'];
                    $vol_s3 = $rowbo['vol_s3'];
                    $vol_s4 = $rowbo['vol_s4'];
                    $vol_heineken = $rowbo['vol_heineken'];
                    $productividad = $rowbo['productividad'];
                    $vol_nr = $rowbo['vol_nr'];
                    $efectividad = $rowbo['efectividad'];
                    $dentro_rango = $rowbo['dentro_rango'];
                    $fuera_frecuencia = $rowbo['fuera_frecuencia'];
                    $cartera_vencida = $rowbo['cartera_vencida'];
                    $ejecucion = $rowbo['ejecucion'];
                    $prod_enfriadores = $rowbo['prod_enfriadores'];
                    $enf_sc = $rowbo['enf_sc'];
                    $prod1 = $rowbo['prod1'];
                    $prod2 = $rowbo['prod2'];
                    $prod3 = $rowbo['prod3'];
                    $prod4 = $rowbo['prod4'];
                    $prod1_cuota = $rowbo['prod1_cuota'];
                    $prod2_cuota = $rowbo['prod2_cuota'];
                    $prod3_cuota = $rowbo['prod3_cuota'];
                    $prod4_cuota = $rowbo['prod4_cuota'];
                  }
                  echo "
                    <tr>
                      <td>".utf8_encode($row1['ruta'])."</td>
                      <td style='white-space: nowrap; text-align: left'><a href='board_public_profile_jv.php?id_manager=".$asignado_a."'>
                        <img class='img-avatar' alt='' src='img/jefe_ventas/".$jv_foto."' alt='".$jv_name."' align='middle' border='0' height='30' width='30'>
                      <span class='iconLabel'>".$jv_name."</span>
                      </a> 
                      </td>

                      <td style='white-space: nowrap; text-align: left'><a href='board_public_profile.php?id_sales=".$id_vendedor."'>
                        <img class='img-avatar' alt='' src='img/vendedores/".$row1['foto']."' align='middle' border='0' height='30' width='30'>
                      <span class='iconLabel'>".utf8_encode($row1['nombre'])."</span>
                      </a> 
                      </td>
                      
                      <td>".$ner_miss."</td>
                      <td style='white-space: nowrap;'>".$eq." %</td>
                      <td>".$vol_s1." %</td>
                      <td>".$vol_s2." %</td>
                      <td>".$vol_s3." %</td>
                      <td>".$vol_s4." %</td>
                  ";
                  if($vol_heineken>=30){
                      echo "<td class='success-cell'>".$vol_heineken."  %</td>";
                    }else{
                      echo "<td class='danger-cell'>".$vol_heineken." %</td>";
                    }
                  if($productividad>=0){
                      echo "<td class='success-cell'>".$productividad."</td>";
                    }else{
                      echo "<td class='danger-cell'>".$productividad."</td>";
                    }
                  if($vol_nr>=0){
                      echo "<td class='danger-cell'>".$vol_nr."</td>";
                    }else{
                      echo "<td class='success-cell'>".$vol_nr."</td>";
                    }
                  if($efectividad>=90){
                      echo "<td class='success-cell'>".$efectividad." %</td>";
                    }else{
                      echo "<td class='danger-cell'>".$efectividad." %</td>";
                    }
                  if($dentro_rango>=90){
                      echo "<td class='success-cell'>".$dentro_rango." %</td>";
                    }else{
                      echo "<td class='danger-cell'>".$dentro_rango." %</td>";
                    }
                  if($fuera_frecuencia>=1){
                      echo "<td class='danger-cell'>".$fuera_frecuencia." %</td>";
                    }else{
                      echo "<td class='success-cell'>".$fuera_frecuencia." %</td>";
                    }
                  if($cartera_vencida>=100){
                      echo "<td class='success-cell'>".$cartera_vencida." %</td>";
                    }else{
                      echo "<td class='danger-cell'>".$cartera_vencida." %</td>";
                    }
                  if($ejecucion>=90){
                      echo "<td class='success-cell'>".$ejecucion." %</td>";
                    }else{
                      echo "<td class='danger-cell'>".$ejecucion." %</td>";
                    }
                  if($prod_enfriadores>=80){
                      echo "<td class='success-cell'>".$prod_enfriadores." %</td>";
                    }else if(($prod_enfriadores>=71)&&(($prod_enfriadores>=79))){
                      echo "<td class='normal-cell'>".$prod_enfriadores." %</td>";
                    }else{
                      echo "<td class='danger-cell'>".$prod_enfriadores." %</td>";
                    }
                  if($enf_sc<=0){
                      echo "<td class='normal-cell'>".$enf_sc." %</td>";
                    }else if(($enf_sc>=1)&&(($enf_sc>=5))){
                      echo "<td class='success-cell'>".$enf_sc." %</td>";
                    }else{
                      echo "<td class='danger-cell'>".$enf_sc." %</td>";
                    }
                  if($prod1>=$prod1_cuota){
                      echo "<td class='success-cell'>".$prod1." %</td>";
                    }else{
                      echo "<td class='danger-cell'>".$prod1." %</td>";
                    }
                  if($prod2>=$prod2_cuota){
                      echo "<td class='success-cell'>".$prod2." %</td>";
                    }else{
                      echo "<td class='danger-cell'>".$prod2." %</td>";
                    }
                  if($prod3>=$prod3_cuota){
                      echo "<td class='success-cell'>".$prod3." %</td>";
                    }else{
                      echo "<td class='danger-cell'>".$prod3." %</td>";
                    }
                  if($prod4>=$prod4_cuota){
                      echo "<td class='success-cell'>".$prod4." %</td>";
                    }else{
                      echo "<td class='danger-cell'>".$prod4." %</td>";
                    }
                }
              ?>
            </tbody>
          </table>
      </div>
    </main>

    <footer class="footer">
      <div class="container-fluid">
        <div class="row comments-marquee">
          <ul>
            <?php
              $msg_activo = 1;
              $sql = "SELECT * FROM `messages` WHERE `id_board` = '1' AND `activo` = '$msg_activo'";
              $query = $conn->query($sql);  

              while($row = $query->fetch_assoc()){
                $autor = $row['id_admin'];
                $sqladm = "SELECT * FROM `admin` WHERE `id_admin` = '$autor'";
                $queryadm = $conn->query($sqladm);
                $rowadm = $queryadm->fetch_assoc();
                $adm_name=utf8_encode($rowadm["nombre"])." ".utf8_encode($rowadm["apellido"]);
                ?>
                <li><i class="fa fa-comment"></i><strong><?php echo $adm_name; ?>:</strong> <?php echo utf8_encode($row['contenido']); ?> </li>
                <?php
              }
            ?>
          </ul>
        </div>
      </div>
    </footer>


    <!-- CoreUI and necessary plugins-->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/pace-progress/pace.min.js"></script>
    <script src="node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="node_modules/@coreui/coreui/dist/js/coreui.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js"></script>
    <!-- DataTables -->
    <script src="node_modules/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="js/main.js"></script>
    <!-- Auto scroll text -->
    <script src="js/jQuery.scrollText.js"></script>
    <script type="text/javascript">
      $(".comments-marquee").scrollText({
          // container
          'comments-marquee': '.comments-marquee', 

          // child elements
          'sections': 'li', 

          // scrolling speed
          'duration': 3000,

          // endless loop
          'loop': true,

          // CSS appended to the current item
          'currentClass': 'current',

          // or 'down'
          'direction': 'up'
          
        });
    </script>
  </body>
</html>
