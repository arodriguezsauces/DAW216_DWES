<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloDWES3.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 05 - Rodrigo Robles</title>
    </head>
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        /* 
        @author: Rodrigo Robles Miñambres
        @since: 23/03/2020.
        @description: Inicializar y mostrar una variable que tiene una marca de tiempo (timestamp)
        */
            setlocale(LC_ALL, 'es_ES.UTF-8'); //indicamos el idioma de la fecha [Español]
            date_default_timezone_set ('Europe/Madrid'); //establece una zona horaria especifica como onfiguracion local para el servidor [Madrid]
            
            //FECHA ACTUAL
            $fechaActual = new DateTime(); //Creamos un objeto de la clase DateTime
            $segundosTimeStamp = $fechaActual->getTimeStamp(); //Asignamos a una variable la hora actual en segundos
            echo "Fecha actual: " . $fechaActual->format('Y-m-d') . "</p>"; //Saca la fecha formateada
            echo "TimeStamp: " . + $segundosTimeStamp . " segundos" . "</p>"; //Mostramos la hora
            echo "<br/>";

            //OTRA FECHA
            $otrafecha = new DateTime(); 
            $otrafecha -> setDate(2000, 06, 02); //Fecha establecida manualmente mediante el setDate()
            $segundosTimeStamp2 = $otrafecha->getTimeStamp(); //Asignamos a la variable $sec la hora actual en segundos
            echo "Fecha establecida manualmente: " . $otrafecha->format('Y-m-d') . "</p>"; //Saca la fecha formateada
            echo "TimeStamp: " . $segundosTimeStamp2 . " segundos" . "</p>";
            
        ?>
    </body>
    
</html>



