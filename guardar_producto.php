<?php
    include_once "funciones.php";
    $bd=obtenerConexion();

    $titulo=$_POST['titulo'];
    $autor=$_POST['autor'];
    $editorial=$_POST['editorial'];
    $genero=$_POST['genero'];
    $precio=$_POST['precio'];
    $imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    
    $query="INSERT INTO productos(titulo,autor,editorial,genero,precio,imagen) VALUES('$titulo','$autor','$editorial', '$genero', '$precio', '$imagen')";
    $bd->query($query);

    header("Location: productos.php");