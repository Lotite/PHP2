<?php
    class Coche{
        private $marca="";
        private $modelo="";
        public function __construct($marca, $modelo="Sin configurar"){
            $this->marca=$marca;
            $this->modelo=$modelo;
        }
        public function __toString(){
            return "Marca: ".$this->marca." Modelo: ".$this->modelo;
        }
        public function __set($name, $value){
            if(property_exists($this,$name)){
                $this->$name=$value;
        }
    }
}

echo new Coche("Seat");


?>
