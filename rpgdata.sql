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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.armor: ~16 rows (hozzávetőleg)
/*!40000 ALTER TABLE `armor` DISABLE KEYS */;
REPLACE INTO `armor` (`ID`, `name`, `armor`, `lvl`, `pictureID`, `classID`, `price`) VALUES
	(1, 'Egyszerű páncél', 5, 1, 1, 1, 0),
	(2, 'Vértezett páncél', 7, 2, 2, 1, 100),
	(3, 'Nehéz páncél', 8, 3, 3, 1, 200),
	(4, 'Sétáló Erőd', 10, 4, 4, 1, 300),
	(5, 'Régi rongyok', 3, 1, 1, 2, 0),
	(6, 'Egyszerű bőr zubbony', 5, 2, 2, 2, 100),
	(7, 'Vadászruha', 6, 3, 3, 2, 200),
	(8, 'Erdei mit tudom én', 7, 4, 4, 2, 300),
	(9, 'con lvl1', 2, 1, 1, 3, 0),
	(10, 'con lvl2', 4, 2, 2, 3, 100),
	(11, 'con lvl3', 6, 3, 3, 3, 200),
	(12, 'con lvl4', 7, 4, 4, 3, 300),
	(13, 'Egyszerű lánncing', 4, 1, 1, 4, 0),
	(14, 'Erősített láncing', 5, 2, 2, 4, 100),
	(15, 'Nehéz láncvért', 7, 3, 3, 4, 200),
	(16, 'pikeman lvl1', 8, 4, 4, 4, 300);
/*!40000 ALTER TABLE `armor` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_database. classes
CREATE TABLE IF NOT EXISTS `classes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `attack` int(11) DEFAULT NULL,
  `defense` int(11) DEFAULT NULL,
  `speed` int(11) DEFAULT NULL,
  `pictureID` int(11) DEFAULT NULL,
  `counter` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.classes: ~5 rows (hozzávetőleg)
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
REPLACE INTO `classes` (`ID`, `name`, `attack`, `defense`, `speed`, `pictureID`, `counter`) VALUES
	(1, 'Harcos', 6, 8, 4, 1, 1),
	(2, 'Muskétás', 7, 5, 5, 2, 0),
	(3, 'Bandita', 7, 6, 6, 3, 0),
	(4, 'Lándzsás', 6, 7, 5, 4, 1);
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_database. enemies
CREATE TABLE IF NOT EXISTS `enemies` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `hp` int(11) NOT NULL,
  `attack` int(11) NOT NULL,
  `defense` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `pictureID` int(11) DEFAULT NULL,
  `isCounter` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.enemies: ~11 rows (hozzávetőleg)
/*!40000 ALTER TABLE `enemies` DISABLE KEYS */;
REPLACE INTO `enemies` (`ID`, `name`, `hp`, `attack`, `defense`, `speed`, `pictureID`, `isCounter`) VALUES
	(1, 'Bandita', 60, 1, 1, 1, 1, 0),
	(2, 'Párbajozó', 100, 5, 3, 7, 2, 1),
	(3, 'Gárdista', 50, 4, 6, 5, 3, 1),
	(4, 'Gárdista Parancsnok', 70, 6, 7, 5, 6, 0),
	(5, 'Tábor Vezető', 80, 5, 8, 3, 1, 1),
	(6, 'Matróz', 70, 4, 4, 5, 4, 1),
	(7, 'Első tiszt', 90, 5, 4, 5, 5, 0),
	(8, 'Kapitány', 100, 6, 5, 7, 5, 0),
	(9, 'Vár őr', 100, 6, 7, 4, 2, 1),
	(10, 'A Gróf', 150, 8, 6, 6, 10, 1);
