<?php
    require_once "Hardware.php";
class Procesador extends Hardware {
    private $numeroNucleos;
    private $velocidad;
    public function __construct($numeroNucleos, $velocidad, $marca,$modelo){
        $this->numeroNucleos = $numeroNucleos;
        $this->velocidad = $velocidad;
        parent::__construct($marca,$modelo);
    }
    public function getNumeroNucleos()
    {
        return $this->numeroNucleos;
    }
    public function getVelocidad()
    {
        return $this->velocidad;
    }
    public function setNumeroNucleos($numeroNucleos)
    {
        $this->numeroNucleos = $numeroNucleos;
    }
    public function setVelocidad($velocidad)
    {
        $this->velocidad = $velocidad;
    }
    public function consultar(){
        $cadena = parent::consultar()." NumeroNucleos:{$this->getNumeroNucleos()} Velocidad:{$this->getVelocidad()}";
        return $cadena;

    }

    public function __toString(){
        return "Objt: Procesador.";
    }

}
