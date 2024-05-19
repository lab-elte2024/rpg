-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Szerver verzió:               10.4.32-MariaDB - mariadb.org binary distribution
-- Szerver OS:                   Win64
-- HeidiSQL Verzió:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Adatbázis struktúra mentése a rpg_database.
CREATE DATABASE IF NOT EXISTS `rpg_database` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `rpg_database`;

-- Struktúra mentése tábla rpg_database. armor
CREATE TABLE IF NOT EXISTS `armor` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `armor` int(11) DEFAULT NULL,
  `lvl` int(11) DEFAULT NULL,
  `pictureID` int(11) DEFAULT NULL,
  `classID` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.armor: ~8 rows (hozzávetőleg)
/*!40000 ALTER TABLE `armor` DISABLE KEYS */;
REPLACE INTO `armor` (`ID`, `name`, `armor`, `lvl`, `pictureID`, `classID`, `price`) VALUES
	(1, 'Egyszerű páncél', NULL, 1, NULL, 1, 0),
	(2, 'Vértezett páncél', NULL, 2, NULL, 1, 100),
	(3, 'Nehéz páncél', NULL, 3, NULL, 1, 200),
	(4, 'Sétáló Erőd', NULL, 4, NULL, 1, 300),
	(5, 'musketer lvl1', NULL, 1, NULL, 2, 0),
	(6, 'musketer lvl2', NULL, 2, NULL, 2, 100),
	(7, 'musketer lvl3', NULL, 3, NULL, 2, 200),
	(8, 'musketer lvl4', NULL, 4, NULL, 2, 300);
