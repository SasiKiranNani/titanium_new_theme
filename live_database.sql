-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2025 at 01:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `live_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_vehicles`
--

CREATE TABLE `assign_vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `cost_per_week` decimal(10,2) NOT NULL,
  `rent_start_date` date NOT NULL,
  `rent_end_date` date NOT NULL,
  `rented` tinyint(1) NOT NULL DEFAULT 0,
  `total_days` varchar(255) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `deposit_amount` decimal(10,2) NOT NULL,
  `outstanding_amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `agreement` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_vehicles`
--

INSERT INTO `assign_vehicles` (`id`, `reg_no`, `user_id`, `cost_per_week`, `rent_start_date`, `rent_end_date`, `rented`, `total_days`, `total_price`, `deposit_amount`, `outstanding_amount`, `payment_method`, `agreement`, `created_at`, `updated_at`) VALUES
(3, 'YYH656', '9', 300.00, '2025-02-09', '2025-02-23', 0, '7', 300.00, 23.00, 277.00, 'COD', '/home/u147506261/domains/titaniumautomotive.com.au/public_html/public/agreements/YYH656_2025-02-16_to_2025-02-23_agreement.pdf', '2025-02-10 11:02:51', '2025-02-24 04:48:31'),
(5, '1UH6ND', '11', 300.00, '2025-02-11', '2025-02-18', 0, '7', 300.00, 350.00, -50.00, 'COD', '/home/u147506261/domains/titaniumautomotive.com.au/public_html/public/agreements/1UH6ND_2025-02-11_to_2025-02-18_agreement.pdf', '2025-02-10 13:48:06', '2025-02-10 13:48:06'),
(7, '1VU4EP', '13', 300.00, '2025-02-12', '2026-02-12', 1, '365', 15643.00, 0.00, 15643.00, 'COD', '/home/u147506261/domains/titaniumautomotive.com.au/public_html/public/agreements/1VU4EP_2025-02-12_to_2026-02-12_agreement.pdf', '2025-02-12 12:41:49', '2025-03-20 16:50:30'),
(8, '1WJ4JF', '14', 300.00, '2025-02-14', '2025-02-20', 0, '6', 257.00, 300.00, -43.00, 'COD', '/home/u147506261/domains/titaniumautomotive.com.au/public_html/public/agreements/1WJ4JF_2025-02-14_to_2025-02-21_agreement.pdf', '2025-02-14 09:02:37', '2025-02-21 10:40:27'),
(9, '1UN7NH', '15', 300.00, '2025-02-14', '2025-06-14', 1, '120', 5143.00, 270.00, 4873.00, 'COD', '/home/u147506261/domains/titaniumautomotive.com.au/public_html/public/agreements/1UN7NH_2025-02-14_to_2025-06-14_agreement.pdf', '2025-02-14 12:29:12', '2025-03-20 16:50:30'),
(20, '1RC2OI', '22', 300.00, '2025-03-01', '2025-03-22', 1, '21', 900.00, 300.00, 600.00, 'COD', '/home/u147506261/domains/titaniumautomotive.com.au/public_html/public/agreements/1RC2OI_2025-03-01_to_2025-03-22_agreement.pdf', '2025-02-23 06:03:36', '2025-03-20 16:50:31'),
(21, '1WJ4HS', '24', 300.00, '2025-02-23', '2026-02-23', 1, '365', 15643.00, 300.00, 15343.00, 'COD', '/home/u147506261/domains/titaniumautomotive.com.au/public_html/public/agreements/1WJ4HS_2025-02-23_to_2026-02-23_agreement.pdf', '2025-02-23 17:46:47', '2025-03-20 16:50:30'),
(22, '1VS5DN', '25', 300.00, '2025-02-24', '2026-02-24', 1, '365', 15643.00, 0.00, 15643.00, 'COD', '/home/u147506261/domains/titaniumautomotive.com.au/public_html/public/agreements/1VS5DN_2025-02-24_to_2026-02-24_agreement.pdf', '2025-02-24 14:37:22', '2025-03-20 16:50:30'),
(24, '2AQ7DH', '27', 300.00, '2025-02-24', '2026-02-24', 1, '365', 15643.00, 0.00, 15643.00, 'COD', '/home/u147506261/domains/titaniumautomotive.com.au/public_html/public/agreements/2AQ7DH_2025-02-24_to_2026-02-24_agreement.pdf', '2025-02-25 12:35:40', '2025-03-20 16:50:31'),
(25, '1WJ4JF', '29', 290.00, '2025-02-25', '2026-02-25', 1, '365', 15121.00, 300.00, 14821.00, 'COD', '/home/u147506261/domains/titaniumautomotive.com.au/public_html/public/agreements/1WJ4JF_2025-02-25_to_2026-02-25_agreement.pdf', '2025-02-25 13:02:23', '2025-03-20 16:50:31'),
(26, '1YQ2LU', '30', 300.00, '2025-02-26', '2026-02-26', 1, '365', 15643.00, 300.00, 15343.00, 'COD', '/home/u147506261/domains/titaniumautomotive.com.au/public_html/public/agreements/1YQ2LU_2025-02-26_to_2026-02-26_agreement.pdf', '2025-02-26 18:37:22', '2025-03-20 16:50:31'),
(27, '1WJ4IL', '31', 280.00, '2025-02-27', '2026-02-27', 1, '365', 14600.00, 280.00, 14320.00, 'COD', '/home/u147506261/domains/titaniumautomotive.com.au/public_html/public/agreements/1WJ4IL_2025-02-27_to_2026-02-27_agreement.pdf', '2025-02-27 12:39:46', '2025-03-20 16:50:31'),
(28, '1XP1XC', '32', 320.00, '2025-02-26', '2026-02-26', 1, '365', 16686.00, 300.00, 16386.00, 'COD', '/home/u147506261/domains/titaniumautomotive.com.au/public_html/public/agreements/1XP1XC_2025-02-26_to_2026-02-26_agreement.pdf', '2025-03-02 12:33:51', '2025-03-20 16:50:31'),
(30, '1NZ9ME', '23', 300.00, '2025-03-11', '2025-03-18', 0, '7', 300.00, 123.00, 177.00, 'COD', '/home/u147506261/domains/titaniumautomotive.com.au/public_html/public/agreements/1NZ9ME_2025-03-11_to_2025-03-18_agreement.pdf', '2025-03-09 07:10:12', '2025-03-19 22:56:45'),
(31, '20QB2533223040488', '33', 90.00, '2025-03-09', '2025-07-09', 1, '122', 1569.00, 0.00, 1569.00, 'COD', '/home/u147506261/domains/titaniumautomotive.com.au/public_html/public/agreements/20QB2533223040488_2025-03-09_to_2025-07-09_agreement.pdf', '2025-03-09 11:27:47', '2025-03-20 14:30:27'),
(33, '2CA4BH', '35', 320.00, '2025-03-10', '2026-03-10', 1, '365', 16686.00, 0.00, 16686.00, 'COD', '/home/u147506261/domains/titaniumautomotive.com.au/public_html/public/agreements/2CA4BH_2025-03-10_to_2026-03-10_agreement.pdf', '2025-03-10 21:04:05', '2025-03-20 14:30:27'),
(35, '2CA4BG', '36', 500.00, '2025-03-07', '2025-06-07', 1, '92', 6571.00, 0.00, 6571.00, 'COD', '/home/u147506261/domains/titaniumautomotive.com.au/public_html/public/agreements/2CA4BG_2025-03-07_to_2025-06-07_agreement.pdf', '2025-03-12 14:23:48', '2025-03-20 14:30:27'),
(36, '1RT7PS', '37', 300.00, '2025-03-20', '2025-03-27', 1, '7', 300.00, 233.00, 67.00, 'COD', '/home/u147506261/domains/titaniumautomotive.com.au/public_html/public/agreements/1RT7PS_2025-03-20_to_2025-03-27_agreement.pdf', '2025-03-12 18:47:31', '2025-03-20 14:30:27'),
(48, '2CA4BF', '40', 320.00, '2025-03-13', '2025-03-27', 1, '14', 640.00, 320.00, 320.00, 'COD', '/home/u147506261/domains/titaniumautomotive.com.au/public_html/public/agreements/2CA4BF_2025-03-13_to_2025-03-27_agreement.pdf', '2025-03-13 20:25:38', '2025-03-20 14:30:27'),
(49, '1WJ4IR', '41', 300.00, '2025-03-14', '2025-06-14', 1, '92', 3943.00, 300.00, 3643.00, 'COD', '/home/u147506261/domains/titaniumautomotive.com.au/public_html/public/agreements/1WJ4IR_2025-03-14_to_2025-06-14_agreement.pdf', '2025-03-14 10:13:02', '2025-03-20 14:30:27'),
(50, '1TT1DO', '42', 300.00, '2025-03-19', '2026-03-19', 1, '365', 15643.00, 0.00, 15643.00, 'COD', '/home/u147506261/domains/titaniumautomotive.com.au/public_html/public/agreements/1TT1DO_2025-03-19_to_2026-03-19_agreement.pdf', '2025-03-19 18:50:22', '2025-03-20 14:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `authorised_drivers`
--

CREATE TABLE `authorised_drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `authorised_driver_name` varchar(255) NOT NULL,
  `authorised_driver_dob` date NOT NULL,
  `authorised_driver_address` varchar(255) NOT NULL,
  `authorised_driver_license_no` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authorised_drivers`
--

INSERT INTO `authorised_drivers` (`id`, `user_id`, `authorised_driver_name`, `authorised_driver_dob`, `authorised_driver_address`, `authorised_driver_license_no`, `created_at`, `updated_at`) VALUES
(4, 25, 'Manoj kumar reddy Sampathi', '1995-03-23', '51 KALLAY STREET, Clayton south', '041050179', '2025-02-24 14:37:22', '2025-02-24 14:37:22'),
(5, 30, 'Nithin Reddy Ippagunta', '1999-05-11', '3/39 Alice street Clayton', '0 5 2 4 6 1 0 3 0', '2025-02-26 18:37:22', '2025-02-26 18:37:22'),
(6, 31, 'Saran Anandan', '1989-04-27', '129 wattletree st', '057022832', '2025-02-27 12:39:46', '2025-02-27 12:39:46'),
(8, 40, 'Harkomal Singh Otal', '1994-09-21', '97 Hemingway drive Rockbank 3335', '024091998', '2025-03-13 20:25:38', '2025-03-13 20:25:38'),
(9, 41, 'Sourav Singh', '1994-06-08', '23 verbier road, Pakenham', '006113890', '2025-03-14 10:13:02', '2025-03-14 10:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('01b2cc44ef679e614cc7862c47a84dee', 'i:1;', 1741479652),
('01b2cc44ef679e614cc7862c47a84dee:timer', 'i:1741479652;', 1741479652),
('0fa300c7187d1f0ed7f9102d6a64e978', 'i:1;', 1740376615),
('0fa300c7187d1f0ed7f9102d6a64e978:timer', 'i:1740376615;', 1740376615),
('12f6a8fc043944de0d1d99ecc5e5dc7d', 'i:1;', 1741339947),
('12f6a8fc043944de0d1d99ecc5e5dc7d:timer', 'i:1741339947;', 1741339947),
('46391c051d01ce9f91561dece2a7b0f0', 'i:1;', 1741885591),
('46391c051d01ce9f91561dece2a7b0f0:timer', 'i:1741885591;', 1741885591),
('4709689f8e1e16b91597357fe9c517be', 'i:1;', 1741326911),
('4709689f8e1e16b91597357fe9c517be:timer', 'i:1741326911;', 1741326911),
('5a4639eae0e543638f1860243a206369', 'i:1;', 1742103309),
('5a4639eae0e543638f1860243a206369:timer', 'i:1742103309;', 1742103309),
('75b79c6f6f910d2d36d4a64c33e76e85', 'i:1;', 1740602651),
('75b79c6f6f910d2d36d4a64c33e76e85:timer', 'i:1740602651;', 1740602651),
('7a5efcdc74d8902b8c5194cdd094863d', 'i:1;', 1740298741),
('7a5efcdc74d8902b8c5194cdd094863d:timer', 'i:1740298741;', 1740298741),
('8712bd1e7afea26bcef81fed68d4e298', 'i:1;', 1742359778),
('8712bd1e7afea26bcef81fed68d4e298:timer', 'i:1742359778;', 1742359778),
('8f6092d41792f3d1ed8c128410391b9b', 'i:1;', 1741026265),
('8f6092d41792f3d1ed8c128410391b9b:timer', 'i:1741026265;', 1741026265),
('9b35106036aa04ffe52f94cb6d6ad90b', 'i:1;', 1740742192),
('9b35106036aa04ffe52f94cb6d6ad90b:timer', 'i:1740742192;', 1740742192),
('a750d2daf8ee48c7dcb4e0861c36d21b', 'i:1;', 1741906155),
('a750d2daf8ee48c7dcb4e0861c36d21b:timer', 'i:1741906155;', 1741906155),
('b15a9d6bd5544f3d888cfaa0924fcaf8', 'i:1;', 1740287205),
('b15a9d6bd5544f3d888cfaa0924fcaf8:timer', 'i:1740287205;', 1740287205),
('f0960d4ffcd1f15a593002280c1308f9', 'i:1;', 1741543109),
('f0960d4ffcd1f15a593002280c1308f9:timer', 'i:1741543109;', 1741543109),
('f2f3815c6f91812824036e3495da5338', 'i:1;', 1741765274),
('f2f3815c6f91812824036e3495da5338:timer', 'i:1741765274;', 1741765274),
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:35:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:16:\"view permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:18:\"create permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:18:\"update permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:18:\"delete permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:10:\"view roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:12:\"create roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:12:\"update roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:12:\"delete roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:10:\"view users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:12:\"create users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:12:\"update users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:12:\"delete users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:15:\"view categories\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:17:\"create categories\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:17:\"update categories\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:17:\"delete categories\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:13:\"view vehicles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:15:\"create vehicles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:15:\"update vehicles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:15:\"delete vehicles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:12:\"view drivers\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:14:\"create drivers\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:14:\"update drivers\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:14:\"delete drivers\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:26:\"upcoming vehicle allotment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:24:\"update vehicle allotment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:24:\"delete vehicle allotment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:25:\"ongoing vehicle allotment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:27:\"completed vehicle allotment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:14:\"driver details\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:20:\"driver details-empty\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:15:\"vehicle details\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:21:\"vehicle details-empty\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:33;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:17:\"mail from drivers\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:34;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:18:\"mail from vehicles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}}}', 1742446119),
('titanium_automotive_cache_20d9e28d5b6e5632230edb2e069aa39c', 'i:3;', 1742466503),
('titanium_automotive_cache_20d9e28d5b6e5632230edb2e069aa39c:timer', 'i:1742466503;', 1742466503);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Cars', 'cars', '2025-02-04 10:54:13', '2025-02-04 10:54:13'),
(2, 'Scooter', 'scooter', '2025-02-10 15:35:08', '2025-02-10 15:35:08'),
(3, 'E-Bike', 'e-bike', '2025-02-10 15:35:15', '2025-02-10 15:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `driver_files`
--

CREATE TABLE `driver_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_15_065207_add_two_factor_columns_to_users_table', 1),
(5, '2025_01_15_065246_create_personal_access_tokens_table', 1),
(6, '2025_01_15_070142_create_categories_table', 1),
(7, '2025_01_15_071301_create_vehicle_details_table', 1),
(8, '2025_01_16_042426_create_drivers_table', 1),
(9, '2025_01_16_063020_create_permission_tables', 1),
(11, '2025_01_21_170401_create_authorised_drivers_table', 1),
(12, '2025_01_22_164744_create_rental_agreements_table', 2),
(17, '2025_01_29_103528_create_user_vehicle_tokens_table', 5),
(19, '2025_01_20_040005_create_assign_vehicles_table', 6),
(25, '2025_02_21_203936_create_vehicle_files_table', 7),
(26, '2025_02_21_222138_create_driver_files_table', 7),
(27, '2025_02_05_120909_create_time_slot_table', 8),
(28, '2025_02_27_163412_create_services_table', 8),
(29, '2025_02_27_172607_create_service_jobs_table', 8),
(30, '2025_02_27_183546_create_service_bookings_table', 8),
(31, '2025_02_27_202208_create_miscellaneouses_table', 8),
(32, '2025_03_02_063751_create_other_service_bookings_table', 8),
(33, '2025_03_03_234412_create_vehicle_accidents_table', 8),
(34, '2025_03_03_235939_create_vehicle_accident_files_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `miscellaneouses`
--

CREATE TABLE `miscellaneouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 14),
(2, 'App\\Models\\User', 15),
(2, 'App\\Models\\User', 23),
(2, 'App\\Models\\User', 24),
(2, 'App\\Models\\User', 25),
(2, 'App\\Models\\User', 26),
(2, 'App\\Models\\User', 27),
(2, 'App\\Models\\User', 29),
(2, 'App\\Models\\User', 30),
(2, 'App\\Models\\User', 31),
(2, 'App\\Models\\User', 32),
(2, 'App\\Models\\User', 33),
(2, 'App\\Models\\User', 35),
(2, 'App\\Models\\User', 36),
(2, 'App\\Models\\User', 37),
(2, 'App\\Models\\User', 38),
(2, 'App\\Models\\User', 40),
(2, 'App\\Models\\User', 41),
(2, 'App\\Models\\User', 42),
(3, 'App\\Models\\User', 10);

-- --------------------------------------------------------

--
-- Table structure for table `other_service_bookings`
--

CREATE TABLE `other_service_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time_slot_id` bigint(20) UNSIGNED NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `odometer` varchar(255) DEFAULT NULL,
  `service_interval` varchar(255) DEFAULT NULL,
  `next_service_due` varchar(255) DEFAULT NULL,
  `service_job_id` varchar(255) DEFAULT NULL,
  `miscellaneous` varchar(255) DEFAULT NULL,
  `gst_toggle` tinyint(1) NOT NULL DEFAULT 0,
  `gst_percentage` decimal(5,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `total_paid` varchar(255) DEFAULT NULL,
  `balance_due` varchar(255) DEFAULT NULL,
  `abn` varchar(15) DEFAULT NULL,
  `repair_order_no` varchar(50) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `cust_name` varchar(100) DEFAULT NULL,
  `street` varchar(1000) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `post_code` varchar(10) DEFAULT NULL,
  `make` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `vin` varchar(50) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `engine_no` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view permissions', 'web', '2025-01-29 07:26:25', '2025-01-29 07:26:25'),
(2, 'create permissions', 'web', '2025-01-29 07:26:30', '2025-01-29 07:26:30'),
(3, 'update permissions', 'web', '2025-01-29 07:26:35', '2025-01-29 07:26:35'),
(4, 'delete permissions', 'web', '2025-01-29 07:26:40', '2025-01-29 07:26:40'),
(5, 'view roles', 'web', '2025-01-29 07:26:49', '2025-01-29 07:26:49'),
(6, 'create roles', 'web', '2025-01-29 07:26:54', '2025-01-29 07:26:54'),
(7, 'update roles', 'web', '2025-01-29 07:27:03', '2025-01-29 07:27:03'),
(8, 'delete roles', 'web', '2025-01-29 07:27:08', '2025-01-29 07:27:08'),
(9, 'view users', 'web', '2025-01-29 07:27:16', '2025-01-29 07:27:16'),
(10, 'create users', 'web', '2025-01-29 07:27:23', '2025-01-29 07:27:23'),
(11, 'update users', 'web', '2025-01-29 07:27:29', '2025-01-29 07:27:29'),
(12, 'delete users', 'web', '2025-01-29 07:27:35', '2025-01-29 07:27:35'),
(13, 'view categories', 'web', '2025-01-29 07:27:48', '2025-01-29 07:27:48'),
(14, 'create categories', 'web', '2025-01-29 07:27:54', '2025-01-29 07:27:54'),
(15, 'update categories', 'web', '2025-01-29 07:27:59', '2025-01-29 07:27:59'),
(16, 'delete categories', 'web', '2025-01-29 07:28:04', '2025-01-29 07:28:04'),
(17, 'view vehicles', 'web', '2025-01-29 07:28:17', '2025-01-29 07:28:17'),
(18, 'create vehicles', 'web', '2025-01-29 07:28:26', '2025-01-29 07:28:26'),
(19, 'update vehicles', 'web', '2025-01-29 07:28:36', '2025-01-29 07:28:36'),
(20, 'delete vehicles', 'web', '2025-01-29 07:28:43', '2025-01-29 07:28:43'),
(21, 'view drivers', 'web', '2025-01-29 07:29:19', '2025-01-29 07:29:19'),
(22, 'create drivers', 'web', '2025-01-29 07:29:25', '2025-01-29 07:29:25'),
(23, 'update drivers', 'web', '2025-01-29 07:29:32', '2025-01-29 07:29:32'),
(24, 'delete drivers', 'web', '2025-01-29 07:29:38', '2025-01-29 07:29:38'),
(25, 'upcoming vehicle allotment', 'web', '2025-01-29 08:49:04', '2025-01-29 09:10:56'),
(26, 'update vehicle allotment', 'web', '2025-01-29 09:00:00', '2025-01-29 09:10:47'),
(27, 'delete vehicle allotment', 'web', '2025-01-29 09:00:09', '2025-01-29 09:10:38'),
(29, 'ongoing vehicle allotment', 'web', '2025-01-29 09:06:48', '2025-01-29 09:10:32'),
(30, 'completed vehicle allotment', 'web', '2025-01-29 09:08:55', '2025-01-29 09:10:26'),
(31, 'driver details', 'web', '2025-01-29 09:22:49', '2025-01-29 09:38:10'),
(32, 'driver details-empty', 'web', '2025-01-29 09:28:14', '2025-01-29 09:38:19'),
(33, 'vehicle details', 'web', '2025-01-29 09:28:23', '2025-01-29 09:38:30'),
(34, 'vehicle details-empty', 'web', '2025-01-29 09:38:33', '2025-01-29 09:38:33'),
(35, 'mail from drivers', 'web', '2025-01-29 09:45:49', '2025-01-29 09:45:49'),
(36, 'mail from vehicles', 'web', '2025-01-29 09:46:02', '2025-01-29 09:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rental_agreements`
--

CREATE TABLE `rental_agreements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `signature` varchar(255) NOT NULL,
  `pdf_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rental_agreements`
--

INSERT INTO `rental_agreements` (`id`, `user_id`, `vehicle_id`, `signature`, `pdf_path`, `created_at`, `updated_at`) VALUES
(7, 13, 24, 'signature_1739344309.png', NULL, '2025-02-12 12:41:49', '2025-02-12 12:41:49'),
(8, 14, 28, 'signature_1739503957.png', NULL, '2025-02-14 09:02:37', '2025-02-14 09:02:37'),
(9, 15, 68, 'signature_1739516352.png', NULL, '2025-02-14 12:29:12', '2025-02-14 12:29:12'),
(18, 23, 1, 'signature_1740201927.png', NULL, '2025-02-22 16:25:27', '2025-02-22 16:25:27'),
(26, 24, 25, 'signature_1740293207.png', NULL, '2025-02-23 17:46:47', '2025-02-23 17:46:47'),
(27, 25, 23, 'signature_1740368242.png', NULL, '2025-02-24 14:37:22', '2025-02-24 14:37:22'),
(28, 26, 8, 'signature_1740376768.png', NULL, '2025-02-24 16:59:28', '2025-02-24 16:59:28'),
(29, 27, 57, 'signature_1740447340.png', NULL, '2025-02-25 12:35:40', '2025-02-25 12:35:40'),
(30, 29, 28, 'signature_1740448943.png', NULL, '2025-02-25 13:02:23', '2025-02-25 13:02:23'),
(31, 30, 42, 'signature_1740555442.png', NULL, '2025-02-26 18:37:22', '2025-02-26 18:37:22'),
(32, 31, 26, 'signature_1740620386.png', NULL, '2025-02-27 12:39:46', '2025-02-27 12:39:46'),
(33, 32, 34, 'signature_1740879231.png', NULL, '2025-03-02 12:33:51', '2025-03-02 12:33:51'),
(35, 23, 1, 'signature_1741464612.png', NULL, '2025-03-09 07:10:12', '2025-03-09 07:10:12'),
(36, 33, 119, 'signature_1741480067.png', NULL, '2025-03-09 11:27:47', '2025-03-09 11:27:47'),
(38, 35, 118, 'signature_1741601045.png', NULL, '2025-03-10 21:04:05', '2025-03-10 21:04:05'),
(39, 36, 121, 'signature_1741749514.png', NULL, '2025-03-12 14:18:34', '2025-03-12 14:18:34'),
(40, 36, 121, 'signature_1741749828.png', NULL, '2025-03-12 14:23:48', '2025-03-12 14:23:48'),
(41, 37, 2, 'signature_1741765651.png', NULL, '2025-03-12 18:47:31', '2025-03-12 18:47:31'),
(42, 38, 3, 'signature_1741770890.png', NULL, '2025-03-12 20:14:50', '2025-03-12 20:14:50'),
(43, 38, 3, 'signature_1741771053.png', NULL, '2025-03-12 20:17:33', '2025-03-12 20:17:33'),
(50, 38, 2, 'signature_1741771297.png', NULL, '2025-03-12 20:21:37', '2025-03-12 20:21:37'),
(51, 38, 122, 'signature_1741771416.png', NULL, '2025-03-12 20:23:36', '2025-03-12 20:23:36'),
(53, 40, 120, 'signature_1741857938.png', NULL, '2025-03-13 20:25:38', '2025-03-13 20:25:38'),
(54, 41, 27, 'signature_1741907582.png', NULL, '2025-03-14 10:13:02', '2025-03-14 10:13:02'),
(55, 42, 8, 'signature_1742370622.png', NULL, '2025-03-19 18:50:22', '2025-03-19 18:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-01-21 22:09:56', '2025-01-21 22:09:56'),
(2, 'driver', 'web', '2025-01-21 22:10:02', '2025-01-21 22:10:02'),
(3, 'superadmin', 'web', '2025-01-30 14:54:38', '2025-01-30 14:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_bookings`
--

CREATE TABLE `service_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time_slot_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `odometer` varchar(255) DEFAULT NULL,
  `service_interval` varchar(255) DEFAULT NULL,
  `next_service_due` varchar(255) DEFAULT NULL,
  `service_job_id` varchar(255) DEFAULT NULL,
  `miscellaneous` varchar(255) DEFAULT NULL,
  `gst_toggle` tinyint(1) NOT NULL DEFAULT 0,
  `gst_percentage` decimal(5,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `total_paid` varchar(255) DEFAULT NULL,
  `balance_due` varchar(255) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `abn` varchar(15) DEFAULT NULL,
  `repair_order_no` varchar(50) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `cust_name` varchar(100) DEFAULT NULL,
  `street` varchar(1000) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `post_code` varchar(10) DEFAULT NULL,
  `make` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `vin` varchar(50) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `engine_no` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_jobs`
--

CREATE TABLE `service_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2grA3RNRHhCmar1XhKpssnTOakjaCIQaXxDFLlrF', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZ1dtUThxZDFid0pXTzBTbEowaVVQWFdrMGNoQjRydmtDZ0pRcjFPaSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi90aW1lLXNsb3RzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiQ3NFdKa2lrd09qS1cvMGxESy5JZ3J1VE5DOTRaRFV2Q1pnRTdsbVhZcnNQYTRwQTRCWGlGMiI7fQ==', 1742475063),
('5jI95d6B1OMUrVNOqvkEB1tn45xwdlR5RRP66ZsZ', NULL, '157.119.40.17', 'Mozilla/5.0 (ZZ; Linux i686; rv:125.0) Gecko/20100101 Firefox/125.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQzR0WFZtNEdDSG1ZNEI3cWkxTTZHdUpZWGRTRVBkTHU3TVZ0cVJWcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vdGl0YW5pdW1hdXRvbW90aXZlLmNvbS5hdSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742453407),
('baKjF846dqI8Q1SY3MjJloMsWI1CTK4ok2KlGbod', NULL, '58.96.65.252', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUTlMcUszV0dXdE1yMG9wTE1BSDBGT0Z4d0FmZUp4azRqaXREcE83ciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vdGl0YW5pdW1hdXRvbW90aXZlLmNvbS5hdSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742465799),
('dAfoU2uhlN0GnDD5TOLWcsgqV3490FFaxhqyvJTQ', NULL, '157.119.40.17', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.4 Safari/605.1.15', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTU9TS2pFMEhCT1NWQkM5Wm0zVzVydUVFbU9aQ2hjRjlObG03RUlWcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vd3d3LnRpdGFuaXVtYXV0b21vdGl2ZS5jb20uYXUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742450728),
('fc5W5xUMSUxbGmguv4k9OdqmCamUa3A4v94xZhCH', NULL, '157.119.40.17', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMWwxT0w2S05RNDlrVnJWVWRFZ0hWc05iWnl0NmRVcjJFUm5IaFoxNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vdGl0YW5pdW1hdXRvbW90aXZlLmNvbS5hdSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742453408),
('igKOKOzmRtDNAzGcgNyFvBMP9ZTC80F2z6mWVY1u', NULL, '8.41.221.48', 'Mozilla/5.0 Firefox/33.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSU04RTJZQUFzM24zVGoxaE4zaVdKbkk0VThJNjNKUXVrQVRTRTRLaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vdGl0YW5pdW1hdXRvbW90aXZlLmNvbS5hdSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742431428),
('IMMFT4HkIU8wqIPFlDFhjZVZK9LDKO3Leuz0ClBU', NULL, '157.119.40.17', 'Mozilla/5.0 (Fedora; Linux i686; rv:123.0) Gecko/20100101 Firefox/123.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOVZaWlNmcURDNUFjdHNTTDg0ZnhQWWdJNjJBQWJOMGFySDlLRTRwOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vd3d3LnRpdGFuaXVtYXV0b21vdGl2ZS5jb20uYXUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742450730),
('mcSI1ea6zd9QfRcsXw9PzvaZ9d9vB9I5e1uemIhk', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVjZJNFJ6QnZmVDlYN3hudEhVYVk3TngyRktZMTlzMXh6b29sRWZ1aiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1742466444),
('OM1ahQEJl3QTI2xSvnxbqwum6wv2tAB9eHrSIPyj', NULL, '8.41.221.48', 'Mozilla/5.0 Firefox/33.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYlJnNFpkeks2djRENnpRR3pLMzVLZDFmN2JmdFpabGthOWFLRnNkMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vdGl0YW5pdW1hdXRvbW90aXZlLmNvbS5hdSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742431429),
('qJRC2dja9xRiPyRx4c5S0u95kbcmZp4MSXhPwmOy', NULL, '68.183.208.205', 'Mozilla/5.0 (compatible)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaG5tbVRpTjFYRTRwNmZYM0Jpd3I3UGJ2YkRIZ2lSNjhwOFlIZHhwdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vd3d3LnRpdGFuaXVtYXV0b21vdGl2ZS5jb20uYXUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742394236),
('r4YaBb2N0LIujjiJrb9riJin0xJ6Nswd6Mz893qQ', 1, '1.22.125.207', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQ2VTTkY4dDVPTXpBaWZqR2Z0WFdOSWpwSUdpTkh5MkJjVFVGY0s1ayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTk6Imh0dHBzOi8vdGl0YW5pdW1hdXRvbW90aXZlLmNvbS5hdS9hZG1pbi9hc3NpZ24vdmVoaWNsZS9vbmdvaW5nP2NhdGVnb3J5X2lkPSZwYWdlPSZwZXJfcGFnZT0mc2VhcmNoPSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIkNzRXSmtpa3dPaktXLzBsREsuSWdydVROQzk0WkRVdkNaZ0U3bG1YWXJzUGE0cEE0QlhpRjIiO30=', 1742441427),
('rheY5ezOGH6Cwu4aH0L6a4nDkbCyOuHB46OKsN77', NULL, '82.197.81.100', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiTERoS1RQRWFZeXlUQzh1d1lJbXVyMFVpT2RoeFp1RUw1MENtQVVEdiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742447615),
('TglVMZeN1uB4LJFngzWvtsGKIDsxbJHTNkKQvkvq', NULL, '49.185.52.233', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_4_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/134.0.6998.33 Mobile/15E148 Safari/604.1', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiTzQ0akN0NkRaZHh5Vm9rZEdhejI2TmdZNG0xV2VMV0hURDg2OEkxQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742426184),
('uBgnguIz899vdsDE5zieqQTvdp3dCpgLENgM90ih', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQmkxSGRtQXZGb3pYb0ZYTDNrbzhkSzVBb1NxWFFlOWJFRzQweVltcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1742466461);

-- --------------------------------------------------------

--
-- Table structure for table `time_slots`
--

CREATE TABLE `time_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time_slot` varchar(255) NOT NULL,
  `days` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `abn` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `licence_no` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `suburb` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postalcode` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `abn`, `dob`, `licence_no`, `contact`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `address`, `suburb`, `state`, `postalcode`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, NULL, NULL, NULL, 'info@titaniumautomotive.com.au', NULL, '$2y$12$74WJkikwOjKW/0lDK.IgruTNC94ZDUvCZgE7lmXYrsPa4pA4BXiF2', NULL, NULL, NULL, 'nlHZmzFvQlvKOLl0fUODp4xwQ3yrhAYi0hZH1E0I6OMpXMRQbYUfDH8Tovjx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-29 18:53:56', '2025-02-04 10:53:52'),
