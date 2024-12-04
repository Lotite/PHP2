<?php
class Busqueda
{
    static private $historial = [];
    static private $numObjs = 1;
    private $nombre;
    private $id;
    private $horas;
    private $fecha_inicio;

    public function __construct($nombre = null, $horas = null, $fecha_inicio = null)
    {   
        self::restaurarHistorial();
        $this->horas = $horas;
        $this->fecha_inicio = $fecha_inicio;
        $this->id = self::$numObjs++;
        $this->nombre = $nombre;
        $this->guardarHistorial();
    }

    static public function recuperarBusquedas(){
        self::restaurarHistorial();
        return self::$historial;
    }

    public function getDatos(){
        $text = "id $this->id, ";
        if ($this->nombre) $text .= "Nombre: $this->nombre, ";
        if ($this->horas) $text .= "Horas: $this->horas, ";
        if ($this->fecha_inicio) $text .= "Fecha: $this->fecha_inicio,";
        return $text;
    }

    private function guardarHistorial(){
        self::$historial[] = $this;
        $_SESSION["historial"] = array_map('serialize', self::$historial);
        $_SESSION["numObjs"] = self::$numObjs;
    }

    private static function restaurarHistorial(){
        if(isset($_SESSION["historial"])){
            self::$historial = array_map('unserialize', $_SESSION["historial"]);
            self::$numObjs = isset($_SESSION["numObjs"]) ? $_SESSION["numObjs"] : 1;
        }
    }
}
?>

