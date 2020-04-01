<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloDWES3.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 18 - Rodrigo Robles</title>
    </head>
    
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        /* 
            @author: Rodrigo Robles Miñambres
            @since: 24/03/2020.
            @description:  Recorrer el array anterior utilizando funciones para obtener el mismo resultado
        */
            $filas=20;
            $asientos=15;
            $teatro[$filas][$asientos] = null;
            
             
                $teatro[1][5]="Heraclio";
                $teatro[5][10]="Amor";
                $teatro[10][3]="María";
                $teatro[15][9]="Nerea";
                $teatro[20][1]="Antonio";
            
             
           
            
            echo "</br><h2>function recorrerfor()</h2>";
            
            function recorrerfor($filas,$asientos,$teatro){
                for ($i = 1; $i <= $filas; $i++) { //se recorren las filas
                    for ($j = 1; $j <= $asientos; $j++) { //se recorren las columnas de cada fila
                        if($teatro[$i][$j]!=null){ //si el asiento esta reservado se muestra
                            echo "Fila: {$i}, asiento {$j}: ".$teatro[$i][$j] ."</br>"; //$teatro[$i][$j]=valor de la posicion del asiento de una fila
                        }
                    }  
                    
                }
            
            }
           
                 echo recorrerfor($filas, $asientos,$teatro);
         
            echo "</br><h2>function recorrerforeach()</h2>";
            
            function recorrerforeach($teatro){
                foreach ($teatro as $fila => $pos) { //recorremos del teatro el array de filas y sacamos cada fila
                 foreach ($pos as $asiento => $nombre) { //de cada fila recorremos sus asientos y sacamos el nombre de quien a reservado dicho asiento de dicha fila
                     if($teatro[$fila][$asiento]!=null){ //si el asiento esta reservado se muestra
                         echo "Fila: {$fila}, asiento {$asiento}: ".$nombre ."</br>";
                     }  
                     
                 }
                }
            
            }
           
                 echo recorrerforeach($teatro);
            
            echo "</br><h2>function recorrerwhile()</h2>";
            
            function recorrerwhile($teatro){
                $fila2=1; //nuevas variables(contadores) inicializadas
                while($fila2 <= 20){     
                    $asiento2=1;
                    while($asiento2 <= 15){
                         if($teatro[$fila2][$asiento2]!=null){ //si el asiento esta reservado se muestra
                             echo "Fila: {$fila2}, asiento {$asiento2}: ".$teatro[$fila2][$asiento2] ."</br>";
                         }
                         $asiento2++; //tras el proceso se suma 1
                    }
                   $fila2++;
                }
            
            }
           
                 echo recorrerwhile($teatro);
            ?>
    </body>
</html>



