<!DOCTYPE html>
<html>
    <head>
        <title>Formulario de login</title>
        <meta charset = "UTF-8">
        <link rel="stylesheet" href="./css/estilos.css">
        <script type = "text/javascript" src = "js/sesion.js"></script>
        <script type = "text/javascript" src = "js/cargarDatos.js"></script>
    </head>	
    <body>		
        <section id = "login">
            <form onsubmit="return login()" method = "POST">
                Usuario: <input id = "usuario" type = "text">			
                Clave: <input id = "clave" type = "password">					
                <input type = "submit">
            </form>
        </section>
        
        <section id = "principal" style="display:none">
            <header>
                <?php require 'cabecera_json.php'; ?>
            </header>
            <div id="manta">
                <h2 id = "titulo"></h2>
                <section id = "contenido"></section>
            </div>
            <aside id="mostraura">
                <table id="carroflotante">
                </table>
            </aside>
        </section>
        
    </body>
</html>
