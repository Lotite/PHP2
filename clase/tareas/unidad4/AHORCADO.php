<?php
$palabras = [
    "elefante", "jirafa", "hipopotamo", "rinoceronte", "cocodrilo",
    "tigre", "leon", "pantera", "guepardo", "leopardo",
    "zebra", "antilope", "bisonte", "bufalo", "camello",
    "dromedario", "gacela", "ciervo", "alce", "reno",
    "caballo", "burro", "mula", "cerdo", "vaca",
    "oveja", "cabra", "gallina", "pato", "ganso",
    "pavo", "perro", "gato", "conejo", "huron",
    "hamster", "raton", "ardilla", "castor", "nutria",
    "zorro", "lobo", "oso", "mapache", "panda",
    "koala", "canguro", "wallaby", "dingo", "ornitorrinco"
];







function inicializarPagina()
{
    if ($_POST) {
        $palabra = $_POST['palabra'];
        $pista = $_POST['pista'];
        switch ($_POST["action"]) {
            case "Salir":
                exit();
                break;
            case "Jugar" or "Probar":
                $letra = isset($_POST['letra']) ? $_POST['letra'] : "";
                $TemPista = imprimirPista($palabra, $letra, $pista);
                $vidas = $_POST['vidas'] - ($TemPista == $pista);
                if(verificarGanado($TemPista)){
                    if($vidas >= 0){
                        imprimirFormularioJugar($vidas, $palabra, $TemPista);
                    }else{
                        echo "<h1>Has perdido</h1>";
                    }
                }else{
                    echo "<h1>Has ganado</h1>";
                }
                break;
            case "borrar":
                imprimirFormularioInicial($palabra, $pista);
                break;
        }
    } else {
        global $palabras;
        $palabra =  $palabras[rand(0, count($palabras) - 1)];
        imprimirFormularioInicial($palabra);
    }
}


function verificarGanado($pista){
    return strpos($pista,"_") !== false;
}



function imprimirPista($palabra, $letra = "", $pista = "",)
{
    $posiciones = [];
    for ($i = 0; $i < strlen($palabra); $i++) {
        if ($palabra[$i] == $letra) {
            $posiciones[] = $i;
        }
    }
    return sustituir($palabra, $letra, $posiciones, $pista);
}




function sustituir($palabra, $letra, $posiciones, $pista = "")
{
    if (!$pista) {
        for (; strlen($pista) < strlen($palabra) * 2; $pista .= "_ ");
    }
    for ($i = 0; $i < count($posiciones); $i++) {
        $pista[$posiciones[$i] * 2] = $letra;
    }
    return $pista;
}









function imprimirFormularioInicial($palabra, $pista = null)
{

?>
    <h4>Selecciona difcultad</h4>
    <form method="post">
        <select name="vidas">
            <option value="7">Nivel fácil (7 intentos)</option>
            <option value="6">Nivel intermedio (6 intentos)</option>
            <option value="5">Nivel difícil (5 intentos)</option>
        </select>
        <br>
        <input type="submit" name="action" value="Jugar">
        <input type="submit" name="action" value="Salir">
        <input type="hidden" name="palabra" value="<?php echo $palabra; ?>" />
        <input type="hidden" name="pista" value="<?php echo $pista ?? imprimirPista($palabra); ?>" />
    </form>
<?php
}


function imprimirFormularioJugar($vida, $palabra, $pista = "")
{
?>
    <form method="post">
        <p><strong>Pista </strong><span><?php echo $pista; ?></span></p>
        <p>Te quedan <?php echo $vida; ?> vidas</p>
        <span>Introduce una letra: </span> <input type="text" name="letra"> <br>
        <input type="submit" name="action" value="Probar">
        <input type="submit" name="action" value="Borrar">
        <input type="hidden" name="palabra" value="<?php echo $palabra; ?>">
        <input type="hidden" name="vidas" value="<?php echo $vida; ?>">
        <input type="hidden" name="pista" value="<?php echo $pista; ?>" />
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
        <?php
        inicializarPagina();
        ?>
    </div>
</body>

</html>