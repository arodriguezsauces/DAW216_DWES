<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloDWES3.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 02 - Rodrigo Robles</title>
    </head>
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        /* 
        @author: Rodrigo Robles Miñambres
        @since: 15/04/2020.
        @description: Mostrar el contenido de la tabla Departamento y el número de registros
        */
            
        //incluir el archivo que contiene los datos de la conexion con la base de datos 
        require_once '../config/datosBase.php';
        
        echo "<h2>Contenido de la tabla Departamentos</h2>";
        
        //probamos la conexion
        try {
            
            //la variable 'base' es una nuevo PDO que contiene los datos necesarios para establecer la conexion (DNS= host[ip] y base de datos), USUARIO[de la base de datos], CONTRASEÑA[del usuario])
            $base = new PDO(DNS,USER,PWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //1.Reporta los errores, 2.Lanza las excepciones
            
            //se utiiza la conexion para sacar los datos de la tabla Departamento
            
            $mostrarSQL = 'SELECT CodDepartamento, DescDepartamento FROM Departamento ORDER BY CodDepartamento';
            $resultado = $base->query($mostrarSQL);
            
            if($resultado->rowCount()>0){
                echo "Número de registros: " . $resultado->rowCount() ."</br></br>";
            echo "<table>";
            
                echo "<tr>";
                
                    echo "<th>Código</th>";
                    echo "<th>Descripción</th>";
                    
                echo "</tr>";
                
                    foreach ($resultado as $row) {
                        echo "<tr>";
                            print "<td>" . $row['CodDepartamento'] . "</td>" ; 
                            print "<td>" . $row['DescDepartamento'] . "</td>" ;
                        echo "</tr>";
                    }
                               
           echo "</table>";
            }else{
                echo "No hay registros";
            }
            
           
            $base=null; //Se cierra la conexion
            
        //si la conexion es erronea, capturamos el motivo mediante el catch y lo sacamos por pantalla    
        } catch (PDOException $error) {
            echo 'Error: ' . $error->getMessage() . '</br>';
            die();//con esta funcion obligamos a terminar el codigo
        }

        ?>
    </body>
    
</html>
