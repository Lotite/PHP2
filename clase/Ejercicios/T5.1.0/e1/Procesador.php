<?php
class Procesador
{
    private $numeroNucleos;
    private $velocidad;
    private $marca;
    public function __construct($numeroNucleos, $velocidad, $marca)
    {
        $this->numeroNucleos = $numeroNucleos;
        $this->velocidad = $velocidad;
        $this->marca = $marca;
    }
    public function getNumeroNucleos()
    {
        return $this->numeroNucleos;
    }
    public function getVelocidad()
    {
        return $this->velocidad;
    }
    public function getMarca()
    {
        return $this->marca;
    }
    public function setNumeroNucleos($numeroNucleos)
    {
        $this->numeroNucleos = $numeroNucleos;
    }
    public function setVelocidad($velocidad)
    {
        $this->velocidad = $velocidad;
    }
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }
}
