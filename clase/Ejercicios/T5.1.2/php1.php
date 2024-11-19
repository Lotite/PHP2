<?php
    class Persona{
        private $nombre;
        private $apellidos;
        private $sexo;
        public function __construct($nombre,$apellidos,$sexo = "h"){
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->sexo = $sexo; 
        }

        public function getNom(){
            return $this->nombre;
        }
        public function getApellidos(){
            return $this->apellidos;
        }
        public function getSexo(){
            switch($this->sexo){
                case "h":
                case "H":
                    return "Hombre";
                break;
                case "M":
                case "m":
                    return "Mujer";
                break;
                default: return "Desconocido";
            }
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function setSexo(string $sexo){
            $this->sexo = $sexo;
        }

        public function informacionPersona(){
            return $this->nombre . " " . $this->apellidos . " " . $this->getSexo();
        }
    }


    $p1 = new Persona("lotfi","Bayi");
    echo $p1->informacionPersona();
?>