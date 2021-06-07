<?php
  include("header_board_public.php");
?>
        <div class="interior-content">
          <div class="content-podium p-4 overflow-auto">
            <div class="row">
            <?php
            $sql1 = "SELECT * FROM `sales-force` WHERE `activo` = '1' LIMIT 3";
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
            ?>
              <div class="col-sm-12 col-lg-4">
                <div class="card">
                  <div class="card-body pb-4">
                    <div class="text-value text-center"><?php echo utf8_encode($row1['nombre'])." ".utf8_encode($row1['apellido']); ?></div>
                    <div class="text-center"><?php echo $nombreboard; ?></div>
                  </div>
                  <div class="p-3" style="height:auto; text-align:center">
                    <img class='rounded-circle img-fluid' width='300px' height='300px' src='img/vendedores/<?php echo $row1['foto']; ?>' alt=''>
                  </div>
                  <div class="card-footer">
                    <div class="row text-center">
                      <div class="col-sm-12 col-md mb-sm-2 mb-0">
                        <div class="text-muted">Porcentaje Total</div>
                        <strong>0 %</strong>
                        <div class="progress progress-xs mt-2">
                          <div class="progress-bar bg-danger" role="progressbar" style="width: 1%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md mb-sm-2 mb-0">
                        <div class="text-muted">Posición</div>
                        <h3>1 lugar</h3>
                        <div>
                          <i class="fa fa-star"></i>
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
          <div class="pb-2 text-center">
            <button class="btn" style="font-size:80px; color: white;" onClick="location.href = 'board_public.php';"><i class="fa fa-arrow-circle-left"></i></button>
          </div>
        </div>
<?php
  include("footer_board_public.php");
?>