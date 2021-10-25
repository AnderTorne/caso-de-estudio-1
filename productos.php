<?php include_once "encabezado.php" ?>
<?php
include_once "funciones.php";
$productos = obtenerProductos();
?>
<div class="columns">
    <div class="column">
        <h2 class="is-size-2">Productos existentes</h2>
        <a class="button is-success" href="agregar_producto.php">Nuevo&nbsp;<i class="fa fa-plus"></i></a>
        <table class="table">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Editorial</th>
                    <th>Genero</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        include ("conexion.php");

                        $query="SELECT * FROM productos";
                        $resultado= $conexion->query($query);
                        while($row=$resultado->fetch_assoc()){
                    ?>
                        <tr>
                            <td><?php echo $row['titulo'];?></td>
                            <td><?php echo $row['autor'];?></td>
                            <td><?php echo $row['editorial'];?></td>
                            <td><?php echo $row['genero'];?></td>
                            <td><?php echo $row['precio'];?></td>
                            <td><img height="200px" width="200px" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']);?>"/></td>
                            <td>
                                <form action="eliminar_producto.php" method="post">
                                    <input type="hidden" name="id_producto" value="<?php echo $row['id'] ?>">
                                    <button class="button is-danger">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                            </form>
                        </td>
                        </tr>
                    <?php   

                        }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php include_once "pie.php" ?>