<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloDWES3.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 05 - Rodrigo Robles</title>
    </head>
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        /* 
        @author: Rodrigo Robles Miñambres
        @since: 22/04/2020.
        @description: Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones
                insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno.
        */
            
        //incluir el archivo que contiene los datos de la conexion con la base de datos 
        include_once '../config/datosBase.php';
        
        echo "<h2>Inserción de 3 departamentos mediante una transacción</h2>";
        
        //probamos la conexion
        try {
            
            //la variable 'base' es una nuevo PDO que contiene los datos necesarios para establecer la conexion (DNS= host[ip] y base de datos), USUARIO[de la base de datos], CONTRASEÑA[del usuario])
            $base = new PDO(DNS,USER,PWD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //1.Reporta los errores, 2.Lanza las excepciones
            
            $base->beginTransaction(); //empezamos la transaccion
            
            //querys
            
            $base->query('INSERT INTO Departamento VALUES ("TTA", "Departamento Tra1")');
            $base->query('INSERT INTO Departamento VALUES ("TTB", "Departamento Tra2")');
            $base->query('INSERT INTO Departamento VALUES ("TTC", "Departamento Tra3")');
            
            $base->commit(); //cometemos las consultas
            

                echo "<h4>Se han añadido correctamente los tres departamentos</h4>";
                $mostrarSQL = 'SELECT CodDepartamento, DescDepartamento FROM Departamento ORDER BY CodDepartamento';
                
                 echo "<h2>Contenido de la tabla Departamentos</h2>";
                       echo "<table>";

                            echo "<tr>";

                                echo "<th>Código</th>";
                                echo "<th>Descripción</th>";

                            echo "</tr>";

                                foreach ($base->query($mostrarSQL) as $row) {
                                    echo "<tr>";
                                        print "<td>" . $row['CodDepartamento'] . "</td>" ; 
                                        print "<td>" . $row['DescDepartamento'] . "</td>" ;
                                    echo "</tr>";
                                }

                       echo "</table>";
            $base=null; //Se cierra la conexion
            
        //si la conexion es erronea, capturamos el motivo mediante el catch y lo sacamos por pantalla    
        } catch (PDOException $error) {
            $base->rollBack();//revierte la transaccion
            echo 'Error: ' . $error->getMessage() . '</br>';
            die();//con esta funcion obligamos a terminar el codigo
        }
        

        ?>
    </body>
    
</html>
