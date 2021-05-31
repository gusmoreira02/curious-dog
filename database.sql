-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: database
-- ------------------------------------------------------
-- Server version	5.7.32-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Temporary view structure for view `ncurtida`
--

DROP TABLE IF EXISTS `ncurtida`;
/*!50001 DROP VIEW IF EXISTS `ncurtida`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `ncurtida` AS SELECT 
 1 AS `idnotificacurtida`,
 1 AS `resposta`,
 1 AS `usuario`,
 1 AS `visto`,
 1 AS `datanoti`,
 1 AS `idusuario`,
 1 AS `idresposta`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `notificacurtida`
--

DROP TABLE IF EXISTS `notificacurtida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notificacurtida` (
  `idnotificacurtida` int(11) NOT NULL AUTO_INCREMENT,
  `resposta` int(11) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `visto` tinyint(1) DEFAULT NULL,
  `datanoti` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idnotificacurtida`),
  KEY `fk_12312397_idx` (`resposta`),
  KEY `fk_89236_idx` (`usuario`),
  CONSTRAINT `fk_12312397` FOREIGN KEY (`resposta`) REFERENCES `resposta` (`idresposta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_89236` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificacurtida`
--

LOCK TABLES `notificacurtida` WRITE;
/*!40000 ALTER TABLE `notificacurtida` DISABLE KEYS */;
INSERT INTO `notificacurtida` VALUES (10,80,7,1,'2021-05-30 18:07:39'),(11,87,10,0,'2021-05-30 18:07:59'),(12,79,7,1,'2021-05-30 18:08:06'),(13,81,8,1,'2021-05-30 18:25:55'),(14,83,7,1,'2021-05-30 18:26:47'),(15,78,7,0,'2021-05-30 19:47:29');
/*!40000 ALTER TABLE `notificacurtida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificapergunta`
--

DROP TABLE IF EXISTS `notificapergunta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notificapergunta` (
  `idnotificacao` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` int(11) DEFAULT NULL,
  `visto` tinyint(1) DEFAULT NULL,
  `datanoti` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idnotificacao`),
  KEY `fk_6476_idx` (`pergunta`),
  CONSTRAINT `fk_6476` FOREIGN KEY (`pergunta`) REFERENCES `pergunta` (`idpergunta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificapergunta`
--

LOCK TABLES `notificapergunta` WRITE;
/*!40000 ALTER TABLE `notificapergunta` DISABLE KEYS */;
INSERT INTO `notificapergunta` VALUES (11,46,1,'2021-05-30 18:27:34'),(12,47,0,'2021-05-30 18:27:59');
/*!40000 ALTER TABLE `notificapergunta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificaresposta`
--

DROP TABLE IF EXISTS `notificaresposta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notificaresposta` (
  `idnotificaresposta` int(11) NOT NULL AUTO_INCREMENT,
  `resposta` int(11) DEFAULT NULL,
  `visto` tinyint(1) DEFAULT NULL,
  `datanoti` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idnotificaresposta`),
  KEY `fk_94762_idx` (`resposta`),
  CONSTRAINT `fk_94762` FOREIGN KEY (`resposta`) REFERENCES `resposta` (`idresposta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificaresposta`
--

LOCK TABLES `notificaresposta` WRITE;
/*!40000 ALTER TABLE `notificaresposta` DISABLE KEYS */;
INSERT INTO `notificaresposta` VALUES (6,88,1,'2021-05-30 18:28:10');
/*!40000 ALTER TABLE `notificaresposta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `npergunta`
--

DROP TABLE IF EXISTS `npergunta`;
/*!50001 DROP VIEW IF EXISTS `npergunta`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `npergunta` AS SELECT 
 1 AS `idnotificacao`,
 1 AS `pergunta`,
 1 AS `visto`,
 1 AS `datanoti`,
 1 AS `idpergunta`,
 1 AS `usuario`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `nresposta`
--

DROP TABLE IF EXISTS `nresposta`;
/*!50001 DROP VIEW IF EXISTS `nresposta`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `nresposta` AS SELECT 
 1 AS `idnotificaresposta`,
 1 AS `resposta`,
 1 AS `visto`,
 1 AS `datanoti`,
 1 AS `idresposta`,
 1 AS `rPergunta`,
 1 AS `idpergunta`,
 1 AS `usuario`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `pergunta`
--

DROP TABLE IF EXISTS `pergunta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pergunta` (
  `idpergunta` int(11) NOT NULL AUTO_INCREMENT,
  `mensagem` varchar(100) NOT NULL,
  `remetente` int(11) DEFAULT NULL,
  `destinatario` int(11) NOT NULL,
  `dataPergunta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `anonimo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idpergunta`),
  KEY `destinatario` (`destinatario`),
  KEY `remetente` (`remetente`),
  CONSTRAINT `pergunta_ibfk_1` FOREIGN KEY (`destinatario`) REFERENCES `usuario` (`idusuario`),
  CONSTRAINT `pergunta_ibfk_2` FOREIGN KEY (`remetente`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pergunta`
--

LOCK TABLES `pergunta` WRITE;
/*!40000 ALTER TABLE `pergunta` DISABLE KEYS */;
INSERT INTO `pergunta` VALUES (7,'aaaaaa asdasdas',8,7,'2021-05-24 00:00:46',NULL),(9,'asaaa',4,3,'2021-05-24 00:16:01',NULL),(17,'a',7,10,'2021-05-24 23:12:23',NULL),(28,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',7,10,'2021-05-25 01:07:54',NULL),(31,'asdasd',10,7,'2021-05-27 18:34:13',NULL),(32,'salve danilol',7,10,'2021-05-27 19:07:49',NULL),(33,'asdasd',7,10,'2021-05-27 20:17:55',1),(34,'as',8,10,'2021-05-27 20:19:10',1),(35,'asdasdasd',7,10,'2021-05-27 20:21:46',NULL),(36,'asdasdas',7,10,'2021-05-29 23:36:16',NULL),(37,'salve',10,7,'2021-05-30 16:29:03',NULL),(38,'salve',10,7,'2021-05-30 16:29:04',NULL),(39,'salve',10,7,'2021-05-30 16:29:05',NULL),(40,'salve',10,7,'2021-05-30 16:29:06',NULL),(41,'salve',10,7,'2021-05-30 16:29:06',NULL),(42,'salve',10,7,'2021-05-30 16:29:07',NULL),(43,'salve',10,7,'2021-05-30 16:29:07',NULL),(44,'salve',10,7,'2021-05-30 16:29:08',NULL),(45,'salve',7,10,'2021-05-30 17:16:40',NULL),(46,'testen',7,10,'2021-05-30 18:27:34',NULL),(47,'testen',10,7,'2021-05-30 18:27:59',NULL);
/*!40000 ALTER TABLE `pergunta` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `database`.`pergunta_AFTER_INSERT` AFTER INSERT ON `pergunta` FOR EACH ROW
BEGIN
insert into notificapergunta(pergunta,visto) values(new.idpergunta,0);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `resposta`
--

DROP TABLE IF EXISTS `resposta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resposta` (
  `idresposta` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` int(11) DEFAULT NULL,
  `dataResposta` datetime DEFAULT CURRENT_TIMESTAMP,
  `resposta` varchar(140) NOT NULL,
  PRIMARY KEY (`idresposta`),
  KEY `pergunta` (`pergunta`),
  CONSTRAINT `resposta_ibfk_1` FOREIGN KEY (`pergunta`) REFERENCES `pergunta` (`idpergunta`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resposta`
--

LOCK TABLES `resposta` WRITE;
/*!40000 ALTER TABLE `resposta` DISABLE KEYS */;
INSERT INTO `resposta` VALUES (78,17,'2021-05-25 01:31:46','salve'),(79,28,'2021-05-25 21:24:22','teste pinduca'),(80,32,'2021-05-27 19:08:13','teste edanilo'),(81,34,'2021-05-29 17:42:07','asdads'),(83,36,'2021-05-29 23:37:34','asdasdadd'),(84,37,'2021-05-30 16:29:36','asd'),(85,38,'2021-05-30 16:29:36','asdasdd'),(86,39,'2021-05-30 16:29:36','asd'),(87,40,'2021-05-30 16:29:36','adasdasd'),(88,47,'2021-05-30 18:28:10','testen');
/*!40000 ALTER TABLE `resposta` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `database`.`resposta_AFTER_INSERT` AFTER INSERT ON `resposta` FOR EACH ROW
BEGIN
insert into notificaresposta(resposta,visto) values(new.idresposta,0);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `respostacurtida`
--

DROP TABLE IF EXISTS `respostacurtida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `respostacurtida` (
  `resposta` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`resposta`,`usuario`),
  KEY `usuario` (`usuario`),
  KEY `respostacurtida_ibfk_2_idx` (`resposta`),
  CONSTRAINT `respostacurtida_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`),
  CONSTRAINT `respostacurtida_ibfk_2` FOREIGN KEY (`resposta`) REFERENCES `resposta` (`idresposta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respostacurtida`
--

LOCK TABLES `respostacurtida` WRITE;
/*!40000 ALTER TABLE `respostacurtida` DISABLE KEYS */;
INSERT INTO `respostacurtida` VALUES (78,10),(79,10),(80,10),(81,10),(83,10),(87,10);
/*!40000 ALTER TABLE `respostacurtida` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `database`.`respostacurtida_AFTER_INSERT` AFTER INSERT ON `respostacurtida` FOR EACH ROW
BEGIN
insert into notificacurtida(resposta,usuario,visto) values(new.resposta,(select pergunta.remetente from resposta inner join pergunta on resposta.pergunta = pergunta.idpergunta where resposta.idresposta=new.resposta),0);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `seguindo`
--

DROP TABLE IF EXISTS `seguindo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seguindo` (
  `idseguindo` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `follow` int(11) NOT NULL,
  PRIMARY KEY (`idseguindo`),
  KEY `follow` (`follow`),
  KEY `usuario` (`usuario`),
  CONSTRAINT `seguindo_ibfk_1` FOREIGN KEY (`follow`) REFERENCES `usuario` (`idusuario`),
  CONSTRAINT `seguindo_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seguindo`
--

LOCK TABLES `seguindo` WRITE;
/*!40000 ALTER TABLE `seguindo` DISABLE KEYS */;
INSERT INTO `seguindo` VALUES (4,8,7),(5,8,3),(128,10,7),(129,10,8),(130,10,4);
/*!40000 ALTER TABLE `seguindo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `apelido` varchar(45) DEFAULT NULL,
  `fotoPerfil` varchar(5000) DEFAULT NULL,
  `oauth_token` varchar(50) DEFAULT NULL,
  `oauth_token_secret` varchar(50) DEFAULT NULL,
  `banner` varchar(70) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (3,'asd','asd','asd','http://pbs.twimg.com/profile_images/1382075628007067648/9n41ejJx.jpg',NULL,NULL,NULL,NULL),(4,'Guusmoreira02','963835635147726851','G','http://pbs.twimg.com/profile_images/1384177207409401859/brEuvNJ2_normal.jpg',NULL,NULL,NULL,NULL),(7,'AdacheskiAndre','1224585458149134337','Andre Adacheski','http://pbs.twimg.com/profile_images/1382075628007067648/9n41ejJx.jpg','1224585458149134337-gtHkqNeq4WFTAIikHM8xpmmDfB42lQ','2n5xCoPmIyFruXsxesVobRfzjXlBXXbCts34sOA6BKLoC',NULL,NULL),(8,'leo_sarturi','240383518','leo','http://pbs.twimg.com/profile_images/1358788520282890241/OzUGSByh.jpg','240383518-hrZfh9psnbDUdYVsRQGkoWx5DtrpwZijGILTVtob','c7oSAzxVsRZGC0BsWopH5MBfhy5zO8X2oZMHns36y8g9g',NULL,NULL),(10,'testebixcoito','4651815436','Bixcoito','http://pbs.twimg.com/profile_images/1397010479730630659/rdyt4Ijr.jpg','4651815436-EicA7i2y1YY9KOKqsS54IBpCQCobuORNfmGzH2n','RDXGmsO0l5VsimaCR1gRSruRtslTCyJ0YzQosQfcCYLuM','https://pbs.twimg.com/profile_banners/4651815436/1622164693',NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'database'
--

--
-- Dumping routines for database 'database'
--
/*!50003 DROP PROCEDURE IF EXISTS `curtidas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `curtidas`(in idresposta int)
BEGIN
select count(usuario) as curtidas from respostacurtida where resposta = idresposta ;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `curtir` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `curtir`(in idresposta int,in idusuario int)
BEGIN
insert into respostacurtida(resposta,usuario)values(idresposta,idusuario);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `curto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `curto`(in idresposta int,in idusuario int)
BEGIN
select count(usuario) as curto from respostacurtida where resposta=idresposta && usuario= idusuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `descurtir` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `descurtir`(in idresposta int,in idusuario int)
BEGIN
delete from respostacurtida where resposta=idresposta && usuario=idusuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `seguidores` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `seguidores`(in usuario int)
BEGIN
select count(follow) as seguidores from seguindo where seguindo.usuario = usuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `seguindo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `seguindo`(in usuario int)
BEGIN
select count(follow) as seguindo from seguindo where seguindo.follow = usuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sigo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sigo`(in usuario int,in follow int)
BEGIN
select count(idseguindo) as segue from seguindo as s where s.usuario = usuario AND s.follow = follow;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `ncurtida`
--

/*!50001 DROP VIEW IF EXISTS `ncurtida`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ncurtida` AS select `notificacurtida`.`idnotificacurtida` AS `idnotificacurtida`,`notificacurtida`.`resposta` AS `resposta`,`notificacurtida`.`usuario` AS `usuario`,`notificacurtida`.`visto` AS `visto`,`notificacurtida`.`datanoti` AS `datanoti`,`usuario`.`idusuario` AS `idusuario`,`resposta`.`idresposta` AS `idresposta` from ((`notificacurtida` join `usuario` on((`notificacurtida`.`usuario` = `usuario`.`idusuario`))) join `resposta` on((`notificacurtida`.`resposta` = `resposta`.`idresposta`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `npergunta`
--

/*!50001 DROP VIEW IF EXISTS `npergunta`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `npergunta` AS select `notificapergunta`.`idnotificacao` AS `idnotificacao`,`notificapergunta`.`pergunta` AS `pergunta`,`notificapergunta`.`visto` AS `visto`,`notificapergunta`.`datanoti` AS `datanoti`,`pergunta`.`idpergunta` AS `idpergunta`,`pergunta`.`destinatario` AS `usuario` from (`notificapergunta` join `pergunta` on((`pergunta`.`idpergunta` = `notificapergunta`.`pergunta`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `nresposta`
--

/*!50001 DROP VIEW IF EXISTS `nresposta`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `nresposta` AS select `notificaresposta`.`idnotificaresposta` AS `idnotificaresposta`,`notificaresposta`.`resposta` AS `resposta`,`notificaresposta`.`visto` AS `visto`,`notificaresposta`.`datanoti` AS `datanoti`,`resposta`.`idresposta` AS `idresposta`,`resposta`.`pergunta` AS `rPergunta`,`pergunta`.`idpergunta` AS `idpergunta`,`pergunta`.`remetente` AS `usuario` from ((`notificaresposta` join `resposta` on((`notificaresposta`.`resposta` = `resposta`.`idresposta`))) join `pergunta` on((`resposta`.`pergunta` = `pergunta`.`idpergunta`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-30 21:12:42
