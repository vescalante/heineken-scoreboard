<?php 
  $my_category = $_COOKIE['USERCAT'];
  $id_acceso_adm = $_COOKIE['IDADMINADM'];
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
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <!-- /.col-->
        <div class="col-lg-4 col-md-8 pb-4 btn-group">
          <button class="btn" onClick="location.href = 'index.php?seccion=boardmessagesadd';" style="font-size:14px; color: #fff; background: #007f2d; text-align:left; margin-right:5px; border-radius:0px">
            <i class="fa fa-plus-circle"></i> ESCRIBIR MENSAJE PARA TABLERO ACTIVO
          </button>
        </div>
      </div>

      <div class="row">
        <!-- /.col-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i> 
                <strong>Mensajes</strong>
                <small>Tableros</small>
                <div class="btn-group float-right">
                  <button class="btn dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-settings"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="index.php?seccion=boardmessagesadd">Escribir mensaje</a>
                  </div>
                </div>
            </div>
            <div class="card-body table-responsive">
              <table id="example1" class="table table-striped">
                <thead>
                  <tr>
                    <th>Aprobado</th>
                    <th>Menú</th>
                    <th>Tablero</th>
                    <th>Fecha</th>
                    <th>Autor</th>
                    <th>Contenido</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $activo = 1;
                    if($category=="SADMIN" || $category=="ADMIN"){
                      $sql = "SELECT * FROM `messages` ORDER BY `fecha_creacion` DESC ";
                    }else{
                      $sql = "SELECT * FROM `messages` WHERE `id_admin`= '$id_acceso_adm' ORDER BY `fecha_creacion` DESC ";
                    }
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      if ($row['activo'] ==0){
                        $activo = "<span class='badge badge-danger'>No aprobado</span>";
                      }else{
                        $activo = "<span class='badge badge-success'>Aprobado</span>";
                      }
                      $idboard_msg = $row['id_board'];
                      $idadmin_msg = $row['id_admin'];
                      echo "
                        <tr>
                        <td>".$activo."</td>
                        <td>
                            <div class='btn-group' role='group' aria-label='Button group'>
                              <a href='index.php?seccion=boardmessagesedit&id=".$row['id_message']."' class='btn btn-primary'><i class='fa fa-edit'></i></a>
                              <a href='index.php?seccion=boardmessagesdelete&id=".$row['id_message']."' class='btn btn-block btn-danger'><i class='fa fa-trash'></i> </a>
                            </div>
                          </td>
                      ";
                        $sqltab = "SELECT * FROM `board` WHERE `id_board` = '$idboard_msg '";
                        $querytab = $conn->query($sqltab);
                        $rowtab = $querytab->fetch_assoc();
                        $tab_name=utf8_encode($rowtab["nombre"]);

                      echo "
                          <td>".utf8_encode($rowtab['nombre'])."</td>
                          <td>".date("d-m-Y H:i", strtotime($row['fecha_creacion']))."</td>
                      ";
                        $sqljv = "SELECT * FROM `admin` WHERE `id_admin` = '$idadmin_msg'";
                        $queryjv = $conn->query($sqljv);
                        $rowjv = $queryjv->fetch_assoc();
                        $jv_name=utf8_encode($rowjv["nombre"])." ".utf8_encode($rowjv["apellido"]);

                      echo "
                          <td>".$jv_name."</td>
                          <td>".utf8_encode($row['contenido'])."</td>                          
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- /.row-->
    </div>
  </div>
</main>
