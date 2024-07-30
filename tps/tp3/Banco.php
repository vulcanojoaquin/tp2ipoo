<?php
require_once 'CuentaCorriente.php';
require_once 'CajaDeAhorro.php';
require_once 'Cliente.php';

class Banco {
    private $coleccionCuentaCorriente = [];
    private $coleccionCajaAhorro = [];
    private $ultimoValorCuentaAsignado = 0;
    private $coleccionCliente = [];

    // Constructor
    public function __construct() {
        // Inicializar variables si es necesario
    }

    // Incorporar un nuevo cliente
    public function incorporarCliente(Cliente $objCliente) {
        $this->coleccionCliente[$objCliente->getNroCliente()] = $objCliente;
    }

    // Incorporar una nueva Cuenta Corriente
    public function incorporarCuentaCorriente($numeroCliente, $montoDescubierto) {
        if (isset($this->coleccionCliente[$numeroCliente])) {
            $cliente = $this->coleccionCliente[$numeroCliente];
            $this->ultimoValorCuentaAsignado++;
            $cuenta = new CuentaCorriente($cliente, 0, $montoDescubierto);
            $this->coleccionCuentaCorriente[$this->ultimoValorCuentaAsignado] = $cuenta;
            return $this->ultimoValorCuentaAsignado;
        } else {
            throw new Exception("Cliente no encontrado.");
        }
    }

    // Incorporar una nueva Caja de Ahorro
    public function incorporarCajaAhorro($numeroCliente) {
        if (isset($this->coleccionCliente[$numeroCliente])) {
            $cliente = $this->coleccionCliente[$numeroCliente];
            $this->ultimoValorCuentaAsignado++;
            $cuenta = new CajaDeAhorro($cliente, 0);
            $this->coleccionCajaAhorro[$this->ultimoValorCuentaAsignado] = $cuenta;
            return $this->ultimoValorCuentaAsignado;
        } else {
            throw new Exception("Cliente no encontrado.");
        }
    }

    // Realizar un depósito
    public function realizarDeposito($numCuenta, $monto) {
        if ($monto > 0) {
            if (isset($this->coleccionCuentaCorriente[$numCuenta])) {
                $cuenta = $this->coleccionCuentaCorriente[$numCuenta];
            } elseif (isset($this->coleccionCajaAhorro[$numCuenta])) {
                $cuenta = $this->coleccionCajaAhorro[$numCuenta];
            } else {
                throw new Exception("Número de cuenta no encontrado.");
            }
            $cuenta->realizarDeposito($monto);
        } else {
            throw new Exception("El monto debe ser mayor a cero.");
        }
    }

    // Realizar un retiro
    public function realizarRetiro($numCuenta, $monto) {
        if ($monto > 0) {
            if (isset($this->coleccionCuentaCorriente[$numCuenta])) {
                $cuenta = $this->coleccionCuentaCorriente[$numCuenta];
            } elseif (isset($this->coleccionCajaAhorro[$numCuenta])) {
                $cuenta = $this->coleccionCajaAhorro[$numCuenta];
            } else {
                throw new Exception("Número de cuenta no encontrado.");
            }
            if (!$cuenta->realizarRetiro($monto)) {
                throw new Exception("No se pudo realizar el retiro.");
            }
        } else {
            throw new Exception("El monto debe ser mayor a cero.");
        }
    }

    // Redefinir el método __toString para mostrar información del banco
    public function __toString() {
        $info = "Banco\n";
        $info .= "Último valor de cuenta asignado: " . $this->ultimoValorCuentaAsignado . "\n";
        $info .= "Clientes:\n";
        foreach ($this->coleccionCliente as $cliente) {
            $info .= $cliente . "\n";
        }
        $info .= "Cuentas Corrientes:\n";
        foreach ($this->coleccionCuentaCorriente as $nro => $cuenta) {
            $info .= "Número de cuenta: $nro\n" . $cuenta . "\n";
        }
        $info .= "Cajas de Ahorro:\n";
        foreach ($this->coleccionCajaAhorro as $nro => $cuenta) {
            $info .= "Número de cuenta: $nro\n" . $cuenta . "\n";
        }
        return $info;
    }
}
?>

?>
