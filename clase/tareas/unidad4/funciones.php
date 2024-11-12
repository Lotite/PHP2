<?php

function crearPalabra() {
    $palabras = [
        "Hola",
        "Adios",
        "Dias",
        "Noches"
    ];
    //return $palabras[rand(0, count($palabras) - 1)];
    return "AdiosHola";
}


function existeCookie($nombre){
    if(isset($_COOKIE[$nombre])) return $_COOKIE[$nombre] ;
    return false;
}

function menu($palabra, $nombre, $dificultad = null) {
    if ($nombre) {
        ?> 
        <h1>Bienvenido de nuevo <?php echo $nombre ?></h1>
        <input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
        <?php
    } else {
        ?>
        <h1>Ingresa tu nombre</h1>
        <input type = "text" name = "nombre">
        <?php
    }
    ?> 
    <h3>Selecciona dificultad:</h3>
    <select name="vidas" >
        <option value="7" <?php if (!$dificultad or $dificultad == 7) echo 'selected'; ?> >Nivel fácil (7 vidas)</option>
        <option value="6" <?php if ($dificultad == 6) echo 'selected'; ?>>Nivel Intermedio (6 vidas)</option>
        <option value="5" <?php if ($dificultad == 5) echo 'selected'; ?>>Nivel Difícil (5 vidas)</option>
    </select>
    <input type="submit" value="Jugar" name="accion" />
    <input type="submit" value="Salir" name="accion" />
    <input type="hidden" value="<?php echo$palabra; ?>" name="palabra">
    <input type="hidden" value="<?php echo crearPista($palabra); ?>" name="pista">

    <?php
}

function juego($palabra, $pista, $vidas) {
    ?>
    <h3>Pista:<?php echo $pista ?> </h3>
    <p>Te quedan <?php echo $vidas ?></p>
    <input type="text" name="letra">
    <input type="submit" value="Enviar" name="accion"/>
    <input type="submit" value="Borrar" name="accion"/>
    <input type="hidden" name="palabra" value="<?php echo $palabra; ?>">
    <input type="hidden" name="vidas" value="<?php echo $vidas; ?>">
    <input type="hidden" name="pista" value="<?php echo $pista; ?>">
    <?php
}

function crearPista($palabra) {
    $i = "_";
    for (; strlen($i) < strlen($palabra) * 2 - 1; $i .= " _")
        ;
    return $i;
}

function modificarPista($letra, &$pista, $palabra, &$vidas) {
    $pistaTem = $pista;
    if (stripos($palabra, $letra) !== false) {
        foreach (str_split($palabra) as $poss => $l) {
            if (strtolower($l) == strtolower($letra)) {
                $pista[$poss * 2] = $l;
            }
        }
    }
    if ($pista === $pistaTem)
        $vidas--;
}

function verificarVictoria($palabra, $pista) {
    return str_replace(" ", "", $pista) === $palabra;
}
?>




