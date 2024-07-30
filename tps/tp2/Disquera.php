<?php
// Asegúrate de que el archivo Persona.php está en el mismo directorio o ajusta la ruta según sea necesario
require_once 'Persona.php';

class Disquera {
    // Atributos privados
    private $hora_desde;
    private $hora_hasta;
    private $estado; // 'abierta' o 'cerrada'
    private $direccion;
    private $dueno; // Objeto de la clase Persona

    // Método constructor
    public function __construct($hora_desde, $hora_hasta, $estado, $direccion, Persona $dueno) {
        $this->hora_desde = $hora_desde;
        $this->hora_hasta = $hora_hasta;
        $this->estado = $estado;
        $this->direccion = $direccion;
        $this->dueno = $dueno;
    }

    // Métodos de acceso y modificación
    public function getHoraDesde() {
        return $this->hora_desde;
    }

    public function setHoraDesde($hora_desde) {
        $this->hora_desde = $hora_desde;
    }

    public function getHoraHasta() {
        return $this->hora_hasta;
    }

    public function setHoraHasta($hora_hasta) {
        $this->hora_hasta = $hora_hasta;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getDueno() {
        return $this->dueno;
    }

    public function setDueno(Persona $dueno) {
        $this->dueno = $dueno;
    }

    // Verificar si está dentro del horario de atención
    public function dentroHorarioAtencion($hora, $minutos) {
        $hora_actual = $hora * 100 + $minutos;
        $hora_desde = $this->hora_desde * 100;
        $hora_hasta = $this->hora_hasta * 100;
        return $hora_desde <= $hora_actual && $hora_actual <= $hora_hasta;
    }

    // Abrir disquera
    public function abrirDisquera($hora, $minutos) {
        if ($this->dentroHorarioAtencion($hora, $minutos) && $this->estado == 'cerrada') {
            $this->estado = 'abierta';
            return true;
        }
        return false;
    }

    // Cerrar disquera
    public function cerrarDisquera($hora, $minutos) {
        if (!$this->dentroHorarioAtencion($hora, $minutos) && $this->estado == 'abierta') {
            $this->estado = 'cerrada';
            return true;
        }
        return false;
    }

    // Redefinir el método __toString
    public function __toString() {
        return "Dirección: " . $this->direccion . "\n" .
               "Horario de Atención: " . $this->hora_desde . " - " . $this->hora_hasta . "\n" .
               "Estado: " . $this->estado . "\n" .
               "Dueño: " . $this->dueno . "\n";
    }
}
?>

