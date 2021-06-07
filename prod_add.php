<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item">
      Productos
    </li>
    <li class="breadcrumb-item active">Agregar Nuevo</li>
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <!-- /.col-->
        <div class="col-lg-4 col-md-8 pb-4 btn-group">
          <button class="btn" onClick="location.href = 'index.php?seccion=prodlist';" style="font-size:14px; color: #fff; background: #007f2d; text-align:left; margin-right:5px; border-radius:0px">
            <i class="fa fa-th-list"></i> LISTAR PRODUCTOS
          </button>
          <button class="btn" onClick="location.href = 'prod_exp.php';" style="font-size:14px; color: #fff; background: #006122; text-align:left; border-radius:0px">
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
                <strong>Productos</strong>
                <small>Agregar</small>
              <div class="btn-group float-right">
                <button class="btn dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-settings"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="index.php?seccion=prodlist">Lista</a>
                  <a class="dropdown-item" href="prod_exp.php" target="_blank">Exportar</a>
                </div>
              </div>
            </div>
            <form id="prodaddForm" method="post" enctype="multipart/form-data">
              <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <p style="color: #007f2d; font-size:1.2em">Por favor capture el nombre y la imagen del producto para activarlo en el sistema</p>
                    </div>
                  </div> 

                    <div class="form-group">
                      <label for="nombre">Nombre del producto</label>
                      <input class="form-control" id="nombre" name="nombre" type="text" placeholder="" required>
                    </div>

                  <div class="form-group">
                    <label for="foto">Foto del producto</label>
                    <input class="form-control" id="file-input" type="file" name="foto">
                  </div>

              </div>
              
              <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit">
                  <i class="fa fa-dot-circle-o"></i> Agregar Registro</button>
                <button class="btn btn-sm btn-danger" type="reset" onClick="location.href = 'index.php?seccion=prodlist';">
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
