<div class="content">
    <div class="container">
        <div class="row py-4">
            <div class="col-9">
                <h2>Administrar Productos</h2>
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Agregar Producto</button>
            </div>
        </div>
        <table class="table text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID Producto</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Stock S</th>
                    <th scope="col">Stock M</th>
                    <th scope="col">Stock L</th>
                    <th scope="col">Color</th>
                    <th scope="col">Fecha Ingreso</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->model->Listar_Todo_Productos() as $p) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $p->ID_PRODUCTO ?></th>
                        <td><?php echo $p->ID_CATEGORIA_PRODUCTO ?></td>
                        <td><?php echo $p->NOMBRE_PRODUCTO ?></td>
                        <td><?php echo $p->DESCRIPCION_PRODUCTO ?></td>
                        <td><?php echo $p->STOCK_TALLA_S ?></td>
                        <td><?php echo $p->STOCK_TALLA_M ?></td>
                        <td><?php echo $p->STOCK_TALLA_L ?></td>
                        <td><?php echo $p->COLOR_PRODUCTO ?></td>
                        <td><?php echo $p->FECHA_CREACION ?></td>
                        <td><?php echo $p->PRECIO_PRODUCTO ?></td>
                        <td><a class="btn btn-warning px-4" href="?c=producto&a=Editar_Producto&id=<?php echo $p->ID_PRODUCTO ?>">Editar</a>
                            <a class="btn btn-danger mt-1" href="?c=producto&a=Eliminar_Producto&id=<?php echo $p->ID_PRODUCTO ?>">Eliminar</a></td>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Agregar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="?c=producto&a=Agregar_Producto" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="id">ID Producto</label>
                                <input class="form-control" type="text" name="id" id="id" placeholder="Ingrese id de producto">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <select name="categoria" id="categoria" class="form-control">
                                    <option value="no definido">Elija una opcion</option>
                                    <?php foreach ($this->model_c->Listar() as $c) { ?>
                                        <option value="<?php echo $c->ID_CATEGORIA_PRODUCTO ?>"><?php echo $c->NOMBRE_CATEGORIA_PRODUCTO ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Ingrese nombre">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input class="form-control" type="number" name="precio" id="precio" placeholder="Ingrese precio">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="color">Color</label>
                                <input class="form-control" type="text" name="color" id="color" placeholder="Ingrese color">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input class="form-control" type="text" name="descripcion" id="descripcion" placeholder="Ingrese descripcion de producto">
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="stock_talla_s">Stock S</label>
                                <input class="form-control" type="number" name="stock_s" id="stock_talla_s" placeholder="Ingrese stock talla S">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="stock_talla_m">Stock M</label>
                                <input class="form-control" type="number" name="stock_m" id="stock_talla_m" placeholder="Ingrese stock talla M">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="stock_talla_l">Stock L</label>
                                <input class="form-control" type="number" name="stock_l" id="stock_talla_l" placeholder="Ingrese stock talla L">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="imagen_1">Imagen 1</label>
                                <input class="form-control" type="file" name="imagen_1" id="imagen_1">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="imagen_2">Imagen 2</label>
                                <input class="form-control" type="file" name="imagen_2" id="imagen_2">
                            </div>
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