<div class="content">
    <div class="container">
        <div class="row my-4">
            <h2>Administrar Ventas</h2>
        </div>
        <table class="table text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID Venta</th>
                    <th scope="col">ID Usuario</th>
                    <th scope="col">Clave transaccion</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->model->Listar_Ventas() as $v) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $v->ID_VENTA ?></th>
                        <td><?php echo $v->ID_USUARIO ?></td>
                        <td><?php echo $v->CLAVE_TRANSACCION ?></td>
                        <td><?php echo $v->FECHA ?></td>
                        <td><?php echo $v->CORREO ?></td>
                        <td><?php echo $v->TOTAL ?></td>
                        <td><?php echo $v->STATUS ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>