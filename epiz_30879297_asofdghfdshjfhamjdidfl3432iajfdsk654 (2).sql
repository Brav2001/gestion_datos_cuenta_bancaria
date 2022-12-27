-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql112.epizy.com
-- Tiempo de generación: 26-12-2022 a las 09:58:21
-- Versión del servidor: 10.3.27-MariaDB
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `epiz_30879297_asofdghfdshjfhamjdidfl3432iajfdsk654`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credit`
--

CREATE TABLE `credit` (
  `credit_id` int(10) UNSIGNED NOT NULL,
  `application_id` int(10) UNSIGNED NOT NULL,
  `pers_id_debtor` int(10) UNSIGNED NOT NULL,
  `pers_id_codebtor` int(10) UNSIGNED NOT NULL,
  `name_debtor` varchar(100) NOT NULL,
  `name_cobetor` varchar(100) NOT NULL,
  `document_debtor` varchar(11) NOT NULL,
  `document_codebtor` varchar(11) NOT NULL,
  `credit_capital_debt` double NOT NULL,
  `credit_capital_payd` double NOT NULL,
  `credit_interest_debt` double NOT NULL,
  `credit_interest_payd` double NOT NULL,
  `credit_arrears_collected` double NOT NULL,
  `credit_surplus_collected` double NOT NULL,
  `credit_period` int(10) UNSIGNED NOT NULL,
  `credit_period_payd` int(11) NOT NULL,
  `credit_date_cut_first` date NOT NULL,
  `credit_date_cut_end` date NOT NULL,
  `credit_state` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `credit`
--

INSERT INTO `credit` (`credit_id`, `application_id`, `pers_id_debtor`, `pers_id_codebtor`, `name_debtor`, `name_cobetor`, `document_debtor`, `document_codebtor`, `credit_capital_debt`, `credit_capital_payd`, `credit_interest_debt`, `credit_interest_payd`, `credit_arrears_collected`, `credit_surplus_collected`, `credit_period`, `credit_period_payd`, `credit_date_cut_first`, `credit_date_cut_end`, `credit_state`, `created_at`, `updated_at`) VALUES
(8, 12, 16, 10, 'Yanina Stefany Barbosa S&aacute;nchez', 'Cecilia S&aacute;nchez', '1091669022', '37325688', 500000, 500000, 35577, 35577, 0, 1323, 6, 6, '2023-01-01', '2023-01-10', 'payd', '2022-06-17 20:37:01', '2022-12-09 13:12:33'),
(9, 13, 14, 10, 'Luis Alfredo Barbosa S&aacute;nchez', 'Cecilia S&aacute;nchez', '1092732325', '37325688', 500000, 500000, 35577, 35577, 0, 1323, 6, 6, '2023-01-01', '2023-01-10', 'payd', '2022-06-17 20:37:06', '2022-12-09 13:12:43'),
(10, 14, 8, 17, 'Gloria Maria Barbosa L&aacute;zaro', 'Diana Paola Vivas Barbosa', '27765442', '37338329', 300000, 300000, 12079, 12079, 0, 171, 3, 3, '2022-11-01', '2022-11-10', 'payd', '2022-06-25 10:26:45', '2022-10-03 19:32:15'),
(11, 15, 19, 18, 'Francisco Acosta Toro', 'Sandra Milene Vivas Barbosa', '88283187', '37329922', 500000, 500000, 35577, 35577, 0, 122, 6, 6, '2023-02-01', '2023-02-10', 'payd', '2022-06-28 19:57:40', '2022-08-17 13:19:23'),
(12, 16, 18, 3, 'Sandra Milene Vivas Barbosa', 'Brayan Acosta Vivas', '37329922', '1193100108', 180000, 180000, 10943, 10943, 0, 57, 5, 5, '2023-01-01', '2023-01-10', 'payd', '2022-07-05 21:05:14', '2022-10-31 19:27:07'),
(13, 17, 12, 11, 'Elian Navarro Barbosa', 'Carmenza Vivas Barbosa', '13379452', '37326336', 500000, 75306, 67358, 19254, 0, 820, 12, 2, '2023-01-01', '2023-01-10', 'active', '2022-09-26 20:12:36', '2022-12-04 18:53:34'),
(14, 18, 11, 12, 'Carmenza Vivas Barbosa', 'Elian Navarro Barbosa', '37326336', '13379452', 500000, 75306, 67358, 19254, 0, 220, 12, 2, '2023-01-01', '2023-01-10', 'active', '2022-09-26 20:12:44', '2022-12-04 18:53:50'),
(15, 19, 20, 13, 'Eliana Yireth Navarro Vivas', 'Ariathna Yulitza Navarro Vivas', '1091355630', '1004862854', 500000, 75306, 67358, 19254, 0, 220, 12, 2, '2023-01-01', '2023-01-10', 'active', '2022-09-26 20:12:52', '2022-12-04 18:53:59'),
(16, 21, 13, 11, 'Ariathna Yulitza Navarro Vivas', 'Carmenza Vivas Barbosa', '1004862854', '37326336', 500000, 75306, 67358, 19254, 0, 220, 12, 2, '2023-01-01', '2023-01-10', 'active', '2022-09-26 20:12:59', '2022-12-04 18:54:09'),
(17, 22, 10, 16, 'Cecilia S&aacute;nchez', 'Yanina Stefany Barbosa S&aacute;nchez', '37325688', '1091669022', 500000, 103541, 51320, 18975, 0, 144, 9, 2, '2023-01-01', '2023-01-10', 'active', '2022-10-10 13:39:06', '2022-12-09 13:12:54'),
(18, 23, 35, 10, 'Frank Luis Barbosa S&aacute;nchez', 'Cecilia S&aacute;nchez', '1091682268', '37325688', 250000, 67929, 20395, 9327, 9000, 44, 7, 2, '2023-01-01', '2023-01-10', 'active', '2022-10-15 12:51:21', '2022-12-10 18:55:42'),
(19, 24, 24, 12, 'Heiler Camilo Navarro Vivas', 'Elian Navarro Barbosa', '1091676902', '13379452', 500000, 37280, 67358, 10000, 0, 0, 12, 1, '2023-01-01', '2023-01-10', 'active', '2022-11-10 20:30:32', '2022-12-04 18:54:28'),
(20, 25, 23, 17, 'Yulfran Adrian Sanabria Guerrero', 'Diana Paola Vivas Barbosa', '13176810', '37338329', 500000, 0, 51320, 0, 0, 0, 9, 0, '2023-01-01', '2023-01-10', 'active', '2022-12-10 19:33:33', '2022-12-10 19:33:33'),
(22, 26, 39, 41, 'Marlin Sugey Carvajalino', 'Sergio Gaona Cardona', '1091655696', '13175765', 500000, 0, 20132, 0, 0, 0, 3, 0, '2023-02-01', '2023-02-10', 'active', '2022-12-22 20:50:58', '2022-12-22 20:50:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credit_application`
--

