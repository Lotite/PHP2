
<?php

class Persona
{
    private $nombre;
    private $apellidos;
    private $sexo;

    public function __construct($nombre, $apellidos, $sexo = 'H'){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->sexo = $sexo;
    }

    public function getSexo(){
        switch ($this->sexo) {
            case 'H':
                return 'Hombre';
            case 'M':
                return 'Mujer';
            default:
                return 'Desconocido';
        }
    }


    public function getNombre(){
        return $this->nombre;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function setSexo($sexo){
        if ($sexo == 'H' || $sexo == 'M'){
            $this->sexo = $sexo;
        }
    }


    public function setNombre($nombre){
        $this->nombre = $nombre;
    }



    public function informacionPersona(){
        return "Nombre: ".$this->getNombre()."\nApellidos: ".$this->getApellidos()."\nSexo: ".$this->getSexo();
    }

}


    $mauro = new Persona('Mauro', 'Rodriguez', 'H');



    echo $mauro->informacionPersona();


?>
