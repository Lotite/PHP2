<?php

function crearFormulario($nota = "")
{
?>
    <h3>Ingresa una nota</h3>
    <form method="post">
        <input type="text" name="nota" value="<?php echo $nota; ?>" placeholder="nota de tu examen">
        <button>Enviar</button>
    </form>
<?php
}




function alert($nota = null)
{
    if ("" == "error") {
        imprimir("alert-danger", "Error sintaxis", "Ingresa un numero valido");
    } else {
    }

    $resulrado = false;
    if(is_numeric($nota)){
        switch (true) {
            case (float)($nota >= 0 && (float)$nota < 5):
                imprimir("alert-danger", "Suspenso", "Debes esforzarte mas");
                break;
            case ((float)$nota >= 5 && (float)$nota < 7):
                imprimir("alert-warning", "Bien", "Mejorable");
                break;
            case ((float)$nota >= 7 && (float)$nota < 9):
                imprimir("alert-info", "Notable", "Se nota el esfuerzo");
                break;
            case ((float)$nota >= 9 && (float)$nota <= 10):
                imprimir("alert-success ", "Sobresaliente", "Buen trabajo");
                break;
            default:
            imprimir("alert-danger", "Error sintaxis", "Ingresa un numero valido");
            $resulrado = true;
                break;
        }
    }else{
        imprimir("alert-danger", "Error sintaxis", "Ingresa un numero valido");
        $resulrado = true;
    }
    return $resulrado;
}

function imprimir($color = "", $text1 = "", $texto2 = "")
{
?>
    <div
        class="alert <?php echo $color; ?>"
        role="alert">
        <strong><?php echo $text1; ?> </strong> <?php echo $texto2; ?>
    </div>

<?php
}






?>











<!doctype html>
<html lang="en">

<head>
    <title>Examen</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>

<body class="mx-auto mt-2" style="width: 500px;">
    <div>
    <?php
    if(!$_POST)
    {
        crearFormulario();
    }
    else{
        $nota = $_POST["nota"];
        if(alert($nota)){
            crearFormulario($nota);
        }else{
            echo "<form method='post'><button>Regresar</button></form>";
        }
    }
    ?>
    </div>
</body>
<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>

</html>