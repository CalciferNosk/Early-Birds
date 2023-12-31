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
-- Table structure for table `tbl_user_student`
--

DROP TABLE IF EXISTS `tbl_user_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_user_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserGeneratedId` varchar(45) DEFAULT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `mname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `age` varchar(45) DEFAULT NULL,
  `grade` varchar(45) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` varchar(45) DEFAULT NULL,
  `UpdatedDate` datetime DEFAULT NULL,
  `UpdatedBy` varchar(45) DEFAULT NULL,
  `DeletedTag` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_student`
--

LOCK TABLES `tbl_user_student` WRITE;
/*!40000 ALTER TABLE `tbl_user_student` DISABLE KEYS */;
INSERT INTO `tbl_user_student` VALUES (1,'2310190106','Erickson','del rosario','Adriano',NULL,'29','4','2023-10-19 13:09:29',NULL,NULL,NULL,0),(2,'2310190107','Pedro','_','Penduco',NULL,'23','5','2023-10-19 18:20:05',NULL,NULL,NULL,0),(3,'2310190108','sample',NULL,'sam',NULL,'23','5','2023-10-23 17:52:42',NULL,NULL,NULL,0),(4,'231024726','roy','a','lansang',NULL,NULL,NULL,'2023-10-24 13:36:26',NULL,NULL,NULL,0),(5,'231024725','mon','b','gezun',NULL,NULL,NULL,'2023-10-24 13:46:25',NULL,NULL,NULL,0),(6,'231024741','mon','b','gezun',NULL,NULL,NULL,'2023-10-24 13:46:41',NULL,NULL,NULL,0),(7,'231024751','mon','b','gezun',NULL,NULL,NULL,'2023-10-24 13:47:51',NULL,NULL,NULL,0),(8,'231024728','mon','b','gezun',NULL,NULL,NULL,'2023-10-24 13:48:28',NULL,NULL,NULL,0),(9,'231024715','sample','s','sample',NULL,NULL,NULL,'2023-10-24 13:54:15',NULL,NULL,NULL,0),(10,'231024854','asd','asd','asd',NULL,NULL,NULL,'2023-10-24 14:02:54',NULL,NULL,NULL,0),(11,'231024811','erickson1','a','Adriano',NULL,NULL,NULL,'2023-10-24 14:04:11',NULL,NULL,NULL,0),(12,'2310241110','peng','','Adriano',NULL,NULL,NULL,'2023-10-24 17:21:10',NULL,NULL,NULL,0),(13,'231025711','erickson2','','Adriano',NULL,NULL,NULL,'2023-10-25 13:48:12',NULL,NULL,NULL,0),(14,'231025746','mon carlo','','gezun',NULL,NULL,NULL,'2023-10-25 13:49:46',NULL,NULL,NULL,0),(15,'231025717','son','','ader',NULL,NULL,NULL,'2023-10-25 13:58:17',NULL,NULL,NULL,0),(16,'231025837','sonss','','ader',NULL,NULL,NULL,'2023-10-25 14:18:37',NULL,NULL,NULL,0),(17,'231025841','sonssss','','ader',NULL,NULL,NULL,'2023-10-25 14:19:41',NULL,NULL,NULL,0),(18,'231025842','sonssss','','aderss',NULL,NULL,NULL,'2023-10-25 14:20:42',NULL,NULL,NULL,0),(19,'231025833','saasdds','','adasd',NULL,NULL,NULL,'2023-10-25 14:22:33',NULL,NULL,NULL,0),(20,'231025857','ericksosss','','asdsad',NULL,NULL,NULL,'2023-10-25 14:23:57',NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `tbl_user_student` ENABLE KEYS */;
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
