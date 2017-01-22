-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2017 at 10:16 PM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qwiklync`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `companyId` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `industryType` varchar(200) NOT NULL,
  `companySize` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `website` varchar(100) NOT NULL,
  `founded` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `logoPath` varchar(150) NOT NULL,
  `logoName` varchar(100) NOT NULL,
  `about` varchar(10000) NOT NULL,
  `specialities` varchar(5000) NOT NULL,
  PRIMARY KEY (`companyId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`companyId`, `name`, `industryType`, `companySize`, `type`, `website`, `founded`, `address`, `email`, `phone`, `logoPath`, `logoName`, `about`, `specialities`) VALUES
(1, 'Anshul', '', '', '', 'asddssads', '', 'basdnbjdbuh', 'ans@ans.com', 1212121212, 'companies', 'comp-logo.png', '', ''),
(2, 'Agrawal', '', '', '', 'adsdadsds', '', 'dsadsadsa', 'ans@sad.com', 55555, 'companies', 'comp-logo.png', '', ''),
(3, 'Abhijeet', '', '', '', 'adbdncn', '', 'ddncjd', 'assd@df.cp', 4545454, 'companies', 'comp-logo.png', '', ''),
(4, 'Pandey', '', '', '', 'asddsad', '', 'dsaasddw', 'asdd@dasds.cd', 50050, 'companies', 'comp-logo.png', '', ''),
(8, 'adsnasbk', 'computer & IT', '55', 'Govenrment', 'addnas', '544', 'dasdsadsadsa', 'sadsda@dwsa.c', 4646, 'companies', 'comp-logo.png', 'adsdsaddsdsdsa', 'djahkjsahdkjhajd'),
(15, 'agrawal', '', '', '', 'asdaads', '', 'dsjn', 'san@dsa.c', 55555, 'companies', 'comp-logo.png', '', ''),
(16, 'da', '', '22', 'Government Organisation', 'asdds', '111', 'address', 'das@s.c', 111, '', '', '<p>dads</p>\r\n', 'speciality'),
(17, 'da', '', '22', 'Government Organisation', 'asdds', '111', 'address', 'das@s.c', 111, '', '', '<p>dads</p>\r\n', 'speciality'),
(18, 'sdf', '', '2', 'Government Organisation', 'dfd', '22', 'address', 'ff@s.c', 0, '', '', '', 'speciality'),
(19, 'gffgc', 'Transporation', '22', 'Government Organisation', 'dsd', '32', 'address', 's2@zs.b', 111, '', '', '<p>vbbvsdfghkj</p>\r\n', '<p>srdxfgtck</p>\r\n'),
(20, 'gffgc', 'Transporation', '22', 'Government Organisation', 'dsd', '32', 'address', 's2@zs.b', 111, '', '', '<p>vbbvsdfghkj</p>\r\n', '<p>srdxfgtck</p>\r\n'),
(21, 'gffgc', 'Transporation', '22', 'Government Organisation', 'dsd', '32', 'address', 's2@zs.b', 111, '', '', '<p>vbbvsdfghkj</p>\r\n', '<p>srdxfgtck</p>\r\n'),
(22, 'gffgc', 'Transporation', '22', 'Government Organisation', 'dsd', '32', 'address', 's2@zs.b', 111, '', '', '<p>vbbvsdfghkj</p>\r\n', '<p>srdxfgtck</p>\r\n'),
(23, 'hgjkj', 'Transporation', '33', 'Government Organisation', '22rdxfgc', '24356', 'address', 'dtfyguh@szxdfcg.c', 0, '', '', '<p>jhbknml</p>\r\n', '<p>rdtfyghbjk</p>\r\n'),
(24, 'hgjkj', 'Transporation', '33', 'Government Organisation', '22rdxfgc', '24356', 'address', 'dtfyguh@szxdfcg.c', 0, '', '', '<p>jhbknml</p>\r\n', '<p>rdtfyghbjk</p>\r\n'),
(25, 'hgjkj', 'Transporation', '33', 'Government Organisation', '22rdxfgc', '24356', 'address', 'dtfyguh@szxdfcg.c', 0, '', '', '<p>jhbknml</p>\r\n', '<p>rdtfyghbjk</p>\r\n'),
(26, 'hgjkj', 'Transporation', '33', 'Government Organisation', '22rdxfgc', '24356', 'address', 'dtfyguh@szxdfcg.c', 0, '', '', '<p>jhbknml</p>\r\n', '<p>rdtfyghbjk</p>\r\n'),
(27, 'hgjkj', 'Transporation', '33', 'Government Organisation', '22rdxfgc', '24356', 'address', 'dtfyguh@szxdfcg.c', 0, '', '', '<p>jhbknml</p>\r\n', '<p>rdtfyghbjk</p>\r\n'),
(28, 'hgjkj', 'Transporation', '33', 'Government Organisation', '22rdxfgc', '24356', 'address', 'dtfyguh@szxdfcg.c', 0, '', '', '<p>jhbknml</p>\r\n', '<p>rdtfyghbjk</p>\r\n'),
(29, 'sdgfh', 'Transporation', '345', 'Government Organisation', 'dfghjbk', 'qw32456q', 'address', 'tfg@sdxfc.b', 2435, '', '', '<p>vbn</p>\r\n', '<p>fdxgcv</p>\r\n'),
(30, 'ans', 'Transporation', '5', 'Government Organisation', 'asdsda', '555', 'address', 'add@s.c', 4554, '', '', 'sfdsdf', 'addsad                                        '),
(31, 'ans', 'Transporation', '5', 'Government Organisation', 'asdsda', '555', 'address', 'add@s.c', 4554, '', '', 'sfdsdf', 'addsad                                        '),
(32, 'Gautam Industries', 'Transporation', '55', 'Government Organisation', 'sASA', '1222', 'address', 'aS@a.x', 21212, '', '', 'dffsd', 'adss                                           \r\n                                        '),
(33, 'Gautam Industries', 'Transporation', '55', 'Government Organisation', 'sASA', '1222', 'address', 'aS@a.x', 21212, '', '', 'dffsd', 'adss                                           \r\n                                        '),
(34, 'Gautam Industries', 'Transporation', '55', 'Government Organisation', 'sASA', '1222', 'address', 'aS@a.x', 21212, '', '', 'dffsd', 'adss                                           \r\n                                        '),
(35, 'Gautam Industries', 'Transporation', '55', 'Government Organisation', 'sASA', '1222', 'address', 'aS@a.x', 21212, '', '', 'dffsd', 'adss                                           \r\n                                        '),
(36, 'Gautam Industries', 'Transporation', '55', 'Government Organisation', 'sASA', '1222', 'address', 'aS@a.x', 21212, '', '', 'dffsd', 'adss                                           \r\n                                        '),
(37, 'Gautam Industries', 'Transporation', '55', 'Government Organisation', 'sASA', '1222', 'address', 'aS@a.x', 21212, '', '', 'dffsd', 'adss                                           \r\n                                        '),
(38, 'Gautam Industries', 'Transporation', '55', 'Government Organisation', 'sASA', '1222', 'address', 'aS@a.x', 21212, '', '', 'dffsd', 'adss                                           \r\n                                        '),
(39, 'Gautam Industries', 'Transporation', '55', 'Government Organisation', 'sASA', '1222', 'address', 'aS@a.x', 21212, '', '', 'dffsd', 'adss                                           \r\n                                        '),
(40, 'anshu;l', 'Transporation', '45', 'Government Organisation', 'sjasbj', '1212', 'address', 'ans@s.c', 65454, '0', '', 'fdsdsf', 'dasdsa                                           \r\n                                        '),
(41, 'Gautam Industries', 'Transporation', '55', 'Government Organisation', 'sASA', '1222', 'address', 'aS@a.x', 21212, '0', '', 'dffsd', 'adss                                           \r\n                                        '),
(42, 'Gautam Industries', 'Transporation', '55', 'Government Organisation', 'sASA', '1222', 'address', 'aS@a.x', 21212, '', '', 'dffsd', 'adss                                           \r\n                                        '),
(43, 'Gautam Industries', 'Transporation', '55', 'Government Organisation', 'sASA', '1222', 'address', 'aS@a.x', 21212, '', '', 'dffsd', 'adss                                           \r\n                                        '),
(44, 'Gautam Industries', 'Transporation', '55', 'Government Organisation', 'sASA', '1222', 'address', 'aS@a.x', 21212, '/qwiklync/front-end/images/company-logo/', '/qwiklync/front-end/images/company-logo/44Gautam Industries', 'dffsd', 'adss                                           \r\n                                        '),
(45, 'Gautam Industries', 'Transporation', '55', 'Government Organisation', 'sASA', '1222', 'address', 'aS@a.x', 21212, '', '', 'dffsd', 'adss                                           \r\n                                        '),
(46, 'Gautam Industries', 'Transporation', '55', 'Government Organisation', 'sASA', '1222', 'address', 'aS@a.x', 21212, '', '', 'dffsd', 'adss                                           \r\n                                        '),
(47, 'Gautam Industries', 'Transporation', '55', 'Government Organisation', 'sASA', '1222', 'address', 'aS@a.x', 21212, '', '', 'dffsd', 'adss                                           \r\n                                        '),
(48, 'Gautam Industries', 'Transporation', '55', 'Government Organisation', 'sASA', '1222', 'address', 'aS@a.x', 21212, '', '', 'dffsd', 'adss                                           \r\n                                        '),
(49, 'Gautam Industries', 'Transporation', '55', 'Government Organisation', 'sASA', '1222', 'address', 'aS@a.x', 21212, '', '', 'dffsd', 'adss                                           \r\n                                        '),
(50, 'ans', 'Transporation', '55', 'Government Organisation', 'dasd', '45', 'address', '5454@d.c', 0, '', '', 'adds', 'sasdsda                                           \r\n                                        '),
(51, 'ans', 'Transporation', '55', 'Government Organisation', 'http://www.dasd.com', '45', 'address', '5454@d.c', 4554, 'companies/', '14.jpg', 'adds', 'sasdsda                                           \r\n                                        '),
(52, 'anshul Agraw', 'Transporation', '4', 'Government Organisation', 'dasd', '45', 'address', '5454@d.com', 4554, 'companies', 'comp-logo.png', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.</p>\r\n', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.</p>\r\n'),
(53, 'anshul agrawal', 'Transporation', '55', 'Government Organisation', 'http://www.dasd.com', '2112', '$ address', 'da2@d.c', 1111, 'companies', 'comp-logo.png', '<p>I am&nbsp;<strong>Graphic Designer.</strong>&nbsp;Lesed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris. Duis aute irure dolor in repreh.<strong>Excepteur sint occaecat</strong>&nbsp;cupidatat non proident.</p>\r\n\r\n<p>Lesed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in repreh.&nbsp;<strong>Excepteur sint occaecat</strong>&nbsp;cupidatat non proiden</p>\r\n', '<p>Lesed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in repreh. Excepteur sint occaecat cupidatat non proident.Lesed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in repreh. Excepteur sint occaecat cupidatat non proident.</p>\r\n'),
(54, 'adsnamn', 'Transporation', '11', 'Government Organisation', 'hhtp://www.adsda.com', '2121', 'adhkjhajdhajdhk', 'as@s.s', 21212, 'companies', '14.jpg', '<p>I am&nbsp;<strong>Graphic Designer.</strong>&nbsp;Lesed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris. Duis aute irure dolor in repreh.<strong>Excepteur sint occaecat</strong>&nbsp;cupidatat non proident.</p>\r\n\r\n<p>Lesed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in repreh.&nbsp;<strong>Excepteur sint occaecat</strong>&nbsp;cupidatat non proident.</p>\r\n', '<p>Lesed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in repreh. Excepteur sint occaecat cupidatat non proident.</p>\r\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
