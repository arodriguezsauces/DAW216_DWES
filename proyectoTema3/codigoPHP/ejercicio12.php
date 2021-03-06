<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloDWES3.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 12 - Rodrigo Robles</title>
    </head>
    
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        /* 
            @author: Rodrigo Robles Miñambres
            @since: 23/03/2020.
            @description: Mostrar el contenido de las variables superglobales (utilizando print_r() y foreach())
        */
            echo "<h2>print_r()</h2><br>";
        print_r($_SERVER);
        echo "<br><br>";
        echo "<h2>foreach()</h2>";
        ?>
        <table border="1">
            <tr>
                <th>Variable</th>
                <th>Valor</th>
            </tr>
            <?php
            foreach ($_SERVER as $codigoIndice => $valor) { //Con el foreach recorremos el array
            ?>
                <tr>
                    <td><?php echo '<b>$_SERVER[' . "'" . $codigoIndice . "'" . "]</b>"; ?></td>
                    <td><?php echo "$valor"; ?></td>
                </tr>
                <?php
            }
            ?>
    </body>
</html>



