<?php
class Persona{
    private $nombre;
    private $apellido;
    private $numTelefono;
    public function __construct($nombre,$apellido,$numTelefono){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numTelefono = $numTelefono;
    }
    public function mostrarDatos(){
        return "{$this->nombre} {$this->apellido} {$this->numTelefono}" ;
    }
}
