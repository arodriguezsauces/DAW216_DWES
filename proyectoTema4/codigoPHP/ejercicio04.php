<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloformulario.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 04 - Rodrigo Robles</title>
    </head>
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        /* 
        @author: Rodrigo Robles Miñambres
        @since: 15/04/2020.
        @description: Formulario de búsqueda de departamentos por descripción (por una parte del campo
                DescDepartamento
        */
           
        include_once '../core/ValidacionFormularios.php'; //incluyo las funciones de validacion
        require_once '../config/datosBase.php';
        
        
       
       //probamos la conexion
            try {
                $todobien =true; //variable boolean que utilizaremos para saber si todos los datos se han introducido correctamente
        
                /*CONSTANSTES*/

                    //para saber que campos son obligatorios 
                    define("obligatorio", 1);


                /*ARRAYS*/
                        //array que contiene todos los valores del formulario
                        $aFormulario=[
                            'descripcionD'=>null,
                        ];

                        //array que contiene los posibles errores de cada valor del formulario
                        $aErrores=[
                            'descripcionD'=>null,
                        ];

                if(isset($_POST['enviar'])){ 

                    /*VALIDACION DE LOS CAMPOS*/

                        //Comprobacion de lo insertado en cada campo
                        $aErrores['descripcionD']= validacionFormularios::comprobarAlfabetico($_POST["descripcionD"], 35, 1, obligatorio);

                        //Recorremos el array de comprobaciones, y si en un campo hay error, se repite el formulario
                        foreach ($aErrores as $campo => $comprobacion) { //ej: un campo seria 'nombre' y su valor seria la comprobacion
                            if($comprobacion!=null){
                               $_REQUEST[$campo] = ""; /*VACIA LOS CAMPOS ERRONEOS*/
                               $todobien=false; 
                            }

                        }



                }else{
                    //Si no se envia nada, se repite el formulario
                    $todobien=false; 
                }



                if($todobien){ 

                    /*INICIALIZACION DE LOS CAMPOS*/
                    $aFormulario['descripcionD']=ucfirst($_POST["descripcionD"]); //funcion que convierte la primera letra en mayuscula


                }else{ ?>
                   <form id="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div id="content">

                            <h3>Buscar Departamento</h3></br>


                            <label>Descripción</label></br>
                                <input id="descripcionD" name="descripcionD" placeholder="Departamento de..." type="text"/></br> 
                                    <?php if ($aErrores['descripcionD'] != NULL) { ?>
                                    <div class="alert"> 
                                        <?php echo $aErrores['descripcionD']; ?>
                                    </div>  </br>
                                    <?php } ?>


                            <input id="campo3" name="enviar" type="submit" value="Enviar" />
                        </div>
                    </form>
                </br>
               <?php }

                //la variable 'base' es una nuevo PDO que contiene los datos necesarios para establecer la conexion (DNS= host[ip] y base de datos), USUARIO[de la base de datos], CONTRASEÑA[del usuario])
                $base = new PDO(DNS,USER,PWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //1.Reporta los errores, 2.Lanza las excepciones
                //
                //la variable reseultado contiene wl resultado del query sobre la base de datos
                $resultado = $base->query("SELECT * FROM Departamento WHERE DescDepartamento LIKE '%'"); 
                
                if(isset($_POST['descripcionD'])){

                    //Búsqueda del departamento  
                    if(isset($_POST['descripcionD'])){
                        $resultado = $base->query("SELECT * FROM Departamento WHERE DescDepartamento LIKE '%$_POST[descripcionD]%'");                  
                    }
                    
                    if($resultado->rowCount() === 0){//sino se encuentra ningún resultado (es decir, al contar los departamentos con esa descripcion es 0)
                        echo "</br><h2>No se ha encontrado ningún departamento relacionado con esa descripción</h2>";
                    }else{
                        echo "<table class='tabla'>";
                        echo "<tr>
                                <th>Código</th>
                                <th>Descripción</th>
                            </tr>";
                        foreach($resultado as $fila){ //Con fetchObjetc()=Obtiene la siguiente fila/s y la devuelve como un objeto                   
                            echo "<tr>";
                                echo "<td>" . $fila->CodDepartamento. "</td>";
                                echo "<td>" . $fila->DescDepartamento. "</td>";
                            echo "</tr>";                      
                        }
                        echo "</table>";
                    }
                }else{
                    //mostrar la tabla departamentos
                 $mostrarSQL = 'SELECT CodDepartamento, DescDepartamento FROM Departamento ORDER BY CodDepartamento';
                 $resultado2 = $base->query($mostrarSQL); 
                  
                 echo "<table class='tabla'>";

                            echo "<tr>";

                                echo "<th>Código</th>";
                                echo "<th>Descripción</th>";

                            echo "</tr>";

                                foreach ($resultado2 as $row) {
                                    echo "<tr>";
                                        print "<td>" . $row['CodDepartamento'] . "</td>" ; 
                                        print "<td>" . $row['DescDepartamento'] . "</td>" ;
                                    echo "</tr>";
                                }

                       echo "</table>";
                }
             
                $base=null; //Se cierra la conexion

            //si la conexion es erronea, capturamos el motivo mediante el catch y lo sacamos por pantalla    
            } catch (PDOException $error) {
                echo 'Error: ' . $error->getMessage() . '</br>';
                die();//con esta funcion obligamos a terminar el codigo
            }?> 

        
    </body>
    
</html>
