-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 29-05-2025 a las 16:15:30
-- Versión del servidor: 9.1.0
-- Versión de PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendat62`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

DROP TABLE IF EXISTS `carrito`;
CREATE TABLE IF NOT EXISTS `carrito` (
  `idcarrito` int NOT NULL AUTO_INCREMENT,
  `idusuario` int NOT NULL,
  `idinventario` int NOT NULL,
  `unidades` int NOT NULL,
  PRIMARY KEY (`idcarrito`),
  KEY `idusuario` (`idusuario`),
  KEY `idinventario` (`idinventario`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`idcarrito`, `idusuario`, `idinventario`, `unidades`) VALUES
(1, 4, 2, 2),
(2, 4, 4, 3),
(3, 7, 1, 2),
(4, 7, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `idinventario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `stock` int NOT NULL,
  PRIMARY KEY (`idinventario`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idinventario`, `nombre`, `descripcion`, `stock`) VALUES
(1, 'Camiseta Roja', 'Camiseta de algodón roja', 50),
(2, 'Camiseta Roja', 'Camiseta de algodón roja', 50),
(3, 'Camiseta Azul', 'Camiseta de algodón azul', 40),
(4, 'Pantalón Vaquero', 'Pantalón vaquero azul claro', 30),
(5, 'Pantalón Negro', 'Pantalón de vestir negro', 20),
(6, 'Chaqueta Cuero', 'Chaqueta de cuero sintético', 15),
(7, 'Zapatos Deportivos', 'Zapatillas deportivas para correr', 60),
(8, 'Zapatos Elegantes', 'Zapatos de vestir para hombre', 25),
(9, 'Bufanda Lana', 'Bufanda de lana gris', 35),
(10, '', '', 0),
(11, 'Gorra', 'Gorra ajustable negra', 45),
(12, 'Calcetines', 'Pack de 5 pares de calcetines', 80),
(13, 'Reloj Pulsera', 'Reloj de pulsera clásico', 12),
(14, 'Bolso Mujer', 'Bolso de mano elegante', 18),
(15, 'Mochila', 'Mochila escolar resistente', 22),
(16, 'Cinturón', 'Cinturón de cuero marrón', 28),
(17, 'Guantes Invierno', 'Guantes térmicos para invierno', 14),
(18, 'Gafas Sol', 'Gafas de sol polarizadas', 19),
(19, 'Sudadera', 'Sudadera con capucha gris', 33),
(20, 'Pijama', 'Pijama de dos piezas', 26),
(21, 'Chaleco', 'Chaleco acolchado para frío', 17),
(22, '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rol` enum('admin','cliente','','') NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `password`, `rol`) VALUES
(4, 'manolo', '$2y$10$U1r78W2o0dvKpfwIlpV5dezjulnR0/hrvycT6nLIz72ykF103M2bG', 'cliente'),
(6, 'manolo_admin', '$2y$10$uHBHBlIEghfmm6LSu1mvoeUPxSMF878wMlXCoowcxj7as.NVF/BEC', 'admin'),
(7, 'lola', '$2y$10$lqddpNWiAQ8A3iUeKFawmeuuB3/J/.dSZ5PlZjNzGzEb9H3JLSqkq', 'cliente');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
