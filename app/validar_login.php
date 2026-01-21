<?php
session_start();
include_once __DIR__ . '/../dat/AccesoDatos.php';

$login = $_POST['email'] ?? ''; // Ahora puede ser 'admin' o un email
$clave = $_POST['clave'] ?? '';

// 1. COMPROBACIÓN DE ADMINISTRADOR (A FUEGO)
if ($login === 'admin' && $clave === 'admin') {
    $_SESSION['usuario'] = 'ADMIN'; // Guardamos que eres admin
    $_SESSION['ultimo_acceso'] = time();
    header("Location: ../index.php");
    exit();
}

// 2. COMPROBACIÓN DE USUARIO NORMAL (BASE DE DATOS)
$modelo = AccesoDatos::getModelo();
$usuario = $modelo->getUsuarioPorEmail($login);

if ($usuario && password_verify($clave, $usuario->CLAVE)) {
    $_SESSION['usuario'] = $usuario; // Guardamos el objeto usuario
    $_SESSION['ultimo_acceso'] = time(); 
    header("Location: ../index.php");
    exit();
} else {
    header("Location: ../login.php?error=1");
    exit();
}