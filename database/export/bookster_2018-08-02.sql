# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.22-MariaDB)
# Datenbank: bookster
# Erstellt am: 2018-08-02 21:29:30 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle approvals
# ------------------------------------------------------------

DROP TABLE IF EXISTS `approvals`;

CREATE TABLE `approvals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Export von Tabelle author_images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `author_images`;

CREATE TABLE `author_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `author_images` WRITE;
/*!40000 ALTER TABLE `author_images` DISABLE KEYS */;

INSERT INTO `author_images` (`id`, `author_id`, `img`, `created_at`, `updated_at`)
VALUES
	(32,33,'guido.jpg','2018-08-02 18:58:37','2018-08-02 18:58:37'),
	(33,34,'sebastian-fitzek.jpg','2018-08-02 18:59:14','2018-08-02 18:59:14'),
	(34,35,'Petra_Hülsmann.jpg','2018-08-02 18:59:39','2018-08-02 18:59:39'),
	(35,36,'majalunde.jpg','2018-08-02 19:00:46','2018-08-02 19:00:46'),
	(36,37,'simonevanderlugt.jpeg','2018-08-02 19:01:37','2018-08-02 19:01:37'),
	(37,38,'jochenbaier.jpg','2018-08-02 19:02:21','2018-08-02 19:02:21'),
	(38,39,'stephenhawking.jpg','2018-08-02 19:02:51','2018-08-02 19:02:51'),
	(39,40,'moyes-header.jpg','2018-08-02 19:08:37','2018-08-02 19:08:37'),
	(40,41,'ceceliaahern.jpg','2018-08-02 19:08:57','2018-08-02 19:08:57'),
	(41,42,'mona_kasten.jpg','2018-08-02 19:09:41','2018-08-02 19:09:41'),
	(42,43,'lucy-fricke.jpg','2018-08-02 19:10:21','2018-08-02 19:10:21'),
	(43,44,'mayandberry.jpg','2018-08-02 19:11:12','2018-08-02 19:11:12'),
	(44,45,'frauholle.jpg','2018-08-02 19:11:52','2018-08-02 19:11:52'),
	(45,46,'sarinabowen.jpg','2018-08-02 19:12:47','2018-08-02 19:12:47'),
	(46,47,'mhairi.jpeg','2018-08-02 19:13:31','2018-08-02 19:13:31'),
	(47,48,'juliahanel.jpg','2018-08-02 19:14:59','2018-08-02 19:14:59'),
	(48,49,'Spielman.jpg','2018-08-02 19:15:39','2018-08-02 19:15:39'),
	(49,50,'rrmartin.jpg','2018-08-02 20:05:02','2018-08-02 20:05:02'),
	(50,51,'AndreasHoeglauer.jpeg','2018-08-02 20:14:43','2018-08-02 20:14:43'),
	(51,52,'dürrenmatt.jpg','2018-08-02 20:17:17','2018-08-02 20:17:17'),
	(52,53,'stehfest.jpeg','2018-08-02 20:22:13','2018-08-02 20:22:13'),
	(53,54,'otto.jpg','2018-08-02 20:22:39','2018-08-02 20:22:39'),
	(54,55,'schacht.jpg','2018-08-02 20:23:33','2018-08-02 20:23:33'),
	(55,56,'Kuhlmann_psyche_website.jpg','2018-08-02 20:28:25','2018-08-02 20:28:25'),
	(56,57,'annefrank.jpg','2018-08-02 20:30:32','2018-08-02 20:30:32'),
	(57,58,'annegirard.jpg','2018-08-02 20:32:54','2018-08-02 20:32:54'),
	(58,59,'scholz_christian.jpg','2018-08-02 20:38:05','2018-08-02 20:38:05'),
	(59,60,'frodeno.jpg','2018-08-02 20:40:33','2018-08-02 20:40:33'),
	(60,61,'Christo-Foerster-Unterwegs-640x290.jpg','2018-08-02 20:43:22','2018-08-02 20:43:22'),
	(61,62,'kayla.jpg','2018-08-02 20:45:18','2018-08-02 20:45:18'),
	(62,63,'susanne weber.jpg','2018-08-02 20:48:22','2018-08-02 20:48:22');

/*!40000 ALTER TABLE `author_images` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle authors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `authors`;

CREATE TABLE `authors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;

INSERT INTO `authors` (`id`, `firstname`, `lastname`, `created_at`, `updated_at`)
VALUES
	(33,'Guido M.','Kretschmer','2018-08-02 18:58:37','2018-08-02 19:04:29'),
	(34,'Sebastian','Fitzek','2018-08-02 18:59:14','2018-08-02 18:59:14'),
	(35,'Petra','Hülsmann','2018-08-02 18:59:39','2018-08-02 18:59:39'),
	(36,'Maja','Lunde','2018-08-02 19:00:46','2018-08-02 19:00:46'),
	(37,'Simone','van der Vlugt','2018-08-02 19:01:37','2018-08-02 19:01:37'),
	(38,'Jochen','Baier','2018-08-02 19:02:21','2018-08-02 19:02:21'),
	(39,'Stephen','Hawking','2018-08-02 19:02:51','2018-08-02 19:02:51'),
	(40,'Jojo','Moyes','2018-08-02 19:08:37','2018-08-02 19:08:37'),
	(41,'Cecelia','Ahern','2018-08-02 19:08:57','2018-08-02 19:08:57'),
	(42,'Mona','Kasten','2018-08-02 19:09:41','2018-08-02 19:09:41'),
	(43,'Lucy','Fricke','2018-08-02 19:10:21','2018-08-02 19:10:21'),
	(44,'May and','Berry','2018-08-02 19:11:12','2018-08-02 19:11:12'),
	(45,'Tanja','Cappell','2018-08-02 19:11:52','2018-08-02 19:11:52'),
	(46,'Sarina','Bowen','2018-08-02 19:12:47','2018-08-02 19:12:47'),
	(47,'Mhairi','McFarlane','2018-08-02 19:13:31','2018-08-02 19:13:31'),
	(48,'Julia','Hanel','2018-08-02 19:14:59','2018-08-02 19:14:59'),
	(49,'Lori','Nelson Spielmann','2018-08-02 19:15:39','2018-08-02 19:15:39'),
	(50,'George R. R.','Martin','2018-08-02 20:05:02','2018-08-02 20:05:02'),
	(51,'Andreas','Hoeglauer','2018-08-02 20:14:43','2018-08-02 20:14:43'),
	(52,'Friedrich','Dürrenmatt','2018-08-02 20:17:17','2018-08-02 20:17:17'),
	(53,'Eric','Stehfest','2018-08-02 20:22:13','2018-08-02 20:22:13'),
	(54,'Otto','Walkes','2018-08-02 20:22:39','2018-08-02 20:22:39'),
	(55,'Christopher','Schacht','2018-08-02 20:23:33','2018-08-02 20:23:33'),
	(56,'Lena','Kuhlmann','2018-08-02 20:28:25','2018-08-02 20:28:25'),
	(57,'Anne','Frank','2018-08-02 20:30:32','2018-08-02 20:30:32'),
	(58,'Anne','Girard','2018-08-02 20:32:54','2018-08-02 20:32:54'),
	(59,'Christian','Scholz','2018-08-02 20:38:05','2018-08-02 20:38:05'),
	(60,'Jan','Frodeno','2018-08-02 20:40:33','2018-08-02 20:40:33'),
	(61,'Christo','Foerster','2018-08-02 20:43:22','2018-08-02 20:43:22'),
	(62,'Kayla','Itsines','2018-08-02 20:45:18','2018-08-02 20:45:18'),
	(63,'Susanne','Weber','2018-08-02 20:48:22','2018-08-02 20:48:22');

/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle authors_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `authors_categories`;

CREATE TABLE `authors_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `authors_categories` WRITE;
/*!40000 ALTER TABLE `authors_categories` DISABLE KEYS */;

INSERT INTO `authors_categories` (`id`, `category_id`, `author_id`, `created_at`, `updated_at`)
VALUES
	(1,1,11,'2018-06-25 18:18:54',NULL),
	(2,2,12,'2018-06-25 18:18:54',NULL),
	(3,1,13,'2018-06-25 18:18:54',NULL),
	(5,2,11,'2018-06-25 18:18:54',NULL),
	(6,1,50,'2018-08-02 20:06:23','2018-08-02 20:06:23'),
	(7,1,34,'2018-08-02 20:07:45','2018-08-02 20:07:45'),
	(8,1,34,'2018-08-02 20:07:56','2018-08-02 20:07:56'),
	(9,1,34,'2018-08-02 20:08:04','2018-08-02 20:08:04'),
	(10,1,34,'2018-08-02 20:08:10','2018-08-02 20:08:10'),
	(11,1,49,'2018-08-02 20:08:20','2018-08-02 20:08:20'),
	(12,1,47,'2018-08-02 20:08:28','2018-08-02 20:08:28'),
	(13,1,42,'2018-08-02 20:08:36','2018-08-02 20:08:36'),
	(14,1,42,'2018-08-02 20:08:42','2018-08-02 20:08:42'),
	(15,6,45,'2018-08-02 20:08:47','2018-08-02 20:08:47'),
	(16,6,45,'2018-08-02 20:08:56','2018-08-02 20:08:56'),
	(17,6,44,'2018-08-02 20:09:02','2018-08-02 20:09:02'),
	(18,1,43,'2018-08-02 20:09:11','2018-08-02 20:09:11'),
	(19,1,40,'2018-08-02 20:09:17','2018-08-02 20:09:17'),
	(20,1,42,'2018-08-02 20:09:26','2018-08-02 20:09:26'),
	(21,1,41,'2018-08-02 20:09:32','2018-08-02 20:09:32'),
	(22,1,40,'2018-08-02 20:09:38','2018-08-02 20:09:38'),
	(23,2,39,'2018-08-02 20:09:44','2018-08-02 20:09:44'),
	(24,1,38,'2018-08-02 20:09:49','2018-08-02 20:09:49'),
	(25,1,37,'2018-08-02 20:09:57','2018-08-02 20:09:57'),
	(26,1,36,'2018-08-02 20:10:07','2018-08-02 20:10:07'),
	(27,1,35,'2018-08-02 20:10:16','2018-08-02 20:10:16'),
	(28,1,35,'2018-08-02 20:10:22','2018-08-02 20:10:22'),
	(29,1,35,'2018-08-02 20:10:27','2018-08-02 20:10:27'),
	(30,1,34,'2018-08-02 20:10:33','2018-08-02 20:10:33'),
	(31,1,33,'2018-08-02 20:10:38','2018-08-02 20:10:38'),
	(32,1,50,'2018-08-02 20:12:01','2018-08-02 20:12:01'),
	(33,1,50,'2018-08-02 20:13:11','2018-08-02 20:13:11'),
	(34,1,51,'2018-08-02 20:15:48','2018-08-02 20:15:48'),
	(35,1,52,'2018-08-02 20:18:23','2018-08-02 20:18:23'),
	(36,1,52,'2018-08-02 20:19:28','2018-08-02 20:19:28'),
	(37,1,52,'2018-08-02 20:20:43','2018-08-02 20:20:43'),
	(38,2,54,'2018-08-02 20:24:37','2018-08-02 20:24:37'),
	(39,2,53,'2018-08-02 20:25:36','2018-08-02 20:25:36'),
	(40,2,55,'2018-08-02 20:26:47','2018-08-02 20:26:47'),
	(41,2,56,'2018-08-02 20:29:30','2018-08-02 20:29:30'),
	(42,2,57,'2018-08-02 20:31:42','2018-08-02 20:31:42'),
	(43,2,58,'2018-08-02 20:33:48','2018-08-02 20:33:48'),
	(44,2,59,'2018-08-02 20:39:13','2018-08-02 20:39:13'),
	(45,2,60,'2018-08-02 20:41:35','2018-08-02 20:41:35'),
	(46,2,61,'2018-08-02 20:44:19','2018-08-02 20:44:19'),
	(47,2,62,'2018-08-02 20:46:35','2018-08-02 20:46:35'),
	(48,3,63,'2018-08-02 20:49:16','2018-08-02 20:49:16');

