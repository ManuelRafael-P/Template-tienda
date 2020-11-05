<div class="content">
    <div class="container">
        <div class="row my-4">
            <h2>Administrar Ventas</h2>
        </div>
        <table class="table text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID Detalle Venta</th>
                    <th scope="col">ID Venta</th>
                    <th scope="col">ID Producto</th>
                    <th scope="col">Talla vendida</th>
                    <th scope="col">Cantidad vendida</th>
                    <th scope="col">Fecha de venta</th>
                    <th scope="col">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->model->Listar_Detalle_Ventas() as $dv) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $dv->ID_DETALLE_VENTA ?></th>
                        <td><?php echo $dv->ID_VENTA ?></td>
                        <td><?php echo $dv->ID_PRODUCTO ?></td>
                        <td><?php echo $dv->TALLA_VENDIDA ?></td>
                        <td><?php echo $dv->CANTIDAD_VENDIDA ?></td>
                        <td><?php echo $dv->FECHA_VENTA ?></td>
                        <td><?php echo $dv->SUBTOTAL ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>