<?php
    class DiscoDuro{
        private $cantidadGB;
        private $numeroRevoluciones;
        private $tipoDisco;
        private $marca;
        public function __construct($cantidadGB,$numeroRevoluciones,$tipoDisco = null,$marca = null){
            $this.$cantidadGB = $cantidadGB;
            $this->numeroRevoluciones = $numeroRevoluciones;
            $this->tipoDisco = $tipoDisco;
            $this->marca = $marca;
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
        public function getMarca(){
            return $this->marca;
        }
        public function setCantidadGB($cantidadGB){
            $this->cantidadGB = $cantidadGB;
        }
        public function setTipoDisco($tipoDisco){
            $this->tipoDisco = $tipoDisco;
        }
        public function setMarca($marca){
            $this->marca = $marca;
        }
    }
?>