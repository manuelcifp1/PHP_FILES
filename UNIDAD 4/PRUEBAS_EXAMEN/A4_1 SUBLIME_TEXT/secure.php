<?php

//SESSION_START()
session_start();

//SI NO EXISTE $_SESSION['USERNAME'] A LOGIN.HTML + EXIT
if(!isset($_SESSION['username'])) {
	header("Location: login.html");
	exit;
}

//SI USER_AGENT SON DISTINTOS, CERRAMOS SESIÓN + A LOGIN.HTML + EXIT
if($_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
	session_unset();
	session_destroy();
	header("Location: login.html");
	exit;
}

//ESTABLECEMOS EL $TIMEOUT
$timeout = 600;

//SI EXISTE $_SESSION['LAST_ACTIVITY'] && HORA ACTUAL - LAST_ACTIVITY ES > $TIMEOUT, CIERRA SESIÓN + A LOGIN.HTML + EXIT
if(isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > $timeout) {
	session_unset();
	session_destroy();
	header("Location: login.html");
	exit;
}

//RESTABLECEMOS last_activity
$_SESSION['last_activity'] = time();
?>

<!--MENSAJES DE BIENVENIDA + LOGOUT-->
<h2>Bienvenido <?= $_SESSION['username'] ?> </h2>
<p>Estás en zona segura</p>
<a href="logout.php">CERRAR SESIÓN</a>