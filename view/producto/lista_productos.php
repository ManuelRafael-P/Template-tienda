    <div class="cabecera-productos text-center animate__animated animate__fadeIn">
        <div class="center">
            <h2 class="title-big">Nuestros productos</h2>
        </div>
    </div>
<div class="content">
    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-3 mb-3">
                    <div class="card h-100">
                        <ul>
                            <li class="my-2">
                                <h4>Tipo de prenda</h4>
                            </li>
                            <li id="filtros" class="my-1"><i class="fas fa-angle-right"></i><a href="?c=producto&a=Listar_Producto_por_categoria&categoria=CHOMPAS"> Chompas</a></li>
                            <li id="filtros" class="my-1"><i class="fas fa-angle-right"></i><a href="?c=producto&a=Listar_Producto_por_categoria&categoria=ZAPATILLAS"> Zapatillas</a></li>
                            <li id="filtros" class="my-1"><i class="fas fa-angle-right"></i><a href="?c=producto&a=Listar_Producto_por_categoria&categoria=POLOS"> Polos</a></li>
                            <li id="filtros" class="my-1"><i class="fas fa-angle-right"></i><a href="?c=producto&a=Listar_Productos"> Sin filtros</a></li>
                        </ul>
                    </div>
                </div>
                <?php
                if (!isset($producto)) {
                    foreach ($this->model->Listar_Productos() as $p) {
                ?>
                        <div class="col-lg-3 mb-3">
                            <div class="card h-100 animate__animated animate__fadeIn">
                                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($p->IMAGEN_1_PRODUCTO) . '" class="card-img-top"/>'; ?>
                                <div class="card-body">
                                    <h5 id="ct" class="card-title"><?php echo ($p->NOMBRE_PRODUCTO) ?></h5>
                                    <p id="c1" class="card-text"><?php echo ($p->DESCRIPCION_PRODUCTO) ?></p>
                                    <p id="c2" class="card-text">S/<?php echo ($p->PRECIO_PRODUCTO) ?>.0</p>
                                    <a class="btn" href="?c=producto&a=Detalle_Producto&id=<?php echo $p->ID_PRODUCTO ?>">Ver detalle</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    foreach ($producto as $p) {
                    ?>
                        <div class="col-lg-3 mb-3">
                            <div class="card h-100 animate__animated animate__fadeIn">
                                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($p->IMAGEN_1_PRODUCTO) . '" class="card-img-top"/>'; ?>
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>