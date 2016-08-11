SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `insafocoop` ;
CREATE SCHEMA IF NOT EXISTS `insafocoop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `insafocoop` ;

-- -----------------------------------------------------
-- Table `insafocoop`.`tipoUsuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `insafocoop`.`tipoUsuario` ;

CREATE TABLE IF NOT EXISTS `insafocoop`.`tipoUsuario` (
  `idtipoUsuario` INT NOT NULL,
  `tipoUsuario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtipoUsuario`),
  UNIQUE INDEX `idtipoUsuario_UNIQUE` (`idtipoUsuario` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insafocoop`.`zona`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `insafocoop`.`zona` ;

CREATE TABLE IF NOT EXISTS `insafocoop`.`zona` (
  `idZona` INT NOT NULL,
  `tipoZona` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idZona`),
  UNIQUE INDEX `idZona_UNIQUE` (`idZona` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insafocoop`.`unidad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `insafocoop`.`unidad` ;

CREATE TABLE IF NOT EXISTS `insafocoop`.`unidad` (
  `idUnidad` INT NOT NULL,
  `unidad` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idUnidad`),
  UNIQUE INDEX `idUnidad_UNIQUE` (`idUnidad` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insafocoop`.`puesto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `insafocoop`.`puesto` ;

CREATE TABLE IF NOT EXISTS `insafocoop`.`puesto` (
  `idPuesto` INT NOT NULL,
  `puesto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPuesto`),
  UNIQUE INDEX `idPuesto_UNIQUE` (`idPuesto` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insafocoop`.`estadoUsuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `insafocoop`.`estadoUsuario` ;

CREATE TABLE IF NOT EXISTS `insafocoop`.`estadoUsuario` (
  `idEstadoUsuario` INT NOT NULL,
  `estadoUsuario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEstadoUsuario`),
  UNIQUE INDEX `idEstadoUsuario_UNIQUE` (`idEstadoUsuario` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insafocoop`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `insafocoop`.`usuario` ;

CREATE TABLE IF NOT EXISTS `insafocoop`.`usuario` (
  `correoUsuario` VARCHAR(100) NOT NULL,
  `passUsuario` VARCHAR(45) NOT NULL,
  `nombreUsuario` VARCHAR(50) NOT NULL,
  `apellidoUsuario` VARCHAR(50) NOT NULL,
  `idTipoUsuario` INT NOT NULL,
  `idUnidad` INT NOT NULL,
  `idPuesto` INT NOT NULL,
  `idZona` INT NOT NULL,
  `idEstadoUsuario` INT NOT NULL,
  `fechaRegistroUsuario` DATETIME NOT NULL,
  `fechaModificadoUsuario` DATETIME NULL,
  PRIMARY KEY (`correoUsuario`),
  UNIQUE INDEX `correoUsuario_UNIQUE` (`correoUsuario` ASC),
  INDEX `fk_usuario_tipoUsuario_idx` (`idTipoUsuario` ASC),
  INDEX `fk_usuario_zona_idx` (`idZona` ASC),
  INDEX `fk_usuario_unidad_idx` (`idUnidad` ASC),
  INDEX `fk_usuario_puesto_idx` (`idPuesto` ASC),
  INDEX `fk_usuario_estado_idx` (`idEstadoUsuario` ASC),
  CONSTRAINT `fk_usuario_tipoUsuario`
    FOREIGN KEY (`idTipoUsuario`)
    REFERENCES `insafocoop`.`tipoUsuario` (`idtipoUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_zona`
    FOREIGN KEY (`idZona`)
    REFERENCES `insafocoop`.`zona` (`idZona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_unidad`
    FOREIGN KEY (`idUnidad`)
    REFERENCES `insafocoop`.`unidad` (`idUnidad`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_puesto`
    FOREIGN KEY (`idPuesto`)
    REFERENCES `insafocoop`.`puesto` (`idPuesto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_estado`
    FOREIGN KEY (`idEstadoUsuario`)
    REFERENCES `insafocoop`.`estadoUsuario` (`idEstadoUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insafocoop`.`cooperativa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `insafocoop`.`cooperativa` ;

CREATE TABLE IF NOT EXISTS `insafocoop`.`cooperativa` (
  `codCooperativa` VARCHAR(20) NOT NULL,
  `passCooperativa` VARCHAR(45) NOT NULL,
  `nombreCooperativa` VARCHAR(45) NOT NULL,
  `direccionCooperativa` VARCHAR(250) NOT NULL,
  `contactoCooperativa` VARCHAR(50) NOT NULL,
  `correoContactoCooperativa` VARCHAR(100) NULL,
  `telefonoCooperativa` VARCHAR(9) NULL,
  `fechaRegistroCooperativa` DATETIME NOT NULL,
  `fechaModificadoCooperativa` VARCHAR(45) NULL,
  PRIMARY KEY (`codCooperativa`),
  UNIQUE INDEX `codCooperativa_UNIQUE` (`codCooperativa` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insafocoop`.`estadoActividad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `insafocoop`.`estadoActividad` ;

CREATE TABLE IF NOT EXISTS `insafocoop`.`estadoActividad` (
  `idEstadoActividad` INT NOT NULL,
  `estadoActividad` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEstadoActividad`),
  UNIQUE INDEX `idEstadoActividad_UNIQUE` (`idEstadoActividad` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insafocoop`.`actividad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `insafocoop`.`actividad` ;

CREATE TABLE IF NOT EXISTS `insafocoop`.`actividad` (
  `idActividad` INT NOT NULL AUTO_INCREMENT,
  `correoUsuario` VARCHAR(100) NOT NULL,
  `actividadProgramada` VARCHAR(250) NOT NULL,
  `codCooperativa` VARCHAR(20) NOT NULL,
  `idEstadoActividad` INT NOT NULL,
  `fechaRegistroActividad` DATETIME NOT NULL,
  `fechaModificadoActividad` VARCHAR(45) NULL,
  PRIMARY KEY (`idActividad`),
  UNIQUE INDEX `idActividad_UNIQUE` (`idActividad` ASC),
  INDEX `fk_actividad_usuario_idx` (`correoUsuario` ASC),
  INDEX `fk_actividad_cooperativa_idx` (`codCooperativa` ASC),
  INDEX `fk_actividad_estadoActividad_idx` (`idEstadoActividad` ASC),
  CONSTRAINT `fk_actividad_usuario`
    FOREIGN KEY (`correoUsuario`)
    REFERENCES `insafocoop`.`usuario` (`correoUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_actividad_cooperativa`
    FOREIGN KEY (`codCooperativa`)
    REFERENCES `insafocoop`.`cooperativa` (`codCooperativa`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_actividad_estadoActividad`
    FOREIGN KEY (`idEstadoActividad`)
    REFERENCES `insafocoop`.`estadoActividad` (`idEstadoActividad`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insafocoop`.`fechaActividad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `insafocoop`.`fechaActividad` ;

CREATE TABLE IF NOT EXISTS `insafocoop`.`fechaActividad` (
  `idfechaActividad` INT NOT NULL AUTO_INCREMENT,
  `fechaActividad` DATE NOT NULL,
  `horaInicioActividad` TIME NOT NULL,
  `horaFinActividad` TIME NOT NULL,
  `idActividad` INT NOT NULL,
  PRIMARY KEY (`idfechaActividad`),
  UNIQUE INDEX `idfechaActividad_UNIQUE` (`idfechaActividad` ASC),
  INDEX `fk_fechaActividad_actividad_idx` (`idActividad` ASC),
  CONSTRAINT `fk_fechaActividad_actividad`
    FOREIGN KEY (`idActividad`)
    REFERENCES `insafocoop`.`actividad` (`idActividad`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
