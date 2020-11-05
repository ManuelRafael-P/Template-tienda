<?php
class Sesion
{

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
    }

    public function Agregar_Sesion_Usuario($id, $nombres, $apellidos, $rango, $verificador,$correo)
    {
        $_SESSION['info_user'] = $nombres . ' ' . $apellidos;
        $_SESSION['id_user'] = $id;
        $_SESSION['rango'] = $rango;
        $_SESSION['verificador'] = $verificador;
        $_SESSION['correo'] = $correo;
    }
}
