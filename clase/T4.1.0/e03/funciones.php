<?php



function generarPassNum($min, $max)
{
    $charsnum = rand($min, $max);
    $contraseña = "";
    for ($i = 0; $i < $charsnum; $i++) {
        $contraseña .= rand(0, 9);
    }
    return $contraseña;
}



function  generarPassAlfa($min, $max)
{
    $charsnum = rand($min, $max);
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $contraseña = "";
    for ($i = 0; $i < $charsnum; $i++) {
        $contraseña .= $chars[rand(0, strlen($chars) - 1)];
    }
    return $contraseña;
}

function  generarPassAlfaNum($min, $max)
{
    $charsnum = rand($min, $max);
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $contraseña = "";
    for ($i = 0; $i < $charsnum; $i++) {
        if (rand(1, 4) > 2) {
            $contraseña .= $chars[rand(0, strlen($chars) - 1)];
        } else {
            $contraseña .= rand(0, 9);
        }
    }
    return $contraseña;
}


function crearContraseña($opcion,$min,$max)
{
    switch ($opcion){
        case 1:
            return generarPassNum($min,$max);
        break;
        case 2:
            return generarPassAlfa($min,$max);
        break;
        case 3:
            return generarPassNum($min,$max);
        break;
    }
}
