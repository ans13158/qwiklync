-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2017 at 10:17 PM
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
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminId` int(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `photoPath` varchar(200) NOT NULL,
  `photoName` varchar(100) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `email`, `password`, `salt`, `firstName`, `lastName`, `photoPath`, `photoName`) VALUES
(5, 'yash@gmail.com', 'yash', 'b6dd4f3a45e1093044a705c29256bd77', 'Yashasvi', 'Goel', '../admin/adminPhoto/yash@gmail.com12239922_1649085892036104_259517798774449078_n.jpg5873b81fc269d', '12239922_1649085892036104_259517798774449078_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `blogId` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `content` varchar(6000) NOT NULL,
  `mainPoint` varchar(1000) NOT NULL,
  `photoName` varchar(100) NOT NULL,
  `photoPath` varchar(250) NOT NULL,
  `date` varchar(50) NOT NULL,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`blogId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blogId`, `title`, `content`, `mainPoint`, `photoName`, `photoPath`, `date`, `category`) VALUES
(7, 'asdf', 'sdfgh', 'asdfg', 'img6.png', '../admin/blogImages/img6.png587395b929e47', '2017-January-09', 'computer'),
(8, 'anshul''s blog', 'nadlnlncdncjnokwecokclkcmaklxjclkm lsdmzxkom', ',mads ndalsnzldnasldjlnj', 'img6.png', '../admin/blogImages/img6.png587395b929e47', '01-01-2017', 'computer'),
(9, 'anshul', 'nsdkbaxknewijdsaweknxoewkjxnlksaojno', 'nsdwxoasmlxzncbiwjdsmlzmcxbijnkldsnmxzu', 'img6.png', '../admin/blogImages/img6.png587395b929e47', '20-01-2017', 'IT'),
(10, 'Agrawal', 'ajdsihiqwasnk beid', 'dyfguhasdoij', 'img6.png', '../admin/blogImages/img6.png587395b929e47', '01-02-2016', 'dksdjkj'),
(11, 'Pandey''s Blog', 'masdnljasnjksnajcnjkqeanadskjdbaskdbaskdbkasdknacknakjncdkjsnckjndjnewjcdskncjdnclsdkjcnxzml,cnwdlsjknxcz,mnsdjncwojencjnzkcn', 'jdansjnasmnxkjasnxk', '', '', '01-02-2016', 'Software'),
(12, 'Abhijeet''s Blog', 'asdbknasbdkbijewqndakzxckjsdncm,sdngfcygvjbhkjhcvjbnchvjhbnjhjgasdhkjlkncbvcsslkm', 'adsnjasdmncejwnsdm', '', '', '02-01-2017', 'Computer');

-- --------------------------------------------------------

--
-- Table structure for table `blogcomment`
--

CREATE TABLE IF NOT EXISTS `blogcomment` (
  `commentId` int(20) NOT NULL AUTO_INCREMENT,
  `blogId` int(20) NOT NULL,
  `userId` int(20) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`commentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `blogcomment`
--

INSERT INTO `blogcomment` (`commentId`, `blogId`, `userId`, `content`, `date`) VALUES
(1, 8, 1, 'adbskjandkjnk', '01-02-2017'),
(2, 7, 4, 'asddssd', '2017-January-19'),
(3, 7, 4, '', '2017-January-19'),
(4, 7, 4, '', '2017-January-19'),
(5, 7, 4, 'anshul', '2017-January-19'),
(6, 7, 4, 'dsanas,dsnc', '2017-January-19'),
(7, 7, 4, 'dsanas,dsnc', '2017-January-19'),
(8, 7, 4, 'dsanas,dsnc', '2017-January-19'),
(9, 7, 4, 'dsanas,dsnc', '2017-January-19'),
(10, 7, 4, 'dsanas,dsnc', '2017-January-19');

-- --------------------------------------------------------

--
-- Table structure for table `blogreply`
--

