<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
    header("Location: ../index.php");
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/sidebar.css">
        <link rel="stylesheet" href="../css/container-dashboard.css">
        <link rel="stylesheet" href="../css/navdashboard.css">
        <link rel="stylesheet" href="../components/components.css">
        <link rel="stylesheet" href="../css/ventas.css">
        <title>Dashboard</title>
    </head>

    <body>
        <?php include_once "../components/Sidebar.php" ?>
        <div class="container-dashboard">
            <span class="route">
                > Vender | Caja
            </span>
            <div class="section-crud-register">

                <div class="box-grid-ventas mesas-list flex-v">
                    <span>Mesas</span>
                    <div class="list-mesas grid-3c">
                        <div class="card-box">
                            <div class="content-card">
                                <p class="name-card">Mesa 01</p>
                            </div>
                        </div>
                        <div class="card-box">
                            <div class="content-card">
                                <p class="name-card">Mesa 02</p>
                            </div>
                        </div>
                        <div class="card-box">
                            <div class="content-card">
                                <p class="name-card">Mesa 03</p>
                            </div>
                        </div>
                        <div class="card-box">
                            <div class="content-card">
                                <p class="name-card">Mesa 04</p>
                            </div>
                        </div>
                        <div class="card-box">
                            <div class="content-card">
                                <p class="name-card">Mesa 05</p>
                            </div>
                        </div>
                        <div class="card-box">
                            <div class="content-card">
                                <p class="name-card">Mesa 06</p>
                            </div>
                        </div>
                        <div class="card-box">
                            <div class="content-card">
                                <p class="name-card">Mesa 07</p>
                            </div>
                        </div>
                        <div class="card-box">
                            <div class="content-card">
                                <p class="name-card">Mesa 08</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="box-grid-ventas comanda-list flex-v">
                    <div class="select-product flex-v">
                        <span class="title-box">Mis productos</span>
                        <div class="list-categorias flex-h">
                            <span class="categoria-name active-category">Todas las categorias</span>
                            <span class="categoria-name">Hamburguesas</span>
                            <span class="categoria-name">Tallarines</span>
                            <span class="categoria-name">Broaster</span>
                            <span class="categoria-name">Broaster</span>
                            <span class="categoria-name">Broaster</span>
                            <span class="categoria-name">Broaster</span>
                        </div>
                        <div class="search-filter">
                            <ion-icon name="search"></ion-icon>
                            <input type="text" placeholder="Ingrese el nombre del producto">
                        </div>
                        <div class="list-productos">
                            <div class="item-product">Tallarin Saltado + cocacola + ensaladas + cremas <span class="precio-product">S/8.00</span></div>
                            <div class="item-product">Tallarin Saltado + cocacola<span class="precio-product">S/15.00</span></div>
                            <div class="item-product">Broaster + papas + cocacola <span class="precio-product">S/12.00</span></div>
                            <div class="item-product">Broaster + papas + cocacola <span class="precio-product">S/12.00</span></div>
                            <div class="item-product">Broaster + papas + cocacola <span class="precio-product">S/12.00</span></div>
                            <div class="item-product">Broaster + papas + cocacola <span class="precio-product">S/12.00</span></div>
                            <div class="item-product">Broaster + papas + cocacola <span class="precio-product">S/12.00</span></div>
                        </div>
                    </div>
                    <div class="content-registradora flex-v">
                        <span class="title-box">Carrito</span>
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
                            <div class="clear-register"><button class="flex-h-jc" id="clear-all-products">
                                    <ion-icon name="trash"></ion-icon> Limpiar todo
                                </button></div>
                            <div class="total-ventas flex-h">
                                <p>Total</p>
                                <span class="item-count">7 items</span>
                                <span>S/56.00</span>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <script src="../js/jquery.min.js"></script>
        <script src="../components/sidebar.js"></script>

        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    </body>

    </html>
<?php
}
?>