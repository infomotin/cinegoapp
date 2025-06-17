-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cinegoapp
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `addresses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `property_id` bigint unsigned NOT NULL,
  `country_id` bigint unsigned NOT NULL,
  `division_id` bigint unsigned NOT NULL,
  `district_id` bigint unsigned NOT NULL,
  `zone_id` bigint unsigned NOT NULL,
  `city_id` bigint unsigned NOT NULL,
  `police_station_id` bigint unsigned NOT NULL,
  `road_id` bigint unsigned NOT NULL,
  `landmark_id` bigint unsigned NOT NULL,
  `word_id` bigint unsigned NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartment_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `addresses_property_id_foreign` (`property_id`),
  KEY `addresses_country_id_foreign` (`country_id`),
  KEY `addresses_division_id_foreign` (`division_id`),
  KEY `addresses_district_id_foreign` (`district_id`),
  KEY `addresses_zone_id_foreign` (`zone_id`),
  KEY `addresses_city_id_foreign` (`city_id`),
  KEY `addresses_police_station_id_foreign` (`police_station_id`),
  KEY `addresses_road_id_foreign` (`road_id`),
  KEY `addresses_landmark_id_foreign` (`landmark_id`),
  KEY `addresses_word_id_foreign` (`word_id`),
  CONSTRAINT `addresses_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `addresses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  CONSTRAINT `addresses_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `addresses_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `addresses_landmark_id_foreign` FOREIGN KEY (`landmark_id`) REFERENCES `landmarks` (`id`) ON DELETE CASCADE,
  CONSTRAINT `addresses_police_station_id_foreign` FOREIGN KEY (`police_station_id`) REFERENCES `police_stations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `addresses_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  CONSTRAINT `addresses_road_id_foreign` FOREIGN KEY (`road_id`) REFERENCES `roads` (`id`) ON DELETE CASCADE,
  CONSTRAINT `addresses_word_id_foreign` FOREIGN KEY (`word_id`) REFERENCES `words` (`id`) ON DELETE CASCADE,
  CONSTRAINT `addresses_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;

--
-- Table structure for table `amenities`
--

DROP TABLE IF EXISTS `amenities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `amenities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `amenities_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amenities`
--

/*!40000 ALTER TABLE `amenities` DISABLE KEYS */;
INSERT INTO `amenities` VALUES (1,'Orson Boyer','2025-05-08 22:17:45','2025-05-08 22:24:51'),(3,'Fay Woodard','2025-05-08 22:24:55','2025-05-08 22:24:55'),(4,'Uta Sherman','2025-05-08 22:24:59','2025-05-08 22:24:59'),(6,'Air Conditioning','2025-05-13 22:30:01','2025-05-13 22:30:01'),(7,'Cleaning Service','2025-05-13 22:30:10','2025-05-13 22:30:10'),(8,'Refrigerator','2025-05-13 22:30:17','2025-05-13 22:30:17'),(9,'Gym','2025-05-13 22:30:24','2025-05-13 22:30:24'),(10,'Pet Friendly','2025-05-13 22:30:32','2025-05-13 22:30:32'),(11,'Swimming Pool','2025-05-13 22:30:43','2025-05-13 22:30:43'),(12,'Pet Friendly','2025-05-13 22:30:47','2025-05-13 22:30:47'),(13,'Basketball Court','2025-05-13 22:30:56','2025-05-13 22:30:56'),(14,'Outdoor Shower','2025-05-13 22:31:10','2025-05-13 22:31:10');
/*!40000 ALTER TABLE `amenities` ENABLE KEYS */;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_zone_id_foreign` (`zone_id`),
  CONSTRAINT `cities_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;

--
-- Table structure for table `compares`
--

DROP TABLE IF EXISTS `compares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compares` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `property_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `compares_user_id_foreign` (`user_id`),
  KEY `compares_property_id_foreign` (`property_id`),
  CONSTRAINT `compares_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  CONSTRAINT `compares_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compares`
--

/*!40000 ALTER TABLE `compares` DISABLE KEYS */;
INSERT INTO `compares` VALUES (2,2,5,'2025-05-28 22:02:47','2025-05-28 22:02:47'),(4,2,9,'2025-05-28 22:21:46','2025-05-28 22:21:46'),(5,2,10,'2025-05-30 23:56:44','2025-05-30 23:56:44');
/*!40000 ALTER TABLE `compares` ENABLE KEYS */;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'flaug',
  PRIMARY KEY (`id`),
  UNIQUE KEY `countries_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'Bangladesh','2025-06-01 03:48:08','2025-06-01 03:48:08','country/flaug/202506010948.jpg');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `districts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `districts_division_id_foreign` (`division_id`),
  CONSTRAINT `districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `districts`
--

/*!40000 ALTER TABLE `districts` DISABLE KEYS */;
/*!40000 ALTER TABLE `districts` ENABLE KEYS */;

--
-- Table structure for table `divisions`
--

DROP TABLE IF EXISTS `divisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `divisions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `divisions_country_id_foreign` (`country_id`),
  CONSTRAINT `divisions_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `divisions`
