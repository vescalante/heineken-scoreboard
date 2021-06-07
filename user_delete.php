<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item">
      <a href="index.php?seccion=userlist">Usuarios</a>
    </li>
    <li class="breadcrumb-item active">Eliminar</li>
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <!-- /.row-->
      <div class="row">
        <!-- /.col-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-pencil-square-o"></i> 
                <strong>Usuarios</strong>
                <small>Eliminar</small>
              <div class="card-header-actions" style="height: 21px;">
                <span class="badge badge-warning">Proceso sencible</span>
              </div>
            </div>
            <form id="userdeleteForm" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>¡Advertencia!</strong> Los registros de usuarios no se borran del todo, estos quedan inactivos y pueden ser reactivados por el administrador.
                  <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <?php
                  $user_id = isset($_GET["id"]) ? $_GET["id"] : "";
                  $sql = "SELECT * FROM `admin` WHERE `id_admin` = '$user_id'";
                  $query = $conn->query($sql);
                  $stock_count = 1;

                  if ($query->num_rows < 1){ 
                    $stock_count = 0;
                    ?>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>¡No se encontro!</strong> No se encontro resultado para esta búsqueda.
                      <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php
                  }else{
                    $row = $query->fetch_assoc();
                    $usuario      = utf8_encode($row['usuario']);
                    $nombre       = utf8_encode($row['nombre']);
                    $apellido     = utf8_encode($row['apellido']);
                    $foto         = utf8_encode($row['foto']);
                    $password     = utf8_encode($row['password']);
                    $email        = utf8_encode($row['email']);
                    $categoria    = utf8_encode($row['categoria']);
                    $validar      = $row['validado'];
                    $identificador= $row['identificador'];
                    $validar_txt  = $validar ==0 ? "NO" : "SI";

                    if($categoria=="JVENTAS"){
                      $categoria_txt = "Jefe de Ventas";
                    }else if($categoria=="ADMIN"){
                       $categoria_txt = "Administrador";
                    }else{
                       $categoria_txt = "Vista de tablero";
                    }
                    
                    $disabled =  "disabled='disabled'";

                    $sql1 = "SELECT * FROM `sales-manager` WHERE `identificador` = '$identificador'";
                    $query1 = $conn->query($sql1);

                    if ($query1->num_rows < 1){ 
                      $nombre_asociado = "- Lista de jefes de ventas -";
                      $valor_asociado = "";
                    }else{
                      $row1 = $query1->fetch_assoc();
                      $nombre_asociado = utf8_encode($row1['nombre']." ".$row1['apellido']);
                      $valor_asociado = $row1['identificador'];
                    }
                ?>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header">
                        <i class="fa fa-image"></i>
                        Foto Adjunta
                      </div>
                      <div class="card-body">
                        <img class='img-fluid' src='img/avatars/<?php echo $row["foto"]; ?>'>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="card"> 
                      <div class="card-header">
                        <i class="fa fa-id-card"></i>
                        Datos de <strong><?php echo $usuario." (".$categoria.")" ?></strong>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-sm-6">
                            <label for="nombre">Nombre(s)</label>
                            <input class="form-control" <?php echo $disabled; ?> id="nombre" name="nombre" type="text" placeholder="" value="<?php echo $nombre; ?>" required>
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="apellido">Apellido(s)</label>
                            <input class="form-control" <?php echo $disabled; ?> id="apellido" name="apellido" type="text" placeholder="" value="<?php echo $apellido; ?>" required>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-sm-6">
                            <label for="cat">Categoría</label>
                            <select class="form-control" <?php echo $disabled; ?> id="cat" name="cat" required>
                              <option value="<?php echo $categoria; ?>"><?php echo $categoria_txt; ?></option>
                              <option value="ADMIN">Administrador</option>
                              <option value="JVENTAS">Jefe de Ventas</option>
                              <option value="TAB">Vista de tablero</option>
                            </select>
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="email">Email</label>
                            <input class="form-control" <?php echo $disabled; ?> id="email" name="email" type="email" placeholder="" value="<?php echo $email; ?>" required>
                            <input class="form-control" id="user_id" name="user_id" type="hidden" placeholder="" value="<?php echo $user_id; ?>" required>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="foto">Foto</label>
                            <input class="form-control" <?php echo $disabled; ?> id="file-input" type="file" name="foto">
                        </div>
                        <div class="row">
                          <div class="form-group col-sm-6">
                            <label for="usuario">Usuario</label>
                            <input class="form-control" <?php echo $disabled; ?> id="username" name="usuario" type="text" placeholder="" value="<?php echo $usuario; ?>" required>
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="password">Password</label>
                            <input class="form-control" <?php echo $disabled; ?> id="password" name="password" type="password" placeholder="Ingresa un nuevo password" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="validar">Usuario validado</label>
                          <select class="form-control" <?php echo $disabled; ?> id="validar" name="validar" required>
                            <option value="<?php echo $validar; ?>"><?php echo $validar_txt; ?></option>
                            <option value="1">SI</option>
                            <option value="0">NO</option>
                          </select>
                        </div>

                        <div class="form-group" 
                          <?php 
                              if($categoria != "JVENTAS"){ 
                                echo "style='display: none;'"; 
                              } 
                          ?> id="jventas_related">
                          <label for="usuario">Vincular con Jefe de Ventas</label>

                          <select class="form-control" <?php echo $disabled; ?> name="jventas_select" id="jventas_select">
                            <option value="<?php echo $valor_asociado; ?>"><?php echo $nombre_asociado; ?></option>
                            <?php
                              $activo = 1;
                              $sql = "SELECT * FROM `sales-manager` WHERE `activo` = '$activo'";
                              $query = $conn->query($sql);  

                              while($row = $query->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['identificador']; ?>"><?php echo utf8_encode($row['nombre'])." ".utf8_encode($row['apellido']); ?></option>
                                <?php
                              }
                            ?>
                          </select>
                          <span class="help-block"><small>Seleccione el Jefe de ventas al que se asociará el nuevo usuario</small></span>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button class="btn btn-sm btn-danger" type="submit">
                  <i class="fa fa-trash"></i> Borrar Registro</button>
                <button class="btn btn-sm btn-primary" type="reset" onClick="location.href = 'index.php?seccion=userlist';">
                  <i class="fa fa-ban"></i> Cancelar</button>
              </div>
            <?php } ?> 
            </form>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- /.row-->
    </div>
  </div>
</main>
