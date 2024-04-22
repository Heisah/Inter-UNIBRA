CREATE DATABASE  IF NOT EXISTS `ead_nutri` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `ead_nutri`;
-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: ead_nutri
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluno` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(10) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `CPF` varchar(45) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` VALUES (9,'admin@@@','adm','admin@localhost.com','123.123.123-12','adminadmin','outro','PE'),(12,'jad','jad','EXAMPLE@gmail.com','123.123.123-12','1','masculino','BH'),(13,'professor','aaa','apolinario@gmail.com','123.123.123-12','2','masculino','PA'),(14,'Teste','Teste','EXAMPLE@gmail.com','123.123.123-12','1','feminino','AC'),(15,'ultimotest','the paiaman man','paia@gmail.com','123.123.123-12','2','masculino','testes');
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ao-vivo`
--

DROP TABLE IF EXISTS `ao-vivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ao-vivo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Data` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ao-vivo`
--

LOCK TABLES `ao-vivo` WRITE;
/*!40000 ALTER TABLE `ao-vivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `ao-vivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aulas`
--

DROP TABLE IF EXISTS `aulas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aulas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `postador` varchar(45) NOT NULL,
  `data_publicacao` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aulas`
--

LOCK TABLES `aulas` WRITE;
/*!40000 ALTER TABLE `aulas` DISABLE KEYS */;
INSERT INTO `aulas` VALUES (1,'Nutrição Básica 1','https://www.youtube.com/embed/TvnQMk_FqqU?si=duQT1sBg7mOuL9Yh','teste testado','teste','2023-03-02'),(10,'Nutrição Básica 2','https://www.youtube.com/embed/QhIBNpe9Wk0?si=Cz7p7-oWPzvITTvc','antonio','eduardo','2023-03-03'),(11,'Nutrição Básica 3','https://www.youtube.com/embed/-X9vv4M3wSg?si=SvqZqGO9SADkVk21','','antonio','2023-03-04'),(12,'Nutrição Básica Introdução','https://www.youtube.com/embed/1XIBBulCW7M?si=swrbREpXIuwVrGf1','aaaaaaaa','antonio','2023-03-01'),(13,'Nutrição Básica 4','https://www.youtube.com/embed/INBKxfpVM1U?si=bR5viuZCivHi2_vp','','antonio','2023-03-05');
/*!40000 ALTER TABLE `aulas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gravada`
--

DROP TABLE IF EXISTS `gravada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gravada` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `N_Minutos` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gravada`
--

LOCK TABLES `gravada` WRITE;
/*!40000 ALTER TABLE `gravada` DISABLE KEYS */;
/*!40000 ALTER TABLE `gravada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historico`
--

DROP TABLE IF EXISTS `historico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historico` (
  `id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historico`
--

LOCK TABLES `historico` WRITE;
/*!40000 ALTER TABLE `historico` DISABLE KEYS */;
/*!40000 ALTER TABLE `historico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pdf`
--

DROP TABLE IF EXISTS `pdf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pdf` (
  `id` int(10) NOT NULL,
  `N_Paginas` int(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pdf`
--

LOCK TABLES `pdf` WRITE;
/*!40000 ALTER TABLE `pdf` DISABLE KEYS */;
/*!40000 ALTER TABLE `pdf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `id` int(10) NOT NULL,
  `Link` varchar(45) NOT NULL,
  `Conteudo` varchar(250) NOT NULL,
  `Pdf_id` int(10) NOT NULL,
  `Ao-Vivo_id` int(10) NOT NULL,
  `Gravada_id` int(10) NOT NULL,
  `Transação_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Produtos_Pdf1_idx` (`Pdf_id`),
  KEY `fk_Produtos_Ao-Vivo1_idx` (`Ao-Vivo_id`),
  KEY `fk_Produtos_Gravada1_idx` (`Gravada_id`),
  KEY `fk_Produtos_Transação1_idx` (`Transação_id`),
  CONSTRAINT `fk_Produtos_Ao-Vivo` FOREIGN KEY (`Ao-Vivo_id`) REFERENCES `ao-vivo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Produtos_Gravada1` FOREIGN KEY (`Gravada_id`) REFERENCES `gravada` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Produtos_Pdf1` FOREIGN KEY (`Pdf_id`) REFERENCES `pdf` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Produtos_Transação1` FOREIGN KEY (`Transação_id`) REFERENCES `transação` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professor` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(10) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `CPF` varchar(45) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` VALUES (1,'professor','teste','a@gmail.com','[123.123.123-34]','446','masculino','PE'),(2,'	\r\neduardo','	\r\neduardo','	\r\neduardo@gmail.com','123.123.123.123-12','6','outro','cergipe'),(22,'paia','antonio','	\r\neduardo@gmail.com','123.123.123.123-12','6','outro','cergipe');
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transação`
--

DROP TABLE IF EXISTS `transação`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transação` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Data` date NOT NULL,
  `id_Professor` int(11) NOT NULL,
  `id_Aluno` int(11) NOT NULL,
  `id_Historico` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Professor_idx` (`id_Professor`),
  KEY `id_Aluno_idx` (`id_Aluno`),
  KEY `id_Historico_idx` (`id_Historico`),
  CONSTRAINT `fk_Aluno` FOREIGN KEY (`id_Aluno`) REFERENCES `aluno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Historico` FOREIGN KEY (`id_Historico`) REFERENCES `historico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Professor` FOREIGN KEY (`id_Professor`) REFERENCES `professor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transação`
--

LOCK TABLES `transação` WRITE;
/*!40000 ALTER TABLE `transação` DISABLE KEYS */;
/*!40000 ALTER TABLE `transação` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-21 21:50:07
