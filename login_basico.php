<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST["usuario"] === "usuario" and $_POST["clave"] === "1234"){
        header("Location: inicio.html");
    } else {
        $err = true;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Formulario de login</title>
        <meta charset="UTF-8">
    </head>
<body>
    <?php if(isset($err)){
        echo "<p> Revise usuario y contraseña</p>";
    }?>
    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        Usuario: <input name="usuario" type="text"><br><br>
        Contraseña: <input name="clave" type="password"><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>