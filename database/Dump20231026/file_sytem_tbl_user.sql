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
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `GeneratedId` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` longtext,
  `email` varchar(90) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `UpdatedDate` varchar(45) DEFAULT 'SYSTEM',
  `CreatedBy` varchar(45) DEFAULT NULL,
  `UpdatedBy` varchar(45) DEFAULT NULL,
  `DeletedTag` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'2310190106','eadriano','$2y$10$sfhginW0dAoVsNZ915SAb.4Ftkze4yk0rTFNYQIIP9pa4LewgYwpm',NULL,2,'2023-10-19 09:20:05','SYSTEM',NULL,NULL,0),(2,'20230001','lnhs_@dmin','$2y$10$sfhginW0dAoVsNZ915SAb.4Ftkze4yk0rTFNYQIIP9pa4LewgYwpm',NULL,0,'2023-10-19 09:23:14','SYSTEM',NULL,NULL,0),(3,'2310190107','aadriano','$2y$10$sfhginW0dAoVsNZ915SAb.4Ftkze4yk0rTFNYQIIP9pa4LewgYwpm',NULL,2,'2023-10-19 10:41:10','SYSTEM',NULL,NULL,0),(4,'2310190108','asample','$2y$10$sfhginW0dAoVsNZ915SAb.4Ftkze4yk0rTFNYQIIP9pa4LewgYwpm',NULL,2,'2023-10-23 17:51:58','SYSTEM',NULL,NULL,0),(7,'231024726','rlansang','$2y$10$BrYTAtunDga4LKSlIF/qYubVaroF0ynS3Ut7Ny5fkU3MZiWBWcbkq','roy.lansang@gmail.com',2,'2023-10-24 13:36:26','SYSTEM',NULL,NULL,0),(8,'231024725','mgezun','$2y$10$ZdYi9csyGku8CpKHpmlJZeOwW0v8QnJCeDUS17FcNxqpomSGiwHvy','mon@gmail.com',2,'2023-10-24 13:46:25','SYSTEM',NULL,NULL,0),(9,'231024741','mgezun','$2y$10$b/DjcoDW9numGkVzuNqfDeW91mgZqvZ2.kN2fnau5olBNmPt7z2qi','mon@gmail.com',2,'2023-10-24 13:46:41','SYSTEM',NULL,NULL,0),(10,'231024751','mgezun','$2y$10$KTQYEkX9f1zk7glU4HjeiumPTveQYqZ1LH3RjMuSeiYsudAvBhzXa','mon@gmail.com',2,'2023-10-24 13:47:51','SYSTEM',NULL,NULL,0),(11,'231024728','mgezun','$2y$10$4v2PFjptcKQTIvbc3Hk2qOCspxCHuedG5D6nt99wDrnDykTSX4OVS','mon@gmail.com',2,'2023-10-24 13:48:28','SYSTEM',NULL,NULL,0),(12,'231024715','ssample','$2y$10$l8UwIl8r8CoBDitArRadHupuMWGadpFsJ.ZZtqjD/Y7Y25jACxPdS','rlansa@gmail.com',2,'2023-10-24 13:54:15','SYSTEM',NULL,NULL,0),(13,'231024854','aasd','$2y$10$IoHverHNPPZSuC8zJsMCc.7FzX0VQ7H7JNBKs8RrNenmFIoXEoISW','rlansang@gmasdsa.com',2,'2023-10-24 14:02:54','SYSTEM',NULL,NULL,0),(14,'231024811','eadriano','$2y$10$ftqVQw9ZjoAZBkF.uztIKO3HtFOY9y/R5vVIHrOHaB1xeB.noNpk.','rlansang@gmasdsa.com',2,'2023-10-24 14:04:11','SYSTEM',NULL,NULL,0),(15,'2310241110','padriano','$2y$10$00Jap4YVBVV5KAsa2YUuMOWHvit2DvPqKfXpKSqxbTx0h9CM5EQ5C','eadriano@gmail.com',2,'2023-10-24 17:21:10','SYSTEM',NULL,NULL,0),(16,'231025711','eadriano','$2y$10$.Tw9O6rhB6BrWcUBVkMDEeFMyolAn1fipppfVNMSqN9hKbT4YKPAa','ericksonadriano.h2software@gmail.com',2,'2023-10-25 13:48:12','SYSTEM',NULL,NULL,0),(17,'231025746','mgezun','$2y$10$jJ5ONgNTgvcsRcGCR9fUCueUWtX9Cf1VTATOSAGXrIGBDDE2rqAIS','moncarlogezun.h2software@gmail.com',2,'2023-10-25 13:49:46','SYSTEM',NULL,NULL,0),(18,'231025717','sader','$2y$10$eVmLgKDpP3OXx/aKchZRHu4cf5xJKvhwBBO9KlDmd4Qu5aToN6IJ6','eadriano.it@gmail.com',2,'2023-10-25 13:58:17','SYSTEM',NULL,NULL,0),(19,'231025837','sader','$2y$10$TXD/XUKXAZz9z1PvR/kwOuTx8Su9aMgJ1s2pJNTO6leOa80ramFTy','eadriano.it@gmail.com',2,'2023-10-25 14:18:37','SYSTEM',NULL,NULL,0),(20,'231025841','sader','$2y$10$YexTeKx8RK/A4PO69XQLEehZOqeziSPvBgB69wgef74FD/yhvIpye','eadriano.it@gmail.com',2,'2023-10-25 14:19:41','SYSTEM',NULL,NULL,0),(21,'231025842','saderss','$2y$10$Rn1/xras9Qkx2SEDvFhAGuhfN9KJlvcdb7zyaxLtPkCxdOhA3we4m','eadriano.it@gmail.com',2,'2023-10-25 14:20:42','SYSTEM',NULL,NULL,0),(22,'231025833','sadasd','$2y$10$pQb8dM5DE5SSH6nrLaHpBeapKWSIWuoCaeL3PMUJKa3jTYR6seOzC','ericksonadriano.h2software@gmail.com',2,'2023-10-25 14:22:33','SYSTEM',NULL,NULL,0),(23,'231025857','easdsad','$2y$10$b99bnHwBEQQwCqNmfOJdDu3ZdYb1B6mHionu2QZ6jbgwohstrTb4.','ericksonadriano.h2software@gmail.com',2,'2023-10-25 14:23:57','SYSTEM',NULL,NULL,0);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
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
