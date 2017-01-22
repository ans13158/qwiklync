-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 18, 2017 at 05:55 PM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qwiklync2`
--

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE IF NOT EXISTS `resume` (
  `resumeid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `image` blob NOT NULL,
  `college` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `post` varchar(50) DEFAULT NULL,
  `numberofcompany` int(10) NOT NULL,
  `degree` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` int(13) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `aboutme` varchar(30) DEFAULT NULL,
  `linkedin` varchar(30) DEFAULT NULL,
  `facebook` varchar(30) DEFAULT NULL,
  `twitter` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`resumeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`resumeid`, `name`, `image`, `college`, `company`, `post`, `numberofcompany`, `degree`, `email`, `phone`, `address`, `aboutme`, `linkedin`, `facebook`, `twitter`) VALUES
(1, 'vaibhav', '', 'kasjdfk', 'KASLDFMLKA', 'Webdeveloper', 1, NULL, '', 0, '', '', '', '', ''),
(2, 'abhijeet', '', '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
