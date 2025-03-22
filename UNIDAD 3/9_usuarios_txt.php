<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="get">
        <input type="text" name="nombre" id="nombre">

        <input type="email" name="email" id="email">
        <button type="submit">Enviar</button>
    </form>
<!--Imagina que estás desarrollando una pequeña aplicación que permite registrar y listar
usuarios en un archivo de texto llamado usuarios.txt. Cada vez que un usuario se
registra, su información (nombre y correo) se guarda en el archivo. El programa
también debe mostrar una lista de todos los usuarios registrados cuando se ejecute.
● Verificar si el archivo usuarios.txt existe. Si no existe, debes crearlo.
● Permitir que el usuario añada su nombre y correo al archivo.
● Al finalizar el registro, mostrar todos los usuarios que se han registrado en el
archivo.
● Cada usuario registrado debe ocupar una nueva línea en el archivo.
● En lugar de sobrescribir el archivo, el nuevo registro debe añadirse al final de
este.-->
    <?php
    

    if(!empty($_GET['nombre']) && !empty($_GET['email'])) {
        
        $nombre = htmlspecialchars($_GET['nombre']);
        $email = filter_var($_GET['email'], FILTER_VALIDATE_EMAIL);

        if(!file_exists('usuarios.txt')) {
            file_put_contents('usuarios.txt', $nombre . " " . $email . "\n", FILE_APPEND);
            
        } else if (file_exists('usuarios.txt')) {
            file_put_contents('usuarios.txt', $nombre . " " . $email . "\n", FILE_APPEND);
            $usuarios = fopen("usuarios.txt", 'r');
            while(!feof($usuarios)) {
                $linea = fgets($usuarios);
                echo "<p> $linea </p>";
            }

            fclose($usuarios);
        }
        
    }

    ?>
    
</body>
</html>