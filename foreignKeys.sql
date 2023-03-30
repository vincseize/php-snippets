-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 28 mars 2023 à 02:38
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cheezyapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `cheeses`
--

DROP TABLE IF EXISTS `cheeses`;
CREATE TABLE `cheeses` (
  `id_cheeses` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `id_countries` int(6) NOT NULL DEFAULT 1,
  `id_wines` int(6) NOT NULL,
  `id_show_hide` tinyint(1) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cheeses`
--

INSERT INTO `cheeses` (`id_cheeses`, `name`, `description`, `id_countries`, `id_wines`, `id_show_hide`, `created`, `updated`) VALUES
(1, 'Cabecou', '', 1, 1, 2, '2023-03-22 04:00:00', '2023-03-22 04:00:00'),
(2, 'Camembert', '', 1, 1, 2, '2023-03-22 04:00:00', '2023-03-22 04:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id_countries` int(3) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `countries`
--

INSERT INTO `countries` (`id_countries`, `nom`) VALUES
(1, 'France'),
(2, 'Liban');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id_customers` int(10) NOT NULL,
  `f_name` varchar(25) NOT NULL,
  `l_name` varchar(25) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id_customers`, `f_name`, `l_name`, `gender`, `address`, `city`, `state`, `phone`, `email`, `date_of_birth`, `created_at`, `updated_at`) VALUES
(1, 'chetan', 'Shenai', 'female', 'waaw awf', NULL, 'Maharashtra', '99878', 'chetanshenai9@gmail.com', '2019-07-23', '2019-07-22 20:12:30', '2019-07-22 20:12:41'),
(2, 'Cfree', 'wawfaf2', 'male', 'piohh', NULL, 'Madhya pradesh', '09975342821', 'cgtarta@ll.com', '2020-10-14', '2020-10-24 15:46:45', '2023-01-27 23:37:19');

-- --------------------------------------------------------

--
-- Structure de la table `show_hide`
--

