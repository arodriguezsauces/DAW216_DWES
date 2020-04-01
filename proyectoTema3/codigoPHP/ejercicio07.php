<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloDWES3.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 07 - Rodrigo Robles</title>
    </head>
    
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        /* 
            @author: Rodrigo Robles Miñambres
            @since: 23/03/2020.
            @description: Mostrar el nombre del fichero que se está ejecutando
            */
             
          $archivo = $_SERVER['PHP_SELF'];
          
          $info = pathinfo($archivo); //pathinfo devuelve informacion de la ruta de un fichero
          $nombre_archivo =  basename($archivo,'.'.$info['extension']); //le quito la extension al fichero = ahora solo esta el nombre

          echo "Nombre del archivo ejecutado: " . $nombre_archivo;
          
          //basename me saca el nombre del archivo, y mediante la variable info le quito la extension al archivo, asi solo saco el nombre
         
        ?>
    </body>
</html>



