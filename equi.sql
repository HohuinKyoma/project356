# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.29)
# Database: equi
# Generation Time: 2014-03-13 15:00:57 +0100
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table avatars
# ------------------------------------------------------------

DROP TABLE IF EXISTS `avatars`;

CREATE TABLE `avatars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `avatars` WRITE;
/*!40000 ALTER TABLE `avatars` DISABLE KEYS */;

INSERT INTO `avatars` (`id`, `name`, `type`, `user_id`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'531f9a8a42835_Rémi','jpg',1,'0000-00-00 00:00:00','2014-03-12 00:21:46',NULL),
	(2,'52b22de5d5981_marc','jpg',6,'2013-12-15 17:18:40','2013-12-19 00:21:09',NULL),
	(3,'default','png',7,'2013-12-15 17:19:59','2013-12-15 17:19:59',NULL),
	(4,'default','png',8,'2013-12-15 17:20:15','2013-12-15 17:20:15',NULL);

/*!40000 ALTER TABLE `avatars` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table codes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `codes`;

CREATE TABLE `codes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `generated` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `codes` WRITE;
/*!40000 ALTER TABLE `codes` DISABLE KEYS */;

INSERT INTO `codes` (`id`, `value`, `count`, `generated`, `user_id`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'30A6B1B0',0,'2013-12-17 22:50:37',1,'2013-12-14 18:58:57','2013-12-17 22:50:37',NULL),
	(6,'16EAF2C5',0,'2013-12-15 17:18:40',6,'2013-12-15 17:18:40','2013-12-15 17:18:40',NULL),
	(7,'A3F9BF91',0,'2013-12-15 17:19:59',7,'2013-12-15 17:19:59','2013-12-15 17:19:59',NULL),
	(8,'C064A306',0,'2013-12-15 17:20:15',8,'2013-12-15 17:20:15','2013-12-15 17:20:15',NULL);

/*!40000 ALTER TABLE `codes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`migration`, `batch`)
VALUES
	('2013_12_08_161810_create_profiles_table',2),
	('2013_12_08_161729_create_users_table',3),
	('2013_12_14_175609_create_codes_table',4),
	('2013_12_15_115003_create_options_table',5),
	('2013_12_15_143509_create_avatars_table',6),
	('2013_12_15_193742_create_visits_table',7),
	('2013_12_15_215104_create_posts_table',8);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table options
# ------------------------------------------------------------

DROP TABLE IF EXISTS `options`;

CREATE TABLE `options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maintenance` tinyint(1) NOT NULL DEFAULT '0',
  `ips` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;

INSERT INTO `options` (`id`, `title`, `maintenance`, `ips`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Le 356ème Jour',0,'','2013-12-15 11:56:41','2013-12-15 23:18:44',NULL);

/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `user_id`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'hello world','hello-world','<p>ihhhdhudsh</p>',1,'2013-12-15 22:23:21','2013-12-15 22:23:21',NULL),
	(2,'uguuggug','uguuggug','<p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><br></p>',1,'2013-12-15 22:31:49','2013-12-15 22:31:49',NULL);

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table profiles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `profiles`;

CREATE TABLE `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;

INSERT INTO `profiles` (`id`, `nickname`, `user_id`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Rémi',1,'2013-12-14 18:58:57','2013-12-14 18:58:57',NULL),
	(6,'marc',6,'2013-12-15 17:18:40','2013-12-15 17:18:40',NULL),
	(7,'chris',7,'2013-12-15 17:19:59','2013-12-15 17:19:59',NULL),
	(8,'jack',8,'2013-12-15 17:20:15','2013-12-15 17:20:15',NULL);

/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sa` tinyint(4) NOT NULL DEFAULT '0',
  `father_id` int(11) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `sa`, `father_id`, `password`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'rolletremi@gmail.com',1,NULL,'$2y$08$x2rVEV9z9I2m7g69gAsPu.ffRDHbSPdWg7v6ttPgeExBC6ggJb6Ne','2013-12-14 18:58:57','2013-12-15 20:11:49',NULL),
	(6,'marc@gmail.com',0,1,'$2y$08$JnQuCUShR5v4Vk6mGJc/tuwD/Q12rStIVlr8/QYC2mFPceZFqW1r6','2013-12-15 17:18:40','2013-12-15 17:18:40',NULL),
	(7,'chris@gmail.com',0,1,'$2y$08$g.jyNrC8ljeM0iC0FXud7.2/18zHFiYSOouuGldjAB96jCA8JsKW.','2013-12-15 17:19:59','2013-12-15 17:19:59',NULL),
	(8,'jack@gmail.com',0,1,'$2y$08$f5oRJHzmkQ8mErfHoaVVSe4EkyGNsuukW.HjRxhXL63oaKyu2BIvm','2013-12-15 17:20:15','2013-12-15 17:20:15',NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table visits
# ------------------------------------------------------------

DROP TABLE IF EXISTS `visits`;

CREATE TABLE `visits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `visitor_id` int(11) NOT NULL,
  `visited_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `visits` WRITE;
/*!40000 ALTER TABLE `visits` DISABLE KEYS */;

INSERT INTO `visits` (`id`, `visitor_id`, `visited_id`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,1,6,'2013-12-15 19:49:14','2013-12-15 19:49:14','2013-12-15 19:49:14'),
	(2,1,6,'2013-12-15 19:49:15','2013-12-15 19:49:15','2013-12-15 19:49:15'),
	(3,1,6,'2013-12-15 19:49:16','2013-12-15 19:49:16','2013-12-15 19:49:16'),
	(11,6,1,'2013-12-15 20:02:52','2013-12-15 20:02:52',NULL),
	(52,1,6,'2014-03-12 00:41:28','2014-03-12 00:41:28',NULL);

/*!40000 ALTER TABLE `visits` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
