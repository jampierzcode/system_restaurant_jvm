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
        <title>Mi perfil</title>
    </head>

    <body>
        <?php include_once "../components/Sidebar.php" ?>
        <div class="container-dashboard">
            <span class="route">
                > Mi perfil
            </span>
        </div>
        <script src="../js/jquery.min.js"></script>
        <script src="../components/sidebar.js"></script>

        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    </body>

    </html>
<?php
}
?>