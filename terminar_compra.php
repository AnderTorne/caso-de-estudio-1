<?php
include_once "funciones.php";
include_once "encabezado.php";
include_once 'conexion.php';
$productos = obtenerProductosEnCarrito();
$IDproductos = obtenerIdsDeProductosEnCarrito();
//var_dump($productos);
?>

<div class="columns">
    <div class="column">
        <h2 class="is-size-2">Su Pedido</h2>
        <from action="envio2.php" method="post">

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

            <div class="column is-one-third">
                

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
   
               
            </div>

            <a href="envio.php" class="button is-success is-large">Envio Estandar</a>
            <a href="envioR.php" class="button is-success is-large">Envio Rapido +$300</a> 
        </from>
    </div>
</div>