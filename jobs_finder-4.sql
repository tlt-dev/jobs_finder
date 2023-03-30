-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 30 mars 2023 à 17:34
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

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
-- Structure de la table `T_Candidature`
--

CREATE TABLE `T_Candidature` (
  `can_id` int(11) NOT NULL,
  `can_chercheur` int(11) NOT NULL,
  `can_offre` int(11) NOT NULL,
  `can_statut` tinyint(1) NOT NULL DEFAULT '2' COMMENT '0:refusé/1:accepté/2:en attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_Candidature`
--

INSERT INTO `T_Candidature` (`can_id`, `can_chercheur`, `can_offre`, `can_statut`) VALUES
(1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `T_Centre_Interet`
--

CREATE TABLE `T_Centre_Interet` (
  `cei_id` int(11) NOT NULL,
  `cei_intitule` varchar(100) NOT NULL,
  `cei_chercheur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_Centre_Interet`
--

INSERT INTO `T_Centre_Interet` (`cei_id`, `cei_intitule`, `cei_chercheur`) VALUES
(3, 'Handball', 1);

-- --------------------------------------------------------

--
-- Structure de la table `T_Chercheur_Emploi`
--

CREATE TABLE `T_Chercheur_Emploi` (
  `che_id` int(11) NOT NULL,
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
  `che_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_Chercheur_Emploi`
--

INSERT INTO `T_Chercheur_Emploi` (`che_id`, `che_nom`, `che_prenom`, `che_sexe`, `che_date_naissance`, `che_telephone`, `che_mail`, `che_adresse`, `che_ville`, `che_code_postal`, `che_departement`, `che_en_recherche`, `che_user`) VALUES
(1, 'LAURENT', 'Thomas', 1, '2000-08-15', '0611880573', 'thomas@gmail.com', '12 rue Pierre de COubertin', 1, NULL, NULL, NULL, 1),
(2, 'MOULIN', 'Matthieu', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 2),
(3, 'RAYNAUD', 'Lucas', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 3),
(67, 'laurent', 'philippe', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 76),
(68, 'test', 'test', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 78);

-- --------------------------------------------------------

--
-- Structure de la table `T_Competence`
--

CREATE TABLE `T_Competence` (
  `com_id` int(11) NOT NULL,
  `com_libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_Competence`
--

INSERT INTO `T_Competence` (`com_id`, `com_libelle`) VALUES
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
-- Structure de la table `T_Competence_Chercheur_Emploi`
--

CREATE TABLE `T_Competence_Chercheur_Emploi` (
  `cce_id` int(11) NOT NULL,
  `cce_competence` int(11) NOT NULL,
  `cce_chercheur` int(11) NOT NULL,
  `cce_niveau` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_Competence_Chercheur_Emploi`
--

INSERT INTO `T_Competence_Chercheur_Emploi` (`cce_id`, `cce_competence`, `cce_chercheur`, `cce_niveau`) VALUES
(1, 40, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `T_Competence_Offre`
--

CREATE TABLE `T_Competence_Offre` (
  `coo_id` int(11) NOT NULL,
  `coo_competence` int(11) NOT NULL,
  `coo_offre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_CV`
--

CREATE TABLE `T_CV` (
  `cv_id` int(11) NOT NULL,
  `cv_chercheur` int(11) NOT NULL,
  `cv_description` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Entreprise`
--

CREATE TABLE `T_Entreprise` (
  `ent_id` int(11) NOT NULL,
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
  `ent_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_Entreprise`
--

INSERT INTO `T_Entreprise` (`ent_id`, `ent_nom`, `ent_siret`, `ent_siren`, `ent_statut`, `ent_chiffre_affaires`, `ent_date_creation`, `ent_adresse`, `ent_ville`, `ent_email`, `ent_telephone`, `ent_secteur_activite`, `ent_descriptif`, `ent_user`) VALUES
(1, 'Courbon software', 100001, 23456789, 1, 9000000, '2023-03-15', '18 rue George', 12, 'courbon@gmail.com', '031897675', NULL, 'o^hifeziohfoiehofizehoifoehzohfeozhfz', 4),
(2, 'IRCF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(3, 'Astronics PGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(5, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 77);

-- --------------------------------------------------------

--
-- Structure de la table `T_Entretien`
--

CREATE TABLE `T_Entretien` (
  `ent_id` int(11) NOT NULL,
  `ent_offre` int(11) NOT NULL,
  `ent_chercheur` int(11) NOT NULL,
  `ent_date_entretien` date NOT NULL,
  `ent_modalites` varchar(500) DEFAULT NULL COMMENT 'Modalités de l''entretien (type, adresse, etc.)',
  `ent_statut` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:fermé / 1: attente réponse chercheur/2:accepté par le chercheur/3:refusé par le chercheur',
  `ent_reponse` int(11) DEFAULT NULL COMMENT '0:Négatif 1:Réflexion/Autres entretiens/Tests/... 2: Négatif',
  `ent_commentaire` varchar(300) DEFAULT NULL COMMENT 'Commentaire associé à la réponse suite entretien'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_Entretien`
--

INSERT INTO `T_Entretien` (`ent_id`, `ent_offre`, `ent_chercheur`, `ent_date_entretien`, `ent_modalites`, `ent_statut`, `ent_reponse`, `ent_commentaire`) VALUES
(1, 1, 1, '2023-03-20', 'test', 2, 1, 'test2'),
(2, 1, 1, '2023-03-21', 'dzjapd', 2, 2, NULL),
(3, 1, 1, '2023-03-21', 'dzjapdz', 2, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `T_Experience`
--

CREATE TABLE `T_Experience` (
  `exp_id` int(11) NOT NULL,
  `exp_libelle` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Experience_Pro`
--

CREATE TABLE `T_Experience_Pro` (
  `exp_id` int(11) NOT NULL,
  `exp_poste` varchar(100) NOT NULL,
  `exp_employeur` varchar(100) NOT NULL,
  `exp_description` longtext,
  `exp_ville` int(11) DEFAULT NULL,
  `exp_date_debut` date DEFAULT NULL,
  `exp_date_fin` date DEFAULT NULL,
  `exp_chercheur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Favori_Chercheur_Emploi`
--

CREATE TABLE `T_Favori_Chercheur_Emploi` (
  `fce_id` int(11) NOT NULL,
  `fce_offre` int(11) NOT NULL,
  `fce_chercheur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_Favori_Chercheur_Emploi`
--

INSERT INTO `T_Favori_Chercheur_Emploi` (`fce_id`, `fce_offre`, `fce_chercheur`) VALUES
(1, 2, 1),
(8, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `T_Formation`
--

CREATE TABLE `T_Formation` (
  `for_id` int(11) NOT NULL,
  `for_formation` varchar(200) NOT NULL,
  `for_etablissement` varchar(100) DEFAULT NULL,
  `for_ville` int(11) DEFAULT NULL,
  `for_date_debut` date NOT NULL,
  `for_date_fin` date DEFAULT NULL,
  `for_description` varchar(300) NOT NULL,
  `for_chercheur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Langue`
--

CREATE TABLE `T_Langue` (
  `lan_id` int(11) NOT NULL,
  `lan_nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_Langue`
--

INSERT INTO `T_Langue` (`lan_id`, `lan_nom`) VALUES
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
-- Structure de la table `T_Langue_Chercheur_Emploi`
--

CREATE TABLE `T_Langue_Chercheur_Emploi` (
  `lce_id` bigint(20) NOT NULL,
  `lce_langue` int(11) NOT NULL,
  `lce_chercheur` int(11) NOT NULL,
  `lce_niveau` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_Langue_Chercheur_Emploi`
--

INSERT INTO `T_Langue_Chercheur_Emploi` (`lce_id`, `lce_langue`, `lce_chercheur`, `lce_niveau`) VALUES
(4, 3, 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `T_Niveau`
--

CREATE TABLE `T_Niveau` (
  `niv_id` int(11) NOT NULL,
  `niv_libelle` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_Niveau`
--

INSERT INTO `T_Niveau` (`niv_id`, `niv_libelle`) VALUES
(1, 'Débutant'),
(2, 'Intermédiaire'),
(3, 'Bon'),
(4, 'Très bon'),
(5, 'Excellent');

-- --------------------------------------------------------

--
-- Structure de la table `T_Offre`
--

CREATE TABLE `T_Offre` (
  `off_id` int(11) NOT NULL,
  `off_intitule` varchar(100) NOT NULL,
  `off_ville` int(11) DEFAULT NULL,
  `off_date_prise_poste` date NOT NULL,
  `off_type_contrat` int(11) DEFAULT NULL,
  `off_salaire` int(11) DEFAULT NULL,
  `off_duree` int(11) DEFAULT NULL,
  `off_secteur_activite` int(11) DEFAULT NULL,
  `off_entreprise` int(11) NOT NULL,
  `off_descriptif` varchar(1000) NOT NULL,
  `off_poste` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_Offre`
--

INSERT INTO `T_Offre` (`off_id`, `off_intitule`, `off_ville`, `off_date_prise_poste`, `off_type_contrat`, `off_salaire`, `off_duree`, `off_secteur_activite`, `off_entreprise`, `off_descriptif`, `off_poste`) VALUES
(1, 'Développeur web', 21, '2023-03-15', 2, 5, 1, 7, 1, '                                                                                                                                                                                                vdserghty,hreqcxqw\r\n                                                \r\n                                                \r\n                                                \r\n                                                ', 1),
(2, 'Chef de projet IT', 9, '2023-03-22', 1, 6, NULL, 2, 1, 'kzhozehnnoezknonnnoennczcez', 22),
(3, 'Chef de projet IT', 9, '2023-03-22', 1, 6, NULL, 2, 1, 'kzhozehnnoezknonnnoennczcez', 22),
(4, 'Chef de projet IT', 9, '2023-03-22', 1, 6, NULL, 2, 1, 'kzhozehnnoezknonnnoennczcez', 22);

-- --------------------------------------------------------

--
-- Structure de la table `T_Offre_Poste`
--

CREATE TABLE `T_Offre_Poste` (
  `ofp_id` int(11) NOT NULL,
  `ofp_offre` int(11) NOT NULL,
  `ofp_poste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Poste`
--

CREATE TABLE `T_Poste` (
  `pos_id` int(11) NOT NULL,
  `pos_libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_Poste`
--

INSERT INTO `T_Poste` (`pos_id`, `pos_libelle`) VALUES
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
-- Structure de la table `T_Salaire`
--

CREATE TABLE `T_Salaire` (
  `sal_id` int(11) NOT NULL,
  `sal_libelle` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_Salaire`
--

INSERT INTO `T_Salaire` (`sal_id`, `sal_libelle`) VALUES
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
-- Structure de la table `T_Secteur_Activite`
--

CREATE TABLE `T_Secteur_Activite` (
  `sea_id` int(11) NOT NULL,
  `sea_libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_Secteur_Activite`
--

INSERT INTO `T_Secteur_Activite` (`sea_id`, `sea_libelle`) VALUES
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
-- Structure de la table `T_Sexe`
--

CREATE TABLE `T_Sexe` (
  `sex_id` int(11) NOT NULL,
  `sex_libelle` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_Sexe`
--

INSERT INTO `T_Sexe` (`sex_id`, `sex_libelle`) VALUES
(1, 'Homme'),
(2, 'Femme');

-- --------------------------------------------------------

--
-- Structure de la table `T_Statut_Juridique`
--

CREATE TABLE `T_Statut_Juridique` (
  `stj_id` int(11) NOT NULL,
  `stj_libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_Statut_Juridique`
--

INSERT INTO `T_Statut_Juridique` (`stj_id`, `stj_libelle`) VALUES
(1, 'SAS'),
(2, 'SARL'),
(3, 'SA'),
(4, 'SCA'),
(5, 'SASU'),
(6, 'EURL'),
(7, 'auto-entrepreneur');

-- --------------------------------------------------------

--
-- Structure de la table `T_Suivi_Offre_Chercheur`
--

CREATE TABLE `T_Suivi_Offre_Chercheur` (
  `soc_id` int(11) NOT NULL,
  `soc_offre` int(11) NOT NULL,
  `soc_chercheur` int(11) NOT NULL,
  `soc_favori` tinyint(1) DEFAULT NULL,
  `soc_candidature` int(11) DEFAULT NULL,
  `soc_entretien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Type_Contrat`
--

CREATE TABLE `T_Type_Contrat` (
  `tco_id` int(11) NOT NULL,
  `tco_libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_Type_Contrat`
--

INSERT INTO `T_Type_Contrat` (`tco_id`, `tco_libelle`) VALUES
(1, 'CDI'),
(2, 'CDD'),
(3, 'Intérim'),
(4, 'Apprentissage'),
(5, 'Contrat pro');

-- --------------------------------------------------------

--
-- Structure de la table `T_User`
--

CREATE TABLE `T_User` (
  `usr_id` int(11) NOT NULL,
  `usr_est_chercheur_emploi` tinyint(1) NOT NULL,
  `usr_mot_de_passe` varchar(100) NOT NULL,
  `usr_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_User`
--

INSERT INTO `T_User` (`usr_id`, `usr_est_chercheur_emploi`, `usr_mot_de_passe`, `usr_email`) VALUES
(1, 1, '$2y$10$a2INVTbfF4KRDD0MVQEuTOOcfIIaKQpoo.GC4ft/u8zpGS0PR19zi', 'thomas@gmail.com'),
(2, 1, '$2y$10$INx3RHWl6ySqxCcMz/0af.QmclF399bSGvxmQw/cngd5I7V/gTx.6', 'matthieu@gmail.com'),
(3, 1, '$2y$10$arXkngVABfeu83MOSK0TsOMwjJJ8Dk6ECte59TEm/Fnglsm2tq89m', 'lucas@gmail.com'),
(4, 0, '$2y$10$dnRbHQlIOf2GmYCLP/Rczu8lIY/xG1SAy8Gz3.mg08by/mSwu37.q', 'courbon@gmail.com'),
(5, 0, '$2y$10$KVTgZBbBq5YeS70S2lHgVupdgxt7V70uRbxqQWswxDAQY6oqHBDgK', 'ircf@gmail.com'),
(6, 0, '$2y$10$10oqlccrZk5JX4ugqjZtUuzNfdhoAwxH.H5dsg.p1FYlp9b3wTSgm', 'astronics@gmail.com'),
(69, 1, '$2y$10$6t26lIjOgo8bwxTk.WXRZurOBNW0HhsIEP6//m4k.i8vECrr43kRu', 'maelle@gmail.com'),
(76, 1, '$2y$10$zvppH0NIHY1MFpoaeF0.Xe4615Jah0ehFddIryy7U7D7JeguOodmC', 'philippe@gmail.com'),
(77, 0, '$2y$10$77IIW9h5A61pObXH3m9G1OS1He4kiLdGeqquVTyI5HlwEMfifEsRO', 'test@gmail.com'),
(78, 1, '$2y$10$.TH.0tJCS3TNofCMyenClOazKKRSk8U7XDvAiY1LSedStevyUJeGW', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `T_Ville`
--

CREATE TABLE `T_Ville` (
  `vil_id` int(11) NOT NULL,
  `vil_nom` varchar(45) DEFAULT NULL,
  `vil_code_postal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_Ville`
--

INSERT INTO `T_Ville` (`vil_id`, `vil_nom`, `vil_code_postal`) VALUES
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
-- Index pour les tables déchargées
--

--
-- Index pour la table `T_Candidature`
--
ALTER TABLE `T_Candidature`
  ADD PRIMARY KEY (`can_id`),
  ADD KEY `can_chercheur` (`can_chercheur`),
  ADD KEY `can_offre` (`can_offre`);

--
-- Index pour la table `T_Centre_Interet`
--
ALTER TABLE `T_Centre_Interet`
  ADD PRIMARY KEY (`cei_id`),
  ADD KEY `id_chercheur` (`cei_chercheur`);

--
-- Index pour la table `T_Chercheur_Emploi`
--
ALTER TABLE `T_Chercheur_Emploi`
  ADD PRIMARY KEY (`che_id`),
  ADD KEY `T_Chercheur_Emploi_FK_1` (`che_user`),
  ADD KEY `t_chercheur_emploi_ibfk_2` (`che_ville`),
  ADD KEY `che_departement` (`che_departement`),
  ADD KEY `t_chercheur_emploi_ibfk_1` (`che_sexe`);

--
-- Index pour la table `T_Competence`
--
ALTER TABLE `T_Competence`
  ADD PRIMARY KEY (`com_id`);

--
-- Index pour la table `T_Competence_Chercheur_Emploi`
--
ALTER TABLE `T_Competence_Chercheur_Emploi`
  ADD PRIMARY KEY (`cce_id`),
  ADD KEY `cce_niveau` (`cce_niveau`),
  ADD KEY `t_competence_chercheur_emploi_ibfk_1` (`cce_competence`),
  ADD KEY `t_competence_chercheur_emploi_ibfk_2` (`cce_chercheur`);

--
-- Index pour la table `T_Competence_Offre`
--
ALTER TABLE `T_Competence_Offre`
  ADD PRIMARY KEY (`coo_id`),
  ADD KEY `id_competence` (`coo_competence`),
  ADD KEY `id_offre` (`coo_offre`);

--
-- Index pour la table `T_CV`
--
ALTER TABLE `T_CV`
  ADD PRIMARY KEY (`cv_id`),
  ADD KEY `T_CV_FK` (`cv_chercheur`);

--
-- Index pour la table `T_Entreprise`
--
ALTER TABLE `T_Entreprise`
  ADD PRIMARY KEY (`ent_id`),
  ADD KEY `T_Entreprise_FK` (`ent_statut`),
  ADD KEY `T_Entreprise_FK_1` (`ent_ville`),
  ADD KEY `T_Entreprise_FK_2` (`ent_secteur_activite`),
  ADD KEY `T_Entreprise_FK_3` (`ent_user`);

--
-- Index pour la table `T_Entretien`
--
ALTER TABLE `T_Entretien`
  ADD PRIMARY KEY (`ent_id`),
  ADD KEY `ent_offre` (`ent_offre`),
  ADD KEY `ent_user` (`ent_chercheur`);

--
-- Index pour la table `T_Experience`
--
ALTER TABLE `T_Experience`
  ADD PRIMARY KEY (`exp_id`);

--
-- Index pour la table `T_Experience_Pro`
--
ALTER TABLE `T_Experience_Pro`
  ADD PRIMARY KEY (`exp_id`),
  ADD KEY `T_Experience_FK` (`exp_ville`),
  ADD KEY `exp_chercheur` (`exp_chercheur`);

--
-- Index pour la table `T_Favori_Chercheur_Emploi`
--
ALTER TABLE `T_Favori_Chercheur_Emploi`
  ADD PRIMARY KEY (`fce_id`),
  ADD KEY `fce_chercheur` (`fce_chercheur`),
  ADD KEY `fce_offre` (`fce_offre`);

--
-- Index pour la table `T_Formation`
--
ALTER TABLE `T_Formation`
  ADD PRIMARY KEY (`for_id`),
  ADD KEY `T_Formation_FK` (`for_ville`),
  ADD KEY `for_chercheur` (`for_chercheur`);

--
-- Index pour la table `T_Langue`
--
ALTER TABLE `T_Langue`
  ADD PRIMARY KEY (`lan_id`);

--
-- Index pour la table `T_Langue_Chercheur_Emploi`
--
ALTER TABLE `T_Langue_Chercheur_Emploi`
  ADD PRIMARY KEY (`lce_id`),
  ADD KEY `T_Langue_Chercheur_Emploi_FK` (`lce_chercheur`),
  ADD KEY `lce_langue` (`lce_langue`,`lce_chercheur`) USING BTREE,
  ADD KEY `T_Langue_Chercheur_Emploi_FK_2` (`lce_niveau`);

--
-- Index pour la table `T_Niveau`
--
ALTER TABLE `T_Niveau`
  ADD PRIMARY KEY (`niv_id`);

--
-- Index pour la table `T_Offre`
--
ALTER TABLE `T_Offre`
  ADD PRIMARY KEY (`off_id`),
  ADD KEY `offre_entreprise` (`off_entreprise`),
  ADD KEY `offre_salaire` (`off_salaire`),
  ADD KEY `offre_secteur_activite` (`off_secteur_activite`),
  ADD KEY `offre_type_contrat` (`off_type_contrat`),
  ADD KEY `offre_ville` (`off_ville`),
  ADD KEY `offre_poste` (`off_poste`);

--
-- Index pour la table `T_Offre_Poste`
--
ALTER TABLE `T_Offre_Poste`
  ADD PRIMARY KEY (`ofp_id`),
  ADD KEY `id_offre2` (`ofp_offre`),
  ADD KEY `id_poste` (`ofp_poste`);

--
-- Index pour la table `T_Poste`
--
ALTER TABLE `T_Poste`
  ADD PRIMARY KEY (`pos_id`);

--
-- Index pour la table `T_Salaire`
--
ALTER TABLE `T_Salaire`
  ADD PRIMARY KEY (`sal_id`);

--
-- Index pour la table `T_Secteur_Activite`
--
ALTER TABLE `T_Secteur_Activite`
  ADD PRIMARY KEY (`sea_id`);

--
-- Index pour la table `T_Sexe`
--
ALTER TABLE `T_Sexe`
  ADD PRIMARY KEY (`sex_id`);

--
-- Index pour la table `T_Statut_Juridique`
--
ALTER TABLE `T_Statut_Juridique`
  ADD PRIMARY KEY (`stj_id`);

--
-- Index pour la table `T_Suivi_Offre_Chercheur`
--
ALTER TABLE `T_Suivi_Offre_Chercheur`
  ADD KEY `suivi_offre` (`soc_offre`),
  ADD KEY `suivi_chercheur` (`soc_chercheur`),
  ADD KEY `suivi_candidature` (`soc_candidature`),
  ADD KEY `suivi_entretien` (`soc_entretien`);

--
-- Index pour la table `T_Type_Contrat`
--
ALTER TABLE `T_Type_Contrat`
  ADD PRIMARY KEY (`tco_id`);

--
-- Index pour la table `T_User`
--
ALTER TABLE `T_User`
  ADD PRIMARY KEY (`usr_id`);

--
-- Index pour la table `T_Ville`
--
ALTER TABLE `T_Ville`
  ADD PRIMARY KEY (`vil_id`),
  ADD KEY `ville_nom` (`vil_nom`),
  ADD KEY `ville_code_postal` (`vil_code_postal`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `T_Candidature`
--
ALTER TABLE `T_Candidature`
  MODIFY `can_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `T_Centre_Interet`
--
ALTER TABLE `T_Centre_Interet`
  MODIFY `cei_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `T_Chercheur_Emploi`
--
ALTER TABLE `T_Chercheur_Emploi`
  MODIFY `che_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT pour la table `T_Competence`
--
ALTER TABLE `T_Competence`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT pour la table `T_Competence_Chercheur_Emploi`
--
ALTER TABLE `T_Competence_Chercheur_Emploi`
  MODIFY `cce_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `T_Competence_Offre`
--
ALTER TABLE `T_Competence_Offre`
  MODIFY `coo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_CV`
--
ALTER TABLE `T_CV`
  MODIFY `cv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Entreprise`
--
ALTER TABLE `T_Entreprise`
  MODIFY `ent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `T_Entretien`
--
ALTER TABLE `T_Entretien`
  MODIFY `ent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `T_Experience`
--
ALTER TABLE `T_Experience`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Experience_Pro`
--
ALTER TABLE `T_Experience_Pro`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Favori_Chercheur_Emploi`
--
ALTER TABLE `T_Favori_Chercheur_Emploi`
  MODIFY `fce_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `T_Formation`
--
ALTER TABLE `T_Formation`
  MODIFY `for_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Langue`
--
ALTER TABLE `T_Langue`
  MODIFY `lan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `T_Langue_Chercheur_Emploi`
--
ALTER TABLE `T_Langue_Chercheur_Emploi`
  MODIFY `lce_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `T_Niveau`
--
ALTER TABLE `T_Niveau`
  MODIFY `niv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `T_Offre`
--
ALTER TABLE `T_Offre`
  MODIFY `off_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `T_Offre_Poste`
--
ALTER TABLE `T_Offre_Poste`
  MODIFY `ofp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Poste`
--
ALTER TABLE `T_Poste`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT pour la table `T_Salaire`
--
ALTER TABLE `T_Salaire`
  MODIFY `sal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `T_Secteur_Activite`
--
ALTER TABLE `T_Secteur_Activite`
  MODIFY `sea_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `T_Sexe`
--
ALTER TABLE `T_Sexe`
  MODIFY `sex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `T_Statut_Juridique`
--
ALTER TABLE `T_Statut_Juridique`
  MODIFY `stj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `T_Type_Contrat`
--
ALTER TABLE `T_Type_Contrat`
  MODIFY `tco_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `T_User`
--
ALTER TABLE `T_User`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT pour la table `T_Ville`
--
ALTER TABLE `T_Ville`
  MODIFY `vil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36865;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `T_Candidature`
--
ALTER TABLE `T_Candidature`
  ADD CONSTRAINT `can_chercheur` FOREIGN KEY (`can_chercheur`) REFERENCES `T_Chercheur_Emploi` (`che_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `can_offre` FOREIGN KEY (`can_offre`) REFERENCES `T_Offre` (`off_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `T_Centre_Interet`
--
ALTER TABLE `T_Centre_Interet`
  ADD CONSTRAINT `id_chercheur` FOREIGN KEY (`cei_chercheur`) REFERENCES `T_Chercheur_Emploi` (`che_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `T_Chercheur_Emploi`
--
ALTER TABLE `T_Chercheur_Emploi`
  ADD CONSTRAINT `che_departement` FOREIGN KEY (`che_departement`) REFERENCES `T_Departement` (`dep_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `t_chercheur_emploi_ibfk_1` FOREIGN KEY (`che_sexe`) REFERENCES `T_Sexe` (`sex_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `t_chercheur_emploi_ibfk_2` FOREIGN KEY (`che_ville`) REFERENCES `T_Ville` (`vil_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `t_chercheur_emploi_user` FOREIGN KEY (`che_user`) REFERENCES `T_User` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `T_Competence_Chercheur_Emploi`
--
ALTER TABLE `T_Competence_Chercheur_Emploi`
  ADD CONSTRAINT `cce_niveau` FOREIGN KEY (`cce_niveau`) REFERENCES `T_Niveau` (`niv_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `t_competence_chercheur_emploi_ibfk_1` FOREIGN KEY (`cce_competence`) REFERENCES `T_Competence` (`com_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_competence_chercheur_emploi_ibfk_2` FOREIGN KEY (`cce_chercheur`) REFERENCES `T_Chercheur_Emploi` (`che_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `T_Competence_Offre`
--
ALTER TABLE `T_Competence_Offre`
  ADD CONSTRAINT `id_competence` FOREIGN KEY (`coo_competence`) REFERENCES `T_Competence` (`com_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_offre` FOREIGN KEY (`coo_offre`) REFERENCES `T_Offre` (`off_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `T_CV`
--
ALTER TABLE `T_CV`
  ADD CONSTRAINT `T_CV_FK` FOREIGN KEY (`cv_chercheur`) REFERENCES `T_Chercheur_Emploi` (`che_id`);

--
-- Contraintes pour la table `T_Entreprise`
--
ALTER TABLE `T_Entreprise`
  ADD CONSTRAINT `T_Entreprise_FK` FOREIGN KEY (`ent_statut`) REFERENCES `T_Statut_Juridique` (`stj_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `T_Entreprise_FK_2` FOREIGN KEY (`ent_secteur_activite`) REFERENCES `T_Secteur_Activite` (`sea_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `T_Entreprise_FK_3` FOREIGN KEY (`ent_user`) REFERENCES `T_User` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `T_Entreprise_FK_4` FOREIGN KEY (`ent_ville`) REFERENCES `T_Ville` (`vil_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `T_Entretien`
--
ALTER TABLE `T_Entretien`
  ADD CONSTRAINT `ent_offre` FOREIGN KEY (`ent_offre`) REFERENCES `T_Offre` (`off_id`),
  ADD CONSTRAINT `ent_user` FOREIGN KEY (`ent_chercheur`) REFERENCES `T_Chercheur_Emploi` (`che_id`);

--
-- Contraintes pour la table `T_Experience_Pro`
--
ALTER TABLE `T_Experience_Pro`
  ADD CONSTRAINT `T_Experience_FK` FOREIGN KEY (`exp_ville`) REFERENCES `T_Ville` (`vil_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `exp_chercheur` FOREIGN KEY (`exp_chercheur`) REFERENCES `T_Chercheur_Emploi` (`che_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `T_Favori_Chercheur_Emploi`
--
ALTER TABLE `T_Favori_Chercheur_Emploi`
  ADD CONSTRAINT `fce_chercheur` FOREIGN KEY (`fce_chercheur`) REFERENCES `T_Chercheur_Emploi` (`che_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fce_offre` FOREIGN KEY (`fce_offre`) REFERENCES `T_Offre` (`off_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `T_Formation`
--
ALTER TABLE `T_Formation`
  ADD CONSTRAINT `T_Formation_FK` FOREIGN KEY (`for_ville`) REFERENCES `T_Ville` (`vil_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `for_chercheur` FOREIGN KEY (`for_chercheur`) REFERENCES `T_Chercheur_Emploi` (`che_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `T_Langue_Chercheur_Emploi`
--
ALTER TABLE `T_Langue_Chercheur_Emploi`
  ADD CONSTRAINT `T_Langue_Chercheur_Emploi_FK_1` FOREIGN KEY (`lce_langue`) REFERENCES `T_Langue` (`lan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `T_Langue_Chercheur_Emploi_FK_2` FOREIGN KEY (`lce_niveau`) REFERENCES `T_Niveau` (`niv_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `lce_chercheur` FOREIGN KEY (`lce_chercheur`) REFERENCES `T_Chercheur_Emploi` (`che_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `T_Offre`
--
ALTER TABLE `T_Offre`
  ADD CONSTRAINT `offre_entreprise` FOREIGN KEY (`off_entreprise`) REFERENCES `T_Entreprise` (`ent_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offre_poste` FOREIGN KEY (`off_poste`) REFERENCES `T_Poste` (`pos_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `offre_salaire` FOREIGN KEY (`off_salaire`) REFERENCES `T_Salaire` (`sal_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `offre_secteur_activite` FOREIGN KEY (`off_secteur_activite`) REFERENCES `T_Secteur_Activite` (`sea_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `offre_type_contrat` FOREIGN KEY (`off_type_contrat`) REFERENCES `T_Type_Contrat` (`tco_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `offre_ville` FOREIGN KEY (`off_ville`) REFERENCES `T_Ville` (`vil_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `T_Offre_Poste`
--
ALTER TABLE `T_Offre_Poste`
  ADD CONSTRAINT `id_offre2` FOREIGN KEY (`ofp_offre`) REFERENCES `T_Offre` (`off_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_poste` FOREIGN KEY (`ofp_poste`) REFERENCES `T_Poste` (`pos_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `T_Suivi_Offre_Chercheur`
--
ALTER TABLE `T_Suivi_Offre_Chercheur`
  ADD CONSTRAINT `suivi_candidature` FOREIGN KEY (`soc_candidature`) REFERENCES `T_Candidature` (`can_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suivi_chercheur` FOREIGN KEY (`soc_chercheur`) REFERENCES `T_Chercheur_Emploi` (`che_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suivi_entretien` FOREIGN KEY (`soc_entretien`) REFERENCES `T_Entretien` (`ent_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suivi_offre` FOREIGN KEY (`soc_offre`) REFERENCES `T_Offre` (`off_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
