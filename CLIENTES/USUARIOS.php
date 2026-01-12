<?php

class usuarios {

    private $email;
    private $nombre;
    private $apellido;
    private $telefono;
    private $grados;


    // Getter mágico para leer cualquier propiedad privada
    public function __get($atributo) {
        if (property_exists($this, $atributo)) {
            return $this->$atributo;
        }
    }

    // Setter mágico para modificar cualquier propiedad privada
    public function __set($atributo, $valor) {
        if (property_exists($this, $atributo)) {
            $this->$atributo = $valor;
        }
    }

}