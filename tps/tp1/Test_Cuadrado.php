<?php

require_once 'Cuadrado.php'; // Asegúrate de que la ruta sea correcta

// Crear un objeto Cuadrado
$cuadrado = new Cuadrado(0, 0, 5);

// Mostrar la información inicial del cuadrado
echo $cuadrado . "\n"; // Usará __toString()

// Calcular y mostrar el área del cuadrado
echo "Área del cuadrado: " . $cuadrado->area() . "\n";

// Desplazar el cuadrado en el plano
$cuadrado->desplazar(['x' => 3, 'y' => 4]);
echo "Después de desplazar: " . $cuadrado . "\n"; // Usará __toString()

// Aumentar el tamaño del cuadrado
$cuadrado->aumentarTamaño(2);
echo "Después de aumentar el tamaño: " . $cuadrado . "\n"; // Usará __toString()

?>
