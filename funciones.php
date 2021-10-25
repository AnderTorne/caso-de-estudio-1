<?php

function obtenerProductosEnCarrito(){
    $bd = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    $sentencia = $bd->prepare("SELECT productos.id, productos.titulo, productos.autor, productos.editorial, productos.genero, productos.precio
     FROM productos
     INNER JOIN carrito_usuarios
     ON productos.id = carrito_usuarios.id_producto
     WHERE carrito_usuarios.id_sesion = ?");
    $idSesion = session_id();
    $sentencia->execute([$idSesion]);
    return $sentencia->fetchAll();
}

function obtenerProductosPedido($idactual){
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT productos.id, productos.titulo, productos.autor, productos.editorial, productos.genero, productos.precio
    FROM productos
    INNER JOIN pedido_cliente
    ON productos.id = pedido_cliente.id_producto
    WHERE pedido_cliente.id_cliente = ?");
    $sentencia->execute([$idactual]);
    return $sentencia->fetchAll();
}

function quitarProductoDelCarrito($idProducto){
    $bd = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    $idSesion = session_id();
    $sentencia = $bd->prepare("DELETE FROM carrito_usuarios WHERE id_sesion = ? AND id_producto = ?");
    return $sentencia->execute([$idSesion, $idProducto]);
}

function obtenerProductos(){
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT id, titulo, autor, editorial, genero, precio, imagen FROM productos");
    return $sentencia->fetchAll();
}

function obtenerProductosTS(){
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT id, titulo, autor, editorial, genero, precio, imagen FROM productos WHERE id = 3 OR id = 12");
    return $sentencia->fetchAll();
}

function obtenerProductosB($busqueda){
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT * FROM productos WHERE titulo LIKE '%$busqueda%'");
    return $sentencia->fetchAll();
}

function obtenerProductosBR(){
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT * FROM productos WHERE genero LIKE '%Fantasia%'");
    return $sentencia->fetchAll();
}
function obtenerPagos(){
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT * FROM proveedores");
    return $sentencia->fetchAll();
}

function obtenerPedidos(){
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT * FROM pedidos");
    return $sentencia->fetchAll();
}

function productoYaEstaEnCarrito($idProducto){
    $ids = obtenerIdsDeProductosEnCarrito();
    foreach ($ids as $id) {
        if ($id == $idProducto) return true;
    }
    return false;
}

function obtenerIdsDeProductosEnCarrito(){
    $bd = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    $sentencia = $bd->prepare("SELECT id_producto FROM carrito_usuarios WHERE id_sesion = ?");
    $idSesion = session_id();
    $sentencia->execute([$idSesion]);
    return $sentencia->fetchAll(PDO::FETCH_COLUMN);
}

function agregarProductoAlCarrito($idProducto){
    // Ligar el id del producto con el usuario a través de la sesión
    $bd = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    $idSesion = session_id();
    $sentencia = $bd->prepare("INSERT INTO carrito_usuarios(id_sesion, id_producto) VALUES (?, ?)");
    return $sentencia->execute([$idSesion, $idProducto]);
}

function agregarProductoPedido($id_cliente, $idProducto){
    // Ligar el id del producto con el pedido
    $bd = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    $sentencia = $bd->prepare("INSERT INTO productos_pedido(id_cliente, id_producto) VALUES (?, ?)");
    return $sentencia->execute([$id_cliente, $idProducto]);
}

function obtenerIdCliente(){
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT id FROM pedidos WHERE id_sesion = ?");
    $idSesion = session_id();
    $sentencia->execute([$idSesion]);
    return $sentencia->fetchAll(PDO::FETCH_COLUMN);
}

function idparaPedido(){
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT MAX(id) AS id FROM pedidos");
    return $sentencia->fetchAll();
}

function iniciarSesionSiNoEstaIniciada(){
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
}

function eliminarProducto($id){
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM productos WHERE id = ?");
    return $sentencia->execute([$id]);
}

function guardarProducto($titulo, $autor, $editorial, $genero, $precio){
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO productos(titulo, autor, editorial, genero, precio) VALUES(?, ?, ?, ?, ?)");
    return $sentencia->execute([$titulo, $autor, $editorial, $genero, $precio]);
}

function guardarProveedor($nombre, $clabe, $cantidad){
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO proveedores(nombre, clabe, cantidad) VALUES(?, ?, ?)");
    return $sentencia->execute([$nombre, $clabe, $cantidad]);
}
function guardarEnvio($nombre, $apellido, $direccion, $cp, $ciudad, $nombreT, $numeroT, $fechaEX, $cvv, $status, $envio, $rastreo){
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO pedidos(nombre, apellido, direccion, zip, ciudad, nombreT, numeroT, fechaEX, cvv, status, envio, rastreo) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    return $sentencia->execute([$nombre, $apellido, $direccion, $cp, $ciudad, $nombreT, $numeroT, $fechaEX, $cvv, $status,  $envio, $rastreo]);
}

function guardarEnvioP($nombre, $apellido, $direccion, $zip, $ciudad, $nombreT, $numeroT, $fechaEX, $cvv, $status, $envio, $rastreo, $precio){
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO pedidos(nombre, apellido, direccion, zip, ciudad, nombreT, numeroT, fechaEX, cvv, status, envio, rastreo, precio) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    return $sentencia->execute([$nombre, $apellido, $direccion, $zip, $ciudad, $nombreT, $numeroT, $fechaEX, $cvv, $status,  $envio, $rastreo, $precio]);
}
function guardarPedidoCliente($id_cliente,$id_producto){
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO pedido_cliente(id_cliente, id_producto) VALUES(?, ?)");
    return $sentencia->execute([$id_cliente, $id_producto]);
}


function obtenerVariableDelEntorno($key){
    if(defined("_ENV_CACHE")){
        $vars = _ENV_CACHE;
    }
    else{
        $file = "env.php";
        if(!file_exists($file)){
            throw new Exception("El archivo de las variables de entorno ($file) no existe. Favor de crearlo");
        }
        $vars = parse_ini_file($file);
        define("_ENV_CACHE", $vars);
    }
    if(isset($vars[$key])){
        return $vars[$key];
    }
    else{
        throw new Exception("La clave especificada (" . $key . ") no existe en el archivo de las variables de entorno");
    }
}

function obtenerConexion(){
    $password = obtenerVariableDelEntorno("MYSQL_PASSWORD");
    $user = obtenerVariableDelEntorno("MYSQL_USER");
    $dbName = obtenerVariableDelEntorno("MYSQL_DATABASE_NAME");
    $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}
