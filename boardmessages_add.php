<?php 
  $my_category = $_COOKIE['USERCAT'];
  $activo = 1;

  $sqlvend = "SELECT * FROM `board` WHERE `activo` = '1'";
  $queryvend = $conn->query($sqlvend); 
  if ($queryvend->num_rows < 1){ 
      $tab_nombre= "";
      $tab_id= "";
  }else{
      $rowvend = $queryvend->fetch_assoc();
      $tab_id= $rowvend["id_board"];
      $tab_nombre=utf8_encode($rowvend["nombre"]);
  }

 ?>
<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item">
      <?php if($my_category=="SADMIN" || $my_category=="ADMIN"){?>
        <a href="index.php?seccion=boardlist">Tableros</a>
      <?php }else{ ?>
        Tablero Vigente
      <?php } ?>
    </li>
    <li class="breadcrumb-item active">Agregar Nuevo</li>
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <!-- /.col-->
        <div class="col-lg-4 col-md-8 pb-4 btn-group">
          <button class="btn" onClick="location.href = 'index.php?seccion=boardmessageslist';" style="font-size:14px; color: #fff; background: #007f2d; text-align:left; margin-right:5px; border-radius:0px">
            <i class="fa fa-th-list"></i> LISTAR MENSAJES
          </button>
        </div>
      </div>
      <!-- /.row-->
      <div class="row">
        <!-- /.col-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-plus-circle"></i> 
                <strong>Mensajes del tablero <span style="color:#007f2d"><?php echo $tab_nombre;  ?></span></strong>
                <small>Agregar</small>
              <div class="btn-group float-right">
                <button class="btn dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-settings"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="index.php?seccion=boardmessageslist">Lista</a>
                </div>
              </div>
            </div>
            <?php 
              if ($tab_id=="") {
            ?>
            <div class="card-body">
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>¡No se encontro!</strong> No hay tableros activos por el momento.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
            </div>

            <?php 
              }else{
            ?>

            <form id="boardmessageaddForm" method="post" enctype="multipart/form-data">
              <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <p style="color: #007f2d; font-size:1.2em">Por favor capture su mensaje para Publicarlo  en el tablero activo</p>
                    </div>
                  </div> 

                  <div class="form-group col-sm-12">
                    <label for="contenido">Mensaje</label>
                    <input type="hidden" value="<?php echo $tab_id; ?>" name="tab_id">
                    <textarea class="form-control" id="contenido" name="contenido" rows="9" placeholder="Contenido del mensaje"></textarea>
                    <span class="help-block">Limitado a 140 caractéres</span>
                  </div>

              </div>
              
              <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit">
                  <i class="fa fa-dot-circle-o"></i> Enviar mensaje</button>
                <button class="btn btn-sm btn-danger" type="reset" onClick="location.href = 'index.php?seccion=boardmessageslist';">
                  <i class="fa fa-ban"></i> Cancelar</button>
              </div>
            </form>

            <?php 
              }
            ?>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- /.row-->
    </div>
  </div>
</main>
