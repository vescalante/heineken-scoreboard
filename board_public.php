<?php 
  include('header_board_public.php');
?>
    <!-- Begin page content -->
    <main role="main" class="container-fluid">
      <div class="content main-content">
          <!--<table id="myTable" class="tableClass tablesorter">-->
          <table id="myTable" class="tableClass">
            <thead>
              <tr>
                <th class="green-weak">Ruta</th>
                <th class="green-weak">Jefe Ventas</th>
                <th class="green-weak">Vendedor</th>
                <th class="green-strong">Ner Miss</th>
                <th class="green-strong">EQ</th>
                <th class="green-strong">Real (No. Hetolitros)</th>
                <th class="green-strong">Meta (No. Hectolitros)</th>
                <th class="green-strong">% Avance vs Meta</th>
                <th class="green-strong">Tendencia</th>
                <th class="green-strong">Vol Heineken</th>
                <th class="green-strong">Productividad</th>
                <th class="green-strong">Vol NR</th>
                <th class="green-strong">Efectividad</th>
                <th class="green-strong">Dentro Rango</th>
                <th class="green-strong">Fuera Frecuencia</th>
                <th class="green-strong">Cartera Vencida</th>
                <th class="green-strong">Ejecución</th>
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
                  ";
                  if($ner_miss>=2){
                      echo "<td class='success-cell'>".round($ner_miss,1)."</td>";
                    }else{
                      echo "<td class='danger-cell'>".round($ner_miss,1)."</td>";
                    }
                  echo "
                      <td style='white-space: nowrap;'>".round($eq,1)." %</td>
                      <td>".round($vol_s1,1)."</td>
                      <td>".round($vol_s2,1)."</td>
                      <td>".round($vol_s3,1)." %</td>
                      <td>".round($vol_s4,1)."</td>
                  ";
                  if($vol_heineken>=30){
                      echo "<td class='success-cell'>".round($vol_heineken,1)."  %</td>";
                    }else{
                      echo "<td class='danger-cell'>".round($vol_heineken,1)." %</td>";
                    }
                  if($productividad>=0){
                      echo "<td class='success-cell'>".round($productividad,1)."</td>";
                    }else{
                      echo "<td class='danger-cell'>".round($productividad,1)."</td>";
                    }
                  if($vol_nr>=(-20)){
                      echo "<td class='success-cell'>".round($vol_nr,1)."</td>";
                    }else{
                      echo "<td class='danger-cell'>".round($vol_nr,1)."</td>";
                    }
                  if($efectividad>=90){
                      echo "<td class='success-cell'>".round($efectividad,1)." %</td>";
                    }else{
                      echo "<td class='danger-cell'>".round($efectividad,1)." %</td>";
                    }
                  if($dentro_rango>=90){
                      echo "<td class='success-cell'>".round($dentro_rango,1)." %</td>";
                    }else{
                      echo "<td class='danger-cell'>".round($dentro_rango,1)." %</td>";
                    }
                  if($fuera_frecuencia>1){
                      echo "<td class='danger-cell'>".round($fuera_frecuencia,1)." %</td>";
                    }else{
                      echo "<td class='success-cell'>".round($fuera_frecuencia,1)." %</td>";
                    }
                  if($cartera_vencida>=100){
                      echo "<td class='success-cell'>".round($cartera_vencida,1)." %</td>";
                    }else{
                      echo "<td class='danger-cell'>".round($cartera_vencida,1)." %</td>";
                    }
                  if($ejecucion>=90){
                      echo "<td class='success-cell'>".round($ejecucion,1)." %</td>";
                    }else{
                      echo "<td class='danger-cell'>".round($ejecucion,1)." %</td>";
                    }
                  if($prod_enfriadores>=80){
                      echo "<td class='success-cell'>".round($prod_enfriadores,1)." %</td>";
                    }else if(($prod_enfriadores>=71)&&(($prod_enfriadores>=79))){
                      echo "<td class='normal-cell'>".round($prod_enfriadores,1)." %</td>";
                    }else{
                      echo "<td class='danger-cell'>".round($prod_enfriadores,1)." %</td>";
                    }
                  if($enf_sc>3){
                      echo "<td class='danger-cell'>".round($enf_sc,1)." %</td>";
                    }else{
                      echo "<td class='success-cell'>".round($enf_sc,1)." %</td>";
                    }
                  if($prod1>=$prod1_cuota){
                      echo "<td class='success-cell'>".round($prod1,1)." %</td>";
                    }else{
                      echo "<td class='danger-cell'>".round($prod1,1)." %</td>";
                    }
                  if($prod2>=$prod2_cuota){
                      echo "<td class='success-cell'>".round($prod2,1)." %</td>";
                    }else{
                      echo "<td class='danger-cell'>".round($prod2,1)." %</td>";
                    }
                  if($prod3>=$prod3_cuota){
                      echo "<td class='success-cell'>".round($prod3,1)." %</td>";
                    }else{
                      echo "<td class='danger-cell'>".round($prod3,1)." %</td>";
                    }
                  if($prod4>=$prod4_cuota){
                      echo "<td class='success-cell'>".round($prod4,1)." %</td>";
                    }else{
                      echo "<td class='danger-cell'>".round($prod4,1)." %</td>";
                    }
                }
              ?>
            </tbody>
          </table>
      </div>
    </main>
<?php 
  include("footer_board_public.php");
?>
