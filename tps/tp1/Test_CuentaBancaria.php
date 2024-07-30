<?php

require_once 'CuentaBancaria.php'; // Asegúrate de que la ruta sea correcta

// Crear un objeto CuentaBancaria
$cuenta = new CuentaBancaria('123456789', '12345678A', 1000.00, 5.0);

// Mostrar la información inicial de la cuenta bancaria
echo $cuenta . "\n"; // Usará __toString()

// Actualizar el saldo aplicando el interés diario
$cuenta->actualizarSaldo();
echo "Después de actualizar el saldo: " . $cuenta . "\n"; // Usará __toString()

// Depositar dinero en la cuenta
$cuenta->depositar(200.00);
echo "Después de depositar 200 unidades: " . $cuenta . "\n"; // Usará __toString()

// Intentar retirar una cantidad
$cuenta->retirar(150.00);
echo "Después de retirar 150 unidades: " . $cuenta . "\n"; // Usará __toString()

// Intentar retirar una cantidad mayor al saldo
$cuenta->retirar(2000.00); // Mensaje de error esperado

// Intentar depositar una cantidad negativa
$cuenta->depositar(-50.00); // Mensaje de error esperado

// Mostrar la información final de la cuenta bancaria
echo "Estado final de la cuenta: " . $cuenta . "\n"; // Usará __toString()

?>
