<?php
$txt = "holaMundo";
if(ctype_alnum($txt)){
    echo "Nombre de usuario válido. El login será ".strtolower($txt);
}else{
    echo "“El nombre de usuario sólo puede contender números y letras sin espacios en blanco";
}

?>