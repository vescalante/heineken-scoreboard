<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
    <li class="breadcrumb-item">
      Papelera
    </li>
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <!-- /.row-->
      <div class="row">
        <!-- /.col-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i> 
                <strong>Vendedores Inactivos</strong>
                <div class="btn-group float-right">
                  <button class="btn dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-settings"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="index.php?seccion=vlist">Lista</a>
                    <a class="dropdown-item" href="index.php?seccion=vadd">Agregar</a>
                    <a class="dropdown-item" href="v_exp.php" target="_blank">Exportar</a>
                  </div>
                </div>
            </div>
            <div class="card-body table-responsive">
              <table id="example1" class="table table-striped">
                <thead>
                  <tr>
                    <th>Activo</th>
                    <th>Menú</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Jefe de ventas</th>
                    <th>Email</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $activo = 0;
                    if($category=="JVENTAS") {
                      $sql = "SELECT * FROM `sales-force` WHERE `activo` = '$activo' AND `asignado_a` = '$identificador_user' ORDER BY `fecha_ingreso` DESC";
                    }else{
                      $sql = "SELECT * FROM `sales-force` WHERE `activo` = '$activo' ORDER BY `fecha_ingreso` DESC";
                    }

                    $query = $conn->query($sql);
                    $count = 1;
                    while($row = $query->fetch_assoc()){
                      $asignado_a = $row['asignado_a'];

                      $sqljv = "SELECT * FROM `sales-manager` WHERE `identificador` = '$asignado_a'";
                      $queryjv = $conn->query($sqljv);
                      $rowjv = $queryjv->fetch_assoc();
                      $jv_name=utf8_encode($rowjv["nombre"])." ".utf8_encode($rowjv["apellido"]);

                      if ($row['activo'] ==0){
                        $activo = "<span class='badge badge-danger'>Inactivo</span>";
                      }else{
                        $activo = "<span class='badge badge-success'>Activo</span>";
                      }

                      echo "
                        <tr>
                          <td>".$activo."</td>
                          <td>
                            <div class='btn-group' role='group' aria-label='Button group'>
                              <button id='tag".$count++."' value=".$row['id_sales']." class='btn btn-primary'><i class='fa fa-undo'></i></button>
                            </div>
                          </td>
                          <td>
                            <div class='avatar'>
                              <img class='img-avatar' width='30px' height='30px' src='img/vendedores/".$row['foto']."' alt='".$row['email']."'>
                            </div>
                          </td>
                          <td>".utf8_encode($row['nombre'])."</td>
                          <td>".utf8_encode($row['apellido'])."</td>
                          <td>".$jv_name."</td>
                          <td>".utf8_encode($row['email'])."</td>
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
      <!-- /.row-->
    </div>
  </div>
</main>
