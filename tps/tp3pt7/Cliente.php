<?php

class Cliente {
    private $tipoDoc;
    private $numDoc;

    public function __construct($tipoDoc, $numDoc) {
        $this->tipoDoc = $tipoDoc;
        $this->numDoc = $numDoc;
    }

    public function getTipoDoc() {
        return $this->tipoDoc;
    }

    public function getNumDoc() {
        return $this->numDoc;
    }
}
?>
