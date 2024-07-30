<?php
require_once 'Persona.php';

abstract class Cuenta {
    // Atributos privados
    private $saldo;
    private $dueno;

    // Constructor
    public function __construct(Persona $dueno, $saldoInicial) {
        $this->dueno = $dueno;
        $this->saldo = $saldoInicial;
    }

    // Métodos de acceso
    public function getSaldo() {
        return $this->saldo;
    }

    public function setSaldo($saldo) {
        $this->saldo = $saldo;
    }

    public function getDueno() {
        return $this->dueno;
    }

    public function setDueno(Persona $dueno) {
        $this->dueno = $dueno;
    }

    // Método para realizar un depósito
    public function realizarDeposito($monto) {
        if ($monto > 0) {
            $this->saldo += $monto;
            return true;
        }
        return false;
    }

    // Método para realizar un retiro (abstracto, a ser implementado por subclases)
    abstract public function realizarRetiro($monto);

    // Redefinir el método __toString
    public function __toString() {
        return "Saldo: " . $this->saldo . "\n" .
               "Dueño: " . $this->dueno . "\n";
    }
}
?>
