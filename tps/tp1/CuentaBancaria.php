<?php

class CuentaBancaria {
    private $numeroCuenta;  // Número de cuenta
    private $dniCliente;    // DNI del cliente
    private $saldoActual;   // Saldo actual
    private $interesAnual;  // Interés anual

    // Constructor
    public function __construct($numeroCuenta, $dniCliente, $saldoActual, $interesAnual) {
        $this->numeroCuenta = $numeroCuenta;
        $this->dniCliente = $dniCliente;
        $this->saldoActual = $saldoActual;
        $this->interesAnual = $interesAnual;
    }

    // Métodos de acceso
    public function getNumeroCuenta() {
        return $this->numeroCuenta;
    }

    public function setNumeroCuenta($numeroCuenta) {
        $this->numeroCuenta = $numeroCuenta;
    }

    public function getDniCliente() {
        return $this->dniCliente;
    }

    public function setDniCliente($dniCliente) {
        $this->dniCliente = $dniCliente;
    }

    public function getSaldoActual() {
        return $this->saldoActual;
    }

    public function setSaldoActual($saldoActual) {
        $this->saldoActual = $saldoActual;
    }

    public function getInteresAnual() {
        return $this->interesAnual;
    }

    public function setInteresAnual($interesAnual) {
        $this->interesAnual = $interesAnual;
    }

    // Actualizar saldo aplicando el interés diario
    public function actualizarSaldo() {
        $interesDiario = $this->interesAnual / 365 / 100;
        $this->saldoActual += $this->saldoActual * $interesDiario;
    }

    // Depositar dinero en la cuenta
    public function depositar($cantidad) {
        if ($cantidad > 0) {
            $this->saldoActual += $cantidad;
        } else {
            echo "La cantidad a depositar debe ser positiva.\n";
        }
    }

    // Retirar dinero de la cuenta
    public function retirar($cantidad) {
        if ($cantidad > 0) {
            if ($this->saldoActual >= $cantidad) {
                $this->saldoActual -= $cantidad;
            } else {
                echo "No hay suficiente saldo para retirar esa cantidad.\n";
            }
        } else {
            echo "La cantidad a retirar debe ser positiva.\n";
        }
    }

    // Redefinir el método __toString()
    public function __toString() {
        return sprintf(
            "Cuenta Bancaria: Número de Cuenta: %s, DNI del Cliente: %s, Saldo Actual: %.2f, Interés Anual: %.2f%%",
            $this->numeroCuenta, $this->dniCliente, $this->saldoActual, $this->interesAnual
        );
    }
}

?>
