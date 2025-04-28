<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <?php
    session_start();
    include "funciones.php";

    $db = conectarDB();

    $resultado = $db->query("SELECT nombre, descripcion, precio, stock FROM productos");

    if($resultado->num_rows > 0) {
        echo "<table style='border: solid, 2px, black;'>";
        echo "<tr><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Stock</th></tr>";

        while($producto = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($producto['nombre']) . "</td>";
            echo "<td>" . htmlspecialchars($producto['descripcion']) . "</td>";
            echo "<td>" . htmlspecialchars($producto['precio']) . "€</td>";
            echo "<td>" . htmlspecialchars($producto['stock']) . "</td>";
            echo "<td>";

            if($producto['stock'] > 0) {
                echo "<button>Añadir al carrito</button>";
            } else {
                echo "Sin stock";
            }
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No hay productos disponibles</p>";
    }

    ?>
</body>
</html>