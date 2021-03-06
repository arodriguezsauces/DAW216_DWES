<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloDWES3.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 06 - Rodrigo Robles</title>
    </head>
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
            /* 
            @author: Rodrigo Robles Miñambres
            @since: 23/03/2020.
            @description: Operar con fechas: calcular la fecha y el día de la semana de dentro de 60 días
            */
        
            setlocale(LC_ALL, 'es_ES.UTF-8'); //indicamos el idioma de la fecha [Español]
            date_default_timezone_set ('Europe/Madrid'); //establece una zona horaria especifica como onfiguracion local para el servidor [Madrid]
            
            $fecha_actual=date("d-m-Y");
            echo "La fecha actual es: " . $fecha_actual ."</br>";
            echo "Día actual: " . strftime("%A"."</br></br>"); //como es la fecha actual, se pude sacar directamente del sistema sin necesidad de llamar a la variable que contiene la fecha
            
            //sumar los 60 dias
            $fecha60=date("d-m-Y", strtotime($fecha_actual . "+ 60 days")); //(indicas formato) fecha actual[llamada con el strtotime] + 60 dias
            echo "La fecha dentro de 60 dias es: " . $fecha60 . "</br>";
            echo "Día: " . strftime("%A", strtotime($fecha60)); // el dia[se escoge mediante strtime] de la fecha dentro de 60 días[llamada a traves de strtotime]
        ?>
    </body>
</html>



