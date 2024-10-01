<?php
    include 'iniciarBase.php';
    if(isset($_POST["iniciar"])){
        $resultado = verificarDatos($bd,"usuarios");
        if($resultado){
           $_SESSION["id"] = $resultado["id"];
            $_SESSION["user"] = $resultado["user"];
        header("location: ./inicio.php");
        }else{
            echo "No existes cabron";
        }
    }


    ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
   <div class="colum">
    <h1>Iniciar Sesion</h1>
    <?php  if(isset($_SESSION["creado"])){ echo "tu cuenta a sido creada"; unset($_SESSION["creado"]);} ?>
   <form method="POST">
        <input type="text" name="user" placeholder="Usuario" required pattern="[A-Za-z]+">
        <input type="password" name="pass" placeholder="Contraseña" required pattern="[A-Za-z0-9]+">
        <input type="submit" name="iniciar" value="iniciar">
    </from>
    <a href="registrar.php">Registrarte</a>
   </div>
</body>

</html>