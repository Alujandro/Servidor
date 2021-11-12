<?php

    if (isset($_POST["usuario"]) && isset($_POST["password"])){
        if ($_POST["usuario"]==="usuario" && $_POST["password"]==="usuario"){
            session_start();
            $_SESSION["log"]="si";
            header("Location: peliculas.php");
        } else {
            header("Location: index.html");
        }
    } else {
        header("Location: index.html");
    }

?>

