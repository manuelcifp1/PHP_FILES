<?php

//VALIDACIONES================================================================
function validarUsername($username) {
	$regExUsername = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ´' ]+$/";
	if(!preg_match($regExUsername, $username)) {
		echo "<p>Usuario no válido</p>";
	}
}

function validarPassword($password) {
	$regExPassword = "/[0-9]{4}/";
	if(!preg_match($regExPassword, $password)) {
		echo "<p>Contraseña no válida.</p>";
	}
}

function validarEmail($email) {
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "<p>Email no válido.</p>";
	}
}

//FUNCIONES PARA EL JSON==========================================================
function buscarUsername($username) {
	$usernames = obtenerUsernames();

	foreach ($usernames as $user) {
		if($user['username'] === $username) {
			return $user;
		}
	}
	return null;
}

function obtenerUsernames() {
	$ruta = __DIR__ . "/Usuarios/usuarios.json";

	if(!file_exists($ruta)) {
		return [];
	}
	$json = file_get_contents($ruta);
	return json_decode($json, true);  
}

function guardarUsername($nuevoUsername) {
	$usernames = obtenerUsernames();
	$usernames[] = $nuevoUsername;
	file_put_contents(__DIR__ . "/Usuarios/usuarios.json", json_encode($usernames, JSON_PRETTY_PRINT));
}

?>



