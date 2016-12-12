-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 15, 2016 alle 10:14
-- Versione del server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `archeproject`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(255) NOT NULL,
  `admin_user` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_accesso` int(255) NOT NULL DEFAULT '0',
  `admin_data_creazione` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `articolo`
--

CREATE TABLE IF NOT EXISTS `articolo` (
`articolo_id` int(255) NOT NULL,
  `articolo_pagina_id` int(255) NOT NULL,
  `articolo_cliente_id` int(255) NOT NULL,
  `articolo_azienda_id` int(255) NOT NULL,
  `articolo_titolo` text COLLATE latin1_general_ci NOT NULL,
  `articolo_sottotitolo` text COLLATE latin1_general_ci NOT NULL,
  `articolo_testo` text COLLATE latin1_general_ci NOT NULL,
  `articolo_url` text COLLATE latin1_general_ci NOT NULL,
  `articolo_img_id` text COLLATE latin1_general_ci NOT NULL,
  `articolo_gallery_id` int(255) NOT NULL,
  `articolo_data_creazione` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `articolo_data_modifica` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `articolo_lingua` text COLLATE latin1_general_ci NOT NULL,
  `articolo_ordinamento` int(255) NOT NULL,
  `articolo_categoria_id` int(255) NOT NULL,
  `articolo_visibile` int(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `azienda`
--

CREATE TABLE IF NOT EXISTS `azienda` (
`azienda_id` int(255) NOT NULL,
  `azienda_nome` text NOT NULL,
  `azienda_email` text NOT NULL,
  `azienda_partita_iva` text NOT NULL,
  `azienda_indirizzo` text NOT NULL,
  `azienda_cap` text NOT NULL,
  `azienda_provincia` text NOT NULL,
  `azienda_stato` text NOT NULL,
  `azienda_telefono` text NOT NULL,
  `azienda_data_creazione` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `azienda_data_modifica` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
`categoria_id` int(255) NOT NULL,
  `categoria_nome` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `categoria_url` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `categoria_articolo_id` int(255) NOT NULL,
  `categoria_immagine_id` int(255) NOT NULL,
  `categoria_gallery_id` int(255) NOT NULL,
  `categoria_data_creazione` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categoria_data_modific` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
`cliente_id` int(255) NOT NULL,
  `cliente_nome` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cliente_cognome` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cliente_ragione_sociale` text NOT NULL,
  `cliente_indirizzo` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cliente_cap` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cilente_citta` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cliente_provincia` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cliente_stato` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cliente_email` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cliente_telefono` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cliente_fax` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cliente_partita_iva` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cliente_codice_fiscale` varchar(255) NOT NULL,
  `cliente_tipologia` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cliente_data_creazione` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cliente_data_modifica` datetime NOT NULL,
  `cliente_user` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cliente_password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cliente_note` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
`gallery_id` int(255) NOT NULL,
  `gallery_articolo_id` int(255) NOT NULL,
  `gallery_data_creazione` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gallery_data_ficamodi` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin2 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `immagine`
--

CREATE TABLE IF NOT EXISTS `immagine` (
`immagine_id` int(255) NOT NULL,
  `immagine_label` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `immagine_data_creazione` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `immagine_data_modifica` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `immagine_articolo_id` int(255) NOT NULL,
  `immagine_tipo` text NOT NULL,
  `immagine_ordinamento` int(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `lingua`
--

CREATE TABLE IF NOT EXISTS `lingua` (
`lingua_id` int(255) NOT NULL,
  `lingua_label` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `lingua_short` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `match_azienda_categoria_articolo`
--

CREATE TABLE IF NOT EXISTS `match_azienda_categoria_articolo` (
`id_match` int(255) NOT NULL,
  `match_azienda_id` int(255) NOT NULL,
  `match_categoria_id` int(255) NOT NULL,
  `match_articolo_id` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `match_cliente_cataloghi`
--

CREATE TABLE IF NOT EXISTS `match_cliente_cataloghi` (
`id_match_cli_cat` int(255) NOT NULL,
  `match_cli_cat_cliente_id` int(255) NOT NULL,
  `match_cli_cat_articolo_id` int(255) NOT NULL,
  `match_cli_cat_visibile` int(255) NOT NULL DEFAULT '2'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `pagina`
--

CREATE TABLE IF NOT EXISTS `pagina` (
`pagina_id` int(255) NOT NULL,
  `pagina_url` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pagina_riferimento` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pagina_meta_title` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pagina_meta_description` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pagina_meta_tag` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pagina_immagine_id` int(255) NOT NULL,
  `pagina_gallery_id` int(255) NOT NULL,
  `pagina_lingua` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pagina_data_creazione` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pagina_data_modifica` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pagina_dipendenza_id` varchar(255) NOT NULL,
  `pagina_ordinamento` int(255) NOT NULL,
  `pagina_categoria_id` int(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=8 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `articolo`
--
ALTER TABLE `articolo`
 ADD PRIMARY KEY (`articolo_id`);

--
-- Indexes for table `azienda`
--
ALTER TABLE `azienda`
 ADD PRIMARY KEY (`azienda_id`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`categoria_id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`cliente_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
 ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `immagine`
--
ALTER TABLE `immagine`
 ADD PRIMARY KEY (`immagine_id`);

--
-- Indexes for table `lingua`
--
ALTER TABLE `lingua`
 ADD PRIMARY KEY (`lingua_id`);

--
-- Indexes for table `match_azienda_categoria_articolo`
--
ALTER TABLE `match_azienda_categoria_articolo`
 ADD PRIMARY KEY (`id_match`);

--
-- Indexes for table `match_cliente_cataloghi`
--
ALTER TABLE `match_cliente_cataloghi`
 ADD PRIMARY KEY (`id_match_cli_cat`);

--
-- Indexes for table `pagina`
--
ALTER TABLE `pagina`
 ADD PRIMARY KEY (`pagina_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `articolo`
--
ALTER TABLE `articolo`
MODIFY `articolo_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `azienda`
--
ALTER TABLE `azienda`
MODIFY `azienda_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
MODIFY `categoria_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
MODIFY `cliente_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
MODIFY `gallery_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `immagine`
--
ALTER TABLE `immagine`
MODIFY `immagine_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `lingua`
--
ALTER TABLE `lingua`
MODIFY `lingua_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `match_azienda_categoria_articolo`
--
ALTER TABLE `match_azienda_categoria_articolo`
MODIFY `id_match` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `match_cliente_cataloghi`
--
ALTER TABLE `match_cliente_cataloghi`
MODIFY `id_match_cli_cat` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pagina`
--
ALTER TABLE `pagina`
MODIFY `pagina_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
