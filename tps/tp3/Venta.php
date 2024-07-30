<?php

require_once 'Cliente.php';
require_once 'Producto.php';

class Venta {
    private $fecha;
    private $productos;
    private $cliente;

    public function __construct($fecha, $cliente, $productos = []) {
        $this->fecha = $fecha;
        $this->cliente = $cliente;
        $this->productos = $productos;
    }

    public function darImporteVenta() {
        $importe = 0;
        foreach ($this->productos as $producto) {
            $importe += $producto->darPrecioVenta();
        }
        return $importe;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getProductos() {
        return $this->productos;
    }
}
?>
