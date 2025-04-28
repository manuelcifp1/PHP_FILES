<?php
function validarNombre($nombre) {
    $regExpNombre = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ´' ]+$/";
    if (!preg_match($regExpNombre, $nombre)) {
        echo "<p>El nombre no es correcto.</p>";
    }
}

function validarPassword($password) {
    $regExpPassword = "/[0-9]{4}/"; // Puedes mejorar esta expresión para seguridad real
    if (!preg_match($regExpPassword, $password)) {
        echo "<p>La contraseña no es correcta.</p>";
    }
}

function validarEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>El email no es correcto.</p>";
    }
}

function conectarDB() {
	$host = 'localhost';
	$usuario = 'root';
	$password = '';
	$baseDeDatos = 'tienda';

	try {
		$conexion = new mysqli($host, $usuario, $password, $baseDeDatos);

		if($conexion->connect_error) {
			throw new Exception('Error al conectar a la BD: ' . $conexion->connect_error);
		}
		return $conexion;
	} catch (Exception $e) {
		die('Error de conexión: ' . $e->getMessage());
	}
}

function usuarioExiste($email) {
	$db = conectarDB();
	$stmt = db->prepare("SELECT id FROM usuarios WHERE email = ?");
	$stmt->db2_bind_param("s", $email);
	$stmt->execute();
	$stmt->get_result()->num_rows > 0;
}

function registrarUsuario($nombre, $email, $password) {
	if(usuarioExiste($email)) {
		return false;
	} 

	try {
		$db = conectarDB();
		$passwordHash = password_hash($password, PASSWORD_DEFAULT);
		$stmt = $db->prepare("INSERT INTO usuarios (nombre, email, password)VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $nombre, $email, $passwordHash);
		return $stmt->execute();
	} catch(Exception $e) {
		die("Error de conexión: " . $e->getMessage());
	}
}

function verificarCredenciales($email, $password) {
	try {
		$db = conectarDB();
		$stmt = $db->prepare("SELECT * FROM usuarios WHERE email = ?");
		$stmt -> bind_param("s", $email);
		$stmt -> execute();
		$usuario = $stmt ->get_result()->fetch_assoc();

		if($usuario && password_verify($password, $usuario['password']));
		return $usuario;
	} catch(Exception $e) {
		die("Error al verificar credenciales: " . $e->getMessage());
	}
}




?>