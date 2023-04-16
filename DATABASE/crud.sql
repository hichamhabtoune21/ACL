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
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `Area` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`Area`) VALUES
('Center'),
('North-East'),
('North-West'),
('South');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ID_Client` int NOT NULL,
  `VAT number` int NOT NULL,
  `Name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Surname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Area` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ID_Client`, `VAT number`, `Name`, `Surname`, `Phone`, `Address`, `Area`) VALUES
(1, 123456789, 'Mario', 'Rossi', '1234567890', 'Via Roma, 1', 'Center'),
(2, 234567890, 'Luigi', 'Bianchi', '2345678901', 'Piazza del Popolo, 2', 'Center'),
(3, 345678901, 'Paolo', 'Verdi', '3456789012', 'Corso Italia, 3', 'North-East'),
(4, 456789012, 'Giovanna', 'Neri', '4567890123', 'Via Garibaldi, 4', 'North-West'),
(5, 567890123, 'Silvia', 'Ferrari', '5678901234', 'Via Dante, 5', 'South'),
(6, 678901234, 'Riccardo', 'Baldi', '6789012345', 'Viale dei Tigli, 6', 'South');

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
  `ID_Client` int DEFAULT NULL
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
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`Area`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID_Client`),
  ADD KEY `fk_area` (`Area`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`ID_Invoice`),
  ADD KEY `ID_Cliente(FK)` (`ID_Client`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`Permission`);

--
-- Indexes for table `permission_to_role`
--
ALTER TABLE `permission_to_role`
  ADD KEY `fk_role` (`Role`),
  ADD KEY `fk_permission` (`Permission`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_User`),
  ADD KEY `Ruolo(FK)` (`Role`),
  ADD KEY `Area(FK)` (`Area`);

--
-- Indexes for table `user_manage_client`
--
ALTER TABLE `user_manage_client`
  ADD KEY `fk_client` (`ID_Client`),
  ADD KEY `fk_user` (`ID_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ID_Client` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `ID_Invoice` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000015;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_area` FOREIGN KEY (`Area`) REFERENCES `area` (`Area`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `ID_Cliente(FK)` FOREIGN KEY (`ID_Client`) REFERENCES `client` (`ID_Client`);

--
-- Constraints for table `permission_to_role`
--
ALTER TABLE `permission_to_role`
  ADD CONSTRAINT `fk_permission` FOREIGN KEY (`Permission`) REFERENCES `permission` (`Permission`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`Role`) REFERENCES `role` (`Role`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `Area(FK)` FOREIGN KEY (`Area`) REFERENCES `area` (`Area`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Ruolo_FK` FOREIGN KEY (`Role`) REFERENCES `role` (`Role`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user_manage_client`
--
ALTER TABLE `user_manage_client`
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`ID_Client`) REFERENCES `client` (`ID_Client`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;