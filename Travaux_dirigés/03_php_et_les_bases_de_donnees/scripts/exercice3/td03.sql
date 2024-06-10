-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 15 sep. 2023 à 07:55
-- Version du serveur : 8.0.26
-- Version de PHP : 8.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `td03`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(100) NOT NULL,
  `cat_description` varchar(100) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`, `cat_description`) VALUES
(1, 'Magic', 'Tout sur le célèbre jeu de cartes'),
(2, 'Bandes dessinées', 'Des bandes qui sont dessinées'),
(3, 'Comics', 'Des bandes dessinées américaines'),
(4, 'Manga', 'Des bandes dessinées japonaises'),
(5, 'Accessoire jeu de rôle', 'Toutes les accessoires liés aux jeux de rôle');

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `ite_id` int NOT NULL AUTO_INCREMENT,
  `ite_title` varchar(100) NOT NULL,
  `ite_description` varchar(100) NOT NULL,
  `ite_price` float NOT NULL,
  `ite_supplier` int NOT NULL,
  PRIMARY KEY (`ite_id`),
  KEY `fk_item_supplier` (`ite_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`ite_id`, `ite_title`, `ite_description`, `ite_price`, `ite_supplier`) VALUES
(1, 'Boîte 36 Boosters Draft Les Friches d\'Eldraine', 'Une boîte qui contient 36 boosters', 129.9, 1),
(2, 'Dé à 20 faces', 'Dé à 20 faces coloris au choix', 1, 1),
(3, 'Les Maîtres Assassins - tome 1', 'Le tome 1 de la série \"Les Maîtres Assassins\"', 15.5, 2),
(4, 'Dragon Ball Super - tome 20', 'Le tome 20 de Dragon Ball Super', 6.99, 2);

-- --------------------------------------------------------

--
-- Structure de la table `itemcategory`
--

DROP TABLE IF EXISTS `itemcategory`;
CREATE TABLE IF NOT EXISTS `itemcategory` (
  `itc_item` int NOT NULL,
  `itc_category` int NOT NULL,
  PRIMARY KEY (`itc_item`,`itc_category`),
  KEY `fk_itemcategory_category` (`itc_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `itemcategory`
--

INSERT INTO `itemcategory` (`itc_item`, `itc_category`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 4),
(2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `itemkeyword`
--

DROP TABLE IF EXISTS `itemkeyword`;
CREATE TABLE IF NOT EXISTS `itemkeyword` (
  `itk_item` int NOT NULL,
  `tik_keyword` int NOT NULL,
  PRIMARY KEY (`itk_item`,`tik_keyword`),
  KEY `fk_itemkeyword_keyword` (`tik_keyword`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `itemkeyword`
--

INSERT INTO `itemkeyword` (`itk_item`, `tik_keyword`) VALUES
(1, 1),
(3, 2),
(4, 2),
(1, 3),
(2, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `keyword`
--

DROP TABLE IF EXISTS `keyword`;
CREATE TABLE IF NOT EXISTS `keyword` (
  `key_id` int NOT NULL AUTO_INCREMENT,
  `key_title` varchar(100) NOT NULL,
  PRIMARY KEY (`key_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `keyword`
--

INSERT INTO `keyword` (`key_id`, `key_title`) VALUES
(1, 'magic'),
(2, 'livre'),
(3, 'jeu'),
(4, 'manga');

-- --------------------------------------------------------

--
-- Structure de la table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `sup_id` int NOT NULL AUTO_INCREMENT,
  `sup_name` varchar(100) NOT NULL,
  `sup_address` varchar(100) NOT NULL,
  PRIMARY KEY (`sup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `sup_name`, `sup_address`) VALUES
(1, 'Parckage', '25 Rue Geoffroy-Saint-Hilaire, 75005 Paris'),
(2, 'Fnac', 'Espace Drouet d\'Erlon, 53 Pl. Drouet d\'Erlon, 51100 Reims');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_item_supplier` FOREIGN KEY (`ite_supplier`) REFERENCES `supplier` (`sup_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `itemcategory`
--
ALTER TABLE `itemcategory`
  ADD CONSTRAINT `fk_itemcategory_category` FOREIGN KEY (`itc_category`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_itemcategory_item` FOREIGN KEY (`itc_item`) REFERENCES `item` (`ite_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `itemkeyword`
--
ALTER TABLE `itemkeyword`
  ADD CONSTRAINT `fk_itemkeyword_item` FOREIGN KEY (`itk_item`) REFERENCES `item` (`ite_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_itemkeyword_keyword` FOREIGN KEY (`tik_keyword`) REFERENCES `keyword` (`key_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
