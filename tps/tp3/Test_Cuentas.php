<?php
require_once 'Persona.php';
require_once 'CuentaCorriente.php';
require_once 'CajaDeAhorro.php';

// Crear una persona
$persona = new Persona("Juan", "Pérez", "DNI", "12345678");

// Crear una cuenta corriente
$cuentaCorriente = new CuentaCorriente($persona, 1000, 500);
echo "Cuenta Corriente:\n";
echo $cuentaCorriente;

// Realizar depósitos y retiros
$cuentaCorriente->realizarDeposito(200);
echo "Después del depósito:\n";
echo $cuentaCorriente;

$cuentaCorriente->realizarRetiro(1300); // Debería permitirlo ya que el descubierto es 500
echo "Después del retiro:\n";
echo $cuentaCorriente;

// Crear una caja de ahorro
$cajaDeAhorro = new CajaDeAhorro($persona, 1500);
echo "Caja de Ahorro:\n";
echo $cajaDeAhorro;

// Realizar depósitos y retiros
$cajaDeAhorro->realizarDeposito(300);
echo "Después del depósito:\n";
echo $cajaDeAhorro;

$cajaDeAhorro->realizarRetiro(1700); // Debería fallar porque el saldo no es suficiente
echo "Después del retiro:\n";
echo $cajaDeAhorro;
?>
