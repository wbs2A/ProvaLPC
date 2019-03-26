-- MySQL Script generated by MySQL Workbench
-- Tue Mar 26 16:16:29 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`user` (
  `iduser` INT ZEROFILL NOT NULL,
  `nome` VARCHAR(50) NULL,
  `email` VARCHAR(45) NULL,
  `telefone` VARCHAR(45) NULL,
  `senha` VARCHAR(45) NULL,
  `tipo` TINYINT NULL,
  PRIMARY KEY (`iduser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Estado` (
  `idEstado` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  PRIMARY KEY (`idEstado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Cidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Cidade` (
  `idCidade` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `longitude` DECIMAL NULL,
  `latitude` DECIMAL NULL,
  `Estado_idEstado` INT NOT NULL,
  PRIMARY KEY (`idCidade`, `Estado_idEstado`),
  INDEX `fk_Cidade_Estado_idx` (`Estado_idEstado` ASC) VISIBLE,
  CONSTRAINT `fk_Cidade_Estado`
    FOREIGN KEY (`Estado_idEstado`)
    REFERENCES `mydb`.`Estado` (`idEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Endereco` (
  `idEndereco` INT NOT NULL AUTO_INCREMENT,
  `rua` VARCHAR(45) NULL,
  `bairro` VARCHAR(45) NULL,
  `cep` VARCHAR(45) NULL,
  `numero` INT NULL,
  `Cidade_idCidade` INT NOT NULL,
  PRIMARY KEY (`idEndereco`, `Cidade_idCidade`),
  INDEX `fk_Endereco_Cidade1_idx` (`Cidade_idCidade` ASC) VISIBLE,
  CONSTRAINT `fk_Endereco_Cidade1`
    FOREIGN KEY (`Cidade_idCidade`)
    REFERENCES `mydb`.`Cidade` (`idCidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`imagens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`imagens` (
  `idimagens` INT NOT NULL,
  `caminho` VARCHAR(45) NULL,
  PRIMARY KEY (`idimagens`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`pessoaJuridica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pessoaJuridica` (
  `idPJ` VARCHAR(16) NOT NULL,
  `razaoSocial` VARCHAR(45) NULL,
  `Endereco_idEndereco` INT NOT NULL,
  `user_iduser` INT ZEROFILL NOT NULL,
  `imagens_idimagens` INT NOT NULL,
  PRIMARY KEY (`idPJ`, `Endereco_idEndereco`, `user_iduser`, `imagens_idimagens`),
  INDEX `fk_pessoaJuridica_Endereco1_idx` (`Endereco_idEndereco` ASC) VISIBLE,
  INDEX `fk_pessoaJuridica_user1_idx` (`user_iduser` ASC) VISIBLE,
  INDEX `fk_pessoaJuridica_imagens1_idx` (`imagens_idimagens` ASC) VISIBLE,
  CONSTRAINT `fk_pessoaJuridica_Endereco1`
    FOREIGN KEY (`Endereco_idEndereco`)
    REFERENCES `mydb`.`Endereco` (`idEndereco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoaJuridica_user1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `mydb`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoaJuridica_imagens1`
    FOREIGN KEY (`imagens_idimagens`)
    REFERENCES `mydb`.`imagens` (`idimagens`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`locadora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`locadora` (
  `idLocadora` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `Endereco_idEndereco` INT NOT NULL,
  `tipoProtecao` VARCHAR(45) NULL,
  `idadeMediaFrota` VARCHAR(45) NULL,
  `horarioAtendimento` VARCHAR(45) NULL,
  `pessoaJuridica_idPJ` INT NOT NULL,
  PRIMARY KEY (`idLocadora`, `Endereco_idEndereco`, `pessoaJuridica_idPJ`),
  INDEX `fk_locadora_Endereco1_idx` (`Endereco_idEndereco` ASC) VISIBLE,
  INDEX `fk_locadora_pessoaJuridica1_idx` (`pessoaJuridica_idPJ` ASC) VISIBLE,
  CONSTRAINT `fk_locadora_Endereco1`
    FOREIGN KEY (`Endereco_idEndereco`)
    REFERENCES `mydb`.`Endereco` (`idEndereco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_locadora_pessoaJuridica1`
    FOREIGN KEY (`pessoaJuridica_idPJ`)
    REFERENCES `mydb`.`pessoaJuridica` (`idPJ`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`pessoaFisica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pessoaFisica` (
  `idpessoaFisica` VARCHAR(11) NOT NULL,
  `Endereco_idEndereco` INT NOT NULL,
  `user_iduser` INT ZEROFILL NOT NULL,
  `sexo` VARCHAR(45) NULL,
  `rg` VARCHAR(45) NULL,
  `dataNascimento` DATE NULL,
  `imagens_idimagens` INT NOT NULL,
  PRIMARY KEY (`idpessoaFisica`, `Endereco_idEndereco`, `user_iduser`, `imagens_idimagens`),
  INDEX `fk_pessoaFisica_Endereco1_idx` (`Endereco_idEndereco` ASC) VISIBLE,
  INDEX `fk_pessoaFisica_user1_idx` (`user_iduser` ASC) VISIBLE,
  INDEX `fk_pessoaFisica_imagens1_idx` (`imagens_idimagens` ASC) VISIBLE,
  CONSTRAINT `fk_pessoaFisica_Endereco1`
    FOREIGN KEY (`Endereco_idEndereco`)
    REFERENCES `mydb`.`Endereco` (`idEndereco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoaFisica_user1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `mydb`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoaFisica_imagens1`
    FOREIGN KEY (`imagens_idimagens`)
    REFERENCES `mydb`.`imagens` (`idimagens`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`habilitacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`habilitacao` (
  `idhabilitacao` INT NOT NULL,
  `nCNH` VARCHAR(45) NULL,
  `nRegistro` VARCHAR(45) NULL,
  `dataValidade` DATE NULL,
  `Estado_idEstado` INT NOT NULL,
  `pessoaFisica_idpessoaFisica` INT NOT NULL,
  PRIMARY KEY (`idhabilitacao`, `Estado_idEstado`, `pessoaFisica_idpessoaFisica`),
  INDEX `fk_habilitacao_Estado1_idx` (`Estado_idEstado` ASC) VISIBLE,
  INDEX `fk_habilitacao_pessoaFisica1_idx` (`pessoaFisica_idpessoaFisica` ASC) VISIBLE,
  CONSTRAINT `fk_habilitacao_Estado1`
    FOREIGN KEY (`Estado_idEstado`)
    REFERENCES `mydb`.`Estado` (`idEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_habilitacao_pessoaFisica1`
    FOREIGN KEY (`pessoaFisica_idpessoaFisica`)
    REFERENCES `mydb`.`pessoaFisica` (`idpessoaFisica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pagamento` (
  `idpagamento` INT NOT NULL,
  `nCartao` VARCHAR(45) NULL,
  `vcc` VARCHAR(45) NULL,
  `formaPagamento` VARCHAR(45) NULL,
  `dataValidade` DATE NULL,
  `pessoaFisica_idpessoaFisica` INT NOT NULL,
  PRIMARY KEY (`idpagamento`, `pessoaFisica_idpessoaFisica`),
  INDEX `fk_pagamento_pessoaFisica1_idx` (`pessoaFisica_idpessoaFisica` ASC) VISIBLE,
  CONSTRAINT `fk_pagamento_pessoaFisica1`
    FOREIGN KEY (`pessoaFisica_idpessoaFisica`)
    REFERENCES `mydb`.`pessoaFisica` (`idpessoaFisica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`classificacaoCarro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`classificacaoCarro` (
  `idclassificacao` INT NOT NULL,
  `tipo` VARCHAR(45) NULL,
  PRIMARY KEY (`idclassificacao`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`carros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`carros` (
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
  INDEX `fk_carros_locadora1_idx` (`locadora_idLocadora` ASC) VISIBLE,
  INDEX `fk_carros_classificacaoCarro1_idx` (`idClassificacao` ASC) VISIBLE,
  CONSTRAINT `fk_carros_locadora1`
    FOREIGN KEY (`locadora_idLocadora`)
    REFERENCES `mydb`.`locadora` (`idLocadora`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_carros_classificacaoCarro1`
    FOREIGN KEY (`idClassificacao`)
    REFERENCES `mydb`.`classificacaoCarro` (`idclassificacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`locacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`locacao` (
  `carros_idcarro` INT NOT NULL,
  `carros_locadora_idLocadora` INT NOT NULL,
  `pessoaFisica_idpessoaFisica` INT NOT NULL,
  `dataEntrega` DATE NULL,
  `localEntrega` INT NOT NULL,
  `valorTotal` DOUBLE NULL,
  PRIMARY KEY (`carros_idcarro`, `carros_locadora_idLocadora`, `pessoaFisica_idpessoaFisica`),
  INDEX `fk_locacao_pessoaFisica1_idx` (`pessoaFisica_idpessoaFisica` ASC) VISIBLE,
  INDEX `fk_localentrega_idx` (`localEntrega` ASC) VISIBLE,
  CONSTRAINT `fk_locacao_carros1`
    FOREIGN KEY (`carros_idcarro` , `carros_locadora_idLocadora`)
    REFERENCES `mydb`.`carros` (`idcarro` , `locadora_idLocadora`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_locacao_pessoaFisica1`
    FOREIGN KEY (`pessoaFisica_idpessoaFisica`)
    REFERENCES `mydb`.`pessoaFisica` (`idpessoaFisica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_localentrega`
    FOREIGN KEY (`localEntrega`)
    REFERENCES `mydb`.`locadora` (`idLocadora`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`acessorio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`acessorio` (
  `idacessorio` INT NOT NULL,
  `nome` VARCHAR(45) NULL,
  PRIMARY KEY (`idacessorio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`carros_has_acessorio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`carros_has_acessorio` (
  `carros_idcarro` INT NOT NULL,
  `acessorio_idacessorio` INT NOT NULL,
  PRIMARY KEY (`carros_idcarro`, `acessorio_idacessorio`),
  INDEX `fk_carros_has_acessorio_acessorio1_idx` (`acessorio_idacessorio` ASC) VISIBLE,
  INDEX `fk_carros_has_acessorio_carros1_idx` (`carros_idcarro` ASC) VISIBLE,
  CONSTRAINT `fk_carros_has_acessorio_carros1`
    FOREIGN KEY (`carros_idcarro`)
    REFERENCES `mydb`.`carros` (`idcarro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_carros_has_acessorio_acessorio1`
    FOREIGN KEY (`acessorio_idacessorio`)
    REFERENCES `mydb`.`acessorio` (`idacessorio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`avaliacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`avaliacao` (
  `idavaliacao` INT NOT NULL,
  `avaliacao` VARCHAR(45) NULL,
  `pessoaFisica_idpessoaFisica` INT NOT NULL,
  `carros_idcarro` INT NULL,
  `carros_locadora_idLocadora` INT NULL,
  `tipoAvaliacao` TINYINT NULL,
  PRIMARY KEY (`idavaliacao`, `pessoaFisica_idpessoaFisica`, `carros_idcarro`, `carros_locadora_idLocadora`),
  INDEX `fk_avaliacao_pessoaFisica1_idx` (`pessoaFisica_idpessoaFisica` ASC) VISIBLE,
  INDEX `fk_avaliacao_carros1_idx` (`carros_idcarro` ASC, `carros_locadora_idLocadora` ASC) VISIBLE,
  CONSTRAINT `fk_avaliacao_pessoaFisica1`
    FOREIGN KEY (`pessoaFisica_idpessoaFisica`)
    REFERENCES `mydb`.`pessoaFisica` (`idpessoaFisica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_avaliacao_carros1`
    FOREIGN KEY (`carros_idcarro` , `carros_locadora_idLocadora`)
    REFERENCES `mydb`.`carros` (`idcarro` , `locadora_idLocadora`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`carros_has_imagens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`carros_has_imagens` (
  `carros_idcarro` INT NOT NULL,
  `imagens_idimagens` INT NOT NULL,
  PRIMARY KEY (`carros_idcarro`, `imagens_idimagens`),
  INDEX `fk_carros_has_imagens_imagens1_idx` (`imagens_idimagens` ASC) VISIBLE,
  INDEX `fk_carros_has_imagens_carros1_idx` (`carros_idcarro` ASC) VISIBLE,
  CONSTRAINT `fk_carros_has_imagens_carros1`
    FOREIGN KEY (`carros_idcarro`)
    REFERENCES `mydb`.`carros` (`idcarro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_carros_has_imagens_imagens1`
    FOREIGN KEY (`imagens_idimagens`)
    REFERENCES `mydb`.`imagens` (`idimagens`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
