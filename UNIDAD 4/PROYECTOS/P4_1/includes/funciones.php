<?php

require_once __DIR__ . '/../config/db.php';
session_start();

//Devuelve true si el usuario ha iniciado sesión. 
function esUsuarioAutenticado() {
    return isset($_SESSION['usuario']);
}

//Obtiene todos los productos de la base de datos.
function obtenerProductos() {
    try {
        $db = conectarDB();
        $resultado = $db->query("SELECT * FROM productos");
        $productos = [];
        while ($row = $resultado->fetch_assoc()) {
            $productos[] = $row;
        }
        return $productos;
    } catch (Exception $e) {
        die("Error al obtener productos: " . $e->getMessage());
    }
}

//Obtiene un producto por su id.
function obtenerProductoPorId($id) {
    try {
        $db = conectarDB();
        $stmt = $db->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    } catch (Exception $e) {
        die("Error al obtener el producto: " . $e->getMessage());
    }
}

//Verifica si un usuario ya existe por su email.
function usuarioExiste($email) {
    $db = conectarDB();
    $stmt = $db->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    return $stmt->get_result()->num_rows > 0;
}

//Inserta al nuevo usuario en la BD con contraseña encriptada.
function registrarUsuario($nombre, $email, $password) {
    if (usuarioExiste($email)) {
        return false;
    }
    //Control con try/catch para conectar y añadir el nuevo registro.
    try {
        $db = conectarDB();
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $db->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $email, $passwordHash);
        return $stmt->execute();
    } catch (Exception $e) {
        die("Error al registrar usuario: " . $e->getMessage());
    }
}

//Verifica credenciales de inicio de sesión.
function verificarCredenciales($email, $password) {
    try {
        $db = conectarDB();
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $usuario = $stmt->get_result()->fetch_assoc();
        //Si los datos del login existen y la verificación de la contraseña es correcta.
        if ($usuario && password_verify($password, $usuario['password'])) {
            return $usuario;
        }

        return false;
    } catch (Exception $e) {
        die("Error al verificar credenciales: " . $e->getMessage());
    }
}

//Agrega un producto al carrito, ya sea de un usuario o de un invitado.
function agregarAlCarrito($productoId, $cantidad) {
    //Con un molde de tipo (int) convertimos los valores en enteros seguros.
    $cantidad = (int)$cantidad;
    $productoId = (int)$productoId;

    if (esUsuarioAutenticado()) {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        if (isset($_SESSION['carrito'][$productoId])) {
            $_SESSION['carrito'][$productoId] += $cantidad;
        } else {
            $_SESSION['carrito'][$productoId] = $cantidad;
        }
    } else {
        $carrito = isset($_COOKIE['carrito']) ? json_decode($_COOKIE['carrito'], true) : [];

        if (isset($carrito[$productoId])) {
            $carrito[$productoId] += $cantidad;
        } else {
            $carrito[$productoId] = $cantidad;
        }

        setcookie('carrito', json_encode($carrito), time() + 3600, "/");
    }
}

//Devuelve el contenido del carrito.
function obtenerCarrito() {
    if (esUsuarioAutenticado()) {
        return $_SESSION['carrito'] ?? [];
    } else {
        return isset($_COOKIE['carrito']) ? json_decode($_COOKIE['carrito'], true) : [];
    }
}

//Elimina un producto del carrito.
function eliminarDelCarrito($productoId) {    
    if (esUsuarioAutenticado()) {
        unset($_SESSION['carrito'][$productoId]);        
    } else {
        $carrito = isset($_COOKIE['carrito']) ? json_decode($_COOKIE['carrito'], true) : [];
        unset($carrito[$productoId]);
        setcookie('carrito', json_encode($carrito), time() + 3600, "/");
    }
}

//Vacía completamente el carrito.
function vaciarCarrito() {
    if (esUsuarioAutenticado()) {
        unset($_SESSION['carrito']);
    } else {
        setcookie('carrito', '', time() - 3600, "/");
    }
}
