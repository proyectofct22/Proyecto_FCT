-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 29-11-2022 a las 10:02:35
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

DROP TABLE IF EXISTS `equipo`;
CREATE TABLE IF NOT EXISTS `equipo` (
  `idequipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEquipo` varchar(50) NOT NULL,
  `numeroJugadores` int(11) NOT NULL,
  `torneo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idequipo`),
  KEY `id_torneo` (`torneo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`idequipo`, `nombreEquipo`, `numeroJugadores`, `torneo`) VALUES
(1, 'KOI', 5, 2),
(2, 'PSG', 5, 2),
(3, 'KRU', 5, 2),
(4, 'TRU', 5, 2),
(5, 'RTD', 5, 2),
(6, 'FTR', 5, 2),
(7, 'JKP', 5, 2),
(8, 'TPN', 5, NULL),
(9, 'LPT', 5, NULL),
(10, 'CLD', 5, NULL),
(12, 'PGR', 5, 2),
(13, 'MNT', 5, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadistica`
--

INSERT INTO `estadistica` (`idEstadistica`, `torneosGanados`, `torneosJugados`, `partidosGanados`, `partidosPerdidos`, `partidosJugados`, `equipoId`) VALUES
(1, 0, 1, 1, 1, 2, 1),
(2, 1, 1, 3, 0, 3, 2),
(3, 0, 1, 0, 1, 1, 3),
(4, 0, 1, 2, 1, 3, 4),
(5, 0, 1, 0, 1, 1, 5),
(6, 0, 1, 1, 1, 2, 6),
(7, 0, 1, 0, 1, 1, 7),
(8, 0, 1, 0, 1, 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juega`
--

DROP TABLE IF EXISTS `juega`;
CREATE TABLE IF NOT EXISTS `juega` (
  `idJuega` int(11) NOT NULL AUTO_INCREMENT,
  `resultado` varchar(10) DEFAULT NULL,
  `turno` enum('Diurno','Vespertino') DEFAULT NULL,
  `partido` int(11) DEFAULT NULL,
  `idEquipo1` int(11) DEFAULT NULL,
  `idEquipo2` int(11) DEFAULT NULL,
  PRIMARY KEY (`idJuega`),
  KEY `id_partido` (`partido`),
  KEY `id_equipo_1` (`idEquipo1`),
  KEY `id_equipo_2` (`idEquipo2`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `juega`
--

INSERT INTO `juega` (`idJuega`, `resultado`, `turno`, `partido`, `idEquipo1`, `idEquipo2`) VALUES
(1, '12-0', 'Diurno', 1, 2, 8),
(2, '11-0', 'Vespertino', 2, 4, 5),
(3, '10-0', 'Diurno', 3, 1, 3),
(4, '10-0', 'Vespertino', 4, 6, 7),
(5, '12-0', 'Diurno', 5, 2, 6),
(6, '11-0', 'Vespertino', 6, 4, 1),
(7, '11-1', 'Diurno', 7, 2, 4);

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
  `fasePartido` enum('Cuartos','Semifinales','Final') DEFAULT NULL,
  `estadoPartido` enum('Activo','Finalizado') DEFAULT NULL,
  `responsableId` int(11) DEFAULT NULL,
  `torneoId` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPartido`),
  KEY `torneo_id` (`torneoId`),
  KEY `responsable_id` (`responsableId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `partido`
--

INSERT INTO `partido` (`idPartido`, `fechaPartido`, `idEquipoGanador`, `idEquipoPerdedor`, `fasePartido`, `estadoPartido`, `responsableId`, `torneoId`) VALUES
(1, '2022-11-28', 2, 8, 'Cuartos', 'Finalizado', 3, 1),
(2, '2022-11-28', 4, 5, 'Cuartos', 'Finalizado', 3, 1),
(3, '2022-11-29', 1, 3, 'Cuartos', 'Finalizado', 3, 1),
(4, '2022-11-29', 6, 7, 'Cuartos', 'Finalizado', 3, 1),
(5, '2022-12-02', 2, 6, 'Semifinales', 'Finalizado', 3, 1),
(6, '2022-12-01', 4, 1, 'Semifinales', 'Finalizado', 3, 1),
(7, '2022-12-06', 2, 4, 'Final', 'Finalizado', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneo`
--

DROP TABLE IF EXISTS `torneo`;
CREATE TABLE IF NOT EXISTS `torneo` (
  `idTorneo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTorneo` varchar(50) NOT NULL,
  `juego` enum('LOL','Valorant') DEFAULT NULL,
  `estado` enum('Inactivo','Activo','Finalizado') DEFAULT NULL,
  `idEquipoGanador` int(11) DEFAULT NULL,
  `fechaCreacion` date DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  PRIMARY KEY (`idTorneo`),
  KEY `id_equipo_ganador` (`idEquipoGanador`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `torneo`
--

INSERT INTO `torneo` (`idTorneo`, `nombreTorneo`, `juego`, `estado`, `idEquipoGanador`, `fechaCreacion`, `fechaInicio`, `fechaFin`) VALUES
(1, 'LolCup', 'Valorant', 'Finalizado', 2, '2022-11-28', '2022-11-28', '2022-11-28'),
(2, 'LolCup3', 'Valorant', 'Inactivo', NULL, '2022-11-28', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipoUsuario` enum('administrador','jugador') NOT NULL,
  `nickUsuario` varchar(50) DEFAULT NULL,
  `nombreUsuario` varchar(50) NOT NULL,
  `apellidosUsuario` varchar(90) NOT NULL,
  `correoUsuario` varchar(90) DEFAULT NULL,
  `passwordUsuario` varchar(90) NOT NULL,
  `cicloFormativo` varchar(10) DEFAULT NULL,
  `liderEquipo` enum('Si','No') DEFAULT NULL,
  `equipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `id_equipo` (`equipo`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `tipoUsuario`, `nickUsuario`, `nombreUsuario`, `apellidosUsuario`, `correoUsuario`, `passwordUsuario`, `cicloFormativo`, `liderEquipo`, `equipo`) VALUES
(1, 'administrador', 'admin', 'admin', 'admin', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL),
(2, 'jugador', 'pgr795', 'Pablo', 'Garcia', 'pgarcia@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '2-DAW-D', 'Si', 12),
(3, 'administrador', 'arebolleda', 'Alfonso', 'Rebolleda', 'arebolleda@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '2-DAW-D', NULL, NULL),
(4, 'jugador', 'arebolleda2', 'Alfonso', 'Rebolleda', 'arebolleda@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '2-DAW-D', 'No', 1),
(5, 'jugador', 'arn123', 'Aaron', 'Moreno', 'amoreno@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '2-DAW-D', 'No', 1),
(6, 'jugador', 'llopez', 'Luis', 'Lopez', 'llopez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 1),
(7, 'jugador', 'amartinez', 'Andrea', 'Martinez', 'amartinez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 2),
(8, 'jugador', 'jperez', 'Jose', 'Perez', 'jperez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 3),
(9, 'jugador', 'ssanchez', 'Sandra', 'Sanchez', 'ssanchez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'Si', 1),
(10, 'jugador', 'mruiz', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 1),
(11, 'jugador', 'mruiz1', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 2),
(12, 'jugador', 'mruiz2', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'Si', 2),
(13, 'jugador', 'mruiz3', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 2),
(14, 'jugador', 'mruiz4', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 2),
(15, 'jugador', 'mruiz5', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'Si', 3),
(16, 'jugador', 'mruiz6', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 3),
(17, 'jugador', 'mruiz13', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 3),
(18, 'jugador', 'mruiz7', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 3),
(19, 'jugador', 'mruiz8', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 4),
(20, 'jugador', 'mruiz9', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 4),
(21, 'jugador', 'mruiz10', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 4),
(22, 'jugador', 'mruiz11', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'Si', 4),
(23, 'jugador', 'mruiz12', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 4),
(24, 'jugador', 'mruiz14', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 5),
(25, 'jugador', 'mruiz15', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 5),
(26, 'jugador', 'mruiz16', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'Si', 5),
(27, 'jugador', 'mruiz17', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 5),
(28, 'jugador', 'mruiz18', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 5),
(29, 'jugador', 'mruiz19', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 6),
(30, 'jugador', 'mruiz20', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 6),
(31, 'jugador', 'mruiz16', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 6),
(32, 'jugador', 'mruiz17', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'Si', 6),
(33, 'jugador', 'mruiz18', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 6),
(34, 'jugador', 'mruiz19', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 7),
(35, 'jugador', 'mruiz20', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 7),
(36, 'jugador', 'mruiz21', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'Si', 7),
(37, 'jugador', 'mruiz22', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 7),
(38, 'jugador', 'mruiz23', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 7),
(39, 'jugador', 'mruiz24', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 8),
(40, 'jugador', 'mruiz25', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 8),
(41, 'jugador', 'mruiz26', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 8),
(42, 'jugador', 'mruiz27', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'Si', 8),
(43, 'jugador', 'mruiz28', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 8),
(44, 'jugador', 'mruiz29', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 12),
(45, 'jugador', 'mruiz30', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 12),
(46, 'jugador', 'mruiz31', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 12),
(47, 'jugador', 'mruiz32', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 12),
(48, 'jugador', 'mruiz33', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'Si', 13),
(49, 'jugador', 'mruiz34', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 13),
(50, 'jugador', 'mruiz36', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 13),
(51, 'jugador', 'mruiz35', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', NULL),
(52, 'jugador', 'mruiz37', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', NULL),
(53, 'jugador', 'mruiz38', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', NULL),
(54, 'jugador', 'mruiz39', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', NULL),
(55, 'jugador', 'mruiz40', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', NULL);

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
  ADD CONSTRAINT `responsable_id` FOREIGN KEY (`responsableId`) REFERENCES `usuario` (`idUsuario`),
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
