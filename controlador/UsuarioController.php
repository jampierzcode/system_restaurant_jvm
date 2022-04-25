<?php
include_once '../modelo/Usuario.php';
$usuario = new Usuario();
session_start();
$id_usuario = $_SESSION['id_usuario'];


// SECTION DASHBOARD CONTABILIDAD
if ($_POST["funcion"] == "buscar_datos_contabilidad") {
    $json = array();
    $usuario->buscar_datos_contabilidad();
    // echo $usuario->datos;
    if ($usuario->datos) {
        foreach ($usuario->datos as $dato) {
            $json[] = array(
                'reservas' => $dato->reservas,
                'clientes' => $dato->clientes,
                'habitaciones' => $dato->habitaciones,
                'ventas' => $dato->ventas
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
}



// SECTION DE CLIENTES
if ($_POST["funcion"] == "buscar_cliente") {
    $documento = $_POST["documento"];
    $json = array();
    $usuario->buscar_cliente($documento);
    if ($usuario->mensaje) {
        echo $usuario->mensaje;
    }
    if ($usuario->datos) {
        foreach ($usuario->datos as $dato) {
            $json[] = array(
                'id_cliente' => $dato->id_cliente,
                'nombres' => $dato->nombres,
                'documento' => $dato->documento
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
}

if ($_POST["funcion"] == "buscar_cliente_id") {
    $id_producto = $_POST["id_producto"];
    $json = array();
    $usuario->buscar_producto_id($id_producto);
    if ($usuario->mensaje) {
        echo $usuario->mensaje;
    }
    if ($usuario->datos) {
        foreach ($usuario->datos as $dato) {
            $json[] = array(
                'id_productos' => $dato->id_productos,
                'nombre' => $dato->nombre,
                'precio' => $dato->precio,
                'inventario' => $dato->inventario
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
}
if ($_POST["funcion"] == "borrar_cliente") {
    $id_cliente = $_POST["id_cliente"];
    $usuario->borrar_cliente($id_cliente);
    echo $usuario->mensaje;
}
if ($_POST["funcion"] == "edit_cliente") {
    $id_producto = $_POST["id_producto"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $inventario = $_POST["inventario"];
    $usuario->edit_producto($id_producto, $nombre, $precio, $inventario);
    echo $usuario->mensaje;
}

// FIN DE SECTION DE CLIENTES

// SECTION DE RESERVAS
if ($_POST["funcion"] == "buscar_reserva") {
    $id_habitacion = $_POST["id_habitacion"];
    $json = array();
    $usuario->buscar_reserva($id_habitacion);
    if ($usuario->mensaje) {
        echo $usuario->mensaje;
    }
    if ($usuario->datos) {
        foreach ($usuario->datos as $dato) {
            $json[] = array(
                'id_reservas' => $dato->id_reservas,
                'cliente' => $dato->cliente,
                'documento' => $dato->documento,
                'id_habitaciones' => $dato->id_habitaciones,
                'precio' => $dato->precio,
                'n_cuarto' => $dato->n_cuarto,
                'nombre_categoria' => $dato->nombre_categoria,
                'fecha_entrada' => $dato->fecha_entrada,
                'fecha_salida' => $dato->fecha_salida,
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
}
// SECTION DE DETAIL RESERVAS
if ($_POST["funcion"] == "buscar_detail_reserva") {
    $id_reserva = $_POST["id_reserva"];
    $json = array();
    $usuario->buscar_detail_reserva($id_reserva);
    if ($usuario->mensaje) {
        echo $usuario->mensaje;
    }
    if ($usuario->datos) {
        foreach ($usuario->datos as $dato) {
            $json[] = array(
                'id_reservas' => $dato->id_reservas,
                'total' => $dato->total,
                'descuento' => $dato->descuento,
                'adelanto' => $dato->adelanto,
                'total_descuento' => $dato->total_descuento
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
}
// SECTION DE DETAIL CONSUMO
if ($_POST["funcion"] == "buscar_detail_consumo") {
    $id_reserva = $_POST["id_reserva"];
    $json = array();
    $usuario->buscar_detail_consumo($id_reserva);
    if ($usuario->mensaje) {
        echo $usuario->mensaje;
    }
    if ($usuario->datos) {
        foreach ($usuario->datos as $dato) {
            $json[] = array(
                'id_detalle_venta' => $dato->id_detalle_venta,
                'cantidad' => $dato->cantidad,
                'estado_pago' => $dato->estado_pago,
                'subtotal' => $dato->subtotal,
                'nombre' => $dato->nombre,
                'precio' => $dato->precio
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
}

if ($_POST["funcion"] == "subir_foto_producto") {
    if (($_FILES['imagen_producto']['type'] == 'image/jpeg') || ($_FILES['imagen_producto']['type'] == 'image/png') || ($_FILES['imagen_producto']['type'] == 'image/jpg')) {
        $nombre = uniqid() . '-' . $_FILES['imagen_producto']['name'];
        $ruta = '../img/productos/' . $nombre;
        move_uploaded_file($_FILES['imagen_producto']['tmp_name'], $ruta);
        echo $ruta;
    } else {
        echo "no_format_imagen";
    }
}

// FIN DE SECTION DE RESERVAS

// SECTION PRODUCTOS
if ($_POST["funcion"] == "crear_productos") {
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $inventario = $_POST["inventario"];
    $usuario->crear_productos($nombre, $precio, $inventario);
    echo $usuario->mensaje;
}
if ($_POST["funcion"] == "buscar_productos") {
    $json = array();
    $usuario->buscar_productos();
    if ($usuario->mensaje) {
        echo $usuario->mensaje;
    }
    if ($usuario->datos) {
        foreach ($usuario->datos as $dato) {
            $json[] = array(
                'id_productos' => $dato->id_productos,
                'nombre' => $dato->nombre,
                'precio' => $dato->precio,
                'inventario' => $dato->inventario
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
}
if ($_POST["funcion"] == "buscar_producto_id") {
    $id_producto = $_POST["id_producto"];
    $json = array();
    $usuario->buscar_producto_id($id_producto);
    if ($usuario->mensaje) {
        echo $usuario->mensaje;
    }
    if ($usuario->datos) {
        foreach ($usuario->datos as $dato) {
            $json[] = array(
                'id_productos' => $dato->id_productos,
                'nombre' => $dato->nombre,
                'precio' => $dato->precio,
                'inventario' => $dato->inventario
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
}
if ($_POST["funcion"] == "borrar_producto") {
    $id_producto = $_POST["id_producto"];
    $usuario->borrar_producto($id_producto);
    echo $usuario->mensaje;
}
if ($_POST["funcion"] == "edit_producto") {
    $id_producto = $_POST["id_producto"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $inventario = $_POST["inventario"];
    $usuario->edit_producto($id_producto, $nombre, $precio, $inventario);
    echo $usuario->mensaje;
}
// FIN DE SECTION PRODUCTOS

// SECTION DE VENTAS DE PRODUCTOS
if ($_POST["funcion"] == "registrar_ventas_productos") {
    $json = array();
    $productos = $_POST["carrito"];
    $id_reserva = $_POST["id_reserva"];
    $option = $_POST["option"];
    $usuario->registrar_ventas_productos($productos, $id_reserva, $option);
    echo $usuario->mensaje;
}
// FIN DE SECTION DE VENTAS DE PRODUCTOS



// SECTION DE HABITACIONES

if ($_POST["funcion"] == "crear_habitacion") {
    $n_habitacion = $_POST["n_habitacion"];
    $habs_piso = $_POST["habs_piso"];
    $habs_cat = $_POST["habs_cat"];
    $usuario->crear_habitaciones($n_habitacion, $habs_piso, $habs_cat);
    echo $usuario->mensaje;
}
if ($_POST["funcion"] == "crear_cat-habitacion") {
    $categoria_nombre = $_POST["categoria_nombre"];
    $categoria_precio = $_POST["categoria_precio"];
    $usuario->crear_cat_habitaciones($categoria_nombre, $categoria_precio);
    echo $usuario->mensaje;
}
if ($_POST["funcion"] == "crear_piso-habitacion") {
    $piso_nombre = $_POST["piso_nombre"];
    $usuario->crear_piso_habitaciones($piso_nombre);
    echo $usuario->mensaje;
}
if ($_POST["funcion"] == "buscar_habitacion") {
    $json = array();
    $usuario->buscar_habitaciones();
    if ($usuario->mensaje) {
        echo $usuario->mensaje;
    }
    if ($usuario->datos) {
        foreach ($usuario->datos as $dato) {
            $json[] = array(
                'id_habitaciones' => $dato->id_habitaciones,
                'n_cuarto' => $dato->n_cuarto,
                'precio' => $dato->precio,
                'nombre_categoria' => $dato->nombre_categoria,
                'numero_piso' => $dato->numero_piso,
                'estado' => $dato->nombre_estado
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
}
if ($_POST["funcion"] == "buscar_cat_hab") {
    $json = array();
    $usuario->buscar_cat_hab();
    if ($usuario->mensaje) {
        echo $usuario->mensaje;
    }
    if ($usuario->datos) {
        foreach ($usuario->datos as $dato) {
            $json[] = array(
                'id_categoria' => $dato->id_cat_habitaciones,
                'nombre_categoria' => $dato->nombre_categoria
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
}
if ($_POST["funcion"] == "buscar_piso_hab") {
    $json = array();
    $usuario->buscar_piso_hab();
    if ($usuario->mensaje) {
        echo $usuario->mensaje;
    }
    if ($usuario->datos) {
        foreach ($usuario->datos as $dato) {
            $json[] = array(
                'id_piso' => $dato->id_piso,
                'numero_piso' => $dato->numero_piso
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
}

if ($_POST["funcion"] == "buscar_habs_ocupaded") {
    $json = array();
    $usuario->buscar_ocupaded_habs();
    if ($usuario->mensaje) {
        echo $usuario->mensaje;
    }
    if ($usuario->datos) {
        foreach ($usuario->datos as $dato) {
            $json[] = array(
                'id_habitaciones' => $dato->id_habitaciones,
                'n_cuarto' => $dato->n_cuarto,
                'precio' => $dato->precio,
                'nombre_categoria' => $dato->nombre_categoria,
                'numero_piso' => $dato->numero_piso,
                'estado' => $dato->nombre_estado
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
}

// FIN DE HABITACIONES

// SECTION RESERVAS
if ($_POST["funcion"] == "crear_reserva") {
    $cliente = $_POST["cliente"];
    $documento = $_POST["documento"];
    $ingreso = $_POST["ingreso"];
    $salida = $_POST["salida"];
    $descuento = $_POST["descuento"];
    $adelanto = $_POST["adelanto"];
    $observacion = $_POST["observacion"];
    $total = $_POST["total"];
    $id_hab = $_POST["id_hab"];
    $total_descuento = $_POST["total_descuento"];
    $usuario->crear_reserva($cliente, $documento, $id_hab, $ingreso, $salida, $descuento, $adelanto, $observacion, $total, $total_descuento);
    $_SESSION["msg-reserva"] = "add-reserva";
    echo $usuario->mensaje;
}
if ($_POST["funcion"] == "cerrar_reserva") {
    $total_pagar = $_POST["total_pagar"];
    $id_reserva = $_POST["id_reserva"];
    $id_hab = $_POST["id_hab"];
    $fecha_today = $_POST["fecha_today"];
    $usuario->cerrar_reserva($total_pagar, $id_reserva, $id_hab, $fecha_today, $id_usuario);
    echo $usuario->mensaje;
}
if ($_POST["funcion"] == "habitacion_limpieza_terminada") {
    $key = $_POST["key"];
    $usuario->habitacion_limpieza_terminada($key);
    echo $usuario->mensaje;
}

// FIN DE SECTION RESERVAS

// SECTION DE CLIENTES 
// CREAR CLIENTES DESDE RECEPCION

if ($_POST["funcion"] == "add_cliente") {
    $tipo_documento = $_POST["tipo_documento"];
    $documento = $_POST["documento"];
    $nombres = $_POST["nombres"];
    if ($tipo_documento == 1) {
        $documento_tipo = "DNI";
    } else {
        $documento_tipo = "RUC";
    }
    $usuario->add_cliente($documento_tipo, $documento, $nombres);
    echo $usuario->mensaje;
}
// BUSCAR CLIENTES


if ($_POST["funcion"] == "buscar_clientes") {
    $json = array();
    $usuario->buscar_clientes();
    if ($usuario->mensaje) {
        echo $usuario->mensaje;
    }
    if ($usuario->datos) {
        foreach ($usuario->datos as $dato) {
            $json[] = array(
                'id_cliente' => $dato->id_cliente,
                'nombres' => $dato->nombres,
                'tipo_documento' => $dato->tipo_documento,
                'documento' => $dato->documento
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
}

// FIN DE SECTION DE CLIENTES CREAR CLIENTES DESDE RECEPCION