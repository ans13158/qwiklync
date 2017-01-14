-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2017 at 05:45 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qwiklync`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `photoPath` varchar(200) NOT NULL,
  `photoName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `email`, `password`, `salt`, `firstName`, `lastName`, `photoPath`, `photoName`) VALUES
(5, 'yash@gmail.com', 'yash', 'b6dd4f3a45e1093044a705c29256bd77', 'Yashasvi', 'Goel', '../admin/adminPhoto/yash@gmail.com12239922_1649085892036104_259517798774449078_n.jpg5873b81fc269d', '12239922_1649085892036104_259517798774449078_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blogId` int(20) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` varchar(6000) NOT NULL,
  `mainPoint` varchar(1000) NOT NULL,
  `photoName` varchar(100) NOT NULL,
  `photoPath` varchar(250) NOT NULL,
  `date` varchar(50) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blogId`, `title`, `content`, `mainPoint`, `photoName`, `photoPath`, `date`, `category`) VALUES
(7, 'asdf', 'sdfgh', 'asdfg', 'img6.png', '../admin/blogImages/img6.png587395b929e47', '2017-January-09', 'dfghj');

-- --------------------------------------------------------

--
-- Table structure for table `blogcomment`
--

CREATE TABLE `blogcomment` (
  `commentId` int(20) NOT NULL,
  `blogId` int(20) NOT NULL,
  `userId` int(20) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blogreply`
--

CREATE TABLE `blogreply` (
  `replyId` int(20) NOT NULL,
  `commentId` int(20) NOT NULL,
  `blogId` int(20) NOT NULL,
  `userId` int(20) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `companyId` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `website` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `logoPath` varchar(150) NOT NULL,
  `logoName` varchar(100) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `contactus` (
  `contactId` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `message` varchar(4500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactId`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(1, 'yashasvi goel', 'yashgoel@gmail.com', 76543234, 'asdfghk', 'xcvbn,mnbvcsdfgjhgedfghhgf'),
(2, 'aman', 'yash@gmail.com', 1234, 'azxc', 'zxcv'),
(3, 'ans', 'ans@ans.co', 544, '', ''),
(4, 'ans', 'ans@ans.co', 544, '', ''),
(5, 'ans', 'ans@ans.co', 544, '', ''),
(6, 'ans', 'ans@ans.co', 544, '', ''),
(7, 'ans', 'ans@ans.co', 544, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faqId` int(10) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` varchar(3500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faqId`, `question`, `answer`) VALUES
(1, 'ek aur ques', 'uska answer'),
(2, 'fir ques', 'uska bhi answer'),
(3, 'tesra quest', 'tesra ans'),
(4, 'chotha quest', 'chotha ans'),
(5, 'panchwa ques', 'panchwa ans'),
(6, 'six ques', 'six  ans'),
(7, 'satwa ques', 'satwa ans'),
(8, 'aathwa ques', 'aathwa ans'),
(9, 'ninth ques', 'ninth ans'),
(10, 'ninth ques', 'ninth ans');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `jobId` int(5) NOT NULL,
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
  `techGuidance` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobId`, `companyId`, `title`, `location`, `category`, `subCategory`, `type`, `shift`, `vacancy`, `experience`, `salary`, `postedOn`, `lastDate`, `kind`, `tags`, `description`, `specification`, `techGuidance`) VALUES
(2, 1, 'Looking for web developer', 'haldwani, india', 'Computer & IT', 'Web developer', 'Full Time', 'Featured Job', '5', 'Fresher', '2000', '0000-00-00', '2017-01-20', 'Featured Job', 'software,laravel,it', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities.</p>\r\n\r\n<p>2).You should be able to handle it with care and professionally.<br />\r\n3).Part of the duties is to prepare the samples and the budget and both of them are for approval.<br />\r\n4).Constant update and interaction with the supplies is needed.<br />\r\n5).You should also make sure that the functions of all related processes are running smoothly.</p>\r\n', '<p>1).you should be capable of executing all related merchandising activities of the given orders or the customers.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).Part of the duties is to prepare the samples and the budget and both of them are for approval.<br />\r\n4).Constant update and interaction with the supplies is needed.<br />\r\n5).You should also make sure that the functions of all related processes are running smoothly.</p>\r\n'),
(3, 1, 'Looking for web developer', 'haldwani, india', 'Computer & IT', 'Web developer', 'Full Time', 'Featured Job', '5', 'Fresher', '2000', '0000-00-00', '2017-01-20', 'Featured Job', 'software,laravel,it', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities.</p>\r\n\r\n<p>2).You should be able to handle it with care and professionally.<br />\r\n3).Part of the duties is to prepare the samples and the budget and both of them are for approval.<br />\r\n4).Constant update and interaction with the supplies is needed.<br />\r\n5).You should also make sure that the functions of all related processes are running smoothly.</p>\r\n', '<p>1).you should be capable of executing all related merchandising activities of the given orders or the customers.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).Part of the duties is to prepare the samples and the budget and both of them are for approval.<br />\r\n4).Constant update and interaction with the supplies is needed.<br />\r\n5).You should also make sure that the functions of all related processes are running smoothly.</p>\r\n'),
(4, 1, 'Looking for web developer', 'haldwani, india', 'Computer & IT', 'Web developer', 'Full Time', 'Featured Job', '5', 'Fresher', '1000', '2017-01-06', '2017-01-20', 'Full time', 'software,laravel,it', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities.</p>\r\n\r\n<p>2).You should be able to handle it with care and professionally.<br />\r\n3).Part of the duties is to prepare the samples and the budget and both of them are for approval.<br />\r\n4).Constant update and interaction with the supplies is needed.<br />\r\n5).You should also make sure that the functions of all related processes are running smoothly.</p>\r\n', '<p>1).you should be capable of executing all related merchandising activities of the given orders or the customers.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).Part of the duties is to prepare the samples and the budget and both of them are for approval.<br />\r\n4).Constant update and interaction with the supplies is needed.<br />\r\n5).You should also make sure that the functions of all related processes are running smoothly.</p>\r\n'),
(5, 1, 'Looking for android developer', 'Pantnagar,india', 'Laravel', 'android developer', 'Full Time', 'Morning', '10', 'Fresher', '11', '2017-01-06', '2017-01-26', 'Featured Job', 'software,laravel,html', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n&nbsp;</p>\r\n', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.<br />\r\n4).<br />\r\n5).</p>\r\n'),
(6, 2, 'Looking for android developer', 'Pantnagar,india', 'Laravel', 'android developer', 'Full Time', 'Morning', '10', 'Fresher', '22', '2017-01-06', '2017-01-26', 'Hot Job', 'software,laravel,html', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n&nbsp;</p>\r\n', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.<br />\r\n4).<br />\r\n5).</p>\r\n'),
(7, 3, 'Looking for android developer', 'Pantnagar,india', 'Computer & IT', 'Programming', 'Full Time', 'Morning', '10', 'Fresher', '22', '2017-01-06', '2017-01-26', 'Featured Job', 'software,laravel,html', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n&nbsp;</p>\r\n', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.<br />\r\n4).<br />\r\n5).</p>\r\n'),
(8, 3, 'Looking for android developer', 'Pantnagar,india', 'Construction, Engineering', 'civil engineering', 'Full Time', 'Morning', '10', 'Fresher', '10000', '2017-01-06', '2017-01-26', 'Hot Job', 'software,laravel,html', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n&nbsp;</p>\r\n', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.<br />\r\n4).<br />\r\n5).</p>\r\n'),
(9, 4, 'Looking for android developer', 'Pantnagar,india', 'Construction, Engineering', 'civil engineering', 'Full Time', 'Morning', '10', 'Fresher', '22', '2017-01-06', '2017-01-26', 'Hot Job', 'software,laravel,html', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n&nbsp;</p>\r\n', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.<br />\r\n4).<br />\r\n5).</p>\r\n'),
(10, 4, 'Looking for android developer', 'Pantnagar,india', 'Construction, Engineering', 'civil engineering', 'Full Time', 'Morning', '10', 'Fresher', '122', '2017-01-06', '2017-01-26', 'Hot Job', 'software,laravel,html', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n&nbsp;</p>\r\n', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.<br />\r\n4).<br />\r\n5).</p>\r\n'),
(11, 4, 'Looking for android developer', 'Pantnagar,india', 'Construction, Engineering', 'civil engineering', 'Full Time', 'Morning', '10', 'Fresher', '11', '2017-01-06', '2017-01-26', 'Hot Job', 'software,laravel,html', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n&nbsp;</p>\r\n', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.<br />\r\n4).<br />\r\n5).</p>\r\n'),
(12, 4, 'Looking for android developer', 'Pantnagar,india', 'Construction, Engineering', 'civil engineering', 'Full Time', 'Morning', '10', 'Fresher', '22', '2017-01-06', '2017-01-26', 'Hot Job', '', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n&nbsp;</p>\r\n', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.<br />\r\n4).<br />\r\n5).</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `jobapply`
--

CREATE TABLE `jobapply` (
  `jobApplyId` int(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `resumePath` varchar(150) NOT NULL,
  `resumeName` varchar(100) NOT NULL,
  `coverLetter` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobapply`
--

INSERT INTO `jobapply` (`jobApplyId`, `name`, `email`, `type`, `resumePath`, `resumeName`, `coverLetter`) VALUES
(1, 'Anshul', 'ans@ans.com', 'ans', 'company/resume', 'resume', 'dajdkdkcdlsmncs');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `emailId` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `verifyId` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `profilePhotoPath` varchar(500) NOT NULL,
  `profilePhotoName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `emailId`, `password`, `salt`, `verifyId`, `status`, `profilePhotoPath`, `profilePhotoName`) VALUES
(4, 'Yashasvi', 'yash@gmail.com', 'yash', 'b6dd4f3a45e1093044a705c29256bd77', '24c653b3fc1f81ca8dba35d31b0347a2', 2, '', ''),
(5, 'Yash', 'yashasvigoel006@gmail.com', 'yash', '4a9347d83b01b846686683bc5f9c12de', 'e3a06d0af53634dc600aa061a7174dac', 2, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogId`);

--
-- Indexes for table `blogcomment`
--
ALTER TABLE `blogcomment`
  ADD PRIMARY KEY (`commentId`);

--
-- Indexes for table `blogreply`
--
ALTER TABLE `blogreply`
  ADD PRIMARY KEY (`replyId`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`companyId`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faqId`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jobId`);

--
-- Indexes for table `jobapply`
--
ALTER TABLE `jobapply`
  ADD PRIMARY KEY (`jobApplyId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blogId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `blogcomment`
--
ALTER TABLE `blogcomment`
  MODIFY `commentId` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blogreply`
--
ALTER TABLE `blogreply`
  MODIFY `replyId` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `companyId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contactId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faqId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jobId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `jobapply`
--
ALTER TABLE `jobapply`
  MODIFY `jobApplyId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
