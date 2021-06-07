<?php
  include("header_board_public.php");
?>
    <!-- Begin page content -->
    <main role="main" class="container-fluid">
      <div class="content main-content">
        <div class="row" style="padding: 20px; background: green">
            <?php
            $id_profile = isset($_GET["id_sales"]) ? $_GET["id_sales"] : "";
            $sql1 = "SELECT * FROM `sales-force` WHERE `id_sales` = '$id_profile'";
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
            ?>
              <div class="col-sm-3">
                <div class="card">
                  <div class="p-3" style="height:auto; text-align:center">
                    <img class='rounded-circle img-fluid' width='300px' height='300px' src='img/vendedores/<?php echo $row1['foto']; ?>' alt=''>
                  </div>
                  <div class="card-body pb-4">
                    <div class="text-value text-center">
                      <h4><?php echo utf8_encode($row1['nombre'])." ".utf8_encode($row1['apellido']); ?></h4>
                    </div>
                    <div class="text-center"><?php echo $row1['ruta']; ?></div>
                    <div class="text-center p-3" style="background:#f1f1f1">
                      Puesto: <?php echo $row1['puesto']; ?> <br>
                      Email: <?php echo $row1['email']; ?> <br>
                      Jefe Ventas: <?php echo $jv_name; ?> <br>
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
                            if($ner_miss>=2){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $ner_miss; ?></h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>EQ</strong>
                            </div>
                            <div class="card-body text-center">
                              <h1><?php echo $eq; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Real (No. Hetolitros)</strong>
                            </div>
                            <div class="card-body text-center">
                              <h1><?php echo $vol_s1; ?></h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Meta (No. Hectolitros)</strong>
                            </div>
                            <div class="card-body text-center">
                              <h1><?php echo $vol_s2; ?></h1>
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
                              <h1><?php echo $vol_s3; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Tendencia</strong>
                            </div>
                            <div class="card-body text-center">
                              <h1><?php echo $vol_s4; ?></h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Volumen Heineken</strong>
                            </div>
                            <?php 
                            if($vol_heineken>=30){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $vol_heineken; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Productividad</strong>
                            </div>
                            <?php 
                            if($productividad>=0){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $productividad; ?></h1>
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
                             if($vol_nr>=(-20)){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $vol_nr; ?></h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Efectividad</strong>
                            </div>
                            <?php 
                             if($efectividad>=90){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $efectividad; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Dentro Rango</strong>
                            </div>
                            <?php 
                              if($dentro_rango>=90){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $dentro_rango; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Fuera frecuencia</strong>
                            </div>
                            <?php 
                              if($fuera_frecuencia>1){
                                echo "<div class='card-body text-center danger-cell'>";
                              }else{
                                echo "<div class='card-body text-center success-cell'>";
                              }
                             ?>
                              <h1><?php echo $fuera_frecuencia; ?>%</h1>
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
                              if($cartera_vencida>=100){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $cartera_vencida; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Ejecución</strong>
                            </div>
                            <?php 
                              if($ejecucion>=90){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $ejecucion; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Prod. Enfriadores</strong>
                            </div>
                            <?php 
                              if($prod_enfriadores>=80){
                                echo "<div class='card-body text-center success-cell'>";
                              }else if(($prod_enfriadores>=71)&&(($prod_enfriadores>=79))){
                                echo "<div class='card-body text-center normal-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $prod_enfriadores; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Enf SC</strong>
                            </div>
                            <?php 
                              if($enf_sc>3){
                                echo "<div class='card-body text-center danger-cell'>";
                              }else{
                                echo "<div class='card-body text-center success-cell'>";
                              }
                             ?>
                              <h1><?php echo $enf_sc; ?>%</h1>
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
                              if($prod1>=$prod1_cuota){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $prod1; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong><?php echo $prod2_name; ?></strong>
                            </div>
                            <?php 
                              if($prod2>=$prod2_cuota){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $prod2; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong><?php echo $prod3_name; ?></strong>
                            </div>
                            <?php 
                              if($prod3>=$prod3_cuota){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $prod3; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong><?php echo $prod4_name; ?></strong>
                            </div>
                            <?php 
                              if($prod4>=$prod4_cuota){
                                echo "<div class='card-body text-center success-cell'>";
                              }else{
                                echo "<div class='card-body text-center danger-cell'>";
                              }
                             ?>
                              <h1><?php echo $prod4; ?>%</h1>
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