<?php
include_once"viaje.php";
include_once"pasajero.php";
include_once"responsableV.php";

while (true) {
    echo "1. Cargar información del viaje\n";
    echo "2. Modificar datos del pasajero\n";
    echo "3. Agregar pasajero al viaje\n";
    echo "4. Mostrar datos del viaje\n";
    echo "5. Salir\n";
    echo "Seleccione una opción: ";

    $opcion = fgets(STDIN);

    switch ($opcion) {
        case 1:
            echo "Ingrese código del viaje: ";
            $codigo = fgets(STDIN);
            echo "Ingrese destino: ";
            $destino = fgets(STDIN);
            echo "Ingrese cantidad máxima de pasajeros: ";
            $maxPasajeros = fgets(STDIN);
            for ($i = 0; $i < $maxPasajeros; $i++) {
                echo "Ingrese nombre del pasajero: ";
                $nombre = fgets(STDIN);
                echo "Ingrese apellido del pasajero: ";
                $apellido = fgets(STDIN);
                echo "Ingrese documento del pasajero: ";
                $documento = fgets(STDIN);
                echo "Ingrese teléfono del pasajero: ";
                $telefono = fgets(STDIN);
                $pasajero = new Pasajero($nombre, $apellido, $documento, $telefono);
                
            }
            echo "Ingrese responsable: ";
            $responsable = fgets(STDIN);
            $viaje = new Viaje($codigo, $destino, $maxPasajeros, $responsable);
            echo "Viaje creado correctamente.\n";
            break;
        case 2:
            echo "Ingrese documento del pasajero a modificar: ";
            $documento = fgets(STDIN);
            echo "Ingrese nuevo nombre: ";
            $nombre = fgets(STDIN);
            echo "Ingrese nuevo apellido: ";
            $apellido = fgets(STDIN);
            echo "Ingrese nuevo teléfono: ";
            $telefono = fgets(STDIN);
            $viaje->modificarPasajero($documento, $nombre, $apellido, $telefono);
            break;
        case 3:
            echo "Ingrese nombre del pasajero: ";
            $nombre = fgets(STDIN);
            echo "Ingrese apellido del pasajero: ";
            $apellido = fgets(STDIN);
            echo "Ingrese documento del pasajero: ";
            $documento = fgets(STDIN);
            echo "Ingrese teléfono del pasajero: ";
            $telefono = fgets(STDIN);
            $pasajero = new Pasajero($nombre, $apellido, $documento, $telefono);
            $viaje->agregarPasajero($pasajero);
            break;
        case 4:
            $viaje->mostrarDatosViaje();
            break;
        case 5:
            exit();
        default:
            echo "Opción no válida\n";
            break;
    }
}



$p = new Punto(5,7);  // se crea un objeto punto y se asigna a la variable p
echo $p->getCoordenada_x();       // se visualiza el valor contenido en la variable instancia x
echo $p->getCoordenada_y();       // se visualiza el valor contenido en la variable instancia y

$p2 = new Punto(10,14);
echo $p2;
echo "La distancia entre los punto es: ".$p->distancia($p2)."\n";

echo "La distancia entre los punto es: ".$p->distancia_2($p2)."\n";


?>