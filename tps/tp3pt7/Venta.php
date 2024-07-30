<?php

require_once 'Cliente.php';
require_once 'PaqueteTuristico.php';

class Venta {
    private $fecha;
    private $paquete;
    private $cantidadPersonas;
    private $cliente;

    public function __construct($fecha, PaqueteTuristico $paquete, $cantidadPersonas, Cliente $cliente) {
        $this->fecha = new DateTime($fecha);
        $this->paquete = $paquete;
        $this->cantidadPersonas = $cantidadPersonas;
        $this->cliente = $cliente;
    }

    public function darImporteVenta() {
        return $this->paquete->darPrecioPorPersona() * $this->cantidadPersonas;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getPaquete() {
        return $this->paquete;
    }

    public function getCantidadPersonas() {
        return $this->cantidadPersonas;
    }

    public function getCliente() {
        return $this->cliente;
    }
}
?>