CREATE TABLE IF NOT EXISTS `blogreply` (
  `replyId` int(20) NOT NULL AUTO_INCREMENT,
  `commentId` int(20) NOT NULL,
  `blogId` int(20) NOT NULL,
  `userId` int(20) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`replyId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blogreply`
--

INSERT INTO `blogreply` (`replyId`, `commentId`, `blogId`, `userId`, `content`, `date`) VALUES
(1, 1, 8, 2, 'sadbaskdb', '02-02-2017');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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
-- Table structure for table `expereince`
--

CREATE TABLE IF NOT EXISTS `expereince` (
  `srno` int(10) NOT NULL AUTO_INCREMENT,
  `resumeid` int(11) NOT NULL,
  `companyname` varchar(30) NOT NULL,
  `post` varchar(30) NOT NULL,
  `fromdate` int(11) NOT NULL,
  `todate` int(11) NOT NULL,
  `description` varchar(300) NOT NULL,
  PRIMARY KEY (`srno`)
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

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
  `salary` varchar(30) NOT NULL,
  `postedOn` date NOT NULL,
  `lastDate` date NOT NULL,
  `kind` varchar(30) NOT NULL,
  `tags` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `specification` varchar(1000) NOT NULL,
  `techGuidance` varchar(1000) NOT NULL,
  PRIMARY KEY (`jobId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobId`, `companyId`, `title`, `location`, `category`, `subCategory`, `type`, `shift`, `vacancy`, `experience`, `salary`, `postedOn`, `lastDate`, `kind`, `tags`, `description`, `specification`, `techGuidance`) VALUES
(2, 1, 'Looking for web developer', 'haldwani, india', 'Computer and IT', 'Web developer', 'Full Time', 'Featured Job', '5', 'Fresher', '2000', '0000-00-00', '2017-01-20', 'Featured Job', 'software,laravel,it', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities.</p>\r\n\r\n<p>2).You should be able to handle it with care and professionally.<br />\r\n3).Part of the duties is to prepare the samples and the budget and both of them are for approval.<br />\r\n4).Constant update and interaction with the supplies is needed.<br />\r\n5).You should also make sure that the functions of all related processes are running smoothly.</p>\r\n', '<p>1).you should be capable of executing all related merchandising activities of the given orders or the customers.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).Part of the duties is to prepare the samples and the budget and both of them are for approval.<br />\r\n4).Constant update and interaction with the supplies is needed.<br />\r\n5).You should also make sure that the functions of all related processes are running smoothly.</p>\r\n'),
(3, 1, 'Looking for web developer', 'haldwani, india', 'Computer and IT', 'Web developer', 'Full Time', 'Featured Job', '5', 'Fresher', '2000', '0000-00-00', '2017-01-20', 'Featured Job', 'software,laravel,it', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities.</p>\r\n\r\n<p>2).You should be able to handle it with care and professionally.<br />\r\n3).Part of the duties is to prepare the samples and the budget and both of them are for approval.<br />\r\n4).Constant update and interaction with the supplies is needed.<br />\r\n5).You should also make sure that the functions of all related processes are running smoothly.</p>\r\n', '<p>1).you should be capable of executing all related merchandising activities of the given orders or the customers.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).Part of the duties is to prepare the samples and the budget and both of them are for approval.<br />\r\n4).Constant update and interaction with the supplies is needed.<br />\r\n5).You should also make sure that the functions of all related processes are running smoothly.</p>\r\n'),
(4, 1, 'Looking for web developer', 'haldwani, india', 'Computer and IT', 'Web developer', 'Full Time', 'Featured Job', '5', 'Fresher', '1000', '2017-01-06', '2017-01-20', 'Full time', 'software,laravel,it', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities.</p>\r\n\r\n<p>2).You should be able to handle it with care and professionally.<br />\r\n3).Part of the duties is to prepare the samples and the budget and both of them are for approval.<br />\r\n4).Constant update and interaction with the supplies is needed.<br />\r\n5).You should also make sure that the functions of all related processes are running smoothly.</p>\r\n', '<p>1).you should be capable of executing all related merchandising activities of the given orders or the customers.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).Part of the duties is to prepare the samples and the budget and both of them are for approval.<br />\r\n4).Constant update and interaction with the supplies is needed.<br />\r\n5).You should also make sure that the functions of all related processes are running smoothly.</p>\r\n'),
(5, 1, 'Looking for android developer', 'Pantnagar,india', 'Laravel', 'android developer', 'Full Time', 'Morning', '10', 'Fresher', '11', '2017-01-06', '2017-01-26', 'Featured Job', 'software,laravel,html', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n&nbsp;</p>\r\n', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.<br />\r\n4).<br />\r\n5).</p>\r\n'),
(6, 2, 'Looking for android developer', 'Pantnagar,india', 'Laravel', 'android developer', 'Full Time', 'Morning', '10', 'Fresher', '22', '2017-01-06', '2017-01-26', 'Hot Job', 'software,laravel,html', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n&nbsp;</p>\r\n', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.<br />\r\n4).<br />\r\n5).</p>\r\n'),
(7, 3, 'Looking for android developer', 'Pantnagar,india', 'Computer and IT', 'Programming', 'Full Time', 'Morning', '10', 'Fresher', '22', '2017-01-06', '2017-01-26', 'Featured Job', 'software,laravel,html', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n&nbsp;</p>\r\n', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.<br />\r\n4).<br />\r\n5).</p>\r\n'),
(8, 3, 'Looking for android developer', 'Pantnagar,india', 'Construction, Engineering', 'civil engineering', 'Full Time', 'Morning', '10', 'Fresher', '10000', '2017-01-06', '2017-01-26', 'Hot Job', 'software,laravel,html', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n&nbsp;</p>\r\n', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.<br />\r\n4).<br />\r\n5).</p>\r\n'),
(9, 4, 'Looking for android developer', 'Pantnagar,india', 'Construction, Engineering', 'civil engineering', 'Full Time', 'Morning', '10', 'Fresher', '22', '2017-01-06', '2017-01-26', 'Hot Job', 'software,laravel,html', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n&nbsp;</p>\r\n', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.<br />\r\n4).<br />\r\n5).</p>\r\n'),
(10, 4, 'Looking for android developer', 'Pantnagar,india', 'Construction, Engineering', 'civil engineering', 'Full Time', 'Morning', '10', 'Fresher', '122', '2017-01-06', '2017-01-26', 'Hot Job', 'software,laravel,html', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n&nbsp;</p>\r\n', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.<br />\r\n4).<br />\r\n5).</p>\r\n'),
(11, 4, 'Looking for android developer', 'Pantnagar,india', 'Construction, Engineering', 'civil engineering', 'Full Time', 'Morning', '10', 'Fresher', '11', '2017-01-06', '2017-01-26', 'Hot Job', 'software,laravel,html', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n&nbsp;</p>\r\n', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.<br />\r\n4).<br />\r\n5).</p>\r\n'),
(12, 4, 'Looking for android developer', 'Pantnagar,india', 'Construction, Engineering', 'civil engineering', 'Full Time', 'Morning', '10', 'Fresher', '22', '2017-01-06', '2017-01-26', 'Hot Job', '', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>\r\n', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n&nbsp;</p>\r\n', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.<br />\r\n4).<br />\r\n5).</p>\r\n'),
(13, 8, 'adsjdlahdljah', 'jlsadhjdlsaj', 'Restaurant, Food, Hotels', 'ABSN SA,M', 'Full Time', 'Morning', '11', 'Fresher', 'â‚¹10,000 or Less', '2017-01-14', '2017-01-04', 'Featured Job', 'software,laravel,html', 'dsdsa', 'adssdads', 'dasdadsa'),
(14, 8, 'adsjdlahdljah', 'jlsadhjdlsaj', 'Restaurant, Food, Hotels', 'ABSN SA,M', 'Full Time', 'Morning', '11', 'Fresher', 'â‚¹10,000 or Less', '2017-01-14', '2017-01-04', 'Featured Job', 'software,laravel,html', 'dsdsa', 'adssdads', 'dasdadsa'),
(15, 52, 'Looking for Android developer', 'alnds', 'Transporation', 'adsads', 'Full Time', 'Morning', '44', 'Fresher', 'â‚¹10,000 or Less', '2017-01-14', '2017-01-12', 'Featured Job', 'software,laravel', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities<br />\r\n2).You should be able to handle it with care and professionally.</p>', '<p>1).You should be able to handle it with care and professionally.<br />\r\n2).You should be able to handle it with care and professionally.<br />\r\n3).You should be able to handle it with care and professionally.</p>', '<p>Selected Employees would do the following work:<br />\r\n1).Being a garment merchandiser, you should be capable of executing all related merchandising activities<br />\r\n2).You should be able to handle it with care and professionally.</p>'),
(16, 52, 'dsbanndsab', 'nbasndbnb', 'Restaurant, Food, Hotels', 'dsasdna', 'Full Time', 'Morning', '55', 'Fresher', 'â‚¹10,000 or Less', '2017-01-14', '2017-01-05', 'Featured Job', 'software,laravel,html', 'adsdas', 'ds', 'dasasdsda'),
(17, 52, 'kjadhalj', 'jkdj', 'Art, Design and Multimedia', 'lkadsjlkad', 'Full Time', 'Morning', '22', 'Fresher', 'â‚¹10,000 or Less', '2017-01-14', '2017-01-06', 'Featured Job', 'software,laravel,html', 'sdadsds', 'sadsa', 'dssd'),
(18, 53, 'adsdssada', 'asdasdxa', 'Healthcare and Medicine', 'asdad', 'Full Time', 'Morning', '22', 'Fresher', 'â‚¹10,000 or Less', '2017-01-14', '2017-01-09', 'Featured Job', 'software,laravel,html', '<p>sdsadandjkasndkj</p>', '<p>asdsdasd</p>', '<p>dsadasd</p>');

