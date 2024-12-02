<?php

require_once 'DiscoDuro.php';
require_once 'Memoria.php';
require_once 'Ordenador.php';
require_once 'Procesador.php';

$memoriaX = new Memoria(8000,"DDR4",10000,"Samsung");
$procesadorY = new Procesador(10,20,"Intel","i9");
$discoZ = new DiscoDuro(1000,2000,"M2","Samnsung","Galaxy");
$or1 = new Ordenador($discoZ, $procesadorY, "x1","HP",$memoriaX);
$or2 = new Ordenador(null, null, "x2",null,null);

echo $or1->consultar();