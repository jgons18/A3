-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema A3
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema A3
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `A3` DEFAULT CHARACTER SET utf8 ;
USE `A3` ;

-- -----------------------------------------------------
-- Table `A3`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `A3`.`usuarios` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(30) NOT NULL,
  `apellidos` VARCHAR(60) NOT NULL,
  `login` VARCHAR(15) NOT NULL,
  `passwd` VARCHAR(20) NOT NULL,
  `edad` INT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE INDEX `id_UNIQUE` (`id_user` ASC),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `A3`.`todo_tasks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `A3`.`todo_tasks` (
  `id_task` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(500) NOT NULL,
  `pendiente` TINYINT(1) NOT NULL,
  `fecha` DATE NOT NULL,
  `usuarios_id_user` INT NOT NULL,
  PRIMARY KEY (`id_task`),
  UNIQUE INDEX `id_task_UNIQUE` (`id_task` ASC),
  INDEX `fk_todo_tasks_usuarios_idx` (`usuarios_id_user` ASC),
  CONSTRAINT `fk_todo_tasks_usuarios`
    FOREIGN KEY (`usuarios_id_user`)
    REFERENCES `A3`.`usuarios` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
