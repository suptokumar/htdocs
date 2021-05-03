-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 03:52 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_manage`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `payment`, `last_paid`, `key`, `payment_plan`, `payment_usd`, `last_payment_date`, `invoice_number`, `rate`, `child`, `hours`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Client', 'PayPal', '2021-03-18', '16184809121', 'Advance', '75', '2021-03-18', '50', 10, 1, '240', 'a@client', '0000', '2021-04-15 04:01:52', '2021-04-19 13:38:41');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(6, 'Class Title 2', 'Class Description', 'Class Link', 'Quran Memorization', 60, 'America/New_York', '2021-04-21 21:00:00', 'a@teacher', 'a@student', '10', '11', '', '', ',Tuesday,Thursday,Saturday', '16188469701244824752', '2021-04-20 21:00:00', '2021-04-19 09:42:50', '2021-04-20 03:20:20'),
(7, 'al-Mulk.zip', '75757', '475', 'Quran Recitation', 45, 'Europe/London', '1970-01-01 01:00:00', 'a@teacher', 'a@student', '10', '11', '', '', '', '16188627531970567403', NULL, '2021-04-19 19:05:53', '2021-04-19 19:05:53'),
(8, 'ddg', 'dgfdg', 'dfg', 'Quran Recitation', 50, 'Africa/Cairo', '2021-04-19 09:00:00', 'a@teacher', 'a@student', '10', '11', '', '', '', '1618864191771800460', '2021-04-19 09:00:00', '2021-04-19 20:29:51', '2021-04-19 20:39:27'),
(9, 'dfgh', 'dfhg', 'fdhgd', 'Quran Recitation', 50, 'Africa/Cairo', '2021-04-19 21:00:00', 'a@teacher', 'a@student', '10', '11', '', '', '', '16188648431026926517', '2021-04-19 21:00:00', '2021-04-19 20:40:43', '2021-04-19 20:40:47'),
(10, 'dgdfg', 'gdfg', 'fgdg', 'Quran Recitation', 45, 'Europe/London', '2021-04-22 21:00:00', 'a@teacher', 'a@student', '10', '11', '', '', '', '1618865684126612872', NULL, '2021-04-19 19:54:44', '2021-04-19 19:54:44');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_10_145552_create_courses_table', 1),
(5, '2021_04_12_032718_create_notifications_table', 1),
(6, '2021_04_14_041832_create_clients_table', 1),
(7, '2021_04_15_043641_create_payments_table', 1),
(8, '2021_04_16_043946_create_reports_table', 2),
(9, '2021_04_16_141352_create_requests_table', 3),
(10, '2021_04_16_141352_create_requestds_table', 4),
(13, '2021_04_18_164511_create_waitings_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(52, 'Admin', '2021-04-16 06:30pm', 'You have a new request from rashidkhan@gmail.com', 1, '2021-04-16 12:30:46', '2021-04-16 09:35:34'),
(53, '2', '2021-04-16 06:30pm', 'You made a new request.', 1, '2021-04-16 12:30:46', '2021-04-16 09:54:32'),
(54, '7', '2021-04-16 09:30pm', 'rashidkhan@gmail.com sent a request to change the schedule of class \'asdf\'.<br> Timezone: Asia/Kolkata<br>Time: 19:49<br>Repeat:,Thursday,Friday,Saturday,Wednesday', 0, '2021-04-16 15:30:46', '2021-04-16 15:30:46'),
(55, 'Admin', '2021-04-16 06:54pm', 'You have a new request from rashidkhan@gmail.com', 1, '2021-04-16 12:54:27', '2021-04-16 09:54:42'),
(56, '2', '2021-04-16 06:54pm', 'You made a new request.', 1, '2021-04-16 12:54:27', '2021-04-16 09:54:32'),
(57, '7', '2021-04-16 09:54pm', 'rashidkhan@gmail.com sent a request to cancel the class \'asdf', 0, '2021-04-16 15:54:27', '2021-04-16 15:54:27'),
(58, 'Admin', '2021-04-16 09:58pm', 'You have a new request from a@c', 1, '2021-04-16 15:58:00', '2021-04-16 10:24:34'),
(59, '7', '2021-04-16 09:58pm', 'You made a new request.', 0, '2021-04-16 15:58:00', '2021-04-16 15:58:00'),
(60, '2', '2021-04-16 06:58pm', 'a@c sent a request to cancel the class(16185470041985711050) \'asdf', 0, '2021-04-16 12:58:00', '2021-04-16 12:58:00'),
(61, 'Admin', '2021-04-16 06:24pm', 'You have a new request from mo7amed2225@gmail.com', 1, '2021-04-16 12:24:22', '2021-04-16 10:24:34'),
(62, '5', '2021-04-16 06:24pm', 'You made a new request.', 1, '2021-04-16 12:24:23', '2021-04-16 21:40:03'),
(63, '6', '2021-04-16 05:24pm', 'mo7amed2225@gmail.com sent a request to change the schedule of class \'Lamiaa\'.<br> Timezone: Europe/London<br>Time: 13:40<br>Repeat:,Thursday,Friday,Saturday,Wednesday', 0, '2021-04-16 11:24:23', '2021-04-16 11:24:23'),
(64, 'Admin', '2021-04-17 05:35am', 'You have a new request from mo7amed2225@gmail.com', 1, '2021-04-16 23:35:04', '2021-04-16 21:35:58'),
(65, '5', '2021-04-17 05:35am', 'You made a new request.', 1, '2021-04-16 23:35:04', '2021-04-16 21:40:03'),
(66, '6', '2021-04-17 04:35am', 'mo7amed2225@gmail.com sent a request to change the schedule of class \'Lamiaa\'.<br> Timezone: Africa/Cairo<br>Time: 05:00<br>Repeat:,Thursday,Friday,Saturday,Wednesday', 0, '2021-04-16 22:35:04', '2021-04-16 22:35:04'),
(67, '5', '2021-04-17 05:36am', ' The request to change class schedule for 16184968891047766730 was Approved.', 1, '2021-04-16 23:36:14', '2021-04-16 21:40:03'),
(68, '6', '2021-04-17 04:36am', ' The request to change class schedule for 16184968891047766730 was Approved.', 0, '2021-04-16 22:36:14', '2021-04-16 22:36:14'),
(69, 'Admin', '2021-04-17 03:36am', ' The request to change class schedule for 16184968891047766730 was Approved.', 1, '2021-04-16 21:36:14', '2021-04-17 05:24:59'),
(70, '6', '2021-04-17 04:37am', 'You have -20 in your account. You should Purchase hour now.', 0, '2021-04-16 22:37:39', '2021-04-16 22:37:39'),
(71, 'Admin', '2021-04-17 05:37am', 'Ahmed has -20 remaining. You can contact him by a7med0122@gmail.com or +201030663326', 1, '2021-04-16 23:37:39', '2021-04-17 05:24:59'),
(72, '5', '2021-04-17 05:37am', 'Ahmed has -20 remaining. You can contact him by a7med0122@gmail.com or +201030663326', 1, '2021-04-16 23:37:39', '2021-04-16 21:40:03'),
(73, '10', '2021-04-19 05:41pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class Title</b><br><p>Class Description</p><br> Class Duration: 60 <br>Class Link: <a href=\'Class Link\'>Class Link</a> <br>Class Starting at: 2021-04-19 <br>Class Time: 07:30pm <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Teacher<br>Students name: Student', 0, '2021-04-19 15:41:10', '2021-04-19 15:41:10'),
(74, '11', '2021-04-19 11:41am', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class Title</b><br><p>Class Description</p><br> Class Duration: 60 <br>Class Link: <a href=\'Class Link\'>Class Link</a> <br>Class Starting at: 2021-04-19 <br>Class Time: 07:30pm <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Teacher<br>Students name: Student', 0, '2021-04-19 09:41:10', '2021-04-19 09:41:10'),
(75, 'Admin', '2021-04-19 05:41pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class Title</b><br><p>Class Description</p><br> Class Duration: 60 <br>Class Link: <a href=\'Class Link\'>Class Link</a> <br>Class Starting at: 2021-04-19 <br>Class Time: 07:30pm <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Teacher<br>Students name: Student', 0, '2021-04-19 15:41:10', '2021-04-19 15:41:10'),
(76, '10', '2021-04-19 05:42pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class Title 2</b><br><p>Class Description</p><br> Class Duration: 60 <br>Class Link: <a href=\'Class Link\'>Class Link</a> <br>Class Starting at: 2021-04-19 <br>Class Time: 09:00pm <br>Repeat:Wednesday,Tuesday,Thursday <br>guests: No Guests <br>Assigned Teacher: Teacher<br>Students name: Student', 0, '2021-04-19 15:42:50', '2021-04-19 15:42:50'),
(77, '11', '2021-04-19 11:42am', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class Title 2</b><br><p>Class Description</p><br> Class Duration: 60 <br>Class Link: <a href=\'Class Link\'>Class Link</a> <br>Class Starting at: 2021-04-19 <br>Class Time: 09:00pm <br>Repeat:Wednesday,Tuesday,Thursday <br>guests: No Guests <br>Assigned Teacher: Teacher<br>Students name: Student', 0, '2021-04-19 09:42:50', '2021-04-19 09:42:50'),
(78, 'Admin', '2021-04-19 05:42pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class Title 2</b><br><p>Class Description</p><br> Class Duration: 60 <br>Class Link: <a href=\'Class Link\'>Class Link</a> <br>Class Starting at: 2021-04-19 <br>Class Time: 09:00pm <br>Repeat:Wednesday,Tuesday,Thursday <br>guests: No Guests <br>Assigned Teacher: Teacher<br>Students name: Student', 0, '2021-04-19 15:42:50', '2021-04-19 15:42:50'),
(79, 'Admin', '2021-04-19 05:44pm', 'You have a new request from a@teacher', 0, '2021-04-19 15:44:52', '2021-04-19 15:44:52'),
(80, '10', '2021-04-19 05:44pm', 'You made a new request.', 0, '2021-04-19 15:44:52', '2021-04-19 15:44:52'),
(81, '11', '2021-04-19 11:44am', 'a@teacher sent a request to change the schedule of class \'Class Title\'.<br> Timezone: America/New_York<br>Time: 05:30<br>Repeat:', 0, '2021-04-19 09:44:52', '2021-04-19 09:44:52'),
(82, '10', '2021-04-19 05:45pm', ' The request to change class schedule for 1618846870922610391 was Approved.', 0, '2021-04-19 15:45:42', '2021-04-19 15:45:42'),
(83, '11', '2021-04-19 11:45am', ' The request to change class schedule for 1618846870922610391 was Approved.', 0, '2021-04-19 09:45:42', '2021-04-19 09:45:42'),
(84, 'Admin', '2021-04-19 05:45pm', ' The request to change class schedule for 1618846870922610391 was Approved.', 0, '2021-04-19 15:45:42', '2021-04-19 15:45:42'),
(85, 'Admin', '2021-04-19 11:47am', 'You have a new request from a@student', 0, '2021-04-19 09:47:15', '2021-04-19 09:47:15'),
(86, '11', '2021-04-19 11:47am', 'You made a new request.', 0, '2021-04-19 09:47:16', '2021-04-19 09:47:16'),
(87, '10', '2021-04-19 05:47pm', 'a@student sent a request to change the schedule of class \'Class Title\'.<br> Timezone: America/New_York<br>Time: 05:30<br>Repeat:', 0, '2021-04-19 15:47:16', '2021-04-19 15:47:16'),
(88, 'Admin', '2021-04-19 11:49am', 'You have a new request from a@student', 0, '2021-04-19 09:49:30', '2021-04-19 09:49:30'),
(89, '11', '2021-04-19 11:49am', 'You made a new request.', 0, '2021-04-19 09:49:30', '2021-04-19 09:49:30'),
(90, '10', '2021-04-19 05:49pm', 'a@student sent a request to change the schedule of class \'Class Title\'.<br> Timezone: Africa/Cairo<br>Time: 19:00<br>Repeat:', 0, '2021-04-19 15:49:30', '2021-04-19 15:49:30'),
(91, '10', '2021-04-19 05:49pm', ' The request to change class schedule for 1618846870922610391 was Approved.', 1, '2021-04-19 15:49:39', '2021-04-19 18:07:30'),
(92, '11', '2021-04-19 11:49am', ' The request to change class schedule for 1618846870922610391 was Approved.', 0, '2021-04-19 09:49:39', '2021-04-19 09:49:39'),
(93, 'Admin', '2021-04-19 05:49pm', ' The request to change class schedule for 1618846870922610391 was Approved.', 0, '2021-04-19 15:49:39', '2021-04-19 15:49:39'),
(94, 'Admin', '2021-04-19 11:52am', 'You have a new request from a@student', 0, '2021-04-19 09:52:25', '2021-04-19 09:52:25'),
(95, '11', '2021-04-19 11:52am', 'You made a new request.', 0, '2021-04-19 09:52:25', '2021-04-19 09:52:25'),
(96, '10', '2021-04-19 05:52pm', 'a@student sent a request to change the schedule of class \'Class Title\'.<br> Timezone: Africa/Cairo<br>Time: 19:00<br>Repeat:', 1, '2021-04-19 15:52:25', '2021-04-19 18:07:30'),
(97, 'Admin', '2021-04-19 11:53am', 'You have a new request from a@student', 0, '2021-04-19 09:53:45', '2021-04-19 09:53:45'),
(98, '11', '2021-04-19 11:53am', 'You made a new request.', 0, '2021-04-19 09:53:45', '2021-04-19 09:53:45'),
(99, '10', '2021-04-19 05:53pm', 'a@student sent a request to change the schedule of class \'Class Title\'.<br> Timezone: Africa/Cairo<br>Time: 19:00<br>Repeat:', 1, '2021-04-19 15:53:45', '2021-04-19 18:07:30'),
(100, 'Admin', '2021-04-19 11:53am', 'You have a new request from a@student', 0, '2021-04-19 09:53:47', '2021-04-19 09:53:47'),
(101, '11', '2021-04-19 11:53am', 'You made a new request.', 0, '2021-04-19 09:53:47', '2021-04-19 09:53:47'),
(102, '10', '2021-04-19 05:53pm', 'a@student sent a request to change the schedule of class \'Class Title\'.<br> Timezone: Africa/Cairo<br>Time: 19:00<br>Repeat:', 1, '2021-04-19 15:53:47', '2021-04-19 18:07:30'),
(103, '10', '2021-04-19 05:54pm', ' The request to change class schedule for 1618846870922610391 was Approved.', 1, '2021-04-19 15:54:00', '2021-04-19 18:07:30'),
(104, '11', '2021-04-19 11:54am', ' The request to change class schedule for 1618846870922610391 was Approved.', 0, '2021-04-19 09:54:01', '2021-04-19 09:54:01'),
(105, 'Admin', '2021-04-19 05:54pm', ' The request to change class schedule for 1618846870922610391 was Approved.', 1, '2021-04-19 15:54:01', '2021-04-19 18:39:42'),
(106, 'Admin', '2021-04-19 12:04pm', 'You have a new request from a@student', 1, '2021-04-19 10:04:18', '2021-04-19 18:39:42'),
(107, '11', '2021-04-19 12:04pm', 'You made a new request.', 1, '2021-04-19 10:04:18', '2021-04-19 18:41:50'),
(108, '10', '2021-04-19 06:04pm', 'a@student sent a request to change the schedule of class \'Class Title\'.<br> Timezone: Africa/Cairo<br>Time: 19:00<br>Repeat:', 1, '2021-04-19 16:04:19', '2021-04-19 18:07:30'),
(109, 'Admin', '2021-04-19 12:04pm', 'You have a new request from a@student', 1, '2021-04-19 10:04:50', '2021-04-19 18:39:42'),
(110, '11', '2021-04-19 12:04pm', 'You made a new request.', 1, '2021-04-19 10:04:50', '2021-04-19 18:41:50'),
(111, '10', '2021-04-19 06:04pm', 'a@student sent a request to change the schedule of class \'Class Title\'.<br> Timezone: Africa/Cairo<br>Time: 19:00<br>Repeat:', 1, '2021-04-19 16:04:50', '2021-04-19 18:07:30'),
(112, '10', '2021-04-19 06:05pm', ' The request to change class schedule for 1618846870922610391 was Approved.', 1, '2021-04-19 16:05:05', '2021-04-19 18:07:30'),
(113, '11', '2021-04-19 12:05pm', ' The request to change class schedule for 1618846870922610391 was Approved.', 1, '2021-04-19 10:05:05', '2021-04-19 18:41:50'),
(114, 'Admin', '2021-04-19 06:05pm', ' The request to change class schedule for 1618846870922610391 was Approved.', 1, '2021-04-19 16:05:05', '2021-04-19 18:39:42'),
(115, 'Admin', '2021-04-19 12:15pm', 'You have a new request from a@student', 1, '2021-04-19 10:15:18', '2021-04-19 18:39:42'),
(116, '11', '2021-04-19 12:15pm', 'You made a new request.', 1, '2021-04-19 10:15:18', '2021-04-19 18:41:50'),
(117, '10', '2021-04-19 06:15pm', 'a@student sent a request to change the schedule of class \'Class Title\'.<br> Timezone: Africa/Cairo<br>Time: 19:00<br>Repeat:', 1, '2021-04-19 16:15:18', '2021-04-19 18:07:30'),
(118, '10', '2021-04-19 06:15pm', ' The request to change class schedule for 1618846870922610391 was Approved.', 1, '2021-04-19 16:15:39', '2021-04-19 18:07:30'),
(119, '11', '2021-04-19 12:15pm', ' The request to change class schedule for 1618846870922610391 was Approved.', 1, '2021-04-19 10:15:39', '2021-04-19 18:41:50'),
(120, 'Admin', '2021-04-19 06:15pm', ' The request to change class schedule for 1618846870922610391 was Approved.', 1, '2021-04-19 16:15:39', '2021-04-19 18:39:42'),
(121, 'Admin', '2021-04-19 12:16pm', 'You have a new request from a@student', 1, '2021-04-19 10:16:03', '2021-04-19 18:39:42'),
(122, '11', '2021-04-19 12:16pm', 'You made a new request.', 1, '2021-04-19 10:16:03', '2021-04-19 18:41:49'),
(123, '10', '2021-04-19 06:16pm', 'a@student sent a request to change the schedule of class \'Class Title\'.<br> Timezone: Africa/Cairo<br>Time: 19:00<br>Repeat:', 1, '2021-04-19 16:16:03', '2021-04-19 18:07:30'),
(124, '10', '2021-04-19 06:16pm', ' The request to change class schedule for 1618846870922610391 was Approved.', 1, '2021-04-19 16:16:12', '2021-04-19 18:07:30'),
(125, '11', '2021-04-19 12:16pm', ' The request to change class schedule for 1618846870922610391 was Approved.', 1, '2021-04-19 10:16:12', '2021-04-19 18:41:49'),
(126, 'Admin', '2021-04-19 06:16pm', ' The request to change class schedule for 1618846870922610391 was Approved.', 1, '2021-04-19 16:16:12', '2021-04-19 18:39:42'),
(127, 'Admin', '2021-04-19 06:21pm', 'You have a new request from a@teacher', 1, '2021-04-19 16:21:16', '2021-04-19 18:39:42'),
(128, '10', '2021-04-19 06:21pm', 'You made a new request.', 1, '2021-04-19 16:21:16', '2021-04-19 18:07:30'),
(129, '11', '2021-04-19 12:21pm', 'a@teacher sent a request to change the schedule of class \'Class Title 2\'.<br> Timezone: America/New_York<br>Time: 21:00<br>Repeat:,Wednesday,Tuesday,Thursday,Friday,Saturday,Sunday,Monday', 1, '2021-04-19 10:21:16', '2021-04-19 18:41:49'),
(130, '10', '2021-04-19 06:21pm', ' The request to change class schedule for 16188469701244824752 was Approved.', 1, '2021-04-19 16:21:25', '2021-04-19 18:07:30'),
(131, '11', '2021-04-19 12:21pm', ' The request to change class schedule for 16188469701244824752 was Approved.', 1, '2021-04-19 10:21:25', '2021-04-19 18:41:49'),
(132, 'Admin', '2021-04-19 06:21pm', ' The request to change class schedule for 16188469701244824752 was Approved.', 1, '2021-04-19 16:21:26', '2021-04-19 18:39:42'),
(133, '11', '2021-04-19 01:19pm', 'You have -60 minutes in your account. You should Purchase hours now.', 1, '2021-04-19 11:19:38', '2021-04-19 18:41:49'),
(134, 'Admin', '2021-04-19 07:19pm', 'Student has -60 minutes remaining. You can contact him by a@student or 000000000', 1, '2021-04-19 17:19:38', '2021-04-19 18:39:42'),
(135, '10', '2021-04-19 07:19pm', 'Student has -60 minutes remaining. You can contact him by a@student or 000000000', 1, '2021-04-19 17:19:38', '2021-04-19 18:07:30'),
(136, 'Admin', '2021-04-19 07:26pm', 'You have a new request from a@teacher', 1, '2021-04-19 17:26:40', '2021-04-19 18:39:42'),
(137, '10', '2021-04-19 07:26pm', 'You made a new request.', 1, '2021-04-19 17:26:40', '2021-04-19 18:07:30'),
(138, '11', '2021-04-19 01:26pm', 'a@teacher sent a request to change the schedule of class \'Class Title\'.<br> Timezone: Africa/Cairo<br>Time: 19:15<br>Repeat:', 1, '2021-04-19 11:26:40', '2021-04-19 18:41:49'),
(139, '10', '2021-04-19 07:27pm', ' The request to change class schedule for 1618846870922610391 was Approved.', 1, '2021-04-19 17:27:48', '2021-04-19 18:07:30'),
(140, '11', '2021-04-19 01:27pm', ' The request to change class schedule for 1618846870922610391 was Approved.', 1, '2021-04-19 11:27:48', '2021-04-19 18:41:49'),
(141, 'Admin', '2021-04-19 07:27pm', ' The request to change class schedule for 1618846870922610391 was Approved.', 1, '2021-04-19 17:27:48', '2021-04-19 18:39:42'),
(142, '11', '2021-04-19 01:27pm', 'You have -120 minutes in your account. You should Purchase hours now.', 1, '2021-04-19 11:27:54', '2021-04-19 18:41:49'),
(143, 'Admin', '2021-04-19 07:27pm', 'Student has -120 minutes remaining. You can contact him by a@student or 000000000', 1, '2021-04-19 17:27:54', '2021-04-19 18:39:42'),
(144, '10', '2021-04-19 07:27pm', 'Student has -120 minutes remaining. You can contact him by a@student or 000000000', 1, '2021-04-19 17:27:54', '2021-04-19 18:07:29'),
(145, 'Admin', '2021-04-19 10:01pm', 'You have a new request from a@teacher', 1, '2021-04-19 20:01:36', '2021-04-19 18:39:42'),
(146, '10', '2021-04-19 10:01pm', 'You made a new request.', 1, '2021-04-19 20:01:36', '2021-04-19 18:07:29'),
(147, '11', '2021-04-19 04:01pm', 'a@teacher sent a request to cancel the class \'Class Title', 1, '2021-04-19 14:01:36', '2021-04-19 18:41:49'),
(148, '10', '2021-04-19 10:05pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>al-Mulk.zip</b><br><p>75757</p><br> Class Duration: 45 <br>Class Link: <a href=\'475\'>475</a> <br>Class Starting at: 1969-12-31 <br>Class Time: 07:00pm <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Teacher<br>Students name: Student', 1, '2021-04-19 20:05:54', '2021-04-19 18:07:29'),
(149, '11', '2021-04-19 04:05pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>al-Mulk.zip</b><br><p>75757</p><br> Class Duration: 45 <br>Class Link: <a href=\'475\'>475</a> <br>Class Starting at: 1969-12-31 <br>Class Time: 07:00pm <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Teacher<br>Students name: Student', 1, '2021-04-19 14:05:54', '2021-04-19 18:41:49'),
(150, 'Admin', '2021-04-19 10:05pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>al-Mulk.zip</b><br><p>75757</p><br> Class Duration: 45 <br>Class Link: <a href=\'475\'>475</a> <br>Class Starting at: 1969-12-31 <br>Class Time: 07:00pm <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Teacher<br>Students name: Student', 1, '2021-04-19 20:05:54', '2021-04-19 18:39:42'),
(151, 'Admin', '2021-04-19 10:23pm', 'You have a new request from a@teacher', 1, '2021-04-19 20:23:44', '2021-04-19 18:39:42'),
(152, '10', '2021-04-19 10:23pm', 'You made a new request.', 1, '2021-04-19 20:23:44', '2021-04-19 18:39:35'),
(153, '11', '2021-04-19 04:23pm', 'a@teacher sent a request to change the schedule of class \'Class Title\'.<br> Timezone: Africa/Cairo<br>Time: 21:00<br>Repeat:', 1, '2021-04-19 14:23:44', '2021-04-19 18:41:49'),
(154, '10', '2021-04-19 10:23pm', ' The request to change class schedule for 1618846870922610391 was Approved.', 1, '2021-04-19 20:23:52', '2021-04-19 18:39:35'),
(155, '11', '2021-04-19 04:23pm', ' The request to change class schedule for 1618846870922610391 was Approved.', 1, '2021-04-19 14:23:52', '2021-04-19 18:41:49'),
(156, 'Admin', '2021-04-19 10:23pm', ' The request to change class schedule for 1618846870922610391 was Approved.', 1, '2021-04-19 20:23:52', '2021-04-19 18:39:42'),
(157, '11', '2021-04-19 04:24pm', 'You have -180 minutes in your account. You should Purchase hours now.', 1, '2021-04-19 14:24:04', '2021-04-19 18:41:49'),
(158, 'Admin', '2021-04-19 10:24pm', 'Student has -180 minutes remaining. You can contact him by a@student or 000000000', 1, '2021-04-19 20:24:04', '2021-04-19 18:39:42'),
(159, '10', '2021-04-19 10:24pm', 'Student has -180 minutes remaining. You can contact him by a@student or 000000000', 1, '2021-04-19 20:24:04', '2021-04-19 18:39:35'),
(160, '10', '2021-04-19 10:29pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>ddg</b><br><p>dgfdg</p><br> Class Duration: 50 <br>Class Link: <a href=\'dfg\'>dfg</a> <br>Class Starting at: 2021-04-19 <br>Class Time: 03:00am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Teacher<br>Students name: Student', 1, '2021-04-19 20:29:51', '2021-04-19 18:39:35'),
(161, '11', '2021-04-19 04:29pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>ddg</b><br><p>dgfdg</p><br> Class Duration: 50 <br>Class Link: <a href=\'dfg\'>dfg</a> <br>Class Starting at: 2021-04-19 <br>Class Time: 03:00am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Teacher<br>Students name: Student', 1, '2021-04-19 14:29:51', '2021-04-19 18:41:49'),
(162, 'Admin', '2021-04-19 10:29pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>ddg</b><br><p>dgfdg</p><br> Class Duration: 50 <br>Class Link: <a href=\'dfg\'>dfg</a> <br>Class Starting at: 2021-04-19 <br>Class Time: 03:00am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Teacher<br>Students name: Student', 1, '2021-04-19 20:29:51', '2021-04-19 18:39:42'),
(163, '10', '2021-04-19 10:40pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>dfgh</b><br><p>dfhg</p><br> Class Duration: 50 <br>Class Link: <a href=\'fdhgd\'>fdhgd</a> <br>Class Starting at: 2021-04-19 <br>Class Time: 03:00pm <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Teacher<br>Students name: Student', 0, '2021-04-19 20:40:43', '2021-04-19 20:40:43'),
(164, '11', '2021-04-19 04:40pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>dfgh</b><br><p>dfhg</p><br> Class Duration: 50 <br>Class Link: <a href=\'fdhgd\'>fdhgd</a> <br>Class Starting at: 2021-04-19 <br>Class Time: 03:00pm <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Teacher<br>Students name: Student', 1, '2021-04-19 14:40:43', '2021-04-19 18:41:49'),
(165, 'Admin', '2021-04-19 10:40pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>dfgh</b><br><p>dfhg</p><br> Class Duration: 50 <br>Class Link: <a href=\'fdhgd\'>fdhgd</a> <br>Class Starting at: 2021-04-19 <br>Class Time: 03:00pm <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Teacher<br>Students name: Student', 1, '2021-04-19 20:40:43', '2021-04-19 18:40:58'),
(166, 'Admin', '2021-04-19 04:50pm', 'You have a new request from a@student', 1, '2021-04-19 14:50:54', '2021-04-20 06:38:02'),
(167, '11', '2021-04-19 04:50pm', 'You made a new request.', 1, '2021-04-19 14:50:54', '2021-04-19 19:09:03'),
(168, '10', '2021-04-19 10:50pm', 'a@student sent a request to change the schedule of class \'Class Title 2\'.<br> Timezone: America/New_York<br>Time: 21:00<br>Repeat:', 0, '2021-04-19 20:50:54', '2021-04-19 20:50:54'),
(169, '10', '2021-04-19 10:51pm', ' The request to change class schedule for 16188469701244824752 was Approved.', 0, '2021-04-19 20:51:17', '2021-04-19 20:51:17'),
(170, '11', '2021-04-19 04:51pm', ' The request to change class schedule for 16188469701244824752 was Approved.', 1, '2021-04-19 14:51:17', '2021-04-19 19:09:03'),
(171, 'Admin', '2021-04-19 10:51pm', ' The request to change class schedule for 16188469701244824752 was Approved.', 1, '2021-04-19 20:51:17', '2021-04-20 06:38:02'),
(172, '10', '2021-04-19 10:54pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>dgdfg</b><br><p>gdfg</p><br> Class Duration: 45 <br>Class Link: <a href=\'fgdg\'>fgdg</a> <br>Class Starting at: 2021-04-22 <br>Class Time: 04:00pm <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Teacher<br>Students name: Student', 0, '2021-04-19 20:54:44', '2021-04-19 20:54:44'),
(173, '11', '2021-04-19 04:54pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>dgdfg</b><br><p>gdfg</p><br> Class Duration: 45 <br>Class Link: <a href=\'fgdg\'>fgdg</a> <br>Class Starting at: 2021-04-22 <br>Class Time: 04:00pm <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Teacher<br>Students name: Student', 1, '2021-04-19 14:54:44', '2021-04-19 19:09:03'),
(174, 'Admin', '2021-04-19 10:54pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>dgdfg</b><br><p>gdfg</p><br> Class Duration: 45 <br>Class Link: <a href=\'fgdg\'>fgdg</a> <br>Class Starting at: 2021-04-22 <br>Class Time: 04:00pm <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Teacher<br>Students name: Student', 1, '2021-04-19 20:54:44', '2021-04-20 06:38:01'),
(175, 'Admin', '2021-04-19 05:09pm', 'You have a new request from a@student', 1, '2021-04-19 15:09:33', '2021-04-20 06:38:01'),
(176, '11', '2021-04-19 05:09pm', 'You made a new request.', 1, '2021-04-19 15:09:33', '2021-04-19 19:27:57'),
(177, '10', '2021-04-19 11:09pm', 'a@student sent a request to cancel the class(1618846870922610391) \'Class Title', 0, '2021-04-19 21:09:33', '2021-04-19 21:09:33'),
(178, '10', '2021-04-19 11:09pm', ' The request delete class 1618846870922610391 was Approved.', 0, '2021-04-19 21:09:51', '2021-04-19 21:09:51'),
(179, '11', '2021-04-19 05:09pm', ' The request delete class 1618846870922610391 was Approved.', 1, '2021-04-19 15:09:51', '2021-04-19 19:27:57'),
(180, 'Admin', '2021-04-19 11:09pm', ' The request delete class 1618846870922610391 was Approved.', 1, '2021-04-19 21:09:51', '2021-04-20 06:38:01'),
(181, 'Admin', '2021-04-20 05:20am', 'You have a new request from a@student', 1, '2021-04-20 03:20:14', '2021-04-20 07:20:18'),
(182, '11', '2021-04-20 05:20am', 'You made a new request.', 0, '2021-04-20 03:20:14', '2021-04-20 03:20:14'),
(183, '10', '2021-04-20 11:20am', 'a@student sent a request to change the schedule of class \'Class Title 2\'.<br> Timezone: America/New_York<br>Time: 21:00<br>Repeat:,Tuesday,Thursday,Saturday', 0, '2021-04-20 09:20:14', '2021-04-20 09:20:14'),
(184, '10', '2021-04-20 11:20am', ' The request to change class schedule for 16188469701244824752 was Approved.', 0, '2021-04-20 09:20:20', '2021-04-20 09:20:20'),
(185, '11', '2021-04-20 05:20am', ' The request to change class schedule for 16188469701244824752 was Approved.', 0, '2021-04-20 03:20:20', '2021-04-20 03:20:20'),
(186, 'Admin', '2021-04-20 11:20am', ' The request to change class schedule for 16188469701244824752 was Approved.', 0, '2021-04-20 09:20:20', '2021-04-20 09:20:20');

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `date`, `user`, `type`, `adder`, `hours`, `invoice`, `fees`, `transfer_fees`, `extra_payment`, `timezone`, `created_at`, `updated_at`) VALUES
(1, '2021-04-15', '6', 'Student', 'Supto', '10', '', '', '', '', 'Africa/Dakar', '2021-04-15 09:02:33', '2021-04-15 09:02:33'),
(2, '2021-04-15', '161849852940', 'Client', 'Supto', '10', '', '', '', '', 'Africa/Dakar', '2021-04-15 09:05:34', '2021-04-15 09:05:34'),
(3, '2021-04-16', '7', 'Student', 'Supto', '10', '', '100', '1110', '210', 'Africa/Dakar', '2021-04-16 21:26:52', '2021-04-16 21:26:52'),
(4, '2021-03-18', '16184809121', 'Client', 'Mohamed Ismail', '2', '50', '20', '5', '', 'Africa/Cairo', '2021-04-19 13:38:41', '2021-04-19 13:38:41'),
(5, '2021-04-18', '11', 'Student', 'Mohamed Ismail', '5', '50', '20', '5', '', 'Africa/Cairo', '2021-04-19 18:27:57', '2021-04-19 18:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
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

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `title`, `description`, `link`, `subject`, `duration`, `timezone`, `starting`, `teacher`, `student`, `t_id`, `s_id`, `guest`, `guest_active`, `repeat`, `ras`, `notes`, `assignment`, `status`, `lastclass`, `created_at`, `updated_at`) VALUES
(13, 'asdf', 'asdfewf', 'asdf', 'Quran Memorization', 30, 'Asia/Kolkata', '2021-04-16 19:27:00', 'rashidkhan@gmail.com', 'a@c', '2', '7', '0', '0', ',Thursday,Friday,Saturday', '16185470041985711050', '16185817041033084262Document_view.docx', '', '1', '2021-04-16 19:27:00', '2021-04-16 10:57:08', '2021-04-16 08:01:44'),
(14, 'Lamiaa', 'slfjlfjl', 'slgjfklsjg', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-16 05:00:00', 'mo7amed2225@gmail.com', 'a7med0122@gmail.com', '5', '6', '1', '1', ',Thursday,Friday,Saturday,Wednesday', '16184968891047766730', 'Mi yea allah gone a yo hosoonso', '', '1', '2021-04-17 05:00:00', '2021-04-16 23:37:39', '2021-04-18 09:19:00'),
(15, 'Class Title', 'Class Description', 'Class Link', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-19 19:00:00', 'a@teacher', 'a@student', '10', '11', '0', '0', '', '1618846870922610391', 'o;lfkhk\'gh', '', '1', '2021-04-19 19:00:00', '2021-04-19 17:19:38', '2021-04-19 15:21:27'),
(16, 'Class Title', 'Class Description', 'Class Link', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-19 19:15:00', 'a@teacher', 'a@student', '10', '11', '0', '0', '', '1618846870922610391', '- Previous assignment: writasjg;ljksd;flgjk;dslkjfg;lsdjk;fhljsd;fljh;gldsjkf;h\r\n- Lesson topic                  :dgs;fgk\';sfkdh;lds\'fh;glks\';fldgh\';sd\r\n- Class performance  dsfdsfgsdfgsdgsdfgsdgfsdfgsfdg\r\n- New assignment     :dfgdsdfsfgsdfdgsdgfdsd', '', '1', '2021-04-19 19:15:00', '2021-04-19 17:27:54', '2021-04-19 15:28:27'),
(17, 'Class Title', 'Class Description', 'Class Link', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-19 21:00:00', 'a@teacher', 'a@student', '10', '11', '1', '1', '', '1618846870922610391', '* Previous assignment:\r\n* Lesson topic       :\r\n* Class performance  :\r\n* New assignment     :', '', '1', '2021-04-19 21:00:00', '2021-04-19 20:24:04', '2021-04-20 06:56:25'),
(18, 'ddg', 'dgfdg', 'dfg', 'Quran Recitation', 50, 'Africa/Cairo', '2021-04-19 09:00:00', 'a@teacher', 'a@student', '10', '11', '1', '1', '', '1618864191771800460', '* Previous assignment:\r\n* Lesson topic       :\r\n* Class performance  :\r\n* New assignment     :', '', '1', '2021-04-19 09:00:00', '2021-04-19 20:39:27', '2021-04-20 06:56:24'),
(19, 'dfgh', 'dfhg', 'fdhgd', 'Quran Recitation', 50, 'Africa/Cairo', '2021-04-19 21:00:00', 'a@teacher', 'a@student', '10', '11', '1', '1', '', '16188648431026926517', '', '', '1', '2021-04-19 21:00:00', '2021-04-19 20:40:47', '2021-04-20 06:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `requestds`
--

CREATE TABLE `requestds` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `available_time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `email_phone_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gurdain_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `graduation` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `hours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id_front` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id_back` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `evalu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_evalu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancel_request` int(11) NOT NULL DEFAULT 0,
  `calender_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `zoom_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateofbirth` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `key`, `type`, `available_time`, `email`, `phone`, `email_verified_at`, `email_phone_at`, `password`, `address1`, `country`, `timezone`, `gurdain_id`, `graduation`, `hours`, `education`, `national_id`, `national_id_front`, `national_id_back`, `status`, `evalu`, `reg_evalu`, `cv`, `cancel_request`, `calender_link`, `bio`, `zoom_link`, `gender`, `dateofbirth`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Mohamed Ismail', '', 0, 3, '10', 'mo7amed2225@gmail.com', '+201200324956', NULL, NULL, '$2y$10$U/YHJ7YG9F6qRSslB0tyg.M1PlUKyVGxUYXpfQegv7Pm736QMeUbW', 'Egypt, alexandria', 'Egypt', 'Africa/Cairo', '', '', '30', 'Faculty of languages and translation', '1215454', '', '', '', '', '', '1618498029546511468profile.jpg', 0, 'ash;ldhg;lsahdg', 'A Hafiz of Quran', 'sdfjgljd;sljkdfg', 'Male', '1994-10-30', 'oZ7tQio1hOvVw1Su2mlqEM4qqIn7sXubF2atqhZiFkLMqnOvWEZTV2ppY8jy', '2021-04-15 08:47:09', '2021-04-18 04:01:47'),
(10, 'Teacher', '16188460572044577378.webp', 0, 1, 'Monday-fksljfdkjl\r\nTuesday-\r\nWednesday-\r\nThursday-\r\nFriday-\r\nSaturday-\r\nSunday-', 'a@teacher', '+201030663326', NULL, NULL, '$2y$10$BI1QzsxDcj3p/VRSuj1Zbe0ikYgkvpEhrOrhy7kj3AjSBWogupFSS', 'Adress', 'Egypt', 'Africa/Cairo', '', 'Graduate', '260', 'Education', 'national id number', '16188460571826582528.webp', '16188460571816311274.webp', '', '', '', '16188460571284946905FB icon.jpg', 1, 'Calender Link', 'Your Bio', 'Zoom Link', 'Male', '1994-10-31', 'YmuxZGBVyQn1uvPDrljaCwOcBt6X3Uyxx500JGfbZn2yl2We7wJ7ZRWF1nka', '2021-04-19 13:27:37', '2021-04-19 18:40:53'),
(11, 'Student', '1618846561311163556.webp', 1, 2, '0', 'a@student', '000000000', NULL, NULL, '$2y$10$hwxsG6tMNx8UBtmCrHQ2C..xibLbXGZxuVow4lAdzqGNYbjRN.Ua.', 'Address', 'Egypt', 'America/New_York', '16184809121', '', '20', '', '', '', '', 'Active', 'Student Evaluation', 'Regular Evaluation', '', 1, '', '', '', '', '1994-10-30', 'hDIzqVkndK7ItBJVPphCxBsfzlwtyVNbpQmZcGeUiAACnzq04v4R6qgVSq6b', '2021-04-19 13:36:01', '2021-04-19 21:09:33'),
(12, 'yrger', '', 0, 2, '0', 'fghdf@fjfgj', '00011414', NULL, NULL, '$2y$10$ZUzRUvzDfqlgEJTG9kGw0uKb.ygS.yONZbBrG3XBlm8xXK6OuIvEq', '', 'Select Your Country', 'Africa/Cairo', '', '', '0', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '1994-10-30', NULL, '2021-04-19 17:48:06', '2021-04-19 17:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `waitings`
--

CREATE TABLE `waitings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reach` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `follower` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_to_contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `waitings`
--

INSERT INTO `waitings` (`id`, `student_info`, `contact`, `reach`, `follower`, `time_to_contact`, `created_at`, `updated_at`) VALUES
(2, 'Waiting list', 'a@waitinglist', 'Facebook', 'Mohamed Ismail', 'Fri May 17', '2021-04-19 13:36:58', '2021-04-19 13:36:58'),
(3, 'fdgfdfd', '* Email  :\r\n    * Mobile :\r\n    * FB     :\r\n    *  Other :', 'Whatsapp', 'dgfdgf', '2021-04-21', '2021-04-20 06:32:35', '2021-04-20 06:32:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`),
  ADD UNIQUE KEY `clients_phone_unique` (`phone`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `waitings`
--
ALTER TABLE `waitings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `requestds`
--
ALTER TABLE `requestds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `waitings`
--
ALTER TABLE `waitings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
