-- MySQL dump 10.13  Distrib 5.7.39, for osx10.12 (x86_64)
--
-- Host: localhost    Database: project
-- ------------------------------------------------------
-- Server version	5.7.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `registration$id` int(10) unsigned NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `registration$id` (`registration$id`),
  CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`registration$id`) REFERENCES `registration` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,13,1111111111,'user1@gmail.com'),(2,14,1222222222,'user2@gmail.com'),(3,15,1333333333,'user3@gmail.com'),(4,16,1444444444,'user4@gmail.com'),(6,12,1220000000,'jared@gmail.com'),(7,2,1222200000,'mejared@gmail.com');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favorites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `registration$id` int(10) unsigned NOT NULL,
  `mini_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `registration$id` (`registration$id`),
  CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`registration$id`) REFERENCES `registration` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorites`
--

LOCK TABLES `favorites` WRITE;
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;
INSERT INTO `favorites` VALUES (2,2,'Glottkin'),(3,13,'Great_Unclean_One'),(4,14,'Pink_Horror'),(5,15,'Bloodthirster'),(6,16,'Fiend'),(9,12,'Keeper_of_Secrets');
/*!40000 ALTER TABLE `favorites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registration` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(10) NOT NULL,
  `pwd` char(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration`
--

LOCK TABLES `registration` WRITE;
/*!40000 ALTER TABLE `registration` DISABLE KEYS */;
INSERT INTO `registration` VALUES (2,'jared','$2y$10$ZxalUsOPOyTgzitrrXHK..KryR3iLWtRhvp6AKeiIjfQYUNsIqnZy'),(12,'me','$2y$10$OLze7Xdqad/pP7VS4jLS8utZPR.5A/LKpBhNemOBGnJ9UHN.sakem'),(13,'user1','$2y$10$CH.Oi54STJrNUzI.06EkauHcIqgOFvMGrHsTa3ztAUuXTj7yQbf4.'),(14,'user2','$2y$10$tVjkAhfVjFWEJLQN/36PnO0n0d9o4Z.nXVYnpIt8qvqCCslXJfyXO'),(15,'user3','$2y$10$rzqKdZSRlmbK3N7gI4I7VOHs3gZ6h/5jGo/7aoDIPuhJ3fsqoq1pu'),(16,'user4','$2y$10$j7nEahav5GS7.mcIUe/7kuqENtBX/dH/P2Qk19anTWBeh5j1a7v0W'),(17,'admin','$2y$10$zubq0GIZ3eRpDPF0W23E2OddmP3qHvgb3cVch9hjFwCR6DuvZmp2e');
/*!40000 ALTER TABLE `registration` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-29 20:18:57
