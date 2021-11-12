<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Salario</title>
        <style>
            h1{
                margin-left: 10px;
                color: green;
                font-style: italic;
                font-family: monospace;
            }
            .salida{
                color: darkred;
                font-weight: bold;
            }
            .entrada{
                margin-left: 10px;
            }
        </style>
    </head>
<body>
    <h1>Cálculo de salario</h1>
    <?php 
    $nombre=null;
    $apellidos=null;
    $salario=null;
    $edad=null;
    $mensaje=null;
    
    if (!isset($_POST["nombre"])){
    } else if (!isset($_POST["apellidos"])) {
    } else if (!isset($_POST["salario"])){
    } else if (!isset($_POST["edad"])){
    } else {
        $nombre=$_POST["nombre"];
        $apellidos=$_POST["apellidos"];
        $salario=$_POST["salario"];
        $edad=$_POST["edad"];
    }
    
    if ($salario<2000){
        if ($salario<1000){
            if ($edad>45){
                $salario=$salario*1.1;
            } else if ($edad>30) {
                $salario=$salario*1.05;
            } else {
                $salario=1100;
            }
        } else {
            if ($edad>45){
                $salario=$salario*1.03;
            } else {
                $salario=$salario*1.1;
            }
        }
    }
    
    ?>
 <div class="entrada">
    <form name="formulario" action = "<?php $_SERVER["PHP_SELF"] ?>" method="POST">
        <table style="border= 0px;">
            <tr>Introduzca los datos del empleado
                <td>
                    <fieldset>
                        <legend>Nombre</legend>
                        <input name="nombre" type="text"/>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                        <legend>Apellidos</legend>
                        <input name="apellidos" type="text"/>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                        <legend>Salario</legend>
                        <input name="salario" type="number" step="any"/>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                        <legend>Edad</legend>
                        <input name="edad" type="number"/>
                    </fieldset>
                </td>
            </tr>
        </table>
        <input type="submit" value="Aplicar cambios">
        <?php 
        
        if ($nombre!=null){
            $mensaje='<div class="salida"><p>El salario de '.$nombre." ".$apellidos." será de ".$salario."€</p></div>"; 
        }
        if ($mensaje!=null){
            echo '<div class="salida"><p>'.$mensaje."</p></div>";
        }
        ?>
    </form>
</div>
</body>
</html>