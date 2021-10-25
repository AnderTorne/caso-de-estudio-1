<?php
    include_once "encabezado.php";
    include_once 'funciones.php';
    include_once 'conexion.php'; ?>

<div class="columns">
    <div class="column is-one-third">
        <h2 class="is-size-2">Nuevo pago</h2>
        <form action="guardar_proveedor.php" method="post" enctype="multipart/form-data">

            <div class="field">
                <label for="nombre">Nombre</label>
                <div class="control">
                    <input required id="nombre" class="input" type="text" placeholder="Nombre..." name="nombre">
                    </div>
            </div>

            <div class="field">
                <label for="clabe">CLABE</label>
                <div class="control">
                    <input required id="clabe" class="input" type="text" placeholder="CLABE..." name="clabe">
                </div>
            </div>

            <div class="field">
                <label for="cantidad">Cantidad</label>
                <div class="control">
                    <input required id="cantidad" class="input" type="text" placeholder="Cantidad..." name="cantidad">
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-success">Guardar</button>
                    <a href="proveedores.php" class="button is-warning">Volver</a>
                </div>
            </div>
        </form>
    </div>
</div>