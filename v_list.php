<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item">
      Vendedores
    </li>
    <li class="breadcrumb-item active">Lista</li>
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <!-- /.col-->
        <div class="col-lg-4 col-md-8 pb-4 btn-group">
          <button class="btn" onClick="location.href = 'index.php?seccion=vadd';" style="font-size:14px; color: #fff; background: #007f2d; text-align:left; margin-right:5px; border-radius:0px">
            <i class="fa fa-plus-circle"></i> AGREGAR VENDEDOR
          </button>
          <button class="btn" onClick="location.href = 'v_exp.php';" style="font-size:14px; color: #fff; background: #006122; text-align:left; border-radius:0px">
            <i class="fa fa-download"></i> EXPORTAR VENDEDOR
          </button>
        </div>
      </div>
      <!-- /.row-->
      <div class="row">
        <!-- /.col-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i> 
                <strong>Vendedores</strong>
                <small>Lista</small>
              <div class="btn-group float-right">
                <button class="btn dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-settings"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="index.php?seccion=vadd">Agregar</a>
                  <a class="dropdown-item" href="v_exp.php" target="_blank">Exportar</a>
                </div>
              </div>
            </div>
            <div class="card-body table-responsive">
              <table id="example1" class="table table-striped">
                <thead>
                  <tr>
                    <th>Menú</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Jefe de ventas</th>
                    <th>Socio</th>
                    <th>Puesto</th>
                    <th>Zona</th>
                    <th>Ruta</th>
                    <th>Antigüedad</th>
                    <th>Ingreso</th>
                    <th>Email</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $activo = 1;
                    if($category=="JVENTAS") {
                      $sql = "SELECT * FROM `sales-force` WHERE `activo` = '$activo' AND `asignado_a` = '$identificador_user' ";
                    }else{
                      $sql = "SELECT * FROM `sales-force` WHERE `activo` = '$activo' ";
                    }
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                          $asignado_a = $row['asignado_a'];

                          $sqljv = "SELECT * FROM `sales-manager` WHERE `identificador` = '$asignado_a'";
                          $queryjv = $conn->query($sqljv);
                          $rowjv = $queryjv->fetch_assoc();
                          $jv_name=utf8_encode($rowjv["nombre"])." ".utf8_encode($rowjv["apellido"]);

                          echo "
                          <tr>
                          <td>
                            <div class='btn-group' role='group' aria-label='Button group'>
                              <a href='index.php?seccion=vedit&id=".$row['id_sales']."' class='btn btn-primary'><i class='fa fa-edit'></i></a>
                              <a href='?seccion=vdelete&id=".$row['id_sales']."' class='btn btn-block btn-danger'><i class='fa fa-trash'></i> </a>
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
                          <td>".utf8_encode($row['socio'])."</td>
                          <td>".utf8_encode($row['puesto'])."</td>
                          <td>".utf8_encode($row['zona'])."</td>
                          <td>".utf8_encode($row['ruta'])."</td>
                          <td>".utf8_encode($row['antiguedad'])."</td>
                          <td>".utf8_encode($row['fecha_ingreso'])."</td>
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
