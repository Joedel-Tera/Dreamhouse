-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dh_database
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `dh_closing`
--

DROP TABLE IF EXISTS `dh_closing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dh_closing` (
  `dh_closing_id` int(11) NOT NULL AUTO_INCREMENT,
  `dh_familyName` varchar(150) DEFAULT NULL,
  `dh_firstName` varchar(45) DEFAULT NULL,
  `dh_phoneNo` varchar(45) DEFAULT NULL,
  `dh_telNo` varchar(45) DEFAULT NULL,
  `dh_subdivision` varchar(45) DEFAULT NULL,
  `dh_location` varchar(45) DEFAULT NULL,
  `dh_developer` varchar(45) DEFAULT NULL,
  `dh_phase` varchar(20) DEFAULT NULL,
  `dh_block` varchar(20) DEFAULT NULL,
  `dh_lot` varchar(20) DEFAULT NULL,
  `dh_houseModel` varchar(45) DEFAULT NULL,
  `dh_floorArea` varchar(45) DEFAULT NULL,
  `dh_lotArea` varchar(45) DEFAULT NULL,
  `dh_termsPayment` varchar(45) DEFAULT NULL,
  `dh_reservationFee` varchar(45) DEFAULT NULL,
  `dh_oiPR` varchar(45) DEFAULT NULL,
  `dh_division` varchar(45) DEFAULT NULL,
  `dh_divisionManager_id` varchar(45) DEFAULT NULL,
  `dh_salesDirector_id` varchar(45) DEFAULT NULL,
  `dh_closingDate` varchar(45) DEFAULT NULL,
  `dh_created_date` varchar(45) DEFAULT NULL,
  `dh_user_id` varchar(45) DEFAULT NULL,
  `dh_prepared_user_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`dh_closing_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dh_closing`
--

LOCK TABLES `dh_closing` WRITE;
/*!40000 ALTER TABLE `dh_closing` DISABLE KEYS */;
INSERT INTO `dh_closing` VALUES (3,'Chan','Tsumi','09367661063','','Ponticelli Hills','Molino, Cavite','Camella Homes','2','8','4','Unknown','50','150',NULL,'15000','','7','90','90','2018-01-20','2018-01-20','0','0'),(4,'Chan','Tsumi','09367661063',NULL,'Ponticelli Hills','Molino, Cavite','Camella Homes','2','8','4','Unknown','50','150',NULL,'15000',NULL,'7','','','2018-01-02','2018-01-20','1','2'),(5,'Chan','Tsumi','09367661063','','Ponticelli Hills 2','Molino, Cavite','Camella Homes','2','8','4','Unknown','50','150',NULL,'15000','','7','','','2018-01-02','2018-01-21','1','2');
/*!40000 ALTER TABLE `dh_closing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dh_developers`
--

DROP TABLE IF EXISTS `dh_developers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dh_developers` (
  `dh_developers_id` int(11) NOT NULL AUTO_INCREMENT,
  `dh_dev_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`dh_developers_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dh_developers`
--

LOCK TABLES `dh_developers` WRITE;
/*!40000 ALTER TABLE `dh_developers` DISABLE KEYS */;
INSERT INTO `dh_developers` VALUES (1,'Camella Homes'),(2,'Antel Grand'),(3,'My Citi Homes'),(4,'Profriends'),(5,'Duraville Realty & Devt. Corp');
/*!40000 ALTER TABLE `dh_developers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dh_house_project`
--

DROP TABLE IF EXISTS `dh_house_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dh_house_project` (
  `dh_house_proj_id` int(11) NOT NULL AUTO_INCREMENT,
  `dh_house_name` varchar(150) DEFAULT NULL,
  `dh_description` varchar(300) DEFAULT NULL,
  `dh_location` varchar(45) DEFAULT NULL,
  `dh_promos` varchar(45) DEFAULT NULL,
  `dh_date_created` varchar(45) DEFAULT NULL,
  `dh_user_id` int(11) NOT NULL,
  PRIMARY KEY (`dh_house_proj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dh_house_project`
--

LOCK TABLES `dh_house_project` WRITE;
/*!40000 ALTER TABLE `dh_house_project` DISABLE KEYS */;
/*!40000 ALTER TABLE `dh_house_project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dh_images`
--

DROP TABLE IF EXISTS `dh_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dh_images` (
  `dh_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `dh_house_project_id` int(11) DEFAULT NULL,
  `isHouseSample` int(11) DEFAULT '0',
  `isFloorPlan` int(11) DEFAULT '0',
  `isAmenities` int(11) DEFAULT '0',
  `dh_image_path` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`dh_image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dh_images`
--

LOCK TABLES `dh_images` WRITE;
/*!40000 ALTER TABLE `dh_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `dh_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dh_news`
--

DROP TABLE IF EXISTS `dh_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dh_news` (
  `dh_news_id` int(11) NOT NULL AUTO_INCREMENT,
  `dh_title` varchar(200) DEFAULT NULL,
  `dh_content` varchar(1000) DEFAULT NULL,
  `dh_image` varchar(150) DEFAULT NULL,
  `dh_date_created` varchar(45) DEFAULT NULL,
  `dh_status` int(11) DEFAULT '0',
  PRIMARY KEY (`dh_news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dh_news`
--

LOCK TABLES `dh_news` WRITE;
/*!40000 ALTER TABLE `dh_news` DISABLE KEYS */;
/*!40000 ALTER TABLE `dh_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dh_subdivisions`
--

DROP TABLE IF EXISTS `dh_subdivisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dh_subdivisions` (
  `dh_subd_id` int(11) NOT NULL AUTO_INCREMENT,
  `dh_subd_dev_id` varchar(45) DEFAULT NULL,
  `dh_subd_name` varchar(45) DEFAULT NULL,
  `dh_subd_location` varchar(45) DEFAULT NULL,
  `dh_subd_description` varchar(300) DEFAULT NULL,
  `dh_sudb_logo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`dh_subd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dh_subdivisions`
--

LOCK TABLES `dh_subdivisions` WRITE;
/*!40000 ALTER TABLE `dh_subdivisions` DISABLE KEYS */;
INSERT INTO `dh_subdivisions` VALUES (6,'4','Lancaster New City',NULL,'',NULL),(7,'4','Bellefort Estates',NULL,NULL,NULL),(8,'4','Carmona Estates',NULL,NULL,NULL),(9,'3','IL Guardino',NULL,NULL,NULL),(10,'5','Wellington Place',NULL,NULL,NULL),(11,'5','Hamilton Homes',NULL,NULL,NULL);
/*!40000 ALTER TABLE `dh_subdivisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dh_user_details`
--

DROP TABLE IF EXISTS `dh_user_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dh_user_details` (
  `dh_user_details_id` int(11) NOT NULL,
  `dh_firstName` varchar(150) DEFAULT NULL,
  `dh_middleName` varchar(45) DEFAULT NULL,
  `dh_lastName` varchar(150) DEFAULT NULL,
  `dh_user_spousename` varchar(150) DEFAULT NULL,
  `dh_user_nickname` varchar(100) DEFAULT NULL,
  `dh_bday` varchar(100) DEFAULT NULL,
  `dh_age` int(11) DEFAULT NULL,
  `dh_gender` varchar(10) DEFAULT NULL,
  `dh_tin_number` int(9) DEFAULT NULL,
  `dh_email_address` varchar(45) DEFAULT NULL,
  `dh_contact_no` varchar(100) DEFAULT NULL,
  `dh_home_address` varchar(200) DEFAULT NULL,
  `dh_occupation` varchar(100) DEFAULT NULL,
  `dh_seminar_date` varchar(150) DEFAULT NULL,
  `dh_seminar_venue` varchar(150) DEFAULT NULL,
  `dh_recruited_by` varchar(150) DEFAULT NULL,
  `dh_recruited_by_position` varchar(150) DEFAULT NULL,
  `dh_recruited_by_division` varchar(150) DEFAULT NULL,
  `dh_trainor_name` varchar(150) DEFAULT NULL,
  `dh_sales_director` varchar(150) DEFAULT NULL,
  `dh_division_manager` varchar(150) DEFAULT NULL,
  `dh_executive_broker` varchar(150) DEFAULT 'Rodelio D. Parafina',
  `dh_realty_name` varchar(45) DEFAULT NULL,
  `dh_realty_pos` varchar(45) DEFAULT NULL,
  `dh_realty_from` varchar(45) DEFAULT NULL,
  `dh_realty_to` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`dh_user_details_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dh_user_details`
--

LOCK TABLES `dh_user_details` WRITE;
/*!40000 ALTER TABLE `dh_user_details` DISABLE KEYS */;
INSERT INTO `dh_user_details` VALUES (1,'Joedel','Bangcuyo','Espinosa','','Tsumiii','01-10-2018',26,'Male',999999999,'Strafer14@yahoo.com','09367661063','Las Pinas','','01-02-2018','Test Seminar','','','','','','','Rodelio D. Parafina','','','',''),(2,'Joedel Test','Bangcuyo','Espinosa','','Tsumiii Test','01-03-2018',15,'Male',999999999,'Strafer13@yahoo.com','09367661063','Las Pinas','','12-27-2017','Test Seminar','','','','','','','Rodelio D. Parafina','','','',''),(3,'Joedel Sales','Bangcuyo','Espinosa','','Tsumiii Sales','01-03-2018',25,'Male',999999999,'Strafer14@yahoo.com','09367661063','Las Pinas','','01-03-2018','Test Seminar','','','','',NULL,'Select Division Manager','Rodelio D. Parafina','','','',''),(4,'Joedel Manager','Bangcuyo','Espinosa','','Tsumiii Manager','',25,'Male',999999999,'Strafer14@yahoo.com','09367661063','Las Pinas','','','Test Seminar','','','','',NULL,NULL,'Rodelio D. Parafina','','','',''),(5,'renz','','Anima','','','12-08-1997',20,'Male',0,'renzanima@gmail.com','09538312034','imus, cavite','','01-19-2018','Gen Trias, Cavite','','','','','','','Rodelio D. Parafina','','','',''),(6,'Melvin jay','','Erlano','','','',20,'Male',0,'erlanomelvin@gmail.com','09268317604','Addas, Bacoor, Cavite','','','Gen Trias, Cavite','','','8','',NULL,NULL,'Rodelio D. Parafina','','','',''),(7,'Reuben','','Llanes','','','',20,'Male',0,'bimbyllanes@gmail.com','09768311977','Zapote, Cavite','','','Bacoor, Cavite','','','7','',NULL,NULL,'Rodelio D. Parafina','','','',''),(8,'Chino','Paso','Apacible','','','06-24-1995',22,'Male',0,'chinopapac@yahoo.com','09750123959','Paliparan, Cavite','','01-18-2018','Gen Trias, Cavite','Melvin Jay Erlano','Division Manager','8','',NULL,'6','Rodelio D. Parafina','','','',''),(9,'Grant','','Necia','','','11-02-1997',25,'Male',0,'grantneciagrant@gmail.com','09994172155','Summer Pointe, Molino, Cavite','','','','Reuben Llanes','Division Manager','7','',NULL,'7','Rodelio D. Parafina','','','',''),(10,'Rustine','','Agbayani','','','05-10-1996',23,'Male',0,'louiseagbayani@ymail.com','09278102034','Dasmarinas, Cavite','','','','Grant Necia','Sales Director','7','','Grant Necia','Reuben Llanes','Rodelio D. Parafina','','','',''),(11,'Karl','','Gonzales','','','02-14-1995',21,'Male',0,'Guitarpick@gmail.com','09095012346','Paliparan, Cavite','','10-16-1997','Gen Trias, Cavite','Chino Apacible','Sales Director','8','','Chino Apacible','Melvin jay Erlano','Rodelio D. Parafina','','','','');
/*!40000 ALTER TABLE `dh_user_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dh_user_education`
--

DROP TABLE IF EXISTS `dh_user_education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dh_user_education` (
  `dh_user_educ_id` int(11) NOT NULL AUTO_INCREMENT,
  `dh_user_id` int(11) DEFAULT NULL,
  `dh_school_name` varchar(150) DEFAULT NULL,
  `dh_school_location` varchar(150) DEFAULT NULL,
  `dh_attainment` varchar(150) DEFAULT NULL,
  `dh_year_from` varchar(25) DEFAULT NULL,
  `dh_year_to` varchar(25) DEFAULT NULL,
  `is_vocational` int(11) DEFAULT '0',
  PRIMARY KEY (`dh_user_educ_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dh_user_education`
--

LOCK TABLES `dh_user_education` WRITE;
/*!40000 ALTER TABLE `dh_user_education` DISABLE KEYS */;
INSERT INTO `dh_user_education` VALUES (1,1,'School','School 1 Location','1','2000','2004',0),(2,1,'School','School 2 Location','2','1996','2000',0),(3,1,'School','School 3 Location','3','2000','2000',0),(4,1,'School','School 4 Location','4','1000','1000',0),(5,2,'School','School 1 Location','1','2000','2004',0),(6,2,'School','School 1 Location','1','2000','2004',0),(7,2,'School','School 1 Location','1','2000','2004',0),(8,2,'School','School 1 Location','1','2000','2004',0),(9,3,'School','School 1 Location','BSIT','2000','2004',0),(10,3,'','','','','',0),(11,3,'','','','','',0),(12,3,'','','','','',0),(13,4,'School','School 1 Location','BSAC','2000','2004',0),(14,4,'','','','','',0),(15,4,'','','','','',0),(16,4,'','','','','',0),(17,5,'perpetual molino','bacoor, cavite','BSIT','2014','2018',0),(18,5,'','','','','',0),(19,5,'','','','','',0),(20,5,'','','','','',0),(21,6,'perpetual molino','molino, bacoor, cavite','BSIT','2014','2018',0),(22,6,'','','','','',0),(23,6,'','','','','',0),(24,6,'','','','','',0),(25,7,'CVSU Imus','Imus, Cavite','BS Marine','2012','2017',0),(26,7,'','','','','',0),(27,7,'','','','','',0),(28,7,'','','','','',0),(29,8,'DLSU Dasmarinas','Dasmarinas, Cavite','BS Engineer','2013','2019',0),(30,8,'','','','','',0),(31,8,'','','','','',0),(32,8,'','','','','',0),(33,9,'Adamson University','Carmona, Cavite','BSBA','2011','2016',0),(34,9,'','','','','',0),(35,9,'','','','','',0),(36,9,'','','','','',0),(37,10,'FEU Cavite','Silang, Cavite','BSIT','2014','2019',0),(38,10,'','','','','',0),(39,10,'','','','','',0),(40,10,'','','','','',0),(41,11,'LPU Cavite','Gen Trias, Cavite','BS Architecture','2012','2015',0),(42,11,'','','','','',0),(43,11,'','','','','',0),(44,11,'','','','','',0);
/*!40000 ALTER TABLE `dh_user_education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dh_user_groups`
--

DROP TABLE IF EXISTS `dh_user_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dh_user_groups` (
  `dh_user_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `dh_user_group_name` varchar(45) DEFAULT NULL,
  `dh_user_access_lvl` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`dh_user_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dh_user_groups`
--

LOCK TABLES `dh_user_groups` WRITE;
/*!40000 ALTER TABLE `dh_user_groups` DISABLE KEYS */;
INSERT INTO `dh_user_groups` VALUES (1,'Admin','9999'),(2,'Division Manager','5000'),(3,'Sales Director','4000'),(4,'Sales Agent','3000'),(5,'Employee','1000');
/*!40000 ALTER TABLE `dh_user_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dh_users`
--

DROP TABLE IF EXISTS `dh_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dh_users` (
  `dh_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `dh_user_group_id` int(11) DEFAULT NULL,
  `dh_user_details_id` int(11) DEFAULT NULL,
  `dh_user_name` varchar(200) DEFAULT NULL,
  `dh_user_pass` varchar(200) DEFAULT NULL,
  `dh_date_created` varchar(45) DEFAULT NULL,
  `dh_status` varchar(45) DEFAULT 'Active',
  `is_deleted` int(11) DEFAULT '0',
  `login_counter` int(11) DEFAULT '0',
  `dh_account_create` varchar(25) DEFAULT 'Registration',
  PRIMARY KEY (`dh_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dh_users`
--

LOCK TABLES `dh_users` WRITE;
/*!40000 ALTER TABLE `dh_users` DISABLE KEYS */;
INSERT INTO `dh_users` VALUES (1,5,1,'Tsumichan','VHN1bWljaGFuMTI=','01-16-2018','Active',0,0,NULL),(2,4,2,'Tsumichan12','VHN1bWljaGFuMTI=','01-20-2018','Active',0,0,'Registration'),(3,3,3,'TsumiSales','VHN1bWljaGFuMTI=','01-21-2018','For Activation',0,0,'Encode'),(4,2,4,'TsumiManager','VHN1bWljaGFuMTI=','01-21-2018','For Activation',0,0,'Encode');
/*!40000 ALTER TABLE `dh_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-22  2:03:31
