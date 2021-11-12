<?php

    if (isset($_POST["usuario"]) && isset($_POST["password"])){
        if (($_POST["usuario"]==="usuario" && $_POST["password"]==="usuario") || $_POST["usuario"]==="usuario2" && $_POST["password"]==="usuario2" || $_POST["usuario"]==="usuario3" && $_POST["password"]==="usuario3"){
            session_start();
            $_SESSION["log"]="si";
            $_SESSION["usuario"]=$_POST["usuario"];
            $_SESSION["visita"]= time();
            if (isset($_POST["recordar"])){
                $user=$_POST["usuario"];
                setcookie("usuario", $user, date(time()) + (86400 * 90), "/");//Cookie válida por 90 días
                $_COOKIE["contraseña"]=$_POST["password"];
            }
            
            header("Location: registrado.php");
        } else {
            //Usuario usuario
    if (isset($_COOKIE["usuario"])){
        if ($_COOKIE["usuario"]==="usuario" && $_COOKIE["contraseña"]==="usuario"){
            session_start();
            $_SESSION["log"]="si";
            $_SESSION["usuario"]=$_COOKIE["usuario"];
            $_SESSION["visita"]= time();
            header("Location: registrado.php");
        }
    } else {
        header("Location: index.php");
    }
    //Usuario usuario2
    if (isset($_COOKIE["usuario"])){
        if ($_COOKIE["usuario"]==="usuario2" && $_COOKIE["contraseña"]==="usuario2"){
            session_start();
            $_SESSION["log"]="si";
            $_SESSION["usuario"]=$_COOKIE["usuario"];
            $_SESSION["visita"]= time();
            header("Location: registrado.php");
        }
    }
    //Usuario usuario3
    if (isset($_COOKIE["usuario"])){
        if ($_COOKIE["usuario"]==="usuario3" && $_COOKIE["contraseña"]==="usuario3"){
            session_start();
            $_SESSION["log"]="si";
            $_SESSION["usuario"]=$_COOKIE["usuario"];
            $_SESSION["visita"]= time();
            header("Location: registrado.php");
        }
    }
            header("Location: index.php");
        }
    } else {
        header("Location: index.php");
    }

?>
