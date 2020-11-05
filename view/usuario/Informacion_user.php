<div class="content">
    <div class="container">
        <?php
        if ($mensaje == 1) {
            echo ("<p>Datos actualizados</p>");
        }
        ?>
        <h1 class="title-small">Informacion de usuario</h1>
        <br>
        <div class="row">
            <div class="col">
                <?php
                foreach ($this->model->Listar_Usuario_Id($_SESSION["id_user"]) as $user) {
                ?>
                    <p>Nombres : <?php echo ($user->NOMBRES_USUARIO) ?></p>
                    <p>Apellidos : <?php echo ($user->APELLIDOS_USUARIO) ?></p>
                    <p>Correo : <?php echo ($user->CORREO_USUARIO) ?></p>
                    <p>Telefono : <?php echo ($user->TELEFONO_USUARIO) ?></p>
                <?php
                }
                ?>
            </div>
            <div class="col text-center">
                <button type="button" class="btn btn-primary" style="margin:50px 0" data-toggle="modal" data-target="#exampleModalCenter">
                    Editar informacion
                </button>
            </div>
        </div>
        <br>
        <h1 class="title-small">Compras realizadas</h1>
        <br>
        <table class="table text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID Venta</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <?php
            foreach ($this->model_v->Listar_Ventas_Id($_SESSION["id_user"]) as $ventas) {
            ?>
                <tr>
                    <th scope="col"><?php echo ($ventas->ID_VENTA) ?> </th>
                    <td><?php echo ($ventas->FECHA) ?></td>
                    <td><?php echo ($ventas->TOTAL) ?></td>
                    <td><?php echo ($ventas->STATUS) ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Editar información personal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="?c=usuario&a=Actualizar_Informacion_Cliente" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo ($user->ID_USUARIO) ?>">
                    <div class="form-group">
                        <label for="nombres">Nombres :</label>
                        <input class="form-control" type="text" name="nombres" id="nombres" value="<?php echo ($user->NOMBRES_USUARIO) ?>">
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos :</label>
                        <input class="form-control" type="text" name="apellidos" id="apellidos" value="<?php echo ($user->APELLIDOS_USUARIO) ?>">
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo :</label>
                        <input class="form-control" type="email" name="correo" id="correo" value="<?php echo ($user->CORREO_USUARIO) ?>">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono :</label>
                        <input class="form-control" type="tel" name="telefono" id="telefono" value="<?php echo ($user->TELEFONO_USUARIO) ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="b-s" type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>