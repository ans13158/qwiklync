-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2017 at 03:30 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quicklync`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogcomment`
--

CREATE TABLE `blogcomment` (
  `commentId` int(20) NOT NULL,
  `blogId` int(20) NOT NULL,
  `commentDesc` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blogreply`
--

CREATE TABLE `blogreply` (
  `replyId` int(20) NOT NULL,
  `commentId` int(20) NOT NULL,
  `blogId` int(20) NOT NULL,
  `replyDesc` varchar(2000) NOT NULL
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
  `jobId` int(20) NOT NULL,
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
  `techGuide` varchar(4000) NOT NULL,
  `tags` varchar(250) NOT NULL,
  `kind` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `emailId`, `password`, `salt`, `verifyId`, `status`) VALUES
(1, 'Yashasvi', 'yash@gmail.com', 'yash', 'ebf1d1111f29aca2a2e55fb8ab2c776b', '', 2);

--
-- Indexes for dumped tables
--

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
  MODIFY `companyId` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contactId` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faqId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jobId` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobapply`
--
ALTER TABLE `jobapply`
  MODIFY `jobApplyId` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
