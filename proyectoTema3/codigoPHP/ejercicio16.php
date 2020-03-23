<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloDWES3.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 16 - Rodrigo Robles</title>
    </head>
    
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        /* 
            @author: Rodrigo Robles Miñambres
            @since: 23/03/2020.
            @description:  Recorrer el array anterior utilizando funciones para obtener el mismo resultado
         * (Array asociativo con los nombres de los días de la semana)
        */
             
             
             function recorrer(){
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
                
                return $acumulador;
             }
             
             
                
                echo "Sueldo total: ".recorrer();
            ?>
    </body>
</html>



