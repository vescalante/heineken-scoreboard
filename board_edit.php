<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
    <li class="breadcrumb-item">
      <a href="index.php?seccion=boardlist">Tableros</a>
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
              <i class="fa fa-plus-circle"></i> 
                <strong>Tableros</strong>
                <small>Modificar</small>
              <div class="btn-group float-right">
                <button class="btn dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-settings"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="index.php?seccion=boardlist">Lista</a>
                  <a class="dropdown-item" href="index.php?seccion=boardmessages" target="_blank">Mensajes</a>
                </div>
              </div>
            </div>
            <form id="boardeditForm" method="post" enctype="multipart/form-data">
              <div class="card-body">
                  <?php
                    $idboard = isset($_GET["id"]) ? $_GET["id"] : "";
                    $sql5 = "SELECT * FROM `board` WHERE `id_board` = '$idboard'";
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
                      $nombre       = utf8_encode($row5['nombre']);
                      $inicio       = $row5['inicio'];
                      $fin          = $row5['fin'];
                      $activo       = $row5['activo'];
                      $prod1        = $row5['prod1'];
                      $prod2        = $row5['prod2'];
                      $prod3        = $row5['prod3'];
                      $prod4        = $row5['prod4'];
                      $identificador= $row5['identificador'];
                      
                      $disabled = $stock_count <= 0 ? "disabled='disabled'" : "";

                      if ($activo==1){ 
                        $act_valor = 1;
                        $act_text = "Si, poner como activo";
                      }else{
                        $act_valor = 0;
                        $act_text = "No, dejarlo inactivo";
                      }

                      $sql_prod1 = "SELECT * FROM `products` WHERE `identificador` = '$prod1'";
                      $query_prod1 = $conn->query($sql_prod1);
                      if ($query_prod1->num_rows < 1){ 
                        $prod1_valor = 0;
                        $prod1_text = "- Lista de productos -";
                      }else{
                        $row_prod1 = $query_prod1->fetch_assoc();
                        $prod1_valor = $prod1;
                        $prod1_text = utf8_encode($row_prod1['nombre']);
                      }

                      $sql_prod2 = "SELECT * FROM `products` WHERE `identificador` = '$prod2'";
                      $query_prod2 = $conn->query($sql_prod2);
                      if ($query_prod2->num_rows < 1){ 
                        $prod2_valor = 0;
                        $prod2_text = "- Lista de productos -";
                      }else{
                        $row_prod2 = $query_prod2->fetch_assoc();
                        $prod2_valor = $prod2;
                        $prod2_text = utf8_encode($row_prod2['nombre']);
                      }

                      $sql_prod3 = "SELECT * FROM `products` WHERE `identificador` = '$prod3'";
                      $query_prod3 = $conn->query($sql_prod3);
                      if ($query_prod3->num_rows < 1){ 
                        $prod3_valor = 0;
                        $prod3_text = "- Lista de productos -";
                      }else{
                        $row_prod3 = $query_prod3->fetch_assoc();
                        $prod3_valor = $prod3;
                        $prod3_text = utf8_encode($row_prod3['nombre']);
                      }

                      $sql_prod4 = "SELECT * FROM `products` WHERE `identificador` = '$prod4'";
                      $query_prod4 = $conn->query($sql_prod4);
                      if ($query_prod4->num_rows < 1){ 
                        $prod4_valor = 0;
                        $prod4_text = "- Lista de productos -";
                      }else{
                        $row_prod4 = $query_prod4->fetch_assoc();
                        $prod4_valor = $prod4;
                        $prod4_text = utf8_encode($row_prod4['nombre']);
                      }
                  ?>
                  
                  <div class="row">
                    <div class="form-group col-sm-8">
                      <label for="nombre">Título del tablero</label>
                      <input class="form-control" <?php echo $disabled; ?> id="nombre" name="nombre" type="text" placeholder="" value="<?php echo $nombre; ?>" required>
                      <input class="form-control" id="identificador" name="identificador" type="hidden" placeholder="" value="<?php echo $identificador; ?>" required>
                    </div>
                    <div class="form-group col-sm-4">
                      <label for="activo">Activar tablero</label>
                      <select class="form-control" <?php echo $disabled; ?> id="activo" name="activo" required>
                        <option value="<?php echo $act_valor; ?>"><?php echo $act_text; ?></option>
                        <option value="0">No, dejarlo inactivo</option>
                        <option value="1">Si, poner como activo</option>
                      </select>
                      <span class="help-block"><small>El tablero activo será el que se muestre en la vista de tablero</small></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label for="postal-code">Fecha de inicio</label>
                      <input class="form-control" <?php echo $disabled; ?> id="date-input" type="date" name="inicio" placeholder="" value="<?php echo $inicio; ?>" required>
                    </div>
                    <div class="form-group col-sm-6">
                      <label for="postal-code">Fecha de término</label>
                      <input class="form-control" <?php echo $disabled; ?> id="date-input2" type="date" name="fin" placeholder="" value="<?php echo $fin; ?>" required>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label for="prod1">Producto 1</label>
                      <select class="form-control" <?php echo $disabled; ?> id="prod1" name="prod1" required>
                        <option value="<?php echo $prod1_valor; ?>"><?php echo $prod1_text; ?></option>
                        <?php
                          $sql = "SELECT * FROM `products` WHERE `activo` = '1'";
                          $query = $conn->query($sql);  

                          while($row = $query->fetch_assoc()){
                            ?>
                            <option value="<?php echo $row['identificador']; ?>"><?php echo utf8_encode($row['nombre']); ?></option>
                            <?php
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group col-sm-6">
                      <label for="prod2">Producto 2</label>
                      <select class="form-control" <?php echo $disabled; ?> id="prod2" name="prod2" required>
                        <option value="<?php echo $prod2_valor; ?>"><?php echo $prod2_text; ?></option>
                        <?php
                          $sql = "SELECT * FROM `products` WHERE `activo` = '1'";
                          $query = $conn->query($sql);  

                          while($row = $query->fetch_assoc()){
                            ?>
                            <option value="<?php echo $row['identificador']; ?>"><?php echo utf8_encode($row['nombre']); ?></option>
                            <?php
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label for="prod3">Producto 3</label>
                      <select class="form-control" <?php echo $disabled; ?> id="prod3" name="prod3" required>
                        <option value="<?php echo $prod3_valor; ?>"><?php echo $prod3_text; ?></option>
                        <?php
                          $sql = "SELECT * FROM `products` WHERE `activo` = '1'";
                          $query = $conn->query($sql);  

                          while($row = $query->fetch_assoc()){
                            ?>
                            <option value="<?php echo $row['identificador']; ?>"><?php echo utf8_encode($row['nombre']); ?></option>
                            <?php
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group col-sm-6">
                      <label for="prod4">Producto 4</label>
                      <select class="form-control" <?php echo $disabled; ?> id="prod4" name="prod4" required>
                        <option value="<?php echo $prod4_valor; ?>"><?php echo $prod4_text; ?></option>
                        <?php
                          $sql = "SELECT * FROM `products` WHERE `activo` = '1'";
                          $query = $conn->query($sql);  

                          while($row = $query->fetch_assoc()){
                            ?>
                            <option value="<?php echo $row['identificador']; ?>"><?php echo utf8_encode($row['nombre']); ?></option>
                            <?php
                          }
                        ?>
                      </select>
                    </div>
                  </div>
              </div>
              
              <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit">
                  <i class="fa fa-dot-circle-o"></i> Guardar Cambios</button>
                <button class="btn btn-sm btn-danger" type="reset" onClick="location.href = 'index.php?seccion=boardlist';">
                  <i class="fa fa-ban"></i> Cancelar</button>
              </div>
            </form>
            <?php } ?> 
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- /.row-->
    </div>
  </div>
</main>
