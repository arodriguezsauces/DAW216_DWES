<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloDWES3.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 08 - Rodrigo Robles</title>
    </head>
    
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        /* 
            @author: Rodrigo Robles Miñambres
            @since: 23/03/2020.
            @description: Mostrar la dirección IP del equipo desde el que estás accediendo
        */
             
            echo "Tu dirección IP es: ". $_SERVER['REMOTE_ADDR'];
         
        ?>
    </body>
</html>



