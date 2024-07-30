<?php
require_once 'Cuenta.php';

class CajaDeAhorro extends Cuenta {
    // Método para realizar un retiro
    public function realizarRetiro($monto) {
        if ($monto > 0 && $this->getSaldo() >= $monto) {
            $nuevoSaldo = $this->getSaldo() - $monto;
            $this->setSaldo($nuevoSaldo);
            return true;
        }
        return false;
    }

    // Redefinir el método __toString
    public function __toString() {
        return parent::__toString(); // Solo la información de la clase base
    }
}
?>
