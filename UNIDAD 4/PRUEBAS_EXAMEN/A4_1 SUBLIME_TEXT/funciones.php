<?php

function validarUsername($username) {
	$regExUsername = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ´' ]$/";
	if(!preg_match(regExUsername, $username)) {
		echo "<p style= 'color: red;'>Usuario inválido.</p>";
	}
	

}

function validarPassword($password) {
	$regPassword = "/[0-9]{4}/";
	if(!preg_match(regPassword, $password)) {
		echo "<p style= 'color: red;'>Contraseña inválida.</p>";
	}
}

function validarEmail($email) {
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "<p style= 'color: red;'>Email inválido.</p>";
	}
	
}

function buscarUsername($username) {
	$usernames = obtenerUsernames();
	foreach ($usernames as $user) {
		if($user['username'] == $username) {
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
	file_put_contents(__DIR__ . "/Usuarios/usuarios.json", $usernames, JSON_PRETTY_PRINT);
}

?>

