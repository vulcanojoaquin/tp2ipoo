<?php
// Incluir el archivo que contiene la definición de la clase Persona
require_once 'Persona.php';
// Incluir el archivo que contiene la definición de la clase Libro
require_once 'Libro.php';
// Incluir el archivo que contiene la definición de la clase Lectura
require_once 'Lectura.php';

// Crear un objeto Persona para el autor del libro
$autor = new Persona("Gabriel", "García Márquez", "DNI", "12345678");

// Crear un objeto Libro
$libro = new Libro("Cien años de soledad", $autor, 417, "Una novela sobre la familia Buendía en el pueblo ficticio de Macondo.");

// Crear un objeto Lectura
$lectura = new Lectura($libro, 1);

// Imprimir la información usando __toString
echo $lectura . "\n";

// Avanzar una página
echo "Página después de avanzar: " . $lectura->siguientePagina() . "\n";

// Retroceder una página
echo "Página después de retroceder: " . $lectura->retrocederPagina() . "\n";

// Ir a una página específica
echo "Página después de ir a la página 100: " . $lectura->irPagina(100) . "\n";

// Intentar ir a una página fuera de rango
echo "Página después de ir a la página 500 (fuera de rango): " . $lectura->irPagina(500) . "\n";

// Imprimir la información actualizada usando __toString
echo "\nInformación actualizada:\n";
echo $lectura;
?>
