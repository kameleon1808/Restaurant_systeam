-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2022 at 10:10 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dostava`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `location_id`, `slug`, `name`, `details`, `category`, `price`, `img`) VALUES
(1, 1, 'bruskete_paradajz_bosiljak', 'Bruskete sa paradajzom i bosiljkom', 'Prepečeni hleb, paradajz, bolsiljak, maslinovo ujle, beli luk, parmezan, so, biber, aceto krem', 'Predjela', 190, 'assets/img/pic.jpg'),
(2, 1, 'sendvic_sunka', 'Sendvič Sa Šunkom (300 Gr.)', 'Šunka, pavlaka, sir, majonez, ajzberg, paradajz, jaje', 'Sendviči I Tortilje', 320, 'assets/img/pic.jpg'),
(3, 1, 'sendvic_ventricina', 'Sendvič Sa Ventrićinom (300 Gr.)', 'Ventrićina, pavlaka, sir, pikantna salsa od paprike, paradajya, crvenog i belog luka, ajzberg', 'Sendviči I Tortilje', 360, 'assets/img/pic.jpg'),
(4, 1, 'sendvic_prsuta', 'Sendvič Sa Pršutom (300 Gr.)', 'Pršut, pavlaka, sir, rukola, paradajz', 'Sendviči I Tortilje', 400, 'assets/img/pic.jpg'),
(5, 1, 'sundvic_tuna', 'Sendvič Sa Tunom (Posno - 300 Gr.)', 'Tunjevina, sos od paradajza, crveni luk, ajzberg, kiseli krastavac', 'Sendviči I Tortilje', 360, 'assets/img/pic.jpg'),
(6, 1, 'tortilja_piletina', 'Tortilja Sa Piletinom (450 Gr.)', 'Pileći file, pečena pančeta, cezar dresing, ajsberg, paradajz, pomfrit', 'Sendviči I Tortilje', 490, 'assets/img/pic.jpg'),
(7, 1, 'tortilja_svinski_file', 'Tortilja Sa Svinjsim Fileom (450 Gr.)', 'Svinjski file, burger sos, tartar sos, salsa od paradajza, paprike, crvenog i belog luka, ajzberg, pomfrit', 'Sendviči I Tortilje', 520, 'assets/img/pic.jpg'),
(8, 1, 'cezar_salata', 'Cezar salata', 'Pileći file, cezar dresing, ajzberg, radič, rukola, pančeta, so, biber, parmezan, maslinovo ulje', 'Salate', 590, 'assets/img/Cezar.jpeg'),
(9, 1, 'salata_tunjevina', 'Salata sa tunjevinom', 'Tunjevina, ajzberg, rukola, radič, paprika, crveni luk, so, biber, limun', 'Salate', 590, 'assets/img/pic.jpg'),
(10, 1, 'mix_zelenih_salata', 'Miks zelenih salata', 'Ajzberg, rukola, puterica, radič, so, biber, maslinovo ulje, aceto krem', 'Salate', 190, 'assets/img/pic.jpg'),
(11, 1, 'pasta_ravioli_burro_e_salvia', 'Pasta ravioli burro e salvia', 'Ručno rađena sveža pasta punjena rikotom i spanaćem u sosu od butera i žalfije sa listićima parmezana', 'Sveza pasta', 590, 'assets/img/pic.jpg'),
(12, 1, 'pasta_ravioli_prosciutto_e_radicchio', 'Pasta ravioli prosciutto e radicchio', 'Ručno rađena sveža pasta punjena rikotom i spanaćem u kremu od parmezana sa prćšutom i radičem', 'Sveza pasta', 680, 'assets/img/pic.jpg'),
(13, 1, 'pasta_ravioli_alla_pizzaiola', 'Pasta ravioli alla pizzaiola', 'Ručno rađena sveža pasta punjena rikotom i spanaćem u paradajz sosu sa mocarelom i listićima parmezana', 'Sveza pasta', 640, 'assets/img/pic.jpg'),
(14, 1, 'lasagne_al_ragu_di_bolognese', 'Lasagne al ragu di Bolognese (550 Gr.)', 'Loremmy text ek a type', 'Sveza pasta', 760, 'assets/img/pic.jpg'),
(15, 1, 'aglio_e_olio', 'Aglio e olio (500 Gr.)', 'Maslinovo ulje, beli luk, so, biber, peršun, parmezan, belo vino', 'Paste', 450, 'assets/img/pic.jpg'),
(16, 1, 'arrabbiata', 'Arrabbiata (500 Gr.)', 'Maslinovo ulje, beli luk, peršun, cimet, crveni luk, so, biber, belo vino, peperoncino, pelat, parmezan', 'Paste', 550, 'assets/img/pic.jpg'),
(17, 1, 'amatriciana', 'Amatriciana (500 Gr.)', 'Maslinovo ulje, beli luk, crveni luk, peršun, so, biber, belo vino, pelat, slanina, parmezan', 'Paste', 620, 'assets/img/Amatriciana.jpeg'),
(18, 1, 'carbonara', 'Carbonara (500 Gr.)', 'Maslinovo ulje, parmezan ili pekorino, jaje, slanina, so, biber, peršun', 'Paste', 620, 'assets/img/Carbonara.jpeg'),
(19, 1, 'funghi_misti', 'Funghi misti (500 Gr.)', 'Šampinjoni, vrganj, lisičarka, maslac, so, biber, crveni luk, beli luk, peršun, belo vino, majčina dušica, parmezan, maslinovo ulje', 'Paste', 620, 'assets/img/pic.jpg'),
(20, 1, 'norma', 'Norma (500 Gr.)', 'Pelat, patlidžan, maslinovo ulje, pekorino, crveni luk, beli luk, bosiljak, cimet, belo vino', 'Paste', 590, 'assets/img/Norma.jpeg'),
(21, 1, 'quattro_formaggi', 'Quattro formaggi (500 Gr.)', 'Parmezan, montasio, gorgonzola, pekorino, neutralna pavlaka, so, biber, peršun, belo vino, maslinovo ulje', 'Paste', 690, 'assets/img/pic.jpg'),
(22, 1, 'tartufo_nero', 'Tartufo nero (500 Gr.)', 'Crni tartuf, puter, šampinjoni, crveni luk, beli luk, so, biber, peršun, majčina dušica, belo vino, parmezan', 'Paste', 790, 'assets/img/pic.jpg'),
(23, 1, 'pesto_genovese', 'Pesto genovese (500 Gr.)', 'Bolsiljak, maslinovo ulje, beli luk, parmezan, pinjoli, so', 'Paste', 520, 'assets/img/pic.jpg'),
(24, 1, 'pesto_e_pollo', 'Pesto e pollo (500 Gr.)', 'Bosiljak, pileći file, maslinovo ulje, beli luk, parmezan, pinjoli, so, biber, belo vino', 'Paste', 620, 'assets/img/pic.jpg'),
(25, 1, 'pollo_e_zucchini_pasta', 'Pollo e zucchinii (500 Gr.)', 'Pileći file, tikvice, krem od parmezana, maslinovo ulje, belo vino, so, biber, peršun', 'Paste', 610, 'assets/img/pic.jpg'),
(26, 1, 'pomodoro_basilico', 'Pomodoro basilico (500 Gr.)', 'Pelat, bosiljak, maslinovo ulje, crveni luk, beli luk, so, biber, belo vino, parmezan', 'Paste', 590, 'assets/img/Pomodoro basilico.jpeg'),
(27, 1, 'putanesca', 'Putanesca (500 Gr.)', 'Kapar, masline, artičoke, inćun, peperonico, so, biber, crveni luk, beli luk, maslinovo ulje, belo vino, parmezan, peršun, ruzmarin, origano, sušeni paradajz, čeri paradajz', 'Paste', 590, 'assets/img/pic.jpg'),
(28, 1, 'verdura', 'Verdura (500 Gr.)', 'Tikvice, patlidzan, paprike, šampinjoni, čeri paradajz, maslinovo ulje, krem od parmezana, so, biber, belo vino, peršun', 'Paste', 570, 'assets/img/Verdura.jpeg'),
(29, 1, 'bolognese', 'Bolognese (500 Gr.)', 'Svinjsko meso, juneće meso, pelat, slanina, maslinovo ulje, sargarepa, celer, crveni luk, beli luk, parmezan, origano, peršun, belo vino', 'Paste', 620, 'assets/img/pic.jpg'),
(30, 1, 'frutti_di_mare_pasta', 'Frutti di maree (500 Gr.)', 'Morski plodovi, maslinovo ulje, so, biber, parmezan, crveni luk, beli luk, pelat, belo vino, peršun', 'Paste', 650, 'assets/img/pic.jpg'),
(31, 1, 'funghi_misti_rizotoo', 'Funghi mistii (500 Gr.)', 'Arborio pirinač, šampinjoni lisičarka, vrganj, maslinovo ujle, crveni luk, beli luk, majčina dušica, puter, parmezan, belo vino', 'Rizoto', 690, 'assets/img/Funghi misti.jpeg'),
(32, 1, 'pollo_e_zucchini', 'Pollo e zucchini (500 Gr.)', 'Arborio pirinač, pileći file, tikvice, maslinovo ulje, parmezan, puter, so, biber, peršun, crveni luk, beli luk, belo vino', 'Rizoto', 630, 'assets/img/Risotto al pollo zucchini.jpeg'),
(33, 1, 'verdura_rizoto', 'Verduraa (500 Gr.)', 'Arborio pirinač, šampinjoni, patlidžan, tikvica, paprika, parmezan, puter, maslinovo ulje, so, biber, peršun, crveni luk, beli luk, belo vino', 'Rizoto', 610, 'assets/img/pic.jpg'),
(34, 1, 'frutti_di_mare', 'Frutti di mare (500 Gr.)', 'Arborio pirinač, plodovi mora, pelat, maslinovo ulje, puter, parmezan, so, biber, crveni luk, beli luk, peršun, belo vino', 'Rizoto', 670, 'assets/img/pic.jpg'),
(35, 1, 'saltimbocca', 'Saltimbocca', 'Svinjski file (250gr.), pršut, žalfija, puter, belo vino, so, biber, pomfrit, lepinja', 'Jela od mesa', 740, 'assets/img/Saltimboca.jpeg'),
(36, 1, 'medaljoni_sa_sumskim_pecurkama', 'Medaljoni sa šumskim pečurkama', 'Svinjski file (250gr.), vrganji, lisičarke, šampinjoni, buter, lepinja, miks zelenih salata', 'Jela od mesa', 780, 'assets/img/pic.jpg'),
(37, 1, 'becka_snicla', 'Bečka šnicla', 'Svinjski file (250gr.), prezla, jaje, brašno, pomfrit, so, biber, linum, tartar, lepinja', 'Jela od mesa', 620, 'assets/img/pic.jpg'),
(38, 1, 'grill_piletina', 'Grill piletina', 'Pileći file (250gr.), so, biber, pomfrit, lepionja, salata', 'Jela od mesa', 550, 'assets/img/pic.jpg'),
(39, 1, 'piletina_pohovana_u_parmezanu', 'Piletina pohovana u parmezanu', 'Pileći file (250gr.), prezle, parmezan, brašno, jaje, so, biber, pomfrit, tartar sos, lepinja', 'Jela od mesa', 590, 'assets/img/Piletina pohovana u parmezanu.jpeg'),
(40, 1, 'piletina_quattro_formaggii', 'Piletina quattro formaggii', 'Pileći file (250gr.), montasio, gorgonzola, pekorino, parmezan, neutralna pavlaka, so, biber, pomfrit, lepinja, salata', 'Jela od mesa', 690, 'assets/img/pic.jpg'),
(41, 1, 'margherita', 'Margherita', 'Paradajz sos, bosiljak, mocarela', 'Pizza 32cm', 550, 'assets/img/Margherita.jpeg'),
(42, 1, 'diavola', 'Diavola', 'Paradajz sos, mocarela, ventrićina, paprika, peperoncino, masline, origano', 'Pizza 32cm', 680, 'assets/img/pic.jpg'),
(43, 1, 'capricciosa', 'Capricciosa', 'Paradajz sos, šunka, šampinjoni, mocarela, masline, artičoke, origano', 'Pizza 32cm', 650, 'assets/img/Capricciosa.jpeg'),
(44, 1, 'prosciutto_crudo', 'Prosciutto crudo', 'Paradajz sos, mocarela, pršut, šampinjoni, rukola, masline, čeri paradajz, origano, listići parmezana, aceto krem', 'Pizza 32cm', 720, 'assets/img/pic.jpg'),
(45, 1, 'piletina_quattro_formaggi_pizza', 'Piletina quattro formaggi', 'Loremmy text ek a type', 'Pizza 32cm', 690, 'assets/img/pic.jpg'),
(46, 1, 'verdura_pizza', 'Verdura', 'Paradajz sos, mocarela, patlidžan, paprika, tikvica, šampinjoni, čeri paradajz, origano', 'Paste', 610, 'assets/img/pic.jpg'),
(47, 1, 'tricolore', 'Tricolore', 'Paradajz sos, tikvice, mocarela, listići parmezana, origano', 'Pizza 32cm', 610, 'assets/img/Tricolore.jpeg'),
(48, 1, 'quatrro_formaggi_pizza', 'Quatrro formaggi', 'Gorgonzola, montasio, pekorino, mocarela, parmezan, origano', 'Pizza 32cm', 720, 'assets/img/pic.jpg'),
(49, 1, 'napoli', 'Napoli', 'Paradajz sos, inćuni, kapar, masline, artičoke, sušeni paradajz, mocarela, ruzmarin, origano', 'Pizza 32cm', 590, 'assets/img/pic.jpg'),
(50, 1, 'tonno', 'Tonno', 'Paradajz sos, tunjevina, kapar, masline, mocarela, crveni luk, origano', 'Pizza 32cm', 720, 'assets/img/pic.jpg'),
(51, 1, 'funghi', 'Funghi', 'Paradajz sos, mocarela, šampinjoni, origano', 'Pizza 32cm', 550, 'assets/img/pic.jpg'),
(52, 1, 'vesuvio', 'Vesuvio', 'Paradajz sos, mocarela, šunka, origano, crne masline', 'Pizza 32cm', 590, 'assets/img/pic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `legal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `price` double DEFAULT NULL,
  `prod_qty` int(11) NOT NULL DEFAULT 1,
  `confirmed` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `legal_id`, `article_id`, `price`, `prod_qty`, `confirmed`, `created_at`, `updated_at`) VALUES
