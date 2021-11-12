<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Listín</title>
        <style>
            
            .error{
                color: red;
                font-weight: bold;
                padding-left: 10px;
                padding-right: 10px;
                border: 2px solid blue;
                position: absolute;
                top: 10px;
                right: 10px;
            }
            .correcto{
                color: blue;
                font-weight: bold;
                padding-left: 10px;
                padding-right: 10px;
                border: 2px solid blue;
                position: absolute;
                top: 10px;
                right: 10px;
            }
            .salida{
                border: 1px solid #000000;
                padding: 10px;
                margin: auto;
            }
            .entrada{
                
            }
        </style>
    </head>
<body>
    <h1>Listín Telefónico</h1>
    <?php 
    
    //Mi código
    //Para guardar un array hay que convertirlo en String con implode

    if (!isset($_POST['envio'])){
        $array=[];
    } else {
        $array= explode(",", $_POST['envio']);
    }
    
    function aniadir($nom,$tel, &$arr){ //De esta forma se añade el nombre y número al array

        if (count($arr)==1){
            $arr[0]=$nom;
            $arr[1]=$tel;
        } else {
            $arr[count($arr)]=$nom;
            $arr[count($arr)]=$tel;
        }
        echo '<div class="correcto"><p>Datos añadidos</p></div>';    //Salida de texto
    }
    
    function actualizar($nom,$tel, &$arr){  //Esta función comprueba si el nombre introducido existe y luego decide si llamar la función anterior o actualizar el número
        $hecho=false;
        for ($i=0; $i<count($arr); $i++){
            if ($arr[$i]==$nom){
                $arr[$i+1]=$tel;
                $hecho=true;
            }
        }
        if ($hecho){
            echo '<div class="correcto"><p>Teléfono cambiado</p></div>';    //Salida de texto
        } else {
            aniadir($nom, $tel, $arr);
        }
    }
    
    function eliminar($nom, &$arr){ //Esta función, al introducir un único valor comprueba si existe el nombre y lo borra, si no existe muestra un texto
        $hecho=false;
        for ($i=0; $i<count($arr); $i++){
            if ($arr[$i]==$nom){
                array_splice($arr, $i);
                array_splice($arr, $i+1);
                $hecho=true;
            }
        }
        if ($hecho){
            echo '<div class="correcto"><p>Dato eliminado</p></div>';    //Salida de texto
        } else {
            echo '<div class="error"><p>Falta el teléfono</p></div>'; //Salida de texto
        }
    }
    
    function mostrar(&$arr){    //Esta función muestra la tabla
        echo '<table class="salida">';
        echo '<thead>';
        echo '<tr class="salida"><th>Nombre</th><th>Teléfono</th></tr>';
        echo "</thead>";
        echo "<tbody>";
        for ($i=0;$i<count($arr);$i+=2){
            echo '<tr><td>'.$arr[$i].'</td>';
            echo '<td>'.$arr[$i+1].'</td></tr>';
        }
        echo "</tbody>";
        echo "</table>";
    }




    if (!empty($_POST['nombre']) && !empty($_POST['telefono'])){    //Comprueba la cantidad de parámetros y ejecuta una de 2 funciones o un mensaje de error
        actualizar($_POST['nombre'],$_POST['telefono'],$array);
    } else if (!empty($_POST['nombre'])) {
        eliminar($_POST['nombre'],$array);
    } else {
        echo '<div class="error"><p>No ha introducido datos</p></div>';    //Salida de texto
    }
    
    if (count($array)>0){
        mostrar($array);
    }
    ?>
    <form name="formulario" action = "<?php $_SERVER["PHP_SELF"] ?>" method="POST">
        <table class="entrada" style="border= 0px;">
            <tr>Introduzca los datos a añadir al listado
                <td>
                    <fieldset>
                        <legend>Nombre</legend>
                        <input name="nombre" type="text"/>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                        <legend>Teléfono</legend>
                        <input name="telefono" type="text"/>
                    </fieldset>
                </td>
            </tr>
        </table>
        <input type="hidden" name="envio" value="<?php echo $arraytexto=implode(",", $array); ?>">
        <input type="submit" value="Aplicar cambios">
    </form>
</body>
</html>