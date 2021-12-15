<?php
define("CADENA_CONEXION", 'mysql:dbname=pedidos;host=127.0.0.1');
define("USUARIO_CONEXION", 'root');
define("CLAVE_CONEXION", '');

function consulta_productos(){
    try{
        $bd=new PDO(CADENA_CONEXION, USUARIO_CONEXION, CLAVE_CONEXION);
        $ins="SELECT * FROM productos";
        $resul= $bd->query($ins);
        
        $productos=[];
        while ($row=$resul->fetch()){
            array_push($productos, $row);
            $json=json_encode($productos);
        }
        echo $json;
    } catch (PDOException $e) {
        echo 'Error con la base de datos: '.$e->getMessage();
    }
}

consulta_productos();