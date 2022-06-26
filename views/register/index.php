  <!DOCTYPE html>
  <html lang="es">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/login.css" />
    <title>Register | System Restaurant</title>
  </head>

  <body>
    <?php
    include_once 'components/showToast.php';
    ?>
    <div class="login-container flex-h-jc">
      <form class="flex-v" action="register/save" method="post">
        <div class="title-form">
          <!-- <h1>Sistema de Restaurantes</h1> -->
          <img src="img/logo-restaurant.jpg" width="150px" alt="">
        </div>
        <span>User</span>
        <div class="box-input-date flex-h">
          <div class="box-icon">
            <ion-icon name="person"></ion-icon>
          </div>
          <input class="bg-transparent" name="user" type="text" placeholder="Ingrese el nombre del usuario" />
        </div>
        <span>Password</span>
        <div class="box-input-date flex-h">
          <div class="box-icon">
            <ion-icon name="lock"></ion-icon>
          </div>
          <input class="bg-transparent" name="password" type="password" placeholder="Ingrese password del usuario" />
        </div>
        <button class="btn-form-submit">Ingresar</button>

        <!-- <?php
              // if (isset($_SESSION["error"])) {
              ?>
          <div class="toast_error">
            <p>El usuario o contraseña es incorrecto, revisar datos</p>
          </div>
        <?php
        // session_destroy();
        // }
        ?> -->
      </form>

    </div>

    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  </body>

  </html>
  <?php
  // }
  ?>