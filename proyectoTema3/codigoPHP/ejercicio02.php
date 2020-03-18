<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        
        <title>ejercicio 02 - Rodrigo Robles</title>
    </head>
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        
        //La variable heredoc se inicializa con un identificador, y se finaliza con el mismo identificador al principio de la linea sin espacios. El contenido de la variable se introduce 
        //despues de un salto de linea (en la linea donde se inicializa no se puede introducir nada, ni espacios ni caracteres)
            $heredoc = <<<HER
                    VARIABLE HEREDOC
                    DE RODRIGO
HER;
        
        echo "Variable heredoc: ". $heredoc;
        ?>
    </body>
    
</html>



