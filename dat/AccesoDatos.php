<?php

include_once __DIR__ . '/../app/config.php';
include_once __DIR__ . '/USUARIOS.php';

class AccesoDatos {
    private static $modelo = null;
    private $dbh = null;
}