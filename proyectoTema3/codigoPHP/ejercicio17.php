<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloDWES3.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 17 - Rodrigo Robles</title>
    </head>
    
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        /* 
            @author: Rodrigo Robles Miñambres
            @since: 24/03/2020.
            @description:  Inicializar un array (bidimensional con dos índices numéricos) donde almacenamos el nombre de las personas que tienen reservado el asiento en un teatro de 20 filas y 15 asientos por fila. 
         * (Inicializamos el array ocupando únicamente 5 asientos). 
         * Recorrer el array con distintas técnicas (foreach(), while(), for()) para mostrar los asientos ocupados en cada fila y las personas que lo ocupan
        */
            $filas=20;
            $asientos=15;
            $teatro[$filas][$asientos] = null;
            
             
                $teatro[1][5]="Heraclio";
                $teatro[5][10]="Amor";
                $teatro[10][3]="María";
                $teatro[15][9]="Nerea";
                $teatro[20][1]="Antonio";
            
             
             //foreach()
             echo "<h2>foreach</h2>";
             foreach ($teatro as $fila => $pos) { //recorremos del teatro el array de filas y sacamos cada fila
                 foreach ($pos as $asiento => $nombre) { //de cada fila recorremos sus asientos y sacamos el nombre de quien a reservado dicho asiento de dicha fila
                     if($teatro[$fila][$asiento]!=null){ //si el asiento esta reservado se muestra
                         echo "Fila: {$fila}, asiento {$asiento}: ".$nombre ."</br>";
                     }  
                     
                 }
            }
            
            //while()
            echo "</br><h2>while</h2>";
            
            $fila2=1; //nuevas variables(contadores) inicializadas
            while($fila2 <= 20){ 
                $asiento2=1;
                while($asiento2 <= 15){
                     if($teatro[$fila2][$asiento2]){ //si el asiento esta reservado se muestra
                         echo "Fila: {$fila2}, asiento {$asiento2}: ".$teatro[$fila2][$asiento2] ."</br>";
                     }
                     $asiento2++; //tras el proceso se suma 1
                }
               $fila2++;
            }
            //for()
            echo "</br><h2>for</h2>";
            for ($i = 1; $i <= $filas; $i++) { //se recorren las filas
                for ($j = 1; $j <= $asientos; $j++) { //se recorren las columnas de cada fila
                    if($teatro[$i][$j]!=null){ //si el asiento esta reservado se muestra
                         echo "Fila: {$i}, asiento {$j}: ".$teatro[$i][$j] ."</br>"; //$teatro[$i][$j]=valor de la posicion del asiento de una fila
                     }  
                }
            }
            
            ?>
    </body>
</html>



