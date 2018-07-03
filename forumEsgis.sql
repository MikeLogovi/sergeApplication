-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 27 juin 2018 à 06:47
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forumEsgis`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `matricule` varchar(255) NOT NULL,
  `prenoms` varchar(255) NOT NULL,
  `classe` varchar(255) NOT NULL,
  `dateNaissance` date NOT NULL,
  `numeroTelephone` varchar(255) NOT NULL,
  `photoDeProfil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`matricule`, `prenoms`, `classe`, `dateNaissance`, `numeroTelephone`, `photoDeProfil`) VALUES
('04b9290877a303b88eeb626e8a9f9bafde7c319f', 'Mike', '1ere annee', '1999-06-06', '+22893575268', 'src/public/photo_membre/5c9edc0e0628a459a157802cf0f38a0b94b637bc.jpg'),
('10470c3b4b1fed12c3baac014be15fac67c6e815', 'Kodjo', '1ere annee', '1999-07-06', '+22893575267', 'src/public/photo_membre/da39a3ee5e6b4b0d3255bfef95601890afd80709.png'),
('d8406e8445cc99a16ab984cc28f6931615c766fc', 'Abla', '3eme annee', '2000-08-07', '+22897456321', 'src/public/photo_membre/da39a3ee5e6b4b0d3255bfef95601890afd80709.jpg'),
('6b05e14df7b86cefd47ec43d900a0e03e122cc6e', 'Yala', '3eme annee', '2003-07-08', '+22897969425', 'src/public/photo_membre/da39a3ee5e6b4b0d3255bfef95601890afd80709.jpg'),
('e9f3c674ec905103bead21b636c7e5b6f70f92af', 'Yala', '3eme annee', '2003-07-08', '+22897969425', 'src/public/photo_membre/1bcfddbe79db1cae83932e38f7c034e9799f2d10.jpg'),
('7ac55f0eda41a1d15bfd971ce771f19baf0dbbb2', 'Yala', '3eme annee', '2003-07-08', '+22897969425', 'src/public/photo_membre/1bcfddbe79db1cae83932e38f7c034e9799f2d10.jpg'),
('4847fba7c1dbebf7c2eea7498a17abe576255c62', 'popo', '2eme annee', '1445-08-07', '+22896758214', 'src/public/photo_membre/a7af79c74af54d783916ab83059c1b5301331ece.jpg'),
('aecd82d7f8f28062c94e9682781155dc1f1f818f', 'Kaka', '3eme annee', '1999-06-06', '+22893575654', 'src/public/photo_membre/20812dc121475981831467b21ba9a7ad8c1f8ff2.jpg'),
('1f604490cbdd4ec35cfa681bcf3df8fac26e0cb5', 'anonymous', '2eme annee', '1999-06-06', '+22898989898', 'src/public/photo_membre/anonyme.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `matriculeEtudiant` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `datePublication` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `matriculeEtudiant`, `titre`, `contenu`, `datePublication`) VALUES
(1, '04b9290877a303b88eeb626e8a9f9bafde7c319f', 'Mon nom est Mike', 'Salut tout le monde', '2018-06-26 21:09:07'),
(2, '04b9290877a303b88eeb626e8a9f9bafde7c319f', 'Oh yeah', 'MIKE LE BOSS', '2018-06-26 21:09:51'),
(3, 'aecd82d7f8f28062c94e9682781155dc1f1f818f', 'Un titre', 'Salut', '2018-06-27 04:39:14'),
(5, '04b9290877a303b88eeb626e8a9f9bafde7c319f', 'Un test encore', 'Ok c\'est le boss qui est la', '2018-06-27 05:23:11'),
(12, '1f604490cbdd4ec35cfa681bcf3df8fac26e0cb5', 'Qu\'est ce qu\'il y a ', 'On va le faire', '2018-06-27 06:41:29');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
