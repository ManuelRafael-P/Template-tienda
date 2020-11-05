<?php
require_once 'model/venta.php';

class ventaController
{
    private $model;

    public function __construct()
    {
        $this->model = new Venta();
    }

    public function Admin_Ventas()
    {
        require_once 'view/Componentes/header.php';
        require_once 'view/Componentes/navbar_intranet.php';
        require_once 'view/intranet/ventas.php';
        require_once 'view/Componentes/footer_intranet.php';
    }

    public function Admin_DetalleVentas()
    {
        require_once 'view/Componentes/header.php';
        require_once 'view/Componentes/navbar_intranet.php';
        require_once 'view/intranet/detalle_ventas.php';
        require_once 'view/Componentes/footer_intranet.php';
    }
}
