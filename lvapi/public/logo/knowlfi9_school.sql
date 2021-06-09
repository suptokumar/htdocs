-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2021 at 09:33 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knowlfi9_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `changes`
--

CREATE TABLE `changes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `timezone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `replacetime` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `app` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `changes`
--

INSERT INTO `changes` (`id`, `class_id`, `timezone`, `replacetime`, `status`, `app`, `created_at`, `updated_at`) VALUES
(38, '100011', 'Africa/Cairo', '1622650500', '0', '', '2021-06-02 12:47:57', '2021-06-02 12:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_paid` date NOT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_plan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_usd` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_payment_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `hours` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `payment`, `last_paid`, `key`, `payment_plan`, `payment_usd`, `last_payment_date`, `invoice_number`, `rate`, `child`, `hours`, `created_at`, `updated_at`, `email`, `phone`) VALUES
(29, 'Ammon Winder', 'PayPal', '1111-11-11', '10000', 'Advance', '', '', '', 10, 1, '0', '2021-06-02 01:38:47', '2021-06-02 01:38:47', 'askchairmenkapow@gmail.com', '+1804 914 0739'),
(30, 'Wassem Butt', 'PayPal', '1111-11-11', '10001', 'Advance', '', '', '', 8, 1, '0', '2021-06-02 01:41:09', '2021-06-02 01:41:09', 'suuper7@gmail.com', '+19513128633'),
(31, 'Gretchen Head', 'PayPal', '1111-11-11', '10002', 'Advance', '', '', '', 20, 1, '0', '2021-06-02 01:43:20', '2021-06-02 01:43:20', 'gretchen.head@yale-nus.edu.sg', '+6590262443'),
(32, 'Hina Gueizmir', 'PayPal', '1111-11-11', '10003', 'Advance', '', '', '', 12, 1, '0', '2021-06-02 01:47:00', '2021-06-02 01:47:00', 'lymphnode@live.com', '+15044447832'),
(33, 'Huda Al-Marashi', 'PayPal', '1111-11-11', '10004', 'Advance', '', '', '', 10, 1, '0', '2021-06-02 01:48:52', '2021-06-02 01:48:52', 'huda.almarashi@gmail.com', '+19519666126'),
(34, 'Nick Orzech', 'PayPal', '1111-11-11', '10005', 'Advance', '', '', '', 10, 1, '0', '2021-06-02 01:51:27', '2021-06-02 01:51:27', 'nickorzech1@gmail.com', '+15129192529'),
(35, 'Danial Farooq', 'PayPal', '1111-11-11', '10006', 'Advance', '', '', '', 8, 1, '0', '2021-06-02 01:59:21', '2021-06-02 01:59:21', 'danialf64@gmail.com', '+44 7576 725527'),
(36, 'Rand Abbas', 'PayPal', '1111-11-11', '10007', 'Advance', '', '', '', 10, 1, '0', '2021-06-02 02:01:37', '2021-06-02 02:01:37', 'rand_abbas@yahoo.ca', '+15593609357'),
(37, 'Omar Mir', 'PayPal', '1111-11-11', '10008', 'Advance', '', '', '', 10, 1, '0', '2021-06-02 02:04:15', '2021-06-02 02:04:15', 'MadinahMir@khouse.com', '+19095681412'),
(38, 'Namirah Qureshi', 'PayPal', '1111-11-11', '10009', 'Advance', '', '', '', 10, 1, '0', '2021-06-02 02:07:32', '2021-06-02 02:07:32', 'drjamshed@gmail.com', '+12025960902'),
(39, 'Dahlia Jaffer', 'PayPal', '1111-11-11', '10010', 'Advance', '', '', '', 10, 1, '0', '2021-06-02 02:24:27', '2021-06-02 02:24:27', 'dahlia_jaffer@yahoo.com', '+19515006084'),
(40, 'Ayesha Mattu', 'PayPal', '1111-11-11', '10011', 'Advance', '', '', '', 10, 1, '0', '2021-06-02 02:33:47', '2021-06-02 02:33:47', 'ayesha_mattu@yahoo.com', '+14157224420'),
(41, 'Tarek Abdul sattar', 'PayPal', '1111-11-11', '10012', 'Advance', '', '', '', 10, 1, '0', '2021-06-02 02:39:21', '2021-06-02 02:39:21', 'drtariqsattar@gmail.com', '+14053145072'),
(42, 'Kamal Southall', 'PayPal', '1111-11-11', '10013', 'Advance', '', '', '', 10, 1, '0', '2021-06-02 13:30:23', '2021-06-02 13:30:23', 'Southallgroup@gmail.com', '+15135466267');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting` datetime NOT NULL,
  `teacher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guest_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `repeat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ras` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastclass` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `link`, `subject`, `duration`, `timezone`, `starting`, `teacher`, `student`, `t_id`, `s_id`, `guest`, `guest_active`, `repeat`, `ras`, `lastclass`, `created_at`, `updated_at`) VALUES
(96, 'Class with Gretchen Head', 'Arabic classes', 'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09', 'Arabic language', 60, 'Africa/Cairo', '2021-06-03 08:00:00', 'mo7amed2225@gmail.com', 'gretchen.head@yale-nus.edu.sg', '59', '75', '', '', '', '100000', NULL, '2021-06-02 14:17:37', '2021-06-02 14:17:37'),
(97, 'Class with Waseem Butt', 'Quran recitation classes', 'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09', 'Quran Recitation', 60, 'Africa/Cairo', '2021-06-02 18:30:00', 'mo7amed2225@gmail.com', 'suuper7@gmail.com', '59', '74', '', '', ',Monday,Tuesday', '100001', NULL, '2021-06-02 14:22:18', '2021-06-02 14:22:18'),
(98, 'Class with Waseem Butt', 'Quran recitation class', 'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09', 'Quran Recitation', 60, 'Africa/Cairo', '2021-06-02 18:30:00', 'mo7amed2225@gmail.com', 'suuper7@gmail.com', '59', '74', '', '', '', '100002', NULL, '2021-06-02 14:24:07', '2021-06-02 14:24:07'),
(99, 'Class with Ammon Winder', 'Quran recitation class', 'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09', 'Quran Recitation', 60, 'Africa/Cairo', '2021-06-05 16:00:00', 'mo7amed2225@gmail.com', 'askchairmenkapow@gmail.com', '59', '73', '', '', ',Sunday,Saturday', '100003', NULL, '2021-06-02 14:27:25', '2021-06-02 14:27:25'),
(100, 'Class with Nick Orzech', 'Arabic language classes', 'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09', 'Quran Recitation', 60, 'Africa/Cairo', '2021-06-03 17:00:00', 'mo7amed2225@gmail.com', 'nickorzech1@gmail.com', '59', '78', '', '', ',Thursday', '100004', NULL, '2021-06-02 14:30:04', '2021-06-02 14:30:04'),
(101, 'Class with Sinan and Sundus', 'Quran recitation class', 'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09', 'Quran Recitation', 60, 'Africa/Cairo', '2021-06-05 19:00:00', 'lamiaaali1997@gmail.com', 'dahlia_jaffer@yahoo.com', '60', '88', '', '', ',Saturday', '100005', NULL, '2021-06-02 14:36:12', '2021-06-02 14:36:12'),
(102, 'Class with Madinah Mir', 'Quran recitation class', 'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09', 'Quran Recitation', 60, 'Africa/Cairo', '2021-06-03 06:00:00', 'lamiaaali1997@gmail.com', 'MadinahMir@khouse.com', '60', '83', '', '', ',Thursday', '100006', NULL, '2021-06-02 14:40:44', '2021-06-02 14:40:44'),
(103, 'Class with Manahil Qureshi', 'Quran recitation', 'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09', 'Quran Recitation', 45, 'Africa/Cairo', '2021-06-07 17:30:00', 'lamiaaali1997@gmail.com', 'drjamshed@gmail.com', '60', '84', '', '', ',Monday,Tuesday,Wednesday', '100007', NULL, '2021-06-02 14:44:03', '2021-06-02 14:44:03'),
(104, 'Class with Manahil Qureshi', 'Quran recitation class', 'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09', 'Quran Recitation', 45, 'Africa/Cairo', '2021-06-07 17:30:00', 'lamiaaali1997@gmail.com', 'drjamshed@gmail.com', '60', '84', '', '', ',Monday,Tuesday,Wednesday', '100008', NULL, '2021-06-02 14:45:08', '2021-06-02 14:45:08'),
(105, 'Class with Leya Qureshi', 'Quran recitation class', 'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09', 'Quran Recitation', 45, 'Africa/Cairo', '2021-06-07 18:15:00', 'lamiaaali1997@gmail.com', 'leyaqureshi@khouse.com', '60', '92', '', '', ',Monday,Tuesday,Wednesday', '100009', NULL, '2021-06-02 14:46:24', '2021-06-02 14:46:24'),
(106, 'Class with Leya Qureshi', 'Quran recitation class', 'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09', 'Quran Recitation', 45, 'Africa/Cairo', '2021-06-02 18:15:00', 'lamiaaali1997@gmail.com', 'leyaqureshi@khouse.com', '60', '92', '', '', '', '100010', NULL, '2021-06-02 14:46:52', '2021-06-02 14:46:52'),
(107, 'Class with Manahil Qureshi', 'Quran recitation class', 'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09', 'Quran Recitation', 45, 'Africa/Cairo', '2021-06-02 18:15:00', 'lamiaaali1997@gmail.com', 'drjamshed@gmail.com', '60', '84', '', '', '', '100011', NULL, '2021-06-02 14:47:12', '2021-06-02 14:47:12'),
(108, 'Class with Manahil Qureshi', 'Quran recitation class', 'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09', 'Quran Recitation', 45, 'Africa/Cairo', '2021-06-02 17:30:00', 'lamiaaali1997@gmail.com', 'drjamshed@gmail.com', '60', '84', '', '', '', '100012', NULL, '2021-06-02 14:49:20', '2021-06-02 14:49:20'),
(109, 'Class with Fatimah Farooq', 'Arabic language Classes', 'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09', 'Arabic language', 60, 'Africa/Cairo', '2021-06-03 17:00:00', 'lamiaaali1997@gmail.com', 'fatimanaveed21@gmail.com', '60', '81', '', '', ',Saturday,Thursday', '100013', NULL, '2021-06-02 14:52:30', '2021-06-02 14:52:30'),
(110, 'Class with Fatimah Zahra Markwith', 'Quran recitation and Arabic class', 'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-06-07 19:00:00', 'lamiaaali1997@gmail.com', 'rand_abbas@yahoo.ca', '60', '82', '', '', ',Monday,Wednesday', '100014', NULL, '2021-06-02 14:57:46', '2021-06-02 14:57:46'),
(111, 'Class with Fatimah Zahra Markwith', 'Quran recitation and Arabic class', 'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-06-02 19:00:00', 'lamiaaali1997@gmail.com', 'rand_abbas@yahoo.ca', '60', '82', '', '', '', '100015', NULL, '2021-06-02 14:58:02', '2021-06-02 14:58:02'),
(113, 'Class with Fatimah zahra Markwith', 'Quran recitation and Arabic class', 'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-06-05 18:30:00', 'lamiaaali1997@gmail.com', 'rand_abbas@yahoo.ca', '60', '82', '', '', ',Saturday', '100016', NULL, '2021-06-02 15:02:43', '2021-06-02 15:02:43'),
(116, 'Class with Farrah and Danial', 'Quran recitation class', 'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09', 'Quran Recitation', 60, 'Africa/Cairo', '2021-06-02 19:30:00', 'lamiaaali1997@gmail.com', 'farrahdanial@khouse.com', '60', '80', '', '', '', '100017', NULL, '2021-06-02 15:22:22', '2021-06-02 15:22:22'),
(117, 'Class with Farrah and Danial', 'Quran recitation class', 'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09', 'Quran Recitation', 60, 'Africa/Cairo', '2021-06-07 19:30:00', 'lamiaaali1997@gmail.com', 'farrahdanial@khouse.com', '60', '80', '', '', ',Monday,Tuesday', '100018', NULL, '2021-06-02 15:22:38', '2021-06-02 15:22:38'),
(118, 'Class with Farrah and Danial', 'Quran recitation class', 'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09', 'Quran Recitation', 60, 'Africa/Cairo', '2021-06-07 19:30:00', 'lamiaaali1997@gmail.com', 'farrahdanial@khouse.com', '60', '80', '', '', ',Monday,Tuesday', '100019', NULL, '2021-06-02 15:22:47', '2021-06-02 15:22:47'),
(121, 'Class with Rumi Randy', 'Quran recitation class', 'https://us05web.zoom.us/j/4235237721?pwd=L1FKZnc5TVY5NEdrQm9RdWJSSEVCZz09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-06-03 17:00:00', 'dodyhelmy911@gmail.com', 'ayesha_mattu@yahoo.com', '20', '89', '', '', ',Monday,Tuesday,Wednesday,Thursday', '100021', NULL, '2021-06-03 21:03:47', '2021-06-03 21:03:47'),
(122, 'TEst', 'class', 'class link', 'Quran Recitation', 60, 'Africa/Cairo', '2021-06-03 15:40:00', 'mo7amed2225@gmail.com', 'nickorzech1@gmail.com', '59', '78', '', '', '', '100021', NULL, '2021-06-03 21:39:12', '2021-06-03 21:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(11) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user`, `time`, `content`, `read`, `created_at`, `updated_at`) VALUES
(1381, '59', 'Wed, Jun 02,2021 08:17am', '<b>Admin</b> added a class for you. <br> <b>Class with Gretchen Head</b><br><p>Arabic classes</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09\'>https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09</a> <br>Class Starting at: 2021-06-03 <br>Class Time: 02:00pm <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Mohamed Ismail<br>Students name: Gretchen Head', 1, '2021-06-02 14:17:37', '2021-06-03 20:16:52'),
(1382, '75', 'Wed, Jun 02,2021 02:17pm', '<b>Admin</b> added a class for you. <br> <b>Class with Gretchen Head</b><br><p>Arabic classes</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09\'>https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09</a> <br>Class Starting at: 2021-06-03 <br>Class Time: 02:00pm <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Mohamed Ismail<br>Students name: Gretchen Head', 0, '2021-06-02 20:17:37', '2021-06-02 20:17:37'),
(1383, 'Admin', 'Wed, Jun 02,2021 08:17am', '<b>Admin</b> added a class for you. <br> <b>Class with Gretchen Head</b><br><p>Arabic classes</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09\'>https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09</a> <br>Class Starting at: 2021-06-03 <br>Class Time: 02:00pm <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Mohamed Ismail<br>Students name: Gretchen Head', 1, '2021-06-02 14:17:37', '2021-06-02 13:42:22'),
(1384, '59', 'Wed, Jun 02,2021 08:22am', '<b>Admin</b> added a class for you. <br> <b>Class with Waseem Butt</b><br><p>Quran recitation classes</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09\'>https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 09:30am <br>Repeat:Monday,Tuesday <br>guests: No Guests <br>Assigned Teacher: Mohamed Ismail<br>Students name: Wassem Butt', 1, '2021-06-02 14:22:18', '2021-06-03 20:16:52'),
(1385, '74', 'Tue, Jun 01,2021 11:22pm', '<b>Admin</b> added a class for you. <br> <b>Class with Waseem Butt</b><br><p>Quran recitation classes</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09\'>https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 09:30am <br>Repeat:Monday,Tuesday <br>guests: No Guests <br>Assigned Teacher: Mohamed Ismail<br>Students name: Wassem Butt', 0, '2021-06-02 05:22:18', '2021-06-02 05:22:18'),
(1386, 'Admin', 'Wed, Jun 02,2021 08:22am', '<b>Admin</b> added a class for you. <br> <b>Class with Waseem Butt</b><br><p>Quran recitation classes</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09\'>https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 09:30am <br>Repeat:Monday,Tuesday <br>guests: No Guests <br>Assigned Teacher: Mohamed Ismail<br>Students name: Wassem Butt', 1, '2021-06-02 14:22:18', '2021-06-02 13:42:22'),
(1387, '59', 'Wed, Jun 02,2021 08:24am', '<b>Admin</b> added a class for you. <br> <b>Class with Waseem Butt</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09\'>https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 09:30am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Mohamed Ismail<br>Students name: Wassem Butt', 1, '2021-06-02 14:24:07', '2021-06-03 20:16:52'),
(1388, '74', 'Tue, Jun 01,2021 11:24pm', '<b>Admin</b> added a class for you. <br> <b>Class with Waseem Butt</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09\'>https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 09:30am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Mohamed Ismail<br>Students name: Wassem Butt', 0, '2021-06-02 05:24:07', '2021-06-02 05:24:07'),
(1389, 'Admin', 'Wed, Jun 02,2021 08:24am', '<b>Admin</b> added a class for you. <br> <b>Class with Waseem Butt</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09\'>https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 09:30am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Mohamed Ismail<br>Students name: Wassem Butt', 1, '2021-06-02 14:24:07', '2021-06-02 13:42:22'),
(1390, '59', 'Wed, Jun 02,2021 08:27am', '<b>Admin</b> added a class for you. <br> <b>Class with Ammon Winder</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09\'>https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09</a> <br>Class Starting at: 2021-06-05 <br>Class Time: 10:00am <br>Repeat:Sunday,Saturday <br>guests: No Guests <br>Assigned Teacher: Mohamed Ismail<br>Students name: Ammon Winder', 1, '2021-06-02 14:27:25', '2021-06-03 20:16:52'),
(1391, '73', 'Wed, Jun 02,2021 02:27am', '<b>Admin</b> added a class for you. <br> <b>Class with Ammon Winder</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09\'>https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09</a> <br>Class Starting at: 2021-06-05 <br>Class Time: 10:00am <br>Repeat:Sunday,Saturday <br>guests: No Guests <br>Assigned Teacher: Mohamed Ismail<br>Students name: Ammon Winder', 1, '2021-06-02 08:27:25', '2021-06-03 15:31:25'),
(1392, 'Admin', 'Wed, Jun 02,2021 08:27am', '<b>Admin</b> added a class for you. <br> <b>Class with Ammon Winder</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09\'>https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09</a> <br>Class Starting at: 2021-06-05 <br>Class Time: 10:00am <br>Repeat:Sunday,Saturday <br>guests: No Guests <br>Assigned Teacher: Mohamed Ismail<br>Students name: Ammon Winder', 1, '2021-06-02 14:27:25', '2021-06-02 13:42:22'),
(1393, '59', 'Wed, Jun 02,2021 08:30am', '<b>Admin</b> added a class for you. <br> <b>Class with Nick Orzech</b><br><p>Arabic language classes</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09\'>https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09</a> <br>Class Starting at: 2021-06-03 <br>Class Time: 10:00am <br>Repeat:Thursday <br>guests: No Guests <br>Assigned Teacher: Mohamed Ismail<br>Students name: Nick Orzech', 1, '2021-06-02 14:30:04', '2021-06-03 20:16:52'),
(1394, '78', 'Wed, Jun 02,2021 01:30am', '<b>Admin</b> added a class for you. <br> <b>Class with Nick Orzech</b><br><p>Arabic language classes</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09\'>https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09</a> <br>Class Starting at: 2021-06-03 <br>Class Time: 10:00am <br>Repeat:Thursday <br>guests: No Guests <br>Assigned Teacher: Mohamed Ismail<br>Students name: Nick Orzech', 0, '2021-06-02 07:30:04', '2021-06-02 07:30:04'),
(1395, 'Admin', 'Wed, Jun 02,2021 08:30am', '<b>Admin</b> added a class for you. <br> <b>Class with Nick Orzech</b><br><p>Arabic language classes</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09\'>https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09</a> <br>Class Starting at: 2021-06-03 <br>Class Time: 10:00am <br>Repeat:Thursday <br>guests: No Guests <br>Assigned Teacher: Mohamed Ismail<br>Students name: Nick Orzech', 1, '2021-06-02 14:30:04', '2021-06-02 13:42:22'),
(1396, '60', 'Wed, Jun 02,2021 08:36am', '<b>Admin</b> added a class for you. <br> <b>Class with Sinan and Sundus</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-05 <br>Class Time: 10:00am <br>Repeat:Saturday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Sinan and Sundus', 0, '2021-06-02 14:36:12', '2021-06-02 14:36:12'),
(1397, '88', 'Tue, Jun 01,2021 11:36pm', '<b>Admin</b> added a class for you. <br> <b>Class with Sinan and Sundus</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-05 <br>Class Time: 10:00am <br>Repeat:Saturday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Sinan and Sundus', 0, '2021-06-02 05:36:12', '2021-06-02 05:36:12'),
(1398, 'Admin', 'Wed, Jun 02,2021 08:36am', '<b>Admin</b> added a class for you. <br> <b>Class with Sinan and Sundus</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-05 <br>Class Time: 10:00am <br>Repeat:Saturday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Sinan and Sundus', 1, '2021-06-02 14:36:12', '2021-06-02 13:42:22'),
(1399, '60', 'Wed, Jun 02,2021 08:40am', '<b>Admin</b> added a class for you. <br> <b>Class with Madinah Mir</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 09:00pm <br>Repeat:Thursday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Madinah Mir', 0, '2021-06-02 14:40:44', '2021-06-02 14:40:44'),
(1400, '83', 'Tue, Jun 01,2021 11:40pm', '<b>Admin</b> added a class for you. <br> <b>Class with Madinah Mir</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 09:00pm <br>Repeat:Thursday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Madinah Mir', 0, '2021-06-02 05:40:44', '2021-06-02 05:40:44'),
(1401, 'Admin', 'Wed, Jun 02,2021 08:40am', '<b>Admin</b> added a class for you. <br> <b>Class with Madinah Mir</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 09:00pm <br>Repeat:Thursday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Madinah Mir', 1, '2021-06-02 14:40:44', '2021-06-02 13:42:22'),
(1402, '60', 'Wed, Jun 02,2021 08:44am', '<b>Admin</b> added a class for you. <br> <b>Class with Manahil Qureshi</b><br><p>Quran recitation</p><br> Class Duration: 45 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-07 <br>Class Time: 10:30am <br>Repeat:Monday,Tuesday,Wednesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Manahil Qureshi', 0, '2021-06-02 14:44:03', '2021-06-02 14:44:03'),
(1403, '84', 'Wed, Jun 02,2021 01:44am', '<b>Admin</b> added a class for you. <br> <b>Class with Manahil Qureshi</b><br><p>Quran recitation</p><br> Class Duration: 45 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-07 <br>Class Time: 10:30am <br>Repeat:Monday,Tuesday,Wednesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Manahil Qureshi', 0, '2021-06-02 07:44:03', '2021-06-02 07:44:03'),
(1404, 'Admin', 'Wed, Jun 02,2021 08:44am', '<b>Admin</b> added a class for you. <br> <b>Class with Manahil Qureshi</b><br><p>Quran recitation</p><br> Class Duration: 45 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-07 <br>Class Time: 10:30am <br>Repeat:Monday,Tuesday,Wednesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Manahil Qureshi', 1, '2021-06-02 14:44:03', '2021-06-02 13:42:22'),
(1405, '60', 'Wed, Jun 02,2021 08:45am', '<b>Admin</b> added a class for you. <br> <b>Class with Manahil Qureshi</b><br><p>Quran recitation class</p><br> Class Duration: 45 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-07 <br>Class Time: 10:30am <br>Repeat:Monday,Tuesday,Wednesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Manahil Qureshi', 1, '2021-06-02 14:45:08', '2021-06-02 21:22:51'),
(1406, '84', 'Wed, Jun 02,2021 01:45am', '<b>Admin</b> added a class for you. <br> <b>Class with Manahil Qureshi</b><br><p>Quran recitation class</p><br> Class Duration: 45 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-07 <br>Class Time: 10:30am <br>Repeat:Monday,Tuesday,Wednesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Manahil Qureshi', 0, '2021-06-02 07:45:08', '2021-06-02 07:45:08'),
(1407, 'Admin', 'Wed, Jun 02,2021 08:45am', '<b>Admin</b> added a class for you. <br> <b>Class with Manahil Qureshi</b><br><p>Quran recitation class</p><br> Class Duration: 45 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-07 <br>Class Time: 10:30am <br>Repeat:Monday,Tuesday,Wednesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Manahil Qureshi', 1, '2021-06-02 14:45:08', '2021-06-02 13:42:21'),
(1408, '60', 'Wed, Jun 02,2021 08:46am', '<b>Admin</b> added a class for you. <br> <b>Class with Leya Qureshi</b><br><p>Quran recitation class</p><br> Class Duration: 45 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-07 <br>Class Time: 11:15am <br>Repeat:Monday,Tuesday,Wednesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Leya Qureshi', 1, '2021-06-02 14:46:24', '2021-06-02 21:22:51'),
(1409, '92', 'Wed, Jun 02,2021 01:46am', '<b>Admin</b> added a class for you. <br> <b>Class with Leya Qureshi</b><br><p>Quran recitation class</p><br> Class Duration: 45 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-07 <br>Class Time: 11:15am <br>Repeat:Monday,Tuesday,Wednesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Leya Qureshi', 0, '2021-06-02 07:46:24', '2021-06-02 07:46:24'),
(1410, 'Admin', 'Wed, Jun 02,2021 08:46am', '<b>Admin</b> added a class for you. <br> <b>Class with Leya Qureshi</b><br><p>Quran recitation class</p><br> Class Duration: 45 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-07 <br>Class Time: 11:15am <br>Repeat:Monday,Tuesday,Wednesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Leya Qureshi', 1, '2021-06-02 14:46:24', '2021-06-02 13:41:58'),
(1411, '60', 'Wed, Jun 02,2021 08:46am', '<b>Admin</b> added a class for you. <br> <b>Class with Leya Qureshi</b><br><p>Quran recitation class</p><br> Class Duration: 45 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 11:15am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Leya Qureshi', 1, '2021-06-02 14:46:52', '2021-06-02 21:22:51'),
(1412, '92', 'Wed, Jun 02,2021 01:46am', '<b>Admin</b> added a class for you. <br> <b>Class with Leya Qureshi</b><br><p>Quran recitation class</p><br> Class Duration: 45 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 11:15am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Leya Qureshi', 0, '2021-06-02 07:46:52', '2021-06-02 07:46:52'),
(1413, 'Admin', 'Wed, Jun 02,2021 08:46am', '<b>Admin</b> added a class for you. <br> <b>Class with Leya Qureshi</b><br><p>Quran recitation class</p><br> Class Duration: 45 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 11:15am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Leya Qureshi', 1, '2021-06-02 14:46:52', '2021-06-02 13:41:58'),
(1414, '60', 'Wed, Jun 02,2021 08:47am', '<b>Admin</b> added a class for you. <br> <b>Class with Manahil Qureshi</b><br><p>Quran recitation class</p><br> Class Duration: 45 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 11:15am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Manahil Qureshi', 1, '2021-06-02 14:47:12', '2021-06-02 21:22:51'),
(1415, '84', 'Wed, Jun 02,2021 01:47am', '<b>Admin</b> added a class for you. <br> <b>Class with Manahil Qureshi</b><br><p>Quran recitation class</p><br> Class Duration: 45 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 11:15am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Manahil Qureshi', 0, '2021-06-02 07:47:12', '2021-06-02 07:47:12'),
(1416, 'Admin', 'Wed, Jun 02,2021 08:47am', '<b>Admin</b> added a class for you. <br> <b>Class with Manahil Qureshi</b><br><p>Quran recitation class</p><br> Class Duration: 45 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 11:15am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Manahil Qureshi', 1, '2021-06-02 14:47:12', '2021-06-02 13:41:58'),
(1417, 'Admin', 'Wed, Jun 02,2021 08:47am', 'You have a new request from admin@khouse.com', 1, '2021-06-02 14:47:50', '2021-06-02 13:41:58'),
(1418, '84', 'Wed, Jun 02,2021 01:47am', '<b>Admin <i>(admin@khouse.com)</i></b> sent a request to cancel a class', 0, '2021-06-02 07:47:50', '2021-06-02 07:47:50'),
(1419, '60', 'Wed, Jun 02,2021 08:47am', ' The request of delete class <b>Class with Manahil Qureshi</b> was Approved.', 1, '2021-06-02 14:47:57', '2021-06-02 21:22:51'),
(1420, '84', 'Wed, Jun 02,2021 01:47am', ' The request of delete class <b>Class with Manahil Qureshi</b> was Approved.', 0, '2021-06-02 07:47:57', '2021-06-02 07:47:57'),
(1421, 'Admin', 'Wed, Jun 02,2021 08:47am', ' The request of delete class <b>Class with Manahil Qureshi</b> was Approved.', 1, '2021-06-02 14:47:57', '2021-06-02 13:41:58'),
(1422, '60', 'Wed, Jun 02,2021 08:49am', '<b>Admin</b> added a class for you. <br> <b>Class with Manahil Qureshi</b><br><p>Quran recitation class</p><br> Class Duration: 45 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 10:30am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Manahil Qureshi', 1, '2021-06-02 14:49:20', '2021-06-02 21:22:51'),
(1423, '84', 'Wed, Jun 02,2021 01:49am', '<b>Admin</b> added a class for you. <br> <b>Class with Manahil Qureshi</b><br><p>Quran recitation class</p><br> Class Duration: 45 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 10:30am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Manahil Qureshi', 0, '2021-06-02 07:49:20', '2021-06-02 07:49:20'),
(1424, 'Admin', 'Wed, Jun 02,2021 08:49am', '<b>Admin</b> added a class for you. <br> <b>Class with Manahil Qureshi</b><br><p>Quran recitation class</p><br> Class Duration: 45 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 10:30am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Manahil Qureshi', 1, '2021-06-02 14:49:20', '2021-06-02 13:41:58'),
(1425, '60', 'Wed, Jun 02,2021 08:52am', '<b>Admin</b> added a class for you. <br> <b>Class with Fatimah Farooq</b><br><p>Arabic language Classes</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-03 <br>Class Time: 04:00pm <br>Repeat:Saturday,Thursday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Fatimah Farooq', 1, '2021-06-02 14:52:30', '2021-06-02 21:22:51'),
(1426, '81', 'Wed, Jun 02,2021 07:52am', '<b>Admin</b> added a class for you. <br> <b>Class with Fatimah Farooq</b><br><p>Arabic language Classes</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-03 <br>Class Time: 04:00pm <br>Repeat:Saturday,Thursday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Fatimah Farooq', 0, '2021-06-02 13:52:30', '2021-06-02 13:52:30'),
(1427, 'Admin', 'Wed, Jun 02,2021 08:52am', '<b>Admin</b> added a class for you. <br> <b>Class with Fatimah Farooq</b><br><p>Arabic language Classes</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-03 <br>Class Time: 04:00pm <br>Repeat:Saturday,Thursday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Fatimah Farooq', 1, '2021-06-02 14:52:30', '2021-06-02 13:41:58'),
(1428, '60', 'Wed, Jun 02,2021 08:57am', '<b>Admin</b> added a class for you. <br> <b>Class with Fatimah Zahra Markwith</b><br><p>Quran recitation and Arabic class</p><br> Class Duration: 30 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-07 <br>Class Time: 10:00am <br>Repeat:Monday,Wednesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Fatimah zahra Markwith', 1, '2021-06-02 14:57:46', '2021-06-02 21:22:51'),
(1429, '82', 'Tue, Jun 01,2021 11:57pm', '<b>Admin</b> added a class for you. <br> <b>Class with Fatimah Zahra Markwith</b><br><p>Quran recitation and Arabic class</p><br> Class Duration: 30 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-07 <br>Class Time: 10:00am <br>Repeat:Monday,Wednesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Fatimah zahra Markwith', 0, '2021-06-02 05:57:46', '2021-06-02 05:57:46'),
(1430, 'Admin', 'Wed, Jun 02,2021 08:57am', '<b>Admin</b> added a class for you. <br> <b>Class with Fatimah Zahra Markwith</b><br><p>Quran recitation and Arabic class</p><br> Class Duration: 30 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-07 <br>Class Time: 10:00am <br>Repeat:Monday,Wednesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Fatimah zahra Markwith', 1, '2021-06-02 14:57:46', '2021-06-02 13:41:58'),
(1431, '60', 'Wed, Jun 02,2021 08:58am', '<b>Admin</b> added a class for you. <br> <b>Class with Fatimah Zahra Markwith</b><br><p>Quran recitation and Arabic class</p><br> Class Duration: 30 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 10:00am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Fatimah zahra Markwith', 1, '2021-06-02 14:58:02', '2021-06-02 21:22:51'),
(1432, '82', 'Tue, Jun 01,2021 11:58pm', '<b>Admin</b> added a class for you. <br> <b>Class with Fatimah Zahra Markwith</b><br><p>Quran recitation and Arabic class</p><br> Class Duration: 30 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 10:00am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Fatimah zahra Markwith', 0, '2021-06-02 05:58:02', '2021-06-02 05:58:02'),
(1433, 'Admin', 'Wed, Jun 02,2021 08:58am', '<b>Admin</b> added a class for you. <br> <b>Class with Fatimah Zahra Markwith</b><br><p>Quran recitation and Arabic class</p><br> Class Duration: 30 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 10:00am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Fatimah zahra Markwith', 1, '2021-06-02 14:58:02', '2021-06-02 13:41:58'),
(1434, '60', 'Wed, Jun 02,2021 08:59am', '<b>Admin</b> added a class for you. <br> <b>Class with Fatimah Zahra Markwith</b><br><p>Quran recitation and Arabic class</p><br> Class Duration: 30 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-05 <br>Class Time: 10:00am <br>Repeat:Saturday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Fatimah zahra Markwith', 1, '2021-06-02 14:59:06', '2021-06-02 21:22:51'),
(1435, '82', 'Tue, Jun 01,2021 11:59pm', '<b>Admin</b> added a class for you. <br> <b>Class with Fatimah Zahra Markwith</b><br><p>Quran recitation and Arabic class</p><br> Class Duration: 30 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-05 <br>Class Time: 10:00am <br>Repeat:Saturday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Fatimah zahra Markwith', 0, '2021-06-02 05:59:06', '2021-06-02 05:59:06'),
(1436, 'Admin', 'Wed, Jun 02,2021 08:59am', '<b>Admin</b> added a class for you. <br> <b>Class with Fatimah Zahra Markwith</b><br><p>Quran recitation and Arabic class</p><br> Class Duration: 30 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-05 <br>Class Time: 10:00am <br>Repeat:Saturday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Fatimah zahra Markwith', 1, '2021-06-02 14:59:06', '2021-06-02 13:41:58'),
(1437, 'Admin', 'Wed, Jun 02,2021 09:00am', 'Class with Fatimah Zahra Markwith was deleted by Admin', 1, '2021-06-02 15:00:53', '2021-06-02 13:41:58'),
(1438, '60', 'Wed, Jun 02,2021 09:00am', 'Class with Fatimah Zahra Markwith was deleted by Admin', 1, '2021-06-02 15:00:53', '2021-06-02 21:22:51'),
(1439, '82', 'Wed, Jun 02,2021 12:00am', 'Class with Fatimah Zahra Markwith was deleted by Admin', 0, '2021-06-02 06:00:53', '2021-06-02 06:00:53'),
(1440, '60', 'Wed, Jun 02,2021 09:02am', '<b>Admin</b> added a class for you. <br> <b>Class with Fatimah zahra Markwith</b><br><p>Quran recitation and Arabic class</p><br> Class Duration: 30 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-05 <br>Class Time: 09:30am <br>Repeat:Saturday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Fatimah zahra Markwith', 1, '2021-06-02 15:02:43', '2021-06-02 21:22:51'),
(1441, '82', 'Wed, Jun 02,2021 12:02am', '<b>Admin</b> added a class for you. <br> <b>Class with Fatimah zahra Markwith</b><br><p>Quran recitation and Arabic class</p><br> Class Duration: 30 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-05 <br>Class Time: 09:30am <br>Repeat:Saturday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Fatimah zahra Markwith', 0, '2021-06-02 06:02:43', '2021-06-02 06:02:43'),
(1442, 'Admin', 'Wed, Jun 02,2021 09:02am', '<b>Admin</b> added a class for you. <br> <b>Class with Fatimah zahra Markwith</b><br><p>Quran recitation and Arabic class</p><br> Class Duration: 30 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-05 <br>Class Time: 09:30am <br>Repeat:Saturday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Fatimah zahra Markwith', 1, '2021-06-02 15:02:43', '2021-06-02 13:41:58'),
(1443, '60', 'Wed, Jun 02,2021 09:12am', '<b>Admin</b> added a class for you. <br> <b>Class with Danial and Farrah</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 10:30am <br>Repeat:Monday,Tuesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Danial and Farrah', 1, '2021-06-02 15:12:00', '2021-06-02 21:22:51'),
(1444, '80', 'Wed, Jun 02,2021 12:12am', '<b>Admin</b> added a class for you. <br> <b>Class with Danial and Farrah</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 10:30am <br>Repeat:Monday,Tuesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Danial and Farrah', 0, '2021-06-02 06:12:00', '2021-06-02 06:12:00'),
(1445, 'Admin', 'Wed, Jun 02,2021 09:12am', '<b>Admin</b> added a class for you. <br> <b>Class with Danial and Farrah</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 10:30am <br>Repeat:Monday,Tuesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Danial and Farrah', 1, '2021-06-02 15:12:00', '2021-06-02 13:41:58'),
(1446, '60', 'Wed, Jun 02,2021 09:13am', '<b>Admin</b> added a class for you. <br> <b>Class with Danial and Farrah</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 10:30am <br>Repeat:Monday,Tuesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Danial and Farrah', 1, '2021-06-02 15:13:26', '2021-06-02 21:22:51'),
(1447, '80', 'Wed, Jun 02,2021 12:13am', '<b>Admin</b> added a class for you. <br> <b>Class with Danial and Farrah</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 10:30am <br>Repeat:Monday,Tuesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Danial and Farrah', 0, '2021-06-02 06:13:26', '2021-06-02 06:13:26'),
(1448, 'Admin', 'Wed, Jun 02,2021 09:13am', '<b>Admin</b> added a class for you. <br> <b>Class with Danial and Farrah</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 10:30am <br>Repeat:Monday,Tuesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Danial and Farrah', 1, '2021-06-02 15:13:26', '2021-06-02 13:41:58'),
(1449, 'Admin', 'Wed, Jun 02,2021 09:16am', 'Class with Danial and Farrah was deleted by Admin', 1, '2021-06-02 15:16:07', '2021-06-02 13:41:58'),
(1450, '60', 'Wed, Jun 02,2021 09:16am', 'Class with Danial and Farrah was deleted by Admin', 1, '2021-06-02 15:16:07', '2021-06-02 21:22:51'),
(1451, '80', 'Wed, Jun 02,2021 12:16am', 'Class with Danial and Farrah was deleted by Admin', 0, '2021-06-02 06:16:07', '2021-06-02 06:16:07'),
(1452, 'Admin', 'Wed, Jun 02,2021 09:16am', 'Class with Danial and Farrah was deleted by Admin', 1, '2021-06-02 15:16:32', '2021-06-02 13:41:58'),
(1453, '60', 'Wed, Jun 02,2021 09:16am', 'Class with Danial and Farrah was deleted by Admin', 1, '2021-06-02 15:16:32', '2021-06-02 21:22:51'),
(1454, '80', 'Wed, Jun 02,2021 12:16am', 'Class with Danial and Farrah was deleted by Admin', 0, '2021-06-02 06:16:32', '2021-06-02 06:16:32'),
(1455, '60', 'Wed, Jun 02,2021 09:22am', '<b>Admin</b> added a class for you. <br> <b>Class with Farrah and Danial</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 10:30am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Farrah and Danial', 1, '2021-06-02 15:22:22', '2021-06-02 21:22:51'),
(1456, '80', 'Wed, Jun 02,2021 12:22am', '<b>Admin</b> added a class for you. <br> <b>Class with Farrah and Danial</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 10:30am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Farrah and Danial', 0, '2021-06-02 06:22:22', '2021-06-02 06:22:22'),
(1457, 'Admin', 'Wed, Jun 02,2021 09:22am', '<b>Admin</b> added a class for you. <br> <b>Class with Farrah and Danial</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-02 <br>Class Time: 10:30am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Farrah and Danial', 1, '2021-06-02 15:22:22', '2021-06-02 13:41:58'),
(1458, '60', 'Wed, Jun 02,2021 09:22am', '<b>Admin</b> added a class for you. <br> <b>Class with Farrah and Danial</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-07 <br>Class Time: 10:30am <br>Repeat:Monday,Tuesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Farrah and Danial', 1, '2021-06-02 15:22:38', '2021-06-02 21:22:51'),
(1459, '80', 'Wed, Jun 02,2021 12:22am', '<b>Admin</b> added a class for you. <br> <b>Class with Farrah and Danial</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-07 <br>Class Time: 10:30am <br>Repeat:Monday,Tuesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Farrah and Danial', 0, '2021-06-02 06:22:38', '2021-06-02 06:22:38'),
(1460, 'Admin', 'Wed, Jun 02,2021 09:22am', '<b>Admin</b> added a class for you. <br> <b>Class with Farrah and Danial</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-07 <br>Class Time: 10:30am <br>Repeat:Monday,Tuesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Farrah and Danial', 1, '2021-06-02 15:22:38', '2021-06-02 13:41:58'),
(1461, '60', 'Wed, Jun 02,2021 09:22am', '<b>Admin</b> added a class for you. <br> <b>Class with Farrah and Danial</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-07 <br>Class Time: 10:30am <br>Repeat:Monday,Tuesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Farrah and Danial', 1, '2021-06-02 15:22:47', '2021-06-02 21:22:51'),
(1462, '80', 'Wed, Jun 02,2021 12:22am', '<b>Admin</b> added a class for you. <br> <b>Class with Farrah and Danial</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-07 <br>Class Time: 10:30am <br>Repeat:Monday,Tuesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Farrah and Danial', 0, '2021-06-02 06:22:47', '2021-06-02 06:22:47'),
(1463, 'Admin', 'Wed, Jun 02,2021 09:22am', '<b>Admin</b> added a class for you. <br> <b>Class with Farrah and Danial</b><br><p>Quran recitation class</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-07 <br>Class Time: 10:30am <br>Repeat:Monday,Tuesday <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Farrah and Danial', 1, '2021-06-02 15:22:47', '2021-06-02 13:41:58'),
(1464, '60', 'Wed, Jun 02,2021 09:36am', '<b>Admin</b> added a class for you. <br> <b>Class with Leya Qureshi</b><br><p>Quran recitation class</p><br> Class Duration: 45 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-01 <br>Class Time: 10:30am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Leya Qureshi', 1, '2021-06-02 15:36:29', '2021-06-02 21:22:51'),
(1465, '92', 'Wed, Jun 02,2021 02:36am', '<b>Admin</b> added a class for you. <br> <b>Class with Leya Qureshi</b><br><p>Quran recitation class</p><br> Class Duration: 45 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-01 <br>Class Time: 10:30am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Leya Qureshi', 0, '2021-06-02 08:36:29', '2021-06-02 08:36:29'),
(1466, 'Admin', 'Wed, Jun 02,2021 09:36am', '<b>Admin</b> added a class for you. <br> <b>Class with Leya Qureshi</b><br><p>Quran recitation class</p><br> Class Duration: 45 <br>Class Link: <a href=\'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09\'>https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09</a> <br>Class Starting at: 2021-06-01 <br>Class Time: 10:30am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Lamiaa Ali<br>Students name: Leya Qureshi', 1, '2021-06-02 15:36:29', '2021-06-02 13:41:58'),
(1467, '20', 'Thu, Jun 03,2021 03:00pm', '<b>Admin</b> added a class for you. <br> <b>Class with Rumi Randy</b><br><p>Quran recitation class</p><br> Class Duration: 30 <br>Class Link: <a href=\'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09\'>https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09</a> <br>Class Starting at: 2021-06-03 <br>Class Time: 07:00am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Dina Helmy<br>Students name: Rumi Randy', 0, '2021-06-03 21:00:22', '2021-06-03 21:00:22'),
(1468, '89', 'Thu, Jun 03,2021 05:00am', '<b>Admin</b> added a class for you. <br> <b>Class with Rumi Randy</b><br><p>Quran recitation class</p><br> Class Duration: 30 <br>Class Link: <a href=\'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09\'>https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09</a> <br>Class Starting at: 2021-06-03 <br>Class Time: 07:00am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Dina Helmy<br>Students name: Rumi Randy', 0, '2021-06-03 11:00:22', '2021-06-03 11:00:22'),
(1469, 'Admin', 'Thu, Jun 03,2021 03:00pm', '<b>Admin</b> added a class for you. <br> <b>Class with Rumi Randy</b><br><p>Quran recitation class</p><br> Class Duration: 30 <br>Class Link: <a href=\'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09\'>https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09</a> <br>Class Starting at: 2021-06-03 <br>Class Time: 07:00am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Dina Helmy<br>Students name: Rumi Randy', 1, '2021-06-03 21:00:22', '2021-06-03 19:01:09'),
(1470, '20', 'Thu, Jun 03,2021 03:03pm', '<b>Admin</b> added a class for you. <br> <b>Class with Rumi Randy</b><br><p>Quran recitation class</p><br> Class Duration: 30 <br>Class Link: <a href=\'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09\'>https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09</a> <br>Class Starting at: 2021-06-03 <br>Class Time: 07:00am <br>Repeat:Monday,Tuesday,Wednesday,Thursday <br>guests: No Guests <br>Assigned Teacher: Dina Helmy<br>Students name: Rumi Randy', 0, '2021-06-03 21:03:47', '2021-06-03 21:03:47'),
(1471, '89', 'Thu, Jun 03,2021 05:03am', '<b>Admin</b> added a class for you. <br> <b>Class with Rumi Randy</b><br><p>Quran recitation class</p><br> Class Duration: 30 <br>Class Link: <a href=\'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09\'>https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09</a> <br>Class Starting at: 2021-06-03 <br>Class Time: 07:00am <br>Repeat:Monday,Tuesday,Wednesday,Thursday <br>guests: No Guests <br>Assigned Teacher: Dina Helmy<br>Students name: Rumi Randy', 0, '2021-06-03 11:03:47', '2021-06-03 11:03:47'),
(1472, 'Admin', 'Thu, Jun 03,2021 03:03pm', '<b>Admin</b> added a class for you. <br> <b>Class with Rumi Randy</b><br><p>Quran recitation class</p><br> Class Duration: 30 <br>Class Link: <a href=\'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09\'>https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09</a> <br>Class Starting at: 2021-06-03 <br>Class Time: 07:00am <br>Repeat:Monday,Tuesday,Wednesday,Thursday <br>guests: No Guests <br>Assigned Teacher: Dina Helmy<br>Students name: Rumi Randy', 1, '2021-06-03 21:03:47', '2021-06-03 19:18:00'),
(1473, 'Admin', 'Thu, Jun 03,2021 03:05pm', 'Class with Rumi Randy was deleted by Admin', 1, '2021-06-03 21:05:44', '2021-06-03 19:18:00'),
(1474, '20', 'Thu, Jun 03,2021 03:05pm', 'Class with Rumi Randy was deleted by Admin', 0, '2021-06-03 21:05:44', '2021-06-03 21:05:44'),
(1475, '89', 'Thu, Jun 03,2021 05:05am', 'Class with Rumi Randy was deleted by Admin', 0, '2021-06-03 11:05:44', '2021-06-03 11:05:44'),
(1476, '59', 'Thu, Jun 03,2021 03:39pm', '<b>Admin</b> added a class for you. <br> <b>TEst</b><br><p>class</p><br> Class Duration: 60 <br>Class Link: <a href=\'class link\'>class link</a> <br>Class Starting at: 2021-06-03 <br>Class Time: 08:40am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Mohamed Ismail<br>Students name: Nick Orzech', 1, '2021-06-03 21:39:12', '2021-06-03 20:16:52'),
(1477, '78', 'Thu, Jun 03,2021 08:39am', '<b>Admin</b> added a class for you. <br> <b>TEst</b><br><p>class</p><br> Class Duration: 60 <br>Class Link: <a href=\'class link\'>class link</a> <br>Class Starting at: 2021-06-03 <br>Class Time: 08:40am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Mohamed Ismail<br>Students name: Nick Orzech', 0, '2021-06-03 14:39:12', '2021-06-03 14:39:12'),
(1478, 'Admin', 'Thu, Jun 03,2021 03:39pm', '<b>Admin</b> added a class for you. <br> <b>TEst</b><br><p>class</p><br> Class Duration: 60 <br>Class Link: <a href=\'class link\'>class link</a> <br>Class Starting at: 2021-06-03 <br>Class Time: 08:40am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Mohamed Ismail<br>Students name: Nick Orzech', 1, '2021-06-03 21:39:12', '2021-06-03 20:16:30');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fees` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `transfer_fees` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra_payment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting` datetime NOT NULL,
  `teacher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guest_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `repeat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ras` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `assignment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastclass` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requestds`
