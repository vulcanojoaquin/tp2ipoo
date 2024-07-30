<?php

require_once 'Venta.php';

class VentaOnline extends Venta {
    private $porcentajeDescuento;

    public function __construct($fecha, PaqueteTuristico $paquete, $cantidadPersonas, Cliente $cliente, $porcentajeDescuento = 20) {
        parent::__construct($fecha, $paquete, $cantidadPersonas, $cliente);
        $this->porcentajeDescuento = $porcentajeDescuento;
    }

    public function darImporteVenta() {
        $importe = parent::darImporteVenta();
        return $importe * (1 - $this->porcentajeDescuento / 100);
    }

    public function getPorcentajeDescuento() {
        return $this->porcentajeDescuento;
    }
}
?>
