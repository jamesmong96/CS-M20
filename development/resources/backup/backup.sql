-- MySQL dump 10.19  Distrib 10.3.34-MariaDB, for debian-linux-gnueabihf (armv8l)
--
-- Host: localhost    Database: A01
-- ------------------------------------------------------
-- Server version	10.3.34-MariaDB-0+deb10u1

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
-- Current Database: `A01`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `A01` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `A01`;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileNumber` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `studentNumber` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'User','Peter','Cameron','peter.cameron738@example.com','07946 864309','1993-08-14','2108475'),(20,'User','Sarah','Walker','sarah.walker383@example.com','07873 988156','1981-03-02','2002355'),(21,'User','Brian','Parker','brian.parker626@example.com','07921 873754','1989-08-24','2012379'),(22,'User','Elizabeth','Robinson','elizabeth.robinson748@example.com','07397 065103','1992-09-09','2061862'),(23,'User','Brian','Lewis','brian.lewis397@example.com','07018 017762','1994-08-06','2064199'),(24,'User','Peter','Green','peter.green983@example.com','07941 436000','1995-12-23','2007523'),(25,'User','Graham','Khan','graham.khan348@example.com','07504 515732','2003-01-14','2047079'),(26,'User','Elizabeth','King','elizabeth.king312@example.com','07509 421365','1984-12-18','2035176'),(27,'User','Joan','Cooper','joan.cooper164@example.com','07634 211612','1993-07-07','2138405'),(28,'User','Lisa','James','lisa.james686@example.com','07376 660013','2001-01-02','2056748'),(29,'User','Mary','Green','mary.green508@example.com','07304 147861','1982-11-13','2032731'),(30,'User','Graham','Taylor','graham.taylor789@example.com','07317 072979','1997-12-06','2177590'),(31,'User','George','Bennett','george.bennett403@example.com','07933 386597','1995-10-26','2145971'),(32,'User','Susan','Hall','susan.hall596@example.com','07978 129971','1984-12-15','2092078'),(33,'User','Simon','Davis','simon.davis206@example.com','07936 053643','1999-01-10','2025251'),(34,'User','David','Mitchell','david.mitchell129@example.com','07573 504235','1986-03-05','2115945'),(35,'User','Thomas','Clark','thomas.clark097@example.com','07342 809683','1990-10-04','2135114'),(36,'User','Simon','Thomas','simon.thomas843@example.com','07841 504755','1987-01-02','2143365'),(37,'User','Susan','Williams','susan.williams013@example.com','07253 113031','1996-09-12','2105143'),(38,'User','Lisa','James','lisa.james610@example.com','07201 574691','1981-05-17','2148151'),(39,'User','Christopher','Allen','christopher.allen471@example.com','07743 884812','1988-04-14','2068538'),(40,'User','Barbara','Scott','barbara.scott482@example.com','07217 247703','1986-06-03','2192803'),(41,'User','Helen','Harrison','helen.harrison004@example.com','07147 807980','1991-11-14','2124452'),(42,'User','Lisa','Ward','lisa.ward998@example.com','07002 503287','2003-03-13','2124819'),(43,'User','Sarah','Smith','sarah.smith672@example.com','07003 411963','1995-12-22','2170720'),(44,'User','Christopher','Davis','christopher.davis580@example.com','07284 160792','1981-12-17','2014177'),(45,'User','Lisa','King','lisa.king633@example.com','07374 961670','1989-09-11','2001832'),(46,'User','Daniel','Harris','daniel.harris495@example.com','07841 326740','1984-12-01','2038638'),(47,'User','Paul','Scott','paul.scott998@example.com','07682 330231','1982-06-06','2018059'),(48,'User','Jane','Hill','jane.hill760@example.com','07581 703195','1991-01-31','2128535'),(49,'User','Thomas','Parker','thomas.parker110@example.com','07438 664037','1996-06-06','2047843'),(50,'User','James','Clark','james.clark236@example.com','07994 415957','1999-09-31','2041292'),(51,'User','James','Parker','james.parker712@example.com','07141 438727','1986-03-20','2008827'),(52,'User','Stephen','Ward','stephen.ward977@example.com','07128 391518','1982-09-14','2088344'),(53,'User','Gary','Evans','gary.evans547@example.com','07618 199753','1993-04-11','2189672'),(54,'User','Paul','Thompson','paul.thompson471@example.com','07785 123106','1989-08-03','2033503'),(55,'User','Janet','Hall','janet.hall596@example.com','07951 782613','1985-10-20','2041698'),(56,'User','Michael','Turner','michael.turner429@example.com','07241 718020','1985-08-07','2093735'),(57,'User','Barbara','Martin','barbara.martin763@example.com','07915 516587','1987-07-11','2016987'),(58,'User','Simon','Jackson','simon.jackson160@example.com','07890 506107','1988-11-03','2020455'),(59,'User','James','Brown','james.brown759@example.com','07925 438387','1996-11-23','2013202'),(60,'User','Karen','Harris','karen.harris555@example.com','07437 323856','2001-07-09','2065579'),(61,'User','Martin','Harris','martin.harris808@example.com','07543 851699','1988-11-21','2089341'),(62,'User','William','Mitchell','william.mitchell971@example.com','07200 632642','1988-03-12','2119629'),(63,'User','Linda','Lee','linda.lee647@example.com','07481 403333','1985-10-27','2041940'),(64,'User','Kevin','Patel','kevin.patel637@example.com','07191 654125','1984-07-03','2079894'),(65,'User','Jean','Harrison','jean.harrison998@example.com','07298 370581','1999-08-21','2135736'),(66,'User','John','James','john.james433@example.com','07587 306206','1986-01-21','2103724'),(67,'User','Anthony','Lee','anthony.lee061@example.com','07603 274339','1987-08-09','2074715'),(68,'User','Nicola','Jones','nicola.jones335@example.com','07646 515700','2001-04-28','2039794'),(69,'User','Barbara','Williams','barbara.williams149@example.com','07242 516272','1984-12-16','2173121'),(70,'User','George','Smith','george.smith792@example.com','07357 177866','1998-05-10','2061444'),(71,'User','Elizabeth','Baker','elizabeth.baker556@example.com','07006 427211','2001-06-29','2096537'),(72,'User','Peter','Thomas','peter.thomas765@example.com','07327 258400','1987-07-09','2066214'),(73,'User','Robert','Johnson','robert.johnson065@example.com','07894 801938','1994-10-03','2040380'),(74,'User','Patricia','Baker','patricia.baker494@example.com','07028 402826','1994-08-14','2140047'),(75,'User','Claire','Bennett','claire.bennett028@example.com','07967 059119','1980-09-28','2194468'),(76,'User','Elizabeth','Davies','elizabeth.davies497@example.com','07054 394239','1984-02-23','2050367'),(77,'User','Claire','Richardson','claire.richardson740@example.com','07896 349921','1987-08-20','2091659'),(78,'User','Helen','Moore','helen.moore660@example.com','07710 323282','1982-04-22','2094139'),(79,'User','David','Wright','david.wright599@example.com','07838 563420','1994-08-26','2136775'),(80,'User','Elizabeth','Green','elizabeth.green383@example.com','07232 362428','1991-11-25','2015531'),(81,'User','Anthony','Mitchell','anthony.mitchell749@example.com','07872 552066','1993-04-10','2103775'),(82,'User','Matthew','Scott','matthew.scott577@example.com','07684 942403','2000-04-22','2089367'),(83,'User','Paul','Thomas','paul.thomas621@example.com','07413 220441','1998-06-11','2104675'),(84,'User','Steven','James','steven.james976@example.com','07157 900414','1983-06-05','2110614'),(85,'User','James','Roberts','james.roberts870@example.com','07995 964711','2002-04-28','2063144'),(86,'User','Paul','Richardson','paul.richardson890@example.com','07576 485411','1990-09-14','2133600'),(87,'User','Emma','Williams','emma.williams823@example.com','07695 459973','1984-11-23','2037906'),(88,'User','Christine','Lee','christine.lee572@example.com','07574 207859','1992-07-10','2003898'),(89,'User','Karen','White','karen.white666@example.com','07016 823917','2001-09-25','2185351'),(90,'User','James','Turner','james.turner246@example.com','07584 362537','1983-05-10','2016663'),(91,'User','Peter','Parker','peter.parker873@example.com','07593 896364','1992-03-27','2080428'),(92,'User','Karen','Clarke','karen.clarke229@example.com','07403 164584','1995-05-05','2150388'),(93,'User','Lisa','Mitchell','lisa.mitchell793@example.com','07733 300631','1980-07-26','2067705'),(94,'User','Margaret','Clark','margaret.clark884@example.com','07441 949876','2000-10-06','2196761'),(95,'User','Richard','Morris','richard.morris387@example.com','07976 672326','1994-11-06','2095496'),(96,'User','Daniel','Harris','daniel.harris827@example.com','07748 804875','2001-06-13','2056452'),(97,'User','Thomas','Baker','thomas.baker794@example.com','07994 249593','1998-08-06','2110222'),(98,'User','Matthew','Phillips','matthew.phillips522@example.com','07653 356698','1992-06-11','2048533'),(99,'User','Sarah','Scott','sarah.scott215@example.com','07300 722673','1998-09-19','2067622'),(100,'User','Michael','Baker','michael.baker268@example.com','07442 914947','2002-10-29','2097220'),(101,'User','Stephen','Hall','stephen.hall753@example.com','07647 058901','1991-01-27','2131709'),(102,'User','Brian','Davis','brian.davis527@example.com','07658 018217','1981-08-25','2186956'),(103,'User','Jean','Wilson','jean.wilson924@example.com','07094 324562','1994-10-29','2082540'),(104,'User','Matthew','Edwards','matthew.edwards740@example.com','07745 044260','1997-09-19','2190639'),(105,'User','Janet','Wright','janet.wright061@example.com','07124 410410','1981-05-25','2020108'),(106,'User','Helen','Turner','helen.turner930@example.com','07245 671982','1994-10-12','2149151'),(107,'User','Christine','Walker','christine.walker805@example.com','07503 935168','1984-10-25','2166071'),(108,'User','Mary','King','mary.king125@example.com','07147 452900','1980-09-28','2034217'),(109,'User','Philip','Allen','philip.allen145@example.com','07133 850513','1993-08-18','2100166'),(110,'User','Martin','Clark','martin.clark311@example.com','07200 579878','1987-04-28','2117729'),(111,'User','Matthew','Williams','matthew.williams230@example.com','07752 465851','1980-12-15','2029426'),(112,'User','Patricia','Martin','patricia.martin722@example.com','07946 190069','1984-02-18','2185949'),(113,'User','Graham','Baker','graham.baker489@example.com','07905 300228','1994-07-16','2155923'),(114,'User','Robert','Jackson','robert.jackson437@example.com','07934 553446','1996-10-28','2168265'),(115,'User','Brian','Lewis','brian.lewis731@example.com','07507 136307','2000-06-20','2065282'),(116,'User','Barbara','Bennett','barbara.bennett126@example.com','07558 462706','1986-05-25','2040481'),(117,'User','William','Richardson','william.richardson042@example.com','07624 403093','2001-04-03','2137550'),(118,'User','Steven','Baker','steven.baker956@example.com','07063 148024','2002-04-01','2070498');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `A02`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `A02` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `A02`;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileNumber` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `responses` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Michael','Thomas','michael.thomas315@example.com','07279 933490','1991-12-05','0'),(2,'Emma','King','emma.king643@example.com','07373 495841','1983-06-31','0'),(3,'Mike','Cooper','michael.cooper201@example.com','07676 538186','2001-06-19','0'),(4,'Emma','Brown','emma.brown537@example.com','07326 130920','2001-02-09','0'),(5,'Helen','Lewis','helen.lewis392@example.com','07279 573396','1985-09-26','0'),(6,'Kevin','Richardson','kevin.richardson478@example.com','07979 425183','1992-05-16','0'),(7,'Colin','Ward','colin.ward515@example.com','07240 376796','1983-01-11','0'),(8,'Claire','Allen','claire.allen491@example.com','07305 848898','1994-10-27','0'),(9,'Patricia','Roberts','patricia.roberts676@example.com','07265 651663','1987-02-18','0'),(10,'David','Jones','david.jones876@example.com','07794 948425','1988-06-13','0');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `A03`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `A03` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `A03`;

