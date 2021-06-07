<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item">
      Productos
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
                <strong>Productos</strong>
                <small>Eliminar</small>
              <div class="card-header-actions" style="height: 21px;">
                <span class="badge badge-warning">Proceso sensible</span>
              </div>
            </div>
            <form id="proddeleteForm" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>¡Aviso!</strong> Los registros de los productos no se borran del todo, estos quedan inactivos para no afectar los datos de los tableros.
                  <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <?php
                  $idproducto = isset($_GET["id"]) ? $_GET["id"] : "";
                  $sql = "SELECT * FROM `products` WHERE `id_product` = '$idproducto'";
                  $query = $conn->query($sql);

                  if ($query->num_rows < 1){ 
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
                    $foto         = utf8_encode($row['foto']);
                    $identificador= $row['identificador'];


                    $disabled =  "disabled='disabled'";
                ?>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header">
                        <i class="fa fa-image"></i>
                        Foto Adjunta
                      </div>
                      <div class="card-body">
                        <img class='img-fluid' src='img/productos/<?php echo $row["foto"]; ?>'>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="card"> 
                      <div class="card-header">
                        <i class="fa fa-id-card"></i>
                        Datos del producto: <strong><?php echo $nombre; ?></strong>
                      </div>
                      <div class="card-body">

                          <div class="form-group">
                            <label for="nombre">Nombre(s)</label>
                            <input class="form-control" <?php echo $disabled; ?> id="nombre" name="nombre" type="text" placeholder="" value="<?php echo $nombre; ?>" required>
                            <input class="form-control" id="identificador" name="identificador" type="hidden" placeholder="" value="<?php echo $identificador; ?>" required>
                          </div>

                        <div class="form-group">
                          <label for="foto">Foto</label>
                            <input class="form-control" <?php echo $disabled; ?> id="file-input" type="text" value="<?php echo $foto; ?>" name="foto">
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button class="btn btn-sm btn-danger" type="submit">
                  <i class="fa fa-trash"></i> Borrar Registro</button>
                <button class="btn btn-sm btn-primary" type="reset" onClick="location.href = 'index.php?seccion=prodlist';">
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
