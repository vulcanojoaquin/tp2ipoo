<?php

 class reloj {
    private $seg;
    private $min;
    private $hora;

    public function __construct($seg , $min , $hora){
        $this->seg = $seg;
        $this->min = $min;
        $this->hora = $hora;
    }

	public function getSeg() {
		return $this->seg;
	}

	public function setSeg($value) {
		$this->seg = $value;
	}

	public function getMin() {
		return $this->min;
	}

	public function setMin($value) {
		$this->min = $value;
	}

	public function getHora() {
		return $this->hora;
	}

	public function setHora($value) {
		$this->hora = $value;
	}

    public function puesta_a_cero()
    {
        $this->setSeg(0);
        $this->setMin(0);
        $this->setHora(0);
    }


	public function __toString(){
		echo $this->getSeg().",".$this->getMin().",".$this->getHora();
	}



    public function incremento(){

        $segundo=$this->getSeg();
        $minuto=$this->getMin();
        $horaa=$this->getHora();

		while ($segundo < 60 && $minuto < 60 && $horaa < 24){
			
			while ($horaa<>23) {
			
			echo $horaa.":".$minuto.":".$segundo. "\n";


			$segundo++;
			if ($segundo==60) {

				$segundo=0;
				$minuto++;

			}

			if ($minuto==60){
				$minuto=0;
				$horaa++;
			}

			if ($horaa==24) {
				$horaa=0;
			}
			$this->setSeg($segundo);
			$this->setMin($minuto);
			$this->setHora($horaa);

			

			}
		}
    }

	

}
$cont= new reloj('20' , '0' , '0' );

$cont->incremento();

__toString();