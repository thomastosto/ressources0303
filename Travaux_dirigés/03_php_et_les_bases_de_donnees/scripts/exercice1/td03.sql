SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `td03`
--
CREATE DATABASE IF NOT EXISTS `td03` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `td03`;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `example`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`) VALUES
(1, 'Nathalie', 'Portman'),
(2, 'Margot', 'Robbie'),
(3, 'Scarlett', 'Johansson'),
(4, 'Jessica', 'Alba'),
(5, 'Zoe', 'Saldaña'),
(6, 'Emma', 'Watson'),
(7, 'Kristin', 'Kreuk');
COMMIT;