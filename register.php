<?php
  include("header_startup.php");
?>
  <body class="app flex-row align-items-center">

    <!-- AVISOS -->

    <div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Error</h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <p id="mensaje_error"></p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
        <!-- /.modal-content-->
      </div>
      <!-- /.modal-dialog-->
    </div>
    <!-- /.modal-->

    <div class="modal fade" id="acceso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Datos enviados correctamente</h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <p id="mensaje_exito"></p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="button" onClick="location.href = 'index.php';">Aceptar</button>
          </div>
        </div>
        <!-- /.modal-content-->
      </div>
      <!-- /.modal-dialog-->
    </div>
    <!-- /.modal-->


    <!-- AVISOS -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mx-4">
            <form class="login-form" id="inForm">
              <div class="card-body p-4">
                <h1>Registro</h1>
                <p class="text-muted">Solicitar permiso para acceder al sistema</p>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-user"></i>
                    </span>
                  </div>
                  <input class="form-control" type="text" placeholder="Nombre" name="nombre" required>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-user"></i>
                    </span>
                  </div>
                  <input class="form-control" type="text" placeholder="Apellido" name="apellido" required>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-user"></i>
                    </span>
                  </div>
                  <input class="form-control" type="text" placeholder="Usuario" name="username" required>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                  </div>
                  <input class="form-control" type="email" placeholder="Email" name="email" required>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-lock"></i>
                    </span>
                  </div>
                  <input class="form-control" type="password" placeholder="Password" name="password" required>
                </div>
                <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-lock"></i>
                    </span>
                  </div>
                  <input class="form-control" type="password" placeholder="Repetir password" name="repeat" required>
                </div>
                <button type="submit" class="btn btn-block btn-success" type="button">Crear Cuenta</button>
                <div class="col-12 text-center">
                      <button class="btn btn-link px-0" type="button" onClick="location.href = 'login.php';">Regresar</button>
                    </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php
      include("footer_startup.php");
    ?>

    <!-- GUARDAR DATOS DE LA SECCION PERFIL -->
    <script>
          $(function () {
            $('#inForm').submit(function (event) {

           event.preventDefault();// using this page stop being refreshing 

              $.ajax({
                  type: 'POST',
                  url: 'create_account.php',
                  data: $('form').serialize(),
                  dataType: "json",
                  success: function(data) {

                      if(data.status == "success"){
                        $("#acceso").modal("show");
                        $("#mensaje_exito").empty();
                        $("#mensaje_exito").append(data.message);
                      }
                      else if(data.status == "error"){
                        $("#error").modal("show");
                        $("#mensaje_error").empty();
                        $("#mensaje_error").append(data.message);
                      }

                   }
              });
            });
          });
    </script>
    <!-- GUARDAR DATOS DE LA SECCION PERFIL -->
  </body>
</html>
