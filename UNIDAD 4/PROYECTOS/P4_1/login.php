<?php
session_start();

// 🧪 Comprobamos si el username ha enviado el formulario (método POST)
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // 📥 Capturamos los datos enviados desde el formulario HTML
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = htmlspecialchars($_POST['password']);

    //Y vuelvo a usar mis funciones.
    include 'funciones.php';    
    validarPassword($password);    

    // ✅ Verificamos la contraseña cifrada con password_verify
    if (password_verify($password, $usuarioEncontrado['password'])) {

        // 🔄2.- Reforzamos la seguridad regenerando el ID de sesión actual.
        session_regenerate_id(true);

        // 💾3.- Guardamos el nombre de username en una variable de sesión
        $_SESSION['email'] = $email;

        // 📱4.- Guardamos el agente del username (navegador) para detectar cambios sospechosos
        $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];

        // ⏳5.- Guardamos la hora actual para controlar el tiempo de inactividad
        $_SESSION['last_activity'] = time();

        // ✅6.- Redirigimos al archivo seguro (zona privada)
        header("Location: secure.php");
        exit;

    } else {
        // ❌ Si la contraseña no coincide, mostramos mensaje de error
        echo "email o contraseña incorrectos.";
    }

} else {
    // 🚫 Si se accede sin POST (por ejemplo, escribiendo la URL), bloqueamos la entrada
    echo "Acceso no permitido.";
}
?>