(10, 'Storm Solution', NULL, NULL, NULL, NULL, 'it@stormsolutions.com.au', NULL, '$2y$12$1sQDKB4KKunQg2wsOEo1aeL4U5h2uiEEtFrZv0fUxYevjEl6SVz.6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-10 13:30:47', '2025-02-10 13:30:47'),
(13, 'AMAN THEBA', '62 626 607 145', '2002-04-27', '055884919', '0420627860', 'aatheba4@gmail.com', NULL, '$2y$12$FaIa.LUIYiGAsUlP4Yw/EONc1maSmlXa9jEH83e8rCzmqNdd1.N9S', NULL, NULL, NULL, NULL, NULL, NULL, '47 Keon Parade', NULL, NULL, NULL, NULL, '2025-02-12 12:41:49', '2025-02-12 12:41:49'),
(14, 'Zain Ul Abideen', '62 626 607 145', '1998-01-12', '041475020', '0436107802', 'syedzs12421@gmail.com', NULL, '$2y$12$Gl2ZUq7VxBW7EkBdb4oSlO2XhbKajX4tzi6OANYOzrMCLTQpfymkG', NULL, NULL, NULL, NULL, NULL, NULL, '1775 Dandenong Road Oakleigh East', NULL, NULL, NULL, NULL, '2025-02-14 09:02:37', '2025-02-14 09:02:37'),
(15, 'Phani Raj Asile', '62 626 607 145', '1992-11-10', '035454019', '0451127372', 'phanisandy@gmail.com', NULL, '$2y$12$VWDXxp5gRLx5rK8xk6umtucDbY4dbZpPGuQlMNklmGKEuFkJp.P8y', NULL, NULL, NULL, NULL, NULL, NULL, '148 Hilma street sunshine west 3020', NULL, NULL, NULL, NULL, '2025-02-14 12:29:12', '2025-02-14 12:29:12'),
(23, 'Hdjd', '62 626 607 145', '1986-02-22', '5377383', '0454564', 'kalyan.varma1812@gmail.com', NULL, '$2y$12$XU5Vm.L9PIoezYNB8JjeM.5GpvoYw4ezkknw1UWqgym8quOkj0YL2', NULL, NULL, NULL, NULL, NULL, NULL, 'Haiais', NULL, NULL, NULL, NULL, '2025-02-22 16:25:27', '2025-02-22 16:25:27'),
(24, 'Sahil', '62 626 607 145', '2000-10-20', 'Gp6260', '0413978756', 'sahil200048@gmail.com', NULL, '$2y$12$17Bk1as9D15ZJo8xk8KV8.BjvAlh111AB1AXy.vghcfM9Appm9aVu', NULL, NULL, NULL, NULL, NULL, NULL, '25 pomegranate drive beveridge', NULL, NULL, NULL, NULL, '2025-02-23 17:46:47', '2025-02-23 17:46:47'),
(25, 'Manoj kumar reddy Sampathi', '62 626 607 145', '1995-03-23', '041050179', '0433875950', 'smkr23031995@gmail.com', NULL, '$2y$12$Q4cK7t5CrK8HHrcya7QTG.PaTMrRxNYN3yLgaXGivUQwcXGuLtLzi', NULL, NULL, NULL, NULL, NULL, NULL, '51 kallay street, Clayton south', NULL, NULL, NULL, NULL, '2025-02-24 14:37:22', '2025-02-24 14:37:22'),
(26, 'abc', '62 626 607 145', '1990-11-22', '3863729273', '54213484', 'mitesh.sudan2001@gmail.com', NULL, '$2y$12$nyPhi.vQIGxDUlJUIF/YkuBe14YNs2XpzdTfQe6aORSfGS6H6Fky.', NULL, NULL, NULL, NULL, NULL, NULL, '7 fhdksn st', NULL, NULL, NULL, NULL, '2025-02-24 16:59:28', '2025-02-24 16:59:28'),
(27, 'Sikander Baig Moghal', '62 626 607 145', NULL, NULL, '0402511676', 'Moghalsikanderbaig96@gmail.com', NULL, '$2y$12$rTDsHH0GWH0oOe7LBe7zAeZOXjSIxspeLPB/5KhqP7sp9fE.INwey', NULL, NULL, NULL, NULL, NULL, NULL, '2/19 hemmings st', NULL, NULL, NULL, NULL, '2025-02-25 12:35:40', '2025-02-25 12:35:40'),
(29, 'Manpreet Singh', '62 626 607 145', '1994-02-10', '036658906', '0451181544', 'manpreetghuman447@gmail.com', NULL, '$2y$12$2uWXKf7jS19kHYzEtJSIMuiTDpw5C6U2N3IthVAUicZQOVQM0ghGW', NULL, NULL, NULL, NULL, NULL, NULL, '13 berrima close Craigieburn', NULL, NULL, NULL, NULL, '2025-02-25 13:02:23', '2025-02-25 13:02:23'),
(30, 'NithinnReddy Ippagunta', '52 652 574 528', '1999-05-11', '0 5 2 4 6 1 0 3 0', '434430538', 'ippaguntanithin99@gmail.com', NULL, '$2y$12$lGcoypgYPdVBga1ONv8/dupJLSjz4xNcuCipbRz/pML/UyJeQf/Ji', NULL, NULL, NULL, NULL, NULL, NULL, '3/39 Alice street Clayton', NULL, NULL, NULL, NULL, '2025-02-26 18:37:22', '2025-02-26 18:37:22'),
(31, 'Saran Anandan', '62 626 607 145', '1989-04-27', '057022832', '0489205205', 'saran1027@gmail.com', NULL, '$2y$12$wWQzje3VcKS2imBbjTsGteUC12ismN3uJe2Ga4VoX2qqugAMj25wa', NULL, NULL, NULL, NULL, NULL, NULL, '129 wattletree street', NULL, NULL, NULL, NULL, '2025-02-27 12:39:46', '2025-02-27 12:39:46'),
(32, 'harpreet Singh', '52 652 574 528', '1997-08-03', NULL, '0477194260', 'singh.harp420@gmail.com', NULL, '$2y$12$Fl4oNuTN049798hXWj3n1eVgONWIqN4a1g9nXsEHj42WEM4Rj3ysy', NULL, NULL, NULL, NULL, NULL, NULL, '32 Hawkesbury St', NULL, NULL, NULL, NULL, '2025-03-02 12:33:51', '2025-03-02 12:33:51'),
(33, 'Prabhjot kaur', NULL, '2003-10-15', 'No', '0449917484', 'prabkharoud12@gmail.com', NULL, '$2y$12$bJzVwNqL1P2Tm6uo80DBYOiPAyfd9N7aTFUpGIQWyfWN6EdCn7syy', NULL, NULL, NULL, NULL, NULL, NULL, '3 elberta rd tarneit', NULL, NULL, NULL, NULL, '2025-03-09 11:27:47', '2025-03-09 11:27:47'),
(35, 'Navjot Singh', '62 626 607 145', '1996-08-16', '040667101', '0490491721', 'navilubana0008@gmail.com', NULL, '$2y$12$Geyb4QmhLNESuELuDrgOXOhuw6/IfqJVZNHeXvZkbTt43sAPN7C.a', NULL, NULL, NULL, NULL, NULL, NULL, '36 Gemma Street Cranbourne East Vic 3977', NULL, NULL, NULL, NULL, '2025-03-10 21:04:05', '2025-03-10 21:04:05'),
(36, 'Nirav m Suhagiya', '62 626 607 145', '1989-08-11', '042745113', '0469003171', 'niravsuhagiya55@gmail.com', NULL, '$2y$12$rs0dkCynEzI.Pqgr32YA5Ox8U.2ApzafMBdTaYEjbMYduWdVOayTO', NULL, NULL, NULL, NULL, NULL, NULL, '27 frontier cct Tarneit vic 3029', NULL, NULL, NULL, NULL, '2025-03-12 14:18:34', '2025-03-12 14:18:34'),
(37, 'fshgfdsh', '52 652 574 528', '1992-01-03', '2354354', '353252', 'kalyan.varma1812@y7mail.com', NULL, '$2y$12$HOBOa146Fv.aCWjFK9W06eqfrFSkQHko1kDKXa7c3TDbLmteCNrHi', NULL, NULL, NULL, NULL, NULL, NULL, 'fsdgdsfh', NULL, NULL, NULL, NULL, '2025-03-12 18:47:31', '2025-03-12 18:47:31'),
(38, 'sasikiran p', '0123', '2002-01-02', '4565464464', '9493851281', 'penubakusasikiran@gmail.com', NULL, '$2y$12$g/wi.EtKGazHm0Pa7rTj0.Aj8FLLzjPCmjUiAmTZ6t5AJoaPnyKWq', NULL, NULL, NULL, NULL, NULL, NULL, 'nk towers, silicon valley, arunodaya colony', NULL, NULL, NULL, NULL, '2025-03-12 20:14:50', '2025-03-12 20:23:36'),
(40, 'Harkomal Singh Otal', '64413319665', '1994-09-21', '024091998', '0452500980', 'harkomalotal@gmail.com', NULL, '$2y$12$lEyh3xX6BCrjeXudphvg5ewLG8xAeUMh4aU/Ip8Uq5EPHN1DBw3Km', NULL, NULL, NULL, NULL, NULL, NULL, '97 Hemingway drive Rockbank 3335', NULL, NULL, NULL, NULL, '2025-03-13 20:25:38', '2025-03-13 20:25:38'),
(41, 'Sourav Singh', NULL, '1994-06-08', '006113890', '0451726801', '786sauravsingh@gmail.com', NULL, '$2y$12$v2mwzJhVIn6Kb9JRhwHFUOUJznpZMAwU0SBXq5SW09xcVgsA.U7I.', NULL, NULL, NULL, NULL, NULL, NULL, '23 verbier road, Pakenham', NULL, NULL, NULL, NULL, '2025-03-14 10:13:02', '2025-03-14 10:13:02'),
(42, 'faizan mansuri', NULL, NULL, NULL, '0422734315', 'mansurifaizan237@gmail.com', NULL, '$2y$12$ViYFXfl0nB9mpO2LIRc7Ou/SZQutLfCn3t3JTbBuScPKMaYi7lw.O', NULL, NULL, NULL, NULL, NULL, NULL, '47 keon pde', NULL, NULL, NULL, NULL, '2025-03-19 18:50:22', '2025-03-19 18:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_vehicle_tokens`
--

CREATE TABLE `user_vehicle_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rent_start_date` date DEFAULT NULL,
  `rent_end_date` date DEFAULT NULL,
  `cost_per_week` decimal(8,2) DEFAULT NULL,
  `odometer` int(11) DEFAULT NULL,
  `total_days` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `deposit_amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_vehicle_tokens`
--

INSERT INTO `user_vehicle_tokens` (`id`, `user_id`, `vehicle_id`, `token`, `expires_at`, `rent_start_date`, `rent_end_date`, `cost_per_week`, `odometer`, `total_days`, `total_price`, `deposit_amount`, `created_at`, `updated_at`) VALUES
(1, NULL, 70, '5edacc147290183beb149470336fc844', '2025-02-10 10:41:33', '2025-02-23', '2025-07-23', 300.00, 500, 150, 6429.00, 500.00, '2025-02-10 10:39:33', '2025-02-10 10:39:33'),
(5, NULL, 70, '388ce1d4f400169394095b4ac3fd582f', '2025-02-10 11:31:30', '2025-02-16', '2025-02-23', 300.00, 24325, 7, 300.00, 23.00, '2025-02-10 11:01:30', '2025-02-10 11:01:30'),
(6, NULL, 70, '43c05c4cb6703ac7e6323fa05ada509e', '2025-02-10 11:36:07', '2025-02-15', '2025-03-22', 300.00, 600, 35, 1500.00, 500.00, '2025-02-10 11:06:07', '2025-02-10 11:06:07'),
(9, NULL, 66, 'abf681eb1c13714c5b64ff711ec746cb', '2025-02-10 15:58:26', '2025-02-12', '2025-03-05', 300.00, 20500, 21, 900.00, 200.00, '2025-02-10 15:28:26', '2025-02-10 15:28:26'),
(11, NULL, 24, 'a8e7497849b61546d49a74856c374480', '2025-02-12 12:38:53', '2025-02-12', '2026-02-12', 300.00, 169585, 365, 15643.00, 0.00, '2025-02-12 12:23:53', '2025-02-12 12:23:53'),
(12, NULL, 24, 'ce761dbc243a08f0d77270488badb7f2', '2025-02-12 12:42:28', '2025-02-12', '2026-02-12', 300.00, 169564, 365, 15643.00, 0.00, '2025-02-12 12:27:28', '2025-02-12 12:27:28'),
(13, NULL, 28, '49c042e369f6ffdde021895cb079361d', '2025-02-14 09:15:04', '2025-02-14', '2025-02-21', 300.00, 165432, 7, 300.00, 300.00, '2025-02-14 09:00:04', '2025-02-14 09:00:04'),
(15, NULL, 68, '01dbf38282a5ede4bf871fcbd3bc6713', '2025-02-14 12:41:00', '2025-02-14', '2025-06-14', 300.00, 169543, 120, 5143.00, 270.00, '2025-02-14 12:26:00', '2025-02-14 12:26:00'),
(18, NULL, 13, '01738349ca023fe1d0d1595400becc57', '2025-02-22 08:07:14', '2025-02-21', '2026-02-21', 290.00, 182543, 365, 15121.00, 290.00, '2025-02-21 08:07:14', '2025-02-21 08:07:14'),
(19, NULL, 71, '57bd728b233f9d7e9fc3598f6ab31552', '2025-02-21 04:19:37', '2025-03-01', '2025-03-22', 600.00, 300, 21, 1800.00, 300.00, '2025-02-21 09:49:37', '2025-02-21 09:49:37'),
(20, NULL, 13, '2cc8da2cf8280f31fe2258a0b49e3b63', '2025-02-21 21:04:40', '2025-02-22', '2026-02-22', 290.00, 182564, 365, 15121.00, 290.00, '2025-02-22 08:04:40', '2025-02-22 08:04:40'),
(21, NULL, 1, 'b7595ed1dd9b4217f0763d473835add6', '2025-02-21 21:16:35', '2025-02-22', '2025-03-01', 300.00, 455, 7, 300.00, 1.00, '2025-02-22 08:16:35', '2025-02-22 08:16:35'),
(28, NULL, 2, 'cd089cbb25f0492a94b02a71eb87d00f', '2025-02-22 05:37:27', '2025-02-23', '2025-03-16', 300.00, 300, 21, 900.00, 300.00, '2025-02-22 16:37:27', '2025-02-22 16:37:27'),
(29, NULL, 1, 'bfbfd2d408de6ac86ece2e4e56c0b8ea', '2025-02-22 05:49:58', '2025-02-23', '2025-03-16', 300.00, 300, 21, 900.00, 300.00, '2025-02-22 16:49:58', '2025-02-22 16:49:58'),
(30, NULL, 1, '62600c19d311b5a537672522ff4d66e9', '2025-02-22 05:50:50', '2025-02-23', '2025-03-16', 300.00, 300, 21, 900.00, 300.00, '2025-02-22 16:50:50', '2025-02-22 16:50:50'),
(31, NULL, 2, '9690cf1065a47c511851e987f8fe2582', '2025-02-22 05:51:52', '2025-02-23', '2025-03-16', 300.00, 300, 21, 900.00, 300.00, '2025-02-22 16:51:52', '2025-02-22 16:51:52'),
(32, NULL, 71, 'c7f76f461a8ef3c15912d19b341ff5d7', '2025-02-22 05:53:18', '2025-02-23', '2025-03-16', 300.00, 300, 21, 900.00, 300.00, '2025-02-22 16:53:18', '2025-02-22 16:53:18'),
(41, 26, 3, '6b53c99dd6090d8ec15dea59e86f6480', '2025-02-24 09:47:34', '2025-02-24', '2025-03-10', 1.00, 342134, 14, 600.00, 1.00, '2025-02-24 20:47:34', '2025-02-24 20:47:34'),
(44, NULL, 31, '33bb3340993c6edd42726c34d0fdc1b8', '2025-02-25 08:36:13', '2025-02-25', '2026-02-25', 300.00, 169453, 365, 15643.00, 0.00, '2025-02-25 19:36:13', '2025-02-25 19:36:13'),
(47, NULL, 27, '3bee621bfe23ed07e81118f4efc101dd', '2025-02-27 06:04:42', '2025-02-27', '2026-02-27', 300.00, 215342, 365, 15643.00, 300.00, '2025-02-27 17:04:42', '2025-02-27 17:04:42'),
(49, NULL, 46, '727ab4ac7993a079806185cb3c992ffe', '2025-03-06 10:41:35', '2025-03-06', '2026-03-06', 215.00, 182903, 365, 11211.00, 300.00, '2025-03-06 21:41:35', '2025-03-06 21:41:35'),
(50, NULL, 118, '2f472e6c6b058d1d37f50f596ae0fd17', '2025-03-07 05:59:36', '2025-03-07', '2026-03-07', 320.00, 6, 365, 16686.00, 320.00, '2025-03-07 16:59:36', '2025-03-07 16:59:36'),
(51, NULL, 118, 'c96b6da03b9f4587b1ad8bff16c06b5e', '2025-03-07 06:12:24', '2025-03-07', '2025-06-07', 320.00, 7, 92, 4206.00, 0.00, '2025-03-07 17:12:24', '2025-03-07 17:12:24'),
(52, NULL, 1, '69ea9813cfe1356e6acf0de3707889cc', '2025-03-07 07:47:45', '2025-03-08', '2025-03-29', 300.00, 14325, 21, 900.00, 1234.00, '2025-03-07 18:47:45', '2025-03-07 18:47:45'),
(53, NULL, 1, '1367ed743f34a5a17716017933ee13bf', '2025-03-07 08:05:41', '2025-03-07', '2025-03-21', 300.00, 123455, 14, 600.00, 123.00, '2025-03-07 19:05:41', '2025-03-07 19:05:41'),
(54, NULL, 4, '0e5c51c78f0584342ee1a686c8bd2b4c', '2025-03-07 08:07:30', '2025-03-08', '2025-03-15', 300.00, 56436, 7, 300.00, 1234.00, '2025-03-07 19:07:30', '2025-03-07 19:07:30'),
(55, NULL, 1, 'ee8684614cca2a2b54a87c60f1d7202e', '2025-03-07 08:24:53', '2025-03-08', '2025-03-15', 300.00, 53658, 7, 300.00, 524.00, '2025-03-07 19:24:53', '2025-03-07 19:24:53'),
(56, NULL, 1, '0bfbd63ba5af5eaa9b992bdb193009c3', '2025-03-07 08:30:45', '2025-03-15', '2025-04-05', 300.00, 200, 21, 900.00, 200.00, '2025-03-07 19:30:45', '2025-03-07 19:30:45'),
(57, NULL, 1, 'a01020b919f09431de08baac6b4c2188', '2025-03-07 09:20:12', '2025-03-15', '2025-04-05', 300.00, 300, 21, 900.00, 300.00, '2025-03-07 20:20:12', '2025-03-07 20:20:12'),
(58, NULL, 1, 'ddea48fa8a9eb19ab2cad166caf6166b', '2025-03-07 09:31:32', '2025-03-08', '2025-03-15', 300.00, 34567, 7, 300.00, 1234.00, '2025-03-07 20:31:32', '2025-03-07 20:31:32'),
(59, NULL, 1, '9360ace62ae82ac56bfcdba6be7fe208', '2025-03-07 09:31:59', '2025-03-22', '2025-04-12', 300.00, 300, 21, 900.00, 300.00, '2025-03-07 20:31:59', '2025-03-07 20:31:59'),
(60, NULL, 1, '17d4b310c272026ddc9512c91ce0e077', '2025-03-07 09:43:26', '2025-03-09', '2025-03-16', 300.00, 258147, 7, 300.00, 2535.00, '2025-03-07 20:43:26', '2025-03-07 20:43:26'),
(61, NULL, 1, '2cda53ec894480064aba38878ee00e83', '2025-03-07 09:47:56', '2025-03-19', '2025-03-26', 300.00, 45667, 7, 300.00, 123.00, '2025-03-07 20:47:56', '2025-03-07 20:47:56'),
(62, NULL, 4, '59f539999094d84f0e7a475601b8e68a', '2025-03-07 09:52:21', '2025-04-05', '2025-04-12', 300.00, 5285, 7, 300.00, 200.00, '2025-03-07 20:52:21', '2025-03-07 20:52:21'),
(63, NULL, 1, '572a3ad5c3bbfda7054686f1321ddfcb', '2025-03-07 09:58:49', '2025-03-08', '2025-03-29', 300.00, 300, 21, 900.00, 300.00, '2025-03-07 20:58:49', '2025-03-07 20:58:49'),
(64, NULL, 1, 'c08f95c99745407341dc0a61da17fe09', '2025-03-07 10:00:09', '2025-03-08', '2025-03-29', 300.00, 300, 21, 900.00, 300.00, '2025-03-07 21:00:09', '2025-03-07 21:00:09'),
(65, NULL, 1, 'efdcbeddbe24216190ac0df02fd12416', '2025-03-07 10:02:59', '2025-03-08', '2025-03-29', 300.00, 300, 21, 900.00, 300.00, '2025-03-07 21:02:59', '2025-03-07 21:02:59'),
(66, NULL, 5, '5241f0911914aae6dcba57c9f610a5bc', '2025-03-07 10:03:28', '2025-03-08', '2025-03-15', 300.00, 23456, 7, 300.00, 120.00, '2025-03-07 21:03:28', '2025-03-07 21:03:28'),
(67, NULL, 1, '34804aafd6471cff9d54340e0343d21c', '2025-03-07 10:09:06', '2025-03-08', '2025-03-29', 300.00, 300, 21, 900.00, 300.00, '2025-03-07 21:09:06', '2025-03-07 21:09:06'),
(68, NULL, 1, 'fb1ebde0b50d00e0ca063b43eb2b25e4', '2025-03-07 10:11:14', '2025-03-08', '2025-03-29', 300.00, 300, 21, 900.00, 3300.00, '2025-03-07 21:11:14', '2025-03-07 21:11:14'),
(69, NULL, 1, '1b2253fa49962c1dd5a47b6155ef63c8', '2025-03-07 10:14:05', '2025-03-08', '2025-03-15', 300.00, 253689, 7, 300.00, 258.00, '2025-03-07 21:14:05', '2025-03-07 21:14:05'),
(70, NULL, 4, 'cb68fd7aa850c6bd8a5351cbca9b7cfa', '2025-03-07 10:44:02', '2025-04-06', '2025-05-06', 300.00, 23456, 30, 1286.00, 150.00, '2025-03-07 21:44:02', '2025-03-07 21:44:02'),
(71, NULL, 1, '067938091550b9a8a9ba4569969e0b2b', '2025-03-07 10:45:40', '2025-03-15', '2025-04-05', 300.00, 300, 21, 900.00, 300.00, '2025-03-07 21:45:40', '2025-03-07 21:45:40'),
(72, NULL, 1, '085c6bf612f5fb32ee4fab38dcc54feb', '2025-03-07 10:47:51', '2025-03-22', '2025-04-12', 300.00, 300, 21, 900.00, 300.00, '2025-03-07 21:47:51', '2025-03-07 21:47:51'),
(73, NULL, 1, 'ab05119e7ed3666065eba5a81025c57a', '2025-03-07 10:48:12', '2025-03-15', '2025-03-29', 300.00, 300, 14, 600.00, 300.00, '2025-03-07 21:48:12', '2025-03-07 21:48:12'),
(74, NULL, 1, 'ae8d71d41938fe8bea973515635925ee', '2025-03-07 10:49:11', '2025-03-29', '2025-04-19', 300.00, 300, 21, 900.00, 300.00, '2025-03-07 21:49:11', '2025-03-07 21:49:11'),
(75, NULL, 1, '5ba3ab915e00728df51cd3c6445e316a', '2025-03-07 10:49:36', '2025-03-22', '2025-06-22', 300.00, 300, 92, 3943.00, 300.00, '2025-03-07 21:49:36', '2025-03-07 21:49:36'),
(76, NULL, 9, 'bdf450d3219ad12fe0cee2733a6a5de4', '2025-03-07 10:56:05', '2025-03-14', '2025-03-21', 300.00, 123456, 7, 300.00, 150.00, '2025-03-07 21:56:05', '2025-03-07 21:56:05'),
(77, NULL, 10, '5901d8152cf0aba4802509dc8912f2a7', '2025-03-07 11:37:34', '2025-03-28', '2025-04-04', 300.00, 17373, 7, 300.00, 150.00, '2025-03-07 22:37:34', '2025-03-07 22:37:34'),
(78, NULL, 1, 'cffc46a74b6ae4c46db52175987357db', '2025-03-07 19:20:56', '2025-03-15', '2025-03-22', 300.00, 1234, 7, 300.00, 150.00, '2025-03-08 06:20:56', '2025-03-08 06:20:56'),
(79, NULL, 4, 'cbd6ce5c248ead5a25738fcef4cf38bb', '2025-03-07 19:46:07', '2025-03-25', '2025-04-01', 300.00, 16745, 7, 300.00, 150.00, '2025-03-08 06:46:07', '2025-03-08 06:46:07'),
(80, NULL, 6, 'ddfddf61cca9c8cc5d86dd6a20041966', '2025-03-08 20:05:01', '2025-03-14', '2025-03-21', 300.00, 236524, 7, 300.00, 254.00, '2025-03-09 07:05:01', '2025-03-09 07:05:01'),
(82, NULL, 4, '26897e68d1b4897a4574d2b3b4a1eed3', '2025-03-08 20:29:36', '2025-04-01', '2025-05-01', 300.00, 425487, 30, 1286.00, 78542.00, '2025-03-09 07:29:36', '2025-03-09 07:29:36'),
(83, NULL, 1, '05257afaf5e77ea56ed85188282fa4b3', '2025-03-08 21:27:22', '2025-03-13', '2025-03-20', 300.00, 52737, 7, 300.00, 2636.00, '2025-03-09 08:27:22', '2025-03-09 08:27:22'),
(84, NULL, 7, '69ccae15165c0ffa523fa82064bd74a7', '2025-03-08 21:32:59', '2025-03-09', '2025-03-16', 300.00, 64532, 7, 300.00, 5343.00, '2025-03-09 08:32:59', '2025-03-09 08:32:59'),
(85, NULL, 9, '19f954d8d1f4d5962d640543385fa4b0', '2025-03-08 21:53:34', '2025-03-11', '2025-03-25', 300.00, 24582, 14, 600.00, 258.00, '2025-03-09 08:53:34', '2025-03-09 08:53:34'),
(88, NULL, 121, 'e35d7401dd1551e66c69cf71828b6acd', '2025-03-12 03:09:00', '2025-03-07', '2025-06-07', 320.00, 6, 92, 4206.00, 0.00, '2025-03-12 14:09:00', '2025-03-12 14:09:00'),
(90, NULL, 19, 'a69d5dc8e222068362975e876c21cc57', '2025-03-12 03:19:39', '2025-03-07', '2026-03-07', 250.00, 179453, 365, 13036.00, 0.00, '2025-03-12 14:19:39', '2025-03-12 14:19:39'),
(93, NULL, 117, 'c2232593df97df484a16f4d10bbbf586', '2025-03-12 04:42:27', '2025-03-09', '2025-09-09', 165.00, 135432, 184, 4337.00, 0.00, '2025-03-12 15:42:27', '2025-03-12 15:42:27'),
(96, NULL, 2, 'b9d041b80ba01ea78509a225d3cb779e', '2025-03-12 08:07:59', '2025-03-15', '2025-04-19', 300.00, 300, 35, 1500.00, 300.00, '2025-03-12 19:07:59', '2025-03-12 19:07:59');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_accidents`
--

CREATE TABLE `vehicle_accidents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `accident_date` date NOT NULL,
  `insurance_ref` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_accident_files`
--

CREATE TABLE `vehicle_accident_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_accident_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_details`
--

CREATE TABLE `vehicle_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `abn` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `fuel_type` varchar(255) DEFAULT NULL,
  `make` varchar(255) DEFAULT NULL,
  `vin` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `battery_size` varchar(255) DEFAULT NULL,
  `engine_no` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `odometer` int(11) DEFAULT NULL,
  `transmission` varchar(255) DEFAULT NULL,
  `reg_expiry_date` date DEFAULT NULL,
  `last_service_date` date DEFAULT NULL,
  `rented` tinyint(1) NOT NULL DEFAULT 0,
  `insurance_company` varchar(255) DEFAULT NULL,
  `insurance_number` varchar(255) DEFAULT NULL,
  `vehicle_inspection_report_expiring_date` date DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `thumbnail_alt` varchar(255) DEFAULT NULL,
  `cost_per_week` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_details`
--

INSERT INTO `vehicle_details` (`id`, `category_id`, `company_name`, `abn`, `slug`, `reg_no`, `purchase_date`, `fuel_type`, `make`, `vin`, `model`, `battery_size`, `engine_no`, `owner`, `color`, `type`, `odometer`, `transmission`, `reg_expiry_date`, `last_service_date`, `rented`, `insurance_company`, `insurance_number`, `vehicle_inspection_report_expiring_date`, `thumbnail`, `thumbnail_alt`, `cost_per_week`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-yaris-1nz9me', '1NZ9ME', '2013-01-01', 'petrol', 'Toyota', 'JTDJW3D330D536037', 'Yaris', NULL, NULL, NULL, 'WHITE', NULL, 334325, 'Automatic', NULL, NULL, 1, 'Ride secure Malhi', NULL, NULL, '1739765862_yaris white.jpg', 'Toyota Yaris', '300', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '2025-02-04 11:02:50', '2025-03-14 07:02:32'),
(2, 1, 'EMM Kay Group', '52 652 574 528', 'emm-kay-group-cars-suzuki-swift-1rt7ps', '1RT7PS', '2016-01-01', 'petrol', 'Suzuki', 'JSAFZC82S00332109', 'Swift', NULL, NULL, NULL, 'SILVER', NULL, 500, 'Automatic', NULL, NULL, 0, 'PRIME', NULL, NULL, '1739765922_swift-silver.jpg', 'Suzuki Swift', '300', NULL, '2025-02-04 11:07:06', '2025-03-14 07:02:32'),
(3, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1rc2nr', '1RC2NR', '2017-01-01', 'petrol', 'Toyota', '6T1BD3FK50X156159', 'Camry', NULL, NULL, NULL, 'GREY', NULL, 300, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739766102_camry-grey.jpg', 'Camry Grey', '300', NULL, '2025-02-05 15:18:54', '2025-03-14 07:02:32'),
(4, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1rc2oi', '1RC2OI', '2017-01-01', 'petrol', 'Toyota', '6T1BD3FK40X156783', 'Camry', NULL, NULL, NULL, 'BLUE', NULL, 500, 'Automatic', NULL, NULL, 1, 'Ride secure Malhi', NULL, NULL, '1739766196_camry-blue.jpg', 'toyota-camry-blue', '300', NULL, '2025-02-05 15:46:27', '2025-03-14 07:02:32'),
(5, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1th1xj', '1TH1XJ', '2020-01-01', 'petrol', 'Toyota', 'JTNB23HKX03077219', 'Camry', NULL, NULL, NULL, 'white', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739766253_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 15:50:03', '2025-03-14 07:02:32'),
(6, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1th5ww', '1TH5WW', '2020-01-01', 'petrol', 'Toyota', 'JTNB23HK103071857', 'Camry', NULL, NULL, NULL, 'Red', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739766338_camry-red.jpg', 'camry-red', '300', NULL, '2025-02-05 15:54:20', '2025-03-14 07:02:32'),
(7, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1tt1dn', '1TT1DN', '2021-01-01', 'petrol', 'Toyota', 'JTNBA3HK903006208', 'Camry', NULL, NULL, NULL, 'white', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739766363_camry-white.jpg', 'camry-white', '300', NULL, '2025-02-05 15:57:05', '2025-03-14 07:02:32'),
(8, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1tt1do', '1TT1DO', '2021-01-01', 'petrol', 'Toyota', 'JTNBA3HK103006509', 'Camry', NULL, NULL, NULL, 'white', NULL, 216543, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739766381_camry-white.jpg', 'camry-white', '300', NULL, '2025-02-05 15:59:31', '2025-03-19 18:50:22'),
(9, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1tt1dp', '1TT1DP', '2021-01-01', 'petrol', 'Toyota', 'JTNBA3HK503005105', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'PRIME', NULL, NULL, '1739766395_camry-white.jpg', 'camry-white', '300', NULL, '2025-02-05 16:02:26', '2025-03-14 07:02:32'),
(10, 1, 'EMM Kay Group', '52 652 574 528', 'emm-kay-group-cars-toyota-camry-1ul8ui', '1UL8UI', '2021-01-01', 'petrol', 'Toyota', 'JTNBA3HK103008115', 'Camry', NULL, NULL, NULL, 'white', NULL, NULL, 'Automatic', NULL, NULL, 0, 'PRIME', NULL, NULL, '1739766410_camry-white.jpg', 'camry-white', '300', NULL, '2025-02-05 16:14:19', '2025-03-14 07:02:32'),
(11, 1, 'EMM Kay Group', '52 652 574 528', 'emm-kay-group-cars-toyota-camry-1ul8uj', '1UL8UJ', '2021-01-01', 'petrol', 'Toyota', 'JTNBA3HK603008076', 'Camry', NULL, NULL, NULL, 'white', NULL, NULL, 'Automatic', NULL, NULL, 0, 'PRIME', NULL, NULL, '1739766472_camry-white.jpg', 'camry-white', '300', NULL, '2025-02-05 16:16:40', '2025-03-14 07:02:32'),
(12, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1uu5cb', '1UU5CB', '2021-01-01', 'petrol', 'Toyota', 'JTNBA3HK003012446', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739769992_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 16:20:41', '2025-03-14 07:02:32'),
(13, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1uu5cd', '1UU5CD', '2021-01-01', 'petrol', 'Toyota', 'JTNBA3HK903012767', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739770010_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 16:24:04', '2025-03-14 07:02:32'),
(14, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1uu5ce', '1UU5CE', '2021-01-01', 'petrol', 'Toyota', 'JTNBA3HK903012705', 'Camry', NULL, NULL, NULL, 'Silver', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739770054_camry-silver.jpg', 'toyota-camry-silver', '300', NULL, '2025-02-05 16:53:46', '2025-03-14 07:02:32'),
(15, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1uu5cf', '1UU5CF', '2021-01-01', 'petrol', 'Toyota', 'JTNBA3HK203012450', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739770078_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 16:56:04', '2025-03-14 07:02:32'),
(16, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1uu5cg', '1UU5CG', '2021-01-01', 'petrol', 'Toyota', 'JTNBA3HK403012448', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739770148_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 16:59:23', '2025-03-14 07:02:32'),
(17, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1vl5yy', '1VL5YY', '2022-01-01', 'petrol', 'Toyota', 'JTNBA3HK603017652', 'Camry', NULL, NULL, NULL, 'Silver', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739770221_camry-silver.jpg', 'toyota-camry-silver', '300', NULL, '2025-02-05 17:02:12', '2025-03-14 07:02:32'),
(18, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1vl5yz', '1VL5YZ', '2022-01-01', 'petrol', 'Toyota', 'JTNBA3HK203017650', 'Camry', NULL, NULL, NULL, 'Silver', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739770245_camry-silver.jpg', 'toyota-camry-silver', '300', NULL, '2025-02-05 17:04:48', '2025-03-14 07:02:32'),
(19, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1vn7pk', '1VN7PK', '2022-01-01', 'petrol', 'Toyota', 'JTNBA3HK403017648', 'Camry', NULL, NULL, NULL, 'Silver', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739770264_camry-silver.jpg', 'toyota-camry-silver', '300', NULL, '2025-02-05 17:07:12', '2025-03-14 07:02:32'),
(20, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1vn7pl', '1VN7PL', '2022-01-01', 'petrol', 'Toyota', 'JTNBA3HK103017994', 'Camry', NULL, NULL, NULL, 'Silver', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739770282_camry-silver.jpg', 'toyota-camry-silver', '300', NULL, '2025-02-05 17:11:36', '2025-03-14 07:02:32'),
(21, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1vn7pm', '1VN7PM', '2022-01-01', 'petrol', 'Toyota', 'JTNBA3HK803017930', 'Camry', NULL, NULL, NULL, 'Silver', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739770296_camry-silver.jpg', 'toyota-camry-silver', '300', NULL, '2025-02-05 17:14:21', '2025-03-14 07:02:32'),
(22, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1vs5dm', '1VS5DM', '2022-01-01', 'petrol', 'Toyota', 'JTNBA3HK703018695', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739770311_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 17:16:14', '2025-03-14 07:02:32'),
(23, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1vs5dn', '1VS5DN', '2022-01-01', 'petrol', 'Toyota', 'JTNBA3HK303018662', 'Camry', NULL, NULL, NULL, 'White', NULL, 274091, 'Automatic', NULL, NULL, 1, 'Ride secure Malhi', NULL, NULL, '1739770329_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 17:18:50', '2025-03-14 07:02:32'),
(24, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1vu4ep', '1VU4EP', '2022-01-01', 'petrol', 'Toyota', 'JTNBA3HK903018892', 'Camry', NULL, NULL, NULL, 'White', NULL, 169564, 'Automatic', NULL, NULL, 1, 'Ride secure Malhi', NULL, NULL, '1739770349_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 17:20:44', '2025-03-14 07:02:32'),
(25, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1wj4hs', '1WJ4HS', '2022-01-01', 'petrol', 'Toyota', 'JTNBA3HK003021776', 'Camry', NULL, NULL, NULL, 'White', NULL, 131564, 'Automatic', NULL, NULL, 1, 'CALIBRE', NULL, NULL, '1739770364_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 17:23:06', '2025-03-14 07:02:32'),
(26, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1wj4il', '1WJ4IL', '2022-01-01', 'petrol', 'Toyota', 'JTNBA3HK903021582', 'Camry', NULL, NULL, NULL, 'White', NULL, 177342, 'Automatic', NULL, NULL, 1, 'CALIBRE', NULL, NULL, '1739770381_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 17:24:58', '2025-03-14 07:02:32'),
(27, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1wj4ir', '1WJ4IR', '2022-01-01', 'petrol', 'Toyota', 'JTNBA3HK503021580', 'Camry', NULL, NULL, NULL, 'White', NULL, 172546, 'Automatic', NULL, NULL, 0, 'CALIBRE', NULL, NULL, '1739770399_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 17:28:04', '2025-03-14 10:13:02'),
(28, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1wj4jf', '1WJ4JF', '2022-01-01', 'petrol', 'Toyota', 'JTNBA3HK403021781', 'Camry', NULL, NULL, NULL, 'White', NULL, 295464, 'Automatic', NULL, NULL, 1, 'CALIBRE', NULL, NULL, '1739770414_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 17:29:46', '2025-03-14 07:02:32'),
(29, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1wl8fo', '1WL8FO', '2022-01-01', 'petrol', 'Toyota', 'JTNBA3HK503021790', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'CALIBRE', NULL, NULL, '1739769964_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 17:32:05', '2025-03-14 07:02:32'),
(30, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1xp1vd', '1XP1VD', '2023-01-01', 'petrol', 'Toyota', 'JTNBA3HK403025538', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'CALIBRE', NULL, NULL, '1739769942_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 17:35:45', '2025-03-14 07:02:32'),
(31, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1xp1vf', '1XP1VF', '2023-01-01', 'petrol', 'Toyota', 'JTNBA3HK203025652', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'CALIBRE', NULL, NULL, '1739769923_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 17:37:41', '2025-03-14 07:02:32'),
(32, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1xp1vg', '1XP1VG', '2023-01-01', 'petrol', 'Toyota', 'JTNBA3HKX03025446', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'CALIBRE', NULL, NULL, '1739769903_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 17:40:13', '2025-03-14 07:02:32'),
(33, 1, 'EMM Kay Group', '52 652 574 528', 'emm-kay-group-cars-toyota-camry-1xp1wz', '1XP1WZ', '2023-01-01', 'petrol', 'Toyota', 'JTNBA3HK803025655', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'PRIME', NULL, NULL, '1739769881_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 17:41:52', '2025-03-14 07:02:32'),
(34, 1, 'EMM Kay Group', '52 652 574 528', 'emm-kay-group-cars-toyota-camry-1xp1xc', '1XP1XC', '2023-01-01', 'petrol', 'Toyota', 'JTNBA3HK603025539', 'Camry', NULL, NULL, NULL, 'White', NULL, 162342, 'Automatic', NULL, NULL, 1, 'PRIME', NULL, NULL, '1739769857_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 17:44:39', '2025-03-14 07:02:32'),
(35, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1xq7hk', '1XQ7HK', '2016-01-01', 'petrol', 'Toyota', '6T1BF3FK10X088081', 'Camry', NULL, NULL, NULL, 'Silver', NULL, NULL, 'Automatic', NULL, NULL, 0, 'PRIME', NULL, NULL, '1739769834_camry-silver.jpg', 'toyota-camry-silver', '300', NULL, '2025-02-05 17:47:53', '2025-03-14 07:02:32'),
(36, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1xv1rn', '1XV1RN', '2023-01-01', 'petrol', 'Toyota', 'JTNBA3HKX03025706', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'PRIME', NULL, NULL, '1739769696_camry-white.jpg', 'toyota-camry-white', NULL, NULL, '2025-02-05 17:50:31', '2025-03-14 07:02:32'),
(37, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-kluger-1xw8qs', '1XW8QS', '2023-01-01', 'petrol', 'Toyota', '5TDLB3CHX0S108147', 'Kluger', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'CALIBRE', NULL, NULL, '1739769670_Kluger-red.png', 'toyota-Kluger-red', '300', NULL, '2025-02-05 17:58:05', '2025-03-14 07:02:32'),
(38, 1, 'EMM Kay Group', '52 652 574 528', 'emm-kay-group-cars-toyota-camry-1yj2yo', '1YJ2YO', '2023-01-01', 'petrol', 'Toyota', 'JTNBA3HKX03029805', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'PRIME', NULL, NULL, '1739769538_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 18:00:47', '2025-03-14 07:02:32'),
(39, 1, 'EMM Kay Group', '52 652 574 528', 'emm-kay-group-cars-toyota-camry-1yj2yp', '1YJ2YP', '2023-01-01', 'petrol', 'Toyota', 'JTNBA3HK603030742', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'PRIME', NULL, NULL, '1739769513_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 18:03:04', '2025-03-14 07:02:32'),
(40, 1, 'EMM Kay Group', '52 652 574 528', 'emm-kay-group-cars-toyota-camry-1yj2zv', '1YJ2ZV', '2023-01-01', 'petrol', 'Toyota', 'JTNBA3HKX03030453', 'Camry', NULL, NULL, NULL, 'GREY', NULL, NULL, 'Automatic', NULL, NULL, 0, 'PRIME', NULL, NULL, '1739769479_camry-grey.jpg', 'toyota-camry-grey', '300', NULL, '2025-02-05 18:05:55', '2025-03-14 07:02:32'),
(41, 1, 'EMM Kay Group', '52 652 574 528', 'emm-kay-group-cars-toyota-camry-1yq2lt', '1YQ2LT', '2023-01-01', 'petrol', 'Toyota', 'JTNBA3HK603031356', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'PRIME', NULL, NULL, '1739769447_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 18:08:21', '2025-03-14 07:02:32'),
(42, 1, 'EMM Kay Group', '52 652 574 528', 'emm-kay-group-cars-toyota-camry-1yq2lu', '1YQ2LU', '2023-01-01', 'petrol', 'Toyota', 'JTNBA3HK203031354', 'Camry', NULL, NULL, NULL, 'White', NULL, 109143, 'Automatic', NULL, NULL, 1, 'PRIME', NULL, NULL, '1739769419_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 18:10:28', '2025-03-14 07:02:32'),
(43, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1ys9xy', '1YS9XY', '2023-01-01', 'petrol', 'Toyota', 'JTNBA3HKX03032431', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739769392_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 18:12:48', '2025-03-14 07:02:32'),
(44, 1, 'EMM Kay Group', '52 652 574 528', 'emm-kay-group-cars-toyota-camry-1ys9zy', '1YS9ZY', '2023-01-01', 'petrol', 'Toyota', 'JTNBA3HK503032451', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'PRIME', NULL, NULL, '1739769360_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 18:14:28', '2025-03-14 07:02:32'),
(45, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1zm9cn', '1ZM9CN', '2024-01-01', 'petrol', 'Toyota', 'JTNBA3HK903037748', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'PRIME', NULL, NULL, '1739769229_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 18:16:47', '2025-03-14 07:02:32'),
(46, 1, 'EMM Kay Group', '52 652 574 528', 'emm-kay-group-cars-toyota-corolla-1zz7wp', '1ZZ7WP', '2015-01-01', 'petrol', 'Toyota', 'MR053REH205270528', 'Corolla', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'PRIME', NULL, NULL, '1739769060_Corolla-white.webp', 'toyota-Corolla-white', '300', NULL, '2025-02-05 18:20:39', '2025-03-14 07:02:32'),
(47, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-2aa6aa', '2AA6AA', '2024-01-01', 'petrol', 'Toyota', 'JTNBA3HK903042934', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739768974_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 18:22:46', '2025-03-14 07:02:32'),
(48, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-2aa6ab', '2AA6AB', '2024-01-01', 'petrol', 'Toyota', 'JTNBA3HKX03042926', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739768946_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 18:24:13', '2025-03-14 07:02:32'),
(49, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-2aa6ac', '2AA6AC', '2024-01-01', 'petrol', 'Toyota', 'JTNBA3HK303042928', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739768822_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 18:26:18', '2025-03-14 07:02:32'),
(50, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-2aa6ar', '2AA6AR', '2024-01-01', 'petrol', 'Toyota', 'JTNBA3HK403042923', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739768790_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 18:27:32', '2025-03-14 07:02:32'),
(51, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-2ad6dq', '2AD6DQ', '2024-01-01', 'petrol', 'Toyota', 'JTNBA3HK203043925', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739768758_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 18:28:41', '2025-03-14 07:02:32'),
(52, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-2ad6dr', '2AD6DR', '2024-01-01', 'petrol', 'Toyota', 'JTNBA3HK803043914', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739768726_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 18:30:12', '2025-03-14 07:02:32'),
(53, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-2ad6ds', '2AD6DS', '2024-01-01', 'petrol', 'Toyota', 'JTNBA3HK303043917', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739768695_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 18:31:36', '2025-03-14 07:02:32'),
(54, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-2ak9ny', '2AK9NY', '2024-01-01', 'petrol', 'Toyota', 'JTNBA3HK403046714', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739768667_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 18:33:18', '2025-03-14 07:02:32'),
(55, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-2an5ig', '2AN5IG', '2024-01-01', 'petrol', 'Toyota', 'JTNBA3HK203046811', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739768634_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 18:34:27', '2025-03-14 07:02:32'),
(56, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-2ao2hy', '2AO2HY', '2020-01-01', 'petrol', 'Toyota', 'JTNB23HK403077216', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739768599_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 18:35:40', '2025-03-14 07:02:32'),
(57, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-2aq7dh', '2AQ7DH', '2024-01-01', 'petrol', 'Toyota', 'JTNBA3HK703046805', 'Camry', NULL, NULL, NULL, 'White', NULL, 15342, 'Automatic', NULL, NULL, 1, 'Ride secure Malhi', NULL, NULL, '1739768460_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 18:37:01', '2025-03-14 07:02:32'),
(58, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-2bd6ho', '2BD6HO', '2021-01-01', 'petrol', 'Toyota', 'JTNBA3HK403008108', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739768425_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 18:38:20', '2025-03-14 07:02:32'),
(59, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-kluger-bzo805', 'BZO805', '2022-01-01', 'petrol', 'Toyota', '5TDLB3CH10S079671', 'Kluger', NULL, NULL, NULL, 'GREY', NULL, NULL, 'Automatic', NULL, NULL, 0, 'PRIME', NULL, NULL, '1739768390_Kluger-grey.jpg', 'toyota-Kluger-grey', '300', NULL, '2025-02-05 18:40:45', '2025-03-14 07:02:32'),
(60, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-yur749', 'YUR749', '2011-01-01', 'petrol', 'Toyota', '6T153BK400X124830', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'CALIBRE', NULL, NULL, '1739768323_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-05 18:42:29', '2025-03-14 07:02:32'),
(61, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-suzuki-swift-1ee7im', '1EE7IM', '2014-01-01', 'petrol', 'Suzuki', 'JSAFZC82S00311796', 'Swift', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'CALIBRE', NULL, NULL, '1739768282_swift-white.jpg', 'suzuki-swift-white', '300', NULL, '2025-02-06 09:36:11', '2025-03-14 07:02:32'),
(62, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-yaris-1oi1pj', '1OI1PJ', '2012-01-01', 'petrol', 'Toyota', 'JTDKT3D390D529204', 'Yaris', NULL, NULL, NULL, 'BLUE', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739768203_yaris-blue.jpg', 'toyota-yaris-blue', '300', NULL, '2025-02-06 09:39:22', '2025-03-14 07:02:32'),
(63, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1pm8qt', '1PM8QT', '2016-01-01', 'petrol', 'Toyota', '6T1BF3FK30X084534', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'CALIBRE', NULL, NULL, '1739768044_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-06 09:40:53', '2025-03-14 07:02:32'),
(64, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1qi7qc', '1QI7QC', '2016-01-01', 'petrol', 'Toyota', '6T1BD3FK60X151147', 'Camry', NULL, NULL, NULL, 'BLUE', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739768006_camry-blue.jpg', 'toyota-camry-blue', '300', NULL, '2025-02-06 09:42:31', '2025-03-14 07:02:32'),
(65, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1sw1oy', '1SW1OY', '2020-01-01', 'petrol', 'Toyota', 'JTNB23HKX03072246', 'Camry', NULL, NULL, NULL, 'Red', NULL, NULL, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739767957_camry-red.jpg', 'toyota-camry-red', '300', NULL, '2025-02-06 09:44:28', '2025-03-14 07:02:32'),
(66, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1tt1bg', '1TT1BG', '2021-01-01', 'petrol', 'Toyota', 'JTNBA3HK503005055', 'Camry', NULL, NULL, NULL, 'White', NULL, 20500, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739766743_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-06 09:45:58', '2025-03-14 07:02:32'),
(67, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1uh6nd', '1UH6ND', '2021-01-01', 'petrol', 'Toyota', 'JTNBA3HK503008148', 'Camry', NULL, NULL, NULL, 'White', NULL, 13000, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739766706_camry-white.jpg', 'toyota-camry-white', '300', NULL, '2025-02-06 09:47:39', '2025-03-14 07:02:32'),
(68, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-1un7nh', '1UN7NH', '2021-01-01', 'petrol', 'Toyota', 'JTNBA3HK703008149', 'Camry', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 1, 'Ride secure Malhi', NULL, NULL, '1739766673_camry-white.jpg', 'camry-white', '300', NULL, '2025-02-06 09:49:52', '2025-03-14 07:02:32'),
(69, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-suzuki-swift-bag535', 'BAG535', '2013-01-01', 'petrol', 'Suzuki', 'MMSHZC82S00102131', 'Swift', NULL, NULL, NULL, 'White', NULL, 3000, 'Automatic', NULL, NULL, 0, 'Ride secure Malhi', NULL, NULL, '1739766621_swift-white.jpg', 'suzuki-swift-white', '300', NULL, '2025-02-06 09:52:13', '2025-03-14 07:02:32'),
(70, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-suzuki-swift-yyh656', 'YYH656', '2012-01-01', 'petrol', 'Suzuki', 'JSAFZC82S00121589', 'Swift', NULL, NULL, NULL, 'Silver', NULL, 24325, 'Automatic', NULL, NULL, 0, 'BUDGET INSURANCE', NULL, NULL, '1739766548_swift-silver.jpg', 'swift-silver', '300', NULL, '2025-02-06 09:56:15', '2025-03-14 07:02:32'),
(71, 2, 'Vaa Transport Pty Ltd', '', 'emm-kay-group-scooter-honda-dio-2u4mn', '2U4MN', '2023-01-01', 'petrol', 'Honda', 'RLHJK03U1NZ101337', 'Dio', NULL, NULL, NULL, 'white', NULL, 300, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739861612_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 06:53:32', '2025-03-14 07:02:32'),
(72, 2, 'Vaa Transport Pty Ltd', '', 'emm-kay-group-scooter-honda-dio-2y6pq', '2Y6PQ', '2023-01-01', 'petrol', 'Honda', 'RLHJK03U7NZ101326', 'Dio', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739861892_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 06:58:12', '2025-03-14 07:02:32'),
(73, 2, 'Vaa Transport Pty Ltd', '', 'emm-kay-group-scooter-honda-dio-2u4mq', '2U4MQ', '2023-01-01', 'petrol', 'Honda', 'RLHJK03U8NZ101335', 'Dio', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, NULL, NULL, NULL, '1739862054_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 07:00:54', '2025-03-14 07:02:32'),
(74, 2, 'Vaa Transport Pty Ltd', '', 'emm-kay-group-scooter-honda-dio-2u4mr', '2U4MR', '2023-01-01', 'petrol', 'Honda', 'RLHJK03U2NZ101332', 'Dio', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739862234_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 07:03:54', '2025-03-14 07:02:32'),
(75, 2, 'Vaa Transport Pty Ltd', '', 'emm-kay-group-scooter-honda-dio-2u4ms', '2U4MS', '2023-01-01', 'petrol', 'Honda', 'RLHJK03U5NZ101325', 'Dio', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739862418_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 07:06:58', '2025-03-14 07:02:32'),
(76, 2, 'Vaa Transport Pty Ltd', '', 'emm-kay-group-scooter-honda-dio-2w5ro', '2W5RO', '2022-01-01', 'petrol', 'Honda', 'RLHJK03U2NZ100312', 'Dio', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739862625_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 07:10:25', '2025-03-14 07:02:32'),
(77, 2, 'Vaa Transport Pty Ltd', '', 'emm-kay-group-scooter-honda-dio-2y9nl', '2Y9NL', '2023-01-01', 'petrol', 'Honda', 'RLHJK03U5PZ100212', 'Dio', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739862910_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 07:15:10', '2025-03-14 07:02:32'),
(78, 2, 'Vaa Transport Pty Ltd', '', 'emm-kay-group-scooter-honda-dio-2x3rl', '2X3RL', '2023-01-01', 'petrol', 'Honda', 'RLHJK03U9PZ100200', 'Dio', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739863020_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 07:17:00', '2025-03-14 07:02:32'),
(79, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-honda-dio-2x3ri', '2X3RI', '2023-01-01', 'petrol', 'Honda', 'RLHJK03U8PZ100284', 'Dio', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739863818_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 07:30:18', '2025-03-14 07:02:32'),
(80, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-honda-dio-2y9ne', '2Y9NE', '2023-01-01', 'petrol', 'Honda', 'RLHJK03U2PZ100278', 'Dio', NULL, NULL, NULL, 'white', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739863934_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 07:32:14', '2025-03-14 07:02:32'),
(81, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-honda-dio-2y9nc', '2Y9NC', '2023-01-01', 'petrol', 'Honda', 'RLHJK03U6PZ100560', 'Dio', NULL, NULL, NULL, 'white', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739864083_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 07:34:43', '2025-03-14 07:02:32'),
(82, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-honda-dio-2y9mt', '2Y9MT', '2023-01-01', 'petrol', 'Honda', 'RLHJK03UXPZ100111', 'Dio', NULL, NULL, NULL, 'BLUE', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739864358_honda-dio-blue.jpg', 'honda dio blue', NULL, NULL, '2025-02-18 07:39:18', '2025-03-14 07:02:32'),
(83, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-honda-dio-2z8bz', '2Z8BZ', '2023-01-01', 'petrol', 'Honda', 'RLHJK03U4PZ101349', 'Dio', NULL, NULL, NULL, 'white', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739864573_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 07:42:53', '2025-03-14 07:02:32'),
(84, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-honda-dio-2z8by', '2Z8BY', '2023-01-01', 'petrol', 'Honda', 'RLHJK03U9PZ101413', 'Dio', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739864651_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 07:44:11', '2025-03-14 07:02:32'),
(85, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-honda-dio-2p9oh', '2P9OH', '2023-01-01', 'petrol', 'Honda', 'RLHJK03UXPZ101419', 'Dio', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739864744_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 07:45:44', '2025-03-14 07:02:32'),
(86, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-honda-dio-2s4du', '2S4DU', '2023-01-01', 'petrol', 'Honda', 'RLHJK03U4PZ101352', 'Dio', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739864811_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 07:46:51', '2025-03-14 07:02:32'),
(87, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-honda-dio-2s4dt', '2S4DT', '2023-01-01', 'petrol', 'Honda', 'RLHJK03U9PZ101394', 'Dio', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739864877_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 07:47:57', '2025-03-14 07:02:32'),
(88, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-honda-dio-2z8cc', '2Z8CC', '2023-01-01', 'petrol', 'Honda', 'RLHJK03U3PZ101424', 'Dio', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739864981_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 07:49:41', '2025-03-14 07:02:32'),
(89, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-honda-dio-2z8cd', '2Z8CD', '2023-01-01', 'petrol', 'Honda', 'RLHJK03U3PZ101388', 'Dio', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739865126_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 07:52:06', '2025-03-14 07:02:32'),
(90, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-honda-dio-2z8ca', '2Z8CA', '2023-01-01', 'petrol', 'Honda', 'RLHJK03U8PZ101404', 'Dio', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739865228_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 07:53:48', '2025-03-14 07:02:32'),
(91, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-honda-dio-2z8cb', '2Z8CB', '2023-01-01', 'petrol', 'HONDA', 'RLHJK03U5PZ101425', 'Dio', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739868600_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 08:50:00', '2025-03-14 07:02:32'),
(92, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-honda-dio-2z8ce', '2Z8CE', '2023-01-01', 'petrol', 'Honda', 'RLHJK03U2PZ101432', 'Dio', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739868667_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 08:51:07', '2025-03-14 07:02:32'),
(93, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-honda-dio-2z8cv', '2Z8CV', '2024-01-01', 'petrol', 'Honda', 'RLHJK03U3PZ102475', 'Dio', NULL, NULL, NULL, 'white', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739868750_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 08:52:30', '2025-03-14 07:02:32'),
(94, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-honda-dio-2z8cw', '2Z8CW', '2024-01-01', 'petrol', 'Honda', 'RLHJK03U4PZ102226', 'Dio', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739868906_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 08:55:06', '2025-03-14 07:02:32'),
(95, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-honda-dio-2z8cx', '2Z8CX', '2024-01-01', 'petrol', 'Honda', 'RLHJK03U7PZ102186', 'Dio', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739868972_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 08:56:12', '2025-03-14 07:02:32'),
(96, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-honda-dio-2z8cz', '2Z8CZ', '2024-01-01', 'petrol', 'Honda', 'RLHJK03U6PZ102485', 'Dio', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739869033_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 08:57:13', '2025-03-14 07:02:32'),
(97, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-honda-dio-2z8da', '2Z8DA', '2024-01-01', 'petrol', 'Honda', 'RLHJK03U8PZ102228', 'Dio', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739869115_honda-dio-white.jpg', 'honda dio white', NULL, NULL, '2025-02-18 08:58:35', '2025-03-14 07:02:32'),
(98, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-honda-dio-3c3yb', '3C3YB', '2024-01-01', 'petrol', 'Honda', 'RLHJK03U1PZ102409', 'Dio', NULL, NULL, NULL, 'Red', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739869228_honda-dio-red.jpg', 'honda dio red', NULL, NULL, '2025-02-18 09:00:28', '2025-03-14 07:02:32'),
(99, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-kymco-agility-2x3su', '2X3SU', '2023-01-01', 'petrol', 'KYMCO', 'LC2C41000P1000158', 'Agility', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739869442_kymco-agility-white.jpg', 'kymco agility white', NULL, NULL, '2025-02-18 09:04:02', '2025-03-14 07:02:32'),
(100, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-pista-pista-125-2x4zc', '2X4ZC', '2022-01-01', 'petrol', 'Pista', 'L4HMTEJP0M6000199', 'Pista 125', NULL, NULL, NULL, 'Black', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739869651_pista-pista-125-black.jpg', 'pista pista 125 black', NULL, NULL, '2025-02-18 09:07:31', '2025-03-14 07:02:32'),
(101, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-suzuki-address-2w8pq', '2W8PQ', '2023-01-01', 'petrol', 'Suzuki', 'MH8DE111700100773', 'Address', NULL, NULL, NULL, 'Blue', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739869837_suzuki-address-blue.jpg', 'suzuki address blue', NULL, NULL, '2025-02-18 09:10:37', '2025-03-14 07:02:32'),
(102, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-suzuki-address-2w8pr', '2W8PR', '2023-01-01', 'petrol', 'Suzuki', 'MH8DE111700100765', 'Address', NULL, NULL, NULL, 'Blue', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739869959_suzuki-address-blue.jpg', 'suzuki address blue', NULL, NULL, '2025-02-18 09:12:39', '2025-03-14 07:02:32'),
(103, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-suzuki-address-2w8pt', '2W8PT', '2023-01-01', 'petrol', 'Suzuki', 'MH8DE111700100744', 'Address', NULL, NULL, NULL, 'Blue', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739870052_suzuki-address-blue.jpg', 'suzuki address blue', NULL, NULL, '2025-02-18 09:14:12', '2025-03-14 07:02:32'),
(104, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-suzuki-address-2w8pu', '2W8PU', '2023-01-01', 'petrol', 'Suzuki', 'MH8DE111700100746', 'Address', NULL, NULL, NULL, 'Blue', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739870136_suzuki-address-blue.jpg', 'suzuki address blue', NULL, NULL, '2025-02-18 09:15:36', '2025-03-14 07:02:32'),
(105, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-yamaha-delight-2w2cq', '2W2CQ', '2022-01-01', 'petrol', 'Yamaha', 'RLCSEH225NY001408', 'Delight', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739870291_yamaha-delight-white.jpg', 'yamaha delight white', NULL, NULL, '2025-02-18 09:18:11', '2025-03-14 07:02:32'),
(106, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-yamaha-delight-2w5yd', '2W5YD', '2022-01-01', 'petrol', 'Yamaha', 'RLCSEH220PY001741', 'Delight', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739870401_yamaha-delight-white.jpg', 'yamaha delight white', NULL, NULL, '2025-02-18 09:20:01', '2025-03-14 07:02:32'),
(107, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-yamaha-delight-2x5hu', '2X5HU', '2023-01-01', 'petrol', 'Yamaha', 'RLCSEH226PY001825', 'Delight', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739870501_yamaha-delight-white.jpg', 'yamaha delight white', NULL, NULL, '2025-02-18 09:21:41', '2025-03-14 07:02:32'),
(108, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-yamaha-delight-2x5hw', '2X5HW', '2023-01-01', 'petrol', 'Yamaha', 'RLCSEH227PY001820', 'Delight', NULL, NULL, NULL, 'white', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739870769_yamaha-delight-white.jpg', 'yamaha delight white', NULL, NULL, '2025-02-18 09:26:09', '2025-03-14 07:02:32'),
(109, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-yamaha-delight-2x5hz', '2X5HZ', '2023-01-01', 'petrol', 'Yamaha', 'RLCSEH226PY001839', 'Delight', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739870860_yamaha-delight-white.jpg', 'yamaha delight white', NULL, NULL, '2025-02-18 09:27:40', '2025-03-14 07:02:32'),
(110, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-yamaha-delight-2x5hx', '2X5HX', '2023-01-01', 'petrol', 'Yamaha', 'RLCSEH222PY001871', 'Delight', NULL, NULL, NULL, 'White', NULL, 500, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739870934_yamaha-delight-white.jpg', 'yamaha delight white', NULL, NULL, '2025-02-18 09:28:54', '2025-03-14 07:02:32'),
(111, 2, 'Vaa Transport Pty Ltd', '', 'vaa-transport-pty-ltd-scooter-yamaha-delight-2x6xn', '2X6XN', '2023-01-01', 'petrol', 'Yamaha', 'RLCSEH227PY001896', 'Delight', NULL, NULL, NULL, 'White', NULL, NULL, 'Automatic', NULL, NULL, 0, 'YOUi', NULL, NULL, '1739871026_yamaha-delight-white.jpg', 'yamaha delight white', NULL, NULL, '2025-02-18 09:30:26', '2025-03-14 07:02:32'),
(112, 2, 'Vaa Transport Pty Ltd', NULL, 'vaa-transport-pty-ltd-scooter-pista-pista-125-2r9ub', '2R9UB', NULL, 'petrol', 'Pista', NULL, 'Pista 125', NULL, NULL, NULL, NULL, NULL, NULL, 'Automatic', NULL, NULL, 0, NULL, NULL, NULL, '1740475665_pista-pista-black.jpg', 'pista pista 125', NULL, NULL, '2025-02-18 09:33:45', '2025-03-14 07:02:32'),
(113, 2, 'Vaa Transport Pty Ltd', NULL, 'vaa-transport-pty-ltd-scooter-pista-pista-125-2v9zp', '2V9ZP', NULL, 'petrol', 'Pista', NULL, 'Pista 125', NULL, NULL, NULL, NULL, NULL, NULL, 'Automatic', NULL, NULL, 0, NULL, NULL, NULL, '1740475627_pista-pista-black.jpg', 'pista pista 125', NULL, NULL, '2025-02-18 09:35:22', '2025-03-14 07:02:32'),
(114, 2, 'Vaa Transport Pty Ltd', NULL, 'vaa-transport-pty-ltd-scooter-pista-pista-125-2v9zo', '2V9ZO', NULL, 'petrol', 'Pista', NULL, 'Pista 125', NULL, NULL, NULL, NULL, NULL, NULL, 'Automatic', NULL, NULL, 0, NULL, NULL, NULL, '1740475554_pista-pista-black.jpg', 'pista pista 125', NULL, NULL, '2025-02-18 09:36:56', '2025-03-14 07:02:32'),
(115, 3, 'Vaa Transport Pty Ltd', NULL, 'vaa-transport-pty-ltd-e-bike-vaa-panther-vaa20240601046', 'VAA20240601046', '1970-01-01', 'electric', 'Vaa', NULL, 'Panther', '48V 70AH', NULL, NULL, 'Black', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1741753853_Panther.JPG', NULL, '80', NULL, '2025-03-03 23:35:47', '2025-03-14 07:02:32'),
(116, 3, 'Vaa Transport Pty Ltd', NULL, 'vaa-transport-pty-ltd-e-bike-lithium-quick-aces-vaa20240601567', 'VAA20240601567', NULL, 'electric', 'LITHIUM', NULL, 'Quick Aces', '48V 70AH', NULL, NULL, 'Black', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '80', NULL, '2025-03-03 23:39:24', '2025-03-14 07:02:32'),
(117, 1, 'EMM Kay Group', '52 652 574 528', 'emm-kay-group-cars-toyota-yaris-zgx176', 'ZGX176', '1970-01-01', 'petrol', 'TOYOTA', 'JTDJW3D360D521743', 'YARIS', NULL, '2NZ6375273', NULL, 'BLACK', NULL, 127435, 'AUTOMATIC', '2025-05-15', '2025-02-20', 0, 'PRIME COMMERCIAL INSURANCE', NULL, NULL, '1741753552_2012_toyota_yaris_angularfront.jpg', NULL, '175', NULL, '2025-03-05 19:05:17', '2025-03-14 07:02:32'),
(118, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-2ca4bh', '2CA4BH', '2025-03-01', 'hybrid', 'TOYOTA', 'JTNAGACK103022943', 'CAMRY', NULL, 'A25A0F03220', NULL, 'White', NULL, 5, NULL, NULL, NULL, 1, 'Ride secure', NULL, NULL, '1741595841_CAMRY 255.jpg', NULL, '320', NULL, '2025-03-07 16:56:26', '2025-03-14 07:02:32'),
(119, 3, 'Vaa Transport Pty Ltd', NULL, 'vaa-transport-pty-ltd-e-bike-lithium-e-bike-20qb2533223040488', '20QB2533223040488', '2025-03-01', NULL, 'Lithium', NULL, 'E-bike', '48 V 70 A', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-09 11:22:37', '2025-03-14 07:02:32'),
(120, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-2ca4bf', '2CA4BF', NULL, 'hybrid', 'TOYOTA', 'JTNAGACK303023012', 'CAMRY', NULL, 'A25A0F03657', NULL, 'WHITE', NULL, 6, NULL, NULL, NULL, 1, 'RIDE SECURE CLYDE', NULL, NULL, '1741748442_CAMRY .jpg', NULL, '320', NULL, '2025-03-12 14:00:42', '2025-03-14 07:02:32'),
(121, 1, 'Mahajan Group', '62 626 607 145', 'mahajan-group-cars-toyota-camry-2ca4bg', '2CA4BG', NULL, 'hybrid', 'TOYOTA', 'JTNAGACK103022960', 'CAMRY', NULL, 'A25A0F03437', NULL, 'WHITE', NULL, 6, NULL, NULL, NULL, 1, 'RIDE SECURE', NULL, NULL, '1741748807_CAMRY .jpg', NULL, NULL, NULL, '2025-03-12 14:06:47', '2025-03-14 07:02:32'),
(122, 1, 'EMM Kay Group', '52 652 574 528', 'emm-kay-group-cars-toyota-eco-tds044', 'TDS044', NULL, 'petrol', 'TOYOTA', 'JTDJW133300234793', 'ECO', NULL, '2NZ3356753', NULL, 'GREY', NULL, 200, 'AUTOMATIC', NULL, NULL, 0, 'PRIME COMMERCIAL', NULL, NULL, '1741754355_eco.jpeg', NULL, '160', NULL, '2025-03-12 15:39:15', '2025-03-14 07:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_files`
--

CREATE TABLE `vehicle_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_detail_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_vehicles`
--
ALTER TABLE `assign_vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authorised_drivers`
--
ALTER TABLE `authorised_drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authorised_drivers_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_files`
--
ALTER TABLE `driver_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_files_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miscellaneouses`
--
ALTER TABLE `miscellaneouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `other_service_bookings`
--
ALTER TABLE `other_service_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rental_agreements`
--
ALTER TABLE `rental_agreements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rental_agreements_user_id_foreign` (`user_id`),
  ADD KEY `rental_agreements_vehicle_id_foreign` (`vehicle_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_bookings`
--
ALTER TABLE `service_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_jobs`
--
ALTER TABLE `service_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_jobs_service_id_foreign` (`service_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `time_slots_time_slot_unique` (`time_slot`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_vehicle_tokens`
--
ALTER TABLE `user_vehicle_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_vehicle_tokens_token_unique` (`token`),
  ADD KEY `user_vehicle_tokens_user_id_foreign` (`user_id`),
  ADD KEY `user_vehicle_tokens_vehicle_id_foreign` (`vehicle_id`);

--
-- Indexes for table `vehicle_accidents`
--
ALTER TABLE `vehicle_accidents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_accident_files`
--
ALTER TABLE `vehicle_accident_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicle_details_slug_unique` (`slug`),
  ADD UNIQUE KEY `vehicle_details_reg_no_unique` (`reg_no`),
  ADD KEY `vehicle_details_category_id_foreign` (`category_id`);

--
-- Indexes for table `vehicle_files`
--
ALTER TABLE `vehicle_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_files_vehicle_detail_id_foreign` (`vehicle_detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_vehicles`
--
ALTER TABLE `assign_vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `authorised_drivers`
--
ALTER TABLE `authorised_drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `driver_files`
--
ALTER TABLE `driver_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `miscellaneouses`
--
ALTER TABLE `miscellaneouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_service_bookings`
--
ALTER TABLE `other_service_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rental_agreements`
--
ALTER TABLE `rental_agreements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_bookings`
--
ALTER TABLE `service_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_jobs`
--
ALTER TABLE `service_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user_vehicle_tokens`
--
ALTER TABLE `user_vehicle_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `vehicle_accidents`
--
ALTER TABLE `vehicle_accidents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_accident_files`
--
ALTER TABLE `vehicle_accident_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `vehicle_files`
--
ALTER TABLE `vehicle_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authorised_drivers`
--
ALTER TABLE `authorised_drivers`
  ADD CONSTRAINT `authorised_drivers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `driver_files`
--
ALTER TABLE `driver_files`
  ADD CONSTRAINT `driver_files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rental_agreements`
--
ALTER TABLE `rental_agreements`
  ADD CONSTRAINT `rental_agreements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rental_agreements_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_jobs`
--
ALTER TABLE `service_jobs`
  ADD CONSTRAINT `service_jobs_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_vehicle_tokens`
--
ALTER TABLE `user_vehicle_tokens`
  ADD CONSTRAINT `user_vehicle_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_vehicle_tokens_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  ADD CONSTRAINT `vehicle_details_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vehicle_files`
--
ALTER TABLE `vehicle_files`
  ADD CONSTRAINT `vehicle_files_vehicle_detail_id_foreign` FOREIGN KEY (`vehicle_detail_id`) REFERENCES `vehicle_details` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
