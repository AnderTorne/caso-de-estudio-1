<?php
if (!isset($_POST["titulo"]) || !isset($_POST["autor"]) || !isset($_POST["editorial"]) || !isset($_POST["genero"]) || !isset($_POST["precio"]) ){
    exit("Faltan datos");
}
include_once "funciones.php";
guardarProducto($_POST["titulo"], $_POST["autor"], $_POST["editorial"], $_POST["genero"], $_POST["precio"]);
header("Location: productos.php");
