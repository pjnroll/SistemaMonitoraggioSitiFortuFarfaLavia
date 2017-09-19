-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 20, 2017 alle 00:31
-- Versione del server: 5.7.17
-- Versione PHP: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iot`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `regolaeccezione`
--

CREATE TABLE `regolaeccezione` (
  `ID` int(10) NOT NULL,
  `IDUtente` int(10) NOT NULL,
  `IDSensore` int(10) NOT NULL,
  `ValoreSoglia` double NOT NULL,
  `TipoControllo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `rilevazione`
--

CREATE TABLE `rilevazione` (
  `ID` int(10) NOT NULL,
  `Messaggio` char(255) NOT NULL,
  `DescrizioneRilevazione` char(255) NOT NULL,
  `IDSensore` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `rilevazione`
--

INSERT INTO `rilevazione` (`ID`, `Messaggio`, `DescrizioneRilevazione`, `IDSensore`) VALUES
(104, '2017-06-19 21:10:19;41;0', 'Invio umidita\'', 12),
(105, '2017-06-19 21:10:19;62;0', 'Invio umidita\'', 12),
(106, '2017-06-19 21:10:19;27;0', 'Invio umidita\'', 12),
(107, '2017-06-19 21:10:19;52;0', 'Invio umidita\'', 12),
(108, '2017-06-19 21:10:19;15;0', 'Invio umidita\'', 12),
(109, '2017-06-19 21:10:19;33;0', 'Invio umidita\'', 12),
(110, '2017-06-19 21:10:19;5;0', 'Invio umidita\'', 12),
(111, '2017-06-19 21:10:19;46;0', 'Invio umidita\'', 12),
(112, '2017-06-19 21:10:19;54;0', 'Invio umidita\'', 12),
(113, '2017-06-19 21:10:19;52;0', 'Invio umidita\'', 12),
(114, '2017-06-19 21:10:19;16;0', 'Invio umidita\'', 12),
(115, '2017-06-19 21:10:19;3;0', 'Invio umidita\'', 12),
(116, '2017-06-19 21:10:19;18;0', 'Invio umidita\'', 12),
(117, '2017-06-19 21:10:19;6;0', 'Invio umidita\'', 12),
(118, '2017-06-19 21:10:19;29;0', 'Invio umidita\'', 12),
(119, ';;1;', 'Invio umidita\'', 12),
(120, '2017-06-19 21:10:19;1;0', 'Invio umidita\'', 12),
(121, '2017-06-19 21:10:19;71;0', 'Invio umidita\'', 12),
(122, '2017-06-19 21:10:19;9;0', 'Invio umidita\'', 12),
(123, '2017-06-19 21:10:19;11;0', 'Invio umidita\'', 12),
(124, '2017-06-19 21:10:19;27;0', 'Invio umidita\'', 12),
(125, '2017-06-19 21:10:19;2;0', 'Invio umidita\'', 12),
(126, '2017-06-19 21:10:19;19;0', 'Invio umidita\'', 12),
(127, '2017-06-19 21:10:19;76;0', 'Invio umidita\'', 12),
(128, '2017-06-19 21:10:19;50;0', 'Invio umidita\'', 12),
(129, '2017-06-19 21:10:19;15;0', 'Invio umidita\'', 12),
(130, '2017-06-19 21:10:19;55;0', 'Invio umidita\'', 12),
(131, '2017-06-19 21:10:19;69;0', 'Invio umidita\'', 12),
(132, '2017-06-19 21:10:19;5;0', 'Invio umidita\'', 12),
(133, '2017-06-19 21:10:19;18;0', 'Invio umidita\'', 12),
(134, '2017-06-19 21:10:19;2;0', 'Invio umidita\'', 12),
(135, '2017-06-19 21:10:19;27;0', 'Invio umidita\'', 12),
(136, '2017-06-19 21:10:19;70;0', 'Invio umidita\'', 12),
(137, '2017-06-19 21:10:19;16;0', 'Invio umidita\'', 12),
(138, '2017-06-19 21:10:19;2;0', 'Invio umidita\'', 12),
(139, '2017-06-19 21:10:19;65;0', 'Invio umidita\'', 12),
(140, '2017-06-19 21:10:19;64;0', 'Invio umidita\'', 12),
(141, '2017-06-19 21:10:19;34;0', 'Invio umidita\'', 12),
(142, '2017-06-19 21:10:19;64;0', 'Invio umidita\'', 12),
(143, '2017-06-19 21:10:19;46;0', 'Invio umidita\'', 12),
(144, '2017-06-19 21:10:19;15;0', 'Invio umidita\'', 12),
(145, '2017-06-19 21:10:19;8;0', 'Invio umidita\'', 12),
(146, '2017-06-19 21:10:19;30;0', 'Invio umidita\'', 12),
(147, '2017-06-19 21:10:19;49;0', 'Invio umidita\'', 12),
(148, '2017-06-19 21:10:19;48;0', 'Invio umidita\'', 12),
(149, '2017-06-19 21:10:19;0;0', 'Invio umidita\'', 12),
(150, '2017-06-19 21:10:19;75;0', 'Invio umidita\'', 12),
(151, '2017-06-19 21:10:19;61;0', 'Invio umidita\'', 12),
(152, '2017-06-19 21:10:19;29;0', 'Invio umidita\'', 12),
(153, '2017-06-19 21:10:19;26;0', 'Invio umidita\'', 12),
(154, '2017-06-19 21:10:19;27;0', 'Invio umidita\'', 12),
(155, '2017-06-19 21:10:19;75;0', 'Invio umidita\'', 12),
(156, '2017-06-19 21:10:19;29;0', 'Invio umidita\'', 12),
(157, '2017-06-19 21:10:19;70;0', 'Invio umidita\'', 12),
(158, '2017-06-19 21:10:19;71;0', 'Invio umidita\'', 12),
(159, '2017-06-19 21:10:19;15;0', 'Invio umidita\'', 12),
(160, '2017-06-19 21:10:19;58;0', 'Invio umidita\'', 12),
(161, '2017-06-19 21:10:19;50;0', 'Invio umidita\'', 12),
(162, '2017-06-19 21:10:19;52;0', 'Invio umidita\'', 12),
(163, '2017-06-19 21:10:19;40;0', 'Invio umidita\'', 12),
(164, '2017-06-19 21:10:19;28;0', 'Invio umidita\'', 12),
(165, '2017-06-19 21:10:19;68;0', 'Invio umidita\'', 12),
(166, '2017-06-19 21:10:19;8;0', 'Invio umidita\'', 12),
(167, '2017-06-19 21:10:19;58;0', 'Invio umidita\'', 12),
(168, ';;1;', 'Invio umidita\'', 12),
(169, '2017-06-19 21:10:19;53;0', 'Invio umidita\'', 12),
(170, '2017-06-19 21:10:19;17;0', 'Invio umidita\'', 12),
(171, '2017-06-19 21:10:19;1;0', 'Invio umidita\'', 12),
(172, '2017-06-19 21:10:19;65;0', 'Invio umidita\'', 12),
(173, '2017-06-19 21:10:19;6;0', 'Invio umidita\'', 12),
(174, '2017-06-19 21:10:19;40;0', 'Invio umidita\'', 12),
(175, '2017-06-19 21:10:19;30;0', 'Invio umidita\'', 12),
(176, '2017-06-19 21:10:19;54;0', 'Invio umidita\'', 12),
(177, '2017-06-19 21:10:19;69;0', 'Invio umidita\'', 12),
(178, '2017-06-19 21:10:19;65;0', 'Invio umidita\'', 12),
(179, '2017-06-19 21:10:19;15;0', 'Invio umidita\'', 12),
(180, '2017-06-19 21:10:19;51;0', 'Invio umidita\'', 12),
(181, '2017-06-19 21:10:19;62;0', 'Invio umidita\'', 12),
(182, '2017-06-19 21:10:19;49;0', 'Invio umidita\'', 12),
(183, '2017-06-19 21:10:19;18;0', 'Invio umidita\'', 12),
(184, '2017-06-19 21:10:19;17;0', 'Invio umidita\'', 12),
(185, '2017-06-19 21:10:19;21;0', 'Invio umidita\'', 12),
(186, '2017-06-19 21:10:19;27;0', 'Invio umidita\'', 12),
(187, '2017-06-19 21:10:19;11;0', 'Invio umidita\'', 12),
(188, '2017-06-19 21:10:19;6;0', 'Invio umidita\'', 12),
(189, ';;1;', 'Invio umidita\'', 12),
(190, '2017-06-19 21:10:19;68;0', 'Invio umidita\'', 12),
(191, '2017-06-19 21:10:19;49;0', 'Invio umidita\'', 12),
(192, '2017-06-19 21:10:19;27;0', 'Invio umidita\'', 12),
(193, '2017-06-19 21:10:19;25;0', 'Invio umidita\'', 12),
(194, '2017-06-19 21:10:19;34;0', 'Invio umidita\'', 12),
(195, '2017-06-19 21:10:19;7;0', 'Invio umidita\'', 12),
(196, '2017-06-19 21:10:19;29;0', 'Invio umidita\'', 12),
(197, '2017-06-19 21:10:19;70;0', 'Invio umidita\'', 12),
(198, '2017-06-19 21:10:19;33;0', 'Invio umidita\'', 12),
(199, '2017-06-19 21:10:19;7;0', 'Invio umidita\'', 12),
(200, '2017-06-19 21:10:19;4;0', 'Invio umidita\'', 12),
(201, '2017-06-19 21:10:19;60;0', 'Invio umidita\'', 12),
(202, '2017-06-19 21:10:19;64;0', 'Invio umidita\'', 12),
(203, '2017-06-19 21:10:19;37;0', 'Invio umidita\'', 12);

-- --------------------------------------------------------

--
-- Struttura della tabella `rilevazioneanomala`
--

CREATE TABLE `rilevazioneanomala` (
  `ID` int(11) NOT NULL,
  `IDUtente` int(10) NOT NULL,
  `IDRilevazione` int(10) NOT NULL,
  `IDRegola` int(10) NOT NULL,
  `viewed` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `sensore`
--

CREATE TABLE `sensore` (
  `ID` int(10) NOT NULL,
  `Marca` char(255) NOT NULL,
  `Tipo` int(10) NOT NULL,
  `IDSito` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `sensore`
--

INSERT INTO `sensore` (`ID`, `Marca`, `Tipo`, `IDSito`) VALUES
(12, 'Antani', 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `sito`
--

CREATE TABLE `sito` (
  `ID` int(10) NOT NULL,
  `IDCliente` int(10) NOT NULL,
  `Nome` char(255) NOT NULL,
  `Grandezza` char(255) NOT NULL,
  `Localita` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `sito`
--

INSERT INTO `sito` (`ID`, `IDCliente`, `Nome`, `Grandezza`, `Localita`) VALUES
(1, 2, 'Campo di grano', '80', 'Matera');

-- --------------------------------------------------------

--
-- Struttura della tabella `tiposensore`
--

CREATE TABLE `tiposensore` (
  `ID` int(10) NOT NULL,
  `Nome` char(255) NOT NULL,
  `Posizione` char(255) NOT NULL,
  `DatiContenuti` char(255) NOT NULL,
  `NumeroDatiContenuti` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `tiposensore`
--

INSERT INTO `tiposensore` (`ID`, `Nome`, `Posizione`, `DatiContenuti`, `NumeroDatiContenuti`) VALUES
(1, 'Umidità', 'Data:0; Rilevazione:1; Errore:2;', 'Data;Rilevazione;Errore;', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `ID` int(10) NOT NULL,
  `Nome` char(255) NOT NULL,
  `Cognome` char(255) NOT NULL,
  `Email` char(255) NOT NULL,
  `DataDiNascita` date NOT NULL,
  `Sesso` char(1) NOT NULL,
  `Residenza` char(255) NOT NULL,
  `LuogoDiNascita` char(255) NOT NULL,
  `NumeroDiTelefono` int(10) NOT NULL,
  `CodiceFiscale` char(16) NOT NULL,
  `Password` char(40) NOT NULL,
  `isAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`ID`, `Nome`, `Cognome`, `Email`, `DataDiNascita`, `Sesso`, `Residenza`, `LuogoDiNascita`, `NumeroDiTelefono`, `CodiceFiscale`, `Password`, `isAdmin`) VALUES
(1, 'Amministratore', 'Di Iot', 'a@a.it', '1996-06-06', 'M', 'Via Orabona', 'Bari', 1231314156, 'YFWBVR77P56A662L', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'Pier', 'Laviano', 'e@e.it', '0003-03-03', 'M', 'Milano', 'Foggia', 2147483647, 'PSCJRUGISW', 'e10adc3949ba59abbe56e057f20f883e', 1),
(3, 'Gabriele', 'Pisciotta', 'u@u.it', '1996-05-03', 'M', 'Bari', 'Bari', 2147483647, 'PSCGRL96E03A662Q', 'e10adc3949ba59abbe56e057f20f883e', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `regolaeccezione`
--
ALTER TABLE `regolaeccezione`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `IDUtente` (`IDUtente`),
  ADD UNIQUE KEY `IDSensore` (`IDSensore`);

--
-- Indici per le tabelle `rilevazione`
--
ALTER TABLE `rilevazione`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKRilevazion536259` (`IDSensore`);

--
-- Indici per le tabelle `rilevazioneanomala`
--
ALTER TABLE `rilevazioneanomala`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `IDUtente` (`IDUtente`),
  ADD UNIQUE KEY `IDRilevazione` (`IDRilevazione`),
  ADD UNIQUE KEY `IDRegola` (`IDRegola`),
  ADD KEY `FKRilevazion857267` (`IDUtente`),
  ADD KEY `FKRilevazion300044` (`IDRegola`),
  ADD KEY `FKRilevazion880608` (`IDRilevazione`);

--
-- Indici per le tabelle `sensore`
--
ALTER TABLE `sensore`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKSensore917818` (`ID`),
  ADD KEY `FKSensore901159` (`IDSito`);

--
-- Indici per le tabelle `sito`
--
ALTER TABLE `sito`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKSito406760` (`IDCliente`);

--
-- Indici per le tabelle `tiposensore`
--
ALTER TABLE `tiposensore`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `rilevazione`
--
ALTER TABLE `rilevazione`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;
--
-- AUTO_INCREMENT per la tabella `sito`
--
ALTER TABLE `sito`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `tiposensore`
--
ALTER TABLE `tiposensore`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
