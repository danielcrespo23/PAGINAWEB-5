<?php

require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == $_POST) {
    $email    = $_POST['email'];
    $nombre    = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono  = $_POST['telefono'];
}

