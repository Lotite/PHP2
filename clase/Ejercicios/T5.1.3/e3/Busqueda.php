<?php
 class Busqueda{
    static private $historial = array();
    private $nombre;
    private $horas;
    private $fecha_inicio;
    public function __construct($nombre = null, $horas=null, $fecha_inicio=null){
        $this->nombre = $nombre;
        $this->horas = $horas;
        $this->fecha_inicio = $fecha_inicio;
        self::$historial[] = $this;
    }
    static public function recuperarBusquedas(){
        return self::$historial;
    }

    public function getDatos(){
        $text = "";
        if($this->nombre) $text.= "Nombre: $this->nombre, ";
        if($this->horas) $text.= "Horas: $this->horas, ";
        if($this->fecha_inicio) $text.= "Fecha: $this->fecha_inicio,";
        return $text;
    }

 }