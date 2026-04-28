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
-- Table structure for table `internship_requests`
--

DROP TABLE IF EXISTS `internship_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `internship_requests` (
  `intern_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(11) DEFAULT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `advisor_name` varchar(100) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `company_address` varchar(150) DEFAULT NULL,
  `contact_name` varchar(100) DEFAULT NULL,
  `contact_phone` varchar(30) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `remark` varchar(150) DEFAULT NULL,
  `request_date` timestamp NULL DEFAULT NULL,
  `comment_teacher` text,
  PRIMARY KEY (`intern_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `internship_requests`
--

LOCK TABLES `internship_requests` WRITE;
/*!40000 ALTER TABLE `internship_requests` DISABLE KEYS */;
INSERT  IGNORE INTO `internship_requests` VALUES (1,'6400000001','สมชาย','สายลุย','อ.สมพงษ์ ใจดี','บริษัท อาก้า เทค จำกัด','123 ถสุขุมวิท กทม 10110','คุณสมศรี','081-234-5678','Backend Developer','2026-06-01','2026-10-31',2,'ผ่านทดสอบ..dd',NULL,'ผ่านทดสอบtest  testผ่านทดสอบtest  testผ่านทดสอบtest  testผ่านทดสอบtest  teswww'),(2,'6400000002','สมชาย','สายลุย','อ.สมพงษ์ ใจดี','บริษัท อาก้า เทค จำกัด','123 ถสุขุมวิท กทม 10110','คุณสมศรี','081-234-5678','Backend Developer','2026-06-01','2026-10-31',3,'???????????????',NULL,NULL),(4,'67101010665','Test','สายลุย','อ.สมพงษ์ ใจดี','บริษัท อาก้า เทค จำกัด','123 ถสุขุมวิท กทม 10110','คุณสมศรี','081-234-5678','Backend Developer','2026-06-01','2026-10-31',1,'รอตรวจสอบเอกสาร',NULL,'2332'),(10,'67101010665','Test','สายลุย','อ.สมพงษ์ ใจดี','บริษัท อาก้า เทค จำกัด','123 ถสุขุมวิท กทม 10110','คุณสมศรี','081-234-5678','Backend Developer','2026-06-01','2026-10-31',1,'รอตรวจสอบเอกสาร',NULL,'eejhe'),(15,'67101010665','Test','สายลุย','อ.สมพงษ์ ใจดี','บริษัท อาก้า เทค จำกัด','123 ถสุขุมวิท กทม 10110','คุณสมศรี','081-234-5678','Backend Developer','2026-06-01','2026-10-31',4,'รอตรวจสอบเอกสาร',NULL,NULL),(16,'6701234567','สมชาย','เรียนไม่ดี','ผศ.ดร. ใจดี มีสุข','บริษัท ก้าวหน้าเดเวลอปเมนต์ จำกัด','123 อาคารสกายทาวเวอร์ ชั้น 15 ถนนสุขุมวิท แขวงคลองเตย เขตคลองเตย กรุงเทพมหานคร 10110','คุณสมหญิง งานบุคคล','081-234-5678','Web Developer (นักพัฒนาเว็บไซต์)','2025-01-06','2026-04-13',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `internship_requests` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-24 13:54:44
