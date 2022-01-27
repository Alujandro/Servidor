var minicarro=[];
function cargarCategorias() {
    //Primero se crea el request al servidor
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                var cats =  JSON.parse(xhttp.responseText); //Añadir explicación de qué es esto
                //Se crea la lista y la va llenando con las categorías que recibe
                var lista = document.createElement("ul");			
                for(var i = 0; i < cats.length; i++){
                    var elem = document.createElement("li");
                    //Creamos los vínculos de cada categoría
                    var vinculo = document.createElement("a");
                    var ruta = "productos_json.php?categoria=" + cats[i].CodCat;
                    vinculo.href = ruta;
                    vinculo.innerHTML = cats[i].Nombre;
                    vinculo.onclick = function(){return cargarProductos(this);};
                    elem.appendChild(vinculo);
                    lista.appendChild(elem);
                }
                var contenido = document.getElementById("contenido");
                contenido.innerHTML = "";	
                var titulo = document.getElementById("titulo");
                titulo.innerHTML ="Categorías";
                contenido.appendChild(lista);
            }
        };
    updateCarro(true);
    xhttp.open("GET", "categorias_json.php", true); //La explicación está aquí, cats recibe la información que le pasa categorias_json.php y la usa
    xhttp.send();
    return false;
}

function cargarProductos(destino){
    var xhttp = new XMLHttpRequest();	
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {			
            var prod = document.getElementById("contenido");
            var titulo = document.getElementById("titulo");
            titulo.innerHTML ="Productos";
            try{
                var filas =  JSON.parse(this.responseText);
                // creamos una tabla con los productos de la categoría seleccionada
                var tabla = crearTablaProductos(filas);				
                prod.innerHTML = "";
                prod.appendChild(tabla);												
            }catch(e){
                var mensaje = document.createElement("p");
                mensaje.innerHTML = "Categoría sin productos";
                prod.innerHTML = "";
                prod.appendChild(mensaje);
            }					
        }
    };	
    updateCarro(true);
    xhttp.open("GET", destino, true);
    xhttp.send();
    return false;
}

//Esto es lo que tengo que hacer yo, el ecosistema está, ahora me falta que esto funcione
//Tendría que mostrar solo los pedidos del restaurante que mira
function cargarPedidos(){
    document.getElementById("titulo").innerHTML="Pedidos";
    var xhttp = new XMLHttpRequest();	
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {			
            var ped = document.getElementById("contenido");
            try{
                var filas =  JSON.parse(this.responseText);
                // creamos una tabla con los pedidos de la categoría seleccionada
                var tabla = crearTablaPedidos(filas);	//<---------------------------------IMPORTANTE, crear una función completa para la tabla pedidos		
                ped.innerHTML = "";
                ped.appendChild(tabla);												
            }catch(e){
                var mensaje = document.createElement("p");
                mensaje.innerHTML = "No hay pedidos";
                ped.innerHTML = "";
                ped.appendChild(mensaje);
            }					
        }
    };	
    updateCarro(true);
    xhttp.open("GET", "pedidos_json.php", true);
    xhttp.send();
    return false;
}
//Para la tabla de pedidos, por desgracia tiene mucha más miga de lo que yo pensaba, porque hay que relacionar el producto con la fecha y el pedido
//En principio creo que serían 2 consultas, la de pedidos para tener las fechas y otra combinada de productos y pedidosproductos para que muestre la cantidad y el nombre de los productos
function crearTablaPedidos(pedidos){
    var tabla = document.createElement("table");
    var coped=null;
    
    for(var i = pedidos.length-1; i > 0; i--){  //Ahora está en orden inverso, así podemos ver los últimos pedidos
        var cabecera = crear_fila(["Código", "Fecha", "Enviado"], "th");
        cabecera.className="pedido";
        if (pedidos[i].CodPed!=coped){
            tabla.appendChild(cabecera);
        }
        
        //creamos la fila en la tabla a mostrar con los pedidos
        fila = crear_fila([pedidos[i].CodPed, pedidos[i].Fecha, pedidos[i].Enviado], "td");
        celda_form = document.createElement("td");
        if (pedidos[i].CodPed!=coped){
            tabla.appendChild(fila);
        }
        
        var cabecera2= crear_fila(["Producto","Descripción","Cantidad"],"th");
        fila = crear_fila([pedidos[i].nombre, pedidos[i].descripcion, pedidos[i].unidades], "td");
        cabecera2.className="producto";
        if (pedidos[i].CodPed!=coped){
            tabla.appendChild(cabecera2);
        }
        coped=pedidos[i].CodPed;
        tabla.appendChild(fila);
        
    }	
    return tabla;		
}

function crearTablaProductos(productos){
    
    var tabla = document.createElement("table");
    var cabecera = crear_fila(["Código", "Nombre", "Descripción", "Stock", "Comprar"], "th");
    tabla.appendChild(cabecera);
    for(var i = 0; i < productos.length; i++){
        if (productos[i].Stock>0) {   //Evita que se añadan filas que no tienen stock
            // creamos el formulario para añadir unidades del producto al carrito (mediante la función anadirProductos())
            formu = crearFormulario("Añadir", productos[i].CodProd, anadirProductos); 
            //creamos la fila en la tabla a mostrar con los productos
            fila = crear_fila([productos[i].CodProd, productos[i].Nombre, productos[i].Descripcion, productos[i].Stock], "td");    //Modificado por mi
            celda_form = document.createElement("td");
            celda_form.appendChild(formu);
            fila.appendChild(celda_form);		
            tabla.appendChild(fila);
        }		
    }	
    return tabla;		
}

