<?php

class Cuadrado {
    private $x; // Coordenada X del punto inferior izquierdo
    private $y; // Coordenada Y del punto inferior izquierdo
    private $tamaño; // Tamaño del lado del cuadrado

    // Constructor
    public function __construct($x, $y, $tamaño) {
        $this->x = $x;
        $this->y = $y;
        $this->tamaño = $tamaño;
    }

    // Métodos de acceso
    public function getX() {
        return $this->x;
    }

    public function setX($x) {
        $this->x = $x;
    }

    public function getY() {
        return $this->y;
    }

    public function setY($y) {
        $this->y = $y;
    }

    public function getTamaño() {
        return $this->tamaño;
    }

    public function setTamaño($tamaño) {
        $this->tamaño = $tamaño;
    }

    // Método para calcular el área del cuadrado
    public function area() {
        return $this->tamaño * $this->tamaño;
    }

    // Método para desplazar el cuadrado en el plano
    public function desplazar($d) {
        $this->x += $d['x'];
        $this->y += $d['y'];
    }

    // Método para aumentar el tamaño del cuadrado
    public function aumentarTamaño($t) {
        $this->tamaño += $t;
    }

    // Redefinir el método __toString()
    public function __toString() {
        return sprintf(
            'Cuadrado: Punto Inferior Izquierdo (%d, %d), Tamaño: %d, Área: %d',
            $this->x, $this->y, $this->tamaño, $this->area()
        );
    }
}

?>
