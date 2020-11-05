<div class="content">
    <div class="container">
        <h2 class="my-4">Administrar Clientes</h2>
        <table class="table text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID Usuario</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Telefono</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->model->Listar_Clientes() as $t) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $t->ID_USUARIO ?></th>
                        <td><?php echo $t->NOMBRES_USUARIO ?></td>
                        <td><?php echo $t->APELLIDOS_USUARIO ?></td>
                        <td><?php echo $t->CORREO_USUARIO ?></td>
                        <td><?php echo $t->TELEFONO_USUARIO ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>