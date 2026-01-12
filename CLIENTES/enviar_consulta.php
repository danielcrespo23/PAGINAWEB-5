<?php

require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == $_POST) {
    $email    = $_POST['email'];
    $nombre    = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono  = $_POST['telefono'];
    $grados = $_POST['grados'];
}

try {
    $sql = "INSERT INTO USUARIOS (email, nombre, apellido, telefono, grados) 
        VALUES (:email, :nombre, :apellido, :telefono, :grados)";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':email' => $email,
        ':nombre' => $nombre,
        ':apellido'  => $apellido,
        ':telefono' => $telefono,
        ':grados' => $grados
    ]);

    echo "<h1>¡Solicitud enviada!</h1>";
    echo "<p>Gracias $nombre, en breve te contactaremos para informarte sobre el grado $grados.</p>";

} catch (PDOException $e) {
    echo " Ha habido un error al procesar la consulta " . $e -> getMessage();
}
