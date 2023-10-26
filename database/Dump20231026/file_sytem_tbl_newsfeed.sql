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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_newsfeed`
--

LOCK TABLES `tbl_newsfeed` WRITE;
/*!40000 ALTER TABLE `tbl_newsfeed` DISABLE KEYS */;
INSERT INTO `tbl_newsfeed` VALUES (1,'This is sample post',NULL,'2023-10-19 15:38:59','2310190106',NULL,NULL,0,'sample.png'),(2,'second post sample',NULL,'2023-10-19 15:38:59','2310190106',NULL,NULL,0,NULL),(3,'‘Inang Taylor in Tagaytay’: Pinoys speculate over Taylor Swift’s new pic',NULL,'2023-10-20 13:02:12','2310190107',NULL,NULL,0,'taylorpic.jpg'),(13,'<p><b>wanted :&nbsp; </b><span style=\"background-color: rgb(255, 255, 0);\">Jamin</span></p>',NULL,'2023-10-20 18:25:26','2310190106',NULL,NULL,0,'2310190106_b98b1b166deb8f745e83.jpg'),(14,'<p>peng</p>',NULL,'2023-10-22 14:49:05','2310190106',NULL,NULL,0,'2310190106_f6c068734e5669e77e89.jpg'),(15,'<p>sample</p>',NULL,'2023-10-22 14:50:46','2310190106',NULL,NULL,0,'2310190106_d1fe26082624226095ca.jpg'),(16,'<p>sapmple post</p>',NULL,'2023-10-22 17:39:11','2310190106',NULL,NULL,0,'2310190106_e8171ab4eac491a06b82.jpg'),(17,'<p>sapmple post</p>',NULL,'2023-10-22 17:39:26','2310190106',NULL,NULL,0,'2310190106_d2f0b5333775d69ab7f8.jpg'),(18,'<p>sample data</p>',NULL,'2023-10-22 17:41:49','2310190106',NULL,NULL,0,'2310190106_fb809993af1d4ccde0f8.jpg'),(19,'<p>sample data</p>',NULL,'2023-10-22 17:41:49','2310190106',NULL,NULL,0,'2310190106_4faed4f7359f5282e5f5.jpg'),(20,'<p>sample post anything</p>',NULL,'2023-10-22 18:57:31','2310190107',NULL,NULL,0,'2310190107_96a82380e4e09645a7ac.jpg'),(21,'<p>template</p>',NULL,'2023-10-23 09:16:25','2310190107',NULL,NULL,0,'2310190107_47e9fbef792c55856ce3.jpg'),(22,'<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>asdasdasda</td><td>asdasdsadadasdasd</td></tr><tr><td>adasd</td><td>sadsa</td></tr><tr><td>dadsa</td><td>sdsa</td></tr><tr><td>adasdsad</td><td><br></td></tr></tbody></table><p><br></p>',NULL,'2023-10-23 09:19:31','2310190107',NULL,NULL,0,NULL),(23,'<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>asdasdasda</td><td>asdasdsadadasdasd</td></tr><tr><td>adasd</td><td>sadsa</td></tr><tr><td>dadsa</td><td>sdsa</td></tr><tr><td>adasdsad</td><td><br></td></tr></tbody></table><p><br></p>',NULL,'2023-10-23 09:19:46','2310190107',NULL,NULL,0,NULL),(24,'<ul><li>dsad</li><li>asd</li><li>sad</li><li>asd</li><li>sa</li></ul>',NULL,'2023-10-23 09:20:09','2310190107',NULL,NULL,0,NULL),(25,'<ul><li>dsad</li><li>asd</li><li>sad</li><li>asd</li><li>sa</li></ul>',NULL,'2023-10-23 09:20:19','2310190107',NULL,NULL,0,'2310190107_fd38330b2e0c15146c0f.jpg'),(26,'<p>Hajime no Ippo Live Action</p>',NULL,'2023-10-23 09:23:35','2310190107',NULL,NULL,0,'2310190107_16ba39c1de601b2f7ca6.jpg'),(27,'<h1 class=\"viewsTitleText\" style=\"color: rgb(43, 43, 43); font-family: &quot;Eb Garamond&quot;; font-size: var(--type-ramp-plus-5-font-size); font-weight: 600; line-height: 40px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; max-height: 160px; overflow: hidden; padding-bottom: 0px; padding-top: 12px;\">COLUMN: Bolick turned his back on this much money when he left B.League</h1>',NULL,'2023-10-23 17:25:13','2310190107',NULL,NULL,0,'2310190107_479c349e86557f484a21.jpg'),(28,'<h3 style=\"background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 53px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; font-weight: 700; color: rgb(20, 20, 20); letter-spacing: -1px; position: relative; font-family: &quot;Open Sans Condensed&quot;, sans-serif !important;\"><span style=\"background: 0px 0px; border: 0px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(172, 11, 11);\">Special Report:&nbsp;</span>An app that uses artificial intelligence to make money has been released in Philippines and is available to the public</h3>',NULL,'2023-10-23 17:29:07','2310190107',NULL,NULL,0,'2310190107_eb6fc4919248badf6857.jpg'),(29,'<p>&lt;p&gt; hello Msadsad&lt;/p&gt;</p>',NULL,'2023-10-23 17:31:17','2310190107',NULL,NULL,0,NULL),(30,'<p>asdsad</p>',NULL,'2023-10-23 17:31:31','2310190107',NULL,NULL,0,NULL),(31,'<p>asdsad</p>',NULL,'2023-10-23 17:33:43','2310190107',NULL,NULL,0,NULL);
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

-- Dump completed on 2023-10-26  9:43:52
