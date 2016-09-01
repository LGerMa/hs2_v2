-- MySQL dump 10.13  Distrib 5.5.50, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: insafocoop
-- ------------------------------------------------------
-- Server version	5.5.50-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `actividad`
--

DROP TABLE IF EXISTS `actividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actividad` (
  `idActividad` int(11) NOT NULL AUTO_INCREMENT,
  `actividadProgramada` varchar(250) NOT NULL,
  `codCooperativa` varchar(20) NOT NULL,
  `idEstadoActividad` int(11) NOT NULL,
  `fechaRegistroActividad` datetime NOT NULL,
  `fechaModificadoActividad` datetime DEFAULT NULL,
  `codSemanal` varchar(50) NOT NULL,
  PRIMARY KEY (`idActividad`),
  UNIQUE KEY `idActividad_UNIQUE` (`idActividad`),
  KEY `fk_actividad_cooperativa_idx` (`codCooperativa`),
  KEY `fk_actividad_estadoActividad_idx` (`idEstadoActividad`),
  KEY `fk_actividad_semanal_idx` (`codSemanal`),
  CONSTRAINT `fk_actividad_cooperativa` FOREIGN KEY (`codCooperativa`) REFERENCES `cooperativa` (`codCooperativa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_actividad_estadoActividad` FOREIGN KEY (`idEstadoActividad`) REFERENCES `estadoActividad` (`idEstadoActividad`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_actividad_semanal` FOREIGN KEY (`codSemanal`) REFERENCES `semanal` (`codSemanal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividad`
--

LOCK TABLES `actividad` WRITE;
/*!40000 ALTER TABLE `actividad` DISABLE KEYS */;
/*!40000 ALTER TABLE `actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cooperativa`
--

DROP TABLE IF EXISTS `cooperativa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cooperativa` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cooperativa`
--

LOCK TABLES `cooperativa` WRITE;
/*!40000 ALTER TABLE `cooperativa` DISABLE KEYS */;
INSERT INTO `cooperativa` VALUES ('CP16_8CB2E0C','1f32aa4c9a1d2ea010adcf2348166a04','UCA','UCA SS','UCA','uca@uca.edu.sv','2225-2456','2016-08-17 16:07:35','2016-08-18 15:51:07');
/*!40000 ALTER TABLE `cooperativa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadoActividad`
--

DROP TABLE IF EXISTS `estadoActividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estadoActividad` (
  `idEstadoActividad` int(11) NOT NULL,
  `estadoActividad` varchar(45) NOT NULL,
  PRIMARY KEY (`idEstadoActividad`),
  UNIQUE KEY `idEstadoActividad_UNIQUE` (`idEstadoActividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadoActividad`
--

LOCK TABLES `estadoActividad` WRITE;
/*!40000 ALTER TABLE `estadoActividad` DISABLE KEYS */;
INSERT INTO `estadoActividad` VALUES (1,'Pendiente'),(2,'En Desarrollo'),(3,'Terminado');
/*!40000 ALTER TABLE `estadoActividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadoSemanal`
--

DROP TABLE IF EXISTS `estadoSemanal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estadoSemanal` (
  `idEstadoSemanal` int(11) NOT NULL,
  `estadoSemanal` varchar(45) NOT NULL,
  PRIMARY KEY (`idEstadoSemanal`),
  UNIQUE KEY `idEstadoSemanal_UNIQUE` (`idEstadoSemanal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadoSemanal`
--

LOCK TABLES `estadoSemanal` WRITE;
/*!40000 ALTER TABLE `estadoSemanal` DISABLE KEYS */;
INSERT INTO `estadoSemanal` VALUES (1,'Creado'),(2,'En espera'),(3,'Aprobado'),(4,'Rechazado'),(5,'Realizado');
/*!40000 ALTER TABLE `estadoSemanal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadoUsuario`
--

DROP TABLE IF EXISTS `estadoUsuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estadoUsuario` (
  `idEstadoUsuario` int(11) NOT NULL,
  `estadoUsuario` varchar(45) NOT NULL,
  PRIMARY KEY (`idEstadoUsuario`),
  UNIQUE KEY `idEstadoUsuario_UNIQUE` (`idEstadoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadoUsuario`
--

LOCK TABLES `estadoUsuario` WRITE;
/*!40000 ALTER TABLE `estadoUsuario` DISABLE KEYS */;
INSERT INTO `estadoUsuario` VALUES (1,'Activo'),(2,'Permiso Temporal'),(3,'Despedido');
/*!40000 ALTER TABLE `estadoUsuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fechaActividad`
--

DROP TABLE IF EXISTS `fechaActividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fechaActividad` (
  `idfechaActividad` int(11) NOT NULL AUTO_INCREMENT,
  `fechaActividad` date NOT NULL,
  `horaInicioActividad` time NOT NULL,
  `horaFinActividad` time NOT NULL,
  `idActividad` int(11) NOT NULL,
  PRIMARY KEY (`idfechaActividad`),
  UNIQUE KEY `idfechaActividad_UNIQUE` (`idfechaActividad`),
  KEY `fk_fechaActividad_actividad_idx` (`idActividad`),
  CONSTRAINT `fk_fechaActividad_actividad` FOREIGN KEY (`idActividad`) REFERENCES `actividad` (`idActividad`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fechaActividad`
--

LOCK TABLES `fechaActividad` WRITE;
/*!40000 ALTER TABLE `fechaActividad` DISABLE KEYS */;
/*!40000 ALTER TABLE `fechaActividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puesto`
--

DROP TABLE IF EXISTS `puesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puesto` (
  `idPuesto` int(11) NOT NULL,
  `puesto` varchar(45) NOT NULL,
  PRIMARY KEY (`idPuesto`),
  UNIQUE KEY `idPuesto_UNIQUE` (`idPuesto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puesto`
--

LOCK TABLES `puesto` WRITE;
/*!40000 ALTER TABLE `puesto` DISABLE KEYS */;
INSERT INTO `puesto` VALUES (1,'Jefe'),(2,'Asesor'),(3,'Auditor'),(4,'Capacitador'),(5,'Otro');
/*!40000 ALTER TABLE `puesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semanal`
--

DROP TABLE IF EXISTS `semanal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `semanal` (
  `codSemanal` varchar(50) NOT NULL,
  `semana` int(11) NOT NULL,
  `registroSemanal` datetime NOT NULL,
  `correoUsuario` varchar(100) NOT NULL,
  `idEstadoSemanal` int(11) NOT NULL,
  PRIMARY KEY (`codSemanal`),
  UNIQUE KEY `codSemanal_UNIQUE` (`codSemanal`),
  KEY `fk_semanal_usuario_idx` (`correoUsuario`),
  KEY `fk_semanal_estadoSemanal_idx` (`idEstadoSemanal`),
  CONSTRAINT `fk_semanal_usuario` FOREIGN KEY (`correoUsuario`) REFERENCES `usuario` (`correoUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_semanal_estadoSemanal` FOREIGN KEY (`idEstadoSemanal`) REFERENCES `estadoSemanal` (`idEstadoSemanal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semanal`
--

LOCK TABLES `semanal` WRITE;
/*!40000 ALTER TABLE `semanal` DISABLE KEYS */;
/*!40000 ALTER TABLE `semanal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoUsuario`
--

DROP TABLE IF EXISTS `tipoUsuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoUsuario` (
  `idtipoUsuario` int(11) NOT NULL,
  `tipoUsuario` varchar(45) NOT NULL,
  PRIMARY KEY (`idtipoUsuario`),
  UNIQUE KEY `idtipoUsuario_UNIQUE` (`idtipoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoUsuario`
--

LOCK TABLES `tipoUsuario` WRITE;
/*!40000 ALTER TABLE `tipoUsuario` DISABLE KEYS */;
INSERT INTO `tipoUsuario` VALUES (1,'admin'),(2,'usuario');
/*!40000 ALTER TABLE `tipoUsuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad`
--

DROP TABLE IF EXISTS `unidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad` (
  `idUnidad` int(11) NOT NULL,
  `unidad` varchar(45) NOT NULL,
  PRIMARY KEY (`idUnidad`),
  UNIQUE KEY `idUnidad_UNIQUE` (`idUnidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad`
--

LOCK TABLES `unidad` WRITE;
/*!40000 ALTER TABLE `unidad` DISABLE KEYS */;
INSERT INTO `unidad` VALUES (1,'FOMENTO Y ASISTENCIA TECNICA'),(2,'VIGILANCIA Y FISCALIZACION'),(3,'OFICINA REGIONAL'),(4,'OTRA UNIDAD');
/*!40000 ALTER TABLE `unidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `fechaModificadoUsuario` datetime DEFAULT NULL,
  PRIMARY KEY (`correoUsuario`),
  UNIQUE KEY `correoUsuario_UNIQUE` (`correoUsuario`),
  KEY `fk_usuario_tipoUsuario_idx` (`idTipoUsuario`),
  KEY `fk_usuario_zona_idx` (`idZona`),
  KEY `fk_usuario_unidad_idx` (`idUnidad`),
  KEY `fk_usuario_puesto_idx` (`idPuesto`),
  KEY `fk_usuario_estado_idx` (`idEstadoUsuario`),
  CONSTRAINT `fk_usuario_tipoUsuario` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipoUsuario` (`idtipoUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_zona` FOREIGN KEY (`idZona`) REFERENCES `zona` (`idZona`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_unidad` FOREIGN KEY (`idUnidad`) REFERENCES `unidad` (`idUnidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_puesto` FOREIGN KEY (`idPuesto`) REFERENCES `puesto` (`idPuesto`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_estado` FOREIGN KEY (`idEstadoUsuario`) REFERENCES `estadoUsuario` (`idEstadoUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('admin@insafocoop.gob.sv','0192023a7bbd73250516f069df18b500','admin','admin',1,4,5,3,1,'2016-08-01 16:42:54','2016-08-18 10:01:35'),('lgmm_93@yahoo.es','827ccb0eea8a706c4c34a16891f84e7b','Luis','M',1,1,1,1,1,'2016-08-09 15:20:09','2016-08-18 10:02:18'),('user1@insafocoop.gob.sv','827ccb0eea8a706c4c34a16891f84e7b','user1','user1',2,2,4,3,1,'2016-08-08 14:42:20','2016-08-18 09:57:32'),('user2@insafocoop.gob.sv','827ccb0eea8a706c4c34a16891f84e7b','user2','user2',2,3,3,3,1,'2016-08-08 14:46:02','2016-08-18 10:02:00');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zona`
--

DROP TABLE IF EXISTS `zona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zona` (
  `idZona` int(11) NOT NULL,
  `tipoZona` varchar(45) NOT NULL,
  PRIMARY KEY (`idZona`),
  UNIQUE KEY `idZona_UNIQUE` (`idZona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zona`
--

LOCK TABLES `zona` WRITE;
/*!40000 ALTER TABLE `zona` DISABLE KEYS */;
INSERT INTO `zona` VALUES (1,'occidental'),(2,'oriental'),(3,'central'),(4,'paracentral');
/*!40000 ALTER TABLE `zona` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-30 15:09:05