-- --------------------------------------------------------

--
-- Table structure for table `jobapply`
--

CREATE TABLE IF NOT EXISTS `jobapply` (
  `jobApplyId` int(20) NOT NULL AUTO_INCREMENT,
  `jobId` int(5) NOT NULL,
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

INSERT INTO `jobapply` (`jobApplyId`, `jobId`, `name`, `email`, `type`, `resumePath`, `resumeName`, `coverLetter`) VALUES
(1, 2, 'Anshul', 'ans@ans.com', 'ans', 'company/resume', 'resume', 'dajdkdkcdlsmncs');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE IF NOT EXISTS `resume` (
  `resumeid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image` blob NOT NULL,
  `college` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `post` varchar(50) DEFAULT NULL,
  `numberofcompany` int(10) NOT NULL,
  `degree` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` int(13) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `aboutme` varchar(1000) DEFAULT NULL,
  `linkedin` varchar(300) DEFAULT NULL,
  `facebook` varchar(300) DEFAULT NULL,
  `twitter` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`resumeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`resumeid`, `name`, `image`, `college`, `company`, `post`, `numberofcompany`, `degree`, `email`, `phone`, `address`, `aboutme`, `linkedin`, `facebook`, `twitter`) VALUES
(1, 'vaibhav', '', 'kasjdfk', 'KASLDFMLKA', 'Webdeveloper', 1, NULL, '', 0, '', '', '', '', ''),
(4, 'yaishavi', '', '', '', 'jhkj', 1, 'highschool', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `serialno` int(11) NOT NULL AUTO_INCREMENT,
  `resumeid` int(11) NOT NULL,
  `skill` varchar(30) DEFAULT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`serialno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userId` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `emailId` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `verifyId` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `profilePhotoPath` varchar(500) NOT NULL,
  `profilePhotoName` varchar(100) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `type`, `username`, `emailId`, `password`, `salt`, `verifyId`, `status`, `profilePhotoPath`, `profilePhotoName`) VALUES
(4, 'jobSeeker', 'Yashasvi', 'yash@gmail.com', 'yash', 'b6dd4f3a45e1093044a705c29256bd77', '24c653b3fc1f81ca8dba35d31b0347a2', 3, '', ''),
(5, 'company', 'Yash', 'yashasvigoel006@gmail.com', 'yash', '4a9347d83b01b846686683bc5f9c12de', 'e3a06d0af53634dc600aa061a7174dac', 2, '', ''),
(6, 'jobSeeker', 'anshul', 'anshul@gmail.com', 'anshul', '3d6d87ce77ea6f8356f7b708381355d2', '8d3a3d9c35a526c91a4ebc38df9ffdcd', 2, '', ''),
(7, 'company', 'ans', 'ans@ssa.c', 'ans', 'd7229a03f569f89e505875e4454edb23', '232afb54d49511ecbe313fd9c6d80b33', 2, '', ''),
(8, 'company', 'ans', 'ans@ss.c', 'ans', '272b23f14db1516d141ae2d016841887', '48e314ca9913441a9464558fd5fdb84f', 2, '', ''),
(9, 'company', 'ans', 'ans@s.c', 'ans', '76f87e3b9ee762bcc4506603ee677c0d', '5ac7d11ffb21f3eaad34dd2ff31a6d8f', 2, '', ''),
(10, 'jobSeeker', 'ans', 'ans@s.cs', 'ans', '476ff2ca07c8a4e9bd30b2d23434cc1d', 'f80ca2c96d181775dab7765625a897fd', 2, '', ''),
(11, 'jobSeeker', 'sadsad', 'sdsa@asd.c', 'ans', '9ad7de50ea4e3acd4694d354dd8626e9', '97907a419d4b363daa7c89585073727f', 2, '', ''),
(12, 'jobSeeker', 'anshul', 'ans@ans.com', 'ans', 'c815b5643a55e91e459f6188b76a463c', '03a92195b3e67588e9d09899a9147b79', 2, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
