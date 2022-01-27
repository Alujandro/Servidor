<?php	
    require_once 'sesiones_json.php';
    require_once 'bd.php';	
    if(!comprobar_sesion()) return;
    
    $categorias = cargar_categorias();  //Carga las categorías de la base de datos
    $cat_json = json_encode(iterator_to_array($categorias), true);  //Las convierte en un json
    echo $cat_json; //Devuelve el objeto json
