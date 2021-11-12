<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Semana</title>
    </head>
<body>
    <h1>Cadenas Alejandro</h1>
    <p>
        <?php
if (isset($_GET['nombre'])){
    $nombre=$_GET['nombre'];
} else {
    $nombre="Alejandro";
}

$nombre=trim($nombre,"/");

echo $nombre."<br>";
echo "Longitud: ".strlen($nombre)."<br>";
echo strtoupper($nombre)."<br>";
echo strtolower($nombre)."<br>";

if (isset($_GET['prefijo'])){
    $prefijo=$_GET['prefijo'];
    if (strpos($nombre, $prefijo)){
        echo "$nombre empieza por $prefijo"."<br>";
    }
}

echo substr_count(strtolower($nombre),'a')."<br>";

if (substr_count(strtolower($nombre),'a')>0){
    echo stripos(strtolower($nombre),'a')."<br>";
} else {
    echo "El nombre no contiene la letra a"."<br>";
}

$nombre= strtolower($nombre);
$nombre= str_replace('o', '0', $nombre);
$nombre= ucfirst($nombre);
echo $nombre."<br>";

$url='http://username:password@hostname:9090/path?arg=value';
echo parse_url($url, PHP_URL_SCHEME)."<br>";
echo parse_url($url, PHP_URL_USER)."<br>";
echo parse_url($url, PHP_URL_PATH)."<br>";
echo parse_url($url, PHP_URL_QUERY)."<br>";

?>
    </p>

</body>
</html>