<?php

class Moto{
    private $codigo ;
    private $costo ;
    private $anioFabricacion ;
    private $descripcion ;
    private $porcentajeIncrementoAnual ;
    private $activa ;
    

	public function __construct($codigo , $costo  , $anioFabricacion , $descripcion , $porcentajeIncrementoAnual , $activa ) {

		$this->codigo  = $codigo ;
		$this->costo  = $costo ;
		$this->anioFabricacion  = $anioFabricacion ;
		$this->descripcion  = $descripcion ;
		$this->porcentajeIncrementoAnual  = $porcentajeIncrementoAnual ;
		$this->activa  = $activa ;
	}

    //----------------------------------------

	public function getCodigo () {
		return $this->codigo ;
	}

	public function setCodigo ( $value) {
		$this->codigo  = $value;
	}

	public function getCosto () {
		return $this->costo ;
	}

	public function setCosto ( $value) {
		$this->costo  = $value;
	}

	public function getAnioFabricacion () {
		return $this->anioFabricacion ;
	}

	public function setAnioFabricacion ($value) {
		$this->anioFabricacion  = $value;
	}

	public function getDescripcion () {
		return $this->descripcion ;
	}

	public function setDescripcion ($value) {
		$this->descripcion  = $value;
	}

	public function getPorcentajeIncrementoAnual () {
		return $this->porcentajeIncrementoAnual ;
	}

	public function setPorcentajeIncrementoAnual ($value) {
		$this->porcentajeIncrementoAnual  = $value;
	}

	public function getActiva (){
		return $this->activa ;
	}

	public function setActiva ($value) {
		$this->activa  = $value;
	}

    //-------------------------------------------------

    public function __toString(){
        $cadena= "codigo: " . $this->getCodigo() . "\ncosto: " . $this->getCosto() . "\nanio fabricacion: " . $this->getAnioFabricacion() . "\ndescripcion: " .$this->getDescripcion(). "\nporcentaje incremento anual: " .$this->getPorcentajeIncrementoAnual(). "activa: " .$this->getActiva(); 
        return $cadena;
    }


    //---------------funciones

    public function darPrecioVenta(){
        $activa= $this->getActiva();
        $valor=0;
        if ($activa) {
            $valor=$this->getCosto() + $this->getCosto() * ((2024 - $this->getAnioFabricacion()) * $this->getPorcentajeIncrementoAnual());
        }
        else {
            $valor=-1;
        }

        return $valor;


    }


}