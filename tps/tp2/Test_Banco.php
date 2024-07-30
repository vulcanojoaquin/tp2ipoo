<?php
require_once 'Tramite.php';
require_once 'Mostrador.php';
require_once 'Banco.php';

// Crear trámites
$tramite1 = new Tramite("Apertura de cuenta", "09:00", "09:30");
$tramite2 = new Tramite("Cierre de cuenta", "10:00", "10:30");

// Crear mostradores
$mostrador1 = new Mostrador(["Apertura de cuenta"], 5);
$mostrador2 = new Mostrador(["Cierre de cuenta"], 3);
$mostrador3 = new Mostrador(["Apertura de cuenta", "Cierre de cuenta"], 10);

// Crear banco y agregar mostradores
$banco = new Banco();
$banco->agregarMostrador($mostrador1);
$banco->agregarMostrador($mostrador2);
$banco->agregarMostrador($mostrador3);

// Atender clientes
echo $banco->atender("Cliente1", $tramite1) . "\n";
echo $banco->atender("Cliente2", $tramite2) . "\n";
echo $banco->atender("Cliente3", $tramite1) . "\n";

// Obtener mostradores que atienden un trámite
$mostradoresApertura = $banco->mostradoresQueAtienden($tramite1);
echo "Mostradores que atienden 'Apertura de cuenta':\n";
foreach ($mostradoresApertura as $mostrador) {
    echo $mostrador . "\n";
}

// Obtener el mejor mostrador para un trámite
$mejorMostrador = $banco->mejorMostradorPara($tramite1);
echo "Mejor mostrador para 'Apertura de cuenta':\n";
echo $mejorMostrador ? $mejorMostrador : "No hay mostrador disponible.\n";

// Imprimir la información de los mostradores
echo "Información de los mostradores:\n";
foreach ($banco->getMostradores() as $mostrador) {
    echo $mostrador . "\n";
}
?>
