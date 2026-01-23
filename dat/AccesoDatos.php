<?php
// 1. Importar la configuración y la clase de usuario
include_once __DIR__ . '/../app/config.php'; // Sube a la raíz y entra en app
include_once __DIR__ . '/usuarios.php';      // Está en la misma carpeta 'dat'

class AccesoDatos {
    private static $modelo = null;
    private $dbh = null;

    public static function getModelo() {
        if (self::$modelo == null) {
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }

    private function __construct() {
        try {
            // Usa las constantes de app/config.php
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
            $this->dbh = new PDO($dsn, DB_USER, DB_PASS);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión con la base de datos: " . $e->getMessage());
        }
    }

    public function getConexion() {
        return $this->dbh;
    }

    public function getUsuarioPorEmail($email) {
        $stmt = $this->dbh->prepare("SELECT * FROM USUARIOS WHERE EMAIL = :email");
        $stmt->bindParam(':email', $email);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'usuarios');
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getTodosLosUsuarios() {
        try {
            $stmt = $this->dbh->prepare("SELECT * FROM USUARIOS");
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'usuarios');
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }
}
?>