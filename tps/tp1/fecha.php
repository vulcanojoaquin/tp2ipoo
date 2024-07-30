<?php

class Fecha {
    private $dia;
    private $mes;
    private $anio;

    // Constructor
    public function __construct($dia, $mes, $anio) {
        $this->dia = $dia;
        $this->mes = $mes;
        $this->anio = $anio;
    }

    // Métodos Getter
    public function getDia() {
        return $this->dia;
    }

    public function getMes() {
        return $this->mes;
    }

    public function getAnio() {
        return $this->anio;
    }

    // Métodos Setter
    public function setDia($dia) {
        $this->dia = $dia;
    }

    public function setMes($mes) {
        $this->mes = $mes;
    }

    public function setAnio($anio) {
        $this->anio = $anio;
    }

    // Formato abreviado
    public function formatoAbreviado() {
        return sprintf('%02d/%02d/%04d', $this->dia, $this->mes, $this->anio);
    }

    // Formato extendido
    public function formatoExtendido() {
        $meses = [
            1 => 'enero', 2 => 'febrero', 3 => 'marzo', 4 => 'abril', 5 => 'mayo', 6 => 'junio',
            7 => 'julio', 8 => 'agosto', 9 => 'septiembre', 10 => 'octubre', 11 => 'noviembre', 12 => 'diciembre'
        ];
        return sprintf('%d de %s de %d', $this->dia, $meses[$this->mes], $this->anio);
    }

    // Verifica si es año bisiesto
    private function esBisiesto($anio) {
        return ($anio % 4 == 0 && $anio % 100 != 0) || ($anio % 400 == 0);
    }

    // Incrementa un día
    private function incrementaUnDia() {
        $diasPorMes = [31, ($this->esBisiesto($this->anio) ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

        $this->dia++;
        if ($this->dia > $diasPorMes[$this->mes - 1]) {
            $this->dia = 1;
            $this->mes++;
            if ($this->mes > 12) {
                $this->mes = 1;
                $this->anio++;
            }
        }
    }

    // Incrementa la fecha por un número dado de días
    public static function incremento($fecha, $dias) {
        $nuevaFecha = clone $fecha;
        for ($i = 0; $i < $dias; $i++) {
            $nuevaFecha->incrementaUnDia();
        }
        return $nuevaFecha;
    }
}

// Ejemplo de uso
$fecha = new Fecha(16, 2, 2000);
echo "Fecha abreviada: " . $fecha->formatoAbreviado() . "\n";
echo "Fecha extendida: " . $fecha->formatoExtendido() . "\n";

$nuevaFecha = Fecha::incremento($fecha, 50);
echo "Nueva fecha después de 50 días: " . $nuevaFecha->formatoAbreviado() . "\n";
echo "Nueva fecha después de 50 días: " . $nuevaFecha->formatoExtendido() . "\n";

?>
