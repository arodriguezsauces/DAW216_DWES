<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../webroot/images/favicon.png">
        <link href="../webroot/css/estiloformulario.css"  rel="stylesheet" type="text/css" title="Default style">
        <title>ejercicio 21 - Rodrigo Robles</title>
    </head>
    <body>
        <h1>Rodrigo Robles</h1></br>
        <div id="respuesta">
            <p>¡Hola <?php echo $_POST["nombre"] ." ". $_POST["apellidos"]; ?>!<br></p>
            <p>Tu email es: <?php echo $_POST["email"]; ?></p>
            <p>Has escrito " <?php echo $_POST["comentario"]?>"</p>
        </div>
        
    </body>
</html>