function crearFormulario(texto, cod, funcion){
    var formu = document.createElement("form");		
    var unidades = document.createElement("input");
    unidades.value = 1;
    unidades.name = "unidades";
    var codigo = document.createElement("input");
    codigo.value = cod;
    codigo.type = "hidden";
    codigo.name = "cod";
    var bsubmit = document.createElement("input");
    bsubmit.type = "submit";
    bsubmit.value = texto;
    formu.onsubmit = function(){return funcion(this);};
    formu.appendChild(unidades);
    formu.appendChild(codigo);
    formu.appendChild(bsubmit);
    return formu;
}

function crear_fila(campos, tipo){
    var fila = document.createElement("tr");
    for(var i = 0; i < campos.length; i++){
        var celda = document.createElement(tipo);
        celda.innerHTML = campos[i];
        fila.appendChild(celda);
    }
    return fila;
}

function anadirProductos(formulario){
    var xhttp = new XMLHttpRequest();		
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert("Producto añadido con éxito");
            updateCarro(true);
            //crearTablaProductos();
            //cargarCarrito();  //Culpable de la redirección
        }
    };
    var params = "cod=" + formulario.elements['cod'].value + "&unidades=" + formulario.elements['unidades'].value;
    xhttp.open("POST", "anadir_json.php", true);
    // el envío por POST requiere cabecera y cadena de parámetros
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhttp.send(params);
    updateCarro(true);
    return false;
}
//Función para el carrito flotante
function updateCarro(bol){
    //Obtenemos el carro del servidor para acutalizar el carrito flotante
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
                try{
                    minicarro =  JSON.parse(this.responseText);
                    let tacarro=document.getElementById("carroflotante");
                    tacarro.innerHTML="";
                    tacarro.style.visibility="hidden";
                    if (bol){
                        if (minicarro.length>0){
                            tacarro.style.visibility="visible";
                        }
                    }
                    tacarro.innerHTML+="<tr><th>Producto</th><th>Cantidad</th><tr>";
                    for (let i=0; i<minicarro.length; i++){
                        tacarro.innerHTML+= "<tr><td>"+minicarro[i].Nombre+"</td><td>"+minicarro[i].unidades+"</td></tr>";
                    }
                    tacarro.innerHTML+="<tr><td><button onclick='procesarPedido();'>Pedir</button></td></tr>";
                }catch(e){
                        var mensaje = document.createElement("p");
                        mensaje.innerHTML = "Todavía no tiene productos";
                }			

        } else {
            let tacarro=document.getElementById("carroflotante");
            tacarro.innerHTML="";
            tacarro.style.visibility="hidden";
        }
    };
    xhttp.open("GET", "carrito_json.php", true);
    xhttp.send();
}

function cargarCarrito(){
    var xhttp = new XMLHttpRequest();		
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
                var contenido = document.getElementById("contenido");
                contenido.innerHTML = "";
                var titulo = document.getElementById("titulo");
                titulo.innerHTML = "Carrito de la compra";
                try{
                    var filas =  JSON.parse(this.responseText);
                    minicarro=filas;
                    //creamos la tabla de los productos añadidos al carrito
                    tabla = crearTablaCarrito(filas);				
                    contenido.appendChild(tabla);		
                    //añadimos el vínculo de "procesar pedido"
                    var procesar = document.createElement("a");
                    procesar.href ="#";
                    procesar.innerHTML= "Realizar pedido";
                    procesar.onclick = function(){return procesarPedido();};
                    contenido.appendChild(procesar);
                }catch(e){
                    var mensaje = document.createElement("p");
                    mensaje.innerHTML = "Todavía no tiene productos";
                    contenido.appendChild(mensaje);
                }			

        }
    };
    xhttp.open("GET", "carrito_json.php", true);
    xhttp.send();
    return false;
}

function crearTablaCarrito(productos){
    updateCarro(false);
    var tabla = document.createElement("table");
    var cabecera = 	crear_fila(["Código", "Nombre", "Descripción", "Unidades", "Eliminar"], "th");
    tabla.appendChild(cabecera);
    for(var i = 0; i < productos.length; i++){
        //creamos el formulario que se muestra en el carrito con la opción de eliminar prodcutos
        formu = crearFormulario("Eliminar", productos[i].CodProd, eliminarProductos);
        //creamos la fila con los productos que contiene el carrito
        fila = crear_fila([productos[i].CodProd, productos[i].Nombre, productos[i].Descripcion,productos[i].unidades], "td");
        celda_form = document.createElement("td");
        celda_form.appendChild(formu);
        fila.appendChild(celda_form);		
        tabla.appendChild(fila);		
    }						
    return tabla;
}

function eliminarProductos(formulario){
    var xhttp = new XMLHttpRequest();		
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {                                
            cargarCarrito();
            alert("Producto eliminado con éxito");
        }
    };
    var params = "cod=" + formulario.elements['cod'].value +  "&unidades=" + formulario.elements['unidades'].value;
    xhttp.open("POST", "eliminar_json.php", true);	
    // el envío por POST requiere cabecera y cadena de parámetros
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhttp.send(params);	
    return false;
}

function procesarPedido(){
    let confirmado=confirm("¿Seguro que desea realizar el pedido?");
    if (confirmado){
        minicarro=[];
        procesarPedido2();
    } else {
        return false;
    }
}

function procesarPedido2(){
    var xhttp = new XMLHttpRequest();		
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var contenido = document.getElementById("contenido");
            contenido.innerHTML = "";
            var titulo = document.getElementById("titulo");
            titulo.innerHTML ="Estado del pedido";
            if(this.responseText=="TRUE"){
                updateCarro(false);
                contenido.innerHTML = "Pedido realizado";
            }else{
                contenido.innerHTML = "Error al procesar el pedido";
            }
        }
    };
    xhttp.open("GET", "procesar_pedido_json.php", true);
    xhttp.send();
    updateCarro(true);
    return false;
}