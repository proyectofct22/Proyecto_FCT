-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-11-2022 a las 15:53:48
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
CREATE DATABASE IF NOT EXISTS `gamingroom` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `gamingroom`;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`idequipo`, `nombreEquipo`, `numeroJugadores`, `clasificado`, `ganadorTorneo`, `torneo`) VALUES
(1, 'Koi', 5, 1, NULL, 3),
(2, 'Psg', 5, 1, NULL, 3),
(3, 'Kru', 5, 1, NULL, 3),
(4, 'TrU', 5, 1, NULL, 3),
(5, 'RTD', 5, 1, NULL, 3),
(6, 'FTR', 5, 1, NULL, 3),
(7, 'JKP', 5, 1, NULL, 3),
(8, 'TPN', 5, 1, NULL, 3),
(9, 'LPT', 5, 1, NULL, 2),
(10, 'CLD', 5, 1, NULL, 2);

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
  `usuarioId` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEstadistica`),
  KEY `usuario_id` (`usuarioId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juega`
--

DROP TABLE IF EXISTS `juega`;
CREATE TABLE IF NOT EXISTS `juega` (
  `idJuega` int(11) NOT NULL AUTO_INCREMENT,
  `fechaPartido` date DEFAULT NULL,
  `partido` int(11) DEFAULT NULL,
  `idEquipo1` int(11) DEFAULT NULL,
  `idEquipo2` int(11) DEFAULT NULL,
  `Turno` enum('Diurno','Vespertino') COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idJuega`),
  KEY `id_partido` (`partido`),
  KEY `id_equipo_1` (`idEquipo1`),
  KEY `id_equipo_2` (`idEquipo2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido`
--

DROP TABLE IF EXISTS `partido`;
CREATE TABLE IF NOT EXISTS `partido` (
  `idPartido` int(11) NOT NULL AUTO_INCREMENT,
  `resultado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `idEquipoGanador` int(11) DEFAULT NULL,
  `idEquipoPerdedor` int(11) DEFAULT NULL,
  `fasePartido` enum('Cuartos','Semifinales','Final') COLLATE utf8_spanish_ci DEFAULT NULL,
  `torneoId` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPartido`),
  KEY `torneo_id` (`torneoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneo`
--

DROP TABLE IF EXISTS `torneo`;
CREATE TABLE IF NOT EXISTS `torneo` (
  `idTorneo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTorneo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `juego` enum('LOL','Valorant') COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` enum('Activo','Finalizado') COLLATE utf8_spanish_ci DEFAULT NULL,
  `idEquipoGanador` int(11) DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  PRIMARY KEY (`idTorneo`),
  KEY `id_equipo_ganador` (`idEquipoGanador`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `torneo`
--

INSERT INTO `torneo` (`idTorneo`, `nombreTorneo`, `juego`, `estado`, `idEquipoGanador`, `fechaInicio`, `fechaFin`) VALUES
(1, 'TorneoLOL', 'LOL', 'Finalizado', 1, '2022-09-30', '2022-10-31'),
(2, 'TorneoValorant', 'Valorant', 'Activo', NULL, '2022-10-20', NULL),
(3, 'LOLCup', 'LOL', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipoUsuario` enum('administrador','jugador') COLLATE utf8_spanish_ci NOT NULL,
  `nickUsuario` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombreUsuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidosUsuario` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `correoUsuario` varchar(90) COLLATE utf8_spanish_ci DEFAULT NULL,
  `passwordUsuario` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `cicloFormativo` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `equipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `id_equipo` (`equipo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `tipoUsuario`, `nickUsuario`, `nombreUsuario`, `apellidosUsuario`, `correoUsuario`, `passwordUsuario`, `cicloFormativo`, `equipo`) VALUES
(1, 'administrador', 'admin', 'admin', 'admin', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, NULL),
(2, 'administrador', 'pgr795', 'Pablo', 'Garcia', 'pgarcia@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '2-DAW-D', NULL),
(3, 'administrador', 'arebolleda', 'Alfonso', 'Rebolleda', 'arebolleda@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '2-DAW-D', NULL),
(4, 'jugador', 'arebolleda2', 'Alfonso', 'Rebolleda', 'arebolleda@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '2-DAW-D', NULL),
(5, 'jugador', 'arn123', 'Aaron', 'Moreno', 'amoreno@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '2-DAW-D', 1),
(6, 'jugador', 'llopez', 'Luis', 'Lopez', 'llopez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 1),
(7, 'jugador', 'amartinez', 'Andrea', 'Martinez', 'amartinez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 1),
(8, 'jugador', 'jperez', 'Jose', 'Perez', 'jperez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 1),
(9, 'jugador', 'ssanchez', 'Sandra', 'Sanchez', 'ssanchez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 2),
(10, 'jugador', 'mruiz', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 2),
(11, 'jugador', 'jfernandez', 'Juan', 'Fernandez', 'jfernandez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-SMR-D', NULL);

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
  ADD CONSTRAINT `usuario_id` FOREIGN KEY (`usuarioId`) REFERENCES `usuario` (`idUsuario`);

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
