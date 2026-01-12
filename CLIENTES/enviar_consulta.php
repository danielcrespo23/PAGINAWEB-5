<?php

require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == $_POST) {
    $email    = $_POST['email'];
    $nombre    = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono  = $_POST['telefono'];
}

try {
    $sql = "INSERT INTO USUARIOS (email, nombre, apellido, telefono) 
        VALUES (:email, :nombre, :apellido, :telefono)";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':email' => $email,
        ':nombre' => $nombre,
        ':apellido'  => $apellido,
        ':telefono' => $telefono
    ]);

} catch (PDOException $e) {

}