CREATE TABLE `credit_application` (
  `credit_application_id` int(10) UNSIGNED NOT NULL,
  `pers_id_debtor` int(10) UNSIGNED NOT NULL,
  `pers_id_co_debtor` int(10) UNSIGNED NOT NULL,
  `name_debtor` varchar(100) NOT NULL,
  `name_co_debtor` varchar(100) NOT NULL,
  `document_debtor` varchar(11) NOT NULL,
  `document_co_debtor` varchar(11) NOT NULL,
  `credit_application_value` varchar(45) NOT NULL,
  `credit_application_months` varchar(45) NOT NULL,
  `credit_application_use` varchar(45) NOT NULL,
  `credit_application_message` varchar(255) NOT NULL,
  `credit_application_state` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `credit_application`
--

INSERT INTO `credit_application` (`credit_application_id`, `pers_id_debtor`, `pers_id_co_debtor`, `name_debtor`, `name_co_debtor`, `document_debtor`, `document_co_debtor`, `credit_application_value`, `credit_application_months`, `credit_application_use`, `credit_application_message`, `credit_application_state`, `created_at`, `updated_at`) VALUES
(12, 16, 10, 'Yanina Stefany Barbosa S&aacute;nchez', 'Cecilia S&aacute;nchez', '1091669022', '37325688', '500000', '6', 'libre', '---', 'reviewed actived', '2022-06-17 13:42:10', '2022-06-17 20:37:00'),
(13, 14, 10, 'Luis Alfredo Barbosa S&aacute;nchez', 'Cecilia S&aacute;nchez', '1092732325', '37325688', '500000', '6', 'libre', '---', 'reviewed actived', '2022-06-17 13:49:35', '2022-06-17 20:37:00'),
(14, 8, 17, 'Gloria Maria Barbosa L&aacute;zaro', 'Diana Paola Vivas Barbosa', '27765442', '37338329', '300000', '3', 'libre', '---', 'reviewed actived', '2022-06-25 08:41:41', '2022-06-25 10:26:00'),
(15, 19, 18, 'Francisco Acosta Toro', 'Sandra Milene Vivas Barbosa', '88283187', '37329922', '500000', '6', 'urgencia', 'Reparaci&oacute;n de veh&iacute;culo', 'reviewed actived', '2022-06-28 13:00:30', '2022-06-28 19:57:00'),
(16, 18, 3, 'Sandra Milene Vivas Barbosa', 'Brayan Acosta Vivas', '37329922', '1193100108', '180000', '5', 'urgencia', 'Se necesita para pagar gafas medicadas', 'reviewed actived', '2022-07-01 19:00:31', '2022-07-05 21:05:00'),
(17, 12, 11, 'Elian Navarro Barbosa', 'Carmenza Vivas Barbosa', '13379452', '37326336', '500000', '12', 'libre', '---', 'reviewed actived', '2022-09-07 19:43:07', '2022-09-26 20:12:00'),
(18, 11, 12, 'Carmenza Vivas Barbosa', 'Elian Navarro Barbosa', '37326336', '13379452', '500000', '12', 'libre', '---', 'reviewed actived', '2022-09-07 19:50:36', '2022-09-26 20:12:00'),
(19, 20, 13, 'Eliana Yireth Navarro Vivas', 'Ariathna Yulitza Navarro Vivas', '1091355630', '1004862854', '500000', '12', 'libre', '---', 'reviewed actived', '2022-09-07 19:52:55', '2022-09-26 20:12:00'),
(20, 13, 20, 'Ariathna Yulitza Navarro Vivas', 'Eliana Yireth Navarro Vivas', '1004862854', '1091355630', '500000', '12', 'libre', '---', 'reviewed deny', '2022-09-07 19:57:40', '2022-09-24 14:24:28'),
(21, 13, 11, 'Ariathna Yulitza Navarro Vivas', 'Carmenza Vivas Barbosa', '1004862854', '37326336', '500000', '12', 'libre', '---', 'reviewed actived', '2022-09-25 18:26:02', '2022-09-26 20:12:00'),
(22, 10, 16, 'Cecilia S&aacute;nchez', 'Yanina Stefany Barbosa S&aacute;nchez', '37325688', '1091669022', '500000', '9', 'libre', '---', 'reviewed actived', '2022-09-26 20:36:46', '2022-10-10 13:39:00'),
(23, 35, 10, 'Frank Luis Barbosa S&aacute;nchez', 'Cecilia S&aacute;nchez', '1091682268', '37325688', '250000', '7', 'urgencia', 'Plazo hasta hoy de pagar una pr&aacute;ctica universidad de prioridad ', 'reviewed actived', '2022-10-14 12:17:47', '2022-10-15 12:51:00'),
(24, 24, 12, 'Heiler Camilo Navarro Vivas', 'Elian Navarro Barbosa', '1091676902', '13379452', '500000', '12', 'libre', '---', 'reviewed actived', '2022-11-02 20:22:27', '2022-11-10 20:30:00'),
(25, 23, 17, 'Yulfran Adrian Sanabria Guerrero', 'Diana Paola Vivas Barbosa', '13176810', '37338329', '500000', '9', 'urgencia', 'Materiales para el trabajo', 'reviewed actived', '2022-11-30 21:15:35', '2022-12-10 19:33:00'),
(26, 39, 41, 'Marlin Sugey Carvajalino', 'Sergio Gaona Cardona', '1091655696', '13175765', '500000', '3', 'libre', '---', 'reviewed actived', '2022-12-18 20:46:51', '2022-12-22 20:50:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `log_id` int(10) UNSIGNED NOT NULL,
  `pers_id` int(10) UNSIGNED NOT NULL,
  `log_name` varchar(50) NOT NULL,
  `log_lastname` varchar(50) NOT NULL,
  `log_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`log_id`, `pers_id`, `log_name`, `log_lastname`, `log_date`) VALUES
(1, 3, 'Brayan', 'Acosta Vivas', '2022-05-03 09:01:30'),
(2, 3, 'Brayan', 'Acosta Vivas', '2022-05-03 12:12:43'),
(3, 3, 'Brayan', 'Acosta Vivas', '2022-05-03 13:07:27'),
(4, 3, 'Brayan', 'Acosta Vivas', '2022-05-03 13:19:28'),
(5, 3, 'Brayan', 'Acosta Vivas', '2022-05-03 14:01:39'),
(6, 3, 'Brayan', 'Acosta Vivas', '2022-05-03 20:41:38'),
(7, 18, 'Sandra Milene', 'Vivas Barbosa', '2022-05-03 20:42:34'),
(8, 18, 'Sandra Milene', 'Vivas Barbosa', '2022-05-03 20:49:24'),
(9, 3, 'Brayan', 'Acosta Vivas', '2022-05-03 20:51:13'),
(10, 3, 'Brayan', 'Acosta Vivas', '2022-05-04 11:22:58'),
(11, 3, 'Brayan', 'Acosta Vivas', '2022-05-04 11:51:12'),
(12, 3, 'Brayan', 'Acosta Vivas', '2022-05-04 11:59:18'),
(13, 3, 'Brayan', 'Acosta Vivas', '2022-05-04 12:00:01'),
(14, 3, 'Brayan', 'Acosta Vivas', '2022-05-04 12:00:33'),
(15, 3, 'Brayan', 'Acosta Vivas', '2022-05-04 12:16:27'),
(16, 3, 'Brayan', 'Acosta Vivas', '2022-05-04 12:17:00'),
(17, 3, 'Brayan', 'Acosta Vivas', '2022-05-04 16:06:48'),
(18, 3, 'Brayan', 'Acosta Vivas', '2022-05-04 16:49:22'),
(19, 3, 'Brayan', 'Acosta Vivas', '2022-05-04 16:49:33'),
(20, 3, 'Brayan', 'Acosta Vivas', '2022-05-04 19:16:25'),
(21, 3, 'Brayan', 'Acosta Vivas', '2022-05-04 19:17:27'),
(22, 3, 'Brayan', 'Acosta Vivas', '2022-05-04 19:26:39'),
(23, 3, 'Brayan', 'Acosta Vivas', '2022-05-04 19:55:17'),
(25, 18, 'Sandra Milene', 'Vivas Barbosa', '2022-05-04 20:31:27'),
(26, 3, 'Brayan', 'Acosta Vivas', '2022-05-04 20:55:23'),
(27, 3, 'Brayan', 'Acosta Vivas', '2022-05-04 21:31:27'),
(29, 3, 'Brayan', 'Acosta Vivas', '2022-05-04 22:16:48'),
(30, 17, 'Diana Paola', 'Vivas Barbosa', '2022-05-04 22:17:32'),
(31, 3, 'Brayan', 'Acosta Vivas', '2022-05-05 10:02:40'),
(32, 19, 'Francisco', 'Acosta Toro', '2022-05-05 12:24:40'),
(33, 3, 'Brayan', 'Acosta Vivas', '2022-05-05 12:35:36'),
(34, 17, 'Diana Paola', 'Vivas Barbosa', '2022-05-05 13:45:22'),
(35, 3, 'Brayan', 'Acosta Vivas', '2022-05-05 13:49:30'),
(36, 17, 'Diana Paola', 'Vivas Barbosa', '2022-05-05 14:06:23'),
(37, 3, 'Brayan', 'Acosta Vivas', '2022-05-05 18:33:31'),
(38, 3, 'Brayan', 'Acosta Vivas', '2022-05-05 18:43:58'),
(39, 3, 'Brayan', 'Acosta Vivas', '2022-05-05 18:48:30'),
(41, 3, 'Brayan', 'Acosta Vivas', '2022-05-05 19:53:20'),
(42, 3, 'Brayan', 'Acosta Vivas', '2022-05-05 20:01:25'),
(43, 3, 'Brayan', 'Acosta Vivas', '2022-05-05 20:03:07'),
(44, 3, 'Brayan', 'Acosta Vivas', '2022-05-05 20:04:09'),
(45, 3, 'Brayan', 'Acosta Vivas', '2022-05-07 12:08:31'),
(46, 3, 'Brayan', 'Acosta Vivas', '2022-05-07 13:08:49'),
(47, 3, 'Brayan', 'Acosta Vivas', '2022-05-07 13:09:51'),
(48, 3, 'Brayan', 'Acosta Vivas', '2022-05-07 13:20:17'),
(49, 3, 'Brayan', 'Acosta Vivas', '2022-05-07 15:18:04'),
(50, 18, 'Sandra Milene', 'Vivas Barbosa', '2022-05-07 16:23:39'),
(51, 3, 'Brayan', 'Acosta Vivas', '2022-05-07 16:25:58'),
(52, 17, 'Diana Paola', 'Vivas Barbosa', '2022-05-07 16:48:06'),
(53, 17, 'Diana Paola', 'Vivas Barbosa', '2022-05-07 16:49:40'),
(54, 3, 'Brayan', 'Acosta Vivas', '2022-05-07 16:56:15'),
(55, 3, 'Brayan', 'Acosta Vivas', '2022-05-07 16:56:57'),
(56, 3, 'Brayan', 'Acosta Vivas', '2022-05-07 17:06:08'),
(57, 3, 'Brayan', 'Acosta Vivas', '2022-05-09 12:44:31'),
(58, 3, 'Brayan', 'Acosta Vivas', '2022-05-09 14:10:25'),
(59, 3, 'Brayan', 'Acosta Vivas', '2022-05-13 20:08:23'),
(60, 17, 'Diana Paola', 'Vivas Barbosa', '2022-05-13 20:12:15'),
(61, 3, 'Brayan', 'Acosta Vivas', '2022-05-14 23:00:08'),
(62, 3, 'Brayan', 'Acosta Vivas', '2022-05-14 23:34:08'),
(63, 3, 'Brayan', 'Acosta Vivas', '2022-05-14 23:36:07'),
(64, 3, 'Brayan', 'Acosta Vivas', '2022-05-15 10:36:54'),
(65, 3, 'Brayan', 'Acosta Vivas', '2022-05-15 10:40:13'),
(66, 3, 'Brayan', 'Acosta Vivas', '2022-05-15 11:23:47'),
(67, 3, 'Brayan', 'Acosta Vivas', '2022-05-15 11:40:42'),
(68, 3, 'Brayan', 'Acosta Vivas', '2022-05-15 11:45:43'),
(69, 3, 'Brayan', 'Acosta Vivas', '2022-05-15 12:03:04'),
(70, 3, 'Brayan', 'Acosta Vivas', '2022-05-15 12:04:10'),
(71, 3, 'Brayan', 'Acosta Vivas', '2022-05-15 14:58:49'),
(72, 3, 'Brayan', 'Acosta Vivas', '2022-05-17 13:16:06'),
(73, 3, 'Brayan', 'Acosta Vivas', '2022-05-17 13:27:25'),
(74, 17, 'Diana Paola', 'Vivas Barbosa', '2022-05-17 13:35:39'),
(75, 3, 'Brayan', 'Acosta Vivas', '2022-05-17 18:44:46'),
(76, 3, 'Brayan', 'Acosta Vivas', '2022-05-17 19:36:41'),
(77, 3, 'Brayan', 'Acosta Vivas', '2022-05-18 08:46:05'),
(78, 3, 'Brayan', 'Acosta Vivas', '2022-05-18 08:53:05'),
(79, 3, 'Brayan', 'Acosta Vivas', '2022-05-18 11:01:39'),
(80, 3, 'Brayan', 'Acosta Vivas', '2022-05-18 11:29:15'),
(81, 3, 'Brayan', 'Acosta Vivas', '2022-05-18 11:32:09'),
(82, 3, 'Brayan', 'Acosta Vivas', '2022-05-18 12:00:28'),
(83, 3, 'Brayan', 'Acosta Vivas', '2022-05-18 13:00:31'),
(84, 3, 'Brayan', 'Acosta Vivas', '2022-05-18 21:25:00'),
(85, 3, 'Brayan', 'Acosta Vivas', '2022-05-18 22:48:17'),
(86, 3, 'Brayan', 'Acosta Vivas', '2022-05-19 08:42:11'),
(87, 3, 'Brayan', 'Acosta Vivas', '2022-05-19 10:00:26'),
(88, 3, 'Brayan', 'Acosta Vivas', '2022-05-19 21:04:17'),
(89, 3, 'Brayan', 'Acosta Vivas', '2022-05-20 11:27:33'),
(90, 3, 'Brayan', 'Acosta Vivas', '2022-05-20 13:22:12'),
(91, 18, 'Sandra Milene', 'Vivas Barbosa', '2022-05-20 17:39:50'),
(92, 17, 'Diana Paola', 'Vivas Barbosa', '2022-05-20 17:40:50'),
(93, 3, 'Brayan', 'Acosta Vivas', '2022-05-20 17:41:18'),
(94, 3, 'Brayan', 'Acosta Vivas', '2022-05-20 18:00:31'),
(95, 3, 'Brayan', 'Acosta Vivas', '2022-05-20 19:17:38'),
(96, 3, 'Brayan', 'Acosta Vivas', '2022-05-20 19:59:26'),
(97, 3, 'Brayan', 'Acosta Vivas', '2022-05-26 09:15:23'),
(98, 3, 'Brayan', 'Acosta Vivas', '2022-05-26 11:07:37'),
(99, 3, 'Brayan', 'Acosta Vivas', '2022-05-26 12:42:24'),
(100, 17, 'Diana Paola', 'Vivas Barbosa', '2022-05-26 14:00:05'),
(101, 3, 'Brayan', 'Acosta Vivas', '2022-05-26 14:00:49'),
(102, 3, 'Brayan', 'Acosta Vivas', '2022-05-28 17:35:33'),
(103, 18, 'Sandra Milene', 'Vivas Barbosa', '2022-05-28 19:00:15'),
(128, 3, 'Brayan', 'Acosta Vivas', '2022-06-15 22:03:39'),
(129, 3, 'Brayan', 'Acosta Vivas', '2022-06-15 22:11:39'),
(130, 17, 'Diana Paola', 'Vivas Barbosa', '2022-06-15 22:31:13'),
(131, 3, 'Brayan', 'Acosta Vivas', '2022-06-15 22:59:38'),
(132, 18, 'Sandra Milene', 'Vivas Barbosa', '2022-06-15 23:10:12'),
(133, 3, 'Brayan', 'Acosta Vivas', '2022-06-16 00:52:18'),
(134, 18, 'Sandra Milene', 'Vivas Barbosa', '2022-06-16 08:20:59'),
(135, 18, 'Sandra Milene', 'Vivas Barbosa', '2022-06-16 08:21:19'),
(136, 23, 'Yulfran Adrian', 'Sanabria Guerrero', '2022-06-16 18:11:39'),
(137, 3, 'Brayan', 'Acosta Vivas', '2022-06-16 20:10:56'),
(138, 10, 'Cecilia', 'S&aacute;nchez', '2022-06-17 07:28:59'),
(139, 16, 'Yanina Stefany', 'Barbosa S&aacute;nchez', '2022-06-17 07:30:07'),
(140, 16, 'Yanina Stefany', 'Barbosa S&aacute;nchez', '2022-06-17 07:30:10'),
(141, 16, 'Yanina Stefany', 'Barbosa S&aacute;nchez', '2022-06-17 12:47:08'),
(142, 17, 'Diana Paola', 'Vivas Barbosa', '2022-06-17 13:00:10'),
(143, 3, 'Brayan', 'Acosta Vivas', '2022-06-17 13:30:43'),
(144, 14, 'Duvan Felipe', 'Parra Aroca', '2022-06-17 13:48:12'),
(145, 14, 'Duvan Felipe', 'Parra Aroca', '2022-06-17 13:48:18'),
(146, 3, 'Brayan', 'Acosta Vivas', '2022-06-17 13:53:35'),
(147, 17, 'Diana Paola', 'Vivas Barbosa', '2022-06-17 13:59:05'),
(148, 3, 'Brayan', 'Acosta Vivas', '2022-06-17 14:00:02'),
(149, 3, 'Brayan', 'Acosta Vivas', '2022-06-17 14:04:21'),
(150, 3, 'Brayan', 'Acosta Vivas', '2022-06-17 14:29:51'),
(151, 3, 'Brayan', 'Acosta Vivas', '2022-06-17 19:21:31'),
(152, 3, 'Brayan', 'Acosta Vivas', '2022-06-17 20:35:02'),
(153, 16, 'Yanina Stefany', 'Barbosa S&aacute;nchez', '2022-06-17 20:38:54'),
(154, 16, 'Yanina Stefany', 'Barbosa S&aacute;nchez', '2022-06-17 20:40:03'),
(155, 3, 'Brayan', 'Acosta Vivas', '2022-06-17 20:50:20'),
(156, 3, 'Brayan', 'Acosta Vivas', '2022-06-17 21:44:25'),
(157, 3, 'Brayan', 'Acosta Vivas', '2022-06-19 08:22:09'),
(158, 3, 'Brayan', 'Acosta Vivas', '2022-06-19 15:18:45'),
(159, 15, 'Nixon Johan', 'Vivas Barbosa', '2022-06-19 16:54:30'),
(160, 3, 'Brayan', 'Acosta Vivas', '2022-06-19 16:59:15'),
(161, 3, 'Brayan', 'Acosta Vivas', '2022-06-19 17:02:52'),
(162, 3, 'Brayan', 'Acosta Vivas', '2022-06-21 11:31:01'),
(163, 3, 'Brayan', 'Acosta Vivas', '2022-06-24 13:48:57'),
(164, 8, 'Gloria Maria', 'Barbosa L&aacute;zaro', '2022-06-25 08:34:58'),
(165, 3, 'Brayan', 'Acosta Vivas', '2022-06-25 08:42:12'),
(166, 3, 'Brayan', 'Acosta Vivas', '2022-06-25 09:37:38'),
(167, 3, 'Brayan', 'Acosta Vivas', '2022-06-25 09:47:58'),
(168, 8, 'Gloria Maria', 'Barbosa L&aacute;zaro', '2022-06-25 10:29:45'),
(169, 3, 'Brayan', 'Acosta Vivas', '2022-06-28 12:48:24'),
(170, 3, 'Brayan', 'Acosta Vivas', '2022-06-28 12:52:20'),
(171, 19, 'Francisco', 'Acosta Toro', '2022-06-28 12:58:52'),
(172, 3, 'Brayan', 'Acosta Vivas', '2022-06-28 16:59:55'),
(173, 3, 'Brayan', 'Acosta Vivas', '2022-06-28 19:11:39'),
(174, 19, 'Francisco', 'Acosta Toro', '2022-06-28 20:01:52'),
(175, 3, 'Brayan', 'Acosta Vivas', '2022-07-01 18:26:56'),
(176, 3, 'Brayan', 'Acosta Vivas', '2022-07-01 18:49:25'),
(177, 18, 'Sandra Milene', 'Vivas Barbosa', '2022-07-01 18:58:27'),
(178, 3, 'Brayan', 'Acosta Vivas', '2022-07-02 10:22:24'),
(179, 3, 'Brayan', 'Acosta Vivas', '2022-07-02 12:47:28'),
(180, 3, 'Brayan', 'Acosta Vivas', '2022-07-03 09:43:22'),
(181, 10, 'Cecilia', 'S&aacute;nchez', '2022-07-03 20:57:58'),
(182, 3, 'Brayan', 'Acosta Vivas', '2022-07-04 13:33:58'),
(183, 3, 'Brayan', 'Acosta Vivas', '2022-07-04 19:46:24'),
(184, 3, 'Brayan', 'Acosta Vivas', '2022-07-05 10:47:40'),
(185, 3, 'Brayan', 'Acosta Vivas', '2022-07-05 21:05:05'),
(186, 17, 'Diana Paola', 'Vivas Barbosa', '2022-07-05 21:07:01'),
(187, 10, 'Cecilia', 'S&aacute;nchez', '2022-07-06 16:21:15'),
(188, 3, 'Brayan', 'Acosta Vivas', '2022-07-06 20:03:54'),
(189, 3, 'Brayan', 'Acosta Vivas', '2022-07-06 20:16:03'),
(190, 17, 'Diana Paola', 'Vivas Barbosa', '2022-07-06 21:15:22'),
(191, 17, 'Diana Paola', 'Vivas Barbosa', '2022-07-08 18:59:56'),
(192, 3, 'Brayan', 'Acosta Vivas', '2022-07-09 08:51:40'),
(193, 3, 'Brayan', 'Acosta Vivas', '2022-07-09 10:34:13'),
(194, 17, 'Diana Paola', 'Vivas Barbosa', '2022-07-09 14:19:54'),
(195, 3, 'Brayan', 'Acosta Vivas', '2022-07-09 15:37:39'),
(196, 17, 'Diana Paola', 'Vivas Barbosa', '2022-07-09 16:09:48'),
(197, 20, 'Eliana Yireth', 'Navarro Vivas', '2022-07-09 18:15:24'),
(198, 17, 'Diana Paola', 'Vivas Barbosa', '2022-07-12 18:04:37'),
(199, 3, 'Brayan', 'Acosta Vivas', '2022-07-18 22:32:33'),
(200, 17, 'Diana Paola', 'Vivas Barbosa', '2022-07-19 12:21:59'),
(201, 3, 'Brayan', 'Acosta Vivas', '2022-07-22 19:28:22'),
(202, 3, 'Brayan', 'Acosta Vivas', '2022-07-23 12:58:58'),
(203, 3, 'Brayan', 'Acosta Vivas', '2022-07-23 14:00:53'),
(204, 3, 'Brayan', 'Acosta Vivas', '2022-07-23 14:08:08'),
(205, 17, 'Diana Paola', 'Vivas Barbosa', '2022-07-25 13:53:59'),
(206, 3, 'Brayan', 'Acosta Vivas', '2022-07-25 19:56:53'),
(207, 3, 'Brayan', 'Acosta Vivas', '2022-07-25 20:23:07'),
(208, 36, 'Andrew', 'Acosta Vivas', '2022-07-25 21:07:32'),
(209, 17, 'Diana Paola', 'Vivas Barbosa', '2022-07-26 07:01:47'),
(210, 3, 'Brayan', 'Acosta Vivas', '2022-07-26 12:36:14'),
(211, 17, 'Diana Paola', 'Vivas Barbosa', '2022-07-26 13:09:43'),
(212, 3, 'Brayan', 'Acosta Vivas', '2022-07-30 12:49:40'),
(213, 3, 'Brayan', 'Acosta Vivas', '2022-07-30 18:59:34'),
(214, 17, 'Diana Paola', 'Vivas Barbosa', '2022-07-30 18:59:50'),
(215, 3, 'Brayan', 'Acosta Vivas', '2022-08-01 17:42:31'),
(216, 3, 'Brayan', 'Acosta Vivas', '2022-08-01 18:47:20'),
(217, 17, 'Diana Paola', 'Vivas Barbosa', '2022-08-01 18:58:39'),
(218, 3, 'Brayan', 'Acosta Vivas', '2022-08-01 19:01:18'),
(219, 3, 'Brayan', 'Acosta Vivas', '2022-08-01 19:06:48'),
(220, 17, 'Diana Paola', 'Vivas Barbosa', '2022-08-01 19:10:15'),
(221, 18, 'Sandra Milene', 'Vivas Barbosa', '2022-08-01 19:48:22'),
(222, 17, 'Diana Paola', 'Vivas Barbosa', '2022-08-01 22:37:07'),
(223, 17, 'Diana Paola', 'Vivas Barbosa', '2022-08-02 06:38:27'),
(224, 3, 'Brayan', 'Acosta Vivas', '2022-08-02 07:32:40'),
(225, 3, 'Brayan', 'Acosta Vivas', '2022-08-02 09:00:48'),
(226, 3, 'Brayan', 'Acosta Vivas', '2022-08-02 12:33:27'),
(227, 17, 'Diana Paola', 'Vivas Barbosa', '2022-08-02 13:15:09'),
(228, 17, 'Diana Paola', 'Vivas Barbosa', '2022-08-02 15:13:44'),
(229, 3, 'Brayan', 'Acosta Vivas', '2022-08-02 18:22:42'),
(230, 35, 'Frank Luis', 'Barbosa S&aacute;nchez', '2022-08-02 18:23:28'),
(231, 17, 'Diana Paola', 'Vivas Barbosa', '2022-08-02 18:34:47'),
(232, 18, 'Sandra Milene', 'Vivas Barbosa', '2022-08-02 19:03:38'),
(233, 17, 'Diana Paola', 'Vivas Barbosa', '2022-08-02 19:09:19'),
(234, 3, 'Brayan', 'Acosta Vivas', '2022-08-03 19:37:04'),
(235, 39, 'Marlyn Sugey', 'Carvajalino', '2022-08-03 21:25:02'),
(236, 17, 'Diana Paola', 'Vivas Barbosa', '2022-08-03 22:07:55'),
(237, 17, 'Diana Paola', 'Vivas Barbosa', '2022-08-03 22:08:17'),
(238, 41, 'Sergio', 'Gaona Cardona', '2022-08-03 22:49:31'),
(239, 35, 'Frank Luis', 'Barbosa S&aacute;nchez', '2022-08-04 21:07:08'),
(240, 3, 'Brayan', 'Acosta Vivas', '2022-08-07 10:23:43'),
(241, 3, 'Brayan', 'Acosta Vivas', '2022-08-07 12:11:20'),
(242, 3, 'Brayan', 'Acosta Vivas', '2022-08-08 10:08:43'),
(243, 3, 'Brayan', 'Acosta Vivas', '2022-08-08 12:31:47'),
(244, 3, 'Brayan', 'Acosta Vivas', '2022-08-08 12:43:19'),
(245, 3, 'Brayan', 'Acosta Vivas', '2022-08-08 20:33:41'),
(246, 17, 'Diana Paola', 'Vivas Barbosa', '2022-08-10 06:50:43'),
(247, 17, 'Diana Paola', 'Vivas Barbosa', '2022-08-10 14:45:23'),
(248, 3, 'Brayan', 'Acosta Vivas', '2022-08-13 15:09:44'),
(249, 17, 'Diana Paola', 'Vivas Barbosa', '2022-08-13 16:59:35'),
(250, 3, 'Brayan', 'Acosta Vivas', '2022-08-17 12:02:11'),
(251, 19, 'Francisco', 'Acosta Toro', '2022-08-17 13:29:05'),
(252, 3, 'Brayan', 'Acosta Vivas', '2022-08-22 17:14:47'),
(253, 36, 'Andrew', 'Acosta Vivas', '2022-08-22 20:14:47'),
(254, 3, 'Brayan', 'Acosta Vivas', '2022-08-22 20:31:22'),
(255, 36, 'Andrew', 'Acosta Vivas', '2022-08-22 20:33:29'),
(256, 36, 'Andrew', 'Acosta Vivas', '2022-08-22 20:34:52'),
(257, 3, 'Brayan', 'Acosta Vivas', '2022-08-22 20:37:11'),
(258, 3, 'Brayan', 'Acosta Vivas', '2022-08-22 20:42:00'),
(259, 12, 'Elian', 'Navarro Barbosa', '2022-08-23 18:29:19'),
(260, 3, 'Brayan', 'Acosta Vivas', '2022-08-24 14:37:19'),
(261, 3, 'Brayan', 'Acosta Vivas', '2022-08-24 17:20:33'),
(262, 16, 'Yanina Stefany', 'Barbosa S&aacute;nchez', '2022-08-28 10:38:41'),
(263, 17, 'Diana Paola', 'Vivas Barbosa', '2022-08-30 10:31:07'),
(264, 3, 'Brayan', 'Acosta Vivas', '2022-08-30 15:56:45'),
(265, 3, 'Brayan', 'Acosta Vivas', '2022-08-31 12:46:33'),
(266, 3, 'Brayan', 'Acosta Vivas', '2022-08-31 12:47:00'),
(267, 18, 'Sandra Milene', 'Vivas Barbosa', '2022-08-31 12:55:44'),
(268, 16, 'Yanina Stefany', 'Barbosa S&aacute;nchez', '2022-08-31 15:46:48'),
(269, 3, 'Brayan', 'Acosta Vivas', '2022-08-31 19:35:47'),
(270, 3, 'Brayan', 'Acosta Vivas', '2022-09-02 19:45:21'),
(271, 18, 'Sandra Milene', 'Vivas Barbosa', '2022-09-02 20:09:39'),
(272, 3, 'Brayan', 'Acosta Vivas', '2022-09-04 10:17:10'),
(273, 3, 'Brayan', 'Acosta Vivas', '2022-09-04 10:42:37'),
(274, 17, 'Diana Paola', 'Vivas Barbosa', '2022-09-05 13:13:04'),
(275, 3, 'Brayan', 'Acosta Vivas', '2022-09-05 18:41:51'),
(276, 3, 'Brayan', 'Acosta Vivas', '2022-09-07 13:41:43'),
(277, 3, 'Brayan', 'Acosta Vivas', '2022-09-07 13:46:34'),
(278, 3, 'Brayan', 'Acosta Vivas', '2022-09-07 19:18:01'),
(279, 17, 'Diana Paola', 'Vivas Barbosa', '2022-09-07 19:18:28'),
(280, 12, 'Elian', 'Navarro Barbosa', '2022-09-07 19:39:50'),
(281, 11, 'Carmenza', 'Vivas Barbosa', '2022-09-07 19:48:13'),
(282, 20, 'Eliana Yireth', 'Navarro Vivas', '2022-09-07 19:51:06'),
(283, 13, 'Ariathna Yulitza', 'Navarro Vivas', '2022-09-07 19:55:48'),
(284, 18, 'Sandra Milene', 'Vivas Barbosa', '2022-09-07 20:22:33'),
(285, 17, 'Diana Paola', 'Vivas Barbosa', '2022-09-07 21:38:20'),
(286, 3, 'Brayan', 'Acosta Vivas', '2022-09-07 22:00:38'),
(287, 13, 'Ariathna Yulitza', 'Navarro Vivas', '2022-09-07 22:42:47'),
(288, 13, 'Ariathna Yulitza', 'Navarro Vivas', '2022-09-08 08:16:35'),
(289, 17, 'Diana Paola', 'Vivas Barbosa', '2022-09-08 21:03:52'),
(290, 3, 'Brayan', 'Acosta Vivas', '2022-09-09 14:40:25'),
(291, 3, 'Brayan', 'Acosta Vivas', '2022-09-10 10:18:28'),
(292, 17, 'Diana Paola', 'Vivas Barbosa', '2022-09-10 10:40:10'),
(293, 35, 'Frank Luis', 'Barbosa S&aacute;nchez', '2022-09-11 12:39:55'),
(294, 3, 'Brayan', 'Acosta Vivas', '2022-09-11 17:23:43'),
(295, 17, 'Diana Paola', 'Vivas Barbosa', '2022-09-11 17:46:06'),
(296, 3, 'Brayan', 'Acosta Vivas', '2022-09-12 15:50:07'),
(297, 35, 'Frank Luis', 'Barbosa S&aacute;nchez', '2022-09-12 17:00:50'),
(298, 17, 'Diana Paola', 'Vivas Barbosa', '2022-09-13 06:52:23'),
(299, 16, 'Yanina Stefany', 'Barbosa S&aacute;nchez', '2022-09-19 09:55:56'),
(300, 3, 'Brayan', 'Acosta Vivas', '2022-09-24 14:09:31'),
(301, 3, 'Brayan', 'Acosta Vivas', '2022-09-24 14:22:18'),
(302, 13, 'Ariathna Yulitza', 'Navarro Vivas', '2022-09-25 18:24:00'),
(303, 3, 'Brayan', 'Acosta Vivas', '2022-09-25 18:32:27'),
(304, 3, 'Brayan', 'Acosta Vivas', '2022-09-26 07:40:18'),
(305, 3, 'Brayan', 'Acosta Vivas', '2022-09-26 20:12:17'),
(306, 17, 'Diana Paola', 'Vivas Barbosa', '2022-09-26 20:21:21'),
(307, 10, 'Cecilia', 'S&aacute;nchez', '2022-09-26 20:32:29'),
(308, 3, 'Brayan', 'Acosta Vivas', '2022-09-26 20:47:09'),
(309, 16, 'Yanina Stefany', 'Barbosa S&aacute;nchez', '2022-09-26 21:31:07'),
(310, 3, 'Brayan', 'Acosta Vivas', '2022-09-26 22:06:40'),
(311, 3, 'Brayan', 'Acosta Vivas', '2022-09-27 07:43:20'),
(312, 17, 'Diana Paola', 'Vivas Barbosa', '2022-09-27 09:48:53'),
(313, 3, 'Brayan', 'Acosta Vivas', '2022-09-29 19:23:12'),
(314, 3, 'Brayan', 'Acosta Vivas', '2022-09-29 19:24:50'),
(315, 3, 'Brayan', 'Acosta Vivas', '2022-09-29 19:41:48'),
(316, 3, 'Brayan', 'Acosta Vivas', '2022-10-03 19:30:42'),
(317, 17, 'Diana Paola', 'Vivas Barbosa', '2022-10-06 16:13:56'),
(318, 3, 'Brayan', 'Acosta Vivas', '2022-10-06 19:25:31'),
(319, 18, 'Sandra Milene', 'Vivas Barbosa', '2022-10-06 19:51:55'),
(320, 3, 'Brayan', 'Acosta Vivas', '2022-10-06 20:16:17'),
(321, 3, 'Brayan', 'Acosta Vivas', '2022-10-07 19:28:02'),
(322, 3, 'Brayan', 'Acosta Vivas', '2022-10-09 21:13:15'),
(323, 17, 'Diana Paola', 'Vivas Barbosa', '2022-10-10 13:36:22'),
(324, 3, 'Brayan', 'Acosta Vivas', '2022-10-10 13:37:39'),
(325, 3, 'Brayan', 'Acosta Vivas', '2022-10-10 19:19:43'),
(326, 35, 'Frank Luis', 'Barbosa S&aacute;nchez', '2022-10-11 11:12:22'),
(327, 17, 'Diana Paola', 'Vivas Barbosa', '2022-10-11 14:27:55'),
(328, 10, 'Cecilia', 'S&aacute;nchez', '2022-10-13 10:47:26'),
(329, 17, 'Diana Paola', 'Vivas Barbosa', '2022-10-14 10:45:56'),
(330, 35, 'Frank Luis', 'Barbosa S&aacute;nchez', '2022-10-14 12:15:27'),
(331, 17, 'Diana Paola', 'Vivas Barbosa', '2022-10-14 13:21:41'),
(332, 3, 'Brayan', 'Acosta Vivas', '2022-10-14 16:48:39'),
(333, 3, 'Brayan', 'Acosta Vivas', '2022-10-14 16:51:40'),
(334, 17, 'Diana Paola', 'Vivas Barbosa', '2022-10-14 16:53:49'),
(335, 3, 'Brayan', 'Acosta Vivas', '2022-10-14 19:11:49'),
(336, 3, 'Brayan', 'Acosta Vivas', '2022-10-14 19:36:43'),
(337, 3, 'Brayan', 'Acosta Vivas', '2022-10-14 19:44:08'),
(338, 35, 'Frank Luis', 'Barbosa S&aacute;nchez', '2022-10-14 21:24:07'),
(339, 3, 'Brayan', 'Acosta Vivas', '2022-10-15 09:18:28'),
(340, 13, 'Ariathna Yulitza', 'Navarro Vivas', '2022-10-15 10:04:08'),
(341, 3, 'Brayan', 'Acosta Vivas', '2022-10-15 10:39:26'),
(342, 3, 'Brayan', 'Acosta Vivas', '2022-10-15 11:03:39'),
(343, 14, 'Luis Alfredo', 'Barbosa S&aacute;nchez', '2022-10-15 11:32:47'),
(344, 3, 'Brayan', 'Acosta Vivas', '2022-10-15 11:34:12'),
(345, 17, 'Diana Paola', 'Vivas Barbosa', '2022-10-15 12:05:04'),
(346, 16, 'Yanina Stefany', 'Barbosa S&aacute;nchez', '2022-10-15 12:33:20'),
(347, 16, 'Yanina Stefany', 'Barbosa S&aacute;nchez', '2022-10-15 12:33:33'),
(348, 16, 'Yanina Stefany', 'Barbosa S&aacute;nchez', '2022-10-15 12:33:52'),
(349, 16, 'Yanina Stefany', 'Barbosa S&aacute;nchez', '2022-10-15 12:34:06'),
(350, 16, 'Yanina Stefany', 'Barbosa S&aacute;nchez', '2022-10-15 12:34:18'),
(351, 16, 'Yanina Stefany', 'Barbosa S&aacute;nchez', '2022-10-15 12:34:25'),
(352, 3, 'Brayan', 'Acosta Vivas', '2022-10-15 12:48:40'),
(353, 12, 'Elian', 'Navarro Barbosa', '2022-10-15 14:12:03'),
(354, 15, 'Nixon Johan', 'Vivas Barbosa', '2022-10-15 16:12:26'),
(355, 18, 'Sandra Milene', 'Vivas Barbosa', '2022-10-18 11:26:21'),
(356, 39, 'Marlyn Sugey', 'Carvajalino', '2022-10-19 12:57:13'),
(357, 17, 'Diana Paola', 'Vivas Barbosa', '2022-10-25 15:23:56'),
(358, 3, 'Brayan', 'Acosta Vivas', '2022-10-26 17:32:45'),
(359, 35, 'Frank Luis', 'Barbosa S&aacute;nchez', '2022-10-30 10:19:01'),
(360, 18, 'Sandra Milene', 'Vivas Barbosa', '2022-10-31 17:15:06'),
(361, 3, 'Brayan', 'Acosta Vivas', '2022-10-31 17:19:01'),
(362, 3, 'Brayan', 'Acosta Vivas', '2022-10-31 19:21:41'),
(363, 17, 'Diana Paola', 'Vivas Barbosa', '2022-10-31 19:52:12'),
(364, 18, 'Sandra Milene', 'Vivas Barbosa', '2022-10-31 20:16:04'),
(365, 17, 'Diana Paola', 'Vivas Barbosa', '2022-11-02 17:38:18'),
(366, 3, 'Brayan', 'Acosta Vivas', '2022-11-02 17:40:12'),
(367, 24, 'Heiler Camilo', 'Navarro Vivas', '2022-11-02 19:32:33'),
(368, 18, 'Sandra Milene', 'Vivas Barbosa', '2022-11-02 19:49:35'),
(369, 3, 'Brayan', 'Acosta Vivas', '2022-11-02 20:10:48'),
(370, 24, 'Heiler Camilo', 'Navarro Vivas', '2022-11-02 20:20:25'),
(371, 17, 'Diana Paola', 'Vivas Barbosa', '2022-11-02 20:25:50'),
(372, 3, 'Brayan', 'Acosta Vivas', '2022-11-06 21:26:17'),
(373, 17, 'Diana Paola', 'Vivas Barbosa', '2022-11-06 21:29:51'),
(374, 17, 'Diana Paola', 'Vivas Barbosa', '2022-11-09 09:22:14'),
(375, 10, 'Cecilia', 'S&aacute;nchez', '2022-11-10 13:22:21'),
(376, 3, 'Brayan', 'Acosta Vivas', '2022-11-10 14:07:23'),
(377, 10, 'Cecilia', 'S&aacute;nchez', '2022-11-10 14:54:23'),
(378, 16, 'Yanina Stefany', 'Barbosa S&aacute;nchez', '2022-11-10 15:18:47'),
(379, 17, 'Diana Paola', 'Vivas Barbosa', '2022-11-10 15:39:42'),
(380, 3, 'Brayan', 'Acosta Vivas', '2022-11-10 16:30:06'),
(381, 17, 'Diana Paola', 'Vivas Barbosa', '2022-11-10 16:35:35'),
(382, 3, 'Brayan', 'Acosta Vivas', '2022-11-10 18:51:59'),
(383, 3, 'Brayan', 'Acosta Vivas', '2022-11-10 19:07:12'),
(384, 3, 'Brayan', 'Acosta Vivas', '2022-11-10 19:34:16'),
(385, 17, 'Diana Paola', 'Vivas Barbosa', '2022-11-10 19:40:02'),
(386, 3, 'Brayan', 'Acosta Vivas', '2022-11-10 20:33:07'),
(387, 17, 'Diana Paola', 'Vivas Barbosa', '2022-11-12 09:50:15'),
(388, 3, 'Brayan', 'Acosta Vivas', '2022-11-13 11:41:44'),
(389, 3, 'Brayan', 'Acosta Vivas', '2022-11-13 21:06:39'),
(390, 3, 'Brayan', 'Acosta Vivas', '2022-11-13 21:42:30'),
(391, 3, 'Brayan', 'Acosta Vivas', '2022-11-14 19:48:35'),
(392, 19, 'Francisco', 'Acosta Toro', '2022-11-14 20:06:42'),
(393, 3, 'Brayan', 'Acosta Vivas', '2022-11-17 11:31:58'),
(394, 3, 'Brayan', 'Acosta Vivas', '2022-11-17 17:39:50'),
(395, 17, 'Diana Paola', 'Vivas Barbosa', '2022-11-25 18:55:48'),
(396, 17, 'Diana Paola', 'Vivas Barbosa', '2022-11-25 22:18:27'),
(397, 17, 'Diana Paola', 'Vivas Barbosa', '2022-11-30 12:27:58'),
(398, 3, 'Brayan', 'Acosta Vivas', '2022-11-30 20:57:44'),
(399, 23, 'Yulfran Adrian', 'Sanabria Guerrero', '2022-11-30 21:14:32'),
(400, 16, 'Yanina Stefany', 'Barbosa S&aacute;nchez', '2022-12-01 13:27:47'),
(401, 10, 'Cecilia', 'S&aacute;nchez', '2022-12-01 14:00:34'),
(402, 3, 'Brayan', 'Acosta Vivas', '2022-12-03 09:18:23'),
(403, 17, 'Diana Paola', 'Vivas Barbosa', '2022-12-03 09:26:45'),
(404, 3, 'Brayan', 'Acosta Vivas', '2022-12-04 18:48:42'),
(405, 17, 'Diana Paola', 'Vivas Barbosa', '2022-12-04 21:02:35'),
(406, 17, 'Diana Paola', 'Vivas Barbosa', '2022-12-05 12:42:00'),
(407, 16, 'Yanina Stefany', 'Barbosa S&aacute;nchez', '2022-12-05 17:32:32'),
(408, 17, 'Diana Paola', 'Vivas Barbosa', '2022-12-07 20:08:42'),
(409, 17, 'Diana Paola', 'Vivas Barbosa', '2022-12-08 11:48:33'),
(410, 16, 'Yanina Stefany', 'Barbosa S&aacute;nchez', '2022-12-08 22:11:21'),
(411, 3, 'Brayan', 'Acosta Vivas', '2022-12-09 12:13:06'),
(412, 17, 'Diana Paola', 'Vivas Barbosa', '2022-12-09 13:21:00'),
(413, 10, 'Cecilia', 'S&aacute;nchez', '2022-12-09 14:06:41'),
(414, 16, 'Yanina Stefany', 'Barbosa S&aacute;nchez', '2022-12-09 14:07:17'),
(415, 16, 'Yanina Stefany', 'Barbosa S&aacute;nchez', '2022-12-09 14:07:20'),
(416, 10, 'Cecilia', 'S&aacute;nchez', '2022-12-09 14:08:02'),
(417, 10, 'Cecilia', 'S&aacute;nchez', '2022-12-09 14:08:05'),
(418, 10, 'Cecilia', 'S&aacute;nchez', '2022-12-09 14:08:16'),
(419, 10, 'Cecilia', 'S&aacute;nchez', '2022-12-09 14:08:20'),
(420, 17, 'Diana Paola', 'Vivas Barbosa', '2022-12-10 14:34:04'),
(421, 17, 'Diana Paola', 'Vivas Barbosa', '2022-12-10 14:34:06'),
(422, 3, 'Brayan', 'Acosta Vivas', '2022-12-10 14:34:15'),
(423, 3, 'Brayan', 'Acosta Vivas', '2022-12-10 18:51:24'),
(424, 3, 'Brayan', 'Acosta Vivas', '2022-12-10 19:01:34'),
(425, 17, 'Diana Paola', 'Vivas Barbosa', '2022-12-10 19:32:34'),
(426, 17, 'Diana Paola', 'Vivas Barbosa', '2022-12-10 19:32:37'),
(427, 3, 'Brayan', 'Acosta Vivas', '2022-12-10 19:51:30'),
(428, 35, 'Frank Luis', 'Barbosa S&aacute;nchez', '2022-12-13 07:38:25'),
(429, 3, 'Brayan', 'Acosta Vivas', '2022-12-13 16:40:49'),
(430, 17, 'Diana Paola', 'Vivas Barbosa', '2022-12-17 07:08:45'),
(431, 3, 'Brayan', 'Acosta Vivas', '2022-12-17 09:14:24'),
(432, 17, 'Diana Paola', 'Vivas Barbosa', '2022-12-17 09:37:12'),
(433, 39, 'Marlyn Sugey', 'Carvajalino', '2022-12-17 21:39:17'),
(434, 3, 'Brayan', 'Acosta Vivas', '2022-12-18 16:27:11'),
(435, 39, 'Marlyn Sugey', 'Carvajalino', '2022-12-18 19:11:05'),
(436, 3, 'Brayan', 'Acosta Vivas', '2022-12-18 20:55:02'),
(437, 39, 'Marlyn Sugey', 'Carvajalino', '2022-12-19 11:13:19'),
(438, 3, 'Brayan', 'Acosta Vivas', '2022-12-19 16:35:56'),
(439, 3, 'Brayan', 'Acosta Vivas', '2022-12-20 10:57:26'),
(440, 3, 'Brayan', 'Acosta Vivas', '2022-12-20 11:02:43'),
(441, 3, 'Brayan', 'Acosta Vivas', '2022-12-20 11:32:19'),
(442, 3, 'Brayan', 'Acosta Vivas', '2022-12-22 20:48:05'),
(443, 17, 'Diana Paola', 'Vivas Barbosa', '2022-12-22 21:55:30'),
(444, 3, 'Brayan', 'Acosta Vivas', '2022-12-23 16:08:05'),
(445, 17, 'Diana Paola', 'Vivas Barbosa', '2022-12-25 10:32:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(10) UNSIGNED NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `menu_route` varchar(100) NOT NULL,
  `menu_icon` varchar(100) NOT NULL,
  `menu_group` varchar(100) NOT NULL,
  `menu_state` varchar(20) NOT NULL DEFAULT 'active',
  `menu_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_route`, `menu_icon`, `menu_group`, `menu_state`, `menu_order`) VALUES
(1, 'INICIO', 'account_VI/main', 'home', 'my_account', 'active', 1),
(2, 'HISTORIAL APORTES', 'account_VI/savingHistory', 'savings', 'my_account', 'active', 3),
(3, 'SIMULAR CR&Eacute;DITO', 'account_VI/creditSimulate', 'credit_card', 'my_account', 'active', 4),
(4, 'SOLICITAR CR&Eacute;DITO', 'account_VI/creditApply', 'attach_money', 'my_account', 'active', 5),
(5, '\r\nCONFIGURACI&Oacute;N', 'account_VI/changePass', 'settings', 'my_account', 'active', 6),
(6, 'AGREGAR ASOCIADO', 'admin_VI/addPerson', 'person_add', 'association', 'active', 2),
(7, 'APORTES', 'admin_VI/savingListPerson', 'local_atm', 'association', 'active', 3),
(8, 'SOLICITUD CR&Eacute;DITO', 'admin_VI/creditApplication', 'email', 'association', 'active', 5),
(9, 'CR&Eacute;DITO APROBADO', 'admin_VI/creditApprove', 'assignment', 'association', 'active', 6),
(10, 'Cr&eacute;dito', 'account_VI/creditActive', 'account_balance', 'my_account', 'active', 2),
(11, 'CR&Eacute;DITOS ACTIVOS', 'admin_VI/creditActiveList', 'currency_exchange', 'association', 'active', 4),
(12, 'CARTERA', 'admin_VI/wallet', 'account_balance_wallet', 'association', 'active', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(10) UNSIGNED NOT NULL,
  `credit_id` int(10) UNSIGNED NOT NULL,
  `pay_value_total` double NOT NULL,
  `pay_value_capital` double NOT NULL,
  `pay_value_interest` double NOT NULL,
  `pay_value_arrears` double NOT NULL,
  `pay_surplus` double NOT NULL,
  `pay_date` datetime NOT NULL,
  `pay_period` int(11) NOT NULL,
  `pay_register` varchar(100) NOT NULL,
  `pay_treasurer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `payment`
--

INSERT INTO `payment` (`pay_id`, `credit_id`, `pay_value_total`, `pay_value_capital`, `pay_value_interest`, `pay_value_arrears`, `pay_surplus`, `pay_date`, `pay_period`, `pay_register`, `pay_treasurer`) VALUES
(15, 8, 89500, 79263, 10000, 0, 237, '2022-07-06 20:17:46', 1, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(16, 9, 89500, 79263, 10000, 0, 237, '2022-07-06 20:18:15', 1, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(17, 11, 89300, 79263, 10000, 0, 37, '2022-07-23 13:46:05', 1, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(18, 12, 38200, 34589, 3600, 0, 11, '2022-08-01 18:49:37', 1, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(19, 10, 104050, 98026, 6000, 0, 24, '2022-08-02 12:39:16', 1, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(20, 8, 89500, 80848, 8415, 0, 237, '2022-08-07 10:25:55', 2, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(21, 9, 89500, 80848, 8415, 0, 237, '2022-08-07 10:26:13', 2, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(22, 11, 89300, 80848, 8415, 0, 37, '2022-08-08 12:34:49', 2, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(23, 11, 89263, 82465, 6798, 0, 0, '2022-08-17 13:18:37', 3, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(24, 11, 89263, 84115, 5148, 0, 0, '2022-08-17 13:18:43', 4, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(25, 11, 89263, 85797, 3466, 0, 0, '2022-08-17 13:18:49', 5, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(26, 11, 89310, 87512, 1750, 0, 48, '2022-08-17 13:19:23', 6, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(27, 10, 104100, 99988, 4039, 0, 73, '2022-09-02 19:46:20', 2, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(28, 12, 38200, 35280, 2908, 0, 12, '2022-09-05 18:44:13', 2, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(29, 8, 89300, 82465, 6798, 0, 37, '2022-09-07 13:42:39', 3, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(30, 9, 89300, 82465, 6798, 0, 37, '2022-09-07 13:42:52', 3, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(31, 10, 104100, 101986, 2040, 0, 74, '2022-10-03 19:32:15', 3, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(32, 12, 38200, 35985, 2203, 0, 12, '2022-10-03 19:34:33', 3, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(33, 8, 90000, 84115, 5148, 0, 737, '2022-10-06 19:30:41', 4, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(34, 9, 90000, 84115, 5148, 0, 737, '2022-10-06 19:30:56', 4, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(35, 12, 38200, 36706, 1483, 0, 11, '2022-10-31 19:26:56', 4, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(36, 12, 38200, 37440, 749, 0, 11, '2022-10-31 19:27:07', 5, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(37, 13, 47500, 37280, 10000, 0, 220, '2022-11-02 20:13:49', 1, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(38, 14, 47500, 37280, 10000, 0, 220, '2022-11-02 20:14:38', 1, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(39, 15, 47500, 37280, 10000, 0, 220, '2022-11-02 20:14:51', 1, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(40, 16, 47500, 37280, 10000, 0, 220, '2022-11-02 20:15:08', 1, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(41, 8, 89300, 85797, 3466, 0, 37, '2022-11-10 18:56:02', 5, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(42, 9, 89300, 85797, 3466, 0, 37, '2022-11-10 18:56:18', 5, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(43, 17, 61400, 51258, 10000, 0, 142, '2022-11-10 18:56:55', 1, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(44, 13, 47880, 38026, 9254, 0, 600, '2022-12-04 18:53:34', 2, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(45, 14, 47280, 38026, 9254, 0, 0, '2022-12-04 18:53:50', 2, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(46, 15, 47280, 38026, 9254, 0, 0, '2022-12-04 18:53:59', 2, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(47, 16, 47280, 38026, 9254, 0, 0, '2022-12-04 18:54:09', 2, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(48, 19, 47280, 37280, 10000, 0, 0, '2022-12-04 18:54:28', 1, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(49, 8, 89300, 87512, 1750, 0, 38, '2022-12-09 13:12:33', 6, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(50, 9, 89300, 87512, 1750, 0, 38, '2022-12-09 13:12:43', 6, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(51, 17, 61260, 52283, 8975, 0, 2, '2022-12-09 13:12:54', 2, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(52, 18, 47628, 33628, 5000, 9000, 0, '2022-12-10 18:55:28', 1, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(53, 18, 38672, 34301, 4327, 0, 44, '2022-12-10 18:55:42', 2, 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permit`
--

CREATE TABLE `permit` (
  `permit_id` int(10) UNSIGNED NOT NULL,
  `permit_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permit`
--

INSERT INTO `permit` (`permit_id`, `permit_name`) VALUES
(1, 'none'),
(2, 'read'),
(3, 'write');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `person`
--

CREATE TABLE `person` (
  `pers_id` int(10) UNSIGNED NOT NULL,
  `pers_document` varchar(11) NOT NULL,
  `pers_name` varchar(45) NOT NULL,
  `pers_lastname` varchar(45) NOT NULL,
  `pers_phone` varchar(45) NOT NULL,
  `pers_state` varchar(20) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `pers_register` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `person`
--

INSERT INTO `person` (`pers_id`, `pers_document`, `pers_name`, `pers_lastname`, `pers_phone`, `pers_state`, `created_at`, `updated_at`, `pers_register`) VALUES
(3, '1193100108', 'Brayan', 'Acosta Vivas', '3144695142', 'a', '2022-01-19', '2022-01-19', 'Brayan Acosta Vivas'),
(8, '27765442', 'Gloria Maria', 'Barbosa L&aacute;zaro', '3184227238', 'a', '2021-08-15', '2021-08-15', 'Brayan Acosta Vivas'),
(9, '88141297', 'Luis Alfredo', 'Barbosa L&aacute;zaro', '3152516084', 'a', '2021-08-15', '2021-08-15', 'Brayan Acosta Vivas'),
(10, '37325688', 'Cecilia', 'S&aacute;nchez', '3177210025', 'a', '2021-08-15', '2021-08-15', 'Brayan Acosta Vivas'),
(11, '37326336', 'Carmenza', 'Vivas Barbosa', '3183816720', 'a', '2021-08-15', '2021-08-15', 'Brayan Acosta Vivas'),
(12, '13379452', 'Elian', 'Navarro Barbosa', '3187947801', 'a', '2021-08-15', '2021-08-15', 'Brayan Acosta Vivas'),
(13, '1004862854', 'Ariathna Yulitza', 'Navarro Vivas', '3166293100', 'a', '2021-08-15', '2021-08-15', 'Brayan Acosta Vivas'),
(14, '1092732325', 'Luis Alfredo', 'Barbosa S&aacute;nchez', '3154911136', 'a', '2021-08-15', '2021-08-15', 'Brayan Acosta Vivas'),
(15, '13177455', 'Nixon Johan', 'Vivas Barbosa', '3503426506', 'a', '2021-08-15', '2021-08-15', 'Brayan Acosta Vivas'),
(16, '1091669022', 'Yanina Stefany', 'Barbosa S&aacute;nchez', '3185085348', 'a', '2021-08-15', '2021-08-15', 'Brayan Acosta Vivas'),
(17, '37338329', 'Diana Paola', 'Vivas Barbosa', '3154524176', 'a', '2021-08-15', '2021-08-15', 'Brayan Acosta Vivas'),
(18, '37329922', 'Sandra Milene', 'Vivas Barbosa', '3144618928', 'a', '2022-01-21', '2022-01-21', 'Brayan Acosta Vivas'),
(19, '88283187', 'Francisco', 'Acosta Toro', '3166760073', 'a', '2022-01-25', '2022-01-25', 'Brayan Acosta Vivas'),
(20, '1091355630', 'Eliana Yireth', 'Navarro Vivas', '3165584208', 'a', '2022-01-25', '2022-01-25', 'Brayan Acosta Vivas'),
(21, '1084456760', 'Salom&eacute; Margarita', 'Vivas Trigos', '3164842101', 'a', '2022-01-25', '2022-01-25', 'Brayan Acosta Vivas'),
(22, '1083048906', 'William Rafael', 'Vivas Trigos', '3503426506', 'a', '2022-01-25', '2022-01-25', 'Brayan Acosta Vivas'),
(23, '13176810', 'Yulfran Adrian', 'Sanabria Guerrero', '3157586073', 'a', '2022-02-01', '2022-02-01', 'Brayan Acosta Vivas'),
(24, '1091676902', 'Heiler Camilo', 'Navarro Vivas', '6140444918', 'a', '2022-02-11', '2022-02-11', 'Brayan Acosta Vivas'),
(25, '1092734918', 'Kiara Dariana ', 'Sanabria Vivas', '3134727641', 'a', '2022-02-19', '2022-02-19', 'Brayan Acosta Vivas'),
(26, '57464448', 'Yolimargarita', 'Trigos Carrascal', '3164842101', 'a', '2022-02-19', '2022-02-19', 'Brayan Acosta Vivas'),
(27, '13357329', 'Ramon Emiro', 'Vivas', '3172730694', 'a', '2022-02-19', '2022-02-19', 'Brayan Acosta Vivas'),
(35, '1091682268', 'Frank Luis', 'Barbosa S&aacute;nchez', '313 324849', 'a', '2022-06-15', '2022-06-15', 'Brayan Acosta Vivas'),
(36, '1193577238', 'Andrew', 'Acosta Vivas', '3134098213', 'a', '2022-07-25', '2022-07-25', 'Brayan Acosta Vivas'),
(37, '1091363322', 'Derek Matiel', 'Sanabria Vivas', '3154524176', 'a', '2022-08-01', '2022-08-01', 'Brayan Acosta Vivas'),
(38, '1000474462', 'Gustavo', 'Carrillo', '3156843985', 'a', '2022-08-02', '2022-08-02', 'Brayan Acosta Vivas'),
(39, '1091655696', 'Marlin Sugey', 'Carvajalino', '3152453750', 'a', '2022-08-03', '2022-08-03', 'Brayan Acosta Vivas'),
(40, '37319597', 'Ana Mar&iacute;a', 'Barbosa', '3176774125', 'a', '2022-08-03', '2022-08-03', 'Brayan Acosta Vivas'),
(41, '13175765', 'Sergio', 'Gaona Cardona', '3187704416', 'a', '2022-08-03', '2022-08-03', 'Brayan Acosta Vivas'),
(42, '1091669187', 'Yuldor Andrey', 'Carvajalino Barbosa', '3157918474', 'a', '2022-10-15', '2022-10-15', 'Brayan Acosta Vivas'),
(43, '1091665718', 'Tatiana ', 'Vega Carre&ntilde;o', '3168319118', 'a', '2022-10-15', '2022-10-15', 'Brayan Acosta Vivas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(30) NOT NULL,
  `role_state` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_state`) VALUES
(1, 'asociado', 'active'),
(2, 'tesorero', 'active'),
(3, 'admin', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_menu_permit`
--

CREATE TABLE `role_menu_permit` (
  `role_menu_permit_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `permit_id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `role_menu_permit`
--

INSERT INTO `role_menu_permit` (`role_menu_permit_id`, `role_id`, `permit_id`, `menu_id`) VALUES
(1, 1, 2, 1),
(2, 2, 2, 1),
(3, 3, 2, 1),
(4, 1, 2, 2),
(5, 2, 2, 2),
(6, 3, 2, 2),
(7, 1, 2, 3),
(9, 2, 2, 3),
(11, 3, 2, 3),
(13, 1, 2, 4),
(14, 1, 3, 4),
(15, 2, 2, 4),
(16, 2, 3, 4),
(17, 3, 2, 4),
(18, 3, 3, 4),
(19, 1, 2, 5),
(20, 1, 3, 5),
(21, 2, 2, 5),
(22, 2, 3, 5),
(23, 3, 3, 5),
(24, 3, 2, 5),
(25, 1, 1, 6),
(26, 2, 1, 6),
(27, 3, 2, 6),
(28, 3, 3, 6),
(29, 1, 1, 7),
(30, 2, 2, 7),
(31, 3, 2, 7),
(32, 3, 3, 7),
(33, 1, 1, 8),
(34, 2, 2, 8),
(35, 3, 2, 8),
(36, 3, 3, 8),
(37, 1, 1, 9),
(38, 2, 1, 9),
(39, 3, 2, 9),
(40, 3, 3, 9),
(41, 1, 2, 10),
(42, 2, 2, 10),
(43, 3, 2, 10),
(44, 1, 1, 11),
(45, 2, 2, 11),
(46, 3, 2, 11),
(47, 3, 3, 11),
(48, 1, 1, 12),
(49, 2, 2, 12),
(50, 3, 2, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saving`
--

CREATE TABLE `saving` (
  `saving_id` int(10) UNSIGNED NOT NULL,
  `pers_id` int(10) UNSIGNED NOT NULL,
  `saving_value` double UNSIGNED NOT NULL,
  `saving_date` date NOT NULL,
  `saving_month` date NOT NULL,
  `saving_description` varchar(100) NOT NULL,
  `saving_register` varchar(100) NOT NULL,
  `saving_treasur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `saving`
--

INSERT INTO `saving` (`saving_id`, `pers_id`, `saving_value`, `saving_date`, `saving_month`, `saving_description`, `saving_register`, `saving_treasur`) VALUES
(44, 8, 10000, '2021-08-25', '2021-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(45, 9, 10000, '2021-08-25', '2021-08-15', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(46, 10, 10000, '2021-08-25', '2021-08-15', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(47, 11, 10000, '2021-08-25', '2021-08-15', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(48, 12, 10000, '2021-08-25', '2021-08-15', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(49, 13, 10000, '2021-08-25', '2021-08-15', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(50, 14, 10000, '2021-08-25', '2021-08-15', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(51, 15, 10000, '2021-08-25', '2021-08-15', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(52, 16, 10000, '2021-08-25', '2021-08-15', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(53, 8, 10000, '2021-09-25', '2021-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(54, 8, 10000, '2021-10-25', '2021-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(55, 8, 10000, '2021-11-25', '2021-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(56, 8, 10000, '2021-12-25', '2021-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(58, 10, 10000, '2021-09-25', '2021-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(59, 11, 10000, '2021-09-25', '2021-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(60, 11, 10000, '2021-10-25', '2021-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(61, 11, 10000, '2021-11-25', '2021-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(62, 11, 10000, '2021-12-25', '2021-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(63, 12, 10000, '2021-09-25', '2021-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(64, 12, 10000, '2021-10-25', '2021-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(65, 12, 10000, '2021-11-25', '2021-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(66, 12, 10000, '2021-12-25', '2021-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(67, 13, 10000, '2021-09-25', '2021-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(68, 13, 10000, '2021-10-25', '2021-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(69, 13, 10000, '2021-11-25', '2021-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(70, 13, 10000, '2021-12-25', '2021-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(71, 14, 10000, '2021-09-25', '2021-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(72, 15, 10000, '2021-09-25', '2021-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(73, 15, 10000, '2021-10-25', '2021-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(74, 15, 10000, '2021-11-25', '2021-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(75, 15, 10000, '2021-12-25', '2021-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(76, 16, 10000, '2021-09-25', '2021-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(77, 17, 10000, '2021-08-25', '2021-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(78, 17, 10000, '2021-09-25', '2021-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(79, 17, 10000, '2021-10-25', '2021-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(80, 17, 10000, '2021-11-25', '2021-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(81, 17, 10000, '2021-12-25', '2021-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(82, 3, 10000, '2022-01-21', '2022-01-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(83, 18, 10000, '2022-01-21', '2022-01-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(84, 8, 10000, '2022-01-25', '2022-01-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(85, 11, 10000, '2022-01-25', '2022-01-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(86, 12, 10000, '2022-01-25', '2022-01-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(87, 13, 10000, '2022-01-25', '2022-01-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(88, 17, 10000, '2022-01-25', '2022-01-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(89, 19, 10000, '2022-01-25', '2022-01-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(90, 20, 10000, '2022-01-25', '2022-01-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(91, 20, 10000, '2022-01-25', '2021-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(92, 21, 10000, '2022-01-25', '2021-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(93, 21, 10000, '2022-01-25', '2021-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(94, 21, 10000, '2022-01-25', '2021-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(95, 21, 10000, '2022-01-25', '2021-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(96, 21, 10000, '2022-01-25', '2021-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(97, 22, 10000, '2022-01-25', '2021-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(98, 22, 10000, '2022-01-25', '2021-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(99, 22, 10000, '2022-01-25', '2021-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(100, 22, 10000, '2022-01-25', '2021-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(101, 22, 10000, '2022-01-25', '2021-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(102, 9, 10000, '2022-02-01', '2021-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(103, 9, 10000, '2022-02-01', '2021-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(104, 9, 10000, '2022-02-01', '2021-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(105, 9, 10000, '2022-02-01', '2021-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(106, 9, 10000, '2022-02-01', '2022-01-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(107, 10, 10000, '2022-02-01', '2021-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(108, 10, 10000, '2022-02-01', '2021-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(109, 10, 10000, '2022-02-01', '2021-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(110, 10, 10000, '2022-02-01', '2022-01-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(111, 16, 10000, '2022-02-01', '2021-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(112, 16, 10000, '2022-02-01', '2021-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(113, 16, 10000, '2022-02-01', '2021-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(114, 16, 10000, '2022-02-01', '2022-01-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(115, 14, 10000, '2022-02-01', '2021-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(116, 14, 10000, '2022-02-01', '2021-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(117, 14, 10000, '2022-02-01', '2021-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(118, 14, 10000, '2022-02-01', '2022-01-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(119, 8, 10000, '2022-02-01', '2022-02-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(120, 23, 10000, '2022-02-01', '2022-01-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(121, 23, 10000, '2022-02-01', '2022-02-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(122, 3, 10000, '2022-02-03', '2022-02-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(123, 18, 10000, '2022-02-03', '2022-02-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(124, 19, 10000, '2022-02-03', '2022-02-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(125, 18, 10000, '2022-02-07', '2021-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(126, 18, 10000, '2022-02-07', '2021-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(127, 18, 10000, '2022-02-07', '2021-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(128, 18, 10000, '2022-02-07', '2021-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(129, 18, 10000, '2022-02-07', '2021-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(130, 24, 10000, '2022-02-11', '2022-02-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(131, 11, 10000, '2022-02-11', '2022-02-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(132, 12, 10000, '2022-02-11', '2022-02-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(133, 13, 10000, '2022-02-11', '2022-02-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(134, 20, 10000, '2022-02-11', '2022-02-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(135, 17, 10000, '2022-02-11', '2022-02-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(136, 9, 10000, '2022-02-14', '2022-02-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(137, 25, 10000, '2022-02-19', '2022-02-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(138, 26, 10000, '2022-02-19', '2022-01-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(139, 26, 10000, '2022-02-19', '2022-02-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(140, 15, 10000, '2022-02-19', '2022-01-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(141, 15, 10000, '2022-02-19', '2022-02-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(142, 21, 10000, '2022-02-19', '2022-01-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(143, 21, 10000, '2022-02-19', '2022-02-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(144, 22, 10000, '2022-02-19', '2022-01-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(145, 22, 10000, '2022-02-19', '2022-02-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(146, 27, 10000, '2022-02-19', '2022-02-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(147, 10, 10000, '2022-02-21', '2022-02-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(148, 16, 10000, '2022-03-01', '2022-02-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(149, 14, 10000, '2022-03-01', '2022-02-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(150, 3, 10000, '2022-03-08', '2022-03-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(151, 8, 10000, '2022-03-08', '2022-03-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(152, 18, 10000, '2022-03-08', '2022-03-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(153, 19, 10000, '2022-03-08', '2022-03-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(154, 23, 10000, '2022-03-08', '2022-03-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(155, 11, 10000, '2022-03-11', '2022-03-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(156, 12, 10000, '2022-03-11', '2022-03-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(157, 13, 10000, '2022-03-11', '2022-03-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(158, 20, 10000, '2022-03-11', '2022-03-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(159, 24, 10000, '2022-03-11', '2022-03-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(160, 9, 10000, '2022-03-16', '2022-03-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(161, 10, 10000, '2022-03-16', '2022-03-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(162, 17, 10000, '2022-03-16', '2022-03-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(163, 27, 10000, '2022-03-16', '2022-04-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(164, 27, 10000, '2022-03-16', '2022-03-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(165, 27, 10000, '2022-03-16', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(166, 27, 10000, '2022-03-16', '2022-05-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(167, 27, 10000, '2022-03-16', '2022-06-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(168, 16, 10000, '2022-03-29', '2022-03-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(169, 14, 10000, '2022-03-29', '2022-03-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(170, 25, 10000, '2022-04-02', '2022-03-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(171, 19, 10000, '2022-04-02', '2022-04-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(172, 8, 10000, '2022-04-08', '2022-04-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(173, 23, 10000, '2022-04-08', '2022-04-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(174, 15, 10000, '2022-04-08', '2022-03-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(175, 21, 10000, '2022-04-08', '2022-03-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(176, 22, 10000, '2022-04-08', '2022-03-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(177, 26, 10000, '2022-04-08', '2021-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(178, 26, 10000, '2022-04-08', '2021-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(179, 26, 10000, '2022-04-08', '2021-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(180, 26, 10000, '2022-04-08', '2021-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(181, 26, 10000, '2022-04-08', '2021-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(182, 26, 10000, '2022-04-08', '2022-03-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(183, 25, 10000, '2022-04-09', '2022-04-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(184, 17, 10000, '2022-04-09', '2022-04-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(185, 18, 10000, '2022-04-11', '2022-04-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(186, 13, 10000, '2022-04-16', '2022-04-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(187, 11, 10000, '2022-04-16', '2022-04-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(188, 12, 10000, '2022-04-16', '2022-04-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(189, 20, 10000, '2022-04-16', '2022-04-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(190, 24, 10000, '2022-04-16', '2022-04-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(191, 3, 10000, '2022-05-01', '2022-04-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(192, 3, 10000, '2022-05-01', '2022-05-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(193, 18, 10000, '2022-05-01', '2022-05-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(194, 19, 10000, '2022-05-01', '2022-05-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(195, 9, 10000, '2022-05-01', '2022-04-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(196, 10, 10000, '2022-05-01', '2022-04-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(197, 15, 10000, '2022-05-09', '2022-04-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(198, 21, 10000, '2022-05-09', '2022-04-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(199, 22, 10000, '2022-05-09', '2022-04-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(200, 26, 10000, '2022-05-09', '2022-04-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(201, 17, 10000, '2022-05-13', '2022-05-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(202, 25, 10000, '2022-05-13', '2022-05-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(203, 11, 10000, '2022-05-13', '2022-05-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(204, 12, 10000, '2022-05-13', '2022-05-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(205, 13, 10000, '2022-05-13', '2022-05-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(206, 20, 10000, '2022-05-13', '2022-05-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(207, 24, 10000, '2022-05-13', '2022-05-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(208, 9, 10000, '2022-05-13', '2022-05-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(209, 10, 10000, '2022-05-13', '2022-05-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(210, 8, 10000, '2022-05-13', '2022-05-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(211, 15, 10000, '2022-05-17', '2022-05-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(212, 21, 10000, '2022-05-17', '2022-05-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(213, 22, 10000, '2022-05-17', '2022-05-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(214, 26, 10000, '2022-05-17', '2022-05-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(228, 11, 10000, '2022-05-30', '2022-06-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(229, 12, 10000, '2022-05-30', '2022-06-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(230, 13, 10000, '2022-05-30', '2022-06-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(231, 20, 10000, '2022-05-30', '2022-06-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(232, 18, 10000, '2022-06-01', '2022-06-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(233, 27, 10000, '2022-06-01', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(234, 24, 10000, '2022-06-01', '2022-06-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(235, 25, 10000, '2022-06-04', '2022-06-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(236, 17, 10000, '2022-06-04', '2022-06-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(237, 8, 10000, '2022-06-11', '2022-06-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(238, 9, 10000, '2022-06-11', '2022-06-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(239, 10, 10000, '2022-06-11', '2022-06-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(240, 14, 10000, '2022-06-11', '2022-04-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(241, 14, 10000, '2022-06-11', '2022-05-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(242, 16, 10000, '2022-06-11', '2022-04-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(243, 16, 10000, '2022-06-11', '2022-05-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(244, 35, 10000, '2022-06-15', '2022-06-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(245, 3, 10000, '2022-06-16', '2022-06-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(246, 19, 10000, '2022-06-16', '2022-06-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(247, 14, 10000, '2022-06-17', '2022-06-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(248, 16, 10000, '2022-06-17', '2022-06-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(249, 10, 10000, '2022-06-19', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(250, 16, 10000, '2022-06-19', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(251, 15, 10000, '2022-06-24', '2022-06-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(252, 21, 10000, '2022-06-24', '2022-06-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(253, 22, 10000, '2022-06-24', '2022-06-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(254, 26, 10000, '2022-06-24', '2022-06-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(255, 3, 10000, '2022-07-01', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(256, 18, 10000, '2022-07-01', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(257, 8, 10000, '2022-07-04', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(258, 14, 10000, '2022-07-06', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(259, 9, 10000, '2022-07-06', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(260, 19, 10000, '2022-07-09', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(261, 17, 10000, '2022-07-09', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(262, 25, 10000, '2022-07-09', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(263, 11, 10000, '2022-07-09', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(264, 12, 10000, '2022-07-09', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(265, 13, 10000, '2022-07-09', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(266, 20, 10000, '2022-07-09', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(267, 24, 10000, '2022-07-09', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(268, 35, 10000, '2022-07-18', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(269, 19, 10000, '2022-07-23', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(270, 36, 10000, '2022-07-25', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(271, 15, 10000, '2022-07-25', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(272, 15, 10000, '2022-07-25', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(273, 21, 10000, '2022-07-25', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(274, 22, 10000, '2022-07-25', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(275, 26, 10000, '2022-07-25', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(276, 23, 10000, '2022-07-25', '2022-05-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(277, 23, 10000, '2022-07-25', '2022-06-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(278, 23, 10000, '2022-07-25', '2022-07-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(279, 3, 10000, '2022-07-26', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(280, 18, 10000, '2022-08-01', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(281, 37, 10000, '2022-08-01', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(282, 37, 10000, '2022-08-01', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(283, 37, 10000, '2022-08-01', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(284, 37, 10000, '2022-08-01', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(285, 37, 10000, '2022-08-01', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(286, 9, 10000, '2022-08-02', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(287, 10, 10000, '2022-08-02', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(288, 38, 10000, '2022-08-02', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(289, 8, 10000, '2022-08-02', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(290, 35, 10000, '2022-08-02', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(291, 39, 10000, '2022-08-03', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(292, 40, 10000, '2022-08-03', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(293, 41, 10000, '2022-08-03', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(294, 16, 10000, '2022-08-07', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(295, 14, 10000, '2022-08-07', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(296, 25, 10000, '2022-08-08', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(297, 17, 10000, '2022-08-08', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(298, 11, 10000, '2022-08-13', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(299, 12, 10000, '2022-08-13', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(300, 13, 10000, '2022-08-13', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(301, 20, 10000, '2022-08-13', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(302, 24, 10000, '2022-08-13', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(303, 27, 10000, '2022-08-13', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(304, 19, 10000, '2022-08-31', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(305, 8, 10000, '2022-09-02', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(306, 38, 10000, '2022-09-04', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(307, 40, 10000, '2022-09-04', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(308, 3, 10000, '2022-09-05', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(309, 18, 10000, '2022-09-05', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(310, 36, 10000, '2022-09-05', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(311, 16, 10000, '2022-09-07', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(312, 14, 10000, '2022-09-07', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(313, 11, 10000, '2022-09-07', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(314, 12, 10000, '2022-09-07', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(315, 13, 10000, '2022-09-07', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(316, 24, 10000, '2022-09-07', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(317, 20, 10000, '2022-09-07', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(318, 10, 10000, '2022-09-07', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(319, 9, 10000, '2022-09-07', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(320, 17, 10000, '2022-09-10', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(321, 25, 10000, '2022-09-10', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(322, 35, 10000, '2022-09-11', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(323, 27, 10000, '2022-09-24', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(324, 27, 10000, '2022-09-24', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(325, 27, 10000, '2022-09-24', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(326, 23, 10000, '2022-09-29', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(327, 23, 10000, '2022-09-29', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(328, 8, 10000, '2022-10-03', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(329, 18, 10000, '2022-10-03', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(330, 19, 10000, '2022-10-03', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(331, 36, 10000, '2022-10-03', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(332, 3, 10000, '2022-10-06', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(333, 10, 10000, '2022-10-06', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(334, 16, 10000, '2022-10-06', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(335, 14, 10000, '2022-10-06', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(336, 38, 10000, '2022-10-07', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(337, 40, 10000, '2022-10-07', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(338, 9, 10000, '2022-10-09', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(339, 35, 10000, '2022-10-09', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(340, 15, 10000, '2022-10-14', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(341, 15, 10000, '2022-10-14', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(342, 21, 10000, '2022-10-14', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(343, 21, 10000, '2022-10-14', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(344, 21, 10000, '2022-10-14', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(345, 22, 10000, '2022-10-14', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(346, 22, 10000, '2022-10-14', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(347, 22, 10000, '2022-10-14', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(348, 26, 10000, '2022-10-14', '2022-08-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(349, 26, 10000, '2022-10-14', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(350, 26, 10000, '2022-10-14', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(351, 15, 10000, '2022-10-14', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(352, 17, 10000, '2022-10-14', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(353, 25, 10000, '2022-10-14', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(354, 11, 10000, '2022-10-14', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(355, 12, 10000, '2022-10-14', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(356, 13, 10000, '2022-10-14', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(357, 20, 10000, '2022-10-14', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(358, 24, 10000, '2022-10-14', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(359, 39, 10000, '2022-10-14', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(360, 39, 10000, '2022-10-14', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(361, 41, 10000, '2022-10-14', '2022-09-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(362, 41, 10000, '2022-10-14', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(363, 42, 10000, '2022-10-15', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(364, 43, 10000, '2022-10-15', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(365, 19, 10000, '2022-10-15', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(366, 23, 10000, '2022-10-26', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(367, 3, 10000, '2022-10-31', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(368, 18, 10000, '2022-10-31', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(369, 18, 10000, '2022-10-31', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(370, 42, 10000, '2022-11-02', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(371, 43, 10000, '2022-11-02', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(372, 11, 10000, '2022-11-02', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(373, 12, 10000, '2022-11-02', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(374, 13, 10000, '2022-11-02', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(375, 20, 10000, '2022-11-02', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(376, 24, 10000, '2022-11-02', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(377, 8, 10000, '2022-11-02', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(378, 17, 10000, '2022-11-06', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(379, 25, 10000, '2022-11-06', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(380, 9, 10000, '2022-11-10', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(381, 10, 10000, '2022-11-10', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(382, 14, 10000, '2022-11-10', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(383, 16, 10000, '2022-11-10', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(384, 38, 10000, '2022-11-10', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(385, 40, 10000, '2022-11-10', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(386, 15, 10000, '2022-11-17', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(387, 21, 10000, '2022-11-17', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(388, 21, 10000, '2022-11-17', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(389, 22, 10000, '2022-11-17', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(390, 22, 10000, '2022-11-17', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(391, 26, 10000, '2022-11-17', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(392, 26, 10000, '2022-11-17', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(393, 3, 10000, '2022-11-30', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(394, 19, 10000, '2022-11-30', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(395, 36, 10000, '2022-11-30', '2022-10-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(396, 23, 10000, '2022-11-30', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(397, 8, 10000, '2022-12-03', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(398, 11, 10000, '2022-12-04', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(399, 12, 10000, '2022-12-04', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(400, 13, 10000, '2022-12-04', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(401, 20, 10000, '2022-12-04', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(402, 24, 10000, '2022-12-04', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(403, 38, 10000, '2022-12-09', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(404, 40, 10000, '2022-12-09', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(405, 9, 10000, '2022-12-09', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(406, 10, 10000, '2022-12-09', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(407, 14, 10000, '2022-12-09', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(408, 16, 10000, '2022-12-09', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(409, 42, 10000, '2022-12-09', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(410, 43, 10000, '2022-12-09', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(411, 35, 10000, '2022-12-10', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(412, 35, 10000, '2022-12-10', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(413, 41, 10000, '2022-12-10', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(414, 41, 10000, '2022-12-10', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(415, 39, 10000, '2022-12-10', '2022-11-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(416, 39, 10000, '2022-12-10', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(417, 17, 10000, '2022-12-17', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa'),
(418, 25, 10000, '2022-12-17', '2022-12-01', 'Abono aporte', 'Brayan Acosta Vivas', 'Diana Paola Vivas Barbosa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saving_total`
--

CREATE TABLE `saving_total` (
  `sato_id` int(10) UNSIGNED NOT NULL,
  `pers_id` int(10) UNSIGNED NOT NULL,
  `sato_value` double UNSIGNED NOT NULL,
  `sato_month` date NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `saving_total`
--

INSERT INTO `saving_total` (`sato_id`, `pers_id`, `sato_value`, `sato_month`, `created_at`, `updated_at`) VALUES
(48, 3, 120000, '2022-12-01', '2022-01-19', '2022-11-30'),
(49, 8, 170000, '2022-12-01', '2021-08-15', '2022-12-03'),
(50, 9, 170000, '2022-12-01', '2021-08-15', '2022-12-09'),
(51, 10, 170000, '2022-12-01', '2021-08-15', '2022-12-09'),
(52, 11, 170000, '2022-12-01', '2021-08-15', '2022-12-04'),
(53, 12, 170000, '2022-12-01', '2021-08-15', '2022-12-04'),
(54, 13, 170000, '2022-12-01', '2021-08-15', '2022-12-04'),
(55, 14, 170000, '2022-12-01', '2021-08-15', '2022-12-09'),
(56, 15, 170000, '2022-12-01', '2021-08-15', '2022-11-17'),
(57, 16, 170000, '2022-12-01', '2021-08-15', '2022-12-09'),
(58, 17, 170000, '2022-12-01', '2021-08-15', '2022-12-17'),
(59, 18, 170000, '2022-12-01', '2022-01-21', '2022-10-31'),
(60, 19, 120000, '2022-12-01', '2022-01-25', '2022-11-30'),
(61, 20, 130000, '2022-12-01', '2022-01-25', '2022-12-04'),
(62, 21, 170000, '2022-12-01', '2022-01-25', '2022-11-17'),
(63, 22, 170000, '2022-12-01', '2022-01-25', '2022-11-17'),
(64, 23, 110000, '2022-11-01', '2022-02-01', '2022-11-30'),
(65, 24, 110000, '2022-12-01', '2022-02-11', '2022-12-04'),
(66, 25, 110000, '2022-12-01', '2022-02-19', '2022-12-17'),
(67, 26, 170000, '2022-12-01', '2022-02-19', '2022-11-17'),
(68, 27, 110000, '2022-12-01', '2022-02-19', '2022-09-24'),
(69, 35, 70000, '2022-12-01', '2022-06-15', '2022-12-10'),
(70, 36, 40000, '2022-10-01', '2022-07-25', '2022-11-30'),
(71, 37, 50000, '2022-12-01', '2022-08-01', '2022-08-01'),
(72, 38, 50000, '2022-12-01', '2022-08-02', '2022-12-09'),
(73, 39, 50000, '2022-12-01', '2022-08-03', '2022-12-10'),
(74, 40, 50000, '2022-12-01', '2022-08-03', '2022-12-09'),
(75, 41, 50000, '2022-12-01', '2022-08-03', '2022-12-10'),
(76, 42, 30000, '2022-12-01', '2022-10-15', '2022-12-09'),
(77, 43, 30000, '2022-12-01', '2022-10-15', '2022-12-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `pers_id` int(10) UNSIGNED NOT NULL,
  `user_user` varchar(11) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `user_state` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `pers_id`, `user_user`, `user_pass`, `created_at`, `updated_at`, `user_state`) VALUES
(3, 3, '1193100108', '$2y$10$h6plwcGMS54mii680YzPtOuLo7zECQweogxLk0J38dgbonrRfJ28e', '2022-01-19', '2022-05-04', 'a'),
(8, 8, '27765442', '$2y$10$hHyPD8wNsXHgWcmLPQSMNOX1YjsvgqFiokcwqbPlSpuivwAMOvqWi', '2021-08-15', '2021-08-15', 'a'),
(9, 9, '88141297', '$2y$10$EAvsNjRyuC4d.wotoWZyI.GsTTTy9J8Vx69S1eRgOmAzFNWpzwPMu', '2021-08-15', '2021-08-15', 'a'),
(10, 10, '37325688', '$2y$10$AcVkyoiJaN7x.8l0mNWC7eVOQBtOwHWIufhtpsk9CUcQNuiUqYFwC', '2021-08-15', '2021-08-15', 'a'),
(11, 11, '37326336', '$2y$10$bjYXQMzMo2OZMv7xol2JIuFB4sk9FopMHUQuRJ8Fm8AAlbVMoyEfC', '2021-08-15', '2021-08-15', 'a'),
(12, 12, '13379452', '$2y$10$UKerK0lhiKlmsCjBPPT/CO8QRC1o6klcgavPt/1ic9IfuZongcTtO', '2021-08-15', '2021-08-15', 'a'),
(13, 13, '1004862854', '$2y$10$uwn4YBPQwnzI8NfvlBSIXOPU.49kzuLB5eTHvZvjh.y1vOgKUfiJm', '2021-08-15', '2021-08-15', 'a'),
(14, 14, '1092732325', '$2y$10$HhS9Y5YzKxvHKJSjkKNbdORq1UEAKtBrrTjOcc30iek1AVVkDSo8S', '2021-08-15', '2021-08-15', 'a'),
(15, 15, '13177455', '$2y$10$4hVBeXRNCCUNSrAKkWnGn.zSr/qrGCTvd9nQUghRI7VsiHNylvbIS', '2021-08-15', '2021-08-15', 'a'),
(16, 16, '1091669022', '$2y$10$mdpVnY3jYqE8UJehA258zuFclGDBYcGvJzfcETWSQQ.bzTwmPyZaS', '2021-08-15', '2021-08-15', 'a'),
(17, 17, '37338329', '$2y$10$AbqfGYoe.8tYiMSfIrxkoeyK1NjiQlmPZKl5BaNL53QYLCyqOUYmi', '2021-08-15', '2021-08-15', 'a'),
(18, 18, '37329922', '$2y$10$J2jubt2ApNPV5XI1Vegp0uIVN9EQa.N8iFkitynfDiOeZYeZuJt46', '2022-01-21', '2022-01-21', 'a'),
(19, 19, '88283187', '$2y$10$6u8zyohwMEd8WEFZZa1M9.5myMYHbr1iTyQ89mu8ZSnSEqGoEKbYi', '2022-01-25', '2022-01-25', 'a'),
(20, 20, '1091355630', '$2y$10$P3L7fSnofQ/4QPI/.V3NO.GqHmjaBdrYiL6KpH1C6kTUPYLqD4bLW', '2022-01-25', '2022-01-25', 'a'),
(21, 21, '1084456760', '$2y$10$TcG8jDDLnu6dRttbHxssEOvzL3wZXsm6KUpV5.ihQQV2z5MmWPm/2', '2022-01-25', '2022-01-25', 'a'),
(22, 22, '1083048906', '$2y$10$KJJYoeHQJOOSIUmgpP1jo.5ZLAs9nu43twXuRKD/MYi.I4N5uwCNG', '2022-01-25', '2022-01-25', 'a'),
(23, 23, '13176810', '$2y$10$GdPRWNRi7Y/aqby5P4mSTeXLk/w6h0hyvuMo7KfxRikzZhVi3w1K2', '2022-02-01', '2022-02-01', 'a'),
(24, 24, '1091676902', '$2y$10$Hs0RDiHS329K3cxgEr1NEe13g45d17Sg5P6oEPveyQBUn5Oi1fnN.', '2022-02-11', '2022-02-11', 'a'),
(25, 25, '1092734918', '$2y$10$eB8olii.SNiw24ERF5QS8OUdy5pNZ.pLFV7HQthVUEhB9uO4QfeWy', '2022-02-19', '2022-02-19', 'a'),
(26, 26, '57464448', '$2y$10$DNtm0s4GdAF9e0Pm3JeqHu7ckE7wmHEXPbQmCgac4UFJe1JWi4iNu', '2022-02-19', '2022-02-19', 'a'),
(27, 27, '13357329', '$2y$10$HE9Iy5PJDnic5EANhEQcJ.FG6KFz/1Y8uk2G1aQGwPRsqoyhPUi1q', '2022-02-19', '2022-02-19', 'a'),
(39, 35, '1091682268', '$2y$10$0hwXpfisehKaK3HsXBwLBuS3UsIjA7BItbJngA7iaKu1YNZdcMklW', '2022-06-15', '2022-06-15', 'a'),
(40, 36, '1193577238', '$2y$10$tPqwCsRYgXTX2/569OGi8eerS1cRFjGOGM/lA5izceCP7zDyz0f72', '2022-07-25', '2022-07-25', 'a'),
(41, 37, '1091363322', '$2y$10$xPfoKurNstlcFZtfDD1cN.bx2iFLa1eTjJ2lYWb0tSMUupr3Ba8aG', '2022-08-01', '2022-08-01', 'a'),
(42, 38, '1000474462', '$2y$10$NoIpJeN1.deWBCJJP4zmt.bEcv3kSOTV9Yjd729QQIHg007hf/sjO', '2022-08-02', '2022-08-02', 'a'),
(43, 39, '1091655696', '$2y$10$P5PlvOlmk2AaDQ0kLutfnOu4AU.amjvV0PWHGOkOFfofWm1yh9iai', '2022-08-03', '2022-08-03', 'a'),
(44, 40, '37319597', '$2y$10$iWtG/hzpEydnLJtH77VPzuew6qoP12ikMfeN.HM8ERSZKRCHqafrK', '2022-08-03', '2022-08-03', 'a'),
(45, 41, '13175765', '$2y$10$3EqpJJW9mWaVCtMvo9m40.2zg5cfbwalUI7ZODRn0bb3xyUOgc52S', '2022-08-03', '2022-08-03', 'a'),
(46, 42, '1091669187', '$2y$10$nxLH6j70Nu1t./MQuFrcOOe1wksUn6X1tXuWMBU/Qk2ToP59DrYrq', '2022-10-15', '2022-10-15', 'a'),
(47, 43, '1091665718', '$2y$10$dJYBViCMNdIARne93O9tb.LdNAQeFOoHqbed6z.sDqSweUUbCHlRi', '2022-10-15', '2022-10-15', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_role`
--

CREATE TABLE `user_role` (
  `usro_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `pers_id` int(10) UNSIGNED NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user_role`
--

INSERT INTO `user_role` (`usro_id`, `role_id`, `pers_id`, `created_at`, `updated_at`) VALUES
(1, 3, 3, '2022-01-19', '2022-01-19'),
(2, 1, 8, '2021-08-15', '2021-08-15'),
(3, 1, 9, '2021-08-15', '2021-08-15'),
(4, 1, 10, '2021-08-15', '2021-08-15'),
(5, 1, 11, '2021-08-15', '2021-08-15'),
(6, 1, 12, '2021-08-15', '2021-08-15'),
(7, 1, 13, '2021-08-15', '2021-08-15'),
(8, 1, 14, '2021-08-15', '2021-08-15'),
(9, 1, 15, '2021-08-15', '2021-08-15'),
(10, 1, 16, '2021-08-15', '2021-08-15'),
(11, 2, 17, '2021-08-15', '2021-08-15'),
(12, 1, 18, '2022-01-21', '2022-01-21'),
(13, 1, 19, '2022-01-25', '2022-01-25'),
(14, 1, 20, '2022-01-25', '2022-01-25'),
(15, 1, 21, '2022-01-25', '2022-01-25'),
(16, 1, 22, '2022-01-25', '2022-01-25'),
(17, 1, 23, '2022-02-01', '2022-02-01'),
(18, 1, 24, '2022-02-11', '2022-02-11'),
(19, 1, 25, '2022-02-19', '2022-02-19'),
(20, 1, 26, '2022-02-19', '2022-02-19'),
(21, 1, 27, '2022-02-19', '2022-02-19'),
(28, 1, 35, '2022-06-15', '2022-06-15'),
(29, 1, 36, '2022-07-25', '2022-07-25'),
(30, 1, 37, '2022-08-01', '2022-08-01'),
(31, 1, 38, '2022-08-02', '2022-08-02'),
(32, 1, 39, '2022-08-03', '2022-08-03'),
(33, 1, 40, '2022-08-03', '2022-08-03'),
(34, 1, 41, '2022-08-03', '2022-08-03'),
(35, 1, 42, '2022-10-15', '2022-10-15'),
(36, 1, 43, '2022-10-15', '2022-10-15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`credit_id`),
  ADD UNIQUE KEY `credit_id_UNIQUE` (`credit_id`),
  ADD KEY `fk_application_id` (`application_id`),
  ADD KEY `fk_credit_person1_idx` (`pers_id_debtor`),
  ADD KEY `fk_credit_person2_idx` (`pers_id_codebtor`);

--
-- Indices de la tabla `credit_application`
--
ALTER TABLE `credit_application`
  ADD PRIMARY KEY (`credit_application_id`),
  ADD UNIQUE KEY `credit_application_id_UNIQUE` (`credit_application_id`),
  ADD KEY `fk_person_id_debto` (`pers_id_debtor`),
  ADD KEY `fk_pers_id_co_debtor` (`pers_id_co_debtor`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`),
  ADD UNIQUE KEY `log_id_UNIQUE` (`log_id`),
  ADD KEY `fk_person_id` (`pers_id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD UNIQUE KEY `menu_id_UNIQUE` (`menu_id`);

--
-- Indices de la tabla `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD UNIQUE KEY `pay_id_UNIQUE` (`pay_id`),
  ADD KEY `fk_credit_id` (`credit_id`);

--
-- Indices de la tabla `permit`
--
ALTER TABLE `permit`
  ADD PRIMARY KEY (`permit_id`),
  ADD UNIQUE KEY `permit_id_UNIQUE` (`permit_id`);

--
-- Indices de la tabla `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`pers_id`),
  ADD UNIQUE KEY `ic_person_document` (`pers_document`),
  ADD UNIQUE KEY `uc_pers_id` (`pers_id`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_id_UNIQUE` (`role_id`),
  ADD UNIQUE KEY `role_name_UNIQUE` (`role_name`);

--
-- Indices de la tabla `role_menu_permit`
--
ALTER TABLE `role_menu_permit`
  ADD PRIMARY KEY (`role_menu_permit_id`),
  ADD UNIQUE KEY `role_menu_permit_id_UNIQUE` (`role_menu_permit_id`),
  ADD KEY `fk_role_id` (`role_id`),
  ADD KEY `fkt_permit_id` (`permit_id`),
  ADD KEY `fk_menu_id` (`menu_id`);

--
-- Indices de la tabla `saving`
--
ALTER TABLE `saving`
  ADD PRIMARY KEY (`saving_id`),
  ADD UNIQUE KEY `saving_id_UNIQUE` (`saving_id`),
  ADD KEY `fk_person_id` (`pers_id`);

--
-- Indices de la tabla `saving_total`
--
ALTER TABLE `saving_total`
  ADD PRIMARY KEY (`sato_id`),
  ADD UNIQUE KEY `sato_id_UNIQUE` (`sato_id`),
  ADD KEY `fk_person_id` (`pers_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  ADD UNIQUE KEY `user_user_UNIQUE` (`user_user`),
  ADD KEY `fk_person_id` (`pers_id`);

--
-- Indices de la tabla `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`usro_id`),
  ADD UNIQUE KEY `usro_id_UNIQUE` (`usro_id`),
  ADD KEY `fk_user_role_role1_idx` (`role_id`),
  ADD KEY `fk_pers_id` (`pers_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `credit`
--
ALTER TABLE `credit`
  MODIFY `credit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `credit_application`
--
ALTER TABLE `credit_application`
  MODIFY `credit_application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=446;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `permit`
--
ALTER TABLE `permit`
  MODIFY `permit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `person`
--
ALTER TABLE `person`
  MODIFY `pers_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `role_menu_permit`
--
ALTER TABLE `role_menu_permit`
  MODIFY `role_menu_permit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `saving`
--
ALTER TABLE `saving`
  MODIFY `saving_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=419;

--
-- AUTO_INCREMENT de la tabla `saving_total`
--
ALTER TABLE `saving_total`
  MODIFY `sato_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `user_role`
--
ALTER TABLE `user_role`
  MODIFY `usro_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `credit`
--
ALTER TABLE `credit`
  ADD CONSTRAINT `fk_credit_credit_application1` FOREIGN KEY (`application_id`) REFERENCES `credit_application` (`credit_application_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_credit_person1` FOREIGN KEY (`pers_id_debtor`) REFERENCES `person` (`pers_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_credit_person2` FOREIGN KEY (`pers_id_codebtor`) REFERENCES `person` (`pers_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `credit_application`
--
ALTER TABLE `credit_application`
  ADD CONSTRAINT `fk_credit_application_person1` FOREIGN KEY (`pers_id_debtor`) REFERENCES `person` (`pers_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_credit_application_person2` FOREIGN KEY (`pers_id_co_debtor`) REFERENCES `person` (`pers_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `fk_log_person1` FOREIGN KEY (`pers_id`) REFERENCES `person` (`pers_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_credit1` FOREIGN KEY (`credit_id`) REFERENCES `credit` (`credit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `role_menu_permit`
--
ALTER TABLE `role_menu_permit`
  ADD CONSTRAINT `fk_role_menu_permit_menu1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_role_menu_permit_permit1` FOREIGN KEY (`permit_id`) REFERENCES `permit` (`permit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_role_menu_permit_role1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `saving`
--
ALTER TABLE `saving`
  ADD CONSTRAINT `fk_saving_person1` FOREIGN KEY (`pers_id`) REFERENCES `person` (`pers_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `saving_total`
--
ALTER TABLE `saving_total`
  ADD CONSTRAINT `fk_saving_total_person1` FOREIGN KEY (`pers_id`) REFERENCES `person` (`pers_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_person` FOREIGN KEY (`pers_id`) REFERENCES `person` (`pers_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_role_person1` FOREIGN KEY (`pers_id`) REFERENCES `person` (`pers_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
