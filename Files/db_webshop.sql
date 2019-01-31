-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 29. Jan 2019 um 23:01
-- Server Version: 5.6.16
-- PHP-Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `db_webshop`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `filiale`
--

CREATE TABLE IF NOT EXISTS `filiale` (
  `place` varchar(25) NOT NULL,
  `street` varchar(25) NOT NULL,
  `zip` int(11) NOT NULL,
  `canton` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `filiale`
--

INSERT INTO `filiale` (`place`, `street`, `zip`, `canton`, `country`) VALUES
('Winterthur', 'Astreetname 23', 8400, 'Zürich', 'Switzerland'),
('Berlin', 'Strasse 15', 1585, 'Berlin', 'Germany'),
('Altstetten', 'Hohlstrasse 550', 8049, 'Zürich', 'Switzerland'),
('Zug', 'Zugerstrasse 34', 9012, 'Zug', 'Switzerland');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorie`
--

CREATE TABLE IF NOT EXISTS `kategorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cgname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `kategorie`
--

INSERT INTO `kategorie` (`id`, `cgname`) VALUES
(1, 'Elektronik & Computer'),
(2, 'Haushalt'),
(3, 'Kleidung'),
(4, 'Sport & Freizeit'),
(5, 'Lebensmittel');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunde`
--

CREATE TABLE IF NOT EXISTS `kunde` (
  `kundenid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `street` varchar(25) NOT NULL,
  `location` varchar(25) NOT NULL,
  `zip` int(11) NOT NULL,
  `country` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `year` varchar(11) NOT NULL,
  `password_1` varchar(25) NOT NULL,
  `password_2` varchar(25) NOT NULL,
  PRIMARY KEY (`kundenid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `kunde`
--

INSERT INTO `kunde` (`kundenid`, `firstname`, `lastname`, `age`, `gender`, `street`, `location`, `zip`, `country`, `email`, `year`, `password_1`, `password_2`) VALUES
(1, 'Firstname1', 'Lastname2', 45, 1, 'Streetname 25', 'Zurich', 8001, 'Switzerland', 'test@mail.ch', '1974', 'apassword', ''),
(2, 'Firstname2', 'Test2', 34, 0, 'Street 44', 'Zug', 3245, 'Switzerland', 'mail@mail.com', '1985', '12345', ''),
(3, 'Firstname test 3', 'Lastname3', 53, 1, 'Astreet 34', 'Bern', 6004, 'Switzerland', 'amail@idk.net', '1966', 'Password123', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `produkte`
--

CREATE TABLE IF NOT EXISTS `produkte` (
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `prdname` varchar(50) NOT NULL,
  `manufracturer` varchar(25) NOT NULL,
  `datum` date NOT NULL,
  `preis` int(11) NOT NULL,
  `anlager` int(11) NOT NULL,
  `description` text NOT NULL,
  `bild` varchar(30) NOT NULL,
  `kategorieidfs` int(11) NOT NULL,
  PRIMARY KEY (`productid`),
  KEY `kategorieidfs` (`kategorieidfs`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `produkte`
--

INSERT INTO `produkte` (`productid`, `prdname`, `manufracturer`, `datum`, `preis`, `anlager`, `description`, `bild`, `kategorieidfs`) VALUES
(1, 'Shirt', 'Chanel', '2019-01-15', 1000, 30, 'Buy it. It''s Chanel', 'shirt.png', 3),
(2, 'Asus Laptop', 'Asus', '2019-01-15', 235, 90, 'Some Text about ASUS Laptops', 'asuslaptop.png', 1),
(3, 'Tennis Schläger', 'Wilson', '2019-01-02', 55, 37, 'Ein tennis schläger von Adidas', 'tennis.jpg', 4),
(4, 'Pasta', 'Barillla', '2019-01-08', 9, 1502, 'ITS PASTA EVERYONE. BUY IT. EVRERYONE LOVES PASTA.', 'barilla.jpg', 5),
(5, 'Kaffeemaschiene', 'Nespresso', '2019-01-21', 289, 478, 'Eine Kaffemaschiene I guess', 'kaffee.jpg', 2),
(6, 'Playstation 4', 'Sony', '2018-08-06', 745, 432, 'Eine Playstation von Sony etc.', 'ps4.jpg', 1);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `produkte`
--
ALTER TABLE `produkte`
  ADD CONSTRAINT `produkte_ibfk_1` FOREIGN KEY (`kategorieidfs`) REFERENCES `kategorie` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
