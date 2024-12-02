<?php
    require_once "Hardware.php";
    class Ordenador extends Hardware{
        private $numSerie;
        private $disco;
        private $procesador;
        private $memoria;
        public function __construct($disco,$procesador,$modelo = null,$numSerie = null,$marca = null,$memoria = null){
            parent::__construct($marca,$modelo);
            $this->numSerie = $numSerie;
            $this->disco = $disco;
            $this->procesador = $procesador;
            $this->memoria = $memoria;
        }
        public function getNumSerie(){
            return $this->numSerie;
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
        public function setDisco($disco){
            $this->disco = $disco;
        }
        public function setProcesador($procesador){
            $this->procesador = $procesador;
        }
        public function setMemoria($memoria){
            $this->memoria = $memoria;
        }
        public function consultar(){
            $cadena = parent::consultar()." NumSerie:{$this->getNumSerie()} Disco:{$this->getDisco()} Procesador:{$this->getProcesador()} Memoria:{$this->getMemoria()}";
            return $cadena;

        }
        public function __toString(){
            return "Objt: Ordenador";
        }

    }