
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generacion: 13-10-2016 a las 12:44:10
-- Version del servidor: 10.0.20-MariaDB
-- Version de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u412462617_insaf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE IF NOT EXISTS `actividad` (
  `idActividad` int(11) NOT NULL AUTO_INCREMENT,
  `actividadProgramada` varchar(250) NOT NULL,
  `codCooperativa` varchar(20) NOT NULL,
  `idEstadoActividad` int(11) NOT NULL,
  `codSemanal` varchar(50) NOT NULL,
  `diaSemana` date NOT NULL,
  `HoraIni` time NOT NULL,
  `HoraFin` time NOT NULL,
  PRIMARY KEY (`idActividad`),
  UNIQUE KEY `idActividad_UNIQUE` (`idActividad`),
  KEY `fk_actividad_cooperativa_idx` (`codCooperativa`),
  KEY `fk_actividad_estadoActividad_idx` (`idEstadoActividad`),
  KEY `fk_actividad_semanal_idx` (`codSemanal`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`idActividad`, `actividadProgramada`, `codCooperativa`, `idEstadoActividad`, `codSemanal`, `diaSemana`, `HoraIni`, `HoraFin`) VALUES
(1, 'Holo', 'CP16_8CB2E0C', 1, 'user1-38-2016', '0000-00-00', '15:25:06', '15:25:07'),
(2, 'No Holo', 'CP16_8CB2E0B', 1, 'user1-38-2016', '0000-00-00', '12:08:34', '12:08:36'),
(3, 'No Holo', 'CP16_8CB2E0B', 1, 'user1-38-2016', '0000-00-00', '12:08:34', '12:08:36'),
(4, 'no holo 2', 'CP16_8CB2E0C', 1, 'user1-38-2016', '0000-00-00', '12:11:18', '12:11:18'),
(5, 'no holo 2', 'CP16_8CB2E0C', 1, 'user1-38-2016', '0000-00-00', '12:11:18', '12:11:18'),
(6, 'Voy a poner mas cosas a la BD', 'CP16_8CB2E0C', 1, 'user1-38-2016', '0000-00-00', '18:29:40', '19:29:44'),
(7, 'Voy a poner mas cosas a la BD', 'CP16_8CB2E0C', 1, 'user1-38-2016', '0000-00-00', '18:29:40', '19:29:44'),
(8, 'HOLOOOOOOOOOO', 'CP16_8CB2E0B', 1, 'user1-38-2016', '0000-00-00', '14:30:23', '20:30:27'),
(9, 'HOLOOOOOOOOOO', 'CP16_8CB2E0B', 1, 'user1-38-2016', '0000-00-00', '14:30:23', '20:30:27'),
(10, 'Fin', 'CP16_8CB2E0C', 1, 'user1-38-2016', '0000-00-00', '05:34:08', '19:34:11'),
(11, 'Fin', 'CP16_8CB2E0C', 1, 'user1-38-2016', '0000-00-00', '05:34:08', '19:34:11'),
(12, 'NADA', 'CP16_8CB2E0C', 1, 'user1-39-2016', '0000-00-00', '10:36:43', '10:36:44'),
(13, 'Visita Tecnica', 'CP16_8CB2E0C', 1, 'miguel.ramirez-40-2016', '2016-09-27', '14:46:59', '16:47:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cooperativa`
--

CREATE TABLE IF NOT EXISTS `cooperativa` (
  `codCooperativa` varchar(20) NOT NULL,
  `passCooperativa` varchar(45) NOT NULL,
  `nombreCooperativa` varchar(45) NOT NULL,
  `direccionCooperativa` varchar(250) NOT NULL,
  `contactoCooperativa` varchar(50) NOT NULL,
  `correoContactoCooperativa` varchar(100) DEFAULT NULL,
  `telefonoCooperativa` varchar(9) DEFAULT NULL,
  `fechaRegistroCooperativa` datetime NOT NULL,
  `fechaModificadoCooperativa` datetime DEFAULT NULL,
  PRIMARY KEY (`codCooperativa`),
  UNIQUE KEY `codCooperativa_UNIQUE` (`codCooperativa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cooperativa`
--

INSERT INTO `cooperativa` (`codCooperativa`, `passCooperativa`, `nombreCooperativa`, `direccionCooperativa`, `contactoCooperativa`, `correoContactoCooperativa`, `telefonoCooperativa`, `fechaRegistroCooperativa`, `fechaModificadoCooperativa`) VALUES
('CP16_8CB2E0B', 'e12ad0aa34426dd802b47ac5733dd32d', 'INSAFOCOOP', '15 Calle Poniente No. 402, Edificio Urritia Abrego No. 2, Frente a INPEP Centro de Gobierno, San Salvador, El Salvador, C.A.', 'INSAFOCOOP', 'insafocoop@insafocoop.gob.sv', '22224122', '2016-09-14 19:00:07', '2016-09-27 20:09:01'),
('CP16_8CB2E0C', '8fce2616242fc3b6b64c5eb5ea0e26ed', 'UCA', 'Bulevar Los Proceres, Antiguo Cuscatlan, La Libertad, El Salvador, Centroamerica', 'UCA', 'direccion.comunicaciones@uca.edu.sv', '22106600', '2016-08-17 16:07:35', '2016-09-27 20:10:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoactividad`
--

CREATE TABLE IF NOT EXISTS `estadoactividad` (
  `idEstadoActividad` int(11) NOT NULL,
  `estadoActividad` varchar(45) NOT NULL,
  PRIMARY KEY (`idEstadoActividad`),
  UNIQUE KEY `idEstadoActividad_UNIQUE` (`idEstadoActividad`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadoactividad`
--

INSERT INTO `estadoactividad` (`idEstadoActividad`, `estadoActividad`) VALUES
(1, 'Pendiente'),
(2, 'En Desarrollo'),
(3, 'Terminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosemanal`
--

CREATE TABLE IF NOT EXISTS `estadosemanal` (
  `idEstadoSemanal` int(11) NOT NULL,
  `estadoSemanal` varchar(45) NOT NULL,
  PRIMARY KEY (`idEstadoSemanal`),
  UNIQUE KEY `idEstadoSemanal_UNIQUE` (`idEstadoSemanal`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadosemanal`
--

INSERT INTO `estadosemanal` (`idEstadoSemanal`, `estadoSemanal`) VALUES
(1, 'Creado'),
(2, 'En espera'),
(3, 'Aprobado'),
(4, 'Rechazado'),
(5, 'Realizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadousuario`
--

CREATE TABLE IF NOT EXISTS `estadousuario` (
  `idEstadoUsuario` int(11) NOT NULL,
  `estadoUsuario` varchar(45) NOT NULL,
  PRIMARY KEY (`idEstadoUsuario`),
  UNIQUE KEY `idEstadoUsuario_UNIQUE` (`idEstadoUsuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadousuario`
--

INSERT INTO `estadousuario` (`idEstadoUsuario`, `estadoUsuario`) VALUES
(1, 'Activo'),
(2, 'Permiso Temporal'),
(3, 'Despedido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE IF NOT EXISTS `puesto` (
  `idPuesto` int(11) NOT NULL,
  `puesto` varchar(45) NOT NULL,
  PRIMARY KEY (`idPuesto`),
  UNIQUE KEY `idPuesto_UNIQUE` (`idPuesto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`idPuesto`, `puesto`) VALUES
(1, 'Jefe'),
(2, 'Asesor'),
(3, 'Auditor'),
(4, 'Capacitador'),
(5, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semanal`
--

CREATE TABLE IF NOT EXISTS `semanal` (
  `codSemanal` varchar(50) NOT NULL,
  `semana` int(11) NOT NULL,
  `registroSemanal` datetime NOT NULL,
  `correoUsuario` varchar(100) NOT NULL,
  `idEstadoSemanal` int(11) NOT NULL,
  PRIMARY KEY (`codSemanal`),
  UNIQUE KEY `codSemanal_UNIQUE` (`codSemanal`),
  KEY `fk_semanal_usuario_idx` (`correoUsuario`),
  KEY `fk_semanal_estadoSemanal_idx` (`idEstadoSemanal`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `semanal`
--

INSERT INTO `semanal` (`codSemanal`, `semana`, `registroSemanal`, `correoUsuario`, `idEstadoSemanal`) VALUES
('user1-37-2016', 37, '2016-09-05 15:25:22', 'user1@insafocoop.gob.sv', 1),
('user1-38-2016', 38, '2016-09-11 22:45:14', 'user1@insafocoop.gob.sv', 1),
('user1-39-2016', 39, '2016-09-23 10:36:38', 'user1@insafocoop.gob.sv', 1),
('user2-37-2016', 37, '2016-09-10 20:24:00', 'user2@insafocoop.gob.sv', 1),
('user1-40-2016', 40, '2016-09-26 16:28:09', 'user1@insafocoop.gob.sv', 1),
('miguel.ramirez-40-2016', 40, '2016-09-27 20:46:48', 'miguel.ramirez@insafocoop.gob.sv', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE IF NOT EXISTS `tipousuario` (
  `idtipoUsuario` int(11) NOT NULL,
  `tipoUsuario` varchar(45) NOT NULL,
  PRIMARY KEY (`idtipoUsuario`),
  UNIQUE KEY `idtipoUsuario_UNIQUE` (`idtipoUsuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idtipoUsuario`, `tipoUsuario`) VALUES
(1, 'admin'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE IF NOT EXISTS `unidad` (
  `idUnidad` int(11) NOT NULL,
  `unidad` varchar(45) NOT NULL,
  PRIMARY KEY (`idUnidad`),
  UNIQUE KEY `idUnidad_UNIQUE` (`idUnidad`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`idUnidad`, `unidad`) VALUES
(1, 'FOMENTO Y ASISTENCIA TECNICA'),
(2, 'VIGILANCIA Y FISCALIZACION'),
(3, 'OFICINA REGIONAL'),
(4, 'OTRA UNIDAD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `correoUsuario` varchar(100) NOT NULL,
  `passUsuario` varchar(45) NOT NULL,
  `nombreUsuario` varchar(50) NOT NULL,
  `apellidoUsuario` varchar(50) NOT NULL,
  `idTipoUsuario` int(11) NOT NULL,
  `idUnidad` int(11) NOT NULL,
  `idPuesto` int(11) NOT NULL,
  `idZona` int(11) NOT NULL,
  `idEstadoUsuario` int(11) NOT NULL,
  `fechaRegistroUsuario` datetime NOT NULL,
  `fechaModificadoUsuario` datetime DEFAULT NULL,
  PRIMARY KEY (`correoUsuario`),
  UNIQUE KEY `correoUsuario_UNIQUE` (`correoUsuario`),
  KEY `fk_usuario_tipoUsuario_idx` (`idTipoUsuario`),
  KEY `fk_usuario_zona_idx` (`idZona`),
  KEY `fk_usuario_unidad_idx` (`idUnidad`),
  KEY `fk_usuario_puesto_idx` (`idPuesto`),
  KEY `fk_usuario_estado_idx` (`idEstadoUsuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`correoUsuario`, `passUsuario`, `nombreUsuario`, `apellidoUsuario`, `idTipoUsuario`, `idUnidad`, `idPuesto`, `idZona`, `idEstadoUsuario`, `fechaRegistroUsuario`, `fechaModificadoUsuario`) VALUES
('admin@insafocoop.gob.sv', '0192023a7bbd73250516f069df18b500', 'admin', 'admin', 1, 4, 5, 3, 1, '2016-08-01 16:42:54', '2016-08-18 10:01:35'),
('lgmm_93@yahoo.es', '827ccb0eea8a706c4c34a16891f84e7b', 'Luis', 'M', 1, 1, 1, 1, 1, '2016-08-09 15:20:09', '2016-08-18 10:02:18'),
('user1@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'user1', 'user1', 2, 2, 4, 3, 1, '2016-08-08 14:42:20', '2016-09-05 15:24:34'),
('user2@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'user2', 'user2', 2, 3, 3, 3, 1, '2016-08-08 14:46:02', '2016-09-10 20:23:30'),
('nuria.funes@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Nuria del Carmen', 'Funes de Perez', 2, 1, 1, 3, 1, '2016-09-27 16:57:01', NULL),
('miguel.ramirez@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Miguel Angel', 'Ramirez Rosales', 2, 1, 2, 3, 1, '2016-09-27 16:57:54', NULL),
('mauricio.aguilar@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Mauricio Santiago', 'Aguilar Mendoza', 2, 1, 2, 3, 1, '2016-09-27 16:58:42', NULL),
('maria.rosa@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Maria Antonia', 'Rosa', 2, 2, 1, 3, 1, '2016-09-27 17:00:12', NULL),
('jaime.garcia@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Jaime Ivan', 'Garcia Flores', 2, 2, 3, 3, 1, '2016-09-27 17:00:44', NULL),
('luz.perez@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Luz de Maria', 'Perez', 2, 2, 3, 3, 1, '2016-09-27 17:01:20', NULL),
('xiomara.garcia@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Xiomara Leticia', 'Garcia Minero', 2, 4, 3, 3, 1, '2016-09-27 17:08:14', NULL),
('jimmy.caballero@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Jimmy Alexander', 'Caballero Orantes', 2, 4, 1, 1, 1, '2016-09-27 17:09:36', NULL),
('maria.mendez@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Maria Luisa', 'Mendez Jovel', 2, 4, 3, 1, 1, '2016-09-27 17:10:12', NULL),
('margarita.anaya@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Ana Margarita', 'Anaya Ruano', 2, 1, 2, 1, 1, '2016-09-27 17:10:45', NULL),
('martin.moreno@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Martin Antonio', 'Moreno Sandoval', 2, 4, 2, 1, 1, '2016-09-27 17:14:03', NULL),
('jorge.miranda@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Jorge Federico', ' Miranda', 2, 4, 3, 1, 1, '2016-09-27 17:14:52', NULL),
('flor.flores@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Flor de Maria', 'Flores de Lopez', 2, 3, 1, 4, 1, '2016-09-27 17:21:31', NULL),
('patricia.escobar@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Patricia Elizabeth', 'Escobar de Ortiz', 2, 3, 2, 4, 1, '2016-09-27 17:22:02', NULL),
('karen.perez@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Karen Alexia', 'Perez Alfaro', 2, 3, 3, 4, 1, '2016-09-27 17:22:33', NULL),
('ramon.romero@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Ramon Edgardo', 'Romero Campos', 2, 3, 3, 4, 1, '2016-09-27 19:54:25', NULL),
('telma.reyes@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Telma Azucena', 'Reyes Contreras', 2, 3, 1, 2, 1, '2016-09-27 19:55:09', NULL),
('isabel.quintanilla@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Maria Isabel', 'Quintanilla Avila', 2, 3, 2, 2, 1, '2016-09-27 19:56:26', NULL),
('vicky.osorio@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Vicky Lisseth', 'Osorio Ventura', 2, 3, 2, 2, 1, '2016-09-27 19:57:04', NULL),
('roxana.morales@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Roxana Leonor', 'Morales Guevara', 2, 3, 3, 2, 1, '2016-09-27 19:57:41', NULL),
('boris.molina@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Boris Stanly', 'Molina', 2, 3, 3, 2, 1, '2016-09-27 19:58:16', NULL),
('fredy.hernandez@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Fredy Armando', 'Hernandez Ramirez', 2, 3, 3, 2, 1, '2016-09-27 19:58:53', NULL),
('jorge.chavez@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Jorge Alberto', 'Chavez Escobar', 2, 4, 5, 3, 1, '2016-09-27 19:59:34', NULL),
('stephanie.perez@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Stephanie Claribel', 'Perez Carrillo', 2, 4, 5, 3, 1, '2016-09-27 20:00:32', NULL),
('karla.portillo@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'Karla Griselda', 'Portillo de Santos', 1, 4, 5, 3, 1, '2016-09-27 20:01:02', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE IF NOT EXISTS `zona` (
  `idZona` int(11) NOT NULL,
  `tipoZona` varchar(45) NOT NULL,
  PRIMARY KEY (`idZona`),
  UNIQUE KEY `idZona_UNIQUE` (`idZona`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`idZona`, `tipoZona`) VALUES
(1, 'occidental'),
(2, 'oriental'),
(3, 'central'),
(4, 'paracentral');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
