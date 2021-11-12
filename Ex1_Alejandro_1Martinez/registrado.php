<!DOCTYPE html>
<?php 
session_start();
    if (isset($_SESSION["log"])){
        if (!$_SESSION["log"]==="si"){
            session_destroy();
            header("Location: index.php");
        }
    } else {
        header("Location: index.php");
    }
?>
<html>
    <head>
        <title>Sesión iniciada</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
        <?php
        function imprimearray($arr){
            echo "<table>";
            echo '<tr><td>'.$_SESSION["usuario"].'</td></td>';
            echo "<tr><td>Equipo favorito</td><td>Deporte favorito</td></td><td>Marca</td><td>Modelo</td></tr>";
            echo "<tr>";
            for ($i=0; $i<count($arr); $i++){
                echo "<td>$arr[$i]</td>";
            }
            echo "</td>";
            echo "</table>";
        }


        $array1= ["Equipo 1","Deporte 1","Marca 1","Modelo 1"];
        $array2= ["Equipo 2","Deporte 2","Marca 2","Modelo 2"];
        $array3= ["Equipo 3","Deporte 3","Marca 3","Modelo 3"];
        echo "<p>Bienvenido ".$_SESSION["usuario"]."</p>";
        if ($_SESSION["usuario"]==="usuario"){
            imprimearray($array1);
        }
        if ($_SESSION["usuario"]==="usuario2"){
            imprimearray($array1);
        }
        if ($_SESSION["usuario"]==="usuario3"){
            imprimearray($array1);
        }
        
        ?>
        <a href="index.php"><p>Acceder</p></a>
        <a href="logout.php"><p>Salir</p></a>
        </div>
    </body>
</html>