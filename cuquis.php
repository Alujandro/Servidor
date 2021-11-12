<?php
if(!isset($_COOKIE['idioma'])){
    setcookie('idioma',$_POST['lengua'],time()+3600*24);
    $idioma=$_POST['lengua'];
} else {
    if ($_POST['lengua']=="1" || $_POST['lengua']=="2"){
        $idioma= (int) $_POST['lengua'];
    } else {
        $idioma = (int) $_COOKIE['idioma'];
    }
    setcookie('idioma',$idioma,time()*3600*24);
}

if ($idioma==1){
    echo "Bienvenido";
} else if ($idioma==2){
    echo "Wellcome";
} else {
    echo "Bienvenido";
}