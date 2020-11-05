<?php
class Usuario
{
    private $pdo;

    public $id;
    public $nombres;
    public $apellidos;
    public $correo;
    public $clave;
    public $telefono;
    public $fecha;
    public $rango;
    public $verificador;

    public function __construct()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Clientes()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuario WHERE RANGO_USUARIO = 0");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Trabajadores()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuario WHERE RANGO_USUARIO = 1");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Usuario_Id($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuario WHERE ID_USUARIO = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function verificar_cuenta($email, $password)
    {
        try {
            $valor = md5($password);
            echo $valor;
            $stm = $this->pdo->prepare("SELECT ID_USUARIO, NOMBRES_USUARIO, APELLIDOS_USUARIO, RANGO_USUARIO, VERIFICADOR_USUARIO,CORREO_USUARIO FROM usuario WHERE CORREO_USUARIO = ? AND CLAVE_USUARIO = ?");
            $stm->execute(array($email, $valor));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar_Datos_P($id, $nombres, $apellidos, $correo, $telefono)
    {
        try {
            $sql = "UPDATE usuario SET NOMBRES_USUARIO = ?,APELLIDOS_USUARIO = ?, CORREO_USUARIO = ?, TELEFONO_USUARIO = ? WHERE ID_USUARIO = ?";
            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $nombres,
                        $apellidos,
                        $correo,
                        $telefono,
                        $id
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Ultimos_Trabajadores()
    {
        try {
            $stm = $this->pdo->prepare("SELECT ID_USUARIO,NOMBRES_USUARIO,APELLIDOS_USUARIO,FECHA_CREACION FROM usuario WHERE RANGO_USUARIO = 1 LIMIT 2 ");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Ultimos_Clientes()
    {
        try {
            $stm = $this->pdo->prepare("SELECT ID_USUARIO,NOMBRES_USUARIO,APELLIDOS_USUARIO,FECHA_CREACION FROM usuario WHERE RANGO_USUARIO = 0 LIMIT 2 ");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
