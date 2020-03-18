<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        
        <title>ejercicio 01 - Rodrigo Robles</title>
    </head>
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        
            //Declaro las variables que voy a utilizar en todos los casos
        
            $cadena = "Esto es una cadena";
            $entero = 3;
            $float = 5.6;
            $bool = true;
            
                //echo
                echo "<h2>ECHO </h2>";
                echo $cadena . " mostrada con echo"."</br>";
                echo $entero . " mostrada con echo"."</br>";
                echo $float . " mostrada con echo"."</br>";
                echo $bool . " mostrada con echo"."</br></br>";
                
                //print
                print "<h2>PRINT </h2>";
                print $cadena . " mostrada con print"."</br>";
                print $entero . " mostrada con print"."</br>";
                print $float . " mostrada con print"."</br>";
                print $bool . " mostrada con print"."</br></br>";
                
                         
                //printf
                printf ("<h2>PRINTF </h2>");
                printf ($cadena . " mostrada con printf"."</br>");
                printf ($entero . " mostrada con printf"."</br>");
                printf ($float . " mostrada con printf"."</br>");
                printf ($bool . " mostrada con printf"."</br></br>");   
                
                
                //print_r
                print_r ("<h2>PRINT_R </h2>");
                print_r ($cadena . " mostrada con print_r"."</br>");
                print_r ($entero . " mostrada con print_r"."</br>");
                print_r ($float . " mostrada con print_r"."</br>");
                print_r ($bool . " mostrada con print_r"."</br></br>"); 
                
                //print_r
                echo ("<h2>VAR_DUMP </h2>");
                var_dump ($cadena . " mostrada con var_dump"."</br>");
                var_dump ($entero . " mostrada con var_dump"."</br>");
                var_dump ($float . " mostrada con var_dump"."</br>");
                var_dump ($bool . " mostrada con var_dump"."</br></br>");
            
        ?>
    </body>
    
</html>
