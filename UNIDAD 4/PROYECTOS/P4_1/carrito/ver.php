<?php
//Muestra el contenido del carrito.

require_once '../includes/funciones.php';
require_once '../includes/seguridad.php';

$carrito = obtenerCarrito();
$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tu Carrito</title>
</head>
<body>
    <h1>Carrito de Compras</h1>
    <a href="../index.php">← Volver a la tienda</a><br><br>

    <?php if (empty($carrito)): ?>
        <p>El carrito está vacío.</p>
    <?php else: ?>
        <table border="1" cellpadding="10">
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Acciones</th>
            </tr>
            <!--Con un foreach recorremos el carrito para mostrar cada producto y añadir el precio al subtotal y al total.-->
            <?php foreach ($carrito as $id => $cantidad): 
                $producto = obtenerProductoPorId($id);
                if (!$producto) continue;
                $subtotal = $producto['precio'] * $cantidad;
                $total += $subtotal;
            ?>
            <tr>
            <!--Y mostramos cada producto-->
                <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                <td><?php echo number_format($producto['precio'], 2); ?>€</td>
                <td><?php echo $cantidad; ?></td>
                <td><?php echo number_format($subtotal, 2); ?>€</td>
                <td>
            <!--Y este enlace te envía a eliminar.php, donde se elimina el producto del carrito.-->
                    <a href="eliminar.php?id=<?php echo $id; ?>">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <h3>Total: <?php echo number_format($total, 2); ?>€</h3>
    <?php endif; ?>
</body>
</html>
