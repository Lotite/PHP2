<?php
$palabras = [];
$palabras[] = "hola";
$palabras[] = "adios";
$palabras[] = "comida";
$palabras[] = "dormir";
$palabras[] = "cuscus";
$palabras[] = "cuba";









if (isset($_POST["estado"])) {
    if (isset($_POST["enviar"])) {
        $palabra = $_POST['palabra'];
        $texto = $_POST['letra'];
        $letras = $_POST['letras'];
    } else {
        $palabra = $palabras[rand(0, count($palabras) - 1)];
        $letras = "";
    }
}



function extraer($texto, $palabra)
{
    $posiciones = [];
    $texto = str_split($texto);
    foreach (str_split($palabra) as $key => $value) {
        if (in_array($value, $texto)) {
            if (!isset($posiciones[$value])) {
                $posiciones[$value] = [];
            }
            $posiciones[$value][] = $key;
        }
    }
    return sustituir($palabra, $posiciones);
}




function sustituir($palabra, $lista)
{
    $devover = "";
    for (; strlen($devover) < strlen($palabra); $devover .= "_");

    foreach ($lista as $letra => $posicones) {
        foreach ($posicones as $posicion) {
            $devover[$posicion] = $letra;
        }
    }

    return $devover;
}




echo extraer("ab", "halbaa");




function imprimirFormularioInicial()
{
?>
    <h4>Selecciona difcultad</h4>
    <form method="post">
        <select>
            <option value="7">Nivel fácil (7 vidas)</option>
            <option value="6">Nivel intermedio (6 vidas)</option>
            <option value="5">Nivel difícil (5 vidas)</option>
        </select>
        <br>
        <input type="submit" name="estado" value="Jugar">
        <input type="submit" name="salir" value="Salir">
    </form>
<?php
}


function imprimirFormularioJugar($pista = "_a_", $vida, $palabra, $letras)
{
?>
    <form method="post">
        <p><strong>Pista</strong><span><?php echo $pista; ?></span></p>
        <p>Te quedan <?php echo $vida; ?> vidas</p>
        <span>Introduce una letra: </span> <input type="text" name="letra"> <br>
        <input type="submit" name="estado" value="enviar">
        <input type="submit" name="borrar" value="borrar">
        <input type="hidden" name="palabra" value="<?php echo $palabra; ?>">
        <input type="hidden" name="letras" value="<?php echo $letras; ?>">
        <input type="hidden" name="vidas" value="<?php echo $vida; ?>">
    </form>
<?php
}






?>











<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La pagina</title>
</head>

<body>
    <div style="width: 500px;" class="mx-auto mt-4">
        <h1>El AHORCADO</h1>
        <?php imprimirFormularioInicial() ?>
    </div>
</body>

</html>