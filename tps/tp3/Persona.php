<?php

class Persona {
    // Atributos privados
    private $nombre;
    private $apellido;
    private $tipo;
    private $numero_documento;

    // Constructor
    public function __construct($nombre, $apellido, $tipo, $numero_documento) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipo = $tipo;
        $this->numero_documento = $numero_documento;
    }

    // Métodos de acceso
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getNumeroDocumento() {
        return $this->numero_documento;
    }

    public function setNumeroDocumento($numero_documento) {
        $this->numero_documento = $numero_documento;
    }

    // Redefinir el método __toString
    public function __toString() {
        return "Nombre: " . $this->nombre . "\n" .
               "Apellido: " . $this->apellido . "\n" .
               "Tipo de Documento: " . $this->tipo . "\n" .
               "Número de Documento: " . $this->numero_documento . "\n";
    }
}
?>
