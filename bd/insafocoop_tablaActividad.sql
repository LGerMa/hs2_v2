-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2016 at 06:46 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insafocoop`
--

-- --------------------------------------------------------

--
-- Table structure for table `actividad`
--

CREATE TABLE `actividad` (
  `idActividad` int(11) NOT NULL,
  `actividadProgramada` varchar(250) NOT NULL,
  `codCooperativa` varchar(20) NOT NULL,
  `idEstadoActividad` int(11) NOT NULL,
  `codSemanal` varchar(50) NOT NULL,
  `diaSemana` date NOT NULL,
  `HoraIni` time NOT NULL,
  `HoraFin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actividad`
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
(12, 'NADA', 'CP16_8CB2E0C', 1, 'user1-39-2016', '0000-00-00', '10:36:43', '10:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `cooperativa`
--

CREATE TABLE `cooperativa` (
  `codCooperativa` varchar(20) NOT NULL,
  `passCooperativa` varchar(45) NOT NULL,
  `nombreCooperativa` varchar(45) NOT NULL,
  `direccionCooperativa` varchar(250) NOT NULL,
  `contactoCooperativa` varchar(50) NOT NULL,
  `correoContactoCooperativa` varchar(100) DEFAULT NULL,
  `telefonoCooperativa` varchar(9) DEFAULT NULL,
  `fechaRegistroCooperativa` datetime NOT NULL,
  `fechaModificadoCooperativa` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cooperativa`
--

