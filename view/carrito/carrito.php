<div class="content">
    <div class="container">
        <?php
        if (isset($_SESSION['cart'])) {
            if (count($_SESSION['cart']) >= 1) {        ?>
                <table class="table text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">CODIGO</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">TALLA</th>
                            <th scope="col">IMAGEN</th>
                            <th scope="col">CANTIDAD</th>
                            <th scope="col">PRECIO</th>
                            <th scope="col">SUBTOTAL</th>
                            <th scope="col">OPCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $indice => $producto) { ?>
                            <tr>
                                <?php $imagen = $this->model->Mostrar_Imagen_Id($producto["id_producto"]); ?>
                                <th scope="row"><?php echo $producto['id_producto'] ?></th>
                                <td><?php echo $producto['nombre'] ?></td>
                                <td><?php echo $producto['talla'] ?></td>
                                <td><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($imagen[0]->IMAGEN_1_PRODUCTO) . '" class="img-thumbnail img-fluid" style="height:20%"/>'; ?></td>
                                <td><?php echo $producto['cantidad'] ?></td>
                                <td><?php echo $producto['precio'] ?></td>
                                <td><?php echo number_format($producto['precio'] * $producto['cantidad'], 2) ?></td>

                                <?php $total = $total + ($producto['precio'] * $producto['cantidad']); ?>
                                <form action="?c=sesion&a=Eliminar" method="post">
                                    <input type="hidden" name="id" value="<?php echo $producto['id_producto'] ?>">
                                    <input type="hidden" name="posi" value="<?php echo $indice ?>">
                                    <td><input type="submit" name="eliminar" value="eliminar" class="btn btn-warning"></input></td>
                                </form>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
        <?php
            } else {
                echo "<h2>No tiene productos en el carrito</h2>";
            }
        } else {
            echo "<h2>No tiene productos en el carrito</h2>";
        }
        ?>

        <?php
        if (isset($_SESSION['cart'])) {
        ?>
            <h2>Total</h2>
            <p><?php echo number_format($total, 2) ?></p>
            <form action="?c=pago&a=Pagar" method="post">
                <input type="hidden" name="total" value="<?php echo $total ?>">
                <button type="submit" name="pagar" class="btn btn-warning">PAGAR</button>
            </form>
        <?php
        } else {
            echo "";
        }
        ?>
    </div>
</div>