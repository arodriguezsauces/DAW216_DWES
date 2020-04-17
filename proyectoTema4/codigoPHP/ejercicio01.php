<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloDWES3.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 01 - Rodrigo Robles</title>
    </head>
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        /* 
        @author: Rodrigo Robles Miñambres
        @since: 15/04/2020.
        @description: Conexión a la base de datos con la cuenta usuario y tratamiento de errores
        */
            
        //incluir el archivo que contiene los datos de la conexion con la base de datos 
        include_once '../config/datosBase.php';
        
        echo "<h2>Conexión CORRECTA con la base de datos</h2>";
        
        //probamos la conexion
        try {
            
            //la variable 'base' es una nuevo PDO que contiene los datos necesarios para establecer la conexion (DNS= host[ip] y base de datos), USUARIO[de la base de datos], CONTRASEÑA[del usuario])
            $base = new PDO(DNS,USER,PWD);
            
            //incluimos en un array todos los atributos de la base de datos que queremos sacar
            $atributos = array(
                "AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS",
                "ORACLE_NULLS", "PERSISTENT", "PREFETCH", "SERVER_INFO", "SERVER_VERSION",
                "TIMEOUT"
            );
            
            //los recorremos mediante el foreach y los sacamos por pantalla mediante echo
            foreach ($atributos as $val) {
                echo "<ul>";
                    echo "<li>PDO::ATTR_$val: ";
                    echo $base->getAttribute(constant("PDO::ATTR_$val")) . "</li></br>";
                echo "</ul>";    
            }
            $base=null; //Se cierra la conexion
            
        //si la conexion es erronea, capturamos el motivo mediante el catch y lo sacamos por pantalla    
        } catch (PDOException $error) {
            echo 'Error: ' . $error->getMessage() . '</br>';
            die();//con esta funcion obligamos a terminar el codigo
        }
        
        /*Esto es otro try-catch para comprobar que salen los errores correctamente en casa de una conexion equivoca*/
        echo "<h2>Conexión INCORRECTA con la base de datos</h2>";
        try {
            $base2 = new PDO(DNS,USER,"NOESLACONTRASEÑA");
            
            $atributos2 = array(
                "AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS",
                "ORACLE_NULLS", "PERSISTENT", "PREFETCH", "SERVER_INFO", "SERVER_VERSION",
                "TIMEOUT"
            );

            foreach ($atributos2 as $val2) {
                echo "<ul>";
                    echo "<li>PDO::ATTR_$val2: ";
                    echo $base2->getAttribute(constant("PDO::ATTR_$val2")) . "</li></br>";
                echo "</ul>";    
            }
            
            $base2=null; //Se cierra la conexion
        } catch (PDOException $error2) {
            echo 'Error: ' . $error2->getMessage() . '</br>';
            die();
        }
            
            
           
  
        ?>
    </body>
    
</html>
