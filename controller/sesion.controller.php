<?php
require_once "model/producto.php";

class sesionController
{
    private $model;

    public function __construct()
    {
        $this->model = new Producto();
    }

    public function Ver_Carrito()
    {
        $total = 0;
        require_once 'view/componentes/header.php';
        require_once 'view/componentes/navbar.php';
        require_once 'view/carrito/carrito.php';
        require_once 'view/componentes/footer.php';
    }
    public function Agregar_Sesion()
    {
        if (isset($_SESSION['cart'])) {
            $item_array_id = array_column($_SESSION['cart'], 'id_producto');
            $count = count($_SESSION['cart']);
            $item_array = array(
                'id_producto' => $_REQUEST['idproducto'],
                'nombre' => $_REQUEST['nombre'],
                'precio' => $_REQUEST['precio'],
                'talla' => $_REQUEST['talla'],
                'cantidad' => $_REQUEST['cantidad'],
            );
            $_SESSION['cart'][$count] = $item_array;
            print_r($_SESSION['cart']);
        } else {
            $item_array = array(
                'id_producto' => $_REQUEST['idproducto'],
                'nombre' => $_REQUEST['nombre'],
                'precio' => $_REQUEST['precio'],
                'talla' => $_REQUEST['talla'],
                'cantidad' => $_REQUEST['cantidad']
            );
            $_SESSION['cart'][0] = $item_array;
            print_r($_SESSION['cart']);
        }
        header("Location:?c=producto&a=Detalle_Producto&id=" . $_REQUEST['idproducto']);
    }
    public function Eliminar()
    {
        $posi = $_REQUEST['posi'];
        unset($_SESSION['cart'][$posi]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        header("Location:?c=sesion&a=Ver_Carrito");
    }

    public function Cerrar_Sesion()
    {
        unset($_SESSION['info_user']);
        unset($_SESSION['id_user']);
        unset($_SESSION['rango']);
        unset($_SESSION['verificador']);
        header("Location:?c=producto&a=Index");
    }
}
