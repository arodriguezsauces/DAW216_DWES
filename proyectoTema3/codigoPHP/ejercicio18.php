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
            
             
           
            
            echo "</br><h2>function()</h2>";
            
            function recorrerfor($filas,$asientos,$teatro){
                for ($i = 1; $i <= $filas; $i++) { //se recorren las filas
                    for ($j = 1; $j <= $asientos; $j++) { //se recorren las columnas de cada fila
                        if($teatro[$i][$j]!=null){ //si el asiento esta reservado se muestra
                            return "Fila: {$i}, asiento {$j}: ".$teatro[$i][$j] ."</br>"; //$teatro[$i][$j]=valor de la posicion del asiento de una fila
                        }
                    }  

                }
            
            }
           
                 echo recorrerfor($filas, $asientos,$teatro);
         
            
            
            ?>
    </body>
</html>



