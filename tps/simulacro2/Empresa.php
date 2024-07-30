<?php

//include 'Moto.php';

class Empresa {
    private $denominacion ;
    private $direccion ;
    private $colClientes ;
    private $colMotos ;
    private $colVentas ;

    //------------------------------------------------------------------------------------------
    
	public function __constructor($denominacion ,$direccion) {

		$this->denominacion  = $denominacion ;
		$this->direccion  = $direccion ;
	    $this->colClientes  = [] ;
		$this->colMotos  =  [];
		$this->colVentas  = [] ;
	}

    //------------------------------------------------------------------------------------------	

	public function getDenominacion (){
		return $this->denominacion ;
	}

	public function setDenominacion ($value) {
		$this->denominacion  = $value;
	}

	public function getDireccion (){
		return $this->direccion ;
	}

	public function setDireccion ($value) {
		$this->direccion  = $value;
	}

	public function getColClientes () {
		return $this->colClientes ;
	}

	public function setColClientes ( $value) {
		$this->colClientes  = $value;
	}

	public function getColMotos (){
		return $this->colMotos ;
	}

	public function setColMotos ($value) {
		$this->colMotos  = $value;
	}

	public function getColVentas () {
		return $this->colVentas ;
	}

	public function setColVentas ($value) {
		$this->colVentas  = $value;
	}

    //---------------------------------------------------------------------------------------

    public function __toString(){
        $cadena= "denominacion: " . $this->getDenominacion() . "\ndireccion: " . $this->getDireccion() . "\ncoleccion de clientes: " . $this->getColClientes() . "\ncoleccion de motos :" . $this->getColMotos() . "\ncoleccion de ventas :" . $this->getColVentas() ;
        return $cadena;
    }

    //---------------------------------------------------------------------------------------

    public function retornarMoto($codigoMoto){
    
        $colMoto= $this->getColMotos();
        $motoBuscada=null;
		$encontrada=false;
        foreach ($colMoto as $objMoto /*=> $codigoMoto*/) {
            if ($colMotos->getCodigo()== $codigoMoto) {
                $motoBuscada=$objMoto;
				$encontrada=true;
				break;
            }

			if (!$encontrada) {
				echo "no se a encontrado ninguna moto";
			}

        }

        return $motoBuscada;
    }

	public function registrarVenta($colCodigosMoto , $objCliente){

		

	}



}