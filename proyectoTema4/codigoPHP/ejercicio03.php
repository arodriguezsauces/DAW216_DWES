<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloformulario.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 03 - Rodrigo Robles</title>
    </head>
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        /* 
        @author: Rodrigo Robles Miñambres
        @since: 15/04/2020.
        @description: Formulario para añadir un departamento a la tabla Departamento con validación de entrada y
                    control de errores
        */
            
       include_once '../core/ValidacionFormularios.php'; //incluyo las funciones de validacion
        
        $todobien =true; //variable boolean que utilizaremos para saber si todos los datos se han introducido correctamente
        $diferente = true; //varable boolean que se encarga de validar si introduces el mismo codigo u otro
        
        /*CONSTANSTES*/
            
            //para saber que campos son obligatorios 
            define("obligatorio", 1);

            
        /*ARRAYS*/
                //array que contiene todos los valores del formulario
                $aFormulario=[
                    'codigoD'=>null,
                    'descripcionD'=>null,
                ];

                //array que contiene los posibles errores de cada valor del formulario
                $aErrores=[
                    'codigoD'=>null,
                    'descripcionD'=>null,
                ];
                
        if(isset($_POST['enviar'])){ 
                      
            /*VALIDACION DE LOS CAMPOS*/
            
                //Comprobacion de lo insertado en cada campo
                $aErrores['codigoD']= validacionFormularios::comprobarAlfabetico($_POST["codigoD"], 3, 3, obligatorio);
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
            $aFormulario['codigoD']=strtoupper($_POST["codigoD"]); //funcion que convierte todo el texto en mayusculas
            $aFormulario['descripcionD']=ucfirst($_POST["descripcionD"]); //funcion que convierte la primera letra en mayuscula
            
            
            require_once '../config/datosBase.php';


            //probamos la conexion
            try {

                //la variable 'base' es una nuevo PDO que contiene los datos necesarios para establecer la conexion (DNS= host[ip] y base de datos), USUARIO[de la base de datos], CONTRASEÑA[del usuario])
                $base = new PDO(DNS,USER,PWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //1.Reporta los errores, 2.Lanza las excepciones
                //
                //se utiiza la conexion para sacar los datos de la tabla Departamento
                $mostrarSQL = 'SELECT CodDepartamento, DescDepartamento FROM Departamento ORDER BY CodDepartamento';
                
                foreach ($base->query($mostrarSQL) as $row) {
                    //se comprueba que el codigo que se quiere introducir no esta repetido ya
                    if ($row['CodDepartamento']===$aFormulario['codigoD']) {
                        $diferente=false;                     
                    }else{
                       //Insertar el nuevo departamento en la base de datos
                        $insertarSQL = 'INSERT INTO Departamento(CodDepartamento, DescDepartamento) VALUES (?,?)'; //en el query tengo marcadores de posicion (?, en los cuales se introduciran los campos al ejecutar el query

                        //encadeno el prepare y el execute, en este último indico los campos que introducire en el query, en las posicione que ocupan los ?
                        $base->prepare($insertarSQL)->execute([$aFormulario['codigoD'],$aFormulario['descripcionD']]); 
                    }
                            
                        }
                  
                   //Si se ha introducido se muestra la tabla, sino un ensaje de error
                  if($diferente){
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
                  }else{
                      echo "<p>El departamento no se puede introducir, su código es similar a otro al de otro departamento ya incluido."
                      . "Por favor, vuelve al formulario e introduce un código diferente.</p>";                   
                  }    
             
                $base=null; //Se cierra la conexion

            //si la conexion es erronea, capturamos el motivo mediante el catch y lo sacamos por pantalla    
            } catch (PDOException $error) {
                echo 'Error: ' . $error->getMessage() . '</br>';
                die();//con esta funcion obligamos a terminar el codigo
            }
            
            if($diferente){
            ?>
           
            <div id="respuesta">
                <p>¡Nuevo departamento añadido!</p>
                <p>Código: <?php echo $aFormulario['codigoD'] ?></p>
                <p>Descripción: <?php echo  $aFormulario['descripcionD'] ?> </p>
            </div>
           
       <?php 
            }
        }else{ ?>
           <form id="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div id="content">
                    
                    <h3>Insertar Departamento</h3></br>
                    
                    <label>Código</label></br>
                        <input id="codigoD" name="codigoD" placeholder="ABC..." type="text"/></br> 
                            <?php if ($aErrores['codigoD'] != NULL) { ?>
                            <div class="alert"> 
                                <?php echo $aErrores['codigoD']; ?>
                            </div></br>   
                            <?php } ?>
                        
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
       <?php } ?>   
        
    </body>
    
</html>
