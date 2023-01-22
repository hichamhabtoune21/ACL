-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 22, 2023 alle 16:06
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 8.1.6

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
-- Struttura della tabella `cliente`
--

CREATE TABLE `cliente` (
  `ID_Cliente` int(11) NOT NULL,
  `partita IVA` int(11) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Indirizzo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `fattura`
--

CREATE TABLE `fattura` (
  `ID_Fattura` int(11) NOT NULL,
  `Numero progressivo` int(11) NOT NULL,
  `Data di emissione` date NOT NULL,
  `Ragione sociale` varchar(30) NOT NULL,
  `Importo` int(11) NOT NULL,
  `Tipo di pagamento` varchar(20) NOT NULL,
  `ID_Cliente` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `permesso`
--

CREATE TABLE `permesso` (
  `Permesso` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `permesso_appartiene_ruolo`
--

CREATE TABLE `permesso_appartiene_ruolo` (
  `Permesso` varchar(15) NOT NULL,
  `Ruolo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `ruolo`
--

CREATE TABLE `ruolo` (
  `Ruolo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `ID_User` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `Ruolo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`ID_User`, `Email`, `Password`, `Username`, `Nome`, `Cognome`, `Ruolo`) VALUES
(2, 'ok', 'ok', 'ok', 'ok', 'ok', 'NULL');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID_Cliente`);

--
-- Indici per le tabelle `fattura`
--
ALTER TABLE `fattura`
  ADD PRIMARY KEY (`ID_Fattura`),
  ADD KEY `ID_Cliente(FK)` (`ID_Cliente`),
  ADD KEY `ID_User(FK)` (`ID_User`);

--
-- Indici per le tabelle `permesso`
--
ALTER TABLE `permesso`
  ADD PRIMARY KEY (`Permesso`);

--
-- Indici per le tabelle `permesso_appartiene_ruolo`
--
ALTER TABLE `permesso_appartiene_ruolo`
  ADD KEY `Permesso(FK)` (`Permesso`),
  ADD KEY `Ruolo_FK` (`Ruolo`);

--
-- Indici per le tabelle `ruolo`
--
ALTER TABLE `ruolo`
  ADD PRIMARY KEY (`Ruolo`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_User`),
  ADD KEY `Ruolo(FK)` (`Ruolo`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID_Cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `fattura`
--
ALTER TABLE `fattura`
  MODIFY `ID_Fattura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `fattura`
--
ALTER TABLE `fattura`
  ADD CONSTRAINT `ID_Cliente(FK)` FOREIGN KEY (`ID_Cliente`) REFERENCES `cliente` (`ID_Cliente`),
  ADD CONSTRAINT `ID_User(FK)` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`);

--
-- Limiti per la tabella `permesso_appartiene_ruolo`
--
ALTER TABLE `permesso_appartiene_ruolo`
  ADD CONSTRAINT `Permesso(FK)` FOREIGN KEY (`Permesso`) REFERENCES `permesso` (`Permesso`),
  ADD CONSTRAINT `Ruolo_FK` FOREIGN KEY (`Ruolo`) REFERENCES `ruolo` (`Ruolo`);

--
-- Limiti per la tabella `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `Ruolo(FK)` FOREIGN KEY (`Ruolo`) REFERENCES `ruolo` (`Ruolo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
