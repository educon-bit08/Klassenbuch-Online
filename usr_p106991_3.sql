-- phpMyAdmin SQL Dump
-- version 2.11.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 08. September 2009 um 06:57
-- Server Version: 5.0.41
-- PHP-Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: 'usr_p106991_3'
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle 'anwesenheit'
--

CREATE TABLE anwesenheit (
  anwesenheit_id int(11) NOT NULL auto_increment,
  schueler_id int(11) NOT NULL,
  verspaetung int(11) NOT NULL,
  unterrichtsstunde_id int(11) NOT NULL,
  `status` enum('V','A','E','U') NOT NULL COMMENT 'V)erspaetet A)nwesend E)ntschuldigt U)nentschuldigt',
  PRIMARY KEY  (anwesenheit_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle 'anwesenheit'
--

INSERT INTO anwesenheit VALUES(1, 1, 30, 1, 'V');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle 'block'
--

CREATE TABLE `block` (
  block_id int(11) NOT NULL auto_increment,
  von time NOT NULL,
  bis time NOT NULL,
  PRIMARY KEY  (block_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

--
-- Daten für Tabelle 'block'
--

INSERT INTO block VALUES(1, '08:00:00', '09:30:00');
INSERT INTO block VALUES(2, '09:45:00', '11:15:00');
INSERT INTO block VALUES(3, '11:30:00', '13:00:00');
INSERT INTO block VALUES(4, '13:30:00', '15:00:00');
INSERT INTO block VALUES(5, '15:15:00', '16:45:00');
INSERT INTO block VALUES(6, '17:00:00', '18:30:00');
INSERT INTO block VALUES(7, '18:45:00', '20:15:00');
INSERT INTO block VALUES(8, '20:30:00', '22:00:00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle 'fach'
--

CREATE TABLE fach (
  fach_id int(11) NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  aktiv enum('TRUE','FALSE') NOT NULL,
  PRIMARY KEY  (fach_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle 'fach'
--

INSERT INTO fach VALUES(1, 'Deutsch', 'TRUE');
INSERT INTO fach VALUES(2, 'Mathe', 'TRUE');
INSERT INTO fach VALUES(3, 'Programmieren', 'TRUE');
INSERT INTO fach VALUES(4, 'Sports', 'TRUE');
INSERT INTO fach VALUES(5, 'AWLs', 'TRUE');
INSERT INTO fach VALUES(6, 'Englische', 'FALSE');
INSERT INTO fach VALUES(13, 'Geschichten', 'FALSE');
INSERT INTO fach VALUES(12, 'wwww', 'FALSE');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle 'klasse'
--

CREATE TABLE klasse (
  klasse_id int(11) NOT NULL auto_increment,
  `name` varchar(5) NOT NULL,
  aktiv enum('TRUE','FALSE') NOT NULL,
  PRIMARY KEY  (klasse_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Daten für Tabelle 'klasse'
--

INSERT INTO klasse VALUES(1, 'BIT00', 'TRUE');
INSERT INTO klasse VALUES(2, 'BITww', 'TRUE');
INSERT INTO klasse VALUES(3, 'BIT08', 'TRUE');
INSERT INTO klasse VALUES(4, 'HOG06', 'TRUE');
INSERT INTO klasse VALUES(5, 'HOG07', 'TRUE');
INSERT INTO klasse VALUES(6, 'HOG08', 'TRUE');
INSERT INTO klasse VALUES(7, 'KOS06', 'TRUE');
INSERT INTO klasse VALUES(8, 'KOS07', 'TRUE');
INSERT INTO klasse VALUES(9, 'KOS08', 'TRUE');
INSERT INTO klasse VALUES(10, 'BLA06', 'TRUE');
INSERT INTO klasse VALUES(11, 'BLA07', 'TRUE');
INSERT INTO klasse VALUES(12, 'BLA08', 'TRUE');
INSERT INTO klasse VALUES(13, 'BIT04', 'TRUE');
INSERT INTO klasse VALUES(14, 'BIT05', 'TRUE');
INSERT INTO klasse VALUES(15, 'BIT10', 'FALSE');
INSERT INTO klasse VALUES(16, 'steff', 'FALSE');
INSERT INTO klasse VALUES(17, 'dfgdj', 'FALSE');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle 'lehrer'
--

CREATE TABLE lehrer (
  lehrer_id int(11) NOT NULL auto_increment,
  user_id int(11) NOT NULL,
  vorname varchar(45) NOT NULL,
  nachname varchar(45) NOT NULL,
  aktiv enum('TRUE','FALSE') NOT NULL,
  PRIMARY KEY  (lehrer_id),
  KEY user_id (user_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle 'lehrer'
--

INSERT INTO lehrer VALUES(1, 2, 'Vivian', 'Uibel', 'TRUE');
INSERT INTO lehrer VALUES(2, 0, 'Stefan', 'Voigt', 'TRUE');
INSERT INTO lehrer VALUES(3, 0, 'Rolf', 'Haeckel', 'TRUE');
INSERT INTO lehrer VALUES(4, 0, 'Brita', 'Lehmann', 'TRUE');
INSERT INTO lehrer VALUES(5, 0, 'Anne', 'Jappel', 'TRUE');
INSERT INTO lehrer VALUES(0, 0, 'NULL', 'NULL', 'TRUE');
INSERT INTO lehrer VALUES(6, 6, 'll', 'll', 'TRUE');
INSERT INTO lehrer VALUES(7, 7, 'mm', 'mm', 'TRUE');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle 'lehrer_2_klasse'
--

CREATE TABLE lehrer_2_klasse (
  lehrer_id int(11) NOT NULL,
  klasse_id int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle 'lehrer_2_klasse'
--

INSERT INTO lehrer_2_klasse VALUES(1, 1);
INSERT INTO lehrer_2_klasse VALUES(1, 4);
INSERT INTO lehrer_2_klasse VALUES(6, 2);
INSERT INTO lehrer_2_klasse VALUES(6, 4);
INSERT INTO lehrer_2_klasse VALUES(7, 1);
INSERT INTO lehrer_2_klasse VALUES(7, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle 'news'
--

CREATE TABLE news (
  news_id int(11) NOT NULL auto_increment,
  datum date NOT NULL,
  title varchar(255) NOT NULL,
  textfield text NOT NULL,
  PRIMARY KEY  (news_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle 'news'
--

INSERT INTO news VALUES(1, '2009-07-16', 'Überschrift', 'Hier stehen die Infos, die für alle relavant sind ...');
INSERT INTO news VALUES(2, '2009-07-19', 'KBO geht online', 'Heute Am 24.07.2009 geht unser Klassenbuch-Online online. Klingt doof,\r\nis aber so. Dieses KBO soll das Leben an dem Edu.Con-Campus in Potsdam einfacher\r\nmachen. Vielleicht wird es ja auch iwann auf andere nSchulen eingesetzt. Viel\r\nSpaß beim entspannten arbeiten.\r\n\r\nMfG Das Projektteam des KBO.');
INSERT INTO news VALUES(3, '0000-00-00', 'neuer Titel', 'textfeld');
INSERT INTO news VALUES(4, '0000-00-00', 'weiter', 'HIer steht\r\nnoch mehr\r\ntext mit\r\nZeilenumbrüchen');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle 'note'
--

CREATE TABLE note (
  schueler_id int(11) NOT NULL,
  typ enum('K','T','M','H') NOT NULL COMMENT 'K)lassenarbeit T)est M)uendlich H)ausaufgaben',
  punkte int(11) NOT NULL COMMENT 'punktesystem',
  note_id int(11) NOT NULL auto_increment,
  unterrichtsstunde_id int(11) NOT NULL,
  PRIMARY KEY  (note_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

--
-- Daten für Tabelle 'note'
--

INSERT INTO note VALUES(2, 'M', 2, 3, 1);
INSERT INTO note VALUES(3, 'M', 3, 2, 1);
INSERT INTO note VALUES(1, 'M', 1, 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle 'raum'
--

CREATE TABLE raum (
  raum_id int(11) NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  aktiv enum('TRUE','FALSE') NOT NULL,
  PRIMARY KEY  (raum_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle 'raum'
--

INSERT INTO raum VALUES(1, '1.19', 'TRUE');
INSERT INTO raum VALUES(9, '0.13', 'TRUE');
INSERT INTO raum VALUES(8, '2.13', 'TRUE');
INSERT INTO raum VALUES(7, '0.12', 'TRUE');
INSERT INTO raum VALUES(6, '0.11', 'TRUE');
INSERT INTO raum VALUES(3, '1.18', 'TRUE');
INSERT INTO raum VALUES(12, '2.24', 'TRUE');
INSERT INTO raum VALUES(13, '2.18', 'TRUE');
INSERT INTO raum VALUES(14, '2.25', 'FALSE');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle 'schueler'
--

CREATE TABLE schueler (
  schueler_id int(11) NOT NULL auto_increment,
  user_id int(11) NOT NULL,
  vorname varchar(45) NOT NULL,
  nachname varchar(45) NOT NULL,
  klasse_id int(11) NOT NULL,
  aktiv enum('TRUE','FALSE') NOT NULL,
  beschreibung varchar(255) NOT NULL,
  PRIMARY KEY  (schueler_id),
  KEY user_id (user_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle 'schueler'
--

INSERT INTO schueler VALUES(1, 1, 'Peter', 'Pan', 3, 'TRUE', '');
INSERT INTO schueler VALUES(2, 0, 's', 's', 2, 'TRUE', '');
INSERT INTO schueler VALUES(3, 3, 's', 's', 3, 'TRUE', '');
INSERT INTO schueler VALUES(4, 5, 'VV', 'nn', 3, 'TRUE', '');
INSERT INTO schueler VALUES(5, 8, 'vvvv', 'nnn', 4, 'TRUE', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle 'test'
--

CREATE TABLE test (
  test_id int(11) NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY  (test_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle 'test'
--

INSERT INTO test VALUES(1, 'ds1');
INSERT INTO test VALUES(2, 'ds2');
INSERT INTO test VALUES(3, 'ds3');
INSERT INTO test VALUES(4, 'ds4');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle 'unterrichtsstunde'
--

CREATE TABLE unterrichtsstunde (
  unterrichtsstunde_id int(11) NOT NULL auto_increment,
  datum date default NULL,
  raum_id int(11) default NULL,
  lehrer_id int(11) default NULL,
  vertretung_id int(11) default NULL,
  klasse_id int(11) default NULL,
  fach_id int(11) default NULL,
  block_id int(11) default NULL,
  fbl_id int(11) default NULL COMMENT '0)unlocked 1)Locked',
  abgezeichnet_id int(11) default NULL,
  hausaufgabe varchar(255) default NULL,
  inhalt varchar(255) default NULL,
  PRIMARY KEY  (unterrichtsstunde_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle 'unterrichtsstunde'
--

INSERT INTO unterrichtsstunde VALUES(1, '2009-07-01', 3, 1, 0, 3, 3, 2, 0, 1, '', '');
INSERT INTO unterrichtsstunde VALUES(2, '2009-07-01', 3, 1, 0, 3, 3, 2, 0, 1, '', '');
INSERT INTO unterrichtsstunde VALUES(3, '2009-07-01', 3, 1, 0, 3, 3, 2, 0, 1, '', '');
INSERT INTO unterrichtsstunde VALUES(4, '2009-07-01', 3, 1, 0, 3, 3, 2, 0, 1, '', '');
INSERT INTO unterrichtsstunde VALUES(5, '2009-07-01', 3, 1, 0, 3, 3, 2, 0, 1, '', '');
INSERT INTO unterrichtsstunde VALUES(6, '2009-07-01', 3, 1, 0, 3, 3, 2, 0, 1, '', '');
INSERT INTO unterrichtsstunde VALUES(7, '2009-07-03', 3, 3, 0, 5, 6, 1, 0, 0, '', '');
INSERT INTO unterrichtsstunde VALUES(8, '0000-00-00', 3, 1, 3, 1, 1, 5, 2, 1, 'macht mal', 'core programming');
INSERT INTO unterrichtsstunde VALUES(9, '2010-01-01', 0, 0, NULL, 1, 0, 1, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(10, '2010-01-01', 0, 0, NULL, 9, 0, 2, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(11, '2010-01-01', 0, 0, NULL, 10, 0, 3, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(12, '2010-01-01', 0, 0, NULL, 11, 0, 4, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(13, '2010-01-01', 0, 0, NULL, 12, 0, 5, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(14, '2010-01-01', 0, 0, NULL, 13, 0, 6, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(15, '2010-01-01', 0, 0, NULL, 14, 0, 7, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(16, '2010-01-01', 0, 0, NULL, 15, 0, 8, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(17, '2010-01-02', 0, 0, NULL, 1, 0, 1, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(18, '2010-01-02', 0, 0, NULL, 17, 0, 2, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(19, '2010-01-02', 0, 0, NULL, 18, 0, 3, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(20, '2010-01-02', 0, 0, NULL, 19, 0, 4, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(21, '2010-01-02', 0, 0, NULL, 20, 0, 5, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(22, '2010-01-02', 0, 0, NULL, 21, 0, 6, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(23, '2010-01-02', 0, 0, NULL, 22, 0, 7, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(24, '2010-01-02', 0, 0, NULL, 23, 0, 8, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(25, '2010-01-04', 8, 4, NULL, 1, 3, 1, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(26, '2010-01-04', 0, 0, NULL, 25, 0, 2, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(27, '2010-01-04', 0, 0, NULL, 26, 0, 3, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(28, '2010-01-04', 0, 0, NULL, 27, 0, 4, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(29, '2010-01-04', 0, 0, NULL, 28, 0, 5, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(30, '2010-01-04', 0, 0, NULL, 29, 0, 6, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(31, '2010-01-04', 0, 0, NULL, 30, 0, 7, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(32, '2010-01-04', 0, 0, NULL, 31, 0, 8, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(33, '2010-01-05', 0, 0, NULL, 1, 0, 1, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(34, '2010-01-05', 0, 0, NULL, 33, 0, 2, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(35, '2010-01-05', 0, 0, NULL, 34, 0, 3, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(36, '2010-01-05', 0, 0, NULL, 35, 0, 4, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(37, '2010-01-05', 0, 0, NULL, 36, 0, 5, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(38, '2010-01-05', 0, 0, NULL, 37, 0, 6, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(39, '2010-01-05', 0, 0, NULL, 38, 0, 7, NULL, NULL, '', '');
INSERT INTO unterrichtsstunde VALUES(40, '2010-01-05', 0, 0, NULL, 39, 0, 8, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle 'user'
--

CREATE TABLE `user` (
  user_id int(11) NOT NULL auto_increment,
  login varchar(45) NOT NULL COMMENT 'Login-Name',
  passwd varchar(45) NOT NULL COMMENT 'Password',
  aktiv enum('TRUE','FALSE') NOT NULL,
  email varchar(45) NOT NULL,
  geburtstag date NOT NULL,
  PRIMARY KEY  (user_id),
  UNIQUE KEY login (login)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle 'user'
--

INSERT INTO user VALUES(1, 'r', 'r', 'TRUE', 'rolf.haeckel@mac.com', '1957-10-30');
INSERT INTO user VALUES(2, 's', 's', 'TRUE', 'steffi@mac.com', '1961-12-17');
INSERT INTO user VALUES(3, 'ni', 'ni', 'TRUE', 'zz', '1900-01-01');
INSERT INTO user VALUES(4, 'x', '', 'TRUE', 'x', '1900-01-01');
INSERT INTO user VALUES(5, 'nii', '', 'TRUE', 'hh', '1900-01-01');
INSERT INTO user VALUES(6, 'lll', 'll', 'TRUE', 'll', '1900-01-01');
INSERT INTO user VALUES(7, 'mm', 'opopop', 'TRUE', 'zz', '1974-01-01');
INSERT INTO user VALUES(8, 'nininininin', 'qqq', 'TRUE', 'mnmnmn', '1900-01-01');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle 'woche'
--

CREATE TABLE woche (
  woche_id int(11) NOT NULL auto_increment,
  klasse_id int(11) NOT NULL,
  lehrer_id int(11) NOT NULL,
  beginn date NOT NULL,
  PRIMARY KEY  (woche_id),
  KEY klasse_id (klasse_id,lehrer_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle 'woche'
--

INSERT INTO woche VALUES(1, 1, 1, '2009-07-01');
