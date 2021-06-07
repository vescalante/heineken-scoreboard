<?php
  include("header_board_public.php");
?>
        <div class="interior-content">
          <div class="content p-4 overflow-auto">
            <div class="row">
            <?php
            $id_profile = isset($_GET["id_manager"]) ? $_GET["id_manager"] : "";
            $sql1 = "SELECT * FROM `sales-manager` WHERE `identificador` = '$id_profile'";
            $query1 = $conn->query($sql1);
            while($row1 = $query1->fetch_assoc()){

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

            ?>
              <div class="col-sm-3">
                <div class="card">
                  <div class="p-3" style="height:auto; text-align:center">
                    <img class='rounded-circle img-fluid' width='300px' height='300px' src='img/jefe_ventas/<?php echo $row1['foto']; ?>' alt=''>
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
                            <div class="card-body text-center">
                              <h1><?php echo $ner_miss; ?>%</h1>
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
                              <strong>Volumen S1</strong>
                            </div>
                            <div class="card-body text-center">
                              <h1><?php echo $vol_s1; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Volumen S2</strong>
                            </div>
                            <div class="card-body text-center">
                              <h1><?php echo $vol_s2; ?>%</h1>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Volumen S3</strong>
                            </div>
                            <div class="card-body text-center">
                              <h1><?php echo $vol_s3; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Volumen S4</strong>
                            </div>
                            <div class="card-body text-center">
                              <h1><?php echo $vol_s4; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Volumen Heineken</strong>
                            </div>
                            <div class="card-body text-center">
                              <h1><?php echo $vol_heineken; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Productividad</strong>
                            </div>
                            <div class="card-body text-center">
                              <h1><?php echo $productividad; ?>%</h1>
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
                            <div class="card-body text-center">
                              <h1><?php echo $vol_nr; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Efectividad</strong>
                            </div>
                            <div class="card-body text-center">
                              <h1><?php echo $efectividad; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Dentro Rango</strong>
                            </div>
                            <div class="card-body text-center">
                              <h1><?php echo $dentro_rango; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Fuera frecuencia</strong>
                            </div>
                            <div class="card-body text-center">
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
                            <div class="card-body text-center">
                              <h1><?php echo $cartera_vencida; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Ejecución</strong>
                            </div>
                            <div class="card-body text-center">
                              <h1><?php echo $ejecucion; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Prod. Enfriadores</strong>
                            </div>
                            <div class="card-body text-center">
                              <h1><?php echo $prod_enfriadores; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong>Enf SC</strong>
                            </div>
                            <div class="card-body text-center">
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
                            <div class="card-body text-center">
                              <h1><?php echo $prod1; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong><?php echo $prod2_name; ?></strong>
                            </div>
                            <div class="card-body text-center">
                              <h1><?php echo $prod2; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong><?php echo $prod3_name; ?></strong>
                            </div>
                            <div class="card-body text-center">
                              <h1><?php echo $prod3; ?>%</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="card-header text-center">
                              <strong><?php echo $prod4_name; ?></strong>
                            </div>
                            <div class="card-body text-center">
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
        </div>
<?php
  include("footer_board_public.php");
?>