<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloDWES3.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 06 - Rodrigo Robles</title>
    </head>
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        /* 
        @author: Rodrigo Robles Miñambres
        @since: 22/04/2020.
        @description: Pagina web que cargue registros en la tabla Departamento desde un array departamentosnuevos
            utilizando una consulta preparada.
        */
            
        //incluir el archivo que contiene los datos de la conexion con la base de datos 
        include_once '../config/datosBase.php';
        
        echo "<h2>Inserción de array de departamentos mediante una consulta preparada</h2>";
        
        //probamos la conexion
        try {
            
            //la variable 'base' es una nuevo PDO que contiene los datos necesarios para establecer la conexion (DNS= host[ip] y base de datos), USUARIO[de la base de datos], CONTRASEÑA[del usuario])
            $base = new PDO(DNS,USER,PWD);
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //1.Reporta los errores, 2.Lanza las excepciones

            $departamentosnuevos = [array("SSA", "Dep 61"), array("SSB","Dep 62"), array("SSC", "Dep 63")];
            
            //Insertar el nuevo departamento en la base de datos
            $insertarSQL = 'INSERT INTO Departamento(CodDepartamento, DescDepartamento) VALUES (?,?)'; //en el query tengo marcadores de posicion (?, en los cuales se introduciran los campos al ejecutar el query


            
            foreach ($departamentosnuevos as $valores=>$valor) { //array asociativo, tambien se podria hacer directamente con $valores[0] y [1]

                //encadeno el prepare y el execute, en este último indico los campos que introducire en el query, en las posicione que ocupan los ?
                   $base->prepare($insertarSQL)->execute([$valor[0],$valor[1]]);                       
            }
            
            
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
            echo 'Error: ' . $error->getMessage() . '</br>';
            die();//con esta funcion obligamos a terminar el codigo
        }
        

        ?>
    </body>
    
</html>
