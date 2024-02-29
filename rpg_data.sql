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


-- Adatbázis struktúra mentése a rpg_data.
CREATE DATABASE IF NOT EXISTS `rpg_data` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `rpg_data`;

-- Struktúra mentése tábla rpg_data. armors
CREATE TABLE IF NOT EXISTS `armors` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `rarity` int(11) DEFAULT NULL,
  `classID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `classID` (`classID`),
  CONSTRAINT `FK_armors_classes` FOREIGN KEY (`classID`) REFERENCES `classes` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_data.armors: ~0 rows (hozzávetőleg)
/*!40000 ALTER TABLE `armors` DISABLE KEYS */;
/*!40000 ALTER TABLE `armors` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_data. chraracter
CREATE TABLE IF NOT EXISTS `chraracter` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `classID` int(11) DEFAULT NULL,
  `hp` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `userID` (`userID`,`classID`),
  KEY `FK_chraracter_classes` (`classID`),
  CONSTRAINT `FK_chraracter_classes` FOREIGN KEY (`classID`) REFERENCES `classes` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_chraracter_users` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_data.chraracter: ~0 rows (hozzávetőleg)
/*!40000 ALTER TABLE `chraracter` DISABLE KEYS */;
/*!40000 ALTER TABLE `chraracter` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_data. classes
CREATE TABLE IF NOT EXISTS `classes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `attack` int(11) DEFAULT NULL,
  `defense` int(11) DEFAULT NULL,
  `speed` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_data.classes: ~6 rows (hozzávetőleg)
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT IGNORE INTO `classes` (`ID`, `name`, `attack`, `defense`, `speed`) VALUES
	(1, 'Swordman', 8, 7, 6),
	(2, 'Musketer', 9, 4, 7),
	(3, 'Spearman', 6, 9, 4),
	(4, 'Conquistador', 7, 8, 5),
	(5, 'Pikeman', 6, 9, 4),
	(6, 'Grenadier\r\n', 8, 6, 5);
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_data. enemys
CREATE TABLE IF NOT EXISTS `enemys` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) DEFAULT NULL,
  `health` int(11) DEFAULT NULL,
  `attack` int(11) DEFAULT NULL,
  `defense` int(11) DEFAULT NULL,
  `speed` int(11) DEFAULT NULL,
  `is_boss` int(11) DEFAULT NULL,
  `boss_drop` int(11) DEFAULT NULL,
  `drop_pool` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_data.enemys: ~0 rows (hozzávetőleg)
/*!40000 ALTER TABLE `enemys` DISABLE KEYS */;
/*!40000 ALTER TABLE `enemys` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_data. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tábla adatainak mentése rpg_data.migrations: ~0 rows (hozzávetőleg)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_data. player_inventory
CREATE TABLE IF NOT EXISTS `player_inventory` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `characterID` int(11) DEFAULT NULL,
  `active_weapon` int(11) DEFAULT NULL,
  `active_skill1` int(11) DEFAULT NULL,
  `active_skill2` int(11) DEFAULT NULL,
  `active_skill3` int(11) DEFAULT NULL,
  `active_ultimate` int(11) DEFAULT NULL,
  `active_armor` int(11) DEFAULT NULL,
  `slot1` int(11) DEFAULT NULL,
  `slot2` int(11) DEFAULT NULL,
  `slot3` int(11) DEFAULT NULL,
  `slot4` int(11) DEFAULT NULL,
  `slot5` int(11) DEFAULT NULL,
  `slot6` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `characterID` (`characterID`),
  KEY `active_weapon` (`active_weapon`),
  KEY `active_skill1` (`active_skill1`),
  KEY `active_skill2_active_skill3_active_ultimate_active_armor` (`active_skill2`,`active_skill3`,`active_ultimate`,`active_armor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_data.player_inventory: ~0 rows (hozzávetőleg)
/*!40000 ALTER TABLE `player_inventory` DISABLE KEYS */;
/*!40000 ALTER TABLE `player_inventory` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_data. player_skills
CREATE TABLE IF NOT EXISTS `player_skills` (
  `ID` int(11) NOT NULL,
  `classID` int(11) DEFAULT NULL,
  `cooldown` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `is_healing` int(11) DEFAULT 0,
  PRIMARY KEY (`ID`),
  KEY `classID` (`classID`),
  CONSTRAINT `FK_player_skills_classes` FOREIGN KEY (`classID`) REFERENCES `classes` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_data.player_skills: ~0 rows (hozzávetőleg)
/*!40000 ALTER TABLE `player_skills` DISABLE KEYS */;
/*!40000 ALTER TABLE `player_skills` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_data. users
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_data.users: ~1 rows (hozzávetőleg)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`ID`, `username`, `password`) VALUES
	(1, 'valaki', '123');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_data. weapons
CREATE TABLE IF NOT EXISTS `weapons` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `classID` int(11) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `min_damage` int(11) DEFAULT NULL,
  `max_damage` int(11) DEFAULT NULL,
  `rarity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `is_purchasable` int(11) DEFAULT NULL,
  `pictureID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_weapons_classes` (`classID`),
  CONSTRAINT `FK_weapons_classes` FOREIGN KEY (`classID`) REFERENCES `classes` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_data.weapons: ~1 rows (hozzávetőleg)
/*!40000 ALTER TABLE `weapons` DISABLE KEYS */;
INSERT IGNORE INTO `weapons` (`ID`, `classID`, `name`, `min_damage`, `max_damage`, `rarity`, `price`, `is_purchasable`, `pictureID`) VALUES
	(2, NULL, 'Kard', NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `weapons` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