--

/*!40000 ALTER TABLE `divisions` DISABLE KEYS */;
INSERT INTO `divisions` VALUES (1,'Dhaka',1,'2025-06-02 04:44:50','2025-06-02 04:44:50'),(2,'Khulna',1,'2025-06-02 04:46:02','2025-06-02 04:46:02'),(3,'Sylhet',1,'2025-06-02 04:46:44','2025-06-02 04:46:44');
/*!40000 ALTER TABLE `divisions` ENABLE KEYS */;

--
-- Table structure for table `facility_properties`
--

DROP TABLE IF EXISTS `facility_properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facility_properties` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `property_id` int NOT NULL,
  `facility_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facility_distance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facility_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facility_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility_properties`
--

/*!40000 ALTER TABLE `facility_properties` DISABLE KEYS */;
INSERT INTO `facility_properties` VALUES (1,3,'Bank','1',NULL,NULL,NULL,NULL,NULL),(2,3,'Railways','1',NULL,NULL,NULL,NULL,NULL),(3,1,'SuperMarket','1',NULL,NULL,NULL,NULL,NULL),(4,1,'Railways','2',NULL,NULL,NULL,NULL,NULL),(5,1,'Pharmacy','3',NULL,NULL,NULL,NULL,NULL),(6,2,'SuperMarket','1',NULL,NULL,NULL,NULL,NULL),(7,2,'Railways','2',NULL,NULL,NULL,NULL,NULL),(8,2,'Pharmacy','3',NULL,NULL,NULL,NULL,NULL),(9,3,'Mall','1',NULL,NULL,NULL,NULL,NULL),(10,3,'Airport','1',NULL,NULL,NULL,NULL,NULL),(11,3,'Bus Stop','2',NULL,NULL,NULL,NULL,NULL),(12,3,'Pharmacy','1',NULL,NULL,NULL,NULL,NULL),(31,4,'Bus Stop','23',NULL,NULL,NULL,NULL,NULL),(32,4,'Airport','21',NULL,NULL,NULL,NULL,NULL),(33,5,'School','1',NULL,NULL,NULL,NULL,NULL),(34,5,'Beach','1',NULL,NULL,NULL,NULL,NULL),(35,6,'Bank','1',NULL,NULL,NULL,NULL,NULL),(36,6,'School','2',NULL,NULL,NULL,NULL,NULL),(37,7,'Bank','1',NULL,NULL,NULL,NULL,NULL),(38,7,'School','2',NULL,NULL,NULL,NULL,NULL),(39,8,'Bank','1',NULL,NULL,NULL,NULL,NULL),(40,8,'School','2',NULL,NULL,NULL,NULL,NULL),(42,9,'SuperMarket','1',NULL,NULL,NULL,NULL,NULL),(43,9,'Bank','2',NULL,NULL,NULL,NULL,NULL),(44,9,'Bus Stop','.5',NULL,NULL,NULL,NULL,NULL),(45,10,'School','1',NULL,NULL,NULL,NULL,NULL),(46,10,'Beach','2',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `facility_properties` ENABLE KEYS */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

--
-- Table structure for table `landmarks`
--

DROP TABLE IF EXISTS `landmarks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `landmarks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `word_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `landmarks_word_id_foreign` (`word_id`),
  CONSTRAINT `landmarks_word_id_foreign` FOREIGN KEY (`word_id`) REFERENCES `words` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `landmarks`
--

/*!40000 ALTER TABLE `landmarks` DISABLE KEYS */;
/*!40000 ALTER TABLE `landmarks` ENABLE KEYS */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2025_05_07_070054_create_property_types_table',2),(6,'2025_05_07_092535_create_amenities_table',3),(7,'2025_05_12_042658_create_properties_table',4),(8,'2025_05_12_043857_create_multi_image_properties_table',4),(9,'2025_05_12_044049_create_facility_properties_table',4),(10,'2025_05_24_062224_create_package_plans_table',5),(11,'2025_05_27_023446_create_wishlists_table',6),(12,'2025_05_27_083657_create_compares_table',7),(13,'2025_05_29_042413_create_property_messages_table',8),(14,'2025_06_01_024215_create_countries_table',9),(15,'2025_06_01_024239_create_divisions_table',9),(16,'2025_06_01_024309_create_districts_table',9),(17,'2025_06_01_024323_create_zones_table',9),(18,'2025_06_01_024822_create_cities_table',10),(19,'2025_06_01_024833_create_words_table',10),(20,'2025_06_01_024856_create_landmarks_table',10),(21,'2025_06_01_030126_create_police_stations_table',10),(22,'2025_06_01_030937_create_roads_table',11),(23,'2025_06_01_032648_create_addresses_table',12);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

--
-- Table structure for table `multi_image_properties`
--

DROP TABLE IF EXISTS `multi_image_properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `multi_image_properties` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `property_id` int NOT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multi_image_properties`
--

/*!40000 ALTER TABLE `multi_image_properties` DISABLE KEYS */;
INSERT INTO `multi_image_properties` VALUES (1,2,'upload/property/multi_image/1831909856004586.jpg','1831909856004586.jpg','2025-05-12 04:22:59',NULL),(2,2,'upload/property/multi_image/1831909856137729.jpg','1831909856137729.jpg','2025-05-12 04:22:59',NULL),(3,2,'upload/property/multi_image/1831909856271875.jpg','1831909856271875.jpg','2025-05-12 04:23:00',NULL),(4,2,'upload/property/multi_image/1831909856457175.jpg','1831909856457175.jpg','2025-05-12 04:23:00',NULL),(5,2,'upload/property/multi_image/1831909856608299.jpg','1831909856608299.jpg','2025-05-12 04:23:00',NULL),(6,2,'upload/property/multi_image/1831909856745000.jpg','1831909856745000.jpg','2025-05-12 04:23:00',NULL),(7,2,'upload/property/multi_image/1831909856887421.jpg','1831909856887421.jpg','2025-05-12 04:23:00',NULL),(8,2,'upload/property/multi_image/1831909857021499.jpg','1831909857021499.jpg','2025-05-12 04:23:00',NULL),(9,2,'upload/property/multi_image/1831909857154154.jpg','1831909857154154.jpg','2025-05-12 04:23:00',NULL),(10,2,'upload/property/multi_image/1831909857278551.jpg','1831909857278551.jpg','2025-05-12 04:23:01',NULL),(11,3,'upload/property/multi_image/1832068805610892.jpg','1832068805610892.jpg','2025-05-13 22:29:25',NULL),(12,3,'upload/property/multi_image/1832068805759192.jpg','1832068805759192.jpg','2025-05-13 22:29:26',NULL),(13,3,'upload/property/multi_image/1832068805949124.jpg','1832068805949124.jpg','2025-05-13 22:29:26',NULL),(14,3,'upload/property/multi_image/1832068806094532.jpg','1832068806094532.jpg','2025-05-13 22:29:26',NULL),(15,3,'upload/property/multi_image/1832068806231819.jpg','1832068806231819.jpg','2025-05-13 22:29:26',NULL),(16,3,'upload/property/multi_image/1832068806378998.jpg','1832068806378998.jpg','2025-05-13 22:29:26',NULL),(17,4,'upload/property/multi_image/1832084807681014.jpg','1832084807681014.jpg','2025-05-13 23:26:28','2025-05-14 02:43:46'),(18,4,'upload/property/multi_image/1832072394605151.jpg','1832072394605151.jpg','2025-05-13 23:26:28',NULL),(19,4,'upload/property/multi_image/1832072394740736.jpg','1832072394740736.jpg','2025-05-13 23:26:28',NULL),(23,5,'upload/property/multi_image/1832717333028122.jpg','1832717333028122.jpg','2025-05-21 02:17:29',NULL),(24,5,'upload/property/multi_image/1832717333161550.jpg','1832717333161550.jpg','2025-05-21 02:17:30',NULL),(25,5,'upload/property/multi_image/1832717333342470.jpg','1832717333342470.jpg','2025-05-21 02:17:30',NULL),(26,6,'upload/property/multi_image/1832991013064562.jpg','1832991013064562.jpg','2025-05-24 02:47:31',NULL),(27,6,'upload/property/multi_image/1832991013198323.jpg','1832991013198323.jpg','2025-05-24 02:47:31',NULL),(28,6,'upload/property/multi_image/1832991013336242.jpg','1832991013336242.jpg','2025-05-24 02:47:31',NULL),(29,7,'upload/property/multi_image/1832991135143618.jpg','1832991135143618.jpg','2025-05-24 02:49:27',NULL),(30,7,'upload/property/multi_image/1832991135276598.jpg','1832991135276598.jpg','2025-05-24 02:49:28',NULL),(31,7,'upload/property/multi_image/1832991135456020.jpg','1832991135456020.jpg','2025-05-24 02:49:28',NULL),(32,8,'upload/property/multi_image/1832991493536597.jpg','1832991493536597.jpg','2025-05-24 02:55:09',NULL),(33,8,'upload/property/multi_image/1832991493669815.jpg','1832991493669815.jpg','2025-05-24 02:55:09',NULL),(34,8,'upload/property/multi_image/1832991493804786.jpg','1832991493804786.jpg','2025-05-24 02:55:10',NULL),(35,9,'upload/property/multi_image/1833060674735684.jpg','1833060674735684.jpg','2025-05-24 21:14:46',NULL),(36,9,'upload/property/multi_image/1833060674934169.jpg','1833060674934169.jpg','2025-05-24 21:14:46',NULL),(37,10,'upload/property/multi_image/1833613615318487.jpg','1833613615318487.jpg','2025-05-30 23:43:31',NULL),(38,10,'upload/property/multi_image/1833613615466296.jpg','1833613615466296.jpg','2025-05-30 23:43:31',NULL),(39,10,'upload/property/multi_image/1833613615604298.jpg','1833613615604298.jpg','2025-05-30 23:43:31',NULL);
/*!40000 ALTER TABLE `multi_image_properties` ENABLE KEYS */;

--
-- Table structure for table `p_s`
--

DROP TABLE IF EXISTS `p_s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `p_s` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `p_s`
--

/*!40000 ALTER TABLE `p_s` DISABLE KEYS */;
/*!40000 ALTER TABLE `p_s` ENABLE KEYS */;

--
-- Table structure for table `package_plans`
--

DROP TABLE IF EXISTS `package_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `package_plans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_start_date` date DEFAULT NULL,
  `package_end_date` date DEFAULT NULL,
  `package_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_is_offer` int DEFAULT NULL,
  `promo_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package_plans`
--

/*!40000 ALTER TABLE `package_plans` DISABLE KEYS */;
INSERT INTO `package_plans` VALUES (1,3,'Business','20','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-24 21:09:41',NULL,'ERS26474'),(2,3,'professional','100','50',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-24 21:43:56',NULL,'ERS15077'),(3,3,'basic','0','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-24 21:44:03',NULL,'ERS83479'),(4,20,'business','20','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-30 23:58:11',NULL,'ERS61009');
/*!40000 ALTER TABLE `package_plans` ENABLE KEYS */;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `permission_id` int NOT NULL AUTO_INCREMENT,
  `permission` varchar(255) NOT NULL,
  `role_id` int DEFAULT NULL,
  PRIMARY KEY (`permission_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'home/index',1),(2,'account/index',1),(3,'account/edit',1),(4,'amenities/view',1),(5,'amenities/add',1),(6,'amenities/edit',1),(7,'amenities/delete',1),(8,'amenities/importdata',1),(9,'facilityproperties/view',1),(10,'facilityproperties/add',1),(11,'facilityproperties/edit',1),(12,'facilityproperties/delete',1),(13,'facilityproperties/importdata',1),(14,'multiimageproperties/view',1),(15,'multiimageproperties/add',1),(16,'multiimageproperties/edit',1),(17,'multiimageproperties/delete',1),(18,'multiimageproperties/importdata',1),(19,'packageplans/view',1),(20,'packageplans/add',1),(21,'packageplans/edit',1),(22,'packageplans/delete',1),(23,'packageplans/importdata',1),(24,'properties/view',1),(25,'properties/add',1),(26,'properties/edit',1),(27,'properties/delete',1),(28,'properties/importdata',1),(29,'propertytypes/view',1),(30,'propertytypes/add',1),(31,'propertytypes/edit',1),(32,'propertytypes/delete',1),(33,'propertytypes/importdata',1),(34,'users/view',1),(35,'users/add',1),(36,'users/edit',1),(37,'users/delete',1),(38,'users/importdata',1),(39,'amenities/index',1),(40,'facilityproperties/index',1),(41,'multiimageproperties/index',1),(42,'packageplans/index',1),(43,'properties/index',1),(44,'propertytypes/index',1),(45,'users/index',1),(46,'home/index',2),(47,'account/index',2),(48,'account/edit',2),(49,'amenities/index',2),(50,'facilityproperties/index',2),(51,'multiimageproperties/index',2),(52,'packageplans/index',2),(53,'properties/index',2),(54,'propertytypes/index',2),(55,'users/index',2),(56,'home/index',3),(57,'account/index',3),(58,'account/edit',3),(59,'amenities',3),(60,'amenities/view',3),(61,'amenities/add',3),(62,'amenities/edit',3),(63,'amenities/delete',3),(64,'amenities/importdata',3),(65,'facilityproperties',3),(66,'facilityproperties/view',3),(67,'facilityproperties/add',3),(68,'facilityproperties/edit',3),(69,'facilityproperties/delete',3),(70,'facilityproperties/importdata',3),(71,'multiimageproperties',3),(72,'multiimageproperties/view',3),(73,'multiimageproperties/add',3),(74,'multiimageproperties/edit',3),(75,'multiimageproperties/delete',3),(76,'multiimageproperties/importdata',3),(77,'packageplans',3),(78,'packageplans/view',3),(79,'packageplans/add',3),(80,'packageplans/edit',3),(81,'packageplans/delete',3),(82,'packageplans/importdata',3),(83,'properties',3),(84,'properties/view',3),(85,'properties/add',3),(86,'properties/edit',3),(87,'properties/delete',3),(88,'properties/importdata',3),(89,'propertytypes',3),(90,'propertytypes/view',3),(91,'propertytypes/add',3),(92,'propertytypes/edit',3),(93,'propertytypes/delete',3),(94,'propertytypes/importdata',3),(95,'users',3),(96,'users/view',3),(97,'users/add',3),(98,'users/edit',3),(99,'users/delete',3),(100,'users/importdata',3);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

