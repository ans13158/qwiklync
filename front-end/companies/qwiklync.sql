-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 05, 2017 at 08:08 PM
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
-- Table structure for table `blogcomment`
--

CREATE TABLE IF NOT EXISTS `blogcomment` (
  `commentId` int(20) NOT NULL AUTO_INCREMENT,
  `blogId` int(20) NOT NULL,
  `commentDesc` varchar(2000) NOT NULL,
  PRIMARY KEY (`commentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `blogreply`
--

CREATE TABLE IF NOT EXISTS `blogreply` (
  `replyId` int(20) NOT NULL AUTO_INCREMENT,
  `commentId` int(20) NOT NULL,
  `blogId` int(20) NOT NULL,
  `replyDesc` varchar(2000) NOT NULL,
  PRIMARY KEY (`replyId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `companyId` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `website` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `logoPath` varchar(150) NOT NULL,
  `logoName` varchar(100) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `rating` float NOT NULL,
  PRIMARY KEY (`companyId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`companyId`, `name`, `email`, `phone`, `website`, `address`, `logoPath`, `logoName`, `latitude`, `longitude`, `rating`) VALUES
(1, 'Anshul', 'ans@ans.com', 1212121212, 'asddssads', 'basdnbjdbuh', 'companies', 'comp-logo.png', 46.61, 21.21, 4),
(2, 'Agrawal', 'ans@sad.com', 55555, 'adsdadsds', 'dsadsadsa', 'companies', 'comp-logo.png', 10.3, 10.3, 5),
(3, 'Abhijeet', 'assd@df.cp', 4545454, 'adbdncn', 'ddncjd', 'companies', 'comp-logo.png', 22, 22, 2),
(4, 'Pandey', 'asdd@dasds.cd', 50050, 'asddsad', 'dsaasddw', 'companies', 'comp-logo.png', 20, 20, 2),
(15, 'agrawal', 'san@dsa.c', 55555, 'asdaads', 'dsjn', 'companies', 'comp-logo.png', 2.22, 22.2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `contactId` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `message` varchar(4500) NOT NULL,
  PRIMARY KEY (`contactId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `faqId` int(10) NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `answer` varchar(3500) NOT NULL,
  PRIMARY KEY (`faqId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `jobId` int(20) NOT NULL AUTO_INCREMENT,
  `companyId` int(20) NOT NULL,
  `title` varchar(250) NOT NULL,
  `category` varchar(150) NOT NULL,
  `subCategory` varchar(150) NOT NULL,
  `exp` varchar(10) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `postedOn` date NOT NULL,
  `lastDate` date NOT NULL,
  `vaccancy` int(10) NOT NULL,
  `location` varchar(300) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `description` varchar(4000) NOT NULL,
  `specification` varchar(4000) NOT NULL,
  `nature` varchar(50) NOT NULL,
  `techGuide` varchar(4000) NOT NULL,
  `tags` varchar(250) NOT NULL,
  `kind` varchar(10) NOT NULL,
  PRIMARY KEY (`jobId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobId`, `companyId`, `title`, `category`, `subCategory`, `exp`, `shift`, `postedOn`, `lastDate`, `vaccancy`, `location`, `salary`, `description`, `specification`, `nature`, `techGuide`, `tags`, `kind`) VALUES
(1, 1, 'job', 'Computer and IT', 'Android Developer', 'yes', '8-10', '2017-01-01', '2017-01-05', 5, 'haldwani', '10000', 'andjandmn', 'mn,mnm,nmnmniojjij', 'remote', 'kdajkjdakjjdak', 'dm,c,.m', 'kdfl;'),
(2, 2, 'msnd,man', 'Computer and IT', 'programmer', 'yes', '8-10', '2017-01-03', '2017-01-05', 100, 'haldwani', '10000', 'adandsnkjadk', 'hdbasjdhkash', 'part-time', 'adnjadhskjah', 'khkdajhkj', 'add'),
(3, 3, 'asndljandj', 'Engineering Science', 'ELECTRICAL ENGINEER', 'no', '8-10', '2017-01-08', '2017-01-10', 10, 'axnaskjj', '10000', 'jdfshjfhj', ' canc sdb', 'full-time', 'bnadbsnbadsb', 'nasdbjash', 'hhhh'),
(4, 4, 'mdjkhkajh', 'Engineering Science', 'Electrical Engineers', '10', '8-10', '2017-01-03', '2017-01-25', 10, 'adsdasdada', '10000', 'dasdasdasdsa', 'saddssddsa', 'remote', 'adsdadad', 'adadsadsads', 'asdddsa'),
(5, 5, 'dajbadhb', 'Computer And IT', 'software developer', 'no', '8-10', '2017-01-04', '2017-01-12', 10, 'addsadssda', '2000', 'adsdsdas', 'asddsasda', 'internship', 'addsadsad', 'adssdads', 'assa'),
(6, 6, 'jadl', 'Marketing and Telecom', 'marketing', 'd', '10', '2017-01-11', '2017-01-02', 10, 'adsdsa', 'asbbdasbb', 'jhbjhbhj', 'bhb', 'remote', 'jhb', 'jb', 'jb'),
(8, 8, 'dsaddad', 'Banking & Financial', 'Banking', '21', '21', '2017-01-04', '2017-01-10', 23, '32asda', 'dasdassa', 'dasasdsda', 'ddsdasas', 'full-time', 'adasd', 'asddsa', 'sds'),
(9, 9, 'dasdsa', 'Banking & Financial', 'Financial', '22', '22', '2017-01-25', '2017-01-26', 20, '2sdasad', 'dasasd', 'sdadsad', 'sasa', 'remote', 'as', 'sa', 'aasa'),
(10, 11, 'fsdnm', 'anshul', 'anshul', '45', '54', '2017-01-04', '2017-01-11', 20, 'adsbmn', 'bnmb', 'bnmb', 'mnbmnm', 'internship', 'bmnbm', 'bmnb', 'dsnam'),
(11, 12, 'addas', 'agrawal', 'agrawal', '20', '20', '2017-01-11', '2017-01-02', 3, 'dadsa', 'jgjhg', 'jhghj', 'ghjg', 'full-time', 'jhg', 'jgjh', 'ghh'),
(12, 15, 'andbasn', 'Computer And IT', 'Android Developer', '54', '454', '2017-01-04', '2017-01-03', 20, 'asddsa', 'asdds', 'sdadsa', 'asddsa', 'internship', 'asads', 'aassda', 'adddsa'),
(13, 20, 'dfffgfgdf', 'Engineering Science', 'EDC', 'yes', '10', '2017-01-04', '2017-01-01', 20, 'dadasads', 'add', 'daadadsa', 'dsdas', 'Full-Time', 'qwewqew', 'sdsds', 'saddas');

-- --------------------------------------------------------

--
-- Table structure for table `jobapply`
--

CREATE TABLE IF NOT EXISTS `jobapply` (
  `jobApplyId` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `resumePath` varchar(150) NOT NULL,
  `resumeName` varchar(100) NOT NULL,
  `coverLetter` varchar(4000) NOT NULL,
  PRIMARY KEY (`jobApplyId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `emailId` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `verifyId` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `emailId`, `password`, `salt`, `verifyId`, `status`) VALUES
(1, 'Yashasvi', 'yash@gmail.com', 'yash', 'ebf1d1111f29aca2a2e55fb8ab2c776b', '', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
