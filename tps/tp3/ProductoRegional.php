<?php

require_once 'Producto.php';

class ProductoRegional extends Producto {
    private $porcentajeDescuento;

    public function __construct($codigoBarra, $descripcion, $stock, $porcentajeIVA, $precioCompra, Rubro $rubro, $porcentajeDescuento) {
        parent::__construct($codigoBarra, $descripcion, $stock, $porcentajeIVA, $precioCompra, $rubro);
        $this->porcentajeDescuento = $porcentajeDescuento;
    }

    public function darPrecioVenta() {
        $precioVenta = parent::darPrecioVenta();
        $precioVenta *= (1 - $this->porcentajeDescuento / 100);
        return $precioVenta;
    }

    public function getPorcentajeDescuento() {
        return $this->porcentajeDescuento;
    }
}
?>
