-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2016 at 12:30 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoutmyshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` varchar(11) NOT NULL,
  `firstName` char(30) NOT NULL,
  `lastName` char(30) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(150) NOT NULL,
  `profilePhotoPath` varchar(1000) DEFAULT NULL,
  `profilePhotoName` varchar(150) NOT NULL,
  `role` char(15) DEFAULT NULL,
  `idCardType` varchar(15) NOT NULL,
  `idCard` varchar(15) DEFAULT NULL,
  `dOB` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `firstName`, `lastName`, `userName`, `email`, `phone`, `password`, `salt`, `profilePhotoPath`, `profilePhotoName`, `role`, `idCardType`, `idCard`, `dOB`) VALUES
('5', 'df', 'fm,.', 'fghj', 'yash@gmail.com', 0, 'yash', 'b6dd4f3a45e1093044a705c29256bd77', 'asdfgh', 'xcvbn.jpg', 'admin', 'PAN Card', 'asdfg12345', '0000-00-00'),
('ADM04', 'kajal', 'jain', 'kajal123', 'kajal@gmail.com', 9874561245, 'asdfghj', 'asdfghjk', 'C:\\xampp\\htdocs\\shoutmyshop\\admin\\images\\adminProfileImages\\abc.jpg', 'qwert.jpg', 'Agent', 'Passport', 'asdfghj12345', '2016-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `banking_details`
--

CREATE TABLE `banking_details` (
  `bankingDetailsId` varchar(11) NOT NULL,
  `ifscCode` varchar(11) NOT NULL,
  `bankName` varchar(100) NOT NULL,
  `accountNo` bigint(16) NOT NULL,
  `accountHolderName` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banking_details`
--

INSERT INTO `banking_details` (`bankingDetailsId`, `ifscCode`, `bankName`, `accountNo`, `accountHolderName`, `branch`, `email`) VALUES
('BKD01', 'SBIN0011415', 'State Bank of India', 34512346789345, 'Yash Goel', 'kankhal', 'sbikankhal@gmail.com'),
('BKD03', 'PNBN0011415', 'Punjab National Bank', 3451237893456, 'Pulkit Jain', 'haldwani', 'pnb@gmail.com'),
('BKD02', 'ICICI123456', 'ICICI', 5671234567890, 'Prakash', 'Verma', 'icici@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `contactID` varchar(11) NOT NULL,
  `phoneNo` bigint(15) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `city` char(100) NOT NULL,
  `state` char(50) NOT NULL,
  `pinCode` int(6) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`contactID`, `phoneNo`, `Address`, `city`, `state`, `pinCode`, `email`) VALUES
