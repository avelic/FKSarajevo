-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2016 at 08:02 PM
-- Server version: 5.7.12-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wt`
--

-- --------------------------------------------------------

--
-- Table structure for table `autori`
--

CREATE TABLE IF NOT EXISTS `autori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf32_slovenian_ci NOT NULL,
  `password` varchar(50) COLLATE utf32_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_slovenian_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `autori`
--

INSERT INTO `autori` (`id`, `username`, `password`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(2, 'admin1', '6c7ca345f63f835cb353ff15bd6c5e052ec08e7a'),
(3, 'admin2', '315f166c5aca63a157f7d41007675cb44a948b33'),
(4, 'administrator', 'b3aca92c793ee0e9b1a9b0a5f5fc044e05140df3');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `Komentar_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Vijest_ID` int(11) NOT NULL,
  `Autor_ID` int(11) NOT NULL,
  `Kom` varchar(200) COLLATE utf32_slovenian_ci NOT NULL,
  `Vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Komentar_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_slovenian_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`Komentar_ID`, `Vijest_ID`, `Autor_ID`, `Kom`, `Vrijeme`) VALUES
(18, 9, 1, 'dddd', '2016-06-05 17:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `vijest`
--

CREATE TABLE IF NOT EXISTS `vijest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `slika` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `opis` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `komenatar` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `autor` int(100) NOT NULL,
  `broj` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `vijest`
--

INSERT INTO `vijest` (`id`, `ime`, `slika`, `opis`, `komenatar`, `autor`, `broj`, `vrijeme`) VALUES
(7, 'Leon Benko', 'Benkoslika', 'dobar igrac', '1', 1, '+382174154258', '2016-06-05 19:36:46'),
(8, 'Haris Duljevic', 'Duljevicslika', 'ok', '1', 1, '+387745245128', '2016-06-05 19:37:29'),
(9, 'Matej Delac', 'Delacslika', 'good', '0', 1, '+386785624524', '2016-06-05 19:54:10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
