<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = $_POST['username'];
	$password = $_POST['password'];

	include 'funciones.php';

validarUsername($username);
validarPassword($password);

$usuarioEncontrado = buscarUsername($username);

if(!$usuarioEncontrado) {
	echo "<p>Usuario no encontrado.</p><br>";
	echo "<p><a>IR A REGISTRO</a></p>";
	exit;
}

	if(password_verify($password, $usuarioEncontrado['password'])) {

		session_regenerate_id(true);

		$_SESSION['username'] = $username;

		$_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];

		$_SESSION['last_activity'] = time();

		header("Location: secure.php");
	} else {
		echo "Usuario o contraseña no existen.";
	}


} else {
	echo "Acceso no permitido.";
}

