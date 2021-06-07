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
    <li class="breadcrumb-item active">Mensajes</li>
    <li class="breadcrumb-item active">Eliminar</li>
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
                <small>Eliminar</small>
                <div class="card-header-actions" style="height: 21px;">
                  <span class="badge badge-warning">Proceso sencible</span>
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

            <form id="boardmessagedeleteForm" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>¡Advertencia!</strong> Los mensajes se borran permanentemente, por lo que no puedes restaurarlos después.
                  <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <?php
                    $idmsg = isset($_GET["id"]) ? $_GET["id"] : "";
                    $sql5 = "SELECT * FROM `messages` WHERE `id_message` = '$idmsg'";
                    $query5 = $conn->query($sql5);
                    $stock_count = 1;

                    if ($query5->num_rows < 1){ 
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
                      $row5= $query5->fetch_assoc();
                      
                      $contenido    = utf8_encode($row5['contenido']);
                      $id_board     = $row5['id_board'];
                      $id_admin     = $row5['id_admin'];
                      $activo       = $row5['activo'];
                      
                      $disabled = "disabled='disabled'";
                      if ($activo ==0){
                        $activo_text = "No aprobado";
                      }else{
                        $activo_text = "Aprobado";
                      }
                   } 
                ?> 

                  <div class="form-group col-sm-12">
                    <label for="contenido">Mensaje</label>
                    <input type="hidden" value="<?php echo $idmsg; ?>" name="idmsg">
                    <textarea <?php echo $disabled; ?> class="form-control" id="contenido" name="contenido" rows="9"><?php echo $contenido; ?></textarea>
                    <span class="help-block">Limitado a 140 caractéres</span>
                  </div>
              </div>
              
              <div class="card-footer">
                <button class="btn btn-sm btn-danger" type="submit">
                  <i class="fa fa-trash"></i> Borrar mensaje</button>
                <button class="btn btn-sm btn-primary" type="reset" onClick="location.href = 'index.php?seccion=boardmessageslist';">
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
