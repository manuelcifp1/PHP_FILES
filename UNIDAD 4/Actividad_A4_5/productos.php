<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
<!-- 
Mostrar Lista de Productos desde la Base de Datos:
- Muestra productos en tabla.
- Incluye nombre, descripción, precio, stock.
- Botón "Añadir al carrito" si stock > 0.
-->

<?php
session_start();
include "funciones.php"; // Usamos la conexión a la BD

$db = conectarDB();

// Consulta para obtener productos
$resultado = $db->query("SELECT nombre, descripcion, precio, stock FROM productos");

if ($resultado->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Stock</th><th>Acción</th></tr>";

    while ($producto = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($producto['nombre']) . "</td>";
        echo "<td>" . htmlspecialchars($producto['descripcion']) . "</td>";
        echo "<td>" . htmlspecialchars($producto['precio']) . " €</td>";
        echo "<td>" . htmlspecialchars($producto['stock']) . "</td>";
        echo "<td>";

        // Si hay stock, mostramos botón
        if ($producto['stock'] > 0) {
            echo "<form method='post' action='carrito.php'>";
            echo "<input type='hidden' name='producto' value='" . htmlspecialchars($producto['nombre']) . "'>";
            echo "<button type='submit'>Añadir al carrito</button>";
            echo "</form>";
        } else {
            echo "Sin stock";
        }

        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No hay productos disponibles.</p>";
}
?>
</body>
</html>
