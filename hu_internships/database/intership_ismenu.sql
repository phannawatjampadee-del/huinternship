-- MySQL dump 10.13  Distrib 8.0.45, for Win64 (x86_64)
--
-- Host: localhost    Database: intership
-- ------------------------------------------------------
-- Server version	5.7.44-log

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
-- Table structure for table `ismenu`
--

DROP TABLE IF EXISTS `ismenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ismenu` (
  `Muserlevel` varchar(11) NOT NULL,
  `Mdashboard` varchar(45) NOT NULL,
  `Mlink` varchar(100) DEFAULT NULL,
  `Mlevel` int(11) DEFAULT NULL,
  `Mdate` datetime DEFAULT NULL,
  PRIMARY KEY (`Muserlevel`,`Mdashboard`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ismenu`
--

LOCK TABLES `ismenu` WRITE;
/*!40000 ALTER TABLE `ismenu` DISABLE KEYS */;
INSERT  IGNORE INTO `ismenu` VALUES ('admin','About course','index.php',2,NULL),('admin','Admin','index.php',4,NULL),('admin','Contact','contact.html',7,NULL),('admin','Home','index.php',1,'2026-07-04 00:00:00'),('admin','Internships report','./staff/view_all.php',5,NULL),('admin','Logout','signout.php',20,NULL),('admin','News / Activities','index.php',3,NULL),('student','About course','index.php',2,NULL),('student','Contact','contact.php',7,NULL),('student','Home','index.php',1,'2026-07-04 00:00:00'),('student','Internship Form','./student/register.php',6,NULL),('student','Logout','signout.php',20,NULL),('student','My Internship','./student/view_status.php',5,NULL),('student','News / Activities','index.php',3,NULL),('student','Student','index.php',4,NULL),('teacher','About course','index.php',2,NULL),('teacher','Contact','contact.html',7,NULL),('teacher','Home','index.php',1,'2026-07-04 00:00:00'),('teacher','Internships report','./staff/view_all.php',5,NULL),('teacher','Logout','signout.php',20,NULL),('teacher','News / Activities','index.php',3,NULL),('teacher','Teacher','index.php',4,NULL);
/*!40000 ALTER TABLE `ismenu` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-24 13:54:43
