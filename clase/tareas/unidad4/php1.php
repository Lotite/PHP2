<?php
if(isset($_POST["accion"])&&$_POST["accion"]=="Jugar"){
    setcookie("dificultad", $_POST['vidas'], time() + (3600 * 24 * 7));
    setcookie("nombre", $_POST['nombre'], time() + (3600 * 24 * 7));
}
include './funciones.php';
function inicializarPagima() {
    if ($_POST) {
        $palabra = $_POST["palabra"];
        $pista = $_POST["pista"];
        $vidas = $_POST["vidas"];
        $accion = $_POST["accion"];
        switch ($accion) {
            case "Jugar":
            case "Enviar":
                if ($accion == "Enviar") {
                    $letra = $_POST["letra"];
                    modificarPista($letra, $pista, $palabra, $vidas);
                }
                case "Borrar":
                if ($vidas > 0) {    
                    if (verificarVictoria($palabra, $pista))
                        echo '<h1>Felicidades has GANADO!</h1>';
                    else
                        juego($palabra, $pista, $vidas);
                } else {
                    echo "<h1>Perdiste la palabra era $palabra</h1>";
                }
                break;
                case "Salir":
                echo "<h1>Has salido</h1>";
                break;
                
        }
    } else {
        menu(crearPalabra(),existeCookie("nombre"), existeCookie("dificultad"));
    }
}
?>
<!doctype html>
<html>
    <head>
        <title>EL AHORCADO</title>
    </head>
    <body>
        <form action="php1.php" method="post">
            <?php inicializarPagima() ?>
        </form>
    </body>
</html>

