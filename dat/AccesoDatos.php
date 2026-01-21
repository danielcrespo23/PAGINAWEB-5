<?php
// Como este archivo está en app/dat, subimos un nivel (..) para buscar config.php en app/
include_once __DIR__ . '/../app/config.php'; 
include_once __DIR__ . '/usuarios.php';

class AccesoDatos {
    private static $modelo = null;
    private $dbh = null;

    public static function getModelo() {
        if (self::$modelo == null) {
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }
    public function getConexion() {
    return $this->dbh;
    }

    private function __construct() {
        try {
            // Usamos las constantes que definimos en config.php
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
            $this->dbh = new PDO($dsn, DB_USER, DB_PASS);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error conexión: " . $e->getMessage());
        }
    }

    // Buscamos usuario por email
    public function getUsuarioPorEmail($email) {
        $stmt = $this->dbh->prepare("SELECT * FROM USUARIOS WHERE EMAIL = :email");
        $stmt->bindParam(':email', $email);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'usuarios');
        $stmt->execute();
        return $stmt->fetch();
    }
    
    public function __clone() { trigger_error('La clonación no está permitida', E_USER_ERROR); }
    // Añadir dentro de la clase AccesoDatos
public function getTodosLosUsuarios() {
    try {
        $stmt = $this->dbh->prepare("SELECT * FROM USUARIOS");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'usuarios');
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        return []; // Retorna lista vacía si hay error
    }
}

}

?>