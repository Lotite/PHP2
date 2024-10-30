<?php
$palabras = [
    "elefante",
    "jirafa",
    "hipopotamo",
    "rinoceronte",
    "cocodrilo",
    "tigre",
    "leon",
    "pantera",
    "guepardo",
    "leopardo",
    "zebra",
    "antilope",
    "bisonte",
    "bufalo",
    "camello",
    "dromedario",
    "gacela",
    "ciervo",
    "alce",
    "reno",
    "caballo",
    "burro",
    "mula",
    "cerdo",
    "vaca",
    "oveja",
    "cabra",
    "gallina",
    "pato",
    "ganso",
    "pavo",
    "perro",
    "gato",
    "conejo",
    "huron",
    "hamster",
    "raton",
    "ardilla",
    "castor",
    "nutria",
    "zorro",
    "lobo",
    "oso",
    "mapache",
    "panda",
    "koala",
    "canguro",
    "wallaby",
    "dingo",
    "ornitorrinco"
];

function inicializarPagina()
{   //Verificamos si se hizo un post
    if ($_POST) {
        //Estas dos variables se crean aqui ya que en la mayoria de los casos lo usaran
        $palabra = $_POST['palabra'];
        $pista = $_POST['pista'];
        //el post action sirve para realizar una accion en especifico dependiendo del boton pulsado
        switch ($_POST["action"]) {
            case "Salir":
                echo "<h1 style='color:blue;'>Has salido</h1>";
                break;
                case "Borrar":
                    $vidas = $_POST['vidas'];
                    imprimirFormularioJugar($vidas, $palabra, $pista);
                    break;
            case "Jugar" or "Probar":
                $letra = isset($_POST['letra'][0]) ? $_POST['letra'][0] : "";
                $TemPista = imprimirPista($palabra, $letra, $pista);
                $vidas = $_POST['vidas'] - ($TemPista == $pista);
                 //Se actualizaran las fechas de caducidad de las cookies
                if ($_POST['action'] == "Jugar") {
                    setcookie("dificultad", $_POST['vidas'], time() + (3600 * 24 * 7));
                    setcookie("nombre", $_POST['nombre'], time() + (3600 * 24 * 7));
                }
                //Vemos el estado de la partida
                if (seguirPartida($TemPista)) {
                    //Si aun tiene barras bajas verificara las vidas que tenemos
                    if ($vidas >= 0) {
                        imprimirFormularioJugar($vidas, $palabra, $TemPista);
                    } else {
                        echo "<h1 style='color:red;'>Has perdido</h1>";
                    }
                } else {
                    //Si no hay ninguna barra baja se entiende que gano
                    echo "<h1 style='color:green;'>Has ganado</h1>";
                }
            break;
        }
    } else {
        //Aqui imprimimos el menu inicial mas selecionaremos la palabra que usaremos en el juego
        global $palabras;
        $palabra =  $palabras[rand(0, count($palabras) - 1)];
        imprimirFormularioInicial($palabra);
    }
}
// fial de la funcion de la pista
function imprimirFormularioInicial($palabra, $pista = null)
{   //Verificaremos ya existen los cookies;
    $nombre = isset($_COOKIE['nombre']) ? $_COOKIE['nombre'] : "";
    $dificultad = isset($_COOKIE['dificultad']) ? $_COOKIE['dificultad'] : "7";
?> 
    <form method="post">
        <?php
        //Si hay cookies se imprimira un saludo
        if ($nombre !== "") {
        ?>
            <h1>Bienvenido <strong><?php echo $nombre; ?></strong></h1>
            <input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
        <?php
        //Si no creara un input para ingresar el nombre 
        } else { ?>
            <h4>Ingrese nombre</h4>
            <input type="text" name="nombre" placeholder="nombre" value="<?php echo $nombre; ?>">
            <br>
        <?php
        }
        ?>
        <h4>Selecciona dificultad</h4>
        <select name="vidas">
            <option value="7" <?php if ($dificultad === "7") {echo "selected";} ?>>Nivel fácil (7 intentos)</option>
            <option value="6" <?php if ($dificultad === "6") {echo "selected";} ?>>Nivel intermedio (6 intentos)</option>
            <option value="5" <?php if ($dificultad === "5") {echo "selected";} ?>>Nivel difícil (5 intentos)</option>
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
        <p><strong>Pista: </strong><span><?php echo $pista; ?></span></p>
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

function seguirPartida($pista)
{
    return strpos($pista, "_") !== false;
}
///Devueve la pista con las letras acertadas
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




?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El ahorcado</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <div id="contenedor">
        <h1>El AHORCADO</h1>
        <?php
        inicializarPagina();
        ?>
    </div>
</body>

</html>