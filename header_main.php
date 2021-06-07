<header class="app-header navbar">
  <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">
    <img class="navbar-brand-full" src="img/brand/logo.svg" width="89" height="25" alt="CoreUI Logo">
    <img class="navbar-brand-minimized" src="img/brand/sygnet.svg" width="30" height="30" alt="CoreUI Logo">
  </a>
  <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="d-md-down-none"><h4>TABLERO <span style="color:#007f2d;">HEINEKEN EXECUTION QUALIFIERS</span> ERMITA</h4></div>
  <!--
  <ul class="nav navbar-nav d-md-down-none">
    <li class="nav-item px-3">
      <a class="nav-link" href="index.php">Panel principal</a>
    </li>
    <li class="nav-item px-3">
      <a class="nav-link" href="#">Usuarios</a>
    </li>
    <li class="nav-item px-3">
      <a class="nav-link" href="#">Perfil</a>
    </li>
  </ul>
  -->
  <ul class="nav navbar-nav ml-auto">
    <!-- Elementos no utilizados -->
    <!--
    <li class="nav-item d-md-down-none">
      <a class="nav-link" href="#">
        <i class="icon-bell"></i>
        <span class="badge badge-pill badge-danger">5</span>
      </a>
    </li>
    <li class="nav-item d-md-down-none">
      <a class="nav-link" href="#">
        <i class="icon-list"></i>
      </a>
    </li>
    <li class="nav-item d-md-down-none">
      <a class="nav-link" href="#">
        <i class="icon-location-pin"></i>
      </a>
    </li>
    -->
    <!-- Elementos no utilizados -->

    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <img class="img-avatar" src="img/avatars/<?php echo $foto_profile; ?>" alt="<?php echo $user; ?>">
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-header text-center">
          <strong style="text-transform: uppercase;"><?php echo $user; ?></strong>
        </div>
        <!--
        <a class="dropdown-item" href="#">
          <i class="fa fa-user"></i> Perfil</a>
        -->
        <a class="dropdown-item" href="logout.php?ch=logout">
          <i class="fa fa-sign-out"></i> Salir</a>
      </div>
    </li>
    <li class="nav-item d-md-down-none">
      <a class="nav-link" href="logout.php?ch=logout">
        <i class="fa fa-sign-out"></i>
      </a>
    </li>
  </ul>

  <!--
  <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" data-toggle="aside-menu-lg-show">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">
    <span class="navbar-toggler-icon"></span>
  </button>
  -->
</header>