<?php

class Producto {
    protected $codigoBarra;
    protected $descripcion;
    protected $stock;
    protected $porcentajeIVA;
    protected $precioCompra;
    protected $rubro;

    public function __construct($codigoBarra, $descripcion, $stock, $porcentajeIVA, $precioCompra, Rubro $rubro) {
        $this->codigoBarra = $codigoBarra;
        $this->descripcion = $descripcion;
        $this->stock = $stock;
        $this->porcentajeIVA = $porcentajeIVA;
        $this->precioCompra = $precioCompra;
        $this->rubro = $rubro;
    }

    public function darPrecioVenta() {
        $precioVenta = $this->precioCompra * (1 + $this->rubro->getPorcentajeGanancia() / 100);
        $precioVenta *= (1 + $this->porcentajeIVA / 100);
        return $precioVenta;
    }

    public function getCodigoBarra() {
        return $this->codigoBarra;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getPorcentajeIVA() {
        return $this->porcentajeIVA;
    }

    public function getPrecioCompra() {
        return $this->precioCompra;
    }

    public function getRubro() {
        return $this->rubro;
    }
}
?>
