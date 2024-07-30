<?php
class Cliente{

private $nombre ;
private $apellido ;
private $dadoDeBaja ;
private $tipoDoc ;
private $numDoc ;

	public function __constructor($nombre , $apellido  , $dadoDeBaja  , $tipoDoc  , $numDoc  ) {

		$this->nombre  = $nombre ;
		$this->apellido  = $apellido ;
		$this->dadoDeBaja  = $dadoDeBaja ;
		$this->tipoDoc  = $tipoDoc ;
		$this->numDoc  = $numDoc ;
	}

	public function getNombre () {
		return $this->nombre ;
	}

	public function setNombre ($value) {
		$this->nombre  = $value;
	}

	public function getApellido () {
		return $this->apellido ;
	}

	public function setApellido ($value) {
		$this->apellido  = $value;
	}

	public function getDadoDeBaja ()  {
		return $this->dadoDeBaja ;
	}

	public function setDadoDeBaja ( $value) {
		$this->dadoDeBaja  = $value;
	}

	public function getTipoDoc (){
		return $this->tipoDoc ;
	}

	public function setTipoDoc ($value) {
		$this->tipoDoc  = $value;
	}

	public function getNumDoc () {
		return $this->numDoc ;
	}

	public function setNumDoc ($value) {
		$this->numDoc  = $value;
	}

    public function __toString(){
        $cadena= "nombre: " . $this->getNombre() . "\napellido: " . $this->getApellido() . "\nestado: " . $this->getDadoDeBaja() . "\ntipo documento: " .$this->getTipoDoc(). "\nnumero de documento: " .$this->getNumDoc() ; 
        return $cadena;
    }
}