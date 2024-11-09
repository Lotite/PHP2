<?php


function getColumnas($bd, $base, $tabla)
{
    return $bd->query("SELECT COLUMN_NAME AS columna FROM information_schema.columns WHERE table_schema = '$base' AND table_name = '$tabla'")->fetchAll(PDO::FETCH_COLUMN);
}


function imprimirTabla($bd, $base, $tabla)
{
    $columnas = getColumnas($bd, $base, $tabla);
    $table = "<table><tr>";
    foreach ($columnas as $columna) {
        $table .= "<th>$columna</th>";
    }
    $table .= "</tr>";
    $t = $bd->query("SELECT * from $tabla")->fetchAll(PDO::FETCH_NUM);
    foreach ($t as $f) {
        $fila = "<tr>";
        foreach ($f as $c) {
            $fila .= "<td>$c</td>";
            $fila .= "</tr>";
        }
        $table .= $fila;
    }
    $table .= "</table>";
    return $table;
}




function push($bd, $tabla,$eliminar = false)
{
    if($eliminar){
        unset($_POST[$eliminar]);
    }
    $valores = array_values($_POST);
    $inte = generarInterrogantes(count($valores));
    $columnas =  "(" . implode(",", array_keys($_POST)) . ")";
    $sentencia_agregar = $bd->prepare("INSERT into $tabla $columnas values ($inte)");
    // Insert into tabla (color,descripcion,.....) (?,?,.....)
    $sentencia_agregar->execute($valores);
}

function generarInterrogantes($cantidad)
{
    $resultado = '';
    for ($i = 0; $i < $cantidad; $i++) {
        $resultado .= '?';
        if ($i < $cantidad - 1) {
            $resultado .= ',';
        }
    }
    return $resultado;
}


function verificarDatos($bd, $tabla)
{
    unset($_POST["iniciar"]);
    $consulta = "Select * from $tabla where ";
    $keys = array_keys($_POST);
    $values = array_values($_POST);
    for ($i = 0; $i < count($keys); $i++) {
        if ($i > 0) {
            $consulta .= " and";
        }
        $consulta .= " $keys[$i] = ?";
    }

    $sqlPreparar = $bd->prepare($consulta);
    $sqlPreparar->execute($values);
    $resultado = $sqlPreparar->fetch();

    return $resultado;
}



function crearUsuario($bd, $tabla){
    $keys = array("user","email");
    $retornar = true;
    foreach ($keys as $key) {
        $sqlPreparar = $bd->prepare("Select * from $tabla where  $key = ?");
        $sqlPreparar->execute(array($_POST[$key]));
        $resultado = $sqlPreparar->fetch();
        if ($resultado) {
            $retornar = false;
            echo "El ". ($key=="user" ? "usuario " : "correo ")."no esta disponible </br>";
        }
    }

    
    push($bd,$tabla,"registrar");
    return $retornar;
}
