<?php

require_once 'Rubro.php';
require_once 'Producto.php';
require_once 'ProductoRegional.php';
require_once 'ProductoImportado.php';
require_once 'Local.php';

// Crear rubros
$rubroConservas = new Rubro('Conservas', 35);
$rubroRegalos = new Rubro('Regalos', 55);

// Crear productos
$producto1 = new ProductoRegional('123', 'Mermelada', 100, 10, 20.0, $rubroConservas, 5);
$producto2 = new ProductoImportado('124', 'Vino', 50, 21, 100.0, $rubroRegalos);
$producto3 = new ProductoRegional('125', 'Aceitunas', 30, 10, 15.0, $rubroConservas, 10);
$producto4 = new ProductoImportado('126', 'Café', 60, 21, 80.0, $rubroRegalos);

// Crear local y agregar productos
$local = new Local();
$local->incorporarProductoLocal($producto1);
$local->incorporarProductoLocal($producto2);
$local->incorporarProductoLocal($producto3);
$local->incorporarProductoLocal($producto4);

// Intentar agregar un producto duplicado
$resultado = $local->incorporarProductoLocal($producto4);
echo "Resultado al intentar agregar producto duplicado: " . ($resultado ? "Agregado" : "No agregado") . "\n";

// Retornar el precio de venta de cada producto
echo "Precio de venta del producto 123: " . $local->retornarImporteProducto('123') . "\n";
echo "Precio de venta del producto 124: " . $local->retornarImporteProducto('124') . "\n";
echo "Precio de venta del producto 125: " . $local->retornarImporteProducto('125') . "\n";
echo "Precio de venta del producto 126: " . $local->retornarImporteProducto('126') . "\n";

// Retornar el costo total de los productos en el local
echo "Costo total de productos en el local: " . $local->retornarCostoProductoLocal() . "\n";
?>
