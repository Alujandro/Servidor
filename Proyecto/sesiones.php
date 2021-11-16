<?php

function comprobar_sesion(){
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("Location: login.php?redirigido=true");
    }
}
<<<<<<< HEAD
=======

>>>>>>> 13f9a24554bb47813b93f63ade27db5a70d09fbf
