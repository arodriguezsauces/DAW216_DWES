<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloDWES3.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 04 - Rodrigo Robles</title>
    </head>
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        /* 
        @author: Rodrigo Robles Miñambres
        @since: 23/03/2020.
        @description: Mostrar en tu página index la fecha y hora actual en Oporto formateada en portugués
        */
            setlocale(LC_ALL, "pt_PT.UTF-8"); //indicamos el idioma de la fecha [portugés] ->la cambia a ingles
            date_default_timezone_set ('Europe/Porto'); //establece una zona horaria especifica como onfiguracion local para el servidor [Porto]
            
            
            echo "Data atual em Porto: " . strftime("%A, %d de %B de %Y"."</br>");
            echo "Hora atual em Porto: " . strftime("%X");
        ?>
    </body>
    
</html>



