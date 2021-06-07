<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item">
      Vendedores
    </li>
    <li class="breadcrumb-item active">Modificar</li>
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
                <strong>Vendedores</strong>
                <small>Modificar</small>
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
            <form id="veditForm" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <?php
                  $idvendedor = isset($_GET["id"]) ? $_GET["id"] : "";
                  $sql = "SELECT * FROM `sales-force` WHERE `id_sales` = '$idvendedor'";
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
                    $nombre       = utf8_encode($row['nombre']);
                    $apellido     = utf8_encode($row['apellido']);
                    $socio        = utf8_encode($row['socio']);
                    $email        = utf8_encode($row['email']);
                    $puesto       = utf8_encode($row['puesto']);
                    $zona         = utf8_encode($row['zona']);
                    $ruta         = utf8_encode($row['ruta']);
                    $foto         = utf8_encode($row['foto']);
                    $antiguedad   = utf8_encode($row['antiguedad']);
                    $ingreso      = $row['fecha_ingreso'];
                    $identificador_v = $row['identificador'];
                    $asignado_a   = $row['asignado_a'];
                    
                    $disabled = $stock_count <= 0 ? "disabled='disabled'" : "";

                    $sql1 = "SELECT * FROM `sales-manager` WHERE `identificador` = '$asignado_a'";
                    $query1 = $conn->query($sql1);
                    if ($query1->num_rows < 1){ 
                      $jv_valor = 0;
                      $jv_text = "- Selecciona un jefes de ventas -";
                    }else{
                      $row1 = $query1->fetch_assoc();
                      $jv_valor = $asignado_a;
                      $jv_text = utf8_encode($row1['nombre'])." ".utf8_encode($row1['apellido']);
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
                        <img class='img-fluid' src='img/vendedores/<?php echo $row["foto"]; ?>'>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="card"> 
                      <div class="card-header">
                        <i class="fa fa-id-card"></i>
                        Datos de <strong><?php echo $nombre." ".$apellido ?></strong>
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
                            <label for="socio">Socio</label>
                            <input class="form-control" <?php echo $disabled; ?> id="socio" name="socio" type="text" placeholder="" value="<?php echo $socio; ?>" required>
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="socio">Email</label>
                            <input class="form-control" <?php echo $disabled; ?> id="email" name="email" type="email" placeholder="" value="<?php echo $email; ?>" required>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-sm-6">
                            <label for="puesto">Puesto</label>
                            <input class="form-control" <?php echo $disabled; ?> id="puesto" name="puesto" type="text" placeholder="" value="<?php echo $puesto; ?>" required>
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="zona">Zona</label>
                            <input class="form-control" <?php echo $disabled; ?> id="zona" name="zona" type="text" placeholder="" value="<?php echo $zona; ?>" required>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-sm-4">
                            <label for="zona">Ruta</label>
                            <input class="form-control" <?php echo $disabled; ?> id="ruta" name="ruta" type="text" placeholder="" value="<?php echo $ruta; ?>" required>
                          </div>
                          <div class="form-group col-sm-4">
                            <label for="zona">Antigüedad</label>
                            <input class="form-control" <?php echo $disabled; ?> id="antiguedad" name="antiguedad" type="text" placeholder="" value="<?php echo $antiguedad; ?>" required>
                            <input class="form-control" <?php echo $disabled; ?> id="identificador" name="identificador" type="hidden" placeholder="" value="<?php echo $identificador_v; ?>" required>
                          </div>
                          <div class="form-group col-sm-4">
                            <label for="postal-code">Fecha Ingreso</label>
                            <input class="form-control" <?php echo $disabled; ?> id="date-input" type="date" name="ingreso" placeholder="" value="<?php echo $ingreso; ?>" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="foto">Foto</label>
                            <input class="form-control" <?php echo $disabled; ?> id="file-input" type="file" name="foto">
                        </div>
                        <div class="form-group">
                          <label for="usuario">Jefe de ventas asignado</label>
                          <?php if($category == "JVENTAS"){ ?>
                          <select class="form-control" <?php echo $disabled; ?> id="select_user_asignado" name="select_user_asignado" required>
                            <option value="<?php echo $jv_valor; ?>"><?php echo $jv_text; ?></option>
                          </select>
                          <?php } else { ?>
                          <select class="form-control" <?php echo $disabled; ?> id="select_user_asignado" name="select_user_asignado" required>
                            <option value="<?php echo $jv_valor; ?>"><?php echo $jv_text; ?></option>
                            <?php
                              $sql = "SELECT * FROM `sales-manager` WHERE `activo` = '1'";
                              $query = $conn->query($sql);  

                              while($row = $query->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['identificador']; ?>"><?php echo utf8_encode($row['nombre'])." ".utf8_encode($row['apellido']); ?></option>
                                <?php
                              }
                            ?>
                          </select>
                        <?php } ?>
                          <span class="help-block"><small>Seleccione el Jefe de ventas que será responsable del vendedor</small></span>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit">
                  <i class="fa fa-dot-circle-o"></i>  Guardar Cambios</button>
                <button class="btn btn-sm btn-danger" type="reset" onClick="location.href = 'index.php?seccion=vlist';">
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