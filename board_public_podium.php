<?php
  include("header_board_public.php");
?>
    <!-- Begin page content -->
    <main role="main" class="container-fluid">
      <div class="content main-content">
        <div class="row" style="background: green; padding: 50px 20px 120px 20px;">
            <div class="col-lg-12">
              <button class="btn" style="font-size:40px; color: white;" onClick="location.href = 'board_public.php';"><i class="fa fa-arrow-circle-left"></i> Regresar</button>
            </div>
            <?php
              $sql1 = "SELECT * FROM `sales-force` WHERE `activo` = '1'";
              $query1 = $conn->query($sql1);
              $i = 1;
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
                $suma = ((($eq+$vol_s3+$vol_heineken+$efectividad+$dentro_rango+$prod_enfriadores+$enf_sc+$prod1+$prod2+$prod3+$prod4)/11)-$fuera_frecuencia)-$enf_sc;
                $data = array('ner_miss' => $ner_miss,
                              'eq' => $eq,
                              'vol_s1' => $vol_s1,
                              'vol_s2' => $vol_s2,
                              'vol_s3' => $vol_s3,
                              'vol_s4' => $vol_s4,
                              'vol_heineken' => $vol_heineken,
                              'productividad' => $productividad,
                              'vol_nr' => $vol_nr,
                              'efectividad' => $efectividad,
                              'dentro_rango' => $dentro_rango,
                              'fuera_frecuencia' => $fuera_frecuencia,
                              'cartera_vencida' => $cartera_vencida,
                              'ejecucion' => $ejecucion,
                              'prod_enfriadores' => $prod_enfriadores,
                              'enf_sc' => $enf_sc,
                              'prod1' => $prod1,
                              'prod2' => $prod2,
                              'prod3' => $prod3,
                              'prod4' => $prod4,
                              'prod1_cuota' => $prod1_cuota,
                              'prod2_cuota' => $prod2_cuota,
                              'prod3_cuota' => $prod3_cuota,
                              'prod4_cuota' => $prod4_cuota,
                              'asignado_a' => $asignado_a,
                              'jv_foto'=>$jv_foto,
                              'jv_name'=>$jv_name,
                              'id_vendedor'=>$id_vendedor,
                              'v_foto'=>$row1['foto'],
                              'v_email'=>$row1['email'],
                              'v_nombre'=>$row1['nombre'],
                              'v_apellido'=>$row1['apellido'],
                              'suma'=>$suma);
                $props[] = $data;
              }

                $keys = array_column($props, 'suma');
                array_multisort($keys, SORT_DESC, $props);

                $i = 1; 
                $limit = 3;     
                $offset = 0;

                $menuItems = array_slice( $props, $offset, $limit );
                foreach ($menuItems as $subAray)
                {

            ?>
              <div class="col-sm-12 col-lg-4">
                <div class="card">
                  <div class="card-body pb-4">
                    <div class="text-value text-center"><?php echo utf8_encode($subAray['v_nombre'])." ".utf8_encode($subAray['v_apellido']); ?></div>
                    <div class="text-center"><?php echo $nombreboard; ?></div>
                  </div>
                  <div class="p-3" style="height:auto; text-align:center">
                    <img class='rounded-circle img-fluid' width='300px' height='300px' src='img/vendedores/<?php echo $subAray['v_foto']; ?>' alt=''>
                  </div>
                  <div class="card-footer">
                    <div class="row text-center">
                      <div class="col-sm-12 col-md mb-sm-2 mb-0">
                        <div class="text-muted">Porcentaje Total</div>
                        <h3><?php echo round($subAray['suma'],2); ?> %</h3>
                        <div class="progress progress-xs mt-2">
                          <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo round($subAray['suma'],0); ?>%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md mb-sm-2 mb-0">
                        <div class="text-muted">Posición</div>
                        <h3><?php echo $i; ?> lugar</h3>
                        <div>
                          <i class="fa fa-trophy"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            
            <?php
              $i++;
              }
            ?>
            </div>
          </div>
        </main>
<?php
  include("footer_board_public.php");
?>