<?php
//La página principal, donde se muestra el menú de productos y diferentes enlaces.

require_once 'includes/funciones.php';
require_once 'includes/seguridad.php';

//Uso esta función para obtener un array asociativo con los productos.
$productos = obtenerProductos();
//Si existe un usuario en la sesión, se guarda su nombre en la variable $usuario; si no, se asigna "Invitado".
$usuario = $_SESSION['usuario']['nombre'] ?? 'Invitado';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($usuario); ?></h1>

    <nav>
        <!--Aquí se controlan los enlaces que se muestran según sea la situación del usuario.-->
        <?php if (esUsuarioAutenticado()): ?>        
            <a href="auth/logout.php">Cerrar sesión</a>
        <?php else: ?>            
            <a href="auth/login.php">Iniciar sesión</a> |
            <a href="auth/register.php">Registrarse</a>
        <?php endif; ?>
        | <a href="carrito/ver.php">Ver Carrito</a>
    </nav>

    <h2>Productos Disponibles</h2>
        <!--Con un foreach, se recorre el array productos para mostrar el menú de productos, añadiendo un formulario
        para poder agregarlos al carrito.-->        
    <?php foreach ($productos as $producto): ?>
        <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
            <h3><?php echo htmlspecialchars($producto['nombre']); ?></h3>
            <p><?php echo htmlspecialchars($producto['descripcion']); ?></p>
            <p>Precio: <?php echo number_format($producto['precio'], 2); ?>€</p>
            <p>Stock: <?php echo $producto['stock']; ?></p>

            <form method="POST" action="carrito/agregar.php">
                <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                <label for="cantidad_<?php echo $producto['id']; ?>">Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad_<?php echo $producto['id']; ?>" value="1" min="1" max="<?php echo $producto['stock']; ?>">
                <button type="submit">Agregar al carrito</button>
            </form>
        </div>
    <?php endforeach; ?>
</body>
</html>
