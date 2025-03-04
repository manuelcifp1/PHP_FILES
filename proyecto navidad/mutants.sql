-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2024 a las 19:39:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mutants`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brotherhood_of_evil_mutants`
--

CREATE TABLE `brotherhood_of_evil_mutants` (
  `mutantName` varchar(20) NOT NULL,
  `mainPower` varchar(100) NOT NULL,
  `powerLevel` enum('ALPHA','BETA','GAMMA','OMEGA') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `brotherhood_of_evil_mutants`
--

INSERT INTO `brotherhood_of_evil_mutants` (`mutantName`, `mainPower`, `powerLevel`) VALUES
('avalanche', 'create seismic waves', 'ALPHA'),
('blob', 'mass increasing', 'GAMMA'),
('destiny', 'psionic precognition', 'ALPHA'),
('mystique', 'shapeshifting', 'BETA'),
('pyro', 'control flames', 'BETA'),
('rogue', 'absorbs life force', 'GAMMA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `excalibur`
--

CREATE TABLE `excalibur` (
  `mutantName` varchar(20) NOT NULL,
  `mainPower` varchar(100) NOT NULL,
  `powerLevel` enum('ALPHA','BETA','GAMMA','OMEGA') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `excalibur`
--

INSERT INTO `excalibur` (`mutantName`, `mainPower`, `powerLevel`) VALUES
('captain britain', 'strenght and flight', 'ALPHA'),
('meggan', 'shapeshifter', 'BETA'),
('shadowcat', 'phase through solid matter', 'BETA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `new_mutants`
--

CREATE TABLE `new_mutants` (
  `mutantName` varchar(20) NOT NULL,
  `mainPower` varchar(100) NOT NULL,
  `powerLevel` enum('ALPHA','BETA','GAMMA','OMEGA') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `new_mutants`
--

INSERT INTO `new_mutants` (`mutantName`, `mainPower`, `powerLevel`) VALUES
('cannonball', 'kinetic energy projection', 'ALPHA'),
('karma', 'possession of minds', 'ALPHA'),
('magik', 'magic and teleport', 'OMEGA'),
('sunspot', 'absorbs and channel solar power', 'ALPHA'),
('wolfsbane', 'transform into wolf', 'BETA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uncanny_x_men`
--

CREATE TABLE `uncanny_x_men` (
  `mutantName` varchar(20) NOT NULL,
  `mainPower` varchar(100) NOT NULL,
  `powerLevel` enum('ALPHA','BETA','GAMMA','OMEGA') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `uncanny_x_men`
--

INSERT INTO `uncanny_x_men` (`mutantName`, `mainPower`, `powerLevel`) VALUES
('banshee', 'sonic scream', 'ALPHA'),
('colossus', 'armored skin', 'ALPHA'),
('magneto', 'magnetism', 'OMEGA'),
('storm', 'weather control', 'OMEGA'),
('sunfire', 'solar energy manipulation', 'OMEGA'),
('wolverine', 'healing factor', 'BETA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `x_factor`
--

CREATE TABLE `x_factor` (
  `mutantName` varchar(20) NOT NULL,
  `mainPower` varchar(100) NOT NULL,
  `powerLevel` enum('ALPHA','BETA','GAMMA','OMEGA') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `x_factor`
--

INSERT INTO `x_factor` (`mutantName`, `mainPower`, `powerLevel`) VALUES
('beast', 'agility', 'BETA'),
('cyclops', 'optic beams', 'ALPHA'),
('iceman', 'create ice', 'OMEGA'),
('marvel_girl', 'telepathy and telekinesis', 'ALPHA'),
('angel', 'flight', 'BETA');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `brotherhood_of_evil_mutants`
--
ALTER TABLE `brotherhood_of_evil_mutants`
  ADD PRIMARY KEY (`mutantName`);

--
-- Indices de la tabla `excalibur`
--
ALTER TABLE `excalibur`
  ADD PRIMARY KEY (`mutantName`);

--
-- Indices de la tabla `new_mutants`
--
ALTER TABLE `new_mutants`
  ADD PRIMARY KEY (`mutantName`);

--
-- Indices de la tabla `uncanny_x_men`
--
ALTER TABLE `uncanny_x_men`
  ADD PRIMARY KEY (`mutantName`);

--
-- Indices de la tabla `x_factor`
--
ALTER TABLE `x_factor`
  ADD PRIMARY KEY (`mutantName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
