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
        $sql = "SELECT * FROM usuario WHERE user=:username and password=:password";
        $query = $this->conexion->prepare($sql);
        $query->execute(array(':username' => $username, ':password' => $password));
        $this->datos = $query->fetchAll(); // retorna objetos o no
        return $this->datos;
    }
    function buscar_datos_contabilidad()
    {
        $sql = "SELECT count(*) as reservas, (SELECT count(*) FROM cliente) as clientes, (SELECT count(*) FROM habitaciones) as habitaciones, (SELECT SUM(total) FROM ventas) as ventas FROM reservas";
        $query = $this->conexion->prepare($sql);
        $query->execute();
        $this->datos = $query->fetchAll();
        // $this->datos = $query->fetchColumn();
        if (!empty($this->datos)) {

            return $this->datos;
        } else {
            $this->mensaje = 0;
            return $this->mensaje;
        }
    }
    function buscar_piso_hab()
    {
        $sql = "SELECT id_piso, numero_piso FROM piso";
        $query = $this->conexion->prepare($sql);
        $query->execute();
        $this->datos = $query->fetchAll(); // retorna objetos o no
        if (!empty($this->datos)) {

            return $this->datos;
        } else {
            $this->mensaje = "Falta crear pisos";
            return $this->mensaje;
        }
    }
    function buscar_cat_hab()
    {
        $sql = "SELECT id_cat_habitaciones, nombre_categoria FROM cat_habitaciones";
        $query = $this->conexion->prepare($sql);
        $query->execute();
        $this->datos = $query->fetchAll(); // retorna objetos o no
        if (!empty($this->datos)) {

            return $this->datos;
        } else {
            $this->mensaje = "Falta crear categorias";
            return $this->mensaje;
        }
    }
    function crear_habitaciones($n_habitacion, $habs_piso, $habs_cat)
    {
        $sql = "INSERT INTO habitaciones(n_cuarto, categoria, piso, estado) VALUES (:n_cuarto, :categoria, :piso, :estado)";
        $query = $this->conexion->prepare($sql);
        try {
            $query->execute(array(":n_cuarto" => $n_habitacion, ":categoria" => $habs_cat, ":piso" => $habs_piso, ":estado" => 1));
            $this->mensaje = "add-habs";
            return $this->mensaje;
        } catch (\Throwable $error) {
            $this->mensaje = "no-add-habs";
            return $this->mensaje;
        }
    }
    function crear_cat_habitaciones($categoria_nombre, $categoria_precio)
    {
        $sql = "INSERT INTO cat_habitaciones(nombre_categoria, precio) VALUES (:nombre_categoria, :precio)";
        $query = $this->conexion->prepare($sql);
        try {
            $query->execute(array(":nombre_categoria" => $categoria_nombre, ":precio" => $categoria_precio));
            $this->mensaje = "add-cat-habs";
            return $this->mensaje;
        } catch (\Throwable $error) {
            $this->mensaje = "no-add-cat-habs";
            return $this->mensaje;
        }
    }
    function crear_piso_habitaciones($piso_nombre)
    {
        $sql = "INSERT INTO piso(numero_piso) VALUES (:numero_piso)";
        $query = $this->conexion->prepare($sql);
        try {
            $query->execute(array(":numero_piso" => $piso_nombre));
            $this->mensaje = "add-piso-habs";
            return $this->mensaje;
        } catch (\Throwable $error) {
            $this->mensaje = "no-add-piso-habs";
            return $this->mensaje;
        }
    }
    function buscar_habitaciones()
    {
        if (!empty($_POST['id_habitacion'])) {
            $consulta = $_POST["id_habitacion"];
            $sql = "SELECT HAB.id_habitaciones, C_HAB.precio, ES.nombre_estado, HAB.n_cuarto, C_HAB.nombre_categoria, PS.numero_piso, PS.numero_piso FROM habitaciones as HAB inner join cat_habitaciones as C_HAB on HAB.categoria=C_HAB.id_cat_habitaciones inner join piso as PS on HAB.piso=PS.id_piso inner join estado_habitacion as ES on HAB.estado=ES.id_estado_habitacion WHERE HAB.id_habitaciones=:id_habitacion";
            $query = $this->conexion->prepare($sql);
            $query->execute(array(":id_habitacion" => $consulta));
            $this->datos = $query->fetchAll(); // retorna objetos o no
            if (!empty($this->datos)) {

                return $this->datos;
            } else {
                $this->mensaje = "No existen registro de habitaciones";
                return $this->mensaje;
            }
        } else {
            if (!empty($_POST['id_piso'])) {

                $consulta = $_POST["id_piso"];
                $sql = "SELECT HAB.id_habitaciones, C_HAB.precio, ES.nombre_estado, HAB.n_cuarto, C_HAB.nombre_categoria, PS.numero_piso, PS.numero_piso FROM habitaciones as HAB inner join cat_habitaciones as C_HAB on HAB.categoria=C_HAB.id_cat_habitaciones inner join piso as PS on HAB.piso=PS.id_piso inner join estado_habitacion as ES on HAB.estado=ES.id_estado_habitacion WHERE HAB.piso=:id_piso";
                $query = $this->conexion->prepare($sql);
                $query->execute(array(":id_piso" => $consulta));
                $this->datos = $query->fetchAll(); // retorna objetos o no
                if (!empty($this->datos)) {

                    return $this->datos;
                } else {
                    $this->mensaje = "No existen registro de habitaciones";
                    return $this->mensaje;
                }
            } else {
                $sql = "SELECT HAB.id_habitaciones, C_HAB.precio, ES.nombre_estado, HAB.n_cuarto, C_HAB.nombre_categoria, PS.numero_piso, PS.numero_piso FROM habitaciones as HAB inner join cat_habitaciones as C_HAB on HAB.categoria=C_HAB.id_cat_habitaciones inner join piso as PS on HAB.piso=PS.id_piso inner join estado_habitacion as ES on HAB.estado=ES.id_estado_habitacion";
                $query = $this->conexion->prepare($sql);
                $query->execute();
                $this->datos = $query->fetchAll(); // retorna objetos o no
                if (!empty($this->datos)) {

                    return $this->datos;
                } else {
                    $this->mensaje = "No existen registro de habitaciones";
                    return $this->mensaje;
                }
            }
        }
    }
    function buscar_ocupaded_habs()
    {
        $sql = "SELECT HAB.id_habitaciones, C_HAB.precio, ES.nombre_estado, HAB.n_cuarto, C_HAB.nombre_categoria, PS.numero_piso FROM habitaciones as HAB inner join cat_habitaciones as C_HAB on HAB.categoria=C_HAB.id_cat_habitaciones inner join piso as PS on HAB.piso=PS.id_piso inner join estado_habitacion as ES on HAB.estado=ES.id_estado_habitacion WHERE HAB.estado=:estado";
        $query = $this->conexion->prepare($sql);
        $query->execute(array(":estado" => 2));
        $this->datos = $query->fetchAll(); // retorna objetos o no
        if (!empty($this->datos)) {

            return $this->datos;
        } else {
            $this->mensaje = "No existen registro de habitaciones";
            return $this->mensaje;
        }
    }


    // SECTION DE RESERVAS
    function buscar_reserva($id_habitacion)
    {
        $sql = "SELECT HAB.id_habitaciones, C_HAB.precio, HAB.n_cuarto, C_HAB.nombre_categoria, RE.id_reservas, RE.cliente, RE.documento, RE.fecha_entrada, RE.fecha_salida FROM reservas as RE inner join habitaciones as HAB on RE.habitacion=HAB.id_habitaciones inner join cat_habitaciones as C_HAB on HAB.categoria=C_HAB.id_cat_habitaciones  WHERE habitacion=:id_habitacion AND RE.estado_reserva='creado'";
        $query = $this->conexion->prepare($sql);
        $query->execute(array(":id_habitacion" => $id_habitacion));
        $this->datos = $query->fetchAll(); // retorna objetos o no
        if (!empty($this->datos)) {

            return $this->datos;
        } else {
            $this->mensaje = "No existen reservas en esta habitacion";
            return $this->mensaje;
        }
    }
    function buscar_detail_reserva($id_reserva)
    {
        $sql = "SELECT id_reservas, total, adelanto, descuento, total_descuento FROM reservas WHERE id_reservas=:id_reserva";
        $query = $this->conexion->prepare($sql);
        $query->execute(array(":id_reserva" => $id_reserva));
        $this->datos = $query->fetchAll(); // retorna objetos o no
        if (!empty($this->datos)) {

            return $this->datos;
        } else {
            $this->mensaje = "No existen  esta reserva";
            return $this->mensaje;
        }
    }
    function buscar_detail_consumo($id_reserva)
    {
        $sql = "SELECT RE.id_detalle_venta, RE.cantidad, RE.estado_pago, RE.subtotal, PRO.nombre, PRO.precio FROM detalle_venta as RE inner join productos as PRO on RE.id_producto=PRO.id_productos WHERE id_reserva=:id_reserva";
        $query = $this->conexion->prepare($sql);
        $query->execute(array(":id_reserva" => $id_reserva));
        $this->datos = $query->fetchAll(); // retorna objetos o no
        if (!empty($this->datos)) {

            return $this->datos;
        } else {
            $this->mensaje = "No existen registros de ventas para esta habitacion";
            return $this->mensaje;
        }
    }
    // FIN DE SECTION DE RESERVAS


    // SECTION PRODUCTOS
    function crear_productos($nombre, $precio, $inventario)
    {
        $sql = "INSERT INTO productos(nombre, precio, inventario) VALUES (:nombre, :precio, :inventario)";
        $query = $this->conexion->prepare($sql);
        try {
            $query->execute(array(":nombre" => $nombre, ":precio" => $precio, ":inventario" => $inventario));
            $this->mensaje = "add-producto";
            return $this->mensaje;
        } catch (\Throwable $error) {
            $this->mensaje = "no-add-producto";
            return $this->mensaje;
        }
    }
    function edit_producto($id_producto, $nombre, $precio, $inventario)
    {
        $sql = "UPDATE productos SET nombre=:nombre, precio=:precio, inventario=:inventario WHERE id_productos=:id_producto";
        $query = $this->conexion->prepare($sql);
        try {
            $query->execute(array(":id_producto" => $id_producto, ":nombre" => $nombre, ":precio" => $precio, ":inventario" => $inventario));
            $this->mensaje = "update-producto";
            return $this->mensaje;
        } catch (\Throwable $error) {
            $this->mensaje = "no-update-producto" . $error;
            return $this->mensaje;
        }
    }
    function buscar_productos()
    {
        $sql = "SELECT * FROM productos";
        $query = $this->conexion->prepare($sql);
        $query->execute();
        $this->datos = $query->fetchAll(); // retorna objetos o no
        if (!empty($this->datos)) {

            return $this->datos;
        } else {
            $this->mensaje = "no-create-products";
            return $this->mensaje;
        }
    }
    function buscar_producto_id($id_producto)
    {
        $sql = "SELECT * FROM productos WHERE id_productos=:id_producto";
        $query = $this->conexion->prepare($sql);
        $query->execute(array(":id_producto" => $id_producto));
        $this->datos = $query->fetchAll(); // retorna objetos o no
        if (!empty($this->datos)) {

            return $this->datos;
        } else {
            $this->mensaje = "no-existe-products";
            return $this->mensaje;
        }
    }
    function borrar_producto($id_producto)
    {
        $sql = "DELETE FROM productos WHERE id_productos=:id_productos";
        $query = $this->conexion->prepare($sql);
        try {
            $query->execute(array(":id_productos" => $id_producto));
            $this->mensaje = "remove-producto";
            return $this->mensaje;
        } catch (\Throwable $error) {
            $this->mensaje = "no-remove-producto";
            return $this->mensaje;
        }
    }
    // FIN DE SECTION PRODUCOTS

    // SECTION DE REGISTRO DE VENTAS DE PRODUCTOS A LAS HABITACIONES
    function registrar_ventas_productos($productos, $id_reserva, $option)
    {
        if ($option == 0) {
            $estado = "PAGADO";
        } else {
            $estado = "NO PAGADO";
        }
        for ($i = 0; $i < count($productos); $i++) {

            $sql = "INSERT INTO detalle_venta(id_reserva,id_producto,cantidad,subtotal, estado_pago) VALUES (:id_reserva,:id_producto,:cantidad,:subtotal, :estado_pago)";
            $query = $this->conexion->prepare($sql);

            $query->execute(array(":id_reserva" => $id_reserva, ":id_producto" => $productos[$i]["id"], ":cantidad" => $productos[$i]["cantidad"], ":subtotal" => $productos[$i]["cantidad"] * $productos[$i]["precio"], ":estado_pago" => $estado));
        }
        $this->mensaje = "add-producto";
        return $this->mensaje;
    }
    // FIN DE SECTION DE REGISTRO DE VENTAS DE PRODUCTOS A LAS HABITACIONES








    // SECTION CLIENTES
    function buscar_cliente($documento)
    {
        $sql = "SELECT id_cliente, nombres, documento FROM cliente WHERE documento=:documento";
        $query = $this->conexion->prepare($sql);
        $query->execute(array(":documento" => $documento));
        $this->datos = $query->fetchAll(); // retorna objetos o no
        if (!empty($this->datos)) {

            return $this->datos;
        } else {
            $this->mensaje = "No existen registro de este cliente cree uno nuevo";
            return $this->mensaje;
        }
    }
    function add_cliente($documento_tipo, $documento, $nombres)
    {
        $sql = "SELECT id_cliente, nombres, documento FROM cliente WHERE documento=:documento";
        $query = $this->conexion->prepare($sql);
        $query->execute(array(":documento" => $documento));
        $this->datos = $query->fetchAll(); // retorna objetos o no
        if (!empty($this->datos)) {

            $this->mensaje = "Existe el cliente";
            return $this->mensaje;
        } else {
            try {
                $sql = "INSERT INTO cliente(nombres, tipo_documento, documento) VALUES(:nombres, :tipo_documento, :documento)";
                $query = $this->conexion->prepare($sql);
                $query->execute(array(":nombres" => $nombres, ":tipo_documento" => $documento_tipo, ":documento" => $documento));
                $this->mensaje = "add-cliente";
                return $this->mensaje;
            } catch (\Throwable $error) {
                $this->mensaje = "no-add-cliente" . $error;
                return $this->mensaje;
            }
        }
    }

    function borrar_cliente($id_cliente)
    {
        $sql = "DELETE FROM cliente WHERE id_cliente=:id_cliente";
        $query = $this->conexion->prepare($sql);
        try {
            $query->execute(array(":id_cliente" => $id_cliente));
            $this->mensaje = "remove-cliente";
            return $this->mensaje;
        } catch (\Throwable $error) {
            $this->mensaje = "no-remove-cliente";
            return $this->mensaje;
        }
    }
    // GESTION DE CLIENTES USCAR CLIENTE

    function buscar_clientes()
    {
        try {
            $sql = "SELECT * FROM cliente";
            $query = $this->conexion->prepare($sql);
            $query->execute();
            $this->datos = $query->fetchAll(); // retorna objetos o no
            if (!empty($this->datos)) {
                return $this->datos;
            } else {
                $this->mensaje = "no-register-clientes";
                return $this->mensaje;
            }
        } catch (\Throwable $error) {
            $this->mensaje = "fatal_error";
            return $this->mensaje;
            //throw $th;
        }
    }

    // FIN DE SECTION DE CLIENTES

    // SECTION DE RESERVAS
    function crear_reserva($cliente, $documento, $id_hab, $ingreso, $salida, $descuento, $adelanto, $observacion, $total, $total_descuento)
    {
        $sql = "INSERT INTO reservas(cliente, documento, habitacion, fecha_entrada, fecha_salida, observacion, adelanto, descuento, total, total_descuento, estado_reserva) VALUES (:cliente, :documento, :habitacion, :fecha_entrada, :fecha_salida, :observacion, :adelanto, :descuento, :total, :total_descuento, :estado)";
        $query = $this->conexion->prepare($sql);
        try {
            $query->execute(array(":cliente" => $cliente, ":documento" => $documento, ":habitacion" => $id_hab, ":fecha_entrada" => $ingreso, ":fecha_salida" => $salida, ":observacion" => $observacion, ":adelanto" => $adelanto, ":descuento" => $descuento, ":total" => $total, ":total_descuento" => $total_descuento, ":estado" => 'creado'));
            $this->mensaje = "add-reserva";

            $sql = "UPDATE habitaciones SET estado=:estado WHERE id_habitaciones=:id_hab";
            $query = $this->conexion->prepare($sql);
            $query->execute(array(":estado" => 2, "id_hab" => $id_hab));
            return $this->mensaje;
        } catch (\Throwable $error) {
            $this->mensaje = "no-add-reserva" . $error;
            return $this->mensaje;
        }
    }
    function cerrar_reserva($total_pagar, $id_reserva, $id_hab, $fecha_today, $id_usuario)
    {
        $sql = "INSERT INTO ventas(id_usuario, id_reserva, total, fecha) VALUES (:id_usuario, :id_reserva, :total, :fecha)";
        $query = $this->conexion->prepare($sql);
        try {
            $query->execute(array(":id_usuario" => $id_usuario, ":id_reserva" => $id_reserva, ":total" => $total_pagar, ":fecha" => $fecha_today));
            $this->mensaje = "venta_close";

            $sql = "UPDATE habitaciones SET estado=:estado WHERE id_habitaciones=:id_hab";
            $query = $this->conexion->prepare($sql);
            $query->execute(array(":estado" => 3, ":id_hab" => $id_hab));


            // ACTUALIZAR ESTADO DE LA RESERVA
            $sql = "UPDATE reservas SET estado_reserva=:estado_reserva WHERE id_reservas=:id_reserva";
            $query = $this->conexion->prepare($sql);
            $query->execute(array(":estado_reserva" => "finalizado", ":id_reserva" => $id_reserva));

            // ACTUALIZAR ESTADO DE DETALLES DE VENTA
            if (!empty($_POST["carrito_consumo"])) {
                $carrito_consumo = $_POST["carrito_consumo"];
                $length = count($carrito_consumo);
                for ($i = 0; $i < $length; $i++) {
                    $sql = "UPDATE detalle_venta SET estado_pago=:estado_pago WHERE id_detalle_venta=:id_detalle_venta";
                    $query = $this->conexion->prepare($sql);
                    $query->execute(array(":estado_pago" => "PAGADO", ":id_detalle_venta" => $carrito_consumo[$i]["id"]));
                }
            }

            return $this->mensaje;
        } catch (\Throwable $error) {
            $this->mensaje = "no-add-reserva" . $error;
            return $this->mensaje;
        }
    }
    function habitacion_limpieza_terminada($key)
    {
        try {
            $sql = "UPDATE habitaciones SET estado=:estado WHERE id_habitaciones=:id_hab";
            $query = $this->conexion->prepare($sql);
            $query->execute(array(":estado" => 1, "id_hab" => $key));
            $this->mensaje = "change_exito";
            return $this->mensaje;
        } catch (\Throwable $error) {
            $this->mensaje = "change_fracaso" . $error;
            return $this->mensaje;
        }
    }
}
