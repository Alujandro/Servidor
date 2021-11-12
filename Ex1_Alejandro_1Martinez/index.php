<!DOCTYPE html>
<?php

if (isset($_POST["usuario"]) && isset($_POST["password"])){
        if (($_POST["usuario"]==="usuario" && $_POST["password"]==="usuario") || $_POST["usuario"]==="usuario2" && $_POST["password"]==="usuario2" || $_POST["usuario"]==="usuario3" && $_POST["password"]==="usuario3"){
            session_start();
            $_SESSION["log"]="si";
            $_SESSION["usuario"]=$_POST["usuario"];
            $_SESSION["visita"]= time();
            if (isset($_POST["recordar"])){
                $user=$_POST["usuario"];
                setcookie("usuario", $user, date(time()) + (86400 * 90), "/");//Cookie válida por 90 días
                $_COOKIE["contraseña"]=$_POST["password"];
            }
            
            header("Location: registrado.php");
        } else {
            //Usuario usuario
    }
}
if (isset($_COOKIE["usuario"])){
        if ($_COOKIE["usuario"]==="usuario" && $_COOKIE["contraseña"]==="usuario"){
            session_start();
            $_SESSION["log"]="si";
            $_SESSION["usuario"]=$_COOKIE["usuario"];
            $_SESSION["visita"]= time();
            header("Location: registrado.php");
        }
    }
    //Usuario usuario2
    if (isset($_COOKIE["usuario"])){
        if ($_COOKIE["usuario"]==="usuario2" && $_COOKIE["contraseña"]==="usuario2"){
            session_start();
            $_SESSION["log"]="si";
            $_SESSION["usuario"]=$_COOKIE["usuario"];
            $_SESSION["visita"]= time();
            header("Location: registrado.php");
        }
    }
    //Usuario usuario3
    if (isset($_COOKIE["usuario"])){
        if ($_COOKIE["usuario"]==="usuario3" && $_COOKIE["contraseña"]==="usuario3"){
            session_start();
            $_SESSION["log"]="si";
            $_SESSION["usuario"]=$_COOKIE["usuario"];
            $_SESSION["visita"]= time();
            header("Location: registrado.php");
        }
}  else {
    if (isset($_POST["recordar"])){
        $user=$_POST["usuario"];
        setcookie("usuario", $user, date(time()) + (86400 * 90), "/");//Cookie válida por 90 días
        $_COOKIE["contraseña"]=$_POST["password"];
    }
} 

?>
<html>
    <head>
        <title>Index</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
    <body>
        <div>
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label for="usuario">Usuario: </label><br>
            <input type="text" id="usuario" name="usuario" required="required"><br>
            <label for="password">Contraseña: </label><br>
            <input type="password" id="password" name="password" required="required"><br><br>
            <input type="checkbox" id="recordar" name="recordar" value="si">
            <label for="recordar">recordarme</label><br> 
            <input type="submit" value="Enviar">
         </form>
        </div>
    </body>
</html>