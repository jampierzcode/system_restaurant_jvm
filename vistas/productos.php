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
        <link rel="stylesheet" href="../css/productos.css">
        <title>Productos</title>
    </head>

    <body>
        <?php include_once "../components/Sidebar.php" ?>
        <div class="container-dashboard">
            <span class="route">
                > Productos
            </span>
            <div class="operation-products">
                <div class="category-content flex-v">
                    <p>Categorias:</p>
                    <button class="btn-create">+ Nueva Categoria</button>
                    <div class="list-categorias flex-v">
                        <span class="categoria-name active-category">Todas las categorias</span>
                        <span class="categoria-name">Hamburguesas</span>
                        <span class="categoria-name">Tallarines</span>
                        <span class="categoria-name">Broaster</span>
                    </div>
                </div>
                <div class="productos-content flex-v">
                    <button id="create-product" class="btn-create">+ Nuevo Producto</button>

                    <div class="search-filter">
                        <ion-icon name="search"></ion-icon>
                        <input type="text" placeholder="Ingrese el nombre del producto">
                    </div>
                    <div class="list-productos grid-4c ">
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Hamburguesas</span> -->
                                <h1 class="name-card">Cheese Burger</h1>
                                <p class="precio-card">S/15.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/hamburguesa.webp" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Sin categoria</span> -->
                                <h1 class="name-card">Pollo Broaster</h1>
                                <p class="precio-card">S/8.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/broaster.jpg" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Hamburguesas</span> -->
                                <h1 class="name-card">Cheese Burger</h1>
                                <p class="precio-card">S/15.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/hamburguesa.webp" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Sin categoria</span> -->
                                <h1 class="name-card">Pollo Broaster</h1>
                                <p class="precio-card">S/8.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/broaster.jpg" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Hamburguesas</span> -->
                                <h1 class="name-card">Cheese Burger</h1>
                                <p class="precio-card">S/15.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/hamburguesa.webp" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Sin categoria</span> -->
                                <h1 class="name-card">Pollo Broaster</h1>
                                <p class="precio-card">S/8.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/broaster.jpg" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Hamburguesas</span> -->
                                <h1 class="name-card">Cheese Burger</h1>
                                <p class="precio-card">S/15.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/hamburguesa.webp" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Sin categoria</span> -->
                                <h1 class="name-card">Pollo Broaster</h1>
                                <p class="precio-card">S/8.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/broaster.jpg" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Hamburguesas</span> -->
                                <h1 class="name-card">Cheese Burger</h1>
                                <p class="precio-card">S/15.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/hamburguesa.webp" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Sin categoria</span> -->
                                <h1 class="name-card">Pollo Broaster</h1>
                                <p class="precio-card">S/8.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/broaster.jpg" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Hamburguesas</span> -->
                                <h1 class="name-card">Cheese Burger</h1>
                                <p class="precio-card">S/15.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/hamburguesa.webp" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Sin categoria</span> -->
                                <h1 class="name-card">Pollo Broaster</h1>
                                <p class="precio-card">S/8.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/broaster.jpg" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Hamburguesas</span> -->
                                <h1 class="name-card">Cheese Burger</h1>
                                <p class="precio-card">S/15.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/hamburguesa.webp" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Sin categoria</span> -->
                                <h1 class="name-card">Pollo Broaster</h1>
                                <p class="precio-card">S/8.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/broaster.jpg" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Hamburguesas</span> -->
                                <h1 class="name-card">Cheese Burger</h1>
                                <p class="precio-card">S/15.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/hamburguesa.webp" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Sin categoria</span> -->
                                <h1 class="name-card">Pollo Broaster</h1>
                                <p class="precio-card">S/8.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/broaster.jpg" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Hamburguesas</span> -->
                                <h1 class="name-card">Cheese Burger</h1>
                                <p class="precio-card">S/15.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/hamburguesa.webp" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Sin categoria</span> -->
                                <h1 class="name-card">Pollo Broaster</h1>
                                <p class="precio-card">S/8.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/broaster.jpg" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Hamburguesas</span> -->
                                <h1 class="name-card">Cheese Burger</h1>
                                <p class="precio-card">S/15.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/hamburguesa.webp" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Sin categoria</span> -->
                                <h1 class="name-card">Pollo Broaster</h1>
                                <p class="precio-card">S/8.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/broaster.jpg" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Hamburguesas</span> -->
                                <h1 class="name-card">Cheese Burger</h1>
                                <p class="precio-card">S/15.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/hamburguesa.webp" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Sin categoria</span> -->
                                <h1 class="name-card">Pollo Broaster</h1>
                                <p class="precio-card">S/8.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/broaster.jpg" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Hamburguesas</span> -->
                                <h1 class="name-card">Cheese Burger</h1>
                                <p class="precio-card">S/15.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/hamburguesa.webp" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Sin categoria</span> -->
                                <h1 class="name-card">Pollo Broaster</h1>
                                <p class="precio-card">S/8.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/broaster.jpg" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Hamburguesas</span> -->
                                <h1 class="name-card">Cheese Burger</h1>
                                <p class="precio-card">S/15.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/hamburguesa.webp" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Sin categoria</span> -->
                                <h1 class="name-card">Pollo Broaster</h1>
                                <p class="precio-card">S/8.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/broaster.jpg" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Hamburguesas</span> -->
                                <h1 class="name-card">Cheese Burger</h1>
                                <p class="precio-card">S/15.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/hamburguesa.webp" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Sin categoria</span> -->
                                <h1 class="name-card">Pollo Broaster</h1>
                                <p class="precio-card">S/8.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/broaster.jpg" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Hamburguesas</span> -->
                                <h1 class="name-card">Cheese Burger</h1>
                                <p class="precio-card">S/15.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/hamburguesa.webp" alt="">
                            </div>
                        </div>
                        <div class="card-box grid-2c">
                            <div class="content-card flex-v">
                                <!-- <span class="category-card">Sin categoria</span> -->
                                <h1 class="name-card">Pollo Broaster</h1>
                                <p class="precio-card">S/8.<span>00</span></p>
                            </div>
                            <div class="image-card flex-h-jc">
                                <img src="../img/broaster.jpg" alt="">
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