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
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  `span` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `date` datetime NOT NULL,
  `encoded_by` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1112 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_headlines`
--

LOCK TABLES `tbl_headlines` WRITE;
/*!40000 ALTER TABLE `tbl_headlines` DISABLE KEYS */;
INSERT INTO `tbl_headlines` VALUES (1001,'deleted','','Sarong kandidato sa Daraga Albay, nanao nin bagas asin mga de lata sa mga residentes.','2022-05-03 07:49:03','markshandmadrid'),(1002,'deleted','','Sarong aldaw makatapos ang election, dae na kaipuhan na mag bilang pa ki boto','2022-05-03 09:59:04','markshandmadrid'),(1003,'deleted','','Sampulong ayam an nalugadan sa engkwentro sa mamasapano kasubagong udto','2022-05-03 10:44:32','markshandmadrid'),(1004,'deleted','','SIyam ayam an nalugadan sa engkwentro sa mamasapano kasubagong udto','2022-05-03 10:58:40','markshandmadrid'),(1005,'deleted','','Walong  ayam an nalugadan sa engkwentro sa mamasapano kasubagong udto','2022-05-03 10:59:07','markshandmadrid'),(1006,'deleted','','Pitong  ayam an nalugadan sa engkwentro sa mamasapano kasubagong udto','2022-05-03 10:59:33','markshandmadrid'),(1007,'deleted','','Anom ayam an nalugadan sa engkwentro sa mamasapano kasubagong udto','2022-05-03 11:00:35','markshandmadrid'),(1008,'deleted','','Onseng ayam an nalugadan sa engkwentro sa mamasapano kasubagong udto','2022-05-03 11:10:18','markshandmadrid'),(1009,'deleted','','Simbahan naglunsad nin kilos protesta laban sa mga dilawan','2022-05-03 11:54:54','markshandmadrid'),(1010,'deleted','','Limang kandidato sa Daraga Albay, nanao nin bagas asin mga de lata sa mga residentes.','2022-05-03 12:10:49','markshandmadrid'),(1011,'deleted','','Sarong kandidato sa Daraga Albay, nanao nin bagas asin mga de lata sa mga residentes.','2022-05-03 12:11:05','markshandmadrid'),(1012,'deleted','','Anom na kandidato sa Daraga Albay, nanao nin bagas asin mga de lata sa mga residentes.','2022-05-03 12:13:10','markshandmadrid'),(1013,'deleted','','Syen Mil na Katawo an nag atendir sa misa sa Dap-Dap Legazpi City','2022-05-03 12:14:00','markshandmadrid'),(1014,'deleted','','Pitong kandidato sa Daraga Albay, nanao nin bagas asin mga de lata sa mga residentes.','2022-05-03 12:15:33','markshandmadrid'),(1015,'deleted','','Dae mababa sa lima an nalugadan matapos na magkarambola an duwang lunadan sa Legazpi City','2022-05-03 13:32:50','markshandmadrid'),(1016,'deleted','','Lima an nalugadan kan magkarambola an duwang lunadan sa Legazpi City','2022-05-03 19:35:21','markshandmadrid'),(1017,'deleted','','Anom an nalugadan kan magkarambola an duwang lunadan sa Legazpi City','2022-05-03 19:36:57','markshandmadrid'),(1018,'deleted','','Simbahan naglunsad nin kilos protesta laban sa mga Marcos','2022-05-03 20:18:17','markshandmadrid'),(1019,'deleted','','Simbahan naglunsad nin kilos protesta laban sa mga Marcos','2022-05-03 20:21:00','markshandmadrid'),(1020,'deleted','','Simbahan naglunsad nin kilos protesta laban sa mga Marcos','2022-05-03 20:21:00','markshandmadrid'),(1021,'deleted','','Lima an nalugadan kan magkarambola an duwang lunadan sa Legazpi City','2022-05-03 20:56:35','markshandmadrid'),(1022,'deleted','','Lima an nalugadan kan magkarambola an duwang lunadan sa Legazpi City','2022-05-03 20:56:35','markshandmadrid'),(1023,'deleted','','Anom na kandidato sa Daraga Albay, nanao nin bagas asin mga de lata sa mga residentes.','2022-05-03 21:05:20','markshandmadrid'),(1024,'deleted','','Anom na kandidato sa Daraga Albay, nanao nin bagas asin mga de lata sa mga residentes.','2022-05-03 21:05:20','markshandmadrid'),(1025,'deleted','','Simbahan naglunsad nin kilos protesta laban sa mga dilawan','2022-05-03 21:06:42','markshandmadrid'),(1026,'deleted','','Simbahan naglunsad nin kilos protesta laban sa mga Marcos','2022-05-03 21:07:27','markshandmadrid'),(1027,'deleted','','Simbahan naglunsad nin kilos protesta laban sa mga Marcos','2022-05-03 21:11:46','markshandmadrid'),(1028,'deleted','','Anom na kandidato sa Daraga Albay, nanao nin bagas asin mga de lata sa mga residentes.','2022-05-03 21:13:09','markshandmadrid'),(1029,'deleted','','Onseng ayam an nalugadan sa engkwentro sa mamasapano kasubagong udto','2022-05-03 21:15:14','markshandmadrid'),(1030,'deleted','','Anom na kandidato sa Daraga Albay, nanao nin bagas asin mga de lata sa mga residentes.','2022-05-03 21:15:52','markshandmadrid'),(1031,'deleted','','Simbahan naglunsad nin kilos protesta laban sa mga Marcos','2022-05-03 21:17:59','markshandmadrid'),(1032,'deleted','','	Simbahan naglunsad nin kilos protesta laban sa mga Marcos','2022-05-03 21:19:06','markshandmadrid'),(1033,'deleted','','Simbahan naglunsad nin kilos protesta laban sa mga Marcos','2022-05-03 21:19:25','markshandmadrid'),(1034,'deleted','','Simbahan naglunsad nin kilos protesta laban sa mga Marcos','2022-05-03 21:29:12','markshandmadrid'),(1035,'deleted','','	Simbahan naglunsad nin kilos protesta laban sa mga Marcos','2022-05-03 21:30:37','markshandmadrid'),(1036,'deleted','','	Anom na kandidato sa Daraga Albay, nanao nin bagas asin mga de lata sa mga residentes.','2022-05-03 21:39:35','markshandmadrid'),(1037,'deleted','','	Simbahan naglunsad nin kilos protesta laban sa mga Marcos','2022-05-03 21:40:02','markshandmadrid'),(1038,'deleted','','Anom na kandidato sa Daraga Albay, nanao nin bagas asin mga de lata sa mga residentes.','2022-05-03 21:40:16','markshandmadrid'),(1039,'deleted','','	Simbahan naglunsad nin kilos protesta laban sa mga Marcos','2022-05-03 21:40:24','markshandmadrid'),(1070,'deleted','','Sampulong Residente kan banwa kan daraga an naka tanggap nin ayuda sa sarong kanddidato sa nasambit na banwaan','2022-05-03 22:36:23','markshandmadrid'),(1071,'deleted','','Pig susubaybayan na ang pag gana ni Marcos asin an pagtungtong kani sa Malacañang','2022-05-03 22:38:37','markshandmadrid'),(1072,'deleted','','Pig susubaybayan na ang pag gana ni Marcos asin an pagtungtong kani sa Malacañang','2022-05-03 22:44:21','markshandmadrid'),(1073,'deleted','','Kinseng magturugang an pigtutubodan na hinabas an de lata','2022-05-03 22:45:16','markshandmadrid'),(1074,'deleted','','Sobra sa limang piso an itinaas kan gasolina kasubangong udto','2022-05-03 22:50:54','markshandmadrid'),(1075,'deleted','','Nag karambola an limang awto sa syudad kan legazpi kasubangong udto, dae pa namidbidadn kun sisay an nag puon kan karambola.','2022-05-04 11:09:36','markshandmadrid'),(1076,'deleted','','Sampulong Onse an dae ko nailing saindong gabos mga Tugang','2022-05-05 15:07:32','markshandmadrid'),(1077,'deleted','','Nag karambola an limang awto sa syudad kan legazpi kasubangong udto, dae pa namidbidadn kun sisay an nag puon kan karambola.','2022-05-05 15:11:06','markshandmadrid'),(1078,'deleted','National','Nag karambola an limang awto sa syudad kan legazpi kasubangong udto, dae pa namidbidadn kun sisay an nag puon kan karambola.','2022-05-05 15:16:20','markshandmadrid'),(1079,'deleted','National','Sampulong ayam an irido matapos na matumba sa sapa an pig lulunadan na bike kaini','2022-05-05 18:04:12','markshandmadrid'),(1080,'deleted','Local','Dae na mamidbidan an duwa pa sa mga nawawara dahil ini dae pa nahahanap','2022-05-05 18:04:47','markshandmadrid'),(1081,'deleted','Local','Kadakol na kan mga Bikolano an nagpasiring sa Sawangan park para sa paghahanda kan Fiesta sa Dap-Dap','2022-05-06 11:59:35','markshandmadrid'),(1082,'deleted','Local','Sobra sa limang sakong bagas an pig tutubodan na hinabas sa parteng daraga kasubanggong aga','2022-05-06 12:38:41','markshandmadrid'),(1083,'deleted','Local','Sobra sa limang Toneladang sira an dinakop kan kapulisan sa pier kan legazpi','2022-05-06 12:47:30','markshandmadrid'),(1084,'deleted','Local','dae mababa sa limang kaakian an pig kidnap sa legazpi city','2022-05-06 19:39:12','admin'),(1085,'deleted','Local','Sobra sa limang Toneladang sira an dinakop kan kapulisan sa pier kan legazpi','2022-05-06 19:41:30','admin'),(1086,'deleted','Local','Nag karambola an limang awto sa syudad kan legazpi kasubangong udto, dae pa namidbidadn kun sisay an nag puon kan karambola.','2022-05-06 19:42:07','admin'),(1087,'deleted','Local','Dae na mamidbidan an duwa pa sa mga nawawara dahil ini dae pa nahahanap','2022-05-06 19:44:45','admin'),(1088,'deleted','Local','Sobra sa limang Toneladang sira an dinakop kan kapulisan sa pier kan legazpi','2022-05-06 19:48:49','admin'),(1089,'deleted','Local','Nag karambola an limang awto sa syudad kan legazpi kasubangong udto, dae pa namidbidadn kun sisay an nag puon kan karambola.','2022-05-06 19:49:32','admin'),(1090,'deleted','National','Sample Text','2022-05-08 13:46:16','admin'),(1091,'deleted','National','New TExt','2022-05-08 13:49:18','admin'),(1092,'deleted','National','New','2022-05-08 13:49:31','admin'),(1093,'deleted','Local','Hey','2022-05-08 13:49:42','admin'),(1094,'deleted','National','Sample','2022-05-08 14:03:43','admin'),(1095,'deleted','National','New Smaple','2022-05-08 14:03:50','admin'),(1096,'deleted','Local','Rosal nangenot na sa leaderboard','2022-05-08 16:03:27','admin'),(1097,'existing','National','Mayo 9, pigdeklarar na special non-working holiday','2022-05-08 18:35:47','admin'),(1098,'existing','National','Mga kaso nin COVID-19 sa NCR, posibleng umabot sa 1K kada aldaw pagkatapos kan Eleksiyon 2022 – OCTA','2022-05-08 18:36:02','admin'),(1099,'existing','National','Pilipinas mantenidong na sa low risk classification pag-abot sa COVID-19 cases','2022-05-08 18:36:16','admin'),(1100,'existing','National','OCTA sinabing 7 sa kada 10 na Pilipino, handang magpa-booster shot','2022-05-08 18:36:23','admin'),(1101,'existing','National','Pres. Duterte may patanid sa mga habo pa man giraray magpabakuna kontra COVID-19','2022-05-08 18:36:32','admin'),(1102,'existing','National','COMELEC siniguro na handa na sa Eleksiyon 2022 sa Lunes','2022-05-08 18:36:45','admin'),(1103,'existing','National','2022 elections piglalaoman na magiging matrangkilo','2022-05-08 18:36:53','admin'),(1104,'existing','National','Bagong botante, “game changers” segun sa COMELEC','2022-05-08 18:37:00','admin'),(1105,'existing','National','COMELEC nangapudan sa mga botante na “dai na makipag-Marites” pagkatapos magboto','2022-05-08 18:37:08','admin'),(1106,'existing','National','Suplay nin koryente sa Eleksiyon 2022, supisyente kun daing planta na magka-aberiya','2022-05-08 18:37:17','admin'),(1107,'existing','National','PNP tiwala kay Lt. Gen. Vicente Danao, Jr, para maging PNP chief','2022-05-08 18:37:26','admin'),(1108,'existing','National','Palasyo madoble kayod para masimbagan an padagos na pag-itaas kan inflation rate sa nasyon','2022-05-08 18:37:34','admin'),(1109,'existing','National','Utang kan gobyerno uminabot na sa record-high na P12.68-T kan Marso','2022-05-08 18:38:37','admin'),(1110,'existing','National','Mga inutang kan nasyon, siniguro na gagamiton sa tama kan gobyerno – Palasyo','2022-05-08 18:38:51','admin'),(1111,'existing','Local','Gov Al Francis Bichara Nangenot sa Botohan sa Albay','2022-05-08 18:42:29','admin');
/*!40000 ALTER TABLE `tbl_headlines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_status`
--

DROP TABLE IF EXISTS `tbl_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_status` (
  `id` int(99) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  `status` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2001 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_status`
--

LOCK TABLES `tbl_status` WRITE;
/*!40000 ALTER TABLE `tbl_status` DISABLE KEYS */;
INSERT INTO `tbl_status` VALUES (2000,'headline',1);
/*!40000 ALTER TABLE `tbl_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
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

-- Dump completed on 2022-05-08 19:03:18
