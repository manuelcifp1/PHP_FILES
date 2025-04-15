<?php
//Aquí se reciben los datos de los formularios del menú de productos y se agregan al carrito.

require_once '../includes/funciones.php';
require_once '../includes/seguridad.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $cantidad = isset($_POST['cantidad']) ? (int)$_POST['cantidad'] : 1;

    $producto = obtenerProductoPorId($id);

    if ($producto && $cantidad > 0 && $cantidad <= $producto['stock']) {
        agregarAlCarrito($id, $cantidad);
    }
}

header('Location: ../index.php');
exit;
