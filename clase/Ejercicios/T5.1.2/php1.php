<?php
    class Persona{
        private $nombre;
        private $apellidos;
        private $sexo;
        private $fechaNacimiento;
        public function __construct($nombre,$apellidos,$fechaNacimiento,$sexo = "h"){
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->sexo = $sexo; 
            $this->fechaNacimiento = new DateTime($fechaNacimiento);
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

        public function diasVivos(){
            $hoy = new DateTime();
            $diferencia = $this->fechaNacimiento->diff($hoy);
            return $diferencia->y . " años " . $diferencia->m . " meses " . $diferencia->d . " dias " . " Dias totales " . $diferencia->days;
        }

        public function informacionPersona(){
            return $this->nombre . " " . $this->apellidos . " " . " " . $this->fechaNacimiento->format("d-m-Y") . " " . $this->getSexo();
        }
    }

    $p1 = new Persona("lotfi","Bayi","28-11-2003");
    echo $p1->informacionPersona();
    echo $p1->diasVivos();
?>