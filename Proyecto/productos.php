<?php
require 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tabla de productos por categoría</title>
    </head>
    <body>
        <?php
        require 'cabecera.php';
        $categorias=cargar_categoria($_GET['categoria']);
        $productos=cargar_productos_categoria($_GET['categoria']);
        if($categorias===false or $productos===false){
            echo "<p class='error'>Error al conectar con la base de datos</p>";
            exit;
        }
        foreach ($categorias as $cat){
            echo "<h1>". $cat['nombre']."</h1>";
            echo "<p>". $cat['descripcion']."</p>";
            echo "<table>";
            echo "<tr><th>Nombre</th><th>Descripción</th><th>Peso</th><th>Stock</th><th>Comprar</th></tr>";
            $lista=0;
            foreach($productos as $producto){
                $cod=$producto['CodProd'];
                $nom=$producto['Nombre'];
                $des=$producto['Descripcion'];
                $peso=$producto['Peso'];
                $unidades=$_SESSION['carrito'][$cod];
                $stock=$producto['Stock']-$unidades; //Esta parte evita que se puedan escoger más productos de los que hay
                //He decidido cambiar el formulario para añadir al carro de la compra por una barra deslizante (también para eliminar en el carro)
                //El principal problema de este método es que para poner números precisos cuando el stock es alto puede ser molesto o difícil, pero te permite
                //Hacer una elección de una forma rápida e intuitiva únicamente con el ratón, y para números más precisos, con el teclado se puede ajustar de uno en uno.
                echo "<tr><td>$nom</td><td>$des</td><td>$peso</td><td>$stock</td>"
                . "<td><form action='anadir.php' method='POST'>"
                . "<div class='rangeslider'>" 
                . "<input name='unidades' type='range' min='1' max='$stock' value='1' class='slider' id='deslizable$lista'>"
                . "<input type='submit' value='Comprar'>"
                . " <span id='canti$lista'></span><input name='cod' type='hidden' value='$cod'>"
                . "</div>"
                . "<input name='cat' type='hidden' value='".$_GET['categoria']."'>"
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
        }
        echo "</table>";
        ?>
    </body>
</html>