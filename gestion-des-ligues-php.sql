-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 05 sep. 2022 à 15:44
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion-des-ligues-php`
--

-- --------------------------------------------------------

--
-- Structure de la table `gdl_php_ligue`
--

CREATE TABLE `gdl_php_ligue` (
  `idLigue` int(11) NOT NULL,
  `ligue` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gdl_php_ligue`
--

INSERT INTO `gdl_php_ligue` (`idLigue`, `ligue`) VALUES
(1, 'Football'),
(3, 'VolleyBall'),
(4, 'Cyclisme'),
(5, 'Natation'),
(6, 'Natation synchronisée'),
(7, 'Tir à l\'arc');

-- --------------------------------------------------------

--
-- Structure de la table `gdl_php_user`
--

CREATE TABLE `gdl_php_user` (
  `idUtilisateur` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `mail` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `idLigue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gdl_php_user`
--

INSERT INTO `gdl_php_user` (`idUtilisateur`, `nom`, `prenom`, `mail`, `password`, `admin`, `idLigue`) VALUES
(1, 'RENIER', 'Laurent', 'laurent@mail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `gdl_php_ligue`
--
ALTER TABLE `gdl_php_ligue`
  ADD PRIMARY KEY (`idLigue`);

--
-- Index pour la table `gdl_php_user`
--
ALTER TABLE `gdl_php_user`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD KEY `FK_user_idLigue` (`idLigue`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `gdl_php_ligue`
--
ALTER TABLE `gdl_php_ligue`
  MODIFY `idLigue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `gdl_php_user`
--
ALTER TABLE `gdl_php_user`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `gdl_php_user`
--
ALTER TABLE `gdl_php_user`
  ADD CONSTRAINT `FK_user_idLigue` FOREIGN KEY (`idLigue`) REFERENCES `gdl_php_ligue` (`idLigue`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
