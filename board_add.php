<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
    <li class="breadcrumb-item">
      <a href="index.php?seccion=boardlist">Tableros</a>
    </li>
    <li class="breadcrumb-item active">Agregar Nuevo</li>
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <!-- /.col-->
        <div class="col-lg-4 col-md-8 pb-4 btn-group">
          <button class="btn" onClick="location.href = 'index.php?seccion=boardlist';" style="font-size:14px; color: #fff; background: #007f2d; text-align:left; margin-right:5px; border-radius:0px">
            <i class="fa fa-list"></i> LISTAR TABLEROS
          </button>
          <button class="btn" onClick="location.href = 'index.php?seccion=boardmessageslist';" style="font-size:14px; color: #fff; background: #006122; text-align:left; border-radius:0px">
            <i class="fa fa-comments"></i> VER MENSAJES
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
                <strong>Tableros</strong>
                <small>Agregar</small>
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
            <form id="boardaddForm" method="post" enctype="multipart/form-data">
              <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <p style="color: #007f2d; font-size:1.2em">Por favor capture los siguientes datos para crear un nuevo tablero en el sistema (Todos los campos son obligatorios)</p>
                    </div>
                  </div> 
                  <div class="row">
                    <div class="form-group col-sm-8">
                      <label for="nombre">Titulo del tablero</label>
                      <input class="form-control" id="nombre" name="nombre" type="text" placeholder="" required>
                    </div>
                    <div class="form-group col-sm-4">
                      <label for="activo">Activar tablero</label>
                      <select class="form-control" id="activo" name="activo" required>
                        <option value="0" selected="selected">No, dejarlo inactivo</option>
                        <option value="1">Si, poner como activo</option>
                      </select>
                      <span class="help-block"><small>El tablero activo será el que se muestre en la vista de tablero</small></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label for="postal-code">Fecha de inicio</label>
                      <input class="form-control" id="date-input" type="date" name="inicio" placeholder="" required>
                    </div>
                    <div class="form-group col-sm-6">
                      <label for="postal-code">Fecha de término</label>
                      <input class="form-control" id="date-input2" type="date" name="fin" placeholder="" required>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label for="prod1">Producto 1</label>
                      <select class="form-control" id="prod1" name="prod1" required>
                        <option value="0">- Lista de productos -</option>
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
                      <select class="form-control" id="prod2" name="prod2" required>
                        <option value="0">- Lista de productos -</option>
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
                      <select class="form-control" id="prod3" name="prod3" required>
                        <option value="0">- Lista de productos -</option>
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
                      <select class="form-control" id="prod4" name="prod4" required>
                        <option value="0">- Lista de productos -</option>
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
                  <i class="fa fa-dot-circle-o"></i> Agregar Tablero</button>
                <button class="btn btn-sm btn-danger" type="reset" onClick="location.href = 'index.php?seccion=boardlist';">
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
