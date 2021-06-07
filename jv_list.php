<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item">
      Jefes de Ventas
    </li>
    <li class="breadcrumb-item active">Lista</li>
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <!-- /.col-->
        <div class="col-lg-4 col-md-8 pb-4 btn-group">
          <button class="btn" onClick="location.href = 'index.php?seccion=jvadd';" style="font-size:14px; color: #fff; background: #007f2d; text-align:left; margin-right:5px; border-radius:0px">
            <i class="fa fa-plus-circle"></i> AGREGAR JEFES DE VENTAS
          </button>
          <button class="btn" onClick="location.href = 'jv_exp.php';" style="font-size:14px; color: #fff; background: #006122; text-align:left; border-radius:0px">
            <i class="fa fa-download"></i> EXPORTAR JEFES DE VENTAS
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
                <strong>Jefes de Ventas</strong>
                <small>Lista</small>
              <div class="btn-group float-right">
                <button class="btn dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-settings"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="index.php?seccion=jvadd">Agregar</a>
                  <a class="dropdown-item" href="jv_exp.php" target="_blank">Exportar</a>
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
                    <th>Socio</th>
                    <th>Puesto</th>
                    <th>Zona</th>
                    <th>Antigüedad</th>
                    <th>Ingreso</th>
                    <th>Email</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $activo = 1;
                    $sql = "SELECT * FROM `sales-manager` WHERE `activo` = '$activo' ";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                        <tr>
                        <td>
                            <div class='btn-group' role='group' aria-label='Button group'>
                              <a href='index.php?seccion=jvedit&id=".$row['id_manager']."' class='btn btn-primary'><i class='fa fa-edit'></i></a>
                              <a href='index.php?seccion=jvdelete&id=".$row['id_manager']."' class='btn btn-block btn-danger'><i class='fa fa-trash'></i> </a>
                            </div>
                          </td>
                          <td>
                            <div class='avatar'>
                              <img class='img-avatar' width='30px' height='30px' src='img/jefe_ventas/".$row['foto']."' alt='".$row['email']."'>
                            </div>
                          </td>
                          <td>".utf8_encode($row['nombre'])."</td>
                          <td>".utf8_encode($row['apellido'])."</td>
                          <td>".utf8_encode($row['socio'])."</td>
                          <td>".utf8_encode($row['puesto'])."</td>
                          <td>".utf8_encode($row['zona'])."</td>
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
