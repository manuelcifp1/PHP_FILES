
<?php
// 🧠 Iniciamos la sesión para poder usar $_SESSION y asociar datos a este usuario
session_start();

// 🧪 Comprobamos si el usuario ha enviado el formulario (método POST)
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // 📥 Capturamos los datos enviados desde el formulario HTML
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 👮‍♂️1.- Aquí se haría la verificación con una base de datos real.
    // Para este ejercicio, validamos contra valores fijos (modo demo)
    if ($username === "admin" && $password === "1234") {

        // 🔄2.- Reforzamos la seguridad regenerando el ID de sesión actual.
        // Esto ayuda a prevenir ataques de secuestro de sesión (session hijacking)
        session_regenerate_id(true);

        // 💾3.- Guardamos el nombre de usuario en una variable de sesión
        $_SESSION['username'] = $username;

        // 📱4.- Guardamos el agente del usuario (navegador) para detectar cambios sospechosos
        $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];

        // ⏳5.- Guardamos la hora actual para controlar el tiempo de inactividad
        $_SESSION['last_activity'] = time();

        // ✅6.- Redirigimos al archivo seguro (zona privada)
        header("Location: secure.php");
        exit;

    } else {
        // ❌ Si los datos no coinciden, mostramos mensaje de error (muy simple aquí)
        echo "Usuario o contraseña incorrectos.";
    }

} else {
    // 🚫 Si se accede sin POST (por ejemplo, escribiendo la URL), bloqueamos la entrada
    echo "Acceso no permitido.";
}
?>

