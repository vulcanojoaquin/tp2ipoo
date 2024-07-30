<?php

require_once 'Producto.php';

class ProductoImportado extends Producto {
    public function darPrecioVenta() {
        $precioVenta = parent::darPrecioVenta();
        $precioVenta *= 1.5; // Incremento del 50%
        $precioVenta *= 1.1; // Impuesto del 10%
        return $precioVenta;
    }
}
?>
