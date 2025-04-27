<?php
// --- Archivo: ver_carrito.php ---

session_start(); // Iniciamos la sesión para poder acceder a $_SESSION

// Simulamos "base de datos" de productos
$productos = [
    1 => ['nombre' => 'Camiseta', 'precio' => 20],
    2 => ['nombre' => 'Pantalón', 'precio' => 30],
    3 => ['nombre' => 'Zapatos', 'precio' => 50]
];

// Comprobar si se ha solicitado vaciar el carrito
if (isset($_GET['vaciar']) && $_GET['vaciar'] == 1) {
    if (isset($_SESSION['username'])) {
        unset($_SESSION['carrito']); // Usuario registrado: vaciar la sesión
    } else {
        setcookie('carrito', '', time() - 3600); // Invitado: eliminar la cookie
    }
    header('Location: ver_carrito.php'); // Redireccionar para actualizar
    exit;
}

// Cargar los datos del carrito según si es usuario o invitado
if (isset($_SESSION['username'])) {
    $carrito = $_SESSION['carrito'] ?? [];
} else {
    $carrito = isset($_COOKIE['carrito']) ? json_decode($_COOKIE['carrito'], true) : [];
}

// Mostrar el contenido del carrito
if (empty($carrito)) {
    echo "<p>El carrito está vacío.</p>";
} else {
    echo "<table border='1'>";
    echo "<tr><th>Producto</th><th>Precio unitario</th><th>Cantidad</th><th>Subtotal</th></tr>";

    $total = 0; // Inicializamos el total a 0

    // Recorrer el carrito y mostrar cada producto
    foreach ($carrito as $product_id => $cantidad) {
        if (isset($productos[$product_id])) {
            $nombre = $productos[$product_id]['nombre'];
            $precio = $productos[$product_id]['precio'];
            $subtotal = $precio * $cantidad; // Precio por cantidad
            $total += $subtotal; // Sumamos al total general

            echo "<tr>";
            echo "<td>$nombre</td>";
            echo "<td>\$ $precio</td>";
            echo "<td>$cantidad</td>";
            echo "<td>\$ $subtotal</td>";
            echo "</tr>";
        }
    }

    // Mostrar el total final
    echo "<tr><td colspan='3'><strong>Total</strong></td><td><strong>\$ $total</strong></td></tr>";
    echo "</table>";
}

// Botón para vaciar el carrito
echo '<p><a href="ver_carrito.php?vaciar=1">Vaciar Carrito</a></p>';

// Enlace para volver a agregar más productos
echo '<p><a href="agregar_al_carrito.php">Volver a la tienda</a></p>';
?>