INSERT INTO `cooperativa` (`codCooperativa`, `passCooperativa`, `nombreCooperativa`, `direccionCooperativa`, `contactoCooperativa`, `correoContactoCooperativa`, `telefonoCooperativa`, `fechaRegistroCooperativa`, `fechaModificadoCooperativa`) VALUES
('CP16_8CB2E0B', '571b5bbc995effb188b907227d4976c7', 'No UCA', 'Por ahi', 'yo', 'yo@insafocoop.gob.sv', '223-56988', '2016-09-14 19:00:07', NULL),
('CP16_8CB2E0C', '1f32aa4c9a1d2ea010adcf2348166a04', 'UCA', 'UCA SS', 'UCA', 'uca@uca.edu.sv', '2225-2456', '2016-08-17 16:07:35', '2016-08-18 15:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `estadoactividad`
--

CREATE TABLE `estadoactividad` (
  `idEstadoActividad` int(11) NOT NULL,
  `estadoActividad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estadoactividad`
--

INSERT INTO `estadoactividad` (`idEstadoActividad`, `estadoActividad`) VALUES
(1, 'Pendiente'),
(2, 'En Desarrollo'),
(3, 'Terminado');

-- --------------------------------------------------------

--
-- Table structure for table `estadosemanal`
--

CREATE TABLE `estadosemanal` (
  `idEstadoSemanal` int(11) NOT NULL,
  `estadoSemanal` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estadosemanal`
--

INSERT INTO `estadosemanal` (`idEstadoSemanal`, `estadoSemanal`) VALUES
(1, 'Creado'),
(2, 'En espera'),
(3, 'Aprobado'),
(4, 'Rechazado'),
(5, 'Realizado');

-- --------------------------------------------------------

--
-- Table structure for table `estadousuario`
--

CREATE TABLE `estadousuario` (
  `idEstadoUsuario` int(11) NOT NULL,
  `estadoUsuario` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estadousuario`
--

INSERT INTO `estadousuario` (`idEstadoUsuario`, `estadoUsuario`) VALUES
(1, 'Activo'),
(2, 'Permiso Temporal'),
(3, 'Despedido');

-- --------------------------------------------------------

--
-- Table structure for table `puesto`
--

CREATE TABLE `puesto` (
  `idPuesto` int(11) NOT NULL,
  `puesto` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `puesto`
--

INSERT INTO `puesto` (`idPuesto`, `puesto`) VALUES
(1, 'Jefe'),
(2, 'Asesor'),
(3, 'Auditor'),
(4, 'Capacitador'),
(5, 'Otro');

-- --------------------------------------------------------

--
-- Table structure for table `semanal`
--

CREATE TABLE `semanal` (
  `codSemanal` varchar(50) NOT NULL,
  `semana` int(11) NOT NULL,
  `registroSemanal` datetime NOT NULL,
  `correoUsuario` varchar(100) NOT NULL,
  `idEstadoSemanal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `semanal`
--

INSERT INTO `semanal` (`codSemanal`, `semana`, `registroSemanal`, `correoUsuario`, `idEstadoSemanal`) VALUES
('user1-37-2016', 37, '2016-09-05 15:25:22', 'user1@insafocoop.gob.sv', 1),
('user1-38-2016', 38, '2016-09-11 22:45:14', 'user1@insafocoop.gob.sv', 1),
('user1-39-2016', 39, '2016-09-23 10:36:38', 'user1@insafocoop.gob.sv', 1),
('user2-37-2016', 37, '2016-09-10 20:24:00', 'user2@insafocoop.gob.sv', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idtipoUsuario` int(11) NOT NULL,
  `tipoUsuario` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipousuario`
--

INSERT INTO `tipousuario` (`idtipoUsuario`, `tipoUsuario`) VALUES
(1, 'admin'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Table structure for table `unidad`
--

CREATE TABLE `unidad` (
  `idUnidad` int(11) NOT NULL,
  `unidad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unidad`
--

INSERT INTO `unidad` (`idUnidad`, `unidad`) VALUES
(1, 'FOMENTO Y ASISTENCIA TECNICA'),
(2, 'VIGILANCIA Y FISCALIZACION'),
(3, 'OFICINA REGIONAL'),
(4, 'OTRA UNIDAD');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
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
  `fechaModificadoUsuario` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`correoUsuario`, `passUsuario`, `nombreUsuario`, `apellidoUsuario`, `idTipoUsuario`, `idUnidad`, `idPuesto`, `idZona`, `idEstadoUsuario`, `fechaRegistroUsuario`, `fechaModificadoUsuario`) VALUES
('admin@insafocoop.gob.sv', '0192023a7bbd73250516f069df18b500', 'admin', 'admin', 1, 4, 5, 3, 1, '2016-08-01 16:42:54', '2016-08-18 10:01:35'),
('lgmm_93@yahoo.es', '827ccb0eea8a706c4c34a16891f84e7b', 'Luis', 'M', 1, 1, 1, 1, 1, '2016-08-09 15:20:09', '2016-08-18 10:02:18'),
('user1@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'user1', 'user1', 2, 2, 4, 3, 1, '2016-08-08 14:42:20', '2016-09-05 15:24:34'),
('user2@insafocoop.gob.sv', 'e10adc3949ba59abbe56e057f20f883e', 'user2', 'user2', 2, 3, 3, 3, 1, '2016-08-08 14:46:02', '2016-09-10 20:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `zona`
--

CREATE TABLE `zona` (
  `idZona` int(11) NOT NULL,
  `tipoZona` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zona`
--

INSERT INTO `zona` (`idZona`, `tipoZona`) VALUES
(1, 'occidental'),
(2, 'oriental'),
(3, 'central'),
(4, 'paracentral');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`idActividad`),
  ADD UNIQUE KEY `idActividad_UNIQUE` (`idActividad`),
  ADD KEY `fk_actividad_cooperativa_idx` (`codCooperativa`),
  ADD KEY `fk_actividad_estadoActividad_idx` (`idEstadoActividad`),
  ADD KEY `fk_actividad_semanal_idx` (`codSemanal`);

--
-- Indexes for table `cooperativa`
--
ALTER TABLE `cooperativa`
  ADD PRIMARY KEY (`codCooperativa`),
  ADD UNIQUE KEY `codCooperativa_UNIQUE` (`codCooperativa`);

--
-- Indexes for table `estadoactividad`
--
ALTER TABLE `estadoactividad`
  ADD PRIMARY KEY (`idEstadoActividad`),
  ADD UNIQUE KEY `idEstadoActividad_UNIQUE` (`idEstadoActividad`);

--
-- Indexes for table `estadosemanal`
--
ALTER TABLE `estadosemanal`
  ADD PRIMARY KEY (`idEstadoSemanal`),
  ADD UNIQUE KEY `idEstadoSemanal_UNIQUE` (`idEstadoSemanal`);

--
-- Indexes for table `estadousuario`
--
ALTER TABLE `estadousuario`
  ADD PRIMARY KEY (`idEstadoUsuario`),
  ADD UNIQUE KEY `idEstadoUsuario_UNIQUE` (`idEstadoUsuario`);

--
-- Indexes for table `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`idPuesto`),
  ADD UNIQUE KEY `idPuesto_UNIQUE` (`idPuesto`);

--
-- Indexes for table `semanal`
--
ALTER TABLE `semanal`
  ADD PRIMARY KEY (`codSemanal`),
  ADD UNIQUE KEY `codSemanal_UNIQUE` (`codSemanal`),
  ADD KEY `fk_semanal_usuario_idx` (`correoUsuario`),
  ADD KEY `fk_semanal_estadoSemanal_idx` (`idEstadoSemanal`);

--
-- Indexes for table `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idtipoUsuario`),
  ADD UNIQUE KEY `idtipoUsuario_UNIQUE` (`idtipoUsuario`);

--
-- Indexes for table `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`idUnidad`),
  ADD UNIQUE KEY `idUnidad_UNIQUE` (`idUnidad`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`correoUsuario`),
  ADD UNIQUE KEY `correoUsuario_UNIQUE` (`correoUsuario`),
  ADD KEY `fk_usuario_tipoUsuario_idx` (`idTipoUsuario`),
  ADD KEY `fk_usuario_zona_idx` (`idZona`),
  ADD KEY `fk_usuario_unidad_idx` (`idUnidad`),
  ADD KEY `fk_usuario_puesto_idx` (`idPuesto`),
  ADD KEY `fk_usuario_estado_idx` (`idEstadoUsuario`);

--
-- Indexes for table `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`idZona`),
  ADD UNIQUE KEY `idZona_UNIQUE` (`idZona`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actividad`
--
ALTER TABLE `actividad`
  MODIFY `idActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `fk_actividad_cooperativa` FOREIGN KEY (`codCooperativa`) REFERENCES `cooperativa` (`codCooperativa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_actividad_estadoActividad` FOREIGN KEY (`idEstadoActividad`) REFERENCES `estadoactividad` (`idEstadoActividad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_actividad_semanal` FOREIGN KEY (`codSemanal`) REFERENCES `semanal` (`codSemanal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `semanal`
--
ALTER TABLE `semanal`
  ADD CONSTRAINT `fk_semanal_estadoSemanal` FOREIGN KEY (`idEstadoSemanal`) REFERENCES `estadosemanal` (`idEstadoSemanal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_semanal_usuario` FOREIGN KEY (`correoUsuario`) REFERENCES `usuario` (`correoUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_estado` FOREIGN KEY (`idEstadoUsuario`) REFERENCES `estadousuario` (`idEstadoUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_puesto` FOREIGN KEY (`idPuesto`) REFERENCES `puesto` (`idPuesto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_tipoUsuario` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipousuario` (`idtipoUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_unidad` FOREIGN KEY (`idUnidad`) REFERENCES `unidad` (`idUnidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_zona` FOREIGN KEY (`idZona`) REFERENCES `zona` (`idZona`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
