-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2022 at 02:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goto_gro_databases`
--

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `saleID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `SKU` int(11) NOT NULL,
  `itemQuantityBought` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`saleID`, `userID`, `SKU`, `itemQuantityBought`, `date`) VALUES
(11, 2, 2, 2, '2022-01-04'),
(11, 2, 3, 1, '2022-01-04'),
(11, 2, 8, 9, '2022-01-04'),
(11, 2, 9, 5, '2022-01-04'),
(15, 2, 3, 2, '2022-02-03'),
(15, 2, 5, 1, '2022-02-03'),
(36, 3, 2, 1, '2022-04-16'),
(36, 3, 5, 2, '2022-04-16'),
(36, 3, 7, 2, '2022-04-16'),
(37, 2, 2, 1, '2022-04-24'),
(37, 2, 5, 2, '2022-04-24'),
(37, 2, 7, 2, '2022-04-24'),
(37, 2, 9, 1, '2022-04-24'),
(37, 2, 10, 2, '2022-04-24'),
(38, 5, 3, 5, '2022-10-14'),
(38, 5, 5, 5, '2022-10-14'),
(39, 5, 5, 5, '2022-10-14'),
(40, 5, 6, 8, '2022-10-14'),
(41, 5, 9, 4, '2022-10-14'),
(42, 5, 1, 11, '2022-10-14');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `SKU` int(11) NOT NULL,
  `stockName` varchar(100) NOT NULL,
  `stockPrice_AUD` decimal(5,2) NOT NULL CHECK (`stockPrice_AUD` <> 0),
  `stockQuantity` int(11) NOT NULL,
  `stockCategory` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`SKU`, `stockName`, `stockPrice_AUD`, `stockQuantity`, `stockCategory`) VALUES
(1, 'Carrots 1kg pack', '5.00', 20, 'fresh vegetables'),
(2, 'Linenorth Soap 5 bar pack', '12.00', 40, 'household'),
(3, 'Fresh chicken wings 1kg pack', '9.00', 20, 'fresh meat'),
(4, 'Fresh chicken thighs 1kg pack', '15.00', 20, 'fresh meat'),
(5, 'Panadol Rapid Water tablet 100 capsules', '6.00', 20, 'medicine'),
(6, 'King Oscars Olive Sardines 120g pack', '9.00', 20, 'canned meat'),
(7, 'King Oscars Tomato Sardines 120g pack', '9.00', 20, 'canned meat'),
(8, 'Ace Toilet cleaner liquid 2L Bottle', '8.00', 10, 'toiletry'),
(9, 'Softies 3pl 200 sheets box', '10.00', 10, 'tissues'),
(10, 'McAlistor 2pl 20 toilet rolls pack', '15.00', 30, 'tissues'),
(11, 'Whiskerpals Tuna cat feed 300gr pack', '12.00', 5, 'pet food'),
(12, 'Whiskerpals Beef liver dog feed 50gr can', '2.00', 5, 'pet food'),
(13, 'Whiskerpals Tuna cat feed 40gr can', '2.00', 10, 'pet food'),
(14, 'GotoGro Frozen Vegetable Mix 1kg bag', '5.00', 20, 'frozen food'),
(15, 'GotoGro Frozen Mixed meal 300gr pack', '6.00', 10, 'frozen food'),
(16, 'Subfreezie artisan infused ice 2kg bag', '30.00', 2, 'frozen food'),
(17, 'Panadol soluble 10 tablets', '15.00', 0, 'medicine'),
(18, 'GotoGro Plain flour 2kg bag', '4.00', 1, 'baking goods');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userFirstName` varchar(12) NOT NULL,
  `userLastName` varchar(12) NOT NULL,
  `userType` varchar(12) NOT NULL CHECK (`userType` = 'Bronze' or `userType` = 'Silver' or `userType` = 'Gold' or `userType` = 'Floorstaff' or `userType` = 'Manager'),
  `userEmail` varchar(255) NOT NULL CHECK (`userEmail` <> ''),
  `userPhone` char(10) NOT NULL CHECK (`userPhone` <> ''),
  `userAddress` varchar(50) DEFAULT NULL CHECK (`userAddress` <> ''),
  `userLoginName` varchar(16) NOT NULL CHECK (`userLoginName` <> ''),
  `userPassword` varchar(16) NOT NULL CHECK (`userPassword` <> '')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userFirstName`, `userLastName`, `userType`, `userEmail`, `userPhone`, `userAddress`, `userLoginName`, `userPassword`) VALUES
(2, 'Johnathan', 'Ferguson', 'Silver', 'ep1cpewman@royalarmory.com', '0455676244', 'G11 Heckler St', 'JF1911', 'tewworlwards'),
(3, 'Man', 'Nadger', 'Manager', 'MN2011@GotoGro.com.au', '0412456755', '23 Albert Av', 'albakanov545', 'tClGhRC'),
(4, 'John', 'Anyman', 'Bronze', 'JAdue@norMail.com.au', '0423113445', '1 Every Rd', 'JA123', 'fa14'),
(5, 'Rich', 'Everyguy', 'Floorstaff', 'RE2244@GotoGro.com.au', '0412342547', '2 Jane St', 'RE473', 'nrml'),
(6, 'Edwards', 'Kenningway', 'Floorstaff', 'EK627@GotoGro.com.au', '0414532667', '14 Randell Rd', 'EdKFlStff', 'flstps127'),
(7, 'asd', 'asdasd', 'Manager', 'asfsfassdf', '1212412412', '12124124124', '123', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`saleID`,`SKU`),
  ADD KEY `userID` (`userID`),
  ADD KEY `SKU` (`SKU`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`SKU`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `SKU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`SKU`) REFERENCES `stock` (`SKU`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
