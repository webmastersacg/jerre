-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema bd_jerre
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `bd_jerre` ;

-- -----------------------------------------------------
-- Schema bd_jerre
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_jerre` DEFAULT CHARACTER SET utf8 ;
USE `bd_jerre` ;

-- -----------------------------------------------------
-- Table `bd_jerre`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_jerre`.`usuarios` (
  `id_carga` INT NOT NULL COMMENT 'Id. de Carga del Archivo',
  `email` VARCHAR(65) NOT NULL COMMENT 'Correo electrónico del usuario',
  `nombre` VARCHAR(25) NULL COMMENT 'Nombre del Usuario',
  `apellido` VARCHAR(25) NULL COMMENT 'Apellido del Usuario',
  `codigo` INT(1) NOT NULL COMMENT 'Código de estado del Usuario - (1:Activos, 2:Inactivos, 3:En espera)')
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
