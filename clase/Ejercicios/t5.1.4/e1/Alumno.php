<?php
class Alumno extends Persona{
    private $numClases = 0;
    public function __construct($nombre, $apellido, $numTelefono){
        parent::__construct($nombre, $apellido, $numTelefono);
    }
    public function setNumClases($numClases){
        $this->numClases = $numClases;
    }
    public function aPagar(){
        global $numClases;
        switch (true) {
            case $numClases === 1:
                return 20;
                break;
            case $numClases === 2:
                return 32;
                break;
            case $numClases >= 3:
                return 40;
                break;
            default:
                return "Debe indicar previamente o número de clases";
        }
    }
}
