<?php
require_once 'sesiones.php';
comprobar_sesion();
$cod=$_POST['cod'];
$unidades=(int)$_POST['unidades'];
$cate=$_POST['cat'];    //Guardamos la categoría que recibimos por el $_POST
if(isset($_SESSION['carrito'][$cod])){
    $_SESSION['carrito'][$cod]+=$unidades;
} else {
    $_SESSION['carrito'][$cod]=$unidades;
}
header("Location: productos.php?categoria=$cate"); //Modificado para que redirija a la categoría que se le pasa
