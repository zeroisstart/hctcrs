-- MySQL dump 10.13  Distrib 5.1.41, for Win32 (ia32)
--
-- Host: localhost    Database: codebase
-- ------------------------------------------------------
-- Server version	5.1.41-log

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
-- Table structure for table `case_name`
--

DROP TABLE IF EXISTS `case_name`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `case_name` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL COMMENT '名称',
  `Effect` varchar(255) DEFAULT NULL COMMENT '作用',
  `Description` tinytext,
  `Allusion` tinytext COMMENT '典故',
  `Use` enum('1','0') NOT NULL DEFAULT '0' COMMENT '是否使用',
  `Dateline` int(10) NOT NULL COMMENT '添加的时间',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `case_name`
--

LOCK TABLES `case_name` WRITE;
/*!40000 ALTER TABLE `case_name` DISABLE KEYS */;
INSERT INTO `case_name` VALUES (6,'Athos','智慧','阿多斯','三个火枪手','1',1343032907),(7,'Porthos','建筑,善于观察 ','波多斯','三个火枪手','0',1343032942),(8,'Louis','','路易斯','三个火枪手','0',1343032967),(9,'Aramis','力大','阿拉米斯','三个火枪手','0',1343032987),(10,'Anne','女,睿智','安娜','三个火枪手','1',1343033020),(11,'Penelope','女,美丽','佩内洛普','希腊神话','0',1343198431);
/*!40000 ALTER TABLE `case_name` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soft_resource`
--

DROP TABLE IF EXISTS `soft_resource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soft_resource` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) NOT NULL,
  `Size` int(10) NOT NULL,
  `Version` varchar(100) NOT NULL,
  `Type_ID` int(10) NOT NULL,
  `PATH_CG` varchar(255) DEFAULT NULL,
  `Dateline` int(10) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Type_ID` (`Type_ID`) USING BTREE,
  KEY `Version` (`Version`) USING BTREE,
  KEY `Name` (`Name`) USING BTREE,
  CONSTRAINT `soft_resource_ibfk_1` FOREIGN KEY (`Type_ID`) REFERENCES `soft_type` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soft_resource`
--

LOCK TABLES `soft_resource` WRITE;
/*!40000 ALTER TABLE `soft_resource` DISABLE KEYS */;
/*!40000 ALTER TABLE `soft_resource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soft_type`
--

DROP TABLE IF EXISTS `soft_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soft_type` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soft_type`
--

LOCK TABLES `soft_type` WRITE;
/*!40000 ALTER TABLE `soft_type` DISABLE KEYS */;
INSERT INTO `soft_type` VALUES (1,'JQuery'),(2,'png'),(3,'jpeg'),(4,'exe'),(5,'效率');
/*!40000 ALTER TABLE `soft_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmp_resource`
--

DROP TABLE IF EXISTS `tmp_resource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp_resource` (
  `size` int(10),
  `version` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_resource`
--

LOCK TABLES `tmp_resource` WRITE;
/*!40000 ALTER TABLE `tmp_resource` DISABLE KEYS */;
INSERT INTO `tmp_resource` VALUES (370682,'1','jquery-ui.js.1'),(369961,'10','jquery-ui.js.10'),(369207,'11','jquery-ui.js.11'),(367486,'12','jquery-ui.js.12'),(366932,'13','jquery-ui.js.13'),(366617,'14','jquery-ui.js.14'),(366049,'15','jquery-ui.js.15'),(363275,'16','jquery-ui.js.16'),(361184,'17','jquery-ui.js.17'),(358510,'18','jquery-ui.js.18'),(357660,'19','jquery-ui.js.19'),(370246,'2','jquery-ui.js.2'),(352216,'20','jquery-ui.js.20'),(350962,'21','jquery-ui.js.21'),(348719,'22','jquery-ui.js.22'),(314868,'23','jquery-ui.js.23'),(305667,'24','jquery-ui.js.24'),(304251,'25','jquery-ui.js.25'),(303673,'26','jquery-ui.js.26'),(370165,'3','jquery-ui.js.3'),(377848,'4','jquery-ui.js.4'),(378461,'5','jquery-ui.js.5'),(376306,'6','jquery-ui.js.6'),(375530,'7','jquery-ui.js.7'),(374920,'8','jquery-ui.js.8'),(370776,'9','jquery-ui.js.9'),(214829,'1.0','jquery.mobile-1.0.js'),(81903,'1.0.min','jquery.mobile-1.0.min.js'),(85799,'1.0a1','jquery.mobile-1.0a1.js'),(38081,'1.0a1.min','jquery.mobile-1.0a1.min.js'),(104857,'1.0a2','jquery.mobile-1.0a2.js'),(44653,'1.0a2.min','jquery.mobile-1.0a2.min.js'),(132805,'1.0a3','jquery.mobile-1.0a3.js'),(55734,'1.0a3.min','jquery.mobile-1.0a3.min.js'),(153413,'1.0a4.1','jquery.mobile-1.0a4.1.js'),(61501,'1.0a4.1.min','jquery.mobile-1.0a4.1.min.js'),(153686,'1.0a4','jquery.mobile-1.0a4.js'),(61323,'1.0a4.min','jquery.mobile-1.0a4.min.js'),(175322,'1.0b1','jquery.mobile-1.0b1.js'),(66639,'1.0b1.min','jquery.mobile-1.0b1.min.js'),(188112,'1.0b2','jquery.mobile-1.0b2.js'),(71869,'1.0b2.min','jquery.mobile-1.0b2.min.js'),(201732,'1.0b3','jquery.mobile-1.0b3.js'),(77056,'1.0b3.min','jquery.mobile-1.0b3.min.js'),(207687,'1.0rc1','jquery.mobile-1.0rc1.js'),(78678,'1.0rc1.min','jquery.mobile-1.0rc1.min.js'),(210118,'1.0rc2','jquery.mobile-1.0rc2.js'),(79810,'1.0rc2.min','jquery.mobile-1.0rc2.min.js'),(238388,'1.1.0','jquery.mobile-1.1.0.js'),(238388,'1.1.0','jquery.mobile-1.1.0.js'),(90946,'1.1.0.min','jquery.mobile-1.1.0.min.js'),(90946,'1.1.0.min','jquery.mobile-1.1.0.min.js'),(9425416,'1.0.1.pack','jquery-1.0.1.pack.js'),(49341,'1.0.2','jquery-1.0.2.js'),(18694,'1.0.2.pack','jquery-1.0.2.pack.js'),(51116,'1.0.3','jquery-1.0.3.js'),(19019,'1.0.3.pack','jquery-1.0.3.pack.js'),(53541,'1.0.4','jquery-1.0.4.js'),(19285,'1.0.4.pack','jquery-1.0.4.pack.js'),(45370,'1.0','jquery-1.0.js'),(17171,'1.0.pack','jquery-1.0.pack.js'),(57737,'1.1.1','jquery-1.1.1.js'),(20720,'1.1.1.pack','jquery-1.1.1.pack.js'),(59291,'1.1.2','jquery-1.1.2.js'),(21235,'1.1.2.pack','jquery-1.1.2.pack.js'),(62885,'1.1.3.1','jquery-1.1.3.1.js'),(36177,'1.1.3.1.min','jquery-1.1.3.1.min.js'),(21557,'1.1.3.1.pack','jquery-1.1.3.1.pack.js'),(62726,'1.1.3','jquery-1.1.3.js'),(21472,'1.1.3.pack','jquery-1.1.3.pack.js'),(156364,'1.1.3a','jquery-1.1.3a.js'),(67241,'1.1.4','jquery-1.1.4.js'),(22679,'1.1.4.pack','jquery-1.1.4.pack.js'),(56993,'1.1','jquery-1.1.js'),(20525,'1.1.pack','jquery-1.1.pack.js'),(20525,'1.1.pack','jquery-1.1.pack.js'),(56444,'1.1a','jquery-1.1a.js'),(20334,'1.1a.pack','jquery-1.1a.pack.js'),(57011,'1.1b','jquery-1.1b.js'),(20485,'1.1b.pack','jquery-1.1b.pack.js'),(80469,'1.2.1','jquery-1.2.1.js'),(46437,'1.2.1.min','jquery-1.2.1.min.js'),(27147,'1.2.1.pack','jquery-1.2.1.pack.js'),(95285,'1.2.2','jquery-1.2.2.js'),(52656,'1.2.2.min','jquery-1.2.2.min.js'),(29318,'1.2.2.pack','jquery-1.2.2.pack.js'),(92114,'1.2.2b','jquery-1.2.2b.js'),(50738,'1.2.2b.min','jquery-1.2.2b.min.js'),(28376,'1.2.2b.pack','jquery-1.2.2b.pack.js'),(94442,'1.2.2b2','jquery-1.2.2b2.js'),(52091,'1.2.2b2.min','jquery-1.2.2b2.min.js'),(29018,'1.2.2b2.pack','jquery-1.2.2b2.pack.js'),(96763,'1.2.3','jquery-1.2.3.js'),(54075,'1.2.3.min','jquery-1.2.3.min.js'),(29846,'1.2.3.pack','jquery-1.2.3.pack.js'),(95868,'1.2.3a','jquery-1.2.3a.js'),(52658,'1.2.3a.min','jquery-1.2.3a.min.js'),(29456,'1.2.3a.pack','jquery-1.2.3a.pack.js'),(96688,'1.2.3b','jquery-1.2.3b.js'),(54006,'1.2.3b.min','jquery-1.2.3b.min.js'),(29777,'1.2.3b.pack','jquery-1.2.3b.pack.js'),(97623,'1.2.4','jquery-1.2.4.js'),(54620,'1.2.4.min','jquery-1.2.4.min.js'),(30139,'1.2.4.pack','jquery-1.2.4.pack.js'),(97625,'1.2.4a','jquery-1.2.4a.js'),(54622,'1.2.4a.min','jquery-1.2.4a.min.js'),(30142,'1.2.4a.pack','jquery-1.2.4a.pack.js'),(97625,'1.2.4b','jquery-1.2.4b.js'),(54622,'1.2.4b.min','jquery-1.2.4b.min.js'),(30142,'1.2.4b.pack','jquery-1.2.4b.pack.js'),(99997,'1.2.5','jquery-1.2.5.js'),(55715,'1.2.5.min','jquery-1.2.5.min.js'),(30967,'1.2.5.pack','jquery-1.2.5.pack.js'),(100196,'1.2.6','jquery-1.2.6.js'),(55774,'1.2.6.min','jquery-1.2.6.min.js'),(31033,'1.2.6.pack','jquery-1.2.6.pack.js'),(175614,'1.2.6-vsdoc','jquery-1.2.6-vsdoc.js'),(79259,'1.2','jquery-1.2.js'),(45707,'1.2.min','jquery-1.2.min.js'),(26871,'1.2.pack','jquery-1.2.pack.js'),(117446,'1.3.1','jquery-1.3.1.js'),(55272,'1.3.1.min','jquery-1.3.1.min.js'),(55272,'1.3.1.pack','jquery-1.3.1.pack.js'),(117452,'1.3.1rc1','jquery-1.3.1rc1.js'),(55278,'1.3.1rc1.min','jquery-1.3.1rc1.min.js'),(55278,'1.3.1rc1.pack','jquery-1.3.1rc1.pack.js'),(120763,'1.3.2','jquery-1.3.2.js'),(57254,'1.3.2.min','jquery-1.3.2.min.js'),(57254,'1.3.2.pack','jquery-1.3.2.pack.js'),(116942,'1.3','jquery-1.3.js'),(55026,'1.3.min','jquery-1.3.min.js'),(55026,'1.3.pack','jquery-1.3.pack.js'),(112107,'1.3b1','jquery-1.3b1.js'),(67534,'1.3b1.min','jquery-1.3b1.min.js'),(36491,'1.3b1.pack','jquery-1.3b1.pack.js'),(113924,'1.3b2','jquery-1.3b2.js'),(53179,'1.3b2.min','jquery-1.3b2.min.js'),(37114,'1.3b2.pack','jquery-1.3b2.pack.js'),(116211,'1.3rc1','jquery-1.3rc1.js'),(54585,'1.3rc1.min','jquery-1.3rc1.min.js'),(37802,'1.3rc1.pack','jquery-1.3rc1.pack.js'),(116439,'1.3rc2','jquery-1.3rc2.js'),(54744,'1.3rc2.min','jquery-1.3rc2.min.js'),(37883,'1.3rc2.pack','jquery-1.3rc2.pack.js'),(160712,'1.4.1','jquery-1.4.1.js'),(70843,'1.4.1.min','jquery-1.4.1.min.js'),(234929,'1.4.1-vsdoc','jquery-1.4.1-vsdoc.js'),(163855,'1.4.2','jquery-1.4.2.js'),(72174,'1.4.2.min','jquery-1.4.2.min.js'),(180459,'1.4.3','jquery-1.4.3.js'),(77746,'1.4.3.min','jquery-1.4.3.min.js'),(179838,'1.4.3rc1','jquery-1.4.3rc1.js'),(77601,'1.4.3rc1.min','jquery-1.4.3rc1.min.js'),(179982,'1.4.3rc2','jquery-1.4.3rc2.js'),(77566,'1.4.3rc2.min','jquery-1.4.3rc2.min.js'),(183184,'1.4.4','jquery-1.4.4.js'),(78601,'1.4.4.min','jquery-1.4.4.min.js'),(182013,'1.4.4rc1','jquery-1.4.4rc1.js'),(78441,'1.4.4rc1.min','jquery-1.4.4rc1.min.js'),(182200,'1.4.4rc2','jquery-1.4.4rc2.js'),(78483,'1.4.4rc2.min','jquery-1.4.4rc2.min.js'),(183190,'1.4.4rc3','jquery-1.4.4rc3.js'),(78607,'1.4.4rc3.min','jquery-1.4.4rc3.min.js'),(158407,'1.4','jquery-1.4.js'),(69838,'1.4.min','jquery-1.4.min.js'),(148263,'1.4a1','jquery-1.4a1.js'),(89994,'1.4a1.min','jquery-1.4a1.min.js'),(152669,'1.4a2','jquery-1.4a2.js'),(92583,'1.4a2.min','jquery-1.4a2.min.js'),(158024,'1.4rc1','jquery-1.4rc1.js'),(69793,'1.4rc1.min','jquery-1.4rc1.min.js'),(216840,'1.5.1','jquery-1.5.1.js'),(85260,'1.5.1.min','jquery-1.5.1.min.js'),(216198,'1.5.1rc1','jquery-1.5.1rc1.js'),(85039,'1.5.1rc1.min','jquery-1.5.1rc1.min.js'),(219227,'1.5.2','jquery-1.5.2.js'),(85925,'1.5.2.min','jquery-1.5.2.min.js'),(219092,'1.5.2rc1','jquery-1.5.2rc1.js'),(85944,'1.5.2rc1.min','jquery-1.5.2rc1.min.js'),(211978,'1.5','jquery-1.5.js'),(84362,'1.5.min','jquery-1.5.min.js'),(204398,'1.5b1','jquery-1.5b1.js'),(83954,'1.5b1.min','jquery-1.5b1.min.js'),(211183,'1.5rc1','jquery-1.5rc1.js'),(84337,'1.5rc1.min','jquery-1.5rc1.min.js'),(234995,'1.6.1','jquery-1.6.1.js'),(91342,'1.6.1.min','jquery-1.6.1.min.js'),(236202,'1.6.2','jquery-1.6.2.js'),(91556,'1.6.2.min','jquery-1.6.2.min.js'),(238009,'1.6.3','jquery-1.6.3.js'),(91626,'1.6.3.min','jquery-1.6.3.min.js'),(238159,'1.6.4','jquery-1.6.4.js'),(91669,'1.6.4.min','jquery-1.6.4.min.js'),(232651,'1.6','jquery-1.6.js'),(90518,'1.6.min','jquery-1.6.min.js'),(232016,'1.6b1','jquery-1.6b1.js'),(90637,'1.6b1.min','jquery-1.6b1.min.js'),(232343,'1.6rc1','jquery-1.6rc1.js'),(90041,'1.6rc1.min','jquery-1.6rc1.min.js'),(248235,'1.7.1','jquery-1.7.1.js'),(93868,'1.7.1.min','jquery-1.7.1.min.js'),(252881,'1.7.2','jquery-1.7.2.js'),(94840,'1.7.2.min','jquery-1.7.2.min.js'),(249159,'1.7','jquery-1.7.js'),(94020,'1.7.min','jquery-1.7.min.js');
/*!40000 ALTER TABLE `tmp_resource` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-08-01 17:34:50
