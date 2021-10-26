<?php
include_once "encabezado.php";
//var_dump($productos);
$productos = obtenerProductosEnCarrito();
$IDproductos = obtenerIdsDeProductosEnCarrito();
?>

<div class="columns">
    
    <div class="column is-one-third">
    <h2 class="is-size-2">Nuevo pago</h2>
    <form action="envio.php" method="post" enctype="multipart/form-data">
    
            <table class="table">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>Editorial</th>
                        <th>Genero</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $total=0;
                        foreach($productos as $producto){
                            $total +=$producto->precio;
                        ?>
                        <tr>
                            <td><?php echo $producto->titulo ?></td>
                            <td><?php echo $producto->autor ?></td>
                            <td><?php echo $producto->editorial ?></td>
                            <td><?php echo $producto->genero ?></td>
                            <td><?php echo $producto->precio ?></td>
                            <?php } ?>
                        </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="is-size-4 has-text-right"><strong>Total</strong></td>
                        <td colspan="2" class="is-size-4">
                        $<?php echo number_format($total, 2) ?>
                        </td>
                    </tr>
                </tfoot>
            </table>

            <div class="field">
                <label for="nombre">Nombre</label>
                <div class="control">
                    <input required id="nombre" class="input" type="text" placeholder="Nombre..." name="nombre">
                </div>
            </div>

            <div class="field">
                <label for="apellido">Apellido</label>
                <div class="control">
                    <input required id="apellido" class="input" type="text" placeholder="Apellido..." name="apellido">
                </div>
            </div>

            <div class="field">
                <label for="direccion">Direccion</label>
                <div class="control">
                    <input required id="direccion" class="input" type="text" placeholder="Direccion..." name="direccion">
                </div>
            </div>

            <div class="field">
                <label for="zip">Codigo Postal</label>
                <div class="control">
                    <input required id="zip" class="input" type="text" placeholder="Codigo Postal..." name="zip">
                </div>
            </div>

            <div class="field">
                <label for="ciudad">Ciudad</label>
                <div class="control">
                    <input required id="ciudad" class="input" type="text" placeholder="Ciudad..." name="ciudad">
                </div>
            </div>

                    <br>

            <div class="field">
                <label for="nombreT">Nombre que Aparece en la Tarjeta</label>
                <div class="control">
                    <input required id="nombreT" class="input" type="text" placeholder="Nombre que Aparece en la Tarjeta..." name="nombreT">
                </div>
            </div>

            <div class="field">
                <label for="numeroT">Numero de Tarjeta</label>
                <div class="control">
                    <input required id="numeroT" class="input" type="text" placeholder="Numero de Tarjeta..." name="numeroT">
                </div>
            </div>

            <div class="field">
                <label for="fechaEX">Fecha de Expiracion</label>
                <div class="control">
                    <input required id="fechaEX" class="input" type="text" placeholder="Fecha de Expiracion..." name="fechaEX">
                </div>
            </div>

            <div class="field">
                <label for="cvv">CVV</label>
                <div class="control">
                    <input required id="cvv" class="input" type="text" placeholder="CVV..." name="cvv">
                </div>
            </div>
   
            <div>
                <input required id="envio" type="radio" name="envio" value="Estandar">Envio Estandar
                <input required id="envio" type="radio" name="envio" value="Rapido">Envio Rapido +$300
            </div>
            <br>
            <div class="field">
                <div class="control">
                    <button class="button is-success">Confirmar Pedido</button>
                    <a href="ver_carrito.php" class="button is-warning">Volver</a>
                </div>
            </div>


        </from>
    </div>
</div>