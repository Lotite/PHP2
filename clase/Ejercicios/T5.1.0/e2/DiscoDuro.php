<?php
    require_once "Hardware.php";
    class DiscoDuro extends Hardware{
        private $cantidadGB;
        private $numeroRevoluciones;
        private $tipoDisco;
        public function __construct($cantidadGB,$numeroRevoluciones,$tipoDisco = null,$marca = null,$modelo = null){
            parent::__construct($marca,$modelo);
            $this->cantidadGB = $cantidadGB;
            $this->numeroRevoluciones = $numeroRevoluciones;
            $this->tipoDisco = $tipoDisco;
        }
        public function getCantidadGB(){
            return $this->cantidadGB;
        }
        public function getNumeroRevoluciones(){
            return $this->numeroRevoluciones;
        }
        public function getTipoDisco(){
            return $this->tipoDisco;
        }
        public function setCantidadGB($cantidadGB){
            $this->cantidadGB = $cantidadGB;
        }
        public function setTipoDisco($tipoDisco){
            $this->tipoDisco = $tipoDisco;
        }
        public function consultar(){
            $cadena = parent::consultar()." CantidadGB:{$this->getCantidadGB()} NumeroRevoluciones:{$this->getNumeroRevoluciones()} TipoDisco:{$this->getTipoDisco()}";
            return $cadena;

        }
        public function __toString(){
        return "Objt: DiscoDuro ";
        }
    }
?>
