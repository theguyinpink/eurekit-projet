-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 20 mars 2024 à 13:18
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eurekit`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `ClientID` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `matricule` varchar(50) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ClientID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`ClientID`, `nom`, `prenom`, `email`, `password`, `telephone`, `matricule`, `adresse`) VALUES
(8, 'test', 'test', 'test@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test', '1', 'test'),
(10, 'Tambone', 'Alexandre', 'alexandre.tambone@gmail.com', '101b8ac74e7013741305380c2c85907b35a0eb99', '0606060606', '2', '7 Avenue Jean Jaures');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `email`, `message`) VALUES
(1, 'Carré', 'Clément', 'clement.carre.prevert.pro@gmail.com', 'Bonjour, j\'adore votre entreprise'),
(2, 'Tambone', 'Alexandre', 'alexandre.tambone@gmail.com', 'Votre entreprise est super'),
(4, 'Zamoun', 'Antoine', 'antoine.zamoun@gmail.com', 'Meilleure entreprise du Monde.'),
(5, 'Berthomieu', 'Ewan', 'ewan.berthomieu@gmail.com', 'Super travail, bravo');

-- --------------------------------------------------------

--
-- Structure de la table `entretien`
--

DROP TABLE IF EXISTS `entretien`;
CREATE TABLE IF NOT EXISTS `entretien` (
  `entretienID` int NOT NULL AUTO_INCREMENT,
  `maintenance_type` varchar(50) DEFAULT NULL,
  `maintenance_date` date DEFAULT NULL,
  `maintenance_cout` decimal(10,2) DEFAULT NULL,
  `kilometrage` int DEFAULT NULL,
  `vehiculeID` int DEFAULT NULL,
  PRIMARY KEY (`entretienID`),
  KEY `vehiculeID` (`vehiculeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `reservationID` int NOT NULL AUTO_INCREMENT,
  `vehiculeID` int DEFAULT NULL,
  `clientID` int DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  PRIMARY KEY (`reservationID`),
  KEY `vehiculeID` (`vehiculeID`),
  KEY `clientID` (`clientID`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`reservationID`, `vehiculeID`, `clientID`, `date_debut`, `date_fin`) VALUES
(78, 1, 10, '2024-02-24', '2024-02-25');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `vehiculeID` int NOT NULL AUTO_INCREMENT,
  `clientID` int DEFAULT NULL,
  `plaque_immatriculation` varchar(20) DEFAULT NULL,
  `marque` varchar(50) DEFAULT NULL,
  `modele` varchar(50) DEFAULT NULL,
  `annee` int DEFAULT NULL,
  `kilometrage` int DEFAULT NULL,
  PRIMARY KEY (`vehiculeID`),
  KEY `clientID` (`clientID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`vehiculeID`, `clientID`, `plaque_immatriculation`, `marque`, `modele`, `annee`, `kilometrage`) VALUES
(1, NULL, 'AA-123-BB', 'Renault', 'Kangoo', 2017, 119101),
(2, NULL, 'AA-123-BC', 'Renault', 'Kangoo', 2017, 119101);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `entretien`
--
ALTER TABLE `entretien`
  ADD CONSTRAINT `entretien_ibfk_1` FOREIGN KEY (`vehiculeID`) REFERENCES `vehicule` (`vehiculeID`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`vehiculeID`) REFERENCES `vehicule` (`vehiculeID`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`clientID`) REFERENCES `client` (`ClientID`);

--
-- Contraintes pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `vehicule_ibfk_1` FOREIGN KEY (`clientID`) REFERENCES `client` (`ClientID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
