<?php
class Producto
{
    private $pdo;

    public $id_pro;
    public $id_cat_pro;
    public $nom_pro;
    public $des_pro;
    public $stock_s;
    public $stock_m;
    public $stock_l;
    public $color;
    public $imagen_1;
    public $imagen_2;
    public $precio;

    public function __construct()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_mas_vendidos()
    {
        try {
            $stm = $this->pdo->prepare("SELECT  ID_PRODUCTO,NOMBRE_PRODUCTO, PRECIO_PRODUCTO, IMAGEN_1_PRODUCTO FROM stock_producto WHERE ID_PRODUCTO in (SELECT ID_PRODUCTO FROM detalle_ventas WHERE 1 = 1 GROUP BY(ID_PRODUCTO) ORDER BY (SUM(CANTIDAD_VENDIDA))) LIMIT 6");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_recien_agregados()
    {
        try {
            $stm = $this->pdo->prepare("SELECT ID_PRODUCTO,NOMBRE_PRODUCTO, PRECIO_PRODUCTO, IMAGEN_1_PRODUCTO FROM stock_producto ORDER BY FECHA_CREACION DESC LIMIT 6");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Productos()
    {
        try {
            $stm = $this->pdo->prepare("SELECT ID_PRODUCTO,NOMBRE_PRODUCTO,DESCRIPCION_PRODUCTO,IMAGEN_1_PRODUCTO,PRECIO_PRODUCTO FROM stock_producto");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Producto_Id($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM stock_producto WHERE ID_PRODUCTO = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Producto_por_Categoria($nombre)
    {
        try {
            $stm = $this->pdo->prepare("SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, IMAGEN_1_PRODUCTO, PRECIO_PRODUCTO FROM stock_producto WHERE ID_CATEGORIA_PRODUCTO =(SELECT ID_CATEGORIA_PRODUCTO FROM categoria_producto WHERE NOMBRE_CATEGORIA_PRODUCTO = ? )");
            $stm->execute(array($nombre));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Detalle_Producto($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM stock_producto WHERE ID_PRODUCTO = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Mostrar_Imagen_Id($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT IMAGEN_1_PRODUCTO FROM stock_producto WHERE ID_PRODUCTO = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Mostrar_Stock($tipo, $id)
    {
        try {
            $talla = "STOCK_TALLA_" . $tipo;
            $stm = $this->pdo->prepare("SELECT $talla FROM stock_producto WHERE ID_PRODUCTO = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar_Stock($tipo, $id, $cantidad)
    {
        try {
            print_r($tipo);
            $talla = "STOCK_TALLA_" . $tipo;
            print_r($talla);
            $sql = "UPDATE stock_producto SET $talla = ? WHERE ID_PRODUCTO = ?";
            $this->pdo->prepare($sql)
                ->execute(
                    array($cantidad, $id)
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Mostrar_Productos_por_Venta($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * from detalle_ventas,stock_producto where detalle_ventas.ID_PRODUCTO = stock_producto.ID_PRODUCTO AND detalle_ventas.ID_VENTA = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Agregar_Producto(Producto $data)
    {
        try {
            $sql = "INSERT INTO stock_producto (ID_PRODUCTO, ID_CATEGORIA_PRODUCTO, NOMBRE_PRODUCTO, DESCRIPCION_PRODUCTO, STOCK_TALLA_S, STOCK_TALLA_M, STOCK_TALLA_L, COLOR_PRODUCTO, IMAGEN_1_PRODUCTO, IMAGEN_2_PRODUCTO, FECHA_CREACION, PRECIO_PRODUCTO) 
                    VALUES(?,?,?,?,?,?,?,?,?,?,NOW(),?)";
            $this->pdo->prepare($sql)->execute(array(
                $data->id_pro,
                $data->id_cat_pro,
                $data->nom_pro,
                $data->des_pro,
                $data->stock_s,
                $data->stock_m,
                $data->stock_l,
                $data->color,
                $data->imagen_1,
                $data->imagen_2,
                $data->precio
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar_Producto(Producto $data)
    {
        var_dump($data);
        try {
            $sql = "UPDATE stock_producto SET NOMBRE_PRODUCTO = ?, DESCRIPCION_PRODUCTO = ?, STOCK_TALLA_S = ?, STOCK_TALLA_M = ?, STOCK_TALLA_L = ?, COLOR_PRODUCTO = ?, PRECIO_PRODUCTO=? WHERE ID_PRODUCTO = ?";
            $this->pdo->prepare($sql)->execute(array(
                $data->nom_pro,
                $data->des_pro,
                $data->stock_s,
                $data->stock_m,
                $data->stock_l,
                $data->color,
                $data->precio,
                $data->id_pro
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Todo_Productos()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM stock_producto");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar_Producto($id)
    {
        try {
            $stm = $this->pdo->prepare("DELETE from stock_producto WHERE ID_PRODUCTO = ?");
            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Ultimos_Productos()
    {
        try {
            $stm = $this->pdo->prepare("SELECT ID_PRODUCTO,ID_CATEGORIA_PRODUCTO,NOMBRE_PRODUCTO,FECHA_CREACION FROM stock_producto ORDER BY FECHA_CREACION LIMIT 2");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
