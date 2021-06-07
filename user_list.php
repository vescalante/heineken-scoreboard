<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item">
      Usuarios
    </li>
    <li class="breadcrumb-item active">Lista</li>
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <!-- /.col-->
        <div class="col-lg-4 col-md-8 pb-4 btn-group">
          <button class="btn" onClick="location.href = 'index.php?seccion=useradd';" style="font-size:14px; color: #fff; background: #007f2d; text-align:left; margin-right:5px; border-radius:0px">
            <i class="fa fa-plus-circle"></i> AGREGAR USUARIO
          </button>
          <button class="btn" onClick="location.href = 'user_exp.php';" style="font-size:14px; color: #fff; background: #006122; text-align:left; border-radius:0px">
            <i class="fa fa-download"></i> EXPORTAR USUARIOS
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
                <strong>Usuarios</strong>
                <small>Lista</small>
              <div class="btn-group float-right">
                <button class="btn dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-settings"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="index.php?seccion=useradd">Agregar</a>
                  <a class="dropdown-item" href="user_exp.php" target="_blank">Exportar</a>
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
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Categoría</th>
                    <th>Último acceso</th>
                    <th>Email</th>
                    <th>Validado</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $activo = 1;
                    $sql = "SELECT * FROM `admin` WHERE `categoria` != 'SADMIN' ORDER BY `usuario` ";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      
                      if ($row['validado'] ==0){
                        $validado = "NO";
                      }else{
                        $validado = "SI";
                      }
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
                              <a href='index.php?seccion=useredit&id=".$row['id_admin']."' class='btn btn-primary'><i class='fa fa-edit'></i></a>
                              <a href='?seccion=userdelete&id=".$row['id_admin']."' class='btn btn-block btn-danger'><i class='fa fa-trash'></i> </a>
                            </div>
                          </td>
                          <td>
                            <div class='avatar'>
                              <img class='img-avatar' width='30px' height='30px' src='img/avatars/".$row['foto']."' alt='".$row['email']."'>
                            </div>
                          </td>
                          <td>".utf8_encode($row['usuario'])."</td>
                          <td>".utf8_encode($row['nombre'])."</td>
                          <td>".utf8_encode($row['apellido'])."</td>
                          <td>".utf8_encode($row['categoria'])."</td>
                          <td>".date("d-m-Y H:i", strtotime($row['ultimo_acceso']))."</td>
                          <td>".utf8_encode($row['email'])."</td>
                          <td>".$validado."</td>
                          
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
