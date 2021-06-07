<?php
  include("header_board_public.php");
?>
        <div class="interior-content">
          <div class="row pb-2 topic-header">
            <h1>POSICIONES TOP 10</h1>
          </div>
          <div class="content-top10 table-responsive">

            <table class="tableClassTop10">
              <thead>
                <tr>
                  <th class="green-weak">#</th>
                  <th class="green-weak">Vendedor</th>
                  <th>Ner Miss</th>
                  <th>EQ</th>
                  <th>Vol S1</th>
                  <th>Vol S2</th>
                  <th>Vol S3</th>
                  <th>Vol S4</th>
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
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>

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
                    $suma = ($eq+$vol_s1+$vol_s2+$vol_s3+$vol_s4+$vol_heineken+$efectividad+$dentro_rango+$cartera_vencida+$ejecucion+$prod_enfriadores+$enf_sc+$prod1+$prod2+$prod3+$prod4)/16;
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
                                  'suma'=>$suma);
                    $props[] = $data;
                  }
                ?>

                    <?php
                    $keys = array_column($props, 'suma');
                    array_multisort($keys, SORT_ASC, $props);

                    $i = 1;
                    foreach ($props as $subAray)
                    {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td class='image-wrap'><a href='board_public_profile.php?id_sales=<?php echo $subAray['id_vendedor']; ?>'><img class='img-avatar' width='30px' height='30px' src='img/vendedores/<?php echo $subAray['v_foto']; ?>' alt=''><?php echo utf8_encode($subAray['v_nombre']); ?></a></td>
                            <td><?php echo $subAray['ner_miss']; ?></td>
                            <td><?php echo $subAray['eq']; ?></td>
                            <td><?php echo $subAray['vol_s1']; ?></td>
                            <td><?php echo $subAray['vol_s2']; ?></td>
                            <td><?php echo $subAray['vol_s3']; ?></td>
                            <td><?php echo $subAray['vol_s4']; ?></td>
                            <?php 
                            if($subAray['vol_heineken']>=30){
                                echo "<td class='success-cell'>".$subAray['vol_heineken']."  %</td>";
                              }else{
                                echo "<td class='danger-cell'>".$subAray['vol_heineken']." %</td>";
                              }
                            if($subAray['productividad']>=0){
                                echo "<td class='success-cell'>".$subAray['productividad']."</td>";
                              }else{
                                echo "<td class='danger-cell'>".$subAray['productividad']."</td>";
                              }
                            if($subAray['vol_nr']>=0){
                                echo "<td class='danger-cell'>".$subAray['vol_nr']."</td>";
                              }else{
                                echo "<td class='success-cell'>".$subAray['vol_nr']."</td>";
                              }
                            if($subAray['efectividad']>=90){
                                echo "<td class='success-cell'>".$subAray['efectividad']." %</td>";
                              }else{
                                echo "<td class='danger-cell'>".$subAray['efectividad']." %</td>";
                              }
                            if($subAray['dentro_rango']>=90){
                                echo "<td class='success-cell'>".$subAray['dentro_rango']." %</td>";
                              }else{
                                echo "<td class='danger-cell'>".$subAray['dentro_rango']." %</td>";
                              }
                            if($subAray['fuera_frecuencia']>=1){
                                echo "<td class='danger-cell'>".$subAray['fuera_frecuencia']." %</td>";
                              }else{
                                echo "<td class='success-cell'>".$subAray['fuera_frecuencia']." %</td>";
                              }
                            if($subAray['cartera_vencida']>=100){
                                echo "<td class='success-cell'>".$subAray['cartera_vencida']." %</td>";
                              }else{
                                echo "<td class='danger-cell'>".$subAray['cartera_vencida']." %</td>";
                              }
                            if($subAray['ejecucion']>=90){
                                echo "<td class='success-cell'>".$subAray['ejecucion']." %</td>";
                              }else{
                                echo "<td class='danger-cell'>".$subAray['ejecucion']." %</td>";
                              }
                            if($subAray['prod_enfriadores']>=80){
                                echo "<td class='success-cell'>".$subAray['prod_enfriadores']." %</td>";
                              }else if(($subAray['prod_enfriadores']>=71)&&(($subAray['prod_enfriadores']>=79))){
                                echo "<td class='normal-cell'>".$subAray['prod_enfriadores']." %</td>";
                              }else{
                                echo "<td class='danger-cell'>".$subAray['prod_enfriadores']." %</td>";
                              }
                            if($subAray['enf_sc']<=0){
                                echo "<td class='normal-cell'>".$subAray['enf_sc']." %</td>";
                              }else if(($subAray['enf_sc']>=1)&&(($subAray['enf_sc']>=5))){
                                echo "<td class='success-cell'>".$subAray['enf_sc']." %</td>";
                              }else{
                                echo "<td class='danger-cell'>".$subAray['enf_sc']." %</td>";
                              }
                            if($subAray['prod1']>=$subAray['prod1_cuota']){
                                echo "<td class='success-cell'>".$subAray['prod1']." %</td>";
                              }else{
                                echo "<td class='danger-cell'>".$subAray['prod1']." %</td>";
                              }
                            if($subAray['prod2']>=$subAray['prod2_cuota']){
                                echo "<td class='success-cell'>".$subAray['prod2']." %</td>";
                              }else{
                                echo "<td class='danger-cell'>".$subAray['prod2']." %</td>";
                              }
                            if($subAray['prod3']>=$subAray['prod3_cuota']){
                                echo "<td class='success-cell'>".$subAray['prod3']." %</td>";
                              }else{
                                echo "<td class='danger-cell'>".$subAray['prod3']." %</td>";
                              }
                            if($subAray['prod4']>=$subAray['prod4_cuota']){
                                echo "<td class='success-cell'>".$subAray['prod4']." %</td>";
                              }else{
                                echo "<td class='danger-cell'>".$subAray['prod4']." %</td>";
                              }
                            ?>
                            <td><?php echo $subAray['suma']; ?></td>
                        </tr>
                        <?php
                        if (++$i == 11) break;
                    }
                    ?>

                
              </tbody>
            </table>
          
          </div>
          <div class="row pb-2" style="background:green; margin:0px !important">
            <div class="col-12 p-2 btn-group">
              <button class="btn btn-pagination" onClick="history.go(-1); return false;">
                <i class="fa fa-chevron-left"></i>REGRESAR
              </button>
              <button class="btn btn-pagination">
                SIGUIENTE<i class="fa fa-chevron-right"></i>
              </button>
            </div>
          </div>
        </div>
<?php
  include("footer_board_public.php");
?>