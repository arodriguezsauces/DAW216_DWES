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
        @since: 22/04/2020.
        @description: Página web que toma datos (código y descripción) de un fichero xml y los añade a la tabla
            Departamento de nuestra base de datos. (IMPORTAR)
        */
            
        //incluir el archivo que contiene los datos de la conexion con la base de datos 
        include_once '../config/datosBase.php';
        
        echo "<h2>Inserción de array de departamentos mediante una consulta preparada</h2>";
        
        //probamos la conexion
        try {
            
            //la variable 'base' es una nuevo PDO que contiene los datos necesarios para establecer la conexion (DNS= host[ip] y base de datos), USUARIO[de la base de datos], CONTRASEÑA[del usuario])
            $base = new PDO(DNS,USER,PWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //1.Reporta los errores, 2.Lanza las excepciones


            $base=null; //Se cierra la conexion
            
        //si la conexion es erronea, capturamos el motivo mediante el catch y lo sacamos por pantalla    
        } catch (PDOException $error) {
            echo 'Error: ' . $error->getMessage() . '</br>';
            die();//con esta funcion obligamos a terminar el codigo
        }
        

        ?>
    </body>
    
</html>
