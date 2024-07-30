<?php
class Persona {
    // Atributos privados
    private $nombre;
    private $apellido;
    private $tipo_documento;
    private $numero_documento;

    // Método constructor
    public function __construct($nombre, $apellido, $tipo_documento, $numero_documento) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipo_documento = $tipo_documento;
        $this->numero_documento = $numero_documento;
    }

    // Métodos de acceso y modificación
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

    public function getTipoDocumento() {
        return $this->tipo_documento;
    }

    public function setTipoDocumento($tipo_documento) {
        $this->tipo_documento = $tipo_documento;
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
               "Tipo de Documento: " . $this->tipo_documento . "\n" .
               "Número de Documento: " . $this->numero_documento;
    }
}
?>
