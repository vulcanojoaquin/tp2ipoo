<?php
include 'Cliente.php';
include 'Moto.php';
class Venta extends Cliente{

    private $numero;
    private $fecha ;
    private $objCliente ;
    private $colMotos;   
    private $precioFinal;

	public function __constructor($numero, $fecha , $objCliente , $precioFinal) {

		$this->numero = $numero;
		$this->fecha  = $fecha ;
		$this->objCliente  = $objCliente ;
		$this->colMotos = [] ;
		$this->precioFinal = $precioFinal;
	}

    //-----------------------------------------------

	public function getNumero() {
		return $this->numero;
	}

	public function setNumero($value) {
		$this->numero = $value;
	}

	public function getFecha (){
		return $this->fecha ;
	}

	public function setFecha ( $value) {
		$this->fecha  = $value;
	}

	public function getObjCliente () {
		return $this->objCliente ;
	}

	public function setObjCliente ($value) {
		$this->objCliente  = $value;
	}

	public function getColMotos(){
		return $this->colMotos;
	}

	public function setColMotos( $value) {
		$this->colMotos = $value;
	}

	public function getPrecioFinal() {
		return $this->precioFinal;
	}

	public function setPrecioFinal($value) {
		$this->precioFinal = $value;
	}

    //--------------------------------------------------------------------

    public function __toString(){
        $cadena= "numero: " . $this->getNumero() . "\nfecha: " . $this->getFecha() . "\ncliente: " . $this->getObjCliente() . "\ncoleccion motos: " .$this->getColMotos(). "\nprecio final: " .$this->getPrecioFinal(); 
        return $cadena;
    }


    //---------------------------------------------------------------------

    public function incorporarMoto($objMoto){
        $precioVenta= $objMoto->darPrecioVenta();
        $colMotos= $this->getColMotos();
            if ($precioVenta>0) {
                array_push($colMotos , $objMoto);
                $this->setColMotos($colMotos);
                $this->setPrecioFinal($this->getPrecioFinal() + $precioVenta);
        }
    }

}