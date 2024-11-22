<?php
class Curso{
    private $id;
    private $nombre;
    private $horas;
    private $fecha_inicio;
    public function __construct($id, $nombre, $horas, $fecha_inicio){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->horas = $horas;
        $this->fecha_inicio = $fecha_inicio;
    }
    public static function leerCursos(){
        global $cursos;
        $temCuersos = [];
        foreach($cursos as $curso){
            $temCuersos[] = new Curso($curso['id'], $curso['nombre'], $curso['horas'], $curso['fecha_inicio']);
        }
        return $temCuersos;
    }
    public static function filtrarCursos($curso,$nombre, $horas_min, $fecha_inicio){
        return ($nombre ? $curso->getNombre() == $nombre : true) && ($horas_min ? $curso->getHoras() >= $horas_min : true) && ($fecha_inicio ? $curso->getFechaInicio() >= $fecha_inicio : true); 
    }

    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getHoras(){
        return $this->horas;
    }
    public function getFechaInicio(){
        return date("d-m-Y",strtotime($this->fecha_inicio));
    }
}
