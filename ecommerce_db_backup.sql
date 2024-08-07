-- MySQL dump 10.13  Distrib 8.0.39, for Linux (x86_64)
--
-- Host: localhost    Database: ecommerce
-- ------------------------------------------------------
-- Server version	8.0.39-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Product`
--

DROP TABLE IF EXISTS `Product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Product` (
  `P_ID` int NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Description` text,
  PRIMARY KEY (`P_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product`
--

LOCK TABLES `Product` WRITE;
/*!40000 ALTER TABLE `Product` DISABLE KEYS */;
/*!40000 ALTER TABLE `Product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loginDetails`
--

DROP TABLE IF EXISTS `loginDetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loginDetails` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `email_id` varchar(50) NOT NULL,
  `login_id` varchar(50) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`,`email_id`,`login_id`,`password`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loginDetails`
--

LOCK TABLES `loginDetails` WRITE;
/*!40000 ALTER TABLE `loginDetails` DISABLE KEYS */;
INSERT INTO `loginDetails` VALUES (1,'ve@gmail.com','122','6552'),(2,'be@gma.com','741','885');
/*!40000 ALTER TABLE `loginDetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_address`
--

DROP TABLE IF EXISTS `my_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `my_address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `house_no` varchar(45) DEFAULT NULL,
  `address_line1` varchar(45) DEFAULT NULL,
  `address_line2` varchar(45) DEFAULT NULL,
  `locality` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `zipcode` mediumint DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_address`
--

LOCK TABLES `my_address` WRITE;
/*!40000 ALTER TABLE `my_address` DISABLE KEYS */;
INSERT INTO `my_address` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'2','2','2','2','2',2,NULL,NULL),(4,'11','udhyog vihar phase 3','near radission ','udhyog vihar','Gurugram',32767,NULL,NULL),(5,'james','22 b modern lane','near max','keshav vihar','Gurugram',32767,NULL,NULL),(6,'jess','27 b blue lane','near red','kanpur','new delhi',32767,NULL,NULL),(7,'jess','27 b blue lane','near red','kanpur','new delhi',32767,NULL,NULL),(8,'jess','27 b blue lane','near red','kanpur','new delhi',32767,NULL,NULL),(9,'jess','27 b blue lane','near red','manpur','new delhi',32767,NULL,NULL),(10,'jess','27 b blue lane','near red','manpur','new delhi',32767,NULL,NULL),(11,'jess','27 b blue lane','near red','manpur','new delhi',32767,NULL,NULL),(12,'jess','ndhsbs ggg','asd','hhj','sssd',32767,NULL,NULL),(13,'manu','123 pushp vihar','-','manpur','new delhi',32767,NULL,NULL),(14,'jess','27 b blue lane','near red','kanpur','new delhi',32767,NULL,NULL),(15,'jess','27 b blue lane','near red','kanpur','new delhi',32767,NULL,NULL),(16,'jess','27 b blue lane','near red','kanpur','new delhi',32767,NULL,NULL),(17,'jess','27 b blue lane','near red','kanpur','new delhi',32767,NULL,NULL),(18,'jess','27 b blue lane','near red','kanpur','new delhi',32767,NULL,NULL),(19,'jess','27 b blue lane','near red','kanpur','new delhi',32767,NULL,NULL),(20,'jess','27 b blue lane','near red','kanpur','new delhi',32767,NULL,NULL),(21,'jess','27 b blue lane','near red','kanpur','new delhi',32767,NULL,NULL),(22,'jess','27 b blue lane','near red','kanpur','new delhi',32767,NULL,NULL),(23,'jess','27 b blue lane','near red','kanpur','new delhi',32767,NULL,NULL),(24,'122333','udhog vihar','line 2444','locality','ggn',32767,NULL,1),(25,'99222','line 15288','line 2356','locality abcc','ggn',2255330,NULL,1);
/*!40000 ALTER TABLE `my_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `new_table`
--

DROP TABLE IF EXISTS `new_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `new_table` (
  `customerId` int NOT NULL AUTO_INCREMENT,
  `customer` varchar(45) NOT NULL,
  `cart` varchar(45) NOT NULL,
  `orders` varchar(45) NOT NULL,
  `payment` varchar(45) NOT NULL,
  PRIMARY KEY (`customerId`,`customer`,`cart`,`orders`,`payment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `new_table`
--

LOCK TABLES `new_table` WRITE;
/*!40000 ALTER TABLE `new_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `new_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_management`
--

DROP TABLE IF EXISTS `order_management`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_management` (
  `id` int NOT NULL AUTO_INCREMENT,
  `productId` varchar(45) DEFAULT NULL,
  `product_name` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `order_status` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `house_no` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zip_code` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_management`
--

LOCK TABLES `order_management` WRITE;
/*!40000 ALTER TABLE `order_management` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_management` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_table`
--

DROP TABLE IF EXISTS `product_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_table` (
  `productID` int NOT NULL AUTO_INCREMENT,
  `productName` varchar(45) NOT NULL,
  `productPrice` varchar(45) NOT NULL,
  `productMRP` varchar(45) NOT NULL,
  `productBrand` varchar(45) NOT NULL,
  `productOS` varchar(45) NOT NULL,
  `productRAM` varchar(45) NOT NULL,
  `productHDD` varchar(45) NOT NULL,
  `productImage` varchar(45) NOT NULL,
  `productFile` varchar(45) NOT NULL,
  `productDetails` varchar(45) NOT NULL,
  PRIMARY KEY (`productID`,`productName`,`productPrice`,`productMRP`,`productBrand`,`productOS`,`productRAM`,`productHDD`,`productImage`,`productFile`,`productDetails`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_table`
--

LOCK TABLES `product_table` WRITE;
/*!40000 ALTER TABLE `product_table` DISABLE KEYS */;
INSERT INTO `product_table` VALUES (1,'Product A','1000','1200','Brand A','OS A','8GB','Yes','images/1722250465_c8c9ebdc55898a8697bd.png','',''),(2,'Product B','2000','2200','Brand B','OS B','16GB','Yes','productB.jpg','',''),(3,'Product C','1500','1700','Brand C','OS C','8GB','No','productC.jpg','',''),(4,'Product D','2500','2700','Brand D','OS D','32GB','Yes','productD.jpg','',''),(5,'Product E','3000','3200','Brand E','OS E','64GB','No','productE.jpg','',''),(9,'Product A','1000','1200','Brand A','OS A','8 GB','Yes','Product A.jpg','',''),(10,'Product Awqw','wqw','wq','w','qw','wq','wqwq','w','',''),(11,'Product A','1000','ii','u','hk','jkj','kjk','k','',''),(12,'Product A','1000','ii','u','hk','jkj','kjk','k','',''),(13,'Product A','1000','1200','Brand A','OS A','8 GB','Yes','1722250465_c8c9ebdc55898a8697bd.png','',''),(14,'Product B','1500','2000','Brand B','OS B','8 GB','Yes','1722250910_092c6893c4b1ee3789d5','',''),(15,'Product XYZ','qwqw','44','323','323','232','2','','','');
/*!40000 ALTER TABLE `product_table` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-07 15:18:06
