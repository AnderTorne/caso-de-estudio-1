<?php include_once "encabezado.php" ?>
<div class="columns">
    <div class="column is-one-third">
        <h2 class="is-size-2">Nuevo producto</h2>
        <form action="guardar_producto2.php" method="post" enctype="multipart/form-data">

            <div class="field">
                <label for="titulo">Titulo</label>
                <div class="control">
                    <input required id="titulo" class="input" type="text" placeholder="Titulo..." name="titulo">
                </div>
            </div>

            <div class="field">
                <label for="autor">Autor</label>
                <div class="control">
                    <input required id="autor" class="input" type="text" placeholder="Autor..." name="autor">
                </div>
            </div>

            <div class="field">
                <label for="editorial">Editorial</label>
                <div class="control">
                    <input required id="editorial" class="input" type="text" placeholder="Editorial..." name="editorial">
                </div>
            </div>

            <div class="field">
                <label for="genero">Genero</label>
                <div class="control">
                    <input required id="genero" class="input" type="text" placeholder="Genero..." name="genero">
                </div>
            </div>

            <div class="field">
                <label for="precio">Precio</label>
                <div class="control">
                    <input required id="precio" name="precio" class="input" type="number" placeholder="Precio...">
                </div>
            </div>

            <div class="field">
                <label for="imagen">Imagen</label>
                <div class="control">
                    <input  id="imagen" name="imagen" type="file">
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-success">Guardar</button>
                    <a href="productos.php" class="button is-warning">Volver</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once "pie.php" ?>