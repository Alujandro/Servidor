<html>
    <head>
        <title>Nº de visita</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>
<?php
if ($_POST["reiniciar"]){
        unset($_COOKIE["visitas"]);
} 
if (isset($_COOKIE["visitas"])){
    $visita=$_COOKIE["visitas"]+1;
    echo 'Esta es su visita número '.$visita;  
    
} else {
    echo 'Bienvenido por primera vez a esta nuestra página web'; 
    $visita=1;
}
setcookie("visitas", $visita, time() + (86400 * 30), "/");
?>
            <br>
            <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
                <button name="reiniciar" id="reiniciar" value="true">Reiniciar Contador</button>
            </form>

        </h1>
    </body>
</html>