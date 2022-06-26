<nav class="navbar-dashboard">
  <div class="drop-down-menu">
    <ion-icon name="menu"></ion-icon>
  </div>
  <div class="user-login">
    <!-- <FaBell /> campanas-->
    <img src="../img/mesero_rol.png" alt="img_avatar_user" />
    <p><?php echo $dataUser->getUser(); ?></p>
  </div>
</nav>
<div class="overlay-sidebar"></div>
<aside class="aside-dashboard">
  <div class="header-aside">
    <div class="logo">
      <!-- <img src="../img/logo.jpg" alt="logo-img" class="logo-icon" /> -->
      <ion-icon name="restaurant"></ion-icon>
      <p>Restaurante</p>
    </div>
  </div>
  <div class="main">
    <div class="perfil-user">
      <img src="../img/mesero_rol.png" alt="img_avatar_user" />
      <p><?php echo $dataUser->getUser(); ?></p>
    </div>
    <ul class="nav-links">

      <li class="links-menu-dashboard">
        <div class="link-block">
          <div class="left-link">
            <a class="toggle-drop" href="perfil.php">
              <ion-icon name="person"></ion-icon>
              <p>Perfil</p>
            </a>
          </div>
        </div>
      </li>
      <li class="links-menu-dashboard">
        <div class="link-block">
          <div class="left-link">
            <a class="toggle-drop" href="usuarios.php">
              <ion-icon name="people"></ion-icon>
              <p>Gestion Usuarios</p>
            </a>
          </div>
        </div>
      </li>

      <li class="links-menu-dashboard">
        <div class="link-block">
          <div class="left-link">
            <a class="toggle-drop" href="productos.php">
              <ion-icon name="cart"></ion-icon>
              <p>Productos</p>
            </a>
          </div>
        </div>
      </li>
      <li class="links-menu-dashboard">
        <div class="link-block">
          <div class="left-link">
            <a class="toggle-drop" href="vender.php">
              <ion-icon name="logo-usd"></ion-icon>
              <p>Vender</p>
            </a>
          </div>
        </div>
      </li>
      <li class="links-menu-dashboard">
        <div class="link-block">
          <div class="left-link">
            <a class="toggle-drop" href="logout">
              <ion-icon name="return-left"></ion-icon>
              <p>Cerrar Sesion</p>
            </a>
          </div>
        </div>
      </li>

    </ul>
  </div>
</aside>