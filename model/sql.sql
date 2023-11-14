-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for projet_web
CREATE DATABASE IF NOT EXISTS `projet_web` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `projet_web`;

-- Dumping structure for table projet_web.ajoutreclamation
CREATE TABLE IF NOT EXISTS `ajoutreclamation` (
  `objet` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Nomutilisateur` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `text` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table projet_web.coach
CREATE TABLE IF NOT EXISTS `coach` (
  `id_co` int NOT NULL AUTO_INCREMENT,
  `nom_co` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom_co` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `mail_co` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tel_co` varchar(8) COLLATE utf8mb4_general_ci NOT NULL,
  `prix_co` int NOT NULL,
  PRIMARY KEY (`id_co`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table projet_web.coaching
CREATE TABLE IF NOT EXISTS `coaching` (
  `id_rep_coaching` int NOT NULL,
  `id_cl` int NOT NULL,
  `objectif` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nb_h` int NOT NULL,
  `nb_j` int NOT NULL,
  `rep_coaching` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_rep_coaching`),
  KEY `id_cll` (`id_cl`),
  CONSTRAINT `coaching_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `utilisateur` (`id_ut`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table projet_web.entrainement
CREATE TABLE IF NOT EXISTS `entrainement` (
  `id_ent` int NOT NULL AUTO_INCREMENT,
  `id_co` int NOT NULL,
  `id_salle` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `id_cl` int NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  PRIMARY KEY (`id_ent`),
  KEY `id_cl` (`id_cl`),
  KEY `id_co` (`id_co`),
  KEY `id_salle` (`id_salle`),
  CONSTRAINT `entrainement_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `utilisateur` (`id_ut`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `entrainement_ibfk_2` FOREIGN KEY (`id_co`) REFERENCES `coach` (`id_co`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `entrainement_ibfk_3` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table projet_web.forum
CREATE TABLE IF NOT EXISTS `forum` (
  `id_post` int NOT NULL,
  `id_cl` int NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `mess` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `id_cl` (`id_cl`),
  CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `utilisateur` (`id_ut`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table projet_web.livraison
CREATE TABLE IF NOT EXISTS `livraison` (
  `id_cl` int NOT NULL,
  `id_prod` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `order_time` time NOT NULL,
  `drop_off` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `delivery_status` varchar(3) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_cl`,`id_prod`),
  KEY `id_prod` (`id_prod`),
  CONSTRAINT `livraison_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `utilisateur` (`id_ut`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `livraison_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `produit` (`id_prod`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `livraison_ibfk_3` FOREIGN KEY (`id_prod`) REFERENCES `produit` (`id_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table projet_web.post
CREATE TABLE IF NOT EXISTS `post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(50) DEFAULT NULL,
  `post` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table projet_web.produit
CREATE TABLE IF NOT EXISTS `produit` (
  `id_prod` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `qte_prod` int NOT NULL,
  `prix_prod` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table projet_web.reponse
CREATE TABLE IF NOT EXISTS `reponse` (
  `id_rep` int NOT NULL,
  `nomemplyer` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `text` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_rep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table projet_web.salle
CREATE TABLE IF NOT EXISTS `salle` (
  `id_salle` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `place` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `prix` int NOT NULL,
  PRIMARY KEY (`id_salle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table projet_web.utilisateur
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_ut` int NOT NULL AUTO_INCREMENT,
  `role_ut` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nom_ut` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prenom_ut` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_ut` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tel_ut` int DEFAULT NULL,
  `cin_ut` int DEFAULT NULL,
  `poid_ut` float DEFAULT NULL,
  `taille_ut` float DEFAULT NULL,
  `genre_ut` varchar(1) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `age_ut` int DEFAULT NULL,
  `addresse_ut` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `login_ut` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mdp_ut` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_ut`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
