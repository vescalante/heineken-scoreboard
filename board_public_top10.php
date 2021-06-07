<?php
  include("header_board_public.php");
?>
    <!-- Begin page content -->
    <main role="main" class="container-fluid">
      <div class="content main-content">
          <table id="myTable" class="tableClass">
              <thead>
                <tr>
                  <th class="green-weak">#</th>
                  <th class="green-weak">Vendedor</th>
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
                  <th>Ejecución</th>
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
                                  'suma'=>$suma);
                    $props[] = $data;
                  }
                ?>

                    <?php
                    $keys = array_column($props, 'suma');
                    array_multisort($keys, SORT_DESC, $props);

                    $page = ! empty( $_GET['page'] ) ? (int) $_GET['page'] : 1;
                    $i = ! empty( $_GET['i'] ) ? (int) $_GET['i'] : 1;
                    $total = count( $props ); //total items in array    
                    $limit = 10; //per page    
                    $totalPages = ceil( $total/ $limit ); //calculate total pages
                    $page = max($page, 1); //get 1 page when $_GET['page'] <= 0
                    $page = min($page, $totalPages); //get last page when $_GET['page'] > $totalPages
                    $offset = ($page - 1) * $limit;
                    if( $offset < 0 ) $offset = 0;

                    $menuItems = array_slice( $props, $offset, $limit );
                    $array_size = count($props);
                    

                    foreach ($menuItems as $subAray)
                    {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td style='white-space: nowrap; text-align: left'>
                              <a href='board_public_profile.php?id_sales=<?php echo $subAray['id_vendedor']; ?>'>
                                <img class='img-avatar' width='30px' height='30px' src='img/vendedores/<?php echo $subAray['v_foto']; ?>' alt=''>
                                <span class='iconLabel'><?php echo utf8_encode($subAray['v_nombre']); ?></span>
                              </a>
                            </td>
                            <?php
                            if($subAray['ner_miss']>=2){
                                echo "<td class='success-cell'>".round($subAray['ner_miss'],1)."</td>";
                              }else{
                                echo "<td class='danger-cell'>".round($subAray['ner_miss'],1)."</td>";
                              }
                            ?>
                            <td style='white-space: nowrap;'><?php echo round($subAray['eq'],1); ?> %</td>
                            <td><?php echo round($subAray['vol_s1'],1); ?></td>
                            <td><?php echo round($subAray['vol_s2'],1); ?></td>
                            <td><?php echo round($subAray['vol_s3'],1); ?> %</td>
                            <td><?php echo round($subAray['vol_s4'],1); ?></td>
                            <?php 
                            if($subAray['vol_heineken']>=30){
                                echo "<td class='success-cell'>".round($subAray['vol_heineken'],1)."  %</td>";
                              }else{
                                echo "<td class='danger-cell'>".round($subAray['vol_heineken'],1)." %</td>";
                              }
                            if($subAray['productividad']>=0){
                                echo "<td class='success-cell'>".round($subAray['productividad'],1)."</td>";
                              }else{
                                echo "<td class='danger-cell'>".round($subAray['productividad'],1)."</td>";
                              }
                            if($subAray['vol_nr']>=(-20)){
                                echo "<td class='success-cell'>".round($subAray['vol_nr'],1)."</td>";
                              }else{
                                echo "<td class='danger-cell'>".round($subAray['vol_nr'],1)."</td>";
                              }
                            if($subAray['efectividad']>=90){
                                echo "<td class='success-cell'>".round($subAray['efectividad'],1)." %</td>";
                              }else{
                                echo "<td class='danger-cell'>".round($subAray['efectividad'],1)." %</td>";
                              }
                            if($subAray['dentro_rango']>=90){
                                echo "<td class='success-cell'>".round($subAray['dentro_rango'],1)." %</td>";
                              }else{
                                echo "<td class='danger-cell'>".round($subAray['dentro_rango'],1)." %</td>";
                              }
                            if($subAray['fuera_frecuencia']>1){
                                echo "<td class='danger-cell'>".round($subAray['fuera_frecuencia'],1)." %</td>";
                              }else{
                                echo "<td class='success-cell'>".round($subAray['fuera_frecuencia'],1)." %</td>";
                              }
                            if($subAray['cartera_vencida']>=100){
                                echo "<td class='success-cell'>".round($subAray['cartera_vencida'],1)." %</td>";
                              }else{
                                echo "<td class='danger-cell'>".round($subAray['cartera_vencida'],1)." %</td>";
                              }
                            if($subAray['ejecucion']>=90){
                                echo "<td class='success-cell'>".round($subAray['ejecucion'],1)." %</td>";
                              }else{
                                echo "<td class='danger-cell'>".round($subAray['ejecucion'],1)." %</td>";
                              }
                            if($subAray['prod_enfriadores']>=80){
                                echo "<td class='success-cell'>".round($subAray['prod_enfriadores'],1)." %</td>";
                              }else if(($subAray['prod_enfriadores']>=71)&&(($subAray['prod_enfriadores']>=79))){
                                echo "<td class='normal-cell'>".round($subAray['prod_enfriadores'],1)." %</td>";
                              }else{
                                echo "<td class='danger-cell'>".round($subAray['prod_enfriadores'],1)." %</td>";
                              }
                            if($subAray['enf_sc']>3){
                                echo "<td class='danger-cell'>".round($subAray['enf_sc'],1)." %</td>";
                              }else{
                                echo "<td class='success-cell'>".round($subAray['enf_sc'],1)." %</td>";
                              }
                            if($subAray['prod1']>=$subAray['prod1_cuota']){
                                echo "<td class='success-cell'>".round($subAray['prod1'],1)." %</td>";
                              }else{
                                echo "<td class='danger-cell'>".round($subAray['prod1'],1)." %</td>";
                              }
                            if($subAray['prod2']>=$subAray['prod2_cuota']){
                                echo "<td class='success-cell'>".round($subAray['prod2'],1)." %</td>";
                              }else{
                                echo "<td class='danger-cell'>".round($subAray['prod2'],1)." %</td>";
                              }
                            if($subAray['prod3']>=$subAray['prod3_cuota']){
                                echo "<td class='success-cell'>".round($subAray['prod3'],1)." %</td>";
                              }else{
                                echo "<td class='danger-cell'>".round($subAray['prod3'],1)." %</td>";
                              }
                            if($subAray['prod4']>=$subAray['prod4_cuota']){
                                echo "<td class='success-cell'>".round($subAray['prod4'],1)." %</td>";
                              }else{
                                echo "<td class='danger-cell'>".round($subAray['prod4'],1)." %</td>";
                              }
                            ?>
                            <td><?php echo round($subAray['suma'],2); ?> %</td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
              </tbody>
          </table>
      </div>
      <?php 
        $i_minus = $i -1;
        $value = $page * $limit;
        if ($i_minus<$value) {
          $offset_value = $value - $i_minus;
        }else{
          $offset_value = 0;
        }
        $link = 'board_public_top10.php?page=%d&i='.$i;
        $link_ant = 'board_public_top10.php?page=%d&i='.($i-($limit*2)+$offset_value);
        $pagerContainer = '<div class="row"><div class="col-12" style="padding:20px">';   
        if( $totalPages != 0 ) 
        {
          if( $page == 1 ) 
          { 
            $pagerContainer .= ''; 
          } 
          else 
          { 
            $pagerContainer .= sprintf('<a class="btn btn-primary" style="margin-right:5px" href="' . $link_ant . '"> &#171; Anterior</a>', $page - 1); 
          }
          $pagerContainer .= ' <span> página <strong>' . $page . '</strong> de ' . $totalPages . '</span>'; 
          if( $page == $totalPages ) 
          { 
            $pagerContainer .= ''; 
          }
          else 
          { 
            $pagerContainer .= sprintf('<a class="btn btn-primary" style="margin-left:5px" href="' . $link . '"> Siguiente &#187; </a>', $page + 1); 
          }           
        }                   
        $pagerContainer .= '</div></div>';

        echo $pagerContainer;
       ?>
    </main>
<?php
  include("footer_board_public.php");
?>