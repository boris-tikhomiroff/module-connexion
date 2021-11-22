-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 22 nov. 2021 à 17:24
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boris-tikhomiroff_moduleconnexion`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=169 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `prenom`, `nom`, `password`) VALUES
(63, 'admin', 'admin', 'admin', '$2y$10$eUg3OXU4WV9zFFDCgfDX..gOaCJC.8U/WZL3KoSY3Z/.r3hoTwxBm'),
(154, 'test', 'test', 'test', '$2y$10$fdGNSxeM97ypzzGAmEE.BO20oMrzxh.59fzlxXf50dvdd9ObnCXJm'),
(166, 'hello', '', '', '$2y$10$YcEUdAWDVM1jmvkTjmPa6unPjmmi1q.Sd/KJ4hpc5jiVwk.4XPdtW'),
(167, 'test4', '', '', '$2y$10$dyQEFFprVvJc.oyRRzsdxOa9Dopo46gD7Am3OG.7SXAMDlYgqE/Pq'),
(168, 'test5', '', '', '$2y$10$ug7GGwzDarZ9zdyiUqe1luS9KImwM8bG6ZnBBYSIZfsvxY84kmGiW');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
