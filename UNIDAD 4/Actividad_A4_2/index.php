
<?php
// Guardar la cookie si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['tema'])) {
    $tema = $_GET['tema'];
    setcookie('tema', $tema, time() + 60 * 30); // 30 minutos
}

// Leer la cookie o usar tema por defecto
$temaSeleccionado = $_COOKIE['tema'] ?? 'claro';

// Determinar el estilo según el tema
if ($temaSeleccionado === 'oscuro') {
    $estiloBody = 'background-color: #222; color: white;';
} else {
    $estiloBody = 'background-color: white; color: black;';
}
?>
<!DOCTYPE html>
<!--Actividad A4-2. Desarrolla un sistema en PHP que permita a los
usuarios elegir un tema de color (por ejemplo, claro u oscuro) y
que guarde esta preferencia en una cookie para recordar su
selección en futuras visitas.
● Usa la función setcookie() de PHP para guardar la preferencia.
● Lee el valor de la cookie usando $_COOKIE al cargar la página.
● Aplica los estilos CSS en función del valor de la cookie para
cambiar el tema de la página.
● El tema por defecto será claro.
-->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tema sin clases</title>
</head>
<body style="<?= $estiloBody ?>">
    <h1>Preferencia de tema</h1>

    <form method="get" action="">
        <p>Elige un tema de fondo:</p>

        <label>
            <input type="radio" name="tema" value="claro" <?= $temaSeleccionado === 'claro' ? 'checked' : '' ?>>
            Tema claro
        </label>

        <label>
            <input type="radio" name="tema" value="oscuro" <?= $temaSeleccionado === 'oscuro' ? 'checked' : '' ?>>
            Tema oscuro
        </label>

        <button type="submit">Guardar tema</button>
    </form>
</body>
</html>




