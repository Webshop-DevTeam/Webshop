-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 31. Jan 2019 um 10:40
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
-- Tabellenstruktur für Tabelle `bestellungen`
--

CREATE TABLE IF NOT EXISTS `bestellungen` (
  `BestellungenID` int(11) NOT NULL AUTO_INCREMENT,
  `Bestellungsnummer` int(11) NOT NULL,
  `ProduktIDFS` int(11) NOT NULL,
  PRIMARY KEY (`BestellungenID`),
  KEY `ProduktIDFS` (`ProduktIDFS`),
  KEY `ProduktIDFS_2` (`ProduktIDFS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `externemitarbeiter`
--

CREATE TABLE IF NOT EXISTS `externemitarbeiter` (
  `ExterneMitarbeiterID` int(11) NOT NULL AUTO_INCREMENT,
  `Vorname` varchar(55) NOT NULL,
  `Nachname` varchar(55) NOT NULL,
  `Alter` int(11) NOT NULL,
  `Geschlecht` varchar(55) NOT NULL,
  `GebDatum` date NOT NULL,
  `FirmaIDFS` int(11) NOT NULL,
  PRIMARY KEY (`ExterneMitarbeiterID`),
  KEY `FirmaIDFS` (`FirmaIDFS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `externemitarbeiter`
--

INSERT INTO `externemitarbeiter` (`ExterneMitarbeiterID`, `Vorname`, `Nachname`, `Alter`, `Geschlecht`, `GebDatum`, `FirmaIDFS`) VALUES
(1, 'ExternerMitarbeiterVname', 'ExternerMitarbeiterLname', 46, 'M', '1979-03-05', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `filiale`
--

CREATE TABLE IF NOT EXISTS `filiale` (
  `FilialeID` int(11) NOT NULL AUTO_INCREMENT,
  `place` varchar(25) NOT NULL,
  `street` varchar(25) NOT NULL,
  `zip` int(11) NOT NULL,
  `canton` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `InterneMitarbeiterIDFS` int(11) NOT NULL,
  `ExterneMitarbeiterIDFS` int(11) NOT NULL,
  PRIMARY KEY (`FilialeID`),
  KEY `InterneMitarbeiterIDFS` (`InterneMitarbeiterIDFS`),
  KEY `ExterneMitarbeiterIDFS` (`ExterneMitarbeiterIDFS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `filiale`
--

INSERT INTO `filiale` (`FilialeID`, `place`, `street`, `zip`, `canton`, `country`, `InterneMitarbeiterIDFS`, `ExterneMitarbeiterIDFS`) VALUES
(1, 'Winterthur', 'Astreetname 23', 8400, 'Zürich', 'Switzerland', 1, 1),
(2, 'Berlin', 'Strasse 15', 1585, 'Berlin', 'Germany', 1, 1),
(3, 'Altstetten', 'Hohlstrasse 550', 8049, 'Zürich', 'Switzerland', 1, 1),
(4, 'Zug', 'Zugerstrasse 34', 9012, 'Zug', 'Switzerland', 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `firma`
--

CREATE TABLE IF NOT EXISTS `firma` (
  `FirmaID` int(11) NOT NULL,
  `Firmenname` varchar(55) NOT NULL,
  `anzahlMitarbeiter` int(11) NOT NULL,
  `Standort` varchar(55) NOT NULL,
  PRIMARY KEY (`FirmaID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `firma`
--

INSERT INTO `firma` (`FirmaID`, `Firmenname`, `anzahlMitarbeiter`, `Standort`) VALUES
(1, 'Webshop', 50000, 'Schweiz');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hersteller`
--

CREATE TABLE IF NOT EXISTS `hersteller` (
  `HerstellerID` int(11) NOT NULL AUTO_INCREMENT,
  `Herstellername` varchar(55) NOT NULL,
  `Land` varchar(55) NOT NULL,
  PRIMARY KEY (`HerstellerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `hersteller`
--

INSERT INTO `hersteller` (`HerstellerID`, `Herstellername`, `Land`) VALUES
(1, 'Chanel', 'USA'),
(2, 'Asus', 'USA'),
(3, 'Wilson', 'Schweden'),
(4, 'Barilla', 'Italien'),
(5, 'Sony', 'USA'),
(6, 'Nespresso', 'USA');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `internemitarbeiter`
--

CREATE TABLE IF NOT EXISTS `internemitarbeiter` (
  `InterneMitarbeiterID` int(11) NOT NULL AUTO_INCREMENT,
  `Vorname` varchar(55) NOT NULL,
  `Nachname` varchar(55) NOT NULL,
  `Alter` int(11) NOT NULL,
  `Geschlecht` varchar(55) NOT NULL,
  `GebDatum` date NOT NULL,
  `FirmaIDFS` int(11) NOT NULL,
  PRIMARY KEY (`InterneMitarbeiterID`),
  KEY `FirmaIDFS` (`FirmaIDFS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `internemitarbeiter`
--

INSERT INTO `internemitarbeiter` (`InterneMitarbeiterID`, `Vorname`, `Nachname`, `Alter`, `Geschlecht`, `GebDatum`, `FirmaIDFS`) VALUES
(1, 'InternerMitarbeiterVname', 'InternerMitarbeiterLname', 34, 'M', '1987-01-08', 1);

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
  `FirmaIDFS` int(11) NOT NULL,
  PRIMARY KEY (`kundenid`),
  KEY `FirmaIDFS` (`FirmaIDFS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `kunde`
--

INSERT INTO `kunde` (`kundenid`, `firstname`, `lastname`, `age`, `gender`, `street`, `location`, `zip`, `country`, `email`, `year`, `password_1`, `password_2`, `FirmaIDFS`) VALUES
(1, 'Firstname1', 'Lastname2', 45, 1, 'Streetname 25', 'Zurich', 8001, 'Switzerland', 'test@mail.ch', '1974', 'apassword', '', 1),
(2, 'Firstname2', 'Test2', 34, 0, 'Street 44', 'Zug', 3245, 'Switzerland', 'mail@mail.com', '1985', '12345', '', 1),
(3, 'Firstname test 3', 'Lastname3', 53, 1, 'Astreet 34', 'Bern', 6004, 'Switzerland', 'amail@idk.net', '1966', 'Password123', '', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lieferant`
--

CREATE TABLE IF NOT EXISTS `lieferant` (
  `LieferantID` int(11) NOT NULL,
  `Lieferant` varchar(55) NOT NULL,
  `ExterneMitarbeiterIDFS` int(11) NOT NULL,
  PRIMARY KEY (`LieferantID`),
  UNIQUE KEY `Lieferant` (`Lieferant`),
  KEY `ExterneMitarbeiterIDFS` (`ExterneMitarbeiterIDFS`),
  KEY `ExterneMitarbeiterIDFS_2` (`ExterneMitarbeiterIDFS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `HerstellerIDFS` int(11) NOT NULL,
  `FirmaIDFS` int(11) NOT NULL,
  PRIMARY KEY (`productid`),
  KEY `kategorieidfs` (`kategorieidfs`),
  KEY `FirmaIDFS` (`FirmaIDFS`),
  KEY `HerstellerIDFS` (`HerstellerIDFS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `produkte`
--

INSERT INTO `produkte` (`productid`, `prdname`, `manufracturer`, `datum`, `preis`, `anlager`, `description`, `bild`, `kategorieidfs`, `HerstellerIDFS`, `FirmaIDFS`) VALUES
(1, 'Shirt', 'Chanel', '2019-01-15', 1000, 30, 'Buy it. It''s Chanel', 'shirt.png', 3, 1, 1),
(2, 'Asus Laptop', 'Asus', '2019-01-15', 235, 90, 'Some Text about ASUS Laptops', 'asuslaptop.png', 1, 2, 1),
(3, 'Tennis Schläger', 'Wilson', '2019-01-02', 55, 37, 'Ein tennis schläger von Adidas', 'tennis.jpg', 4, 3, 1),
(4, 'Pasta', 'Barillla', '2019-01-08', 9, 1502, 'ITS PASTA EVERYONE. BUY IT. EVRERYONE LOVES PASTA.', 'barilla.jpg', 5, 4, 1),
(5, 'Kaffeemaschiene', 'Nespresso', '2019-01-21', 289, 478, 'Eine Kaffemaschiene I guess', 'kaffee.jpg', 2, 6, 1),
(6, 'Playstation 4', 'Sony', '2018-08-06', 745, 432, 'Eine Playstation von Sony etc.', 'ps4.jpg', 1, 5, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `transportart`
--

CREATE TABLE IF NOT EXISTS `transportart` (
  `TransportID` int(11) NOT NULL,
  `Transportart` varchar(55) NOT NULL,
  `FirmaIDFS` int(11) NOT NULL,
  `LieferantIDFS` int(11) NOT NULL,
  PRIMARY KEY (`TransportID`),
  UNIQUE KEY `FirmaIDFS` (`FirmaIDFS`),
  KEY `LieferantIDFS` (`LieferantIDFS`),
  KEY `FirmaIDFS_2` (`FirmaIDFS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zahlungsmethoden`
--

CREATE TABLE IF NOT EXISTS `zahlungsmethoden` (
  `ZahlungsmethodeID` int(11) NOT NULL AUTO_INCREMENT,
  `Zahlungsmethoden` varchar(55) NOT NULL,
  `BestellungIDFS` int(11) NOT NULL,
  PRIMARY KEY (`ZahlungsmethodeID`),
  KEY `BestellungIDFS` (`BestellungIDFS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bestellungen`
--
ALTER TABLE `bestellungen`
  ADD CONSTRAINT `bestellungen_ibfk_1` FOREIGN KEY (`ProduktIDFS`) REFERENCES `produkte` (`productid`);

--
-- Constraints der Tabelle `externemitarbeiter`
--
ALTER TABLE `externemitarbeiter`
  ADD CONSTRAINT `externemitarbeiter_ibfk_1` FOREIGN KEY (`FirmaIDFS`) REFERENCES `firma` (`FirmaID`);

--
-- Constraints der Tabelle `filiale`
--
ALTER TABLE `filiale`
  ADD CONSTRAINT `filiale_ibfk_2` FOREIGN KEY (`InterneMitarbeiterIDFS`) REFERENCES `internemitarbeiter` (`InterneMitarbeiterID`),
  ADD CONSTRAINT `filiale_ibfk_1` FOREIGN KEY (`ExterneMitarbeiterIDFS`) REFERENCES `externemitarbeiter` (`ExterneMitarbeiterID`);

--
-- Constraints der Tabelle `internemitarbeiter`
--
ALTER TABLE `internemitarbeiter`
  ADD CONSTRAINT `internemitarbeiter_ibfk_1` FOREIGN KEY (`FirmaIDFS`) REFERENCES `firma` (`FirmaID`);

--
-- Constraints der Tabelle `kunde`
--
ALTER TABLE `kunde`
  ADD CONSTRAINT `kunde_ibfk_1` FOREIGN KEY (`FirmaIDFS`) REFERENCES `firma` (`FirmaID`);

--
-- Constraints der Tabelle `lieferant`
--
ALTER TABLE `lieferant`
  ADD CONSTRAINT `lieferant_ibfk_1` FOREIGN KEY (`ExterneMitarbeiterIDFS`) REFERENCES `externemitarbeiter` (`ExterneMitarbeiterID`);

--
-- Constraints der Tabelle `produkte`
--
ALTER TABLE `produkte`
  ADD CONSTRAINT `produkte_ibfk_4` FOREIGN KEY (`FirmaIDFS`) REFERENCES `firma` (`FirmaID`),
  ADD CONSTRAINT `produkte_ibfk_1` FOREIGN KEY (`kategorieidfs`) REFERENCES `kategorie` (`id`),
  ADD CONSTRAINT `produkte_ibfk_3` FOREIGN KEY (`HerstellerIDFS`) REFERENCES `hersteller` (`HerstellerID`);

--
-- Constraints der Tabelle `transportart`
--
ALTER TABLE `transportart`
  ADD CONSTRAINT `transportart_ibfk_2` FOREIGN KEY (`FirmaIDFS`) REFERENCES `firma` (`FirmaID`),
  ADD CONSTRAINT `transportart_ibfk_1` FOREIGN KEY (`LieferantIDFS`) REFERENCES `lieferant` (`LieferantID`);

--
-- Constraints der Tabelle `zahlungsmethoden`
--
ALTER TABLE `zahlungsmethoden`
  ADD CONSTRAINT `zahlungsmethoden_ibfk_1` FOREIGN KEY (`BestellungIDFS`) REFERENCES `bestellungen` (`BestellungenID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
