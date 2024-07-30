<?php
require_once 'Banco.php';
require_once 'Cliente.php';
require_once 'CuentaCorriente.php';
require_once 'CajaDeAhorro.php';

// Crear un banco
$banco = new Banco();

// Crear clientes
$cliente1 = new Cliente("Juan", "Pérez", "DNI", "12345678", 1);
$cliente2 = new Cliente("Ana", "García", "DNI", "87654321", 2);

// Agregar clientes al banco
$banco->agregarCliente($cliente1);
$banco->agregarCliente($cliente2);

// Crear cuentas
$nroCuentaCorriente = $banco->crearCuentaCorriente($cliente1, 1000, 500);
$nroCajaDeAhorro = $banco->crearCajaDeAhorro($cliente2, 1500);

// Mostrar información del banco
echo $banco;
?>
