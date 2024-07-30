<?php
// Incluir el archivo que contiene la definición de la clase Persona
require_once 'Persona.php';
// Incluir el archivo que contiene la definición de la clase Libro
require_once 'Libro.php';

// Crear un objeto Persona para el autor
$autor = new Persona("Gabriel", "García Márquez", "DNI", "12345678");

// Crear un objeto Libro
$libro = new Libro("Cien años de soledad", $autor, 417, "Una novela sobre la familia Buendía en el pueblo ficticio de Macondo.");

// Imprimir la información usando __toString
echo $libro . "\n";

// Usar métodos de acceso y modificación
echo "Datos antes de modificar:\n";
echo "Título: " . $libro->getTitulo() . "\n";
echo "Autor: " . $libro->getAutor() . "\n";
echo "Cantidad de Páginas: " . $libro->getCantidadPaginas() . "\n";
echo "Sinopsis: " . $libro->getSinopsis() . "\n";

// Modificar datos
$libro->setTitulo("El amor en los tiempos del cólera");
$libro->setCantidadPaginas(348);
$libro->setSinopsis("Una historia sobre el amor y la espera en el contexto de las guerras civiles de América Latina.");

echo "\nDatos después de modificar:\n";
echo "Título: " . $libro->getTitulo() . "\n";
echo "Autor: " . $libro->getAutor() . "\n";
echo "Cantidad de Páginas: " . $libro->getCantidadPaginas() . "\n";
echo "Sinopsis: " . $libro->getSinopsis() . "\n";

// Imprimir la información actualizada usando __toString
echo "\nInformación actualizada:\n";
echo $libro;
?>
