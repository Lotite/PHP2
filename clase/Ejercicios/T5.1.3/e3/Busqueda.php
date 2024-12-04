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
        if (isset($_SESSION["historial"])) {
            self::$historial = $_SESSION["historial"];
        }
        $this->nombre = $nombre;
        $this->horas = $horas;
        $this->fecha_inicio = $fecha_inicio;
        self::$historial[] = $this;
        $this->id = self::$numObjs++;
        $_SESSION["historial"] = self::$historial;
    }
    static public function recuperarBusquedas()
    {
        return self::$historial;
    }
    public function getDatos(){
        $text = "id $this->id, ";
        if ($this->nombre) $text .= "Nombre: $this->nombre, ";
        if ($this->horas) $text .= "Horas: $this->horas, ";
        if ($this->fecha_inicio) $text .= "Fecha: $this->fecha_inicio,";
        return $text;
    }
}
?>