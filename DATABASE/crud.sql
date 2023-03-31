-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 31, 2023 at 08:03 PM
-- Server version: 8.0.32
-- PHP Version: 8.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `ID_Invoice` int NOT NULL,
  `Progressive number` int NOT NULL,
  `Issuing date` date NOT NULL,
  `Business name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Amount` int NOT NULL,
  `Payment type` enum('Credit Card','Bank Transfer','Cash','') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Client` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`ID_Invoice`, `Progressive number`, `Issuing date`, `Business name`, `Amount`, `Payment type`, `ID_Client`) VALUES
(2, 102, '2023-03-05', 'XYZ Inc', 1000, 'Cash', 2),
(3, 102, '2023-03-10', 'ACME Ltd', 750, 'Bank Transfer', 3),
(4, 90, '2023-03-15', '122 Corporation', 1250, 'Bank Transfer', 4),
(5, 104, '2023-03-20', 'QWERTY Co.', 2500, 'Bank Transfer', 5),
(6, 95, '2023-03-25', 'ABC Company', 900, 'Bank Transfer', 1),
(7, 97, '2023-03-04', 'ABC Company', 999, 'Bank Transfer', 1),
(52, 100, '2023-03-01', 'ABC Company', 999999, 'Credit Card', 2),
(55, 10, '2023-03-18', 'ABC Company', 10, 'Credit Card', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`ID_Invoice`),
  ADD KEY `ID_Cliente(FK)` (`ID_Client`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `ID_Invoice` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `ID_Cliente(FK)` FOREIGN KEY (`ID_Client`) REFERENCES `client` (`ID_Client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
