<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloDWES3.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 03 - Rodrigo Robles</title>
    </head>
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        /* 
        @author: Rodrigo Robles Miñambres
        @since: 23/03/2020.
        @description: Mostrar en tu página index la fecha y hora actual formateada en castellano
        */
            setlocale(LC_ALL, 'es_ES.UTF-8'); //indicamos el idioma de la fecha [Español]
            date_default_timezone_set ('Europe/Madrid'); //establece una zona horaria especifica como onfiguracion local para el servidor [Madrid]
            
            
            echo "Fecha actual en España: " . strftime("%A, %d de %B de %Y"."</br>");
            echo "Hora actual en España: " . strftime("%X");
        ?>
    </body>
    
</html>



