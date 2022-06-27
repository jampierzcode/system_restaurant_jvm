<?php

$dataUser = $this->d["dataUser"];

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/sidebar.css">
  <link rel="stylesheet" href="css/container-dashboard.css">
  <link rel="stylesheet" href="css/navdashboard.css">
  <link rel="stylesheet" href="css/list-table-jvm-min.css">
  <title>Gestion Usuarios</title>
</head>

<body>
  <?php include_once "components/Sidebar.php" ?>
  <div class="container-dashboard">
    <span class="route">
      > Gestion Usuarios
    </span>
    <div class="btn-actions-nav d-flex">
      <button class="btn">Crear Tipos de usuario</button>
      <button class="btn">Crear Nuevo Usuario</button>
    </div>
    <div class="list-table-jvm">
      <div class="search-table">
        <div class="search-list flex-h">
          <ion-icon name="search"></ion-icon>
          <input class="bg-transparent" id="search-list-db" type="text" placeholder="Buscar Usuarios">
        </div>
      </div>
      <div class="table-container">

      </div>
      <div class="table-register flex-v">
        <div class="table-grid-5c header-registradora">
          <div class="tag-header">Action</div>
          <div class="tag-header">Producto</div>
          <div class="tag-header">Cantidad</div>
          <div class="tag-header">Precio</div>
          <div class="tag-header">Subtotal</div>
        </div>
        <div class="productos-register">
          <div class="table-grid-5c product-add-venta">
            <div class="tag-body"><span class="remove-item" id="remove-producto">
                <ion-icon name="trash"></ion-icon>
              </span></div>
            <div class="tag-body">
              <p>Hamburguesa + creamas + papas</p>
            </div>
            <div class="tag-body">1</div>
            <div class="tag-body">S/8.00</div>
            <div class="tag-body">S/8.00</div>
          </div>
          <div class="table-grid-5c product-add-venta">
            <div class="tag-body"><span class="remove-item" id="remove-producto">
                <ion-icon name="trash"></ion-icon>
              </span></div>
            <div class="tag-body">
              <p>Hamburguesa + creamas + papas</p>
            </div>
            <div class="tag-body">1</div>
            <div class="tag-body">S/8.00</div>
            <div class="tag-body">S/8.00</div>
          </div>
          <div class="table-grid-5c product-add-venta">
            <div class="tag-body"><span class="remove-item" id="remove-producto">
                <ion-icon name="trash"></ion-icon>
              </span></div>
            <div class="tag-body">
              <p>Hamburguesa + creamas + papas</p>
            </div>
            <div class="tag-body">1</div>
            <div class="tag-body">S/8.00</div>
            <div class="tag-body">S/8.00</div>
          </div>
        </div>
        <div class="total-ventas flex-h">
          <p>Total</p>
          <span class="item-count">7 items</span>
          <span>S/56.00</span>

        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="components/sidebar.js"></script>

  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>

</html>