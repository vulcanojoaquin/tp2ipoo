<?php

class Linea {
    private $pA; // Coordenada X del punto A
    private $pB; // Coordenada Y del punto A
    private $pC; // Coordenada X del punto C
    private $pD; // Coordenada Y del punto C

    // Constructor
    public function __construct($pA, $pB, $pC, $pD) {
        $this->pA = $pA;
        $this->pB = $pB;
        $this->pC = $pC;
        $this->pD = $pD;
    }

    // Métodos de acceso
    public function getPA() {
        return $this->pA;
    }

    public function setPA($pA) {
        $this->pA = $pA;
    }

    public function getPB() {
        return $this->pB;
    }

    public function setPB($pB) {
        $this->pB = $pB;
    }

    public function getPC() {
        return $this->pC;
    }

    public function setPC($pC) {
        $this->pC = $pC;
    }

    public function getPD() {
        return $this->pD;
    }

    public function setPD($pD) {
        $this->pD = $pD;
    }

    // Métodos para mover la línea
    public function mueveDerecha($d) {
        $this->pA += $d;
        $this->pC += $d;
    }

    public function mueveIzquierda($d) {
        $this->pA -= $d;
        $this->pC -= $d;
    }

    public function mueveArriba($d) {
        $this->pB += $d;
        $this->pD += $d;
    }

    public function mueveAbajo($d) {
        $this->pB -= $d;
        $this->pD -= $d;
    }

    // Redefinir el método __toString()
    public function __toString() {
        return sprintf(
            'Línea: Punto A (%d, %d), Punto C (%d, %d)',
            $this->pA, $this->pB, $this->pC, $this->pD
        );
    }
}

?>
