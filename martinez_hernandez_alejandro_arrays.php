<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Semana</title>
    </head>
<body>
    <h1>Arrays Alejandro</h1>
    <p>
        <?php
$nombres=["Alejandro","Ramón","Aarón","Francisca","Rosario","Segismunda","Dolores"];

echo count($nombres)."<br>";

$cadena=implode(" ", $nombres);

asort($nombres);
echo implode(" ", $nombres)."<br>";

echo implode(" ", array_reverse($nombres))."<br>";

echo "Alejandro se encuentra en la posición: ".array_search("Alejandro", $nombres)."<br>";

$alumnos=[];
$alumnos[0]=["1","Juana","39"];
$alumnos[1]=["2","Sam","8"];
$alumnos[2]=["3","Mateo","94"];

//Tabla
echo "<table>";
echo "<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Edad</th>
  </tr>";

for ($i=0; $i<count($alumnos); $i++){
    echo "<tr>";
    for ($j=0; $j<count($alumnos[$i]); $j++){
        echo "<td>";
        echo $alumnos[$i][$j];
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";
//Fin de tabla

$indexado=array_column($alumnos, 1);
echo implode(" ", $indexado)."<br>";

$arrSumar=[1,2,3,4,5,6,7,8,9,0];
echo array_sum($arrSumar);
?>
    </p>

</body>
</html>