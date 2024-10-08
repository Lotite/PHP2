<?php

$fichero = $_FILES["fichero"]["tmp_name"];
move_uploaded_file($fichero,"imagenes/foto.png");

echo $fichero


?>