<?php
function validar_email($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL)? true : false ;
}

function validar_url($url)
{
    return filter_var($url, FILTER_VALIDATE_URL);
}

function validar_ip($ip)
{
    return filter_var($ip, FILTER_VALIDATE_IP);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos del formulario
    $nombre_completo = trim(strip_tags($_POST['nombre_completo']));
    $nombre_usuario = trim(strip_tags($_POST['nombre_usuario']));
    $contraseña = trim(strip_tags($_POST['contraseña']));
    $edad = trim(strip_tags($_POST['edad']));
    $fecha_nacimiento = trim(strip_tags($_POST['fecha_nacimiento']));
    $email = trim(strip_tags($_POST['email']));
    $url_personal = trim(strip_tags($_POST['url_personal']));
    $ip_equipo = trim(strip_tags($_POST['ip_equipo']));
    $hobbies = trim(strip_tags($_POST['hobbies']));
    $recibir_info = isset($_POST['recibir_info']) ? "Sí" : "No";
    $sexo = trim(strip_tags($_POST['sexo']));
    $lenguas = isset($_POST['lenguas']) ? implode(", ", $_POST['lenguas']) : '';


    foreach($_POST as $valor){
        if(empty($valor)){
            regresar();
        }
    }
    if (!empty($fecha_nacimiento) && !preg_match('/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/', $fecha_nacimiento) or mb_strlen($contraseña) < 6) {
        regresar();
    }



    function regresar()
    {
        header('Location: registro.php');
        exit();
    }

    if (isset($_FILES['curriculo'])) {
        $directorio_subida = 'subidos/';
        if (!file_exists($directorio_subida)) {
            mkdir($directorio_subida, 0777, true);
        }
        $archivo_subido = $directorio_subida . basename($_FILES['curriculo']['name']);
        if (move_uploaded_file($_FILES['curriculo']['tmp_name'], $archivo_subido)) {
            $curriculo_nombre = $_FILES['curriculo']['name'];
            $curriculo_tamaño = $_FILES['curriculo']['size'];
        } else {
            echo "Error al subir el archivo.";
            $curriculo_nombre = "Error";
            $curriculo_tamaño = 0;
        }
    }

    // Mostrar los datos recibidos
    echo "<h2>Datos Recibidos:</h2>";
    echo "Nombre Completo: $nombre_completo<br>";
    echo "Nombre de Usuario: $nombre_usuario<br>";
    echo "Contraseña: $contraseña<br>";
    echo "Edad: $edad<br>";
    echo "Fecha de Nacimiento: $fecha_nacimiento<br>";
    echo "Email: $email<br>";
    echo "URL de la Página Personal: $url_personal<br>";
    echo "IP del Equipo: $ip_equipo<br>";
    echo "Hobbies: $hobbies<br>";
    echo "Recibir Información: $recibir_info<br>";
    echo "Sexo: $sexo<br>";
    echo "Lenguas Extranjeras: $lenguas<br>";
    echo "Currículo: Nombre del archivo: $curriculo_nombre, Tamaño: $curriculo_tamaño bytes<br>";
}
