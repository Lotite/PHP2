<?php
require_once 'datos.php';
if(isset($_SESSION["cursos"])){
    $cursos = $_SESSION["cursos"];
}


if(isset($_POST["alta"])){
   $nombre = $_POST["nombre"];
   $horas_min = $_POST["horas"];
   $fecha_inicio = $_POST["fechaInicio"];
   limpiar($nombre);
   limpiar($fecha_inicio);
   limpiar($horas_min);
   if(verificarAlta($nombre,$horas_min,$fecha_inicio)){
       $cursos[] = ['id' => count($cursos) +1, 'nombre' => $nombre, 'horas' => $horas_min, 'fecha_inicio' => $fecha_inicio];
       $_SESSION["cursos"] = $cursos;
       print_r($cursos);
   }else{
    echo "<h1 style='color:red;'>Error en dar de alta el curso</h1>";
   }
}




function verificarAlta($nombre, $horas_min, $fecha_inicio)
{
    if(empty($nombre) || empty($horas_min) || empty($fecha_inicio)){
        return false;
    } 
        return strlen($nombre) > 4 && strlen($nombre) <100 && // verificacion de nombre
                strtotime($fecha_inicio) >= time() && //verificacion de fecha
                $horas_min > 5 && $horas_min < 200; //verificacion de horas
    
}


function limpiar(&$text){
    $text = trim($text);
    $text = strip_tags($text);
}

?>