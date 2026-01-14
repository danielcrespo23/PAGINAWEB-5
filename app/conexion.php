<?php

$dsn = 'mysql:host=127.0.0.1;port=3307;dbname=CLIENTES;charset=utf8mb4';
$usuario = 'root';
$pass = '';

try {
    // Crear la instancia PDO
    $pdo = new PDO($dsn, $usuario, $pass);
   
    echo "¡Conexión exitosa!";
   } catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
   }