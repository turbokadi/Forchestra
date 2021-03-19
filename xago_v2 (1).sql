-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 14 mars 2021 à 14:46
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `xago_v2`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

DROP TABLE IF EXISTS `appartenir`;
CREATE TABLE IF NOT EXISTS `appartenir` (
  `ID_stagiaire` int(11) NOT NULL,
  `Num_Entite` int(11) NOT NULL,
  `Fonction` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_stagiaire`,`Num_Entite`),
  KEY `Appartenir_Entite0_FK` (`Num_Entite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `bilan_pedago`
--

DROP TABLE IF EXISTS `bilan_pedago`;
CREATE TABLE IF NOT EXISTS `bilan_pedago` (
  `num_bilan` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`num_bilan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `ID_client` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_organisme` varchar(100) NOT NULL,
  `Nom_contact_formation` varchar(100) NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `Telephone` varchar(50) NOT NULL,
  `Nom_contact_RH` varchar(50) NOT NULL,
  `Nom_contact_compta` varchar(50) NOT NULL,
  `Client_actif` varchar(10) NOT NULL,
  `ASEI` varchar(50) NOT NULL,
  `Code_client` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_client`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`ID_client`, `Nom_organisme`, `Nom_contact_formation`, `Adresse`, `Telephone`, `Nom_contact_RH`, `Nom_contact_compta`, `Client_actif`, `ASEI`, `Code_client`) VALUES
(1, 'Université Jean Jaures', 'Taoufiq Dkaki', 'Sud de toulouse', '06', 'Diakité', 'Angélique', 'Oh oui', 'Non', 'MMPasMal'),
(2, 'S.A.R.L Xago', 'Mélanie Boury', 'Sud de toulouse', '06', 'Mourad Boulkroune', 'Shupu Liu', 'Oui', 'Non', 'CPasMal07'),
(3, 'U.S.S Enterprise', 'Chekov Pavel ', 'Port de Toulouse', 'y a pas ', 'Nyota Uhura', 'Kirk, James T.', 'Non', 'Non', 'Dead/20');

-- --------------------------------------------------------

--
-- Structure de la table `cout`
--

DROP TABLE IF EXISTS `cout`;
CREATE TABLE IF NOT EXISTS `cout` (
  `Num_Facture` int(11) NOT NULL AUTO_INCREMENT,
  `Frais_pedago` int(11) NOT NULL,
  `Quantite_pedago` int(11) NOT NULL,
  `Frais_deplacement` int(11) NOT NULL,
  `Quantite_deplacement` int(11) NOT NULL,
  `Frais_heber` int(11) NOT NULL,
  `Quantite_heber` int(11) NOT NULL,
  `Cout_support_tech` int(11) NOT NULL,
  `Quantite_support_tech` int(11) NOT NULL,
  `Cout__Salle` int(11) NOT NULL,
  `Quantite_salle` int(11) NOT NULL,
  `Remise_exp` int(11) NOT NULL,
  PRIMARY KEY (`Num_Facture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `employer_fd`
--

DROP TABLE IF EXISTS `employer_fd`;
CREATE TABLE IF NOT EXISTS `employer_fd` (
  `Id_emploi` int(11) NOT NULL AUTO_INCREMENT,
  `emploi_actif` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_emploi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employer_fd`
--

INSERT INTO `employer_fd` (`Id_emploi`, `emploi_actif`) VALUES
(1, 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `entite`
--

DROP TABLE IF EXISTS `entite`;
CREATE TABLE IF NOT EXISTS `entite` (
  `Num_Entite` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_entite` varchar(50) NOT NULL,
  `Telephone` varchar(50) NOT NULL,
  `Adresse` varchar(10) NOT NULL,
  PRIMARY KEY (`Num_Entite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--

DROP TABLE IF EXISTS `formateur`;
CREATE TABLE IF NOT EXISTS `formateur` (
  `ID_Formateur` int(11) NOT NULL AUTO_INCREMENT,
  `Code_formateur` varchar(50) NOT NULL,
  `Forma_actif` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_Formateur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formateur`
--

INSERT INTO `formateur` (`ID_Formateur`, `Code_formateur`, `Forma_actif`) VALUES
(1, '1', 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `Num_Formation` int(11) NOT NULL AUTO_INCREMENT,
  `Code_Formation` varchar(50) NOT NULL,
  `Intitule` varchar(100) NOT NULL,
  `Objectif_pedago` varchar(100) NOT NULL,
  `formation_Actif` varchar(5) NOT NULL,
  PRIMARY KEY (`Num_Formation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `info_employer_fd`
--

DROP TABLE IF EXISTS `info_employer_fd`;
CREATE TABLE IF NOT EXISTS `info_employer_fd` (
  `Id_info_emploi` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `tel_pro` varchar(50) NOT NULL,
  `mail_pro` varchar(50) NOT NULL,
  `Identifiant` varchar(50) NOT NULL,
  `MDP` varchar(50) NOT NULL,
  `Id_emploi` int(11) NOT NULL,
  PRIMARY KEY (`Id_info_emploi`),
  KEY `Info_employer_FD_Employer_FD_FK` (`Id_emploi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `info_employer_fd`
--

INSERT INTO `info_employer_fd` (`Id_info_emploi`, `Nom`, `Prenom`, `tel_pro`, `mail_pro`, `Identifiant`, `MDP`, `Id_emploi`) VALUES
(1, 'Charles', 'Alexandre', '06', 'cc', 'alexou', 'calexou', 1);

-- --------------------------------------------------------

--
-- Structure de la table `info_formateur`
--

DROP TABLE IF EXISTS `info_formateur`;
CREATE TABLE IF NOT EXISTS `info_formateur` (
  `Num_info_Formateur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `ID_Formateur` int(11) NOT NULL,
  PRIMARY KEY (`Num_info_Formateur`),
  KEY `Info_Formateur_Formateur_FK` (`ID_Formateur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `info_formateur`
--

INSERT INTO `info_formateur` (`Num_info_Formateur`, `Nom`, `Prenom`, `ID_Formateur`) VALUES
(1, 'Diakité', 'Madié', 1);

-- --------------------------------------------------------

--
-- Structure de la table `info_stagiaire`
--

DROP TABLE IF EXISTS `info_stagiaire`;
CREATE TABLE IF NOT EXISTS `info_stagiaire` (
  `num_info_stagiaire` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `mail_pro` varchar(50) NOT NULL,
  `tel_pro` varchar(50) NOT NULL,
  `ID_stagiaire` int(11) NOT NULL,
  PRIMARY KEY (`num_info_stagiaire`),
  KEY `Info_stagiaire_Stagiaire_FK` (`ID_stagiaire`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `info_stagiaire`
--

INSERT INTO `info_stagiaire` (`num_info_stagiaire`, `Nom`, `Prenom`, `mail_pro`, `tel_pro`, `ID_stagiaire`) VALUES
(1, 'Charles', 'Alexandre', 'charles.alexandre.080@gmail.com', '06', 3);

-- --------------------------------------------------------

--
-- Structure de la table `jour`
--

DROP TABLE IF EXISTS `jour`;
CREATE TABLE IF NOT EXISTS `jour` (
  `code_jour` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `repas` varchar(50) NOT NULL,
  `nb_heures` float NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  PRIMARY KEY (`code_jour`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

DROP TABLE IF EXISTS `lieu`;
CREATE TABLE IF NOT EXISTS `lieu` (
  `ID_lieu` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_lieu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `localisation`
--

DROP TABLE IF EXISTS `localisation`;
CREATE TABLE IF NOT EXISTS `localisation` (
  `Id_salle` int(11) NOT NULL,
  `ID_lieu` int(11) NOT NULL,
  `virtuel` varchar(10) NOT NULL,
  `date_debut` varchar(50) NOT NULL,
  `date_fin` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_salle`,`ID_lieu`),
  KEY `Localisation_Lieu0_FK` (`ID_lieu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `ID_Module` int(11) NOT NULL AUTO_INCREMENT,
  `code_module` varchar(50) NOT NULL,
  `Intitule_mod` varchar(100) NOT NULL,
  `Num_Formation` int(11) NOT NULL,
  PRIMARY KEY (`ID_Module`),
  KEY `Module_Formation_FK` (`Num_Formation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `payer`
--

DROP TABLE IF EXISTS `payer`;
CREATE TABLE IF NOT EXISTS `payer` (
  `ID_Session` int(11) NOT NULL,
  `ID_client` int(11) NOT NULL,
  `ID_stagiaire` int(11) NOT NULL,
  `Num_Facture` int(11) NOT NULL,
  `Num_Entite` int(11) NOT NULL,
  PRIMARY KEY (`ID_Session`,`ID_client`,`ID_stagiaire`,`Num_Facture`,`Num_Entite`),
  KEY `Payer_Client0_FK` (`ID_client`),
  KEY `Payer_Stagiaire1_FK` (`ID_stagiaire`),
  KEY `Payer_Cout2_FK` (`Num_Facture`),
  KEY `Payer_Entite3_FK` (`Num_Entite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `planification`
--

DROP TABLE IF EXISTS `planification`;
CREATE TABLE IF NOT EXISTS `planification` (
  `ID_Session` int(11) NOT NULL,
  `ID_stagiaire` int(11) NOT NULL,
  `ID_Formateur` int(11) NOT NULL,
  `code_jour` int(11) NOT NULL,
  `ID_lieu` int(11) NOT NULL,
  `Formateur_ref` varchar(50) NOT NULL,
  `presence_am` varchar(10) NOT NULL,
  `presence_pm` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_Session`,`ID_stagiaire`,`ID_Formateur`,`code_jour`,`ID_lieu`),
  KEY `Planification_Stagiaire0_FK` (`ID_stagiaire`),
  KEY `Planification_Formateur1_FK` (`ID_Formateur`),
  KEY `Planification_Jour2_FK` (`code_jour`),
  KEY `Planification_Lieu3_FK` (`ID_lieu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `Id_salle` int(11) NOT NULL AUTO_INCREMENT,
  `Capacite` int(11) NOT NULL,
  `Nbr_poste` int(11) NOT NULL,
  `Wifi` varchar(10) NOT NULL,
  `videoprojecteur` varchar(10) NOT NULL,
  `ecran` varchar(10) NOT NULL,
  `paperbord` varchar(10) NOT NULL,
  PRIMARY KEY (`Id_salle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `ID_Session` int(11) NOT NULL AUTO_INCREMENT,
  `code_session` varchar(50) NOT NULL,
  `Debut_Session` date NOT NULL,
  `Fin_Session` date NOT NULL,
  `Responsable_Session` varchar(100) NOT NULL,
  `Nbr_jours_tt` float NOT NULL,
  `Nbr_heures_tt` float NOT NULL,
  `Inter_Intra` varchar(10) NOT NULL,
  `Etat` varchar(50) NOT NULL,
  `Num_Formation` int(11) NOT NULL,
  `Id_emploi` int(11) NOT NULL,
  PRIMARY KEY (`ID_Session`),
  KEY `Session_Formation_FK` (`Num_Formation`),
  KEY `Session_Employer_FD0_FK` (`Id_emploi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `stagiaire`
--

DROP TABLE IF EXISTS `stagiaire`;
CREATE TABLE IF NOT EXISTS `stagiaire` (
  `ID_stagiaire` int(11) NOT NULL AUTO_INCREMENT,
  `Num_Passport` varchar(50) NOT NULL,
  `stagiaire_actif` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_stagiaire`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stagiaire`
--

INSERT INTO `stagiaire` (`ID_stagiaire`, `Num_Passport`, `stagiaire_actif`) VALUES
(1, '213.16', 'oui'),
(2, '213.16', 'oui'),
(3, '213.16', 'oui');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `Appartenir_Entite0_FK` FOREIGN KEY (`Num_Entite`) REFERENCES `entite` (`Num_Entite`),
  ADD CONSTRAINT `Appartenir_Stagiaire_FK` FOREIGN KEY (`ID_stagiaire`) REFERENCES `stagiaire` (`ID_stagiaire`);

--
-- Contraintes pour la table `info_employer_fd`
--
ALTER TABLE `info_employer_fd`
  ADD CONSTRAINT `Info_employer_FD_Employer_FD_FK` FOREIGN KEY (`Id_emploi`) REFERENCES `employer_fd` (`Id_emploi`);

--
-- Contraintes pour la table `info_formateur`
--
ALTER TABLE `info_formateur`
  ADD CONSTRAINT `Info_Formateur_Formateur_FK` FOREIGN KEY (`ID_Formateur`) REFERENCES `formateur` (`ID_Formateur`);

--
-- Contraintes pour la table `info_stagiaire`
--
ALTER TABLE `info_stagiaire`
  ADD CONSTRAINT `Info_stagiaire_Stagiaire_FK` FOREIGN KEY (`ID_stagiaire`) REFERENCES `stagiaire` (`ID_stagiaire`);

--
-- Contraintes pour la table `localisation`
--
ALTER TABLE `localisation`
  ADD CONSTRAINT `Localisation_Lieu0_FK` FOREIGN KEY (`ID_lieu`) REFERENCES `lieu` (`ID_lieu`),
  ADD CONSTRAINT `Localisation_Salle_FK` FOREIGN KEY (`Id_salle`) REFERENCES `salle` (`Id_salle`);

--
-- Contraintes pour la table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `Module_Formation_FK` FOREIGN KEY (`Num_Formation`) REFERENCES `formation` (`Num_Formation`);

--
-- Contraintes pour la table `payer`
--
ALTER TABLE `payer`
  ADD CONSTRAINT `Payer_Client0_FK` FOREIGN KEY (`ID_client`) REFERENCES `client` (`ID_client`),
  ADD CONSTRAINT `Payer_Cout2_FK` FOREIGN KEY (`Num_Facture`) REFERENCES `cout` (`Num_Facture`),
  ADD CONSTRAINT `Payer_Entite3_FK` FOREIGN KEY (`Num_Entite`) REFERENCES `entite` (`Num_Entite`),
  ADD CONSTRAINT `Payer_Session_FK` FOREIGN KEY (`ID_Session`) REFERENCES `session` (`ID_Session`),
  ADD CONSTRAINT `Payer_Stagiaire1_FK` FOREIGN KEY (`ID_stagiaire`) REFERENCES `stagiaire` (`ID_stagiaire`);

--
-- Contraintes pour la table `planification`
--
ALTER TABLE `planification`
  ADD CONSTRAINT `Planification_Formateur1_FK` FOREIGN KEY (`ID_Formateur`) REFERENCES `formateur` (`ID_Formateur`),
  ADD CONSTRAINT `Planification_Jour2_FK` FOREIGN KEY (`code_jour`) REFERENCES `jour` (`code_jour`),
  ADD CONSTRAINT `Planification_Lieu3_FK` FOREIGN KEY (`ID_lieu`) REFERENCES `lieu` (`ID_lieu`),
  ADD CONSTRAINT `Planification_Session_FK` FOREIGN KEY (`ID_Session`) REFERENCES `session` (`ID_Session`),
  ADD CONSTRAINT `Planification_Stagiaire0_FK` FOREIGN KEY (`ID_stagiaire`) REFERENCES `stagiaire` (`ID_stagiaire`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `Session_Employer_FD0_FK` FOREIGN KEY (`Id_emploi`) REFERENCES `employer_fd` (`Id_emploi`),
  ADD CONSTRAINT `Session_Formation_FK` FOREIGN KEY (`Num_Formation`) REFERENCES `formation` (`Num_Formation`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
