<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD con DataTables (OOP)</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>CRUD con DataTables y POO</h1>
        <button id="addUser">Agregar Usuario</button>
        <table id="userTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>

    <script>
        $(document).ready(function () {
            const table = $('#userTable').DataTable({
                ajax: 'api.php?action=read',
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'email' },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return `
                                <button onclick="editUser(${row.id}, '${row.name}', '${row.email}')">Editar</button>
                                <button onclick="deleteUser(${row.id})">Eliminar</button>
                            `;
                        }
                    }
                ]
            });

            $('#addUser').on('click', function () {
                const name = prompt('Nombre:');
                const email = prompt('Email:');
                $.post('api.php?action=create', { name, email }, function () {
                    table.ajax.reload();
                });
            });
        });

        function editUser(id, name, email) {
            const newName = prompt('Nuevo nombre:', name);
            const newEmail = prompt('Nuevo email:', email);
            $.post('api.php?action=update', { id, name: newName, email: newEmail }, function () {
                $('#userTable').DataTable().ajax.reload();
            });
        }

        function deleteUser(id) {
            if (confirm('¿Estás seguro de eliminar este usuario?')) {
                $.post('api.php?action=delete', { id }, function () {
                    $('#userTable').DataTable().ajax.reload();
                });
            }
        }
    </script>
</body>
</html>
