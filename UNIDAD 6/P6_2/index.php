<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos - Tienda</title>
    <!-- DataTables CSS y jQuery -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <?php
    require_once 'auth/seguridad.php';
    Seguridad::verificarSesion();

    $rol = $_SESSION['rol']; // 'admin' o 'cliente'
    ?>

    <div class="container">
        <h1>Gestión de Productos</h1>
        <a href="index_carrito.php">Ver mi carrito</a>


        <!-- Botón solo visible para el administrador -->
        <?php if ($rol === 'admin'): ?>
            <button id="addProduct">Agregar Producto</button>
        <?php endif; ?>

        <!-- Tabla de productos -->
        <table id="productTable" class="display">
            <thead>
                <tr>
                    <th>NºInventario</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>

    <script>
        $(document).ready(function () {
            const rol = '<?= $rol ?>';

            const table = $('#productTable').DataTable({
                ajax: 'api.php?entity=producto&action=read',
                columns: [
                    { data: 'idinventario' },
                    { data: 'nombre' },
                    { data: 'descripcion' },
                    { data: 'stock' },
                    {
                        data: null,
                        render: function (data, type, row) {
                            if (rol === 'admin') {
                                // Botones CRUD para administrador
                                return `
                                    <button onclick="editProduct(${row.idinventario}, '${row.nombre}', '${row.descripcion}', ${row.stock})">Editar</button>
                                    <button onclick="deleteProduct(${row.idinventario})">Eliminar</button>
                                `;
                            } else {
                                // Botón solo para añadir al carrito para cliente
                                return `
                                    <button onclick="addToCart(${row.idinventario})">Añadir al carrito</button>
                                `;
                            }
                        }
                    }
                ]
            });

            // Acción agregar producto (admin)
            <?php if ($rol === 'admin'): ?>
            $('#addProduct').on('click', function () {
                const nombre = prompt('Nombre del producto:');
                const descripcion = prompt('Descripción corta:');
                const stock = prompt('Stock:');
                $.post('api.php?entity=producto&action=create', { nombre, descripcion, stock }, function () {
                    table.ajax.reload();
                });
            });

            window.editProduct = function (id, nombre, descripcion, stock) {
                const newNombre = prompt('Nuevo nombre:', nombre);
                const newDescripcion = prompt('Nueva descripción:', descripcion);
                const newStock = prompt('Nuevo stock:', stock);
                $.post('api.php?entity=producto&action=update', { idinventario: id, nombre: newNombre, descripcion: newDescripcion, stock: newStock }, function () {
                    table.ajax.reload();
                });
            };

            window.deleteProduct = function (id) {
                if (confirm('¿Seguro que deseas eliminar este producto?')) {
                    $.post('api.php?entity=producto&action=delete', { idinventario: id }, function () {
                        table.ajax.reload();
                    });
                }
            };
            <?php endif; ?>

            // Acción añadir al carrito (cliente)
            window.addToCart = function (idinventario) {
                const unidades = prompt('¿Cuántas unidades quieres añadir?');
                $.post('api.php?entity=carrito&action=add', { idinventario, unidades }, function (response) {
                    alert(response.success ? 'Producto añadido al carrito' : 'Error al añadir');
                }, 'json');
            };
        });
    </script>
</body>
</html>
