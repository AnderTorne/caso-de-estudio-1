<?php
    include_once "encabezado.php";
    include_once 'funciones.php';
    include_once 'conexion.php';
    //$productos = obtenerProductosEnCarrito();
    $pedidos = obtenerPedidos(); ?>

<div class="columns">
    <div class="column">
        <h2 class="is-size-2">Pedidos</h2>
    </div>
</div>


<?php foreach($pedidos as $pedido){ 
    $productos = obtenerProductosPedido($pedido->id);?>
    <div class="columns">
        <div class="column is-full">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title is-size-4">
                        <?php echo $pedido->nombre ?>
                        <?php echo $pedido->apellido ?>
                    </p>
                </header>
                <div class="card-content">
                <h2 class="is-size-3">Info</h2>
                    <div class="direccion">
                        <?php echo "<b>Direccion: </b>", $pedido->direccion ?>
                        <?php echo "<b>CP: </b>", $pedido->zip ?>

                    </div>

                    <div class="ciudad">
                        <?php echo "<b>Ciudad: </b>",$pedido->ciudad ?>
                    </div>
                    
                    <div class="envio">
                        <?php echo "<b>Tipo de envio: </b>",$pedido->envio ?>
                    </div>
                    
                    <div class="status">
                        <?php echo "<b>Status: </b>: ",$pedido->status ?>
                    </div>

                    <div class="rastreo">
                        <?php echo "<b>Numero de rastreo: </b> ",$pedido->rastreo ?>
                    </div>

                    <div class="tarjeta">
                        <?php echo "<b>Tarjeta: </b>: ",$pedido->numeroT ?>
                    </div>

                    <h1 class="is-size-4">Total: $<?php echo number_format($pedido->precio, 2) ?></h1>



                    <div class="column">
                    <h2 class="is-size-4">Su Pedido</h2>
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
                            $total = 0;
                            foreach ($productos as $producto) {
                                $total += $producto->precio;
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
                    </table>
                </div>
                    
                </div>
                </div>
    </div>
</div>
    <?php } ?>
                
