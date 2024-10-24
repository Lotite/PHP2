<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos del formulario
    $nombre_completo = $_POST['nombre_completo'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $contraseña = $_POST['contraseña'];
    $edad = $_POST['edad'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $email = $_POST['email'];
    $url_personal = $_POST['url_personal'];
    $ip_equipo = $_POST['ip_equipo'];
    $hobbies = $_POST['hobbies'];
    $recibir_info = isset($_POST['recibir_info']) ? "Sí" : "No";
    $sexo = $_POST['sexo'];
    $lenguas = implode(", ", $_POST['lenguas']);
    $curriculo_nombre = $_FILES['curriculo']['name'];
    $curriculo_tamaño = $_FILES['curriculo']['size'];

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
?>
