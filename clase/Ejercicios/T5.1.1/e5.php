<?php

class cuenta_objs
{
    static public $contador = 0;
    static function cuantosObjetos()
    {
        return cuenta_objs::$contador;
    }
    function __construct()
    {
        cuenta_objs::$contador++;
    }
    function __destruct()
    {
        cuenta_objs::$contador--;
    }
}
$o1 = new cuenta_objs();
$o2 = new cuenta_objs();
$o3 = new cuenta_objs();
unset($o2);

echo cuenta_objs::$contador;




?>