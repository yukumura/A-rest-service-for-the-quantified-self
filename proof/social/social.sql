-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Feb 05, 2016 alle 17:14
-- Versione del server: 5.6.25
-- Versione PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `admin`
--

INSERT INTO `admin` (`id`, `nome`, `password`) VALUES
(0, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE IF NOT EXISTS `utente` (
  `id` int(11) NOT NULL,
  `id_facebook` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `cognome` varchar(45) DEFAULT NULL,
  `sesso` varchar(45) DEFAULT NULL,
  `peso` int(3) DEFAULT '0',
  `altezza` int(3) DEFAULT '0',
  `circonferenza_torace` int(11) NOT NULL DEFAULT '0',
  `girovita` int(11) NOT NULL DEFAULT '0',
  `lunghezza_braccio` int(11) NOT NULL DEFAULT '0',
  `lunghezza_gamba` int(11) NOT NULL DEFAULT '0',
  `circonferenza_fianchi` int(11) DEFAULT '0',
  `circonferenza_bacino` int(11) NOT NULL DEFAULT '0',
  `circonferenza_coscia_a` int(11) NOT NULL DEFAULT '0',
  `circonferenza_coscia_g` int(11) NOT NULL DEFAULT '0',
  `lunghezza_coscia` int(11) NOT NULL DEFAULT '0',
  `lunghezza_tibia` int(11) NOT NULL DEFAULT '0',
  `circonferenza_bicipite` int(11) NOT NULL DEFAULT '0',
  `lunghezza_omero` int(11) NOT NULL DEFAULT '0',
  `lunghezza_avambraccio` int(11) NOT NULL DEFAULT '0',
  `larghezza_spalle` int(11) NOT NULL DEFAULT '0',
  `larghezza_torace` int(11) NOT NULL DEFAULT '0',
  `larghezza_girovita` int(11) NOT NULL DEFAULT '0',
  `larghezza_fianchi` int(11) NOT NULL DEFAULT '0',
  `larghezza_bacino` int(11) NOT NULL DEFAULT '0',
  `distanza_cresta_illiaca` int(11) NOT NULL DEFAULT '0',
  `distanza_malleolo` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id`, `id_facebook`, `email`, `nome`, `cognome`, `sesso`, `peso`, `altezza`, `circonferenza_torace`, `girovita`, `lunghezza_braccio`, `lunghezza_gamba`, `circonferenza_fianchi`, `circonferenza_bacino`, `circonferenza_coscia_a`, `circonferenza_coscia_g`, `lunghezza_coscia`, `lunghezza_tibia`, `circonferenza_bicipite`, `lunghezza_omero`, `lunghezza_avambraccio`, `larghezza_spalle`, `larghezza_torace`, `larghezza_girovita`, `larghezza_fianchi`, `larghezza_bacino`, `distanza_cresta_illiaca`, `distanza_malleolo`) VALUES
(93, '10206983607087370', 'yukumuradota@gmail.com', 'Alberto', 'Cicilloni', 'uomo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_facebook` (`id_facebook`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=94;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
