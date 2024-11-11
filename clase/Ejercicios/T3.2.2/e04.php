<?php
    $tabla = array();
    $fila = array("0","0","0","0","0","0","0","0","0","0");
    for($i=0;$i<10;$i++){
        $tabla[] = $fila;
        $tabla[$i][$i] = "1";
        $tabla[$i][9-$i] = "1";
    }
    foreach($tabla as $f){
        foreach($f as $c){
            echo "[$c]";
        }
        echo"\n";
    }
   ?>


