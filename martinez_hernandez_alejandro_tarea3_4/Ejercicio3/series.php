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
                <td>Serie 1:</td><td>House</td>
            </tr>
            <tr>
                <td>Serie 2:</td><td>Lost</td>
            </tr>
            <tr>
                <td>Serie 3:</td><td>Hércules</td>
            </tr>
        </table>
        <a href="peliculas.php"><p>Peliculas</p></a>
        <a href="logout.php"><p>Salir</p></a>
        </div>
    </body>
</html>