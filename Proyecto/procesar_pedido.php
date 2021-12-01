<?php
require 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pedidos</title>
    </head>
    <body>
        <?php
        require 'cabecera.php';
        $resul=insertar_pedido($_SESSION['carrito'],$_SESSION['usuario']);
        if ($resul===false){
            echo "No se ha podido realizar el pedido<br>";
        } else {
            echo "Pedido realizado con éxito.";
            $_SESSION['carrito']=[];
        }
        ?>
    </body>
</html>

