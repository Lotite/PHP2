<?php

class Miscelanea{
    static function autores(){
        return "Pepe y Paco";
    }
}

echo Miscelanea::autores();
echo (new Miscelanea)->autores()
?>