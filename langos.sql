-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Skapad: 23 okt 2014 kl 13:27
-- Serverversion: 5.6.14
-- PHP-version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `mat`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `langos`
--

CREATE TABLE IF NOT EXISTS `langos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Namn` varchar(40) NOT NULL,
  `Topping` varchar(40) NOT NULL,
  `Pris` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumpning av Data i tabell `langos`
--

INSERT INTO `langos` (`id`, `Namn`, `Topping`, `Pris`) VALUES
(1, 'Orginal', 'Gräddfil och Ost', 54),
(2, 'Skinka Special', 'Gräddfil, Ost, Lök, Skinka', 64),
(3, 'Extra Allt', 'Extra allt!', 80),
(4, 'Psycho Special', 'Underliga saker', 100),
(5, 'Marghareta', 'Ingenting', 40),
(6, 'Albin', 'Inget gott, Blaze it', 420);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
