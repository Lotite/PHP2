<?php
if ($_POST) {
    $nombre_completo = $_POST["nombre_completo"] ?? null;
    $nombre_usuario =  $_POST["nombre_usuario"] ?? null;
    $edad =  $_POST["edad"] ?? null;
    $fecha_nacimiento =  $_POST["fecha_nacimiento"] ?? null;
    $email =  $_POST["email"] ?? null;
    $url_personal = $_POST["url_personal"] ?? null;
    $ip_equipo =  $_POST["ip_equipo"] ?? null;
    $hobbies =  $_POST["hobbies"] ?? null;
    $recibir_info = $_POST["recibir_info"]  ?? null;
    $sexo =  $_POST["sexo"] ?? null;
    $lenguas = $_POST["lenguas"]  ?? [];
    $datos = $_POST;
    
    $contraseña = trim($datos['contraseña']);
   
    $datos["lenguas"] = isset($_POST['lenguas']) ? implode(", ", $_POST['lenguas']) : null;
    $fecha_Comprobar = trim(strip_tags($datos['fecha_nacimiento']));
    if (!preg_match('/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/', $fecha_Comprobar)) {
        $datos['fecha_nacimiento'] = "";
    }
    $imprimir = false;
    if (mb_strlen($contraseña) < 6) {
        $datos['contraseña'] = null;
        $imprimir = true;
    }
    foreach ($datos as $key => $value) {
        if (empty($value)) {
            $imprimir = true;
            unset($_POST[$key]);
        }
    }
   
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email = null;
        $datos['email'] = null;
        $imprimir = true;        
    }

    if(!filter_var($url, FILTER_VALIDATE_URL)){
        $url_personal =  null;
        $datos['url_personal'] = null;
        $imprimir = true;   
    }

    if(!filter_var($ip, FILTER_VALIDATE_IP)){
        $ip_equipo =  null;
        $datos['ip_equipo'] = null;
        $imprimir = true;   
    }

    function imprimir($datos = [])
    {
        foreach ($datos as $key => $value) {
            echo "$key $value  <br>";
        }
    }
}



function imprimirFormulario($nombre_completo = "", $nombre_usuario = "", $edad = "", $fecha_nacimiento = "", $email = "", $url_personal = "", $ip_equipo = "", $hobbies = "", $recibir_info = false, $sexo = "", $lenguas = [])
{ ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <label for="nombre_completo">Nombre Completo:</label>
        <input type="text" id="nombre_completo" name="nombre_completo" value="<?php echo $nombre_completo ?>"><br>

        <label for="nombre_usuario">Nombre de Usuario: (*)</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" value="<?php echo $nombre_usuario ?>"><br>

        <label for="contraseña">Contraseña: (*)</label>
        <input type="text" id="contraseña" name="contraseña">
        <span>Debe tener como mínimo seis caracteres.</span><br>

        <label for="edad">Edad:</label>
        <input type="text" id="edad" name="edad" value="<?php echo $edad ?>"><br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $fecha_nacimiento ?>"><br>

        <label for="email">Email: (*)</label>
        <input type="text" id="email" name="email" value="<?php echo $email ?>"><br>

        <label for="url_personal">URL de la Página Personal:</label>
        <input type="text" id="url_personal" name="url_personal" value="<?php echo $url_personal ?>"><br>

        <label for="ip_equipo">IP del Equipo:</label>
        <input type="text" id="ip_equipo" name="ip_equipo" value="<?php echo $ip_equipo ?>"><br>

        <label for="hobbies">Descripción de los Hobbies:</label>
        <textarea id="hobbies" name="hobbies"><?php echo $hobbies ?></textarea><br>

        <label for="recibir_info">Recibir Información:</label>
        <input type="checkbox" id="recibir_info" name="recibir_info" <?php if ($recibir_info) echo "checked" ?>><br>

        <label>Sexo: (*)</label>
        <input type="radio" id="hombre" name="sexo" value="hombre" <?php if ($sexo == "hombre") echo "checked" ?>>
        <label for="hombre">Hombre</label>
        <input type="radio" id="mujer" name="sexo" value="mujer" <?php if ($sexo == "mujer") echo "checked" ?>>
        <label for="mujer">Mujer</label><br>

        <label for="lenguas">Lenguas Extranjeras:</label>
        <select id="lenguas" name="lenguas[]" multiple>
            <option value="ingles" <?php if (in_array("ingles", $lenguas)) echo "Selected";   ?>>Inglés</option>
            <option value="frances" <?php if (in_array("frances", $lenguas)) echo "Selected";   ?>>Francés</option>
            <option value="aleman" <?php if (in_array("aleman", $lenguas)) echo "Selected";   ?>>Alemán</option>
            <option value="italiano" <?php if (in_array("italiano", $lenguas)) echo "Selected";   ?>>Italiano</option>
            <option value="chino" <?php if (in_array("chino", $lenguas)) echo "Selected";   ?>>Chino</option>
        </select><br>

        <label for="curriculo">Currículo:</label>
        <input type="file" id="curriculo" name="curriculo"><br>

        <button type="submit">Enviar</button>
    </form>
<?php } ?>




<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
</head>

<body>
    <?php
    if ($_POST) {
        if (!$imprimir)
            imprimir($datos);
        else
            imprimirFormulario($nombre_completo, $nombre_usuario, $edad, $fecha_nacimiento, $email, $url_personal, $ip_equipo, $hobbies, $recibir_info, $sexo, $lenguas);
    } else {
        imprimirFormulario();
    }

    ?>
</body>

</html>