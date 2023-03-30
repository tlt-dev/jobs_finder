-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 30 mars 2023 à 18:43
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jobs_finder`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_candidature`
--

DROP TABLE IF EXISTS `t_candidature`;
CREATE TABLE IF NOT EXISTS `t_candidature` (
  `can_id` int(11) NOT NULL AUTO_INCREMENT,
  `can_chercheur` int(11) NOT NULL,
  `can_offre` int(11) NOT NULL,
  `can_statut` tinyint(1) NOT NULL DEFAULT '2' COMMENT '0:refusé/1:accepté/2:en attente',
  PRIMARY KEY (`can_id`),
  KEY `can_chercheur` (`can_chercheur`),
  KEY `can_offre` (`can_offre`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_candidature`
--

INSERT INTO `t_candidature` (`can_id`, `can_chercheur`, `can_offre`, `can_statut`) VALUES
(1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_centre_interet`
--

DROP TABLE IF EXISTS `t_centre_interet`;
CREATE TABLE IF NOT EXISTS `t_centre_interet` (
  `cei_id` int(11) NOT NULL AUTO_INCREMENT,
  `cei_intitule` varchar(100) NOT NULL,
  `cei_chercheur` int(11) NOT NULL,
  PRIMARY KEY (`cei_id`),
  KEY `id_chercheur` (`cei_chercheur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_centre_interet`
--

INSERT INTO `t_centre_interet` (`cei_id`, `cei_intitule`, `cei_chercheur`) VALUES
(3, 'Handball', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_chercheur_emploi`
--

DROP TABLE IF EXISTS `t_chercheur_emploi`;
CREATE TABLE IF NOT EXISTS `t_chercheur_emploi` (
  `che_id` int(11) NOT NULL AUTO_INCREMENT,
  `che_nom` varchar(36) NOT NULL,
  `che_prenom` varchar(32) NOT NULL,
  `che_sexe` int(11) DEFAULT NULL,
  `che_date_naissance` date DEFAULT NULL,
  `che_telephone` varchar(100) DEFAULT NULL,
  `che_mail` varchar(100) DEFAULT NULL,
  `che_adresse` varchar(38) DEFAULT NULL,
  `che_ville` int(11) DEFAULT '1',
  `che_code_postal` varchar(5) DEFAULT NULL,
  `che_departement` int(11) DEFAULT NULL,
  `che_en_recherche` tinyint(1) DEFAULT NULL,
  `che_user` int(11) NOT NULL,
  PRIMARY KEY (`che_id`),
  KEY `T_Chercheur_Emploi_FK_1` (`che_user`),
  KEY `t_chercheur_emploi_ibfk_2` (`che_ville`),
  KEY `che_departement` (`che_departement`),
  KEY `t_chercheur_emploi_ibfk_1` (`che_sexe`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_chercheur_emploi`
--

INSERT INTO `t_chercheur_emploi` (`che_id`, `che_nom`, `che_prenom`, `che_sexe`, `che_date_naissance`, `che_telephone`, `che_mail`, `che_adresse`, `che_ville`, `che_code_postal`, `che_departement`, `che_en_recherche`, `che_user`) VALUES
(1, 'LAURENT', 'Thomas', 1, '2000-08-15', '0611880573', 'thomas@gmail.com', '12 rue Pierre de COubertin', 1, NULL, NULL, NULL, 1),
(2, 'MOULIN', 'Matthieu', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 2),
(3, 'RAYNAUD', 'Lucas', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `t_competence`
--

DROP TABLE IF EXISTS `t_competence`;
CREATE TABLE IF NOT EXISTS `t_competence` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_libelle` varchar(100) NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_competence`
--

INSERT INTO `t_competence` (`com_id`, `com_libelle`) VALUES
(1, 'Management de projet'),
(2, 'Gestion de la qualité'),
(3, 'Développement Agile'),
(4, 'Gestion de budget'),
(5, 'Gestion de personnel'),
(6, 'Analyse de données'),
(7, 'Intelligence artificielle'),
(8, 'Apprentissage automatique'),
(9, 'Big Data'),
(10, 'Business Intelligence'),
(11, 'Cloud computing'),
(12, 'Cybersécurité'),
(13, 'Analyse de la performance'),
(14, 'Création de rapport'),
(15, 'Développement de logiciel'),
(16, 'Programmation web'),
(17, 'Programmation mobile'),
(18, 'Conception UX/UI'),
(19, 'Création de site web'),
(20, 'Gestion de bases de données'),
(21, 'Administration système'),
(22, 'Administration réseau'),
(23, 'Sécurité réseau'),
(24, 'Gestion de stock'),
(25, 'Gestion de la chaîne d\'approvisionnement'),
(26, 'Logistique'),
(27, 'Programmation en Java'),
(28, 'Programmation en Python'),
(29, 'Programmation en C++'),
(30, 'Programmation en C#'),
(31, 'Programmation en JavaScript'),
(32, 'Programmation en PHP'),
(33, 'Programmation en Ruby'),
(34, 'Programmation en Swift'),
(35, 'Programmation en Objective-C'),
(36, 'Programmation en SQL'),
(37, 'Développement d\'application mobile'),
(38, 'Développement d\'application web'),
(39, 'Développement de jeux vidéo'),
(40, 'Conception de bases de données'),
(41, 'Administration de bases de données'),
(42, 'Optimisation de requêtes SQL'),
(43, 'Développement de logiciel en mode Agile'),
(44, 'Test et débogage de logiciels'),
(45, 'Gestion de code source (Git, SVN, etc.)'),
(46, 'Intégration continue'),
(47, 'Déploiement de logiciel'),
(48, 'Virtualisation (VMware, Hyper-V, etc.)'),
(49, 'Stockage de données (SAN, NAS, etc.)'),
(50, 'Réseau informatique (TCP/IP, DNS, etc.)'),
(51, 'Sécurité informatique (cryptage, pare-feu, etc.)'),
(52, 'Systèmes d\'exploitation (Windows, Linux, etc.)'),
(53, 'Scripting (bash, PowerShell, etc.)'),
(54, 'Technologies cloud (AWS, Azure, etc.)'),
(55, 'Containerisation (Docker, Kubernetes, etc.)'),
(56, 'Microservices'),
(57, 'Intelligence artificielle'),
(58, 'Apprentissage automatique'),
(59, 'Big Data'),
(60, 'Analyse de données'),
(61, 'Business Intelligence'),
(62, 'Cybersécurité'),
(63, 'Conception de systèmes répartis'),
(64, 'Développement de logiciel distribué'),
(65, 'Gestion de projets open source'),
(66, 'Gestion de projets avec des équipes distribuées'),
(67, 'Gestion de projet'),
(68, 'Communication interpersonnelle'),
(69, 'Gestion du temps'),
(70, 'Résolution de problèmes'),
(71, 'Leadership'),
(72, 'Négociation'),
(73, 'Gestion de conflits'),
(74, 'Créativité'),
(75, 'Esprit d\'analyse'),
(76, 'Prise de décision'),
(77, 'Développement de produits'),
(78, 'Marketing'),
(79, 'Vente'),
(80, 'Service à la clientèle'),
(81, 'Comptabilité'),
(82, 'Gestion des finances'),
(83, 'Audit'),
(84, 'Droit des affaires'),
(85, 'Relations publiques'),
(86, 'Médias sociaux'),
(87, 'Gestion des ressources humaines'),
(88, 'Formation et développement'),
(89, 'Recrutement'),
(90, 'Gestion des talents'),
(91, 'Performance et évaluation du rendement'),
(92, 'Stratégie d\'entreprise'),
(93, 'Développement durable'),
(94, 'Gestion de la qualité'),
(95, 'Sécurité au travail'),
(96, 'Gestion de la santé et de la sécurité au travail'),
(97, 'Environnement'),
(98, 'Techniques de production'),
(99, 'Opérations'),
(100, 'Gestion de la chaîne d\'approvisionnement'),
(101, 'Gestion des stocks'),
(102, 'Logistique'),
(103, 'Transport'),
(104, 'Ingénierie'),
(105, 'Conception mécanique'),
(106, 'Conception électrique'),
(107, 'Conception de produits'),
(108, 'Conception de systèmes'),
(109, 'Recherche et développement'),
(110, 'Test et validation'),
(111, 'Fabrication'),
(112, 'Maintenance'),
(113, 'Support technique'),
(114, 'Documentation technique'),
(115, 'Gestion de projets d\'ingénierie'),
(116, 'Langues étrangères'),
(117, 'Traduction'),
(118, 'Enseignement'),
(119, 'Formation'),
(120, 'Tutorat'),
(121, 'Mentorat'),
(122, 'Coaching'),
(123, 'Counseling'),
(124, 'Thérapie'),
(125, 'Psychologie'),
(126, 'Santé mentale'),
(127, 'Bien-être'),
(128, 'Développement personnel'),
(129, 'Lifestyle design'),
(130, 'Cuisine'),
(131, 'Photographie'),
(132, 'Arts visuels'),
(133, 'Musique'),
(134, 'Danse'),
(135, 'Théâtre'),
(136, 'Littérature'),
(137, 'Cinéma'),
(138, 'Jeux vidéo'),
(139, 'Technologies');

-- --------------------------------------------------------

--
-- Structure de la table `t_competence_chercheur_emploi`
--

DROP TABLE IF EXISTS `t_competence_chercheur_emploi`;
CREATE TABLE IF NOT EXISTS `t_competence_chercheur_emploi` (
  `cce_id` int(11) NOT NULL AUTO_INCREMENT,
  `cce_competence` int(11) NOT NULL,
  `cce_chercheur` int(11) NOT NULL,
  `cce_niveau` int(11) DEFAULT '1',
  PRIMARY KEY (`cce_id`),
  KEY `cce_niveau` (`cce_niveau`),
  KEY `t_competence_chercheur_emploi_ibfk_1` (`cce_competence`),
  KEY `t_competence_chercheur_emploi_ibfk_2` (`cce_chercheur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_competence_chercheur_emploi`
--

INSERT INTO `t_competence_chercheur_emploi` (`cce_id`, `cce_competence`, `cce_chercheur`, `cce_niveau`) VALUES
(1, 40, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `t_competence_offre`
--

DROP TABLE IF EXISTS `t_competence_offre`;
CREATE TABLE IF NOT EXISTS `t_competence_offre` (
  `coo_id` int(11) NOT NULL AUTO_INCREMENT,
  `coo_competence` int(11) NOT NULL,
  `coo_offre` int(11) NOT NULL,
  PRIMARY KEY (`coo_id`),
  KEY `id_competence` (`coo_competence`),
  KEY `id_offre` (`coo_offre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_cv`
--

DROP TABLE IF EXISTS `t_cv`;
CREATE TABLE IF NOT EXISTS `t_cv` (
  `cv_id` int(11) NOT NULL AUTO_INCREMENT,
  `cv_chercheur` int(11) NOT NULL,
  `cv_description` longtext,
  PRIMARY KEY (`cv_id`),
  KEY `T_CV_FK` (`cv_chercheur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_entreprise`
--

DROP TABLE IF EXISTS `t_entreprise`;
CREATE TABLE IF NOT EXISTS `t_entreprise` (
  `ent_id` int(11) NOT NULL AUTO_INCREMENT,
  `ent_nom` varchar(100) NOT NULL,
  `ent_siret` int(11) DEFAULT NULL,
  `ent_siren` int(11) DEFAULT NULL,
  `ent_statut` int(11) DEFAULT NULL,
  `ent_chiffre_affaires` float DEFAULT NULL,
  `ent_date_creation` date DEFAULT NULL,
  `ent_adresse` varchar(38) DEFAULT NULL,
  `ent_ville` int(11) DEFAULT NULL,
  `ent_email` varchar(100) DEFAULT NULL,
  `ent_telephone` varchar(100) DEFAULT NULL,
  `ent_secteur_activite` int(11) DEFAULT NULL,
  `ent_descriptif` varchar(1000) DEFAULT NULL,
  `ent_user` int(11) NOT NULL,
  PRIMARY KEY (`ent_id`),
  KEY `T_Entreprise_FK` (`ent_statut`),
  KEY `T_Entreprise_FK_1` (`ent_ville`),
  KEY `T_Entreprise_FK_2` (`ent_secteur_activite`),
  KEY `T_Entreprise_FK_3` (`ent_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_entreprise`
--

INSERT INTO `t_entreprise` (`ent_id`, `ent_nom`, `ent_siret`, `ent_siren`, `ent_statut`, `ent_chiffre_affaires`, `ent_date_creation`, `ent_adresse`, `ent_ville`, `ent_email`, `ent_telephone`, `ent_secteur_activite`, `ent_descriptif`, `ent_user`) VALUES
(1, 'Courbon software', 100001, 23456789, 1, 9000000, '2023-03-15', '18 rue George', 12, 'courbon@gmail.com', '031897675', NULL, 'o^hifeziohfoiehofizehoifoehzohfeozhfz', 4),
(2, 'IRCF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(3, 'Astronics PGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6);

-- --------------------------------------------------------

--
-- Structure de la table `t_entretien`
--

DROP TABLE IF EXISTS `t_entretien`;
CREATE TABLE IF NOT EXISTS `t_entretien` (
  `ent_id` int(11) NOT NULL AUTO_INCREMENT,
  `ent_offre` int(11) NOT NULL,
  `ent_chercheur` int(11) NOT NULL,
  `ent_date_entretien` date NOT NULL,
  `ent_modalites` varchar(500) DEFAULT NULL COMMENT 'Modalités de l''entretien (type, adresse, etc.)',
  `ent_statut` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:fermé / 1: attente réponse chercheur/2:accepté par le chercheur/3:refusé par le chercheur',
  `ent_reponse` int(11) DEFAULT NULL COMMENT '0:Négatif 1:Réflexion/Autres entretiens/Tests/... 2: Négatif',
  `ent_commentaire` varchar(300) DEFAULT NULL COMMENT 'Commentaire associé à la réponse suite entretien',
  PRIMARY KEY (`ent_id`),
  KEY `ent_offre` (`ent_offre`),
  KEY `ent_user` (`ent_chercheur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_entretien`
--

INSERT INTO `t_entretien` (`ent_id`, `ent_offre`, `ent_chercheur`, `ent_date_entretien`, `ent_modalites`, `ent_statut`, `ent_reponse`, `ent_commentaire`) VALUES
(1, 1, 1, '2023-03-20', 'test', 2, 1, ''),
(2, 1, 1, '2023-03-21', 'dzjapd', 2, 2, NULL),
(3, 1, 1, '2023-03-21', 'dzjapdz', 2, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `t_experience`
--

DROP TABLE IF EXISTS `t_experience`;
CREATE TABLE IF NOT EXISTS `t_experience` (
  `exp_id` int(11) NOT NULL AUTO_INCREMENT,
  `exp_libelle` varchar(20) NOT NULL,
  PRIMARY KEY (`exp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_experience_pro`
--

DROP TABLE IF EXISTS `t_experience_pro`;
CREATE TABLE IF NOT EXISTS `t_experience_pro` (
  `exp_id` int(11) NOT NULL AUTO_INCREMENT,
  `exp_poste` varchar(100) NOT NULL,
  `exp_employeur` varchar(100) NOT NULL,
  `exp_description` longtext,
  `exp_ville` int(11) DEFAULT NULL,
  `exp_date_debut` date DEFAULT NULL,
  `exp_date_fin` date DEFAULT NULL,
  `exp_chercheur` int(11) NOT NULL,
  PRIMARY KEY (`exp_id`),
  KEY `T_Experience_FK` (`exp_ville`),
  KEY `exp_chercheur` (`exp_chercheur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_favori_chercheur_emploi`
--

DROP TABLE IF EXISTS `t_favori_chercheur_emploi`;
CREATE TABLE IF NOT EXISTS `t_favori_chercheur_emploi` (
  `fce_id` int(11) NOT NULL AUTO_INCREMENT,
  `fce_offre` int(11) NOT NULL,
  `fce_chercheur` int(11) NOT NULL,
  PRIMARY KEY (`fce_id`),
  KEY `fce_chercheur` (`fce_chercheur`),
  KEY `fce_offre` (`fce_offre`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_favori_chercheur_emploi`
--

INSERT INTO `t_favori_chercheur_emploi` (`fce_id`, `fce_offre`, `fce_chercheur`) VALUES
(1, 2, 1),
(8, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_formation`
--

DROP TABLE IF EXISTS `t_formation`;
CREATE TABLE IF NOT EXISTS `t_formation` (
  `for_id` int(11) NOT NULL AUTO_INCREMENT,
  `for_formation` varchar(200) NOT NULL,
  `for_etablissement` varchar(100) DEFAULT NULL,
  `for_ville` int(11) DEFAULT NULL,
  `for_date_debut` date NOT NULL,
  `for_date_fin` date DEFAULT NULL,
  `for_description` varchar(300) NOT NULL,
  `for_chercheur` int(11) NOT NULL,
  PRIMARY KEY (`for_id`),
  KEY `T_Formation_FK` (`for_ville`),
  KEY `for_chercheur` (`for_chercheur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_langue`
--

DROP TABLE IF EXISTS `t_langue`;
CREATE TABLE IF NOT EXISTS `t_langue` (
  `lan_id` int(11) NOT NULL AUTO_INCREMENT,
  `lan_nom` varchar(100) NOT NULL,
  PRIMARY KEY (`lan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_langue`
--

INSERT INTO `t_langue` (`lan_id`, `lan_nom`) VALUES
(1, 'Français'),
(2, 'Anglais'),
(3, 'Espagnol'),
(4, 'Allemand'),
(5, 'Italien'),
(6, 'Portugais'),
(7, 'Russe'),
(8, 'Japonais'),
(9, 'Chinois'),
(10, 'Arabe'),
(11, 'Néerlandais'),
(12, 'Grec'),
(13, 'Hindi'),
(14, 'Coréen'),
(15, 'Suédois'),
(16, 'Norvégien'),
(17, 'Danois'),
(18, 'Finnois'),
(19, 'Tchèque'),
(20, 'Polonais'),
(21, 'Turc'),
(22, 'Indonésien'),
(23, 'Hongrois'),
(24, 'Thaï'),
(25, 'Vietnamien'),
(26, 'Ukrainien'),
(27, 'Serbe'),
(28, 'Croate'),
(29, 'Slovaque'),
(30, 'Bulgare'),
(31, 'Roumain'),
(32, 'Démotique'),
(33, 'Perse'),
(34, 'Catalan'),
(35, 'Gaélique'),
(36, 'Géorgien'),
(37, 'Arménien'),
(38, 'Bengali'),
(39, 'Lao'),
(40, 'Urdu'),
(41, 'Islandais'),
(42, 'Birman'),
(43, 'Malaisien'),
(44, 'Khmer'),
(45, 'Singhalais'),
(46, 'Amharique'),
(47, 'Swahili'),
(48, 'Hébreu'),
(49, 'Yiddish'),
(50, 'Tamoul');

-- --------------------------------------------------------

--
-- Structure de la table `t_langue_chercheur_emploi`
--

DROP TABLE IF EXISTS `t_langue_chercheur_emploi`;
CREATE TABLE IF NOT EXISTS `t_langue_chercheur_emploi` (
  `lce_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `lce_langue` int(11) NOT NULL,
  `lce_chercheur` int(11) NOT NULL,
  `lce_niveau` int(11) DEFAULT NULL,
  PRIMARY KEY (`lce_id`),
  KEY `T_Langue_Chercheur_Emploi_FK` (`lce_chercheur`),
  KEY `lce_langue` (`lce_langue`,`lce_chercheur`) USING BTREE,
  KEY `T_Langue_Chercheur_Emploi_FK_2` (`lce_niveau`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_langue_chercheur_emploi`
--

INSERT INTO `t_langue_chercheur_emploi` (`lce_id`, `lce_langue`, `lce_chercheur`, `lce_niveau`) VALUES
(4, 3, 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `t_niveau`
--

DROP TABLE IF EXISTS `t_niveau`;
CREATE TABLE IF NOT EXISTS `t_niveau` (
  `niv_id` int(11) NOT NULL AUTO_INCREMENT,
  `niv_libelle` varchar(20) NOT NULL,
  PRIMARY KEY (`niv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_niveau`
--

INSERT INTO `t_niveau` (`niv_id`, `niv_libelle`) VALUES
(1, 'Débutant'),
(2, 'Intermédiaire'),
(3, 'Bon'),
(4, 'Très bon'),
(5, 'Excellent');

-- --------------------------------------------------------

--
-- Structure de la table `t_offre`
--

DROP TABLE IF EXISTS `t_offre`;
CREATE TABLE IF NOT EXISTS `t_offre` (
  `off_id` int(11) NOT NULL AUTO_INCREMENT,
  `off_intitule` varchar(100) NOT NULL,
  `off_ville` int(11) DEFAULT NULL,
  `off_date_prise_poste` date NOT NULL,
  `off_type_contrat` int(11) DEFAULT NULL,
  `off_salaire` int(11) DEFAULT NULL,
  `off_duree` int(11) DEFAULT NULL,
  `off_secteur_activite` int(11) DEFAULT NULL,
  `off_entreprise` int(11) NOT NULL,
  `off_descriptif` varchar(1000) NOT NULL,
  `off_poste` int(11) DEFAULT NULL,
  PRIMARY KEY (`off_id`),
  KEY `offre_entreprise` (`off_entreprise`),
  KEY `offre_salaire` (`off_salaire`),
  KEY `offre_secteur_activite` (`off_secteur_activite`),
  KEY `offre_type_contrat` (`off_type_contrat`),
  KEY `offre_ville` (`off_ville`),
  KEY `offre_poste` (`off_poste`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_offre`
--

INSERT INTO `t_offre` (`off_id`, `off_intitule`, `off_ville`, `off_date_prise_poste`, `off_type_contrat`, `off_salaire`, `off_duree`, `off_secteur_activite`, `off_entreprise`, `off_descriptif`, `off_poste`) VALUES
(1, 'Développeur web', 21, '2023-03-15', 2, 5, 1, 7, 1, '                                                                                                                                                                                                vdserghty,hreqcxqw\r\n                                                \r\n                                                \r\n                                                \r\n                                                ', 1),
(2, 'Charpentier', 9, '2023-03-22', 2, 3, 8, 3, 1, 'Couverture et charpentes', 58),
(3, 'Développeur Web Agile', 2, '2023-03-22', 1, 2, 1, 6, 1, 'Développement agile en .Net', 1),
(4, 'Chef de projet IT', 9, '2023-03-22', 1, 6, 1, 2, 1, 'Chef de projet Web', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_offre_poste`
--

DROP TABLE IF EXISTS `t_offre_poste`;
CREATE TABLE IF NOT EXISTS `t_offre_poste` (
  `ofp_id` int(11) NOT NULL AUTO_INCREMENT,
  `ofp_offre` int(11) NOT NULL,
  `ofp_poste` int(11) NOT NULL,
  PRIMARY KEY (`ofp_id`),
  KEY `id_offre2` (`ofp_offre`),
  KEY `id_poste` (`ofp_poste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_poste`
--

DROP TABLE IF EXISTS `t_poste`;
CREATE TABLE IF NOT EXISTS `t_poste` (
  `pos_id` int(11) NOT NULL AUTO_INCREMENT,
  `pos_libelle` varchar(100) NOT NULL,
  PRIMARY KEY (`pos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_poste`
--

INSERT INTO `t_poste` (`pos_id`, `pos_libelle`) VALUES
(1, 'Développeur web'),
(2, 'Graphiste'),
(3, 'Analyste de données'),
(4, 'Ingénieur en informatique'),
(5, 'Infirmier'),
(6, 'Médecin'),
(7, 'Avocat'),
(8, 'Enseignant'),
(9, 'Commercial'),
(10, 'Gestionnaire de projet'),
(11, 'Responsable marketing'),
(12, 'Architecte'),
(13, 'Développeur mobile'),
(14, 'Designer UX/UI'),
(15, 'Data Scientist'),
(16, 'Ingénieur DevOps'),
(17, 'Infirmier en chef'),
(18, 'Chirurgien'),
(19, 'Avocat spécialisé'),
(20, 'Professeur'),
(21, 'Chef de vente'),
(22, 'Chef de projet IT'),
(23, 'Directeur marketing'),
(24, 'Urbaniste'),
(25, 'Analyste financière'),
(26, 'Traducteur'),
(27, 'Journaliste'),
(28, 'Photographe'),
(29, 'Styliste'),
(30, 'Acteur'),
(31, 'Musicien'),
(32, 'Peintre'),
(33, 'Sculpteur'),
(34, 'Archéologue'),
(35, 'Astronome'),
(36, 'Biologiste'),
(37, 'Chimiste'),
(38, 'Ecologiste'),
(39, 'Géologue'),
(40, 'Historien'),
(41, 'Informaticien'),
(42, 'Météorologiste'),
(43, 'Oceanographe'),
(44, 'Physicien'),
(45, 'Psychologue'),
(46, 'Sociologue'),
(47, 'Vétérinaire'),
(48, 'Boulanger'),
(49, 'Cuisinier'),
(50, 'Pâtissier'),
(51, 'Barman'),
(52, 'Sommelier'),
(53, 'Fleuriste'),
(54, 'Jardinier'),
(55, 'Paysagiste'),
(56, 'Couturier'),
(57, 'Tailleur'),
(58, 'Charpentier'),
(59, 'Menuisier'),
(60, 'Maçon'),
(61, 'Peintre en bâtiment'),
(62, 'Electricien'),
(63, 'Plombier'),
(64, 'Chauffagiste'),
(65, 'Mécanicien'),
(66, 'Carrossier'),
(67, 'Gardien d\'immeuble'),
(68, 'Livreur'),
(69, 'Chauffeur'),
(70, 'Agent de sécurité'),
(71, 'Hôte de l\'air'),
(72, 'Steward'),
(73, 'Marin'),
(74, 'Pêcheur'),
(75, 'Forgeron'),
(76, 'Bijoutier'),
(77, 'Joaillier'),
(78, 'Orfèvre'),
(79, 'Horloger'),
(80, 'Relieur'),
(81, 'Imprimeur'),
(82, 'Libraire'),
(83, 'Bibliothécaire'),
(84, 'Conservateur de musée'),
(85, 'Guide touristique'),
(86, 'Voyagiste');

-- --------------------------------------------------------

--
-- Structure de la table `t_salaire`
--

DROP TABLE IF EXISTS `t_salaire`;
CREATE TABLE IF NOT EXISTS `t_salaire` (
  `sal_id` int(11) NOT NULL AUTO_INCREMENT,
  `sal_libelle` varchar(20) NOT NULL,
  PRIMARY KEY (`sal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_salaire`
--

INSERT INTO `t_salaire` (`sal_id`, `sal_libelle`) VALUES
(1, '8000 - 20000€'),
(2, '20000 - 25000€'),
(3, '25000 - 30000€'),
(4, '30000 - 35000€'),
(5, '35000 - 40000€'),
(6, '40000 - 45000€'),
(7, '45000€ et +'),
(8, '1000 - 8000€');

-- --------------------------------------------------------

--
-- Structure de la table `t_secteur_activite`
--

DROP TABLE IF EXISTS `t_secteur_activite`;
CREATE TABLE IF NOT EXISTS `t_secteur_activite` (
  `sea_id` int(11) NOT NULL AUTO_INCREMENT,
  `sea_libelle` varchar(100) NOT NULL,
  PRIMARY KEY (`sea_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_secteur_activite`
--

INSERT INTO `t_secteur_activite` (`sea_id`, `sea_libelle`) VALUES
(1, 'Agriculture, sylviculture et pêche'),
(2, 'Industrie manufacturière'),
(3, 'Construction'),
(4, 'Commerce et réparation d\'automobiles et motocycles'),
(5, 'Transports et entreposage'),
(6, 'Information et communication'),
(7, 'Activités financières et d\'assurance'),
(8, 'Activités immobilières'),
(9, 'Activités scientifiques et techniques'),
(10, 'Activités de services administratifs et de soutien'),
(11, 'Administration publique et défense, enseignement'),
(12, 'Santé humaine et action sociale'),
(13, 'Arts, spectacles et activités récréatives'),
(14, 'Autres activités de services'),
(15, 'Activités extra-territoriales');

-- --------------------------------------------------------

--
-- Structure de la table `t_sexe`
--

DROP TABLE IF EXISTS `t_sexe`;
CREATE TABLE IF NOT EXISTS `t_sexe` (
  `sex_id` int(11) NOT NULL AUTO_INCREMENT,
  `sex_libelle` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sex_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_sexe`
--

INSERT INTO `t_sexe` (`sex_id`, `sex_libelle`) VALUES
(1, 'Homme'),
(2, 'Femme');

-- --------------------------------------------------------

--
-- Structure de la table `t_statut_juridique`
--

DROP TABLE IF EXISTS `t_statut_juridique`;
CREATE TABLE IF NOT EXISTS `t_statut_juridique` (
  `stj_id` int(11) NOT NULL AUTO_INCREMENT,
  `stj_libelle` varchar(100) NOT NULL,
  PRIMARY KEY (`stj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_statut_juridique`
--

INSERT INTO `t_statut_juridique` (`stj_id`, `stj_libelle`) VALUES
(1, 'SAS'),
(2, 'SARL'),
(3, 'SA'),
(4, 'SCA'),
(5, 'SASU'),
(6, 'EURL'),
(7, 'auto-entrepreneur');

-- --------------------------------------------------------

--
-- Structure de la table `t_suivi_offre_chercheur`
--

DROP TABLE IF EXISTS `t_suivi_offre_chercheur`;
CREATE TABLE IF NOT EXISTS `t_suivi_offre_chercheur` (
  `soc_id` int(11) NOT NULL,
  `soc_offre` int(11) NOT NULL,
  `soc_chercheur` int(11) NOT NULL,
  `soc_favori` tinyint(1) DEFAULT NULL,
  `soc_candidature` int(11) DEFAULT NULL,
  `soc_entretien` int(11) DEFAULT NULL,
  KEY `suivi_offre` (`soc_offre`),
  KEY `suivi_chercheur` (`soc_chercheur`),
  KEY `suivi_candidature` (`soc_candidature`),
  KEY `suivi_entretien` (`soc_entretien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_type_contrat`
--

DROP TABLE IF EXISTS `t_type_contrat`;
CREATE TABLE IF NOT EXISTS `t_type_contrat` (
  `tco_id` int(11) NOT NULL AUTO_INCREMENT,
  `tco_libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`tco_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_type_contrat`
--

INSERT INTO `t_type_contrat` (`tco_id`, `tco_libelle`) VALUES
(1, 'CDI'),
(2, 'CDD'),
(3, 'Intérim'),
(4, 'Apprentissage'),
(5, 'Contrat pro');

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

DROP TABLE IF EXISTS `t_user`;
CREATE TABLE IF NOT EXISTS `t_user` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_est_chercheur_emploi` tinyint(1) NOT NULL,
  `usr_mot_de_passe` varchar(100) NOT NULL,
  `usr_email` varchar(100) NOT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_user`
--

INSERT INTO `t_user` (`usr_id`, `usr_est_chercheur_emploi`, `usr_mot_de_passe`, `usr_email`) VALUES
(1, 1, '$2y$10$a2INVTbfF4KRDD0MVQEuTOOcfIIaKQpoo.GC4ft/u8zpGS0PR19zi', 'thomas@gmail.com'),
(2, 1, '$2y$10$INx3RHWl6ySqxCcMz/0af.QmclF399bSGvxmQw/cngd5I7V/gTx.6', 'matthieu@gmail.com'),
(3, 1, '$2y$10$ho4BzMQFpxSoHnp.Wm4gqe7/5ObK1Soe5z2ftyvYWKSjVn3plKuZa', 'lucas@gmail.com'),
(4, 0, '$2y$10$ho4BzMQFpxSoHnp.Wm4gqe7/5ObK1Soe5z2ftyvYWKSjVn3plKuZa', 'courbon@gmail.com'),
(5, 0, '$2y$10$KVTgZBbBq5YeS70S2lHgVupdgxt7V70uRbxqQWswxDAQY6oqHBDgK', 'ircf@gmail.com'),
(6, 0, '$2y$10$10oqlccrZk5JX4ugqjZtUuzNfdhoAwxH.H5dsg.p1FYlp9b3wTSgm', 'astronics@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `t_ville`
--

DROP TABLE IF EXISTS `t_ville`;
CREATE TABLE IF NOT EXISTS `t_ville` (
  `vil_id` int(11) NOT NULL AUTO_INCREMENT,
  `vil_nom` varchar(45) DEFAULT NULL,
  `vil_code_postal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`vil_id`),
  KEY `ville_nom` (`vil_nom`),
  KEY `ville_code_postal` (`vil_code_postal`)
) ENGINE=InnoDB AUTO_INCREMENT=36865 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_ville`
--

INSERT INTO `t_ville` (`vil_id`, `vil_nom`, `vil_code_postal`) VALUES
(1, 'Paris', '75000'),
(2, 'Marseille', '13000'),
(3, 'Lyon', '69000'),
(4, 'Toulouse', '31000'),
(5, 'Nice', '06000'),
(6, 'Nantes', '44000'),
(7, 'Strasbourg', '67000'),
(8, 'Montpellier', '34000'),
(9, 'Bordeaux', '33000'),
(10, 'Lille', '59000'),
(11, 'Rennes', '35000'),
(12, 'Le Havre', '76000'),
(13, 'Saint-Etienne', '42000'),
(14, 'Toulon', '83000'),
(15, 'Grenoble', '38000'),
(16, 'Dijon', '21000'),
(17, 'Angers', '49000'),
(18, 'Nîmes', '30000'),
(19, 'Villeurbanne', '69100'),
(20, 'Le Mans', '72000'),
(21, 'Aix-en-Provence', '13100'),
(22, 'Brest', '29000'),
(23, 'Clermont-Ferrand', '63000'),
(24, 'Limoges', '87000'),
(25, 'Tours', '37000'),
(36856, 'Amiens', '80000'),
(36857, 'Metz', '57000'),
(36858, 'Perpignan', '66000'),
(36859, 'Besançon', '25000'),
(36860, 'Orléans', '45000'),
(36861, 'Mulhouse', '68000'),
(36862, 'Rouen', '76000'),
(36863, 'Caen', '14000'),
(36864, 'Nancy', '54000');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_candidature`
--
ALTER TABLE `t_candidature`
  ADD CONSTRAINT `can_chercheur` FOREIGN KEY (`can_chercheur`) REFERENCES `t_chercheur_emploi` (`che_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `can_offre` FOREIGN KEY (`can_offre`) REFERENCES `t_offre` (`off_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `t_centre_interet`
--
ALTER TABLE `t_centre_interet`
  ADD CONSTRAINT `id_chercheur` FOREIGN KEY (`cei_chercheur`) REFERENCES `t_chercheur_emploi` (`che_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `t_competence_chercheur_emploi`
--
ALTER TABLE `t_competence_chercheur_emploi`
  ADD CONSTRAINT `cce_niveau` FOREIGN KEY (`cce_niveau`) REFERENCES `t_niveau` (`niv_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `t_competence_chercheur_emploi_ibfk_1` FOREIGN KEY (`cce_competence`) REFERENCES `t_competence` (`com_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_competence_chercheur_emploi_ibfk_2` FOREIGN KEY (`cce_chercheur`) REFERENCES `t_chercheur_emploi` (`che_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
