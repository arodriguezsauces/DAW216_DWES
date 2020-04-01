<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloformulario.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 22 - Rodrigo Robles</title>
    </head>
    
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        /* 
            @author: Rodrigo Robles Miñambres
            @since: 25/03/2020.
            @description: Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas recogidas
        */
        
        //nota: el post pilla por el nombre, no id
        
        if(isset($_POST['enviar'])){
            //variables->para facilitar su llamada en futuro codigo
            
            $nombre=$_POST["nombre"];
            $apellidos=$_POST["apellidos"];
            $email = $_POST["email"];
            $mensaje=$_POST["comentario"];
            
            ?>
           
            <div id="respuesta">
            <p>¡Hola <?php echo $nombre ." ". $apellidos; ?>!<br></p>
            <p>Tu email es: <?php echo $email; ?></p>
            <p>Has escrito " <?php echo $mensaje?>"</p>
            </div>
           
       <?php }else{ ?>
           <form id="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div id="content">
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
       <?php } ?>
           
    
        
        
    </body>
</html>



