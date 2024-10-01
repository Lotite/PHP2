<?php

$fila = "<tr>";
for($j =20,$mina = 1 ;$j>0;$j--){
        $fila .= "<td>";
    if(rand(0,20) < 1 and  $mina >0){
        $fila .= "*";
        $mina --;
    }
    else{
        $fila .= " ";
    }
    $fila .= "</td>";
}
$fila .=$fila."</tr>";
echo $fila;



?>