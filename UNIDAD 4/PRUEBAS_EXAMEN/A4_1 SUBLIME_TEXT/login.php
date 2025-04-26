<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);

	include "funciones.php";

	validarUsername($username);
	validarPassword($password);

	$usuarioEncontrado = buscarUsername($username);

	if(!$usuarioEncontrado) {
		echo "<p>Usuario no registrado</p>";
		echo "<p><a href='registro.php'>IR AL REGISTRO</a></p>";
		exit;
	}

	if (password_verify($password, $usuarioEncontrado['password'])) {

		session_regenerate_id(true);

		$_SESSION['username'] = $username;

		$_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];

		$_SESSION['last_activity'] = time();

		header("Location: secure.php");
		exit;
	} else {
		echo "<p>Usuario o contraseña incorrectos.</p>";
	}
} else {
	echo "<p>Acceso no permitido</p>";
}
 
?>


