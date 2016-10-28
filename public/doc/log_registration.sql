-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Out-2016 às 04:20
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escolhaazul`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_registration`
--

CREATE TABLE `log_registration` (
  `log_registration_id` int(10) UNSIGNED NOT NULL,
  `log_registration_id_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `log_registration_action` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `log_registration_description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `log_registration`
--

INSERT INTO `log_registration` (`log_registration_id`, `log_registration_id_user`, `log_registration_action`, `log_registration_description`, `created_at`, `updated_at`) VALUES
(4, '5', 'Logou no Sistema', '', '2016-10-22 22:56:26', '2016-10-22 22:56:26'),
(5, '5', 'Logou no Sistema', '', '2016-10-22 23:06:45', '2016-10-22 23:06:45'),
(6, '5', 'Logou no Sistema', '', '2016-10-24 02:32:13', '2016-10-24 02:32:13'),
(7, '5', 'Logou no Sistema', '', '2016-10-25 03:24:43', '2016-10-25 03:24:43'),
(8, '5', 'Logou no Sistema', '', '2016-10-27 05:04:22', '2016-10-27 05:04:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_registration`
--
ALTER TABLE `log_registration`
  ADD PRIMARY KEY (`log_registration_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_registration`
--
ALTER TABLE `log_registration`
  MODIFY `log_registration_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
