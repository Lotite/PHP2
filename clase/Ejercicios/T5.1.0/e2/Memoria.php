<?php
    require_once "Hardware.php";
    class Memoria extends Hardware{
        private $cantidadMB;
        private $tipoMemoria;
        private $velocidadMemoria;
        public function Memoria($cantidadMB = 0,$tipoMemoria = null,$velocidadMemoria = null,$marca = null,$modelo = null){
            parent::__construct($marca,$modelo);
            $this->cantidadMB = $cantidadMB;
            $this->tipoMemoria = $tipoMemoria;
            $this->velocidadMemoria = $velocidadMemoria;
        }
        public function getCantidadMB(){
            return $this->cantidadMB;
        }
        public function getTipoMemoria(){
            return $this->tipoMemoria;
        }
        public function getVelocidadMemoria(){
            return $this->velocidadMemoria;
        }
        public function setCantidadMB($cantidadMB){
            $this->cantidadMB = $cantidadMB;
        }
        public function setVelocidadMemoria($velocidadMemoria){
            $this->velocidadMemoria = $velocidadMemoria;
        }
        public function setTipoMemoria($tipoMemoria){
            $this->tipoMemoria = $tipoMemoria;
        }
        public function consultar(){
            $cadena = parent::consultar()." CantidadMB:{$this->getCantidadMB()} TipoMemoria:{$this->getTipoMemoria()} VelocidadMemoria:{$this->getVelocidadMemoria()}";
            return $cadena;

        }

        public function __toString(){
            return "Objt: Memoria";
        }


    }