(83, 6, NULL, 1, 190, 1, 1, '2022-08-13 18:11:06', '2022-08-13 18:11:06'),
(84, 6, NULL, 1, 190, 1, 1, '2022-08-14 11:36:37', '2022-08-14 11:36:37'),
(85, 6, NULL, 3, 360, 1, 1, '2022-08-15 12:30:02', '2022-08-15 12:30:02'),
(86, 6, NULL, 3, 360, 1, 1, '2022-08-15 12:30:04', '2022-08-15 12:30:04'),
(87, 6, NULL, 3, 360, 1, 1, '2022-08-15 12:30:07', '2022-08-15 12:30:07'),
(88, 6, NULL, 43, 650, 1, 1, '2022-08-15 12:30:16', '2022-08-15 12:30:16'),
(89, 6, NULL, 43, 650, 1, 1, '2022-08-15 12:30:18', '2022-08-15 12:30:18'),
(90, 6, NULL, 43, 650, 1, 1, '2022-08-15 12:30:21', '2022-08-15 12:30:21'),
(91, 6, NULL, 43, 650, 1, 1, '2022-08-15 12:30:23', '2022-08-15 12:30:23'),
(92, 6, NULL, 43, 650, 1, 1, '2022-08-15 12:30:26', '2022-08-15 12:30:26'),
(94, 7, NULL, 1, 190, 1, 1, '2022-08-15 17:42:00', '2022-08-15 17:42:00'),
(95, 7, NULL, 1, 190, 1, 1, '2022-08-16 17:31:55', '2022-08-16 17:31:55'),
(96, 7, NULL, 41, 550, 1, 1, '2022-08-16 17:32:02', '2022-08-16 17:32:02'),
(97, 7, NULL, 31, 690, 1, 1, '2022-08-16 17:33:48', '2022-08-16 17:33:48'),
(98, 6, NULL, 43, 650, 1, 1, '2022-08-16 17:45:15', '2022-08-16 17:45:15'),
(100, 6, NULL, 1, 190, 1, 1, '2022-08-17 11:40:12', '2022-08-17 11:40:12'),
(101, 6, NULL, 1, 190, 1, 1, '2022-08-17 11:47:07', '2022-08-17 11:47:07'),
(102, 7, NULL, 1, 190, 1, 1, '2022-08-18 10:10:29', '2022-08-18 10:10:29'),
(104, 7, NULL, 1, 190, 1, 1, '2022-08-18 10:12:00', '2022-08-18 10:12:00'),
(105, 7, NULL, 29, 620, 1, 1, '2022-08-18 23:01:57', '2022-08-18 23:01:57'),
(106, 7, NULL, 44, 720, 1, 1, '2022-08-19 17:00:33', '2022-08-19 17:00:33'),
(108, 7, NULL, 1, 190, 1, 1, '2022-08-19 17:03:40', '2022-08-19 17:03:40'),
(109, 6, NULL, 1, 190, 1, 1, '2022-08-20 10:25:25', '2022-08-20 10:25:25'),
(110, 7, NULL, 8, 590, 1, 1, '2022-08-20 10:34:51', '2022-08-20 10:34:51'),
(111, 7, NULL, 42, 680, 1, 1, '2022-08-20 10:34:58', '2022-08-20 10:34:58'),
(112, 7, NULL, 1, 190, 1, 1, '2022-08-20 10:36:04', '2022-08-20 10:36:04'),
(113, 7, NULL, 1, 190, 1, 1, '2022-08-20 10:40:35', '2022-08-20 10:40:35'),
(119, 7, NULL, 15, 450, 1, 1, '2022-08-20 20:52:23', '2022-08-20 20:52:23'),
(120, 6, NULL, 1, 190, 1, 1, '2022-08-21 00:03:56', '2022-08-21 00:03:56'),
(122, 6, NULL, 1, 190, 1, 1, '2022-08-21 08:17:25', '2022-08-21 08:17:25'),
(123, 6, NULL, 1, 190, 1, 1, '2022-08-21 11:43:50', '2022-08-21 11:43:50'),
(124, 7, NULL, 5, 360, 1, 1, '2022-08-25 19:11:27', '2022-08-25 19:11:27'),
(125, 7, NULL, 18, 620, 1, 1, '2022-08-25 19:11:42', '2022-08-25 19:11:42'),
(126, 7, NULL, 25, 610, 1, 1, '2022-08-29 20:30:40', '2022-08-29 20:30:40'),
(127, 7, NULL, 1, 190, 1, 1, '2022-08-29 20:32:35', '2022-08-29 20:32:35'),
(128, 6, NULL, 1, 190, 1, 1, '2022-08-29 20:35:11', '2022-08-29 20:35:11'),
(129, 6, NULL, 1, 190, 1, 1, '2022-08-29 20:38:40', '2022-08-29 20:38:40'),
(130, 6, NULL, 1, 190, 1, 1, '2022-08-29 21:40:59', '2022-08-29 21:40:59'),
(131, 6, NULL, 1, 190, 1, 1, '2022-08-29 22:10:35', '2022-08-29 22:10:35'),
(133, 7, NULL, 1, 190, 1, 1, '2022-08-31 11:10:12', '2022-08-31 11:10:12'),
(135, 7, NULL, 1, 190, 1, 1, '2022-08-31 11:14:47', '2022-08-31 11:14:47'),
(136, 7, NULL, 1, 190, 1, 1, '2022-08-31 11:21:37', '2022-08-31 11:21:37'),
(138, 7, NULL, 1, 190, 1, 1, '2022-08-31 11:31:14', '2022-08-31 11:31:14'),
(139, 7, NULL, 1, 190, 1, 1, '2022-08-31 11:34:01', '2022-08-31 11:34:01'),
(141, 7, NULL, 41, 550, 1, 1, '2022-08-31 13:11:58', '2022-08-31 13:11:58'),
(142, 7, NULL, 43, 650, 1, 1, '2022-08-31 15:35:02', '2022-08-31 15:35:02'),
(143, 7, NULL, 1, 190, 1, 1, '2022-08-31 15:51:10', '2022-08-31 15:51:10'),
(144, 7, NULL, 1, 190, 1, 1, '2022-08-31 15:52:15', '2022-08-31 15:52:15'),
(145, 7, NULL, 15, 450, 1, 1, '2022-09-01 11:33:59', '2022-09-01 11:33:59'),
(146, 7, NULL, 34, 670, 1, 1, '2022-09-01 11:34:07', '2022-09-01 11:34:07'),
(148, 7, NULL, 1, 190, 1, 1, '2022-09-01 11:35:28', '2022-09-01 11:35:28'),
(149, 6, NULL, 1, 190, 1, 1, '2022-09-10 16:06:12', '2022-09-10 16:06:12'),
(150, 6, NULL, 1, 190, 1, 1, '2022-09-10 16:06:42', '2022-09-10 16:06:42'),
(151, 6, NULL, 1, 190, 1, 1, '2022-09-11 13:37:39', '2022-09-11 13:37:39'),
(158, 2, NULL, 36, 3900, 5, 1, '2022-10-01 20:57:41', '2022-10-01 20:57:41'),
(160, 2, NULL, 46, 610, 1, 1, '2022-10-01 20:58:32', '2022-10-01 20:58:32'),
(161, 2, NULL, 36, 42900, 55, 1, '2022-10-01 21:12:12', '2022-10-01 21:12:12'),
(162, 2, NULL, 36, 780, 1, 1, '2022-10-01 21:18:00', '2022-10-01 21:18:00'),
(164, 2, NULL, 35, 740, 1, 1, '2022-10-01 21:34:21', '2022-10-01 21:34:21'),
(166, 30, NULL, 50, 720, 1, 0, '2022-10-02 20:47:37', '2022-10-02 20:47:37'),
(167, 30, NULL, 50, 3600, 5, 0, '2022-10-02 20:47:42', '2022-10-02 20:47:42'),
(168, 5, NULL, 45, 690, 1, 1, '2022-10-02 21:35:25', '2022-10-02 21:35:25'),
(169, 5, NULL, 45, 69000, 100, 1, '2022-10-02 21:35:31', '2022-10-02 21:35:31'),
(170, 5, NULL, 45, 690, 1, 1, '2022-10-02 21:37:24', '2022-10-02 21:37:24'),
(171, 5, NULL, 36, 117000, 150, 1, '2022-10-02 21:42:47', '2022-10-02 21:42:47'),
(177, 2, NULL, 36, 780, 1, 1, '2022-10-05 18:56:36', '2022-10-05 18:56:36'),
(178, 2, NULL, 19, 31000, 50, 1, '2022-10-05 18:58:12', '2022-10-05 18:58:12'),
(179, 2, NULL, 36, 780, 1, 1, '2022-10-05 21:52:03', '2022-10-05 21:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `legals`
--

CREATE TABLE `legals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `address`, `city`, `created_at`, `updated_at`) VALUES
(1, 'Bitoljska 20', 'Beograd', NULL, NULL),
(2, 'Nikole Vujacic 13', 'Beograd', NULL, NULL),
(3, 'Janka Stajcic', 'Beograd', NULL, NULL),
(4, 'Svetog Save 76', 'Beograd', NULL, NULL),
(5, 'Dula Karaklajica 92', 'Beograd', NULL, NULL),
(6, 'Mutapova 16', 'Beograd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_06_25_093508_create_locations_table', 1),
(5, '2022_06_25_093638_create_restaurants_table', 1),
(6, '2022_06_25_093722_create_articles_table', 1),
(7, '2022_06_25_094936_create_legals_table', 1),
(8, '2022_06_25_094937_create_users_table', 1),
(9, '2022_06_25_094938_create_carts_table', 1),
(10, '2022_06_25_094939_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `legal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pouzecem',
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `article_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prod_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accepted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Prihvati',
  `canceled` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `legal_id`, `location_id`, `order_date`, `payment_method`, `shipping_address`, `shipping_from`, `name`, `company_name`, `phone`, `comments`, `price`, `cart_id`, `article_name`, `prod_qty`, `accepted`, `canceled`, `created_at`, `updated_at`) VALUES
(79, 6, NULL, 1, '2022-08-11 01:02:24', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '190', '71', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 0, '2022-08-10 23:02:24', '2022-08-10 23:02:24'),
(80, 6, NULL, 1, '2022-08-11 01:04:34', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '190', '72', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 0, '2022-08-10 23:04:34', '2022-08-10 23:04:34'),
(81, 7, NULL, 1, '2022-08-11 22:09:42', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '620', '73', 'Funghi misti (500 Gr.)', '1', 'Prihvati', 1, '2022-08-11 20:09:20', '2022-08-11 20:09:20'),
(82, 6, NULL, 1, '2022-08-11 22:24:15', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '190', '74', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 0, '2022-08-12 10:20:43', '2022-08-11 20:20:43'),
(83, 6, NULL, 1, '2022-08-12 11:15:57', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '190', '75', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 1, '2022-08-12 09:15:57', '2022-08-12 09:15:57'),
(84, 6, NULL, 1, '2022-08-12 11:23:01', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '190', '76', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 0, '2022-08-12 09:23:01', '2022-08-12 09:23:01'),
(85, 6, NULL, 1, '2022-08-12 12:38:29', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '190', '77', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 0, '2022-08-12 12:38:29', '2022-08-12 12:38:29'),
(86, 7, NULL, 1, '2022-08-13 12:36:45', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '780', '78 - 79', 'Bruskete sa paradajzom i bosiljkom - Salata sa tunjevinom', '1 - 1', 'PRIHVACENA', 1, '2022-08-13 12:36:45', '2022-08-13 12:36:45'),
(87, 7, NULL, 1, '2022-08-13 12:37:40', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '190', '80', 'Bruskete sa paradajzom i bosiljkom', '1', 'PRIHVACENA', 1, '2022-08-13 12:37:40', '2022-08-13 12:37:40'),
(88, 6, NULL, 1, '2022-08-13 12:40:51', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '190', '81', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 0, '2022-08-13 12:40:51', '2022-08-13 12:40:51'),
(89, NULL, NULL, 1, '2022-08-13 13:33:37', 'pouzecem', NULL, NULL, NULL, NULL, NULL, 'Rucno unesena porudzbina!', '500', NULL, 'Pasta', '3', 'Prihvati', 0, '2022-08-13 13:33:37', '2022-08-13 13:33:37'),
(90, 6, NULL, 1, '2022-08-13 18:06:01', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '190', '82', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 0, '2022-08-13 18:06:01', '2022-08-13 18:06:01'),
(91, 6, NULL, 1, '2022-08-13 18:13:05', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '190', '83', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 0, '2022-08-13 18:13:05', '2022-08-13 18:13:05'),
(92, 6, NULL, 1, '2022-08-14 11:36:44', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '380', '84', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 0, '2022-08-14 11:36:44', '2022-08-14 11:36:44'),
(93, 6, NULL, 1, '2022-08-15 12:30:35', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '4710', '85 - 86 - 87 - 88 - 89 - 90 - 91 - 92', 'Sendvič Sa Ventrićinom (300 Gr.) - Sendvič Sa Ventrićinom (300 Gr.) - Sendvič Sa Ventrićinom (300 Gr.) - Capricciosa - Capricciosa - Capricciosa - Capricciosa - Capricciosa', '1 - 1 - 1 - 1 - 1 - 1 - 1 - 1', 'Prihvati', 0, '2022-08-15 12:30:35', '2022-08-15 12:30:35'),
(94, 7, NULL, 1, '2022-08-15 17:42:05', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '190', '94', 'Bruskete sa paradajzom i bosiljkom', '1', 'PRIHVACENA', 1, '2022-08-15 17:42:05', '2022-08-15 17:42:05'),
(95, 7, NULL, 1, '2022-08-16 17:32:08', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '930', '95 - 96', 'Bruskete sa paradajzom i bosiljkom - Margherita', '1 - 1', 'PRIHVACENA', 1, '2022-08-16 17:32:08', '2022-08-16 17:32:08'),
(96, 7, NULL, 1, '2022-08-16 17:33:55', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '1620', '97', 'Funghi mistii (500 Gr.)', '1', 'PRIHVACENA', 1, '2022-08-16 17:33:55', '2022-08-16 17:33:55'),
(97, 6, NULL, 1, '2022-08-16 17:45:21', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '5360', '98', 'Capricciosa', '1', 'PRIHVACENA', 0, '2022-08-16 17:45:21', '2022-08-16 17:45:21'),
(99, NULL, NULL, 1, '2022-08-16 22:18:28', 'pouzecem', NULL, NULL, NULL, NULL, NULL, 'Rucno unesena porudzbina!', '1000', NULL, 'rucno uneseno jelo', '1', 'PRIHVACENA', 0, '2022-08-16 22:18:28', '2022-08-16 22:18:28'),
(100, 6, NULL, 1, '2022-08-17 11:40:18', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '190', '100', 'Bruskete sa paradajzom i bosiljkom', '1', 'PRIHVACENA', 0, '2022-08-17 11:40:18', '2022-08-17 11:40:18'),
(101, 6, NULL, 1, '2022-08-17 11:47:20', 'pouzecem', 'test adresa2', NULL, 'Marko Đokić', NULL, '3232323', NULL, '190', '101', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 0, '2022-08-17 11:47:20', '2022-08-17 11:47:20'),
(102, 7, NULL, 1, '2022-08-18 10:10:35', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '190', '102', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 1, '2022-08-18 10:10:35', '2022-08-18 10:10:35'),
(103, 7, NULL, 1, '2022-08-18 10:12:09', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '190', '104', 'Bruskete sa paradajzom i bosiljkom', '1', 'PRIHVACENA', 1, '2022-08-18 10:12:09', '2022-08-18 10:12:09'),
(104, NULL, NULL, 1, '2022-08-18 10:23:00', 'pouzecem', NULL, NULL, NULL, NULL, NULL, 'Rucno unesena porudzbina!', '33333,45', NULL, 'Pasta', '3', 'Prihvati', 0, '2022-08-18 10:23:00', '2022-08-18 10:23:00'),
(105, 7, NULL, 1, '2022-08-18 23:02:04', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '620', '105', 'Bolognese (500 Gr.)', '1', 'Prihvati', 1, '2022-08-18 23:02:04', '2022-08-18 23:02:04'),
(106, NULL, NULL, 1, '2022-08-19 11:06:49', 'pouzecem', NULL, NULL, NULL, NULL, NULL, 'Rucno unesena porudzbina!', '122222', NULL, 'sdasd', '1', 'Prihvati', 0, '2022-08-19 11:06:49', '2022-08-19 11:06:49'),
(107, 7, NULL, 1, '2022-08-19 17:01:28', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '720', '106', 'Prosciutto crudo', '1', 'Prihvati', 1, '2022-08-19 17:01:28', '2022-08-19 17:01:28'),
(108, 7, NULL, 1, '2022-08-19 17:03:51', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '190', '108', 'Bruskete sa paradajzom i bosiljkom', '1', 'PRIHVACENA', 1, '2022-08-19 17:03:51', '2022-08-19 17:03:51'),
(109, 6, NULL, 1, '2022-08-20 10:25:33', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '190', '109', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 0, '2022-08-20 10:25:33', '2022-08-20 10:25:33'),
(110, 7, NULL, 1, '2022-08-20 10:35:10', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '1270', '110 - 111', 'Cezar salata - Diavola', '1 - 1', 'PRIHVACENA', 1, '2022-08-20 10:35:10', '2022-08-20 10:35:10'),
(111, 7, NULL, 1, '2022-08-20 10:36:10', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '190', '112', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 1, '2022-08-20 10:36:10', '2022-08-20 10:36:10'),
(112, 7, NULL, 1, '2022-08-20 10:40:47', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '190', '113', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 1, '2022-08-20 10:40:47', '2022-08-20 10:40:47'),
(113, 7, NULL, 1, '2022-08-20 10:41:01', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '190', '113', 'Bruskete sa paradajzom i bosiljkom', '1', 'PRIHVACENA', 0, '2022-08-20 10:41:01', '2022-08-20 10:41:01'),
(117, 7, NULL, 1, '2022-08-20 20:52:30', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '450', '119', 'Aglio e olio (500 Gr.)', '1', 'Prihvati', 0, '2022-08-20 20:52:30', '2022-08-20 20:52:30'),
(118, 6, NULL, 1, '2022-08-21 00:03:59', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '190', '120', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 0, '2022-08-21 00:03:59', '2022-08-21 00:03:59'),
(120, 6, NULL, 1, '2022-08-21 08:17:32', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '190', '122', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 0, '2022-08-21 08:17:32', '2022-08-21 08:17:32'),
(121, 6, NULL, 1, '2022-08-21 11:43:56', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '190', '123', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 0, '2022-08-21 11:43:56', '2022-08-21 11:43:56'),
(122, 7, NULL, 1, '2022-08-25 19:11:50', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '980', '124 - 125', 'Sendvič Sa Tunom (Posno - 300 Gr.) - Carbonara (500 Gr.)', '1 - 1', 'Prihvati', 1, '2022-08-25 19:11:50', '2022-08-25 19:11:50'),
(123, 7, NULL, 1, '2022-08-29 20:30:53', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '610', '126', 'Pollo e zucchinii (500 Gr.)', '1', 'Prihvati', 1, '2022-08-29 20:30:53', '2022-08-29 20:30:53'),
(124, 7, NULL, 1, '2022-08-29 20:32:41', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '190', '127', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 1, '2022-08-29 20:32:41', '2022-08-29 20:32:41'),
(125, 6, NULL, 1, '2022-08-29 20:35:14', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '190', '128', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 1, '2022-08-29 20:35:14', '2022-08-29 20:35:14'),
(126, 6, NULL, 1, '2022-08-29 20:38:43', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '190', '129', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 0, '2022-08-29 20:38:43', '2022-08-29 20:38:43'),
(127, 6, NULL, 1, '2022-08-29 21:41:06', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '190', '130', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 1, '2022-08-29 21:41:06', '2022-08-29 21:41:06'),
(128, 6, NULL, 1, '2022-08-29 22:10:41', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '190', '131', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 1, '2022-08-29 22:10:41', '2022-08-29 22:10:41'),
(130, 7, NULL, 1, '2022-08-31 11:10:42', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '190', '133', 'Bruskete sa paradajzom i bosiljkom', '1', 'PRIHVACENA', 1, '2022-08-31 11:10:42', '2022-08-31 11:10:42'),
(132, 7, NULL, 1, '2022-08-31 11:14:52', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '190', '135', 'Bruskete sa paradajzom i bosiljkom', '1', 'PRIHVACENA', 1, '2022-08-31 11:14:52', '2022-08-31 11:14:52'),
(133, 7, NULL, 1, '2022-08-31 11:22:01', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '190', '136', 'Bruskete sa paradajzom i bosiljkom', '1', 'PRIHVACENA', 1, '2022-08-31 11:22:01', '2022-08-31 11:22:01'),
(135, 7, NULL, 1, '2022-08-31 11:32:09', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '190', '138', 'Bruskete sa paradajzom i bosiljkom', '1', 'PRIHVACENA', 0, '2022-08-31 11:32:09', '2022-08-31 11:32:09'),
(136, 7, NULL, 1, '2022-08-31 13:11:12', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '190', '139', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 1, '2022-08-31 13:11:12', '2022-08-31 13:11:12'),
(137, 7, NULL, 1, '2022-08-31 13:12:06', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '550', '141', 'Margherita', '1', 'Prihvati', 1, '2022-08-31 13:12:06', '2022-08-31 13:12:06'),
(138, 7, NULL, 1, '2022-08-31 15:35:11', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '650', '142', 'Capricciosa', '1', 'Prihvati', 1, '2022-08-31 15:35:11', '2022-08-31 15:35:11'),
(139, 7, NULL, 1, '2022-08-31 15:51:16', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '190', '143', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 1, '2022-08-31 15:51:16', '2022-08-31 15:51:16'),
(140, 7, NULL, 1, '2022-08-31 15:52:34', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '190', '144', 'Bruskete sa paradajzom i bosiljkom', '1', 'PRIHVACENA', 1, '2022-08-31 15:52:34', '2022-08-31 15:52:34'),
(141, 7, NULL, 1, '2022-09-01 11:34:40', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '1120', '145 - 146', 'Aglio e olio (500 Gr.) - Frutti di mare (500 Gr.)', '1 - 1', 'Prihvati', 1, '2022-09-01 11:34:40', '2022-09-01 11:34:40'),
(142, 7, NULL, 1, '2022-09-01 11:35:33', 'pouzecem', 'default address', NULL, 'Ivan Petrović', NULL, '0', NULL, '190', '148', 'Bruskete sa paradajzom i bosiljkom', '1', 'PRIHVACENA', 1, '2022-09-01 11:35:33', '2022-09-01 11:35:33'),
(143, 6, NULL, 1, '2022-09-10 16:06:20', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '190', '149', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 0, '2022-09-10 16:06:20', '2022-09-10 16:06:20'),
(144, 6, NULL, 1, '2022-09-10 16:06:49', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '190', '150', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 0, '2022-09-10 16:06:49', '2022-09-10 16:06:49'),
(145, 6, NULL, 1, '2022-09-11 13:37:42', 'pouzecem', 'test adresa', NULL, 'Marko Đokić', NULL, '3232323', NULL, '190', '151', 'Bruskete sa paradajzom i bosiljkom', '1', 'Prihvati', 0, '2022-09-11 13:37:42', '2022-09-11 13:37:42'),
(149, 2, NULL, 1, '2022-10-01 20:58:51', 'pouzecem', 'User Address 222', NULL, 'User Name', NULL, '23232323', 'Kom neki', '4510', '158 - 160', 'Medaljoni sa šumskim pečurkama - Verdura', '5 - 1', 'PRIHVACENA', 1, '2022-10-01 20:58:51', '2022-10-01 20:58:51'),
(150, 2, NULL, 1, '2022-10-01 21:16:24', 'pouzecem', 'User Address', NULL, 'User Name', NULL, '23232323', NULL, '42900', '161', 'Medaljoni sa šumskim pečurkama', '55', 'Prihvati', 0, '2022-10-01 21:16:24', '2022-10-01 21:16:24'),
(151, 2, NULL, 1, '2022-10-01 21:29:22', 'pouzecem', 'User Address', NULL, 'User Name', NULL, '23232323', NULL, '780', '162', 'Medaljoni sa šumskim pečurkama', '1', 'Prihvati', 0, '2022-10-01 21:29:22', '2022-10-01 21:29:22'),
(152, 5, NULL, 1, '2022-10-02 21:42:28', 'pouzecem', 'Nikole Vujacic 17/2', NULL, 'Legal Name', NULL, '0656766631', NULL, '70380', '168 - 169 - 170', 'Piletina quattro formaggi - Piletina quattro formaggi - Piletina quattro formaggi', '1 - 100 - 1', 'Prihvati', 1, '2022-10-02 21:42:28', '2022-10-02 21:42:28'),
(153, 5, NULL, 1, '2022-10-02 21:45:44', 'pouzecem', 'Nikole Vujacic 17/2', NULL, 'Legal Name', NULL, '0656766631', 'Komentar', '117000', '171', 'Medaljoni sa šumskim pečurkama', '150', 'Prihvati', 0, '2022-10-02 21:45:44', '2022-10-02 21:45:44'),
(154, 2, NULL, 1, '2022-10-02 22:25:39', 'pouzecem', 'User Address', NULL, 'User Name', NULL, '23232323', NULL, '740', '164', 'Saltimbocca', '1', 'Prihvati', 1, '2022-10-02 22:25:39', '2022-10-02 22:25:39'),
(155, 2, NULL, 1, '2022-10-05 18:56:49', 'pouzecem', 'User Address', NULL, 'User Name', NULL, '23232323', NULL, '780', '177', 'Medaljoni sa šumskim pečurkama', '1', 'Prihvati', 1, '2022-10-05 18:56:49', '2022-10-05 18:56:49'),
(156, 2, NULL, 1, '2022-10-05 18:58:45', 'pouzecem', 'User Address', NULL, 'User Name', NULL, '23232323', NULL, '31000', '178', 'Funghi misti (500 Gr.)', '50', 'PRIHVACENA', 0, '2022-10-05 18:58:45', '2022-10-05 18:58:45'),
(157, NULL, NULL, 1, '2022-10-05 19:01:15', 'pouzecem', NULL, NULL, NULL, NULL, NULL, 'Rucno unesena porudzbina!', '100', NULL, 'jelo', '5', 'Prihvati', 0, '2022-10-05 19:01:15', '2022-10-05 19:01:15'),
(158, 2, NULL, 1, '2022-10-05 21:52:11', 'pouzecem', 'User Address', NULL, 'User Name', NULL, '23232323', NULL, '780', '179', 'Medaljoni sa šumskim pečurkama', '1', 'Prihvati', 0, '2022-10-05 21:52:11', '2022-10-05 21:52:11');

-- --------------------------------------------------------

--
-- Table structure for table `order_locations`
--

CREATE TABLE `order_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `boss_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Beograd',
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request` tinyint(4) DEFAULT NULL,
  `delievered` tinyint(4) NOT NULL DEFAULT 0,
  `canceled` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_locations`
--

INSERT INTO `order_locations` (`id`, `user_id`, `boss_id`, `location_id`, `order_id`, `city`, `location`, `request`, `delievered`, `canceled`, `created_at`, `updated_at`) VALUES
(69, 6, 1, 1, 79, 'Beograd', NULL, NULL, 0, 0, '2022-08-10 23:02:24', '2022-08-10 23:02:24'),
(70, 6, NULL, 1, 80, 'Beograd', NULL, NULL, 0, 0, '2022-08-10 23:04:34', '2022-08-10 23:04:34'),
(71, 7, NULL, 1, 81, 'Beograd', NULL, NULL, 0, 0, '2022-08-11 20:09:20', '2022-08-11 20:09:20'),
(72, 6, NULL, 1, 82, 'Beograd', NULL, NULL, 0, 0, '2022-08-11 22:24:15', '2022-08-11 20:20:43'),
(73, 6, NULL, 1, 83, 'Beograd', NULL, NULL, 0, 0, '2022-08-12 09:15:57', '2022-08-12 09:15:57'),
(74, 6, NULL, 1, 84, 'Beograd', NULL, NULL, 0, 0, '2022-08-12 09:23:01', '2022-08-12 09:23:01'),
(75, 6, NULL, 1, 85, 'Beograd', NULL, NULL, 0, 0, '2022-08-12 12:44:04', '2022-08-12 12:38:29'),
(76, 7, NULL, 1, 86, 'Beograd', NULL, NULL, 0, 0, '2022-08-13 12:36:45', '2022-08-13 12:36:45'),
(77, 7, NULL, 1, 87, 'Beograd', NULL, NULL, 0, 0, '2022-08-13 12:37:40', '2022-08-13 12:37:40'),
(78, 6, NULL, 1, 88, 'Beograd', NULL, NULL, 0, 0, '2022-08-13 13:08:47', '2022-08-13 12:40:51'),
(79, 6, NULL, 1, 90, 'Beograd', NULL, NULL, 0, 0, '2022-08-13 18:06:01', '2022-08-13 18:06:01'),
(80, 6, NULL, 1, 91, 'Beograd', NULL, NULL, 0, 0, '2022-08-13 18:13:05', '2022-08-13 18:13:05'),
(81, 6, NULL, 1, 92, 'Beograd', NULL, NULL, 0, 0, '2022-08-14 11:42:04', '2022-08-14 11:36:44'),
(82, 6, NULL, 1, 93, 'Beograd', NULL, NULL, 0, 0, '2022-08-15 12:30:35', '2022-08-15 12:30:35'),
(83, 7, NULL, 1, 94, 'Beograd', NULL, NULL, 0, 0, '2022-08-15 17:42:05', '2022-08-15 17:42:05'),
(84, 7, NULL, 1, 95, 'Beograd', NULL, NULL, 0, 0, '2022-08-16 17:32:08', '2022-08-16 17:32:08'),
(85, 7, NULL, 1, 96, 'Beograd', NULL, NULL, 0, 0, '2022-08-16 17:33:55', '2022-08-16 17:33:55'),
(86, 6, NULL, 1, 97, 'Beograd', NULL, NULL, 0, 0, '2022-08-16 18:03:40', '2022-08-16 17:45:21'),
(88, 6, NULL, 1, 100, 'Beograd', NULL, NULL, 0, 0, '2022-08-17 11:43:55', '2022-08-17 11:40:18'),
(89, 6, NULL, 1, 101, 'Beograd', NULL, NULL, 0, 0, '2022-08-17 11:47:20', '2022-08-17 11:47:20'),
(90, 7, NULL, 1, 102, 'Beograd', NULL, NULL, 0, 0, '2022-08-18 10:10:35', '2022-08-18 10:10:35'),
(91, 7, NULL, 1, 103, 'Beograd', NULL, NULL, 0, 0, '2022-08-18 10:16:27', '2022-08-18 10:12:09'),
(92, 7, NULL, 1, 105, 'Beograd', NULL, NULL, 0, 0, '2022-08-18 23:02:04', '2022-08-18 23:02:04'),
(93, 7, NULL, 1, 107, 'Beograd', NULL, NULL, 0, 0, '2022-08-19 17:01:28', '2022-08-19 17:01:28'),
(94, 7, 1, 1, 108, 'Beograd', NULL, NULL, 0, 0, '2022-08-19 17:03:51', '2022-08-19 17:03:51'),
(95, 6, 1, 1, 109, 'Beograd', NULL, NULL, 0, 0, '2022-08-20 10:25:33', '2022-08-20 10:25:33'),
(96, 7, NULL, 1, 110, 'Beograd', NULL, NULL, 0, 0, '2022-08-20 10:35:10', '2022-08-20 10:35:10'),
(97, 7, 1, 1, 111, 'Beograd', NULL, NULL, 1, 0, '2022-08-20 10:37:30', '2022-08-20 10:36:10'),
(98, 7, NULL, 1, 112, 'Beograd', NULL, NULL, 1, 0, '2022-08-20 10:40:47', '2022-08-20 10:40:47'),
(99, 7, 1, 1, 113, 'Beograd', NULL, NULL, 1, 0, '2022-08-20 10:42:52', '2022-08-20 10:41:01'),
(103, 7, 1, 1, 117, 'Beograd', NULL, NULL, 1, 0, '2022-08-20 20:52:30', '2022-08-20 20:52:30'),
(104, 6, 1, 1, 118, 'Beograd', '20.4604663848877, 44.81623458862305', NULL, 1, 0, '2022-08-21 00:05:13', '2022-08-21 00:03:59'),
(106, 6, 1, 1, 120, 'Beograd', '20.2539038, 44.3857673', NULL, 1, 0, '2022-08-21 08:19:13', '2022-08-21 08:17:32'),
(107, 6, NULL, 1, 121, 'Beograd', NULL, NULL, 0, 0, '2022-08-21 11:43:56', '2022-08-21 11:43:56'),
(108, 7, NULL, 1, 122, 'Beograd', NULL, NULL, 0, 0, '2022-08-25 19:11:50', '2022-08-25 19:11:50'),
(109, 7, NULL, 1, 123, 'Beograd', NULL, NULL, 0, 0, '2022-08-29 20:30:53', '2022-08-29 20:30:53'),
(110, 7, NULL, 1, 124, 'Beograd', NULL, NULL, 0, 0, '2022-08-29 20:32:41', '2022-08-29 20:32:41'),
(111, 6, 1, 1, 125, 'Beograd', NULL, NULL, 0, 0, '2022-08-29 20:35:15', '2022-08-29 20:35:15'),
(112, 6, 1, 1, 126, 'Beograd', '20.2539809, 44.385841', NULL, 0, 0, '2022-08-29 20:42:25', '2022-08-29 20:38:43'),
(113, 6, NULL, 1, 127, 'Beograd', NULL, NULL, 0, 1, '2022-08-29 21:41:06', '2022-08-29 21:41:06'),
(114, 6, NULL, 1, 128, 'Beograd', NULL, NULL, 0, 1, '2022-08-29 22:10:41', '2022-08-29 22:10:41'),
(116, 7, 1, 1, 130, 'Beograd', NULL, NULL, 0, 1, '2022-08-31 11:13:49', '2022-08-31 11:10:42'),
(118, 7, 1, 1, 132, 'Beograd', NULL, NULL, 0, 1, '2022-08-31 11:18:43', '2022-08-31 11:14:52'),
(119, 7, 1, 1, 133, 'Beograd', NULL, 1, 0, 1, '2022-08-31 11:24:59', '2022-08-31 11:22:01'),
(121, 7, 1, 1, 135, 'Beograd', '20.410005619328384, 44.75260247383087', NULL, 1, 0, '2022-08-31 11:34:31', '2022-08-31 11:32:09'),
(122, 7, NULL, 1, 136, 'Beograd', NULL, NULL, 0, 1, '2022-08-31 13:11:12', '2022-08-31 13:11:12'),
(123, 7, 1, 1, 137, 'Beograd', '20.409927778021377, 44.752591442250626', NULL, 0, 1, '2022-08-31 13:13:39', '2022-08-31 13:12:06'),
(124, 7, NULL, 1, 138, 'Beograd', NULL, NULL, 0, 1, '2022-08-31 15:35:11', '2022-08-31 15:35:11'),
(125, 7, NULL, 1, 139, 'Beograd', NULL, NULL, 0, 1, '2022-08-31 15:51:16', '2022-08-31 15:51:16'),
(126, 7, 1, 1, 140, 'Beograd', '20.448897102575955, 44.80821712195183', NULL, 0, 1, '2022-08-31 15:54:19', '2022-08-31 15:52:34'),
(127, 7, NULL, 1, 141, 'Beograd', NULL, NULL, 0, 1, '2022-09-01 11:34:40', '2022-09-01 11:34:40'),
(128, 7, 1, 1, 142, 'Beograd', '20.401439, 44.8456305', NULL, 0, 1, '2022-09-01 11:36:49', '2022-09-01 11:35:33'),
(129, 6, NULL, 1, 143, 'Beograd', NULL, NULL, 0, 0, '2022-09-10 16:06:20', '2022-09-10 16:06:20'),
(130, 6, NULL, 1, 144, 'Beograd', NULL, NULL, 0, 0, '2022-09-10 16:06:49', '2022-09-10 16:06:49'),
(131, 6, NULL, 1, 145, 'Beograd', NULL, NULL, 0, 0, '2022-09-11 13:37:42', '2022-09-11 13:37:42'),
(135, 2, 1, 1, 149, 'Beograd', '20.4604663848877, 44.81623458862305', NULL, 0, 1, '2022-10-01 21:03:43', '2022-10-01 20:58:51'),
(136, 2, NULL, 1, 150, 'Beograd', NULL, NULL, 0, 0, '2022-10-01 21:16:24', '2022-10-01 21:16:24'),
(137, 2, NULL, 1, 151, 'Beograd', NULL, NULL, 0, 0, '2022-10-01 21:29:22', '2022-10-01 21:29:22'),
(138, 5, NULL, 1, 152, 'Beograd', NULL, NULL, 0, 1, '2022-10-02 21:42:28', '2022-10-02 21:42:28'),
(139, 5, 1, 1, 153, 'Beograd', NULL, NULL, 1, 0, '2022-10-02 21:45:44', '2022-10-02 21:45:44'),
(140, 2, NULL, 1, 154, 'Beograd', NULL, NULL, 0, 1, '2022-10-02 22:25:39', '2022-10-02 22:25:39'),
(141, 2, NULL, 1, 155, 'Beograd', NULL, NULL, 0, 1, '2022-10-05 18:56:49', '2022-10-05 18:56:49'),
(142, 2, 1, 1, 156, 'Beograd', '20.4604663848877, 44.81623458862305', NULL, 0, 0, '2022-10-05 19:26:23', '2022-10-05 18:58:45'),
(143, 2, 1, 1, 158, 'Beograd', '20.4604663848877, 44.81623458862305', 1, 0, 0, '2022-10-05 21:52:59', '2022-10-05 21:52:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `location_id`, `created_at`, `updated_at`) VALUES
(1, 'Pepe Nero', 1, NULL, NULL),
(2, 'Pepe Nero', 2, NULL, NULL),
(3, 'City Grill', 3, NULL, NULL),
(4, 'Pink Panter', 4, NULL, NULL),
(5, 'Pink Panter', 5, NULL, NULL),
(6, 'Pink Panter', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` bigint(20) UNSIGNED DEFAULT 1,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `company_name`, `phone`, `username`, `role`, `provider_id`, `location_id`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Deliverer Name', 'deliverer@gmail.com', 'Deliverer Adressa', NULL, '12121212', 'DelivererUsername', 1, NULL, 1, '$2y$10$MYRmsydBEgeoiyNvK3BBS.cDQKOikezeeGgbDn4.UVqN1YmYjoOeS', NULL, NULL, NULL, NULL),
(2, 'User Name', 'user@gmail.com', 'User Address', NULL, '23232323', 'UserUsername', 2, NULL, NULL, '$2y$10$DJVMT6aUsDHeG91YTDS8je.fOleMBQQnQpx1xz5jzil99Y1ii8wzC', NULL, NULL, NULL, '2022-10-02 22:06:48'),
(3, 'Waiter Name', 'waiter@gmail.com', 'Waiter Address', NULL, '34343434', 'WaiterUsername', 3, NULL, 1, '$2y$10$MYRmsydBEgeoiyNvK3BBS.cDQKOikezeeGgbDn4.UVqN1YmYjoOeS', NULL, NULL, NULL, NULL),
(4, 'State Name', 'state@gmail.com', 'State Address', NULL, '45454545', 'StateUsername', 4, '', 1, '$2y$10$MYRmsydBEgeoiyNvK3BBS.cDQKOikezeeGgbDn4.UVqN1YmYjoOeS', NULL, NULL, NULL, NULL),
(5, 'Legal Name', 'legal@gmail.com', 'Nikole Vujacic 17/2', 'Oxoftware', '0656766631', 'LegalUsername', 5, NULL, 1, '$2y$10$MYRmsydBEgeoiyNvK3BBS.cDQKOikezeeGgbDn4.UVqN1YmYjoOeS', NULL, NULL, NULL, '2022-10-02 21:41:57'),
(6, 'Marko Đokić', 'marks7675@gmail.com', 'test adresa', NULL, '3232323', 'Marko Đokić105702017185169582978', 3, '105702017185169582978', 1, '$2y$10$MYRmsydBEgeoiyNvK3BBS.cDQKOikezeeGgbDn4.UVqN1YmYjoOeS', NULL, NULL, '2022-07-26 11:18:33', '2022-07-26 11:18:44'),
(7, 'Ivan Petrović', 'ivan.petrovic1113@gmail.com', 'default address', NULL, '0', 'Ivan Petrović118162653109925691539', 0, '118162653109925691539', 1, 'eyJpdiI6InB5L2ZuMGh0dUJhRE84My9ETU85RFE9PSIsInZhbHVlIjoiZHc0V3Zvc3dMVTM5cC91WElib2FyMVI0ejFScklVOUEwZ0NYZ2VlVTFNOD0iLCJtYWMiOiJhNWQ3NjYwMTNhNjllMGI0NWM5NDM3YjMwNjdkNmRlOGVlZTI5NDBkNzZiODgzNDVhYTEzYjZmMDYwYWE3NmQ0IiwidGFnIjoiIn0=', NULL, NULL, '2022-07-29 13:36:13', '2022-07-29 13:36:13'),
(8, 'Milos Galic', 'somigalic@gmail.com', 'default address', NULL, '0', 'Milos Galic5632091996809546', 2, '5632091996809546', 1, 'eyJpdiI6IlFWdUJuajZHR1ZGeGdLR0FUZklMUXc9PSIsInZhbHVlIjoiNFJrbjQzN3Y4UENHdFY2Y2tuTG95ODVIL2t0Y3BRVWY5NmJoWHBMbHNrOD0iLCJtYWMiOiJhMjlhZjNhMTg2NjExNTdmNmJlMGYzMTRmNDI1ZWQ4NTgzNGYyNzliMzIxMmIzYjQyNGU1ODM4NWE4ZTVlYjUwIiwidGFnIjoiIn0=', NULL, NULL, '2022-07-30 23:52:21', '2022-07-30 23:52:21'),
(9, 'Zlatko Milosevic', 'zlatkomilosevic3@gmail.com', 'default address', NULL, '0', 'Zlatko Milosevic8148305355195003', 2, '8148305355195003', 1, 'eyJpdiI6IlV0dXVGQXZqKzBWZjRwcnNLZEhlekE9PSIsInZhbHVlIjoic0VJWnV4VDY4SDV3VnRpRXdVSHh3YW81OFBIUHNNVVNaRWMvQ3N5b0R1RT0iLCJtYWMiOiIwNjU1ZDE0YTJkNTk1NjMwMTI5OGRhMmU2NGI1MDU5NGY2MzBmZjhkZWE2MzIyNjNkMGU3MGE0ZDQ0Y2Y3ODI4IiwidGFnIjoiIn0=', NULL, NULL, '2022-08-03 09:08:17', '2022-08-03 09:08:17'),
(10, 'Marko Djokic', 'email@gmail.com', 'adressa 1', NULL, '121221212', 'username', 2, NULL, 1, '$2y$10$GipcCy88RoMlw4UJyhqq4ugk9hGbW0JapCX/ZqXV2vkIooVqrFiZ2', NULL, NULL, '2022-08-06 10:14:28', '2022-08-06 10:14:28'),
(11, 'Test Ime', 'marko00djokic@gmail.com', 'Nikole Vujacic 17/2', NULL, '43453453', 'testuser', 3, NULL, 1, '$2y$10$T0iQ0yF140RNiX2KoAsO0uDcfTjUS.4XjiFmJU/pawUWDIux4n7T6', NULL, NULL, '2022-08-10 22:21:14', '2022-08-10 22:21:14'),
(13, 'Boss Name', 'boss@gmail.com', 'Boss Adresa', NULL, '2121212', 'BossUsername', 6, NULL, 1, '$2y$10$OJocvsRv4Ca6q8ZLnP4PQOy2edLrqOioJnSOVWubboViWaltg9bYa', NULL, NULL, NULL, '2022-10-02 12:02:33'),
(17, 'Marko Đokićcc', 'marks@yahoo.comm', 'Janka Stajcic 110', NULL, '+381644257700', 'kameleon21212', 1, NULL, NULL, '$2y$10$FhkZuyMKtIkE33OH7uj1iunYgL0OYtb55ghmcSzFuPY1QSAfK47ae', NULL, NULL, '2022-09-25 10:24:27', '2022-09-25 10:24:27'),
(18, 'Milos Milosevic', 'milos@gmail.com', 'Milos Adresa', NULL, '+381644257700', 'milos_username', 2, NULL, NULL, '$2y$10$7/a87ntura0JAutaBjx5FOCz1TZFBLd2Jl93rg7dKJI2ahGW3SA9O', NULL, NULL, '2022-10-02 09:56:46', '2022-10-02 09:56:46'),
(19, 'Majkic stefan', 'stefan@gmail.com', 'Janka Stajcic 110', NULL, '+38164425770', 'stefan239', 2, NULL, 1, '$2y$10$1EGM4hrgF7/lk8JW0i.pC.xjHFWgdBPIrrOkeuMuN1oPscq5ECs.y', NULL, NULL, '2022-10-02 10:03:11', '2022-10-02 10:03:11'),
(20, 'Legal novi', 'legal22@gmail.com', 'Legal Addresa Nova', 'Nova kompanija', '676767676', 'legalUsernameNovi', 5, NULL, 1, '$2y$10$toAgdQv9Iav4wIYK3x4OZO6t0nykx9BHSUwWCDCROgYuzcDfWLzEW', NULL, NULL, '2022-10-02 10:44:17', '2022-10-02 10:44:17'),
(21, 'Marko Đokićcc', 'marksxcbdcv@yahoo.comm', 'Janka Stajcic 110', 'ITS', '+381644257700', 'kameleon', 5, NULL, 1, '$2y$10$0iF6FCjbZsIPuez8QmmlRuigZscCq0dE3c2oFesU2vQ3qSCRb1HlK', NULL, NULL, '2022-10-02 10:52:57', '2022-10-02 10:52:57'),
(22, 'Marko Đokić', 'mark453453@yahoo.comm', 'Janka Stajcic 110', 'ITS', '+381644257700', 'dfgdsfgsdfg', 5, NULL, 1, '$2y$10$NxVoXcBlC18Zpmil.fCIhuNjQeb0NXEhryEY8v6.A2QLAPEOfguNS', NULL, NULL, '2022-10-02 10:57:14', '2022-10-02 10:57:14'),
(24, 'Marko Đokićcc', 'marksdfsa@yahoo.comm', 'Janka Stajcic 110', 'ITS', '+381644257700', 'kameleonerydfgbd', 5, NULL, 1, '$2y$10$KHsFAi1QdOc9jNESliG6quoK4Cd2.IgBdfuoS3IwHiQV1U6LcQkt2', NULL, NULL, '2022-10-02 11:00:37', '2022-10-02 11:00:37'),
(25, 'Marko Đokićcc', 'marnhfgfgks@yahoo.comm', 'Janka Stajcic 110', 'ITS', '+381644257700', 'kameleondfgbdf', 5, NULL, 1, '$2y$10$2bJfzRNQWCyQ7KE8i.pTQO09WqSzFdESda5z7k.F1tbTwo0P0mc8e', NULL, NULL, '2022-10-02 11:08:04', '2022-10-02 11:08:04'),
(27, 'New State', 'new-state@gmail.com', 'New State Adr', NULL, '5454545', 'newState-username', 4, NULL, 1, '$2y$10$5ki4pkNK4OGx5Ig7Z5PRQ.M6NOlZWsNqZHz5b2HkRfdOE03P.NxLe', NULL, NULL, '2022-10-02 11:53:12', '2022-10-02 11:53:12'),
(28, 'New Deliverer', 'new-deliverer@gmail.com', 'NewAdr Deliverer', NULL, '7676767', 'New-deliverer-username', 1, NULL, 1, '$2y$10$9Hg4fiUXrVkAp8AKZEd5K.FpUJ3RrQXTwyecRPXI3F9r3Dt2or4Mq', NULL, NULL, '2022-10-02 11:53:55', '2022-10-02 11:53:55'),
(29, 'milovan mili', 'mili@gmail.com', 'mili adresa', 'Mili Company', '545454', 'mili_user', 5, NULL, 1, '$2y$10$//WXpq8otbXicSsX5NRBAu81yONJoSvxg5bDM8N6cd6eD8L6aCat2', NULL, NULL, '2022-10-02 20:46:06', '2022-10-02 20:46:06'),
(30, 'Marko Đokić', 'markdfsdfs@yahoo.comm', 'Janka Stajcic 110', NULL, '+381644257700', 'trth4645', 2, NULL, 1, '$2y$10$EuLhB1bVn7jBSdiCSzlY4eH8o0szrvU2mEfBGZMCdaW7ItjmIo1si', NULL, NULL, '2022-10-02 20:47:22', '2022-10-02 20:47:22'),
(31, 'Marko Đokićcc', 'marcvzdks@yahoo.comm', 'Janka Stajcic 110', NULL, '+381644257700', 'kameleonxcsd', 2, NULL, 1, '$2y$10$8hadvajCI0nZQq0lc.Z88ejPCqUUhwmU8siGpbOsATh/vRODXgyba', NULL, NULL, '2022-10-02 21:52:58', '2022-10-02 21:52:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`),
  ADD UNIQUE KEY `articles_name_unique` (`name`),
  ADD KEY `articles_location_id_foreign` (`location_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_legal_id_foreign` (`legal_id`),
  ADD KEY `carts_article_id_foreign` (`article_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `legals`
--
ALTER TABLE `legals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `legals_email_unique` (`email`),
  ADD UNIQUE KEY `legals_username_unique` (`username`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_legal_id_foreign` (`legal_id`),
  ADD KEY `orders_location_id_foreign` (`location_id`);

--
-- Indexes for table `order_locations`
--
ALTER TABLE `order_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_locations_user_id_foreign` (`user_id`),
  ADD KEY `order_locations_boss_id_foreign` (`boss_id`),
  ADD KEY `order_locations_location_id_foreign` (`location_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurants_location_id_foreign` (`location_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_location_id_foreign` (`location_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `legals`
--
ALTER TABLE `legals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `order_locations`
--
ALTER TABLE `order_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_legal_id_foreign` FOREIGN KEY (`legal_id`) REFERENCES `legals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_legal_id_foreign` FOREIGN KEY (`legal_id`) REFERENCES `legals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_locations`
--
ALTER TABLE `order_locations`
  ADD CONSTRAINT `order_locations_boss_id_foreign` FOREIGN KEY (`boss_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_locations_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_locations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
