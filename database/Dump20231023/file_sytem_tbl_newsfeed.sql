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
-- Table structure for table `tbl_newsfeed`
--

DROP TABLE IF EXISTS `tbl_newsfeed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_newsfeed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Label` longtext,
  `tag_id` int(11) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` varchar(45) DEFAULT NULL,
  `UpdatedDate` datetime DEFAULT NULL,
  `UpdatedBy` varchar(45) DEFAULT NULL,
  `DeletedTag` tinyint(1) DEFAULT '0',
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_newsfeed`
--

LOCK TABLES `tbl_newsfeed` WRITE;
/*!40000 ALTER TABLE `tbl_newsfeed` DISABLE KEYS */;
INSERT INTO `tbl_newsfeed` VALUES (1,'This is sample post',NULL,NULL,'2310190106',NULL,NULL,0,'sample.png'),(2,'second post sample',NULL,'2023-10-19 15:38:59','2310190106',NULL,NULL,0,NULL),(3,'‘Inang Taylor in Tagaytay’: Pinoys speculate over Taylor Swift’s new pic',NULL,'2023-10-20 13:02:12','2310190107',NULL,NULL,0,'taylorpic.jpg'),(13,'<p><b>wanted :&nbsp; </b><span style=\"background-color: rgb(255, 255, 0);\">Jamin</span></p>',NULL,'2023-10-20 18:25:26','2310190106',NULL,NULL,0,'2310190106_b98b1b166deb8f745e83.jpg'),(14,'<p>peng</p>',NULL,'2023-10-22 14:49:05','2310190106',NULL,NULL,0,'2310190106_f6c068734e5669e77e89.jpg'),(15,'<p>sample</p>',NULL,'2023-10-22 14:50:46','2310190106',NULL,NULL,0,'2310190106_d1fe26082624226095ca.jpg'),(16,'<p>sapmple post</p>',NULL,'2023-10-22 17:39:11','2310190106',NULL,NULL,0,'2310190106_e8171ab4eac491a06b82.jpg'),(17,'<p>sapmple post</p>',NULL,'2023-10-22 17:39:26','2310190106',NULL,NULL,0,'2310190106_d2f0b5333775d69ab7f8.jpg'),(18,'<p>sample data</p>',NULL,'2023-10-22 17:41:49','2310190106',NULL,NULL,0,'2310190106_fb809993af1d4ccde0f8.jpg'),(19,'<p>sample data</p>',NULL,'2023-10-22 17:41:49','2310190106',NULL,NULL,0,'2310190106_4faed4f7359f5282e5f5.jpg'),(20,'<p>sample post anything</p>',NULL,'2023-10-22 18:57:31','2310190107',NULL,NULL,0,'2310190107_96a82380e4e09645a7ac.jpg');
/*!40000 ALTER TABLE `tbl_newsfeed` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-23  8:56:31
