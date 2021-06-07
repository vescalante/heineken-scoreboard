<?php
  $idboard = isset($_GET["id"]) ? $_GET["id"] : "";
  $sqlbe = "SELECT * FROM `board` WHERE `id_board` = '$idboard'";
  $querybe = $conn->query($sqlbe);
  $rowbe = $querybe->fetch_assoc();
  $board_name=$rowbe["nombre"];
  $prod1=$rowbe["prod1"];
  $prod2=$rowbe["prod2"];
  $prod3=$rowbe["prod3"];
  $prod4=$rowbe["prod4"];

  $id_scores = $_GET["id_scores"];
  $id_vendedor = $_GET["id_vendedor"];

  $sqlprod1 = "SELECT * FROM `products` WHERE `identificador` = '$prod1'";
  $queryprod1 = $conn->query($sqlprod1);
  if ($queryprod1->num_rows < 1){ 
      $prod1_nombre= "Prod1";
  }else{
      $rowprod1 = $queryprod1->fetch_assoc();
      $prod1_nombre=utf8_encode($rowprod1["nombre"]);
  }

  $sqlprod2 = "SELECT * FROM `products` WHERE `identificador` = '$prod2'";
  $queryprod2 = $conn->query($sqlprod2);
  if ($queryprod2->num_rows < 1){ 
      $prod1_nombre= "Prod2";
  }else{
      $rowprod2 = $queryprod2->fetch_assoc();
      $prod2_nombre=utf8_encode($rowprod2["nombre"]);
  }

  $sqlprod3 = "SELECT * FROM `products` WHERE `identificador` = '$prod3'";
  $queryprod3 = $conn->query($sqlprod3);
  if ($queryprod3->num_rows < 1){ 
      $prod1_nombre= "Prod3";
  }else{
      $rowprod3 = $queryprod3->fetch_assoc();
      $prod3_nombre=utf8_encode($rowprod3["nombre"]);
  }

  $sqlprod4 = "SELECT * FROM `products` WHERE `identificador` = '$prod4'";
  $queryprod4 = $conn->query($sqlprod4);
  if ($queryprod4->num_rows < 1){ 
      $prod1_nombre= "Prod4";
  }else{
      $rowprod4 = $queryprod4->fetch_assoc();
      $prod4_nombre=utf8_encode($rowprod4["nombre"]);
  }

  $sqlvend = "SELECT * FROM `sales-force` WHERE `id_sales` = '$id_vendedor'";
  $queryvend = $conn->query($sqlvend); 
  if ($queryvend->num_rows < 1){ 
      $vend_nombre= "";
  }else{
      $rowvend = $queryvend->fetch_assoc();
      $vend_nombre="(".utf8_encode($rowvend["nombre"])." ".utf8_encode($rowvend["apellido"]).")";
  }

  if ($id_scores == 0) {
    $ner_miss = "";
    $eq = "";
    $vol_s1 = "";
    $vol_s2 = "";
    $vol_s3 = "";
    $vol_s4 = "";
    $vol_heineken = "";
    $productividad = "";
    $vol_nr = "";
    $efectividad = "";
    $dentro_rango = "";
    $fuera_frecuencia = "";
    $cartera_vencida = "";
    $ejecucion = "";
    $prod_enfriadores = "";
    $enf_sc = "";
    $prod1 = "";
    $prod2 = "";
    $prod3 = "";
    $prod4 = "";
    $prod1_cuota = "";
    $prod2_cuota = "";
    $prod3_cuota = "";
    $prod4_cuota = "";
  }else{
    $sql1 = "SELECT * FROM `scores` WHERE `id_scores` = '$id_scores'";
    $query1 = $conn->query($sql1);
    if ($query1->num_rows < 1){ 
      $ner_miss = "";
      $eq = "";
      $vol_s1 = "";
      $vol_s2 = "";
      $vol_s3 = "";
      $vol_s4 = "";
      $vol_heineken = "";
      $productividad = "";
      $vol_nr = "";
      $efectividad = "";
      $dentro_rango = "";
      $fuera_frecuencia = "";
      $cartera_vencida = "";
      $ejecucion = "";
      $prod_enfriadores = "";
      $enf_sc = "";
      $prod1 = "";
      $prod2 = "";
      $prod3 = "";
      $prod4 = "";
      $prod1_cuota = "";
      $prod2_cuota = "";
      $prod3_cuota = "";
      $prod4_cuota = "";
    }else{
      $row1 = $query1->fetch_assoc();

      $ner_miss = $row1['ner_miss'];
      $eq = $row1['eq'];
      $vol_s1 = $row1['vol_s1'];
      $vol_s2 = $row1['vol_s2'];
      $vol_s3 = $row1['vol_s3'];
      $vol_s4 = $row1['vol_s4'];
      $vol_heineken = $row1['vol_heineken'];
      $productividad = $row1['productividad'];
      $vol_nr = $row1['vol_nr'];
      $efectividad = $row1['efectividad'];
      $dentro_rango = $row1['dentro_rango'];
      $fuera_frecuencia = $row1['fuera_frecuencia'];
      $cartera_vencida = $row1['cartera_vencida'];
      $ejecucion = $row1['ejecucion'];
      $prod_enfriadores = $row1['prod_enfriadores'];
      $enf_sc = $row1['enf_sc'];
      $prod1 = $row1['prod1'];
      $prod2 = $row1['prod2'];
      $prod3 = $row1['prod3'];
      $prod4 = $row1['prod4'];
      $prod1_cuota = $row1['prod1_cuota'];
      $prod2_cuota = $row1['prod2_cuota'];
      $prod3_cuota = $row1['prod3_cuota'];
      $prod4_cuota = $row1['prod4_cuota'];
    }
  }
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
    <li class="breadcrumb-item active">Agregar / Modificar</li>
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <!-- /.col-->
        <div class="col-lg-4 col-md-8 pb-4 btn-group">
          <button class="btn" onClick="location.href = 'index.php?seccion=boardwatch&id=<?php echo $idboard; ?>';" style="font-size:14px; color: #fff; background: #007f2d; text-align:left; margin-right:5px; border-radius:0px">
            <i class="fa fa-th-list"></i> LISTAR VENDEDORES
          </button>
          <button class="btn" onClick="location.href = 'scoreboard_exp_vendedores.php?id=<?php echo $idboard; ?>';" style="font-size:14px; color: #fff; background: #006122; text-align:left; border-radius:0px">
            <i class="fa fa-download"></i> EXPORTAR VENDEDORES
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
                <strong>CAPTURAR RESULTADOS <span style="color:#007f2d"><?php echo $vend_nombre; ?></span></strong>
              <div class="btn-group float-right">
                <button class="btn dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-settings"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="index.php?seccion=boardwatch&id=<?php echo $idboard; ?>">Lista</a>
                  <a class="dropdown-item" href="#" target="_blank">Exportar</a>
                </div>
              </div>
            </div>
            <form id="scoreboardaddForm" method="post" enctype="multipart/form-data">
              <div class="card-body">

                  <div class="form-group">
                    <label for="usuario">Vendedor</label>

                    <select class="form-control" id="nombre" name="nombre" required>
                      <?php
                        $sql = "SELECT * FROM `sales-force` WHERE `id_sales` = '$id_vendedor'";
                        $query = $conn->query($sql);  

                        while($row = $query->fetch_assoc()){
                          ?>
                          <option value="<?php echo $row['id_sales']; ?>" selected="selected"><?php echo utf8_encode($row['nombre'])." ".utf8_encode($row['apellido']); ?></option>
                          <?php
                        }
                      ?>
                    </select>
                  </div>

                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label for="ner_miss">Ner Miss</label>
                      <input class="form-control" id="ner_miss" name="ner_miss" type="text" value="<?php echo $ner_miss; ?>" placeholder="">
                      <input class="form-control" id="id_scores" name="id_scores" type="hidden" value="<?php echo $id_scores; ?>" placeholder="">
                      <input class="form-control" id="id_board" name="id_board" type="hidden" value="<?php echo $idboard; ?>" placeholder="">

                    </div>
                    <div class="form-group col-sm-6">
                      <label for="eq">EQ</label>
                      <input class="form-control" id="eq" name="eq" value="<?php echo $eq; ?>" type="text" placeholder="">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label for="vol_s1">Real (No. Hetolitros)</label>
                      <input class="form-control" id="vol_s1" name="vol_s1" value="<?php echo $vol_s1; ?>" type="text" placeholder="">
                    </div>
                    <div class="form-group col-sm-6">
                      <label for="vol_s2">Meta (No. Hectolitros)</label>
                      <input class="form-control" id="vol_s2" name="vol_s2" value="<?php echo $vol_s2; ?>" type="text" placeholder="">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label for="vol_s3">% Avance vs Meta</label>
                      <input class="form-control" id="vol_s3" name="vol_s3" value="<?php echo $vol_s3; ?>" type="text" placeholder="">
                    </div>
                    <div class="form-group col-sm-6">
                      <label for="vol_s4">Tendencia</label>
                      <input class="form-control" id="vol_s4" name="vol_s4" value="<?php echo $vol_s4; ?>" type="text" placeholder="">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label for="vol_heineken">Vol Heineken</label>
                      <input class="form-control" id="vol_heineken" name="vol_heineken" value="<?php echo $vol_heineken; ?>" type="text" placeholder="">
                    </div>
                    <div class="form-group col-sm-6">
                      <label for="productividad">Productividad</label>
                      <input class="form-control" id="productividad" name="productividad" value="<?php echo $productividad; ?>" type="text" placeholder="">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label for="vol_nr">Vol NR</label>
                      <input class="form-control" id="vol_nr" name="vol_nr" type="text" value="<?php echo $vol_nr; ?>" placeholder="">
                    </div>
                    <div class="form-group col-sm-4">
                      <label for="efectividad">Efectividad</label>
                      <input class="form-control" id="efectividad" name="efectividad" value="<?php echo $efectividad; ?>" type="text" placeholder="">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label for="dentro_rango">Dentro Rango</label>
                      <input class="form-control" id="dentro_rango" name="dentro_rango" value="<?php echo $dentro_rango; ?>" type="text" placeholder="">
                    </div>
                    <div class="form-group col-sm-6">
                      <label for="fuera_frecuencia">Fuera frecuencia</label>
                      <input class="form-control" id="fuera_frecuencia" name="fuera_frecuencia" value="<?php echo $fuera_frecuencia; ?>" type="text" placeholder="">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label for="cartera_vencida">Cartera Vencida</label>
                      <input class="form-control" id="cartera_vencida" name="cartera_vencida" value="<?php echo $cartera_vencida; ?>" type="text" placeholder="">
                    </div>
                    <div class="form-group col-sm-6">
                      <label for="ejecucion">Ejecución</label>
                      <input class="form-control" id="ejecucion" name="ejecucion" value="<?php echo $ejecucion; ?>" type="text" placeholder="">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label for="prod_enfriadores">Prod. Enfriadores</label>
                      <input class="form-control" id="prod_enfriadores" name="prod_enfriadores" value="<?php echo $prod_enfriadores; ?>" type="text" placeholder="">
                    </div>
                    <div class="form-group col-sm-6">
                      <label for="enf_sc">Enf. SC</label>
                      <input class="form-control" id="enf_sc" name="enf_sc" type="text" value="<?php echo $enf_sc; ?>" placeholder="">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label for="prod1_cuota">Cuota de <?php echo $prod1_nombre; ?></label>
                      <input class="form-control" id="prod1_cuota" name="prod1_cuota" value="<?php echo $prod1_cuota; ?>" type="text" placeholder="">
                    </div>
                    <div class="form-group col-sm-6">
                      <label for="prod2_cuota">Cuota de <?php echo $prod2_nombre; ?></label>
                      <input class="form-control" id="prod2_cuota" name="prod2_cuota" type="text" value="<?php echo $prod2_cuota; ?>" placeholder="">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label for="prod3_cuota">Cuota de <?php echo $prod3_nombre; ?></label>
                      <input class="form-control" id="prod3_cuota" name="prod3_cuota" value="<?php echo $prod3_cuota; ?>" type="text" placeholder="">
                    </div>
                    <div class="form-group col-sm-6">
                      <label for="prod4_cuota">Cuota de <?php echo $prod4_nombre; ?></label>
                      <input class="form-control" id="prod4_cuota" name="prod4_cuota" value="<?php echo $prod4_cuota; ?>" type="text" placeholder="">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label for="prod1"><?php echo $prod1_nombre; ?></label>
                      <input class="form-control" id="prod1" name="prod1" value="<?php echo $prod1; ?>" type="text" placeholder="">
                    </div>
                    <div class="form-group col-sm-6">
                      <label for="prod2"><?php echo $prod2_nombre; ?></label>
                      <input class="form-control" id="prod2" name="prod2" value="<?php echo $prod2; ?>" type="text" placeholder="">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label for="prod3"><?php echo $prod3_nombre; ?></label>
                      <input class="form-control" id="prod3" name="prod3" value="<?php echo $prod3; ?>" type="text" placeholder="">
                    </div>
                    <div class="form-group col-sm-6">
                      <label for="prod4"><?php echo $prod1_nombre; ?></label>
                      <input class="form-control" id="prod4" name="prod4" value="<?php echo $prod4; ?>" type="text" placeholder="">
                    </div>
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
