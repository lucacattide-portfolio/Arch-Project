-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 15, 2016 alle 14:42
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

--
-- Dump dei dati per la tabella `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_user`, `admin_password`, `admin_accesso`, `admin_data_creazione`) VALUES
(2, 'admin', 'laboratorio2016', 1, '2016-09-19 06:31:48');

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

--
-- Dump dei dati per la tabella `articolo`
--

INSERT INTO `articolo` (`articolo_id`, `articolo_pagina_id`, `articolo_cliente_id`, `articolo_azienda_id`, `articolo_titolo`, `articolo_sottotitolo`, `articolo_testo`, `articolo_url`, `articolo_img_id`, `articolo_gallery_id`, `articolo_data_creazione`, `articolo_data_modifica`, `articolo_lingua`, `articolo_ordinamento`, `articolo_categoria_id`, `articolo_visibile`) VALUES
(11, 0, 0, 8, 'Digitalizzato_20150318', '', '', 'amministratore', '0', 2, '2016-10-28 08:17:11', '0000-00-00 00:00:00', '', 0, 2, 1),
(14, 0, 3, 0, 'PROVAAAAA', '', '', 'amministratore', '0', 2, '2016-10-31 14:36:37', '0000-00-00 00:00:00', '', 0, 0, 1),
(15, 0, 2, 0, 'Digitalizzato_20150318', '', '', 'amministratore', '0', 2, '2016-11-04 09:21:55', '0000-00-00 00:00:00', '', 0, 0, 1),
(16, 0, 2, 0, 'Cucina', '', '', 'amministratore', '0', 2, '2016-11-04 09:22:59', '0000-00-00 00:00:00', '', 0, 0, 1),
(17, 0, 0, 8, 'Prova Houses', '', '', 'amministratore', '0', 2, '2016-11-07 10:01:52', '0000-00-00 00:00:00', '', 0, 1, 1),
(18, 0, 0, 8, 'prova Kitchen', '', '', 'amministratore', '0', 2, '2016-11-07 10:02:16', '0000-00-00 00:00:00', '', 0, 3, 1),
(19, 0, 0, 9, 'documento-azienda-1', '', '', 'amministratore', '0', 2, '2016-11-10 15:58:11', '0000-00-00 00:00:00', '', 0, 4, 1);

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

--
-- Dump dei dati per la tabella `azienda`
--

INSERT INTO `azienda` (`azienda_id`, `azienda_nome`, `azienda_email`, `azienda_partita_iva`, `azienda_indirizzo`, `azienda_cap`, `azienda_provincia`, `azienda_stato`, `azienda_telefono`, `azienda_data_creazione`, `azienda_data_modifica`) VALUES
(8, 'laboratorio-a S.r.l.', 'info@laboratorio-a.it', '08601530960', 'Via Francesco Soave 24', '20135', 'Milano', 'Italia', '3387223343', '2016-10-28 08:06:03', '2016-10-28 08:06:03'),
(9, 'Azienda1', 'azienda1@azienda1.com', '08601530960', 'via francesco soave 24', '20135', 'Milano', 'Italia', '', '2016-11-10 14:38:50', '0000-00-00 00:00:00');

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

