<?php
require_once 'Persona.php';

class Cliente extends Persona {
    // Atributo privado
    private $nro_cliente;

    // Constructor
    public function __construct($nombre, $apellido, $tipo, $numero_documento, $nro_cliente) {
        parent::__construct($nombre, $apellido, $tipo, $numero_documento);
        $this->nro_cliente = $nro_cliente;
    }

    // Métodos de acceso
    public function getNroCliente() {
        return $this->nro_cliente;
    }

    public function setNroCliente($nro_cliente) {
        $this->nro_cliente = $nro_cliente;
    }

    // Redefinir el método __toString
    public function __toString() {
        return parent::__toString() . // Obtener la información de Persona
               "Número de Cliente: " . $this->nro_cliente . "\n";
    }
}
?>
