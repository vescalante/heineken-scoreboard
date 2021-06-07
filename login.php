<?php
  session_start();
  if(isset($_SESSION['login_admin'])){
        ?>
        <script type="text/javascript">
                window.location.href = "login.php"
            </script>
                <?php 
     }
  include("header_startup.php");
?>

  <body class="app flex-row align-items-center" background="img/brand/nuevos/back_a.jpg">
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
            <h4 class="modal-title">Datos validados correctamente</h4>
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
    <div class="container" style="width: 700px; margin-top: -120px;">
      <div class="row justify-content-center p-4">
        <img src="img/brand/nuevos/index_logo_a.png" style="width: 400px; height: 186px;"><br>
		 
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
              <form class="login-form" id="inForm">
                <div class="card-body">
                
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="icon-user"></i>
                      </span>
                    </div>
                    <input class="form-control" type="text" name="username" placeholder="Usuario" required>
                  </div>
                  <div class="input-group mb-4">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="icon-lock"></i>
                      </span>
                    </div>
                    <input class="form-control" type="password" name="password" placeholder="Contraseña" required>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <button type="submit" class="btn btn-primary px-4" style="background-color: #007F31" type="button">Entrar</button>
                    </div>
                    <!--<div class="col-6 text-right">
                      <button class="btn btn-link px-0" type="button">Olvide mi password</button>
                    </div>-->
                  </div>
                </div>
              </form>
            </div>
            
           <!--<div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%; background-color:#007f31 !important">
              <div class="card-body text-center">
                <div>
                  <h2>Registro</h2>
                  <p>Puedes solicitar el acceso como usuario si previamente registras tus datos en este formulario.</p>
                  <button class="btn btn-primary active mt-3" type="button" onClick="location.href = 'register.php';">Solicitar acceso</button>
                </div>
              </div>
            </div>-->
            
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
                  url: 'login_validate.php',
                  data: $('form').serialize(),
                  dataType: "json",
                  success: function(data) {

                      if(data.status == "success"){
                        //$("#acceso").modal("show");
                        //$("#mensaje_exito").empty();
                        //$("#mensaje_exito").append(data.message);
                        if(data.category == "SADMIN"){
                          window.location.href = "index.php";
                        }else if(data.category == "ADMIN"){
                          window.location.href = "index.php";
                        }else if(data.category == "JVENTAS"){
                          window.location.href = "index.php";
                        }else{
                          window.location.href = "boardsign.php";
                        }
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
