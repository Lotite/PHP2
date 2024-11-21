<?php 
include 'datos.php'; // Incluye el array de cursos
include 'funciones.php'; // Incluye la función filtrarCursos


 $cursos_filtrados = array(); //Array que contrenda los cursos a mostrar.

//Si es la primera vez que se envía el formulario - MOSTRAMOS TODOS LOS CURSOS
if(!isset($_REQUEST['filtrar'])){
   //COMPLETAR
   $cursos_filtrados = $cursos;

} else {
    //Si se ha pulsado filtrar, obtenemos los valores de los filtros - MOSTRAMOS LOS CURSOS FILTRADOS
    //Un curso se incluirá si se cumplen todos los filtros o si no hay filtros, mostramos todos los cursos.
    //Si en un filtro escrito nada, este se considera como un filtro nulo y no se tendría en cuenta para seleccionar el curso.
    //Por ejemplo: si el nombre es 'PHP' y la fecha de inicio es '2022-01-01', se seleccionarán todos los cursos que contengan 'PHP' en nombre 
    //y cuya fecha sea mayor que la indicada. 
    //Pero para el filtro horas_min no aplicaremos ningún valor, si tomasemos por defecto 0 horas cuando 

    // echo "<pre>Request";
    // print_r($_REQUEST);
    // echo "</pre>Request";
    foreach($cursos as $curso){
        if(filtrarCursos($curso,$_REQUEST["nombre"],$_REQUEST["horas_min"],$_REQUEST["fecha_inicio"])){
            $cursos_filtrados[] = $curso;
        }
    }
    //COMPLETAR

   //Si hay algún filtro, filtramos los cursos según los parámetros, haciendo uso de la función filtrarCursos y los añadimos en el array $cursos_filtrados.    
   //COMPLETAR 
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Filtrar Cursos</title>
</head>
<body>
    <h1>Listado de Cursos</h1>

    <!-- Formulario de filtros -->
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']?>">
        <label for="nombre">Nombre del curso:</label>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($_GET['nombre'] ?? '') ?>">
        <br>

        <label for="horas_min">Horas mínimas:</label>
        <input type="number" id="horas_min" name="horas_min" value="<?= htmlspecialchars($_GET['horas_min'] ?? '') ?>">
        <br>

        <label for="fecha_inicio">Fecha prevista de inicio (mínima):</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?= htmlspecialchars($_GET['fecha_inicio'] ?? '') ?>">
        <br>

        <input type="submit" name="filtrar" value="Filtrar">
    </form>

    <hr>
 
        <!-- Listado de cursos filtrados -->
        <h2>Resultados:</h2>
        <ul type="square">
        <?php 
        // Mostrar los resultados filtrados
        if (!empty($cursos_filtrados)) {
            foreach ($cursos_filtrados as $curso) {
                echo "<li>{$curso['nombre']} - {$curso['horas']} horas - {$curso['fecha_inicio']}</li>";
            }
        } else {
            echo "<li>No se encontraron cursos con los filtros seleccionados.</li>";
        }
        ?>
    </ul>
</body>
</html>

