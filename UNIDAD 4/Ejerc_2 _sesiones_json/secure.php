<?php
// 🧠 Siempre iniciamos la sesión antes de usar $_SESSION
session_start();
//VERIFICACIONES:

//🕵️‍♂️#1: Comprobamos si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit;
}

//🧪#2: Validamos el agente del navegador para evitar secuestros de sesión
if ($_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
    // 🚨 El agente cambió → posible ataque. Destruimos la sesión.
    session_unset();
    session_destroy();
    header("Location: login.html");
    exit;
}

//⏱#3: Comprobamos el tiempo de inactividad
$timeout = 600; // 10 minutos = 600 segundos

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $timeout)) {
    //💤Tiempo superado → cerramos la sesión automáticamente por seguridad
    session_unset();
    session_destroy();
    header("Location: login.html");
    exit;
}

//🟢Si pasó todas las verificaciones, actualizamos el timestamp de actividad
$_SESSION['last_activity'] = time();
?>

<h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h2>
<p>Estás dentro de la zona segura 🚀</p>
<a href="logout.php">Cerrar sesión</a>
