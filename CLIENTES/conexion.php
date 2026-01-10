<?php

$dsn = 'mysql:host=localhost;dbname=CLIENTES;charset=utf8mb4';
$usuario = 'root';
$pass = 'root';

try {
    // Crear la instancia PDO
    $pdo = new PDO($dsn, $usuario, $pass);
   
    echo "¡Conexión exitosa!";
   } catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
   }