/*!40000 ALTER TABLE `authors_categories` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle bill_addresses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bill_addresses`;

CREATE TABLE `bill_addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `street` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `housenum` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Export von Tabelle categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name`, `url`, `created_at`, `updated_at`)
VALUES
	(1,'Belletristik','belletristik/','2018-07-24 11:20:35','2018-07-24 11:20:35'),
	(2,'Sachbücher','sachbuecher/','2018-05-24 10:44:32',NULL),
	(3,'Kinder- und Jugendbücher','kinderundjugend/','2018-05-24 10:44:32',NULL),
	(4,'Schule und Lernen','schule/','2018-05-24 10:44:32',NULL),
	(5,'Ratgeber','ratgeber/','2018-05-24 10:44:32',NULL),
	(6,'Freizeit und Hobby','hobby/','2018-05-24 10:44:32',NULL),
	(7,'Fachbücher','fachbuecher/','2018-05-24 10:44:32',NULL);

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle character_images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `character_images`;

CREATE TABLE `character_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `character_id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `character_images` WRITE;
/*!40000 ALTER TABLE `character_images` DISABLE KEYS */;

INSERT INTO `character_images` (`id`, `character_id`, `img`, `created_at`, `updated_at`)
VALUES
	(1,1,'bibi.jpg','2018-06-22 16:50:17','2018-08-02 10:48:45'),
	(2,2,'räuberhotzenplotz.jpg','2018-06-22 16:50:17','2018-08-02 10:29:05'),
	(3,3,'conni.jpg','2018-06-22 16:50:17','2018-08-02 10:28:42'),
	(4,4,'wiesoweshalbwarum.jpg','2018-06-22 16:50:17','2018-08-02 10:28:32'),
	(5,5,'maus.jpg','2018-06-22 16:50:17','2018-08-02 10:28:21'),
	(7,7,'benjamin.jpg','2018-06-22 16:53:38','2018-08-02 10:28:08'),
	(8,8,'pippi.jpg','2018-06-22 16:53:38','2018-08-02 10:27:48'),
	(10,10,'bibiundtina.jpg','2018-07-24 10:13:33','2018-07-24 10:13:33'),
	(11,11,'drache_Kokosnuss.png','2018-08-02 19:16:24','2018-08-02 19:16:24');

/*!40000 ALTER TABLE `character_images` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle characters
# ------------------------------------------------------------

DROP TABLE IF EXISTS `characters`;

CREATE TABLE `characters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `toddler` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `characters` WRITE;
/*!40000 ALTER TABLE `characters` DISABLE KEYS */;

INSERT INTO `characters` (`id`, `name`, `toddler`, `created_at`, `updated_at`)
VALUES
	(1,'Bibi Blocksberg',1,'2018-06-22 16:45:30','2018-06-22 16:45:30'),
	(2,'Räuber Hotzenplotz',1,'2018-06-22 16:45:55','2018-06-22 16:45:55'),
	(3,'Conni',1,'2018-06-22 16:46:05','2018-06-22 16:46:05'),
	(4,'Wieso Weshalb Warum',1,'2018-06-22 16:46:18','2018-06-22 16:46:18'),
	(5,'Die Maus',1,'2018-06-22 16:46:37','2018-06-22 16:46:37'),
	(7,'Benjamin Blümchen',1,'2018-06-22 16:47:00','2018-06-22 16:47:00'),
	(8,'Pippi Langstrumpf',1,'2018-06-22 16:47:11','2018-06-22 16:47:11'),
	(10,'Bibi & Tina',1,'2018-07-24 10:13:33','2018-07-24 10:13:33'),
	(11,'Kleiner Drache Kokosnuss',1,'2018-08-02 19:16:24','2018-08-02 19:16:24');

