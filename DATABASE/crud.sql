-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 06:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
  `ID_Client` int(11) NOT NULL,
  `VAT number` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ID_Client`, `VAT number`, `Name`, `Surname`, `Phone`, `Address`) VALUES
(1, 1111111, 'Brutto', 'Bruttino', '3349760340', 'via bello'),
(2, 101010101, 'Bello', 'Bellino', '0101010101', 'via bello');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `ID_Invoice` int(11) NOT NULL,
  `Progressive number` int(11) NOT NULL,
  `Issuing date` date NOT NULL,
  `Business name` varchar(30) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Payment type` varchar(20) NOT NULL,
  `ID_Client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`ID_Invoice`, `Progressive number`, `Issuing date`, `Business name`, `Amount`, `Payment type`, `ID_Client`) VALUES
(30, 10, '2023-02-19', 'aaaaa', 1, 'card', 1),
(36, 1111, '2023-03-04', 'siiiiiiiiiiiiiii', 9, 'cash', 1),
(42, 99, '2023-02-24', 'a', 10, 'card', 2);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `Permission` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_belong_to_role`
--

CREATE TABLE `permission_belong_to_role` (
  `Permission` varchar(15) NOT NULL,
  `Role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `Role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`Role`) VALUES
('Admin'),
('Amministrazione'),
('Capo area'),
('Commerciale');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_User` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_User`, `Email`, `Password`, `Username`, `Name`, `Surname`, `Role`) VALUES
(5, 'admin@admin.com', 'admin', 'admin', 'admin', 'admin', 'Admin'),
(7, 'prova@prova.com', 'prova', 'o', 'prova', 'prova', 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `user_manage_invoice`
--

CREATE TABLE `user_manage_invoice` (
  `ID_Invoice` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `ID_Client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `ID_Invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Constraints for table `user_manage_invoice`
--
ALTER TABLE `user_manage_invoice`
  ADD CONSTRAINT `ID_Fattura(FK)` FOREIGN KEY (`ID_Invoice`) REFERENCES `invoice` (`ID_Invoice`),
  ADD CONSTRAINT `ID_User(FK)` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
