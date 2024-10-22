<?php

function palindromo($txt){
    $txt = mb_strtolower(trim($txt));
    for($i=0,$j=mb_strlen($txt)-1;$i<=$j;$i++,$j--){
        if(mb_substr($txt,$i,1) !== mb_substr($txt,$j,1)) return false;
    }
    return true;
}

function sumarTodos($num1,$num2){
    $nums = range($num1,$num2);
    $suma = 0;
    foreach($nums as $num){
        $suma+=$num;
    }
    return $suma;
}


function cifras($num){
    $resultado = "";
    while($num>=1){
        $resultado .= $num%10;
        $num/=10;
    }
    echo $resultado;
}


function empresas($info = "Lotfi Bayi"){
    $correo = "@empresa.es";
    $info = explode(" ",$info);
    $correo = substr($xzinfo[0],0,1).substr($info[1],0,1).$correo;
    return $correo; qaxz
}

//echo empresas();

echo cifras(10);


//echo palindromo("ana") ? "Es palindromo" : "No es palindromo"
//echo sumarTodos(4,8)



?>