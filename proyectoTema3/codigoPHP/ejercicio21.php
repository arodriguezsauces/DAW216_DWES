<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloformulario.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 21 - Rodrigo Robles</title>
    </head>
    
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        /* 
            @author: Rodrigo Robles Miñambres
            @since: 25/03/2020.
            @description: Construir un formulario para recoger un cuestionario realizado a una persona y enviarlo a una página 
         * Tratamiento.php para que muestre las preguntas y las respuestas recogidas
        */
        
        //nota: el post pilla por el nombre, no id
            ?>


        <form id="formulario" action="../core/tratamiento.php" method="post">
                <label>Nombre</label></br>
                    <input id="nombre" name="nombre" placeholder="Nombre..." type="text"/></br> 
                    <label>Apellidos</label></br>
                    <input id="apellidos" name="apellidos" placeholder="Apellidos..." type="text"/></br> 
                    <label>Email</label></br>
                    <input id="email" name="email" placeholder="Email..." type="text"/></br>
                    <label>Contenido</label><br>
                    <textarea id="contenido" name="comentario" placeholder="¡Ingresa aqui el mensaje propio!" cols="100" rows="6"></textarea><br>

                    <input id="campo3" name="enviar" type="submit" value="Enviar" />
                </div>
            </form>

    </body>
</html>



