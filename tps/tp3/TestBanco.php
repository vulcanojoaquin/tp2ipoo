<?php
require_once 'Banco.php';
require_once 'Cliente.php';
require_once 'CuentaCorriente.php';
require_once 'CajaDeAhorro.php';

class TestBanco {
    public function ejecutar() {
        // 1. Crear un objeto de la clase Banco
        $banco = new Banco();

        // 2. Crear dos nuevos clientes Cliente1 y Cliente2, y agregarlos al banco
        $cliente1 = new Cliente("Juan", "Pérez", "DNI", "12345678", 1);
        $cliente2 = new Cliente("Ana", "García", "DNI", "87654321", 2);
        $banco->incorporarCliente($cliente1);
        $banco->incorporarCliente($cliente2);

        // 3. Crear dos Cuentas Corrientes, una asociada al cliente 1 y otra al cliente 2, y agregarlas al Banco
        $nroCuentaCorriente1 = $banco->incorporarCuentaCorriente(1, 500); // Cliente 1, monto descubierto de 500
        $nroCuentaCorriente2 = $banco->incorporarCuentaCorriente(2, 300); // Cliente 2, monto descubierto de 300

        // 4. Crear tres Cajas de Ahorro, dos asociadas al cliente 1 y una asociada al cliente 2, y agregarlas al Banco
        $nroCajaAhorro1 = $banco->incorporarCajaAhorro(1); // Cliente 1
        $nroCajaAhorro2 = $banco->incorporarCajaAhorro(1); // Cliente 1
        $nroCajaAhorro3 = $banco->incorporarCajaAhorro(2); // Cliente 2

        // 5. Depositar $300 en cada una de las Cajas de Ahorro
        $banco->realizarDeposito($nroCajaAhorro1, 300);
        $banco->realizarDeposito($nroCajaAhorro2, 300);
        $banco->realizarDeposito($nroCajaAhorro3, 300);

        // 6. Transferir $150 de la Cuenta Corriente de Cliente1 a la Caja de Ahorro de Cliente2
        // Realizar retiro de la Cuenta Corriente de Cliente1
        $banco->realizarRetiro($nroCuentaCorriente1, 150);
        // Realizar depósito en la Caja de Ahorro de Cliente2
        $banco->realizarDeposito($nroCajaAhorro3, 150);

        // 7. Mostrar los datos de todas las cuentas
        echo "Datos del Banco:\n";
        echo $banco;
    }
}

// Ejecutar el test
$testBanco = new TestBanco();
$testBanco->ejecutar();
?>
