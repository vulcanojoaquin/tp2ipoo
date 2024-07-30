<?php

class Calculadora{
    private $num1;
    private $num2;

    public function __construct($num1 , $num2)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

	public function getNum1() {
		return $this->num1;
	}

	public function setNum1($num1) {
		$this->num1 = $num1;
	}

	public function getNum2() {
		return $this->num2;
	}

	public function setNum2($num2) {
		$this->num2 = $num2;
	}


    

    public function sumar($num1 , $num2)
    {
        $resultado= $this->getNum1() + $this->getNum2();
        return $resultado; 
    }

    public function restar()
    {
        $resultado= $this->getNum1() - $this->getNum2();
        return $resultado; 
    }

    public function multiplicar()
    {
        $resultado= $this->getNum1() * $this->getNum2();
        return $resultado; 
    }


    public function dividir()
    {
        $resultado=0;
        if ($this->getNum2() == 0) {
            $resultado= "Error: división por cero";
        } else {
            $resultado= $this->getNum1() / $this->getNum2();
        }
        return $resultado;
    }
    
    


    public function __toString()
    {
        $cadena= "numero 1: " . $this->getNum1() . "\nnumero 2: " . $this->getNum2(); 
        return $cadena; 
    }


}