--
-- Dump dei dati per la tabella `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `categoria_nome`, `categoria_url`, `categoria_articolo_id`, `categoria_immagine_id`, `categoria_gallery_id`, `categoria_data_creazione`, `categoria_data_modific`) VALUES
(1, 'HOUSES', 'houses', 0, 0, 0, '2016-10-20 14:30:50', '0000-00-00 00:00:00'),
(2, 'BATHROOM', 'bathroom', 0, 0, 0, '2016-10-23 14:18:49', '0000-00-00 00:00:00'),
(3, 'KITCHEN', 'kitchen', 0, 0, 0, '2016-10-23 14:19:15', '0000-00-00 00:00:00'),
(4, 'LIVINGROOM', 'livingroom', 0, 0, 0, '2016-10-23 14:19:48', '0000-00-00 00:00:00'),
(5, 'VARIUS', 'varius', 0, 0, 0, '2016-10-23 14:20:09', '0000-00-00 00:00:00');

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

--
-- Dump dei dati per la tabella `cliente`
--

INSERT INTO `cliente` (`cliente_id`, `cliente_nome`, `cliente_cognome`, `cliente_ragione_sociale`, `cliente_indirizzo`, `cliente_cap`, `cilente_citta`, `cliente_provincia`, `cliente_stato`, `cliente_email`, `cliente_telefono`, `cliente_fax`, `cliente_partita_iva`, `cliente_codice_fiscale`, `cliente_tipologia`, `cliente_data_creazione`, `cliente_data_modifica`, `cliente_user`, `cliente_password`, `cliente_note`) VALUES
(2, 'Claudio', 'Veneri', 'AAAA', 'AAAA', 'AAAA', 'AAAA', 'AAAAAAAAAAAA', 'AAAAAAAAAAAA', '', 'AAAAAAAA', 'AAAAAAAA', 'AAAAAAAA', 'AAAAAAAA', '', '2016-10-21 13:21:03', '0000-00-00 00:00:00', '', '', ''),
(3, 'A', 'A', 'AAAA', 'AAAA', 'AAAA', 'AAAA', 'AAAAAAAAAAAA', 'AAAAAAAAAAAA', '', 'AAAAAAAA', 'AAAAAAAA', 'AAAAAAAA', 'AAAAAAAA', '', '2016-10-21 13:21:03', '0000-00-00 00:00:00', '', '', ''),
(4, 'B', 'B', 'AAAA', 'AAAA', 'AAAA', 'AAAA', 'AAAAAAAAAAAA', 'AAAAAAAAAAAA', '', 'AAAAAAAA', 'AAAAAAAA', 'AAAAAAAA', 'AAAAAAAA', '', '2016-10-21 13:21:03', '0000-00-00 00:00:00', '', '', ''),
(5, 'C', 'C', 'AAAA', 'AAAA', 'AAAA', 'AAAA', 'AAAAAAAAAAAA', 'AAAAAAAAAAAA', '', 'AAAAAAAA', 'AAAAAAAA', 'AAAAAAAA', 'AAAAAAAA', '', '2016-10-21 13:21:03', '0000-00-00 00:00:00', '', '', '');

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

--
-- Dump dei dati per la tabella `immagine`
--

INSERT INTO `immagine` (`immagine_id`, `immagine_label`, `immagine_data_creazione`, `immagine_data_modifica`, `immagine_articolo_id`, `immagine_tipo`, `immagine_ordinamento`) VALUES
(1, '39764.png', '2016-10-12 08:00:00', '0000-00-00 00:00:00', 0, 'image/png', 0),
(2, '56523.png', '2016-10-12 08:00:09', '0000-00-00 00:00:00', 0, 'image/png', 0),
(3, '66886.png', '2016-10-12 08:00:18', '0000-00-00 00:00:00', 0, 'image/png', 0),
(4, '78597.png', '2016-10-12 08:00:26', '0000-00-00 00:00:00', 0, 'image/png', 0),
(5, '49826.png', '2016-10-20 07:35:58', '0000-00-00 00:00:00', 1, 'image/png', 0),
(6, '10348.png', '2016-10-21 11:47:09', '0000-00-00 00:00:00', 3, 'image/png', 0),
(7, '18273.png', '2016-10-21 11:52:41', '0000-00-00 00:00:00', 4, 'image/png', 0),
(8, '74620.pdf', '2016-10-27 10:33:50', '0000-00-00 00:00:00', 7, 'application/pdf', 0),
(9, '66671.pdf', '2016-10-27 10:41:23', '0000-00-00 00:00:00', 8, 'application/pdf', 0),
(10, '15579.pdf', '2016-10-27 13:14:53', '0000-00-00 00:00:00', 9, 'application/pdf', 0),
(11, '87553.pdf', '2016-10-27 14:00:33', '0000-00-00 00:00:00', 10, 'application/pdf', 0),
(12, '38822.pdf', '2016-10-28 08:17:11', '0000-00-00 00:00:00', 11, 'application/pdf', 0),
(13, '59875.pdf', '2016-10-31 14:17:01', '0000-00-00 00:00:00', 12, 'application/pdf', 0),
(14, '90901.pdf', '2016-10-31 14:35:17', '0000-00-00 00:00:00', 13, 'application/pdf', 0),
(15, '98374.pdf', '2016-10-31 14:36:37', '0000-00-00 00:00:00', 14, 'application/pdf', 0),
(16, '219.pdf', '2016-11-04 09:21:55', '0000-00-00 00:00:00', 15, 'application/pdf', 0),
(17, '68717.JPG', '2016-11-04 09:22:59', '0000-00-00 00:00:00', 16, 'image/jpeg', 0),
(18, '63107.pdf', '2016-11-07 10:01:52', '0000-00-00 00:00:00', 17, 'application/pdf', 0),
(19, '23038.pdf', '2016-11-07 10:02:16', '0000-00-00 00:00:00', 18, 'application/pdf', 0),
(20, '41178.pdf', '2016-11-10 15:58:11', '0000-00-00 00:00:00', 19, 'application/pdf', 0);

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

--
-- Dump dei dati per la tabella `match_azienda_categoria_articolo`
--

INSERT INTO `match_azienda_categoria_articolo` (`id_match`, `match_azienda_id`, `match_categoria_id`, `match_articolo_id`) VALUES
(43, 9, 5, 0),
(58, 8, 1, 0),
(59, 8, 2, 0),
(60, 8, 3, 0),
(61, 9, 1, 0),
(62, 9, 3, 0),
(63, 9, 4, 0);

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

--
-- Dump dei dati per la tabella `match_cliente_cataloghi`
--

INSERT INTO `match_cliente_cataloghi` (`id_match_cli_cat`, `match_cli_cat_cliente_id`, `match_cli_cat_articolo_id`, `match_cli_cat_visibile`) VALUES
(1, 2, 19, 1),
(2, 2, 17, 1),
(3, 2, 11, 2),
(4, 2, 18, 1);

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
-- Dump dei dati per la tabella `pagina`
--

INSERT INTO `pagina` (`pagina_id`, `pagina_url`, `pagina_riferimento`, `pagina_meta_title`, `pagina_meta_description`, `pagina_meta_tag`, `pagina_immagine_id`, `pagina_gallery_id`, `pagina_lingua`, `pagina_data_creazione`, `pagina_data_modifica`, `pagina_dipendenza_id`, `pagina_ordinamento`, `pagina_categoria_id`) VALUES
(1, 'home', 'home.php', 'Home', '', '', 0, 0, '', '2016-10-11 14:38:44', '2016-10-11 16:13:01', '0', 0, 0),
(2, 'projects', 'projects.php', 'Projects', '', '', 1, 0, '', '2016-10-11 14:39:11', '2016-10-12 08:00:00', '0', 0, 0),
(3, 'activities', 'activities.php', 'Activities', '', '', 2, 0, '', '2016-10-11 14:39:29', '2016-10-12 08:00:09', '0', 0, 0),
(4, 'showroom', 'showroom.php', 'Showroom', '', '', 3, 0, '', '2016-10-11 14:39:53', '2016-10-12 08:00:18', '0', 0, 0),
(5, 'contacts', 'contacts.php', 'Contacts', '', '', 4, 0, '', '2016-10-11 15:27:42', '2016-10-12 08:00:26', '0', 0, 0),
(6, 'login', 'login.php', 'Login', '', '', 0, 0, '', '2016-10-11 16:16:57', '2016-10-11 16:16:57', '0', 0, 0),
(7, 'account', 'account.php', 'Account', '', '', 0, 0, '', '2016-10-12 09:51:42', '2016-10-12 09:51:42', '0', 0, 0);

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
