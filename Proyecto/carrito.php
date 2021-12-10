<?php
require 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Carrito de la compra</title>
    </head>
    <body>
        <?php
        require 'cabecera.php';
        $productos=cargar_productos(array_keys($_SESSION['carrito']));
        if($productos===false){
            echo "<p>No hay productos en el pedido</p>";
            exit;
        }
        echo "<h2>Carrito de la compra</h2>";
        echo "<table>";
        echo "<tr><th>Nombre</th><th>Descripción</th><th>Peso</th><th>Unidades</th><th>Eliminar</th></tr>";  
        $lista=0;
        foreach($productos as $producto){
            $cod=$producto['CodProd'];
            $nom=$producto['Nombre'];
            $des=$producto['Descripcion'];
            $peso=$producto['Peso'];
            $unidades=$_SESSION['carrito'][$cod];
            echo "<tr><td>$nom</td><td>$des</td><td>$peso</td><td>$unidades</td>"
                . "<td><form action='eliminar.php' method='POST'>"
                . "<div class='rangeslider'>"
                . "<input name='unidades' type='range' min='1' max='$unidades' value='1' class='slider' id='deslizable$lista'>"
                . "<input type='submit' value='Eliminar'> <span id='canti$lista'></span>"
                . "</div>"
                . "<input name='cod' type='hidden' value='$cod'>"
                . "</form></td></tr>"
                . "<script>
                    var desl = document.getElementById('deslizable$lista');
                    var salida$lista = document.getElementById('canti$lista');
                    salida$lista.innerHTML = desl.value;
  
                    desl.oninput = function() {
                    salida$lista.innerHTML = this.value;
                    }
                  </script>";
            $lista++;
                     
        }
        echo "</table>";
        ?>
        <hr>
        <a href="confirmar_pedido.php">Realizar pedido</a>
    </body>
</html>