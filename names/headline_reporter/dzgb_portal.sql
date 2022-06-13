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
-- Table structure for table `tbl_headlines`
--

DROP TABLE IF EXISTS `tbl_headlines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_headlines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext NOT NULL,
  `date` datetime NOT NULL,
  `encoded_by` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `span` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_headlines`
--

LOCK TABLES `tbl_headlines` WRITE;
/*!40000 ALTER TABLE `tbl_headlines` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_headlines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_on_the_spot_headline`
--

DROP TABLE IF EXISTS `tbl_on_the_spot_headline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_on_the_spot_headline` (
  `headline` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_name` varchar(255) NOT NULL,
  `reporter` varchar(255) NOT NULL,
  `reporter_location` varchar(255) NOT NULL,
  `time_stamp` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_on_the_spot_headline`
--

LOCK TABLES `tbl_on_the_spot_headline` WRITE;
/*!40000 ALTER TABLE `tbl_on_the_spot_headline` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_on_the_spot_headline` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_programs`
--

DROP TABLE IF EXISTS `tbl_programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_programs`
--

LOCK TABLES `tbl_programs` WRITE;
/*!40000 ALTER TABLE `tbl_programs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_programs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_reporter`
--

DROP TABLE IF EXISTS `tbl_reporter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_reporter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reporter` varchar(255) NOT NULL,
  `default_location` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_reporter`
--

LOCK TABLES `tbl_reporter` WRITE;
/*!40000 ALTER TABLE `tbl_reporter` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_reporter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_reporter_locations`
--

DROP TABLE IF EXISTS `tbl_reporter_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_reporter_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reporter_locations` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_reporter_locations`
--

LOCK TABLES `tbl_reporter_locations` WRITE;
/*!40000 ALTER TABLE `tbl_reporter_locations` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_reporter_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-13 22:12:48
