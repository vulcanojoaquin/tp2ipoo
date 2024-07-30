<?php

class Mostrador {
    // Atributos privados
    private $tipos_tramites; // Array de tipos de trámites que puede atender
    private $cola_clientes; // Array de clientes en la cola
    private $capacidad_maxima; // Capacidad máxima de la cola

    // Constructor
    public function __construct($tipos_tramites, $capacidad_maxima) {
        $this->tipos_tramites = $tipos_tramites;
        $this->cola_clientes = [];
        $this->capacidad_maxima = $capacidad_maxima;
    }

    // Métodos de acceso
    public function getTiposTramites() {
        return $this->tipos_tramites;
    }

    public function setTiposTramites($tipos_tramites) {
        $this->tipos_tramites = $tipos_tramites;
    }

    public function getColaClientes() {
        return $this->cola_clientes;
    }

    public function setColaClientes($cola_clientes) {
        $this->cola_clientes = $cola_clientes;
    }

    public function getCapacidadMaxima() {
        return $this->capacidad_maxima;
    }

    public function setCapacidadMaxima($capacidad_maxima) {
        $this->capacidad_maxima = $capacidad_maxima;
    }

    // Método para atender un trámite
    public function atiende(Tramite $unTramite) {
        return in_array($unTramite->getTipo(), $this->tipos_tramites);
    }

    // Método para agregar un cliente a la cola
    public function agregarCliente($cliente) {
        if (count($this->cola_clientes) < $this->capacidad_maxima) {
            $this->cola_clientes[] = $cliente;
            return true;
        }
        return false;
    }

    // Redefinir el método __toString
    public function __toString() {
        return "Tipos de Trámites: " . implode(", ", $this->tipos_tramites) . "\n" .
               "Clientes en Cola: " . count($this->cola_clientes) . "\n" .
               "Capacidad Máxima: " . $this->capacidad_maxima . "\n";
    }
}
?>
