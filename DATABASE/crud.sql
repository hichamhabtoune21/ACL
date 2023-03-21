-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 21, 2023 alle 16:47
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
-- Struttura della tabella `client`
--

CREATE TABLE `client` (
  `ID_Client` int(11) NOT NULL,
  `VAT number` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `client`
--

INSERT INTO `client` (`ID_Client`, `VAT number`, `Name`, `Surname`, `Phone`, `Address`) VALUES
(1, 1111111, 'Brutto', 'Bruttino', '3349760340', 'via bello'),
(2, 101010101, 'Bello', 'Bellino', '0101010101', 'via bello');

-- --------------------------------------------------------

--
-- Struttura della tabella `invoice`
--

CREATE TABLE `invoice` (
  `ID_Invoice` int(11) NOT NULL,
  `Progressive number` int(11) NOT NULL,
  `Issuing date` date NOT NULL,
  `Business name` varchar(30) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Payment type` varchar(20) NOT NULL,
  `ID_Client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `invoice`
--

INSERT INTO `invoice` (`ID_Invoice`, `Progressive number`, `Issuing date`, `Business name`, `Amount`, `Payment type`, `ID_Client`) VALUES
(43, 2147483647, '2023-03-23', '2332132132131', 2123213, 'cash', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `permission`
--

CREATE TABLE `permission` (
  `Permission` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `permission_belong_to_role`
--

CREATE TABLE `permission_belong_to_role` (
  `Permission` varchar(15) NOT NULL,
  `Role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `role`
--

CREATE TABLE `role` (
  `Role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`ID_User`, `Email`, `Password`, `Username`, `Name`, `Surname`, `Role`) VALUES
(5, 'admin@admin.com', 'admin', 'admin', 'admin', 'admin', 'Admin'),
(7, 'prova@prova.com', 'prova', 'o', 'prova', 'prova', 'Area Manager');

-- --------------------------------------------------------

--
-- Struttura della tabella `user_manage_invoice`
--

CREATE TABLE `user_manage_invoice` (
  `ID_Invoice` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID_Client`);

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
-- Indici per le tabelle `permission_belong_to_role`
--
ALTER TABLE `permission_belong_to_role`
  ADD KEY `Permesso(FK)` (`Permission`),
  ADD KEY `Ruolo_FK` (`Role`);

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
  ADD KEY `Ruolo(FK)` (`Role`);

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
  MODIFY `ID_Client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `invoice`
--
ALTER TABLE `invoice`
  MODIFY `ID_Invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `ID_Cliente(FK)` FOREIGN KEY (`ID_Client`) REFERENCES `client` (`ID_Client`);

--
-- Limiti per la tabella `permission_belong_to_role`
--
ALTER TABLE `permission_belong_to_role`
  ADD CONSTRAINT `Permesso(FK)` FOREIGN KEY (`Permission`) REFERENCES `permission` (`Permission`),
  ADD CONSTRAINT `Ruolo_FK` FOREIGN KEY (`Role`) REFERENCES `role` (`Role`);

--
-- Limiti per la tabella `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `Ruolo(FK)` FOREIGN KEY (`Role`) REFERENCES `role` (`Role`);

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
