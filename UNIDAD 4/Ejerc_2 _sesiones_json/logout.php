<?php
// 🧠 Empezamos la sesión para poder destruirla correctamente
session_start();

// 🧹 Limpiamos todas las variables de sesión
session_unset();

// 💣 Destruimos la sesión completamente (incluye el archivo del servidor si existe)
session_destroy();

// 🚪 Redirigimos al login (inicio)
header("Location: login.html");
exit;
?>