/*!40000 ALTER TABLE `enemies` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_database. failed_jobs
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
  `description` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `reward` text DEFAULT NULL,
  `missionID` int(11) NOT NULL DEFAULT 0,
  `text` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.missions: ~19 rows (hozzávetőleg)
/*!40000 ALTER TABLE `missions` DISABLE KEYS */;
REPLACE INTO `missions` (`id`, `pre_id`, `name`, `type`, `enemy_id`, `description`, `answer`, `reward`, `missionID`, `text`) VALUES
	(1, 0, ' Támad meg a kapuőrt', '0', 3, 'Foglald el az őrtornyot, ezzel megkezdve a hadjáratot a visszafoglalás hoz', NULL, NULL, 1, NULL),
	(2, 0, 'Eltereled a figyelmét', '1', NULL, '', 'Elhajítasz egy követ', '10;20', 1, NULL),
	(3, 1, ' Megküzdesz vele', '0', 3, 'A tornyon belülre érve egy újabb őr állja utadat, ahogy végig nézel rajta látod hogy elég unottan végzi a munkáját. ', NULL, NULL, 2, NULL),
	(4, 1, ' Lopakodj el mellette', '1', NULL, NULL, NULL, NULL, 2, NULL),
	(5, 2, ' Megküzdesz vele', '0', 4, 'A torony tetejéhez érve a torony őr fogad aki alig várja hogy megküzdhessen veled', NULL, NULL, 3, NULL),
	(6, 3, ' Megtámadod(Vigyázz ezzel felhívhatod a tábor figyelmét)', '0', 3, 'A táborhoz érve megpróbálsz behatolni, azonban a kapunál őr áll.', NULL, NULL, 4, NULL),
	(7, 3, ' Meg próbálod meggyőzni hogy közéjük tartozol.', '1', NULL, NULL, 'Nem látsz a szemedtől?', '40;20', 5, NULL),
	(8, 4, 'Megtámadod', '0', 3, 'Miután felhívtad magadra a figyelmet,a börtönőr harcra készen fogad', NULL, NULL, 6, NULL),
	(10, 6, 'Megtámadod', '0', 5, 'Miután ki szöktetek a táborból,a gyanút fogó tábor parancsnok állja utadat. ', NULL, NULL, 7, NULL),
	(11, 7, ' Erőszakkal jutsz fel', '0', 6, 'A kikötőbe beérkezik egy fekete vitorlás hajó', NULL, NULL, 8, NULL),
	(12, 7, ' Meg próbálod el rejtőzni a rakományok között', '1', NULL, NULL, 'Üres hordóba', '30;30', 8, NULL),
	(23, 8, 'Megtámadod', '0', 7, 'Miután feljutottál a hajóra az első tiszt állja utadat.', NULL, NULL, 9, NULL),
	(26, 9, 'Megtámadod', '0', 8, 'Az első tiszt után a kapitány áll az utadban,ha legyőzöd tiéd a hajó.', NULL, NULL, 10, NULL),
	(27, 10, 'Megtámadod', '0', 9, ' erődhöz érve megpróbálsz behatolni, azonban a kapunál őr áll.', NULL, NULL, 11, NULL),
	(28, 10, 'Meg próbálsz beosonni a raktárba', '1', NULL, NULL, 'Kis ajtón', '40;40', 11, NULL),
	(29, 11, 'Megküzdesz vele', '0', 9, 'Az erődön belül eljutsz a trónterem bejáratához ahol szintén egy őr fogad.', NULL, NULL, 12, NULL),
	(33, 12, 'Megküzdesz vele', '1', 10, 'A vár tetejéhez érve fogad az utolsó ellenfeled a Gróf.', NULL, NULL, 13, NULL);
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
  `current_mission` int(11) DEFAULT 0,
  `isCounter` int(11) NOT NULL,
  `sideMissionID` int(11) DEFAULT 0,
  PRIMARY KEY (`ID`) USING BTREE,
  KEY `userID` (`userID`),
  KEY `weaponID_armorID_skill1_ID_skill2_ID_skill3_ID` (`weaponID`,`armorID`,`skill1_ID`,`skill2_ID`,`skill3_ID`),
  KEY `FK_players_armor` (`armorID`),
  KEY `FK_players_skills` (`skill1_ID`),
  KEY `FK_players_skills_2` (`skill2_ID`),
  KEY `FK_players_skills_3` (`skill3_ID`),
  KEY `current_mission` (`current_mission`),
  CONSTRAINT `FK_players_armor` FOREIGN KEY (`armorID`) REFERENCES `armor` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_players_skills` FOREIGN KEY (`skill1_ID`) REFERENCES `skills` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_players_skills_2` FOREIGN KEY (`skill2_ID`) REFERENCES `skills` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_players_skills_3` FOREIGN KEY (`skill3_ID`) REFERENCES `skills` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_players_weapons` FOREIGN KEY (`weaponID`) REFERENCES `weapons` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.players: ~1 rows (hozzávetőleg)
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
REPLACE INTO `players` (`ID`, `name`, `classID`, `attack`, `defense`, `speed`, `hp`, `lvl`, `xp_count`, `userID`, `maxHP`, `points`, `money`, `weaponID`, `armorID`, `skill1_ID`, `skill2_ID`, `skill3_ID`, `current_mission`, `isCounter`, `sideMissionID`) VALUES
	(49, 'Centurion', 1, 6, 8, 4, 100, 1, 0, 33, 100, 0, 0, 1, 1, 1, 2, 3, 1, 1, 2);
