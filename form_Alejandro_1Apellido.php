<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tabla Alumnos</title>
    </head>
<body>
    <?php 
    
    if (!isset($_POST['envio'])){
        $array=[];
    } else {
        $array= explode(",", $_POST['envio']);
    }
    
    function aniadir($nom,$ap1, $ap2,$em, $fnac, &$arr){ 

        if (count($arr)==1){
            $arr[0]=$nom;
            $arr[1]=$ap1;
            $arr[2]=$ap2;
            $arr[3]=$em;
            $arr[4]=$fnac;
        } else {
            $arr[count($arr)]=$nom;
            $arr[count($arr)]=$ap1;
            $arr[count($arr)]=$ap2;
            $arr[count($arr)]=$em;
            $arr[count($arr)]=$fnac;
        }
        echo '<div class="correcto"><p>Datos añadidos</p></div>'; 
    }
    
    function mostrar(&$arr){    //Esta función muestra la tabla
        echo '<table class="salida">';
        echo '<thead>';
        echo '<tr class="salida"><th>Nombre</th><th>Teléfono</th></tr>';
        echo "</thead>";
        echo "<tbody>";
        echo "<tr>";
        for ($i=0;$i<count($arr);$i++){
            echo '<td>'.$arr[$i].'</td>';
        }
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
    }




    if (!empty($_POST['apellido2'])){    //Comprueba la cantidad de parámetros y ejecuta una de 2 funciones o un mensaje de error
        actualizar($_POST['nombre'],$_POST['apellido1'],$_POST['apellido2'],$_POST['email'],$_POST['fnac'],$array);
    } else if (!empty($_POST['nombre'])) {
       actualizar($_POST['nombre'],$_POST['apellido1'],"-",$_POST['email'],$_POST['fnac'],$array);
    } else {
        echo '<div class="error"><p>No ha introducido datos</p></div>';    //Salida de texto
    }
    
    if (count($array)>0){
        mostrar($array);
    }
    ?>
    <div>
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required="required"><br>
        <label for="apellido1">Apellido1:</label><br>
        <input type="text" id="apellido1" name="apellido1" required="required"><br><br>
        <label for="apellido2">Apellido2:</label><br>
        <input type="text" id="apellido2" name="apellido2"><br><br>
        <label for="email">E-mail: </label><br>
        <input type="text" id="email" name="email" required="required"><br><br>
        <label for="fnac">fNac: </label><br>
        <input type="date" id="fnac" name="fnac"><br><br>
        <br>
        <input type="hidden" name="envio" value="<?php echo $arraytexto=implode(",", $array); ?>">
        <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>