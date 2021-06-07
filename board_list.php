<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
    <li class="breadcrumb-item">
      Tableros
    </li>
    <li class="breadcrumb-item active">Lista</li>
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <!-- /.col-->
        <div class="col-lg-4 col-md-8 pb-4 btn-group">
          <button class="btn" onClick="location.href = 'index.php?seccion=boardadd';" style="font-size:14px; color: #fff; background: #007f2d; text-align:left; margin-right:5px; border-radius:0px">
            <i class="fa fa-plus-circle"></i> AGREGAR TABLERO
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
              <i class="fa fa-align-justify"></i> 
                <strong>Tableros</strong>
                <small>Lista</small>
              <div class="btn-group float-right">
                <button class="btn dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-settings"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="index.php?seccion=boardadd">Agregar</a>
                  <a class="dropdown-item" href="index.php?seccion=boardmessageslist" target="_blank">Mensajes</a>
                </div>
              </div>
            </div>
            <div class="card-body table-responsive">
              <table id="example1" class="table table-striped">
                <thead>
                  <tr>
                    <th>Activo</th>
                    <th>Menú</th>
                    <th>Titulo</th>
                    <th>Fecha de creación</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de termino</th>
                    <th>Producto 1</th>
                    <th>Producto 2</th>
                    <th>Producto 3</th>
                    <th>Producto 4</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM `board` ORDER BY `fecha_creacion` DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){

                      if ($row['activo'] ==0){
                        $activo = "<span class='badge badge-danger'>Inactivo</span>";
                      }else{
                        $activo = "<span class='badge badge-success'>Activo</span>";
                      }

                      echo "
                        <tr>
                          <td>".$activo."</td>
                          <td>
                            <div class='btn-group' role='group' aria-label='Button group'>
                              <a href='index.php?seccion=boardwatch&id=".$row['id_board']."' class='btn btn-success'><i class='fa fa-list'></i></a>
                              <a href='index.php?seccion=boardedit&id=".$row['id_board']."' class='btn btn-primary'><i class='fa fa-edit'></i></a>
                            </div>
                          </td>
                          <td>".utf8_encode($row['nombre'])."</td>
                          <td>".date("d-m-Y H:i", strtotime($row['fecha_creacion']))."</td>
                          <td>".date("d-m-Y", strtotime($row['inicio']))."</td>
                          <td>".date("d-m-Y", strtotime($row['fin']))."</td>
                      ";
                      $prod1 = $row['prod1'];
                      $prod2 = $row['prod2'];
                      $prod3 = $row['prod3'];
                      $prod4 = $row['prod4'];
                      $sql1 = "SELECT * FROM `products` WHERE `identificador` = '$prod1'";
                      $query1 = $conn->query($sql1);
                      if ($query1->num_rows < 1){ 
                        echo "<td> -- </td>";
                      }else{
                        $row1 = $query1->fetch_assoc();
                        echo "
                          <td>
                            <div class='avatar'>
                              <img class='img-avatar' width='30px' height='30px' src='img/productos/".$row1['foto']."' alt='".$row1['nombre']."'>
                            </div>
                          </td>
                        ";
                      }
                      $sql2 = "SELECT * FROM `products` WHERE `identificador` = '$prod2'";
                      $query2 = $conn->query($sql2);
                      if ($query2->num_rows < 1){ 
                        echo "<td> -- </td>";
                      }else{
                        $row2 = $query2->fetch_assoc();
                        echo "
                          <td>
                            <div class='avatar'>
                              <img class='img-avatar' width='30px' height='30px' src='img/productos/".$row2['foto']."' alt='".$row2['nombre']."'>
                            </div>
                          </td>
                        ";
                      }
                      $sql3 = "SELECT * FROM `products` WHERE `identificador` = '$prod3'";
                      $query3 = $conn->query($sql3);
                      if ($query3->num_rows < 1){ 
                        echo "<td> -- </td>";
                      }else{
                        $row3 = $query3->fetch_assoc();
                        echo "
                          <td>
                            <div class='avatar'>
                              <img class='img-avatar' width='30px' height='30px' src='img/productos/".$row3['foto']."' alt='".$row3['nombre']."'>
                            </div>
                          </td>
                        ";
                      }
                      $sql4 = "SELECT * FROM `products` WHERE `identificador` = '$prod4'";
                      $query4 = $conn->query($sql4);
                      if ($query4->num_rows < 1){ 
                        echo "<td> -- </td>";
                      }else{
                        $row4 = $query4->fetch_assoc();
                        echo "
                          <td>
                            <div class='avatar'>
                              <img class='img-avatar' width='30px' height='30px' src='img/productos/".$row4['foto']."' alt='".$row4['nombre']."'>
                            </div>
                          </td>
                        ";
                      }
                      echo "
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
