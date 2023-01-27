-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: jobs_finder
-- ------------------------------------------------------
-- Server version	8.0.32-0buntu0.22.04.1

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
-- Table structure for table `T_CV`
--

DROP TABLE IF EXISTS `T_CV`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `T_CV` (
  `cv_id` int NOT NULL AUTO_INCREMENT,
  `cv_chercheur_emploi` int NOT NULL,
  `cv_description` longtext,
  PRIMARY KEY (`cv_id`),
  KEY `T_CV_FK` (`cv_chercheur_emploi`),
  CONSTRAINT `T_CV_FK` FOREIGN KEY (`cv_chercheur_emploi`) REFERENCES `T_Chercheur_Emploi` (`che_id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_CV`
--

LOCK TABLES `T_CV` WRITE;
/*!40000 ALTER TABLE `T_CV` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_CV` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Chercheur_Emploi`
--

DROP TABLE IF EXISTS `T_Chercheur_Emploi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `T_Chercheur_Emploi` (
  `che_id` int NOT NULL AUTO_INCREMENT,
  `che_nom` varchar(100) NOT NULL,
  `che_prenom` varchar(100) NOT NULL,
  `che_sexe` int DEFAULT NULL,
  `che_date_naissance` date DEFAULT NULL,
  `che_telephone` varchar(100) DEFAULT NULL,
  `che_complement_identification_destinataire` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `che_complement_identification_geographique` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `che_libelle_voie` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `che_adresse_service_specifique` varchar(100) DEFAULT NULL,
  `che_ville` int DEFAULT NULL,
  `che_photo` varchar(100) DEFAULT NULL,
  `che_en_recherche` tinyint(1) NOT NULL,
  `che_user` int NOT NULL,
  PRIMARY KEY (`che_id`),
  KEY `T_Chercheur_Emploi_FK` (`che_ville`),
  KEY `T_Chercheur_Emploi_FK_1` (`che_user`),
  CONSTRAINT `T_Chercheur_Emploi_FK` FOREIGN KEY (`che_ville`) REFERENCES `T_Ville` (`vil_id`) ON DELETE RESTRICT,
  CONSTRAINT `T_Chercheur_Emploi_FK_1` FOREIGN KEY (`che_user`) REFERENCES `T_User` (`usr_id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Chercheur_Emploi`
--

LOCK TABLES `T_Chercheur_Emploi` WRITE;
/*!40000 ALTER TABLE `T_Chercheur_Emploi` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Chercheur_Emploi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Competence`
--

DROP TABLE IF EXISTS `T_Competence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `T_Competence` (
  `com_id` int NOT NULL AUTO_INCREMENT,
  `com_libelle` varchar(100) NOT NULL,
  `com_niveau` int NOT NULL,
  PRIMARY KEY (`com_id`),
  KEY `T_Competence_FK` (`com_niveau`),
  CONSTRAINT `T_Competence_FK` FOREIGN KEY (`com_niveau`) REFERENCES `T_Niveau` (`niv_id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Competence`
--

LOCK TABLES `T_Competence` WRITE;
/*!40000 ALTER TABLE `T_Competence` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Competence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Competence_Chercheur_Emploi`
--

DROP TABLE IF EXISTS `T_Competence_Chercheur_Emploi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `T_Competence_Chercheur_Emploi` (
  `cce_competence` int NOT NULL,
  `cce_chercheur_emploi` int NOT NULL,
  PRIMARY KEY (`cce_competence`,`cce_chercheur_emploi`),
  KEY `T_Competence_Chercheur_Emploi_FK` (`cce_chercheur_emploi`),
  CONSTRAINT `T_Competence_Chercheur_Emploi_FK` FOREIGN KEY (`cce_chercheur_emploi`) REFERENCES `T_Chercheur_Emploi` (`che_id`) ON DELETE RESTRICT,
  CONSTRAINT `T_Competence_Chercheur_Emploi_FK_1` FOREIGN KEY (`cce_competence`) REFERENCES `T_Competence` (`com_id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Competence_Chercheur_Emploi`
--

LOCK TABLES `T_Competence_Chercheur_Emploi` WRITE;
/*!40000 ALTER TABLE `T_Competence_Chercheur_Emploi` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Competence_Chercheur_Emploi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Departement`
--

DROP TABLE IF EXISTS `T_Departement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `T_Departement` (
  `dep_id` int NOT NULL AUTO_INCREMENT,
  `dep_nom` varchar(100) NOT NULL,
  `dep_region` int NOT NULL,
  PRIMARY KEY (`dep_id`),
  KEY `T_Departement_FK` (`dep_region`),
  CONSTRAINT `T_Departement_FK` FOREIGN KEY (`dep_region`) REFERENCES `T_Region` (`reg_id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Departement`
--

LOCK TABLES `T_Departement` WRITE;
/*!40000 ALTER TABLE `T_Departement` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Departement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Entreprise`
--

DROP TABLE IF EXISTS `T_Entreprise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `T_Entreprise` (
  `ent_id` int NOT NULL AUTO_INCREMENT,
  `ent_nom` varchar(100) NOT NULL,
  `ent_siret` int NOT NULL,
  `ent_siren` int NOT NULL,
  `ent_statut` int NOT NULL,
  `ent_chiffre_affaires` float DEFAULT NULL,
  `ent_date_creation` date NOT NULL,
  `ent_complement_adresse` varchar(100) DEFAULT NULL,
  `ent_libelle_voie` varchar(100) NOT NULL,
  `ent_mention_speciale_distribution` varchar(100) DEFAULT NULL,
  `ent_ville` int NOT NULL,
  `ent_secteur_activite` int NOT NULL,
  `ent_user` int NOT NULL,
  PRIMARY KEY (`ent_id`),
  KEY `T_Entreprise_FK` (`ent_statut`),
  KEY `T_Entreprise_FK_1` (`ent_ville`),
  KEY `T_Entreprise_FK_2` (`ent_secteur_activite`),
  KEY `T_Entreprise_FK_3` (`ent_user`),
  CONSTRAINT `T_Entreprise_FK` FOREIGN KEY (`ent_statut`) REFERENCES `T_Statut_Juridique` (`stj_id`) ON DELETE RESTRICT,
  CONSTRAINT `T_Entreprise_FK_1` FOREIGN KEY (`ent_ville`) REFERENCES `T_Ville` (`vil_id`) ON DELETE RESTRICT,
  CONSTRAINT `T_Entreprise_FK_2` FOREIGN KEY (`ent_secteur_activite`) REFERENCES `T_Secteur_Activite` (`sea_id`) ON DELETE RESTRICT,
  CONSTRAINT `T_Entreprise_FK_3` FOREIGN KEY (`ent_user`) REFERENCES `T_User` (`usr_id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Entreprise`
--

LOCK TABLES `T_Entreprise` WRITE;
/*!40000 ALTER TABLE `T_Entreprise` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Entreprise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Experience`
--

DROP TABLE IF EXISTS `T_Experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `T_Experience` (
  `exp_id` int NOT NULL AUTO_INCREMENT,
  `exp_libelle` varchar(100) NOT NULL,
  `exp_nom_entreprise` varchar(100) NOT NULL,
  `exp_description` longtext,
  `exp_ville` int NOT NULL,
  PRIMARY KEY (`exp_id`),
  KEY `T_Experience_FK` (`exp_ville`),
  CONSTRAINT `T_Experience_FK` FOREIGN KEY (`exp_ville`) REFERENCES `T_Ville` (`vil_id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Experience`
--

LOCK TABLES `T_Experience` WRITE;
/*!40000 ALTER TABLE `T_Experience` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Formation`
--

DROP TABLE IF EXISTS `T_Formation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `T_Formation` (
  `for_id` int NOT NULL AUTO_INCREMENT,
  `for_ville` int NOT NULL,
  `for_ecole` varchar(100) NOT NULL,
  `for_mention` varchar(100) DEFAULT NULL,
  `for_titre_principal` varchar(100) NOT NULL,
  `for_titre_secondaire` varchar(100) DEFAULT NULL,
  `for_date_debut` date NOT NULL,
  `for_date_fin` date DEFAULT NULL,
  PRIMARY KEY (`for_id`),
  KEY `T_Formation_FK` (`for_ville`),
  CONSTRAINT `T_Formation_FK` FOREIGN KEY (`for_ville`) REFERENCES `T_Ville` (`vil_id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Formation`
--

LOCK TABLES `T_Formation` WRITE;
/*!40000 ALTER TABLE `T_Formation` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Formation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Langue`
--

DROP TABLE IF EXISTS `T_Langue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `T_Langue` (
  `lan_id` int NOT NULL AUTO_INCREMENT,
  `lan_nom` varchar(100) NOT NULL,
  `lan_niveau` int NOT NULL,
  PRIMARY KEY (`lan_id`),
  KEY `T_Langue_FK` (`lan_niveau`),
  CONSTRAINT `T_Langue_FK` FOREIGN KEY (`lan_niveau`) REFERENCES `T_Niveau` (`niv_id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Langue`
--

LOCK TABLES `T_Langue` WRITE;
/*!40000 ALTER TABLE `T_Langue` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Langue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Langue_Chercheur_Emploi`
--

DROP TABLE IF EXISTS `T_Langue_Chercheur_Emploi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `T_Langue_Chercheur_Emploi` (
  `lce_langue` int NOT NULL,
  `lce_chercheur_emploi` int NOT NULL,
  PRIMARY KEY (`lce_langue`,`lce_chercheur_emploi`),
  KEY `T_Langue_Chercheur_Emploi_FK` (`lce_chercheur_emploi`),
  CONSTRAINT `T_Langue_Chercheur_Emploi_FK` FOREIGN KEY (`lce_chercheur_emploi`) REFERENCES `T_Chercheur_Emploi` (`che_id`) ON DELETE RESTRICT,
  CONSTRAINT `T_Langue_Chercheur_Emploi_FK_1` FOREIGN KEY (`lce_langue`) REFERENCES `T_Langue` (`lan_id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Langue_Chercheur_Emploi`
--

LOCK TABLES `T_Langue_Chercheur_Emploi` WRITE;
/*!40000 ALTER TABLE `T_Langue_Chercheur_Emploi` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Langue_Chercheur_Emploi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Niveau`
--

DROP TABLE IF EXISTS `T_Niveau`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `T_Niveau` (
  `niv_id` int NOT NULL AUTO_INCREMENT,
  `niv_libelle` varchar(100) NOT NULL,
  PRIMARY KEY (`niv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Niveau`
--

LOCK TABLES `T_Niveau` WRITE;
/*!40000 ALTER TABLE `T_Niveau` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Niveau` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Permis`
--

DROP TABLE IF EXISTS `T_Permis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `T_Permis` (
  `per_id` int NOT NULL AUTO_INCREMENT,
  `per_libelle` varchar(100) NOT NULL,
  PRIMARY KEY (`per_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Permis`
--

LOCK TABLES `T_Permis` WRITE;
/*!40000 ALTER TABLE `T_Permis` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Permis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Permis_Chercheur_Emploi`
--

DROP TABLE IF EXISTS `T_Permis_Chercheur_Emploi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `T_Permis_Chercheur_Emploi` (
  `pce_permis` int NOT NULL,
  `pce_chercheur_emploi` int NOT NULL,
  PRIMARY KEY (`pce_permis`,`pce_chercheur_emploi`),
  KEY `T_Permis_Chercheur_Emploi_FK` (`pce_chercheur_emploi`),
  CONSTRAINT `T_Permis_Chercheur_Emploi_FK` FOREIGN KEY (`pce_chercheur_emploi`) REFERENCES `T_Chercheur_Emploi` (`che_id`) ON DELETE RESTRICT,
  CONSTRAINT `T_Permis_Chercheur_Emploi_FK_1` FOREIGN KEY (`pce_permis`) REFERENCES `T_Permis` (`per_id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Permis_Chercheur_Emploi`
--

LOCK TABLES `T_Permis_Chercheur_Emploi` WRITE;
/*!40000 ALTER TABLE `T_Permis_Chercheur_Emploi` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Permis_Chercheur_Emploi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Region`
--

DROP TABLE IF EXISTS `T_Region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `T_Region` (
  `reg_id` int NOT NULL AUTO_INCREMENT,
  `reg_nom` varchar(100) NOT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Region`
--

LOCK TABLES `T_Region` WRITE;
/*!40000 ALTER TABLE `T_Region` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Reseau_Chercheur_Emploi`
--

DROP TABLE IF EXISTS `T_Reseau_Chercheur_Emploi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `T_Reseau_Chercheur_Emploi` (
  `rce_reseau` int NOT NULL,
  `rce_chercheur_emploi` int NOT NULL,
  PRIMARY KEY (`rce_reseau`,`rce_chercheur_emploi`),
  KEY `T_Reseau_Chercheur_Emploi_FK` (`rce_chercheur_emploi`),
  CONSTRAINT `T_Reseau_Chercheur_Emploi_FK` FOREIGN KEY (`rce_chercheur_emploi`) REFERENCES `T_Chercheur_Emploi` (`che_id`) ON DELETE RESTRICT,
  CONSTRAINT `T_Reseau_Chercheur_Emploi_FK_1` FOREIGN KEY (`rce_reseau`) REFERENCES `T_Reseaux` (`res_id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Reseau_Chercheur_Emploi`
--

LOCK TABLES `T_Reseau_Chercheur_Emploi` WRITE;
/*!40000 ALTER TABLE `T_Reseau_Chercheur_Emploi` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Reseau_Chercheur_Emploi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Reseaux`
--

DROP TABLE IF EXISTS `T_Reseaux`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `T_Reseaux` (
  `res_id` int NOT NULL AUTO_INCREMENT,
  `res_libelle` varchar(100) NOT NULL,
  `res_chemin_logo` varchar(100) NOT NULL,
  PRIMARY KEY (`res_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Reseaux`
--

LOCK TABLES `T_Reseaux` WRITE;
/*!40000 ALTER TABLE `T_Reseaux` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Reseaux` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Secteur_Activite`
--

DROP TABLE IF EXISTS `T_Secteur_Activite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `T_Secteur_Activite` (
  `sea_id` int NOT NULL AUTO_INCREMENT,
  `sea_libelle` varchar(100) NOT NULL,
  PRIMARY KEY (`sea_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Secteur_Activite`
--

LOCK TABLES `T_Secteur_Activite` WRITE;
/*!40000 ALTER TABLE `T_Secteur_Activite` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Secteur_Activite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Statut_Juridique`
--

DROP TABLE IF EXISTS `T_Statut_Juridique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `T_Statut_Juridique` (
  `stj_id` int NOT NULL AUTO_INCREMENT,
  `stj_libelle` varchar(100) NOT NULL,
  PRIMARY KEY (`stj_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Statut_Juridique`
--

LOCK TABLES `T_Statut_Juridique` WRITE;
/*!40000 ALTER TABLE `T_Statut_Juridique` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Statut_Juridique` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_User`
--

DROP TABLE IF EXISTS `T_User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `T_User` (
  `usr_id` int NOT NULL AUTO_INCREMENT,
  `usr_est_chercheur_emploi` tinyint(1) NOT NULL,
  `usr_mot_de_passe` varchar(100) NOT NULL,
  `usr_email` varchar(100) NOT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_User`
--

LOCK TABLES `T_User` WRITE;
/*!40000 ALTER TABLE `T_User` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Ville`
--

DROP TABLE IF EXISTS `T_Ville`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `T_Ville` (
  `vil_id` int NOT NULL AUTO_INCREMENT,
  `vil_nom` varchar(100) NOT NULL,
  `vil_code_postal` int NOT NULL,
  `vil_departement` int NOT NULL,
  PRIMARY KEY (`vil_id`),
  KEY `T_Ville_FK` (`vil_departement`),
  CONSTRAINT `T_Ville_FK` FOREIGN KEY (`vil_departement`) REFERENCES `T_Departement` (`dep_id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Ville`
--

LOCK TABLES `T_Ville` WRITE;
/*!40000 ALTER TABLE `T_Ville` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Ville` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-27 11:46:34
