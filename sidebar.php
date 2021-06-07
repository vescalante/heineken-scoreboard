<?php $seccion= isset($_GET["seccion"]) ? $_GET["seccion"] : ""; ?>

<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="nav-icon icon-speedometer"></i> Panel principal
        </a>
      </li>
      <li class="nav-title" style="background: #007f2d;">Centro de datos</li>
      <?php
        if($category=="SADMIN" || $category=="ADMIN"){
      ?>
      <li class="nav-item nav-dropdown" style="background: #610008;">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon icon-people"></i> Jefes de ventas</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link" href="index.php?seccion=jvadd" target="_top">
              <i class="nav-icon icon-plus"></i> Nuevo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?seccion=jvlist" target="_top">
              <i class="nav-icon icon-list"></i> Listar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="jv_exp.php" target="_blank">
              <i class="nav-icon icon-cloud-download"></i> Exportar</a>
          </li>
        </ul>
      </li>
      <?php } ?>
      <li class="nav-item nav-dropdown" style="background: #8a000b">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon icon-people"></i> Vendedores</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link" href="index.php?seccion=vadd" target="_top">
              <i class="nav-icon icon-plus"></i> Nuevo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?seccion=vlist" target="_top">
              <i class="nav-icon icon-list"></i> Listar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="v_exp.php" target="_blank">
              <i class="nav-icon icon-cloud-download"></i> Exportar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?seccion=trash" target="_top">
              <i class="nav-icon icon-trash"></i> Papelera
            </a>
          </li>
        </ul>
      </li>
      <?php
        if($category=="SADMIN" || $category=="ADMIN"){
      ?>
      <li class="nav-item nav-dropdown" style="background: #ad020f">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon icon-layers"></i> Productos</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link" href="index.php?seccion=prodadd" target="_top">
              <i class="nav-icon icon-plus"></i> Nuevo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?seccion=prodlist" target="_top">
              <i class="nav-icon icon-list"></i> Listar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="prod_exp.php" target="_blank">
              <i class="nav-icon icon-cloud-download"></i> Exportar</a>
          </li>
        </ul>
      </li>
      <?php 
        } 
        if($category=="SADMIN" || $category=="ADMIN"){
      ?>
      <li class="nav-title" style="background: #007f2d;">Tableros</li>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon icon-briefcase"></i> Administración</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
          <a class="nav-link" href="index.php?seccion=boardadd" target="_top">
              <i class="nav-icon icon-plus"></i> Nuevo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?seccion=boardlist" target="_top">
              <i class="nav-icon icon-list"></i> Listar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?seccion=boardmessageslist">
              <i class="nav-icon icon-speech"></i> Mensajes</a>
          </li>
        </ul>
      </li>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon icon-graph"></i> Datos EQ</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link" href="index.php?seccion=eqlist" target="_top">
              <i class="nav-icon icon-eye"></i> Visualizar</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="index.php?seccion=eqimport" target="_top">
              <i class="nav-icon icon-cloud-upload"></i> Importar</a>
          </li>
        </ul>
      </li>
      <?php
        }else{
          $sqlboard = "SELECT * FROM `board` WHERE `activo` = '1'";
          $queryboard = $conn->query($sqlboard);
          if ($queryboard->num_rows < 1){
           ?>
           <li class="nav-item">
            <a class="nav-link nav-link-danger" href="#" target="_top">
              <i class="nav-icon icon-book-open"></i> No hay Tablero</a>
          </li>
           <?php
          }else{
            $rowboard = $queryboard->fetch_assoc();
            $board_id_sidebar=$rowboard["id_board"];
        ?>
        <li class="nav-title" style="background: #007f2d;">Tableros</li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?seccion=boardwatch&id=<?php echo $board_id_sidebar; ?>" target="_top">
            <i class="nav-icon icon-book-open"></i> Tablero Vigente</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?seccion=boardmessageslist">
            <i class="nav-icon icon-speech"></i> Mensajes</a>
        </li>
      <?php
          }
        }
        if($category=="SADMIN" || $category=="ADMIN"){
      ?>
      <li class="divider"></li>
      <li class="nav-title" style="background: #007f2d;">Sistema</li>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon icon-people"></i> Usuarios</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link" href="index.php?seccion=useradd" target="_top">
              <i class="nav-icon icon-plus"></i> Nuevo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?seccion=userlist" target="_top">
              <i class="nav-icon icon-list"></i> Listar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user_exp.php" target="_blank">
              <i class="nav-icon icon-cloud-download"></i> Exportar</a>
          </li>
        </ul>
      </li>
      <?php } ?>
    </ul>
  </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>