('CND01', 9874561234, 'H-12', 'kicha', 'uttrakhand', 234123, 'aman@gmail.com'),
('CND02', 8763451234, 'C-54', 'jammu', 'Jammu & Kashmir', 234123, 'jamu@gmail.com'),
('CND03', 7651234789, 'B-12', 'lucknow', 'Uttra Pardesh', 267897, 'bijola@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy`
--

CREATE TABLE `delivery_boy` (
  `deliveryBoyId` varchar(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `profilePhotoPath` varchar(1000) NOT NULL,
  `profilePhotoName` varchar(100) NOT NULL,
  `drivingLicense` varchar(13) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_boy`
--

INSERT INTO `delivery_boy` (`deliveryBoyId`, `firstName`, `lastName`, `profilePhotoPath`, `profilePhotoName`, `drivingLicense`, `dateOfBirth`, `email`, `password`, `salt`) VALUES
('DBY01', 'Yashasvi', 'Goel', 'C:/xampp/htdocs/shoutmyshop/admin/images/deliveryBoyProfileImages/DBY01YashasviGoel', 'IMG_20161016_164355366.jpg', 'asdfg', '2016-12-21', 'asdf@gmail.com', 'sdfgh456', '5c5b45286ee74cc3d8ae9f91475570e7'),
('DBY02', 'aman', 'verma', 'C:/xampp/htdocs/shoutmyshop/admin/images/deliveryBoyProfileImages/DBY02amanverma', 'IMG_20161112_131139.jpg', 'asdfg23', '2016-12-13', 'asdfg@gmail.com', 'sdfgh', '67143ee3e5a1a142cc20b18a52d5b7b9'),
('DBY03', 'ajay', 'sharma', 'C:/xampp/htdocs/shoutmyshop/admin/images/deliveryBoyProfileImages/DBY03ajaysharma', 'IMG_20161016_164355366.jpg', 'asdfgh23456', '2016-12-22', 'lkjh@gmail.com', 'dfghj', 'bde037826d4aa174826ffa36a3c67d7d');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `foodId` varchar(11) NOT NULL,
  `restaurantId` varchar(11) NOT NULL,
  `foodDetails` varchar(1000) NOT NULL,
  `foodName` varchar(250) NOT NULL,
  `foodDescription` varchar(1000) NOT NULL,
  `type` varchar(15) NOT NULL,
  `oldPrice` float NOT NULL,
  `newPrice` float NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodId`, `restaurantId`, `foodDetails`, `foodName`, `foodDescription`, `type`, `oldPrice`, `newPrice`, `category`) VALUES
('FID01', 'RID01', 'It is red in color', 'Kadahi Paneer', 'It is spicy n yummy', 'veg', 80, 78, 'Indian'),
('Fid02', 'RID02', 'It is green in color', 'Shimla Mirch', 'It is very spicy', 'veg', 43, 50, 'Indian'),
('FID03', 'RID01', 'It is white in color', 'Noodles', 'It is juicy ', 'veg', 90, 87, 'china');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderID` varchar(11) NOT NULL,
  `restaurantID` varchar(11) NOT NULL,
  `status` char(15) NOT NULL,
  `dateOfOrder` date NOT NULL,
  `timeOfOrder` time NOT NULL,
  `subTotal` float NOT NULL,
  `discount` float NOT NULL,
  `vat` float NOT NULL,
  `serviceCharge` float NOT NULL,
  `serviceTax` float NOT NULL,
  `grandTotal` float NOT NULL,
  `roundOff` int(11) NOT NULL,
  `netPayement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderID`, `restaurantID`, `status`, `dateOfOrder`, `timeOfOrder`, `subTotal`, `discount`, `vat`, `serviceCharge`, `serviceTax`, `grandTotal`, `roundOff`, `netPayement`) VALUES
('OID01', 'RID01', 'PENDING', '2016-12-20', '06:15:15', 100, 10, 9, 8, 9, 145, 145, 145),
('OID02', 'RID02', 'DELIVERED', '2016-12-06', '17:31:19', 80, 67, 45, 32, 123, 34, 55, 778),
('OID03', 'RID03', 'DELIVERED', '2016-12-05', '06:00:00', 12, 345, 345, 345, 45, 34, 3456, 4556);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_details`
--

CREATE TABLE `restaurant_details` (
  `restaurantId` varchar(50) NOT NULL,
  `restaurantName` varchar(50) NOT NULL,
  `typeOfCuisine` varchar(50) NOT NULL,
  `photoName` varchar(1000) NOT NULL,
  `photoPath` varchar(1000) NOT NULL,
  `logoName` varchar(100) NOT NULL,
  `logoPath` varchar(1000) NOT NULL,
  `aboutRestaurant` varchar(750) NOT NULL,
  `takeAway` varchar(10) NOT NULL,
  `delivery` varchar(10) NOT NULL,
  `dineIn` varchar(10) NOT NULL,
  `minimumOrder` float NOT NULL,
  `deliveryTime` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `popular` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_details`
--

INSERT INTO `restaurant_details` (`restaurantId`, `restaurantName`, `typeOfCuisine`, `photoName`, `photoPath`, `logoName`, `logoPath`, `aboutRestaurant`, `takeAway`, `delivery`, `dineIn`, `minimumOrder`, `deliveryTime`, `category`, `popular`) VALUES
('RID02', 'WELCOME', 'INDIAN', 'ZXCVBN.JPG', 'C:\\xampp\\htdocs\\shoutmyshop\\admin\\images\\restaurantImages', 'DFGH.JPG', 'C:\\xampp\\htdocs\\shoutmyshop\\admin\\images\\restaurantImages', 'IT IS 3 SRAT', 'NO', 'YES', 'YES', 67, '9:AM-7:PM', 'INDIAN', ''),
('RID03', 'TILAK', 'RUSSIAN', 'SDFGH.JPG', 'C:\\xampp\\htdocs\\shoutmyshop\\admin\\images\\restaurantImages', 'SDFG.JPG', 'C:\\xampp\\htdocs\\shoutmyshop\\admin\\images\\restaurantImages', 'IT IS 2 STAR', 'YES', 'YES', 'YES', 78, '8:AM-8:PM', 'RUSSIAN', ''),
('RST04', 'Welcome', 'Indian', 'ausctr-omni-austin-hotel-downtown-evening-pool.jpg', 'C:/xampp/htdocs/shoutmyshop/admin/images/restaurantImages/RST04Welcome/photos', 'download (1).jpg', 'C:/xampp/htdocs/shoutmyshop/admin/images/restaurantImages/RST04Welcome/logo', 'It is very Good Hotel', 'Yes', 'Yes', 'Yes', 150, '60 min', 'Dinner', ''),
('RST05', 'FUNFOOD', 'Russian', 'download.jpg', 'C:/xampp/htdocs/shoutmyshop/admin/images/restaurantImages/RST05FUNFOOD/photos', 'logo2.png', 'C:/xampp/htdocs/shoutmyshop/admin/images/restaurantImages/RST05FUNFOOD/logo', 'It is located in New Delhi', 'Yes', 'Yes', 'Yes', 70, '90 min', 'Lunch', '');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewId` varchar(11) NOT NULL,
  `reviewType` varchar(12) NOT NULL,
  `restaurant/DeliveryBoyId` varchar(11) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `review` varchar(750) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`reviewId`, `reviewType`, `restaurant/DeliveryBoyId`, `userEmail`, `review`, `rating`) VALUES
('REV01', 'Delivery Boy', 'RID01', 'kamal@gmail.com', 'It is very good.', 2),
('REV02', 'Delivery Boy', 'DBY01', 'ajay@gmail.com', 'He is very Fast\r\n', 4),
('REV03', 'Restaurant', 'RID02', 'aman@gmail.com', 'It is not so good', 5);

-- --------------------------------------------------------

--
-- Table structure for table `timings`
--

CREATE TABLE `timings` (
  `restaurantId` varchar(50) DEFAULT NULL,
  `timings` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timings`
--

INSERT INTO `timings` (`restaurantId`, `timings`) VALUES
('RID01', '9:AM-9:PM'),
('RID02', '10:AM-10:PM'),
('RID03', '9:AM-7:PM');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transactionID` int(50) NOT NULL,
  `referenceNo` int(50) NOT NULL,
  `orderID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionID`, `referenceNo`, `orderID`) VALUES
(1, 1, 'OID01'),
(2, 2, 'OID02'),
(3, 3, 'OID03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(150) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `profilePhotoPath` varchar(1000) NOT NULL,
  `profilePhotoName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `email`, `password`, `salt`, `firstName`, `lastName`, `phone`, `profilePhotoPath`, `profilePhotoName`) VALUES
('', '', '', '', '', '', 0, '', ''),
('1', 'xc', 'dfg', 'df', 'g', 'dfg', 8, 'cvbn', 'fg'),
('fg', 'sdf', 'dfg', 'f', 'g', 'fg', 567, 'fg', 'hf'),
('UID02', 'aman@gmail.com', 'sdfgh', 'asdfghjk', 'aman', 'goel', 9876543214, 'C:\\xampp\\htdocs\\shoutmyshop\\admin\\images\\userProfileImages\\sdfghj.jpg', 'sdfghj.jpg'),
('UID03', 'kajal@gmail.com', 'asdfgh', 'sdfghj', 'kajal', 'verma', 8763485612, 'C:\\xampp\\htdocs\\shoutmyshop\\admin\\images\\userProfileImages\\fghjk.jpg', 'fghjk.jpg'),
('UID04', 'email', 'password', 'salt', 'firstName', 'lastName', 0, 'profilePhotoPath', 'profilePhotoName');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodId`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewId`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transactionID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transactionID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
