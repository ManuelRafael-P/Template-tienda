<?php
require_once 'model/venta.php';
require_once 'model/producto.php';
require_once 'model/funciones.php';

class pagoController
{
    private $model;
    private $model_p;

    public function __construct()
    {
        $this->model = new Venta();
        $this->model_p = new Producto();
    }
    public function Pagar_Pay()
    {
        if (isset($_SESSION['Pago'])) {

            var_dump($_SESSION['Pago']);
            foreach ($_SESSION['Pago'] as $pago) {
                $SID = $pago['SID'];
                $IdVenta = $pago['IDVenta'];
                $precio_soles = $pago['total_s'];
                $precio_dolares = $pago['total_d'];
            }
            unset($_SESSION['pago']);
        }
        require_once("view/componentes/header.php");
        require_once("view/componentes/navbar.php");
        require_once("view/pago/Paypal_pago.php");
        require_once("view/componentes/footer.php");
    }
    public function Pagar()
    {
        if (isset($_SESSION['info_user'])) {
            $nombres = $_SESSION['info_user'];
            $id_u = $_SESSION['id_user'];
            $rango = $_SESSION['rango'];
            $total = $_POST['total'];
            $correo = $_SESSION['correo'];
            $verificador = $_SESSION['verificador'];
            if ($verificador != 0) {

                $parte = generarCodigo(7);
                $parte2 = generarCodigo(7);

                $SID = $parte . $id_u . $parte2;

                $precio_pagar = round($total * 0.280489);

                print_r($id_u);
                print_r($SID);
                print_r($correo);
                print_r($total);

                $this->model->Agregar_Venta_Pendiente($id_u, $SID, $correo, $total);

                $valor = $this->model->Listar_ultima_venta();

                $IdVenta = $valor[0]->ID_VENTA;
                print_r($IdVenta);

                $item_array = array(
                    'SID' => $SID,
                    'IDVenta' => $IdVenta,
                    'total_s' => $_POST['total'],
                    'total_d' => $precio_pagar,
                );

                $_SESSION['Pago'][0] = $item_array;

                header('Location:?c=pago&a=Pagar_Pay');
            } else {
                echo "<script>alert('No ha verificado su cuenta. No podra realizar compras.')</script>"; /*Cambiar */
                header('Location:?c=sesion&a=Ver_Carrito');
            }
        } else {
            echo "<script>alert('Usted no ha iniciado sesion')</script>"; /*Cambiar */
            header('Location:?c=sesion&a=Ver_Carrito');
        }
    }

    public function Verificar()
    {

        //$ClientID = "";
        //$Secret = "";

        $ClientID = "";
        $Secret = "";

        // $url = "https://api.paypal.com";
        $url = "https://api.sandbox.paypal.com";

        $Login = curl_init($url . "/v1/oauth2/token");

        curl_setopt($Login, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($Login, CURLOPT_USERPWD, $ClientID . ":" . $Secret);
        curl_setopt($Login, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

        $Respuesta = curl_exec($Login);

        $objRespuesta = json_decode($Respuesta);

        $AccesToken = $objRespuesta->access_token;

        $venta = curl_init($url . "/v1/payments/payment/" . $_REQUEST['paymentID']);

        curl_setopt($venta, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer " . $AccesToken));
        curl_setopt($venta, CURLOPT_RETURNTRANSFER, TRUE);

        $RespuestaVenta = curl_exec($venta);

        $objDatosTransaccion = json_decode($RespuestaVenta);

        $state = $objDatosTransaccion->state;
        $correo =   $objDatosTransaccion->payer->payer_info->email;
        $total = $objDatosTransaccion->transactions[0]->amount->total;
        $currency = $objDatosTransaccion->transactions[0]->amount->currency;
        $custom = $objDatosTransaccion->transactions[0]->custom;

        $clave = explode("#", $custom);

        $SID = $clave[0];
        $ClaveVenta = $clave[1];

        curl_close($Login);
        curl_close($venta);

        if ($state == "approved") {
            $mensajePaypal = "<h3>Pago Aprobado</h3>";
            if ($_SESSION['cart']) {
                foreach ($_SESSION['cart'] as $indice => $producto) {
                    $id = $producto['id_producto'];
                    $talla = $producto['talla'];
                    $cantidad = intval($producto['cantidad']);
                    $subtotal = $cantidad * $producto['precio'];

                    $this->model->Agregar_Detalle_Venta($ClaveVenta, $id, $talla, $cantidad, $subtotal);

                    echo ("funciono pendiente");
                    if ($talla == 's') {
                        $r = $this->model_p->Mostrar_Stock($talla, $id);
                        $cantidad_actual = intval($r[0]->STOCK_TALLA_S);
                        if ($cantidad <= $cantidad_actual) {
                            $nueva_cantidad = $cantidad_actual - $cantidad;
                            $this->model_p->Actualizar_Stock($talla, $id, $nueva_cantidad);
                            echo ("funciono s");
                        } else {
                            echo "<script>alert('No tenemos stock suficiente para cumplir la venta')</script>"; /*Cambiar */
                        }
                    }
                    if ($talla == 'm') {
                        $r = $this->model_p->Mostrar_Stock($talla, $id);
                        $cantidad_actual = intval($r[0]->STOCK_TALLA_M);
                        if ($cantidad <= $cantidad_actual) {
                            $nueva_cantidad = $cantidad_actual - $cantidad;
                            $this->model_p->Actualizar_Stock($talla, $id, $nueva_cantidad);
                            echo ("funciono m");
                        } else {
                            echo "<script>alert('No tenemos stock suficiente para cumplir la venta')</script>"; /*Cambiar */
                        }
                    }
                    if ($talla == 'l') {
                        $r = $this->model_p->Mostrar_Stock($talla, $id);
                        $cantidad_actual = intval($r[0]->STOCK_TALLA_L);
                        if ($cantidad <= $cantidad_actual) {
                            $nueva_cantidad = $cantidad_actual - $cantidad;
                            $this->model_p->Actualizar_Stock($talla, $id, $nueva_cantidad);
                            echo ("funciono l");
                        } else {
                            echo "<script>alert('No tenemos stock suficiente para cumplir la venta')</script>"; /*Cambiar */
                        }
                    }
                }
            }
            echo ("no problema 1");
            $this->model->Actualizar_Venta_A($RespuestaVenta, $ClaveVenta);
            echo ("no problema 2");
            $this->model->Actualizar_Venta_C($SID, $ClaveVenta);
            echo ("no problema 3");
            unset($_SESSION['cart']);
            header('Location:?c=pago&a=Fin_Pago&idVenta=' . $ClaveVenta . '');
        } else {
            echo "<script>alert('Hubo un problema con el pago.')</script>";
            header('Location:?c=producto&a=Ver_Carrito');
        }
    }

    public function Fin_Pago()
    {
        require_once 'view/Componentes/header.php';
        require_once 'view/Componentes/navbar.php';
        require_once 'view/pago/Fin_Pago.php';
        require_once 'view/Componentes/footer.php';
    }
}
