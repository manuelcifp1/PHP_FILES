<?php

session_start();

if(!isset($_SESSION['username'])) {
	header("Location: login.html");
	exit;
}

if($_SESSION["user_agent"] !== $_SERVER['HTTP_USER_AGENT']) {
	session_unset();
	session_destroy();
	header("Location: login.html");
	exit;
}

$timeout = 600;

if(isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout) {
	session_unset();
	session_destroy();
	header("Location: login.html");
	exit;
}

$_SESSION['last_activity'] = time();

?>

<h2>¡BIENVENIDO <?= $_SESSION['username'] ?>!</h2>
<p>Estás en zona segura.</p>
<p><a href="logout.php">Cerrar sesión.<a></p>