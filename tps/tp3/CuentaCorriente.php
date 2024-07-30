<?php
require_once 'Cuenta.php';

class CuentaCorriente extends Cuenta {
    // Atributo privado
    private $montoDescubierto;

    // Constructor
    public function __construct(Persona $dueno, $saldoInicial, $montoDescubierto) {
        parent::__construct($dueno, $saldoInicial);
        $this->montoDescubierto = $montoDescubierto;
    }

    // Método para realizar un retiro
    public function realizarRetiro($monto) {
        if ($monto > 0 && ($this->getSaldo() + $this->montoDescubierto) >= $monto) {
            $nuevoSaldo = $this->getSaldo() - $monto;
            $this->setSaldo($nuevoSaldo);
            return true;
        }
        return false;
    }

    // Métodos de acceso para montoDescubierto
    public function getMontoDescubierto() {
        return $this->montoDescubierto;
    }

    public function setMontoDescubierto($montoDescubierto) {
        $this->montoDescubierto = $montoDescubierto;
    }

    // Redefinir el método __toString
    public function __toString() {
        return parent::__toString() . // Información de la clase base
               "Monto Descubierto: " . $this->montoDescubierto . "\n";
    }
}
?>
