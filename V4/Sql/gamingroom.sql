-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-11-2022 a las 15:41:10
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
-- Base de datos: `gamingroom`
--
CREATE DATABASE IF NOT EXISTS `gamingroom` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gamingroom`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

DROP TABLE IF EXISTS `equipo`;
CREATE TABLE IF NOT EXISTS `equipo` (
  `idequipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEquipo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `numeroJugadores` int(11) NOT NULL,
  `clasificado` tinyint(1) DEFAULT NULL,
  `ganadorTorneo` tinyint(1) DEFAULT NULL,
  `torneo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idequipo`),
  KEY `id_torneo` (`torneo`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`idequipo`, `nombreEquipo`, `numeroJugadores`, `clasificado`, `ganadorTorneo`, `torneo`) VALUES
(1, 'KOI', 5, 0, NULL, NULL),
(2, 'PSG', 5, 0, NULL, NULL),
(3, 'KRU', 5, 0, NULL, NULL),
(4, 'TRU', 5, 0, NULL, NULL),
(5, 'RTD', 5, 0, NULL, NULL),
(6, 'FTR', 5, 0, NULL, NULL),
(7, 'JKP', 5, 0, NULL, NULL),
(8, 'TPN', 5, 0, NULL, NULL),
(9, 'LPT', 5, 0, NULL, NULL),
(10, 'CLD', 5, 0, NULL, NULL),
(11, 'ASD', 5, 0, NULL, NULL),
(12, 'AWE', 5, 0, NULL, NULL),
(13, 'AQW', 5, 0, NULL, NULL),
(14, 'ATR', 5, 0, NULL, NULL),
(15, 'SFX', 5, 0, NULL, NULL),
(16, 'XDF', 5, 0, NULL, NULL),
(17, 'QWE', 5, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadistica`
--

DROP TABLE IF EXISTS `estadistica`;
CREATE TABLE IF NOT EXISTS `estadistica` (
  `idEstadistica` int(11) NOT NULL AUTO_INCREMENT,
  `torneosGanados` int(11) DEFAULT NULL,
  `torneosJugados` int(11) DEFAULT NULL,
  `partidosGanados` int(11) DEFAULT NULL,
  `partidosPerdidos` int(11) DEFAULT NULL,
  `partidosJugados` int(11) DEFAULT NULL,
  `equipoId` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEstadistica`),
  KEY `equipo_id` (`equipoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juega`
--

DROP TABLE IF EXISTS `juega`;
CREATE TABLE IF NOT EXISTS `juega` (
  `idJuega` int(11) NOT NULL AUTO_INCREMENT,
  `resultado` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `turno` enum('Diurno','Vespertino') CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `partido` int(11) DEFAULT NULL,
  `idEquipo1` int(11) DEFAULT NULL,
  `idEquipo2` int(11) DEFAULT NULL,
  PRIMARY KEY (`idJuega`),
  KEY `id_partido` (`partido`),
  KEY `id_equipo_1` (`idEquipo1`),
  KEY `id_equipo_2` (`idEquipo2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido`
--

DROP TABLE IF EXISTS `partido`;
CREATE TABLE IF NOT EXISTS `partido` (
  `idPartido` int(11) NOT NULL AUTO_INCREMENT,
  `fechaPartido` date DEFAULT NULL,
  `idEquipoGanador` int(11) DEFAULT NULL,
  `idEquipoPerdedor` int(11) DEFAULT NULL,
  `fasePartido` enum('Cuartos','Semifinales','Final') CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `estadoPartido` enum('Activo','Finalizado') CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `torneoId` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPartido`),
  KEY `torneo_id` (`torneoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneo`
--

DROP TABLE IF EXISTS `torneo`;
CREATE TABLE IF NOT EXISTS `torneo` (
  `idTorneo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTorneo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `juego` enum('LOL','Valorant') CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` enum('Inactivo','Activo','Finalizado') CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `idEquipoGanador` int(11) DEFAULT NULL,
  `fechaCreacion` date DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  PRIMARY KEY (`idTorneo`),
  KEY `id_equipo_ganador` (`idEquipoGanador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipoUsuario` enum('administrador','jugador') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nickUsuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombreUsuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellidosUsuario` varchar(90) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correoUsuario` varchar(90) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `passwordUsuario` varchar(90) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cicloFormativo` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `equipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `id_equipo` (`equipo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `tipoUsuario`, `nickUsuario`, `nombreUsuario`, `apellidosUsuario`, `correoUsuario`, `passwordUsuario`, `cicloFormativo`, `equipo`) VALUES
(1, 'administrador', 'admin', 'admin', 'admin', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, NULL),
(2, 'administrador', 'pgr795', 'Pablo', 'Garcia', 'pgarcia@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '2-DAW-D', NULL),
(3, 'administrador', 'arebolleda', 'Alfonso', 'Rebolleda', 'arebolleda@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '2-DAW-D', NULL),
(4, 'jugador', 'arebolleda2', 'Alfonso', 'Rebolleda', 'arebolleda@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '2-DAW-D', NULL),
(5, 'jugador', 'arn123', 'Aaron', 'Moreno', 'amoreno@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '2-DAW-D', NULL),
(6, 'jugador', 'llopez', 'Luis', 'Lopez', 'llopez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', NULL),
(7, 'jugador', 'amartinez', 'Andrea', 'Martinez', 'amartinez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', NULL),
(8, 'jugador', 'jperez', 'Jose', 'Perez', 'jperez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', NULL),
(9, 'jugador', 'ssanchez', 'Sandra', 'Sanchez', 'ssanchez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', NULL),
(10, 'jugador', 'mruiz', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', NULL),
(11, 'jugador', 'jfernandez2', 'Juan', 'Fernandez', 'jfernandez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-SMR-D', NULL),
(12, 'jugador', 'palvarez', 'Pedro', 'Alvarez', 'palvarez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-SMR-D', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `id_torneo` FOREIGN KEY (`torneo`) REFERENCES `torneo` (`idTorneo`);

--
-- Filtros para la tabla `estadistica`
--
ALTER TABLE `estadistica`
  ADD CONSTRAINT `equipo_id` FOREIGN KEY (`equipoId`) REFERENCES `equipo` (`idequipo`);

--
-- Filtros para la tabla `juega`
--
ALTER TABLE `juega`
  ADD CONSTRAINT `id_equipo_1` FOREIGN KEY (`idEquipo1`) REFERENCES `equipo` (`idequipo`),
  ADD CONSTRAINT `id_equipo_2` FOREIGN KEY (`idEquipo2`) REFERENCES `equipo` (`idequipo`),
  ADD CONSTRAINT `id_partido` FOREIGN KEY (`partido`) REFERENCES `partido` (`idPartido`);

--
-- Filtros para la tabla `partido`
--
ALTER TABLE `partido`
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
  ADD CONSTRAINT `id_equipo` FOREIGN KEY (`equipo`) REFERENCES `equipo` (`idequipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