--
-- Table structure for table `police_stations`
--

DROP TABLE IF EXISTS `police_stations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `police_stations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `police_stations_city_id_foreign` (`city_id`),
  CONSTRAINT `police_stations_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `police_stations`
--

/*!40000 ALTER TABLE `police_stations` DISABLE KEYS */;
/*!40000 ALTER TABLE `police_stations` ENABLE KEYS */;

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `properties` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ptype_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amenities_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lowest_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_thambnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_descp` text COLLATE utf8mb4_unicode_ci,
  `long_descp` text COLLATE utf8mb4_unicode_ci,
  `bedrooms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bathrooms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `garage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `garage_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_video` text COLLATE utf8mb4_unicode_ci,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartment_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landmark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `neighborhood` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_id` int DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_status` int DEFAULT NULL,
  `view_count` int NOT NULL DEFAULT '0',
  `like_count` int NOT NULL DEFAULT '0',
  `dislike_count` int NOT NULL DEFAULT '0',
  `comment_count` int NOT NULL DEFAULT '0',
  `share_count` int NOT NULL DEFAULT '0',
  `save_count` int NOT NULL DEFAULT '0',
  `report_count` int NOT NULL DEFAULT '0',
  `favorite_count` int NOT NULL DEFAULT '0',
  `bookmark_count` int NOT NULL DEFAULT '0',
  `follow_count` int NOT NULL DEFAULT '0',
  `unfollow_count` int NOT NULL DEFAULT '0',
  `block_count` int NOT NULL DEFAULT '0',
  `unblock_count` int NOT NULL DEFAULT '0',
  `hide_count` int NOT NULL DEFAULT '0',
  `unhide_count` int NOT NULL DEFAULT '0',
  `report_status` int NOT NULL DEFAULT '0',
  `report_reason` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `properties`
