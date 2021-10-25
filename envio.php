<?php
// if (!isset($_POST["nombre"]) || !isset($_POST["apellido"]) || !isset($_POST["direccion"]) || !isset($_POST["cp"]) || !isset($_POST["ciudad"]) || !isset($_POST["nombreT"]) || !isset($_POST["numeroT"]) || !isset($_POST["fechaEX"]) || !isset($_POST["cvv"])){
//     exit("Faltan datos");
// }
include_once "funciones.php";
include_once "conexion.php";
$bd=obtenerConexion();

$IDproductos = obtenerIdsDeProductosEnCarrito();
$productos = obtenerProductosEnCarrito();
$total=0;
$envio;

if(isset($_POST['envio'])){
    $envio = $_POST['envio'];
}else{
    $envio="Estandar";
}


foreach ($productos as $producto) {

    $total += $producto->precio;
}
$ras=rand(1000000000,9999999999);
if($envio=="Rapido"){
    guardarEnvioP($_POST["nombre"], $_POST["apellido"], $_POST["direccion"], $_POST["zip"], $_POST["ciudad"], $_POST["nombreT"], $_POST["numeroT"],$_POST["fechaEX"], $_POST["cvv"], "Enviado", $envio, $ras, $total+300);
}else{
    guardarEnvioP($_POST["nombre"], $_POST["apellido"], $_POST["direccion"], $_POST["zip"], $_POST["ciudad"], $_POST["nombreT"], $_POST["numeroT"],$_POST["fechaEX"], $_POST["cvv"], "Enviado", $envio, $ras, $total);
}
///
$sql=("SELECT MAX(id) FROM pedidos");
$res=$conexion->query($sql);
$maxID;
while($row=mysqli_fetch_array($res)){
    $maxID=$row["MAX(id)"];
}

foreach($IDproductos as $IDproducto){
    $ultimoID = idparaPedido();
    guardarPedidoCliente($maxID,$IDproducto);
}


header("Location: pedidos.php");