<?php
    $tabla = array();
    $minas=10;
  
    for($i =0;$i<20;$i++){
        $fila = array();
        for($j =0,$mina = 1 ;$j<20;$j++){
            if(rand(0,20) < 1 and $minas >0 and $mina >0){
                $fila[] = "*";
                $minas --;
                $mina --;
            }
            else{
                $fila[] = ".";
            }
        }
        $tabla[] = $fila;
    }
    echo "Minas restantes ".$minas."\n";
    foreach($tabla as $f){
        foreach($f as $c){
            echo "[$c]";
        }
        echo"\n";
    }

?>