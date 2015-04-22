-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema db_am_trace
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `db_am_trace` ;

-- -----------------------------------------------------
-- Schema db_am_trace
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_am_trace` DEFAULT CHARACTER SET utf8 ;
USE `db_am_trace` ;

-- -----------------------------------------------------
-- Table `db_am_trace`.`tb_paginas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_am_trace`.`tb_paginas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(40) NULL DEFAULT NULL,
  `url` VARCHAR(160) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_am_trace`.`contas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_am_trace`.`contas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(32) NOT NULL,
  `obs` VARCHAR(128) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_am_trace`.`acessos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_am_trace`.`acessos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `pagina_id` INT(11) NOT NULL,
  `conta_id` INT(11) NOT NULL,
  `visualizar` BIT(1) NULL DEFAULT b'0',
  `editar` BIT(1) NULL DEFAULT b'0',
  `excluir` BIT(1) NULL DEFAULT b'0',
  PRIMARY KEY (`id`),
  INDEX `FK_acessos_contas` (`pagina_id` ASC),
  INDEX `FK_acessos_tb_paginas` (`conta_id` ASC),
  CONSTRAINT `FK_acessos_tb_paginas`
    FOREIGN KEY (`conta_id`)
    REFERENCES `db_am_trace`.`tb_paginas` (`id`),
  CONSTRAINT `FK_acessos_contas`
    FOREIGN KEY (`pagina_id`)
    REFERENCES `db_am_trace`.`contas` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_am_trace`.`campos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_am_trace`.`campos` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `pagina_id` INT(11) NOT NULL,
  `campo` VARCHAR(40) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `FK_campos_tb_paginas` (`pagina_id` ASC),
  CONSTRAINT `FK_campos_tb_paginas`
    FOREIGN KEY (`pagina_id`)
    REFERENCES `db_am_trace`.`tb_paginas` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_am_trace`.`contratos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_am_trace`.`contratos` (
  `id` BIGINT(20) NOT NULL,
  `numero_contrato` VARCHAR(16) NOT NULL,
  `data_inicio` DATE NOT NULL,
  `data_vencimento` DATE NULL DEFAULT NULL,
  `valor_mensalidade` DECIMAL(10,0) NULL DEFAULT NULL,
  `dia_vencimento` INT(11) NOT NULL,
  `doc` VARCHAR(8) NULL DEFAULT NULL,
  `status` VARCHAR(40) NULL DEFAULT NULL,
  `obs` VARCHAR(1024) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_am_trace`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_am_trace`.`clientes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo` CHAR(1) NULL DEFAULT NULL,
  `cpf_cnpj` VARCHAR(18) NOT NULL,
  `ie` VARCHAR(16) NULL DEFAULT NULL,
  `im` VARCHAR(16) NULL DEFAULT NULL,
  `nome` VARCHAR(56) NOT NULL,
  `razao_social` VARCHAR(56) NULL DEFAULT NULL,
  `telefone` VARCHAR(16) NULL DEFAULT NULL,
  `email` VARCHAR(56) NULL DEFAULT NULL,
  `email_de_cobranca` VARCHAR(128) NULL DEFAULT NULL,
  `medidas_panico` VARCHAR(512) NULL DEFAULT NULL,
  `senha_panico` VARCHAR(40) NULL DEFAULT NULL,
  `obs` VARCHAR(512) NULL DEFAULT NULL,
  `cep` VARCHAR(8) NULL,
  `rua` VARCHAR(40) NOT NULL,
  `numero` VARCHAR(8) NULL,
  `bairro` VARCHAR(40) NULL,
  `cidade` VARCHAR(40) NOT NULL,
  `uf` VARCHAR(2) NULL,
  `complemento` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_am_trace`.`motoristas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_am_trace`.`motoristas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(56) NOT NULL,
  `telefone` VARCHAR(16) NULL DEFAULT NULL,
  `celular` VARCHAR(16) NULL DEFAULT NULL,
  `numero_cnh` VARCHAR(16) NULL DEFAULT NULL,
  `obs` VARCHAR(512) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_am_trace`.`veiculos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_am_trace`.`veiculos` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `cliente_id` INT(11) NOT NULL,
  `motorista_id` INT(11) NOT NULL,
  `contrato_id` BIGINT(20) NOT NULL,
  `placa` VARCHAR(8) NULL DEFAULT NULL,
  `tipo_veiculo` VARCHAR(40) NULL DEFAULT NULL,
  `marca` VARCHAR(40) NULL DEFAULT NULL,
  `modelo` VARCHAR(40) NULL DEFAULT NULL,
  `cor` VARCHAR(40) NULL DEFAULT NULL,
  `ano_fabricacao` INT(11) NULL DEFAULT NULL,
  `ano_modelo` INT(11) NULL DEFAULT NULL,
  `chassi` VARCHAR(24) NULL DEFAULT NULL,
  `renavan` VARCHAR(16) NULL DEFAULT NULL,
  `combustivel` VARCHAR(40) NULL DEFAULT NULL,
  `consumo_km_litro` VARCHAR(40) NULL DEFAULT NULL,
  `consumo_litro_hr` VARCHAR(40) NULL DEFAULT NULL,
  `tipo_instalacao` VARCHAR(40) NULL DEFAULT NULL,
  `local_instalacao_rastreador` VARCHAR(80) NULL DEFAULT NULL,
  `fiacao_utilizada` VARCHAR(256) NULL DEFAULT NULL,
  `status` VARCHAR(40) NULL DEFAULT NULL,
  `email_notificacao` VARCHAR(512) NULL DEFAULT NULL,
  `sms_notificacao` VARCHAR(40) NULL DEFAULT NULL,
  `plano_notificacao_email` VARCHAR(40) NULL DEFAULT NULL,
  `plano_notificacao_sms` VARCHAR(40) NULL DEFAULT NULL,
  `obs` VARCHAR(512) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `FK_veiculos_clientes` (`cliente_id` ASC),
  INDEX `FK_veiculos_motoristas` (`motorista_id` ASC),
  INDEX `FK_veiculos_contratos` (`contrato_id` ASC),
  CONSTRAINT `FK_veiculos_contratos`
    FOREIGN KEY (`contrato_id`)
    REFERENCES `db_am_trace`.`contratos` (`id`),
  CONSTRAINT `FK_veiculos_clientes`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `db_am_trace`.`clientes` (`id`),
  CONSTRAINT `FK_veiculos_motoristas`
    FOREIGN KEY (`motorista_id`)
    REFERENCES `db_am_trace`.`motoristas` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_am_trace`.`rastreadors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_am_trace`.`rastreadors` (
  `id` BIGINT(20) NOT NULL,
  `veiculo_id` BIGINT(20) NOT NULL,
  `marca` VARCHAR(40) NULL DEFAULT NULL,
  `modelo` VARCHAR(40) NULL DEFAULT NULL,
  `numero_equipamento` VARCHAR(40) NULL DEFAULT NULL,
  `numero_serie` VARCHAR(40) NULL DEFAULT NULL,
  `senha_rastreador` VARCHAR(40) NULL DEFAULT NULL,
  `senha_acesso_remoto` VARCHAR(40) NULL DEFAULT NULL,
  `senha_sms` VARCHAR(40) NULL DEFAULT NULL,
  `senha_panico` VARCHAR(40) NULL DEFAULT NULL,
  `data_instalacao` DATE NULL DEFAULT NULL,
  `data_remocao` DATE NULL DEFAULT NULL,
  `bloqueio` BIT(1) NULL DEFAULT NULL,
  `imei` VARCHAR(40) NULL DEFAULT NULL,
  `apn` VARCHAR(40) NULL DEFAULT NULL,
  `obs` VARCHAR(512) NULL DEFAULT NULL,
  `e1` VARCHAR(40) NULL DEFAULT NULL,
  `e2` VARCHAR(40) NULL DEFAULT NULL,
  `e3` VARCHAR(40) NULL DEFAULT NULL,
  `e4` VARCHAR(40) NULL DEFAULT NULL,
  `s1` VARCHAR(40) NULL DEFAULT NULL,
  `s2` VARCHAR(40) NULL DEFAULT NULL,
  `s3` VARCHAR(40) NULL DEFAULT NULL,
  `s4` VARCHAR(40) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `FK_rastreadores_veiculos` (`veiculo_id` ASC),
  CONSTRAINT `FK_rastreadores_veiculos`
    FOREIGN KEY (`veiculo_id`)
    REFERENCES `db_am_trace`.`veiculos` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_am_trace`.`chips`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_am_trace`.`chips` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `rastreador_id` BIGINT(20) NULL DEFAULT NULL,
  `operadora` VARCHAR(16) NULL DEFAULT NULL,
  `numero_chip` VARCHAR(40) NULL DEFAULT NULL,
  `numero_telefone` VARCHAR(40) NULL DEFAULT NULL,
  `apn` VARCHAR(40) NULL DEFAULT NULL,
  `obs` VARCHAR(512) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `FK_chips_rastreadores` (`rastreador_id` ASC),
  CONSTRAINT `FK_chips_rastreadores`
    FOREIGN KEY (`rastreador_id`)
    REFERENCES `db_am_trace`.`rastreadors` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 19
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_am_trace`.`contatos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_am_trace`.`contatos` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `cliente_id` INT(11) NOT NULL,
  `nome` VARCHAR(56) NOT NULL,
  `setor` VARCHAR(40) NULL DEFAULT NULL,
  `cargo` VARCHAR(40) NULL DEFAULT NULL,
  `telefone` VARCHAR(16) NULL DEFAULT NULL,
  `celular` VARCHAR(40) NULL DEFAULT NULL,
  `email` VARCHAR(56) NULL DEFAULT NULL,
  `data_nascimento` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `FK_contatos_clientes` (`cliente_id` ASC),
  CONSTRAINT `FK_contatos_clientes`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `db_am_trace`.`clientes` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_am_trace`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_am_trace`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `conta_id` INT(11) NOT NULL,
  `nome` VARCHAR(56) NOT NULL,
  `email` VARCHAR(64) NOT NULL,
  `senha` VARCHAR(40) NULL DEFAULT NULL,
  `obs` VARCHAR(128) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `FK_usuarios_contas` (`conta_id` ASC),
  CONSTRAINT `FK_usuarios_contas`
    FOREIGN KEY (`conta_id`)
    REFERENCES `db_am_trace`.`contas` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_am_trace`.`controle_acesso_campos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_am_trace`.`controle_acesso_campos` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `campo_id` BIGINT(20) NOT NULL,
  `usuario_id` INT(11) NOT NULL,
  `visualizar` BIT(1) NULL DEFAULT NULL,
  `editar` BIT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `FK_controle_acessos_campos` (`campo_id` ASC),
  INDEX `FK_controle_acessos_usuarios` (`usuario_id` ASC),
  CONSTRAINT `FK_controle_acessos_usuarios`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `db_am_trace`.`usuarios` (`id`),
  CONSTRAINT `FK_controle_acessos_campos`
    FOREIGN KEY (`campo_id`)
    REFERENCES `db_am_trace`.`campos` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_am_trace`.`historico_chips`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_am_trace`.`historico_chips` (
  `id` BIGINT(20) NOT NULL,
  `chip_id` BIGINT(20) NOT NULL,
  `rastreador_id` BIGINT(20) NOT NULL,
  `data_inicio` DATE NOT NULL,
  `data_fim` DATE NULL DEFAULT NULL,
  `informacao_adicional` VARCHAR(512) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `FK_historico_chips_chips` (`chip_id` ASC),
  INDEX `FK_historico_chips_rastreadores` (`rastreador_id` ASC),
  CONSTRAINT `FK_historico_chips_rastreadores`
    FOREIGN KEY (`rastreador_id`)
    REFERENCES `db_am_trace`.`rastreadors` (`id`),
  CONSTRAINT `FK_historico_chips_chips`
    FOREIGN KEY (`chip_id`)
    REFERENCES `db_am_trace`.`chips` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_am_trace`.`historico_veiculos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_am_trace`.`historico_veiculos` (
  `id` BIGINT(20) NOT NULL,
  `veiculo_id` BIGINT(20) NOT NULL,
  `rastreador_id` BIGINT(20) NOT NULL,
  `data_inicio` DATE NOT NULL,
  `data_fim` DATE NULL DEFAULT NULL,
  `informacao_adicional` VARCHAR(512) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `FK_historico_veiculos_veiculos` (`veiculo_id` ASC),
  INDEX `FK_historico_veiculos_rastreadores` (`rastreador_id` ASC),
  CONSTRAINT `FK_historico_veiculos_rastreadores`
    FOREIGN KEY (`rastreador_id`)
    REFERENCES `db_am_trace`.`rastreadors` (`id`),
  CONSTRAINT `FK_historico_veiculos_veiculos`
    FOREIGN KEY (`veiculo_id`)
    REFERENCES `db_am_trace`.`veiculos` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_am_trace`.`logs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_am_trace`.`logs` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `usuario_id` INT(11) NOT NULL,
  `data` DATE NOT NULL,
  `acao` VARCHAR(16) NOT NULL,
  `tabela` VARCHAR(24) NULL DEFAULT NULL,
  `dispositivo` VARCHAR(72) NULL DEFAULT NULL,
  `informacao_adicional` VARCHAR(256) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `FK_logs_usuarios` (`usuario_id` ASC),
  CONSTRAINT `FK_logs_usuarios`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `db_am_trace`.`usuarios` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