/*!40000 ALTER TABLE `armor` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_database. classes
CREATE TABLE IF NOT EXISTS `classes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `attack` int(11) DEFAULT NULL,
  `defense` int(11) DEFAULT NULL,
  `speed` int(11) DEFAULT NULL,
  `pictureID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.classes: ~4 rows (hozzávetőleg)
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
REPLACE INTO `classes` (`ID`, `name`, `attack`, `defense`, `speed`, `pictureID`) VALUES
	(1, 'Swordman', 6, 8, 4, NULL),
	(2, 'Musketer', 7, 5, 5, NULL),
	(3, 'Conquistador', 7, 6, 6, NULL),
	(4, 'Pikeman', 6, 7, 5, NULL);
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_database. enemies
CREATE TABLE IF NOT EXISTS `enemies` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `hp` int(11) NOT NULL,
  `attack_power` int(11) NOT NULL,
  `defense_power` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `pictureID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  CONSTRAINT `enemies_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `battle_quests` (`enemyID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.enemies: ~1 rows (hozzávetőleg)
/*!40000 ALTER TABLE `enemies` DISABLE KEYS */;
/*!40000 ALTER TABLE `enemies` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_databaćse. failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tábla adatainak mentése rpg_database.failed_jobs: ~0 rows (hozzávetőleg)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_database. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tábla adatainak mentése rpg_database.migrations: ~3 rows (hozzávetőleg)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(2, '2019_08_19_000000_create_failed_jobs_table', 1),
	(3, '2019_12_14_000001_create_personal_access_tokens_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_database. missions
CREATE TABLE IF NOT EXISTS `missions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pre_id` int(11) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `type` varchar(256) DEFAULT NULL,
  `enemy_id` int(11) DEFAULT NULL,
  `problem` text DEFAULT NULL,
  `solution` text DEFAULT NULL,
  `reward` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.missions: ~0 rows (hozzávetőleg)
/*!40000 ALTER TABLE `missions` DISABLE KEYS */;
/*!40000 ALTER TABLE `missions` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_database. password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tábla adatainak mentése rpg_database.password_reset_tokens: ~0 rows (hozzávetőleg)
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_database. personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tábla adatainak mentése rpg_database.personal_access_tokens: ~0 rows (hozzávetőleg)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_database. players
CREATE TABLE IF NOT EXISTS `players` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `classID` int(11) NOT NULL DEFAULT 0,
  `attack` int(11) NOT NULL,
  `defense` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `hp` int(11) DEFAULT 100,
  `lvl` int(11) DEFAULT 1,
  `xp_count` int(11) DEFAULT 0,
  `userID` int(11) DEFAULT NULL,
  `maxHP` int(11) NOT NULL DEFAULT 100,
  `points` int(11) NOT NULL DEFAULT 0,
  `money` int(11) NOT NULL DEFAULT 0,
  `weaponID` int(11) NOT NULL,
  `armorID` int(11) NOT NULL,
  `skill1_ID` int(11) NOT NULL,
  `skill2_ID` int(11) NOT NULL,
  `skill3_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  KEY `userID` (`userID`),
  KEY `weaponID_armorID_skill1_ID_skill2_ID_skill3_ID` (`weaponID`,`armorID`,`skill1_ID`,`skill2_ID`,`skill3_ID`),
  KEY `FK_players_armor` (`armorID`),
  KEY `FK_players_skills` (`skill1_ID`),
  KEY `FK_players_skills_2` (`skill2_ID`),
  KEY `FK_players_skills_3` (`skill3_ID`),
  CONSTRAINT `FK_players_armor` FOREIGN KEY (`armorID`) REFERENCES `armor` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_players_skills` FOREIGN KEY (`skill1_ID`) REFERENCES `skills` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_players_skills_2` FOREIGN KEY (`skill2_ID`) REFERENCES `skills` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_players_skills_3` FOREIGN KEY (`skill3_ID`) REFERENCES `skills` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_players_weapons` FOREIGN KEY (`weaponID`) REFERENCES `weapons` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.players: ~1 rows (hozzávetőleg)
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
REPLACE INTO `players` (`ID`, `name`, `classID`, `attack`, `defense`, `speed`, `hp`, `lvl`, `xp_count`, `userID`, `maxHP`, `points`, `money`, `weaponID`, `armorID`, `skill1_ID`, `skill2_ID`, `skill3_ID`) VALUES
	(24, 'Centurion', 1, 6, 8, 4, 100, 1, 0, 25, 100, 0, 0, 1, 1, 1, 2, 3);
/*!40000 ALTER TABLE `players` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_database. saves
CREATE TABLE IF NOT EXISTS `saves` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `playerID` int(11) DEFAULT NULL,
  `currentQuestID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `playerID` (`playerID`),
  KEY `currentQuestID` (`currentQuestID`),
  CONSTRAINT `FK_saves_missions` FOREIGN KEY (`currentQuestID`) REFERENCES `missions` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_saves_players` FOREIGN KEY (`playerID`) REFERENCES `players` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.saves: ~0 rows (hozzávetőleg)
/*!40000 ALTER TABLE `saves` DISABLE KEYS */;
/*!40000 ALTER TABLE `saves` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_database. skills
CREATE TABLE IF NOT EXISTS `skills` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `damage` int(11) DEFAULT NULL,
  `cooldown` int(11) DEFAULT NULL,
  `pictureID` int(11) DEFAULT NULL,
  `level_req` int(11) DEFAULT NULL,
  `is_healing` int(11) DEFAULT NULL,
  `classID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `classID` (`classID`),
  CONSTRAINT `FK_skills_classes` FOREIGN KEY (`classID`) REFERENCES `classes` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.skills: ~12 rows (hozzávetőleg)
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
REPLACE INTO `skills` (`ID`, `name`, `damage`, `cooldown`, `pictureID`, `level_req`, `is_healing`, `classID`) VALUES
	(1, 'Csapás', NULL, NULL, NULL, NULL, NULL, 1),
	(2, 'Védekezés', NULL, NULL, NULL, NULL, NULL, 1),
	(3, 'Sújtás', NULL, NULL, NULL, NULL, NULL, 1),
	(4, 'Musketer 1', NULL, NULL, NULL, NULL, NULL, 2),
	(5, 'Mukseter 2', NULL, NULL, NULL, NULL, NULL, 2),
	(6, 'Musketer 3', NULL, NULL, NULL, NULL, NULL, 2),
	(7, NULL, NULL, NULL, NULL, NULL, NULL, 3),
	(8, NULL, NULL, NULL, NULL, NULL, NULL, 3),
	(9, NULL, NULL, NULL, NULL, NULL, NULL, 3),
	(10, NULL, NULL, NULL, NULL, NULL, NULL, 4),
	(11, NULL, NULL, NULL, NULL, NULL, NULL, 4),
	(12, NULL, NULL, NULL, NULL, NULL, NULL, 4);
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_database. users
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.users: ~2 rows (hozzávetőleg)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`ID`, `username`, `password`) VALUES
	(9, 'valaki', '$2y$12$Rl42bcCTX/P3N9mxOKpt9.I/s839pPD0.ZXLHrsJdFGtJZtVlzlXO'),
	(25, 'asd', '$2y$12$wRBSiKg9wUaMaWSkhm8w4eq7YGvcZAjitmdKS/rm0U4eIZOK/2rkS'),
	(26, 'test', '$2y$12$wUKKSD4IcGJvb0RXuxd1WeMBUlksvOzuXvpsDMh.pYQE2gKc7jf/S');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_database. weapons
CREATE TABLE IF NOT EXISTS `weapons` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `min_attack` int(11) DEFAULT NULL,
  `max_attack` int(11) DEFAULT NULL,
  `lvl` int(11) DEFAULT NULL,
  `pictureID` int(11) DEFAULT NULL,
  `classID` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `classID` (`classID`),
  CONSTRAINT `FK_weapons_classes` FOREIGN KEY (`classID`) REFERENCES `classes` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.weapons: ~13 rows (hozzávetőleg)
/*!40000 ALTER TABLE `weapons` DISABLE KEYS */;
REPLACE INTO `weapons` (`ID`, `name`, `min_attack`, `max_attack`, `lvl`, `pictureID`, `classID`, `price`) VALUES
	(1, 'Egyszerű kard', NULL, NULL, 1, NULL, 1, 0),
	(2, 'Élezett kard', NULL, NULL, 2, NULL, 1, 100),
	(3, 'Acél kard', NULL, NULL, 3, NULL, 1, 200),
	(4, '--epic kard --', NULL, NULL, 4, NULL, 1, 300),
	(6, 'Egyszerű muskéta', NULL, NULL, 1, NULL, 2, NULL),
	(7, 'Kalibrált muskéta', NULL, NULL, 2, NULL, 2, NULL),
	(8, 'Precíz muskéta', NULL, NULL, 3, NULL, 2, NULL),
	(9, 'Karabély', NULL, NULL, 4, NULL, 2, NULL),
	(11, 'Tőr és Pisztoly', NULL, NULL, 1, NULL, 3, NULL),
	(12, '-conqustador rare-', NULL, NULL, 2, NULL, 3, NULL),
	(13, 'conquistador epic-', NULL, NULL, 3, NULL, 3, NULL),
	(14, 'conquisdator legendary', NULL, NULL, 4, NULL, 3, NULL);
/*!40000 ALTER TABLE `weapons` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
