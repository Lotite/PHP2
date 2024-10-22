<?php
    const tamano = 20;
    $a = range(1,tamano);
    foreach ($a as $valor ) {
        echo $valor . " ";
    }
    echo "\n";
    for($i = count($a)-1;$i>=0;$i--){
        echo $a[$i]." ";
    }

    
?>