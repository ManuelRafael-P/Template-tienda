<div class="content">
    <div class="container">
        <div class="row my-4">
            <div class="col-9">
                <h2>Administrar Trabajadores</h2>
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Agregar Trabajador</button>
            </div>
        </div>
        <table class="table text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID Usuario</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->model->Listar_Trabajadores() as $t) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $t->ID_USUARIO ?></th>
                        <td><?php echo $t->NOMBRES_USUARIO ?></td>
                        <td><?php echo $t->APELLIDOS_USUARIO ?></td>
                        <td><?php echo $t->CORREO_USUARIO ?></td>
                        <td><?php echo $t->TELEFONO_USUARIO ?></td>
                        <td><a class="btn btn-warning mr-1" href="">Editar</a><a class="btn btn-danger" href="">Eliminar</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Agregar trabajador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="?c=producto&a=Agregar_Producto&mensaje=agregar" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="rango" value="1">
                    <input type="hidden" name="verificacion" value="0">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nombre">Nombres</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Ingrese nombre">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="apellidos">Apellidos</label>
                                <input class="form-control" type="text" name="apellidos" id="apellidos" placeholder="Ingrese apellidos">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input class="form-control" type="tel" name="telefono" id="telefono" placeholder="Ingrese telefono">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input class="form-control" type="email" name="correo" id="correo" placeholder="Ingrese correo">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 form-group">
                            <div class="form-group">
                                <label for="contraseña">Contraseña</label>
                                <input class="form-control" type="password" name="contraseña" id="contraseña" placeholder="Ingrese contraseña">
                            </div>
                        </div>
                        <div class="col-6 from-group">
                            <div class="form-group">
                                <label for="contraseña_1">Repita contraseña</label>
                                <input class="form-control" type="password" name="contraseña_1" id="contraseña_1" placeholder="Ingrese contraseña">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="b-s" type="submit" class="btn btn-primary">Guardar</button>
                    </div>
            </form>
        </div>
    </div>
</div>