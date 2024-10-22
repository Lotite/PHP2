<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
</head>
<body>
    <form action="agente.php" method="post" enctype="multipart/form-data">
        <label for="nombre_completo">Nombre Completo:</label>
        <input type="text" id="nombre_completo" name="nombre_completo"><br>

        <label for="nombre_usuario">Nombre de Usuario: (*)</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" ><br>

        <label for="contraseña">Contraseña: (*)</label>
        <input type="password" id="contraseña" name="contraseña" ><br>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad"><br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"><br>

        <label for="email">Email: (*)</label>
        <input type="email" id="email" name="email" ><br>

        <label for="url_personal">URL de la Página Personal:</label>
        <input type="url" id="url_personal" name="url_personal"><br>

        <label for="ip_equipo">IP del Equipo:</label>
        <input type="text" id="ip_equipo" name="ip_equipo"><br>

        <label for="hobbies">Descripción de los Hobbies:</label>
        <textarea id="hobbies" name="hobbies"></textarea><br>

        <label for="recibir_info">Recibir Información:</label>
        <input type="checkbox" id="recibir_info" name="recibir_info"><br>

        <label>Sexo: (*)</label>
        <input type="radio" id="hombre" name="sexo" value="hombre" >
        <label for="hombre">Hombre</label>
        <input type="radio" id="mujer" name="sexo" value="mujer" >
        <label for="mujer">Mujer</label><br>

        <label for="lenguas">Lenguas Extranjeras:</label>
        <select id="lenguas" name="lenguas[]" multiple>
            <option value="ingles">Inglés</option>
            <option value="frances">Francés</option>
            <option value="aleman">Alemán</option>
            <option value="italiano">Italiano</option>
            <option value="chino">Chino</option>
        </select><br>

        <label for="curriculo">Currículo:</label>
        <input type="file" id="curriculo" name="curriculo"><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
