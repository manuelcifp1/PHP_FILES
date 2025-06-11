<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <p><label for="email">Email: </label>
        <input type="email" name="email" id="email"></p>

        <p><label for="password">Contraseña: </label>
        <input type="password" name="password" id="password" min="8"></p>

        <button type="submit">Enviar</button>

        <button type="reset">Reset</button>
    </form>
    <?php
/*Las líneas siguientes son para que funcione en phpServer del vscode.
 Necesita conocer los encabezados y dar permiso a todos los dominios*/
/*Permitir solicitudes desde cualquier origen (esto es para desarrollo,
 en producción limita el acceso)*/
header("Access-Control-Allow-Origin: *");

// Permitir ciertos métodos HTTP
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// Permitir ciertos encabezados
header("Access-Control-Allow-Headers: Content-Type");

// Si la solicitud es un preflight (OPTIONS), terminamos aquí
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}
//Aquí termina las líneas.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    /*Si se ha recogido algo, lo asignamos a sus variables,
     en otro caso asignamos la cadena vacía.*/
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $passwd = isset($_POST['passwd']) ? $_POST['passwd'] : '';

    $datos = array(); //La declaramos fuera de las estructuras
    // Credenciales de usuario: "aragorn@mail.es/12345"
    if ($email === "aragorn@mail.es" && $passwd === "12345") {
        // Crear un array asociativo con los datos
        $datos = array(
            "rol" => "usuario",
            "nombre" => "Aragorn",
            "apellidos" => "Hijo de Arathorn",
            "DNI" => "44555666Z"
        );
        // Credenciales de administrador: "admin@mail.es/admin"
    }else if($email === "admin@mail.es" && $passwd === "admin") {
        // Crear un array asociativo con los datos
        $datos = array(
            "rol" => "administrador",
            "nombre" => "Nathan",
            "apellidos" => "Explosion",
            "DNI" => ""
        );        
    }else{// Usuario no reconocido
        $datos = array(
            "rol" => "desconocido",
            "nombre" => "",
            "apellidos" => "",
            "DNI" => ""
        );
    }
       // Convertir el array a formato JSON
        $json_data = json_encode(value: $datos);
        // Enviar el JSON como respuesta
        header(header: 'Content-Type: application/json');
        echo $json_data;   
} else {
    // Enviar mensaje de error si no es una solicitud POST
    echo "Error en PHP: Método de solicitud no válido.";
}

?>
    
</body>
</html>