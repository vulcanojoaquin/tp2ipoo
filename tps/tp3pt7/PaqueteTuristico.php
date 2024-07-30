<?php

require_once 'Destino.php';

class PaqueteTuristico {
    private $fechaDesde;
    private $cantidadDias;
    private $destino;
    private $cantidadTotalPlazas;
    private $cantidadDisponiblePlazas;

    public function __construct($fechaDesde, $cantidadDias, Destino $destino, $cantidadTotalPlazas) {
        $this->fechaDesde = new DateTime($fechaDesde);
        $this->cantidadDias = $cantidadDias;
        $this->destino = $destino;
        $this->cantidadTotalPlazas = $cantidadTotalPlazas;
        $this->cantidadDisponiblePlazas = $cantidadTotalPlazas;
    }

    public function darPrecioPorPersona() {
        return $this->destino->getValorDia() * $this->cantidadDias;
    }

    public function getFechaDesde() {
        return $this->fechaDesde;
    }

    public function getCantidadDias() {
        return $this->cantidadDias;
    }

    public function getDestino() {
        return $this->destino;
    }

    public function getCantidadTotalPlazas() {
        return $this->cantidadTotalPlazas;
    }

    public function getCantidadDisponiblePlazas() {
        return $this->cantidadDisponiblePlazas;
    }

    public function reservarPlazas($cantidad) {
        if ($this->cantidadDisponiblePlazas >= $cantidad) {
            $this->cantidadDisponiblePlazas -= $cantidad;
            return true;
        }
        return false;
    }
}
?>
