-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-12-2022 a las 08:25:28
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
  `nombreEquipo` varchar(50) NOT NULL,
  `numeroJugadores` int(11) NOT NULL,
  `torneo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idequipo`),
  KEY `id_torneo` (`torneo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`idequipo`, `nombreEquipo`, `numeroJugadores`, `torneo`) VALUES
(1, 'KOI', 5, NULL),
(2, 'PSG', 5, NULL),
(3, 'KRU', 5, NULL),
(4, 'TRU', 5, NULL),
(5, 'RTD', 5, NULL),
(6, 'FTR', 5, NULL),
(7, 'JKP', 5, NULL),
(8, 'TPN', 5, NULL),
(9, 'OWO', 5, NULL),
(10, 'RIP', 5, NULL);

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
  `resultado` varchar(10) DEFAULT NULL,
  `turno` enum('Diurno','Vespertino') DEFAULT NULL,
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
  `fasePartido` enum('Cuartos','Semifinales','Final') DEFAULT NULL,
  `estadoPartido` enum('Activo','Finalizado') DEFAULT NULL,
  `responsableId` int(11) DEFAULT NULL,
  `torneoId` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPartido`),
  KEY `torneo_id` (`torneoId`),
  KEY `responsable_id` (`responsableId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneo`
--

DROP TABLE IF EXISTS `torneo`;
CREATE TABLE IF NOT EXISTS `torneo` (
  `idTorneo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTorneo` varchar(50) NOT NULL,
  `juego` enum('LOL','CSGO','Valorant') DEFAULT NULL,
  `estado` enum('Inactivo','Activo','Finalizado') DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `tipoUsuario`, `nickUsuario`, `nombreUsuario`, `apellidosUsuario`, `correoUsuario`, `passwordUsuario`, `cicloFormativo`, `liderEquipo`, `equipo`) VALUES
(1, 'administrador', 'admin', 'admin', 'admin', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL),
(2, 'jugador', 'pgr795', 'Pablo', 'Garcia', 'pgarcia@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '2-DAW-D', 'Si', 10),
(3, 'administrador', 'arebolleda', 'Alfonso', 'Rebolleda', 'arebolleda@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '2-DAW-D', NULL, NULL),
(4, 'jugador', 'arebolleda2', 'Alfonso', 'Rebolleda', 'arebolleda@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '2-DAW-D', 'No', 1),
(5, 'jugador', 'arn123', 'Aaron', 'Moreno', 'amoreno@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '2-DAW-D', 'No', 1),
(6, 'jugador', 'llopez', 'Luis', 'Lopez', 'llopez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 1),
(7, 'jugador', 'amartinez', 'Andrea', 'Martinez', 'amartinez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 2),
(8, 'jugador', 'jperez', 'Jose', 'Perez', 'jperez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 3),
(9, 'jugador', 'ssanchez', 'Sandra', 'Sanchez', 'ssanchez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'Si', 1),
(10, 'jugador', 'mruiz', 'Manuel', 'Ruiz', 'mruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 1),
(11, 'jugador', 'jsanchez', 'Jorge', 'Sanchez', 'jsanchez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 2),
(12, 'jugador', 'sperez', 'Sara', 'Perez', 'sperez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'Si', 2),
(13, 'jugador', 'rlopez', 'Ruben', 'Lopez', 'rlopez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 2),
(14, 'jugador', 'jhernandez', 'Julia', 'Hernandez', 'jhernandez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 2),
(15, 'jugador', 'hmartinez', 'Hugo', 'Martinez', 'hmartinez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'Si', 3),
(16, 'jugador', 'mgutierrez', 'Miguel', 'Gutierrez', 'mgutierrez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 3),
(17, 'jugador', 'igil', 'Ines', 'Gil', 'igil@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 3),
(18, 'jugador', 'dfernandez', 'Daniel', 'Fernandez', 'dfernandez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 3),
(19, 'jugador', 'mcuellar', 'Manolo', 'Cuellar', 'mcuellar@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 4),
(20, 'jugador', 'freyes', 'Fran', 'Reyes', 'freyes@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 4),
(21, 'jugador', 'rquevedo', 'Raul', 'Quevedo', 'rquevedo@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 4),
(22, 'jugador', 'dsanz', 'Diego', 'Sanz', 'dsanz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'Si', 4),
(23, 'jugador', 'falvarez', 'Fernando', 'Alvarez', 'falvarez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 4),
(24, 'jugador', 'vcrespo', 'Valentina', 'Crespo', 'vcrespo@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', NULL),
(25, 'jugador', 'djohnson', 'Dwayne', 'Jhonson', 'djohnson@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 5),
(26, 'jugador', 'bvillalejo', 'Bruno', 'Villalejo', 'bvillalejo@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'Si', 5),
(27, 'jugador', 'iruiz', 'Irene', 'Ruiz', 'iruiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 5),
(28, 'jugador', 'jsanchez', 'Juan', 'Sanchez', 'jsanchez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 5),
(29, 'jugador', 'mfigueroa', 'Miguel', 'Figueroa', 'mfigueroa@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 6),
(30, 'jugador', 'agutierrez', 'Andres', 'Gutierrez', 'agutierrez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 6),
(31, 'jugador', 'ikhafir', 'Ismael', 'Khafir', 'ikhafir@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 6),
(32, 'jugador', 'ssanz', 'Saul', 'Sanz', 'ssanz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'Si', 6),
(33, 'jugador', 'xkamamoto', 'Xiao', 'Kamamoto', 'xkamamoto@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 6),
(34, 'jugador', 'estevenson', 'Edward', 'Stevenson', 'estevenson@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 7),
(35, 'jugador', 'nmoreno', 'Nicolas', 'Moreno', 'nmoreno@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 7),
(36, 'jugador', 'sfigueroa', 'Silvia', 'Figueroa', 'sfigueroa@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'Si', 7),
(37, 'jugador', 'apena', 'Antonio', 'Peña', 'apena@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 7),
(38, 'jugador', 'ivillarejo', 'Ivan', 'Villarejo', 'ivillarejo@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 7),
(39, 'jugador', 'etelvino', 'Etelvino', 'Rodriguez', 'etelvino@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 8),
(40, 'jugador', 'vgomez', 'Violeta', 'Gomez', 'vgomez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 8),
(41, 'jugador', 'nelopez', 'Neida', 'Lopez', 'nlopez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 8),
(42, 'jugador', 'luperez', 'Lucas', 'Perez', 'lperez@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'Si', 8),
(43, 'jugador', 'nmolina', 'Nahuel', 'Molina', 'nmolina@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 8),
(44, 'jugador', 'fluiz', 'Filipe', 'Luiz', 'fluiz@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', NULL),
(45, 'jugador', 'mdossantos', 'Marcelo', 'Dos Santos', 'mdossantos@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', NULL),
(46, 'jugador', 'ainiesta', 'Andres', 'Iniesta', 'ainiesta@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', NULL),
(47, 'jugador', 'xpuyol', 'Xabier', 'Puyol', 'xpuyol@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', NULL),
(48, 'jugador', 'cpique', 'Carles', 'Pique', 'cpique@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', NULL),
(49, 'jugador', 'damaruwu', 'Daniel', 'Marugan', 'damaruwu@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'Si', 9),
(50, 'jugador', 'gschols', 'Gerrard', 'Schols', 'gschols@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', NULL),
(51, 'jugador', 'vinija', 'Vinicius', 'Janeiro', 'vinija@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', NULL),
(52, 'jugador', 'kareno', 'Karim', 'Moreno', 'kareno@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', 5),
(53, 'jugador', 'ferto96', 'Fernando', 'Torres', 'ferto96@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', NULL),
(54, 'jugador', 'peloba', 'Pelayo', 'Obaya', 'peloba@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', NULL),
(55, 'jugador', 'lioronaldo', 'Lionel', 'Ronaldo', 'lioronaldo@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', NULL),
(68, 'jugador', 'klampard', 'Kevin', 'Lampard', 'klampard@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', NULL),
(69, 'jugador', 'eamunike', 'Enquire', 'Amunike', 'eamunike@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', NULL),
(70, 'jugador', 'acholo', 'Amunike', 'Cholo', 'acholo@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', NULL),
(71, 'jugador', 'imuniain', 'Iker', 'Muniain', 'imuniain@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', NULL),
(72, 'jugador', 'rcarlos', 'Robert', 'Carlos', 'rcarlos@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', NULL),
(73, 'jugador', 'bvillabajo', 'Beatriz', 'Villabajo', 'bvillabajo@educa.madrid.org', '25d55ad283aa400af464c76d713c07ad', '1-DAW-D', 'No', NULL);

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
