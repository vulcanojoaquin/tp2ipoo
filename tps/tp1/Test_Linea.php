<?php

require_once 'Linea.php'; // Asegúrate de que la ruta sea correcta

// Crear un objeto Linea
$linea = new Linea(1, 2, 3, 4);

// Mostrar la información inicial de la línea
echo $linea . "\n"; // Usará __toString()

// Mover la línea a la derecha
$linea->mueveDerecha(5);
echo "Después de mover a la derecha: " . $linea . "\n"; // Usará __toString()

// Mover la línea a la izquierda
$linea->mueveIzquierda(3);
echo "Después de mover a la izquierda: " . $linea . "\n"; // Usará __toString()

// Mover la línea hacia arriba
$linea->mueveArriba(2);
echo "Después de mover hacia arriba: " . $linea . "\n"; // Usará __toString()

// Mover la línea hacia abajo
$linea->mueveAbajo(1);
echo "Después de mover hacia abajo: " . $linea . "\n"; // Usará __toString()

?>
