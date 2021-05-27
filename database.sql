CREATE DATABASE  IF NOT EXISTS `database` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `database`;
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pergunta`
--

LOCK TABLES `pergunta` WRITE;
/*!40000 ALTER TABLE `pergunta` DISABLE KEYS */;
INSERT INTO `pergunta` VALUES (7,'aaaaaa asdasdas',8,7,'2021-05-24 00:00:46',NULL),(9,'asaaa',4,3,'2021-05-24 00:16:01',NULL),(17,'a',7,10,'2021-05-24 23:12:23',NULL),(28,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',7,10,'2021-05-25 01:07:54',NULL),(31,'asdasd',10,7,'2021-05-27 18:34:13',NULL),(32,'salve danilol',7,10,'2021-05-27 19:07:49',NULL),(33,'asdasd',7,10,'2021-05-27 20:17:55',1),(34,'as',8,10,'2021-05-27 20:19:10',1),(35,'asdasdasd',7,10,'2021-05-27 20:21:46',NULL);
/*!40000 ALTER TABLE `pergunta` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resposta`
--

LOCK TABLES `resposta` WRITE;
/*!40000 ALTER TABLE `resposta` DISABLE KEYS */;
INSERT INTO `resposta` VALUES (78,17,'2021-05-25 01:31:46','salve'),(79,28,'2021-05-25 21:24:22','teste pinduca'),(80,32,'2021-05-27 19:08:13','teste edanilo');
/*!40000 ALTER TABLE `resposta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respostacurtida`
--

DROP TABLE IF EXISTS `respostacurtida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `respostacurtida` (
  `idrespostaCurtida` int(11) NOT NULL AUTO_INCREMENT,
  `resposta` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`idrespostaCurtida`),
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
/*!40000 ALTER TABLE `respostacurtida` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seguindo`
--

LOCK TABLES `seguindo` WRITE;
/*!40000 ALTER TABLE `seguindo` DISABLE KEYS */;
INSERT INTO `seguindo` VALUES (4,8,7),(5,8,3),(128,10,7);
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
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (3,'asd','asd','asd','http://pbs.twimg.com/profile_images/1382075628007067648/9n41ejJx.jpg',NULL,NULL),(4,'Guusmoreira02','963835635147726851','G','http://pbs.twimg.com/profile_images/1384177207409401859/brEuvNJ2_normal.jpg',NULL,NULL),(7,'AdacheskiAndre','1224585458149134337','Andre Adacheski','http://pbs.twimg.com/profile_images/1382075628007067648/9n41ejJx.jpg','1224585458149134337-gtHkqNeq4WFTAIikHM8xpmmDfB42lQ','2n5xCoPmIyFruXsxesVobRfzjXlBXXbCts34sOA6BKLoC'),(8,'leo_sarturi','240383518','leo','http://pbs.twimg.com/profile_images/1358788520282890241/OzUGSByh.jpg','240383518-hrZfh9psnbDUdYVsRQGkoWx5DtrpwZijGILTVtob','c7oSAzxVsRZGC0BsWopH5MBfhy5zO8X2oZMHns36y8g9g'),(10,'testebixcoito','4651815436','Bixcoito','http://pbs.twimg.com/profile_images/1397010479730630659/rdyt4Ijr.jpg','4651815436-EicA7i2y1YY9KOKqsS54IBpCQCobuORNfmGzH2n','RDXGmsO0l5VsimaCR1gRSruRtslTCyJ0YzQosQfcCYLuM');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'database'
--

--
-- Dumping routines for database 'database'
--
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-27 20:29:02
