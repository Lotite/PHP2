<?php
  include 'controladores/controladoresFunciones.php';
$base = "redsocial";
$tabla = "usuarios";
try {
     $bd = new PDO("mysql:host=localhost;dbname=$base", "root", "");
} catch (Exception $e) {
    die("error " . $e->getMessage());
}

session_start();




?>