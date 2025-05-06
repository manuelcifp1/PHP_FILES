<?php
// --- Archivo: agregar_al_carrito.php ---

session_start();

// Simulamos una "base de datos" de productos
$productos = [
    1 => ['nombre' => 'Camiseta', 'precio' => 20],
    2 => ['nombre' => 'Pantalón', 'precio' => 30],
    3 => ['nombre' => 'Zapatos', 'precio' => 50]
];

// Comprobamos que llegue un product_id por GET
if (isset($_GET['product_id'])) {
    $product_id = (int) $_GET['product_id'];

    // Verificamos que el producto exista
    if (isset($productos[$product_id])) {

        if (isset($_SESSION['username'])) {
            // Usuario registrado: guardamos en sesión
            if (!isset($_SESSION['carrito'])) {
                $_SESSION['carrito'] = [];
            }
            $_SESSION['carrito'][$product_id] = ($_SESSION['carrito'][$product_id] ?? 0) + 1;
        } else {
            // Invitado: guardamos en cookie
            $carrito = isset($_COOKIE['carrito']) ? json_decode($_COOKIE['carrito'], true) : [];
            $carrito[$product_id] = ($carrito[$product_id] ?? 0) + 1;
            setcookie('carrito', json_encode($carrito), time() + 3600); // 1 hora
        }

        echo "<p>Producto añadido al carrito correctamente.</p>";
    } else {
        echo "<p>Producto no encontrado.</p>";
    }
} else {
    echo "<p>No se especificó un producto.</p>";
}

// Enlace para ver el carrito
echo '<p><a href="ver_carrito.php">Ver Carrito</a></p>';
?>