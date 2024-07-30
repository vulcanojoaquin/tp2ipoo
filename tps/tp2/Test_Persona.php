<?php
// Incluir el archivo que contiene la definición de la clase Persona
require_once 'Persona.php';

// Crear un objeto Persona
$persona = new Persona("Juan", "Pérez", "DNI", "12345678");

// Imprimir la información usando __toString
echo $persona . "\n\n";

// Usar métodos de acceso y modificación
echo "Datos antes de modificar:\n";
echo "Nombre: " . $persona->getNombre() . "\n";
echo "Apellido: " . $persona->getApellido() . "\n";
echo "Tipo de Documento: " . $persona->getTipoDocumento() . "\n";
echo "Número de Documento: " . $persona->getNumeroDocumento() . "\n";

// Modificar datos
$persona->setNombre("Carlos");
$persona->setApellido("Gómez");
$persona->setTipoDocumento("Pasaporte");
$persona->setNumeroDocumento("87654321");

echo "\nDatos después de modificar:\n";
echo "Nombre: " . $persona->getNombre() . "\n";
echo "Apellido: " . $persona->getApellido() . "\n";
echo "Tipo de Documento: " . $persona->getTipoDocumento() . "\n";
echo "Número de Documento: " . $persona->getNumeroDocumento() . "\n";

// Imprimir la información usando __toString después de modificar
echo "\nInformación actualizada:\n";
echo $persona;
?>
