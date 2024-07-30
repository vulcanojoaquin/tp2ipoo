<?php

require_once 'Teatro.php'; // Asegúrate de que la ruta sea correcta

// Crear un array de funciones
$funciones = [
    ['nombre' => 'Comedia A', 'precio' => 30.00],
    ['nombre' => 'Drama B', 'precio' => 25.00],
    ['nombre' => 'Musical C', 'precio' => 40.00],
    ['nombre' => 'Tragedia D', 'precio' => 35.00]
];

// Crear un objeto Teatro
$teatro = new Teatro('Teatro Central', 'Calle Principal 123', $funciones);

// Mostrar la información inicial del teatro
echo $teatro . "\n"; // Usará __toString()

// Cambiar el nombre de la primera función
$teatro->cambiarNombreFuncion(0, 'Comedia Especial');
echo "Después de cambiar el nombre de la primera función:\n" . $teatro . "\n"; // Usará __toString()

// Cambiar el precio de la segunda función
$teatro->cambiarPrecioFuncion(1, 27.50);
echo "Después de cambiar el precio de la segunda función:\n" . $teatro . "\n"; // Usará __toString()

// Intentar cambiar una función con un índice no válido
$teatro->cambiarNombreFuncion(5, 'Nueva Función'); // Mensaje de error esperado

// Intentar cambiar el precio de una función con un índice no válido
$teatro->cambiarPrecioFuncion(5, 50.00); // Mensaje de error esperado

?>
