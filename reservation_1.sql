-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 22 Décembre 2016 à 10:56
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `reservation_1`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `lastname` char(20) NOT NULL,
  `age` char(20) NOT NULL,
  `Insurance` char(20) NOT NULL,
  `destination` char(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reservation_2`
--

CREATE TABLE `reservation_2` (
  `lastname` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `insurance` char(10) NOT NULL,
  `destination` varchar(20) NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reservation_2`
--

INSERT INTO `reservation_2` (`lastname`, `age`, `insurance`, `destination`, `ID`) VALUES
('blalalala', 22, 'non', 'paro', 10),
('rt', 22, 'oui', 'het56', 11),
('zschau', 2, 'non', 'londre', 12),
('zschau', 22, 'non', 'paris', 14),
('johan', 2, 'non', 'paris', 15),
('azertyu', 22, 'non', 'paris', 39),
('sarah', 21, 'non', 'Rome', 40),
('zs', 22, 'non', 'paris', 41),
('zss', 22, 'non', 'paris', 42);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `reservation_2`
--
ALTER TABLE `reservation_2`
  ADD UNIQUE KEY `az` (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `reservation_2`
--
ALTER TABLE `reservation_2`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
