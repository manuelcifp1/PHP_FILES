<?php

//SESSION_START
session_start();

//ENVÍO DATOS Y VALIDACIONES
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);

	include "funciones.php";

	validarUsername($username);
	validarPassword($password);

	//ASIGNAMOS A $USUARIOENCONTRADO BUSCARUSERNAME($USERNAME)
	$usuarioEncontrado = buscarUsername($username);

	//SI !$USUARIOENCONTRADO, MENSAJE NO REGISTRADO, ENLACE A REGISTRO, EXIT;
	if(!$usuarioEncontrado) {
		echo "<p>Usuario no registrado</p>";
		echo "<p><a href= 'registro.php'>Ir a registro</a></p>";
		exit;
	}

	//USUARIO ENCONTRADO, PASSWORD_VERIFY DE $PASSWORD, $USUARIOENCONTRADO['PASSWORD'];
	if(password_verify($password, $usuarioEncontrado['password'])) {

		//SESSION_REGENERATE_ID(TRUE) Y RESTO DE SECURES + HEADER A SECURE.PHP + EXIT
		session_regenerate_id(true);

		$_SESSION['username'] = $username;
		$_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
		$_SESSION['last_activity'] = time();

		header("Location: secure.php");
		exit;
		//ELSE DE DATOS INCORRECTOS
	} else {
		echo "<p>Usuario o contraseña incorrectos.</p>";
	}
//ELSE FINAL DE ACCESO NO AUTORIZADO	
} else {
	echo "<p>Acceso no autorizado</p>";
	
}
 
?>


