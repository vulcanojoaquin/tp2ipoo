<?php

class Tramite {
    // Atributos privados
    private $tipo;
    private $hora_creacion;
    private $hora_resolucion;

    // Constructor
    public function __construct($tipo, $hora_creacion, $hora_resolucion) {
        $this->tipo = $tipo;
        $this->hora_creacion = $hora_creacion;
        $this->hora_resolucion = $hora_resolucion;
    }

    // Métodos de acceso
    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getHoraCreacion() {
        return $this->hora_creacion;
    }

    public function setHoraCreacion($hora_creacion) {
        $this->hora_creacion = $hora_creacion;
    }

    public function getHoraResolucion() {
        return $this->hora_resolucion;
    }

    public function setHoraResolucion($hora_resolucion) {
        $this->hora_resolucion = $hora_resolucion;
    }

    // Redefinir el método __toString
    public function __toString() {
        return "Tipo: " . $this->tipo . "\n" .
               "Hora de Creación: " . $this->hora_creacion . "\n" .
               "Hora de Resolución: " . $this->hora_resolucion . "\n";
    }
}
?>
