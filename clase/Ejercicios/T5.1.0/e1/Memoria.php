<?php
    class Memoria{
        private $cantidadMB;
        private $tipoMemoria;
        private $velocidadMemoria;
        private $marca;
        public function Memoria($cantidadMB = 0,$tipoMemoria = null,$velocidadMemoria = null,$marca = null){
            $this->cantidadMB = $cantidadMB;
            $this->tipoMemoria = $tipoMemoria;
            $this->velocidadMemoria = $velocidadMemoria;
            $this->marca = $marca;
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
        public function getMarca(){
            return $this->marca;
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
        public function setMarca($marca){
            $this->marca = $marca;
        }

        public function __toString(){
            return "Objt: Memoria";
        }


    }
