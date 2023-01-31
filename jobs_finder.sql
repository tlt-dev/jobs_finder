-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 31 jan. 2023 à 23:16
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
  `can_user` int(11) NOT NULL,
  `can_offre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Centre_Interet`
--

CREATE TABLE `T_Centre_Interet` (
  `cei_id` int(11) NOT NULL,
  `cei_intitule` varchar(100) NOT NULL,
  `cei_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Chercheur_Emploi`
--

CREATE TABLE `T_Chercheur_Emploi` (
  `che_id` int(11) NOT NULL,
  `che_nom` varchar(100) NOT NULL,
  `che_prenom` varchar(100) NOT NULL,
  `che_sexe` int(11) DEFAULT NULL,
  `che_date_naissance` date DEFAULT NULL,
  `che_telephone` varchar(100) DEFAULT NULL,
  `che_complement_identification_destinataire` varchar(100) DEFAULT NULL,
  `che_complement_identification_geographique` varchar(100) DEFAULT NULL,
  `che_libelle_voie` varchar(100) DEFAULT NULL,
  `che_adresse_service_specifique` varchar(100) DEFAULT NULL,
  `che_ville` int(11) DEFAULT NULL,
  `che_photo` varchar(100) DEFAULT NULL,
  `che_en_recherche` tinyint(1) NOT NULL,
  `che_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Competence`
--

CREATE TABLE `T_Competence` (
  `com_id` int(11) NOT NULL,
  `com_libelle` varchar(100) NOT NULL,
  `com_niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Competence_Chercheur_Emploi`
--

CREATE TABLE `T_Competence_Chercheur_Emploi` (
  `cce_id` bigint(20) NOT NULL,
  `cce_competence` int(11) NOT NULL,
  `cce_chercheur_emploi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `cv_chercheur_emploi` int(11) NOT NULL,
  `cv_description` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Departement`
--

CREATE TABLE `T_Departement` (
  `dep_id` int(11) NOT NULL,
  `dep_nom` varchar(100) NOT NULL,
  `dep_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Entreprise`
--

CREATE TABLE `T_Entreprise` (
  `ent_id` int(11) NOT NULL,
  `ent_nom` varchar(100) NOT NULL,
  `ent_siret` int(11) NOT NULL,
  `ent_siren` int(11) NOT NULL,
  `ent_statut` int(11) NOT NULL,
  `ent_chiffre_affaires` float DEFAULT NULL,
  `ent_date_creation` date NOT NULL,
  `ent_complement_adresse` varchar(100) DEFAULT NULL,
  `ent_libelle_voie` varchar(100) NOT NULL,
  `ent_mention_speciale_distribution` varchar(100) DEFAULT NULL,
  `ent_ville` int(11) NOT NULL,
  `ent_secteur_activite` int(11) NOT NULL,
  `ent_descriptif` varchar(1000) NOT NULL,
  `ent_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Entretien`
--

CREATE TABLE `T_Entretien` (
  `ent_id` int(11) NOT NULL,
  `ent_offre` int(11) NOT NULL,
  `ent_user` int(11) NOT NULL,
  `ent_date_entretien` date NOT NULL,
  `ent_statut` tinyint(1) NOT NULL COMMENT 'Si 1 ouvert / Si 0 fermé'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `exp_libelle` varchar(100) NOT NULL,
  `exp_nom_entreprise` varchar(100) NOT NULL,
  `exp_description` longtext,
  `exp_ville` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Experience_Pro_Chercheur_Emploi`
--

CREATE TABLE `T_Experience_Pro_Chercheur_Emploi` (
  `ece_id` bigint(20) NOT NULL,
  `ece_experience` int(11) NOT NULL,
  `ece_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Favori_Chercheur_Emploi`
--

CREATE TABLE `T_Favori_Chercheur_Emploi` (
  `fce_id` int(11) NOT NULL,
  `fce_offre` int(11) NOT NULL,
  `fce_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Formation`
--

CREATE TABLE `T_Formation` (
  `for_id` int(11) NOT NULL,
  `for_ville` int(11) NOT NULL,
  `for_ecole` varchar(100) NOT NULL,
  `for_mention` varchar(100) DEFAULT NULL,
  `for_titre_principal` varchar(100) NOT NULL,
  `for_titre_secondaire` varchar(100) DEFAULT NULL,
  `for_date_debut` date NOT NULL,
  `for_date_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Langue`
--

CREATE TABLE `T_Langue` (
  `lan_id` int(11) NOT NULL,
  `lan_nom` varchar(100) NOT NULL,
  `lan_niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Langue_Chercheur_Emploi`
--

CREATE TABLE `T_Langue_Chercheur_Emploi` (
  `lce_id` bigint(20) NOT NULL,
  `lce_langue` int(11) NOT NULL,
  `lce_chercheur_emploi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Niveau`
--

CREATE TABLE `T_Niveau` (
  `niv_id` int(11) NOT NULL,
  `niv_libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Notification`
--

CREATE TABLE `T_Notification` (
  `not_id` int(11) NOT NULL,
  `not_libelle` varchar(100) NOT NULL,
  `not_lecture` tinyint(1) NOT NULL COMMENT '0 pas lu / 1 lu',
  `not_offre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Offre`
--

CREATE TABLE `T_Offre` (
  `off_id` int(11) NOT NULL,
  `off_intitule` varchar(100) NOT NULL,
  `off_ville` int(11) NOT NULL,
  `off_cp_ville` int(11) NOT NULL,
  `off_date_prise_poste` date NOT NULL,
  `off_salaire` int(11) NOT NULL,
  `off_duree` int(11) NOT NULL,
  `off_secteur_activite` int(11) NOT NULL,
  `off_entreprise` int(11) NOT NULL,
  `off_descriptif` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Structure de la table `T_Permis`
--

CREATE TABLE `T_Permis` (
  `per_id` int(11) NOT NULL,
  `per_libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Permis_Chercheur_Emploi`
--

CREATE TABLE `T_Permis_Chercheur_Emploi` (
  `pce_id` bigint(20) NOT NULL,
  `pce_permis` int(11) NOT NULL,
  `pce_chercheur_emploi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Poste`
--

CREATE TABLE `T_Poste` (
  `pos_id` int(11) NOT NULL,
  `pos_libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Region`
--

CREATE TABLE `T_Region` (
  `reg_id` int(11) NOT NULL,
  `reg_nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Reseaux`
--

CREATE TABLE `T_Reseaux` (
  `res_id` int(11) NOT NULL,
  `res_libelle` varchar(100) NOT NULL,
  `res_chemin_logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Reseau_Chercheur_Emploi`
--

CREATE TABLE `T_Reseau_Chercheur_Emploi` (
  `rce_id` bigint(20) NOT NULL,
  `rce_reseau` int(11) NOT NULL,
  `rce_chercheur_emploi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Salaire`
--

CREATE TABLE `T_Salaire` (
  `sal_id` int(11) NOT NULL,
  `sal_libelle` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Secteur_Activite`
--

CREATE TABLE `T_Secteur_Activite` (
  `sea_id` int(11) NOT NULL,
  `sea_libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Statut_Juridique`
--

CREATE TABLE `T_Statut_Juridique` (
  `stj_id` int(11) NOT NULL,
  `stj_libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Type_Contrat`
--

CREATE TABLE `T_Type_Contrat` (
  `tco_id` int(11) NOT NULL,
  `tco_libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Structure de la table `T_Ville`
--

CREATE TABLE `T_Ville` (
  `vil_id` int(11) NOT NULL,
  `vil_nom` varchar(100) NOT NULL,
  `vil_code_postal` int(11) NOT NULL,
  `vil_departement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `T_Candidature`
--
ALTER TABLE `T_Candidature`
  ADD PRIMARY KEY (`can_id`),
  ADD KEY `can_user` (`can_user`),
  ADD KEY `can_offre` (`can_offre`);

--
-- Index pour la table `T_Centre_Interet`
--
ALTER TABLE `T_Centre_Interet`
  ADD PRIMARY KEY (`cei_id`),
  ADD KEY `id_user` (`cei_user`);

--
-- Index pour la table `T_Chercheur_Emploi`
--
ALTER TABLE `T_Chercheur_Emploi`
  ADD PRIMARY KEY (`che_id`),
  ADD KEY `T_Chercheur_Emploi_FK` (`che_ville`),
  ADD KEY `T_Chercheur_Emploi_FK_1` (`che_user`);

--
-- Index pour la table `T_Competence`
--
ALTER TABLE `T_Competence`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `T_Competence_FK` (`com_niveau`);

--
-- Index pour la table `T_Competence_Chercheur_Emploi`
--
ALTER TABLE `T_Competence_Chercheur_Emploi`
  ADD PRIMARY KEY (`cce_id`),
  ADD KEY `T_Competence_Chercheur_Emploi_FK` (`cce_chercheur_emploi`),
  ADD KEY `cce_competence` (`cce_competence`,`cce_chercheur_emploi`) USING BTREE;

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
  ADD KEY `T_CV_FK` (`cv_chercheur_emploi`);

--
-- Index pour la table `T_Departement`
--
ALTER TABLE `T_Departement`
  ADD PRIMARY KEY (`dep_id`),
  ADD KEY `T_Departement_FK` (`dep_region`);

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
  ADD KEY `ent_user` (`ent_user`);

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
  ADD KEY `T_Experience_FK` (`exp_ville`);

--
-- Index pour la table `T_Experience_Pro_Chercheur_Emploi`
--
ALTER TABLE `T_Experience_Pro_Chercheur_Emploi`
  ADD PRIMARY KEY (`ece_id`),
  ADD KEY `exp_id` (`ece_experience`),
  ADD KEY `usr_id` (`ece_user`);

--
-- Index pour la table `T_Favori_Chercheur_Emploi`
--
ALTER TABLE `T_Favori_Chercheur_Emploi`
  ADD PRIMARY KEY (`fce_id`),
  ADD KEY `fce_offre` (`fce_offre`),
  ADD KEY `fce_user` (`fce_user`);

--
-- Index pour la table `T_Formation`
--
ALTER TABLE `T_Formation`
  ADD PRIMARY KEY (`for_id`),
  ADD KEY `T_Formation_FK` (`for_ville`);

--
-- Index pour la table `T_Langue`
--
ALTER TABLE `T_Langue`
  ADD PRIMARY KEY (`lan_id`),
  ADD KEY `T_Langue_FK` (`lan_niveau`);

--
-- Index pour la table `T_Langue_Chercheur_Emploi`
--
ALTER TABLE `T_Langue_Chercheur_Emploi`
  ADD PRIMARY KEY (`lce_id`),
  ADD KEY `T_Langue_Chercheur_Emploi_FK` (`lce_chercheur_emploi`),
  ADD KEY `lce_langue` (`lce_langue`,`lce_chercheur_emploi`) USING BTREE;

--
-- Index pour la table `T_Niveau`
--
ALTER TABLE `T_Niveau`
  ADD PRIMARY KEY (`niv_id`);

--
-- Index pour la table `T_Notification`
--
ALTER TABLE `T_Notification`
  ADD PRIMARY KEY (`not_id`),
  ADD KEY `not_offre` (`not_offre`);

--
-- Index pour la table `T_Offre`
--
ALTER TABLE `T_Offre`
  ADD PRIMARY KEY (`off_id`);

--
-- Index pour la table `T_Offre_Poste`
--
ALTER TABLE `T_Offre_Poste`
  ADD PRIMARY KEY (`ofp_id`),
  ADD KEY `id_poste` (`ofp_poste`),
  ADD KEY `id_offre2` (`ofp_offre`);

--
-- Index pour la table `T_Permis`
--
ALTER TABLE `T_Permis`
  ADD PRIMARY KEY (`per_id`);

--
-- Index pour la table `T_Permis_Chercheur_Emploi`
--
ALTER TABLE `T_Permis_Chercheur_Emploi`
  ADD PRIMARY KEY (`pce_id`),
  ADD KEY `T_Permis_Chercheur_Emploi_FK` (`pce_chercheur_emploi`),
  ADD KEY `pce_permis` (`pce_permis`,`pce_chercheur_emploi`) USING BTREE;

--
-- Index pour la table `T_Poste`
--
ALTER TABLE `T_Poste`
  ADD PRIMARY KEY (`pos_id`);

--
-- Index pour la table `T_Region`
--
ALTER TABLE `T_Region`
  ADD PRIMARY KEY (`reg_id`);

--
-- Index pour la table `T_Reseaux`
--
ALTER TABLE `T_Reseaux`
  ADD PRIMARY KEY (`res_id`);

--
-- Index pour la table `T_Reseau_Chercheur_Emploi`
--
ALTER TABLE `T_Reseau_Chercheur_Emploi`
  ADD PRIMARY KEY (`rce_id`),
  ADD KEY `T_Reseau_Chercheur_Emploi_FK` (`rce_chercheur_emploi`),
  ADD KEY `rce_reseau` (`rce_reseau`,`rce_chercheur_emploi`) USING BTREE;

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
-- Index pour la table `T_Statut_Juridique`
--
ALTER TABLE `T_Statut_Juridique`
  ADD PRIMARY KEY (`stj_id`);

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
  ADD KEY `T_Ville_FK` (`vil_departement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `T_Candidature`
--
ALTER TABLE `T_Candidature`
  MODIFY `can_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Centre_Interet`
--
ALTER TABLE `T_Centre_Interet`
  MODIFY `cei_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Chercheur_Emploi`
--
ALTER TABLE `T_Chercheur_Emploi`
  MODIFY `che_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Competence`
--
ALTER TABLE `T_Competence`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Competence_Chercheur_Emploi`
--
ALTER TABLE `T_Competence_Chercheur_Emploi`
  MODIFY `cce_id` bigint(20) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT pour la table `T_Departement`
--
ALTER TABLE `T_Departement`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Entreprise`
--
ALTER TABLE `T_Entreprise`
  MODIFY `ent_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Entretien`
--
ALTER TABLE `T_Entretien`
  MODIFY `ent_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT pour la table `T_Experience_Pro_Chercheur_Emploi`
--
ALTER TABLE `T_Experience_Pro_Chercheur_Emploi`
  MODIFY `ece_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Favori_Chercheur_Emploi`
--
ALTER TABLE `T_Favori_Chercheur_Emploi`
  MODIFY `fce_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Formation`
--
ALTER TABLE `T_Formation`
  MODIFY `for_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Langue`
--
ALTER TABLE `T_Langue`
  MODIFY `lan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Langue_Chercheur_Emploi`
--
ALTER TABLE `T_Langue_Chercheur_Emploi`
  MODIFY `lce_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Niveau`
--
ALTER TABLE `T_Niveau`
  MODIFY `niv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Notification`
--
ALTER TABLE `T_Notification`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Offre`
--
ALTER TABLE `T_Offre`
  MODIFY `off_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Offre_Poste`
--
ALTER TABLE `T_Offre_Poste`
  MODIFY `ofp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Permis`
--
ALTER TABLE `T_Permis`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Permis_Chercheur_Emploi`
--
ALTER TABLE `T_Permis_Chercheur_Emploi`
  MODIFY `pce_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Poste`
--
ALTER TABLE `T_Poste`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Region`
--
ALTER TABLE `T_Region`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Reseaux`
--
ALTER TABLE `T_Reseaux`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Reseau_Chercheur_Emploi`
--
ALTER TABLE `T_Reseau_Chercheur_Emploi`
  MODIFY `rce_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Salaire`
--
ALTER TABLE `T_Salaire`
  MODIFY `sal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Secteur_Activite`
--
ALTER TABLE `T_Secteur_Activite`
  MODIFY `sea_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Statut_Juridique`
--
ALTER TABLE `T_Statut_Juridique`
  MODIFY `stj_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Type_Contrat`
--
ALTER TABLE `T_Type_Contrat`
  MODIFY `tco_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_User`
--
ALTER TABLE `T_User`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Ville`
--
ALTER TABLE `T_Ville`
  MODIFY `vil_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `T_Candidature`
--
ALTER TABLE `T_Candidature`
  ADD CONSTRAINT `can_offre` FOREIGN KEY (`can_offre`) REFERENCES `T_Offre` (`off_id`),
  ADD CONSTRAINT `can_user` FOREIGN KEY (`can_user`) REFERENCES `T_User` (`usr_id`);

--
-- Contraintes pour la table `T_Centre_Interet`
--
ALTER TABLE `T_Centre_Interet`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`cei_user`) REFERENCES `T_User` (`usr_id`);

--
-- Contraintes pour la table `T_Chercheur_Emploi`
--
ALTER TABLE `T_Chercheur_Emploi`
  ADD CONSTRAINT `T_Chercheur_Emploi_FK` FOREIGN KEY (`che_ville`) REFERENCES `T_Ville` (`vil_id`),
  ADD CONSTRAINT `T_Chercheur_Emploi_FK_1` FOREIGN KEY (`che_user`) REFERENCES `T_User` (`usr_id`);

--
-- Contraintes pour la table `T_Competence`
--
ALTER TABLE `T_Competence`
  ADD CONSTRAINT `T_Competence_FK` FOREIGN KEY (`com_niveau`) REFERENCES `T_Niveau` (`niv_id`);

--
-- Contraintes pour la table `T_Competence_Chercheur_Emploi`
--
ALTER TABLE `T_Competence_Chercheur_Emploi`
  ADD CONSTRAINT `T_Competence_Chercheur_Emploi_FK` FOREIGN KEY (`cce_chercheur_emploi`) REFERENCES `T_Chercheur_Emploi` (`che_id`),
  ADD CONSTRAINT `T_Competence_Chercheur_Emploi_FK_1` FOREIGN KEY (`cce_competence`) REFERENCES `T_Competence` (`com_id`);

--
-- Contraintes pour la table `T_Competence_Offre`
--
ALTER TABLE `T_Competence_Offre`
  ADD CONSTRAINT `id_competence` FOREIGN KEY (`coo_competence`) REFERENCES `T_Competence` (`com_id`),
  ADD CONSTRAINT `id_offre` FOREIGN KEY (`coo_offre`) REFERENCES `T_Offre` (`off_id`);

--
-- Contraintes pour la table `T_CV`
--
ALTER TABLE `T_CV`
  ADD CONSTRAINT `T_CV_FK` FOREIGN KEY (`cv_chercheur_emploi`) REFERENCES `T_Chercheur_Emploi` (`che_id`);

--
-- Contraintes pour la table `T_Departement`
--
ALTER TABLE `T_Departement`
  ADD CONSTRAINT `T_Departement_FK` FOREIGN KEY (`dep_region`) REFERENCES `T_Region` (`reg_id`);

--
-- Contraintes pour la table `T_Entreprise`
--
ALTER TABLE `T_Entreprise`
  ADD CONSTRAINT `T_Entreprise_FK` FOREIGN KEY (`ent_statut`) REFERENCES `T_Statut_Juridique` (`stj_id`),
  ADD CONSTRAINT `T_Entreprise_FK_1` FOREIGN KEY (`ent_ville`) REFERENCES `T_Ville` (`vil_id`),
  ADD CONSTRAINT `T_Entreprise_FK_2` FOREIGN KEY (`ent_secteur_activite`) REFERENCES `T_Secteur_Activite` (`sea_id`),
  ADD CONSTRAINT `T_Entreprise_FK_3` FOREIGN KEY (`ent_user`) REFERENCES `T_User` (`usr_id`);

--
-- Contraintes pour la table `T_Entretien`
--
ALTER TABLE `T_Entretien`
  ADD CONSTRAINT `ent_offre` FOREIGN KEY (`ent_offre`) REFERENCES `T_Offre` (`off_id`),
  ADD CONSTRAINT `ent_user` FOREIGN KEY (`ent_user`) REFERENCES `T_User` (`usr_id`);

--
-- Contraintes pour la table `T_Experience_Pro`
--
ALTER TABLE `T_Experience_Pro`
  ADD CONSTRAINT `T_Experience_FK` FOREIGN KEY (`exp_ville`) REFERENCES `T_Ville` (`vil_id`);

--
-- Contraintes pour la table `T_Experience_Pro_Chercheur_Emploi`
--
ALTER TABLE `T_Experience_Pro_Chercheur_Emploi`
  ADD CONSTRAINT `exp_id` FOREIGN KEY (`ece_experience`) REFERENCES `T_Experience` (`exp_id`),
  ADD CONSTRAINT `usr_id` FOREIGN KEY (`ece_user`) REFERENCES `T_User` (`usr_id`);

--
-- Contraintes pour la table `T_Favori_Chercheur_Emploi`
--
ALTER TABLE `T_Favori_Chercheur_Emploi`
  ADD CONSTRAINT `fce_offre` FOREIGN KEY (`fce_offre`) REFERENCES `T_Offre` (`off_id`),
  ADD CONSTRAINT `fce_user` FOREIGN KEY (`fce_user`) REFERENCES `T_User` (`usr_id`);

--
-- Contraintes pour la table `T_Formation`
--
ALTER TABLE `T_Formation`
  ADD CONSTRAINT `T_Formation_FK` FOREIGN KEY (`for_ville`) REFERENCES `T_Ville` (`vil_id`);

--
-- Contraintes pour la table `T_Langue`
--
ALTER TABLE `T_Langue`
  ADD CONSTRAINT `T_Langue_FK` FOREIGN KEY (`lan_niveau`) REFERENCES `T_Niveau` (`niv_id`);

--
-- Contraintes pour la table `T_Langue_Chercheur_Emploi`
--
ALTER TABLE `T_Langue_Chercheur_Emploi`
  ADD CONSTRAINT `T_Langue_Chercheur_Emploi_FK` FOREIGN KEY (`lce_chercheur_emploi`) REFERENCES `T_Chercheur_Emploi` (`che_id`),
  ADD CONSTRAINT `T_Langue_Chercheur_Emploi_FK_1` FOREIGN KEY (`lce_langue`) REFERENCES `T_Langue` (`lan_id`);

--
-- Contraintes pour la table `T_Notification`
--
ALTER TABLE `T_Notification`
  ADD CONSTRAINT `not_offre` FOREIGN KEY (`not_offre`) REFERENCES `T_Offre` (`off_id`);

--
-- Contraintes pour la table `T_Offre_Poste`
--
ALTER TABLE `T_Offre_Poste`
  ADD CONSTRAINT `id_offre2` FOREIGN KEY (`ofp_offre`) REFERENCES `T_Offre` (`off_id`),
  ADD CONSTRAINT `id_poste` FOREIGN KEY (`ofp_poste`) REFERENCES `T_Poste` (`pos_id`);

--
-- Contraintes pour la table `T_Permis_Chercheur_Emploi`
--
ALTER TABLE `T_Permis_Chercheur_Emploi`
  ADD CONSTRAINT `T_Permis_Chercheur_Emploi_FK` FOREIGN KEY (`pce_chercheur_emploi`) REFERENCES `T_Chercheur_Emploi` (`che_id`),
  ADD CONSTRAINT `T_Permis_Chercheur_Emploi_FK_1` FOREIGN KEY (`pce_permis`) REFERENCES `T_Permis` (`per_id`);

--
-- Contraintes pour la table `T_Reseau_Chercheur_Emploi`
--
ALTER TABLE `T_Reseau_Chercheur_Emploi`
  ADD CONSTRAINT `T_Reseau_Chercheur_Emploi_FK` FOREIGN KEY (`rce_chercheur_emploi`) REFERENCES `T_Chercheur_Emploi` (`che_id`),
  ADD CONSTRAINT `T_Reseau_Chercheur_Emploi_FK_1` FOREIGN KEY (`rce_reseau`) REFERENCES `T_Reseaux` (`res_id`);

--
-- Contraintes pour la table `T_Ville`
--
ALTER TABLE `T_Ville`
  ADD CONSTRAINT `T_Ville_FK` FOREIGN KEY (`vil_departement`) REFERENCES `T_Departement` (`dep_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
