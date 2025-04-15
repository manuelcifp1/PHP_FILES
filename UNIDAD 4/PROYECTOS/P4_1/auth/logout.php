<?php
//Aquí se vacia le carrito y se cierra la sesión.

require_once '../includes/funciones.php';

//Vaciar carrito y cerrar sesión
vaciarCarrito();
session_unset();
session_destroy();

//Eliminar cookie si existe
if (isset($_COOKIE['carrito'])) {
    setcookie('carrito', '', time() - 3600, "/");
}

//Redirigir a la página principal
header("Location: ../index.php");
exit;
