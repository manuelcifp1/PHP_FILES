<?php
session_start();
require_once 'classes/Database.php';
require_once 'classes/Auth.php';

$database = new Database();
$auth = new Auth($database);

$error = '';

// Si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $clave = trim($_POST['clave'] ?? '');

    $resultado = $auth->login($usuario, $clave);

    if ($resultado === true) {
        header('Location: secure.php');
        exit;
    } else {
        $error = $resultado; // Mensaje de error devuelto desde Auth
    }
}
?>

<!-- Formulario HTML -->
<h2>Login</h2>
<form method="post" novalidate>
    <input type="text" name="usuario" placeholder="Usuario" required><br>
    <input type="password" name="clave" placeholder="Clave" required><br>
    <button type="submit">Entrar</button>
</form>

<?php if ($error): ?>
    <p style="color:red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
