<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campo de minas</title>
</head>

<body>
    <content>
    <?php

    $tabla = "<table>";
    $minas = 10;

    for ($i = 0; $i < 20; $i++) {
        $fila = "<tr>";
        for ($j = 20, $mina = 1; $j > 0; $j--) {
            $fila .= "<td>";
            if (rand(0, 20) < 1 and $minas > 0 and $mina > 0) {
                $fila .= "*";
                $minas--;
                $mina--;
            } else {
                $fila .= " ";
            }
            $fila .= "</td>";
        }
        $tabla .= $fila . "</tr>";
    }
    $tabla .= "</tabla>";
    echo "Minas restantes " . $minas . "<br/>";
    echo $tabla;

    ?>
    </content>
</body>
<style>
    body{
        height: 100vh;
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    table,th,td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        width: 20px;
        height: 20px;
        padding: 8px;
        text-align: left;
    }

    td {
        place-items: center;
        text-align: center;
    }
</style>

</html>