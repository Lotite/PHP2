<?php
session_start();
if (!is_numeric($_SESSION["id"])){
    header("location: ./index.php");
}

if(isset($_POST["closeSession"])){
    session_destroy();
    header("location: ./index.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>

<body>
    <h1>
        <?php echo "Hola $_SESSION[user]"; ?>
        <form method="post">
            <input type="submit" name="closeSession" value="cerrar sesion">
        </form>
    </h1>
</body>

</html>


