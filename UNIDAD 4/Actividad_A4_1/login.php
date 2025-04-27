<?php
// 🧠 Iniciamos la sesión para poder usar $_SESSION y asociar datos a este username
session_start();

// 🧪 Comprobamos si el username ha enviado el formulario (método POST)
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // 📥 Capturamos los datos enviados desde el formulario HTML
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Y vuelvo a usar mis funciones.
    include 'funciones.php';
    validarUsername($username);
    validarPassword($password);

    $username = htmlspecialchars($username);    

    // ✅ Obtenemos el array del usuario si está registrado (o null si no lo está)
    $usuarioEncontrado = buscarUsername($username);

    if (!$usuarioEncontrado) {
        echo "<p>Usuario no registrado, regístrese.</p><br>";
        echo "<a href='./registro.php'>IR A REGISTRO</a>";        
        exit;
    }

    // ✅ Verificamos la contraseña cifrada con password_verify
    if (password_verify($password, $usuarioEncontrado['password'])) {

        // 🔄2.- Reforzamos la seguridad regenerando el ID de sesión actual.
        session_regenerate_id(true);

        // 💾3.- Guardamos el nombre de username en una variable de sesión
        $_SESSION['username'] = $username;

        // 📱4.- Guardamos el agente del username (navegador) para detectar cambios sospechosos
        $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];

        // ⏳5.- Guardamos la hora actual para controlar el tiempo de inactividad
        $_SESSION['last_activity'] = time();

        // ✅6.- Redirigimos al archivo seguro (zona privada)
        header("Location: secure.php");
        exit;

    } else {
        // ❌ Si la contraseña no coincide, mostramos mensaje de error
        echo "usuario o contraseña incorrectos.";
    }

} else {
    // 🚫 Si se accede sin POST (por ejemplo, escribiendo la URL), bloqueamos la entrada
    echo "Acceso no permitido.";
}
?>
