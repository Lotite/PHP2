<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registrarte</title>
</head>

<body>
   <div class="colum">
      <h1>Iniciar Sesion</h1>
      <?php
      include 'iniciarBase.php';
      if (isset($_POST["registrar"])) {
         if(crearUsuario($bd, "usuarios")){
            header("location: index.php");
            echo "usuario Creado";
            $_SESSION["creado"] = true;
         }
      }
      ?>
      <form method="POST">
      <input type="text" name=user placeholder="Usuario" required pattern="[A-Za-z0-9]+"><br>
      <input type="text" name=nombre placeholder="Nombre" required pattern="[A-Za-z]+"><br>
      <input type="text" name=apellido placeholder="Apellido" required pattern="[A-Za-z]+"><br>
         <input type="password" name=pass placeholder="Contraseña" required pattern="[A-Za-z0-9]+"><br>
         <input type="password" name=pass placeholder="Confirmar" required pattern="[A-Za-z0-9]+"><br>
         <input type="email" name=email placeholder="email" required><br>
         <input type="submit" name="registrar" value="registrar">
         </from>
         <a href="index.php">Iniciar session</a>
   </div>
</body>

</html>