/*!40000 ALTER TABLE `characters` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle customers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `housenum` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(28) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `email`, `street`, `housenum`, `postcode`, `city`, `birthday`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Angela','Henke','harry.bittner@example.org','Krämerstraße','48a','14366','Nettetal','1970-01-01','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','D5PD3LSJF9FsWBeaUdFGBZGyCQTrpfM9D856HutXDkRkGKml6Q8K32oeUrm6','2018-05-24 10:44:33','2018-07-19 14:53:15');

/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle delivery_addresses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `delivery_addresses`;

CREATE TABLE `delivery_addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `housenum` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Export von Tabelle genres
# ------------------------------------------------------------

DROP TABLE IF EXISTS `genres`;

CREATE TABLE `genres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `genre` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;

INSERT INTO `genres` (`id`, `category_id`, `genre`, `url`, `created_at`, `updated_at`)
VALUES
	(1,1,'Krimi & Thriller','/krimi','2018-06-16 16:44:38','2018-06-16 16:44:38'),
	(2,1,'Romane','/romane','2018-06-16 16:45:15','2018-06-16 16:49:41'),
	(3,1,'Satire','/satire','2018-06-16 16:45:32','2018-06-16 16:50:20'),
	(4,1,'Historische Romane','/historie','2018-06-16 16:45:59','2018-06-16 16:45:59'),
	(5,1,'Romance','/romance','2018-06-16 16:46:12','2018-06-16 16:50:45'),
	(7,1,'Fantasy & Science Fiction','/fantasy','2018-06-16 16:46:51','2018-06-16 16:46:51'),
	(10,1,'Klassiker & Lyrik','/lyrik','2018-06-16 16:47:39','2018-06-16 16:47:39'),
	(11,2,'Biografien','/biografien','2018-06-16 16:52:05','2018-06-16 16:52:05'),
	(12,2,'Politik & Gesellschaft','/politik','2018-06-16 16:52:20','2018-06-16 16:52:20'),
	(13,2,'Geschichte','/geschichte','2018-06-16 16:52:35','2018-06-16 16:52:35'),
	(14,2,'Kunst & Kultur','/kultur','2018-06-16 16:52:49','2018-06-16 16:52:49'),
	(15,2,'Wirtschaft & Recht','/wirtschaftundrecht','2018-06-16 16:53:06','2018-06-16 16:53:06'),
	(16,2,'Natur, Wissenschaft, Technik','/wissenschaft','2018-06-16 16:53:31','2018-06-16 16:53:31'),
	(17,2,'Sport','/sport','2018-06-16 16:53:42','2018-06-16 16:53:42'),
	(18,2,'Reisen','/reisen','2018-06-16 16:53:52','2018-06-16 16:53:52'),
	(19,2,'Lifestyle','/lifestyle','2018-06-16 16:54:03','2018-06-16 16:54:03'),
	(20,3,'Babys','/baby','2018-06-16 16:54:25','2018-06-16 16:54:25'),
	(21,3,'Kleinkind','/kleinkind','2018-06-16 16:54:57','2018-06-16 16:54:57'),
	(22,3,'Vorschule','/vorschule','2018-06-16 16:55:11','2018-06-16 16:55:11'),
	(23,3,'Erstleser','/erstleser','2018-06-16 16:55:24','2018-06-16 16:55:24'),
	(24,3,'Kinderbücher','/kinder','2018-06-16 16:55:42','2018-06-16 16:55:42'),
	(25,3,'Jugendbücher','/jugend','2018-06-16 16:55:52','2018-06-16 16:55:52'),
	(26,3,'Teenager','/teenager','2018-06-16 16:56:08','2018-06-16 16:56:08'),
	(27,3,'Spielbücher','/spiel','2018-06-16 16:56:20','2018-06-16 16:56:20'),
	(28,4,'Berufs- & Fachschule','/beruf','2018-06-16 16:56:59','2018-06-16 16:56:59'),
	(29,4,'Interpretationen','/interpretation','2018-06-16 16:57:18','2018-06-16 16:57:18'),
	(30,4,'Lernhilfen','/lernhilfen','2018-06-16 16:57:34','2018-06-16 16:57:34'),
	(31,4,'Lexika & Wörterbücher','/lexika','2018-06-16 16:57:53','2018-06-16 16:57:53'),
	(32,4,'Schulbücher','/schule','2018-06-16 16:58:07','2018-06-16 16:58:07'),
	(33,4,'Sprachen','/sprachen','2018-06-16 16:58:19','2018-06-16 16:58:19'),
	(34,5,'Gesundheit und Ernährung','/gesundheit','2018-06-16 16:58:40','2018-06-16 16:58:40'),
	(35,5,'Familie','/familie','2018-06-16 16:59:35','2018-06-16 16:59:35'),
	(36,5,'Kommunikation & Persönlichkeit','/kommunikation','2018-06-16 17:00:01','2018-06-16 17:00:01'),
	(37,5,'Partnerschaft ','/partnerschaft','2018-06-16 17:00:39','2018-06-16 17:00:39'),
	(38,5,'Recht & Beruf','/recht','2018-06-16 17:00:52','2018-06-16 17:00:52'),
	(39,5,'Spiritualität','/spritualitaet','2018-06-16 17:01:08','2018-06-16 17:01:08'),
	(40,5,'Lebensführung','/leben','2018-06-16 17:01:20','2018-06-16 17:01:20'),
	(41,6,'Sport und Fitness','/fitness','2018-06-16 17:01:44','2018-06-16 17:01:44'),
	(42,6,'Film & Fotografie','/film','2018-06-16 17:02:04','2018-06-16 17:02:04'),
	(43,6,'Flug- & Fahrzeug','/fahrzeug','2018-06-16 17:02:21','2018-06-16 17:02:21'),
	(44,6,'Haus & Garten','/garten','2018-06-16 17:02:34','2018-06-16 17:02:34'),
	(45,6,'Heimwerken & DIY','/diy','2018-06-16 17:02:54','2018-06-16 17:02:54'),
	(46,6,'Spiel & Spaß','/spass','2018-06-16 17:03:08','2018-06-16 17:03:08'),
	(47,6,'Basteln und Handarbeit','/basteln','2018-06-16 17:03:21','2018-06-16 17:03:21'),
	(48,7,'Architektur','/architektur','2018-06-16 17:03:54','2018-06-16 17:03:21'),
	(49,7,'Biowissenschaften','/biowissenschaft','2018-06-16 17:03:21','2018-06-16 17:03:21'),
	(50,7,'Chemie','/chemie','2018-06-16 17:03:21','2018-06-16 17:03:21'),
	(51,7,'Geowissenschaften','/geo','2018-06-16 17:03:21','2018-06-16 17:03:21'),
	(52,7,'Geschischtswissenschaften','/geschichtswissenschaften','2018-06-16 17:03:21','2018-06-16 17:03:21'),
	(53,7,'Informatik','/informatik','2018-06-16 17:03:21','2018-06-16 17:03:21'),
	(54,7,'Ingenieurwissenschaften','/ingenieur','2018-06-16 17:03:21','2018-06-16 17:03:21'),
	(55,7,'Kunstwissenschaften','/kunst','2018-06-16 17:03:21','2018-06-16 17:03:21'),
	(56,7,'Mathematik','/mathe','2018-06-16 17:03:21','2018-06-16 17:03:21'),
	(57,7,'Medienwissenschaften','/medien','2018-06-16 17:03:21','2018-06-16 17:03:21'),
	(58,7,'Medizin','/medizin','2018-06-16 17:03:21','2018-06-16 17:03:21'),
	(59,7,'Musikwissenschaften','/musik','2018-06-16 17:03:21','2018-06-16 17:03:21'),
	(60,7,'Pädagogik','/paedagogik','2018-06-16 17:03:21','2018-06-16 17:03:21'),
	(61,7,'Philosophie','/philosophie','2018-06-16 17:03:21','2018-06-16 17:03:21'),
	(62,7,'Physik & Astronomie','/physik','2018-06-16 17:03:21','2018-06-16 17:03:21'),
	(63,7,'Politikwissenschaften','/politikwissenschaften','2018-06-16 17:03:21','2018-06-16 17:03:21'),
	(64,7,'Psychologie','/psychologie','2018-06-16 17:03:21','2018-06-16 17:03:21'),
	(65,7,'Recht','/rechtwissenschaften','2018-06-16 17:03:21','2018-06-16 17:03:21'),
	(66,7,'Sozialwissenschaften','/sozialwissenschaften','2018-06-16 17:03:21','2018-06-16 17:03:21'),
	(67,7,'Sprach- & Literaturwissenschaften','/literaturwissenschaften','2018-06-16 17:03:21','2018-06-16 17:03:21'),
	(68,7,'Theologie','/theologie','2018-06-16 17:03:21','2018-06-16 17:03:21'),
	(69,7,'Wirtschaft','/wirtschaft','2018-06-16 17:03:21','2018-06-16 17:03:21');

/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;

INSERT INTO `images` (`id`, `product_id`, `img`, `created_at`, `updated_at`)
VALUES
	(1,1,'/img/cover.png','2018-06-02 19:35:35','2018-06-02 19:35:35'),
	(2,2,'/img/cover2.png','2018-06-02 19:35:51','2018-06-02 19:35:51'),
	(3,3,'2.jpeg','2018-06-02 19:35:51','2018-07-24 07:57:48'),
	(4,4,'11.jpg','2018-06-02 19:35:51','2018-07-24 08:12:49'),
	(7,7,'/img/cover3.png','2018-06-02 19:35:51','2018-06-02 19:35:51'),
	(10,10,'/img/cover3.png','2018-06-02 19:35:51','2018-06-02 19:35:51'),
	(11,11,'/img/cover3.png','2018-06-02 19:35:51','2018-06-02 19:35:51'),
	(12,12,'/img/cover3.png','2018-06-02 19:35:51','2018-06-02 19:35:51'),
	(13,13,'/img/cover3.png','2018-06-02 19:35:51','2018-06-02 19:35:51'),
	(14,14,'/img/cover3.png','2018-06-02 19:35:51','2018-06-02 19:35:51'),
	(15,15,'/img/cover.png','2018-06-02 19:35:51','2018-06-02 19:35:51'),
	(16,16,'/img/cover.png','2018-06-02 19:35:51','2018-06-02 19:35:51'),
	(17,17,'/img/cover.png','2018-06-02 19:35:51','2018-06-02 19:35:51'),
	(18,18,'/img/cover.png','2018-06-02 19:35:51','2018-06-02 19:35:51'),
	(19,19,'/img/cover.png','2018-06-02 19:35:51','2018-06-02 19:35:51'),
	(20,20,'/img/cover.png','2018-06-02 19:35:51','2018-06-02 19:35:51'),
	(21,21,'/img/cover.png','2018-06-02 19:35:51','2018-06-02 19:35:51'),
	(22,25,'5.jpg','2018-07-24 08:21:39','2018-07-24 08:21:39'),
	(23,33,'5.jpg','2018-07-24 08:23:40','2018-08-02 10:32:31'),
	(24,34,'1.jpg','2018-07-24 08:28:20','2018-08-02 19:21:02'),
	(25,34,'1.jpg','2018-08-02 19:20:49','2018-08-02 19:20:49'),
	(26,35,'2.jpeg','2018-08-02 19:23:09','2018-08-02 19:23:09'),
	(27,36,'3.jpg','2018-08-02 19:24:18','2018-08-02 19:24:18'),
	(28,37,'31.jpg','2018-08-02 19:25:42','2018-08-02 19:25:42'),
	(29,38,'32.jpg','2018-08-02 19:26:43','2018-08-02 19:26:43'),
	(30,39,'4.jpg','2018-08-02 19:28:07','2018-08-02 19:28:07'),
	(31,40,'5.jpg','2018-08-02 19:29:15','2018-08-02 19:29:15'),
	(32,41,'6.jpg','2018-08-02 19:30:34','2018-08-02 19:30:34'),
	(33,42,'7.jpg','2018-08-02 19:32:34','2018-08-02 19:32:34'),
	(34,43,'8.jpg','2018-08-02 19:34:13','2018-08-02 19:34:13'),
	(35,44,'9.jpg','2018-08-02 19:35:41','2018-08-02 19:35:41'),
	(36,45,'11.jpg','2018-08-02 19:36:53','2018-08-02 19:36:53'),
	(37,46,'12.jpg','2018-08-02 19:38:02','2018-08-02 19:38:02'),
	(38,47,'13.jpg','2018-08-02 19:39:13','2018-08-02 19:39:13'),
	(39,48,'16.jpg','2018-08-02 19:40:32','2018-08-02 19:40:32'),
	(40,49,'34.jpg','2018-08-02 19:42:34','2018-08-02 19:42:34'),
	(41,50,'33.jpg','2018-08-02 19:43:22','2018-08-02 19:43:22'),
	(42,51,'20.jpg','2018-08-02 19:44:25','2018-08-02 19:44:25'),
	(43,52,'21.jpg','2018-08-02 19:45:32','2018-08-02 19:45:32'),
	(44,53,'29.jpg','2018-08-02 19:46:59','2018-08-02 19:46:59'),
	(45,54,'30.jpg','2018-08-02 19:47:58','2018-08-02 19:47:58'),
	(46,55,'35.jpg','2018-08-02 19:51:03','2018-08-02 19:51:03'),
	(47,56,'36.jpg','2018-08-02 19:52:37','2018-08-02 19:52:37'),
	(48,57,'37.jpg','2018-08-02 19:53:45','2018-08-02 19:53:45'),
	(49,58,'38.jpg','2018-08-02 19:55:07','2018-08-02 19:55:07'),
	(50,59,'39.jpg','2018-08-02 20:06:23','2018-08-02 20:06:23'),
	(51,60,'40.jpg','2018-08-02 20:12:01','2018-08-02 20:12:01'),
	(52,61,'41.jpg','2018-08-02 20:13:11','2018-08-02 20:13:11'),
	(53,62,'42.jpg','2018-08-02 20:15:48','2018-08-02 20:15:48'),
	(54,63,'43.jpg','2018-08-02 20:18:23','2018-08-02 20:18:23'),
	(55,64,'44.jpg','2018-08-02 20:19:28','2018-08-02 20:19:28'),
	(56,65,'45.jpg','2018-08-02 20:20:43','2018-08-02 20:20:43'),
	(57,66,'47.jpg','2018-08-02 20:24:37','2018-08-02 20:24:37'),
	(58,67,'46.jpg','2018-08-02 20:25:36','2018-08-02 20:25:36'),
	(59,68,'48.jpg','2018-08-02 20:26:47','2018-08-02 20:26:47'),
	(60,69,'49.jpg','2018-08-02 20:29:30','2018-08-02 20:29:30'),
	(61,70,'50.jpg','2018-08-02 20:31:42','2018-08-02 20:31:42'),
	(62,71,'51.jpg','2018-08-02 20:33:48','2018-08-02 20:33:48'),
	(63,72,'52.jpg','2018-08-02 20:39:13','2018-08-02 20:39:13'),
	(64,73,'53.jpg','2018-08-02 20:41:35','2018-08-02 20:41:35'),
	(65,74,'54.jpg','2018-08-02 20:44:19','2018-08-02 20:44:19'),
	(66,75,'55.jpg','2018-08-02 20:46:35','2018-08-02 20:46:35'),
	(67,76,'56.jpg','2018-08-02 20:49:16','2018-08-02 20:49:16');

/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(15,'2014_10_12_000000_create_users_table',1),
	(16,'2014_10_12_100000_create_password_resets_table',1),
	(17,'2018_05_10_175755_create_customers_table',1),
	(18,'2018_05_10_175901_create_states_table',1),
	(19,'2018_05_10_175917_create_categories_table',1),
	(20,'2018_05_10_175931_create_authors_table',1),
	(21,'2018_05_10_175942_create_genres_table',1),
	(22,'2018_05_10_175954_create_orders_table',1),
	(23,'2018_05_10_180014_create_orders_products_table',1),
	(24,'2018_05_10_180023_create_products_table',1),
	(25,'2018_05_10_180035_create_images_table',1),
	(26,'2018_05_10_180047_create_wishlist_table',1),
	(27,'2018_06_02_195343_create_author_images_table',2),
	(28,'2018_06_22_143733_create_characters_table',3),
	(29,'2018_06_22_144146_character_images_table',3),
	(30,'2018_06_25_150600_create_authors_categories_table',4),
	(31,'2018_07_17_174520_create_delivery_addresses_table',5),
	(32,'2018_07_17_174546_create_bill_addresses_table',5),
	(33,'2018_05_10_180014_create_order_product_table',6),
	(34,'2018_07_18_122406_create_approvals_table',6);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle order_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_product`;

CREATE TABLE `order_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Export von Tabelle orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `deliveryAddress_id` int(11) NOT NULL,
  `billAddress_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL DEFAULT '0',
  `price` varchar(28) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(28) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `shipping_method` varchar(28) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `agb` int(1) DEFAULT '0',
  `shipped` int(11) DEFAULT '0',
  `ordered_at` date NOT NULL,
  `send_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Export von Tabelle password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;

INSERT INTO `password_resets` (`email`, `token`, `created_at`)
VALUES
	('daniela.hofmann3010@gmail.com','$2y$10$AvBTlqv5bMj4NFgsmVoBsuBPi9KuWE3ZxEHyTKnjyg4lKGSgcBzX.','2018-07-16 11:44:56');

/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `character_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bestseller` int(11) NOT NULL DEFAULT '0',
  `ebook` int(11) NOT NULL DEFAULT '0',
  `release` varchar(28) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `user_id`, `genre_id`, `category_id`, `author_id`, `character_id`, `name`, `price`, `description`, `amount`, `bestseller`, `ebook`, `release`, `created_at`, `updated_at`)
VALUES
	(34,31,2,1,33,0,'Das rote Kleid','12.95','Anascha ist ein wunderschönes rotes Kleid aus Seide. Sie hängt an einem Filmset in der Garderobe und wartet gespannt auf ihren Auftritt. Aber Anascha ist noch ein junges Textil, und so ist sie froh, dass sie in guter Gesellschaft ist: Da gibt es Eric, den alten Mantel, der bald ihr engster Vertrauter wird, ein liebenswertes Nachthemdchen, das immer vom Bügel stürzt, oder Lulu, das charmante Revuekleid aus Las Vegas. Nur gut, dass sie alle zusammenhalten wie aus einem Garn genäht, denn bald müssen sie so manche Herausforderung meistern. Und vielleicht gelingt es Anascha am Ende sogar, ihren großen Traum zu erfüllen – ein richtiges Zuhause zu haben und einen Menschen, der sie wirklich liebt, für immer ...','1000',1,0,'2018-03-12','2018-08-02 19:20:48','2018-08-02 19:20:48'),
	(35,31,1,1,34,0,'Das Paket','19.99','Seit die junge Psychiaterin Emma Stein in einem Hotelzimmer vergewaltigt wurde, verlässt sie das Haus nicht mehr. Sie war das dritte Opfer eines Psychopathen, den die Presse den \'Friseur\' nennt – weil er den misshandelten Frauen die Haare vom Kopf schert, bevor er sie ermordet. \r\nEmma, die als Einzige mit dem Leben davonkam, fürchtet, der \'Friseur\' könnte sie erneut heimsuchen, um seine grauenhafte Tat zu vollenden. In ihrer Paranoia glaubt sie in jedem Mann ihren Peiniger wiederzuerkennen, dabei hat sie den Täter nie zu Gesicht bekommen. Nur in ihrem kleinen Haus am Rande des Berliner Grunewalds fühlt sie sich noch sicher – bis der Postbote sie eines Tages bittet, ein Paket für ihren Nachbarn anzunehmen.','100',1,0,'2016-10-26','2018-08-02 19:23:09','2018-08-02 19:23:09'),
	(36,31,2,1,35,0,'Das Leben fällt, wohin es will','12.95','Party, Spaß und Freiheit – das ist für Marie das Allerwichtigste, und sie liebt ihr sorgenfreies Dasein. Das ändert sich jedoch schlagartig, als ihre Schwester Christine schwer erkrankt und sie darum bittet, sich während der Behandlung um ihre Kinder zu kümmern. Und nicht nur das – Marie soll auch noch Christines Posten in der familieneigenen Werft für Segelboote übernehmen. Darauf hat Marie ja mal so überhaupt keinen Bock, und auf ihren neuen \"Chef\", den oberspießigen Daniel, erst recht nicht. Während sie von einem Chaos ins nächste stolpert, wird ihr jedoch klar, dass es Dinge im Leben gibt, für die es sich zu kämpfen lohnt. Und dass manches einen ausgerechnet dann erwischt, wenn man es am wenigsten erwartet – zum Beispiel die Liebe.','1000',1,0,'2017-05-26','2018-08-02 19:24:18','2018-08-02 19:24:18'),
	(37,31,2,1,35,0,'Hummeln im Herzen','8.99','Von der Liebe darfste dich nich feddich machen lassen - diesen weisen Rat hört Lena gleich mehrmals von Taxifahrer Knut. Aber leichter gesagt als getan, wenn der Verlobte eine Niete und der Job wegen eines äußerst peinlichen Fehlers plötzlich ein Ex-Job ist. \r\n\r\nFür Selbstmitleid bleibt Lena aber sowieso kaum Zeit. Ihr Leben muss dringend generalüberholt werden, und außerdem zieht ausgerechnet sie als Ordnungsfanatikerin in die chaotische WG ihrer besten Freundin. Vor allem Mitbewohner Ben nervt! Der ist nämlich nicht nur unglaublich arrogant, sondern auch ein elender Womanizer. Umso irritierter ist Lena, als ihr Herz beim Gedanken an ihn immer öfter auffällige Aussetzer hat ...','1000',0,0,'2014-09-16','2018-08-02 19:25:41','2018-08-02 20:10:22'),
	(38,31,2,1,35,0,'Glück ist, wenn man trotzdem liebt','8.99','Es gibt Dinge, die Isabelle absolut heilig sind: Ihre Arbeit in einem schönen Blumenladen. Ihre Daily Soap. Und ihr tägliches Mittagessen in der alten Klitsche gegenüber. Doch die wird eines Tages von dem ambitionierten Koch Jens übernommen, der nicht nur mit seiner aufmüpfigen Teenieschwester für reichlich Wirbel sorgt - und plötzlich bricht das Chaos über Isabelles wohlgeordnete kleine Welt herein. Während sie noch versucht, alles wieder in ruhige Bahnen zu lenken, scheint ihr Herz allerdings schon ganz andere Pläne zu haben ...','1000',0,0,'2016-06-10','2018-08-02 19:26:43','2018-08-02 19:26:43'),
	(39,31,2,1,36,0,'Die Geschichte des Wassers','12.99','Norwegen, 2017. Die fast 70-jährige Umweltaktivistin Signe begibt sich auf eine riskante Reise: Mit einem Segelboot versucht sie die französische Küste zu erreichen. An Bord eine Fracht, die das Schicksal des blauen Planeten verändern kann. \r\n\r\nFrankreich, 2041. Eine große Dürre zwingt die Menschen Südeuropas zur Flucht in den Norden, es ist längst nicht genug Trinkwasser für alle da. Doch bei dem jungen Vater David und seiner Tochter Lou keimt Hoffnung auf, als sie in einem vertrockneten Garten ein uraltes Segelboot entdecken. Signes Segelboot. \r\n\r\nVirtuos verknüpft Maja Lunde das Leben und Lieben der Menschen mit dem, woraus alles Leben gemacht ist: dem Wasser. Ihr neuer Roman ist eine Feier des Wassers in seiner elementaren Kraft und ergreifende Warnung vor seiner Endlichkeit.','60',0,0,'2018-03-19','2018-08-02 19:28:07','2018-08-02 20:10:07'),
	(40,31,4,1,37,0,'Nachtblau','12.95','Die junge Haushälterin Catrijn ist begeistert, als sie mit ihrer Dienstherrin den großen Rembrandt besuchen darf. Sie selbst kann gut malen, übt ihr Talent aber nur heimlich aus. Als die Schatten der Vergangenheit sie einholen und sie fliehen muss, findet sie Unterschlupf bei dem Besitzer einer Porzellanfabrik in Delft. Zusammen mit Evert beginnt sie, die faszinierende Keramik zu verzieren, die sich weltweit einen Namen machen wird: Das Delfter Porzellan. Doch das Glück mit der nachtblauen Farbe ist nur von kurzer Dauer. Catrijn weiß, dass sie für eine vergangene Sünde zahlen muss.','1000',0,0,'2017-07-10','2018-08-02 19:29:15','2018-08-02 19:29:15'),
	(41,31,2,1,38,0,'Fahrräder für Utrecht','19.95','Als Hauke seinen Großvater zum letzten Mal im Krankenhaus besucht, offenbart ihm dieser ein dunkles Kapitel seiner Vergangenheit: Im Zweiten Weltkrieg war er in den Niederlanden stationiert und unter anderem für die Registrierung der verhafteten Juden und die Beschlagnahmung der Fahrräder verantwortlich. In die Trauer um seinen Opa mischt sich schnell auch der Gedanke an Wiedergutmachung: Hauke startet mit seinen Freunden Safi und Lars die Aktion „Gebt den Holländern ihre Fahrräder zurück“. Der Fahrradtour nach Holland schließen sich immer mehr Teilnehmer an – und so entsteht ein rasanter Roadtrip mit ungewöhnlichen Begegnungen.','100',1,0,'2017-07-10','2018-08-02 19:30:34','2018-08-02 19:30:34'),
	(42,31,16,2,39,0,'Eine kurze Geschichte der Zeit','19.95','Woher kommen wir? Warum ist das Universum so, wie es ist? Dieses Buch hat unsere Weltsicht verändert – und zugleich setzte es neue Maßstäbe für die Darstellung komplexer physikalischer Zusammenhänge. Stephen Hawkings «Eine kurze Geschichte der Zeit» hat das Wissen über die Entstehung des Universums, Schwarze Löcher, das Wesen der Zeit und die Suche nach der Weltformel in der Physik und Kosmologie populär gemacht wie kein anderes. Das Credo eines Jahrhundert-Genies.','150',1,0,'2011-12-01','2018-08-02 19:32:34','2018-08-02 19:32:34'),
	(43,31,5,1,40,0,'Mein Herz in zwei Welten','15.96','\"Trag deine Ringelstrumpfhosen mit Stolz. Führe ein unerschrockenes Leben. Fordere dich heraus. Lebe einfach.\" \r\nDiese Sätze hat Will Louisa mit auf den Weg gegeben. Doch nach seinem Tod brach eine Welt für sie zusammen. Es hat lange gedauert, aber endlich ist sie bereit, seinen Worten zu folgen und wagt in New York den Neuanfang. Die glamouröse Welt ihrer Arbeitgeber könnte von Lous altem Leben in der englischen Kleinstadt nicht weiter entfernt sein. Dort ist ein Teil ihres Herzens zurückgeblieben: bei ihrer liebenswert chaotischen Familie und vor allem bei Sam, dem Mann, der sie auffing, als sie fiel. Während Lou versucht, New York zu erobern und herauszufinden, wer Louisa Clark wirklich ist, muss sie feststellen, wie groß die Gefahr ist, sich selbst und andere auf dem Weg zu verlieren. Und am Ende muss sie sich die Frage stellen: Ist es möglich, ein Herz zu heilen, das in zwei Welten zuhause ist?','1000',0,0,'2018-01-23','2018-08-02 19:34:13','2018-08-02 20:09:38'),
	(44,31,5,1,41,0,'So klingt dein Herz','14.95','Die junge Laura lebt im Verborgenen im Westen Irlands. Niemand weiß, dass sie eine ganz besondere Fähigkeit besitzt: Sie kann jede menschliche Stimme, alle Tiere und jedes Geräusch der Welt nachahmen. Als der Toningenieur Solomon im Wald auf Laura trifft, fühlt er sich sofort magisch von ihr angezogen. Doch auch Solomons Lebensgefährtin, die Regisseurin Bo, ist fasziniert: Sie möchte einen Film über die geheimnisvolle Laura drehen. Über Nacht findet sich Laura in unserer lauten, modernen Welt wieder. Kann ihre Gabe ihr dabei helfen, das Glück zu finden – und die Liebe?','60',0,0,'2017-08-24','2018-08-02 19:35:41','2018-08-02 20:09:32'),
	(45,31,5,1,42,0,'Save Me','19.95','eBook (ePUB)\r\n9,99€\r\nHörbuch\r\nab 11,99€\r\nPaperback\r\n12,90€\r\nSie kommen aus unterschiedlichen Welten. Und doch sind sie füreinander bestimmt. Geld, Glamour, Luxus, Macht - all das könnte Ruby Bell nicht weniger interessieren. Seit sie ein Stipendium für das renommierte Maxton Hall College erhalten hat, versucht sie in erster Linie eins: ihren Mitschülern so wenig wie möglich aufzufallen. Vor allem von James Beaufort, dem heimlichen Anführer des Colleges, hält sie sich fern. Er ist zu arrogant, zu reich, zu attraktiv. Während Rubys größter Traum ein Studium in Oxford ist, scheint er nur für die nächste Party zu leben. Doch dann findet Ruby etwas heraus, was sonst niemand weiß - etwas, was den Ruf von James‘ Familie zerstören würde, sollte es an die Öffentlichkeit geraten. Plötzlich weiß James genau, wer sie ist. Und obwohl sie niemals Teil seiner Welt sein wollte, lassen ihr James - und ihr Herz - schon bald keine andere Wahl','60',0,0,'2018-02-23','2018-08-02 19:36:53','2018-08-02 19:36:53'),
	(46,31,5,1,40,0,'Ein ganz neues Leben','12.95','Sechs Monate hatten Louisa Clark und Will Traynor zusammen. Ein ganzes halbes Jahr. Und diese sechs Monate haben beide verändert. Lou ist nicht mehr das Mädchen aus der Kleinstadt, das Angst vor seinen eigenen Träumen hat. Aber sie führt auch nicht das unerschrockene Leben, das Will sich für sie gewünscht hat. Denn wie lebt man weiter, wenn man den Menschen verloren hat, den man am meisten liebt? Eine Welt ohne Will, das ist für Lou immer noch schwer zu ertragen. Ein einsames Apartment, ein trister Job am Flughafen – Lou existiert, aber ein Leben ist das nicht. Bis es eines Tages an der Tür klingelt – und sich eine Verbindung zu Will auftut, von der niemand geahnt hat. Endlich schöpft Lou wieder Kraft, Kraft zu kämpfen, für sich, für das, was Will ihr hinterlassen hat, für ein ganz neues Leben.','1000',1,0,'2015-09-24','2018-08-02 19:38:01','2018-08-02 19:38:01'),
	(47,31,2,1,43,0,'Töchter','12.95','Zwei Frauen brechen auf zu einer Reise in die Schweiz, mit einem todkranken Vater auf der Rückbank. Eine letzte, finale Fahrt soll es werden, doch nichts endet, wie man es sich vorgestellt hat, schon gar nicht das Leben. \r\nMartha und Betty kennen sich seit zwanzig Jahren und sie entscheiden sich fürs Durchbrettern. Vor sich haben sie das Ziel, von hinten drängt das nahende Unglück. \"Es gab niemanden, mit dem ich so lauthals über das Unglück lachen konnte wie mit Martha. Die wenigsten Frauen lachten über das Unglück, schon gar nicht über ihr eigenes. Frauen redeten darüber, bis sie weinten und nichts mehr zu retten war. Was das Leiden betraf, verstanden Frauen keinen Spaß.\"','60',0,0,'2018-02-20','2018-08-02 19:39:12','2018-08-02 19:39:12'),
	(48,31,45,6,44,0,'Handlettering Watercolor','19.95','Handlettering - die Kunst der schönen Buchstaben - ist und bleibt im Trend. Dieses Buch zeigt dir, wie du Handlettering noch mal ganz neu entdecken kannst: mit Watercolor! \r\n\r\nHier erfährst du, wie aus der perfekten Kombination von geletterter Schrift und Aquarellfarben wunderschöne kleine Botschaften zum Verschenken oder Behalten entstehen. Schritt für Schritt erschaffst du eindrucksvolle Projekte. Wie du mit Aquarellfarben arbeitest sowie alles, was du übers Handlettering wissen solltest, erfährst du anschaulich erklärt im ausführlichen Grundlagenteil. Schnell wirst du merken: Watercolor ist gar nicht so schwer und macht sogar wahnsinnig Spaß! \r\nDas besondere Add-on: In zusätzlichen Video-Tutorials zeigen dir die Autorinnen, wie die wichtigsten Handlettering- und Watercolor-Techniken funktionieren.','1000',0,0,'2017-08-09','2018-08-02 19:40:32','2018-08-02 19:40:32'),
	(49,31,45,6,45,0,'Handlettering Alphabete','19.95','Schönschrift macht Freude: In \"Hand Lettering Alphabete\" erklärt Frau Hölle alles, was man über Hand Lettering, Brush Lettering und Kalligrafie wissen muss. Mit vielen Anleitungen, Übungen und Rastern ist man im Handumdrehen auf dem Weg zum Lettering-Profi. Außerdem zeigt die Buchstaben-Künstlerin ihre liebsten Werkzeuge fürs Digital Lettering mit Smartphone, Tablet und PC. Exklusiv für das Buch entworfene Alphabete in verschiedenen Schriftstilen inspirieren Einsteiger und Fortgeschrittene zu eigenen Schrift-Kunstwerken. Viele neue DIY Projekte von Frau Hölle für Feiern, Wohn-Deko und Hochzeit runden dieses liebevoll gestaltete Buch ab. Einfach inspirieren lassen und loslegen!','1000',0,0,'2017-08-17','2018-08-02 19:42:34','2018-08-02 20:08:55'),
	(50,31,45,6,45,0,'Handlettering Projekte','19.95','Die schönsten Projekte für alle, die ihr Handlettering-Können selbst anwenden wollen, präsentiert Tanja Cappell in diesem Buch. Unter den 50 Lettering-Ideen finden sich Inspirationen von Büro bis Wohnzimmer und von Accessoires bis zu Papeterie. Deko-Ideen fürs Babyzimmer, edle Klappkarten für verschiedene Anlässe, individualisierte Geschenkverpackungen oder beschriftete Alltagsgegenstände - der Fantasie sind keine Grenzen gesetzt, denn alles kann belettert werden! Alle Materialien und die verwendeten Stifte werden ausführlich erklärt, die einzelnen Projekte werden in Schritt-für-Schritt-Anleitungen beschrieben und alle Letterings sind als Vorlage zum Abpausen vorhanden.','250',1,0,'2018-06-26','2018-08-02 19:43:22','2018-08-02 20:08:47'),
	(51,31,5,1,42,0,'Save You','12.95','Ruby ist am Boden zerstört. Noch nie hatte sie für jemanden so tiefe Gefühle wie für James. Und noch nie wurde sie so verletzt. Sie wünscht sich ihr altes Leben zurück als sie auf dem Maxton Hall College niemand kannte und sie kein Teil der elitären und verdorbenen Welt ihrer Mitschüler war. Doch sie kann James nicht vergessen. Vor allem nicht, als dieser alles daransetzt, sie zurückzugewinnen.','60',0,0,'2018-05-25','2018-08-02 19:44:25','2018-08-02 19:44:25'),
	(52,31,5,1,42,0,'Begin Again','8.95','Noch einmal ganz von vorne beginnen - das ist Allie Harpers sehnlichster Wunsch, als sie für ihr Studium nach Woodshill zieht. Dass sie ausgerechnet in einer WG mit einem überheblichen \r\nBad Boy landet, passt ihr daher gar nicht in den Plan. Kaden White ist zwar unfassbar attraktiv - mit seinen Tattoos und seiner unverschämten Art aber so ziemlich der Letzte, mit dem Allie \r\nsich eine Wohnung teilen möchte. Zumal er als allererstes eine Liste von Regeln aufstellt. Die wichtigste: Wir fangen niemals etwas miteinander an! Doch Allie merkt schnell, dass sich hinter \r\nKadens Fassade viel mehr verbirgt als zunächst angenommen. Und je besser sie ihn kennenlernt, desto unmöglicher wird es ihr, das heftige Prickeln zwischen ihnen zu ignorieren.','100',0,0,'2016-10-14','2018-08-02 19:45:31','2018-08-02 19:45:31'),
	(53,31,2,1,47,0,'Vielleicht mag ich dich morgen','12.95','Wiedersehen macht nicht immer Freude. Schon gar nicht Anna, die nach 16 Jahren beim Klassentreffen mit genau jenem Typen konfrontiert wird, der ihr damals den Schulalltag zur Hölle machte. Damals, als sie noch die ängstliche, pummelige und so gern gehänselte Aureliana war. Wie wenig sie heute als schöne und begehrenswerte Frau mit dem Mädchen von einst gemein hat, wird klar, als James sie nicht erkennt. Er ist fasziniert von der schönen Unbekannten. Anna kann es kaum glauben und wittert ihre Chance: Endlich kann sie ihm alles heimzahlen. Beide ahnen nicht, wie sehr sie das Leben des anderen noch verändern werden. Nicht heute. Aber vielleicht morgen.','1000',1,0,'2015-05-04','2018-08-02 19:46:59','2018-08-02 19:46:59'),
	(54,31,2,1,49,0,'Nur einen Horizont entfernt','12.95','Mit zittrigen Fingern öffnet die TV-Moderatorin Hannah Farr einen Brief. Der Absender ist eine ehemalige Schulfreundin, die sie jahrelang gemobbt hat. Die Frau bittet sie nun um Vergebung. Dem Brief beigelegt sind zwei kleine runde Steine und eine Anleitung. Einen Stein soll sie als Zeichen dafür zurücksenden, dass sie ihrer früheren Klassenkameradin vergibt. Den anderen soll sie an jemanden schicken, den sie selbst um Verzeihung bitten möchte. Hannah weiß sofort, wer das sein könnte: ihre Mutter. Aber soll sie wirklich zurück zu den schmerzhaften Ereignissen von damals und die Auseinandersetzung mit dem Menschen suchen, der sie am besten kennt? Denn Hannah hat etwas getan, das das Leben ihrer Mutter für immer verändert hat …','250',1,0,'2016-09-22','2018-08-02 19:47:58','2018-08-02 19:47:58'),
	(55,31,1,1,34,0,'Flugangst 7A','19.95','Es gibt eine tödliche Waffe, die durch jede Kontrolle kommt. Jeder kann sie ungehindert an Bord eines Flugzeugs bringen. Ein Nachtflug Buenos Aires-Berlin. Ein seelisch labiler Passagier. Und ein Psychiater, der diesen Passagier dazu bewegen soll, die Maschine zum Absturz zu bringen – sonst stirbt der einzige Mensch, den er liebt.','1000',1,0,'2017-10-25','2018-08-02 19:51:03','2018-08-02 19:51:03'),
	(56,31,1,1,34,0,'Die Therapie','12.95','Keine Zeugen, keine Spuren, keine Leiche. Josy, die zwölfjährige Tochter des bekannten Psychiaters Viktor Larenz, verschwindet unter mysteriösen Umständen. Ihr Schicksal bleibt ungeklärt. \r\nVier Jahre später: Der trauernde Viktor hat sich in ein abgelegenes Ferienhaus zurückgezogen. Doch eine schöne Unbekannte spürt ihn dort auf. Sie wird von Wahnvorstellungen gequält. Darin erscheint ihr immer wieder ein kleines Mädchen, das ebenso spurlos verschwindet wie einst Josy. Viktor beginnt mit der Therapie, die mehr und mehr zum dramatischen Verhör wird …','150',0,0,'2006-07-01','2018-08-02 19:52:37','2018-08-02 19:52:37'),
	(57,31,1,1,34,0,'Der Augenjäger','15.95','Dr. Suker ist einer der besten Augenchirurgen der Welt. Und Psychopath. Tagsüber führt er die kompliziertesten Operationen am menschlichen Auge durch. Nachts widmet er sich besonderen Patientinnen: Frauen, denen er im wahrsten Sinne des Wortes die Augen öffnet. Denn bevor er sie vergewaltigt, entfernt er ihnen sorgfältig die Augenlider. Bisher haben alle Opfer kurz danach Selbstmord begangen. \r\nAus Mangel an Zeugen und Beweisen bittet die Polizei Alina Gregoriev um Mithilfe. Die blinde Physiotherapeutin, die seit dem Fall des Augensammlers als Medium gilt, soll Hinweise auf Sukers nächste „Patientin“ geben. Zögernd lässt sich Alina darauf ein - und wird von dieser Sekunde an in einen Strudel aus Wahn und Gewalt gerissen ...','100',0,0,'2012-11-02','2018-08-02 19:53:45','2018-08-02 19:53:45'),
	(58,31,1,1,34,0,'Passagier 23','12.95','Martin Schwartz, Polizeipsychologe, hat vor fünf Jahren Frau und Sohn verloren. Es geschah während eines Urlaubs auf dem Kreuzfahrtschiff „Sultan of the Seas“ – niemand konnte ihm sagen, was genau geschah. Martin ist seither ein psychisches Wrack und betäubt sich mit Himmelfahrtskommandos als verdeckter Ermittler. \r\nMitten in einem Einsatz bekommt er den Anruf einer seltsamen alten Dame, die sich als Thrillerautorin bezeichnet: Er müsse unbedingt an Bord der „Sultan“ kommen, es gebe Beweise dafür, was seiner Familie zugestoßen ist. Nie wieder wollte Martin den Fuß auf ein Schiff setzen – und doch folgt er dem Hinweis und erfährt, dass ein vor Wochen auf der „Sultan“ verschwundenes Mädchen wieder aufgetaucht ist. Mit dem Teddy seines Sohnes im Arm …','100',0,0,'2015-10-29','2018-08-02 19:55:07','2018-08-02 19:55:07'),
	(59,31,7,1,50,0,'Die Saat des goldenen Löwen','19.95','Ein erbitterter Erbfolgekrieg verwüstet die Sieben Königreiche und der Bürgerkrieg zerreißt das Reich Westeros. Der kindliche, aber bösartige Joffrey sitzt auf dem Thron, unterstützt von seiner intriganten Familie. Nur der junge Robb Stark, der Gegenkönig des Nordens, leistet ernsthaften Widerstand. Um ihren Bruder zur Treue zu zwingen, hält der grausame Joffrey die Schwestern Sansa und Arya Stark als Geiseln. Während die ältere Sansa versuchen will, das beste aus der Situation zu machen, entscheidet sich Arya zur Flucht. Doch der Weg zu ihrer sicheren Heimat in Winterfell ist lang, und die verschiedenen Parteien, die im Bürgerkrieg aufeinanderprallen, sind nicht die einzige Gefahr für das junge Mädchen. Und während sich in Westeros eine gewaltige Entscheidungsschlacht anbahnt, zieht die Tochter des vertriebenen Tyrannengeschlechts ihre Drachenbrut auf!','1000',1,0,'2011-09-19','2018-08-02 20:06:23','2018-08-02 20:06:23'),
	(60,31,7,1,50,0,'Die dunkle Königin','19.95','Die Lage in Westeros stabilisiert sich, ein endgültiger Sieg der herrschenden Lennisters ist in greifbare Nähe gerückt. Alljährlich kehren Gesetz und Ordnung in weite Teile des vom Krieg verwüsteten Landes zurück. Doch die Königin Regentin Cersei findet keine Ruhe. Nach dem tragischen Verlust ihres erstgeborenen Sohnes und der Hochzeit ihres zweitgeborenen, des Kindkönigs Tommen, mit der ungeliebten Margaery Tyrell drehen sich ihre Gedanken nur noch um die Frage, wie sie der künftigen Königin eine Falle stellen kann, um deren Regentschaft zu verhindern. Während sie bei Hof ihre Intrigen spinnt, beginnt es im Süden erneut zu brodeln, und die Eisennmänner holen zu einem vernichtenden Schlag gegen das Reich aus. Cersei verliert zunehmend die Fähigkeit, zwischen Freund und Feind zu unterscheiden: So verleiht sie den Predigern des wieder erwachten Glaubens große Macht und übersieht dabei, wie leicht die gesponnenen Ränke sich gegen sie selbst richten könnten!','1000',0,0,'2012-03-19','2018-08-02 20:12:01','2018-08-02 20:12:01'),
	(61,31,7,1,50,0,'Sturm der Schwerter','12.95','Ein blutiger Bürgerkrieg tobt in den Sieben Königreichen. Robb Stark, der Herr von Winterfell, leistet dem tyrannischen Kind-König Joffrey Lennister hartnäckig Widerstand und lässt sich auch nicht dadurch in die Knie zwingen, dass seine Schwester vom König als Geisel gehalten wird.','1000',0,0,'2011-10-17','2018-08-02 20:13:11','2018-08-02 20:13:11'),
	(62,31,3,1,51,0,'Schattenparker, Bordsteinrammer und andere Fahrschüler','8.99','Andreas Hoeglauers Job erfordert Durchsetzungfähigkeit, Sensibilität und Nerven wie Drahtseile – er bringt Menschen das Autofahren bei. Ob mal wieder eine Horde renitenter Heranwachsender versucht, seinen Theorieunterricht zu sabotieren, ihn seine Lieblingsfahrschülerin Milena in ihrer 199. Fahrstunde einmal mehr an den Rand des Wahnsinns treibt oder der unbelehrbare Herr Berger schon wieder auf den letzten Drücker die Fahrstunden seiner Söhne verschieben will – -Andreas lässt sich nicht unterkriegen. Mit stoischer Ruhe und einem flotten Spruch auf den Lippen schleppt er selbst vermeintlich hoffnungslose Fälle bis zur erfolgreichen Fahrprüfung.','60',0,0,'2013-04-01','2018-08-02 20:15:48','2018-08-02 20:15:48'),
	(63,31,10,1,52,0,'Die Physiker','10.95','Kernphysiker Möbius, Entdecker einer furchtbaren und gefährlichen Formel, flüchtet, seine Familie preisgebend, ins Irrenhaus. Er spielt Irrsinn, er fingiert die Heimsuchung durch den Geist Salomos, um das, was er entdeckte, als Produkt des Irrsinns zu diffamieren. Doch zwei Geheimagenten, ebenfalls als Wahnsinnige getarnt, sind ihm auf der Spur.','1000',1,0,'1998-09-30','2018-08-02 20:18:23','2018-08-02 20:18:23'),
	(64,31,10,1,52,0,'Der Besuch der alten Dame','10.95','»Claire Zachanassian, eine amerikanische Multimillionärin, kehrt in ihr Heimatdorf Güllen zurück, um sich zu rächen: Vor Jahrzehnten hat sie aus dem Dorf fliehen müssen, denn sie bekam ein Kind von Ill, ihrem Geliebten, und dieser Ill hat damals Zeugen bestochen, die beschworen, daß auch sie etwas mit Claire gehabt hätten. Sie bietet der Stadt eine Milliarde, wenn man ihr den noch lebenden Ill tot vor die Füße legt.«','100',0,0,'1998-09-30','2018-08-02 20:19:28','2018-08-02 20:19:28'),
	(65,31,10,1,52,0,'Der Richter und sein Henker','10.95','\"Der Richter und sein Henker\" ist einer seiner berühmtesten Romane - die Geschichte eines Mordes. Mit den reißerischen Mitteln einer Detektivstory erzählt er die Aufklärung einer Gewalttat an einem Polizeileutnant, den letzten Fall des totkranken Komissars Bärlach - die Geschichte einer hintergründigen Pointe.','150',0,0,'1955-06-01','2018-08-02 20:20:42','2018-08-02 20:20:42'),
	(66,31,11,2,54,0,'Kleinhirn an alle','10.95','Darauf haben Generationen von Fans gerade noch gewartet: Otto erzählt aus den ersten 70 Jahren seines Lebens – einem märchenhaften Aufstieg vom Deichkind zum Alleinunterhalter der Nation. Seine Sketche und Figuren haben unser kollektives Gedächtnis und unseren Witzwortschatz bereichert: Harry Hirsch (übergibt sich ins Funkhaus), Robin Hood (der Stecher der Entnervten), Susi Sorglos (föhnt ihr goldenes Haar), Louis Flambée (kocht Pommes de Bordell) Peter, Paul and Mary (are planning a bank robbery) und der „Schniedelwutz“ (hat\'s bis in den Duden gebracht). \r\nAber: Wer waren eigentlich Ottos Vorbilder? Wo kommt er her? Was treibt ihn an? Wie entsteht seine eigene Art von Komik? Und wozu überhaupt? Gibt es ein Geheimnis? \r\nJetzt erzählt Otto freiwillig von Höhe- und Tiefpunkten, von den glücklichsten und den glanzvollsten Momenten, ohne die peinlichsten und traurigsten auszulassen. Nicht zu vergessen einige noch unveröffentlichte Fotos und selbstgemalte Bilder.','1000',0,0,'2018-05-14','2018-08-02 20:24:37','2018-08-02 20:24:37'),
	(67,31,11,2,53,0,'9 Tage wach','12.95','In seinem Buch „9 Tage wach“ berichtet Eric Stehfest, wie und warum er in seinem früheren Leben drogenabhängig geworden war. Als Jugendlicher hat er mehrere Jahre über die bekannte Partydroge Crystal Meth genommen und ein Doppelleben geführt. Ein neuntägiger Rausch, der ihn fast das Leben gekostet hätte, brachte ihn schließlich zu seinem Entzug. Mit „9 Tage wach“ hat er sein Anliegen umgesetzt, andere über die Gefahren der Droge zu informieren oder dabei zu helfen, den Absprung zu schaffen. Eindrucksvoll und wortgewaltig beschreibt er schonungslos, wie er den Rausch der Drogen erlebt und wie schmerzhaft es gewesen ist, davon wieder loszukommen. Das Buch ist eine ehrliche, nachdenkliche und mitunter tragikomische Darstellung einer Vergangenheit, die von unvorstellbaren Drogen-Trips, Schizophrenie, Promiskuität und Kriminalität gezeichnet ist. Ergänzt wird die authentische und bewegende Lebensgeschichte in „9 Tage wach“ durch Fotografien von Michael J. Stephan.','60',1,0,'2017-03-30','2018-08-02 20:25:36','2018-08-02 20:25:36'),
	(68,31,11,2,55,0,'Mit 50 Euro um die Welt','15.95','Vier Jahre war er unterwegs, hat 45 Länder bereist und 100.000 Kilometer zu Fuß, per Anhalter und auf Segelbooten zurückgelegt. Seinen Lebensunterhalt hat er sich als Goldwäscher, Schleusenwart, Babysitter und Fotomodell verdient, unter Ureinwohnern und Drogendealern gelebt und ist durch die Krisengebiete des mittleren Ostens getrampt. \r\n\r\nIn diesem Buch erzählt der junge Weltenbummler auf humorvolle und mitreißende Art von seinen unglaublichen Erlebnissen. Er verrät, was er unterwegs über das Leben, die Liebe und Gott gelernt hat, schildert berührende und skurrile Begegnungen und verblüfft mit Einblicken, die man in keinem Reiseführer finden würde.','1000',0,0,'2018-05-24','2018-08-02 20:26:47','2018-08-02 20:26:47'),
	(69,31,12,2,56,0,'Psyche? Hat doch jeder!','12.95','Depressionen, Panikattacken, Essstörungen – psychische Erkrankungen sind uns längst allen ein Begriff. Doch wie entsteht eigentlich ein seelisches Ungleichgewicht? Was ist dann zu tun und was ist das überhaupt genau – diese Psyche? Psychotherapeutin und Bloggerin Lena Kuhlmann räumt auf charmante Art und Weise mit Vorurteilen über psychische Krankheiten auf und berichtet, wie es in psychiatrischen Einrichtungen heute wirklich aussieht. Neben praktischen Tipps, um die Psyche in Schuss zu \r\nhalten, gibt sie durch persönliche Anekdoten außerdem einen spannenden Einblick in ihre tägliche Arbeit: Psychotherapeuten können zwar keine Gedanken lesen, aber ihr Job besteht aus weit mehr, als nur auf einem gemütlichen Sessel zu sitzen und »Mhm« zu murmeln.','60',0,0,'2018-08-03','2018-08-02 20:29:30','2018-08-02 20:29:30'),
	(70,31,13,2,57,0,'Tagebuch','14.95','Das Tagebuch von Anne Frank ist Symbol und Dokument zugleich. Symbol für den Völkermord an den Juden durch die Nazi-Verbrecher und Dokument der Lebenswelt einer einzigartig begabten jungen Schriftstellerin. \r\n\r\nDie vorliegende Ausgabe ist die einzige vom Anne Frank Fonds in Basel autorisierte Fassung des Tagebuchs, von dem es eine erste und eine zweite, spätere Version gibt, die beide von Anne Frank selbst stammen. Sie hatte das von ihr über mehr als zwei Jahre geführte Tagebuch zu einem späteren Zeitpunkt überarbeitet, weil die erste Fassung ihren schriftstellerischen Ansprüchen nicht mehr genügte.','1000',1,0,'2002-03-21','2018-08-02 20:31:42','2018-08-02 20:31:42'),
	(71,31,14,2,58,0,'Madame Picasso','12.99','Der Maler und seine Muse \r\n\r\nParis, 1911: Auf der Suche nach einem neuen Leben kommt die junge Eva in die schillernde Metropole. Hier, im Herzen der Bohème, verliebt sie sich in den Ausnahmekünstler Pablo Picasso. Gegen alle Widerstände erwidert er ihre Gefühle, und eine der großen Liebesgeschichten des Jahrhunderts nimmt ihren Lauf. Eva wird Picassos Muse – und ihr Aufeinandertreffen wird sein Leben für immer verändern.','1000',0,0,'2015-03-09','2018-08-02 20:33:48','2018-08-02 20:33:48'),
	(72,31,15,2,59,0,'Schizo-Wirtschaft','24.95','gebundene Ausgabe\r\n24,99€\r\neBook\r\nab 20,99€\r\nDie Wirtschaft sind wir alle. Und diese Wirtschaft ist krank. Unternehmen, Mitarbeiter und Konsumenten sind in sich gespaltene Akteure, die verdeckt opportunistisch und gegen ihre eigenen langfristigen Interessen handeln und dies ausblenden, je nachdem in welcher Rolle und an welchem Punkt der Wertschöpfungskette sie gerade auftreten. Zusammen erzeugen sie eine Marktdynamik auf Selbstzerstörungskurs.','60',0,0,'2015-03-01','2018-08-02 20:39:12','2018-08-02 20:39:12'),
	(73,31,17,2,60,0,'Winning matters','12.95','»Ich habe keinen Plan B - also muss Plan A funktionieren«25 km Schwimmen, 650 km Radfahren und 100 km Laufen. So sieht die Arbeitswoche von Jan Frodeno aus, dem erfolgreichsten Triathleten weltweit. Frodeno gibt tiefgehende Einblicke in sein Leben, in alle sportlichen und privaten Höhen und Tiefen - vom überraschenden Olympiasieg über seinen Burnout bis hin zu seinen Siegen beim legendären Ironman auf Hawaii - sicher nicht die letzten Höhepunkte seiner Karriere. Er erzählt, wie er die Niederlage bei der WM 2017 verarbeitet hat, welche Prinzipien ihn zu den Erfolgen als Sportler geführt und ihn zu dem Menschen gemacht haben, der er heute ist: Mut, harte Arbeit, Verzicht, Motivation - und vor allem: Leidenschaft.','60',0,0,'2017-05-02','2018-08-02 20:41:34','2018-08-02 20:41:34'),
	(74,31,18,2,61,0,'Mikroabenteuer','14.95','»Als ich eines Nachmittags kurzerhand mit dem Fahrrad aufbrach, um über Nacht von Hamburg nach Berlin zu fahren, hatte ich keine Ahnung, dass diese Aktion mein Leben völlig auf den Kopf stellen sollte. Die Abenteuer, die oft so weit weg schienen, lagen auf einmal überall herum. Ich musste sie nur machen.«\r\n\r\nDas Motto Raus und machen! ist mittlerweile das Herz der Mikroabenteuer-Philosophie von Christo Foerster. In diesem rappelvollen Buch berichtet der Autor und Motivationstrainer von seinen eigenen Erlebnissen vor der Haustür, stellt Ideen und Ausrüstung vor, skizziert Touren für Städte, Berge und Wälder. Warum warten bis du genug Geld, genug Urlaub, genug Mut hast? Time is now.','1000',0,0,'2018-04-08','2018-08-02 20:44:19','2018-08-02 20:44:19'),
	(75,31,19,2,62,0,'The Bikini-Body 28-Day Lifestyle Guide','19.95','The body transformation phenomenon and #1 Instagram sensation\'s first healthy eating and lifestyle book!Millions of women follow Kayla Itsines and her Bikini Body Guide 28-minute workouts: energetic, kinetic, high-intensity interval training sessions that help women achieve healthy, strong bodies. Fans not only follow Kayla on Instagram, they pack stadiums for workout sessions with her, they\'ve made her Sweat with Kayla app hit the top of the Apple App Store\'s health and fitness charts, and they post amazing before and after progress shots. Kayla\'s audience is avid and growing, with over 10 million followers worldwide.The Bikini Body 28-Day Healthy Eating & Lifestyle Guide features:- 200 recipes such as fresh fruit breakfast platters, smoothie bowls, and salads.','250',1,0,'2016-12-29','2018-08-02 20:46:35','2018-08-02 20:46:35'),
	(76,31,20,3,63,0,'Die Eule mit der Beule','8.99','Arme kleine Eule! Ein wunderbares Trostbuch. Die kleine Eule hat eine Beule. Der Fuchs pustet, die Maus bringt ein Pflaster und die Schlange streichelt ihr die Wange. Doch was hilft am besten? Natürlich ein Kuss von der Mama! Ein absolutes Lieblingsbuch für kleine Kinder mit der süßesten Eule der Welt. Einfach zum Liebhaben und Mitfühlen! Klare Bilder und einfache Reime zum Mitsprechen sorgen für viel Spaß beim Lesen.','60',0,0,'2013-02-01','2018-08-02 20:49:16','2018-08-02 20:49:16');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle states
# ------------------------------------------------------------

DROP TABLE IF EXISTS `states`;

CREATE TABLE `states` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;

INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Bestellung aufgegeben','2018-07-18 10:34:12','2018-07-18 10:34:07'),
	(2,'Bestellung wird bearbeitet','2018-07-23 10:12:43','2018-07-23 10:12:43'),
	(3,'Bestellung wurde versandt','2018-07-23 10:13:09','2018-07-23 10:13:09'),
	(5,'Bestellung zugestellt','2018-07-23 10:13:50','2018-07-23 10:13:50'),
	(6,'Bestellung wurde bezahlt','2018-07-23 10:14:12','2018-07-23 10:14:12'),
	(7,'Retoure','2018-07-23 10:14:33','2018-07-23 10:14:33');

/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '3',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(6,'Juliane','Kühne','tbrandt@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'nCkTBMT73a','2018-05-24 10:44:32','2018-07-23 14:42:37'),
	(7,'Emanuel','Heuer','seidl.antonia@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'gb4XCVLh9V','2018-05-24 10:44:32','2018-05-24 10:44:32'),
	(9,'Hedwig','Vollmer','ekrug@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'teKG6b9RY3','2018-05-24 10:44:32','2018-05-24 10:44:32'),
	(10,'Boris','Beer','renata07@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'xVn3mQVQcZ','2018-05-24 10:44:32','2018-05-24 10:44:32'),
	(11,'Siegbert','Schreiber','konstantinos.gotz@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'gtg4SseAG5','2018-05-24 10:44:33','2018-05-24 10:44:33'),
	(12,'Lotte','Zander','schade.katarina@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'iF9HJUYZ9I','2018-05-24 10:44:33','2018-05-24 10:44:33'),
	(13,'Helfried','Zimmer','herold.natascha@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'aVkQeUsnOy','2018-05-24 10:44:33','2018-05-24 10:44:33'),
	(14,'Edeltraud','Engel','emil.martens@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'1RHDLsKwmW','2018-05-24 10:44:33','2018-05-24 10:44:33'),
	(15,'Krystyna','Wimmer','henkel.gerald@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'Io3a1SoDpO','2018-05-24 10:44:33','2018-05-24 10:44:33'),
	(16,'Sandro','Wieland','irma.schott@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'KGTCj0wlZP','2018-05-24 10:44:33','2018-05-24 10:44:33'),
	(17,'Amalie','Dittrich','glink@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'8B6zFqDIH7','2018-05-24 10:44:33','2018-05-24 10:44:33'),
	(18,'Karl-Otto','Thiele','buck.dimitri@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'MhIdNLqcQh','2018-05-24 10:44:33','2018-05-24 10:44:33'),
	(19,'Götz','Jost','bode.edgar@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'U8qmPYTHrI','2018-05-24 10:44:33','2018-05-24 10:44:33'),
	(20,'Hans-Hermann','Hinz','annelie.weber@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'LWJNJcZZqN','2018-05-24 10:44:33','2018-05-24 10:44:33'),
	(21,'Jose','Roth','koster.konrad@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'9HNzCWzQIe','2018-05-24 10:44:33','2018-05-24 10:44:33'),
	(22,'Fritz','Springer','elfriede.krebs@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'lG5R1q1u1B','2018-05-24 10:44:33','2018-05-24 10:44:33'),
	(23,'Annelie','Block','maritta.gerber@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'6vca93Hf7z','2018-05-24 10:44:33','2018-05-24 10:44:33'),
	(24,'Peter','Schütze','ljohn@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'5hswdF374V','2018-05-24 10:44:33','2018-05-24 10:44:33'),
	(25,'Kathrin','Schramm','edelgard75@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'pdPkKQ2bHR','2018-05-24 10:44:33','2018-05-24 10:44:33'),
	(26,'Dominik','Günther','hammer.ullrich@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'JkV7U91TxU','2018-05-24 10:44:33','2018-05-24 10:44:33'),
	(27,'Gertrud','Krieger','steinbach.gero@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'vHON04HeeX','2018-05-24 10:44:33','2018-05-24 10:44:33'),
	(28,'Hans-Georg','Wegener','karlheinz.jordan@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'XEev1fqxn7','2018-05-24 10:44:33','2018-05-24 10:44:33'),
	(29,'Ludmila','Engel','gottfried88@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'WeqZrn2Q7g','2018-05-24 10:44:33','2018-05-24 10:44:33'),
	(30,'Magda','Vogt','bock.tanja@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',3,'VJdeoT9xTdqeuW1p5aUBbxqKH1oz2Kt9JMbOmEZBghxQev3YFl5QfSsYmO5o','2018-05-24 10:44:33','2018-05-24 10:44:33'),
	(31,'Daniela','Hofmann','daniela.hofmann3010@gmail.com','$2y$10$rG/DxR0hfvrV732AaLqLrOldsZlFS1F8aO.whZe1TuY7zM8CGdpjq',1,'RP5s43mCLHE4Hl8clzr54l4M1wGO20p7BkECaBUhptaJXr08uAmyj7vIP3Bc','2018-07-23 15:03:12','2018-07-23 15:03:12'),
	(34,'Daniela','Hofmann','sonne@sonne.de','$2y$10$hccyQjwdJmKuG69hF/4q6.UFXbu.H9FUlccU.T8Nr2d4Jbq7WpSNy',1,NULL,'2018-07-23 15:04:07','2018-07-23 15:04:07');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
