<!DOCTYPE html>
<html>
<head>
    <title>Lista de Contactos</title>
</head>
<body>
    <h1>Contactos de <?= htmlspecialchars($_SESSION['username']) ?></h1>
    <a href="logout.php">Cerrar sesión</a> |
    <a href="contacto.php?action=create">Añadir Contacto</a>

    <form method="GET" action="contacto.php">
        <input type="hidden" name="action" value="list">
        Mostrar
        <input type="number" name="limit" value="<?= $limite ?>" min="1" style="width: 60px;">
        registros por página
        <button type="submit">Actualizar</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactos as $contacto): ?>
                <tr>
                    <td><?= htmlspecialchars($contacto['nombre']) ?></td>
                    <td><?= htmlspecialchars($contacto['telefono']) ?></td>
                    <td><?= htmlspecialchars($contacto['email']) ?></td>
                    <td><?= htmlspecialchars($contacto['direccion']) ?></td>
                    <td>
            <!--Los enlaces de la tabla de contactos envían el caso pertinente (edit, delete, list) al controlador contacto.php-->
                        <a href="contacto.php?action=edit&id=<?= $contacto['id'] ?>">Editar</a>
                        <a href="contacto.php?action=delete&id=<?= $contacto['id'] ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div>
        <?php if ($paginaActual > 1): ?>
            <a href="contacto.php?action=list&page=<?= $paginaActual - 1 ?>&limit=<?= $limite ?>">Anterior</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
            <a href="contacto.php?action=list&page=<?= $i ?>&limit=<?= $limite ?>" <?= $i === $paginaActual ? 'style="font-weight: bold;"' : '' ?>>
                <?= $i ?>
            </a>
        <?php endfor; ?>

        <?php if ($paginaActual < $totalPaginas): ?>
            <a href="contacto.php?action=list&page=<?= $paginaActual + 1 ?>&limit=<?= $limite ?>">Siguiente</a>
        <?php endif; ?>
    </div>
</body>
</html>
