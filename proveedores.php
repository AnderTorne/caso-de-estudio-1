<?php
    include_once "encabezado.php";
    include_once 'funciones.php';
    include_once 'conexion.php';
    $pagos = obtenerPagos(); ?>

    <div class="columns">
        <div class="column">
            <h2 class="is-size-2">Pago a Proveedores</h2>
        </div>
    </div>

    <div class="columns">
    <div class="column">
        <h4 class="is-size-4">Pagos realizados</h4><br>
        <a class="button is-success" href="agregar_proveedor.php">Nuevo&nbsp;<i class="fa fa-plus"></i></a>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>CLABE</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pagos as $pago) { ?>
                    <tr>
                        <td><?php echo $pago->id ?></td>
                        <td><?php echo $pago->nombre ?></td>
                        <td><?php echo $pago->clabe ?></td>
                        <td><?php echo $pago->cantidad ?></td>
                    <?php } ?>
                    </tr>
            </tbody>
        </table>
    </div>
</div>