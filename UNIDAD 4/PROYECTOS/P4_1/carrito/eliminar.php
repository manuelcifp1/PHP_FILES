<?php
//Aquí se elimina un producto del carrito.

require_once '../includes/funciones.php';
require_once '../includes/funciones.php';


if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    eliminarDelCarrito($id);
}

//Redirige a ver.php para mostrar el carrito actualizado.
header('Location: ver.php');
exit;
