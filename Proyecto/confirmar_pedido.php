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
        <h4>¿Seguro que desea realizar el pedido?</h4>
        <a href="procesar_pedido.php"><button>Confirmar</button></a>
        <a href="carrito.php"><button>Cancelar</button></a>
    </body>
</html>