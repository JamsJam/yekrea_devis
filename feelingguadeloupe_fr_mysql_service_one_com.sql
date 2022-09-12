-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : feelingguadeloupe.fr.mysql.service.one.com:3306
-- Généré le : ven. 09 sep. 2022 à 18:58
-- Version du serveur : 10.3.35-MariaDB-1:10.3.35+maria~focal
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `feelingguadeloupe_frdevis`
--
CREATE DATABASE IF NOT EXISTS `feelingguadeloupe_frdevis` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `feelingguadeloupe_frdevis`;

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `login`, `pwd`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Structure de la table `assistance`
--

CREATE TABLE `assistance` (
  `id_assistance` int(11) NOT NULL,
  `id_devis` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `num` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `assistance`
--

INSERT INTO `assistance` (`id_assistance`, `id_devis`, `nom`, `prenom`, `num`) VALUES
(60, 41, 'ELELOUE', 'Monica', '0690416097'),
(61, 43, 'ELELOUE', 'Rayan', '0690416097'),
(62, 45, '', '', ''),
(63, 46, '', '', ''),
(65, 49, '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `assurance`
--

CREATE TABLE `assurance` (
  `id_assurance` int(11) NOT NULL,
  `id_devis` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nomcompagnie` varchar(255) NOT NULL,
  `numcontrat` varchar(255) NOT NULL,
  `numtel` varchar(255) NOT NULL,
  `attribution` tinyint(1) NOT NULL,
  `assistance` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `assurance`
--

INSERT INTO `assurance` (`id_assurance`, `id_devis`, `nom`, `prenom`, `nomcompagnie`, `numcontrat`, `numtel`, `attribution`, `assistance`) VALUES
(44, 41, 'ELELOUE', 'Rayan', 'APRIL', '829292', '0690416097', 1, 1),
(46, 43, 'ELELOUE', 'Mélody', 'APRIL', '993939333', '993939333', 0, 1),
(47, 45, '', '', '', '', '', 0, 0),
(48, 46, '', '', '', '', '', 0, 0),
(50, 49, '', '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `tel`, `adresse`, `mail`) VALUES
(41, 'Rayan', 'Eleloue', '0690416097', 'Route de Margalon', 'elelouerayan@gmail.com'),
(42, 'ELELOUE', 'Francky', '', '', ''),
(43, 'ELELOUE', 'Rayan', '0690416097', 'Route de Margalon, Cocoyer Gosier', 'rayaneleloue971@gmail.com'),
(44, 'ELELOUE', 'ezzzésés', '', '', ''),
(45, 'CHRISTOPHE', 'VELIN', '66', '26 CRS NOLIVOS', 'kij@jjj.grt'),
(46, 'Défonceuse', 'VELIN', '06890855', '', 'kdjdsj@jjdjj.fr'),
(47, 'Giroud', 'Sabine', '06 86 66 06 94', '4 rue des Saules.    69210 Lentilly ', 'giroud.sabine@gmail.com'),
(48, 'Perrin', 'Tania ', '', '', ''),
(49, 'Bruneau', 'Denis', '0672398761', '144 champfroid 45310 Gémigny', 'contact@denisbruneau.com');

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE `devis` (
  `id_devis` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `num_devis` varchar(255) NOT NULL,
  `date_devis` varchar(255) NOT NULL,
  `nba` int(11) NOT NULL,
  `tarifa` int(11) NOT NULL,
  `nbe` int(11) NOT NULL,
  `tarife` int(11) NOT NULL,
  `confirmation` varchar(1) NOT NULL,
  `final` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `devis`
--

INSERT INTO `devis` (`id_devis`, `id_client`, `num_devis`, `date_devis`, `nba`, `tarifa`, `nbe`, `tarife`, `confirmation`, `final`) VALUES
(39, 39, '101019', '2022-08-30', 100, 2, 10, 2, '1', '1'),
(40, 42, '1', '2022-08-30', 100, 2, 2, 2, '1', '1'),
(41, 41, '10', '2022-08-18', 10, 20, 2, 20, '1', '1'),
(42, 42, '1', '1999-08-19', 100, 2, 2, 2, '0', '0'),
(43, 43, '1234567', '2022-08-31', 100, 2, 200, 2, '1', '1'),
(44, 44, '2838302', '2022-08-20', 10, 2, 10, 1, '0', '0'),
(45, 45, '01111', '2022-09-23', 3, 3, 1552, 222, '1', '1'),
(46, 46, '055', '2022-09-15', 14450, 444, 444, 4, '1', '1'),
(47, 47, '48', '2022-09-07', 1080, 2, 0, 0, '0', '1'),
(48, 48, '2402187', '2022-11-09', 1420, 4, 0, 0, '0', '0'),
(49, 49, '49', '2022-09-08', 2030, 2, 0, 0, '1', '1');

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

CREATE TABLE `vol` (
  `id_vol` int(11) NOT NULL,
  `id_devis` int(11) NOT NULL,
  `numvol` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `heure` varchar(255) NOT NULL,
  `provenance` varchar(255) NOT NULL,
  `heurearrivee` varchar(255) NOT NULL,
  `aeroportarrivee` varchar(255) NOT NULL,
  `aller` tinyint(1) NOT NULL,
  `retour` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vol`
--

INSERT INTO `vol` (`id_vol`, `id_devis`, `numvol`, `date`, `heure`, `provenance`, `heurearrivee`, `aeroportarrivee`, `aller`, `retour`) VALUES
(78, 41, '10', '2022-08-19', '15:08', 'Guadeloupe ', '15:08', 'Martinique', 1, 0),
(79, 41, '20', '2022-08-30', '15:08', 'Gosier', '15:08', 'Paris', 0, 1),
(80, 43, '221010', '2022-08-31', '08:50', 'RZT', '09:30', 'FDF', 1, 0),
(81, 43, '1009', '2022-09-01', '09:30', 'FDF', '10:00', 'RZT', 0, 1),
(82, 45, '36666', '2022-09-16', '14:19', 'ORY', '', '', 1, 0),
(83, 45, '', '', '', '', '', '', 0, 1),
(84, 46, '', '', '', '', '', '', 1, 0),
(85, 46, '', '', '', '', '', '', 0, 1),
(86, 47, 'AF0788', '2022-11-05', '11:00', 'Paris Orly', '14:45', 'Pointe à Pitre', 1, 0),
(87, 47, 'AF0793', '2022-11-12', '18:05', 'Pointe à Pitre', '07:10', 'Paris Orly', 0, 1),
(88, 49, '', '', '', '', '', '', 1, 0),
(89, 49, '', '', '', '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `voyage`
--

CREATE TABLE `voyage` (
  `id_voyage` int(11) NOT NULL,
  `id_devis` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `naissance` varchar(255) NOT NULL,
  `nationalite` varchar(255) NOT NULL,
  `passeport` varchar(255) NOT NULL,
  `conducteur` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `voyage`
--

INSERT INTO `voyage` (`id_voyage`, `id_devis`, `nom`, `prenom`, `naissance`, `nationalite`, `passeport`, `conducteur`) VALUES
(67, 41, 'Eleloue', 'Rayan', '1999-08-19', 'Française ', '28281919', 1),
(68, 43, 'ELELOUE', 'Mélody', '2022-08-31', 'Française ', '83398892', 1),
(69, 45, 'rrrr', 'rrr', '2022-09-01', 'Francaise', '5865656', 1),
(70, 46, '555', '^hhhh', '', '', '5555', 0),
(72, 49, 'bruneau', 'denis', '1966-05-05', 'francaise', '08024520057', 1),
(74, 49, 'bruneau', 'sylvie', '1959-12-11', 'francaise', '0912452004713', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `assistance`
--
ALTER TABLE `assistance`
  ADD PRIMARY KEY (`id_assistance`);

--
-- Index pour la table `assurance`
--
ALTER TABLE `assurance`
  ADD PRIMARY KEY (`id_assurance`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id_devis`);

--
-- Index pour la table `vol`
--
ALTER TABLE `vol`
  ADD PRIMARY KEY (`id_vol`);

--
-- Index pour la table `voyage`
--
ALTER TABLE `voyage`
  ADD PRIMARY KEY (`id_voyage`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `assistance`
--
ALTER TABLE `assistance`
  MODIFY `id_assistance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `assurance`
--
ALTER TABLE `assurance`
  MODIFY `id_assurance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `id_devis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `vol`
--
ALTER TABLE `vol`
  MODIFY `id_vol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT pour la table `voyage`
--
ALTER TABLE `voyage`
  MODIFY `id_voyage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
