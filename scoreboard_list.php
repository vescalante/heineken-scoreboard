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

  $my_category = $_COOKIE['USERCAT'];
  $my_identificador_user = $_COOKIE['IDENTIFICADOR'];

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

  $l_secure_query = 'id='.$idboard.'&opc=tmp';
  $link = "http://www.heinekenexecutionqualifiersermita.com/boardsign.php?".$l_secure_query;
?>
<div class="modal fade" id="share_url" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">URL Pública del tablero</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Copia y comparte la siguiente URL:</p>
        <h4><?php echo $link; ?></h4>
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

<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
    <li class="breadcrumb-item">
      <?php if($my_category=="SADMIN" || $my_category=="ADMIN"){?>
        <a href="index.php?seccion=boardlist">Tableros</a>
      <?php }else{ ?>
        Tablero Vigente
      <?php } ?>
    </li>
    <li class="breadcrumb-item">
      <strong><?php echo $board_name; ?></strong>
    </li>
    <li class="breadcrumb-item active">Lista</li>
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <!-- /.col-->
        <div class="col-lg-6 col-md-8 pb-4 btn-group">
          <a href="index.php?seccion=boardwatch&id=<?php echo $idboard; ?>#aviso" class="btn" style="font-size:14px; color: #fff; background: #007f2d; text-align:left; margin-right:5px; border-radius:0px">
            <i class="fa fa-upload"></i> IMPORTAR DATOS
          </a>
          <button class="btn" onClick="location.href = 'scoreboard_exp_vendedores.php?id=<?php echo $idboard; ?>';" style="font-size:14px; color: #fff; background: #006122; text-align:left; border-radius:0px; margin-right:5px;">
            <i class="fa fa-download"></i> EXPORTAR VENDEDORES
          </button>
          <button class="btn" data-toggle="modal" data-target="#share_url" style="font-size:14px; color: #fff; background: #006122; text-align:left; border-radius:0px">
            <i class="fa fa-link"></i> ENLACE PÚBLICO
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
                <strong>Tablero de Resultados</strong>
                <small>Lista</small>
              <div class="btn-group float-right">
                <button class="btn dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-settings"></i>
                </button>
                <?php 
                  
                ?>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="index.php?seccion=scoreboardimport&id=<?php echo $idboard; ?>">Importar datos</a>
                  <a class="dropdown-item" href="scoreboard_exp_formato.php?id=<?php echo $idboard; ?>" target="_blank">Exportar Formato</a>
                  <a class="dropdown-item" href="index.php?seccion=boardmessagesadd">Enviar mensaje al tablero</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive mb-4">
              <table id="example1" class="table table-striped tableScore">
                <thead>
                  <tr>
                    <th>Editar</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Jefe de Ventas</th>
                    <th>Ner Miss</th>
                    <th>EQ</th>
                    <th>Real (No. Hetolitros)</th>
                    <th>Meta (No. Hectolitros)</th>
                    <th>% Avance vs Meta</th>
                    <th>Tendencia</th>
                    <th>Vol Heineken</th>
                    <th>Productividad</th>
                    <th>Vol NR</th>
                    <th>Efectividad</th>
                    <th>Dentro Rango</th>
                    <th>Fuera Frecuencia</th>
                    <th>Cartera Vencida</th>
                    <th>Ejecucion</th>
                    <th>Prod Enfriadores</th>
                    <th>Enf SC</th>
                    <th><?php echo $prod1_nombre; ?></th>
                    <th>Cuota <?php echo $prod1_nombre; ?></th>
                    <th><?php echo $prod2_nombre; ?></th>
                    <th>Cuota <?php echo $prod2_nombre; ?></th>
                    <th><?php echo $prod3_nombre; ?></th>
                    <th>Cuota <?php echo $prod3_nombre; ?></th>
                    <th><?php echo $prod4_nombre; ?></th>
                    <th>Cuota <?php echo $prod4_nombre; ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $activo = 1;
                    if ($my_category == "JVENTAS") {
                      $sql1 = "SELECT * FROM `sales-force` WHERE `asignado_a` = '$my_identificador_user' and  `activo` = '1'";
                    }else{
                      $sql1 = "SELECT * FROM `sales-force` WHERE `activo` = '1'";
                    }
                    $query1 = $conn->query($sql1);
                    while($row1 = $query1->fetch_assoc()){
                      $asignado_a = $row1['asignado_a'];
                      $id_vendedor = $row1['id_sales'];

                      $sqljv = "SELECT * FROM `sales-manager` WHERE `identificador` = '$asignado_a'";
                      $queryjv = $conn->query($sqljv);
                      $rowjv = $queryjv->fetch_assoc();
                      $jv_name=utf8_encode($rowjv["nombre"]);

                      $sqlbo = "SELECT * FROM `scores` WHERE `id_vendedor` = '$id_vendedor' and id_board = '$idboard'";
                      $querybo = $conn->query($sqlbo);
                      $rowbo = $querybo->fetch_assoc();
                      if (empty($rowbo['id_scores'])) {
                        $enlace = "id=".$idboard."&id_scores=0&id_vendedor=".$id_vendedor;
                      }else{
                        $enlace = "id=".$idboard."&id_scores=".$rowbo['id_scores']."&id_vendedor=".$id_vendedor;
                      }
                      echo "
                        <tr>
                          <td>
                            <div class='btn-group' role='group' aria-label='Button group'>
                              <a href='index.php?seccion=scoreboardadd&".$enlace."' class='btn btn-primary'><i class='fa fa-edit'></i></a>
                            </div>
                          </td>
                          <td>
                            <div class='avatar'>
                              <img class='img-avatar' width='30px' height='30px' src='img/vendedores/".$row1['foto']."' alt='".$row1['email']."'>
                            </div>
                          </td>
                          <td>".utf8_encode($row1['nombre'])."</td>
                          <td>".$jv_name."</td>
                          <td>".$rowbo['ner_miss']."</td>
                          <td>".$rowbo['eq']."</td>
                          <td>".$rowbo['vol_s1']."</td>
                          <td>".$rowbo['vol_s2']."</td>
                          <td>".$rowbo['vol_s3']."</td>
                          <td>".$rowbo['vol_s4']."</td>
                          <td>".$rowbo['vol_heineken']."</td>
                          <td>".$rowbo['productividad']."</td>
                          <td>".$rowbo['vol_nr']."</td>
                          <td>".$rowbo['efectividad']."</td>
                          <td>".$rowbo['dentro_rango']."</td>
                          <td>".$rowbo['fuera_frecuencia']."</td>
                          <td>".$rowbo['cartera_vencida']."</td>
                          <td>".$rowbo['ejecucion']."</td>
                          <td>".$rowbo['prod_enfriadores']."</td>  
                          <td>".$rowbo['enf_sc']."</td>  
                          <td>".$rowbo['prod1']."</td> 
                          <td>".$rowbo['prod1_cuota']."</td> 
                          <td>".$rowbo['prod2']."</td>
                          <td>".$rowbo['prod2_cuota']."</td> 
                          <td>".$rowbo['prod3']."</td>  
                          <td>".$rowbo['prod3_cuota']."</td> 
                          <td>".$rowbo['prod4']."</td>
                          <td>".$rowbo['prod4_cuota']."</td> 
                          
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="mt-3" id="aviso">
              <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Ántes de importar datos lee esto!</h4>
                <ol>
                  <li>El proceso de importación <strong>borrará cualquier registro previamente ingresado a este tablero.</strong></li>
                  <li>Asegurate de trabajar sobre el formato de importación que puedes <a href="scoreboard_exp_formato.php?id=<?php echo $idboard; ?>">bajar aquí.</a></li>
                  <li>Te recomendamos descargar el formato y modificarlo cada vez que vayas a hacer un cambio ya que será la versión mas actual.</li>
                  <li><strong>No alteres el contenido de las 3 primeras columnas (id_tablero, id_vendedor, Nombre_del_vendedor).</strong></li>
                  <li>Sobre dicho formato deberás ingresar los valores de las columnas restantes (datos númericos).</li>
                  <li>No agregues más filas al documento ya que puedes provocar problemas graves en la importación.</li>
                  <li>Si te hace falta algun vendedor en la lista del formato verifícalo con tu administrador.</li>
                  <li>No borres la primera fila en tu archivo (encabezados).</li>
                  <li><strong>Guarda el archivo como .csv limitado por comas,</strong> esto lo dejará listo para importar.</li>
                  <li>Los archivos con formato .xls y .xlsx no son válidos para importación.</li>
                </ol>
                <hr>
                <p class="mb-3">Ahora que ya lo sabes, puedes acceder a la importación desde este enlace:</p>
                <button class="btn" onClick="location.href = 'index.php?seccion=scoreboardimport&id=<?php echo $idboard; ?>';" style="font-size:14px; color: #fff; background: #007f2d; text-align:left; margin-right:5px; border-radius:0px">
                  <i class="fa fa-upload"></i> IMPORTAR DATOS
                </button>
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
