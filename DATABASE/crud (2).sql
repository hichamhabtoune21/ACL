-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 04, 2023 alle 16:21
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 8.1.2

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
-- Struttura della tabella `area`
--

CREATE TABLE `area` (
  `Area` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `area`
--

INSERT INTO `area` (`Area`) VALUES
('Center'),
('North-East'),
('North-West'),
('South');

-- --------------------------------------------------------

--
-- Struttura della tabella `client`
--

CREATE TABLE `client` (
  `ID_Client` int(11) NOT NULL,
  `VAT number` int(11) NOT NULL,
  `Name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Surname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Area` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `client`
--

INSERT INTO `client` (`ID_Client`, `VAT number`, `Name`, `Surname`, `Phone`, `Address`, `Area`) VALUES
(1, 123456789, 'Mario', 'Rossi', '1234567890', 'Via Roma, 1', NULL),
(2, 234567890, 'Luigi', 'Bianchi', '2345678901', 'Piazza del Popolo, 2', NULL),
(3, 345678901, 'Paolo', 'Verdi', '3456789012', 'Corso Italia, 3', NULL),
(4, 456789012, 'Giovanna', 'Neri', '4567890123', 'Via Garibaldi, 4', NULL),
(5, 567890123, 'Silvia', 'Ferrari', '5678901234', 'Via Dante, 5', NULL),
(6, 678901234, 'Riccardo', 'Baldi', '6789012345', 'Viale dei Tigli, 6', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `invoice`
--

CREATE TABLE `invoice` (
  `ID_Invoice` int(11) NOT NULL,
  `Progressive number` int(11) NOT NULL,
  `Issuing date` date NOT NULL,
  `Business name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Amount` int(11) NOT NULL,
  `Payment type` enum('Credit Card','Bank Transfer','Cash','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `invoice`
--

INSERT INTO `invoice` (`ID_Invoice`, `Progressive number`, `Issuing date`, `Business name`, `Amount`, `Payment type`, `ID_Client`) VALUES
(1, 70, '2023-03-10', 'ABC Company', 100, 'Cash', 1),
(2, 101, '2023-03-05', 'XYZ Inc', 1000, 'Credit Card', 2),
(3, 102, '2023-03-10', 'ACME Ltd', 750, 'Bank Transfer', 3),
(4, 103, '2023-03-15', '124 Corporation', 1250, 'Bank Transfer', 4),
(5, 104, '2023-03-20', 'QWERTY Co.', 2500, 'Bank Transfer', 5),
(6, 95, '2023-03-25', 'ABC Company', 900, 'Bank Transfer', 1),
(7, 97, '2023-03-04', 'ABC Company', 999, 'Bank Transfer', 1),
(51, 100, '2023-03-10', 'NONON', 10, 'Credit Card', 1),
(52, 100, '2023-03-01', 'ABC Company', 999999, 'Credit Card', 2),
(53, 100, '2023-03-11', 'NONON', 101, 'Credit Card', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `permission`
--

CREATE TABLE `permission` (
  `Permission` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `permission`
--

INSERT INTO `permission` (`Permission`) VALUES
('CREATE'),
('DELETE'),
('READ'),
('UPDATE');

-- --------------------------------------------------------

--
-- Struttura della tabella `permission_to_role`
--

CREATE TABLE `permission_to_role` (
  `Permission` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Role` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `permission_to_role`
--

INSERT INTO `permission_to_role` (`Permission`, `Role`) VALUES
('CREATE', 'Admin'),
('DELETE', 'Admin'),
('READ', 'Admin'),
('UPDATE', 'Admin');

-- --------------------------------------------------------

--
-- Struttura della tabella `role`
--

CREATE TABLE `role` (
  `Role` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `role`
--

INSERT INTO `role` (`Role`) VALUES
('Admin'),
('Administration'),
('Area Manager'),
('Commercial');

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `ID_User` int(11) NOT NULL,
  `Email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Surname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Role` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Area` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`ID_User`, `Email`, `Password`, `Username`, `Name`, `Surname`, `Role`, `Area`) VALUES
(1, 'admin@admin.com', '73acd9a5972130b75066c82595a1fae3', 'admin', 'admin', 'admin', 'Admin', NULL),
(2, 'jane.smith@example.com', 'e0ee1d48f2a4697296e3e30d47cb2c56', 'administration', 'Jane', 'Smith', 'Area Manager', 'Center'),
(3, 'mark.johnson@example.com', '85cb6e404c053c4b6496bff59072f4a3', 'markjohnson', 'Mark', 'Johnson', 'Administration', NULL),
(4, 'sarah.green@example.com', '7e04f1c6edc0eebe28cccced959d722b', 'sarahgreen', 'Sarah', 'Green', 'Commercial', NULL),
(5, 'chris.wilson@example.com', '25b27d82757ee2e9e12baef2757b22a7', 'chriswilson', 'Chris', 'Wilson', 'Administration', NULL),
(6, 'commercial@commercial.com', '5f875ae2d380eacd61e157f31e92162a', 'commercial', 'Emily', 'Davis', 'Commercial', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `user_manage_client`
--

CREATE TABLE `user_manage_client` (
  `ID_User` int(11) NOT NULL,
  `ID_Client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `user_manage_client`
--

INSERT INTO `user_manage_client` (`ID_User`, `ID_Client`) VALUES
(6, 1),
(6, 2),
(6, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `user_manage_invoice`
--

CREATE TABLE `user_manage_invoice` (
  `ID_Invoice` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `user_manage_invoice`
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
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`Area`);

--
-- Indici per le tabelle `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID_Client`),
  ADD KEY `areafk` (`Area`);

--
-- Indici per le tabelle `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`ID_Invoice`),
  ADD KEY `ID_Cliente(FK)` (`ID_Client`);

--
-- Indici per le tabelle `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`Permission`);

--
-- Indici per le tabelle `permission_to_role`
--
ALTER TABLE `permission_to_role`
  ADD KEY `Permission(fk)` (`Permission`),
  ADD KEY `role(fk)` (`Role`);

--
-- Indici per le tabelle `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Role`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_User`),
  ADD KEY `Ruolo(FK)` (`Role`),
  ADD KEY `area_fk` (`Area`);

--
-- Indici per le tabelle `user_manage_client`
--
ALTER TABLE `user_manage_client`
  ADD KEY `fk_client` (`ID_Client`),
  ADD KEY `fk_user` (`ID_User`);

--
-- Indici per le tabelle `user_manage_invoice`
--
ALTER TABLE `user_manage_invoice`
  ADD KEY `ID_Fattura(FK)` (`ID_Invoice`),
  ADD KEY `ID_User(FK)` (`ID_User`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `client`
--
ALTER TABLE `client`
  MODIFY `ID_Client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `invoice`
--
ALTER TABLE `invoice`
  MODIFY `ID_Invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `areafk` FOREIGN KEY (`Area`) REFERENCES `area` (`Area`);

--
-- Limiti per la tabella `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `ID_Cliente(FK)` FOREIGN KEY (`ID_Client`) REFERENCES `client` (`ID_Client`);

--
-- Limiti per la tabella `permission_to_role`
--
ALTER TABLE `permission_to_role`
  ADD CONSTRAINT `Permission(fk)` FOREIGN KEY (`Permission`) REFERENCES `permission` (`Permission`),
  ADD CONSTRAINT `role(fk)` FOREIGN KEY (`Role`) REFERENCES `role` (`Role`);

--
-- Limiti per la tabella `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `Ruolo(FK)` FOREIGN KEY (`Role`) REFERENCES `role` (`Role`),
  ADD CONSTRAINT `area_fk` FOREIGN KEY (`Area`) REFERENCES `area` (`Area`);

--
-- Limiti per la tabella `user_manage_client`
--
ALTER TABLE `user_manage_client`
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`ID_Client`) REFERENCES `client` (`ID_Client`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `user_manage_invoice`
--
ALTER TABLE `user_manage_invoice`
  ADD CONSTRAINT `ID_Fattura(FK)` FOREIGN KEY (`ID_Invoice`) REFERENCES `invoice` (`ID_Invoice`),
  ADD CONSTRAINT `ID_User(FK)` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
