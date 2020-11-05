<?php

class Venta
{
    private $pdo;


    public function __construct()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Ventas()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM ventas");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Detalle_Ventas()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM detalle_ventas");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Listar_ultima_venta()
    {
        try {
            $stm = $this->pdo->prepare("SELECT ID_VENTA FROM ventas ORDER BY ID_VENTA desc limit 1");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Ventas_Id($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM ventas WHERE ID_USUARIO = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Agregar_Detalle_Venta($clave, $id, $talla, $cantidad, $subtotal)
    {
        try {
            $sql = "INSERT INTO detalle_ventas (ID_DETALLE_VENTA, ID_VENTA, ID_PRODUCTO, TALLA_VENDIDA, CANTIDAD_VENDIDA, FECHA_VENTA, SUBTOTAL) VALUES (NULL, ?, ?, ?, ?, NOW(), ?)";
            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $clave,
                        $id,
                        $talla,
                        $cantidad,
                        $subtotal
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function Agregar_Venta_Pendiente($id, $sid, $correo, $total)
    {
        try {
            $sql = "INSERT INTO ventas (ID_USUARIO,CLAVE_TRANSACCION,PAYPAL_DATOS,FECHA,CORREO,TOTAL,STATUS) VALUES (?, ?, ' ', NOW(), ?, ?,'Pendiente')";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($id, $sid, $correo, $total));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar_Venta_A($datos, $id)
    {
        try {
            $sql = "UPDATE ventas SET PAYPAL_DATOS = ?, STATUS = 'Aprobado'	WHERE ID_VENTA = ?";
            $this->pdo->prepare($sql)
                ->execute(
                    array($datos, $id)
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar_Venta_C($clave, $id)
    {
        try {
            $sql = "UPDATE ventas SET STATUS = 'Completo' WHERE CLAVE_TRANSACCION = ? AND ID_VENTA = ?";
            $this->pdo->prepare($sql)
                ->execute(
                    array($clave, $id)
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Ultimas_Ventas()
    {
        try {
            $stm = $this->pdo->prepare("SELECT ID_VENTA,ID_USUARIO,FECHA,STATUS FROM ventas ORDER BY ID_VENTA DESC LIMIt 2");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
