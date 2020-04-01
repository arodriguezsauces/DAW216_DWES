<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloformulario.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 25 - Rodrigo Robles</title>
    </head>
    
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        /* 
            @author: Rodrigo Robles Miñambres
            @since: 26/03/2020.
            @description: Plantilla de formulario que se va a usar para los siguientes ejercicios
        */
        
        setlocale(LC_ALL, 'es_ES.UTF-8'); //indicamos el idioma de la fecha [Español]
        date_default_timezone_set ('Europe/Madrid'); //establece una zona horaria especifica como onfiguracion local para el servidor [Madrid]
                
        include_once '../core/ValidacionFormularios.php'; //incluyo las funciones de validacion
        
        $todobien =true; //variable boolean que utilizaremos para saber si todos los datos se han introducido correctamente
        
        /*CONSTANSTES*/
            
            //para saber que campos son obligatorios 
            define("obligatorio", 1);

            
        /*ARRAYS*/
                //array que contiene todos los valores del formulario
                $aFormulario=[
                    'username'=>null,
                    'nombre'=>null,
                    'apellidos'=>null,
                    'password'=>null,
                    'fechanac'=>null, 
                    'email'=>null,
                    'ndias'=>null,
                    'phoras'=>null,
                    'mensaje'=>null,
                    'equipo'=>null,
                    'estres'=>null,
                ];

                //array que contiene los posibles errores de cada valor del formulario
                $aErrores=[
                    'username'=>null,
                    'nombre'=>null,
                    'apellidos'=>null,
                    'password'=>null,
                    'fechanac'=>null,
                    'email'=>null,
                    'ndias'=>null,
                    'phoras'=>null,
                    'mensaje'=>null,
                    'equipo'=>null,
                    'estres'=>null,
                ];
                
        if(isset($_POST['enviar'])){ 
                      
            /*VALIDACION DE LOS CAMPOS*/
            
                //Comprobacion de lo insertado en cada campo
                $aErrores['username']= validacionFormularios::comprobarAlfaNumerico($_POST["username"], 25, 5, 0);
                $aErrores['nombre']= validacionFormularios::comprobarAlfabetico($_POST["nombre"], 35, 1, obligatorio);
                $aErrores['apellidos']= validacionFormularios::comprobarAlfabetico($_POST["apellidos"], 50, 1, obligatorio);
                $aErrores['password']= validacionFormularios::validarPassword($_POST["password"], 3, obligatorio);
                $aErrores['fechanac']= validacionFormularios::validarFecha($_POST["fechanac"], '01/01/2200', '01/01/1900', obligatorio);
                $aErrores['email']= validacionFormularios::validarEmail($_POST["email"], obligatorio);
                $aErrores['ndias']= validacionFormularios::comprobarEntero($_POST["ndias"], 30, 0, 0);
                $aErrores['phoras']= validacionFormularios::comprobarFloat($_POST["pdias"], 24, 0, !obligatorio);
                $aErrores['mensaje']= validacionFormularios::comprobarAlfaNumerico($_POST["mensaje"], 100, 3, !obligatorio);
                if(!isset($_POST['equipo'])){ //Si el chechbox de aficiones fuera obligatorio seria igual
                    $aErrores['equipo'] = "¡Debes elegir para pasar la cuarentena!";
                    
                }              
                $aErrores['estres']= validacionFormularios::validarElementoEnLista($_POST["estres"], array("bajo","medio","alto"));
                
                //Recorremos el array de comprobaciones, y si en un campo hay error, se repite el formulario
                foreach ($aErrores as $campo => $comprobacion) { //ej: un campo seria 'nombre' y su valor seria la comprobacion
                    if($comprobacion!=null){
                       $todobien=false; 
                    }
                    
                }
                
                
            
        }else{
            //Si no se envia nada, se repite el formulario
            $todobien=false; 
        }
        
        
        
        if($todobien){ 
            
            /*INICIALIZACION DE LOS CAMPOS*/
            $aFormulario['username']=$_POST["username"];
            $aFormulario['nombre']=$_POST["nombre"];
            $aFormulario['apellidos']=$_POST["apellidos"];
            $aFormulario['password']=$_POST["password"];
            $aFormulario['fechanac']=$_POST["fechanac"];
            $aFormulario['email']=$_POST["email"];
            $aFormulario['ndias']=$_POST["ndias"];
            $aFormulario['phoras']=$_POST["phoras"];
            $aFormulario['mensaje']=$_POST["mensaje"];
            $aFormulario['equipo']=$_POST["equipo"];
            $aFormulario['estres']=$_POST["estres"];
            
            ?>
           
            <div id="respuesta">
                <p>¡Hola <?php 
                    echo  $aFormulario['nombre'] ." ". $aFormulario['apellidos']; 
                    if($aFormulario['username']!=null){
                        echo " (aka [{$aFormulario['username']}])";
                    }
                    ?>!
                </p>
                <p>Constraseña: <?php echo $aFormulario['password']; ?></p>
                <p>Naciste el <?php
                    echo strftime("%A %d de %B del %G", strtotime($aFormulario['fechanac'])); 
                    ?>
                </p>
                <p>Tu email es: <?php echo $aFormulario['email']; ?></p>
                <p><?php if($aFormulario['ndias']!=null){
                    echo "Días encerrado en casita: " . $aFormulario['ndias']; 
                }   
                    ?>
                </p>
                <p><?php if($aFormulario['phoras']!=null){
                    echo "Promedia de estudio: " . ($aFormulario['phoras']-1); 
                }   
                    ?>
                </p>
                <p>Equipamiento elegido: <?php echo $aFormulario['equipo']; ?></p>              
                <p>Nivel de estrés: <?php echo $aFormulario['estres']; ?></p>
                <?php if($aFormulario['mensaje']!=null){?>
                    <p>Mensaje para la posteridad despues de cuarentena: " <?php echo $aFormulario['mensaje']?>"</p>
                <?php } ?>
            </div>
           
       <?php 
       
        }else{ ?>
           <form id="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div id="content">
                    
                    <label>Nombre de Usuario</label></br>
                        <input id="username" name="username" placeholder="xX_COVID-19_Xx" type="text" value="<?php
                        
                            if (isset($_POST["username"]) && is_null($aErrores["username"])) { //comprobamos si ha introducido algo en el campo y que el array de errores este null (osea, que no de errores)
         
                                echo $_POST["username"];//aunque se muestre un campo mal el valor si es correcto se mantiene.
                        }
                        ?>"><br> 
                            <?php if ($aErrores['username'] != NULL) { ?>
                            <div class="alert"> 
                                <?php echo $aErrores['username']; ?>
                            </div></br>   
                            <?php } ?>
                         </br>
                         
                    <label>Nombre *</label></br>
                        <input id="nombre" name="nombre" placeholder="Nombre..." type="text" value="<?php
                        
                            if (isset($_POST["nombre"]) && is_null($aErrores["nombre"])) { 
         
                                echo $_POST["nombre"];
                        }
                        ?>"><br> 
                            <?php if ($aErrores['nombre'] != NULL) { ?>
                            <div class="alert"> 
                                <?php echo $aErrores['nombre']; ?>
                            </div></br>   
                            <?php } ?>
                        </br>
                        
                    <label>Apellidos *</label></br>
                        <input id="apellidos" name="apellidos" placeholder="Apellidos..." type="text" value="<?php
                        
                            if (isset($_POST["apellidos"]) && is_null($aErrores["apellidos"])) { 
         
                                echo $_POST["apellidos"];
                        }
                        ?>"> <br> 
                            <?php if ($aErrores['apellidos'] != NULL) { ?>
                            <div class="alert"> 
                                <?php echo $aErrores['apellidos']; ?>
                            </div>  </br>
                            <?php } ?>
                    </br>
                    
                    <label>Contraseña *</label></br>
                    <input id="password" name="password" placeholder="Paso1" type="password" value="<?php
                        
                            if (isset($_POST["password"]) && is_null($aErrores["password"])) { 
         
                                echo $_POST["password"];
                        }
                        ?>"> <br> 
                            <?php if ($aErrores['password'] != NULL) { ?>
                            <div class="alert"> 
                                <?php echo $aErrores['password']; ?>
                            </div>  </br>
                            <?php } ?>
                            </br>
                            
                    <label>Fecha de Nacimiento *</label></br> 
                        <input id="fechanac" name="fechanac"  type="date"  value="<?php /*NOTA: podria ser datetime, y se escribe toda la fecha, en vez de escogerla*/
                        
                            if (isset($_POST["fechanac"]) && is_null($aErrores["fechanac"])) { 
         
                                echo $_POST["fechanac"];
                        }
                        ?>"> <br>
                            <?php if ($aErrores['fechanac'] != NULL) { ?>
                            <div class="alert"> 
                                <?php echo $aErrores['fechanac']; ?>
                            </div>  </br>
                            <?php } ?>        
                        </br>
                        
                    <label>Email *</label></br>
                        <input id="email" name="email" placeholder="Email..." type="text" value="<?php
                        
                            if (isset($_POST["email"]) && is_null($aErrores["email"])) { 
         
                                echo $_POST["email"];
                        }
                        ?>"> <br>
                            <?php if ($aErrores['email'] != NULL) { ?>
                            <div class="alert"> 
                                <?php echo $aErrores['email']; ?>
                            </div>   </br>
                            <?php } ?>
                            </br>
                            
                    <label>Días en cuarentena </label></br>
                        <input id="ndias" name="ndias" placeholder="3" type="text" value="<?php
                        
                            if (isset($_POST["ndias"]) && is_null($aErrores["ndias"])) { 
         
                                echo $_POST["ndias"];
                        }
                        ?>"> <br>
                            <?php if ($aErrores['ndias'] != NULL) { ?>
                            <div class="alert"> 
                                <?php echo $aErrores['ndias']; ?>
                            </div>  </br>
                            <?php } ?>        
                        </br>
                        
                    <label>Promedio diario de horas estudiando en cuarentena</label></br>
                        <input id="phoras" name="phoras" placeholder="2,5 o 2.5" type="text" value="<?php
                        
                            if (isset($_POST["phoras"]) && is_null($aErrores["phoras"])) { 
         
                                echo $_POST["phoras"];
                        }
                        ?>"> <br>
                            <?php if ($aErrores['phoras'] != NULL) { ?>
                            <div class="alert"> 
                                <?php echo $aErrores['phoras']; ?>
                            </div>   </br>
                            <?php } ?>        
                        </br>
                        
                    <label>Contenido </label><br>
                        <textarea id="contenido" name="mensaje" placeholder="¡Ingresa aqui el mensaje propio!" cols="100" rows="6" value="<?php
                        
                            if (isset($_POST["mensaje"]) && is_null($aErrores["mensaje"])) { 
         
                                echo $_POST["mensaje"];
                        }
                        ?>"></textarea> <br>
                            <?php if ($aErrores['mensaje'] != NULL) { ?>
                            <div class="alert"> 
                                <?php echo $aErrores['mensaje']; ?>
                            </div>  </br> 
                            <?php } ?>
                            </br>
                            
                    <label>Selección de equipo *</label><br>
                        <input id="papel" name="equipo" type="radio" value="papel higiénico, todo mio." <?php 
                                if(isset($_POST['equipo']) && $_POST['equipo'] == "papel"){
                                    echo 'checked';

                                } ?>>
                            <label for="papel" class="selecciones">Papel Higiénico</label></br>
                            
                        <input id="perro" name="equipo" type="radio" value="perro, para pasearlo 2h." <?php 
                                if(isset($_POST['equipo']) && $_POST['equipo'] == "perro"){
                                    echo 'checked';

                                } ?>>
                            <label for="perro" class="selecciones">Perro de compañía</label></br>
                            
                        <input id="mascarilla" name="equipo" type="radio" value="mascarilla, para sentirme protegido" <?php 
                                if(isset($_POST['equipo']) && $_POST['equipo'] == "mascarilla"){
                                    echo 'checked';

                                } ?>> 
                            <label for="mascarilla" class="selecciones">Mascarilla</label></br>   
                            
                                <?php if ($aErrores['equipo'] != NULL) { ?>
                                <div class="alert"> 
                                    <?php echo $aErrores['equipo']; ?>
                                </div>  </br> 
                                <?php } ?>
                                </br>                                                    
                                
                    <label>Nivel de estrés actual</label></br>
                        <select name="estres">
                            <option value="bajo" <?php 
                            if(isset($_POST['estres'])){
                                if($aErrores['estres'] == NULL && $_POST['estres'] == "bajo"){
                                    echo "selected";  
                                }   
                            } ?>>Bajo</option>

                            <option value="medio" <?php 
                            if(isset($_POST['estres'])){
                                if($aErrores['estres'] == NULL && $_POST['estres'] == "medio"){
                                    echo "selected";  
                                }   
                            } ?>>Medio</option>

                            <option value="alto" <?php 
                            if(isset($_POST['estres'])){
                                if($aErrores['estres'] == NULL && $_POST['estres'] == "alto"){
                                    echo "selected";  
                                }   
                            } ?>>Alto</option>

                        </select>
                            <?php if ($aErrores['estres'] != NULL) { ?>
                                    <div class="alert"> 
                                        <?php echo $aErrores['estres']; ?>
                                    </div>  </br> 
                            <?php } ?>  
                                   </br>  </br> 
                            <p style="font-size: 75%; font-style: oblique;">(Los campos con * son obligatorios)</p></br>
                    <input id="campo3" name="enviar" type="submit" value="Enviar" />
                </div>
            </form>
       <?php } ?>
           
    
        
        
    </body>
</html>



