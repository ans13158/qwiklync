-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2017 at 12:34 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactId`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(2, 'ans', 'ans@ans.co', 544, '', ''),
(3, 'ans', 'ans@ans.co', 544, '', ''),
(4, 'ans', 'ans@ans.co', 544, '', ''),
(5, 'ans', 'ans@ans.co', 544, '', ''),
(13, 'ans', 'ans@ans.co', 544, '', '');

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
  `jobId` int(5) NOT NULL AUTO_INCREMENT,
  `companyId` int(5) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `location` varchar(1000) NOT NULL,
  `category` varchar(200) NOT NULL,
  `subCategory` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `shift` varchar(20) NOT NULL,
  `vacancy` varchar(4) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `salary` varchar(8) NOT NULL,
  `postedOn` date NOT NULL,
  `lastDate` date NOT NULL,
  `kind` varchar(30) NOT NULL,
  `tags` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `specification` varchar(1000) NOT NULL,
  `techGuidance` varchar(1000) NOT NULL,
  PRIMARY KEY (`jobId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobId`, `companyId`, `title`, `location`, `category`, `subCategory`, `type`, `shift`, `vacancy`, `experience`, `salary`, `postedOn`, `lastDate`, `kind`, `tags`, `description`, `specification`, `techGuidance`) VALUES
(9, 4, 'Looking for android developer', 'Pantnagar,india', 'Construction, Engineering', 'civil engineering', 'Full Time', 'Morning', '10', 'Fresher', '22', '2017-01-06', '2017-01-26', 'Hot Job', 'software,laravel,html', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n&nbsp;</p>\r\n', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.<br />\r\n4).<br />\r\n5).</p>\r\n'),
(10, 4, 'Looking for android developer', 'Pantnagar,india', 'Laravel', 'civil engineering', 'Full Time', 'Morning', '10', 'Fresher', '122', '2017-01-06', '2017-01-26', 'Hot Job', 'software,laravel,html', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n&nbsp;</p>\r\n', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.<br />\r\n4).<br />\r\n5).</p>\r\n'),
(11, 4, 'Looking for android developer', 'Pantnagar,india', 'Construction, Engineering', 'civil engineering', 'Full Time', 'Morning', '10', 'Fresher', '11', '2017-01-06', '2017-01-26', 'Hot Job', 'software,laravel,html', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n&nbsp;</p>\r\n', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.<br />\r\n4).<br />\r\n5).</p>\r\n'),
(12, 4, 'Looking for android developer', 'Pantnagar,india', 'Construction, Engineering', 'civil engineering', 'Full Time', 'Morning', '10', 'Fresher', '22', '2017-01-06', '2017-01-26', 'Hot Job', '', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n&nbsp;</p>\r\n', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.<br />\r\n4).<br />\r\n5).</p>\r\n');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jobapply`
--

INSERT INTO `jobapply` (`jobApplyId`, `name`, `email`, `type`, `resumePath`, `resumeName`, `coverLetter`) VALUES
(1, 'Anshul', 'ans@ans.com', 'ans', 'company/resume', 'resume', 'dajdkdkcdlsmncs');

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
