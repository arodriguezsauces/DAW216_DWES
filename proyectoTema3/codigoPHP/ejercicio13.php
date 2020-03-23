<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloDWES3.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 13 - Rodrigo Robles</title>
    </head>
    
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        /* 
            @author: Rodrigo Robles Miñambres
            @since: 23/03/2020.
            @description: Crear una función que cuente el número de visitas a la página actual desde una fecha concreta
        */
            
            
            function cuentavisitas(){ 
                
               $contador = 0; //se inicializa a 0
               $archivo = "ejercicio13.php"; //indico el archivo sobre el que se van a contar las visitas
               $abrir = fopen($archivo, "r"); //se mete en una variable la lectura del archivo
                
                if($abrir){ //si se lee el archivo, +1 al contador
                   
                    $contador++;
                    
                }
               
                
                return $contador; //la funcion devuelve el contador 
            }
            
            echo "Contador de visitas: " . cuentavisitas(); //muestras la funcion(el contador)
            
            //NOTA: PARA REALIZAR UN CONTADOR QUE NO SE REINICIE CADA VEZ QUE ENTRAS NECESITAS UNA BASE DE DATOS O UN ARCHIVO QUE ACTUE COMO TAL
            ?>
    </body>
</html>



