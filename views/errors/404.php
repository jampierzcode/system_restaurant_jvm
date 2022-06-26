<?php

$mensaje = $this->d;

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="robots" content="noindex">
  <meta name="robots" content="nofollow">
  <meta name="googlebot" content="noindex">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Error 404</title>

  <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
  <link rel="icon" href="img/favicon.png" type="image/x-icon">

  <!-- <link rel="stylesheet" href=" -->
  <?php
  // echo constant('URL') . 'assets/css/reset.css'; 
  ?>
  <!-- "> -->
  <!-- <link rel="stylesheet" href=" -->
  <?php
  // echo constant('URL') . 'assets/css/style.css'; 
  ?>
  <!-- "> -->
  <!-- <link rel="stylesheet" href=" -->
  <?php
  // echo constant('URL') . 'assets/css/error.css'; 
  ?>
  <!-- "> -->

</head>

<body>
  <div class="container">
    <div class="error">
      <span class="error__text"><?php echo $mensaje; ?></span>
      <span class="error__big">404</span>
    </div>
  </div>
</body>

</html>