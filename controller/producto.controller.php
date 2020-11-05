<?php
require_once 'model/producto.php';
require_once 'model/categoria_produto.php';

class productoController
{
    private $model;
    private $model_c;

    public function __construct()
    {
        $this->model = new Producto();
        $this->model_c = new CategoriaProducto();
    }

    public function Index()
    {
        $producto_1 = $this->model->Listar_mas_vendidos();
        $producto_2 = $this->model->Listar_recien_agregados();
        require_once 'view/componentes/header.php';
        require_once 'view/componentes/navbar.php';
        require_once 'view/producto/inicio.php';
        require_once 'view/componentes/footer.php';
    }

    public function Listar_Productos()
    {
        require_once 'view/componentes/header.php';
        require_once 'view/componentes/navbar.php';
        require_once 'view/producto/lista_productos.php';
        require_once 'view/componentes/footer.php';
    }

    public function Listar_Producto_por_Categoria()
    {
        $producto = new Producto();
        if (isset($_REQUEST['categoria'])) {
            $producto = $this->model->Listar_Producto_por_Categoria($_REQUEST['categoria']);
        }
        require_once 'view/componentes/header.php';
        require_once 'view/componentes/navbar.php';
        require_once 'view/producto/lista_productos.php';
        require_once 'view/componentes/footer.php';
    }



    public function Detalle_Producto()
    {
        $producto = new Producto();
        if (isset($_REQUEST['id'])) {
            $producto = $this->model->Detalle_Producto($_REQUEST['id']);
        }
        require_once 'view/componentes/header.php';
        require_once 'view/componentes/navbar.php';
        require_once 'view/producto/detalle_producto.php';
        require_once 'view/componentes/footer.php';
    }


    public function Admin_Productos()
    {
        require_once 'view/Componentes/header.php';
        require_once 'view/Componentes/navbar_intranet.php';
        require_once 'view/intranet/productos.php';
        require_once 'view/Componentes/footer_intranet.php';
    }

    public function Agregar_Producto()
    {
        $data = new Producto();
        $data->id_pro = $_REQUEST['id'];
        $data->nom_pro = $_REQUEST['nombre'];
        $data->des_pro = $_REQUEST['descripcion'];
        $data->stock_s = $_REQUEST['stock_s'];
        $data->stock_l = $_REQUEST['stock_l'];
        $data->stock_m = $_REQUEST['stock_m'];
        $data->color = $_REQUEST['color'];
        $data->precio = $_REQUEST['precio'];
        if (isset($_REQUEST['mensaje'])) {
            if ($_REQUEST['mensaje'] == "agregar") {
                $data->id_cat_pro = $_REQUEST['categoria'];
                $data->imagen_1 = "Vacio";
                $data->imagen_2 = "Vacio";
                if (getimagesize($_FILES['imagen_1']["tmp_name"]) !== false) {
                    $data->imagen_1 = addslashes(file_get_contents($_FILES['imagen_1']["tmp_name"]));
                }
                if (getimagesize($_FILES['imagen_2']["tmp_name"]) !== false) {
                    $data->imagen_2 = addslashes(file_get_contents($_FILES['imagen_2']["tmp_name"]));
                }
                $this->model->Agregar_Producto($data);
            } else if ($_REQUEST['mensaje'] == "editar") {
                $this->model->Actualizar_Producto($data);
            }
        }
        header("Location:?c=producto&a=Admin_Productos&mensaje=Exito");
    }

    public function Editar_Producto()
    {
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
        } else {
            header("Location:?c=producto&a=Listar_Productos");
        }
        require_once 'view/Componentes/header.php';
        require_once 'view/Componentes/navbar_intranet.php';
        require_once 'view/producto/editar_producto.php';
        require_once 'view/Componentes/footer_intranet.php';
    }

    public function Eliminar_Producto()
    {
        $this->model->Eliminar_Producto($_REQUEST['id']);
        header("Location:?c=producto&a=Admin_Productos&mensaje=Borrado");
    }
}
