<!DOCTYPE html>
<?php 
session_start();
    if (isset($_SESSION["log"])){
        if (!$_SESSION["log"]==="si"){
            session_destroy();
            header("Location: index.html");
        }
    } else {
        header("Location: index.html");
    }
?>
<html>
    <head>
        <title>Inicio de sesión</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="estilo.css" />
    </head>
    <body>
        <div>
        <table>
            <tr>
                <td>Película 1:</td><td>Mars Attack</td>
            </tr>
            <tr>
                <td>Película 2:</td><td>El Caballero Negro</td>
            </tr>
            <tr>
                <td>Película 3:</td><td>Cuando Ruge la Marabunta</td>
            </tr>
        </table>
        <a href="series.php"><p>Series</p></a>
        <a href="logout.php"><p>Salir</p></a>
        </div>
    </body>
</html>