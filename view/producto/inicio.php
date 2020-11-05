<div class="cabecera-inicio text-center animate__animated animate__fadeIn">
    <div class="center">
        <h2 class="title-big">Bienvenidos a Lorem Store</h2>
    </div>
</div>
<div class="content animate__animated animate__fadeIn">
    <div class="container text-center my-3">
        <h2 class="font-weight-light">Podructos mas vendidos</h2>
        <div class="row mx-auto my-auto">
            <div id="recipeCarousel_1" class="carousel slide w-100" data-ride="carousel">
                <div class="carousel-inner esp w-100" role="listbox">
                    <?php foreach ($this->model->Listar_mas_vendidos() as $index => $b) { ?>
                        <div class="carousel-item <?php if ($index == 0) {
                                                        echo ("active");
                                                    } ?>">
                            <div class="col-md-4">
                                <div class="card card-body animate__animated animate__fadeIn">
                                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($b->IMAGEN_1_PRODUCTO) . '" class="imagen_detalle border border-dark img-fluid"/>'; ?>
                                    <h4 class="card-title"><?php echo ($b->NOMBRE_PRODUCTO) ?></h4>
                                    <p class="card-text"><?php echo ($b->PRECIO_PRODUCTO) ?></p>
                                    <a href="?c=producto&a=Detalle_Producto&id=<?php echo ($b->ID_PRODUCTO) ?>" class="button">Ver detalle</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <a class=" carousel-control-prev w-auto" href="#recipeCarousel_1" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next w-auto" href="#recipeCarousel_1" role="button" data-slide="next">
                    <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <div class="container text-center my-3">
        <h2 class="font-weight-light">Productos recien agregados</h2>
        <div class="row mx-auto my-auto">
            <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                <div class="carousel-inner esp w-100" role="listbox">
                    <?php foreach ($this->model->Listar_recien_agregados() as $index => $a) { ?>
                        <div class="carousel-item <?php if ($index == 0) {
                                                        echo ("active");
                                                    } ?>">
                            <div class="col-md-4">
                                <div class="card card-body animate__animated animate__fadeIn">
                                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($a->IMAGEN_1_PRODUCTO) . '" class="imagen_detalle border border-dark img-fluid"/>'; ?>
                                    <h4 class="card-title"><?php echo ($a->NOMBRE_PRODUCTO) ?></h4>
                                    <p class="card-text"><?php echo ($a->PRECIO_PRODUCTO) ?></p>
                                    <a href="?c=producto&a=Detalle_Producto&id=<?php echo ($b->ID_PRODUCTO) ?>" class="button">Ver detalle</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>


<script>
    $('#recipeCarousel').carousel({
        interval: 5000
    })
    $('#recipeCarousel_1').carousel({
        interval: 5000
    })

    $('.carousel .carousel-item').each(function() {
        var minPerSlide = 3;
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i = 0; i < minPerSlide; i++) {
            next = next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }

            next.children(':first-child').clone().appendTo($(this));
        }
    });
</script>