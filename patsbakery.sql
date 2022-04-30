-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2022 at 02:31 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patsbakery`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int NOT NULL,
  `CustFirstName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CustLastName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CustEmail` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CustPhone` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustFirstName`, `CustLastName`, `CustEmail`, `CustPhone`) VALUES
(2, 'Kailey', 'Karls', 'KailyKarls@gmail.com', '320-428-1867'),
(3, 'Martin', 'Schendel', '13mschen@gmail.com', '763-350-2480');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` int NOT NULL,
  `EmpFirstName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `EmpLastName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `EmpEmail` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `EmpPhone` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `EmpPassword` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `EmpUsername` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `EmpFirstName`, `EmpLastName`, `EmpEmail`, `EmpPhone`, `EmpPassword`, `EmpUsername`) VALUES
(4, 'Reece', 'Withouthisspoon', 'withouthisspoon@gmail.com', '1234567890', '$2y$10$wmG9qwx3QrZLYi1lNaiscuLLOqvh6BzmV8sN0eDM78gBFszh5LnOK', 'Reece'),
(5, 'Brandy', 'Glass', 'halffull@gmail.com', '0987654321', '$2y$10$OxaRcliiUlyxkvZALB7f3eBniFlcISUeUakEGElfGAxUsdwXIwoVy', 'Brandy');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ItemID` int NOT NULL,
  `ItemName` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ItemDescription` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ItemWholesaleCost` double NOT NULL,
  `ItemSalePrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ItemID`, `ItemName`, `ItemDescription`, `ItemWholesaleCost`, `ItemSalePrice`) VALUES
(2, 'White Bread', 'Tall, soft, light, and fluffy - the perfect classic white bread!', 0.5, 4),
(3, 'Wheat Bread', 'Moist and tender with delightful texture and wonderful aroma!', 0.75, 4.5),
(4, 'White Buns', 'Perfect buns for sandwiches or subs! Our white buns are fluffy and delicious!', 0.8, 3.75),
(5, 'Wheat Buns', 'Deliciously soft buns perfect for hamburgers, pulled pork, and more!', 0.85, 3.75),
(6, 'Flatbread', 'Soft and pliable, our flatbread is perfect for wraps and pizzas!', 0.75, 3),
(7, 'French Bread', 'Crisp and crunchy crust with a chewy center is what makes our french bread the talk of the town!', 0.6, 3.75);

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `OrderID` int NOT NULL,
  `ItemID` int NOT NULL,
  `Quantity` int NOT NULL,
  `UnitSalePrice` double NOT NULL,
  `FilledState` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ordersummary`
--

CREATE TABLE `ordersummary` (
  `OrderID` int NOT NULL,
  `CustomerID` int NOT NULL,
  `EmployeeID` int NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `OrderTotalPrice` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ItemID`),
  ADD KEY `ItemID` (`ItemID`);

-- Indexes for table `ordersummary`
--
ALTER TABLE `ordersummary`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`,`EmployeeID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ItemID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ordersummary`
--
ALTER TABLE `ordersummary`
  MODIFY `OrderID` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `item` (`ItemID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderitem_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `ordersummary` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ordersummary`
--
ALTER TABLE `ordersummary`
  ADD CONSTRAINT `ordersummary_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordersummary_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
