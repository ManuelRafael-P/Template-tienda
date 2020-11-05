<div class="content">
    <form id="form" action="?c=sesion&a=Agregar_Sesion" method="post">
        <div class="container">
            <div class="card card_1">
                <div class="row">
                    <div class="preview col-md-6">
                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1">
                                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($producto[0]->IMAGEN_1_PRODUCTO) . '" class="imagen_detalle border border-dark img-fluid"/>'; ?>
                            </div>
                            <div class="tab-pane" id="pic-2">
                                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($producto[0]->IMAGEN_2_PRODUCTO) . '" class="imagen_detalle border border-dark img-fluid"/>'; ?>
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                <li class="active"><a data-target="#pic-1" data-toggle="tab"> <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($producto[0]->IMAGEN_1_PRODUCTO) . '" class="imagen_detalle border border-dark img-fluid"/>'; ?></a></li>
                                <li><a data-target="#pic-2" data-toggle="tab"> <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($producto[0]->IMAGEN_2_PRODUCTO) . '" class="imagen_detalle  border border-dark img-fluid"/>'; ?></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2><?php echo $producto[0]->ID_PRODUCTO ?></h2>
                        <p><?php echo $producto[0]->NOMBRE_PRODUCTO ?></p>
                        <p><?php echo $producto[0]->PRECIO_PRODUCTO ?></p>



                        <p>TALLAS DISPONIBLES</p>
                        <?php
                        if ($producto[0]->STOCK_TALLA_S > 0) { ?>
                            <input type="radio" id="s" name="talla" value="s" checked>
                            <label for="s" data-toggle="tooltip" data-placement="top" title="<?php echo ($producto[0]->STOCK_TALLA_S) ?>">S</label><br>
                            <p><?php echo "UNIDADES DISPONIBLES: " . $producto[0]->STOCK_TALLA_S ?></p>
                        <?php
                        }
                        ?>
                        <?php
                        if ($producto[0]->STOCK_TALLA_M > 0) { ?>
                            <input type="radio" id="m" name="talla" value="m">
                            <label for="m">M</label><br>
                            <p><?php echo "UNIDADES DISPONIBLES: " .  $producto[0]->STOCK_TALLA_M ?></p>
                        <?php
                        }
                        ?>
                        <?php
                        if ($producto[0]->STOCK_TALLA_L > 0) { ?>
                            <input type="radio" id="l" name="talla" value="l">
                            <label for="l">L</label><br>
                            <p><?php echo "UNIDADES DISPONIBLES: " .  $producto[0]->STOCK_TALLA_L ?></p>
                        <?php
                        }
                        ?>

                        <label for="">Cantidad</label>
                        <button type="button" onclick="dec('cantidad')">-</button>
                        <input name="cantidad" type="text" readonly value="0">
                        <button type="button" onclick="inc('cantidad')">+</button>

                        <input type="hidden" name="idproducto" value="<?php echo $producto[0]->ID_PRODUCTO ?>">
                        <input type="hidden" name="nombre" value="<?php echo $producto[0]->NOMBRE_PRODUCTO ?>">
                        <input type="hidden" name="precio" value="<?php echo $producto[0]->PRECIO_PRODUCTO ?>">
                        <button type="submit">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function inc(element) {
        let el = document.querySelector(`[name="${element}"]`);
        el.value = parseInt(el.value) + 1;
    }

    function dec(element) {
        let el = document.querySelector(`[name="${element}"]`);
        if (parseInt(el.value) > 0) {
            el.value = parseInt(el.value) - 1;
        }
    }
</script>