<?php
require_once 'model/usuario.php';
require_once 'model/sesion.php';
require_once 'model/venta.php';
require_once 'model/producto.php';


class usuarioController
{
    private $model;
    private $model_s;
    private $model_v;
    private $model_p;

    public function __construct()
    {
        $this->model = new Usuario();
        $this->model_p = new Producto();
        $this->model_s = new Sesion();
        $this->model_v = new Venta();
    }

    public function Login()
    {
        $mensaje = 0;
        if (isset($_REQUEST['mensaje'])) {
            if ($_REQUEST['mensaje'] == "Error") {
                $mensaje = 1;
            }
        }
        require_once 'view/componentes/header.php';
        require_once 'view/usuario/login.php';
    }


    public function Info_User_Client()
    {
        $mensaje = 0;
        if (isset($_REQUEST['mensaje'])) {
            if ($_REQUEST['mensaje'] == "Exitoso") {
                $mensaje = 1;
            }
        }
        require_once 'view/componentes/header.php';
        require_once 'view/componentes/navbar.php';
        require_once 'view/usuario/Informacion_user.php';
        require_once 'view/componentes/footer.php';
    }

    public function Nosotros()
    {
        require_once 'view/componentes/header.php';
        require_once 'view/componentes/navbar.php';
        require_once 'view/informacion/nosotros.php';
        require_once 'view/componentes/footer.php';
    }

    public function Contacto()
    {
        require_once 'view/componentes/header.php';
        require_once 'view/componentes/navbar.php';
        require_once 'view/informacion/contacto.php';
        require_once 'view/componentes/footer.php';
    }

    public function Iniciar_Sesion()
    {
        $usuario = new Usuario();
        if (isset($_REQUEST['inputEmail']) && isset($_REQUEST['inputPassword'])) {
            $usuario = $this->model->verificar_cuenta($_REQUEST['inputEmail'], $_REQUEST['inputPassword']);
        }
        if (empty($usuario)) {
            header("Location:?c=usuario&a=Login&mensaje=Error");
        } else {
            print_r($usuario[0]->RANGO_USUARIO);
            $this->model_s->Agregar_Sesion_Usuario($usuario[0]->ID_USUARIO, $usuario[0]->NOMBRES_USUARIO, $usuario[0]->APELLIDOS_USUARIO, $usuario[0]->RANGO_USUARIO, $usuario[0]->VERIFICADOR_USUARIO, $usuario[0]->CORREO_USUARIO);

            if ($usuario[0]->RANGO_USUARIO ==  0) {
                header("Location:?c=producto&a=Index");
            } else if ($usuario[0]->RANGO_USUARIO == 1) {
                header("Location:?c=usuario&a=Index_Intranet");
            }
        }
    }

    public function Actualizar_Informacion_Cliente()
    {
        $this->model->Actualizar_Datos_P($_REQUEST['id'], $_REQUEST['nombres'], $_REQUEST['apellidos'], $_REQUEST['correo'], $_REQUEST['telefono']);
        header("Location:?c=usuario&a=Info_User_Client&mensaje=Exitoso");
    }

    /*Intranet*/
    public function Index_Intranet()
    {
        require_once 'view/componentes/header.php';
        require_once 'view/componentes/navbar_intranet.php';
        require_once 'view/intranet/principal.php';
        require_once 'view/componentes/footer_intranet.php';
    }

    public function Admin_Clientes()
    {
        require_once 'view/Componentes/header.php';
        require_once 'view/Componentes/navbar_intranet.php';
        require_once 'view/intranet/clientes.php';
        require_once 'view/Componentes/footer_intranet.php';
    }

    public function Admin_Trabajadores()
    {
        require_once 'view/Componentes/header.php';
        require_once 'view/Componentes/navbar_intranet.php';
        require_once 'view/intranet/trabajadores.php';
        require_once 'view/Componentes/footer_intranet.php';
    }
}
