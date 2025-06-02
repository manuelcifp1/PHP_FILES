-- Crea la base de datos si no existe
CREATE DATABASE IF NOT EXISTS agenda;
USE agenda;

-- Tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- guardaremos hash, no texto plano
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de contactos, ahora con referencia a usuario
CREATE TABLE IF NOT EXISTS contactos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL, -- referencia al usuario propietario
    nombre VARCHAR(100) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL,
    direccion VARCHAR(255),
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

