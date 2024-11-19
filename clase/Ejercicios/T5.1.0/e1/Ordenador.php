<?php
    class Ordenador{
        private $numSerie;
        private $marca;
        private $modelo;
        private $disco;
        private $procesador;
        private $memoria;
        public function __construct($disco,$procesador,$modelo = null,$numSerie = null,$marca = null,$memoria = null){
            $this->numSerie = $numSerie;
            $this->marca = $marca;
            $this->modelo = $modelo;
            $this->disco = $disco;
            $this->procesador = $procesador;
            $this->memoria = $memoria;
        }
        public function getNumSerie(){
            return $this->numSerie;
        }
        public function getMarca(){
            return $this->marca;
        }
        public function getModelo(){
            return $this->modelo;
        }
        public function getDisco(){
            return $this->disco;
        }
        public function getProcesador(){
            return $this->procesador;
        }
        public function getMemoria(){
            return $this->memoria;
        }
        public function setNumSerie($numSerie){
            $this->numSerie = $numSerie;
        }
        public function setMarca($marca){
            $this->marca = $marca;
        }
        public function setModelo($modelo){
            $this->modelo = $modelo;
        }
        public function setDisco($disco){
            $this->disco = $disco;
        }
        public function setProcesador($procesador){
            $this->procesador = $procesador;
        }
        public function setMemoria($memoria){
            $this->memoria = $memoria;
        }
        public function __toString(){
            return "Objt: Ordenador";
        }

    }