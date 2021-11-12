<!DOCTYPE html>
<html>
    <head>
        <title>Formulario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="estilo.css" />
    </head>
    <body>
        <?php 
        if (isset($_SESSION["nombre"])){
          session_destroy();
          session_start();
        } else {
            session_start();
        }
            
            $_SESSION["nombre"]=$_POST["nombre"];
            $_SESSION["apellidos"]=$_POST["apellidos"];
            $_SESSION["email"]=$_POST["email"];
            $_SESSION["url"]=$_POST["url"];
            $_SESSION["sexo"]=$_POST["sexo"];
            
        
        ?>
        <div>
            <form action="formulario3.php" method="post">
            <label for="convivientes">Nº de convivientes: </label><br>
            <input type="number" id="convivientes" name="convivientes" required="required"><br><br>
            
            <input type="checkbox" id="clarinete" name="clarinete" value="Tocar el clarinete">
            <label for="clarinete">Tocar el clarinete</label><br>
            <input type="checkbox" id="pesca" name="pesca" value="Pescar">
            <label for="pesca">Pescar</label><br>
            <input type="checkbox" id="jardin" name="jardin" value="La jardinería">
            <label for="jardin">La jardinería</label><br> 
            <input type="checkbox" id="danza" name="danza" value="Danza interpretativa">
            <label for="danza">Danza interpretativa</label><br> 
            
            <label for="menu">Menú favorito: </label>
            <select name="menu" id="menu" multiple required="required">
                <option value="Carne">Carne</option>
                <option value="Pescado">Pescado</option>
                <option value="Marisco">Marisco</option>
                <option value="Verdura">Verdura</option>
            </select>
            <br>
            <input type="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>
