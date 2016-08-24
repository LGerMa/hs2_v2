-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema insafocoop
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema insafocoop
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `insafocoop` DEFAULT CHARACTER SET utf8 ;
USE `insafocoop` ;

-- -----------------------------------------------------
-- Table `insafocoop`.`cooperativa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insafocoop`.`cooperativa` (
  `codCooperativa` VARCHAR(20) NOT NULL,
  `passCooperativa` VARCHAR(45) NOT NULL,
  `nombreCooperativa` VARCHAR(45) NOT NULL,
  `direccionCooperativa` VARCHAR(250) NOT NULL,
  `contactoCooperativa` VARCHAR(50) NOT NULL,
  `correoContactoCooperativa` VARCHAR(100) NULL DEFAULT NULL,
  `telefonoCooperativa` VARCHAR(9) NULL DEFAULT NULL,
  `fechaRegistroCooperativa` DATETIME NOT NULL,
  `fechaModificadoCooperativa` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`codCooperativa`),
  UNIQUE INDEX `codCooperativa_UNIQUE` (`codCooperativa` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `insafocoop`.`estadoactividad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insafocoop`.`estadoactividad` (
  `idEstadoActividad` INT(11) NOT NULL,
  `estadoActividad` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEstadoActividad`),
  UNIQUE INDEX `idEstadoActividad_UNIQUE` (`idEstadoActividad` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `insafocoop`.`estadousuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insafocoop`.`estadousuario` (
  `idEstadoUsuario` INT(11) NOT NULL,
  `estadoUsuario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEstadoUsuario`),
  UNIQUE INDEX `idEstadoUsuario_UNIQUE` (`idEstadoUsuario` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `insafocoop`.`puesto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insafocoop`.`puesto` (
  `idPuesto` INT(11) NOT NULL,
  `puesto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPuesto`),
  UNIQUE INDEX `idPuesto_UNIQUE` (`idPuesto` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `insafocoop`.`tipousuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insafocoop`.`tipousuario` (
  `idtipoUsuario` INT(11) NOT NULL,
  `tipoUsuario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtipoUsuario`),
  UNIQUE INDEX `idtipoUsuario_UNIQUE` (`idtipoUsuario` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `insafocoop`.`unidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insafocoop`.`unidad` (
  `idUnidad` INT(11) NOT NULL,
  `unidad` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idUnidad`),
  UNIQUE INDEX `idUnidad_UNIQUE` (`idUnidad` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `insafocoop`.`zona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insafocoop`.`zona` (
  `idZona` INT(11) NOT NULL,
  `tipoZona` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idZona`),
  UNIQUE INDEX `idZona_UNIQUE` (`idZona` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `insafocoop`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insafocoop`.`usuario` (
  `correoUsuario` VARCHAR(100) NOT NULL,
  `passUsuario` VARCHAR(45) NOT NULL,
  `nombreUsuario` VARCHAR(50) NOT NULL,
  `apellidoUsuario` VARCHAR(50) NOT NULL,
  `idTipoUsuario` INT(11) NOT NULL,
  `idUnidad` INT(11) NOT NULL,
  `idPuesto` INT(11) NOT NULL,
  `idZona` INT(11) NOT NULL,
  `idEstadoUsuario` INT(11) NOT NULL,
  `fechaRegistroUsuario` DATETIME NOT NULL,
  `fechaModificadoUsuario` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`correoUsuario`),
  UNIQUE INDEX `correoUsuario_UNIQUE` (`correoUsuario` ASC),
  INDEX `fk_usuario_tipoUsuario_idx` (`idTipoUsuario` ASC),
  INDEX `fk_usuario_zona_idx` (`idZona` ASC),
  INDEX `fk_usuario_unidad_idx` (`idUnidad` ASC),
  INDEX `fk_usuario_puesto_idx` (`idPuesto` ASC),
  INDEX `fk_usuario_estado_idx` (`idEstadoUsuario` ASC),
  CONSTRAINT `fk_usuario_estado`
    FOREIGN KEY (`idEstadoUsuario`)
    REFERENCES `insafocoop`.`estadousuario` (`idEstadoUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_puesto`
    FOREIGN KEY (`idPuesto`)
    REFERENCES `insafocoop`.`puesto` (`idPuesto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_tipoUsuario`
    FOREIGN KEY (`idTipoUsuario`)
    REFERENCES `insafocoop`.`tipousuario` (`idtipoUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_unidad`
    FOREIGN KEY (`idUnidad`)
    REFERENCES `insafocoop`.`unidad` (`idUnidad`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_zona`
    FOREIGN KEY (`idZona`)
    REFERENCES `insafocoop`.`zona` (`idZona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `insafocoop`.`Semanal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insafocoop`.`Semanal` (
  `CodSemanal` VARCHAR(50) NOT NULL,
  `Semana` INT NOT NULL,
  `Registro` DATETIME NOT NULL,
  `correoUsuario` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`CodSemanal`),
  INDEX `fk_Semanal_usuario1_idx` (`correoUsuario` ASC),
  CONSTRAINT `fk_Semanal_usuario1`
    FOREIGN KEY (`correoUsuario`)
    REFERENCES `insafocoop`.`usuario` (`correoUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insafocoop`.`actividad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insafocoop`.`actividad` (
  `idActividad` INT(11) NOT NULL AUTO_INCREMENT,
  `actividadProgramada` VARCHAR(250) NOT NULL,
  `codCooperativa` VARCHAR(20) NOT NULL,
  `idEstadoActividad` INT(11) NOT NULL,
  `fechaRegistroActividad` DATETIME NOT NULL,
  `fechaModificadoActividad` DATETIME NULL DEFAULT NULL,
  `CodSemanal` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idActividad`),
  UNIQUE INDEX `idActividad_UNIQUE` (`idActividad` ASC),
  INDEX `fk_actividad_cooperativa_idx` (`codCooperativa` ASC),
  INDEX `fk_actividad_estadoActividad_idx` (`idEstadoActividad` ASC),
  INDEX `fk_actividad_Semanal1_idx` (`CodSemanal` ASC),
  CONSTRAINT `fk_actividad_cooperativa`
    FOREIGN KEY (`codCooperativa`)
    REFERENCES `insafocoop`.`cooperativa` (`codCooperativa`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_actividad_estadoActividad`
    FOREIGN KEY (`idEstadoActividad`)
    REFERENCES `insafocoop`.`estadoactividad` (`idEstadoActividad`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_actividad_Semanal1`
    FOREIGN KEY (`CodSemanal`)
    REFERENCES `insafocoop`.`Semanal` (`CodSemanal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `insafocoop`.`fechaactividad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insafocoop`.`fechaactividad` (
  `idfechaActividad` INT(11) NOT NULL AUTO_INCREMENT,
  `fechaActividad` DATE NOT NULL,
  `horaInicioActividad` TIME NOT NULL,
  `horaFinActividad` TIME NOT NULL,
  `idActividad` INT(11) NOT NULL,
  PRIMARY KEY (`idfechaActividad`),
  UNIQUE INDEX `idfechaActividad_UNIQUE` (`idfechaActividad` ASC),
  INDEX `fk_fechaActividad_actividad_idx` (`idActividad` ASC),
  CONSTRAINT `fk_fechaActividad_actividad`
    FOREIGN KEY (`idActividad`)
    REFERENCES `insafocoop`.`actividad` (`idActividad`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
