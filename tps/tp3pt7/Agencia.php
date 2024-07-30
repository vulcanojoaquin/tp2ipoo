<?php

require_once 'PaqueteTuristico.php';
require_once 'Venta.php';
require_once 'VentaOnline.php';
require_once 'Cliente.php';

class Agencia {
    private $paquetesTuristicos = [];
    private $ventas = [];
    private $ventasOnline = [];

    public function incorporarPaquete(PaqueteTuristico $paquete) {
        foreach ($this->paquetesTuristicos as $p) {
            if ($p->getFechaDesde() == $paquete->getFechaDesde() && $p->getDestino()->getNombre() == $paquete->getDestino()->getNombre()) {
                return false;
            }
        }
        $this->paquetesTuristicos[] = $paquete;
        return true;
    }

    public function incorporarVenta(PaqueteTuristico $paquete, $tipoDoc, $numDoc, $cantPer, $esOnLine) {
        if (!$paquete->reservarPlazas($cantPer)) {
            return -1;
        }

        $cliente = new Cliente($tipoDoc, $numDoc);
        $venta = $esOnLine ? new VentaOnline(date('Y-m-d'), $paquete, $cantPer, $cliente) : new Venta(date('Y-m-d'), $paquete, $cantPer, $cliente);

        if ($esOnLine) {
            $this->ventasOnline[] = $venta;
        } else {
            $this->ventas[] = $venta;
        }

        $this->ventas[] = $venta; // Including in general sales too
        return $venta->darImporteVenta();
    }

    public function informarPaquetesTuristicos($fecha, $destino) {
        $result = [];
        foreach ($this->paquetesTuristicos as $paquete) {
            if ($paquete->getFechaDesde()->format('Y-m-d') == $fecha && $paquete->getDestino()->getNombre() == $destino) {
                $result[] = $paquete;
            }
        }
        return $result;
    }

    public function paqueteMasEconomico($fecha, $destino) {
        $paquetes = $this->informarPaquetesTuristicos($fecha, $destino);
        $paqueteEconomico = null;
        $precioMinimo = PHP_INT_MAX;

        foreach ($paquetes as $paquete) {
            $precio = $paquete->darPrecioPorPersona();
            if ($precio < $precioMinimo) {
                $precioMinimo = $precio;
                $paqueteEconomico = $paquete;
            }
        }
        return $paqueteEconomico;
    }

    public function informarConsumoCliente($tipoDoc, $numDoc) {
        $result = [];
        foreach ($this->ventas as $venta) {
            if ($venta->getCliente()->getTipoDoc() == $tipoDoc && $venta->getCliente()->getNumDoc() == $numDoc) {
                $result[] = $venta->getPaquete();
            }
        }
        return $result;
    }

    public function informarPaquetesMasVendidos($anio, $n) {
        $ventasPorPaquete = [];

        foreach ($this->ventas as $venta) {
            $paquete = $venta->getPaquete();
            $codigo = $paquete->getFechaDesde()->format('Y-m-d') . '-' . $paquete->getDestino()->getNombre();
            if (!isset($ventasPorPaquete[$codigo])) {
                $ventasPorPaquete[$codigo] = 0;
            }
            $ventasPorPaquete[$codigo] += $venta->getCantidadPersonas();
        }

        arsort($ventasPorPaquete);
        $result = array_slice(array_keys($ventasPorPaquete), 0, $n);
        return $result;
    }

    public function promedioVentasOnLine() {
        $totalVentas = 0;
        $cantidadVentas = count($this->ventasOnline);

        foreach ($this->ventasOnline as $venta) {
            $totalVentas += $venta->darImporteVenta();
        }

        return $cantidadVentas > 0 ? $totalVentas / $cantidadVentas : 0;
    }

    public function promedioVentasAgencia() {
        $totalVentas = 0;
        $cantidadVentas = count($this->ventas);

        foreach ($this->ventas as $venta) {
            $totalVentas += $venta->darImporteVenta();
        }

        return $cantidadVentas > 0 ? $totalVentas / $cantidadVentas : 0;
    }
}
?>
