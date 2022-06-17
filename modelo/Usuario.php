<?php
include_once "Conexion.php";

class Usuario
{
    var $datos;
    var $mensaje;

    public function __construct()
    {
        // se va a conectar a la base de datos
        $db = new Conexion(); // $db ya no es una variable es un objeto
        $this->conexion = $db->pdo;
        // $this hace referencia al objeto que se crea en una instancia de clase
    }

    function Loguearse($username, $password)
    {
        $sql = "SELECT * FROM usuario WHERE username=:username and password=:password";
        $query = $this->conexion->prepare($sql);
        $query->execute(array(':username' => $username, ':password' => $password));
        $this->datos = $query->fetchAll(); // retorna objetos o no
        return $this->datos;
    }
}