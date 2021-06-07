<?php
  include("header_board_public.php");
?>
    <!-- Begin page content -->
    <main role="main" class="container-fluid">
      <div class="content main-content">
        <div class="row" style="padding: 20px; background: green">
            <?php
            $id_profile = isset($_GET["id_manager"]) ? $_GET["id_manager"] : "";
            
            //OBTENER LISTA DATOS DEL JEFE DE VENTAS

            $sql1 = "SELECT * FROM `sales-manager` WHERE `identificador` = '$id_profile'";
            $query1 = $conn->query($sql1);
            while($row1 = $query1->fetch_assoc()){

              $identificador_jv = $row1['identificador'];
              $jv_name=utf8_encode($row1["nombre"]);
              $jv_lastname=utf8_encode($row1["apellido"]);
              $jv_foto=utf8_encode($row1["foto"]);
              $jv_email=utf8_encode($row1["email"]);

              //OBTENER LISTA DATOS DE LOS VENDEDORES ASIGNADOS
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

            ?>
              <div class="col-sm-3">
                <div class="card">
                  <div class="p-3" style="height:auto; text-align:center">
                    <img class='rounded-circle img-fluid' width='300px' height='300px' src='img/jefe_ventas/<?php echo $jv_foto; ?>' alt=''>
                  </div>
                  <div class="card-body pb-4">
                    <div class="text-value text-center">
                      <h4><?php echo $jv_name." ".$jv_lastname; ?></h4>
                    </div>
                    <div class="text-center p-3" style="background:#f1f1f1">
                      Puesto: <?php echo $row1['puesto']; ?> <br>
                      Email: <?php echo $jv_email; ?> <br>
                      Socio: <?php echo $row1['socio']; ?> <br>
                      Zona: <?php echo $row1['zona']; ?>
                    </div>
                  </div>
                  <div class="text-center p-3">
                    <button class="btn" style="font-size:80px; color: green;" onClick="location.href = 'board_public.php';"><i class="fa fa-arrow-circle-left"></i></button>
                  </div>
                </div>
              </div>

              <div class="col-sm-9">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Near Miss</strong>
                            </div>
                            <?php 
                            if($value_ner_miss>=2){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $value_ner_miss; ?></h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>EQ</strong>
                            </div>
                            <div class="card-body text-center">
                              <h1><?php echo $value_eq; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Real (No. Hetolitros)</strong>
                            </div>
                            <div class="card-body text-center">
                              <h1><?php echo $value_vol_s1; ?></h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Meta (No. Hectolitros)</strong>
                            </div>
                            <div class="card-body text-center">
                              <h1><?php echo $value_vol_s2; ?></h1>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>% Avance vs Meta</strong>
                            </div>
                            <div class="card-body text-center">
                              <h1><?php echo $value_vol_s3; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Tendencia</strong>
                            </div>
                            <div class="card-body text-center">
                              <h1><?php echo $value_vol_s4; ?></h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Volumen Heineken</strong>
                            </div>
                            <?php 
                            if($value_vol_heineken>=30){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $value_vol_heineken; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Productividad</strong>
                            </div>
                            <?php 
                            if($value_productividad>=0){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $value_productividad; ?></h1>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Volumen NR</strong>
                            </div>
                            <?php 
                             if($value_vol_nr>=(-20)){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $value_vol_nr; ?></h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Efectividad</strong>
                            </div>
                            <?php 
                             if($value_efectividad>=90){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $value_efectividad; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Dentro Rango</strong>
                            </div>
                            <?php 
                              if($value_dentro_rango>=90){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $value_dentro_rango; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Fuera frecuencia</strong>
                            </div>
                            <?php 
                              if($value_fuera_frecuencia>1){
                                echo "<div class='card-body text-center danger-cell'>";
                              }else{
                                echo "<div class='card-body text-center success-cell'>";
                              }
                             ?>
                              <h1><?php echo $value_fuera_frecuencia; ?>%</h1>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Cartera vencida</strong>
                            </div>
                            <?php 
                              if($value_cartera_vencida>=100){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $value_cartera_vencida; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Ejecución</strong>
                            </div>
                            <?php 
                              if($value_ejecucion>=90){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $value_ejecucion; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Prod. Enfriadores</strong>
                            </div>
                            <?php 
                              if($value_prod_enfriadores>=80){
                                echo "<div class='card-body text-center success-cell'>";
                              }else if(($value_prod_enfriadores>=71)&&(($value_prod_enfriadores>=79))){
                                echo "<div class='card-body text-center normal-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $value_prod_enfriadores; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Enf SC</strong>
                            </div>
                            <?php 
                              if($value_enf_sc>3){
                                echo "<div class='card-body text-center danger-cell'>";
                              }else{
                                echo "<div class='card-body text-center success-cell'>";
                              }
                             ?>
                              <h1><?php echo $value_enf_sc; ?>%</h1>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong><?php echo $prod1_name; ?></strong>
                            </div>
                            <?php 
                              if($value_prod1>=$value_prod1_cuota){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $value_prod1; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong><?php echo $prod2_name; ?></strong>
                            </div>
                            <?php 
                              if($value_prod2>=$value_prod2_cuota){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $value_prod2; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong><?php echo $prod3_name; ?></strong>
                            </div>
                            <?php 
                              if($value_prod3>=$value_prod3_cuota){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $value_prod3; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong><?php echo $prod4_name; ?></strong>
                            </div>
                            <?php 
                              if($value_prod4>=$value_prod4_cuota){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $value_prod4; ?>%</h1>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>  
                  </div>
              </div>
            
            <?php
              }
            ?>
            </div>
          </div>
        </main>
<?php
  include("footer_board_public.php");
?>