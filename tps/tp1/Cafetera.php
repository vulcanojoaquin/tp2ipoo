<?php

class Cafetera {
    private $capacidadMaxima; // Capacidad máxima de la cafetera
    private $cantidadActual;  // Cantidad actual de café en la cafetera

    // Constructor
    public function __construct($capacidadMaxima, $cantidadActual) {
        $this->capacidadMaxima = $capacidadMaxima;
        $this->cantidadActual = min($cantidadActual, $capacidadMaxima); // Asegura que la cantidad actual no exceda la capacidad máxima
    }

    // Métodos de acceso
    public function getCapacidadMaxima() {
        return $this->capacidadMaxima;
    }

    public function setCapacidadMaxima($capacidadMaxima) {
        $this->capacidadMaxima = $capacidadMaxima;
    }

    public function getCantidadActual() {
        return $this->cantidadActual;
    }

    public function setCantidadActual($cantidadActual) {
        $this->cantidadActual = min($cantidadActual, $this->capacidadMaxima); // Asegura que la cantidad actual no exceda la capacidad máxima
    }

    // Llenar la cafetera
    public function llenarCafetera() {
        $this->cantidadActual = $this->capacidadMaxima;
    }

    // Servir una taza
    public function servirTaza($cantidad) {
        if ($this->cantidadActual >= $cantidad) {
            $this->cantidadActual -= $cantidad;
            echo "Se ha servido una taza de $cantidad unidades de café.\n";
        } else {
            $cantidadServida = $this->cantidadActual;
            $this->cantidadActual = 0;
            echo "Solo se pudo servir $cantidadServida unidades de café. La cafetera no tenía suficiente café.\n";
        }
    }

    // Vaciar la cafetera
    public function vaciarCafetera() {
        $this->cantidadActual = 0;
    }

    // Agregar café
    public function agregarCafe($cantidad) {
        $this->cantidadActual += $cantidad;
        if ($this->cantidadActual > $this->capacidadMaxima) {
            $this->cantidadActual = $this->capacidadMaxima;
        }
    }

    // Redefinir el método __toString()
    public function __toString() {
        return sprintf(
            'Cafetera: Capacidad Máxima: %d unidades, Cantidad Actual: %d unidades',
            $this->capacidadMaxima, $this->cantidadActual
        );
    }
}

?>
