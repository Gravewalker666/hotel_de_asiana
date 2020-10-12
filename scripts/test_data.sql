-- MySQL dump 10.13  Distrib 8.0.19, for osx10.15 (x86_64)
--
-- Host: localhost    Database: hotel_de_asiana
-- ------------------------------------------------------
-- Server version	8.0.19

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

USE hotel_de_asiana;
--
-- Dumping data for table `bill`
--

LOCK TABLES `bill` WRITE;
/*!40000 ALTER TABLE `bill` DISABLE KEYS */;
/*!40000 ALTER TABLE `bill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `chef`
--

LOCK TABLES `chef` WRITE;
/*!40000 ALTER TABLE `chef` DISABLE KEYS */;
INSERT INTO `chef` VALUES (1,1);
/*!40000 ALTER TABLE `chef` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `clean`
--

LOCK TABLES `clean` WRITE;
/*!40000 ALTER TABLE `clean` DISABLE KEYS */;
/*!40000 ALTER TABLE `clean` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cleaning_staff`
--

LOCK TABLES `cleaning_staff` WRITE;
/*!40000 ALTER TABLE `cleaning_staff` DISABLE KEYS */;
INSERT INTO `cleaning_staff` VALUES (1,'sweeping','1st_floor',3);
/*!40000 ALTER TABLE `cleaning_staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'Hayleys','Colombo, SL',1),(2,'Keels ','Colombo, SL',10),(3,'Facebook','California, US',18),(4,'Google','California, US',19),(5,'Amazon','Washington, US',20);
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (112696331,1),(773465125,1),(708954342,2);
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'Sarath_Fernando','M',764538974,'2002-08-20 08:00:00','M-1'),(2,'Kumari_Gunawardana','F',753965937,'2015-06-12 08:00:00','M-2'),(3,'Gunapala','M',713457323,'2010-08-21 08:00:00','CL-1'),(4,'Pawani_Gunathilaka','F',713344556,'2018-09-11 08:00:00','R-1'),(5,'Sumith_Wijewardana','M',700982823,'2018-10-16 08:00:00','CH-1'),(6,'Ruwani_Perera','F',714683517,'2020-06-01 08:00:00','KP-1'),(7,'Nuwan_Pradeep','M',768065116,'2020-07-11 08:00:00','W-1');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `facility`
--

LOCK TABLES `facility` WRITE;
/*!40000 ALTER TABLE `facility` DISABLE KEYS */;
INSERT INTO `facility` VALUES (1,'spa','luxury',2000.00,'4th_floor'),(2,'public_computer','normal',200.00,'1st_floor'),(3,'pool','luxury',6000.00,'outdoor'),(4,'playground','normal',1500.00,'outdoor');
/*!40000 ALTER TABLE `facility` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `facility_manage`
--

LOCK TABLES `facility_manage` WRITE;
/*!40000 ALTER TABLE `facility_manage` DISABLE KEYS */;
INSERT INTO `facility_manage` VALUES (2,1),(3,1),(1,2),(4,2);
/*!40000 ALTER TABLE `facility_manage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `family`
--

LOCK TABLES `family` WRITE;
/*!40000 ALTER TABLE `family` DISABLE KEYS */;
INSERT INTO `family` VALUES (123468921,'Jon Snow','M',14),(237214622,'Cersei Lannister','F',17),(456798123,'James Hetfield','M',22);
/*!40000 ALTER TABLE `family` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `food`
--

LOCK TABLES `food` WRITE;
/*!40000 ALTER TABLE `food` DISABLE KEYS */;
INSERT INTO `food` VALUES (1,'Veg Rice','Vegitarian','400','Full Rice'),(3,'Big Boss Beef Burger - B4','American','750','Full Size'),(4,'Club Sandwich','American','350','2 Pieces'),(5,'BBQ Piston Burger','American','700','Half Size'),(6,'Chicken Biryani','Sri Lankan','440','Full Rice'),(7,'Veg Burger Delight ','Vegitarian','570','Full Size');
/*!40000 ALTER TABLE `food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `food_order`
--

LOCK TABLES `food_order` WRITE;
/*!40000 ALTER TABLE `food_order` DISABLE KEYS */;
INSERT INTO `food_order` VALUES (2,1,'2020-10-12 00:06:53'),(1,3,'2020-10-12 00:16:44'),(22,4,'2020-10-12 00:22:04'),(19,6,'2020-10-12 00:16:11'),(22,7,'2020-10-12 10:50:09');
/*!40000 ALTER TABLE `food_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `guest`
--

LOCK TABLES `guest` WRITE;
/*!40000 ALTER TABLE `guest` DISABLE KEYS */;
INSERT INTO `guest` VALUES (1,'company'),(2,'individual'),(10,'company'),(13,'individual'),(14,'family'),(17,'family'),(18,'company'),(19,'company'),(20,'company'),(22,'family');
/*!40000 ALTER TABLE `guest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `guest_facility`
--

LOCK TABLES `guest_facility` WRITE;
/*!40000 ALTER TABLE `guest_facility` DISABLE KEYS */;
/*!40000 ALTER TABLE `guest_facility` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `guest_room`
--

LOCK TABLES `guest_room` WRITE;
/*!40000 ALTER TABLE `guest_room` DISABLE KEYS */;
/*!40000 ALTER TABLE `guest_room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `handle`
--

LOCK TABLES `handle` WRITE;
/*!40000 ALTER TABLE `handle` DISABLE KEYS */;
/*!40000 ALTER TABLE `handle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `individual`
--

LOCK TABLES `individual` WRITE;
/*!40000 ALTER TABLE `individual` DISABLE KEYS */;
INSERT INTO `individual` VALUES (123467549,'Jon Doe','M',13),(790029871,'Saman Kumara','M',2);
/*!40000 ALTER TABLE `individual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `indoor_req`
--

LOCK TABLES `indoor_req` WRITE;
/*!40000 ALTER TABLE `indoor_req` DISABLE KEYS */;
INSERT INTO `indoor_req` VALUES (1,'ipsum'),(2,'ipsum');
/*!40000 ALTER TABLE `indoor_req` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `kitchen_staff`
--

LOCK TABLES `kitchen_staff` WRITE;
/*!40000 ALTER TABLE `kitchen_staff` DISABLE KEYS */;
INSERT INTO `kitchen_staff` VALUES (1,'executive_chef','7_years',5),(2,'kitchen_porter','1_year',6),(3,'waiter','2_years',7);
/*!40000 ALTER TABLE `kitchen_staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `management`
--

LOCK TABLES `management` WRITE;
/*!40000 ALTER TABLE `management` DISABLE KEYS */;
INSERT INTO `management` VALUES (1,'E-1','executive',1),(2,'SS-1','assistant',2);
/*!40000 ALTER TABLE `management` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `outdoor_guiding_req`
--

LOCK TABLES `outdoor_guiding_req` WRITE;
/*!40000 ALTER TABLE `outdoor_guiding_req` DISABLE KEYS */;
INSERT INTO `outdoor_guiding_req` VALUES (4,'lorem');
/*!40000 ALTER TABLE `outdoor_guiding_req` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `outdoor_special_req`
--

LOCK TABLES `outdoor_special_req` WRITE;
/*!40000 ALTER TABLE `outdoor_special_req` DISABLE KEYS */;
INSERT INTO `outdoor_special_req` VALUES (3,'ipsum');
/*!40000 ALTER TABLE `outdoor_special_req` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `prepare`
--

LOCK TABLES `prepare` WRITE;
/*!40000 ALTER TABLE `prepare` DISABLE KEYS */;
/*!40000 ALTER TABLE `prepare` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `receptionist`
--

LOCK TABLES `receptionist` WRITE;
/*!40000 ALTER TABLE `receptionist` DISABLE KEYS */;
INSERT INTO `receptionist` VALUES (1,4);
/*!40000 ALTER TABLE `receptionist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES (1,'Single','Occupied','Ground Floor',5000.00),(2,'Single','Vacant','Ground Floor',5000.00),(102,'Family','Vacant','Second Floor',12000.00),(106,'Single','Occupied','First Floor',7500.00),(107,'Single','Vacant','Second Floor',10000.00),(108,'Family','Occupied','Third Floor',20000.00);
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `specility_area`
--

LOCK TABLES `specility_area` WRITE;
/*!40000 ALTER TABLE `specility_area` DISABLE KEYS */;
INSERT INTO `specility_area` VALUES ('caterer',1),('personal_chef',1);
/*!40000 ALTER TABLE `specility_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `specility_style`
--

LOCK TABLES `specility_style` WRITE;
/*!40000 ALTER TABLE `specility_style` DISABLE KEYS */;
INSERT INTO `specility_style` VALUES (1,'english_service'),(1,'french_service');
/*!40000 ALTER TABLE `specility_style` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `support_staff`
--

LOCK TABLES `support_staff` WRITE;
/*!40000 ALTER TABLE `support_staff` DISABLE KEYS */;
INSERT INTO `support_staff` VALUES (1,6,2);
/*!40000 ALTER TABLE `support_staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `waiter`
--

LOCK TABLES `waiter` WRITE;
/*!40000 ALTER TABLE `waiter` DISABLE KEYS */;
INSERT INTO `waiter` VALUES (1,3);
/*!40000 ALTER TABLE `waiter` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-12 11:05:47
