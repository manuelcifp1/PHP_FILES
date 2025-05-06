<?php
// 🧠 Primero comprobamos si se ha enviado el formulario mediante método GET y si existe el parámetro 'tema'
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['tema'])) {
    $tema = $_GET['tema']; // Capturamos el valor del tema enviado por el formulario
    // 🍪 Guardamos el tema elegido en una cookie llamada 'tema' que durará 30 minutos
    setcookie('tema', $tema, time() + 60 * 30); // 60 segundos * 30 = 1800 segundos = 30 minutos
}

// 📥 Luego leemos la cookie (si existe) para saber qué tema aplicar
// Si no existe la cookie aún, usamos como valor por defecto 'claro'
$temaSeleccionado = $_COOKIE['tema'] ?? 'claro';

// 🎨 Ahora decidimos los estilos CSS que vamos a aplicar al <body> según el tema elegido
if ($temaSeleccionado === 'oscuro') {
    $estiloBody = 'background-color: #222; color: white;'; // Tema oscuro: fondo oscuro, texto blanco
} else {
    $estiloBody = 'background-color: white; color: black;'; // Tema claro: fondo blanco, texto negro
}
?>
<!DOCTYPE html>
<!--
Actividad A4-2.
Desarrolla un sistema en PHP que permita a los usuarios elegir un tema de color (por ejemplo, claro u oscuro) 
y que guarde esta preferencia en una cookie para recordar su selección en futuras visitas.

- Usa la función setcookie() de PHP para guardar la preferencia.
- Lee el valor de la cookie usando $_COOKIE al cargar la página.
- Aplica los estilos CSS en función del valor de la cookie para cambiar el tema de la página.
- El tema por defecto será claro.
-->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tema sin clases</title>
</head>
<!-- Aplicamos el estilo dinámicamente en la etiqueta <body> usando PHP -->
<body style="<?= $estiloBody ?>">

    <h1>Preferencia de tema</h1>

    <!-- Formulario para elegir el tema -->
    <form method="get" action="">
        <p>Elige un tema de fondo:</p>

        <!-- Opción de tema claro -->
        <label>
            <!-- 
            Si el tema seleccionado es 'claro', marcamos este radio button como 'checked'.
            Así cuando el usuario recarga la página, verá su elección recordada.
            -->
            <input type="radio" name="tema" value="claro" <?= $temaSeleccionado === 'claro' ? 'checked' : '' ?>>
            Tema claro
        </label>

        <!-- Opción de tema oscuro -->
        <label>
            <input type="radio" name="tema" value="oscuro" <?= $temaSeleccionado === 'oscuro' ? 'checked' : '' ?>>
            Tema oscuro
        </label>

        <!-- Botón para enviar el formulario -->
        <button type="submit">Guardar tema</button>
    </form>

</body>
</html>
