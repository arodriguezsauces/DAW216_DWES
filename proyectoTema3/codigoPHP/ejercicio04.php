<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        
        <title>ejercicio 04 - Rodrigo Robles</title>
    </head>
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
            setlocale(LC_ALL, "pt_PT.UTF-8"); //indicamos el idioma de la fecha [portugés] ->la cambia a ingles
            date_default_timezone_set ('Europe/Porto'); //establece una zona horaria especifica como onfiguracion local para el servidor [Porto]
            
            
            echo "Data atual em Porto: " . strftime("%A, %d de %B de %Y"."</br>");
            echo "Hora atual em Porto: " . strftime("%X");
        ?>
    </body>
    
</html>



