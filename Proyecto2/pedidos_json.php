<?php	
    require_once 'sesiones_json.php';
    require_once 'bd.php';	
    if(!comprobar_sesion()) return;
    
    
    $categorias = cargar_pedidos($_SESSION['usuario']);  //Carga los pedidos de la base de datos y le pasamos el número del restaurante
    $cat_json = json_encode(iterator_to_array($categorias), true);  //Los convierte en un json
    
    echo $cat_json; //Devuelve el objeto json