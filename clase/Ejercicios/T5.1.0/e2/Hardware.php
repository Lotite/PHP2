<?php
class Hardware{
    private $marca;
    private $modelo;
    public function __construct($marca, $modelo){
        $this->marca = $marca;
        $this->modelo = $modelo;
    }
    public function getMarca(){
        return $this->marca;
    }
    public function getModelo(){
        return $this->modelo;
    }
    public function setMarca($marca){
        $this->marca = $marca;
    }
    public function setModelo($modelo){
        $this->modelo = $modelo;
    }
    public function consultar(){
        return "Marca {$this->getMarca()}. Modelo {$this->getModelo()}";
    }
}
