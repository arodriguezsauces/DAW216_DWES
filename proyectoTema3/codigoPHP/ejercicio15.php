<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloDWES3.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 15 - Rodrigo Robles</title>
    </head>
    
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        /* 
            @author: Rodrigo Robles Miñambres
            @since: 23/03/2020.
            @description:  Crear e inicializar un array con el sueldo percibido de lunes a domingo. Recorrer el array para calcular el sueldo percibido durante la semana. 
         * (Array asociativo con los nombres de los días de la semana)
        */
             $semana=[
                 "Lunes"=>50,
                 "Martes"=>25,
                 "Miércoles"=>75,
                 "Jueves"=>100,
                 "Viernes"=>5000,
                 "Sábado"=>5,
                 "Domingo"=>11
             ];
             
             $acumulador=0;
             foreach ($semana as $sueldo) {
                  $acumulador+=$sueldo;
                }
                
                echo "Sueldo total: ".$acumulador;
            ?>
    </body>
</html>