/*!40000 ALTER TABLE `players` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_database. saves
CREATE TABLE IF NOT EXISTS `saves` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `playerID` int(11) DEFAULT NULL,
  `currentQuestID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `playerID` (`playerID`),
  KEY `currentQuestID` (`currentQuestID`),
  CONSTRAINT `FK_saves_missions` FOREIGN KEY (`currentQuestID`) REFERENCES `missions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
  `is_healing` int(11) DEFAULT NULL,
  `classID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `classID` (`classID`),
  CONSTRAINT `FK_skills_classes` FOREIGN KEY (`classID`) REFERENCES `classes` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.skills: ~7 rows (hozzávetőleg)
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
REPLACE INTO `skills` (`ID`, `name`, `damage`, `cooldown`, `pictureID`, `is_healing`, `classID`) VALUES
	(1, 'Csapás', 2, 0, 1, 0, 1),
	(2, 'Bekötözés', 5, 1, 2, 1, 1),
	(3, 'Sújtás', 4, 2, 3, 0, 1),
	(4, 'Lövés', 10, 0, 1, 0, 2),
	(5, 'Kötözés', 3, 1, 2, 1, 2),
	(6, 'Fókuszált lövés', 0, 0, 3, 0, 2),
	(8, 'Célzott lövés', 10, 1, 1, 0, 3),
	(9, 'Szúrás', 3, 0, 2, 0, 3),
	(10, 'Vágás', 5, 1, 3, 0, 3),
	(11, 'Bökés', NULL, 0, 1, 0, 4),
	(12, 'Csapás', NULL, 1, 2, 0, 4),
	(13, 'vmi', NULL, 2, 3, 0, 4);
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;

-- Struktúra mentése tábla rpg_database. users
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.users: ~1 rows (hozzávetőleg)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`ID`, `username`, `password`) VALUES
	(33, 'asd', '$2y$12$8W9qn6ka26kfdznpuSSw/eubuvwOZHC/Q.3PiNls4cKVYrljgJyse');
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése rpg_database.weapons: ~16 rows (hozzávetőleg)
/*!40000 ALTER TABLE `weapons` DISABLE KEYS */;
REPLACE INTO `weapons` (`ID`, `name`, `min_attack`, `max_attack`, `lvl`, `pictureID`, `classID`, `price`) VALUES
	(1, 'Egyszerű kard', 1, 5, 1, 1, 1, 0),
	(2, 'Élezett kard', 3, 7, 2, 2, 1, 100),
	(3, 'Acél kard', 4, 8, 3, 3, 1, 200),
	(4, 'Mesterek kardja', 7, 12, 4, 4, 1, 300),
	(6, 'Egyszerű muskéta', 2, 6, 1, 1, 2, 0),
	(7, 'Kalibrált muskéta', 3, 8, 2, 2, 2, 100),
	(8, 'Precíz muskéta', 4, 9, 3, 3, 2, 200),
	(9, 'Karabély', 6, 15, 4, 4, 2, 300),
	(11, 'Rozsdás tőr és Pisztoly', 2, 4, 1, 1, 3, 0),
	(12, 'Tőr és pisztoly', 3, 5, 2, 2, 3, 100),
	(13, 'Élezett kés és kovás pisztoly', 4, 7, 3, 3, 3, 200),
	(14, 'A felfedező barátai', 5, 8, 4, 4, 3, 300),
	(15, 'Lándzsa', 1, 6, 1, 1, 4, 0),
	(16, 'Élezett lándzsa', 2, 7, 2, 2, 4, 100),
	(17, 'Alabárd', 3, 9, 3, 3, 4, 200),
	(18, 'Mérföldes dárda', 5, 10, 4, 4, 4, 300);
/*!40000 ALTER TABLE `weapons` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