--

/*!40000 ALTER TABLE `properties` DISABLE KEYS */;
INSERT INTO `properties` VALUES (4,'3','1,4,6,9,12,13','The Citizen Update','the-citizen-update','2500000001','rent','128','117','upload/property/thambnail/1832076962525342.jpg','Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud exercitation laboris nisi ut aliquip ea commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur occaecat','Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud exercitation laboris nisi ut aliquip ea commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur occaecat\r\n\r\nExcepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim est laborum. Sed perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium totam rem aperiam.','5','3','1','120','1200','Magni id lorem quia','James Lynch','Troy Hubbard','959','Fay Medina','431','812','Velit aut eveniet','Quia debitis velit','Heidi Bell','Ipsam odit dolorem i','Amena Case','50241','Sint aut eius alias','Molestias exercitati','1',NULL,'A ducimus error eos','123','3432',NULL,'1',3,'0','3','3',NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-13 23:26:28','2025-05-21 20:19:52'),(5,'5','7,9,10,14','Carl Meyer','carl-meyer','2500000002','buy','709','330','upload/property/thambnail/1832717332546934.jpg','Enim beatae in quis','Amet et cupiditate','6','2','1','1234','1234','Voluptate nihil ipsa','Orla Zimmerman','Kareem Kinney','846','William Reed','662','112','Aliquam sit et saep','Perferendis aut sint','Ulric Larsen','Culpa assumenda arc','Valentine Brewer','19951','Dolor consequatur a','Ut illo quos ducimus','1',NULL,'Aspernatur itaque ac','123','123','1','1',3,'0','3','3',NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-21 02:17:29','2025-05-21 02:17:29'),(6,'3','4,6','Fritz Bradshaw','fritz-bradshaw','2500000003','rent','106','495','upload/property/thambnail/1832991012468582.jpg','Delectus consequat','Voluptatum veniam a','4','3','1','12','1230','Laborum enim sunt qu','Carl Horn','Myra French','941','Althea Holt','610','808','Enim molestiae do se','Eiusmod soluta in ob','Ryder Valencia','Velit molestiae et l','Myles Doyle','64819','Commodi dolorem et e','Hic est incididunt','1',NULL,'Aliquam porro est el','12','12',NULL,'1',3,'0','3','3',NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-24 02:47:31','2025-05-24 02:47:31'),(7,'3','4,6','Fritz Bradshaw','fritz-bradshaw','2500000004','rent','106','495','upload/property/thambnail/1833071258733245.jpg','Delectus consequat','Voluptatum veniam a','4','3','1','12','1230','Laborum enim sunt qu','Carl Horn','Myra French','941','Althea Holt','610','808','Enim molestiae do se','Eiusmod soluta in ob','Ryder Valencia','Velit molestiae et l','Myles Doyle','64819','Commodi dolorem et e','Hic est incididunt','1',NULL,'Aliquam porro est el','12','12',NULL,'1',3,'0','3','3',NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-24 02:49:27','2025-05-25 00:02:59'),(8,'3','4,6','Fritz Bradshaw','fritz-bradshaw','2500000005','rent','106','495','upload/property/thambnail/1832991493371093.jpg','Delectus consequat','Voluptatum veniam a','4','3','1','12','1230','Laborum enim sunt qu','Carl Horn','Myra French','941','Althea Holt','610','808','Enim molestiae do se','Eiusmod soluta in ob','Ryder Valencia','Velit molestiae et l','Myles Doyle','64819','Commodi dolorem et e','Hic est incididunt','1',NULL,'Aliquam porro est el','12','12',NULL,'1',3,'0','3','3',NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-24 02:55:09','2025-05-24 02:55:09'),(9,'5','3,6,7,8,11,13,14','Linda Zimmerman','linda-zimmerman','2500000006','rent','1','888','upload/property/thambnail/1833060674220121.jpg','Dolore aliquip conse','Amet voluptatem pla','5','4','1','333','1230','<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/mm87aH3wBe8?si=9mK_HCqujRG6xFnO&amp;start=278\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>','Lani Morgan','Pandora Allen','683','Tana Crosby','683','425','Cum ullam soluta vel','Ex voluptate facilis','Hop Nieves','Vel non at laboris e','Maya Austin','68273','Sunt duis iusto exce','Nostrum eiusmod aper','1',NULL,'Officiis aut vero re','23.810331','90.412521','1','1',3,'0','3','3',NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-24 21:14:45','2025-05-26 03:09:15'),(10,'6','4,6,7,9,10,11,12,14','Yasir Skinner','yasir-skinner','2500000007','rent','1234','4321','upload/property/thambnail/1833613614663831.jpg','Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim est laborum. Sed perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium totam rem aperiam.','Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud exercitation laboris nisi ut aliquip ea commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur occaecat\r\n\r\nExcepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim est laborum. Sed perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium totam rem aperiam.','4','3','1','123','1234','<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/IlcDMqw38AQ?si=6hbyIA5t9WwbxcWp&amp;start=9\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>','Chava Noble','Isadora Roth','598','Keane Davenport','9','823','Nam vel provident t','Voluptate non volupt','Hamish Duran','Ut pariatur Eos am','Raphael Skinner','85335','Ipsum et adipisci ut','Illo magnam dignissi','1',NULL,'Corporis ex et lauda','24.095818','90.412521','1',NULL,20,'0','20','20',NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-30 23:43:31','2025-05-31 00:00:50');
/*!40000 ALTER TABLE `properties` ENABLE KEYS */;

--
-- Table structure for table `property_messages`
--

DROP TABLE IF EXISTS `property_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `property_messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `property_id` bigint unsigned NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `agent_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `property_messages_user_id_foreign` (`user_id`),
  KEY `property_messages_property_id_foreign` (`property_id`),
  CONSTRAINT `property_messages_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  CONSTRAINT `property_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_messages`
--

/*!40000 ALTER TABLE `property_messages` DISABLE KEYS */;
INSERT INTO `property_messages` VALUES (1,2,5,'Quibusdam est et et','+1 (472) 818-8833','user@gmail.com','2025-05-29 00:29:26','2025-05-29 00:29:26',3),(2,2,5,'Do aliquip ut velit','+1 (169) 175-1779','user@gmail.com','2025-05-29 00:33:00','2025-05-29 00:33:00',3),(3,3,5,'Sit unde fugit dolo','+1 (464) 818-9604','agent@gmail.com','2025-05-29 01:06:14','2025-05-29 01:06:14',3),(4,1,5,'Commodi voluptatibus','+1 (223) 244-2822','motin.mmk.jr@gmail.com','2025-05-29 03:10:44','2025-05-29 03:10:44',3),(5,2,9,'kbsdkh kbdsfjk','097349826','user@gmail.com','2025-05-30 23:55:34','2025-05-30 23:55:34',3),(6,2,10,'sdfhfkjg','0473589629','user@gmail.com','2025-05-30 23:56:19','2025-05-30 23:56:19',20);
/*!40000 ALTER TABLE `property_messages` ENABLE KEYS */;

--
-- Table structure for table `property_types`
--

DROP TABLE IF EXISTS `property_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `property_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `property_types_type_name_unique` (`type_name`),
  UNIQUE KEY `property_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_types`
--

/*!40000 ALTER TABLE `property_types` DISABLE KEYS */;
INSERT INTO `property_types` VALUES (3,'Appertment','appertment','icon-3',NULL,'active',NULL,NULL,'2025-05-07 02:47:02','2025-05-07 03:08:43'),(5,'Non Industrial','non-industrial','icon-6',NULL,'active',NULL,NULL,'2025-05-08 22:27:17','2025-05-25 00:26:40'),(6,'Residential','residential','icon-1',NULL,'active',NULL,NULL,'2025-05-25 00:23:51','2025-05-25 00:23:51'),(7,'Commercial','commercial','icon-2',NULL,'active',NULL,NULL,'2025-05-25 00:24:27','2025-05-25 00:24:27'),(8,'Industrial','industrial','icon-4',NULL,'active',NULL,NULL,'2025-05-25 00:25:06','2025-05-25 00:25:06'),(9,'Building Code','building-code','icon-5',NULL,'active',NULL,NULL,'2025-05-25 00:25:36','2025-05-25 00:25:36');
/*!40000 ALTER TABLE `property_types` ENABLE KEYS */;

--
-- Table structure for table `roads`
--

DROP TABLE IF EXISTS `roads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roads` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `word_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roads_word_id_foreign` (`word_id`),
  CONSTRAINT `roads_word_id_foreign` FOREIGN KEY (`word_id`) REFERENCES `words` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roads`
--

/*!40000 ALTER TABLE `roads` DISABLE KEYS */;
/*!40000 ALTER TABLE `roads` ENABLE KEYS */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartment_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landmark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_terms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','agent','developer','client','user','stuff') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive','suspended') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `user_type` enum('demo','real') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'real',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'UTC',
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USD',
  `date_format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y-m-d',
  `time_format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'H:i',
  `two_factor_auth` tinyint(1) NOT NULL DEFAULT '0',
  `email_notifications` tinyint(1) NOT NULL DEFAULT '1',
  `sms_notifications` tinyint(1) NOT NULL DEFAULT '1',
  `push_notifications` tinyint(1) NOT NULL DEFAULT '1',
  `email_verified` tinyint(1) NOT NULL DEFAULT '0',
  `phone_verified` tinyint(1) NOT NULL DEFAULT '0',
  `is_subscribed` tinyint(1) NOT NULL DEFAULT '0',
  `is_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `last_login` text COLLATE utf8mb4_unicode_ci,
  `last_logout` text COLLATE utf8mb4_unicode_ci,
  `last_activity` text COLLATE utf8mb4_unicode_ci,
  `last_ip` text COLLATE utf8mb4_unicode_ci,
  `last_device` text COLLATE utf8mb4_unicode_ci,
  `last_location` text COLLATE utf8mb4_unicode_ci,
  `show_email` tinyint(1) NOT NULL DEFAULT '1',
  `show_phone` tinyint(1) NOT NULL DEFAULT '1',
  `show_address` tinyint(1) NOT NULL DEFAULT '1',
  `show_profile` tinyint(1) NOT NULL DEFAULT '1',
  `show_social_links` tinyint(1) NOT NULL DEFAULT '1',
  `show_bio` tinyint(1) NOT NULL DEFAULT '1',
  `show_profile_picture` tinyint(1) NOT NULL DEFAULT '1',
  `show_last_login` tinyint(1) NOT NULL DEFAULT '1',
  `show_last_activity` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `credit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT 'FOR PACKAGE VALUE',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_phone_unique` (`phone`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin','1234567890',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'motin.mmk.jr@gmail.com',NULL,'$2y$12$NYT84okfHGNZ8WQyljwANOjBiF5kVHfoqLYmRJOCGkR8EdjnZvp0y','admin','active','real','agent/images/202506010420.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en','UTC','USD','Y-m-d','H:i',0,1,1,1,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,1,1,1,1,1,1,NULL,'2025-04-25 20:56:04','2025-05-31 22:20:23','0'),(2,'User','user','0193465765',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'user@gmail.com',NULL,'$2y$12$x.Er67kLlgrVx2Nc84tGW.2xWhBftK4r5MyshmQJqB.0q9WhlLcXC','user','active','real','agent/images/202506010421.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en','UTC','USD','Y-m-d','H:i',0,1,1,1,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,1,1,1,1,1,1,NULL,'2025-04-25 20:56:04','2025-05-31 22:21:01','0'),(3,'Agent','agent','1234567892',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'agent@gmail.com',NULL,'$2y$12$Wy/ACaroEYzFt8Uhg5R4/u8kpH9qZ55TaDn5KnFGlvYKpGPA41WvK','agent','active','real','agent/images/202505290941.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en','UTC','USD','Y-m-d','H:i',0,1,1,1,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,1,1,1,1,1,1,NULL,'2025-04-25 20:56:04','2025-05-29 03:41:39','5'),(4,'Developer','developer','1234567893',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'developer@gmail.com',NULL,'$2y$12$.knYUrddCaSwZXKRvA4oQ.ObEbf.wHK1UaXQdhyX8FBO/OcfCNk5y','developer','active','real','agent/images/202506010420.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en','UTC','USD','Y-m-d','H:i',0,1,1,1,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,1,1,1,1,1,1,NULL,'2025-04-25 20:56:04','2025-05-31 22:20:07','0'),(5,'Client','client','1234567894',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'client@gmail.com',NULL,'$2y$12$ZEZFo8WIECGarz9nmjNN6es33JC6JFTERhJpI7fmVY3lVjV1HszDe','client','active','real',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en','UTC','USD','Y-m-d','H:i',0,1,1,1,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,1,1,1,1,1,1,NULL,'2025-04-25 20:56:04','2025-04-25 20:56:04','0'),(6,'Stuff','stuff','1234567895',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'stuff@gmail.com',NULL,'$2y$12$uHkzw7q7bGruL3zQf8KI5uPUTKmqBabCcKTVO9ZQ6PfcNvGMGFwAy','stuff','active','real',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en','UTC','USD','Y-m-d','H:i',0,1,1,1,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,1,1,1,1,1,1,NULL,'2025-04-25 20:56:05','2025-04-25 20:56:05','0'),(18,'Merrill Avila','Merrill Avila','18983469756',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'gugowybuh@mailinator.com',NULL,'$2y$12$CKtJRwYEnkVxwWiDWplgT.bK66cWEjcho1smJdx4TktHEl8lhuITy','user','active','real','agent/images/202505210441.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en','UTC','USD','Y-m-d','H:i',0,1,1,1,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,1,1,1,1,1,1,NULL,'2025-05-04 20:26:31','2025-05-20 22:41:17','0'),(19,'Easy Leaning','easy','01936915657',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'easy@gmail.com',NULL,'$2y$12$5HjSN50DQrTmDZD2805L1.XaKkJ9/Orgl9Dxzfm2qWzwNI5nNwPuS','agent','inactive','real','agent/images/202505170906.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en','UTC','USD','Y-m-d','H:i',0,1,1,1,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,1,1,1,1,1,1,NULL,'2025-05-17 02:47:16','2025-05-17 03:06:48','0'),(20,'Zia Coffey','metyguwa','01936348755',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'nakehocy@mailinator.com',NULL,'$2y$12$22bFd0sPFA/Mqjh44B2zmugRfzPyI0BBQ68y2jc8S8i9erSptclV.','agent','active','real','agent/images/202505210226.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en','UTC','USD','Y-m-d','H:i',0,1,1,1,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,1,1,1,1,1,1,NULL,'2025-05-20 04:22:12','2025-05-30 23:43:31','1');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `property_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wishlists_user_id_foreign` (`user_id`),
  KEY `wishlists_property_id_foreign` (`property_id`),
  CONSTRAINT `wishlists_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlists`
--

/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
INSERT INTO `wishlists` VALUES (2,3,5,'2025-05-26 21:22:37','2025-05-26 21:22:37'),(11,2,8,'2025-05-27 02:33:01','2025-05-27 02:33:01'),(17,2,10,'2025-05-30 23:56:00','2025-05-30 23:56:00');
/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */;

--
-- Table structure for table `words`
--

DROP TABLE IF EXISTS `words`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `words` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `words_city_id_foreign` (`city_id`),
  CONSTRAINT `words_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `words`
--

/*!40000 ALTER TABLE `words` DISABLE KEYS */;
/*!40000 ALTER TABLE `words` ENABLE KEYS */;

--
-- Table structure for table `zones`
--

DROP TABLE IF EXISTS `zones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `zones` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `zones_district_id_foreign` (`district_id`),
  CONSTRAINT `zones_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zones`
--

/*!40000 ALTER TABLE `zones` DISABLE KEYS */;
/*!40000 ALTER TABLE `zones` ENABLE KEYS */;

--
-- Dumping routines for database 'cinegoapp'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-16 14:17:04
