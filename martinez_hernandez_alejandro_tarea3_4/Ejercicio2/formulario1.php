<!DOCTYPE html>
<html>
    <head>
        <title>Formulario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="estilo.css" />
    </head>
    <body>
        <div>
            <form action="formulario2.php" method="post">
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" required="required"><br>
            <label for="apellidos">Apellidos:</label><br>
            <input type="text" id="apellidos" name="apellidos" required="required"><br><br>
            <label for="email">E-mail: </label><br>
            <input type="text" id="email" name="email" required="required"><br><br>
            <label for="url">URL: </label><br>
            <input type="text" id="url" name="url"><br><br>
            
            <input type="radio" id="hombre" name="sexo" value="Hombre" required>
            <label for="hombre">Hombre</label><br>
            <input type="radio" id="mujer" name="sexo" value="Mujer">
            <label for="mujer">Mujer</label><br>
            <input type="radio" id="otro" name="sexo" value="Otro">
            <label for="otro">Otro</label>
            
            <input type="submit" value="Siguiente">
            </form>
        </div>
    </body>
</html>
