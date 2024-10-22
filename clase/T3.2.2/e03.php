<?php

$boleto = array();
$v = range(0,49);
for($i=0;$i<6;$i++){
    $index = rand(0,count($v)-1);
    $boleto[] = $v[$index];
    unset($v[$index]);
    sort($v);
}
$w = array_filter($v,"filtrar");
$index = rand(0,count($w)-1);
$boleto[] = $w[$index = rand(1,count($w)-1)];
function filtrar($num){
    return $num >=0 && $num<=9;
}


print_r($boleto);

echo "Numeros: ";

for($i=0;$i<6;$i++){
   echo " $boleto[$i]";
}

echo "\n\r complementario: $boleto[6]";



?>