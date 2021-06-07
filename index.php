<?php
	session_start();
	if(!isset($_SESSION['login_admin_adm'])){
				?>
				<script type="text/javascript">
            		window.location.href = "login.php"
        		</script>
                <?php 
  }else{
    include('conn.php');
    include('function.php');

    $user = $_COOKIE['USERADM'];
    $category = $_COOKIE['USERCAT'];
    $id_acceso = $_COOKIE['IDADMINADM'];
    $identificador_user = $_COOKIE['IDENTIFICADOR'];
    $nombre_user  = $_COOKIE['USERNAME'];

    if($category=='TAB'){
        ?>
        <script type="text/javascript">
            window.location.href = "login.php"
        </script>
<?php 
    }
    $sql = "SELECT * FROM `admin` WHERE `id_admin` = '$id_acceso'";
    $query = $conn->query($sql);

    $row = $query->fetch_assoc();
    $foto_profile=$row["foto"];
  }
?>
<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.15
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Heineken Execution Qualifiers">
    <meta name="author" content="Heineken Ermita">
    <meta name="keyword" content="Heineken,Execution,Qualifiers,ermita">
    <title>Heineken Scoreboard | Admin Panel</title>
    <!-- Icons-->
    <link rel="icon" type="image/png" href="./img/favicon.png" sizes="any" />
    <link href="node_modules/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="node_modules/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/custome.css" rel="stylesheet">
    <link href="vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="node_modules/DataTables-1.10.20/css/jquery.dataTables.min.css">
    
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <!-- AVISOS -->

    <div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Algo salió mal</h4>
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
            <h4 class="modal-title">Operación exitosa</h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <p id="mensaje_exito"></p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="button" data-dismiss="modal" onClick="window.location.reload();">Aceptar</button>
          </div>
        </div>
        <!-- /.modal-content-->
      </div>
      <!-- /.modal-dialog-->
    </div>
    <!-- /.modal-->

    <div class="modal fade" id="acceso_jvlist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Operación exitosa</h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <p id="mensaje_exito_jvlist"></p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="button" data-dismiss="modal" onClick="location.href = 'index.php?seccion=jvlist';">Aceptar</button>
          </div>
        </div>
        <!-- /.modal-content-->
      </div>
      <!-- /.modal-dialog-->
    </div>
    <!-- /.modal-->

    <div class="modal fade" id="acceso_vlist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Operación exitosa</h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <p id="mensaje_exito_vlist"></p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="button" data-dismiss="modal" onClick="location.href = 'index.php?seccion=vlist';">Aceptar</button>
          </div>
        </div>
        <!-- /.modal-content-->
      </div>
      <!-- /.modal-dialog-->
    </div>
    <!-- /.modal-->

    <div class="modal fade" id="acceso_prodlist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Operación exitosa</h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <p id="mensaje_exito_prodlist"></p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="button" data-dismiss="modal" onClick="location.href = 'index.php?seccion=prodlist';">Aceptar</button>
          </div>
        </div>
        <!-- /.modal-content-->
      </div>
      <!-- /.modal-dialog-->
    </div>
    <!-- /.modal-->

    <div class="modal fade" id="acceso_userlist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Operación exitosa</h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <p id="mensaje_exito_userlist"></p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="button" data-dismiss="modal" onClick="location.href = 'index.php?seccion=userlist';">Aceptar</button>
          </div>
        </div>
        <!-- /.modal-content-->
      </div>
      <!-- /.modal-dialog-->
    </div>
    <!-- /.modal-->

    <div class="modal fade" id="acceso_boardmessagelist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Operación exitosa</h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <p id="mensaje_exito_boardmessagelist"></p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="button" data-dismiss="modal" onClick="location.href = 'index.php?seccion=boardmessageslist';">Aceptar</button>
          </div>
        </div>
        <!-- /.modal-content-->
      </div>
      <!-- /.modal-dialog-->
    </div>
    <!-- /.modal-->
    <!-- AVISOS -->

    <?php include("header_main.php"); ?>
    <div class="app-body">
      <?php 
        include("sidebar.php"); 

        $seccion= isset($_GET["seccion"]) ? $_GET["seccion"] : "";
        switch ($seccion) {
          case "":
              include 'desktop.php';
              break; 
          //JEFES DE VENTAS
          case "jvlist":
              include 'jv_list.php';
              break; 
          case "jvadd":
              include 'jv_add.php';
              break; 
          case "jvedit":
              include 'jv_edit.php';
              break; 
          case "jvdelete":
              include 'jv_delete.php';
              break; 
          case "vlist":
              include 'v_list.php';
              break; 
          case "vadd":
              include 'v_add.php';
              break; 
          case "vedit":
              include 'v_edit.php';
              break; 
          case "vdelete":
              include 'v_delete.php';
              break; 
          case "prodlist":
              include 'prod_list.php';
              break; 
          case "prodadd":
              include 'prod_add.php';
              break; 
          case "prodedit":
              include 'prod_edit.php';
              break; 
          case "proddelete":
              include 'prod_delete.php';
              break; 
          case "userlist":
              include 'user_list.php';
              break; 
          case "useradd":
              include 'user_add.php';
              break; 
          case "useredit":
              include 'user_edit.php';
              break; 
          case "userdelete":
              include 'user_delete.php';
              break; 
          case "boardlist":
              include 'board_list.php';
              break; 
          case "boardadd":
              include 'board_add.php';
              break; 
          case "boardedit":
              include 'board_edit.php';
              break; 
          case "boardwatch":
              include 'scoreboard_list.php';
              break;
          case "scoreboardadd":
              include 'scoreboard_add.php';
              break;
          case "scoreboardimport":
              include 'scoreboard_import.php';
              break;
          case "boardmessageslist":
              include 'boardmessages_list.php';
              break; 
          case "boardmessagesadd":
              include 'boardmessages_add.php';
              break; 
          case "boardmessagesedit":
              include 'boardmessages_edit.php';
              break;  
          case "boardmessagesdelete":
              include 'boardmessages_delete.php';
              break;
          case "trash":
              include 'papelera.php';
              break;
          case "eqlist":
              include 'eq_list.php';
              break;
          case "eqimport":
              include 'eq_import.php';
              break;
        } 

        include("aside.php"); 
      ?>
    </div>
    <?php include("footer_main.php"); ?>
  </body>
</html>