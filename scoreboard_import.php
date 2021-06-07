<?php
  $idboard = isset($_GET["id"]) ? $_GET["id"] : "";
  $sqlbe = "SELECT * FROM `board` WHERE `id_board` = '$idboard'";
  $querybe = $conn->query($sqlbe);
  $rowbe = $querybe->fetch_assoc();
  $board_name=$rowbe["nombre"];

?>
<div class="modal fade" id="acceso_scoreboardlist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Operación exitosa</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="mensaje_exito_scoreboardlist"></p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button" data-dismiss="modal" onClick="location.href = 'index.php?seccion=boardwatch&id=<?php echo $idboard; ?>';">Aceptar</button>
      </div>
    </div>
    <!-- /.modal-content-->
  </div>
  <!-- /.modal-dialog-->
</div>
<!-- /.modal-->

<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
    <li class="breadcrumb-item">
      <a href="index.php?seccion=boardlist">Tableros</a>
    </li>
    <li class="breadcrumb-item">
      <a href="index.php?seccion=boardwatch&id=<?php echo $idboard; ?>"><?php echo $board_name; ?></a>
    </li>
    <li class="breadcrumb-item active">Importar datos</li>
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <!-- /.col-->
        <div class="col-lg-3 col-md-3 pb-4 btn-group">
          <button class="btn" onClick="location.href = 'index.php?seccion=boardwatch&id=<?php echo $idboard; ?>';" style="font-size:14px; color: #fff; background: #007f2d; text-align:left; margin-right:5px; border-radius:0px">
            <i class="fa fa-th-list"></i> LISTAR VENDEDORES
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
                <strong>IMPORTAR DATOS A <span style="color:#007f2d"><?php echo $board_name; ?></span></strong>
              <div class="card-header-actions" style="height: 21px;">
                <span class="badge badge-warning">Proceso sencible</span>
              </div>
            </div>
            <form id="scoreboardimportForm" method="post" enctype="multipart/form-data">
              <div class="card-body">
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>¡Advertencia!</strong> El proceso de importación sobrescribirá todo lo generado en este tablero hasta el momento.
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="form-group">
                    <label for="foto">Selecciona el archivo</label>
                      <input class="form-control" id="file-input" type="file" name="foto">
                      <input class="form-control" id="id_board" name="id_board" type="hidden" value="<?php echo $idboard; ?>" placeholder="">
                  </div>
                  <div class="progress">
                    <div id="progress-bar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                  </div>
              </div>
              
              <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit">
                  <i class="fa fa-dot-circle-o"></i> Agregar datos al tablero</button>
                <button class="btn btn-sm btn-danger" type="reset" onClick="location.href = 'index.php?seccion=boardwatch&id=<?php echo $idboard; ?>';">
                  <i class="fa fa-ban"></i> Cancelar</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- /.row-->
    </div>
  </div>
</main>
