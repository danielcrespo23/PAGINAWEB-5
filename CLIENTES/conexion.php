<?php

$dsn = 'mysql:host=localhost;dbname=CLIENTES;charset=utf8mb4';
$usuario = 'root';
$pass = 'root';

try {
    // Crear la instancia PDO
    $pdo = new PDO($dsn, $usuario, $pass);
   
    // Configurar para que lance excepciones en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    echo "¡Conexión exitosa!";
   } catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
   }