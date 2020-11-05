<div class="content">
    <div class="container">
        <div class="text-center jumbotron">
            <i class="fas fa-rocket logo"></i>
            <h2 class="title">¡ Venta exitosa !</h2>
        </div>
        <h3 class="title-small my-3">Productos comprados</h3>
        <table class="table text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Talla</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->model_p->Mostrar_Productos_por_Venta($_REQUEST['idVenta']) as $producto) {
                ?>
                    <tr>
                        <td><?php echo $producto->ID_PRODUCTO ?></td>
                        <td><?php echo $producto->NOMBRE_PRODUCTO ?></td>
                        <td><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($producto->IMAGEN_1_PRODUCTO) . '"  class="img-thumbnail img-fluid" style="height:20%"/>'; ?></td>
                        <td><?php echo $producto->TALLA_VENDIDA ?></td>
                        <td><?php echo $producto->CANTIDAD_VENDIDA ?></td>
                        <td><?php echo $producto->PRECIO_PRODUCTO ?></td>
                        <td><?php echo $producto->SUBTOTAL ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="text-center">
            <a class="btn btn-primary btn-lg" href="?c=producto&a=Index" style="padding: .5em 4em">Seguir comprando</a>
        </div>

    </div>
</div>