-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 24, 2023 at 05:32 PM
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
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ID_Client` int NOT NULL,
  `VAT number` int NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ID_Client`, `VAT number`, `Name`, `Surname`, `Phone`, `Address`) VALUES
(1, 123456789, 'Mario', 'Rossi', '1234567890', 'Via Roma, 1'),
(2, 234567890, 'Luigi', 'Bianchi', '2345678901', 'Piazza del Popolo, 2'),
(3, 345678901, 'Paolo', 'Verdi', '3456789012', 'Corso Italia, 3'),
(4, 456789012, 'Giovanna', 'Neri', '4567890123', 'Via Garibaldi, 4'),
(5, 567890123, 'Silvia', 'Ferrari', '5678901234', 'Via Dante, 5'),
(6, 678901234, 'Riccardo', 'Baldi', '6789012345', 'Viale dei Tigli, 6');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `ID_Invoice` int NOT NULL,
  `Progressive number` int NOT NULL,
  `Issuing date` date NOT NULL,
  `Business name` varchar(30) NOT NULL,
  `Amount` int NOT NULL,
  `Payment type` varchar(20) NOT NULL,
  `ID_Client` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`ID_Invoice`, `Progressive number`, `Issuing date`, `Business name`, `Amount`, `Payment type`, `ID_Client`) VALUES
(1, 100, '2023-03-01', 'ABC Company', 500, 'Credit Card', 1),
(2, 101, '2023-03-05', 'XYZ Inc', 1000, 'Cash', 2),
(3, 102, '2023-03-10', 'ACME Ltd', 750, 'Credit Card', 3),
(4, 103, '2023-03-15', '123 Corporation', 1250, 'Bank Transfer', 4),
(5, 104, '2023-03-20', 'QWERTY Co.', 2500, 'PayPal', 5),
(6, 105, '2023-03-25', 'GHI Group', 900, 'Credit Card', 6);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `Permission` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_belong_to_role`
--

CREATE TABLE `permission_belong_to_role` (
  `Permission` varchar(15) NOT NULL,
  `Role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `Role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`Role`) VALUES
('Admin'),
('Administration'),
('Area Manager'),
('Commercial');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_User` int NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_User`, `Email`, `Password`, `Username`, `Name`, `Surname`, `Role`) VALUES
(1, 'admin@admin.com', 'admin', 'admin', 'admin', 'admin', 'Admin'),
(2, 'jane.smith@example.com', 'password2', 'janesmith', 'Jane', 'Smith', 'Administration'),
(3, 'mark.johnson@example.com', 'password3', 'markjohnson', 'Mark', 'Johnson', 'Administration'),
(4, 'sarah.green@example.com', 'password4', 'sarahgreen', 'Sarah', 'Green', 'Area Manager'),
(5, 'chris.wilson@example.com', 'password5', 'chriswilson', 'Chris', 'Wilson', 'Area Manager'),
(6, 'emily.davis@example.com', 'password6', 'emilydavis', 'Emily', 'Davis', 'Commercial');

-- --------------------------------------------------------

--
-- Table structure for table `user_manage_client`
--

CREATE TABLE `user_manage_client` (
  `ID_User` int NOT NULL,
  `ID_Client` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_manage_client`
--

INSERT INTO `user_manage_client` (`ID_User`, `ID_Client`) VALUES
(1, 1),
(2, 2),
(2, 3),
(3, 1),
(4, 4),
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_manage_invoice`
--

CREATE TABLE `user_manage_invoice` (
  `ID_Invoice` int NOT NULL,
  `ID_User` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_manage_invoice`
--

INSERT INTO `user_manage_invoice` (`ID_Invoice`, `ID_User`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 1),
(5, 4),
(6, 5),
(1, 1),
(2, 2),
(3, 3),
(4, 1),
(5, 4),
(6, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID_Client`);

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
-- Indexes for table `permission_belong_to_role`
--
ALTER TABLE `permission_belong_to_role`
  ADD KEY `Permesso(FK)` (`Permission`),
  ADD KEY `Ruolo_FK` (`Role`);

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
  ADD KEY `Ruolo(FK)` (`Role`);

--
-- Indexes for table `user_manage_client`
--
ALTER TABLE `user_manage_client`
  ADD KEY `fk_client` (`ID_Client`),
  ADD KEY `fk_user` (`ID_User`);

--
-- Indexes for table `user_manage_invoice`
--
ALTER TABLE `user_manage_invoice`
  ADD KEY `ID_Fattura(FK)` (`ID_Invoice`),
  ADD KEY `ID_User(FK)` (`ID_User`);

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
  MODIFY `ID_Invoice` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `ID_Cliente(FK)` FOREIGN KEY (`ID_Client`) REFERENCES `client` (`ID_Client`);

--
-- Constraints for table `permission_belong_to_role`
--
ALTER TABLE `permission_belong_to_role`
  ADD CONSTRAINT `Permesso(FK)` FOREIGN KEY (`Permission`) REFERENCES `permission` (`Permission`),
  ADD CONSTRAINT `Ruolo_FK` FOREIGN KEY (`Role`) REFERENCES `role` (`Role`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `Ruolo(FK)` FOREIGN KEY (`Role`) REFERENCES `role` (`Role`);

--
-- Constraints for table `user_manage_client`
--
ALTER TABLE `user_manage_client`
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`ID_Client`) REFERENCES `client` (`ID_Client`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user_manage_invoice`
--
ALTER TABLE `user_manage_invoice`
  ADD CONSTRAINT `ID_Fattura(FK)` FOREIGN KEY (`ID_Invoice`) REFERENCES `invoice` (`ID_Invoice`),
  ADD CONSTRAINT `ID_User(FK)` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
