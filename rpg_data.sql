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
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.armor: ~0 rows (hozzávetőleg)
/*!40000 ALTER TABLE `armor` DISABLE KEYS */;
REPLACE INTO `armor` (`ID`, `name`, `armor`, `lvl`, `pictureID`, `classID`) VALUES
	(1, 'Egyszerű páncél', NULL, NULL, NULL, 1),
	(2, 'Vértezett páncél', NULL, NULL, NULL, 1);
/*!40000 ALTER TABLE `armor` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_database. battle_quests
CREATE TABLE IF NOT EXISTS `battle_quests` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `enemyID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `enemyID` (`enemyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.battle_quests: ~0 rows (hozzávetőleg)
/*!40000 ALTER TABLE `battle_quests` DISABLE KEYS */;
/*!40000 ALTER TABLE `battle_quests` ENABLE KEYS */;

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
  `attack_power` int(11) NOT NULL,
  `defense_power` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `pictureID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  CONSTRAINT `enemies_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `battle_quests` (`enemyID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.enemies: ~0 rows (hozzávetőleg)
/*!40000 ALTER TABLE `enemies` DISABLE KEYS */;
/*!40000 ALTER TABLE `enemies` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_database. missions
CREATE TABLE IF NOT EXISTS `missions` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `Oszlop 5` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  KEY `player_id` (`player_id`),
  CONSTRAINT `missions_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.missions: ~1 rows (hozzávetőleg)
/*!40000 ALTER TABLE `missions` DISABLE KEYS */;
/*!40000 ALTER TABLE `missions` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_database. playeritems
CREATE TABLE IF NOT EXISTS `playeritems` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `playerID` int(11) DEFAULT NULL,
  `weaponID` int(11) DEFAULT NULL,
  `armorID` int(11) DEFAULT NULL,
  `skill1_ID` int(11) DEFAULT NULL,
  `skill2_ID` int(11) DEFAULT NULL,
  `skill3_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `playerID_weaponID_armorID_skill1_ID_skill2_ID_skill3_ID` (`playerID`,`weaponID`,`armorID`,`skill1_ID`,`skill2_ID`,`skill3_ID`),
  KEY `FK_playeritems_weapons` (`weaponID`),
  KEY `FK_playeritems_armor` (`armorID`),
  KEY `FK_playeritems_skilss` (`skill1_ID`),
  KEY `FK_playeritems_skilss_2` (`skill2_ID`),
  KEY `FK_playeritems_skilss_3` (`skill3_ID`),
  CONSTRAINT `FK_playeritems_armor` FOREIGN KEY (`armorID`) REFERENCES `armor` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_playeritems_players` FOREIGN KEY (`playerID`) REFERENCES `players` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_playeritems_skilss` FOREIGN KEY (`skill1_ID`) REFERENCES `skills` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_playeritems_skilss_2` FOREIGN KEY (`skill2_ID`) REFERENCES `skills` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_playeritems_skilss_3` FOREIGN KEY (`skill3_ID`) REFERENCES `skills` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_playeritems_weapons` FOREIGN KEY (`weaponID`) REFERENCES `weapons` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.playeritems: ~0 rows (hozzávetőleg)
/*!40000 ALTER TABLE `playeritems` DISABLE KEYS */;
/*!40000 ALTER TABLE `playeritems` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_database. players
CREATE TABLE IF NOT EXISTS `players` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `attack_power` int(11) NOT NULL,
  `defense_power` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `hp` int(11) DEFAULT 100,
  `level` int(11) DEFAULT 1,
  `xp_count` int(11) DEFAULT 0,
  `userID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.players: ~0 rows (hozzávetőleg)
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
/*!40000 ALTER TABLE `players` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_database. riddles
CREATE TABLE IF NOT EXISTS `riddles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `mission_id` int(11) DEFAULT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `xp_earned` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  KEY `mission_id` (`mission_id`),
  CONSTRAINT `riddles_ibfk_1` FOREIGN KEY (`mission_id`) REFERENCES `missions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.riddles: ~0 rows (hozzávetőleg)
/*!40000 ALTER TABLE `riddles` DISABLE KEYS */;
/*!40000 ALTER TABLE `riddles` ENABLE KEYS */;

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
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.skills: ~0 rows (hozzávetőleg)
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
REPLACE INTO `skills` (`ID`, `name`, `damage`, `cooldown`, `pictureID`, `level_req`, `is_healing`) VALUES
	(1, 'Csapás', NULL, NULL, NULL, NULL, NULL),
	(2, 'Védekezés', NULL, NULL, NULL, NULL, NULL),
	(3, 'Sújtás', NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_database. users
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `FK_users_players` FOREIGN KEY (`ID`) REFERENCES `players` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.users: ~1 rows (hozzávetőleg)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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
  PRIMARY KEY (`ID`),
  KEY `classID` (`classID`),
  CONSTRAINT `FK_weapons_classes` FOREIGN KEY (`classID`) REFERENCES `classes` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.weapons: ~10 rows (hozzávetőleg)
/*!40000 ALTER TABLE `weapons` DISABLE KEYS */;
REPLACE INTO `weapons` (`ID`, `name`, `min_attack`, `max_attack`, `lvl`, `pictureID`, `classID`) VALUES
	(1, 'Egyszerű kard', NULL, NULL, NULL, NULL, 1),
	(2, 'Élezett kard', NULL, NULL, NULL, NULL, 1),
	(3, 'Acél kard', NULL, NULL, NULL, NULL, 1),
	(4, '--epic kard --', NULL, NULL, NULL, NULL, 1),
	(5, '-- legendás kard --', NULL, NULL, NULL, NULL, 1),
	(6, 'Egyszerű muskéta', NULL, NULL, NULL, NULL, 2),
	(7, 'Kalibrált muskéta', NULL, NULL, NULL, NULL, 2),
	(8, 'Precíz muskéta', NULL, NULL, NULL, NULL, 2),
	(9, 'Karabély', NULL, NULL, NULL, NULL, 2),
	(10, '--legendás puska --', NULL, NULL, NULL, NULL, 2),
	(11, 'Tőr és Pisztoly', NULL, NULL, NULL, NULL, 3);
/*!40000 ALTER TABLE `weapons` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
