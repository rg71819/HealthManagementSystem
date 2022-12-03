-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 03, 2022 at 11:27 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adstest`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer_information`
--

CREATE TABLE `buyer_information` (
  `BuyerID` int(11) NOT NULL,
  `BuyerName` varchar(30) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `StockID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer_information`
--

INSERT INTO `buyer_information` (`BuyerID`, `BuyerName`, `Address`, `Phone`, `StockID`) VALUES
(10000008, 'h', 'hh', '12345', 10000011),
(10000009, 'khkj', 'hkjhkj', '45454', 10000020),
(10000010, 'sp', 'hkdhakh', '12345689', 10000011);

-- --------------------------------------------------------

--
-- Table structure for table `customer_information`
--

CREATE TABLE `customer_information` (
  `CustomerID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_information`
--

INSERT INTO `customer_information` (`CustomerID`, `Name`, `Address`, `Phone`) VALUES
(10000000, 'ghjgj', 'gjhgjh', '445455'),
(10000001, 'hkhk', 'hkhkjh', '4565464'),
(10000002, 'abdul', 'cape town', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `payment_information`
--

CREATE TABLE `payment_information` (
  `TransactionId` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `order_details` varchar(1000) DEFAULT NULL,
  `Payment_status` enum('success','pending','default') DEFAULT NULL,
  `AmountToBePaid` double NOT NULL,
  `transaction_date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_information`
--

INSERT INTO `payment_information` (`TransactionId`, `CustomerID`, `order_details`, `Payment_status`, `AmountToBePaid`, `transaction_date_time`) VALUES
(10000000, 10000000, 'a:2:{i:0;a:4:{s:7:\"item_id\";s:8:\"10000019\";s:9:\"item_name\";s:15:\"Slide strainers\";s:10:\"item_price\";s:2:\"46\";s:13:\"item_quantity\";s:1:\"5\";}i:1;a:4:{s:7:\"item_id\";s:8:\"10000020\";s:9:\"item_name\";s:32:\"Magnetic resonance imaging (MRI)\";s:10:\"item_price\";s:6:\"100000\";s:13:\"item_quantity\";s:1:\"1\";}}', 'success', 100230, '2022-12-03 20:07:39'),
(10000001, 10000000, 'a:1:{i:0;a:4:{s:7:\"item_id\";s:8:\"10000020\";s:9:\"item_name\";s:32:\"Magnetic resonance imaging (MRI)\";s:10:\"item_price\";s:6:\"100000\";s:13:\"item_quantity\";s:1:\"1\";}}', 'success', 100000, '2022-12-03 20:19:36'),
(10000002, 10000000, 'a:1:{i:0;a:4:{s:7:\"item_id\";s:8:\"10000008\";s:9:\"item_name\";s:33:\"Urine Reagent Strips 10 Parameter\";s:10:\"item_price\";s:3:\"120\";s:13:\"item_quantity\";s:1:\"1\";}}', 'success', 120, '2022-12-03 20:49:30'),
(10000003, 10000000, 'a:1:{i:0;a:4:{s:7:\"item_id\";s:8:\"10000016\";s:9:\"item_name\";s:21:\"Electrolyte analyzers\";s:10:\"item_price\";s:4:\"8800\";s:13:\"item_quantity\";s:1:\"1\";}}', 'pending', 8800, '2022-12-03 20:52:13'),
(10000004, 10000000, 'a:1:{i:0;a:4:{s:7:\"item_id\";s:8:\"10000011\";s:9:\"item_name\";s:30:\"Conical centrifuge tube, 15 ml\";s:10:\"item_price\";s:2:\"48\";s:13:\"item_quantity\";s:1:\"1\";}}', 'default', 48, '2022-12-03 20:53:05'),
(10000005, 10000000, 'a:1:{i:0;a:4:{s:7:\"item_id\";s:8:\"10000016\";s:9:\"item_name\";s:21:\"Electrolyte analyzers\";s:10:\"item_price\";s:4:\"8800\";s:13:\"item_quantity\";s:1:\"1\";}}', 'default', 8800, '2022-12-03 21:03:22'),
(10000006, 10000001, 'a:1:{i:0;a:4:{s:7:\"item_id\";s:8:\"10000016\";s:9:\"item_name\";s:21:\"Electrolyte analyzers\";s:10:\"item_price\";s:4:\"8800\";s:13:\"item_quantity\";s:1:\"1\";}}', 'success', 8800, '2022-12-03 21:16:14'),
(10000007, 10000002, 'a:2:{i:0;a:4:{s:7:\"item_id\";s:8:\"10000001\";s:9:\"item_name\";s:11:\"Ventilators\";s:10:\"item_price\";s:4:\"6000\";s:13:\"item_quantity\";s:1:\"1\";}i:1;a:4:{s:7:\"item_id\";s:8:\"10000002\";s:9:\"item_name\";s:29:\"Cardiopulmonary bypass device\";s:10:\"item_price\";s:4:\"7000\";s:13:\"item_quantity\";s:1:\"1\";}}', 'success', 13000, '2022-12-03 21:28:20'),
(10000009, 10000002, 'a:2:{i:0;a:4:{s:7:\"item_id\";s:8:\"10000001\";s:9:\"item_name\";s:11:\"Ventilators\";s:10:\"item_price\";s:4:\"6000\";s:13:\"item_quantity\";s:1:\"1\";}i:1;a:4:{s:7:\"item_id\";s:8:\"10000002\";s:9:\"item_name\";s:29:\"Cardiopulmonary bypass device\";s:10:\"item_price\";s:4:\"7000\";s:13:\"item_quantity\";s:1:\"1\";}}', 'default', 13000, '2022-12-03 21:29:10'),
(10000011, 10000002, 'a:2:{i:0;a:4:{s:7:\"item_id\";s:8:\"10000001\";s:9:\"item_name\";s:11:\"Ventilators\";s:10:\"item_price\";s:4:\"6000\";s:13:\"item_quantity\";s:1:\"1\";}i:1;a:4:{s:7:\"item_id\";s:8:\"10000002\";s:9:\"item_name\";s:29:\"Cardiopulmonary bypass device\";s:10:\"item_price\";s:4:\"7000\";s:13:\"item_quantity\";s:1:\"1\";}}', 'pending', 13000, '2022-12-03 21:44:52'),
(10000013, 10000002, 'a:2:{i:0;a:4:{s:7:\"item_id\";s:8:\"10000001\";s:9:\"item_name\";s:11:\"Ventilators\";s:10:\"item_price\";s:4:\"6000\";s:13:\"item_quantity\";s:1:\"1\";}i:1;a:4:{s:7:\"item_id\";s:8:\"10000002\";s:9:\"item_name\";s:29:\"Cardiopulmonary bypass device\";s:10:\"item_price\";s:4:\"7000\";s:13:\"item_quantity\";s:1:\"1\";}}', 'success', 13000, '2022-12-03 21:46:05'),
(10000014, 10000001, 'a:1:{i:0;a:4:{s:7:\"item_id\";s:8:\"10000020\";s:9:\"item_name\";s:32:\"Magnetic resonance imaging (MRI)\";s:10:\"item_price\";s:6:\"100000\";s:13:\"item_quantity\";s:1:\"1\";}}', 'success', 100000, '2022-12-03 23:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `payment_information1`
--

CREATE TABLE `payment_information1` (
  `TransactionId` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `order_details` varchar(1000) DEFAULT NULL,
  `Payment_status` enum('success','pending','default') DEFAULT NULL,
  `AmountToBePaid` double NOT NULL,
  `transaction_date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_information1`
--

INSERT INTO `payment_information1` (`TransactionId`, `CustomerID`, `order_details`, `Payment_status`, `AmountToBePaid`, `transaction_date_time`) VALUES
(10000000, 10000000, 'a:2:{i:0;a:4:{s:7:\"item_id\";s:8:\"10000019\";s:9:\"item_name\";s:15:\"Slide strainers\";s:10:\"item_price\";s:2:\"46\";s:13:\"item_quantity\";s:1:\"5\";}i:1;a:4:{s:7:\"item_id\";s:8:\"10000020\";s:9:\"item_name\";s:32:\"Magnetic resonance imaging (MRI)\";s:10:\"item_price\";s:6:\"100000\";s:13:\"item_quantity\";s:1:\"1\";}}', 'success', 100230, '2022-12-03 19:58:08');

-- --------------------------------------------------------

--
-- Table structure for table `stock_information`
--

CREATE TABLE `stock_information` (
  `StockID` int(11) NOT NULL,
  `StockName` varchar(50) NOT NULL,
  `QuantityInStock` int(11) NOT NULL,
  `buyPrice` double NOT NULL,
  `sellPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_information`
--

INSERT INTO `stock_information` (`StockID`, `StockName`, `QuantityInStock`, `buyPrice`, `sellPrice`) VALUES
(10000001, 'Ventilators', 20, 5000, 6000),
(10000002, 'Cardiopulmonary bypass device', 45, 6000, 7000),
(10000003, 'Dialysis machine', 35, 6500, 7000),
(10000004, 'Infusion pumps', 78, 1000, 1300),
(10000005, 'LASIK surgical machine', 85, 9800, 10200),
(10000006, 'Medical lasers', 0, 4700, 5500),
(10000007, 'Consult 120 Urine Analyzer', 1, 12500, 14000),
(10000008, 'Urine Reagent Strips 10 Parameter', 66, 100, 120),
(10000009, 'Consult Liquid Urine Control', 10, 200, 250),
(10000010, 'Plastic urine containers, sterile or unsterile', 150, 150, 180),
(10000011, 'Conical centrifuge tube, 15 ml', 130, 44, 48),
(10000012, 'Microscope slides and 1 coverslip', 200, 155, 160),
(10000013, 'Clinical Centrifuge', 15, 6000, 8000),
(10000014, 'Flow cytometers', 200, 155, 160),
(10000015, 'Blood gas analyzers', 20, 8500, 9000),
(10000016, 'Electrolyte analyzers', 257, 7800, 8800),
(10000017, 'Differential counters', 200, 1750, 1850),
(10000018, 'Coagulation analyzers', 155, 8000, 12000),
(10000019, 'Slide strainers', 30, 36, 46),
(10000020, 'Magnetic resonance imaging (MRI)', 15, 99000, 100000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer_information`
--
ALTER TABLE `buyer_information`
  ADD PRIMARY KEY (`BuyerID`),
  ADD KEY `StockID` (`StockID`);

--
-- Indexes for table `customer_information`
--
ALTER TABLE `customer_information`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `payment_information`
--
ALTER TABLE `payment_information`
  ADD PRIMARY KEY (`TransactionId`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `payment_information1`
--
ALTER TABLE `payment_information1`
  ADD PRIMARY KEY (`TransactionId`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `stock_information`
--
ALTER TABLE `stock_information`
  ADD PRIMARY KEY (`StockID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer_information`
--
ALTER TABLE `buyer_information`
  MODIFY `BuyerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000011;

--
-- AUTO_INCREMENT for table `customer_information`
--
ALTER TABLE `customer_information`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000003;

--
-- AUTO_INCREMENT for table `payment_information`
--
ALTER TABLE `payment_information`
  MODIFY `TransactionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000015;

--
-- AUTO_INCREMENT for table `payment_information1`
--
ALTER TABLE `payment_information1`
  MODIFY `TransactionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000001;

--
-- AUTO_INCREMENT for table `stock_information`
--
ALTER TABLE `stock_information`
  MODIFY `StockID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000021;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyer_information`
--
ALTER TABLE `buyer_information`
  ADD CONSTRAINT `buyer_information_ibfk_1` FOREIGN KEY (`StockID`) REFERENCES `stock_information` (`StockID`);

--
-- Constraints for table `payment_information`
--
ALTER TABLE `payment_information`
  ADD CONSTRAINT `payment_information_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer_information` (`CustomerID`);

--
-- Constraints for table `payment_information1`
--
ALTER TABLE `payment_information1`
  ADD CONSTRAINT `payment_information1_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer_information` (`CustomerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
