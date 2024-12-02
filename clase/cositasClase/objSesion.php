<?php
class Persona{
    var $nombre;
    var $edad;
    function __construct($nom,$ed){
        $this->nombre=$nom;
        $this->edad=$ed;
    }
    function __toString(){
        return "Nombre: ".$this->nombre." Edad: ".$this->edad;
    }
}

session_start();
$persona= unserialize($_SESSION["persona"]?? serialize(new Persona("Anónimo",0)));

if($_POST){
    $persona= new Persona($_POST["nombre"],$_POST["edad"]);
    $_SESSION["persona"] = serialize($persona);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        Nombre: <input type="text" name="nombre" value="<?php echo $persona->nombre?>"><br>
        Edad: <input type="number" name="edad" value="<?php echo $persona->edad?>"><br>
        <button>Enviar</button>
    </form>
    <?php echo $persona?>
</body>
</html>

}