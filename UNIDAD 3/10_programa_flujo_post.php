<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Ejemplo. Haz un programa con el siguiente flujo:
○ El formulario envía los datos por método POST.
○ PHP valida los datos.
○ Si hay errores, se devuelven en formato JSON al navegador (en lugar de mostrarse en el
formulario mismo).
○ Si todo es válido, se guardan los datos en un archivo JSON.-->
<form action="#" method="post">
    <input type="text" name="nombre" id="nombre">
    <input type="email" name="email">
    <input type="text" name="edad">
    <button type="submit">Enviar</button>
</form>

<?php

    $errores = [];
    
    if(isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['edad'])) {
        $nombre = htmlspecialchars($_POST['nombre']);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $edad = htmlspecialchars($_POST['edad']);

        if(empty($_POST['nombre'])) {
            $errores[] = "El nombre es obligatorio";
            $jsonErrores = json_encode($errores, JSON_PRETTY_PRINT);
            echo "<p>$jsonErrores</p>";
        } 
        
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errores[] = "El correo no es valido";
            $jsonErrores = json_encode($errores, JSON_PRETTY_PRINT);
            echo "<p>$jsonErrores</p>";
        }
        
        if(empty($_POST['edad'])) {
            $errores[] = "La edad es obligatoria";
            $jsonErrores = json_encode($errores, JSON_PRETTY_PRINT);
            echo "<p>$jsonErrores</p>";
        } 
        
        $jsonDatos = json_encode($_POST, JSON_PRETTY_PRINT);
        echo $jsonDatos;

    } 

?>
</body>
</html>