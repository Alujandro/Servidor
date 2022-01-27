<?php
    require_once 'bd.php';
    /*formulario de login habitual
    si va bien abre sesión, guarda el nombre de usuario, y 
    si va mal, mensaje de error */
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usu = comprobar_usuario($_POST['usuario'], $_POST['clave']);   //Esto llama a la función que se encuentra en bd.php
        if($usu===FALSE){
            echo "FALSE";   //Dato que devuelve
        }else{
            session_start();
            // $usu tiene campos correo y codRes, correo 
            $_SESSION['usuario'] = $usu;
            $_SESSION['carrito'] = [];
            echo "TRUE";    //Dato que devuelve
        }	
    }