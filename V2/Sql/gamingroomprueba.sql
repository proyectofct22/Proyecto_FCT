-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-10-2022 a las 10:39:47
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gamingroomprueba`
--
CREATE DATABASE IF NOT EXISTS `gamingroomprueba` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `gamingroomprueba`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

DROP TABLE IF EXISTS `aula`;
CREATE TABLE IF NOT EXISTS `aula` (
  `idAula` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAula` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaReserva` date DEFAULT NULL,
  PRIMARY KEY (`idAula`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`idAula`, `nombreAula`, `fechaReserva`) VALUES
(1, 'Gaming Room', '2022-10-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

DROP TABLE IF EXISTS `equipo`;
CREATE TABLE IF NOT EXISTS `equipo` (
  `idequipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEquipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `numeroJugadores` int(11) NOT NULL,
  `clasificado` tinyint(1) DEFAULT NULL,
  `ganadorTorneo` tinyint(1) DEFAULT NULL,
  `torneo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idequipo`),
  KEY `id_torneo` (`torneo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`idequipo`, `nombreEquipo`, `numeroJugadores`, `clasificado`, `ganadorTorneo`, `torneo`) VALUES
(1, 'Koi', 4, NULL, NULL, 1),
(2, 'PSG', 5, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido`
--

DROP TABLE IF EXISTS `partido`;
CREATE TABLE IF NOT EXISTS `partido` (
  `idPartido` int(11) NOT NULL AUTO_INCREMENT,
  `resultado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cuartos` tinyint(1) DEFAULT NULL,
  `semifinales` tinyint(1) DEFAULT NULL,
  `final` tinyint(1) DEFAULT NULL,
  `idEquipo1` int(11) DEFAULT NULL,
  `idEquipo2` int(11) DEFAULT NULL,
  `idEquipoEliminado` int(11) DEFAULT NULL,
  `torneoId` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPartido`),
  KEY `id_equipo_1` (`idEquipo1`),
  KEY `id_equipo_2` (`idEquipo2`),
  KEY `id_torneo` (`torneoId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `partido`
--

INSERT INTO `partido` (`idPartido`, `resultado`, `cuartos`, `semifinales`, `final`, `idEquipo1`, `idEquipo2`, `idEquipoEliminado`, `torneoId`) VALUES
(1, '3-1', 1, NULL, NULL, 1, 2, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneo`
--

DROP TABLE IF EXISTS `torneo`;
CREATE TABLE IF NOT EXISTS `torneo` (
  `idTorneo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTorneo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `juego` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `idEquipoGanador` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTorneo`),
  KEY `id_equipo_ganador` (`idEquipoGanador`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `torneo`
--

INSERT INTO `torneo` (`idTorneo`, `nombreTorneo`, `juego`, `activo`, `idEquipoGanador`) VALUES
(1, 'Inauguración', 'FIFA 23', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipoUsuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombreUsuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidosUsuario` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `passwordUsuario` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `cicloFormativo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `equipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `id_equipo` (`equipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `tipoUsuario`, `nombreUsuario`, `apellidosUsuario`, `passwordUsuario`, `cicloFormativo`, `equipo`) VALUES
(1, 'administrador', 'Luis', 'Lopez', '123', 'SMR', NULL),
(2, 'jugador', 'pablo', 'garcia', '123', 'SMR', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `id_torneo` FOREIGN KEY (`torneo`) REFERENCES `torneo` (`idTorneo`);

--
-- Filtros para la tabla `partido`
--
ALTER TABLE `partido`
  ADD CONSTRAINT `id_equipo_1` FOREIGN KEY (`idEquipo1`) REFERENCES `equipo` (`idequipo`),
  ADD CONSTRAINT `id_equipo_2` FOREIGN KEY (`idEquipo2`) REFERENCES `equipo` (`idequipo`),
  ADD CONSTRAINT `torneo_id` FOREIGN KEY (`torneoId`) REFERENCES `torneo` (`idTorneo`);

--
-- Filtros para la tabla `torneo`
--
ALTER TABLE `torneo`
  ADD CONSTRAINT `id_equipo_ganador` FOREIGN KEY (`idEquipoGanador`) REFERENCES `equipo` (`idequipo`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `id_equipo` FOREIGN KEY (`equipo`) REFERENCES `equipo` (`idequipo`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
