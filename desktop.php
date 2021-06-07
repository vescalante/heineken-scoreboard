<?php 
  $sqlbe = "SELECT * FROM `board` WHERE `activo` = '1' ORDER BY fecha_creacion DESC LIMIT 1";
  $querybe = $conn->query($sqlbe);
  $rowbe = $querybe->fetch_assoc();
  $board_name=$rowbe["nombre"];

  $idboard=$rowbe["id_board"];
  $prod1_db=$rowbe["prod1"];
  $prod2_db=$rowbe["prod2"];
  $prod3_db=$rowbe["prod3"];
  $prod4_db=$rowbe["prod4"];

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
 ?>
<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Inicio</li>
    <li class="breadcrumb-item active">Bienvenido <span style="color:#007f2d; font-weight: bold"><?php echo $nombre_user; ?></span></li>
    <!-- Breadcrumb Menu-->
    <!--
    <li class="breadcrumb-menu d-md-down-none">
      <div class="btn-group" role="group" aria-label="Button group">
        <a class="btn" href="#">
          <i class="icon-speech"></i>
        </a>
        <a class="btn" href="./">
          <i class="icon-graph"></i>  Dashboard</a>
        <a class="btn" href="#">
          <i class="icon-settings"></i>  Settings</a>
      </div>
    </li>
    -->
  </ol>
  <?php
    if($category=="SADMIN" || $category=="ADMIN"){
  ?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row mb-2">
        <h1>TABLERO ACTIVO: <span style="color:#007f2d;"><?php echo $board_name ?></span> </h1>
      </div>
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="card text-white bg-primary">
            <div class="card-body pb-4">

              <div class="text-value">PROMEDIO TOTAL RESULTADOS JEFES DE VENTAS</div>
              <?php 
                $sqljv_count = "SELECT COUNT(*) as cuenta FROM `sales-manager` WHERE `activo` = '1'";
                $queryjv_count = $conn->query($sqljv_count);
                $rowjv_count = $queryjv_count->fetch_assoc();
               ?>
              <div><?php echo $rowjv_count["cuenta"]; ?> Usuarios</div>
            </div>
            <div class="mt-3 mx-3">
              <?php
                $sql1 = "SELECT * FROM `sales-manager` WHERE `activo` = '1'";
                $query1 = $conn->query($sql1);
                $data_jv = array();
                while($row1 = $query1->fetch_assoc()){
                  $identificador_jv = $row1['identificador'];


                  $sqljv = "SELECT * FROM `sales-force` WHERE `asignado_a` = '$identificador_jv' AND `activo` = '1'";
                  $queryjv = $conn->query($sqljv);
                  $num_rows_jv = $queryjv->num_rows;

                  if($num_rows_jv<=0){
                    break;
                  }

                  while($rowjv = $queryjv->fetch_assoc()){
                    $id_vendedor = $rowjv['id_sales'];

                    $sqlbo = "SELECT * FROM `scores` WHERE `id_vendedor` = '$id_vendedor' and id_board = '$idboard'";
                    $querybo = $conn->query($sqlbo);
                    $rowbo = $querybo->fetch_assoc();

                    if (empty($rowbo['id_scores'])) {
                      $ner_miss_jv = 0;
                      $eq_jv = 0;
                      $vol_s1_jv = 0;
                      $vol_s2_jv = 0;
                      $vol_s3_jv = 0;
                      $vol_s4_jv = 0;
                      $vol_heineken_jv = 0;
                      $productividad_jv = 0;
                      $vol_nr_jv = 0;
                      $efectividad_jv = 0;
                      $dentro_rango_jv = 0;
                      $fuera_frecuencia_jv = 0;
                      $cartera_vencida_jv = 0;
                      $ejecucion_jv = 0;
                      $prod_enfriadores_jv = 0;
                      $enf_sc_jv = 0;
                      $prod1_jv = 0;
                      $prod2_jv = 0;
                      $prod3_jv = 0;
                      $prod4_jv = 0;
                      $prod1_cuota_jv = 0;
                      $prod2_cuota_jv = 0;
                      $prod3_cuota_jv = 0;
                      $prod4_cuota_jv = 0;

                    }else{
                      $ner_miss_jv = $rowbo['ner_miss'];
                      $eq_jv = $rowbo['eq'];
                      $vol_s1_jv = $rowbo['vol_s1'];
                      $vol_s2_jv = $rowbo['vol_s2'];
                      $vol_s3_jv = $rowbo['vol_s3'];
                      $vol_s4_jv = $rowbo['vol_s4'];
                      $vol_heineken_jv = $rowbo['vol_heineken'];
                      $productividad_jv = $rowbo['productividad'];
                      $vol_nr_jv = $rowbo['vol_nr'];
                      $efectividad_jv = $rowbo['efectividad'];
                      $dentro_rango_jv = $rowbo['dentro_rango'];
                      $fuera_frecuencia_jv = $rowbo['fuera_frecuencia'];
                      $cartera_vencida_jv = $rowbo['cartera_vencida'];
                      $ejecucion_jv = $rowbo['ejecucion'];
                      $prod_enfriadores_jv = $rowbo['prod_enfriadores'];
                      $enf_sc_jv = $rowbo['enf_sc'];
                      $prod1_jv = $rowbo['prod1'];
                      $prod2_jv = $rowbo['prod2'];
                      $prod3_jv = $rowbo['prod3'];
                      $prod4_jv = $rowbo['prod4'];
                      $prod1_cuota_jv = $rowbo['prod1_cuota'];
                      $prod2_cuota_jv = $rowbo['prod2_cuota'];
                      $prod3_cuota_jv = $rowbo['prod3_cuota'];
                      $prod4_cuota_jv = $rowbo['prod4_cuota'];
                    }
                    $data_ex = array('ner_miss' => $ner_miss_jv,
                        'eq' => $eq_jv,
                        'vol_s1' => $vol_s1_jv,
                        'vol_s2' => $vol_s2_jv,
                        'vol_s3' => $vol_s3_jv,
                        'vol_s4' => $vol_s4_jv,
                        'vol_heineken' => $vol_heineken_jv,
                        'productividad' => $productividad_jv,
                        'vol_nr' => $vol_nr_jv,
                        'efectividad' => $efectividad_jv,
                        'dentro_rango' => $dentro_rango_jv,
                        'fuera_frecuencia' => $fuera_frecuencia_jv,
                        'cartera_vencida' => $cartera_vencida_jv,
                        'ejecucion' => $ejecucion_jv,
                        'prod_enfriadores' => $prod_enfriadores_jv,
                        'enf_sc' => $enf_sc_jv,
                        'prod1' => $prod1_jv,
                        'prod2' => $prod2_jv,
                        'prod3' => $prod3_jv,
                        'prod4' => $prod4_jv,
                        'prod1_cuota' => $prod1_cuota_jv,
                        'prod2_cuota' => $prod2_cuota_jv,
                        'prod3_cuota' => $prod3_cuota_jv,
                        'prod4_cuota' => $prod4_cuota_jv);
                    $props_ex[] = $data_ex;
                  }

                  $value_ner_miss = round(array_sum(array_column($props_ex,'ner_miss'))/$num_rows_jv,2);
                  $value_eq = round(array_sum(array_column($props_ex,'eq'))/$num_rows_jv,2);
                  $value_vol_s1 = round(array_sum(array_column($props_ex,'vol_s1'))/$num_rows_jv,2);
                  $value_vol_s2 = round(array_sum(array_column($props_ex,'vol_s2'))/$num_rows_jv,2);
                  $value_vol_s3 = round(array_sum(array_column($props_ex,'vol_s3'))/$num_rows_jv,2);
                  $value_vol_s4 = round(array_sum(array_column($props_ex,'vol_s4'))/$num_rows_jv,2);
                  $value_vol_heineken = round(array_sum(array_column($props_ex,'vol_heineken'))/$num_rows_jv,2);
                  $value_productividad = round(array_sum(array_column($props_ex,'productividad'))/$num_rows_jv,2);
                  $value_vol_nr = round(array_sum(array_column($props_ex,'vol_nr'))/$num_rows_jv,2);
                  $value_efectividad = round(array_sum(array_column($props_ex,'efectividad'))/$num_rows_jv,2);
                  $value_dentro_rango = round(array_sum(array_column($props_ex,'dentro_rango'))/$num_rows_jv,2);
                  $value_fuera_frecuencia = round(array_sum(array_column($props_ex,'fuera_frecuencia'))/$num_rows_jv,2);
                  $value_cartera_vencida = round(array_sum(array_column($props_ex,'cartera_vencida'))/$num_rows_jv,2);
                  $value_ejecucion = round(array_sum(array_column($props_ex,'ejecucion'))/$num_rows_jv,2);
                  $value_prod_enfriadores = round(array_sum(array_column($props_ex,'prod_enfriadores'))/$num_rows_jv,2);
                  $value_enf_sc = round(array_sum(array_column($props_ex,'enf_sc'))/$num_rows_jv,2);
                  $value_prod1 = round(array_sum(array_column($props_ex,'prod1'))/$num_rows_jv,2);
                  $value_prod2 = round(array_sum(array_column($props_ex,'prod2'))/$num_rows_jv,2);
                  $value_prod3 = round(array_sum(array_column($props_ex,'prod3'))/$num_rows_jv,2);
                  $value_prod4 = round(array_sum(array_column($props_ex,'prod4'))/$num_rows_jv,2);
                  $value_prod1_cuota = round(array_sum(array_column($props_ex,'prod1_cuota'))/$num_rows_jv,2);
                  $value_prod2_cuota = round(array_sum(array_column($props_ex,'prod2_cuota'))/$num_rows_jv,2);
                  $value_prod3_cuota = round(array_sum(array_column($props_ex,'prod3_cuota'))/$num_rows_jv,2);
                  $value_prod4_cuota = round(array_sum(array_column($props_ex,'prod4_cuota'))/$num_rows_jv,2);

                  $suma_jv = ((($value_eq+$value_vol_s3+$value_vol_heineken+$value_efectividad+$value_dentro_rango+$value_prod_enfriadores+$value_enf_sc+$value_prod1+$value_prod2+$value_prod3+$value_prod4)/11)-$value_fuera_frecuencia)-$value_enf_sc;
                  array_push($data_jv, $suma_jv);
                }
                $prom_total_jv=array_sum($data_jv)/$rowjv_count["cuenta"];
                ?>
              <h1 style='color:#fff'><?php echo round($prom_total_jv,2); ?>%</h1>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
          <div class="card text-white bg-warning">
            <div class="card-body pb-4">

              <div class="text-value">PROMEDIO TOTAL RESULTADOS VENDEDORES</div>
              <?php 
                $sqlv_count = "SELECT COUNT(*) as cuenta FROM `sales-force` WHERE `activo` = '1'";
                $queryv_count = $conn->query($sqlv_count);
                $rowv_count = $queryv_count->fetch_assoc();
               ?>
              <div><?php echo $rowv_count["cuenta"]; ?> Usuarios</div>
            </div>
            <?php
                  $sql1 = "SELECT * FROM `sales-force` WHERE `activo` = '1'";
                  $query1 = $conn->query($sql1);
                  $data = array();
                  while($row1 = $query1->fetch_assoc()){
                    $v_name=utf8_encode($row1["nombre"])." ".utf8_encode($row1["apellido"]);
                    $v_foto=utf8_encode($row1["foto"]);
                    $v_email=utf8_encode($row1["email"]);

                    $asignado_a = $row1['asignado_a'];
                    $id_vendedor = $row1['id_sales'];

                    $sqlbo = "SELECT * FROM `scores` WHERE `id_vendedor` = '$id_vendedor' and id_board = '$idboard'";
                    $querybo = $conn->query($sqlbo);
                    $rowbo = $querybo->fetch_assoc();

                    if (empty($rowbo['id_scores'])) {
                      $ner_miss_v = 0;
                      $eq_v = 0;
                      $vol_s1_v = 0;
                      $vol_s2_v = 0;
                      $vol_s3_v = 0;
                      $vol_s4_v = 0;
                      $vol_heineken_v = 0;
                      $productividad_v = 0;
                      $vol_nr_v = 0;
                      $efectividad_v = 0;
                      $dentro_rango_v = 0;
                      $fuera_frecuencia_v = 0;
                      $cartera_vencida_v = 0;
                      $ejecucion_v = 0;
                      $prod_enfriadores_v = 0;
                      $enf_sc_v = 0;
                      $prod1_v = 0;
                      $prod2_v = 0;
                      $prod3_v = 0;
                      $prod4_v = 0;
                      $prod1_cuota_v = 0;
                      $prod2_cuota_v = 0;
                      $prod3_cuota_v = 0;
                      $prod4_cuota_v = 0;

                    }else{

                      $ner_miss_v = $rowbo['ner_miss'];
                      $eq_v = $rowbo['eq'];
                      $vol_s1_v = $rowbo['vol_s1'];
                      $vol_s2_v = $rowbo['vol_s2'];
                      $vol_s3_v = $rowbo['vol_s3'];
                      $vol_s4_v = $rowbo['vol_s4'];
                      $vol_heineken_v = $rowbo['vol_heineken'];
                      $productividad_v = $rowbo['productividad'];
                      $vol_nr_v = $rowbo['vol_nr'];
                      $efectividad_v = $rowbo['efectividad'];
                      $dentro_rango_v = $rowbo['dentro_rango'];
                      $fuera_frecuencia_v = $rowbo['fuera_frecuencia'];
                      $cartera_vencida_v = $rowbo['cartera_vencida'];
                      $ejecucion_v = $rowbo['ejecucion'];
                      $prod_enfriadores_v = $rowbo['prod_enfriadores'];
                      $enf_sc_v = $rowbo['enf_sc'];
                      $prod1_v = $rowbo['prod1'];
                      $prod2_v = $rowbo['prod2'];
                      $prod3_v = $rowbo['prod3'];
                      $prod4_v = $rowbo['prod4'];
                      $prod1_cuota_v = $rowbo['prod1_cuota'];
                      $prod2_cuota_v = $rowbo['prod2_cuota'];
                      $prod3_cuota_v = $rowbo['prod3_cuota'];
                      $prod4_cuota_v = $rowbo['prod4_cuota'];

                  }
                  $suma_v = ((($eq_v+$vol_s3_v+$vol_heineken_v+$efectividad_v+$dentro_rango_v+$prod_enfriadores_v+$enf_sc_v+$prod1_v+$prod2_v+$prod3_v+$prod4_v)/11)-$fuera_frecuencia_v)-$enf_sc_v;
                  array_push($data, $suma_v);
                }
                $prom_total_v=array_sum($data)/$rowv_count["cuenta"];
            ?>
            <div class="mt-3 mx-3">
              <h1 style='color:#fff'><?php echo round($prom_total_v,2); ?>%</h1>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
          <div class="card" style="border:none; background:none">
            <div class="card-body pb-4 btn-group-vertical">
              <button class="btn" onClick="location.href = 'index.php?seccion=jvadd';" style="font-size:16px; color: #fff; background: #fc1100; text-align:left;">
                <i class="fa fa-plus-circle"></i> Agregar Jefe de Ventas
              </button>
              <button class="btn" onClick="location.href = 'index.php?seccion=index.php?seccion=jvaddvadd';" style="font-size:16px; color: #fff; background: #820900; text-align:left; margin:10px 0px 10px 0px">
                <i class="fa fa-plus-circle"></i> Agregar Vendedor
              </button>
              <button class="btn" onClick="location.href = 'index.php?seccion=boardadd';" style="font-size:16px; color: #fff; background: #420500; text-align:left;">
                <i class="fa fa-plus-circle"></i> Agregar Tablero
              </button>
            </div>                  
          </div>
        </div>
        <!-- /.col-->
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h1><span style="color:#007f2d;">Resultados Totales Jefes de Ventas</span> </h1>
            </div>
            <div class="card-body over" style="overflow-x:auto">
              <table class="table table-responsive-lg table-hover table-outline mb-0 tableScore">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center">
                      <i class="icon-people"></i>
                    </th>
                    <th>Nombre</th>
                    <th>Ner Miss</th>
                    <th>EQ</th>
                    <th>Real (No. Hetolitros)</th>
                    <th>Meta (No. Hectolitros)</th>
                    <th>% Avance vs Meta</th>
                    <th>Tendencia</th>
                    <th>Vol Heineken</th>
                    <th>Productividad</th>
                    <th>Vol NR</th>
                    <th>Efectividad</th>
                    <th>Dentro Rango</th>
                    <th>Fuera Frecuencia</th>
                    <th>Cartera Vencida</th>
                    <th>Ejecucion</th>
                    <th>Prod Enfriadores</th>
                    <th>Enf SC</th>
                    <th><?php echo $prod1_name; ?></th>
                    <th><?php echo $prod2_name; ?></th>
                    <th><?php echo $prod3_name; ?></th>
                    <th><?php echo $prod4_name; ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql1 = "SELECT * FROM `sales-manager` WHERE `activo` = '1'";
                    $query1 = $conn->query($sql1);
                    while($row1 = $query1->fetch_assoc()){
                      $identificador_jv = $row1['identificador'];
                      $jv_name=utf8_encode($row1["nombre"]);
                      $jv_lastname=utf8_encode($row1["apellido"]);
                      $jv_foto=utf8_encode($row1["foto"]);
                      $jv_email=utf8_encode($row1["email"]);

                      $sqljv = "SELECT * FROM `sales-force` WHERE `asignado_a` = '$identificador_jv' AND `activo` = '1'";
                      $queryjv = $conn->query($sqljv);
                      $num_rows_jv = $queryjv->num_rows;
                      
                      while($rowjv = $queryjv->fetch_assoc()){
                        $id_vendedor = $rowjv['id_sales'];

                        $sqlbo = "SELECT * FROM `scores` WHERE `id_vendedor` = '$id_vendedor' and id_board = '$idboard'";
                        $querybo = $conn->query($sqlbo);
                        $rowbo = $querybo->fetch_assoc();

                        if (empty($rowbo['id_scores'])) {
                          $ner_miss_jv = 0;
                          $eq_jv = 0;
                          $vol_s1_jv = 0;
                          $vol_s2_jv = 0;
                          $vol_s3_jv = 0;
                          $vol_s4_jv = 0;
                          $vol_heineken_jv = 0;
                          $productividad_jv = 0;
                          $vol_nr_jv = 0;
                          $efectividad_jv = 0;
                          $dentro_rango_jv = 0;
                          $fuera_frecuencia_jv = 0;
                          $cartera_vencida_jv = 0;
                          $ejecucion_jv = 0;
                          $prod_enfriadores_jv = 0;
                          $enf_sc_jv = 0;
                          $prod1_jv = 0;
                          $prod2_jv = 0;
                          $prod3_jv = 0;
                          $prod4_jv = 0;
                          $prod1_cuota_jv = 0;
                          $prod2_cuota_jv = 0;
                          $prod3_cuota_jv = 0;
                          $prod4_cuota_jv = 0;

                        }else{
                          $ner_miss_jv = $rowbo['ner_miss'];
                          $eq_jv = $rowbo['eq'];
                          $vol_s1_jv = $rowbo['vol_s1'];
                          $vol_s2_jv = $rowbo['vol_s2'];
                          $vol_s3_jv = $rowbo['vol_s3'];
                          $vol_s4_jv = $rowbo['vol_s4'];
                          $vol_heineken_jv = $rowbo['vol_heineken'];
                          $productividad_jv = $rowbo['productividad'];
                          $vol_nr_jv = $rowbo['vol_nr'];
                          $efectividad_jv = $rowbo['efectividad'];
                          $dentro_rango_jv = $rowbo['dentro_rango'];
                          $fuera_frecuencia_jv = $rowbo['fuera_frecuencia'];
                          $cartera_vencida_jv = $rowbo['cartera_vencida'];
                          $ejecucion_jv = $rowbo['ejecucion'];
                          $prod_enfriadores_jv = $rowbo['prod_enfriadores'];
                          $enf_sc_jv = $rowbo['enf_sc'];
                          $prod1_jv = $rowbo['prod1'];
                          $prod2_jv = $rowbo['prod2'];
                          $prod3_jv = $rowbo['prod3'];
                          $prod4_jv = $rowbo['prod4'];
                          $prod1_cuota_jv = $rowbo['prod1_cuota'];
                          $prod2_cuota_jv = $rowbo['prod2_cuota'];
                          $prod3_cuota_jv = $rowbo['prod3_cuota'];
                          $prod4_cuota_jv = $rowbo['prod4_cuota'];
                        }
                        $data = array('ner_miss' => $ner_miss_jv,
                            'eq' => $eq_jv,
                            'vol_s1' => $vol_s1_jv,
                            'vol_s2' => $vol_s2_jv,
                            'vol_s3' => $vol_s3_jv,
                            'vol_s4' => $vol_s4_jv,
                            'vol_heineken' => $vol_heineken_jv,
                            'productividad' => $productividad_jv,
                            'vol_nr' => $vol_nr_jv,
                            'efectividad' => $efectividad_jv,
                            'dentro_rango' => $dentro_rango_jv,
                            'fuera_frecuencia' => $fuera_frecuencia_jv,
                            'cartera_vencida' => $cartera_vencida_jv,
                            'ejecucion' => $ejecucion_jv,
                            'prod_enfriadores' => $prod_enfriadores_jv,
                            'enf_sc' => $enf_sc_jv,
                            'prod1' => $prod1_jv,
                            'prod2' => $prod2_jv,
                            'prod3' => $prod3_jv,
                            'prod4' => $prod4_jv,
                            'prod1_cuota' => $prod1_cuota_jv,
                            'prod2_cuota' => $prod2_cuota_jv,
                            'prod3_cuota' => $prod3_cuota_jv,
                            'prod4_cuota' => $prod4_cuota_jv,
                            'jv_foto'=>$jv_foto,
                            'jv_email'=>$jv_email,
                            'jv_nombre'=>$jv_name,
                            'jv_apellido'=>$jv_lastname);
                        $props[] = $data;
                      }
                  if($num_rows_jv<=0){
                    $value_ner_miss = 0;
                    $value_eq =  0;
                    $value_vol_s1 =  0;
                    $value_vol_s2 =  0;
                    $value_vol_s3 =  0;
                    $value_vol_s4 =  0;
                    $value_vol_heineken =  0;
                    $value_productividad =  0;
                    $value_vol_nr =  0;
                    $value_efectividad =  0;
                    $value_dentro_rango =  0;
                    $value_fuera_frecuencia =  0;
                    $value_cartera_vencida =  0;
                    $value_ejecucion =  0;
                    $value_prod_enfriadores =  0;
                    $value_enf_sc =  0;
                    $value_prod1 =  0;
                    $value_prod2 =  0;
                    $value_prod3 =  0;
                    $value_prod4 =  0;
                    $value_prod1_cuota =  0;
                    $value_prod2_cuota =  0;
                    $value_prod3_cuota =  0;
                    $value_prod4_cuota =  0;
                    $suma_jv = 0;
                  }else{
                    $value_ner_miss = round(array_sum(array_column($props,'ner_miss'))/$num_rows_jv,2);
                    $value_eq = round(array_sum(array_column($props,'eq'))/$num_rows_jv,2);
                    $value_vol_s1 = round(array_sum(array_column($props,'vol_s1'))/$num_rows_jv,2);
                    $value_vol_s2 = round(array_sum(array_column($props,'vol_s2'))/$num_rows_jv,2);
                    $value_vol_s3 = round(array_sum(array_column($props,'vol_s3'))/$num_rows_jv,2);
                    $value_vol_s4 = round(array_sum(array_column($props,'vol_s4'))/$num_rows_jv,2);
                    $value_vol_heineken = round(array_sum(array_column($props,'vol_heineken'))/$num_rows_jv,2);
                    $value_productividad = round(array_sum(array_column($props,'productividad'))/$num_rows_jv,2);
                    $value_vol_nr = round(array_sum(array_column($props,'vol_nr'))/$num_rows_jv,2);
                    $value_efectividad = round(array_sum(array_column($props,'efectividad'))/$num_rows_jv,2);
                    $value_dentro_rango = round(array_sum(array_column($props,'dentro_rango'))/$num_rows_jv,2);
                    $value_fuera_frecuencia = round(array_sum(array_column($props,'fuera_frecuencia'))/$num_rows_jv,2);
                    $value_cartera_vencida = round(array_sum(array_column($props,'cartera_vencida'))/$num_rows_jv,2);
                    $value_ejecucion = round(array_sum(array_column($props,'ejecucion'))/$num_rows_jv,2);
                    $value_prod_enfriadores = round(array_sum(array_column($props,'prod_enfriadores'))/$num_rows_jv,2);
                    $value_enf_sc = round(array_sum(array_column($props,'enf_sc'))/$num_rows_jv,2);
                    $value_prod1 = round(array_sum(array_column($props,'prod1'))/$num_rows_jv,2);
                    $value_prod2 = round(array_sum(array_column($props,'prod2'))/$num_rows_jv,2);
                    $value_prod3 = round(array_sum(array_column($props,'prod3'))/$num_rows_jv,2);
                    $value_prod4 = round(array_sum(array_column($props,'prod4'))/$num_rows_jv,2);
                    $value_prod1_cuota = round(array_sum(array_column($props,'prod1_cuota'))/$num_rows_jv,2);
                    $value_prod2_cuota = round(array_sum(array_column($props,'prod2_cuota'))/$num_rows_jv,2);
                    $value_prod3_cuota = round(array_sum(array_column($props,'prod3_cuota'))/$num_rows_jv,2);
                    $value_prod4_cuota = round(array_sum(array_column($props,'prod4_cuota'))/$num_rows_jv,2);

                    $suma_jv = ((($value_eq+$value_vol_s3+$value_vol_heineken+$value_efectividad+$value_dentro_rango+$value_prod_enfriadores+$value_enf_sc+$value_prod1+$value_prod2+$value_prod3+$value_prod4)/11)-$value_fuera_frecuencia)-$value_enf_sc;
                  }

                  $data2 = array('ner_miss' => $value_ner_miss,
                    'eq' => $value_eq,
                    'vol_s1' => $value_vol_s1,
                    'vol_s2' => $value_vol_s2,
                    'vol_s3' => $value_vol_s3,
                    'vol_s4' => $value_vol_s4,
                    'vol_heineken' => $value_vol_heineken,
                    'productividad' => $value_productividad,
                    'vol_nr' => $value_vol_nr,
                    'efectividad' => $value_efectividad,
                    'dentro_rango' => $value_dentro_rango,
                    'fuera_frecuencia' => $value_fuera_frecuencia,
                    'cartera_vencida' => $value_cartera_vencida,
                    'ejecucion' => $value_ejecucion,
                    'prod_enfriadores' => $value_prod_enfriadores,
                    'enf_sc' => $value_enf_sc,
                    'prod1' => $value_prod1,
                    'prod2' => $value_prod2,
                    'prod3' => $value_prod3,
                    'prod4' => $value_prod4,
                    'prod1_cuota' => $value_prod1_cuota,
                    'prod2_cuota' => $value_prod2_cuota,
                    'prod3_cuota' => $value_prod3_cuota,
                    'prod4_cuota' => $value_prod4_cuota,
                    'jv_foto'=>$jv_foto,
                    'jv_email'=>$jv_email,
                    'jv_nombre'=>$jv_name,
                    'jv_apellido'=>$jv_lastname,
                    'suma_jv'=>$suma_jv,
                    'num_rows_jv'=>$num_rows_jv);

                  $props2[] = $data2;
                }
                  foreach ($props2 as $subAray)
                    {
                  ?>
                  <tr>
                    <td class="text-center">
                      <div class="avatar">
                        <img class="img-avatar" src="img/jefe_ventas/<?php echo $subAray['jv_foto']; ?>" alt="JV">
                        <span class="avatar-status badge-success"></span>
                      </div>
                    </td>
                    <td>
                      <div><?php echo $subAray['jv_nombre']." ".$subAray['jv_apellido']; ?></div>
                      <div class="small text-muted">
                        Total: <?php echo round($subAray['suma_jv'],2); ?>%</div>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $subAray['ner_miss']; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $subAray['eq']; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $subAray['vol_s1']; ?></strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $subAray['vol_s2']; ?></strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $subAray['vol_s3']; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $subAray['vol_s4']; ?></strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $subAray['vol_heineken']; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $subAray['productividad']; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $subAray['vol_nr']; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $subAray['efectividad']; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $subAray['dentro_rango']; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $subAray['fuera_frecuencia']; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $subAray['cartera_vencida']; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $subAray['ejecucion']; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $subAray['prod_enfriadores']; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $subAray['enf_sc']; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $subAray['prod1']; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $subAray['prod2']; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $subAray['prod3']; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $subAray['prod4']; ?>%</strong>
                    </td>
                  </tr>
                  <?php 
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h1><span style="color:#007f2d;">Resultados Totales Vendedores</span> </h1>
            </div>
            <div class="card-body over" style="overflow-x:auto">
              <table class="table table-responsive-lg table-hover table-outline mb-0 tableScore">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center">
                      <i class="icon-people"></i>
                    </th>
                    <th>Nombre</th>
                    <th>Ner Miss</th>
                    <th>EQ</th>
                    <th>Real (No. Hetolitros)</th>
                    <th>Meta (No. Hectolitros)</th>
                    <th>% Avance vs Meta</th>
                    <th>Tendencia</th>
                    <th>Vol Heineken</th>
                    <th>Productividad</th>
                    <th>Vol NR</th>
                    <th>Efectividad</th>
                    <th>Dentro Rango</th>
                    <th>Fuera Frecuencia</th>
                    <th>Cartera Vencida</th>
                    <th>Ejecucion</th>
                    <th>Prod Enfriadores</th>
                    <th>Enf SC</th>
                    <th><?php echo $prod1_name; ?></th>
                    <th><?php echo $prod2_name; ?></th>
                    <th><?php echo $prod3_name; ?></th>
                    <th><?php echo $prod4_name; ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql1 = "SELECT * FROM `sales-force` WHERE `activo` = '1'";
                  $query1 = $conn->query($sql1);
                  while($row1 = $query1->fetch_assoc()){
                    $v_name=utf8_encode($row1["nombre"])." ".utf8_encode($row1["apellido"]);
                    $v_foto=utf8_encode($row1["foto"]);
                    $v_email=utf8_encode($row1["email"]);

                    $asignado_a = $row1['asignado_a'];
                    $id_vendedor = $row1['id_sales'];

                    $sqlbo = "SELECT * FROM `scores` WHERE `id_vendedor` = '$id_vendedor' and id_board = '$idboard'";
                    $querybo = $conn->query($sqlbo);
                    $rowbo = $querybo->fetch_assoc();

                    if (empty($rowbo['id_scores'])) {
                      $ner_miss_v = 0;
                      $eq_v = 0;
                      $vol_s1_v = 0;
                      $vol_s2_v = 0;
                      $vol_s3_v = 0;
                      $vol_s4_v = 0;
                      $vol_heineken_v = 0;
                      $productividad_v = 0;
                      $vol_nr_v = 0;
                      $efectividad_v = 0;
                      $dentro_rango_v = 0;
                      $fuera_frecuencia_v = 0;
                      $cartera_vencida_v = 0;
                      $ejecucion_v = 0;
                      $prod_enfriadores_v = 0;
                      $enf_sc_v = 0;
                      $prod1_v = 0;
                      $prod2_v = 0;
                      $prod3_v = 0;
                      $prod4_v = 0;
                      $prod1_cuota_v = 0;
                      $prod2_cuota_v = 0;
                      $prod3_cuota_v = 0;
                      $prod4_cuota_v = 0;
                      $suma_v = 0;

                    }else{

                      $ner_miss_v = round($rowbo['ner_miss'],2);
                      $eq_v = round($rowbo['eq'],2);
                      $vol_s1_v = round($rowbo['vol_s1'],2);
                      $vol_s2_v = round($rowbo['vol_s2'],2);
                      $vol_s3_v = round($rowbo['vol_s3'],2);
                      $vol_s4_v = round($rowbo['vol_s4'],2);
                      $vol_heineken_v = round($rowbo['vol_heineken'],2);
                      $productividad_v = round($rowbo['productividad'],2);
                      $vol_nr_v = round($rowbo['vol_nr'],2);
                      $efectividad_v = round($rowbo['efectividad'],2);
                      $dentro_rango_v = round($rowbo['dentro_rango'],2);
                      $fuera_frecuencia_v = round($rowbo['fuera_frecuencia'],2);
                      $cartera_vencida_v = round($rowbo['cartera_vencida'],2);
                      $ejecucion_v = round($rowbo['ejecucion'],2);
                      $prod_enfriadores_v = round($rowbo['prod_enfriadores'],2);
                      $enf_sc_v = round($rowbo['enf_sc'],2);
                      $prod1_v = round($rowbo['prod1'],2);
                      $prod2_v = round($rowbo['prod2'],2);
                      $prod3_v = round($rowbo['prod3'],2);
                      $prod4_v = round($rowbo['prod4'],2);
                      $prod1_cuota_v = round($rowbo['prod1_cuota'],2);
                      $prod2_cuota_v = round($rowbo['prod2_cuota'],2);
                      $prod3_cuota_v = round($rowbo['prod3_cuota'],2);
                      $prod4_cuota_v = round($rowbo['prod4_cuota'],2);

                      $suma_v = ((($eq_v+$vol_s3_v+$vol_heineken_v+$efectividad_v+$dentro_rango_v+$prod_enfriadores_v+$enf_sc_v+$prod1_v+$prod2_v+$prod3_v+$prod4_v)/11)-$fuera_frecuencia_v)-$enf_sc_v;

                  }
                  ?>
                  <tr>
                    <td class="text-center">
                      <div class="avatar">
                        <img class="img-avatar" src="img/vendedores/<?php echo $v_foto; ?>" alt="JV">
                        <span class="avatar-status badge-success"></span>
                      </div>
                    </td>
                    <td>
                      <div><?php echo $v_name ?></div>
                      <div class="small text-muted">
                        Total: <?php echo round($suma_v,2); ?>%</div>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $ner_miss_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $eq_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $vol_s1_v; ?></strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $vol_s2_v; ?></strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $vol_s3_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $vol_s4_v; ?></strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $vol_heineken_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $productividad_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $vol_nr_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $efectividad_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $dentro_rango_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $fuera_frecuencia_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $cartera_vencida_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $ejecucion_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $prod_enfriadores_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $enf_sc_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $prod1_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $prod2_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $prod3_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $prod4_v; ?>%</strong>
                    </td>
                  </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>



    </div>
  </div>
  <?php
    }else{
  ?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row mb-2">
        <h1>TABLERO ACTIVO: <span style="color:#007f2d;"><?php echo $board_name ?></span> </h1>
      </div>
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="card text-white bg-primary">
            <div class="card-body pb-4">

              <div class="text-value">PROMEDIO TOTAL RESULTADOS VENDEDORES ASIGNADOS</div>
              <?php 
                $sqlv_count = "SELECT COUNT(*) as cuenta FROM `sales-force` WHERE `activo` = '1' AND `asignado_a` = '$identificador_user'";
                $queryv_count = $conn->query($sqlv_count);
                $rowv_count = $queryv_count->fetch_assoc();
               ?>
              <div><?php echo $rowv_count["cuenta"]; ?> Usuarios</div>
            </div>
            <?php
                  $sql1 = "SELECT * FROM `sales-force` WHERE `activo` = '1' AND `asignado_a` = '$identificador_user'";
                  $query1 = $conn->query($sql1);
                  $data = array();
                  while($row1 = $query1->fetch_assoc()){
                    $v_name=utf8_encode($row1["nombre"])." ".utf8_encode($row1["apellido"]);
                    $v_foto=utf8_encode($row1["foto"]);
                    $v_email=utf8_encode($row1["email"]);

                    $asignado_a = $row1['asignado_a'];
                    $id_vendedor = $row1['id_sales'];

                    $sqlbo = "SELECT * FROM `scores` WHERE `id_vendedor` = '$id_vendedor' and id_board = '$idboard'";
                    $querybo = $conn->query($sqlbo);
                    $rowbo = $querybo->fetch_assoc();

                    if (empty($rowbo['id_scores'])) {
                      $ner_miss_v = 0;
                      $eq_v = 0;
                      $vol_s1_v = 0;
                      $vol_s2_v = 0;
                      $vol_s3_v = 0;
                      $vol_s4_v = 0;
                      $vol_heineken_v = 0;
                      $productividad_v = 0;
                      $vol_nr_v = 0;
                      $efectividad_v = 0;
                      $dentro_rango_v = 0;
                      $fuera_frecuencia_v = 0;
                      $cartera_vencida_v = 0;
                      $ejecucion_v = 0;
                      $prod_enfriadores_v = 0;
                      $enf_sc_v = 0;
                      $prod1_v = 0;
                      $prod2_v = 0;
                      $prod3_v = 0;
                      $prod4_v = 0;
                      $prod1_cuota_v = 0;
                      $prod2_cuota_v = 0;
                      $prod3_cuota_v = 0;
                      $prod4_cuota_v = 0;

                    }else{

                      $ner_miss_v = $rowbo['ner_miss'];
                      $eq_v = $rowbo['eq'];
                      $vol_s1_v = $rowbo['vol_s1'];
                      $vol_s2_v = $rowbo['vol_s2'];
                      $vol_s3_v = $rowbo['vol_s3'];
                      $vol_s4_v = $rowbo['vol_s4'];
                      $vol_heineken_v = $rowbo['vol_heineken'];
                      $productividad_v = $rowbo['productividad'];
                      $vol_nr_v = $rowbo['vol_nr'];
                      $efectividad_v = $rowbo['efectividad'];
                      $dentro_rango_v = $rowbo['dentro_rango'];
                      $fuera_frecuencia_v = $rowbo['fuera_frecuencia'];
                      $cartera_vencida_v = $rowbo['cartera_vencida'];
                      $ejecucion_v = $rowbo['ejecucion'];
                      $prod_enfriadores_v = $rowbo['prod_enfriadores'];
                      $enf_sc_v = $rowbo['enf_sc'];
                      $prod1_v = $rowbo['prod1'];
                      $prod2_v = $rowbo['prod2'];
                      $prod3_v = $rowbo['prod3'];
                      $prod4_v = $rowbo['prod4'];
                      $prod1_cuota_v = $rowbo['prod1_cuota'];
                      $prod2_cuota_v = $rowbo['prod2_cuota'];
                      $prod3_cuota_v = $rowbo['prod3_cuota'];
                      $prod4_cuota_v = $rowbo['prod4_cuota'];

                  }
                  $suma_v = ((($eq_v+$vol_s3_v+$vol_heineken_v+$efectividad_v+$dentro_rango_v+$prod_enfriadores_v+$enf_sc_v+$prod1_v+$prod2_v+$prod3_v+$prod4_v)/11)-$fuera_frecuencia_v)-$enf_sc_v;
                  array_push($data, $suma_v);
                }
                $prom_total_v=array_sum($data)/$rowv_count["cuenta"];
            ?>
            <div class="mt-3 mx-3">
              <h1 style='color:#fff'><?php echo round($prom_total_v,2); ?>%</h1>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
          <div class="card" style="border:none; background:none">
            <div class="card-body pb-4 btn-group-vertical">
              <button class="btn" onClick="location.href = 'index.php?seccion=vadd';" style="font-size:16px; color: #fff; background: #fc1100; text-align:left;">
                <i class="fa fa-plus-circle"></i> Agregar Vendedor
              </button>
              <button class="btn" onClick="location.href = 'index.php?seccion=boardmessagesadd';" style="font-size:16px; color: #fff; background: #dbba00; text-align:left; margin:10px 0px 10px 0px">
                <i class="fa fa-plus-circle"></i> Enviar Mensaje
              </button>
            </div>                  
          </div>
        </div>
        <!-- /.col-->
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h1><span style="color:#007f2d;">Resultados Totales Vendedores</span> </h1>
            </div>
            <div class="card-body over" style="overflow-x:auto">
              <table class="table table-responsive-lg table-hover table-outline mb-0 tableScore">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center">
                      <i class="icon-people"></i>
                    </th>
                    <th>Nombre</th>
                    <th>Ner Miss</th>
                    <th>EQ</th>
                    <th>Real (No. Hetolitros)</th>
                    <th>Meta (No. Hectolitros)</th>
                    <th>% Avance vs Meta</th>
                    <th>Tendencia</th>
                    <th>Vol Heineken</th>
                    <th>Productividad</th>
                    <th>Vol NR</th>
                    <th>Efectividad</th>
                    <th>Dentro Rango</th>
                    <th>Fuera Frecuencia</th>
                    <th>Cartera Vencida</th>
                    <th>Ejecucion</th>
                    <th>Prod Enfriadores</th>
                    <th>Enf SC</th>
                    <th><?php echo $prod1_name; ?></th>
                    <th><?php echo $prod2_name; ?></th>
                    <th><?php echo $prod3_name; ?></th>
                    <th><?php echo $prod4_name; ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql1 = "SELECT * FROM `sales-force` WHERE `activo` = '1' AND `asignado_a` = '$identificador_user'";
                  $query1 = $conn->query($sql1);
                  while($row1 = $query1->fetch_assoc()){
                    $v_name=utf8_encode($row1["nombre"])." ".utf8_encode($row1["apellido"]);
                    $v_foto=utf8_encode($row1["foto"]);
                    $v_email=utf8_encode($row1["email"]);

                    $asignado_a = $row1['asignado_a'];
                    $id_vendedor = $row1['id_sales'];

                    $sqlbo = "SELECT * FROM `scores` WHERE `id_vendedor` = '$id_vendedor' and id_board = '$idboard'";
                    $querybo = $conn->query($sqlbo);
                    $rowbo = $querybo->fetch_assoc();

                    if (empty($rowbo['id_scores'])) {
                      $ner_miss_v = 0;
                      $eq_v = 0;
                      $vol_s1_v = 0;
                      $vol_s2_v = 0;
                      $vol_s3_v = 0;
                      $vol_s4_v = 0;
                      $vol_heineken_v = 0;
                      $productividad_v = 0;
                      $vol_nr_v = 0;
                      $efectividad_v = 0;
                      $dentro_rango_v = 0;
                      $fuera_frecuencia_v = 0;
                      $cartera_vencida_v = 0;
                      $ejecucion_v = 0;
                      $prod_enfriadores_v = 0;
                      $enf_sc_v = 0;
                      $prod1_v = 0;
                      $prod2_v = 0;
                      $prod3_v = 0;
                      $prod4_v = 0;
                      $prod1_cuota_v = 0;
                      $prod2_cuota_v = 0;
                      $prod3_cuota_v = 0;
                      $prod4_cuota_v = 0;
                      $suma_v = 0;

                    }else{

                      $ner_miss_v = $rowbo['ner_miss'];
                      $eq_v = $rowbo['eq'];
                      $vol_s1_v = $rowbo['vol_s1'];
                      $vol_s2_v = $rowbo['vol_s2'];
                      $vol_s3_v = $rowbo['vol_s3'];
                      $vol_s4_v = $rowbo['vol_s4'];
                      $vol_heineken_v = $rowbo['vol_heineken'];
                      $productividad_v = $rowbo['productividad'];
                      $vol_nr_v = $rowbo['vol_nr'];
                      $efectividad_v = $rowbo['efectividad'];
                      $dentro_rango_v = $rowbo['dentro_rango'];
                      $fuera_frecuencia_v = $rowbo['fuera_frecuencia'];
                      $cartera_vencida_v = $rowbo['cartera_vencida'];
                      $ejecucion_v = $rowbo['ejecucion'];
                      $prod_enfriadores_v = $rowbo['prod_enfriadores'];
                      $enf_sc_v = $rowbo['enf_sc'];
                      $prod1_v = $rowbo['prod1'];
                      $prod2_v = $rowbo['prod2'];
                      $prod3_v = $rowbo['prod3'];
                      $prod4_v = $rowbo['prod4'];
                      $prod1_cuota_v = $rowbo['prod1_cuota'];
                      $prod2_cuota_v = $rowbo['prod2_cuota'];
                      $prod3_cuota_v = $rowbo['prod3_cuota'];
                      $prod4_cuota_v = $rowbo['prod4_cuota'];

                      $suma_v = ((($eq_v+$vol_s3_v+$vol_heineken_v+$efectividad_v+$dentro_rango_v+$prod_enfriadores_v+$enf_sc_v+$prod1_v+$prod2_v+$prod3_v+$prod4_v)/11)-$fuera_frecuencia_v)-$enf_sc_v;
                  }
                  ?>
                  <tr>
                    <td class="text-center">
                      <div class="avatar">
                        <img class="img-avatar" src="img/vendedores/<?php echo $v_foto; ?>" alt="JV">
                        <span class="avatar-status badge-success"></span>
                      </div>
                    </td>
                    <td>
                      <div><?php echo $v_name ?></div>
                      <div class="small text-muted">
                        Total: <?php echo round($suma_v,2); ?>%</div>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $ner_miss_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $eq_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $vol_s1_v; ?></strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $vol_s2_v; ?></strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $vol_s3_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $vol_s4_v; ?></strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $vol_heineken_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $productividad_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $vol_nr_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $efectividad_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $dentro_rango_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $fuera_frecuencia_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $cartera_vencida_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $ejecucion_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $prod_enfriadores_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $enf_sc_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $prod1_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $prod2_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $prod3_v; ?>%</strong>
                    </td>
                    <td class="text-center">
                      <strong><?php echo $prod4_v; ?>%</strong>
                    </td>
                  </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>



    </div>
  </div>
  <?php
    }
  ?>
</main>