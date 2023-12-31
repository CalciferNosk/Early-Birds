-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: file_sytem
-- ------------------------------------------------------
-- Server version	5.7.35-log

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
-- Table structure for table `tbl_newsfeed_comments`
--

DROP TABLE IF EXISTS `tbl_newsfeed_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_newsfeed_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `newsfeed_id` int(11) DEFAULT NULL,
  `parent_comment_id` int(11) DEFAULT NULL,
  `comment` longtext,
  `sub_comment` longtext,
  `CreatedDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` varchar(45) DEFAULT NULL,
  `UpdatedDate` datetime DEFAULT NULL,
  `UpdatedBy` varchar(45) DEFAULT NULL,
  `DeletedTag` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_newsfeed_comments`
--

LOCK TABLES `tbl_newsfeed_comments` WRITE;
/*!40000 ALTER TABLE `tbl_newsfeed_comments` DISABLE KEYS */;
INSERT INTO `tbl_newsfeed_comments` VALUES (1,2,NULL,'sample comment',NULL,NULL,'2310190106',NULL,NULL,0),(2,NULL,1,'oo nga','oo nga',NULL,'2310190107',NULL,NULL,0),(3,1,NULL,'sample to 1',NULL,'2023-10-19 18:25:06','2310190107',NULL,NULL,0),(4,NULL,1,'tama tama','tam tama','2023-10-20 08:33:47','2310190106',NULL,NULL,0),(5,3,NULL,'wow nice',NULL,'2023-10-20 13:04:39','2310190106',NULL,NULL,0),(6,NULL,5,'wow talaga','wow talaga','2023-10-20 13:05:24','2310190107',NULL,NULL,0),(7,NULL,5,'ayus diba','ayus diba','2023-10-20 13:05:24','2310190106',NULL,NULL,0),(8,NULL,5,'oo nga ahaha','oo nga ahaha','2023-10-20 13:05:24','2310190107',NULL,NULL,0),(9,3,NULL,'ganda dyan',NULL,'2023-10-20 13:06:17','2310190107',NULL,NULL,0),(10,NULL,9,'tara na','tara na','2023-10-20 13:08:41','2310190106',NULL,NULL,0),(11,1,NULL,'eto pala logo nyo',NULL,'2023-10-20 13:11:36','2310190106',NULL,NULL,0),(12,NULL,11,'oo eto nga','oo eto nga','2023-10-20 13:12:06','2310190106',NULL,NULL,0),(13,NULL,NULL,'wow nice',NULL,'2023-10-22 17:05:25','2310190106',NULL,NULL,0),(14,15,NULL,'wow nice',NULL,'2023-10-22 17:06:03','2310190106',NULL,NULL,0),(15,15,NULL,'wow nice',NULL,'2023-10-22 17:06:44','2310190106',NULL,NULL,0),(16,15,NULL,'wow nice',NULL,'2023-10-22 17:07:07','2310190106',NULL,NULL,0),(17,15,NULL,'wow nice',NULL,'2023-10-22 17:07:13','2310190106',NULL,NULL,0),(18,15,NULL,'nice po',NULL,'2023-10-22 17:09:21','2310190106',NULL,NULL,0),(19,15,NULL,'nice po',NULL,'2023-10-22 17:09:27','2310190106',NULL,NULL,0),(20,15,NULL,'nice po',NULL,'2023-10-22 17:09:33','2310190106',NULL,NULL,0),(21,15,NULL,'asdsad',NULL,'2023-10-22 17:10:36','2310190106',NULL,NULL,0),(22,15,NULL,'asdsad',NULL,'2023-10-22 17:14:09','2310190106',NULL,NULL,0),(23,15,NULL,'what?',NULL,'2023-10-22 17:14:32','2310190106',NULL,NULL,0),(24,15,NULL,'asdasdasd',NULL,'2023-10-22 17:19:00','2310190106',NULL,NULL,0),(25,15,NULL,'asdasdsad',NULL,'2023-10-22 17:23:31','2310190106',NULL,NULL,0),(26,15,NULL,'sampleasdasd',NULL,'2023-10-22 17:23:41','2310190106',NULL,NULL,0),(27,15,NULL,'heyyy',NULL,'2023-10-22 17:24:07','2310190106',NULL,NULL,0),(28,15,NULL,'asdsad',NULL,'2023-10-22 17:25:09','2310190106',NULL,NULL,0),(29,15,NULL,'asdasdasd',NULL,'2023-10-22 17:26:02','2310190106',NULL,NULL,0),(30,15,NULL,'asdasdsad',NULL,'2023-10-22 17:26:08','2310190106',NULL,NULL,0),(31,15,NULL,'asdasdsad',NULL,'2023-10-22 17:26:20','2310190106',NULL,NULL,0),(32,15,NULL,'hello',NULL,'2023-10-22 17:26:37','2310190106',NULL,NULL,0),(33,14,NULL,'peng peng',NULL,'2023-10-22 17:27:04','2310190106',NULL,NULL,0),(34,15,NULL,'asdsadsa',NULL,'2023-10-22 17:28:03','2310190106',NULL,NULL,0),(35,15,NULL,'sample comment',NULL,'2023-10-22 17:28:28','2310190106',NULL,NULL,0),(36,15,NULL,'asdasd',NULL,'2023-10-22 17:31:57','2310190106',NULL,NULL,0),(37,15,NULL,'sampel',NULL,'2023-10-22 17:32:04','2310190106',NULL,NULL,0),(38,15,NULL,'game',NULL,'2023-10-22 17:33:09','2310190106',NULL,NULL,0),(39,15,NULL,'game na nga\r\n',NULL,'2023-10-22 17:33:36','2310190106',NULL,NULL,0),(40,15,NULL,'asdasdsad',NULL,'2023-10-22 17:35:06','2310190106',NULL,NULL,0),(41,15,NULL,'asdasd',NULL,'2023-10-22 17:35:08','2310190106',NULL,NULL,0),(42,15,NULL,'asdasd',NULL,'2023-10-22 17:35:53','2310190106',NULL,NULL,0),(43,15,NULL,'asdasd',NULL,'2023-10-22 17:35:56','2310190106',NULL,NULL,0),(44,15,NULL,'asdasdsad',NULL,'2023-10-22 17:36:54','2310190106',NULL,NULL,0),(45,15,NULL,'asdasd',NULL,'2023-10-22 17:36:57','2310190106',NULL,NULL,0),(46,15,NULL,'gags',NULL,'2023-10-22 17:37:04','2310190106',NULL,NULL,0),(47,NULL,NULL,'undefined',NULL,'2023-10-22 18:33:22','2310190106',NULL,NULL,0),(48,NULL,NULL,'undefined',NULL,'2023-10-22 18:33:27','2310190106',NULL,NULL,0),(49,NULL,NULL,'undefined',NULL,'2023-10-22 18:33:27','2310190106',NULL,NULL,0),(50,NULL,NULL,'undefined',NULL,'2023-10-22 18:33:27','2310190106',NULL,NULL,0),(51,NULL,NULL,'undefined',NULL,'2023-10-22 18:34:31','2310190106',NULL,NULL,0),(52,19,NULL,'asdsad',NULL,'2023-10-22 18:36:18','2310190106',NULL,NULL,0),(53,NULL,52,'hello',NULL,'2023-10-22 18:36:42','2310190106',NULL,NULL,0),(54,NULL,52,'hello',NULL,'2023-10-22 18:36:49','2310190106',NULL,NULL,0),(55,NULL,52,'hi po',NULL,'2023-10-22 18:37:31','2310190106',NULL,NULL,0),(56,NULL,52,'hello',NULL,'2023-10-22 18:37:50','2310190106',NULL,NULL,0),(57,NULL,52,'loko ka',NULL,'2023-10-22 18:38:18','2310190106',NULL,NULL,0),(58,NULL,52,'ayos',NULL,'2023-10-22 18:38:59','2310190106',NULL,NULL,0),(59,13,NULL,'jamin wanted',NULL,'2023-10-22 18:39:49','2310190106',NULL,NULL,0),(60,NULL,52,'hello',NULL,'2023-10-22 18:43:57','2310190106',NULL,NULL,0),(61,NULL,52,'ako po yun',NULL,'2023-10-22 18:47:04','2310190107',NULL,NULL,0),(62,NULL,52,'opo',NULL,'2023-10-22 18:47:11','2310190107',NULL,NULL,0),(63,17,NULL,'yes po?',NULL,'2023-10-22 18:51:08','2310190107',NULL,NULL,0),(64,20,NULL,'wow peng peng',NULL,'2023-10-22 18:57:49','2310190107',NULL,NULL,0),(65,18,NULL,'yow',NULL,'2023-10-23 08:45:41','2310190107',NULL,NULL,0),(66,20,NULL,'asdasdasd',NULL,'2023-10-23 09:05:06','2310190107',NULL,NULL,0),(67,20,NULL,'as',NULL,'2023-10-23 09:09:03','2310190107',NULL,NULL,0),(68,20,NULL,'asdasd',NULL,'2023-10-23 09:09:45','2310190107',NULL,NULL,0),(69,20,NULL,'sample',NULL,'2023-10-23 09:11:23','2310190107',NULL,NULL,0),(70,20,NULL,'sdasdasd',NULL,'2023-10-23 09:11:48','2310190107',NULL,NULL,0),(71,20,NULL,'asdasd',NULL,'2023-10-23 09:12:17','2310190107',NULL,NULL,0),(72,20,NULL,'asdasd',NULL,'2023-10-23 09:12:46','2310190107',NULL,NULL,0),(73,20,NULL,'sas',NULL,'2023-10-23 09:13:01','2310190107',NULL,NULL,0),(74,16,NULL,'hunter',NULL,'2023-10-23 09:13:30','2310190107',NULL,NULL,0),(75,17,NULL,'asdasdsa',NULL,'2023-10-23 09:15:58','2310190107',NULL,NULL,0),(76,26,NULL,'zxcxc',NULL,'2023-10-23 13:47:18','2310190107',NULL,NULL,0),(77,26,NULL,'asdsadsad',NULL,'2023-10-23 17:24:19','2310190107',NULL,NULL,0),(78,26,NULL,'asdasdsad',NULL,'2023-10-23 17:24:22','2310190107',NULL,NULL,0),(79,27,NULL,'asdasdas',NULL,'2023-10-23 17:26:28','2310190107',NULL,NULL,0);
/*!40000 ALTER TABLE `tbl_newsfeed_comments` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-26  9:43:53
