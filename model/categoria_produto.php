<?php
class CategoriaProducto
{
    private $pdo;
    public $id_cat;
    public $nombre_cat;

    public function __construct()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM categoria_producto");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM categoria_producto WHERE ID_CATEGORIA_PRODUCTO = ?");
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Actualizar($data)
    {
        try {
            $sql = "UPDATE categoria_producto SET NOMBRE_CATEGORIA_PRODUCTO = ?	WHERE ID_CATEGORIA_PRODUCTO = ?";
            $this->pdo->prepare($sql) 
                ->execute(
                    array(
                        $data->nombre,
                        $data->id
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function ELiminar()
    {
    }

    public function Registrar()
    {
    }
}
