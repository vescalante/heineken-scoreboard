<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item">
      Productos
    </li>
    <li class="breadcrumb-item active">Lista</li>
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <!-- /.col-->
        <div class="col-lg-4 col-md-8 pb-4 btn-group">
          <button class="btn" onClick="location.href = 'index.php?seccion=prodadd';" style="font-size:14px; color: #fff; background: #007f2d; text-align:left; margin-right:5px; border-radius:0px">
            <i class="fa fa-plus-circle"></i> AGREGAR PRODUCTO
          </button>
          <button class="btn" onClick="location.href = 'prod_exp.php';" style="font-size:14px; color: #fff; background: #006122; text-align:left; border-radius:0px">
            <i class="fa fa-download"></i> EXPORTAR PRODUCTOS
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
                <strong>Productos</strong>
                <small>Lista</small>
              <div class="btn-group float-right">
                <button class="btn dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-settings"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="index.php?seccion=prodadd">Agregar</a>
                  <a class="dropdown-item" href="prod_exp.php" target="_blank">Exportar</a>
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
                    <th>Última modificación</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $activo = 1;
                    $sql = "SELECT * FROM `products` WHERE `activo` = '$activo' ";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $date = $row['fecha_mod'];
                      echo "
                        <tr>
                          <td>
                            <div class='btn-group' role='group' aria-label='Button group'>
                              <a href='index.php?seccion=prodedit&id=".$row['id_product']."' class='btn btn-primary'><i class='fa fa-edit'></i></a>
                              <a href='?seccion=proddelete&id=".$row['id_product']."' class='btn btn-block btn-danger'><i class='fa fa-trash'></i> </a>
                            </div>
                          </td>
                          <td>
                            <div class='avatar'>
                              <img class='img-avatar' width='60px' height='60px' src='img/productos/".$row['foto']."' alt='".$row['nombre']."'>
                            </div>
                          </td>
                          <td>".utf8_encode($row['nombre'])."</td>
                          <td>".date("d-m-Y H:i", strtotime($date))."</td>
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
