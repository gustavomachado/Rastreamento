
use db_am_trace;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: db_am_trace
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `acessos`
--

DROP TABLE IF EXISTS `acessos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acessos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conta_id` int(11) NOT NULL,
  `pagina_id` int(11) NOT NULL,
  `visualizar` tinyint(1) DEFAULT '0',
  `editar` tinyint(1) DEFAULT '0',
  `excluir` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`,`conta_id`,`pagina_id`),
  KEY `IX_acessos1` (`conta_id`),
  KEY `IX_acessos2` (`pagina_id`),
  CONSTRAINT `FK_acessos_contas` FOREIGN KEY (`conta_id`) REFERENCES `contas` (`id`),
  CONSTRAINT `FK_acessos_paginas` FOREIGN KEY (`pagina_id`) REFERENCES `paginas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acessos`
--

LOCK TABLES `acessos` WRITE;
/*!40000 ALTER TABLE `acessos` DISABLE KEYS */;
INSERT INTO `acessos` VALUES (4,1,1,1,1,1),(5,1,2,1,1,1),(6,1,3,1,1,1),(7,1,4,1,1,1),(8,1,5,1,1,1);
/*!40000 ALTER TABLE `acessos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campos`
--

DROP TABLE IF EXISTS `campos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pagina_id` int(11) NOT NULL,
  `campo` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_campos_tb_paginas` (`pagina_id`),
  CONSTRAINT `FK_campos_tb_paginas` FOREIGN KEY (`pagina_id`) REFERENCES `paginas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campos`
--

