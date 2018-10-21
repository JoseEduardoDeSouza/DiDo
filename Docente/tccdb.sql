-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: sistemaDocente
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1

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
-- Table structure for table `arquivo`
--

DROP TABLE IF EXISTS `arquivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arquivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `docente_siape` varchar(45) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `nome` varchar(500) NOT NULL,
  `local` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_arquivo_turma1_idx` (`turma_id`),
  CONSTRAINT `fk_arquivo_turma1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arquivo`
--

LOCK TABLES `arquivo` WRITE;
/*!40000 ALTER TABLE `arquivo` DISABLE KEYS */;
INSERT INTO `arquivo` VALUES (1,'2010398',2,'lista','/server/arquivos/2/2010398_lista.pdf'),(2,'2010398',2,'lista','/server/arquivos/2/2010398_lista.pdf'),(3,'2010398',1,'Lista','/server/arquivos/1/2010398_Lista.pdf');
/*!40000 ALTER TABLE `arquivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docente`
--

DROP TABLE IF EXISTS `docente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docente` (
  `siape` int(11) NOT NULL,
  `nomeCompleto` varchar(300) NOT NULL,
  `email` varchar(120) NOT NULL,
  `dataNascimento` date NOT NULL,
  `areaAtuacao` varchar(120) NOT NULL,
  `lotacao` varchar(200) NOT NULL,
  `cargo` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  PRIMARY KEY (`siape`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docente`
--

LOCK TABLES `docente` WRITE;
/*!40000 ALTER TABLE `docente` DISABLE KEYS */;
INSERT INTO `docente` VALUES (1044792,'EVERTON FERNANDO BARO','a@A','2018-05-17','ComputaÃ§Ã£o','CAMPUS AVANCADO GOIOERE','PROFESSOR ','81dc9bdb52d04dc20036dbd8313ed055'),(1810527,'EVERTON CORREIA LUZ','teste@teste','2018-05-12','biblioteca','CAMPUS AVANCADO BARRACAO','BIBLIOTECARIO-DOCUMENTALISTA','647b5190ab1d99af083285cd0efd6bf2'),(1810858,'ADEMIR STEFANO PIECHNICKI','a@a','1992-02-10','TI','CAMPUS TELÃŠMACO BORBA','PROFESSOR ','202cb962ac59075b964b07152d234b70'),(2010398,'JOSE MATEUS BIDO','k@aa','2018-05-18','Filosofia','CAMPUS AVANCADO GOIOERE','PROFESSOR ','202cb962ac59075b964b07152d234b70'),(2170330,'ANA CLAUDIA FERREIRA DE ASSIS','2278946','1999-11-11','aa','CAMPUS PARANAGUA','PEDAGOGO','202cb962ac59075b964b07152d234b70'),(2191867,'ALEX MONTEIRO DO NASCIMENTO','a@a','1999-02-02','T.I','REITORIA  ','ASSISTENTE EM ADMINISTRACAO','d9b1d7db4cd6e70935368a1efb10e377'),(2260069,'MARCELO ADRIANO COLAVITTO','j@h','2222-02-22','Arte','CAMPUS AVANCADO GOIOERE','PROFESSOR ','202cb962ac59075b964b07152d234b70'),(2278946,'GABRIEL AUGUSTO CACAO QUINATO','a@a','2018-05-25','Fisica','CAMPUS AVANCADO GOIOERE','PROFESSOR ','90e528618534d005b1a7e7b7a367813f'),(2316733,'LUIS HENRIQUE PUPO MARON','a@a','2018-05-15','TI','CAMPUS AVANCADO GOIOERE','PROFESSOR ','81dc9bdb52d04dc20036dbd8313ed055'),(2323116,'EVERALDO DE SOUZA','jedu.souza12@hotmail.com','2018-05-12','biblioteca','CAMPUS PALMAS','PROFESSOR ','4297f44b13955235245b2497399d7a93'),(2948597,'ADRIANE BASTOS POMPERMAYER','2278946','2018-09-06','aaa','CAMPUS CURITIBA','PROFESSOR SUBSTITUTO','d9b1d7db4cd6e70935368a1efb10e377'),(3006660,'ALINE TIECHER MARIN','2278946','1999-11-11','aa','CAMPUS PALMAS','ESTAGIÃRIO','d9b1d7db4cd6e70935368a1efb10e377');
/*!40000 ALTER TABLE `docente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma`
--

DROP TABLE IF EXISTS `turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ano` varchar(100) NOT NULL,
  `curso` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma`
--

LOCK TABLES `turma` WRITE;
/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
INSERT INTO `turma` VALUES (1,'4Âºano','T.i'),(2,'3Âºano','T.i'),(3,'2Âº Ano','Moda'),(4,' 1 Ano','modaaaa');
/*!40000 ALTER TABLE `turma` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-10  9:24:34
