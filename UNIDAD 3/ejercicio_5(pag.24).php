<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VALIDACIÓN FORMULARIOS</title>
</head>
<body>
<!--Desarrolla un formulario para registrar a un usuario con los siguientes campos:
● Nombre: Solo puede contener letras (mayúsculas o minúsculas) y espacios.
● Correo electrónico: Debe ser un correo válido.
● Edad: Debe ser un número entre 18 y 99.
● Contraseña: Debe tener al menos 6 caracteres.
● Si algún campo no es válido, debe mostrar un mensaje de error específico debajo del campo correspondiente.
 Si todos los campos son correctos, debe mostrar un mensaje de éxito. Los errores se deben registrar y mostrar.-->
<?php
        $errores = [];
        $exito = "";

        if(!empty($_GET['nombre']) && !empty($_GET['email']) && !empty($_GET['edad']) && !empty($_GET['contrasenia'])) {
            $nombre = htmlspecialchars($_GET['nombre'], ENT_QUOTES, 'UTF-8');
            $nombre = trim(strtolower($nombre));                        

            $email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);
            $email = trim(strtolower($email));

            $edad = htmlspecialchars($_GET['edad'], ENT_QUOTES, 'UTF-8');

            $contrasenia = htmlspecialchars($_GET['contrasenia'], ENT_QUOTES, 'UTF-8');
            $contrasenia = trim($contrasenia);          
        }    
    ?>
    <form action="#" method="get">

        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" <?php if(!empty($_GET['nombre'])):;?> value="<?php echo htmlspecialchars($_GET['nombre'], ENT_QUOTES, 'UTF-8')  ?> <?php endif ?>" required>
        <?php
        $validarNombre = preg_match("/^[A-Za-zÁÉÍÓÚáéíóúÑñÜü'´]+$/", $nombre);
            if(!$validarNombre) {
                $errores['nombre'] = "<p>El nombre no tiene un formato correcto.</p>";
                echo $errores['nombre'];
            }        
        ?>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email" <?php if(!empty($_GET['email'])):;?> value="<?php echo filter_var($_GET['email'],  FILTER_SANITIZE_EMAIL) ?> <?php endif ?>" required>        
        <?php        
            $validarEmail = preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email);
            if(!$validarEmail) {
                $errores['email'] = "<p>El email no tiene un formato correcto.</p>";
                echo $errores['email'];
            }        
        ?>

        <label for="edad">Edad: </label>
        <input type="number" name="edad" id="edad" <?php if(!empty($_GET['edad'])):;?> value="<?php echo htmlspecialchars($_GET['edad'], ENT_QUOTES, 'UTF-8') ?> <?php endif ?>" required>
        <?php            
            $validarEdad = preg_match("/^(1[89]|[2-9]\d)$/", $edad);           
            if(!$validarEdad) {
                $errores['edad'] = "<p>La edad no tiene un formato correcto.</p>";
                echo $errores['edad'];
                }        
        ?>

        <label for="contrasenia">Contraseña: </label>
        <input type="password" name="contrasenia" id="contrasenia" <?php if(!empty($_GET['contrasenia'])):;?> value="<?php echo htmlspecialchars($_GET['contrasenia'], ENT_QUOTES, 'UTF-8') ?> <?php endif ?>" required>
        <?php
            $validarContrasenia = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+\[\]{};\'":\\|,.<>?\/-])[A-Za-z\d!@#$%^&*()_+\[\]{};\'":\\|,.<>?\/-]{6,}$/', $contrasenia);
            if(!$validarContrasenia) {
                $errores['contrasenia'] = "<p>La contraseña no tiene un formato correcto.</p>";
                echo $errores['contrasenia'];
                }        
        ?>

        <button type="submit">ENVIAR</button>
        <?php        
            if($validarNombre && $validarEmail && $validarEdad && $validarContrasenia) {
                $exito = "<p>Todos los campos se han rellenado correctamente.</p>";
                echo $exito;
            }
        ?>

    </form>  
    
</body>
</html>