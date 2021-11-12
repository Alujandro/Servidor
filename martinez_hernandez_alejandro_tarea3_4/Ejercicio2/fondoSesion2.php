<?php 
if (!isset(($_SESSION["color"]))){
    session_start();
} 
?>
<html>
    <head>
        <title>Color Fondo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body <?php
    
        //Función para cambiar el color de fondo
        function cambiafondo($col){
            if ($col=="rojo"){
                echo 'bgcolor="red"';
            }
            if ($col=="verde"){
                echo 'bgcolor="green"';
            }
            if ($col=="azul"){
                echo 'bgcolor="blue"';
            }
            if ($col=="amarillo"){
                echo 'bgcolor="yellow"';
            }
            if ($col=="blanco"){
                echo 'bgcolor="white"';
            }
        }

        //Primero se comprueba si recibe un post y lo guarda en una cookie
        if (isset($_POST["color"])){
            $color=$_POST["color"];
            cambiafondo($color);
            $_SESSION["color"]=$color;
        } else {
            //Si no hay post, mira en la cookie y cambia el color acorde a la cookie
            if (isset($_SESSION["color"])){
                $color=$_SESSION["color"];
                cambiafondo($color);
            
            } else {
                $color="white";
                echo 'bgcolor="white"'; //Si no hay cookie, el color de fondo será blanco
            }
        }
        $_SESSION["color"]=$color;
    ?>>
        <br>
        <form action="fondoSesion1.php" method="POST">
            <button type="submit" value="true" id="limpiar" name="limpiar">Limpiar Sesión</button>
        </form>
        <p><a href="fondoSesion1.php">Pulse aquí para volver a la página principal.</a></p>
    </body>
</html>