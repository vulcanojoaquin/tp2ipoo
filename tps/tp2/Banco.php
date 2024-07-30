<?php
require_once 'Tramite.php';
require_once 'Mostrador.php';

class Banco {
    // Atributos privados
    private $mostradores;

    // Constructor
    public function __construct() {
        $this->mostradores = [];
    }

    // Métodos de acceso
    public function getMostradores() {
        return $this->mostradores;
    }

    public function setMostradores($mostradores) {
        $this->mostradores = $mostradores;
    }

    // Agregar un mostrador
    public function agregarMostrador(Mostrador $mostrador) {
        $this->mostradores[] = $mostrador;
    }

    // Obtener mostradores que atienden un trámite
    public function mostradoresQueAtienden(Tramite $unTramite) {
        $resultado = [];
        foreach ($this->mostradores as $mostrador) {
            if ($mostrador->atiende($unTramite)) {
                $resultado[] = $mostrador;
            }
        }
        return $resultado;
    }

    // Obtener el mejor mostrador para un trámite
    public function mejorMostradorPara(Tramite $unTramite) {
        $mejorMostrador = null;
        $menorCola = PHP_INT_MAX;

        foreach ($this->mostradores as $mostrador) {
            if ($mostrador->atiende($unTramite) &&
                count($mostrador->getColaClientes()) < $mostrador->getCapacidadMaxima() &&
                count($mostrador->getColaClientes()) < $menorCola) {
                $mejorMostrador = $mostrador;
                $menorCola = count($mostrador->getColaClientes());
            }
        }

        return $mejorMostrador;
    }

    // Atender un cliente
    public function atender($cliente, Tramite $unTramite) {
        $mostrador = $this->mejorMostradorPara($unTramite);
        if ($mostrador) {
            if ($mostrador->agregarCliente($cliente)) {
                return "Cliente atendido en el mostrador.";
            }
            return "Error al agregar cliente al mostrador.";
        }
        return "El cliente será atendido en cuanto haya lugar en un mostrador.";
    }
}
?>
