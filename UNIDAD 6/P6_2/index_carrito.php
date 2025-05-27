<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Tu Carrito de Compras</h1>

        <table id="cartTable" class="display">
            <thead>
                <tr>
                    <th>ID Carrito</th>
                    <th>ID Producto</th>
                    <th>Unidades</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>

    <script>
        $(document).ready(function () {
            const table = $('#cartTable').DataTable({
                ajax: 'api.php?entity=carrito&action=read',
                columns: [
                    { data: 'idcarrito' },
                    { data: 'idinventario' },
                    { data: 'nombre_producto' }, // ← nueva columna
                    { data: 'unidades' },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return `
                                <button onclick="updateCart(${row.idcarrito}, ${row.unidades})">Actualizar</button>
                                <button onclick="deleteCart(${row.idcarrito})">Eliminar</button>
                            `;
                        }
                    }
                ]
            });

            window.updateCart = function (idcarrito, unidades) {
                const newUnits = prompt('Nueva cantidad:', unidades);
                $.post('api.php?entity=carrito&action=update', { idcarrito, unidades: newUnits }, function () {
                    table.ajax.reload();
                });
            };

            window.deleteCart = function (idcarrito) {
                if (confirm('¿Seguro que deseas eliminar este producto del carrito?')) {
                    $.post('api.php?entity=carrito&action=delete', { idcarrito }, function () {
                        table.ajax.reload();
                    });
                }
            };
        });
    </script>
</body>
</html>
