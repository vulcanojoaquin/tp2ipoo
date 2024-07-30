<?php
// Asegúrate de que el archivo Persona.php está en el mismo directorio o ajusta la ruta según sea necesario
require_once 'Persona.php';

class Libro {
    // Atributos privados
    private $titulo;
    private $autor; // Objeto de la clase Persona
    private $cantidad_paginas;
    private $sinopsis;

    // Método constructor
    public function __construct($titulo, Persona $autor, $cantidad_paginas, $sinopsis) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->cantidad_paginas = $cantidad_paginas;
        $this->sinopsis = $sinopsis;
    }

    // Métodos de acceso y modificación
    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function setAutor(Persona $autor) {
        $this->autor = $autor;
    }

    public function getCantidadPaginas() {
        return $this->cantidad_paginas;
    }

    public function setCantidadPaginas($cantidad_paginas) {
        $this->cantidad_paginas = $cantidad_paginas;
    }

    public function getSinopsis() {
        return $this->sinopsis;
    }

    public function setSinopsis($sinopsis) {
        $this->sinopsis = $sinopsis;
    }

    // Redefinir el método __toString
    public function __toString() {
        return "Título: " . $this->titulo . "\n" .
               "Autor: " . $this->autor . "\n" .
               "Cantidad de Páginas: " . $this->cantidad_paginas . "\n" .
               "Sinopsis: " . $this->sinopsis . "\n";
    }
}
?>
