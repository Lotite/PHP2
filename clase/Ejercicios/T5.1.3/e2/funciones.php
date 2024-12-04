<?php
//La función comprueba si UN CURSO se debe mostrar o no.
function filtrarCursos($curso, $nombre, $horas_min, $fecha_inicio)
{
   return ($nombre ? $curso["nombre"] == $nombre : true) && ($horas_min ? $curso["horas"] >= $horas_min : true) && ($fecha_inicio ? $curso["fecha_inicio"] >= $fecha_inicio : true); 
}