<?php
class Persona2
{
    private $nombre;
    private $profesion;
    private $edad;

    public function __construct($nombre, $edad, $profesion = "Sin especificar")
    {
        if (!is_string($nombre) || !is_int($edad) || !is_string($profesion)) {
            throw new InvalidArgumentException("Tipo de dato inválido para nombre, edad o profesión.");
        }

        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->profesion = $profesion;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getProfesion()
    {
        return $this->profesion;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setProfesion($profesion)
    {
        if (!is_string($profesion)) {
            throw new InvalidArgumentException("La profesión debe ser una cadena de texto.");
        }
        $this->profesion = $profesion;
    }

    public function setEdad($edad)
    {
        if (!is_int($edad)) {
            throw new InvalidArgumentException("La edad debe ser un número entero.");
        }
        $this->edad = $edad;
    }

    public function __toString()
    {
        return "Nombre: " . $this->nombre . ", Profesión: " . $this->profesion . ", Edad: " . $this->edad;
    }
}

class PruebasPersonas{
    public static function main()
    {
        $p1 = new Persona2("Lotfi", 20);
        $p2 = new Persona2("Lotfi", 20, "Programador");
        echo $p1;
        echo $p2;
    }
}


PruebasPersonas::main();
