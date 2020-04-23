<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloDWES3.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 08 - Rodrigo Robles</title>
    </head>
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        /* 
        @author: Rodrigo Robles Miñambres
        @since: 22/04/2020.
        @description: Página web que toma datos (código y descripción) de la tabla Departamento y guarda en un
            fichero departamento.xml. (COPIA DE SEGURIDAD / EXPORTAR)
        */
            
        //incluir el archivo que contiene los datos de la conexion con la base de datos 
        include_once '../config/datosBase.php';
        
        echo "<h2>Guardar los datos en un documento xml</h2>";
        
        //probamos la conexion
        try {
            
            //la variable 'base' es una nuevo PDO que contiene los datos necesarios para establecer la conexion (DNS= host[ip] y base de datos), USUARIO[de la base de datos], CONTRASEÑA[del usuario])
            $base = new PDO(DNS,USER,PWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //1.Reporta los errores, 2.Lanza las excepciones

            $todoSQL ="SELECT * FROM Departamento;"; //creacion del query
            $resultado = $base->query($todoSQL); //ejecucion del query en la base de datos
            
            
            $docXML = new DOMDocument('1.0', 'UTF-8'); //creacion del archivo xml
            //$docXML->formatOutput=true;
            $departamentos = $docXML->createElement('DepartamentosDAW16');
            
            foreach ($resultado as $departamento) {
                //Creacion de cada departamento en el archivo XML
                $departamentoXML = $docXML->createElement('Departamento');
                
                //Creacion de los "hijos" del departamento (codigo y descripcion) = lo que lo compone de cada departamento
                $departamentoXML->appendChild($docXML->createElement("Código", $departamento['CodDepartamento']));
                $departamentoXML->appendChild($docXML->createElement("Descripción", $departamento['DescDepartamento']));
                             
            }
            
            
            $docXML->save("../tmp/departamentos.xml"); //si lo quieres guardar en el mismo sitio valdria con saveXML()
            
            echo 'Escrito: ' . $docXML->save("../tmp/departamentos.xml") . ' bytes';
            
            $base=null;
        //si la conexion es erronea, capturamos el motivo mediante el catch y lo sacamos por pantalla    
        } catch (PDOException $error) {
            echo 'Error: ' . $error->getMessage() . '</br>';
            die();//con esta funcion obligamos a terminar el codigo
        }
        

        ?>
        <h4>Se ha completado la exportación: <a href="../tmp/departamentos.xml">Documento XML creado</a> </h4>
    </body>
    
</html>
