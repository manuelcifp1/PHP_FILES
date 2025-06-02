<!DOCTYPE html>
<html>
<head>
    <title>Editar Contacto</title>
</head>
<body>
    <h1>Editar Contacto</h1>
    <form method="POST" action="">
        <label>Nombre: <input type="text" name="nombre" value="<?= htmlspecialchars($contacto['nombre']) ?>" required></label><br>
        <label>Teléfono: <input type="text" name="telefono" value="<?= htmlspecialchars($contacto['telefono']) ?>" required></label><br>
        <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($contacto['email']) ?>" required></label><br>
        <label>Dirección: <input type="text" name="direccion" value="<?= htmlspecialchars($contacto['direccion']) ?>"></label><br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
