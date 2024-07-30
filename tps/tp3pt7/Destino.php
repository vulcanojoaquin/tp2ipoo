<?php

class Destino {
    private $id;
    private $nombre;
    private $valorDia;

    public function __construct($id, $nombre, $valorDia) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->valorDia = $valorDia;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getValorDia() {
        return $this->valorDia;
    }
}
?>
