-- MySQL Script generated by MySQL Workbench
-- Mon Jan 23 19:43:02 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema narutoAPI
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema narutoAPI
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `narutoAPI` DEFAULT CHARACTER SET utf8 ;
USE `narutoAPI` ;

-- -----------------------------------------------------
-- Table `narutoAPI`.`jinchuuriki`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `narutoAPI`.`jinchuuriki` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `aldeia` VARCHAR(45) NULL,
  `status` VARCHAR(45) NULL,
  `ponto_forte` ENUM("taijutsu", "ninjutsu", "senjutsu", "genjutsu") NULL,
  `link_img` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `narutoAPI`.`bijuu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `narutoAPI`.`bijuu` (
  `qtd_caudas` INT NOT NULL,
  `nome` VARCHAR(45) NULL,
  `animal` VARCHAR(45) NULL,
  `aldeia` VARCHAR(45) NULL,
  `status` ENUM("livre", "capturada", "morta", "viva") NULL,
  `descricao` VARCHAR(45) NULL,
  `link_img` VARCHAR(255) NULL,
  `jinchuuriki_id` INT NOT NULL,
  PRIMARY KEY (`qtd_caudas`),
  INDEX `fk_bijuu_jinchuuriki_idx` (`jinchuuriki_id` ASC) VISIBLE,
  CONSTRAINT `fk_bijuu_jinchuuriki`
    FOREIGN KEY (`jinchuuriki_id`)
    REFERENCES `narutoAPI`.`jinchuuriki` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
