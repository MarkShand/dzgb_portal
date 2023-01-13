-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: dzgb_portal
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_concerns`
--

DROP TABLE IF EXISTS `tbl_concerns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_concerns` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `resolved` tinyint(1) NOT NULL,
  `date` varchar(255) NOT NULL,
  `concern` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_concerns`
--

LOCK TABLES `tbl_concerns` WRITE;
/*!40000 ALTER TABLE `tbl_concerns` DISABLE KEYS */;
INSERT INTO `tbl_concerns` VALUES (1,1,'Jan 10,2023','Kasulo sa Legazpi mas lalo pang nag kusog'),(2,1,'Jan 10,2023','Sarong Kapitan binadil gadan sa Pawa'),(3,1,'','Sarong motor sa Baybay hinabas nin dae pa namidbidan na lalaki'),(4,1,'','Ayam naka kagat ki aki sa sarong barangay sa Legazpi'),(5,1,'','Sarong Bangkay nanutaran na naglalataw-lataw sa salog'),(6,1,'','Kinagat na ayam, nagadan sa Rabies'),(7,1,'','Sarong lalaki ang pig responderan kang BRTTH dahil sa tama kaini nin bala.'),(8,1,'','Sampulong taon na aki, dae pa nahanap kan mga awtoridad.'),(9,1,'','Sample concern here'),(10,1,'','Edited Sample'),(11,1,'','Sample new'),(12,1,'','NEW Concern'),(13,1,'','Sulo sa Penaranda nagkaraba \n(sain ini)'),(14,1,'','Mga awto nagkarambola sa tahaw kan tinampo sa Old Albay, sa hampang kan Cathedral'),(15,1,'','Kapitan sa Barangay Unodos, binadil Gadan');
/*!40000 ALTER TABLE `tbl_concerns` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-13 16:30:01
