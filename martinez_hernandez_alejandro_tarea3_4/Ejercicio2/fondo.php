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
            setcookie("color", $color, time() + (86400 * 30), "/");
        } else {
            //Si no hay post, mira en la cookie y cambia el color acorde a la cookie
            if (isset($_COOKIE["color"])){
                $color=$_COOKIE["color"];
                cambiafondo($color);
                unset($_COOKIE["color"]);
            
            } else {
                $color="white";
                echo 'bgcolor="white"'; //Si no hay cookie, el color de fondo será blanco
            }
        }
        setcookie("color", $color, time() + (86400 * 30), "/");
    ?>>
        <br>
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
            <select name="color" id="color" multiple required="required">
                <option value="rojo">Rojo</option>
                <option value="verde">Verde</option>
                <option value="azul">Azul</option>
                <option value="amarillo">Amarillo</option>
                <option value="blanco">Blanco</option>
            </select>
            <br>
            <button name="enviar" id="enviar" value="true">Enviar</button>
        </form>
    </body>
</html>