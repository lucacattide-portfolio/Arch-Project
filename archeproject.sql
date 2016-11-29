-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Nov 16, 2016 alle 16:32
-- Versione del server: 5.6.28
-- Versione PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `archeproject`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `admin_user` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_accesso` int(255) NOT NULL DEFAULT '0',
  `admin_data_creazione` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Dump dei dati per la tabella `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_user`, `admin_password`, `admin_accesso`, `admin_data_creazione`) VALUES
(2, 'admin', 'laboratorio2016', 1, '2016-09-19 06:31:48');

-- --------------------------------------------------------

--
-- Struttura della tabella `articolo`
--

CREATE TABLE `articolo` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dump dei dati per la tabella `articolo`
--

INSERT INTO `articolo` (`articolo_id`, `articolo_pagina_id`, `articolo_cliente_id`, `articolo_azienda_id`, `articolo_titolo`, `articolo_sottotitolo`, `articolo_testo`, `articolo_url`, `articolo_img_id`, `articolo_gallery_id`, `articolo_data_creazione`, `articolo_data_modifica`, `articolo_lingua`, `articolo_ordinamento`, `articolo_categoria_id`, `articolo_visibile`) VALUES
(14, 0, 3, 0, 'PROVAAAAA', '', '', 'amministratore', '0', 2, '2016-10-31 14:36:37', '0000-00-00 00:00:00', '', 0, 0, 1),
(15, 0, 2, 0, 'Digitalizzato_20150318', '', '', 'amministratore', '0', 2, '2016-11-04 09:21:55', '0000-00-00 00:00:00', '', 0, 0, 1),
(16, 0, 2, 0, 'Cucina', '', '', 'amministratore', '0', 2, '2016-11-04 09:22:59', '0000-00-00 00:00:00', '', 0, 0, 1),
(19, 0, 0, 9, 'documento-azienda-1', '', '', 'amministratore', '0', 2, '2016-11-10 15:58:11', '0000-00-00 00:00:00', '', 0, 4, 1),
(20, 9, 0, 0, '<p class="p1">Cookies</p>', '<p class="p1"><span class="s1"><strong>Cookie Policy</strong></span></p>', '<p class="p1"><span class="s1"><strong>What Are Cookies<br /><br /></strong></span><span class="s1">As is common practice with almost all professional websites this site uses cookies, which are tiny files that are downloaded to your computer, to improve your experience.&nbsp;This page describes what information they gather, how we use it and why we sometimes need to store these cookies. We will also share how you can prevent these cookies from being stored however this may downgrade or \'break\' certain elements of the sites functionality.<br /><br /></span><span class="s1">For more general information on cookies see the <span class="s2"><a title="Cookies" href="http://en.wikipedia.org/wiki/HTTP_cookie" target="_blank">Wikipedia article on HTTP Cookies</a></span></span></p>\r\n<p class="p1"><span class="s1"><strong>How We Use Cookies<br /><br /></strong></span><span class="s1">We use cookies for a variety of reasons detailed below. Unfortunately is most cases&nbsp;there are no industry standard options for disabling cookies without completely disabling the functionality and features they add to this site. It is recommended that you leave on all cookies if you are not sure whether you need them or not in case they are used to provide a service that you use.</span></p>\r\n<p class="p1"><span class="s1"><strong>Disabling Cookies<br /><br /></strong></span><span class="s1">You can prevent the setting of cookies by adjusting the settings on your browser (see your browser Help for how to do this). Be aware that disabling cookies will affect the functionality of this and many other websites that you visit. Disabling cookies will usually result in also disabling certain functionality and features of the this site. Therefore it is recommended that you do not disable cookies.</span></p>\r\n<p class="p1"><span class="s1"><strong>The Cookies We Set<br /><br /></strong></span><span class="s1">If you create an account with us then we will use cookies for the management of the signup process and general administration. These cookies will usually be deleted when you log out however in some cases they may remain afterwards to remember your site preferences when logged out.<br /><br /></span><span class="s1">We use cookies when you are logged in so that we can remember this fact. This prevents you from having to log in every single time you visit a new page. These cookies are typically removed or cleared when you log out to ensure that you can only access restricted features and areas when logged in.<br /><br /></span><span class="s1">When you submit data to through a form such as those found on contact pages or comment forms cookies may be set to remember your user details for future correspondence.<br /><br /></span><span class="s1">In order to provide you with a great experience on this site we provide the functionality to set your preferences for how this site runs when you use it. In order to remember your preferences we need to set cookies so that this information can be called whenever you interact with a page is affected by your preferences.</span></p>\r\n<p class="p1"><span class="s1"><strong>Third Party Cookies<br /><br /></strong></span><span class="s1">In some special cases we also use cookies provided by trusted third parties. The following section details which third party cookies you might encounter through this site.<br /><br /></span><span class="s1">This site uses Google Analytics which is one of the most widespread and trusted analytics solution on the web for helping us to understand how you use the site and ways that we can improve your experience. These cookies may track things such as how long you spend on the site and the pages that you visit so we can continue to produce engaging content.<br /><br /></span><span class="s1">For more information on Google Analytics cookies, see the <a title="Google Analytics" href="https://developers.google.com/analytics/resources/concepts/gaConceptsCookies" target="_blank"><span class="s2">official Google Analytics page</span></a>.<br /><br /></span><span class="s1">We also use social media buttons and/or plugins on this site that allow you to connect with your social network in various ways. For these to work the following social media sites including; Facebook, Instagram, LinkedIn, Pinterest, will set cookies through our site which may be used to enhance your profile on their site or contribute to the data they hold for various purposes outlined in&nbsp;their&nbsp;respective&nbsp;privacy&nbsp;policies.</span></p>\r\n<p class="p1"><span class="s1"><strong>More Information<br /><br /></strong></span><span class="s1">Hopefully that has&nbsp;clarified&nbsp;things for you and as was previously mentioned if there is something that you aren\'t sure whether you need or not it\'s usually safer to leave cookies enabled in case it does interact with one of the features you use on our site. However if you are still looking for more information then you can contact us through one of our preferred contact methods.</span></p>\r\n<p class="p1"><span class="s3"><strong>Email:</strong> <span class="s4"><a title="Email" href="mailto:mcocconi@yahoo.it">mcocconi@yahoo.it</a></span></span></p>\r\n<p class="p1"><span class="s1"><strong>Phone:&nbsp;</strong><a title="Phone" href="tel:+390258302204">+39 02 58302204</a></span></p>', '', '0', 2, '2016-11-15 13:52:52', '2016-11-14 23:00:00', '', 0, 0, 1),
(21, 3, 0, 0, '<p>Activities</p>', '<p>DESIGN AND REALIZATION OF COMPLETE INTERIOR AND KITCHEN</p>', '<p>La vita non &egrave; solo una location esclusiva, ma anche l&rsquo;originalit&agrave; e l&rsquo;unicit&agrave;, la creazione del proprio stile, la ricerca della volont&agrave; di cambiamento e di espressione dei bisogni della vita interiore. Il nostro processo individuale di progettazione e consulenza architettura d&rsquo;interni vi aiuter&agrave; a trovare la vostra casa. Lasciatevi ispirare dai disegni dei nostri architetti d&rsquo;interni e trasferire i vostri sogni in dimensioni finora non visto, passo dopo passo.</p>', '', '0', 2, '2016-11-15 14:01:33', '2016-11-14 23:00:00', '', 0, 0, 1),
(22, 3, 0, 0, '<p>Incontro</p>', '<ul>\r\n<li>Definizione delle premesse e della fattibilit&agrave;</li>\r\n<li>Planimetria catastale</li>\r\n<li>Foto</li>\r\n</ul>', '<p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore &nbsp;magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit &nbsp;laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>', '', '0', 2, '2016-11-15 15:19:55', '2016-11-14 23:00:00', '', 0, 0, 1),
(23, 3, 0, 0, '<p>Rilievo</p>', '<ul>\r\n<li>Elaborazione grafici</li>\r\n<li>Stato di fatto</li>\r\n<li>Foto di Stato di fatto</li>\r\n</ul>', '<p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>', '', '0', 2, '2016-11-15 15:22:01', '2016-11-14 23:00:00', '', 0, 0, 1),
(24, 3, 0, 0, '<p>Progettazione Preliminare</p>', '<ul>\r\n<li>Elaborazione grafici</li>\r\n<li>Planimetria arredata</li>\r\n<li>Relazione</li>\r\n<li>Obbiettivi</li>\r\n<li>Indicazione progetto e materiali</li>\r\n<li>Stima di spesa</li>\r\n</ul>', '<p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc egestas ex vitae orci lacinia molestie. Suspendisse id sagittis nulla, auctor efficitur nibh. Curabitur at hendrerit purus, et accumsan orci. Proin imperdiet dolor quis metus blandit dictum. Donec at feugiat ante. Cras nec faucibus diam. Praesent suscipit odio erat, non malesuada nulla fringilla vitae. Vestibulum feugiat est vitae bibendum eleifend. Maecenas ut mauris et mi facilisis consectetur.</span></p>', '', '0', 2, '2016-11-15 15:25:44', '2016-11-14 23:00:00', '', 0, 0, 1),
(25, 3, 0, 0, '<p>Progettazione Definitiva</p>', '<ul>\r\n<li>Planimetria definitiva</li>\r\n<li>Scelta materiali</li>\r\n<li>Tavola impianti</li>\r\n<li>CME</li>\r\n<li>P. Sicurezza</li>\r\n</ul>', '<p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc egestas ex vitae orci lacinia molestie. Suspendisse id sagittis nulla, auctor efficitur nibh. Curabitur at hendrerit purus, et accumsan orci. Proin imperdiet dolor quis metus blandit dictum. Donec at feugiat ante. Cras nec faucibus diam. Praesent suscipit odio erat, non malesuada nulla fringilla vitae. Vestibulum feugiat est vitae bibendum eleifend. Maecenas ut mauris et mi facilisis consectetur.</span></p>', '', '0', 2, '2016-11-15 15:26:46', '2016-11-14 23:00:00', '', 0, 0, 1),
(26, 3, 0, 0, '<p>Progettazione Esecutiva</p>', '<ul>\r\n<li>Tavole prospetti</li>\r\n</ul>', '<p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc egestas ex vitae orci lacinia molestie. Suspendisse id sagittis nulla, auctor efficitur nibh. Curabitur at hendrerit purus, et accumsan orci. Proin imperdiet dolor quis metus blandit dictum. Donec at feugiat ante. Cras nec faucibus diam. Praesent suscipit odio erat, non malesuada nulla fringilla vitae. Vestibulum feugiat est vitae bibendum eleifend. Maecenas ut mauris et mi facilisis consectetur.</span></p>', '', '0', 2, '2016-11-15 15:27:35', '2016-11-14 23:00:00', '', 0, 0, 1),
(27, 4, 0, 0, '', '', '', '', '1', 2, '2016-11-15 15:45:09', '0000-00-00 00:00:00', '', 0, 0, 1),
(28, 5, 0, 0, '<p>Via Bellezza 6 - 20136, MILANO</p>', '<p>Telefono: <a title="Telefono" href="tel:+390258302204">+39 02 58302204</a></p>', '<p>Email: <a title="Email" href="mailto:mcocconi@yahoo.it?subject=Contacts">mcocconi@yahoo.it</a></p>', '', '0', 2, '2016-11-15 15:47:22', '2016-11-14 23:00:00', '', 0, 0, 1),
(29, 11, 0, 0, '<p>Prova</p>', '<p>A1</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore &nbsp;et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.</p>', 'a1', '0', 2, '2016-11-15 16:08:32', '2016-11-14 23:00:00', '', 0, 0, 1),
(30, 11, 0, 0, '<p>Cucina</p>', '<p>A2</p>', '<p>alalla</p>', 'a2', '0', 2, '2016-11-15 16:16:49', '2016-11-14 23:00:00', '', 0, 0, 1),
(31, 11, 0, 0, '<p>Bagno</p>', '<p>A3</p>', '<p>fdhdfh hfgh</p>', 'a3', '0', 2, '2016-11-15 16:17:05', '2016-11-14 23:00:00', '', 0, 0, 1),
(32, 0, 0, 10, 'pippo', '', '', 'amministratore', '0', 2, '2016-11-16 14:52:39', '0000-00-00 00:00:00', '', 0, 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `azienda`
--

CREATE TABLE `azienda` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `azienda`
--

INSERT INTO `azienda` (`azienda_id`, `azienda_nome`, `azienda_email`, `azienda_partita_iva`, `azienda_indirizzo`, `azienda_cap`, `azienda_provincia`, `azienda_stato`, `azienda_telefono`, `azienda_data_creazione`, `azienda_data_modifica`) VALUES
(8, 'laboratorio-a S.r.l.', 'info@laboratorio-a.it', '08601530960', 'Via Francesco Soave 24', '20135', 'Milano', 'Italia', '3387223343', '2016-11-16 14:53:20', '2016-11-16 14:53:20'),
(9, 'Azienda1', 'azienda1@azienda1.com', '08601530960', 'via francesco soave 24', '20135', 'Milano', 'Italia', '', '2016-11-10 14:38:50', '0000-00-00 00:00:00'),
(10, 'Azienda 2', 'azienda2@tiscali.it', '', '', '', '', 'Italia', '', '2016-11-16 11:12:37', '0000-00-00 00:00:00'),
(11, 'Lab2', 'info@lab2.it', '', '', '', '', 'Italia', '', '2016-11-16 14:25:10', '2016-11-16 14:25:10');

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(255) NOT NULL,
  `categoria_nome` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `categoria_url` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `categoria_articolo_id` int(255) NOT NULL,
  `categoria_immagine_id` int(255) NOT NULL,
  `categoria_gallery_id` int(255) NOT NULL,
  `categoria_data_creazione` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categoria_data_modific` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Dump dei dati per la tabella `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `categoria_nome`, `categoria_url`, `categoria_articolo_id`, `categoria_immagine_id`, `categoria_gallery_id`, `categoria_data_creazione`, `categoria_data_modific`) VALUES
(1, 'HOUSES', 'houses', 63, 0, 0, '2016-10-20 14:30:50', '0000-00-00 00:00:00'),
(2, 'KITCHEN', 'kitchen', 64, 0, 0, '2016-10-23 14:18:49', '0000-00-00 00:00:00'),
(3, 'BATHROOM', 'bathroom', 65, 0, 0, '2016-10-23 14:19:15', '0000-00-00 00:00:00'),
(4, 'LIVING ROOM', 'living-room', 66, 0, 0, '2016-10-23 14:19:48', '0000-00-00 00:00:00'),
(5, 'OFFICES', 'offices', 67, 0, 0, '2016-10-23 14:20:09', '0000-00-00 00:00:00'),
(6, 'VARIOUS', 'various', 68, 0, 0, '2016-11-16 09:08:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `cliente`
--

CREATE TABLE `cliente` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

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

CREATE TABLE `gallery` (
  `gallery_id` int(255) NOT NULL,
  `gallery_articolo_id` int(255) NOT NULL,
  `gallery_data_creazione` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gallery_data_ficamodi` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- --------------------------------------------------------

