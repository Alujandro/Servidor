<?php

define("CADENA_CONEXION", 'mysql:dbname=pedidos;host=127.0.0.1');
define("USUARIO_CONEXION", 'root');
define("CLAVE_CONEXION", '');

function consulta_categorias(){
    try{
        $bd=new PDO (CADENA_CONEXION, USUARIO_CONEXION, CLAVE_CONEXION);
        $ins= "SELECT * FROM categoria";
        $resul= $bd->query($ins);
        
        $categorias=[];
        while ($row=$resul->fetch()){
            array_push($categorias, $row);
            $json= json_encode($categorias);
        }
        echo $json;
    } catch (Exception $e) {
        echo "Error con la base de datos: ".$e->getMessage();
    }
}

consulta_categorias();