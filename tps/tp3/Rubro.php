<?php

class Rubro {
    private $descripcion;
    private $porcentajeGanancia;

    public function __construct($descripcion, $porcentajeGanancia) {
        $this->descripcion = $descripcion;
        $this->porcentajeGanancia = $porcentajeGanancia;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPorcentajeGanancia() {
        return $this->porcentajeGanancia;
    }
}
?>