--
-- Struttura della tabella `immagine`
--

CREATE TABLE `immagine` (
  `immagine_id` int(255) NOT NULL,
  `immagine_label` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `immagine_data_creazione` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `immagine_data_modifica` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `immagine_articolo_id` int(255) NOT NULL,
  `immagine_tipo` text NOT NULL,
  `immagine_ordinamento` int(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

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
(20, '41178.pdf', '2016-11-10 15:58:11', '0000-00-00 00:00:00', 19, 'application/pdf', 0),
(21, '4632.png', '2016-11-15 13:55:31', '0000-00-00 00:00:00', 0, 'image/png', 0),
(22, '77630.png', '2016-11-15 13:55:51', '0000-00-00 00:00:00', 0, 'image/png', 0),
(23, '88714.png', '2016-11-15 13:56:09', '0000-00-00 00:00:00', 0, 'image/png', 0),
(24, '8944.png', '2016-11-15 13:56:35', '0000-00-00 00:00:00', 0, 'image/png', 0),
(25, '92826.png', '2016-11-15 13:56:54', '0000-00-00 00:00:00', 0, 'image/png', 0),
(26, '11601.png', '2016-11-15 13:57:15', '0000-00-00 00:00:00', 0, 'image/png', 0),
(43, '25429.png', '2016-11-16 08:52:16', '0000-00-00 00:00:00', 0, 'image/png', 0),
(44, '43479.png', '2016-11-16 08:52:28', '0000-00-00 00:00:00', 0, 'image/png', 0),
(45, '68023.png', '2016-11-16 08:52:48', '0000-00-00 00:00:00', 0, 'image/png', 0),
(46, '22154.png', '2016-11-16 08:52:57', '0000-00-00 00:00:00', 0, 'image/png', 0),
(47, '31575.png', '2016-11-16 08:53:09', '0000-00-00 00:00:00', 0, 'image/png', 0),
(48, '89754.png', '2016-11-16 09:07:25', '0000-00-00 00:00:00', 0, 'image/png', 0),
(49, '95043.png', '2016-11-16 09:07:57', '0000-00-00 00:00:00', 0, 'image/png', 0),
(50, '39871.png', '2016-11-16 09:08:38', '0000-00-00 00:00:00', 0, 'image/png', 0),
(51, '8388.png', '2016-11-16 09:08:52', '0000-00-00 00:00:00', 0, 'image/png', 0),
(52, '99023.png', '2016-11-16 14:40:59', '0000-00-00 00:00:00', 0, 'image/png', 0),
(53, '64854.png', '2016-11-16 14:41:09', '0000-00-00 00:00:00', 0, 'image/png', 0),
(54, '42789.png', '2016-11-16 14:41:18', '0000-00-00 00:00:00', 0, 'image/png', 0),
(55, '28601.png', '2016-11-16 14:41:27', '0000-00-00 00:00:00', 0, 'image/png', 0),
(56, '72030.png', '2016-11-16 14:41:43', '0000-00-00 00:00:00', 0, 'image/png', 0),
(57, '58540.png', '2016-11-16 14:42:51', '0000-00-00 00:00:00', 0, 'image/png', 0),
(58, '27383.png', '2016-11-16 14:43:04', '0000-00-00 00:00:00', 0, 'image/png', 0),
(59, '95773.png', '2016-11-16 14:43:13', '0000-00-00 00:00:00', 0, 'image/png', 0),
(60, '89330.png', '2016-11-16 14:43:24', '0000-00-00 00:00:00', 0, 'image/png', 0),
(61, '97641.png', '2016-11-16 14:43:34', '0000-00-00 00:00:00', 0, 'image/png', 0),
(62, '66559.png', '2016-11-16 14:43:45', '0000-00-00 00:00:00', 0, 'image/png', 0),
(63, '55686.png', '2016-11-16 14:43:58', '0000-00-00 00:00:00', 0, 'image/png', 0),
(64, '11135.png', '2016-11-16 14:44:07', '0000-00-00 00:00:00', 0, 'image/png', 0),
(65, '10620.png', '2016-11-16 14:44:19', '0000-00-00 00:00:00', 0, 'image/png', 0),
(66, '86099.png', '2016-11-16 14:44:27', '0000-00-00 00:00:00', 0, 'image/png', 0),
(67, '28515.png', '2016-11-16 14:44:34', '0000-00-00 00:00:00', 0, 'image/png', 0),
(68, '10032.png', '2016-11-16 14:44:43', '0000-00-00 00:00:00', 0, 'image/png', 0),
(69, '13888.png', '2016-11-16 14:45:14', '0000-00-00 00:00:00', 22, 'image/png', 0),
(70, '55175.png', '2016-11-16 14:45:32', '0000-00-00 00:00:00', 23, 'image/png', 0),
(71, '30882.png', '2016-11-16 14:45:44', '0000-00-00 00:00:00', 24, 'image/png', 1),
(72, '57546.png', '2016-11-16 14:45:56', '0000-00-00 00:00:00', 25, 'image/png', 0),
(73, '16382.png', '2016-11-16 14:46:16', '0000-00-00 00:00:00', 26, 'image/png', 0),
(74, '92768.png', '2016-11-16 14:47:01', '0000-00-00 00:00:00', 27, 'image/png', 0),
(75, '85966.png', '2016-11-16 14:47:01', '0000-00-00 00:00:00', 27, 'image/png', 0),
(76, '16288.png', '2016-11-16 14:47:01', '0000-00-00 00:00:00', 27, 'image/png', 0),
(77, '41858.png', '2016-11-16 14:47:01', '0000-00-00 00:00:00', 27, 'image/png', 0),
(78, '4107.png', '2016-11-16 14:47:01', '0000-00-00 00:00:00', 27, 'image/png', 0),
(79, '69611.png', '2016-11-16 14:47:01', '0000-00-00 00:00:00', 27, 'image/png', 0),
(80, '1061.pdf', '2016-11-16 14:47:51', '0000-00-00 00:00:00', 29, 'application/pdf', 0),
(81, '97608.png', '2016-11-16 14:48:06', '0000-00-00 00:00:00', 29, 'image/png', 0),
(82, '59147.png', '2016-11-16 14:48:18', '0000-00-00 00:00:00', 30, 'image/png', 0),
(83, '95285.pdf', '2016-11-16 14:48:31', '0000-00-00 00:00:00', 30, 'application/pdf', 0),
(84, '95155.pdf', '2016-11-16 14:48:42', '0000-00-00 00:00:00', 31, 'application/pdf', 0),
(85, '25661.png', '2016-11-16 14:48:55', '0000-00-00 00:00:00', 31, 'image/png', 0),
(86, '49270.pdf', '2016-11-16 14:52:39', '0000-00-00 00:00:00', 32, 'application/pdf', 0),
(87, '86370.pdf', '2016-11-16 15:02:31', '0000-00-00 00:00:00', 22, 'application/pdf', 0),
(88, '9642.pdf', '2016-11-16 15:02:46', '0000-00-00 00:00:00', 23, 'application/pdf', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `lingua`
--

CREATE TABLE `lingua` (
  `lingua_id` int(255) NOT NULL,
  `lingua_label` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `lingua_short` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- --------------------------------------------------------

--
-- Struttura della tabella `match_azienda_categoria_articolo`
--

CREATE TABLE `match_azienda_categoria_articolo` (
  `id_match` int(255) NOT NULL,
  `match_azienda_id` int(255) NOT NULL,
  `match_categoria_id` int(255) NOT NULL,
  `match_articolo_id` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `match_azienda_categoria_articolo`
--

INSERT INTO `match_azienda_categoria_articolo` (`id_match`, `match_azienda_id`, `match_categoria_id`, `match_articolo_id`) VALUES
(43, 9, 5, 0),
(61, 9, 1, 0),
(62, 9, 3, 0),
(63, 9, 4, 0),
(64, 10, 1, 0),
(67, 11, 1, 0),
(68, 11, 3, 0),
(69, 11, 6, 0),
(76, 8, 1, 0),
(77, 8, 2, 0),
(78, 8, 3, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `match_cliente_cataloghi`
--

CREATE TABLE `match_cliente_cataloghi` (
  `id_match_cli_cat` int(255) NOT NULL,
  `match_cli_cat_cliente_id` int(255) NOT NULL,
  `match_cli_cat_articolo_id` int(255) NOT NULL,
  `match_cli_cat_visibile` int(255) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `pagina` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Dump dei dati per la tabella `pagina`
--

INSERT INTO `pagina` (`pagina_id`, `pagina_url`, `pagina_riferimento`, `pagina_meta_title`, `pagina_meta_description`, `pagina_meta_tag`, `pagina_immagine_id`, `pagina_gallery_id`, `pagina_lingua`, `pagina_data_creazione`, `pagina_data_modifica`, `pagina_dipendenza_id`, `pagina_ordinamento`, `pagina_categoria_id`) VALUES
(1, 'home', 'home.php', 'Home', '', '', 0, 0, '', '2016-10-11 14:38:44', '2016-10-11 16:13:01', '0', 0, 0),
(2, 'projects', 'projects.php', 'Projects', '', '', 52, 0, '', '2016-10-11 14:39:11', '2016-11-16 14:40:59', '0', 0, 0),
(3, 'activities', 'activities.php', 'Activities', '', '', 53, 0, '', '2016-10-11 14:39:29', '2016-11-16 14:41:09', '0', 0, 0),
(4, 'showroom', 'showroom.php', 'Showroom', '', '', 54, 0, '', '2016-10-11 14:39:53', '2016-11-16 14:41:18', '0', 0, 0),
(5, 'contacts', 'contacts.php', 'Contacts', '', '', 55, 0, '', '2016-10-11 15:27:42', '2016-11-16 14:41:27', '0', 0, 0),
(6, 'login', 'login.php', 'Login', '', '', 0, 0, '', '2016-10-11 16:16:57', '2016-10-11 16:16:57', '0', 0, 0),
(7, 'account', 'account.php', 'Account', '', '', 0, 0, '', '2016-10-12 09:51:42', '2016-10-12 09:51:42', '0', 0, 0),
(8, 'registrazione', 'registrazione.php', 'registrazione', '', '', 0, 0, '', '2016-11-15 13:47:09', '2016-11-15 13:47:44', '0', 0, 0),
(9, 'cookies', 'cookies.php', 'Cookies', '', '', 0, 0, '', '2016-11-15 13:48:01', '2016-11-15 13:48:01', '0', 0, 0),
(10, 'projects', 'projects.php', 'Projects', '', '', 0, 0, '', '2016-11-15 13:55:01', '2016-11-15 13:55:01', '0', 0, 0),
(11, 'house', 'house.php', 'House', '', '', 58, 0, '', '2016-11-15 13:55:31', '2016-11-16 14:43:04', 'articolo', 0, 0),
(12, 'kitchen', 'kitchen.php', 'Kitchen', '', '', 57, 0, '', '2016-11-15 13:55:51', '2016-11-16 14:42:51', '0', 0, 0),
(13, 'bathroom', 'bathroom.php', 'Bathroom', '', '', 59, 0, '', '2016-11-15 13:56:09', '2016-11-16 14:43:13', '0', 0, 0),
(14, 'living-room', 'living-room.php', 'Living Room', '', '', 60, 0, '', '2016-11-15 13:56:35', '2016-11-16 14:43:24', '0', 0, 0),
(15, 'offices', 'offices.php', 'Offices', '', '', 61, 0, '', '2016-11-15 13:56:54', '2016-11-16 14:43:34', '0', 0, 0),
(16, 'various', 'various.php', 'Various', '', '', 62, 0, '', '2016-11-15 13:57:15', '2016-11-16 14:43:45', '0', 0, 0),
(17, 'recupero-password', 'recupero.php', 'Recupero Password', '', '', 0, 0, '', '2016-11-15 15:48:11', '2016-11-15 15:48:44', '0', 0, 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indici per le tabelle `articolo`
--
ALTER TABLE `articolo`
  ADD PRIMARY KEY (`articolo_id`);

--
-- Indici per le tabelle `azienda`
--
ALTER TABLE `azienda`
  ADD PRIMARY KEY (`azienda_id`);

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indici per le tabelle `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Indici per le tabelle `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indici per le tabelle `immagine`
--
ALTER TABLE `immagine`
  ADD PRIMARY KEY (`immagine_id`);

--
-- Indici per le tabelle `lingua`
--
ALTER TABLE `lingua`
  ADD PRIMARY KEY (`lingua_id`);

--
-- Indici per le tabelle `match_azienda_categoria_articolo`
--
ALTER TABLE `match_azienda_categoria_articolo`
  ADD PRIMARY KEY (`id_match`);

--
-- Indici per le tabelle `match_cliente_cataloghi`
--
ALTER TABLE `match_cliente_cataloghi`
  ADD PRIMARY KEY (`id_match_cli_cat`);

--
-- Indici per le tabelle `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`pagina_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `articolo`
--
ALTER TABLE `articolo`
  MODIFY `articolo_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT per la tabella `azienda`
--
ALTER TABLE `azienda`
  MODIFY `azienda_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT per la tabella `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cliente_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT per la tabella `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `immagine`
--
ALTER TABLE `immagine`
  MODIFY `immagine_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT per la tabella `lingua`
--
ALTER TABLE `lingua`
  MODIFY `lingua_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `match_azienda_categoria_articolo`
--
ALTER TABLE `match_azienda_categoria_articolo`
  MODIFY `id_match` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT per la tabella `match_cliente_cataloghi`
--
ALTER TABLE `match_cliente_cataloghi`
  MODIFY `id_match_cli_cat` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la tabella `pagina`
--
ALTER TABLE `pagina`
  MODIFY `pagina_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