--

CREATE TABLE `requestds` (
  `id` int(11) UNSIGNED NOT NULL,
  `notification` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sql` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `users` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) UNSIGNED NOT NULL,
  `notification` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sql` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `users` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `available_time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `email_phone_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gurdain_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `graduation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id_front` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id_back` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `evalu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_evalu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancel_request` int(11) NOT NULL DEFAULT '0',
  `calender_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `zoom_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateofbirth` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `key`, `type`, `available_time`, `email_verified_at`, `email_phone_at`, `password`, `address1`, `country`, `timezone`, `gurdain_id`, `graduation`, `hours`, `education`, `national_id`, `national_id_front`, `national_id_back`, `status`, `evalu`, `reg_evalu`, `cv`, `cancel_request`, `calender_link`, `bio`, `zoom_link`, `gender`, `dateofbirth`, `remember_token`, `created_at`, `updated_at`, `phone`, `email`) VALUES
(19, 'Mohamed Nasir', '', 0, 1, 'Monday-\r\nTuesday-\r\nWednesday-\r\nThursday-\r\nFriday-\r\nSaturday-\r\nSunday-', NULL, NULL, '$2y$10$byKeVmDQagwJfJBlOlFlmO0AFPfbJLXN.umIEESS1iIDsgVBWRZBm', 'Naser city', 'Egypt', 'Africa/Cairo', '', 'Graduate', '', 'Faculty of Languages and Translation, Al-Azhar University', '29411111100453', '', '', '', '', '', '', 0, 'https://calendar.google.com/calendar/embed?src=lutr0fjmn6ef99tguhb8d8427o%40group.calendar.google.com&ctz=Africa%2FCairo', 'https://drive.google.com/file/d/1T_Tm9YxX_nakofAl0byBB8FDsxiGJCup/view', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Male', '1994-11-11', 'tbTCAC1fVTdiag7ZzdOREZhnKBNXUEXEqPua1cYAnbPBkUYDLUDLavb7Ck4C', '2021-04-21 15:13:27', '2021-06-02 03:02:36', '01011539544', 'fodafoda34@gmail.com'),
(20, 'Dina Helmy', '', 0, 1, 'Monday-\r\nTuesday-\r\nWednesday-\r\nThursday-\r\nFriday-\r\nSaturday-\r\nSunday-', NULL, NULL, '$2y$10$aLOPWqTTUOn.hw1hzdyT4.gQnRuol1smdhbTsRFgDc2E1D1e8i0C2', 'Zagazig Al - Sharqya - Egypt', 'Egypt', 'Africa/Cairo', '', 'Graduate', '', 'Languages Literature ​​Zagazig University', '28693041300045', '16189982071354915261IMG_20210124_155701 - learn Arabic with Dolly(1).jpg', '1618998207220620146IMG_20210124_155701 - learn Arabic with Dolly.jpg', '', '', '', '16189982071109173936Resume - learn Arabic with Dolly.pdf', 0, 'https://calendar.google.com/calendar/embed?src=oh4te5crrv1b90ke646h4148r8%40group.calendar.google.com&ctz=Africa%2FCairo', 'https://drive.google.com/file/d/1z47RYqZoRYdBAA57kGOGdGA1myjk2qQi/view', 'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09', 'Female', '1986-09-30', 'LNji0KIHZJvyvl6b8k2Pr0BPNCBdT3aGOy7dT9zbC9NA8mrfcjwfplbcx2rl', '2021-04-21 15:43:27', '2021-06-03 15:47:38', '01065287420', 'dodyhelmy911@gmail.com'),
(21, 'Abdullah Omar', '16194445191047288522IMG_8058.jpg', 0, 1, 'Monday-\r\nTuesday-\r\nWednesday-\r\nThursday-\r\nFriday-\r\nSaturday-\r\nSunday-', NULL, NULL, '$2y$10$qdkSdVR/lAhgQxSOG7Ttmuzpss7JB2.ksGPXrBoHYNq1YQSSdsstW', 'بنى سويف - منشأة هديب - مركز ناصر', 'Egypt', 'Africa/Cairo', '', 'Graduate', '', 'Faculty of languages and Translation - Department of Islamic Studies in English', '29606192200754', '1618998921870993392102695108_1121440761567680_3926974970525122560_n - Abdullah Omar.jpg', '16189989211646265032102695108_1121440761567680_3926974970525122560_n - Abdullah Omar.jpg', '', '', '', '1619444519431790330New Microsoft 155Word Document.pdf', 1, 'https://calendar.google.com/calendar/embed?src=q44djfacvmg93rmuidqjsue89c%40group.calendar.google.com&ctz=Africa%2FCairo', 'I am graduated for AL-azhar University. My field of study was Islamic Studies in English. I am a Hafiz of Quran in Hafs Qiraat. I have been teaching online since 3 years; however I have an experience in teaching for 6 years. I have an experience in Quran in Hafs Qiraat, teaching Arabic and Islamic Studies. I have been teaching for all ages especially for young children.', 'https://us04web.zoom.us/j/71560932874?pwd=SHdTY0E5dEpEeUg0RWVwMHFxNlkxUT09', 'Male', '1996-06-19', 'OpbdsaYH7i1x1kGv0vFMakpOYjJqA89gsaLVGmzzKTQR4t4nqiEqVnWMf6QE', '2021-04-21 15:55:21', '2021-06-02 03:01:34', '01008214371', 'abdullahomar2011@gmail.com'),
(22, 'Saleh Ahmed', '', 0, 1, 'Monday-\r\nTuesday-\r\nWednesday-\r\nThursday-\r\nFriday-\r\nSaturday-\r\nSunday-', NULL, NULL, '$2y$10$o9SXdmhtARUuz7e2parnneZhb5al6npb/iGafmF.m9ij3orYamn9K', 'القاهره- 3شارع السعاده ارض الجنينه الزاوية الحمراء', 'Egypt', 'Africa/Cairo', '', 'Graduate', '', 'Faculty of languages and Translation - Department of Islamic Studies in English', '29504080102353', '16189993581982798441IMG_20210222_220059 - saleh ahmed.jpg', '1618999358489662423IMG_20210222_220059 - saleh ahmed.jpg', '', '', '', '1618999358498422073Islamic Studies Tutor Saled Ahmed - saleh ahmed.pdf', 0, 'https://calendar.google.com/calendar/embed?src=qkfiicjqlni2usrpe1990ovpqs%40group.calendar.google.com&ctz=Africa%2FCairo', '', 'https://us05web.zoom.us/j/2320923569?pwd=YVVQVk56c3k3K1dYc283Q2JGSmVodz099', 'Male', '1995-04-08', 'KIODosWyy5hdMyWfDvHuD58zTvhR7cWZEc0kpCBSkCDkfA64SeJs7RNz3Rmq', '2021-04-21 16:02:38', '2021-06-02 03:02:44', '01115734146', 'saleh2ef@gmail.com'),
(25, 'Mohamed Ismail', '', 0, 3, '0', NULL, NULL, '$2y$10$qnIaxBadWPRmFr6rf1lj9e/AGFT8vGD/x6.nOfOUKfLr1dd8HWjW.', '', 'Egypt', 'Africa/Cairo', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '2020-04-22', 'zeQWNPtcg09iZa6rgYDLyhOqmKnPu5fav4YzbmFUjCKJeqhMaPX2KlKtZgy9', '2021-04-21 16:31:36', '2021-04-21 16:31:36', '0000', 'Ahmed@khouse.com'),
(26, 'Iman Mahmoud', '', 0, 3, '0', NULL, NULL, '$2y$10$wkTl..fVqKo9tqk3vDQcdOmYDJffNG2bWzF4MIG8g0ibZTJKP5VJ.', '', 'Egypt', 'Africa/Cairo', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '2020-04-22', 'G2sy4aiVhN23W6bt7suq9FQ8HNnLCJ2HP9EzF1i9IrMCok8e2n1eq7C7iBt0', '2021-04-21 16:32:22', '2021-04-21 16:32:22', '00000', 'Iman@khouse.com'),
(27, 'Admin', '16191206291160117832FB icon.jpg', 0, 3, '0', NULL, NULL, '$2y$10$FlLDwYVWl16hYI4jeArjjuoxyQAtMld65xVpjvzi9TaoIHzbaeU/e', '', 'Egypt', 'Africa/Cairo', '', 'Graduate', '', '', '', '', '', '', '', '', '', 1, '', '', '', 'Male', '2020-04-22', '68m5wVFi0JVnY3L02Zdjo3UBNuCFPww6euj01bGW718DmEt9vg3GW002mWj1', '2021-04-21 16:38:38', '2021-06-02 07:47:50', '000', 'admin@khouse.com'),
(59, 'Mohamed Ismail', '1619168172553272314محمد.jpg', 0, 1, 'Monday-\r\nTuesday-\r\nWednesday-\r\nThursday-\r\nFriday-\r\nSaturday-\r\nSunday-', NULL, NULL, '$2y$10$7c.zBqwpOAgkEUd1QOt4WuwuTexWceg/UHkz.H/BUFDdU/JDOQIPq', 'Abees 2-8 Muharram Beh, Alexandria', 'Egypt', 'Africa/Cairo', '', 'Graduate', '', 'Faculty of Languages and Translation - Department of Islamic Studies in English', '29410301801958', '', '', '', '', '', '1619168172837622340view[1]', 1, 'https://calendar.google.com/calendar/embed?src=mo7amed2225%40gmail.com&ctz=Africa%2FCairo', 'I am a hard working person who does not give up easily. During my degree, I have developed an excellent eye for detail due to the heavy demands of assignments and research. As a result, I am also able to work under pressure and this enhances my determination and provokes me to complete the required job in the best and the most precise form. \r\nIn 2011, I was a student council president. I also took part in a number of the al-Azhar academic retreats and workshops in collaboration with international institutions; like the Dutch institute in El-Zamalek, Cairo; the Embassy of Netherlands in Cairo, etc…', 'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09', 'Male', '1994-10-30', '56JgslWLckuBR9COtJPKJQrmH2Bq8RNQBmP1C2PCQL6SQeZl5pmaueFVBFth', '2021-04-23 14:56:12', '2021-06-02 03:02:24', '+201030663326', 'mo7amed2225@gmail.com'),
(60, 'Lamiaa Ali', '', 0, 1, 'Monday-\r\nTuesday-\r\nWednesday-\r\nThursday-\r\nFriday-\r\nSaturday-\r\nSunday-', NULL, NULL, '$2y$10$ahsuntv0FLtzWvxEE7mQqOIvoW52JdrSjEy.Wfc4KeAow/F9uEeDa', 'Abees 2-8 Muharram Beh, Alexandria', 'Egypt', 'Africa/Cairo', '', 'Graduate', '', 'Faculty of veterinary medicine', '29709141802648', '', '', '', '', '', '', 0, 'https://calendar.google.com/calendar/embed?src=t83us4o8qiks8l0dc7m94m30ag%40group.calendar.google.com&ctz=Africa%2FCairo', '', 'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09', 'Female', '1997-09-14', 'l49d6JNHmbbutzBrlzgxXhE08O1HtdXI2D0AjUXAiZYgsdnRf0eGB53huCii', '2021-04-24 02:30:14', '2021-06-02 03:02:07', '+201203211908', 'lamiaaali1997@gmail.com'),
(69, 'Ahmed Ismail', '16193889991914564901AHD.png', 0, 1, 'Monday-\r\nTuesday-\r\nWednesday-\r\nThursday-\r\nFriday-\r\nSaturday-\r\nSunday-', NULL, NULL, '$2y$10$2okzr1wQOm0eFuYnxQx3bODE15KZoncLaSjophtP4dGeNsizvhkue', 'Alexandria', 'Egypt', 'Africa/Cairo', '', 'Graduate', '0', 'Al-Azhar University College of Sharia and Law', '54598765426586', '', '', '', '', '', '', 0, 'https://calendar.google.com/calendar/embed?src=deeec6mvncmh2kq6vgp46agnp0%40group.calendar.google.com&ctz=Africa%2FCairo', '', 'https://us04web.zoom.us/j/2503526540?pwd=OWxJYXRKU1NDNm9TN3BVWVVrMTUyUT09', 'Male', '1991-02-11', 'UNfs9fBIqUg1BFEbtjTXDVxXlcCB13X67vPfZdTW3rorQxQVzgMps26Tivrj', '2021-04-26 04:16:39', '2021-04-26 04:16:39', '+101222501445', 'a7med0122@gmail.com'),
(73, 'Ammon Winder', '', 0, 2, '0', NULL, NULL, '$2y$10$ZG/BnGJronItDnqOmjkw8.XxVGoVKBsMbeHe08NdXlMBtnpjd1y4a', 'Charlottesville, Virginia, United States', 'United States', 'America/New_York', '10000', '', '0', '', '', '', '', 'Active', 'Studying Quranic reciation. started from the Arabic Alphabet. he is able now to read Arabic words.', '', '', 0, '', '', '', '', '2020-04-22', 'UTxVNyDff0TJ8VOEZTS9yndgM7911dJbS4XlZ2svcOnikSyYTqPEemswMyxN', '2021-06-02 01:39:08', '2021-06-02 01:39:08', '+1804 914 0739', 'askchairmenkapow@gmail.com'),
(74, 'Wassem Butt', '', 0, 2, '0', NULL, NULL, '$2y$10$Lt3xkvUN.GdqJoLh0q4SfOheKpauHWiMstJZBLIs5ehc83nVS2qCG', 'Los Angeles, USA', 'United States', 'America/Los_Angeles', '10001', '', '0', '', '', '', '', 'Active', 'Studying Quranic recitation. Started from al-Fatihah.', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-06-02 01:41:33', '2021-06-02 01:41:33', '+19513128633', 'suuper7@gmail.com'),
(75, 'Gretchen Head', '', 0, 2, '0', NULL, NULL, '$2y$10$hs6vwVCuvoWEEQG9LHwZ6OuidF1dKCPaz1gjJOi.wt2h.OO40Clo6', 'Asia, Singapore', 'Singapore', 'Asia/Singapore', '10002', '', '0', '', '', '', '', 'Active', 'Studying the Arabic language from a religious point of view.\r\nWants to focus on the meaning of the Quran. She is interested in studying classical Arabic books.', '', '', 0, '', '', '', '', '2020-04-22', 'N6NkN0pmkemMydEuof3ywnGHy4ZKk2dGw1mwg8pxkDJj3tdWq788TeK2aIIL', '2021-06-02 01:44:34', '2021-06-02 01:44:34', '+6590262443', 'gretchen.head@yale-nus.edu.sg'),
(76, 'Hina Gueizmir', '', 0, 2, '0', NULL, NULL, '$2y$10$qW0dYfUL3qJhuOvIh39zouuODFIV2TdOUrXhPi44r7jj6v95jLb0m', 'Loma Linda, US', 'United States', 'America/Los_Angeles', '10003', '', '0', '', '', '', '', 'Active', 'Studying Quranic recitation and Arabic language from Al-Arabya Bayn Yadaik.', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-06-02 01:47:43', '2021-06-02 01:47:43', '+15044447832', 'lymphnode@live.com'),
(77, 'Huda Al-Marashi', '', 0, 2, '0', NULL, NULL, '$2y$10$vgM5J7KgXqLlN8eQdUfiluQNiDkVFqPb2/LcBT8awk2buAxCXf8lC', 'California, US', 'United States', 'America/Los_Angeles', '10004', '', '0', '', '', '', '', 'Active', 'Studying Arabic conversation and Quranic recitation', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-06-02 01:49:48', '2021-06-02 01:49:48', '+19519666126', 'huda.almarashi@gmail.com'),
(78, 'Nick Orzech', '', 0, 2, '0', NULL, NULL, '$2y$10$Ogtk5yr3vwR6zxfWevbmAOftIT7FWQEcICdJZPAkfJvE5KGqnmu/K', 'United States', 'United States', 'America/North_Dakota/Center', '10005', '', '0', '', '', '', '', 'Active', 'Studying Arabic language from 50 short stories book.', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-06-02 01:52:13', '2021-06-02 01:52:13', '+15129192529', 'nickorzech1@gmail.com'),
(80, 'Farrah and Danial', '', 0, 2, '0', NULL, NULL, '$2y$10$mwiQskRxHw8l5fQjtU5diOd2BqR18nIhlI3I5JPeFymInvidH1GYq', 'Los Angeles, USA', 'United States', 'America/Los_Angeles', '10001', '', '0', '', '', '', '', 'Active', 'Quran recitation classes with Tajweed. He is reciting Quran from al-Nas', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-06-02 01:56:53', '2021-06-02 01:56:53', '+19513128633', 'farrahdanial@khouse.com'),
(81, 'Fatimah Farooq', '', 0, 2, '0', NULL, NULL, '$2y$10$vWreCjaxpeYxGtmkP3OCSeYSZ2sbzTxfsPk2/EqjUsCBSgr6tBiuG', 'London, UK', 'United Kingdom', 'Europe/London', '10006', '', '0', '', '', '', '', 'Active', 'Studying conversational Arabic and interested in increasing their vocabulary and learning grammar. She is learning how to  speak Arabic', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-06-02 02:00:04', '2021-06-02 02:00:04', '+447368155209', 'fatimanaveed21@gmail.com'),
(82, 'Fatimah zahra Markwith', '', 0, 2, '0', NULL, NULL, '$2y$10$TllkR9sw5zCKoEmRFw4uPuR9E4wCj9E4n/2JUGihkv.40MecdgEGK', 'Los Angeles, USA', 'United States', 'America/Los_Angeles', '10007', '', '0', '', '', '', '', 'Active', 'She has started with leaning the Arabic Alphabet and she is able to read now.', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-06-02 02:02:07', '2021-06-02 02:02:07', '+15593609357', 'rand_abbas@yahoo.ca'),
(83, 'Madinah Mir', '', 0, 2, '0', NULL, NULL, '$2y$10$17O77ZYNp8OEgo9wI9dvX.n4FefiRzRdh4lNdhegJ5Nl3.Ob70e9.', 'Los Angeles, USA', 'United States', 'America/Los_Angeles', '10008', '', '0', '', '', '', '', 'Active', 'She has started with leaning the Arabic Alphabet and she is able to read now.', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-06-02 02:04:34', '2021-06-02 02:04:34', '+19095681412', 'MadinahMir@khouse.com'),
(84, 'Manahil Qureshi', '', 0, 2, '0', NULL, NULL, '$2y$10$50O8/WLCkoXYhrACqawXxemt11.eHFvwxUGNrglq7fTmbFXCXwO.O', 'Illinois, United States', 'United States', 'America/Chicago', '10009', '', '0', '', '', '', '', 'Active', 'Manahil already knows the letters but she might have forgotten some of them. That is why she will start with reviewing the letters and diacritics quickly before studying Tajweed rules. The class should be divided between theoretical and practical study. She wants to recite Quran while she is correcting her recitation.', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-06-02 02:12:19', '2021-06-02 02:12:19', '+12025960902', 'drjamshed@gmail.com'),
(85, 'Maria Mir', '', 0, 2, '0', NULL, NULL, '$2y$10$ZH.J0ygUP5FHeF0u.nbrt.SKj9nq2OrChAkdttT1z/pWx4bNLurRK', 'America, Los_Angeles', 'United States', 'America/Los_Angeles', '10008', '', '0', '', '', '', '', 'Active', 'Studying Quranic recitation with Tajweed from the basics. They have finished Noon And meem Sakinah rules.', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-06-02 02:14:58', '2021-06-02 02:14:58', '+19095681412', 'MariaMir@khouse.com'),
(86, 'Marwa Nauman', '', 0, 2, '0', NULL, NULL, '$2y$10$Ds/j2JC29zGX8hfveyh.D.zuMcr1k17.pPBCKxFGJ3v6pUeEQD97K', 'America, Los_Angeles', 'United States', 'America/Los_Angeles', '10003', '', '0', '', '', '', '', 'Active', 'Studying Quranic recitation with Tajweed from the basics and reciting Quran from al-Baqarah.', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-06-02 02:17:34', '2021-06-02 02:17:34', '+15044447832', 'marwanauman@gmail.com'),
(87, 'Omar Mir', '', 0, 2, '0', NULL, NULL, '$2y$10$HPoUx7wkKoKZtNu7aQD.eOTzxW1E3l22Ecg5UmkrrVoUm9Idi56Im', 'America, Los_Angeles', 'Select Your Country', 'Africa/Cairo', '10008', '', '0', '', '', '', '', 'Active', 'Studying Quranic recitation with Tajweed from the basics. They have finished Noon And meem Sakinah rules.', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-06-02 02:19:23', '2021-06-02 02:19:23', '+19095681412', 'lmftmaria@gmail.com'),
(88, 'Sinan and Sundus', '', 0, 2, '0', NULL, NULL, '$2y$10$1nWjrnP7GYHwrqNOM1Me4.qDFzEwsyodOMZeHvGyx4xw3K5bmk6Qq', 'America, Los_Angeles', 'United States', 'America/Los_Angeles', '10010', '', '0', '', '', '', '', 'Active', 'He has finished the Arabic Alphabet and is doing Quran memorization classes currently\r\nShe is doing Quran memorization classes currently', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-06-02 02:25:10', '2021-06-02 02:25:10', '+19515006084', 'dahlia_jaffer@yahoo.com'),
(89, 'Rumi Randy', '', 0, 2, '0', NULL, NULL, '$2y$10$ASort2hCCUCh9JDSWDvFaev48zVru46SOQCWF6sykJ6EXyesZEBd2', 'America/Anchorage', 'United States', 'America/Anchorage', '10011', '', '0', '', '', '', '', 'Active', 'Rumi is doing Quran recitation classes currently. He is able to read but slowly so far.', '', '', 0, '', '', '', '', '2020-04-22', 'XgDHCzejyIBQ236UDCYrEqT14fOPj4UrZ6JiwjZmFi269FDdXubKjSCj28x4', '2021-06-02 02:35:22', '2021-06-02 02:35:22', '+14157224420', 'ayesha_mattu@yahoo.com'),
(90, 'Danial Farooq', '', 0, 2, '0', NULL, NULL, '$2y$10$6g0Y3CqXMLmCN5MoMW2I1uowdu9f.pTiGmC0iPW/P5q76EgT0/TY6', 'London, United Kingdom', 'United States', 'Europe/London', '10006', '', '0', '', '', '', '', 'Active', 'Studying conversational Arabic and interested in increasing their vocabulary and learning grammar. He can speak Arabic.', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-06-02 02:37:27', '2021-06-02 02:37:27', '+44 7576 725527', 'danialf64@gmail.com'),
(91, 'Haaris Abdul sattar', '', 0, 2, '0', NULL, NULL, '$2y$10$HcoTaeDSkU95p07kfph.a.aI/kTpue2AfsRuCzw9Tj4WbP.gCe.5q', 'America/Chicago', 'United States', 'America/Chicago', '10012', '', '0', '', '', '', '', 'Active', 'ذكي يستوعب بسرعة. قرأ القرآن مرة مع أكثر من معلم ومعلمة لكنهم لم يكونوا يصححون تلاوته فقرأه بدون احكام وانتهى من في رمضان الماضي.ويريد أن يقرأه مرة أخرى لكن مع ضبط الأحكام وتصحيحها.  عمره ١٢ عاما. يقرأ بسرعة جيدة لكن ليس لديه ضبط للحروف أو لاحكام التجويد. يقرأ بدون غنن ولا يعرف اسماء الحركات ولكن يعرف استخدامها. لا يعرف أحكام النون ولا التنوين.', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-06-02 02:39:58', '2021-06-02 02:39:58', '+14053145072', 'drtariqsattar@gmail.com'),
(92, 'Leya Qureshi', '', 0, 2, '0', NULL, NULL, '$2y$10$7KUSyqr4V/VruDj7iw9G8ONUXwwVpw3E1v3EfzzDIY2rQ0NDI4sZy', 'Illinois, US', 'United States', 'America/Chicago', '10009', '', '0', '', '', '', '', 'Active', 'Leya already knows the letters but she might have forgotten some of them. That is why she will start with reviewing the letters and diacritics quickly before studying Tajweed rules. The class should be divided between theoretical and practical study. She wants to recite Quran while she is correcting her recitation.', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-06-02 02:55:59', '2021-06-02 02:55:59', '12025960902', 'leyaqureshi@khouse.com'),
(93, 'Kamal Southall', '', 0, 2, '0', NULL, NULL, '$2y$10$LjLehv0UoQeZPFteeJv0j.vNWaeFK1Iq//YwPceSQi4L5io75ejzm', 'Greenwich Mean', 'United States', 'America/Chicago', '10013', '', '0', '', '', '', '', 'Active', 'لم يدرس التجويد قبل ذلك مع شيخ ولكن بعض زملاءه علموه قراءة القران منذ وقت طويل\r\nوالداه اعتنقا الإسلام منذ 50 عاما، يعمل IT ولكن عمله غير مستقر هذه الأيام بسبب كورونا\r\nعنده ضعف في الترقيق والتفخيم لكن قراءته سريعة بشكل جيد ولكن فقط يريد تصحيح التلاوة ويمكن تحسين سرعة القراءة لديه بشكل ملحوظ. فهو يقرأ كالعرب بدون أحكام.\r\nسيبدأ بدراسة أحكام التجويد من النون الساكنة والتنوين إن شاء الله.\r\nيريد أيضا الحفظ لكن عدد قليل من الآيات لو آية واحدة أو اثنتين حسب ما يتثنى له.\r\nيحفظ الناس والفلق والإخلاص والتين والقدر وعدد من آيات من سور أخرى. سيراجع ما يحفظه في بداية كل درس حتى يثبته وسيضيف عدد قليل من الايات في كل مرة.\r\nسيدرس 4 مرات في الأسبوع . نصف ساعة في كل مرة وينوي أن يزيد المدة بعد عدد قليل من الدروس.\r\nمتاح أيام', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-06-02 13:31:49', '2021-06-02 13:31:49', '+15135466267', 'Southallgroup@gmail.com'),
(94, 'Supto', '', 0, 3, '0', NULL, NULL, '$2y$10$aO1yGf7hlUUEtzzf6MrzquUjOrQmo3efWnr2Hh.KPm4IOZ6if.a5O', '', 'Egypt', 'Africa/Cairo', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '2020-04-22', '4yUUfXwHyVhDNMK5dSt74HHPmu0KOsekCzHCowT78DWCmNLcMcztmq2aU77V', '2021-06-03 13:21:49', '2021-06-03 13:21:49', '1111', 'supto@khouse.com');

-- --------------------------------------------------------

--
-- Table structure for table `waitings`
--

CREATE TABLE `waitings` (
  `id` int(11) UNSIGNED NOT NULL,
  `student_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `done` int(11) NOT NULL DEFAULT '0',
  `reach` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `follower` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_to_contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `waitings`
--

INSERT INTO `waitings` (`id`, `student_info`, `contact`, `done`, `reach`, `follower`, `time_to_contact`, `created_at`, `updated_at`) VALUES
(4, 'Rahil Akhdar', '* Email  :\r\n    * Mobile :\r\n    * FB     :\r\n    *  Other :', 1, 'Others', 'Mr/ mohamed  Ismail', '2021-06-01', '2021-04-28 16:44:23', '2021-06-01 10:25:22'),
(5, 'Malik ibn Dinar', '* Email  :\r\n    * Mobile :\r\n    * FB     :\r\n    *  Other :', 1, 'Whatsapp', 'Mr/ mohamed  Ismail', '2021-05-01', '2021-04-28 16:45:10', '2021-05-01 16:45:48'),
(6, 'Mairaj Sayed', '* Email  :\r\n    * Mobile :\r\n    * FB     :\r\n    *  Other :', 0, 'Whatsapp', 'Mr/ mohamed  Ismail', '2021-06-15', '2021-04-28 16:45:30', '2021-04-28 16:45:30'),
(7, 'sifat raihan', '* Email  :\r\n    * Mobile :\r\n    * FB     :\r\n    *  Other :', 0, 'Whatsapp', 'Mr/ mohamed  Ismail', '2021-05-10', '2021-04-28 16:46:51', '2021-04-28 16:46:51'),
(8, 'Sara', '* Email  :\r\n    * Mobile :\r\n    * FB     :\r\n    *  Other :', 0, 'Whatsapp', 'Mr/ mohamed  Ismail', '2021-04-01', '2021-04-28 16:47:23', '2021-04-28 16:47:23'),
(9, 'Munib Ismail', '* Email  :\r\n    * Mobile :\r\n    * FB     :\r\n    *  Other :', 1, 'Whatsapp', 'Mr/ mohamed  Ismail', '2021-04-29', '2021-04-28 16:48:21', '2021-04-29 09:14:45'),
(10, 'Kasad', '* Email  :\r\n    * Mobile :\r\n    * FB     :\r\n    *  Other :', 1, 'Whatsapp', 'Mr/ mohamed  Ismail', '2021-05-01', '2021-04-28 16:49:36', '2021-05-01 16:45:48'),
(11, 'Raida A Wilson', '* Email  :\r\n    * Mobile :\r\n    * FB     :\r\n    *  Other :', 1, 'Whatsapp', 'Mr/ mohamed  Ismail', '2021-05-13', '2021-05-06 15:35:40', '2021-05-12 23:01:33'),
(12, 'Rahil Akhdar', '* Email  :\r\n    * Mobile :\r\n    * FB     :\r\n    *  Other :', 1, 'Whatsapp', 'Mr/ mohamed  Ismail', '2021-06-01', '2021-05-06 15:36:16', '2021-06-01 10:25:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `changes`
--
ALTER TABLE `changes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestds`
--
ALTER TABLE `requestds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waitings`
--
ALTER TABLE `waitings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `changes`
--
ALTER TABLE `changes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1479;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `requestds`
--
ALTER TABLE `requestds`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `waitings`
--
ALTER TABLE `waitings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
