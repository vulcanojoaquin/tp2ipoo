<?php
// Asegúrate de que el archivo Libro.php está en el mismo directorio o ajusta la ruta según sea necesario
require_once 'Libro.php';

class Lectura {
    // Atributos privados
    private $libro; // Objeto de la clase Libro
    private $pagina_actual;

    // Método constructor
    public function __construct(Libro $libro, $pagina_actual) {
        $this->libro = $libro;
        // Verifica que la página actual esté dentro del rango válido
        $this->pagina_actual = max(1, min($pagina_actual, $libro->getCantidadPaginas()));
    }

    // Métodos de acceso y modificación
    public function getLibro() {
        return $this->libro;
    }

    public function setLibro(Libro $libro) {
        $this->libro = $libro;
    }

    public function getPaginaActual() {
        return $this->pagina_actual;
    }

    public function setPaginaActual($pagina_actual) {
        // Asegúrate de que la página esté dentro del rango válido
        $this->pagina_actual = max(1, min($pagina_actual, $this->libro->getCantidadPaginas()));
    }

    // Método siguientePagina
    public function siguientePagina() {
        if ($this->pagina_actual < $this->libro->getCantidadPaginas()) {
            $this->pagina_actual++;
        }
        return $this->pagina_actual;
    }

    // Método retrocederPagina
    public function retrocederPagina() {
        if ($this->pagina_actual > 1) {
            $this->pagina_actual--;
        }
        return $this->pagina_actual;
    }

    // Método irPagina
    public function irPagina($pagina) {
        // Asegúrate de que la página esté dentro del rango válido
        $this->pagina_actual = max(1, min($pagina, $this->libro->getCantidadPaginas()));
        return $this->pagina_actual;
    }

    // Redefinir el método __toString
    public function __toString() {
        return "Libro: " . $this->libro->getTitulo() . "\n" .
               "Página Actual: " . $this->pagina_actual . "\n";
    }
}
?>
