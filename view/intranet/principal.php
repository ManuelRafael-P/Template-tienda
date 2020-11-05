<div class="content">
    <div class="container">
        <div class="jumbotron">
            <h3>Ultimos ingresos a Clientes</h3>
            <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID Usuario</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Fecha creación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($this->model->Listar_Ultimos_Clientes() as $c) {
                    ?>
                        <tr>
                            <td scope="row"><?php echo $c->ID_USUARIO ?></td>
                            <td><?php echo $c->NOMBRES_USUARIO ?></td>
                            <td><?php echo $c->APELLIDOS_USUARIO ?></td>
                            <td><?php echo $c->FECHA_CREACION ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="float-right">
                <a href="?c=usuario&a=Admin_Clientes" class="btn btn-primary px-5">Ver</a>
            </div>
        </div>
        <div class="jumbotron">
            <h3>Ultimos ingresos a Trabajadores</h3>
            <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID Usuario</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Fecha creación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($this->model->Listar_Ultimos_Trabajadores() as $t) {
                    ?>
                        <tr>
                            <td scope="row"><?php echo $t->ID_USUARIO ?></td>
                            <td><?php echo $t->NOMBRES_USUARIO ?></td>
                            <td><?php echo $t->APELLIDOS_USUARIO ?></td>
                            <td><?php echo $t->FECHA_CREACION ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="float-right">
                <a href="?c=usuario&a=Admin_Trabajadores" class="btn btn-primary px-5">Ver</a>
            </div>
        </div>
        <div class="jumbotron">
            <h3>Ultimos ingresos a Productos</h3>
            <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID Producto</th>
                        <th scope="col">ID Categoria</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha creación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($this->model_p->Listar_Ultimos_Productos() as $p) {
                    ?>
                        <tr>
                            <td scope="row"><?php echo $p->ID_PRODUCTO ?></td>
                            <td><?php echo $p->ID_CATEGORIA_PRODUCTO ?></td>
                            <td><?php echo $p->NOMBRE_PRODUCTO ?></td>
                            <td><?php echo $p->FECHA_CREACION ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="float-right">
                <a href="?c=producto&a=Admin_Productos" class="btn btn-primary px-5">Ver</a>
            </div>
        </div>
        <div class="jumbotron">
            <h3>Ultimos ingresos a Ventas</h3>
            <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID Venta</th>
                        <th scope="col">ID Usuario</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($this->model_v->Listar_Ultimas_Ventas() as $v) {
                    ?>
                        <tr>
                            <td scope="row"><?php echo $v->ID_VENTA ?></td>
                            <td><?php echo $v->ID_USUARIO ?></td>
                            <td><?php echo $v->FECHA ?></td>
                            <td><?php echo $v->STATUS ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="float-right">
                <a href="?c=venta&a=Admin_Ventas" class="btn btn-primary px-5">Ver</a>
            </div>
        </div>
    </div>
</div>