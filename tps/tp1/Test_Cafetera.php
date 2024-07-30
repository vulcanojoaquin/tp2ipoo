<?php

require_once 'Cafetera.php'; // Asegúrate de que la ruta sea correcta

// Crear un objeto Cafetera
$cafetera = new Cafetera(100, 50);

// Mostrar la información inicial de la cafetera
echo $cafetera . "\n"; // Usará __toString()

// Llenar la cafetera
$cafetera->llenarCafetera();
echo "Después de llenar: " . $cafetera . "\n"; // Usará __toString()

// Servir una taza de café
$cafetera->servirTaza(30);
echo "Después de servir una taza de 30 unidades: " . $cafetera . "\n"; // Usará __toString()

// Intentar servir una taza de café con más cantidad que la actual
$cafetera->servirTaza(80);
echo "Después de intentar servir una taza de 80 unidades: " . $cafetera . "\n"; // Usará __toString()

// Vaciar la cafetera
$cafetera->vaciarCafetera();
echo "Después de vaciar: " . $cafetera . "\n"; // Usará __toString()

// Agregar café
$cafetera->agregarCafe(50);
echo "Después de agregar 50 unidades: " . $cafetera . "\n"; // Usará __toString()

?>
