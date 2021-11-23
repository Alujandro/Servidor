<?php

session_start();
session_destroy();
header("Location: login.php");

//Mejorar añadiendo un aviso de haber cerrado la sesión y, posiblemente, añadir una cookie que te pueda guardar el carrito de la compra, aunque no debería hacerlo
?>
