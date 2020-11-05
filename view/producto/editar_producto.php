<div class="content">
    <div class="container">
        <?php
        if ($id != "") {
            foreach ($this->model->Listar_Producto_id($id) as $p) {
        ?>
                <form action="?c=producto&a=Agregar_Producto&mensaje=editar" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="id">ID Producto</label>
                                    <input class="form-control" type="text" name="id" id="id" placeholder="Ingrese id de producto" value="<?php echo $p->ID_PRODUCTO ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Ingrese nombre" value="<?php echo $p->NOMBRE_PRODUCTO ?>">
                                </div>
                            </div>
                            <div class=" col-4">
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input class="form-control" type="number" name="precio" id="precio" placeholder="Ingrese precio" value="<?php echo $p->PRECIO_PRODUCTO ?>">
                                </div>
                            </div>
                            <div class=" col-4">
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <input class="form-control" type="text" name="color" id="color" placeholder="Ingrese color" value="<?php echo $p->COLOR_PRODUCTO ?>">
                                </div>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label for="descripcion">Descripcion</label>
                            <input class="form-control" type="text" name="descripcion" id="descripcion" placeholder="Ingrese descripcion de producto" value="<?php echo $p->DESCRIPCION_PRODUCTO ?>">
                        </div>
                        <div class=" row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="stock_talla_s">Stock S</label>
                                    <input class="form-control" type="number" name="stock_s" id="stock_talla_s" placeholder="Ingrese stock talla S" value="<?php echo $p->STOCK_TALLA_S ?>">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="stock_talla_m">Stock M</label>
                                    <input class="form-control" type="number" name="stock_m" id="stock_talla_m" placeholder="Ingrese stock talla M" value="<?php echo $p->STOCK_TALLA_M ?>">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="stock_talla_l">Stock L</label>
                                    <input class="form-control" type="number" name="stock_l" id="stock_talla_l" placeholder="Ingrese stock talla L" value="<?php echo $p->STOCK_TALLA_L ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="b-s" type="submit" class="btn btn-primary">Guardar</button>
                        <a class="btn btn-secondary d-block" href="?c=producto&a=Admin_Productos">Cancelar</a>
                    </div>
                </form>
        <?php  }
        }

        ?>
    </div>
</div>