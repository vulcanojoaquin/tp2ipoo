<?php

class Teatro {
    private $nombre;        // Nombre del teatro
    private $direccion;     // Dirección del teatro
    private $funciones;     // Array asociativo con las funciones

    // Constructor
    public function __construct($nombre, $direccion, $funciones) {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        // Asegurarse de que funciones tenga exactamente 4 elementos
        if (count($funciones) !== 4) {
            throw new Exception("Debe haber exactamente 4 funciones.");
        }
        $this->funciones = $funciones;
    }

    // Métodos de acceso
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getFunciones() {
        return $this->funciones;
    }

    public function setFunciones($funciones) {
        // Asegurarse de que funciones tenga exactamente 4 elementos
        if (count($funciones) !== 4) {
            throw new Exception("Debe haber exactamente 4 funciones.");
        }
        $this->funciones = $funciones;
    }

    // Cambiar el nombre de una función específica
    public function cambiarNombreFuncion($indice, $nuevoNombre) {
        if (isset($this->funciones[$indice])) {
            $this->funciones[$indice]['nombre'] = $nuevoNombre;
        } else {
            echo "Índice de función no válido.\n";
        }
    }

    // Cambiar el precio de una función específica
    public function cambiarPrecioFuncion($indice, $nuevoPrecio) {
        if (isset($this->funciones[$indice])) {
            $this->funciones[$indice]['precio'] = $nuevoPrecio;
        } else {
            echo "Índice de función no válido.\n";
        }
    }

    // Redefinir el método __toString()
    public function __toString() {
        $infoFunciones = "";
        foreach ($this->funciones as $funcion) {
            $infoFunciones .= sprintf(
                "Nombre: %s, Precio: %.2f\n",
                $funcion['nombre'], $funcion['precio']
            );
        }

        return sprintf(
            "Teatro: %s\nDirección: %s\nFunciones:\n%s",
            $this->nombre, $this->direccion, $infoFunciones
        );
    }
}

?>
