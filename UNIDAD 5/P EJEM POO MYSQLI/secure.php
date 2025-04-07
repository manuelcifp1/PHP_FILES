<?php
session_start();

// Verifica que el usuario esté autenticado
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<h1>Bienvenido, <?= htmlspecialchars($_SESSION['usuario']) ?> 👋</h1>
<p>Has accedido al área protegida.</p>
<a href="logout.php">Cerrar sesión</a>
