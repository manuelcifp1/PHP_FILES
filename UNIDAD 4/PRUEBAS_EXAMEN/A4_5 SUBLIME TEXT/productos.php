<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <style>
        .tabla {
            border: 2px solid black;
            border-collapse: collapse;

        }

        th, td {
            border: 2px solid black;

        }
    </style>
    <?php
    //SESSION START
    session_start();
    include "funciones.php";

    //CONECTAR A LA DB
    $db = conectarDB();

    //ASIGNAR A $RESULTADO UNA QUERY TOTAL
    $resultado = $db->query("SELECT nombre, descripcion, precio, stock FROM productos");

    //SI EL NÚMERO DE FILAS ES MAYOR QUE 0
    if($resultado->num_rows > 0) {

        //CONSTRUYE LA TABLA DINÁMICAMENTE
        echo "<table class='tabla'>";
        echo "<tr><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Stock</th></tr>";

        //MIENTRAS $PRODUCTO = $RESULTADO->FETCH_ASSOC(), CREAMOS CADA <TR>
        while($producto = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($producto['nombre']) . "</td>";
            echo "<td>" . htmlspecialchars($producto['descripcion']) . "</td>";
            echo "<td>" . htmlspecialchars($producto['precio']) . "€</td>";
            echo "<td>" . htmlspecialchars($producto['stock']) . "</td>";
            echo "<td>";

            //SI $PRODUCTO['STOCK'] > 0 CREAMOS BOTÓN, SI NO, MENSAJE SIN STOCK.
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