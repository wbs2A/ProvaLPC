-- MySQL Script generated by MySQL Workbench
-- Tue Mar 26 17:10:37 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema locadoraDB
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema locadoraDB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `locadoraDB` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci ;
USE `locadoraDB` ;

-- -----------------------------------------------------
-- Table `locadoraDB`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadoraDB`.`user` (
  `iduser` INT ZEROFILL NOT NULL,
  `nome` VARCHAR(50) NULL,
  `email` VARCHAR(45) NULL,
  `telefone` VARCHAR(45) NULL,
  `senha` VARCHAR(45) NULL,
  `tipo` TINYINT NULL,
  PRIMARY KEY (`iduser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadoraDB`.`Estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadoraDB`.`Estado` (
  `idEstado` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  PRIMARY KEY (`idEstado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadoraDB`.`Cidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadoraDB`.`Cidade` (
  `idCidade` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `longitude` DECIMAL NULL,
  `latitude` DECIMAL NULL,
  `Estado_idEstado` INT NOT NULL,
  PRIMARY KEY (`idCidade`, `Estado_idEstado`),
  INDEX `fk_Cidade_Estado_idx` (`Estado_idEstado` ASC) ,
  CONSTRAINT `fk_Cidade_Estado`
    FOREIGN KEY (`Estado_idEstado`)
    REFERENCES `locadoraDB`.`Estado` (`idEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadoraDB`.`Endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadoraDB`.`Endereco` (
  `idEndereco` INT NOT NULL AUTO_INCREMENT,
  `rua` VARCHAR(45) NULL,
  `bairro` VARCHAR(45) NULL,
  `cep` VARCHAR(45) NULL,
  `numero` INT NULL,
  `Cidade_idCidade` INT NOT NULL,
  PRIMARY KEY (`idEndereco`, `Cidade_idCidade`),
  INDEX `fk_Endereco_Cidade1_idx` (`Cidade_idCidade` ASC) ,
  CONSTRAINT `fk_Endereco_Cidade1`
    FOREIGN KEY (`Cidade_idCidade`)
    REFERENCES `locadoraDB`.`Cidade` (`idCidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadoraDB`.`imagens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadoraDB`.`imagens` (
  `idimagens` INT NOT NULL,
  `caminho` VARCHAR(45) NULL,
  PRIMARY KEY (`idimagens`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadoraDB`.`pessoaJuridica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadoraDB`.`pessoaJuridica` (
  `idPJ` VARCHAR(16) NOT NULL,
  `razaoSocial` VARCHAR(45) NULL,
  `Endereco_idEndereco` INT NOT NULL,
  `user_iduser` INT ZEROFILL NOT NULL,
  `imagens_idimagens` INT NOT NULL,
  PRIMARY KEY (`idPJ`, `Endereco_idEndereco`, `user_iduser`, `imagens_idimagens`),
  INDEX `fk_pessoaJuridica_Endereco1_idx` (`Endereco_idEndereco` ASC) ,
  INDEX `fk_pessoaJuridica_user1_idx` (`user_iduser` ASC) ,
  INDEX `fk_pessoaJuridica_imagens1_idx` (`imagens_idimagens` ASC) ,
  CONSTRAINT `fk_pessoaJuridica_Endereco1`
    FOREIGN KEY (`Endereco_idEndereco`)
    REFERENCES `locadoraDB`.`Endereco` (`idEndereco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoaJuridica_user1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `locadoraDB`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoaJuridica_imagens1`
    FOREIGN KEY (`imagens_idimagens`)
    REFERENCES `locadoraDB`.`imagens` (`idimagens`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadoraDB`.`locadora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadoraDB`.`locadora` (
  `idLocadora` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `Endereco_idEndereco` INT NOT NULL,
  `tipoProtecao` VARCHAR(45) NULL,
  `idadeMediaFrota` VARCHAR(45) NULL,
  `horarioAtendimento` VARCHAR(45) NULL,
  `pessoaJuridica_idPJ` VARCHAR(16) NOT NULL,
  PRIMARY KEY (`idLocadora`, `Endereco_idEndereco`, `pessoaJuridica_idPJ`),
  INDEX `fk_locadora_Endereco1_idx` (`Endereco_idEndereco` ASC) ,
  INDEX `fk_locadora_pessoaJuridica1_idx` (`pessoaJuridica_idPJ` ASC) ,
  CONSTRAINT `fk_locadora_Endereco1`
    FOREIGN KEY (`Endereco_idEndereco`)
    REFERENCES `locadoraDB`.`Endereco` (`idEndereco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_locadora_pessoaJuridica1`
    FOREIGN KEY (`pessoaJuridica_idPJ`)
    REFERENCES `locadoraDB`.`pessoaJuridica` (`idPJ`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadoraDB`.`pessoaFisica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadoraDB`.`pessoaFisica` (
  `idpessoaFisica` VARCHAR(13) NOT NULL,
  `Endereco_idEndereco` INT NOT NULL,
  `user_iduser` INT ZEROFILL NOT NULL,
  `sexo` VARCHAR(45) NULL,
  `rg` VARCHAR(45) NULL,
  `dataNascimento` DATE NULL,
  `imagens_idimagens` INT NOT NULL,
  PRIMARY KEY (`idpessoaFisica`, `Endereco_idEndereco`, `user_iduser`, `imagens_idimagens`),
  INDEX `fk_pessoaFisica_Endereco1_idx` (`Endereco_idEndereco` ASC) ,
  INDEX `fk_pessoaFisica_user1_idx` (`user_iduser` ASC) ,
  INDEX `fk_pessoaFisica_imagens1_idx` (`imagens_idimagens` ASC) ,
  CONSTRAINT `fk_pessoaFisica_Endereco1`
    FOREIGN KEY (`Endereco_idEndereco`)
    REFERENCES `locadoraDB`.`Endereco` (`idEndereco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoaFisica_user1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `locadoraDB`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoaFisica_imagens1`
    FOREIGN KEY (`imagens_idimagens`)
    REFERENCES `locadoraDB`.`imagens` (`idimagens`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadoraDB`.`habilitacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadoraDB`.`habilitacao` (
  `idhabilitacao` INT NOT NULL,
  `nCNH` VARCHAR(45) NULL,
  `nRegistro` VARCHAR(45) NULL,
  `dataValidade` DATE NULL,
  `Estado_idEstado` INT NOT NULL,
  `pessoaFisica_idpessoaFisica` VARCHAR(13) NOT NULL,
  PRIMARY KEY (`idhabilitacao`, `Estado_idEstado`, `pessoaFisica_idpessoaFisica`),
  INDEX `fk_habilitacao_Estado1_idx` (`Estado_idEstado` ASC) ,
  INDEX `fk_habilitacao_pessoaFisica1_idx` (`pessoaFisica_idpessoaFisica` ASC) ,
  CONSTRAINT `fk_habilitacao_Estado1`
    FOREIGN KEY (`Estado_idEstado`)
    REFERENCES `locadoraDB`.`Estado` (`idEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_habilitacao_pessoaFisica1`
    FOREIGN KEY (`pessoaFisica_idpessoaFisica`)
    REFERENCES `locadoraDB`.`pessoaFisica` (`idpessoaFisica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadoraDB`.`pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadoraDB`.`pagamento` (
  `idpagamento` INT NOT NULL,
  `nCartao` VARCHAR(45) NULL,
  `vcc` VARCHAR(45) NULL,
  `formaPagamento` VARCHAR(45) NULL,
  `dataValidade` DATE NULL,
  `pessoaFisica_idpessoaFisica` VARCHAR(13) NOT NULL,
  PRIMARY KEY (`idpagamento`, `pessoaFisica_idpessoaFisica`),
  INDEX `fk_pagamento_pessoaFisica1_idx` (`pessoaFisica_idpessoaFisica` ASC) ,
  CONSTRAINT `fk_pagamento_pessoaFisica1`
    FOREIGN KEY (`pessoaFisica_idpessoaFisica`)
    REFERENCES `locadoraDB`.`pessoaFisica` (`idpessoaFisica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadoraDB`.`classificacaoCarro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadoraDB`.`classificacaoCarro` (
  `idclassificacao` INT NOT NULL,
  `tipo` VARCHAR(45) NULL,
  PRIMARY KEY (`idclassificacao`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadoraDB`.`carros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadoraDB`.`carros` (
  `idcarro` INT NOT NULL,
  `placa` VARCHAR(45) NULL,
  `valor` DOUBLE NULL,
  `locado` VARCHAR(45) NULL,
  `locadora_idLocadora` INT NOT NULL,
  `nome` VARCHAR(45) NULL,
  `modelo` VARCHAR(45) NULL,
  `marca` VARCHAR(45) NULL,
  `direcao` VARCHAR(45) NULL,
  `cambio` VARCHAR(45) NULL,
  `passageiros` INT NULL,
  `idClassificacao` INT NOT NULL,
  PRIMARY KEY (`idcarro`, `locadora_idLocadora`, `idClassificacao`),
  INDEX `fk_carros_locadora1_idx` (`locadora_idLocadora` ASC) ,
  INDEX `fk_carros_classificacaoCarro1_idx` (`idClassificacao` ASC) ,
  CONSTRAINT `fk_carros_locadora1`
    FOREIGN KEY (`locadora_idLocadora`)
    REFERENCES `locadoraDB`.`locadora` (`idLocadora`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_carros_classificacaoCarro1`
    FOREIGN KEY (`idClassificacao`)
    REFERENCES `locadoraDB`.`classificacaoCarro` (`idclassificacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadoraDB`.`locacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadoraDB`.`locacao` (
  `carros_idcarro` INT NOT NULL,
  `carros_locadora_idLocadora` INT NOT NULL,
  `pessoaFisica_idpessoaFisica` VARCHAR(13) NOT NULL,
  `dataEntrega` DATE NULL,
  `localEntrega` INT NOT NULL,
  `valorTotal` DOUBLE NULL,
  PRIMARY KEY (`carros_idcarro`, `carros_locadora_idLocadora`, `pessoaFisica_idpessoaFisica`),
  INDEX `fk_locacao_pessoaFisica1_idx` (`pessoaFisica_idpessoaFisica` ASC) ,
  INDEX `fk_localentrega_idx` (`localEntrega` ASC) ,
  CONSTRAINT `fk_locacao_carros1`
    FOREIGN KEY (`carros_idcarro` , `carros_locadora_idLocadora`)
    REFERENCES `locadoraDB`.`carros` (`idcarro` , `locadora_idLocadora`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_locacao_pessoaFisica1`
    FOREIGN KEY (`pessoaFisica_idpessoaFisica`)
    REFERENCES `locadoraDB`.`pessoaFisica` (`idpessoaFisica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_localentrega`
    FOREIGN KEY (`localEntrega`)
    REFERENCES `locadoraDB`.`locadora` (`idLocadora`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadoraDB`.`acessorio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadoraDB`.`acessorio` (
  `idacessorio` INT NOT NULL,
  `nome` VARCHAR(45) NULL,
  PRIMARY KEY (`idacessorio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadoraDB`.`carros_has_acessorio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadoraDB`.`carros_has_acessorio` (
  `carros_idcarro` INT NOT NULL,
  `acessorio_idacessorio` INT NOT NULL,
  PRIMARY KEY (`carros_idcarro`, `acessorio_idacessorio`),
  INDEX `fk_carros_has_acessorio_acessorio1_idx` (`acessorio_idacessorio` ASC) ,
  INDEX `fk_carros_has_acessorio_carros1_idx` (`carros_idcarro` ASC) ,
  CONSTRAINT `fk_carros_has_acessorio_carros1`
    FOREIGN KEY (`carros_idcarro`)
    REFERENCES `locadoraDB`.`carros` (`idcarro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_carros_has_acessorio_acessorio1`
    FOREIGN KEY (`acessorio_idacessorio`)
    REFERENCES `locadoraDB`.`acessorio` (`idacessorio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadoraDB`.`avaliacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadoraDB`.`avaliacao` (
  `idavaliacao` INT NOT NULL,
  `avaliacao` VARCHAR(45) NULL,
  `carros_idcarro` INT NULL,
  `carros_locadora_idLocadora` INT NULL,
  `tipoAvaliacao` TINYINT NULL,
  `pessoaFisica_idpessoaFisica` VARCHAR(13) NOT NULL,
  PRIMARY KEY (`idavaliacao`, `carros_idcarro`, `carros_locadora_idLocadora`, `pessoaFisica_idpessoaFisica`),
  INDEX `fk_avaliacao_carros1_idx` (`carros_idcarro` ASC, `carros_locadora_idLocadora` ASC) ,
  INDEX `fk_avaliacao_pessoaFisica1_idx` (`pessoaFisica_idpessoaFisica` ASC) ,
  CONSTRAINT `fk_avaliacao_carros1`
    FOREIGN KEY (`carros_idcarro` , `carros_locadora_idLocadora`)
    REFERENCES `locadoraDB`.`carros` (`idcarro` , `locadora_idLocadora`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_avaliacao_pessoaFisica1`
    FOREIGN KEY (`pessoaFisica_idpessoaFisica`)
    REFERENCES `locadoraDB`.`pessoaFisica` (`idpessoaFisica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadoraDB`.`carros_has_imagens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadoraDB`.`carros_has_imagens` (
  `carros_idcarro` INT NOT NULL,
  `imagens_idimagens` INT NOT NULL,
  PRIMARY KEY (`carros_idcarro`, `imagens_idimagens`),
  INDEX `fk_carros_has_imagens_imagens1_idx` (`imagens_idimagens` ASC) ,
  INDEX `fk_carros_has_imagens_carros1_idx` (`carros_idcarro` ASC) ,
  CONSTRAINT `fk_carros_has_imagens_carros1`
    FOREIGN KEY (`carros_idcarro`)
    REFERENCES `locadoraDB`.`carros` (`idcarro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_carros_has_imagens_imagens1`
    FOREIGN KEY (`imagens_idimagens`)
    REFERENCES `locadoraDB`.`imagens` (`idimagens`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
