<?php

session_start();
if (isset($_SESSION["hola"])) {
    echo $_SESSION["hola"];
} else {
    $_SESSION["hola"] = "Hola Mundo";
}
