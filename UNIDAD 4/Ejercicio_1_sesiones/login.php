
<?php
session_start();

define("USERNAME", "usuario_prueba");
define("PASSWORD", "contrasena_segura"); // en un caso real, almacenada como un hash
define("INACTIVITY_TIME", 300); // 5 minutos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === USERNAME && $password === PASSWORD) {
        session_regenerate_id(true);
        $_SESSION['username'] = $username;
        $_SESSION['logged_in'] = true;
        $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
        $_SESSION['last_activity'] = time();
        header("Location: secure.php");
        exit;
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>
