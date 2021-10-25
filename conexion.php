<?php
    $conexion = new mysqli("localhost","root","","tienda");

    if(!$conexion){
        echo "Conexion fallida";
    }
?>