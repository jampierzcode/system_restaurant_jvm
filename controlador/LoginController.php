<?php
include_once "../modelo/Usuario.php";
session_start();
$username = $_POST["usuario"];
$password = $_POST["password"];

$usuario = new Usuario();

$usuario->Loguearse($username, $password);

if (!empty($usuario->datos)) {

    foreach ($usuario->datos as $dato) {
        $_SESSION["id_usuario"] = $dato->id_usuario;
        $_SESSION["nombres"] = $dato->nombres . " " . $dato->apellidos;
    }
    header("Location: ../vistas/perfil.php");
} else {
    $_SESSION["error"] = "EL usuario o contraseña es incorrecto";
    header("Location: ../../systemrestaurant");
}
