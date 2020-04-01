<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloformulario.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 23 - Rodrigo Robles</title>
    </head>
    
    <body>
        <h1>Rodrigo Robles</h1>
        <?php
        /* 
            @author: Rodrigo Robles Miñambres
            @since: 26/03/2020.
            @description:Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas recogidas; 
         * en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente
        */
                
        include_once '../core/ValidacionFormularios.php'; //incluyo las funciones de validacion
        
        $todobien =true; //variable boolean que utilizaremos para saber si todos los datos se han introducido correctamente
        
        /*CONSTANSTES*/
            
            //para saber que campos son obligatorios 
            define("obligatorio", 1);

            
        /*ARRAYS*/
                //array que contiene todos los valores del formulario
                $aFormulario=[
                    'nombre'=>null,
                    'apellidos'=>null,
                    'email'=>null,
                    'mensaje'=>null,
                ];

                //array que contiene los posibles errores de cada valor del formulario
                $aErrores=[
                    'nombre'=>null,
                    'apellidos'=>null,
                    'email'=>null,
                    'mensaje'=>null,
                ];
                
        if(isset($_POST['enviar'])){ 
                      
            /*VALIDACION DE LOS CAMPOS*/
            
                //Comprobacion de lo insertado en cada campo
                $aErrores['nombre']= validacionFormularios::comprobarAlfabetico($_POST["nombre"], 35, 1, obligatorio);
                $aErrores['apellidos']= validacionFormularios::comprobarAlfabetico($_POST["apellidos"], 50, 1, obligatorio);
                $aErrores['email']= validacionFormularios::validarEmail($_POST["email"], obligatorio);
                $aErrores['mensaje']= validacionFormularios::comprobarAlfaNumerico($_POST["mensaje"], 100, 3, obligatorio);
                
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
            $aFormulario['nombre']=$_POST["nombre"];
            $aFormulario['apellidos']=$_POST["apellidos"];
            $aFormulario['email']=$_POST["email"];
            $aFormulario['mensaje']=$_POST["mensaje"];
            
            ?>
           
            <div id="respuesta">
            <p>¡Hola <?php echo $aFormulario['nombre'] ." ". $aFormulario['apellidos']; ?>!<br></p>
            <p>Tu email es: <?php echo $aFormulario['email']; ?></p>
            <p>Has escrito " <?php echo $aFormulario['mensaje']?>"</p>
            </div>
           
       <?php 
       
        }else{ ?>
           <form id="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div id="content">
                    
                    <label>Nombre</label></br>
                        <input id="nombre" name="nombre" placeholder="Nombre..." type="text"/></br> 
                            <?php if ($aErrores['nombre'] != NULL) { ?>
                            <div class="alert"> 
                                <?php echo $aErrores['nombre']; ?>
                            </div></br>   
                            <?php } ?>
                        
                    <label>Apellidos</label></br>
                        <input id="apellidos" name="apellidos" placeholder="Apellidos..." type="text"/></br> 
                            <?php if ($aErrores['apellidos'] != NULL) { ?>
                            <div class="alert"> 
                                <?php echo $aErrores['apellidos']; ?>
                            </div>  </br>
                            <?php } ?>
                        
                    <label>Email</label></br>
                        <input id="email" name="email" placeholder="Email..." type="text"/></br>
                            <?php if ($aErrores['email'] != NULL) { ?>
                            <div class="alert"> 
                                <?php echo $aErrores['email']; ?>
                            </div>   </br>
                            <?php } ?>
                        
                    <label>Contenido</label><br>
                        <textarea id="contenido" name="mensaje" placeholder="¡Ingresa aqui el mensaje propio!" cols="100" rows="6"></textarea><br>
                            <?php if ($aErrores['mensaje'] != NULL) { ?>
                            <div class="alert"> 
                                <?php echo $aErrores['mensaje']; ?>
                            </div>   
                            <?php } ?>

                    <input id="campo3" name="enviar" type="submit" value="Enviar" />
                </div>
            </form>
       <?php } ?>
           
    
        
        
    </body>
</html>



