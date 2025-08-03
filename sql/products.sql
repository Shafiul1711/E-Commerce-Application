-- MySQL dump 10.13  Distrib 8.4.6, for Linux (x86_64)
--
-- Host: localhost    Database: puzzlemania
-- ------------------------------------------------------
-- Server version	8.4.6

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `option1` varchar(50) DEFAULT NULL,
  `option2` varchar(50) DEFAULT NULL,
  `stock` int DEFAULT '10',
  `pieces` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Mystic','A glowing 500-piece mystery puzzle.',19.99,'mystic.png','Magic','Physical','Digital',20,'500 pieces'),(2,'Painting','A beautiful renaissance painting puzzle.',12.50,'painting.jpg','Kids','Physical','Digital',15,'100 pieces'),(3,'Palm','A vibrant palm based puzzle.',24.99,'palm.jpg','Challenging','Physical','Digital',30,'300 pieces'),(4,'Paris','A mystical Paris based puzzle.',14.99,'paris.jpg','Kids','Physical','Digital',5,'200 pieces'),(5,'Sky','A mosaic sky based puzzle.',16.99,'sky.jpg','Magic','Physical','Digital',15,'350 pieces'),(6,'Tree','A special tree based puzzle.',19.99,'tree.jpg','Kids','Physical','Digital',6,'450 pieces'),(7,'Water','A pretty river based puzzle.',11.99,'water.jpg','Magic','Physical','Digital',10,'350 pieces'),(8,'Wave','A colourful wave based puzzle.',34.99,'wave.jpg','Challenging','Physical','Digital',10,'370 pieces'),(9,'Lines','A wavy line based puzzle.',25.99,'lines.jpg','Challenging','Physical','Digital',30,'650 pieces'),(10,'Light','A mosaic light based puzzle.',14.99,'light.jpg','Magic','Physical','Digital',10,'350 pieces'),(11,'Hive','A honeycomb based puzzle.',15.99,'hive.jpg','Magic','Physical','Digital',10,'350 pieces'),(12,'Fuzz','A fuzzy puzzle.',17.99,'fuzz.jpg','Challenging','Physical','Digital',30,'350 pieces'),(13,'Flag','A pretty flag based puzzle.',14.99,'flag.jpg','Magic','Physical','Digital',16,'650 pieces'),(14,'Fire','A vibrant fire based puzzle.',13.99,'fire.jpg','Kids','Physical','Digital',12,'350 pieces'),(15,'Face','A red face based puzzle.',12.99,'face.jpg','Magic','Physical','Digital',14,'350 pieces'),(16,'Dots','A dot puzzle.',11.99,'dots.jpg','Kids','Physical','Digital',13,'350 pieces'),(17,'Canoe','A canoe swamp based puzzle.',16.99,'canoe.jpg','Kids','Physical','Digital',16,'350 pieces'),(18,'Building','A beautiful building puzzle.',17.99,'building.jpg','Magic','Physical','Digital',19,'350 pieces'),(19,'Blue','A blue puzzle.',14.99,'blue.jpg','Challenging','Physical','Digital',12,'550 pieces'),(20,'Black','A black puzzle.',14.99,'black.jpg','Challenging','Physical','Digital',10,'550 pieces'),(21,'Mystic','A glowing 500-piece mystery puzzle.',19.99,'mystic.png','Magic','Physical','Digital',20,'500 pieces'),(22,'Painting','A beautiful renaissance painting puzzle.',12.50,'painting.jpg','Kids','Physical','Digital',15,'100 pieces'),(23,'Palm','A vibrant palm based puzzle.',24.99,'palm.jpg','Challenging','Physical','Digital',30,'300 pieces'),(24,'Paris','A mystical Paris based puzzle.',14.99,'paris.jpg','Kids','Physical','Digital',5,'200 pieces'),(25,'Sky','A mosaic sky based puzzle.',16.99,'sky.jpg','Magic','Physical','Digital',15,'350 pieces'),(26,'Tree','A special tree based puzzle.',19.99,'tree.jpg','Kids','Physical','Digital',6,'450 pieces'),(27,'Water','A pretty river based puzzle.',11.99,'water.jpg','Magic','Physical','Digital',10,'350 pieces'),(28,'Wave','A colourful wave based puzzle.',34.99,'wave.jpg','Challenging','Physical','Digital',10,'370 pieces'),(29,'Lines','A wavy line based puzzle.',25.99,'lines.jpg','Challenging','Physical','Digital',30,'650 pieces'),(30,'Light','A mosaic light based puzzle.',14.99,'light.jpg','Magic','Physical','Digital',10,'350 pieces'),(31,'Hive','A honeycomb based puzzle.',15.99,'hive.jpg','Magic','Physical','Digital',10,'350 pieces'),(32,'Fuzz','A fuzzy puzzle.',17.99,'fuzz.jpg','Challenging','Physical','Digital',30,'350 pieces'),(33,'Flag','A pretty flag based puzzle.',14.99,'flag.jpg','Magic','Physical','Digital',16,'650 pieces'),(34,'Fire','A vibrant fire based puzzle.',13.99,'fire.jpg','Kids','Physical','Digital',12,'350 pieces'),(35,'Face','A red face based puzzle.',12.99,'face.jpg','Magic','Physical','Digital',14,'350 pieces'),(36,'Dots','A dot puzzle.',11.99,'dots.jpg','Kids','Physical','Digital',13,'350 pieces'),(37,'Canoe','A canoe swamp based puzzle.',16.99,'canoe.jpg','Kids','Physical','Digital',16,'350 pieces'),(38,'Building','A beautiful building puzzle.',17.99,'building.jpg','Magic','Physical','Digital',19,'350 pieces'),(39,'Blue','A blue puzzle.',14.99,'blue.jpg','Challenging','Physical','Digital',12,'550 pieces'),(40,'Black','A black puzzle.',14.99,'black.jpg','Challenging','Physical','Digital',10,'550 pieces');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-08-02 18:26:41
