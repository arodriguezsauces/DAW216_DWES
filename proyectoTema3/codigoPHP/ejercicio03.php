<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        
        <title>ejercicio 03 - Rodrigo Robles</title>
    </head>
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
            setlocale(LC_ALL, 'es_ES.UTF-8'); //indicamos el idioma de la fecha [Español]
            date_default_timezone_set ('Europe/Madrid'); //establece una zona horaria especifica como onfiguracion local para el servidor [Madrid]
            
            
            echo "Fecha actual en España: " . strftime("%A, %d de %B de %Y"."</br>");
            echo "Hora actual en España: " . strftime("%X");
        ?>
    </body>
    
</html>



