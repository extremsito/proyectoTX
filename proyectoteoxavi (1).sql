-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-11-2023 a las 10:39:08
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectoteoxavi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

DROP TABLE IF EXISTS `equipos`;
CREATE TABLE IF NOT EXISTS `equipos` (
  `id_equipo` int NOT NULL AUTO_INCREMENT,
  `sistema_operativo` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `localizacion` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_equipo`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `sistema_operativo`, `marca`, `localizacion`, `ip`, `descripcion`) VALUES
(1, '[Windows]', 'HP', '', '', ''),
(6, 'Linux', 'HP', '', '', ''),
(7, 'Windows', 'HP', '', '', ''),
(8, 'Linux', 'HP', '', '', ''),
(9, 'MacOS', 'Apple', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

DROP TABLE IF EXISTS `incidencias`;
CREATE TABLE IF NOT EXISTS `incidencias` (
  `id_incidencia` int NOT NULL AUTO_INCREMENT,
  `id_trabajador` int NOT NULL,
  `id_equipo` int NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(50) NOT NULL,
  `descripcion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prioridad` varchar(50) NOT NULL,
  PRIMARY KEY (`id_incidencia`),
  KEY `id_trabajador` (`id_trabajador`),
  KEY `id_equipo` (`id_equipo`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id_incidencia`, `id_trabajador`, `id_equipo`, `fecha`, `estado`, `descripcion`, `prioridad`) VALUES
(22, 1, 7, '2023-11-17', 'Ejecucion', 'Falla el windows', 'Media'),
(18, 1, 1, '2023-11-13', 'Finalizado', 'Se acabo', 'Alta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Treballador'),
(3, 'Tecnic');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `role_id`, `nombre`, `apellido`, `correo`, `password`) VALUES
(1, 2, 'Gerardo', 'Parrillas', 'gparrillas@tx.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 3, 'Paco', 'Martinez', 'pmartinez@tx.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 1, 'admin', 'admin', 'admin@tx.com', '21232f297a57a5a743894a0e4a801fc3'),
(6, 2, 'Martin', 'Gonsales', 'mg@tx.com', '81dc9bdb52d04dc20036dbd8313ed055');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
