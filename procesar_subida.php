<?php
$tam=$_FILES["fichero"]["size"];
if($tam>256*1024){
    echo "<br>Demasiado grande";
    return;
    
}
echo "Nombre del fichero: ".$FILES["fichero"["name"]];
echo "<br>Nombre temporal del fichero en el del servidor: ".$_FILES["fichero"]["tmp_name"];
$res=move_uploaded_file($FILES["fichero"]["tmp_name"],"/var/www/html".$_FILES["fichero"]["name"]);
if($res){
    echo '<br>Fichero guardado';
} else {
    echo '<br>Error';
}
?>