LOCK TABLES `campos` WRITE;
/*!40000 ALTER TABLE `campos` DISABLE KEYS */;
/*!40000 ALTER TABLE `campos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chips`
--

DROP TABLE IF EXISTS `chips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chips` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `rastreador_id` bigint(20) DEFAULT NULL,
  `operadora` varchar(16) DEFAULT NULL,
  `numero_chip` varchar(40) DEFAULT NULL,
  `numero_telefone` varchar(40) DEFAULT NULL,
  `apn` varchar(40) DEFAULT NULL,
  `obs` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_chips_rastreadores` (`rastreador_id`),
  CONSTRAINT `FK_chips_rastreadores` FOREIGN KEY (`rastreador_id`) REFERENCES `rastreadors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chips`
--

LOCK TABLES `chips` WRITE;
/*!40000 ALTER TABLE `chips` DISABLE KEYS */;
INSERT INTO `chips` VALUES (19,4,'Vivo','','(92)99166-6050','',''),(20,4,'tim','','(92)98181-5255','','');
/*!40000 ALTER TABLE `chips` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` char(1) DEFAULT NULL,
  `cpf_cnpj` varchar(18) NOT NULL,
  `ie` varchar(16) DEFAULT NULL,
  `im` varchar(16) DEFAULT NULL,
  `nome` varchar(56) NOT NULL,
  `razao_social` varchar(56) DEFAULT NULL,
  `telefone` varchar(16) DEFAULT NULL,
  `email` varchar(56) DEFAULT NULL,
  `email_de_cobranca` varchar(128) DEFAULT NULL,
  `medidas_panico` varchar(512) DEFAULT NULL,
  `senha_panico` varchar(40) DEFAULT NULL,
  `obs` varchar(512) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `rua` varchar(40) NOT NULL,
  `numero` varchar(8) DEFAULT NULL,
  `bairro` varchar(40) DEFAULT NULL,
  `cidade` varchar(40) NOT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'F','004.574.992-22',NULL,NULL,'Jadson jhuan da Silva',NULL,'(92)99166-6050','','','','','','69097-26','Rua PolinÃ©sia','','Nova Cidade','Manaus','AM','');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contas`
--

DROP TABLE IF EXISTS `contas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(32) NOT NULL,
  `obs` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contas`
--

LOCK TABLES `contas` WRITE;
/*!40000 ALTER TABLE `contas` DISABLE KEYS */;
INSERT INTO `contas` VALUES (1,'Admin','');
/*!40000 ALTER TABLE `contas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contatos`
--

DROP TABLE IF EXISTS `contatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contatos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `nome` varchar(56) NOT NULL,
  `setor` varchar(40) DEFAULT NULL,
  `cargo` varchar(40) DEFAULT NULL,
  `telefone` varchar(16) DEFAULT NULL,
  `celular` varchar(40) DEFAULT NULL,
  `email` varchar(56) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_contatos_clientes` (`cliente_id`),
  CONSTRAINT `FK_contatos_clientes` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contatos`
--

LOCK TABLES `contatos` WRITE;
/*!40000 ALTER TABLE `contatos` DISABLE KEYS */;
/*!40000 ALTER TABLE `contatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contratos`
--

DROP TABLE IF EXISTS `contratos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contratos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `numero_contrato` varchar(16) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_vencimento` date DEFAULT NULL,
  `valor_mensalidade` decimal(10,0) DEFAULT NULL,
  `dia_vencimento` int(11) NOT NULL,
  `doc` varchar(8) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL,
  `obs` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contratos`
--

LOCK TABLES `contratos` WRITE;
/*!40000 ALTER TABLE `contratos` DISABLE KEYS */;
/*!40000 ALTER TABLE `contratos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `controle_acesso_campos`
--

DROP TABLE IF EXISTS `controle_acesso_campos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `controle_acesso_campos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `campo_id` bigint(20) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `visualizar` bit(1) DEFAULT NULL,
  `editar` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_controle_acessos_campos` (`campo_id`),
  KEY `FK_controle_acessos_usuarios` (`usuario_id`),
  CONSTRAINT `FK_controle_acessos_campos` FOREIGN KEY (`campo_id`) REFERENCES `campos` (`id`),
  CONSTRAINT `FK_controle_acessos_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `controle_acesso_campos`
--

LOCK TABLES `controle_acesso_campos` WRITE;
/*!40000 ALTER TABLE `controle_acesso_campos` DISABLE KEYS */;
/*!40000 ALTER TABLE `controle_acesso_campos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historico_chips`
--

DROP TABLE IF EXISTS `historico_chips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historico_chips` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `chip_id` bigint(20) NOT NULL,
  `rastreador_id` bigint(20) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date DEFAULT NULL,
  `informacao_adicional` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_historico_chips_chips` (`chip_id`),
  KEY `FK_historico_chips_rastreadores` (`rastreador_id`),
  CONSTRAINT `FK_historico_chips_chips` FOREIGN KEY (`chip_id`) REFERENCES `chips` (`id`),
  CONSTRAINT `FK_historico_chips_rastreadores` FOREIGN KEY (`rastreador_id`) REFERENCES `rastreadors` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historico_chips`
--

LOCK TABLES `historico_chips` WRITE;
/*!40000 ALTER TABLE `historico_chips` DISABLE KEYS */;
/*!40000 ALTER TABLE `historico_chips` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historico_veiculos`
--

DROP TABLE IF EXISTS `historico_veiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historico_veiculos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `veiculo_id` bigint(20) NOT NULL,
  `rastreador_id` bigint(20) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date DEFAULT NULL,
  `informacao_adicional` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_historico_veiculos_veiculos` (`veiculo_id`),
  KEY `FK_historico_veiculos_rastreadores` (`rastreador_id`),
  CONSTRAINT `FK_historico_veiculos_rastreadores` FOREIGN KEY (`rastreador_id`) REFERENCES `rastreadors` (`id`),
  CONSTRAINT `FK_historico_veiculos_veiculos` FOREIGN KEY (`veiculo_id`) REFERENCES `veiculos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historico_veiculos`
--

LOCK TABLES `historico_veiculos` WRITE;
/*!40000 ALTER TABLE `historico_veiculos` DISABLE KEYS */;
/*!40000 ALTER TABLE `historico_veiculos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `acao` varchar(16) NOT NULL,
  `tabela` varchar(24) DEFAULT NULL,
  `dispositivo` varchar(72) DEFAULT NULL,
  `informacao_adicional` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_logs_usuarios` (`usuario_id`),
  CONSTRAINT `FK_logs_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `motoristas`
--

DROP TABLE IF EXISTS `motoristas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `motoristas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(56) NOT NULL,
  `telefone` varchar(16) DEFAULT NULL,
  `celular` varchar(16) DEFAULT NULL,
  `numero_cnh` varchar(16) DEFAULT NULL,
  `obs` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motoristas`
--

LOCK TABLES `motoristas` WRITE;
/*!40000 ALTER TABLE `motoristas` DISABLE KEYS */;
/*!40000 ALTER TABLE `motoristas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paginas`
--

DROP TABLE IF EXISTS `paginas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paginas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `url` varchar(160) NOT NULL,
  `class_icon` varchar(60) DEFAULT 'flaticon-add180',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paginas`
--

LOCK TABLES `paginas` WRITE;
/*!40000 ALTER TABLE `paginas` DISABLE KEYS */;
INSERT INTO `paginas` VALUES (1,'Usuários','Users','flaticon-users25'),(2,'Rastreadores','Rastreadors','flaticon-wifi83'),(3,'Contas','Contas','flaticon-shared1'),(4,'Acessos','Acessos','flaticon-screen49'),(5,'Clientes','Clientes','flaticon-person325');
/*!40000 ALTER TABLE `paginas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rastreadors`
--

DROP TABLE IF EXISTS `rastreadors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rastreadors` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `veiculo_id` bigint(20) DEFAULT NULL,
  `marca` varchar(40) DEFAULT NULL,
  `modelo` varchar(40) DEFAULT NULL,
  `numero_equipamento` varchar(40) DEFAULT NULL,
  `numero_serie` varchar(40) DEFAULT NULL,
  `senha_rastreador` varchar(40) DEFAULT NULL,
  `senha_acesso_remoto` varchar(40) DEFAULT NULL,
  `senha_sms` varchar(40) DEFAULT NULL,
  `senha_panico` varchar(40) DEFAULT NULL,
  `data_instalacao` date DEFAULT NULL,
  `data_remocao` date DEFAULT NULL,
  `bloqueio` tinyint(1) DEFAULT NULL,
  `imei` varchar(40) DEFAULT NULL,
  `apn` varchar(40) DEFAULT NULL,
  `obs` varchar(512) DEFAULT NULL,
  `e1` varchar(40) DEFAULT NULL,
  `e2` varchar(40) DEFAULT NULL,
  `e3` varchar(40) DEFAULT NULL,
  `e4` varchar(40) DEFAULT NULL,
  `s1` varchar(40) DEFAULT NULL,
  `s2` varchar(40) DEFAULT NULL,
  `s3` varchar(40) DEFAULT NULL,
  `s4` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_rastreadores_veiculos` (`veiculo_id`),
  CONSTRAINT `FK_rastreadores_veiculos` FOREIGN KEY (`veiculo_id`) REFERENCES `veiculos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rastreadors`
--

LOCK TABLES `rastreadors` WRITE;
/*!40000 ALTER TABLE `rastreadors` DISABLE KEYS */;
INSERT INTO `rastreadors` VALUES (4,NULL,'marca 01','Modelo 01','123','','','','','',NULL,NULL,0,'',NULL,'','','','','','','','',''),(7,NULL,'','Teste 02','','','','','','',NULL,NULL,0,'',NULL,'','','','','','','','','');
/*!40000 ALTER TABLE `rastreadors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conta_id` int(11) NOT NULL,
  `nome` varchar(56) NOT NULL,
  `email` varchar(64) NOT NULL,
  `senha` varchar(40) DEFAULT NULL,
  `obs` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_usuarios_contas` (`conta_id`),
  CONSTRAINT `FK_usuarios_contas` FOREIGN KEY (`conta_id`) REFERENCES `contas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,1,'Jadson','jadson@gmail.com','123',NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `veiculos`
--

DROP TABLE IF EXISTS `veiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `veiculos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `motorista_id` int(11) DEFAULT NULL,
  `contrato_id` bigint(20) DEFAULT NULL,
  `placa` varchar(8) DEFAULT NULL,
  `tipo_veiculo` varchar(40) DEFAULT NULL,
  `marca` varchar(40) DEFAULT NULL,
  `modelo` varchar(40) DEFAULT NULL,
  `cor` varchar(40) DEFAULT NULL,
  `ano_fabricacao` int(11) DEFAULT NULL,
  `ano_modelo` int(11) DEFAULT NULL,
  `chassi` varchar(24) DEFAULT NULL,
  `renavan` varchar(16) DEFAULT NULL,
  `combustivel` varchar(40) DEFAULT NULL,
  `consumo_km_litro` varchar(40) DEFAULT NULL,
  `consumo_litro_hr` varchar(40) DEFAULT NULL,
  `tipo_instalacao` varchar(40) DEFAULT NULL,
  `local_instalacao_rastreador` varchar(80) DEFAULT NULL,
  `fiacao_utilizada` varchar(256) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL,
  `email_notificacao` varchar(512) DEFAULT NULL,
  `sms_notificacao` varchar(40) DEFAULT NULL,
  `plano_notificacao_email` varchar(40) DEFAULT NULL,
  `plano_notificacao_sms` varchar(40) DEFAULT NULL,
  `obs` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_veiculos_clientes` (`cliente_id`),
  KEY `FK_veiculos_motoristas` (`motorista_id`),
  KEY `FK_veiculos_contratos` (`contrato_id`),
  CONSTRAINT `FK_veiculos_clientes` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  CONSTRAINT `FK_veiculos_contratos` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`id`),
  CONSTRAINT `FK_veiculos_motoristas` FOREIGN KEY (`motorista_id`) REFERENCES `motoristas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `veiculos`
--

LOCK TABLES `veiculos` WRITE;
/*!40000 ALTER TABLE `veiculos` DISABLE KEYS */;
/*!40000 ALTER TABLE `veiculos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-28 13:49:11
