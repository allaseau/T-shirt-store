-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 30 mai 2022 à 20:46
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
-- Base de données : `t-shirt store`
--
CREATE DATABASE IF NOT EXISTS `t-shirt store` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `t-shirt store`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Createur` varchar(255) NOT NULL,
  `Date_crea` date NOT NULL,
  `Img` varchar(255) NOT NULL,
  `Prix` float(11,2) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Categorie_ID` int(11) NOT NULL,
  `Description` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `CAT_ID` (`Categorie_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`ID`, `Nom`, `Createur`, `Date_crea`, `Img`, `Prix`, `Stock`, `Categorie_ID`, `Description`) VALUES
(1, 'Run CMD', 'Allaseau', '2022-05-10', './uploads/geek1.png', 15.00, 50, 1, 'T-shirt imprimé pour les fans de code'),
(2, 'If', 'Allaseau', '2022-01-09', './uploads/geek2.png', 15.00, 50, 1, 'T-shirt imprimé pour les fans de code'),
(3, 'Error', 'Allaseau', '2022-02-14', './uploads/geek3.png', 15.00, 50, 1, 'T-shirt imprimé pour les fans de code'),
(4, 'Loading', 'Allaseau', '2022-02-13', './uploads/geek4.png', 15.00, 50, 1, 'T-shirt imprimé pour les fans de code'),
(5, 'KeepCalm', 'Allaseau', '2022-02-21', './uploads/geek5.png', 15.00, 50, 1, 'T-shirt imprimé pour les fans de code'),
(6, 'Codeworks', 'Allaseau', '2022-03-03', './uploads/geek6.png', 15.00, 50, 1, 'T-shirt imprimé pour les fans de code'),
(7, 'Elements', 'Allaseau', '2022-03-28', './uploads/geek7.png', 15.00, 50, 1, 'T-shirt imprimé pour les fans de science'),
(8, 'Potter', 'Littlelina', '2022-03-30', './uploads/cine1.png', 15.00, 50, 2, 'T-shirt imprimé pour les fans de Harry Potter'),
(9, 'Mandalorian', 'Littlelina', '2022-01-07', './uploads/cine2.png', 15.00, 50, 2, 'T-shirt imprimé pour les fans de Star Wars'),
(10, 'Popcorn', 'Littlelina', '2022-02-11', './uploads/cine3.png', 15.00, 50, 2, 'T-shirt imprimé pour les fans de cinéma'),
(11, 'Futur', 'Littlelina', '2022-04-24', './uploads/cine4.png', 15.00, 50, 2, 'T-shirt imprimé pour les fans de Retour vers le futur'),
(12, 'Mafia', 'Littlelina', '2022-05-08', './uploads/cine5.png', 15.00, 50, 2, 'T-shirt imprimé pour les fans de Mafia'),
(13, 'Hug', 'Bulck', '2022-02-02', './uploads/fun1.png', 15.00, 50, 3, 'T-shirt imprimé pour les fans de calins'),
(14, 'Chargement', 'Bulck', '2022-03-16', './uploads/fun2.png', 15.00, 50, 3, 'T-shirt imprimé pour les fans d\'humour'),
(15, 'Monday', 'Bulck', '2022-04-22', './uploads/fun3.png', 15.00, 50, 3, 'T-shirt imprimé pour les fans d\'art'),
(16, 'Math', 'Bulck', '2022-04-29', './uploads/fun4.png', 15.00, 50, 3, 'T-shirt imprimé pour les fans de math'),
(17, 'Science', 'Bulck', '2022-05-05', './uploads/fun5.png', 15.00, 50, 3, 'T-shirt imprimé pour les fans de science');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`ID`, `Nom`) VALUES
(1, 'Geek'),
(2, 'Cinéma'),
(3, 'Fun');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date_commande` datetime NOT NULL,
  `Mail` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commande_article`
--

DROP TABLE IF EXISTS `commande_article`;
CREATE TABLE IF NOT EXISTS `commande_article` (
  `ID_commande` int(11) NOT NULL,
  `ID_article` int(11) NOT NULL,
  `Modele` varchar(50) NOT NULL,
  `Taille` varchar(50) NOT NULL,
  `Quantite` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `message` text NOT NULL,
  `date_envoi` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`ID`, `nom`, `email`, `phone`, `message`, `date_envoi`) VALUES
(1, 'test', 'test@mail.com', '012345678', 'rewq', '2022-05-30 22:32:05'),
(2, 'test', 'test@mail.com', '012345678', 'rewq2', '2022-05-30 20:32:01'),
(3, 'test3', 'test@mail.com', '012345678', 'rewq2', '2022-05-30 20:32:33');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Adresse_mail` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID`, `Nom`, `Prenom`, `Adresse_mail`, `Password`) VALUES
(1, 'Allart', 'Dylan', 'testco@hotmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
(2, 'Snijkers', 'Aurore', 'titchat@hotmail.com', '38083c7ee9121e17401883566a148aa5c2e2d55dc53bc4a94a026517dbff3c6b'),
(3, 'Bulck', 'Cédric', 'bulck@hotmail.com', 'ceaa28bba4caba687dc31b1bbe79eca3c70c33f871f1ce8f528cf9ab5cfd76dd');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `CAT_ID` FOREIGN KEY (`Categorie_ID`) REFERENCES `categorie` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
