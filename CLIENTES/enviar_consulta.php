<?php

require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == $_POST) {
    $correo    = $_POST['correo'];
    $nombre    = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono  = $_POST['telefono'];
    $grado     = $_POST['grado'];
}