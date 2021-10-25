<?php
if (!isset($_POST["nombre"]) || !isset($_POST["clabe"]) || !isset($_POST["cantidad"])){
    exit("Faltan datos");
}
include_once "funciones.php";
guardarProveedor($_POST["nombre"], $_POST["clabe"], $_POST["cantidad"]);
header("Location: proveedores.php");