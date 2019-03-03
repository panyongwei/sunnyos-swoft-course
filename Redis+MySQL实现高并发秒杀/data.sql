-- MySQL dump 10.13  Distrib 5.7.21, for osx10.9 (x86_64)
--
-- Host: localhost    Database: sunny
-- ------------------------------------------------------
-- Server version	5.7.21

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
-- Table structure for table `sunny_article`
--

DROP TABLE IF EXISTS `sunny_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sunny_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '标题',
  `desc` varchar(255) NOT NULL COMMENT '描述',
  `content` varchar(45) NOT NULL,
  `create_time` int(10) unsigned NOT NULL COMMENT '发布时间',
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='文章';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sunny_article`
--

LOCK TABLES `sunny_article` WRITE;
/*!40000 ALTER TABLE `sunny_article` DISABLE KEYS */;
/*!40000 ALTER TABLE `sunny_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sunny_good`
--

DROP TABLE IF EXISTS `sunny_good`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sunny_good` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stock` int(10) NOT NULL COMMENT '库存',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='产品';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sunny_good`
--

LOCK TABLES `sunny_good` WRITE;
/*!40000 ALTER TABLE `sunny_good` DISABLE KEYS */;
INSERT INTO `sunny_good` VALUES (1,0);
/*!40000 ALTER TABLE `sunny_good` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sunny_order`
--

DROP TABLE IF EXISTS `sunny_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sunny_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `good` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COMMENT='订单';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sunny_order`
--

LOCK TABLES `sunny_order` WRITE;
/*!40000 ALTER TABLE `sunny_order` DISABLE KEYS */;
INSERT INTO `sunny_order` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1);
/*!40000 ALTER TABLE `sunny_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sunny_user`
--

DROP TABLE IF EXISTS `sunny_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sunny_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mobile` char(11) NOT NULL COMMENT '手机号码',
  `passwd` char(32) NOT NULL,
  `create_time` int(11) NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='用户';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sunny_user`
--

LOCK TABLES `sunny_user` WRITE;
/*!40000 ALTER TABLE `sunny_user` DISABLE KEYS */;
INSERT INTO `sunny_user` VALUES (1,'13013013021','admin',1551282047);
/*!40000 ALTER TABLE `sunny_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sunny_user_info`
--

DROP TABLE IF EXISTS `sunny_user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sunny_user_info` (
  `user` int(10) unsigned NOT NULL COMMENT '用户id',
  `avatar` varchar(255) DEFAULT NULL,
  `age` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户信息';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sunny_user_info`
--

LOCK TABLES `sunny_user_info` WRITE;
/*!40000 ALTER TABLE `sunny_user_info` DISABLE KEYS */;
INSERT INTO `sunny_user_info` VALUES (1,NULL,NULL);
/*!40000 ALTER TABLE `sunny_user_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-03 15:25:42
