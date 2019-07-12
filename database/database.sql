-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema RESILIENCIACDMX
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema RESILIENCIACDMX
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `RESILIENCIACDMX` DEFAULT CHARACTER SET utf8 ;
USE `RESILIENCIACDMX` ;

-- -----------------------------------------------------
-- Table `RESILIENCIACDMX`.`header`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RESILIENCIACDMX`.`header` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(60) NOT NULL,
  `subtitle` VARCHAR(120) NOT NULL,
  `type` VARCHAR(45) NOT NULL,
  `category` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `RESILIENCIACDMX`.`paragraph`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RESILIENCIACDMX`.`paragraph` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `text` TEXT NULL,
  `subtitle` VARCHAR(120) NULL,
  `video` TEXT NULL,
  `description_video` TEXT NULL,
  `image` TEXT NULL,
  `description_image` TEXT NULL,
  `header_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_paragraph_header1_idx` (`header_id` ASC),
  CONSTRAINT `fk_paragraph_header1`
    FOREIGN KEY (`header_id`)
    REFERENCES `RESILIENCIACDMX`.`header` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `RESILIENCIACDMX`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RESILIENCIACDMX`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(60) NOT NULL,
  `email` TEXT NOT NULL,
  `password` VARCHAR(60) NOT NULL,
  `slogan` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  `image` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `RESILIENCIACDMX`.`glossary`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RESILIENCIACDMX`.`glossary` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `word` VARCHAR(45) NOT NULL,
  `description` TEXT NOT NULL,
  `header_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_glossary_header_idx` (`header_id` ASC),
  CONSTRAINT `fk_glossary_header`
    FOREIGN KEY (`header_id`)
    REFERENCES `RESILIENCIACDMX`.`header` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `RESILIENCIACDMX`.`header_has_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RESILIENCIACDMX`.`header_has_user` (
  `header_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`header_id`, `user_id`),
  INDEX `fk_header_has_user_user1_idx` (`user_id` ASC),
  INDEX `fk_header_has_user_header1_idx` (`header_id` ASC),
  CONSTRAINT `fk_header_has_user_header1`
    FOREIGN KEY (`header_id`)
    REFERENCES `RESILIENCIACDMX`.`header` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_header_has_user_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `RESILIENCIACDMX`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