DROP TABLE IF EXISTS `show_hide`;
CREATE TABLE `show_hide` (
  `id_show_hide` tinyint(1) NOT NULL,
  `show_hide` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `show_hide`
--

INSERT INTO `show_hide` (`id_show_hide`, `show_hide`) VALUES
(1, 0),
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `wines`
--

DROP TABLE IF EXISTS `wines`;
CREATE TABLE `wines` (
  `id_wines` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `id_countries` int(3) NOT NULL,
  `id_types` int(6) NOT NULL,
  `id_vignobles` int(6) NOT NULL,
  `id_cepages` int(6) NOT NULL,
  `grand_cru` tinyint(1) NOT NULL DEFAULT 1,
  `id_cheeses` int(6) NOT NULL,
  `id_show_hide` tinyint(1) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `wines`
--

INSERT INTO `wines` (`id_wines`, `name`, `description`, `id_countries`, `id_types`, `id_vignobles`, `id_cepages`, `grand_cru`, `id_cheeses`, `id_show_hide`, `created`, `updated`) VALUES
(1, 'Beaujolais nouveau', '', 1, 1, 2, 1, 1, 1, 2, '2023-03-22 04:00:00', '2023-03-22 04:00:00'),
(2, 'Saint-Emilion', '', 1, 1, 3, 1, 1, 1, 2, '2023-03-22 04:00:00', '2023-03-22 04:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `wines_cepages`
--

DROP TABLE IF EXISTS `wines_cepages`;
CREATE TABLE `wines_cepages` (
  `id_wines_cepages` int(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `wines_cepages`
--

INSERT INTO `wines_cepages` (`id_wines_cepages`, `name`, `description`) VALUES
(1, 'Merlot', '');

-- --------------------------------------------------------

--
-- Structure de la table `wines_types`
--

DROP TABLE IF EXISTS `wines_types`;
CREATE TABLE `wines_types` (
  `id_wines_types` int(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `wines_types`
--

INSERT INTO `wines_types` (`id_wines_types`, `name`, `description`) VALUES
(1, 'rouge', ''),
(2, 'blanc', ''),
(3, 'rosé', ''),
(4, 'blanc pétillant', ''),
(5, 'rouge pétillant', ''),
(6, 'champagne', ''),
(7, 'gris', '');

-- --------------------------------------------------------

--
-- Structure de la table `wines_vignobles`
--

DROP TABLE IF EXISTS `wines_vignobles`;
CREATE TABLE `wines_vignobles` (
  `id_wines_vignobles` int(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `descripition` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `wines_vignobles`
--

INSERT INTO `wines_vignobles` (`id_wines_vignobles`, `name`, `descripition`) VALUES
(1, 'alsace', ''),
(2, 'bordeaux', ''),
(3, 'beaujolais', ''),
(4, 'bourgogne', ''),
(5, 'bugey', ''),
(6, 'champagne', ''),
(7, 'corse', ''),
(8, 'jura', ''),
(9, 'languedoc', ''),
(10, 'lorraine', ''),
(11, 'loire', ''),
(12, 'provence', ''),
(13, 'roussillion', ''),
(14, 'rhône', ''),
(15, 'savoie', ''),
(16, 'sud-ouest', ''),
(17, 'val-de-Loir', '');

-- --------------------------------------------------------

--
-- Structure de la table `_users`
--

DROP TABLE IF EXISTS `_users`;
CREATE TABLE `_users` (
  `id_users` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `_users`
--

INSERT INTO `_users` (`id_users`, `name`) VALUES
(3, 'julie'),
(5, 'hadi'),
(7, 'julie ijnme'),
(19, 'hani'),
(20, 'charles');

-- --------------------------------------------------------

--
-- Structure de la table `__admin_accounts`
--

DROP TABLE IF EXISTS `__admin_accounts`;
CREATE TABLE `__admin_accounts` (
  `id__admin_accounts` int(25) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `series_id` varchar(60) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `admin_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `__admin_accounts`
--

INSERT INTO `__admin_accounts` (`id__admin_accounts`, `user_name`, `password`, `series_id`, `remember_token`, `expires`, `admin_type`) VALUES
(4, 'superadmin', '$2y$10$eo7.w0Ttuy8mOBMvDlGqDeewQERkXu//7qO3jXp5NC76LwfAZpNrO', 'rvuWJHMd5LTxLC2J', '$2y$10$LDUi4w/UAM2PgfMoKkLo4.igJX39G5/WQOEDHRaDy3y2KZeIxXggm', '2019-02-16 22:39:57', 'super'),
(7, 'anand', '$2y$10$OrQFRZdSUP3X2kvGZrg.zeplQkxcJAq1s6atRehyCpbEvOVPu8KPe', NULL, NULL, NULL, 'admin'),
(8, 'admin', '$2y$10$RnDwpen5c8.gtZLaxHEHDOKWY77t/20A4RRkWBsjlPuu7Wmy0HyBu', 'QI701TfhqZgVrJae', '$2y$10$9xsAbWSyZUpTo0CR6qetyumver6mTRU8rAZkEBvhSbdixTY/sut1K', '2023-04-21 20:58:23', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cheeses`
--
ALTER TABLE `cheeses`
  ADD PRIMARY KEY (`id_cheeses`),
  ADD KEY `cheeses_countries` (`id_countries`),
  ADD KEY `cheeses_wines` (`id_wines`),
  ADD KEY `cheeses_show_hide` (`id_show_hide`);

--
-- Index pour la table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id_countries`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customers`),
  ADD UNIQUE KEY `id` (`id_customers`);

--
-- Index pour la table `show_hide`
--
ALTER TABLE `show_hide`
  ADD PRIMARY KEY (`id_show_hide`);

--
-- Index pour la table `wines`
--
ALTER TABLE `wines`
  ADD PRIMARY KEY (`id_wines`),
  ADD KEY `wines_types` (`id_types`),
  ADD KEY `wines_vignobles` (`id_vignobles`),
  ADD KEY `wines_cepages` (`id_cepages`),
  ADD KEY `wines_show_hide` (`id_show_hide`),
  ADD KEY `wines_countries` (`id_countries`),
  ADD KEY `wines_grand_cru` (`grand_cru`);

--
-- Index pour la table `wines_cepages`
--
ALTER TABLE `wines_cepages`
  ADD PRIMARY KEY (`id_wines_cepages`);

--
-- Index pour la table `wines_types`
--
ALTER TABLE `wines_types`
  ADD PRIMARY KEY (`id_wines_types`);

--
-- Index pour la table `wines_vignobles`
--
ALTER TABLE `wines_vignobles`
  ADD PRIMARY KEY (`id_wines_vignobles`);

--
-- Index pour la table `_users`
--
ALTER TABLE `_users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `id` (`id_users`);

--
-- Index pour la table `__admin_accounts`
--
ALTER TABLE `__admin_accounts`
  ADD PRIMARY KEY (`id__admin_accounts`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `id` (`id__admin_accounts`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cheeses`
--
ALTER TABLE `cheeses`
  MODIFY `id_cheeses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `countries`
--
ALTER TABLE `countries`
  MODIFY `id_countries` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customers` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `show_hide`
--
ALTER TABLE `show_hide`
  MODIFY `id_show_hide` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `wines`
--
ALTER TABLE `wines`
  MODIFY `id_wines` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `wines_cepages`
--
ALTER TABLE `wines_cepages`
  MODIFY `id_wines_cepages` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `wines_types`
--
ALTER TABLE `wines_types`
  MODIFY `id_wines_types` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `wines_vignobles`
--
ALTER TABLE `wines_vignobles`
  MODIFY `id_wines_vignobles` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `_users`
--
ALTER TABLE `_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `__admin_accounts`
--
ALTER TABLE `__admin_accounts`
  MODIFY `id__admin_accounts` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cheeses`
--
ALTER TABLE `cheeses`
  ADD CONSTRAINT `cheeses_countries` FOREIGN KEY (`id_countries`) REFERENCES `countries` (`id_countries`),
  ADD CONSTRAINT `cheeses_show_hide` FOREIGN KEY (`id_show_hide`) REFERENCES `show_hide` (`id_show_hide`),
  ADD CONSTRAINT `cheeses_wines` FOREIGN KEY (`id_wines`) REFERENCES `wines` (`id_wines`);

--
-- Contraintes pour la table `wines`
--
ALTER TABLE `wines`
  ADD CONSTRAINT `wines_cepages` FOREIGN KEY (`id_cepages`) REFERENCES `wines_cepages` (`id_wines_cepages`),
  ADD CONSTRAINT `wines_countries` FOREIGN KEY (`id_countries`) REFERENCES `countries` (`id_countries`),
  ADD CONSTRAINT `wines_grand_cru` FOREIGN KEY (`grand_cru`) REFERENCES `show_hide` (`id_show_hide`),
  ADD CONSTRAINT `wines_show_hide` FOREIGN KEY (`id_show_hide`) REFERENCES `show_hide` (`id_show_hide`),
  ADD CONSTRAINT `wines_types` FOREIGN KEY (`id_types`) REFERENCES `wines_types` (`id_wines_types`),
  ADD CONSTRAINT `wines_vignobles` FOREIGN KEY (`id_vignobles`) REFERENCES `wines_vignobles` (`id_wines_vignobles`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
