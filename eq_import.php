<?php
  $activo = 1;
  $sqlbe = "SELECT * FROM `board` WHERE `activo` = '$activo'";
  $querybe = $conn->query($sqlbe);
  $rowbe = $querybe->fetch_assoc();
  $board_name=$rowbe["nombre"];
  $idboard = $rowbe["id_board"];
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
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Aceptar</button>
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
      <a href="index.php?seccion=eqlist">Datos EQ</a>
    </li>
    <li class="breadcrumb-item active">Importar</li>
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <!-- /.col-->
        <div class="col-lg-3 col-md-3 pb-4 btn-group">
          <button class="btn" onClick="location.href = 'index.php?seccion=eqlist';" style="font-size:14px; color: #fff; background: #007f2d; text-align:left; margin-right:5px; border-radius:0px">
            <i class="fa fa-eye"></i> VISUALIZAR EQ
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
                <strong>IMPORTAR DATOS EQ AL TABLERO ACTIVO <span style="color:#007f2d"><?php echo $board_name; ?></span></strong>
              <div class="card-header-actions" style="height: 21px;">
                <span class="badge badge-warning">Proceso sencible</span>
              </div>
            </div>
            <div class="card-body">
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>¡Advertencia!</strong> El proceso de importación sobrescribirá todo lo guardado para cada sector de EQ en este tablero.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="animated fadeIn">
                <div class="row">
                  <div class="col-sm-6 col-md-4">
                    <div class="card">
                      <div class="card-header">
                        <i class="fa fa-align-justify"></i> 
                          <strong>CIERRE QUALIFIERS</strong>
                          <small>Tabla</small>
                        <div class="btn-group float-right">
                          <button class="btn dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-settings"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="eq1_exp_formato.php" target="_blank">Exportar Formato</a>
                          </div>
                        </div>
                      </div>
                      <form id="eqimportTb1" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                              <label for="foto">Selecciona el archivo</label>
                                <input class="form-control" id="file-input" type="file" name="foto">
                                <input class="form-control" name="id_board" type="hidden" value="<?php echo $idboard; ?>" placeholder="">
                            </div>
                            <div class="progress">
                              <div id="progress-bar1" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                          <button class="btn btn-sm btn-primary" type="submit">
                            <i class="fa fa-dot-circle-o"></i> Guardar</button>
                        </div>
                      </form>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-4">
                    <div class="card">
                      <div class="card-header">
                        <i class="fa fa-align-justify"></i> 
                          <strong>CLIENTES X GEC</strong>
                          <small>Tabla</small>
                        <div class="btn-group float-right">
                          <button class="btn dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-settings"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="eq2_exp_formato.php" target="_blank">Exportar Formato</a>
                          </div>
                        </div>
                      </div>
                      <form id="eqimportTb2" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                              <label for="foto">Selecciona el archivo</label>
                                <input class="form-control" id="file-input" type="file" name="foto">
                                <input class="form-control" name="id_board" type="hidden" value="<?php echo $idboard; ?>" placeholder="">
                            </div>
                            <div class="progress">
                              <div id="progress-bar2" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                          <button class="btn btn-sm btn-primary" type="submit">
                            <i class="fa fa-dot-circle-o"></i> Guardar</button>
                        </div>
                      </form>
                    </div>
                  </div>

                  <div class="col-sm-12 col-md-4">
                    <div class="card">
                      <div class="card-header">
                        <i class="fa fa-align-justify"></i> 
                          <strong>ANALISIS ENFRIADORES</strong>
                          <small>Tabla</small>
                        <div class="btn-group float-right">
                          <button class="btn dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-settings"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="eq3_exp_formato.php" target="_blank">Exportar Formato</a>
                          </div>
                        </div>
                      </div>
                      <form id="eqimportTb3" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                              <label for="foto">Selecciona el archivo</label>
                                <input class="form-control" id="file-input" type="file" name="foto">
                                <input class="form-control" name="id_board" type="hidden" value="<?php echo $idboard; ?>" placeholder="">
                            </div>
                            <div class="progress">
                              <div id="progress-bar3" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                          <button class="btn btn-sm btn-primary" type="submit">
                            <i class="fa fa-dot-circle-o"></i> Guardar</button>
                        </div>
                      </form>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-4">
                    <div class="card">
                      <div class="card-header">
                        <i class="fa fa-align-justify"></i> 
                          <strong>FRECUENCIA VS GEC</strong>
                          <small>Tabla</small>
                        <div class="btn-group float-right">
                          <button class="btn dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-settings"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="eq4_exp_formato.php" target="_blank">Exportar Formato</a>
                          </div>
                        </div>
                      </div>
                      <form id="eqimportTb4" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                              <label for="foto">Selecciona el archivo</label>
                                <input class="form-control" id="file-input" type="file" name="foto">
                                <input class="form-control" name="id_board" type="hidden" value="<?php echo $idboard; ?>" placeholder="">
                            </div>
                            <div class="progress">
                              <div id="progress-bar4" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                          <button class="btn btn-sm btn-primary" type="submit">
                            <i class="fa fa-dot-circle-o"></i> Guardar</button>
                        </div>
                      </form>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-4">
                    <div class="card">
                      <div class="card-header">
                        <i class="fa fa-align-justify"></i> 
                          <strong>IMAGEN EXTERIOR</strong>
                          <small>Tabla</small>
                        <div class="btn-group float-right">
                          <button class="btn dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-settings"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="eq5_exp_formato.php" target="_blank">Exportar Formato</a>
                          </div>
                        </div>
                      </div>
                      <form id="eqimportTb5" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                              <label for="foto">Selecciona el archivo</label>
                                <input class="form-control" id="file-input" type="file" name="foto">
                                <input class="form-control" name="id_board" type="hidden" value="<?php echo $idboard; ?>" placeholder="">
                            </div>
                            <div class="progress">
                              <div id="progress-bar5" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                          <button class="btn btn-sm btn-primary" type="submit">
                            <i class="fa fa-dot-circle-o"></i> Guardar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- /.row-->
    </div>
  </div>
</main>
