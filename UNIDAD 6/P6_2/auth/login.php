<?php
//Requerimos a la clase Seguridad y la clase Conexion
require_once 'seguridad.php';
Seguridad::iniciarSesion();
require_once '../model/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $password = trim($_POST['password']);

    /*Conecta a la BD, hace una consulta del nombre logeado y después comprueba
     si coincide nombre y contraseña con el registro obtenido en la consulta*/
    $db = Conexion::getInstance();
    $query = "SELECT * FROM usuarios WHERE nombre = :nombre";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);    

    if ($user && password_verify($password, $user['password'])) {
        /*Guardamos toda la información que podemos necesitar más adelante en la sesión
        y los datos de seguridad*/
        $_SESSION['usuario'] = $nombre;
        $_SESSION['idusuario'] = $user['idusuario'];
        $_SESSION['rol'] = $user['rol'];
        $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
        $_SESSION['last_activity'] = time();
        header("Location: ../index.php");
        exit;
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>

<!--Si el registro ha ido bien, recibimos un ok del header de registro y aparece un mensaje de éxito.-->
<?php if (isset($_GET['registro']) && $_GET['registro'] === 'ok'): ?>
    <p style="color: green;">¡Registro completado! Ahora inicia sesión.</p>
<?php endif; ?>

<!--Formulario de login-->
<form method="POST">
    Nombre: <input type="text" name="nombre" required><br>
    Contraseña: <input type="password" name="password" required><br>
    <button type="submit">Iniciar Sesión</button>
    <a href="registro.php">Registrarse</a>
</form>
