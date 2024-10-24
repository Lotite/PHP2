<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $adivinanzas = [];
    $adivinanza1 = ["Escribe rojo", "rojo"];
    $adivinanza2 = ["Escribe verde", "verde"];
    $adivinanzas[] = $adivinanza1;
    $adivinanzas[] = $adivinanza2;


    if (!$_POST) {
        
        imprimirFormulario($adivinanzas,rand(0, count($adivinanzas) - 1),6);
    } else {
        $num = (int)$_POST["adivinanza"];
        $respTrue = $adivinanzas[$num][1];
        $resuesta = $_POST["respuesta"];
        if ($respTrue == $resuesta) {
            echo "<h1>Correcto</h1>";
            regresar();
        } else {
            $intentos = (int)$_POST["intentos"];
            $intentos--;
            echo "<h1>Incorectote quedan $intentos </h1>";
            if ($intentos > 0) {
                imprimirFormulario($adivinanzas, $num, $intentos);
            } else {
                echo "<h2>Perdiste</h2>";
                regresar();
            }
        }
    }






    function imprimirFormulario($adivinanzas, $num , $intentos)
    {
        $adivinanza = $adivinanzas[$num];
    ?>
        <h1><?php echo $adivinanza[0] ?></h1>
        <form method="post">
            <input type="hidden" value="<?php echo $num ?>" name="adivinanza" />
            <input type="hidden" name="intentos" value="<?php echo $intentos ?>"  />
            <input type="text" placeholder="Respuesta" name="respuesta" />
            <button>Enviar</button>
        </form>
        <?php
    }


    function regresar()
    {
    ?>
    <form method="post">
        <button>Regresar</button>
    </form>
<?php
    }







    ?>







</body>

</html>