--
-- Table structure for table `records`
--

DROP TABLE IF EXISTS `records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(255) NOT NULL,
  `attempt` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `records`
--

LOCK TABLES `records` WRITE;
/*!40000 ALTER TABLE `records` DISABLE KEYS */;
INSERT INTO `records` VALUES (25,'2022-07-10 16:04:58 +0100','failed','123','123123'),(26,'2022-07-10 16:05:00 +0100','failed','er','werwer'),(27,'2022-07-10 16:05:19 +0100','failed','\'or1limit1','123'),(28,'2022-07-10 16:05:44 +0100','failed','\'or1limit1#','123'),(29,'2022-07-10 16:06:13 +0100','success','\' or 1 limit 1#','123'),(30,'2022-07-10 16:07:04 +0100','failed','\'; insert into users values (\"123\", \"123\", \"123\")#','123'),(31,'2022-07-10 16:36:19 +0100','success','123','\' or 1 limit 1;#'),(32,'2022-07-10 16:51:05 +0100','failed','<script>console.log(\"good\")</script>','123123'),(33,'2022-07-10 16:51:54 +0100','failed','<Script>console.log(\"good\")</Script>','123'),(34,'2022-07-10 18:32:57 +0100','failed','123','<script> console.log(\"test1\"); </script>'),(35,'2022-07-10 18:41:57 +0100','failed','<<sscript> console.log(\"test2\"); </script>','123'),(36,'2022-07-10 18:45:29 +0100','failed','123','<SCRIPT> console.log(\"test2\"); </SCRIPT>'),(37,'2022-07-10 22:51:07 +0100','failed','\' or 1=1 #','123'),(38,'2022-07-10 23:02:09 +0100','failed','\'; update users set password=\'123\'#','123'),(39,'2022-07-13 03:09:16 +0100','failed','\' or 1=1 limit #','123'),(40,'2022-07-13 03:09:45 +0100','failed','\' or 1 limit 1#','123'),(41,'2022-07-13 22:37:06 +0100','failed','123','\' or 1=1 limimt 1;--'),(42,'2022-07-13 22:37:23 +0100','failed','123','\' or 1=1 limit 1;--'),(43,'2022-07-13 22:37:47 +0100','failed','123','; or 1 limit 1 #'),(44,'2022-07-13 22:38:05 +0100','success','123','\' or 1 limit 1;#'),(45,'2022-07-13 22:38:25 +0100','failed','123','\' or 1 limit 1;'),(46,'2022-07-13 22:38:41 +0100','failed','123','\' or 1 limit 1;--'),(47,'2022-07-13 22:40:51 +0100','failed','123','\' or password like *;#'),(48,'2022-07-13 22:41:34 +0100','failed','123','\' or password like \'*\'; #'),(49,'2022-07-13 22:44:26 +0100','success','123','\' or 1=1 limit 1;#'),(50,'2022-07-13 22:44:51 +0100','success','123','\' or 1=1 limit 1;#'),(51,'2022-07-13 22:46:03 +0100','success','123','\' or 1=1 limit 1;#'),(52,'2022-07-13 22:46:14 +0100','success','123','\' or 1=1 limit 1;#'),(53,'2022-07-13 22:46:35 +0100','success','123','\' or 1=1 limit 1;#'),(54,'2022-07-13 22:49:09 +0100','success','13','\' or 1=1 limit 1;#'),(55,'2022-07-13 22:49:17 +0100','success','123','\' or 1=1 limit 1;#'),(56,'2022-07-13 22:54:16 +0100','failed','123','\'or1 limit 1#'),(57,'2022-07-13 22:54:41 +0100','success','123','\'or 1 limit 1#'),(58,'2022-07-13 23:03:54 +0100','failed','123','123'),(59,'2022-07-13 23:38:29 +0100','success','123','\'or 1 limit 1#'),(60,'2022-07-21 23:35:00 +0100','failed','\' or 1=1 limit 1','123123dqwed'),(61,'2022-07-21 23:35:22 +0100','failed','\') or 1 limit 1#','qqweqfff'),(62,'2022-07-21 23:35:43 +0100','success','\' or 1 limit 1;#','123123');
/*!40000 ALTER TABLE `records` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'username0000','password0000','User'),(5,'username0101','password0101','User'),(6,'username0202','password0202','User');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `A04`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `A04` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `A04`;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileNumber` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `studentNumber` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'User','Patricia','Patel','patricia.patel268@example.com','07784 319746','1984-09-17','2047736'),(2,'User','Jean','Harris','jean.harris588@example.com','07948 451861','1994-07-10','2140775'),(3,'User','Barbara','Wilson','barbara.wilson841@example.com','07685 543649','1995-01-13','2039887'),(4,'User','Mary','Edwards','mary.edwards506@example.com','07388 982749','2001-11-05','2025181'),(5,'User','Alan','Thompson','alan.thompson402@example.com','07472 524764','1992-11-05','2165378'),(6,'User','Steven','Allen','steven.allen155@example.com','07524 647283','2001-01-07','2159584'),(7,'User','Graham','Phillips','graham.phillips898@example.com','07887 883096','1996-04-09','2116500'),(8,'User','Linda','Wilson','linda.wilson597@example.com','07589 578616','1990-05-01','2168135'),(9,'User','Paul','Smith','paul.smith525@example.com','07199 589474','1997-03-23','2000218'),(10,'User','Jane','Harrison','jane.harrison082@example.com','07925 453045','1988-03-04','2130048');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `A06`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `A06` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `A06`;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Summer','Summer_123788','https://www.randomcompany.com/product/Summer/123788','This is the description of product Summer_123788. Please click on the link to learn more.'),(2,'Summer','Summer_074533','https://www.randomcompany.com/product/Summer/074533','This is the description of product Summer_074533. Please click on the link to learn more.'),(3,'Summer','Summer_118329','https://www.randomcompany.com/product/Summer/118329','This is the description of product Summer_118329. Please click on the link to learn more.'),(4,'Summer','Summer_174009','https://www.randomcompany.com/product/Summer/174009','This is the description of product Summer_174009. Please click on the link to learn more.'),(5,'Pear','Pear_132055','https://www.randomcompany.com/product/Pear/132055','This is the description of product Pear_132055. Please click on the link to learn more.'),(6,'Pear','Pear_098960','https://www.randomcompany.com/product/Pear/098960','This is the description of product Pear_098960. Please click on the link to learn more.'),(7,'Pear','Pear_138966','https://www.randomcompany.com/product/Pear/138966','This is the description of product Pear_138966. Please click on the link to learn more.'),(8,'Pear','Pear_043116','https://www.randomcompany.com/product/Pear/043116','This is the description of product Pear_043116. Please click on the link to learn more.'),(9,'Sonic','Sonic_029287','https://www.randomcompany.com/product/Sonic/029287','This is the description of product Sonic_029287. Please click on the link to learn more.'),(10,'Sonic','Sonic_063200','https://www.randomcompany.com/product/Sonic/063200','This is the description of product Sonic_063200. Please click on the link to learn more.'),(11,'Sonic','Sonic_093610','https://www.randomcompany.com/product/Sonic/093610','This is the description of product Sonic_093610. Please click on the link to learn more.'),(12,'Sonic','Sonic_153572','https://www.randomcompany.com/product/Sonic/153572','This is the description of product Sonic_153572. Please click on the link to learn more.'),(13,'Special','Special_000000','https://www.randomcompany.com/product/Special/000000','This is the description of product Special_000000. Please click on the link to learn more.');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `A07`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `A07` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `A07`;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'v4','3459'),(2,'bw','093'),(3,'5d','9091'),(4,'px','1237');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `A08`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `A08` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `A08`;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `balance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Graham','Hughes','graham.hughes974',3348),(2,'Barbara','Evans','barbara.evans522',5021),(3,'Paul','Hughes','paul.hughes452',9426),(4,'Mark','Roberts','mark.roberts380',7749),(5,'Alan','Phillips','alan.phillips704',3505),(6,'Jean','Taylor','jean.taylor909',6958),(7,'Graham','Hill','graham.hill719',6008),(8,'Mary','Clark','mary.clark187',4459),(9,'Jennifer','Edwards','jennifer.edwards297',5346),(10,'Sarah','Ward','sarah.ward266',5416);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-23 10:35:23
