-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 23 oct. 2019 à 16:53
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `logiciel_appro`
--

-- --------------------------------------------------------

--
-- Structure de la table `inventaire`
--

CREATE TABLE `inventaire` (
  `id_article` int(11) NOT NULL,
  `nom_article` varchar(20) COLLATE utf8_bin NOT NULL,
  `colisage` varchar(50) COLLATE utf8_bin NOT NULL,
  `quantite_colis` int(11) NOT NULL,
  `quantite_unites` int(11) NOT NULL,
  `date_inventaire` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='liste des inventaires';

-- --------------------------------------------------------

--
-- Structure de la table `references_produits`
--

CREATE TABLE `references_produits` (
  `id_produit` int(11) NOT NULL,
  `nom_article` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `categorie` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `reserve_stock` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `ref_fournisseur` int(11) NOT NULL,
  `unite_commande` varchar(50) COLLATE utf8_bin NOT NULL,
  `unite_stock` float DEFAULT NULL,
  `conso_actuelle` float NOT NULL,
  `conso_historique` float NOT NULL,
  `commentaire` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `actualite_referencement` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='liste des produits existants ou ayant existé';

--
-- Déchargement des données de la table `references_produits`
--

INSERT INTO `references_produits` (`id_produit`, `nom_article`, `categorie`, `reserve_stock`, `ref_fournisseur`, `unite_commande`, `unite_stock`, `conso_actuelle`, `conso_historique`, `commentaire`, `actualite_referencement`) VALUES
(1, '1.5 L Pepsi', 'OtherFood', 'Positive', 642029, 'Colis 6 bouteilles x 1.5L', 6, 1, 1.5, '', 1),
(2, '1.5 L Lipton', 'OtherFood', 'Positive', 642028, 'Colis 6 bouteilles x 1.5L', 6, 0.4, 0.3, '', 1),
(3, '1.5 L Orangina', 'OtherFood', 'Positive', 642025, 'Colis 6 bouteilles x 1.5L', 6, 0.5, 0.3, '', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `inventaire`
--
ALTER TABLE `inventaire`
  ADD PRIMARY KEY (`id_article`);

--
-- Index pour la table `references_produits`
--
ALTER TABLE `references_produits`
  ADD PRIMARY KEY (`id_produit`),
  ADD UNIQUE KEY `ref_fournisseur` (`ref_fournisseur`),
  ADD KEY `nom_article` (`nom_article`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `inventaire`
--
ALTER TABLE `inventaire`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `references_produits`
--
ALTER TABLE `references_produits`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
