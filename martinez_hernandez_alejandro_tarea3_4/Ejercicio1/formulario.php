<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Resultado del formulario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <table>
            <tr>
                <td>Nombre: </td><?php echo '<td>'.$_POST["nombre"].'<td>'; ?>
            </tr>
            <tr>
                <td>Apellidos: </td><?php echo '<td>'.$_POST["apellidos"].'<td>'; ?>
            </tr>
            <tr>
                <td>Email: </td><?php echo '<td>'.$_POST["email"].'<td>'; ?>
            </tr>
            <tr>
                <td>URL: </td><?php echo '<td>'.$_POST["url"].'<td>'; ?>
            </tr>
            <tr>
                <td>Sexo: </td><?php echo '<td>'.$_POST["sexo"].'<td>'; ?>
            </tr><tr>
                <td>Nº de convivientes: </td><?php echo '<td>'.$_POST["convivientes"].'<td>'; ?>
            </tr>
            <tr>
                <td>Aficiones: </td><td>
                    <?php
                    $arr=[];
                    if (isset($_POST["clarinete"])){
                        array_push($arr,"Tocar el clarinete");
                    }
                    if (isset($_POST["pesca"])){
                        array_push($arr,"La pesca");
                    }
                    if (isset($_POST["jardin"])){
                        array_push($arr,"La jardinería");
                    }
                    if (isset($_POST["danza"])){
                        array_push($arr,"La danza interpretativa");
                    }
                    
                    for ($i=0; $i<count($arr); $i++){
                        if (count($arr)>1){
                            if ($i==count($arr)-1){
                                echo " y ".strtolower($arr[$i]);
                            } elseif ($i==0) {
                                echo $arr[$i];
                            } else {
                                echo ", ".strtolower($arr[$i]);
                            }
                        } else {
                            echo $arr[$i];
                        }
                    }
                    echo ".";
                    ?>
                </td>
            </tr>
            <tr>
                <td>Menú favorito:</td><?php echo '<td>'.$_POST["menu"].'<td>'; ?>
            </tr>
        </table>
    </body>
</html>


