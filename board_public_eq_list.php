<?php
  include("header_board_public.php");
?>
    <!-- Begin page content -->
    <main role="main" class="container-fluid">
      <div class="content main-content">
        <div class="row" style="background: green; padding: 50px 20px 20px 20px;">
          <div class="col-md-8 col-sm-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> 
                  <strong>CIERRE QUALIFIERS</strong>
                  <small>Tabla</small>
              </div>
              <div class="card-body" style="overflow-x: auto">
                <table class="table table-sm table-outline tableEq table-hover">
                  <thead class="thead-light">
                    <tr>
                      <th>JV</th>
                      <th>0</th>
                      <th>1</th>
                      <th>2</th>
                      <th>3</th>
                      <th>4</th>
                      <th>5</th>
                      <th>6</th>
                      <th>7</th>
                      <th>8</th>
                      <th>9</th>
                      <th>Grand Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql = "SELECT * FROM `cierre_qualifiers` WHERE `id_board` = '$idboard' ORDER BY `id_eq`";
                      $query = $conn->query($sql);
                      while($row = $query->fetch_assoc()){
                        echo "
                          <tr>
                            <td>".$row['jv']."</td>
                            <td>".$row['row0']."</td>
                            <td>".$row['row1']."</td>
                            <td>".$row['row2']."</td>
                            <td>".$row['row3']."</td>
                            <td>".$row['row4']."</td>
                            <td>".$row['row5']."</td>
                            <td>".$row['row6']."</td>
                            <td>".$row['row7']."</td>
                            <td>".$row['row8']."</td>
                            <td>".$row['row9']."</td>
                            <td>".$row['total']."</td>
                          </tr>
                        ";
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.col-->
          <div class="col-md-4 col-sm-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> 
                  <strong>IMAGEN EXTERIOR</strong>
                  <small>Tabla</small>
              </div>
              <div class="card-body" style="overflow-x: auto">
                <table class="table table-sm table-outline tableEq table-hover">
                  <thead class="thead-light">
                    <tr>
                      <th>JV</th>
                      <th>Con Imágen</th>
                      <th>Sin Imágen</th>
                      <th>Grand Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql5 = "SELECT * FROM `imagen_exterior` WHERE `id_board` = '$idboard' ORDER BY `id_eq`";
                      $query5 = $conn->query($sql5);
                      while($row5 = $query5->fetch_assoc()){
                        echo "
                          <tr>
                            <td>".$row5['jv']."</td>
                            <td>".$row5['con_imagen']."</td>
                            <td>".$row5['sin_imagen']."</td>
                            <td>".$row5['total']."</td>
                          </tr>
                        ";
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.col-->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> 
                  <strong>CLIENTES X GEC</strong>
                  <small>Tabla</small>
              </div>
              <div class="card-body" style="overflow-x: auto">
                <table class="table table-sm table-outline tableEq table-hover">
                  <thead class="thead-light">
                    <tr>
                      <th>JV</th>
                      <th>BRONCE</th>
                      <th>ORO</th>
                      <th>PLATA</th>
                      <th>PLATINO</th>
                      <th>TITANIUM</th>
                      <th>Grand Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql2 = "SELECT * FROM `clientes_x_gec` WHERE `id_board` = '$idboard' ORDER BY `id_eq`";
                      $query2 = $conn->query($sql2);
                      while($row2 = $query2->fetch_assoc()){
                        echo "
                          <tr>
                            <td>".$row2['jv']."</td>
                            <td>".$row2['bronce']."</td>
                            <td>".$row2['oro']."</td>
                            <td>".$row2['plata']."</td>
                            <td>".$row2['platino']."</td>
                            <td>".$row2['titanium']."</td>
                            <td>".$row2['total']."</td>
                          </tr>
                        ";
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.col-->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> 
                  <strong>ANALISIS ENFRIADORES</strong>
                  <small>Tabla</small>
              </div>
              <div class="card-body" style="overflow-x: auto">
                <table class="table table-sm table-outline tableEq table-hover">
                  <thead class="thead-light">
                    <tr>
                      <th>JV</th>
                      <th>144</th>
                      <th>190</th>
                      <th>192</th>
                      <th>320</th>
                      <th>376</th>
                      <th>500</th>
                      <th>900</th>
                      <th>1350</th>
                      <th>Grand Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql3 = "SELECT * FROM `analisis_enfriadores` WHERE `id_board` = '$idboard' ORDER BY `id_eq`";
                      $query3 = $conn->query($sql3);
                      while($row3 = $query3->fetch_assoc()){
                        echo "
                          <tr>
                            <td>".$row3['jv']."</td>
                            <td>".$row3['row144']."</td>
                            <td>".$row3['row190']."</td>
                            <td>".$row3['row192']."</td>
                            <td>".$row3['row320']."</td>
                            <td>".$row3['row376']."</td>
                            <td>".$row3['row500']."</td>
                            <td>".$row3['row900']."</td>
                            <td>".$row3['row1350']."</td>
                            <td>".$row3['total']."</td>
                          </tr>
                        ";
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.col-->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> 
                  <strong>FRECUENCIA VS GEC</strong>
                  <small>Tabla</small>
              </div>
              <div class="card-body" style="overflow-x: auto">
                <table class="table table-sm table-outline tableEq table-hover">
                  <thead class="thead-light">
                    <tr>
                      <th>JV</th>  
                      <th>L</th> 
                      <th>M</th> 
                      <th>R</th> 
                      <th>J</th> 
                      <th>V</th> 
                      <th>S</th> 
                      <th>LJ</th> 
                      <th>LJ</th>      
                      <th>LV</th>      
                      <th>MV</th>  
                      <th>RS</th>  
                      <th>JS</th>  
                      <th>RV</th>      
                      <th>LRV</th>     
                      <th>LRJ</th>
                      <th>Grand Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql4 = "SELECT * FROM `frecuencia_vs_gec` WHERE `id_board` = '$idboard' ORDER BY `id_eq`";
                      $query4 = $conn->query($sql4);
                      while($row4 = $query4->fetch_assoc()){
                        echo "
                          <tr>
                            <td>".$row4['jv']."</td>
                            <td>".$row4['L']."</td>
                            <td>".$row4['M']."</td>
                            <td>".$row4['R']."</td>
                            <td>".$row4['J']."</td>
                            <td>".$row4['V']."</td>
                            <td>".$row4['S']."</td>
                            <td>".$row4['LJ']."</td>
                            <td>".$row4['LJ2']."</td>
                            <td>".$row4['LV']."</td>
                            <td>".$row4['MV']."</td>
                            <td>".$row4['RS']."</td> 
                            <td>".$row4['JS']."</td>
                            <td>".$row4['RV']."</td>
                            <td>".$row4['LRV']."</td>
                            <td>".$row4['LRJ']."</td>
                            <td>".$row4['total']."</td>
                          </tr>
                        ";
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
          <!-- /.col-->
        </div>
      </div>
    </main>
<?php
  include("footer_board_public.php");
?>