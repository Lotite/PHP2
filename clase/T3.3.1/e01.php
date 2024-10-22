<?php
    
function par($num){
    return $num%2 ==0;
}



function primo($num){
    for($i=2;$i <=($num)/2;$i++){
        if($num%$i==0){
            return false;
        }
    }
    return true;
}

function imprimir(){
    for($i=1;$i<=10;$i++){
        $par = par($i) ? "es par" : "no es par";
        $primo = primo($i) ? "es primo" : "no es primo";
        printf("El numero es $i $par y $primo ");
    }
}



imprimir()


?>