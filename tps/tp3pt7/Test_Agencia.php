<?php

require_once 'Destino.php';
require_once 'PaqueteTuristico.php';
require_once 'Agencia.php';
require_once 'Cliente.php';

// Crear un destino
$destinoBariloche = new Destino(1, 'Bariloche', 250);

// Crear un paquete turístico
$paquete = new PaqueteTuristico('2014-05-23', 3, $destinoBariloche, 25);

// Crear una agencia
$agencia = new Agencia();

// Incorporar paquetes a la agencia
$resultado1 = $agencia->incorporarPaquete($paquete);
echo "Incorporar primer paquete: " . ($resultado1 ? "Éxito" : "Fallido") . "\n";

$resultado2 = $agencia->incorporarPaquete($paquete);
echo "Incorporar segundo paquete (duplicado): " . ($resultado2 ? "Éxito" : "Fallido") . "\n";

// Incorporar ventas
$importe1 = $agencia->incorporarVenta($paquete, 'DNI', '27898654', 5, false);
echo "Importe venta normal: $importe1\n";

$importe2 = $agencia->incorporarVenta($paquete, 'DNI', '27898654', 4, true);
echo "Importe venta online con descuento: $importe2\n";

$importe3 = $agencia->incorporarVenta($paquete, 'DNI', '27898654', 15, true);
echo "Importe venta online con descuento (fallida): $importe3\n";

// Informar paquetes turísticos
$paquetes = $agencia->informarPaquetesTuristicos('2014-05-23', 'Bariloche');
echo "Paquetes turísticos el 2014-05-23 en Bariloche: " . count($paquetes) . "\n";

// Paquete más económico
$paqueteEconomico = $agencia->paqueteMasEconomico('2014-05-23', 'Bariloche');
if ($paqueteEconomico) {
    echo "Paquete más económico: " . $paqueteEconomico->darPrecioPorPersona() . "\n";
} else {
    echo "No se encontró un paquete económico\n";
}

// Consumo del cliente
$productosComprados = $agencia->informarConsumoCliente('DNI', '27898654');
echo "Paquetes consumidos por cliente: " . count($productosComprados) . "\n";

// Paquetes más vendidos
$paquetesMasVendidos = $agencia->informarPaquetesMasVendidos(2014, 2);
echo "Paquetes más vendidos: " . implode(', ', $paquetesMasVendidos) . "\n";

// Promedio de ventas online y agencia
$promedioOnline = $agencia->promedioVentasOnLine();
echo "Promedio ventas online: $promedioOnline\n";

$promedioAgencia = $agencia->promedioVentasAgencia();
echo "Promedio ventas agencia: $promedioAgencia\n";
?>
