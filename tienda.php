<?php include_once "encabezado.php" ?>
<?php
include_once "funciones.php";
$productos = obtenerProductos();
include ("conexion.php");

?>

<div class="columns">
    <div class="column">
        <h2 class="is-size-2">Tienda</h2>
    </div>
</div>
<?php foreach($productos as $producto){ ?>

<div class="columns">
    <div class="column is-full">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title is-size-4">
                    <?php echo $producto->titulo ?>
                </p>
            </header>
            <div class="card-content">
                <div class="autor">
                    <?php echo $producto->autor ?>
                </div>

                <div class="editorial">
                    <?php echo $producto->editorial ?>
                </div>

                <div class="genero">
                    <?php echo $producto->genero ?>
                </div>
                
                <h1 class="is-size-3">$<?php echo number_format($producto->precio, 2) ?></h1>
                <td><img  height="200px" width="200px" src="data:image/jpg;base64,<?php echo base64_encode($producto->imagen);?>"/></td>

                <?php if (productoYaEstaEnCarrito($producto->id)) { ?>
                    <form action="eliminar_del_carrito.php" method="post">
                        <input type="hidden" name="id_producto" value="<?php echo $producto->id ?>">
                        <span class="button is-success">
                            <i class="fa fa-check"></i>&nbsp;En el carrito
                        </span>
                        <button class="button is-danger">
                            <i class="fa fa-trash-o"></i>&nbsp;Quitar
                        </button>
                    </form>
                <?php }
                    else{ ?>
                        <form action="agregar_al_carrito.php" method="post">
                            <input type="hidden" name="id_producto" value="<?php echo $producto->id ?>">
                            <button class="button is-primary">
                                <i class="fa fa-cart-plus"></i>&nbsp;Agregar al carrito
                            </button>
                        </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<div class="columns">
    <div class="column">
        <h2 class="is-size-2">Mas Vendidos</h2>
    </div>
</div>

<?php
include_once "funciones.php";
$productosTS = obtenerProductosTS();
?>

<?php foreach($productosTS as $productoTS){ ?>

<div class="columns">
    <div class="column is-full">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title is-size-4">
                    <?php echo $productoTS->titulo ?>
                </p>
            </header>
            <div class="card-content">
                <div class="autor">
                    <?php echo $productoTS->autor ?>
                </div>

                <div class="editorial">
                    <?php echo $productoTS->editorial ?>
                </div>

                <div class="genero">
                    <?php echo $productoTS->genero ?>
                </div>
                
                <h1 class="is-size-3">$<?php echo number_format($productoTS->precio, 2) ?></h1>
                <td><img height="200px" width="200px" src="data:image/jpg;base64,<?php echo base64_encode($productoTS->imagen);?>"/></td>

                <?php if (productoYaEstaEnCarrito($productoTS->id)) { ?>
                    <form action="eliminar_del_carrito.php" method="post">
                        <input type="hidden" name="id_productoTS" value="<?php echo $productoTS->id ?>">
                        <span class="button is-success">
                            <i class="fa fa-check"></i>&nbsp;En el carrito
                        </span>
                        <button class="button is-danger">
                            <i class="fa fa-trash-o"></i>&nbsp;Quitar
                        </button>
                    </form>
                <?php }
                    else{ ?>
                        <form action="agregar_al_carrito.php" method="post">
                            <input type="hidden" name="id_producto" value="<?php echo $productoTS->id ?>">
                            <button class="button is-primary">
                                <i class="fa fa-cart-plus"></i>&nbsp;Agregar al carrito
                            </button>
                        </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php include_once "pie.php" ?>