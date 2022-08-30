-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 01, 2018 at 06:02 PM
-- Server version: 5.5.52-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `musterija`
--

CREATE TABLE IF NOT EXISTS `musterija` (
  `JMBG` bigint(13) NOT NULL,
  `ime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` bigint(11) NOT NULL,
  PRIMARY KEY (`JMBG`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `musterija`
--

INSERT INTO `musterija` (`JMBG`, `ime`, `prezime`, `telefon`) VALUES
(1234567899876, 'Zlatko', 'Mladenovic', 88522222),
(2222222222222, 'Goran', 'Popovic', 889962856522),
(2222222222223, 'Marinko', 'Jablan', 2852369),
(2569483516425, 'Ognjen', 'Petrovic', 6995299),
(3777777789999, 'Stanko', 'Rockov', 99852),
(4444444444444, 'Jelena', 'Antic', 7952536481),
(5555566666666, 'Luka', 'Stankovic', 11112655),
(6679654123459, 'Danko', 'Stojanovic', 36955962),
(6893154965214, 'Slavisa', 'Rodic', 8863258),
(7965321456931, 'Slavoljub', 'Markovic', 999963333);

-- --------------------------------------------------------

--
-- Table structure for table `sala`
--

CREATE TABLE IF NOT EXISTS `sala` (
  `jmbg_korisnika` bigint(13) NOT NULL,
  `datum` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jelovnik` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `broj_gostiju` smallint(6) NOT NULL,
  PRIMARY KEY (`datum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sala`
--

INSERT INTO `sala` (`jmbg_korisnika`, `datum`, `jelovnik`, `broj_gostiju`) VALUES
(4444444444444, '04.06.2019', 'Jelovnik1', 290),
(4444444444444, '05.06.2019', 'Jelovnik2', 250),
(6893154965214, '08.08.2018', 'Jelovnik1', 150),
(2222222222222, '10.02.2018', 'Jelovnik 3', 350),
(2222222222222, '10.06.2018', 'Jelovnik2', 150),
(1234567899876, '28.04.2019', 'Jelovnik 1', 125);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
