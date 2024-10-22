<?php
    session_start();
    $nums = 0;
    if($_POST){
        $nums = ($_SESSION["num"]?? 0) +  $_POST["numero1"];
       $_SESSION["num"] = $nums;
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
    <h1>Sumas array</h1>
    <form method="post">
    <input type="number" name="numero1">
    <button>Sumar</button>
    </form>
    <h1>suma es <?php echo $nums ?></h1>
</body>
</html>