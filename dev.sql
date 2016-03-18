-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 18 Mars 2016 à 14:46
-- Version du serveur: 5.5.37
-- Version de PHP: 5.4.4-14+deb7u10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `dev`
--

-- --------------------------------------------------------

--
-- Structure de la table `todolist`
--

CREATE TABLE IF NOT EXISTS `todolist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `creat` int(11) NOT NULL,
  `categ` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default',
  `statut` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `categ` (`categ`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Contenu de la table `todolist`
--

INSERT INTO `todolist` (`id`, `message`, `creat`, `categ`, `statut`) VALUES
(27, 'Je sais paaaaas !', 1458311940, 'default', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
