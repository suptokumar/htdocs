-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 10:33 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

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
(17, '1619280461426043543', 'Africa/Cairo', '1621350000', '', '1621353600', '2021-05-16 09:23:50', '2021-05-16 09:23:50'),
(18, '16208343291250152768', 'Africa/Cairo', '1621404000', '0', '', '2021-05-16 09:41:02', '2021-05-16 09:41:02'),
(20, '1621180221981811900', 'Africa/Cairo', '1621288800', '', '1621360800', '2021-05-16 10:09:46', '2021-05-16 10:09:46');

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
(4, 'Gretchen Head', 'PayPal', '1111-11-11', '161901408386', 'Advance', '', '', '', 20, 1, '0', '2021-04-21 20:08:03', '2021-04-23 01:28:01', 'gretchen.head@yale-nus.edu.sg', '+6590262443'),
(5, 'Waled Ashraf', 'PayPal', '1111-11-11', '161901672829', 'Advance', '', '', '', 10, 1, '180', '2021-04-21 20:52:08', '2021-05-01 17:59:32', 'hellowaleed@hotmail.com', '+971507635105'),
(6, 'Sara Mostavic', 'PayPal', '1111-11-11', '161901705130', 'Advance', '', '', '', 10, 1, '0', '2021-04-21 20:57:31', '2021-04-21 20:57:31', 'smostafavi@gmail.com', '+1 (510) 684-3068⁩'),
(7, 'Danial Farooq', 'PayPal', '1111-11-11', '161901719165', 'Advance', '', '', '', 8, 1, '180', '2021-04-21 20:59:51', '2021-05-01 18:23:56', 'danialf64@gmail.com', '+447576725527'),
(8, 'Hisham Hamouda', 'Others', '1111-11-11', '161901778321', 'Advance', '', '', '', 100, 1, '0', '2021-04-21 21:09:43', '2021-04-21 21:09:43', 'heshamhamoda@yahoo.com', '+16173096801'),
(9, 'Wasif Khan', 'Ria', '1111-11-11', '161901812147', 'Advance', '', '', '', 10, 1, '960', '2021-04-21 21:15:21', '2021-05-01 18:30:34', 'wasifkhan786@hotmail.com', '+44 7930 363826'),
(10, 'Mohamed Khan', 'PayPal', '1111-11-11', '161901828089', 'Advance', '', '', '', 10, 1, '420', '2021-04-21 21:18:00', '2021-05-01 19:15:57', 'fahadasad1@gmail.com', '+1 (347) 257-7836'),
(11, 'Rizwan Shaikh', 'PayPal', '1111-11-11', '161901852590', 'Advance', '', '', '', 8, 1, '0', '2021-04-21 21:22:05', '2021-04-21 21:22:05', 'rinzyyy@gmail.com', '+1 (732) 692-4131'),
(12, 'Waseem But', 'PayPal', '1111-11-11', '161901891361', 'Advance', '', '', '', 8, 1, '240', '2021-04-21 21:28:33', '2021-05-01 18:21:44', 'suuper7@gmail.com', '+1 (951) 312-8633'),
(13, 'Huda al-Marashi', 'PayPal', '1111-11-11', '161901902154', 'In arrears', '', '', '', 10, 1, '-600', '2021-04-21 21:30:21', '2021-05-01 18:45:18', 'huda.almarashi@gmail.com', '+1 (951) 966-6126'),
(14, 'Dhalia Jaafar', 'PayPal', '1111-11-11', '161901922713', 'Advance', '', '', '', 10, 1, '0', '2021-04-21 21:33:47', '2021-04-21 21:33:47', 'dahlia_jaffer@yahoo.com', '+1 (951) 500-6084'),
(15, 'Tasneef', 'PayPal', '1111-11-11', '161901962765', 'Advance', '', '', '', 10, 1, '60', '2021-04-21 21:40:27', '2021-05-01 19:21:18', 'tasneefm@gmail.com', '+44 7896 273337'),
(16, 'Irfan', 'PayPal', '1111-11-11', '161901972946', 'Advance', '', '', '', 10, 1, '0', '2021-04-21 21:42:09', '2021-04-21 21:42:09', 'irfanrajput@msn.com', '+44 7462 558280'),
(17, 'Omar Mir', 'PayPal', '1111-11-11', '161902036212', 'Advance', '', '', '', 10, 1, '240', '2021-04-21 21:52:42', '2021-05-01 18:57:13', 'lmftmaria@gmail.com', '+1 (909) 568-1412'),
(18, 'Hina Gueizmir', 'PayPal', '1111-11-11', '161902051658', 'Advance', '', '', '', 12, 1, '480', '2021-04-21 21:55:16', '2021-05-01 18:40:08', 'lymphnode@live.com', '+1 (504) 444-7832'),
(19, 'Iqbal Khan', 'PayPal', '1111-11-11', '161904960123', 'In arrears', '', '', '', 10, 1, '-360', '2021-04-22 06:00:01', '2021-05-01 18:17:18', 'mrawaisalikhan2006@gmail.com', '+4407365063606'),
(20, 'Aysha', 'PayPal', '1111-11-11', '161904978711', 'Advance', '', '', '', 10, 1, '180', '2021-04-22 06:03:07', '2021-05-01 19:03:20', 'ayesha_mattu@yahoo.com', '+1 (415) 722-4420'),
(21, 'Test', 'PayPal', '2021-04-21', '161916702982', 'Advance', '', '', '', 8, 1, '420', '2021-04-23 14:37:09', '2021-04-23 15:05:40', 'b@b', '00'),
(22, 'Namirah Qureshi', 'PayPal', '2021-05-02', '161925521542', 'Advance', '105', '2021-05-02', '106', 10, 1, '10', '2021-04-24 15:06:55', '2021-05-06 18:13:33', 'drjamshed@gmail.com', '+12025960902'),
(23, 'Ammon Winder', 'PayPal', '1111-11-11', '16198706598', 'Advance', '', '', '', 10, 1, '360', '2021-05-01 18:04:19', '2021-05-01 18:04:54', 'askchairmenkapow@gmail.com', '+1804 914 0739'),
(24, 'Anu kmt', 'PayPal', '1111-11-11', '161987094278', 'Advance', '', '', '', 10, 1, '0', '2021-05-01 18:09:02', '2021-05-01 18:09:02', 'Anukemet@hotmail.com', '13018065122'),
(25, 'Haaris Abdul sattar', 'PayPal', '1111-11-11', '161987262637', 'Advance', '', '', '', 10, 1, '120', '2021-05-01 18:37:06', '2021-05-01 18:37:42', 'drtariqsattar@gmail.com', '+14053145072');

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
(38, 'class with Sundus Jaafer', 'Quran memorization and recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Memorization', 30, 'Africa/Cairo', '2021-04-24 21:00:00', 'lamiaaali1997@gmail.com', 'SundusJaafar@khouse.com', '60', '37', ',SundusJaafar@khouse.com', ',0', ',Saturday', '1619264923813023671', '2021-05-08 21:00:00', '2021-04-24 19:48:43', '2021-05-09 06:26:02'),
(39, 'class with Sinan Jaafer', 'Quran memorization and recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Memorization', 30, 'Africa/Cairo', '2021-04-24 21:30:00', 'lamiaaali1997@gmail.com', 'dahlia_jaffer@yahoo.com', '60', '35', ',dahlia_jaffer@yahoo.com', ',0', ',Saturday', '16192650291487421430', '2021-05-08 21:30:00', '2021-04-24 19:50:29', '2021-05-09 06:26:02'),
(40, 'class with Leya Qureshi', 'Quran recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 20:00:00', 'lamiaaali1997@gmail.com', 'leyaqureshi@khouse.com', '60', '55', ',leyaqureshi@khouse.com', ',0', ',Sunday,Saturday', '1619265587653001529', '2021-05-09 20:00:00', '2021-04-24 19:59:47', '2021-05-10 05:26:44'),
(41, 'class with  Manahil Qureshi', 'Quran recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 20:30:00', 'lamiaaali1997@gmail.com', 'drjamshed@gmail.com', '60', '52', ',drjamshed@gmail.com', ',0', ',Sunday,Saturday', '16192656451227564799', '2021-05-09 20:30:00', '2021-04-24 20:00:45', '2021-05-10 05:26:44'),
(42, 'class with Fatimah farooq', 'Arabic language classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Arabic language', 60, 'Africa/Cairo', '2021-04-24 11:00:00', 'lamiaaali1997@gmail.com', 'fatimanaveed21@gmail.com', '60', '48', ',fatimanaveed21@gmail.com', ',0', ',Sunday,Wednesday', '1619265852649305878', '2021-05-09 11:00:00', '2021-04-24 20:04:12', '2021-05-09 20:33:25'),
(43, 'class with Madinah Mir', 'Quran memorization classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Memorization', 30, 'Africa/Cairo', '2021-04-29 06:00:00', 'lamiaaali1997@gmail.com', 'MadinahMir@khouse.com', '60', '44', ',MadinahMir@khouse.com', ',0', ',Monday', '16192659471397979304', '2021-05-03 06:00:00', '2021-04-24 20:05:47', '2021-05-04 04:35:38'),
(44, 'class with Maria Mir', 'Quran recitation with tajweed classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 45, 'Africa/Cairo', '2021-04-24 06:30:00', 'lamiaaali1997@gmail.com', 'MariaMir@khouse.com', '60', '45', ',MariaMir@khouse.com', ',0', ',Monday', '1619266032402560240', '2021-05-03 06:30:00', '2021-04-24 20:07:12', '2021-05-04 04:35:38'),
(45, 'class with Omar Mir', 'Quran recitation with Tajweed classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 45, 'Africa/Cairo', '2021-04-24 07:15:00', 'lamiaaali1997@gmail.com', 'lmftmaria@gmail.com', '60', '47', ',lmftmaria@gmail.com', ',0', ',Monday', '1619266097307330879', '2021-05-03 07:15:00', '2021-04-24 20:08:17', '2021-05-04 04:35:38'),
(46, 'class with Farrah Waseem', 'Quran recitation with Tajweed classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 05:00:00', 'lamiaaali1997@gmail.com', 'FarrahButt@khouse.com', '60', '40', ',FarrahButt@khouse.com', ',0', ',Tuesday,Wednesday', '16192661681057687647', '2021-05-05 05:00:00', '2021-04-24 20:09:28', '2021-05-05 12:00:50'),
(47, 'class with Danial Waseem', 'Quran recitation with Tajweed classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 05:30:00', 'lamiaaali1997@gmail.com', 'Danialbutt@khouse.com', '60', '42', ',Danialbutt@khouse.com', ',0', ',Tuesday,Wednesday', '16192662371837333792', '2021-05-05 05:30:00', '2021-04-24 20:10:37', '2021-05-05 12:00:50'),
(48, 'Class with Essa Wasif', 'Arabic language classes', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Arabic language', 30, 'Europe/London', '2021-04-25 18:00:00', 'fodafoda34@gmail.com', 'essa@khouse.com', '19', '53', ',wasifkhan786@hotmail.com', ',0', ',Monday,Wednesday,Friday', '161927590777748476', '2021-05-07 18:00:00', '2021-04-24 21:51:47', '2021-05-08 19:26:46'),
(49, 'Class with Ibrahem Wasif', 'Arabic language classes', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Arabic language', 30, 'Europe/London', '2021-04-25 18:00:00', 'fodafoda34@gmail.com', 'ibrahim@khouse.com', '19', '51', ',wasifkhan786@hotmail.com', ',0', ',Tuesday,Thursday', '16192760641000530377', '2021-05-06 18:00:00', '2021-04-24 21:54:24', '2021-05-07 04:45:52'),
(53, 'Class with Rumi Randy', 'Quran recitation classes.', 'https://us05web.zoom.us/j/4235237721?pwd=L1FKZnc5TVY5NEdrQm9RdWJSSEVCZz09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-05-01 16:00:00', 'dodyhelmy911@gmail.com', 'ayesha_mattu@yahoo.com', '20', '34', ',ayesha_mattu@yahoo.com', ',0', ',Monday,Tuesday,Wednesday,Thursday', '1619277830426620975', '2021-05-01 16:00:00', '2021-05-01 23:23:50', '2021-05-01 18:24:19'),
(54, 'Classe with lena  Mostavic', 'Quran Recitation classes.', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-29 23:30:00', 'abdullahomar2011@gmail.com', 'smostafavi@gmail.com', '21', '62', ',smostafavi@gmail.com', ',0', ',Thursday', '16192784691319367549', '2021-05-13 23:30:00', '2021-04-24 23:34:29', '2021-05-16 04:51:51'),
(57, 'Class with Danial Farooq', 'Quran', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-26 07:00:00', 'abdullahomar2011@gmail.com', 'danialf64@gmail.com', '21', '61', ',danialf64@gmail.com', ',0', ',Monday,Tuesday', '16192793551444855414', '2021-05-11 07:00:00', '2021-04-24 23:49:15', '2021-05-12 14:38:15'),
(58, 'Class with Ala  Mostavic', 'Arabic language classes.', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Arabic language', 60, 'Africa/Cairo', '2021-04-26 20:30:00', 'abdullahomar2011@gmail.com', 'lena@khouse', '21', '63', ',smostafavi@gmail.com', ',0', ',Monday', '1619279708101837764', '2021-05-10 20:30:00', '2021-04-24 23:55:08', '2021-05-12 14:38:15'),
(60, 'Class with Abdullah Waleed', 'Quran Memorization classes.', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 45, 'Africa/Cairo', '2021-04-25 17:00:00', 'abdullahomar2011@gmail.com', 'hellowaleed@hotmail.com', '21', '64', ',hellowaleed@hotmail.com', ',0', ',Sunday,Thursday,Tuesday', '1619280461426043543', '2021-05-16 17:00:00', '2021-04-25 00:07:41', '2021-05-16 11:04:41'),
(62, 'Class with Kareem Jaafar', 'Quran Memorization  classes.', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Quran Memorization', 60, 'Africa/Cairo', '0000-00-00 00:00:00', 'fodafoda34@gmail.com', 'Kareem@khouse.com', '19', '46', ',huda.almarashi@gmail.com', ',0', ',Thursday', '1619281490952495838', '2021-05-06 05:00:00', '2021-04-25 00:24:50', '2021-05-06 11:27:18'),
(63, 'Class with Anu Kmt', 'Quran Recitation   classes.', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Quran Recitation', 45, 'Africa/Cairo', '2021-04-30 14:00:00', 'fodafoda34@gmail.com', 'Anukemet@hotmail.com', '19', '49', ',Anukemet@hotmail.com', ',0', ',Friday,Saturday', '16192817121549497391', '2021-05-08 14:00:00', '2021-04-25 00:28:32', '2021-05-09 06:52:11'),
(64, 'Class with Kareem Jaafar', 'Quran  Memorization  classes.', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-25 20:00:00', 'fodafoda34@gmail.com', 'Kareem@khouse.com', '19', '46', ',huda.almarashi@gmail.com', ',0', ',Sunday', '16192821211682561850', '2021-05-02 20:00:00', '2021-04-25 00:35:21', '2021-05-03 19:48:00'),
(65, 'Class with Tasneef', 'Quran  Memorization  classes.', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-25 20:00:00', 'fodafoda34@gmail.com', 'tasneefm@gmail.com', '19', '54', ',tasneefm@gmail.com', ',0', ',Monday', '16192851511706967376', '2021-05-03 20:00:00', '2021-04-25 01:25:51', '2021-05-04 05:42:00'),
(68, 'Class with Haaris Abdul sattar', 'Quran  Recitation   classes.', 'https://us05web.zoom.us/j/2320923569?pwd=YVVQVk56c3k3K1dYc283Q2JGSmVodz099', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-27 02:30:00', 'saleh2ef@gmail.com', 'drtariqsattar@gmail.com', '22', '32', ',drtariqsattar@gmail.com', ',0', ',Saturday,Tuesday,Wednesday,Thursday,Friday', '16192856561614025181', '2021-05-01 02:30:00', '2021-04-25 01:34:16', '2021-05-02 06:46:36'),
(69, 'Class with Awais Khan', 'Arabic language classes.', 'https://us05web.zoom.us/j/2320923569?pwd=YVVQVk56c3k3K1dYc283Q2JGSmVodz099', 'Arabic language', 60, 'Africa/Cairo', '2021-05-01 15:00:00', 'saleh2ef@gmail.com', 'mrawaisalikhan2006@gmail.com', '22', '29', ',mrawaisalikhan2006@gmail.com', ',0', ',Saturday', '1619286234699589830', '2021-05-01 15:00:00', '2021-04-25 01:43:54', '2021-05-02 03:22:08'),
(71, 'Class with Fatimh zahra markwith', 'Quran recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 22:00:00', 'lamiaaali1997@gmail.com', 'rand_abbas@yahoo.ca', '60', '50', ',rand_abbas@yahoo.ca', ',0', ',Monday,Saturday,Wednesday', '1619298314661381492', '2021-05-08 22:00:00', '2021-04-25 05:05:14', '2021-05-09 06:26:02'),
(73, 'Class wih Waseem Butt', 'Quran recitation with Tajweed classes', 'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09', 'Quran Recitation', 60, 'Africa/Cairo', '2021-04-27 05:00:00', 'mo7amed2225@gmail.com', 'suuper7@gmail.com', '59', '39', ',suuper7@gmail.com', ',0', ',Tuesday,Wednesday', '1619443582755386844', '2021-05-05 05:00:00', '2021-04-26 21:26:22', '2021-05-05 17:48:43'),
(74, 'Class wih Ammon Winder', 'Quran recitation classes', 'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09', 'Quran Recitation', 60, 'Africa/Cairo', '2021-05-01 16:00:00', 'mo7amed2225@gmail.com', 'askchairmenkapow@gmail.com', '59', '41', ',askchairmenkapow@gmail.com', ',0', ',Sunday,Saturday', '1619443792356597289', '2021-05-09 16:00:00', '2021-04-26 21:29:52', '2021-05-13 12:17:27'),
(79, 'Class with Omar Hamoda', 'Arabic class', 'https://us04web.zoom.us/j/2503526540?pwd=OWxJYXRKU1NDNm9TN3BVWVVrMTUyUT09', 'Arabic language', 60, 'Africa/Cairo', '2021-05-03 23:00:00', 'a7med0122@gmail.com', 'omarrocks922@gmail.com', '69', '68', '', '', '', '16194499171732014144', '2021-05-02 23:00:00', '2021-04-26 23:11:57', '2021-04-26 23:17:40'),
(82, 'Gretchen Head', 'Arabic class', 'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09', 'Arabic language', 60, 'Africa/Cairo', '2021-05-04 04:00:00', 'mo7amed2225@gmail.com', 'gretchen.head@yale-nus.edu.sg', '59', '71', ',gretchen.head@yale-nus.edu.sg', ',0', ',Tuesday,Thursday', '1619703245351318975', '2021-05-06 04:00:00', '2021-04-29 21:34:05', '2021-05-07 22:27:38'),
(83, 'Class with Kamal Southall', 'Quran', '\"https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09 \"', 'Quran Memorization', 30, 'Africa/Cairo', '2021-05-01 00:00:00', 'fodafoda34@gmail.com', 'Southallgroup@gmail.com', '19', '31', ',Southallgroup@gmail.com', ',0', ',Saturday,Sunday,Tuesday,Thursday', '16199894921742815004', '2021-05-09 00:00:00', '2021-05-03 05:04:52', '2021-05-09 06:52:11'),
(84, 'Class with Awais Khan', 'Arabic language classes.', 'https://us05web.zoom.us/j/2320923569?pwd=YVVQVk56c3k3K1dYc283Q2JGSmVodz099', 'Arabic language', 60, 'Africa/Cairo', '2021-05-02 16:00:00', 'saleh2ef@gmail.com', 'mrawaisalikhan2006@gmail.com', '22', '29', ',mrawaisalikhan2006@gmail.com', ',0', ',Sunday', '1619990361379409526', '2021-05-02 16:00:00', '2021-05-03 05:19:21', '2021-05-03 18:05:48'),
(87, 'Class with Ibrahiem Wasif', 'Ibrahiem', 'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09', 'Arabic language', 60, 'Africa/Cairo', '2021-05-01 10:00:00', 'dodyhelmy911@gmail.com', 'ibrahim@khouse.com', '20', '51', ',wasifkhan786@hotmail.com', ',0', ',Saturday', '1620045324978411757', '2021-05-01 10:00:00', '2021-05-03 20:35:24', '2021-05-03 20:37:20'),
(88, 'Class with Ibrahiem Wasif', 'Ibrahiem', 'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09', 'Arabic language', 60, 'Africa/Cairo', '2021-05-02 09:00:00', 'dodyhelmy911@gmail.com', 'ibrahim@khouse.com', '20', '51', ',wasifkhan786@hotmail.com', ',0', ',Sunday', '1620045360242700294', '2021-05-02 09:00:00', '2021-05-03 20:36:00', '2021-05-03 20:37:20'),
(89, 'Class with Essa Wasif', 'Essa', 'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09', 'Arabic language', 60, 'Africa/Cairo', '2021-05-02 10:00:00', 'dodyhelmy911@gmail.com', 'essa@khouse.com', '20', '53', ',wasifkhan786@hotmail.com', ',0', ',Sunday', '16200457001923520783', '2021-05-02 10:00:00', '2021-05-03 20:41:40', '2021-05-03 20:41:47'),
(90, 'Class with Essa Wasif', 'Essa \r\nMs / Dina Helmy', 'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09', 'Arabic language', 60, 'Africa/Cairo', '2021-05-01 11:00:00', 'dodyhelmy911@gmail.com', 'essa@khouse.com', '20', '53', ',wasifkhan786@hotmail.com', ',0', ',Saturday', '162004583480237871', '2021-05-01 11:00:00', '2021-05-03 20:43:54', '2021-05-03 20:44:07'),
(91, 'Class with Saad Mohamed', 'Quran Memorization\r\nQuran Memorization Saad \r\nTeacher: abdullahomar2011@gmail.com\r\nStudent: fahadasad1@gmail.com\r\nDuration: 30Minutes\r\nStatus: Open', 'Join Zoom Meeting https://us04web.zoom.us/j/71560932874?pwd=SHdTY0E5dEpEeUg0RWVwMHFxNlkxUT09  Meeting ID: 715 6093 2874 Passcode: 37NZaW', 'Quran Memorization', 30, 'Africa/Cairo', '2021-05-05 20:00:00', 'abdullahomar2011@gmail.com', 'fahadasad1@gmail.com', '21', '65', ',fahadasad1@gmail.com', ',0', ',Wednesday,Thursday,Sunday,Monday', '16200879081422042968', '2021-05-13 20:00:00', '2021-05-04 08:25:08', '2021-05-16 04:51:51'),
(92, 'New Class', 'The class is about testing class', 'https://us04web.zoom.us/j/73698704689?pwd=MDY2cGVyNlhwNGZNUTQraUd6TEV4dz09', 'Arabic language', 30, 'Africa/Cairo', '2021-05-13 08:00:00', 'abdullahomar2011@gmail.com', 'hellowaleed@hotmail.com', '21', '64', '', '', ',Wednesday,Thursday,Friday', '16208343291250152768', '2021-05-14 08:00:00', '2021-05-12 11:45:29', '2021-05-16 04:51:51'),
(93, 'Last class', 'Hard class', 'hellowaleed@zoom.com', 'Islamic Studies', 30, 'Africa/Cairo', '2021-05-18 00:00:00', 'mo7amed2225@gmail.com', 'hellowaleed@hotmail.com', '59', '64', '', '', '', '1621180221981811900', NULL, '2021-05-16 11:50:21', '2021-05-16 11:50:21');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
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
(13, '2021_04_18_164511_create_waitings_table', 5),
(14, '2021_05_12_154950_create_changes_table', 6);

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
(817, '70', 'Sat, May 01,2021 07:47am', 'You have 0 minutes in your account. You should Purchase hour now.', 1, '2021-05-01 13:47:11', '2021-05-08 21:26:16'),
(820, '70', 'Sat, May 01,2021 07:47am', 'You have 0 minutes in your account. You should Purchase hour now.', 1, '2021-05-01 13:47:11', '2021-05-08 21:26:16'),
(824, '70', 'Sat, May 01,2021 07:47am', 'You made a new request.', 1, '2021-05-01 13:47:21', '2021-05-08 21:26:16'),
(827, '70', 'Sat, May 01,2021 07:48am', ' The request to change class schedule for 1619688914842337352 was Approved.', 1, '2021-05-01 13:48:05', '2021-05-08 21:26:16'),
(829, '31', 'Sat, May 01,2021 06:57am', 'You have -30 in your account. You should Purchase hour now.', 0, '2021-05-01 12:57:07', '2021-05-01 12:57:07'),
(830, 'Admin', 'Sat, May 01,2021 01:57pm', 'Kamal Southall has -30 remaining. You can contact him by Southallgroup@gmail.com or +15135466267', 1, '2021-05-01 19:57:07', '2021-05-12 05:49:54'),
(831, '19', 'Sat, May 01,2021 01:57pm', 'Kamal Southall has -30 remaining. You can contact him by Southallgroup@gmail.com or +15135466267', 1, '2021-05-01 19:57:08', '2021-05-01 17:57:27'),
(832, 'Admin', 'Sat, May 01,2021 01:58pm', 'Abdullah Waleed has made a new payment.', 1, '2021-05-01 19:58:45', '2021-05-12 05:49:54'),
(833, 'Admin', 'Sat, May 01,2021 01:59pm', 'Waled Ashraf has made a new payment.', 1, '2021-05-01 19:59:32', '2021-05-12 05:49:54'),
(834, 'Admin', 'Sat, May 01,2021 02:02pm', 'Ammon Winder has made a new payment.', 1, '2021-05-01 20:02:27', '2021-05-12 05:49:55'),
(835, 'Admin', 'Sat, May 01,2021 02:04pm', 'Ammon Winder has made a new payment.', 1, '2021-05-01 20:04:54', '2021-05-12 05:49:55'),
(836, 'Admin', 'Sat, May 01,2021 02:07pm', 'Anu has made a new payment.', 1, '2021-05-01 20:07:07', '2021-05-12 05:49:55'),
(837, 'Admin', 'Sat, May 01,2021 02:09pm', 'Anu kmt has made a new payment.', 1, '2021-05-01 20:09:43', '2021-05-12 05:49:55'),
(838, 'Admin', 'Sat, May 01,2021 02:15pm', 'Awais Khan has made a new payment.', 1, '2021-05-01 20:15:20', '2021-05-12 05:49:55'),
(839, 'Admin', 'Sat, May 01,2021 02:17pm', 'Iqbal Khan has made a new payment.', 1, '2021-05-01 20:17:18', '2021-05-12 05:49:55'),
(840, 'Admin', 'Sat, May 01,2021 02:20pm', 'Danial Butt has made a new payment.', 1, '2021-05-01 20:20:12', '2021-05-12 05:49:55'),
(841, 'Admin', 'Sat, May 01,2021 02:21pm', 'Waseem But has made a new payment.', 1, '2021-05-01 20:21:44', '2021-05-12 05:49:55'),
(842, 'Admin', 'Sat, May 01,2021 02:22pm', 'Danial Farooq has made a new payment.', 1, '2021-05-01 20:22:54', '2021-05-12 05:49:55'),
(843, 'Admin', 'Sat, May 01,2021 02:23pm', 'Danial Farooq has made a new payment.', 1, '2021-05-01 20:23:56', '2021-05-12 05:49:55'),
(844, 'Admin', 'Sat, May 01,2021 02:29pm', 'Essa Wasif has made a new payment.', 1, '2021-05-01 20:29:15', '2021-05-12 05:49:55'),
(845, 'Admin', 'Sat, May 01,2021 02:30pm', 'Wasif Khan has made a new payment.', 1, '2021-05-01 20:30:34', '2021-05-12 05:49:55'),
(846, 'Admin', 'Sat, May 01,2021 02:31pm', 'Farrah Butt has made a new payment.', 1, '2021-05-01 20:31:25', '2021-05-12 05:49:55'),
(847, 'Admin', 'Sat, May 01,2021 02:32pm', 'Fatimah Farooq has made a new payment.', 1, '2021-05-01 20:32:17', '2021-05-12 05:49:55'),
(848, 'Admin', 'Sat, May 01,2021 02:34pm', 'Haaris Abdul sattar has made a new payment.', 1, '2021-05-01 20:34:35', '2021-05-12 05:49:55'),
(849, 'Admin', 'Sat, May 01,2021 02:37pm', 'Haaris Abdul sattar has made a new payment.', 1, '2021-05-01 20:37:42', '2021-05-12 05:49:55'),
(850, 'Admin', 'Sat, May 01,2021 02:39pm', 'Hina Gueizmir has made a new payment.', 1, '2021-05-01 20:39:18', '2021-05-12 05:49:55'),
(851, 'Admin', 'Sat, May 01,2021 02:40pm', 'Hina Gueizmir has made a new payment.', 1, '2021-05-01 20:40:08', '2021-05-12 05:49:55'),
(852, 'Admin', 'Sat, May 01,2021 02:41pm', 'Huda Al-Marashi has made a new payment.', 1, '2021-05-01 20:41:59', '2021-05-12 05:49:55'),
(853, 'Admin', 'Sat, May 01,2021 02:45pm', 'Huda al-Marashi has made a new payment.', 1, '2021-05-01 20:45:18', '2021-05-12 05:49:55'),
(854, 'Admin', 'Sat, May 01,2021 02:46pm', 'Ibrahiem Wasif has made a new payment.', 1, '2021-05-01 20:46:50', '2021-05-12 05:49:51'),
(855, 'Admin', 'Sat, May 01,2021 02:51pm', 'Kareem Jaafar has made a new payment.', 1, '2021-05-01 20:51:04', '2021-05-12 05:49:51'),
(856, '49', 'Sat, May 01,2021 07:55am', 'You have -45 in your account. You should Purchase hour now.', 0, '2021-05-01 13:55:06', '2021-05-01 13:55:06'),
(857, 'Admin', 'Sat, May 01,2021 02:55pm', 'Anu has -45 remaining. You can contact him by Anukemet@hotmail.com or 13018065122', 1, '2021-05-01 20:55:06', '2021-05-12 05:49:51'),
(858, '19', 'Sat, May 01,2021 02:55pm', 'Anu has -45 remaining. You can contact him by Anukemet@hotmail.com or 13018065122', 1, '2021-05-01 20:55:06', '2021-05-01 18:56:23'),
(859, 'Admin', 'Sat, May 01,2021 02:55pm', 'Madinah Mir has made a new payment.', 1, '2021-05-01 20:55:42', '2021-05-12 05:49:51'),
(860, 'Admin', 'Sat, May 01,2021 02:57pm', 'Omar Mir has made a new payment.', 1, '2021-05-01 20:57:13', '2021-05-02 03:03:58'),
(861, 'Admin', 'Sat, May 01,2021 02:57pm', 'Maria Mir has made a new payment.', 1, '2021-05-01 20:57:53', '2021-05-02 03:03:58'),
(862, 'Admin', 'Sat, May 01,2021 03:00pm', 'Nick Orzech has made a new payment.', 1, '2021-05-01 21:00:48', '2021-05-02 03:03:58'),
(863, 'Admin', 'Sat, May 01,2021 03:01pm', 'Omar Mir has made a new payment.', 1, '2021-05-01 21:01:32', '2021-05-02 03:03:58'),
(864, 'Admin', 'Sat, May 01,2021 03:02pm', 'Rumi has made a new payment.', 1, '2021-05-01 21:02:40', '2021-05-02 03:03:58'),
(865, 'Admin', 'Sat, May 01,2021 03:03pm', 'Aysha has made a new payment.', 1, '2021-05-01 21:03:20', '2021-05-02 03:03:58'),
(866, 'Admin', 'Sat, May 01,2021 03:14pm', 'Saad Mohamed has made a new payment.', 1, '2021-05-01 21:14:54', '2021-05-02 03:03:58'),
(867, 'Admin', 'Sat, May 01,2021 03:15pm', 'Mohamed Khan has made a new payment.', 1, '2021-05-01 21:15:57', '2021-05-02 03:03:58'),
(868, 'Admin', 'Sat, May 01,2021 03:17pm', 'Sinan Jaafar has made a new payment.', 1, '2021-05-01 21:17:42', '2021-05-02 03:03:58'),
(869, 'Admin', 'Sat, May 01,2021 03:18pm', 'Dhalia Jaafar has made a new payment.', 1, '2021-05-01 21:18:33', '2021-05-02 03:03:58'),
(870, 'Admin', 'Sat, May 01,2021 03:18pm', 'Sundus Jaafar has made a new payment.', 1, '2021-05-01 21:18:55', '2021-05-02 03:03:58'),
(871, 'Admin', 'Sat, May 01,2021 03:19pm', 'Tasneef has made a new payment.', 1, '2021-05-01 21:19:34', '2021-05-02 03:03:58'),
(872, 'Admin', 'Sat, May 01,2021 03:21pm', 'Tasneef has made a new payment.', 1, '2021-05-01 21:21:18', '2021-05-02 03:03:58'),
(873, 'Admin', 'Sat, May 01,2021 03:22pm', 'Wassem Butt has made a new payment.', 1, '2021-05-01 21:22:33', '2021-05-02 03:03:58'),
(874, '37', 'Sat, May 01,2021 12:02pm', 'You have -30 in your account. You should Purchase hour now.', 1, '2021-05-01 18:02:18', '2021-05-08 23:54:56'),
(875, 'Admin', 'Sat, May 01,2021 09:02pm', 'Sundus Jaafar has -30 remaining. You can contact him by SundusJaafar@khouse.com or +19515006084', 1, '2021-05-02 03:02:18', '2021-05-02 03:03:58'),
(876, '60', 'Sat, May 01,2021 09:02pm', 'Sundus Jaafar has -30 remaining. You can contact him by SundusJaafar@khouse.com or +19515006084', 1, '2021-05-02 03:02:18', '2021-05-02 01:42:33'),
(878, 'Admin', 'Sat, May 01,2021 09:02pm', 'Leya Qureshi has -30 remaining. You can contact him by leyaqureshi@khouse.com or 12025960902', 1, '2021-05-02 03:02:18', '2021-05-02 03:03:58'),
(879, '60', 'Sat, May 01,2021 09:02pm', 'Leya Qureshi has -30 remaining. You can contact him by leyaqureshi@khouse.com or 12025960902', 1, '2021-05-02 03:02:18', '2021-05-02 01:42:33'),
(880, '52', 'Sat, May 01,2021 02:02pm', 'You have -30 in your account. You should Purchase hour now.', 0, '2021-05-01 20:02:18', '2021-05-01 20:02:18'),
(881, 'Admin', 'Sat, May 01,2021 09:02pm', 'Manahil Qureshi has -30 remaining. You can contact him by drjamshed@gmail.com or +12025960902', 1, '2021-05-02 03:02:18', '2021-05-02 03:03:58'),
(882, '60', 'Sat, May 01,2021 09:02pm', 'Manahil Qureshi has -30 remaining. You can contact him by drjamshed@gmail.com or +12025960902', 1, '2021-05-02 03:02:18', '2021-05-02 01:42:33'),
(883, '29', 'Sat, May 01,2021 08:22pm', 'You have -420 in your account. You should Purchase hour now.', 0, '2021-05-02 02:22:08', '2021-05-02 02:22:08'),
(884, 'Admin', 'Sat, May 01,2021 09:22pm', 'Awais Khan has -420 remaining. You can contact him by mrawaisalikhan2006@gmail.com or +4407365063606', 1, '2021-05-02 03:22:08', '2021-05-02 03:03:58'),
(885, '22', 'Sat, May 01,2021 09:22pm', 'Awais Khan has -420 remaining. You can contact him by mrawaisalikhan2006@gmail.com or +4407365063606', 1, '2021-05-02 03:22:08', '2021-05-02 01:26:10'),
(886, '35', 'Sat, May 01,2021 12:35pm', 'You have -30 in your account. You should Purchase hour now.', 1, '2021-05-01 18:35:44', '2021-05-08 22:23:23'),
(887, 'Admin', 'Sat, May 01,2021 09:35pm', 'Sinan Jaafar has -30 remaining. You can contact him by dahlia_jaffer@yahoo.com or +19515006084', 1, '2021-05-02 03:35:44', '2021-05-02 03:03:58'),
(888, '60', 'Sat, May 01,2021 09:35pm', 'Sinan Jaafar has -30 remaining. You can contact him by dahlia_jaffer@yahoo.com or +19515006084', 1, '2021-05-02 03:35:44', '2021-05-02 01:42:33'),
(889, '50', 'Sat, May 01,2021 01:32pm', 'You have -30 in your account. You should Purchase hour now.', 0, '2021-05-01 19:32:26', '2021-05-01 19:32:26'),
(890, 'Admin', 'Sat, May 01,2021 10:32pm', 'Fatimah zahra markwith has -30 remaining. You can contact him by rand_abbas@yahoo.ca or +15593609357', 1, '2021-05-02 04:32:26', '2021-05-02 03:03:58'),
(891, '60', 'Sat, May 01,2021 10:32pm', 'Fatimah zahra markwith has -30 remaining. You can contact him by rand_abbas@yahoo.ca or +15593609357', 1, '2021-05-02 04:32:26', '2021-05-02 14:50:21'),
(892, '32', 'Sat, May 01,2021 05:46pm', 'You have 0 in your account. You should Purchase hour now.', 0, '2021-05-01 23:46:36', '2021-05-01 23:46:36'),
(893, 'Admin', 'Sun, May 02,2021 12:46am', 'Haaris Abdul sattar has 0 remaining. You can contact him by drtariqsattar@gmail.com or +14053145072', 1, '2021-05-02 06:46:36', '2021-05-03 02:40:50'),
(894, '22', 'Sun, May 02,2021 12:46am', 'Haaris Abdul sattar has 0 remaining. You can contact him by drtariqsattar@gmail.com or +14053145072', 1, '2021-05-02 06:46:36', '2021-05-03 16:05:54'),
(895, 'Admin', 'Sun, May 02,2021 12:46am', 'Haaris Abdul sattar has 0 remaining. You can contact him by drtariqsattar@gmail.com or +14053145072', 1, '2021-05-02 06:46:36', '2021-05-03 02:40:50'),
(896, '22', 'Sun, May 02,2021 12:46am', 'Haaris Abdul sattar has 0 remaining. You can contact him by drtariqsattar@gmail.com or +14053145072', 1, '2021-05-02 06:46:36', '2021-05-03 16:05:54'),
(897, 'Admin', 'Sun, May 02,2021 12:47am', 'You have a new request from saleh2ef@gmail.com', 1, '2021-05-02 06:47:51', '2021-05-03 02:40:50'),
(898, '22', 'Sun, May 02,2021 12:47am', 'You made a new request.', 1, '2021-05-02 06:47:51', '2021-05-03 16:05:54'),
(899, '29', 'Sat, May 01,2021 11:47pm', 'saleh2ef@gmail.com sent a request to change the schedule of class \'Class with Awais Khan\'.<br> Timezone: Africa/Cairo<br>Time: 01:00<br>Repeat:,Sunday', 0, '2021-05-02 05:47:51', '2021-05-02 05:47:51'),
(900, '48', 'Sun, May 02,2021 11:08am', 'You have 0 in your account. You should Purchase hour now.', 0, '2021-05-02 17:08:12', '2021-05-02 17:08:12'),
(901, 'Admin', 'Sun, May 02,2021 12:08pm', 'Fatimah Farooq has 0 remaining. You can contact him by fatimanaveed21@gmail.com or +447368155209', 1, '2021-05-02 18:08:12', '2021-05-03 02:40:50'),
(902, '60', 'Sun, May 02,2021 12:08pm', 'Fatimah Farooq has 0 remaining. You can contact him by fatimanaveed21@gmail.com or +447368155209', 1, '2021-05-02 18:08:12', '2021-05-04 02:39:40'),
(903, 'Admin', 'Sun, May 02,2021 12:08pm', 'Fatimah Farooq has 0 remaining. You can contact him by fatimanaveed21@gmail.com or +447368155209', 1, '2021-05-02 18:08:12', '2021-05-03 02:40:50'),
(904, '60', 'Sun, May 02,2021 12:08pm', 'Fatimah Farooq has 0 remaining. You can contact him by fatimanaveed21@gmail.com or +447368155209', 1, '2021-05-02 18:08:12', '2021-05-04 02:39:40'),
(905, 'Admin', 'Sun, May 02,2021 12:49pm', 'Class with Essa Wasif was deleted by Admin', 1, '2021-05-02 18:49:57', '2021-05-03 02:40:50'),
(907, '53', 'Sun, May 02,2021 11:49am', 'Class with Essa Wasif was deleted by Admin', 0, '2021-05-02 17:49:57', '2021-05-02 17:49:57'),
(908, '29', 'Sun, May 02,2021 12:49pm', 'You have -480 in your account. You should Purchase hour now.', 0, '2021-05-02 18:49:23', '2021-05-02 18:49:23'),
(909, 'Admin', 'Sun, May 02,2021 01:49pm', 'Awais Khan has -480 remaining. You can contact him by mrawaisalikhan2006@gmail.com or +4407365063606', 1, '2021-05-02 19:49:23', '2021-05-03 02:40:50'),
(910, '22', 'Sun, May 02,2021 01:49pm', 'Awais Khan has -480 remaining. You can contact him by mrawaisalikhan2006@gmail.com or +4407365063606', 1, '2021-05-02 19:49:23', '2021-05-03 16:05:54'),
(911, 'Admin', 'Sun, May 02,2021 01:50pm', 'You have a new request from saleh2ef@gmail.com', 1, '2021-05-02 19:50:28', '2021-05-03 02:40:50'),
(912, '22', 'Sun, May 02,2021 01:50pm', 'You made a new request.', 1, '2021-05-02 19:50:28', '2021-05-03 16:05:54'),
(913, '29', 'Sun, May 02,2021 12:50pm', 'saleh2ef@gmail.com sent a request to change the schedule of class \'Class with Awais Khan\'.<br> Timezone: Africa/Cairo<br>Time: 05:00<br>Repeat:,Sunday', 0, '2021-05-02 18:50:28', '2021-05-02 18:50:28'),
(914, '62', 'Sun, May 02,2021 07:47am', 'You have -60 in your account. You should Purchase hour now.', 0, '2021-05-02 13:47:02', '2021-05-02 13:47:02'),
(915, 'Admin', 'Sun, May 02,2021 05:47pm', 'lena  Mostavic has -60 remaining. You can contact him by smostafavi@gmail.com or +1 (510) 684-3068', 1, '2021-05-02 23:47:02', '2021-05-03 02:40:50'),
(916, '21', 'Sun, May 02,2021 05:47pm', 'lena  Mostavic has -60 remaining. You can contact him by smostafavi@gmail.com or +1 (510) 684-3068', 1, '2021-05-02 23:47:02', '2021-05-04 06:26:40'),
(917, '63', 'Sun, May 02,2021 07:47am', 'You have -60 in your account. You should Purchase hour now.', 0, '2021-05-02 13:47:02', '2021-05-02 13:47:02'),
(918, 'Admin', 'Sun, May 02,2021 05:47pm', 'lena  Mostavic has -60 remaining. You can contact him by lena@khouse or 684-3068', 1, '2021-05-02 23:47:02', '2021-05-03 02:40:50'),
(919, '21', 'Sun, May 02,2021 05:47pm', 'lena  Mostavic has -60 remaining. You can contact him by lena@khouse or 684-3068', 1, '2021-05-02 23:47:02', '2021-05-04 06:26:40'),
(921, 'Admin', 'Sun, May 02,2021 08:31pm', 'Leya Qureshi has -60 remaining. You can contact him by leyaqureshi@khouse.com or 12025960902', 1, '2021-05-03 02:31:41', '2021-05-03 02:40:50'),
(922, '60', 'Sun, May 02,2021 08:31pm', 'Leya Qureshi has -60 remaining. You can contact him by leyaqureshi@khouse.com or 12025960902', 1, '2021-05-03 02:31:41', '2021-05-04 02:39:40'),
(923, '52', 'Sun, May 02,2021 01:31pm', 'You have -60 in your account. You should Purchase hour now.', 0, '2021-05-02 19:31:41', '2021-05-02 19:31:41'),
(924, 'Admin', 'Sun, May 02,2021 08:31pm', 'Manahil Qureshi has -60 remaining. You can contact him by drjamshed@gmail.com or +12025960902', 1, '2021-05-03 02:31:41', '2021-05-03 02:40:50'),
(925, '60', 'Sun, May 02,2021 08:31pm', 'Manahil Qureshi has -60 remaining. You can contact him by drjamshed@gmail.com or +12025960902', 1, '2021-05-03 02:31:41', '2021-05-04 02:39:40'),
(926, 'Admin', 'Sun, May 02,2021 10:59pm', 'Class with Kamal Southall was deleted by Mohamed Ismail', 1, '2021-05-03 04:59:32', '2021-05-03 03:05:10'),
(927, '19', 'Sun, May 02,2021 10:59pm', 'Class with Kamal Southall was deleted by Mohamed Ismail', 1, '2021-05-03 04:59:32', '2021-05-03 17:48:06'),
(928, '31', 'Sun, May 02,2021 03:59pm', 'Class with Kamal Southall was deleted by Mohamed Ismail', 0, '2021-05-02 21:59:32', '2021-05-02 21:59:32'),
(929, '19', 'Sun, May 02,2021 11:04pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class with Kamal Southall</b><br><p>Quran</p><br> Class Duration: 30 <br>Class Link: <a href=\'\"https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09 \"\'>\"https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09 \"</a> <br>Class Starting at: 2021-04-30 <br>Class Time: 05:00pm <br>Repeat:Saturday,Sunday,Tuesday,Thursday <br>guests: Southallgroup@gmail.com <br>Assigned Teacher: Mohamed Nasir<br>Students name: Kamal Southall', 1, '2021-05-03 05:04:52', '2021-05-03 17:48:06'),
(930, '31', 'Sun, May 02,2021 04:04pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class with Kamal Southall</b><br><p>Quran</p><br> Class Duration: 30 <br>Class Link: <a href=\'\"https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09 \"\'>\"https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09 \"</a> <br>Class Starting at: 2021-04-30 <br>Class Time: 05:00pm <br>Repeat:Saturday,Sunday,Tuesday,Thursday <br>guests: Southallgroup@gmail.com <br>Assigned Teacher: Mohamed Nasir<br>Students name: Kamal Southall', 0, '2021-05-02 22:04:52', '2021-05-02 22:04:52'),
(931, 'Admin', 'Sun, May 02,2021 11:04pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class with Kamal Southall</b><br><p>Quran</p><br> Class Duration: 30 <br>Class Link: <a href=\'\"https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09 \"\'>\"https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09 \"</a> <br>Class Starting at: 2021-04-30 <br>Class Time: 05:00pm <br>Repeat:Saturday,Sunday,Tuesday,Thursday <br>guests: Southallgroup@gmail.com <br>Assigned Teacher: Mohamed Nasir<br>Students name: Kamal Southall', 1, '2021-05-03 05:04:52', '2021-05-03 03:05:10'),
(932, 'Admin', 'Sun, May 02,2021 11:15pm', 'Class with Awais Khan was deleted by Mohamed Ismail', 1, '2021-05-03 05:15:33', '2021-05-03 17:58:49'),
(933, '22', 'Sun, May 02,2021 11:15pm', 'Class with Awais Khan was deleted by Mohamed Ismail', 1, '2021-05-03 05:15:33', '2021-05-03 16:05:54'),
(934, '29', 'Sun, May 02,2021 10:15pm', 'Class with Awais Khan was deleted by Mohamed Ismail', 0, '2021-05-03 04:15:33', '2021-05-03 04:15:33'),
(935, '22', 'Sun, May 02,2021 11:19pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class with Awais Khan</b><br><p>Arabic language classes.</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us05web.zoom.us/j/2320923569?pwd=YVVQVk56c3k3K1dYc283Q2JGSmVodz099\'>https://us05web.zoom.us/j/2320923569?pwd=YVVQVk56c3k3K1dYc283Q2JGSmVodz099</a> <br>Class Starting at: 2021-05-02 <br>Class Time: 03:00pm <br>Repeat:Sunday <br>guests: mrawaisalikhan2006@gmail.com <br>Assigned Teacher: Saleh Ahmed<br>Students name: Awais Khan', 1, '2021-05-03 05:19:21', '2021-05-03 16:05:54'),
(936, '29', 'Sun, May 02,2021 10:19pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class with Awais Khan</b><br><p>Arabic language classes.</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us05web.zoom.us/j/2320923569?pwd=YVVQVk56c3k3K1dYc283Q2JGSmVodz099\'>https://us05web.zoom.us/j/2320923569?pwd=YVVQVk56c3k3K1dYc283Q2JGSmVodz099</a> <br>Class Starting at: 2021-05-02 <br>Class Time: 03:00pm <br>Repeat:Sunday <br>guests: mrawaisalikhan2006@gmail.com <br>Assigned Teacher: Saleh Ahmed<br>Students name: Awais Khan', 0, '2021-05-03 04:19:21', '2021-05-03 04:19:21'),
(937, 'Admin', 'Sun, May 02,2021 11:19pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class with Awais Khan</b><br><p>Arabic language classes.</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us05web.zoom.us/j/2320923569?pwd=YVVQVk56c3k3K1dYc283Q2JGSmVodz099\'>https://us05web.zoom.us/j/2320923569?pwd=YVVQVk56c3k3K1dYc283Q2JGSmVodz099</a> <br>Class Starting at: 2021-05-02 <br>Class Time: 03:00pm <br>Repeat:Sunday <br>guests: mrawaisalikhan2006@gmail.com <br>Assigned Teacher: Saleh Ahmed<br>Students name: Awais Khan', 1, '2021-05-03 05:19:21', '2021-05-03 17:58:49'),
(938, '29', 'Mon, May 03,2021 11:05am', 'You have -540 in your account. You should Purchase hour now.', 0, '2021-05-03 17:05:48', '2021-05-03 17:05:48'),
(939, 'Admin', 'Mon, May 03,2021 12:05pm', 'Awais Khan has -540 remaining. You can contact him by mrawaisalikhan2006@gmail.com or +4407365063606', 1, '2021-05-03 18:05:48', '2021-05-03 17:58:49'),
(940, '22', 'Mon, May 03,2021 12:05pm', 'Awais Khan has -540 remaining. You can contact him by mrawaisalikhan2006@gmail.com or +4407365063606', 1, '2021-05-03 18:05:48', '2021-05-03 16:05:54'),
(941, '31', 'Mon, May 03,2021 06:48am', 'You have -60 in your account. You should Purchase hour now.', 0, '2021-05-03 12:48:00', '2021-05-03 12:48:00'),
(942, 'Admin', 'Mon, May 03,2021 01:48pm', 'Kamal Southall has -60 remaining. You can contact him by Southallgroup@gmail.com or +15135466267', 1, '2021-05-03 19:48:00', '2021-05-03 17:58:49'),
(943, '19', 'Mon, May 03,2021 01:48pm', 'Kamal Southall has -60 remaining. You can contact him by Southallgroup@gmail.com or +15135466267', 1, '2021-05-03 19:48:00', '2021-05-03 17:48:06'),
(944, '31', 'Mon, May 03,2021 06:48am', 'You have -90 in your account. You should Purchase hour now.', 0, '2021-05-03 12:48:14', '2021-05-03 12:48:14'),
(945, 'Admin', 'Mon, May 03,2021 01:48pm', 'Kamal Southall has -90 remaining. You can contact him by Southallgroup@gmail.com or +15135466267', 1, '2021-05-03 19:48:14', '2021-05-03 17:58:49'),
(946, '19', 'Mon, May 03,2021 01:48pm', 'Kamal Southall has -90 remaining. You can contact him by Southallgroup@gmail.com or +15135466267', 1, '2021-05-03 19:48:14', '2021-05-03 17:49:06'),
(947, 'Admin', 'Mon, May 03,2021 02:23pm', 'Class with Essa Wasif was deleted by Mohamed Ismail', 1, '2021-05-03 20:23:28', '2021-05-03 18:30:03'),
(949, '53', 'Mon, May 03,2021 01:23pm', 'Class with Essa Wasif was deleted by Mohamed Ismail', 0, '2021-05-03 19:23:28', '2021-05-03 19:23:28'),
(950, 'Admin', 'Mon, May 03,2021 02:24pm', 'Class with Ibrahem Wasif was deleted by Mohamed Ismail', 1, '2021-05-03 20:24:10', '2021-05-03 18:30:03'),
(952, '51', 'Mon, May 03,2021 01:24pm', 'Class with Ibrahem Wasif was deleted by Mohamed Ismail', 0, '2021-05-03 19:24:10', '2021-05-03 19:24:10'),
(954, '51', 'Mon, May 03,2021 01:28pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class with Essa Wasif</b><br><p>Arabic \r\nEssa Wasif</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09\'>https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09</a> <br>Class Starting at: 2021-05-01 <br>Class Time: 09:00am <br>Repeat:No Repeat <br>guests: wasifkhan786@hotmail.com <br>Assigned Teacher: Dina Helmy<br>Students name: Ibrahiem Wasif', 0, '2021-05-03 19:28:44', '2021-05-03 19:28:44'),
(955, 'Admin', 'Mon, May 03,2021 02:28pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class with Essa Wasif</b><br><p>Arabic \r\nEssa Wasif</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09\'>https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09</a> <br>Class Starting at: 2021-05-01 <br>Class Time: 09:00am <br>Repeat:No Repeat <br>guests: wasifkhan786@hotmail.com <br>Assigned Teacher: Dina Helmy<br>Students name: Ibrahiem Wasif', 1, '2021-05-03 20:28:44', '2021-05-03 18:30:03'),
(957, '51', 'Mon, May 03,2021 01:29pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class with Essa Wasif</b><br><p>Arabic \r\nEssa Wasif</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09\'>https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09</a> <br>Class Starting at: 2021-05-02 <br>Class Time: 08:00am <br>Repeat:No Repeat <br>guests: wasifkhan786@hotmail.com <br>Assigned Teacher: Dina Helmy<br>Students name: Ibrahiem Wasif', 0, '2021-05-03 19:29:21', '2021-05-03 19:29:21'),
(959, 'Admin', 'Mon, May 03,2021 02:31pm', 'Class with Essa Wasif was deleted by Mohamed Ismail', 1, '2021-05-03 20:31:16', '2021-05-03 18:49:15'),
(961, '51', 'Mon, May 03,2021 01:31pm', 'Class with Essa Wasif was deleted by Mohamed Ismail', 0, '2021-05-03 19:31:16', '2021-05-03 19:31:16'),
(962, 'Admin', 'Mon, May 03,2021 02:31pm', 'Class with Essa Wasif was deleted by Mohamed Ismail', 1, '2021-05-03 20:31:30', '2021-05-03 18:49:15'),
(964, '51', 'Mon, May 03,2021 01:31pm', 'Class with Essa Wasif was deleted by Mohamed Ismail', 0, '2021-05-03 19:31:30', '2021-05-03 19:31:30'),
(966, '51', 'Mon, May 03,2021 01:35pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class with Ibrahiem Wasif</b><br><p>Ibrahiem</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09\'>https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09</a> <br>Class Starting at: 2021-05-01 <br>Class Time: 09:00am <br>Repeat:Saturday <br>guests: wasifkhan786@hotmail.com <br>Assigned Teacher: Dina Helmy<br>Students name: Ibrahiem Wasif', 0, '2021-05-03 19:35:24', '2021-05-03 19:35:24'),
(967, 'Admin', 'Mon, May 03,2021 02:35pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class with Ibrahiem Wasif</b><br><p>Ibrahiem</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09\'>https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09</a> <br>Class Starting at: 2021-05-01 <br>Class Time: 09:00am <br>Repeat:Saturday <br>guests: wasifkhan786@hotmail.com <br>Assigned Teacher: Dina Helmy<br>Students name: Ibrahiem Wasif', 1, '2021-05-03 20:35:24', '2021-05-03 18:49:15'),
(969, '51', 'Mon, May 03,2021 01:36pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class with Ibrahiem Wasif</b><br><p>Ibrahiem</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09\'>https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09</a> <br>Class Starting at: 2021-05-02 <br>Class Time: 08:00am <br>Repeat:Sunday <br>guests: wasifkhan786@hotmail.com <br>Assigned Teacher: Dina Helmy<br>Students name: Ibrahiem Wasif', 0, '2021-05-03 19:36:00', '2021-05-03 19:36:00'),
(970, 'Admin', 'Mon, May 03,2021 02:36pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class with Ibrahiem Wasif</b><br><p>Ibrahiem</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09\'>https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09</a> <br>Class Starting at: 2021-05-02 <br>Class Time: 08:00am <br>Repeat:Sunday <br>guests: wasifkhan786@hotmail.com <br>Assigned Teacher: Dina Helmy<br>Students name: Ibrahiem Wasif', 1, '2021-05-03 20:36:00', '2021-05-03 18:49:15'),
(972, '53', 'Mon, May 03,2021 01:41pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class with Essa Wasif</b><br><p>Essa</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09\'>https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09</a> <br>Class Starting at: 2021-05-02 <br>Class Time: 09:00am <br>Repeat:Sunday <br>guests: wasifkhan786@hotmail.com <br>Assigned Teacher: Dina Helmy<br>Students name: Essa Wasif', 0, '2021-05-03 19:41:40', '2021-05-03 19:41:40'),
(973, 'Admin', 'Mon, May 03,2021 02:41pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class with Essa Wasif</b><br><p>Essa</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09\'>https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09</a> <br>Class Starting at: 2021-05-02 <br>Class Time: 09:00am <br>Repeat:Sunday <br>guests: wasifkhan786@hotmail.com <br>Assigned Teacher: Dina Helmy<br>Students name: Essa Wasif', 1, '2021-05-03 20:41:40', '2021-05-03 18:49:15'),
(975, '53', 'Mon, May 03,2021 01:43pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class with Essa Wasif</b><br><p>Essa \r\nMs / Dina Helmy</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09\'>https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09</a> <br>Class Starting at: 2021-05-01 <br>Class Time: 10:00am <br>Repeat:Saturday <br>guests: wasifkhan786@hotmail.com <br>Assigned Teacher: Dina Helmy<br>Students name: Essa Wasif', 0, '2021-05-03 19:43:54', '2021-05-03 19:43:54'),
(976, 'Admin', 'Mon, May 03,2021 02:43pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class with Essa Wasif</b><br><p>Essa \r\nMs / Dina Helmy</p><br> Class Duration: 60 <br>Class Link: <a href=\'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09\'>https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09</a> <br>Class Starting at: 2021-05-01 <br>Class Time: 10:00am <br>Repeat:Saturday <br>guests: wasifkhan786@hotmail.com <br>Assigned Teacher: Dina Helmy<br>Students name: Essa Wasif', 1, '2021-05-03 20:43:54', '2021-05-03 18:49:15'),
(977, '53', 'Mon, May 03,2021 01:44pm', 'You have 0 in your account. You should Purchase hour now.', 0, '2021-05-03 19:44:07', '2021-05-03 19:44:07'),
(978, 'Admin', 'Mon, May 03,2021 02:44pm', 'Essa Wasif has 0 remaining. You can contact him by essa@khouse.com or +44 7939 313903', 1, '2021-05-03 20:44:07', '2021-05-03 18:49:15'),
(980, 'Admin', 'Mon, May 03,2021 02:44pm', 'Essa Wasif has 0 remaining. You can contact him by essa@khouse.com or +44 7939 313903', 1, '2021-05-03 20:44:07', '2021-05-03 18:49:15'),
(982, '63', 'Mon, May 03,2021 12:31pm', 'You have -120 in your account. You should Purchase hour now.', 0, '2021-05-03 18:31:10', '2021-05-03 18:31:10'),
(983, 'Admin', 'Mon, May 03,2021 10:31pm', 'lena  Mostavic has -120 remaining. You can contact him by lena@khouse or 684-3068', 1, '2021-05-04 04:31:10', '2021-05-04 03:42:49'),
(984, '21', 'Mon, May 03,2021 10:31pm', 'lena  Mostavic has -120 remaining. You can contact him by lena@khouse or 684-3068', 1, '2021-05-04 04:31:10', '2021-05-04 06:26:40'),
(985, '50', 'Mon, May 03,2021 01:35pm', 'You have -60 in your account. You should Purchase hour now.', 0, '2021-05-03 19:35:38', '2021-05-03 19:35:38'),
(986, 'Admin', 'Mon, May 03,2021 10:35pm', 'Fatimah zahra markwith has -60 remaining. You can contact him by rand_abbas@yahoo.ca or +15593609357', 1, '2021-05-04 04:35:38', '2021-05-04 03:42:49'),
(987, '60', 'Mon, May 03,2021 10:35pm', 'Fatimah zahra markwith has -60 remaining. You can contact him by rand_abbas@yahoo.ca or +15593609357', 1, '2021-05-04 04:35:38', '2021-05-04 02:39:40'),
(988, '53', 'Mon, May 03,2021 10:42pm', 'You have -30 in your account. You should Purchase hour now.', 0, '2021-05-04 04:42:00', '2021-05-04 04:42:00'),
(989, 'Admin', 'Mon, May 03,2021 11:42pm', 'Essa Wasif has -30 remaining. You can contact him by essa@khouse.com or +44 7939 313903', 1, '2021-05-04 05:42:00', '2021-05-04 03:42:49'),
(990, '19', 'Mon, May 03,2021 11:42pm', 'Essa Wasif has -30 remaining. You can contact him by essa@khouse.com or +44 7939 313903', 1, '2021-05-04 05:42:00', '2021-05-04 03:42:06'),
(991, '54', 'Mon, May 03,2021 10:42pm', 'You have 0 in your account. You should Purchase hour now.', 0, '2021-05-04 04:42:00', '2021-05-04 04:42:00'),
(992, 'Admin', 'Mon, May 03,2021 11:42pm', 'Tasneef has 0 remaining. You can contact him by tasneefm@gmail.com or +44 7896 273337', 1, '2021-05-04 05:42:00', '2021-05-04 03:42:49'),
(993, '19', 'Mon, May 03,2021 11:42pm', 'Tasneef has 0 remaining. You can contact him by tasneefm@gmail.com or +44 7896 273337', 1, '2021-05-04 05:42:00', '2021-05-04 03:42:06'),
(994, 'Admin', 'Mon, May 03,2021 11:42pm', 'Tasneef has 0 remaining. You can contact him by tasneefm@gmail.com or +44 7896 273337', 1, '2021-05-04 05:42:00', '2021-05-04 03:42:49'),
(995, '19', 'Mon, May 03,2021 11:42pm', 'Tasneef has 0 remaining. You can contact him by tasneefm@gmail.com or +44 7896 273337', 1, '2021-05-04 05:42:00', '2021-05-04 03:42:06'),
(996, 'Admin', 'Tue, May 04,2021 02:19am', 'Class with Saad Mohamed was deleted by Mohamed Ismail', 1, '2021-05-04 08:19:37', '2021-05-04 06:25:59'),
(998, '65', 'Mon, May 03,2021 08:19pm', 'Class with Saad Mohamed was deleted by Mohamed Ismail', 0, '2021-05-04 02:19:37', '2021-05-04 02:19:37'),
(1000, '65', 'Mon, May 03,2021 08:25pm', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class with Saad Mohamed</b><br><p>Quran Memorization\r\nQuran Memorization Saad \r\nTeacher: abdullahomar2011@gmail.com\r\nStudent: fahadasad1@gmail.com\r\nDuration: 30Minutes\r\nStatus: Open</p><br> Class Duration: 30 <br>Class Link: <a href=\'Join Zoom Meeting https://us04web.zoom.us/j/71560932874?pwd=SHdTY0E5dEpEeUg0RWVwMHFxNlkxUT09  Meeting ID: 715 6093 2874 Passcode: 37NZaW\'>Join Zoom Meeting https://us04web.zoom.us/j/71560932874?pwd=SHdTY0E5dEpEeUg0RWVwMHFxNlkxUT09  Meeting ID: 715 6093 2874 Passcode: 37NZaW</a> <br>Class Starting at: 2021-05-05 <br>Class Time: 02:00pm <br>Repeat:Wednesday,Thursday,Sunday,Monday <br>guests: fahadasad1@gmail.com <br>Assigned Teacher: Abdullah Omar<br>Students name: Saad Mohamed', 0, '2021-05-04 02:25:08', '2021-05-04 02:25:08'),
(1001, 'Admin', 'Tue, May 04,2021 02:25am', '<b>Mohamed Ismail</b> added a class for you. <br> <b>Class with Saad Mohamed</b><br><p>Quran Memorization\r\nQuran Memorization Saad \r\nTeacher: abdullahomar2011@gmail.com\r\nStudent: fahadasad1@gmail.com\r\nDuration: 30Minutes\r\nStatus: Open</p><br> Class Duration: 30 <br>Class Link: <a href=\'Join Zoom Meeting https://us04web.zoom.us/j/71560932874?pwd=SHdTY0E5dEpEeUg0RWVwMHFxNlkxUT09  Meeting ID: 715 6093 2874 Passcode: 37NZaW\'>Join Zoom Meeting https://us04web.zoom.us/j/71560932874?pwd=SHdTY0E5dEpEeUg0RWVwMHFxNlkxUT09  Meeting ID: 715 6093 2874 Passcode: 37NZaW</a> <br>Class Starting at: 2021-05-05 <br>Class Time: 02:00pm <br>Repeat:Wednesday,Thursday,Sunday,Monday <br>guests: fahadasad1@gmail.com <br>Assigned Teacher: Abdullah Omar<br>Students name: Saad Mohamed', 1, '2021-05-04 08:25:08', '2021-05-04 06:25:59'),
(1002, '31', 'Mon, May 03,2021 08:00pm', 'You have -120 in your account. You should Purchase hour now.', 0, '2021-05-04 02:00:57', '2021-05-04 02:00:57'),
(1003, 'Admin', 'Tue, May 04,2021 03:00am', 'Kamal Southall has -120 remaining. You can contact him by Southallgroup@gmail.com or +15135466267', 1, '2021-05-04 09:00:57', '2021-05-06 17:33:59'),
(1004, '19', 'Tue, May 04,2021 03:00am', 'Kamal Southall has -120 remaining. You can contact him by Southallgroup@gmail.com or +15135466267', 1, '2021-05-04 09:00:57', '2021-05-04 07:01:03'),
(1005, '61', 'Tue, May 04,2021 05:00pm', 'You have 0 in your account. You should Purchase hour now.', 0, '2021-05-04 23:00:12', '2021-05-04 23:00:12'),
(1006, 'Admin', 'Tue, May 04,2021 06:00pm', 'Danial Farooq has 0 remaining. You can contact him by danialf64@gmail.com or +44 7576 725527', 1, '2021-05-05 00:00:12', '2021-05-06 17:33:59'),
(1008, 'Admin', 'Tue, May 04,2021 06:00pm', 'Danial Farooq has 0 remaining. You can contact him by danialf64@gmail.com or +44 7576 725527', 1, '2021-05-05 00:00:12', '2021-05-06 17:33:59'),
(1010, '40', 'Tue, May 04,2021 09:00pm', 'You have 0 in your account. You should Purchase hour now.', 0, '2021-05-05 03:00:50', '2021-05-05 03:00:50'),
(1011, 'Admin', 'Wed, May 05,2021 06:00am', 'Farrah Butt has 0 remaining. You can contact him by FarrahButt@khouse.com or +19515006084', 1, '2021-05-05 12:00:50', '2021-05-06 17:33:59'),
(1012, '60', 'Wed, May 05,2021 06:00am', 'Farrah Butt has 0 remaining. You can contact him by FarrahButt@khouse.com or +19515006084', 0, '2021-05-05 12:00:50', '2021-05-05 12:00:50'),
(1013, 'Admin', 'Wed, May 05,2021 06:00am', 'Farrah Butt has 0 remaining. You can contact him by FarrahButt@khouse.com or +19515006084', 1, '2021-05-05 12:00:50', '2021-05-06 17:33:59'),
(1014, '60', 'Wed, May 05,2021 06:00am', 'Farrah Butt has 0 remaining. You can contact him by FarrahButt@khouse.com or +19515006084', 0, '2021-05-05 12:00:50', '2021-05-05 12:00:50'),
(1015, '42', 'Tue, May 04,2021 09:00pm', 'You have 0 in your account. You should Purchase hour now.', 0, '2021-05-05 03:00:50', '2021-05-05 03:00:50'),
(1017, '60', 'Wed, May 05,2021 06:00am', 'Danial Butt has 0 remaining. You can contact him by Danialbutt@khouse.com or +19513128633', 0, '2021-05-05 12:00:50', '2021-05-05 12:00:50'),
(1018, 'Admin', 'Wed, May 05,2021 06:00am', 'Danial Butt has 0 remaining. You can contact him by Danialbutt@khouse.com or +19513128633', 1, '2021-05-05 12:00:50', '2021-05-06 17:33:59'),
(1019, '60', 'Wed, May 05,2021 06:00am', 'Danial Butt has 0 remaining. You can contact him by Danialbutt@khouse.com or +19513128633', 0, '2021-05-05 12:00:50', '2021-05-05 12:00:50'),
(1020, '71', 'Wed, May 05,2021 05:48pm', 'You have -60 in your account. You should Purchase hour now.', 0, '2021-05-05 23:48:35', '2021-05-05 23:48:35'),
(1022, '59', 'Wed, May 05,2021 11:48am', 'Gretchen Head has -60 remaining. You can contact him by gretchen.head@yale-nus.edu.sg or +6590262443', 1, '2021-05-05 17:48:35', '2021-05-05 15:56:58'),
(1023, '39', 'Wed, May 05,2021 02:48am', 'You have 0 in your account. You should Purchase hour now.', 0, '2021-05-05 08:48:43', '2021-05-05 08:48:43'),
(1024, 'Admin', 'Wed, May 05,2021 11:48am', 'Wassem Butt has 0 remaining. You can contact him by suuper7@gmail.com or +19513128633', 1, '2021-05-05 17:48:43', '2021-05-06 17:33:59'),
(1025, '59', 'Wed, May 05,2021 11:48am', 'Wassem Butt has 0 remaining. You can contact him by suuper7@gmail.com or +19513128633', 1, '2021-05-05 17:48:43', '2021-05-05 15:56:58'),
(1026, 'Admin', 'Wed, May 05,2021 11:48am', 'Wassem Butt has 0 remaining. You can contact him by suuper7@gmail.com or +19513128633', 1, '2021-05-05 17:48:43', '2021-05-06 17:33:59'),
(1027, '59', 'Wed, May 05,2021 11:48am', 'Wassem Butt has 0 remaining. You can contact him by suuper7@gmail.com or +19513128633', 1, '2021-05-05 17:48:43', '2021-05-05 15:56:58'),
(1028, '48', 'Wed, May 05,2021 12:02pm', 'You have -60 in your account. You should Purchase hour now.', 0, '2021-05-05 18:02:00', '2021-05-05 18:02:00'),
(1029, 'Admin', 'Wed, May 05,2021 01:02pm', 'Fatimah Farooq has -60 remaining. You can contact him by fatimanaveed21@gmail.com or +447368155209', 1, '2021-05-05 19:02:00', '2021-05-06 17:33:59'),
(1030, '60', 'Wed, May 05,2021 01:02pm', 'Fatimah Farooq has -60 remaining. You can contact him by fatimanaveed21@gmail.com or +447368155209', 0, '2021-05-05 19:02:00', '2021-05-05 19:02:00'),
(1031, '50', 'Wed, May 05,2021 01:09pm', 'You have -90 minutes in your account. You should Purchase hour now.', 0, '2021-05-05 19:09:29', '2021-05-05 19:09:29'),
(1032, 'Admin', 'Wed, May 05,2021 01:09pm', 'Fatimah zahra markwith has -90 minutes remaining. You can contact him by rand_abbas@yahoo.ca or +15593609357', 1, '2021-05-05 19:09:29', '2021-05-06 17:33:59'),
(1033, '60', 'Wed, May 05,2021 10:09pm', 'Fatimah zahra markwith has -90 minutes remaining. You can contact him by rand_abbas@yahoo.ca or +15593609357', 0, '2021-05-06 04:09:29', '2021-05-06 04:09:29'),
(1034, '53', 'Wed, May 05,2021 09:29pm', 'You have -60 in your account. You should Purchase hour now.', 0, '2021-05-06 03:29:15', '2021-05-06 03:29:15'),
(1035, 'Admin', 'Wed, May 05,2021 10:29pm', 'Essa Wasif has -60 remaining. You can contact him by essa@khouse.com or +44 7939 313903', 1, '2021-05-06 04:29:15', '2021-05-06 17:33:59'),
(1036, '19', 'Wed, May 05,2021 10:29pm', 'Essa Wasif has -60 remaining. You can contact him by essa@khouse.com or +44 7939 313903', 1, '2021-05-06 04:29:15', '2021-05-06 02:29:19'),
(1037, '31', 'Wed, May 05,2021 10:27pm', 'You have -150 in your account. You should Purchase hour now.', 0, '2021-05-06 04:27:18', '2021-05-06 04:27:18'),
(1038, 'Admin', 'Thu, May 06,2021 05:27am', 'Kamal Southall has -150 remaining. You can contact him by Southallgroup@gmail.com or +15135466267', 1, '2021-05-06 11:27:18', '2021-05-06 17:33:59'),
(1039, '19', 'Thu, May 06,2021 05:27am', 'Kamal Southall has -150 remaining. You can contact him by Southallgroup@gmail.com or +15135466267', 1, '2021-05-06 11:27:18', '2021-05-06 09:27:23'),
(1041, 'Admin', 'Thu, May 06,2021 11:03pm', 'Abdullah Waleed has 0 remaining. You can contact him by hellowaleed@hotmail.com or +971 50 763 5105', 1, '2021-05-07 05:03:24', '2021-05-07 20:28:55'),
(1046, '59', 'Fri, May 07,2021 04:46pm', 'test was deleted by Admin', 0, '2021-05-07 22:46:08', '2021-05-07 22:46:08'),
(1047, '70', 'Fri, May 07,2021 10:46am', 'test was deleted by Admin', 1, '2021-05-07 16:46:08', '2021-05-08 21:26:16'),
(1049, '59', 'Fri, May 07,2021 04:47pm', 'test 2 was deleted by Admin', 0, '2021-05-07 22:47:33', '2021-05-07 22:47:33'),
(1050, '70', 'Fri, May 07,2021 10:47am', 'test 2 was deleted by Admin', 1, '2021-05-07 16:47:33', '2021-05-08 21:26:16'),
(1051, '53', 'Sat, May 08,2021 12:26pm', 'You have -90 in your account. You should Purchase hour now.', 0, '2021-05-08 18:26:46', '2021-05-08 18:26:46'),
(1053, '19', 'Sat, May 08,2021 01:26pm', 'Essa Wasif has -90 remaining. You can contact him by essa@khouse.com or +44 7939 313903', 1, '2021-05-08 19:26:46', '2021-05-09 04:52:19'),
(1054, '37', 'Sat, May 08,2021 03:26pm', 'You have -60 in your account. You should Purchase hour now.', 0, '2021-05-08 21:26:02', '2021-05-08 21:26:02'),
(1056, '60', 'Sun, May 09,2021 12:26am', 'Sundus Jaafar has -60 remaining. You can contact him by SundusJaafar@khouse.com or +19515006084', 0, '2021-05-09 06:26:02', '2021-05-09 06:26:02'),
(1057, '35', 'Sat, May 08,2021 03:26pm', 'You have -60 in your account. You should Purchase hour now.', 0, '2021-05-08 21:26:02', '2021-05-08 21:26:02'),
(1059, '60', 'Sun, May 09,2021 12:26am', 'Sinan Jaafar has -60 remaining. You can contact him by dahlia_jaffer@yahoo.com or +19515006084', 0, '2021-05-09 06:26:02', '2021-05-09 06:26:02'),
(1060, '50', 'Sat, May 08,2021 03:26pm', 'You have -120 in your account. You should Purchase hour now.', 0, '2021-05-08 21:26:02', '2021-05-08 21:26:02'),
(1062, '60', 'Sun, May 09,2021 12:26am', 'Fatimah zahra markwith has -120 remaining. You can contact him by rand_abbas@yahoo.ca or +15593609357', 0, '2021-05-09 06:26:02', '2021-05-09 06:26:02'),
(1063, '48', 'Sun, May 09,2021 01:33pm', 'You have -120 in your account. You should Purchase hour now.', 0, '2021-05-09 19:33:25', '2021-05-09 19:33:25'),
(1065, '60', 'Sun, May 09,2021 02:33pm', 'Fatimah Farooq has -120 remaining. You can contact him by fatimanaveed21@gmail.com or +447368155209', 0, '2021-05-09 20:33:25', '2021-05-09 20:33:25'),
(1067, 'Admin', 'Wed, May 12,2021 03:54pm', 'Abdullah Waleed has -45 minutes remaining. You can contact him by hellowaleed@hotmail.com or +971 50 763 5105', 1, '2021-05-12 09:54:44', '2021-05-12 06:07:16'),
(1070, 'Admin', 'Wed, May 12,2021 03:54pm', 'Abdullah Waleed has -90 minutes remaining. You can contact him by hellowaleed@hotmail.com or +971 50 763 5105', 1, '2021-05-12 09:54:44', '2021-05-12 06:07:16'),
(1084, '62', 'Wed, May 12,2021 10:38am', 'You have -120 in your account. You should Purchase hour now.', 0, '2021-05-12 04:38:15', '2021-05-12 04:38:15'),
(1087, '61', 'Wed, May 12,2021 07:38pm', 'You have -60 in your account. You should Purchase hour now.', 0, '2021-05-12 13:38:15', '2021-05-12 13:38:15'),
(1090, '63', 'Wed, May 12,2021 10:38am', 'You have -180 in your account. You should Purchase hour now.', 0, '2021-05-12 04:38:15', '2021-05-12 04:38:15'),
(1093, '61', 'Wed, May 12,2021 07:38pm', 'You have -120 in your account. You should Purchase hour now.', 0, '2021-05-12 13:38:15', '2021-05-12 13:38:15'),
(1096, '65', 'Wed, May 12,2021 02:38pm', 'You have 0 in your account. You should Purchase hour now.', 0, '2021-05-12 08:38:15', '2021-05-12 08:38:15'),
(1101, '65', 'Wed, May 12,2021 02:38pm', 'You have -30 in your account. You should Purchase hour now.', 0, '2021-05-12 08:38:19', '2021-05-12 08:38:19'),
(1105, '21', 'Wed, May 12,2021 08:40pm', 'You requested to change a schedule. <br> Timezone: Africa/Cairo<br>Pre Class Time:08:00pm 13 May 2021<br>Change Time: 03:10pm 13 May 2021<br>Class Title:Class with Saad Mohamed<br>Subject:Quran Memorization', 1, '2021-05-12 14:40:14', '2021-05-12 12:40:17'),
(1106, '65', 'Wed, May 12,2021 02:40pm', '<b>Abdullah Omar <i>(abdullahomar2011@gmail.com)</i></b> requested to change a schedule. <br> Timezone: Africa/Cairo<br>Pre Class Time:08:00pm 13 May 2021<br>Change Time: 03:10pm 13 May 2021<br>Class Title:Class with Saad Mohamed<br>Subject:Quran Memorization', 0, '2021-05-12 08:40:14', '2021-05-12 08:40:14'),
(1109, '21', 'Wed, May 12,2021 08:54pm', '<b>Abdullah Waleed <i>(hellowaleed@hotmail.com)</i></b> requested to change a schedule. <br> Timezone: Africa/Cairo<br>Pre Class Time:08:00am 14 May 2021<br>Change Time: 04:00am 15 May 2021<br>Class Title:New Class<br>Subject:Arabic language', 1, '2021-05-12 14:54:15', '2021-05-13 02:12:03'),
(1112, '21', 'Wed, May 12,2021 08:58pm', '<b>Abdullah Waleed <i>(hellowaleed@hotmail.com)</i></b> requested to change a schedule. <br> Timezone: Asia/Dubai<br>Pre Class Time:08:00am 14 May 2021<br>Change Time: 08:00am 15 May 2021<br>Class Title:New Class<br>Subject:Arabic language', 1, '2021-05-12 14:58:06', '2021-05-13 02:12:03'),
(1116, '21', 'Thu, May 13,2021 07:04am', '<b>Abdullah Waleed <i>(hellowaleed@hotmail.com)</i></b> requested to change a schedule. <br> Timezone: Asia/Dubai<br>Pre Class Time:08:00am 14 May 2021<br>Change Time: 06:00am 01 Jan 1970<br>Class Title:New Class<br>Subject:Arabic language', 1, '2021-05-13 01:04:54', '2021-05-13 02:12:03'),
(1119, '21', 'Thu, May 13,2021 07:06am', '<b>Abdullah Waleed <i>(hellowaleed@hotmail.com)</i></b> requested to change a schedule. <br> Timezone: Asia/Dubai<br>Pre Class Time:08:00am 14 May 2021<br>Change Time: 10:00am 15 May 2021<br>Class Title:New Class<br>Subject:Arabic language', 1, '2021-05-13 01:06:27', '2021-05-13 02:12:03'),
(1122, '21', 'Thu, May 13,2021 07:07am', '<b>Abdullah Waleed <i>(hellowaleed@hotmail.com)</i></b> requested to change a schedule. <br> Timezone: Asia/Dubai<br>Pre Class Time:08:00am 14 May 2021<br>Change Time: 10:00am 15 May 2021<br>Class Title:New Class<br>Subject:Arabic language', 1, '2021-05-13 01:07:05', '2021-05-13 02:12:03'),
(1125, '21', 'Thu, May 13,2021 07:09am', '<b>Abdullah Waleed <i>(hellowaleed@hotmail.com)</i></b> requested to change a schedule. <br> Timezone: Asia/Dubai<br>Pre Class Time:08:00am 14 May 2021<br>Change Time: 08:00am 15 May 2021<br>Class Title:New Class<br>Subject:Arabic language', 1, '2021-05-13 01:09:00', '2021-05-13 02:12:03'),
(1128, '21', 'Thu, May 13,2021 07:52am', '<b>Abdullah Waleed <i>(hellowaleed@hotmail.com)</i></b> requested to change a schedule. <br> Timezone: Asia/Dubai<br>Pre Class Time:08:00am 14 May 2021<br>Change Time: 08:00am 15 May 2021<br>Class Title:New Class<br>Subject:Arabic language', 1, '2021-05-13 01:52:46', '2021-05-13 02:12:03'),
(1129, '21', 'Thu, May 13,2021 07:55am', ' The request to change class schedule for 16208343291250152768 was Approved.', 1, '2021-05-13 01:55:12', '2021-05-13 02:12:03'),
(1134, '21', 'Thu, May 13,2021 08:00am', 'Abdullah Waleed has -120 minutes remaining. You can contact him by hellowaleed@hotmail.com or +971 50 763 5105', 1, '2021-05-13 02:00:13', '2021-05-13 02:12:03'),
(1138, '21', 'Thu, May 13,2021 08:19am', ' The request to change class schedule for 1619280461426043543 was Approved.', 1, '2021-05-13 02:19:13', '2021-05-13 02:10:25'),
(1141, 'Admin', 'Thu, May 13,2021 10:42am', 'You have a new request from hellowaleed@hotmail.com', 1, '2021-05-13 04:42:35', '2021-05-13 00:45:32'),
(1143, '21', 'Thu, May 13,2021 08:42am', '<b>Abdullah Waleed <i>(hellowaleed@hotmail.com)</i></b> requested to change a schedule. <br> Timezone: Asia/Dubai<br>Pre Class Time:01:00pm 13 May 2021<br>Change Time: 01:00pm 15 May 2021<br>Class Title:Class with Abdullah Waleed<br>Subject:Quran Memorization', 1, '2021-05-13 02:42:35', '2021-05-13 02:10:25'),
(1146, 'Admin', 'Thu, May 13,2021 08:43am', ' The request to change class schedule for <b>Class with Abdullah Waleed</b> was Approved.', 1, '2021-05-13 02:43:03', '2021-05-13 00:45:32'),
(1147, 'Admin', 'Thu, May 13,2021 10:44am', 'You have a new request from hellowaleed@hotmail.com', 1, '2021-05-13 04:44:54', '2021-05-13 00:45:32'),
(1150, 'Admin', 'Thu, May 13,2021 10:50am', 'You have a new request from hellowaleed@hotmail.com', 1, '2021-05-13 04:50:37', '2021-05-13 00:53:35'),
(1153, 'Admin', 'Thu, May 13,2021 10:53am', 'You have a new request from hellowaleed@hotmail.com', 1, '2021-05-13 04:53:45', '2021-05-13 01:55:33'),
(1156, 'Admin', 'Thu, May 13,2021 10:59am', 'You have a new request from hellowaleed@hotmail.com', 1, '2021-05-13 04:59:56', '2021-05-13 01:55:33'),
(1159, 'Admin', 'Thu, May 13,2021 11:48am', 'You have a new request from hellowaleed@hotmail.com', 1, '2021-05-13 05:48:11', '2021-05-13 01:55:33'),
(1162, 'Admin', 'Thu, May 13,2021 11:50am', 'You have a new request from hellowaleed@hotmail.com', 1, '2021-05-13 05:50:18', '2021-05-13 01:55:33'),
(1165, 'Admin', 'Thu, May 13,2021 11:52am', 'You have a new request from hellowaleed@hotmail.com', 1, '2021-05-13 05:52:49', '2021-05-13 01:55:33'),
(1166, '64', 'Thu, May 13,2021 11:52am', 'You requested to change a schedule. <br> Timezone: Asia/Dubai<br>Pre Class Time:03:00pm 13 May 2021<br>Change Time: 03:00pm 15 May 2021<br>Class Title:Class with Abdullah Waleed<br>Subject:Quran Memorization', 1, '2021-05-13 05:52:49', '2021-05-13 01:52:52'),
(1169, '64', 'Thu, May 13,2021 11:53am', ' The request to change class schedule for <b>Class with Abdullah Waleed</b> was Approved.', 1, '2021-05-13 05:53:26', '2021-05-13 01:59:03'),
(1170, 'Admin', 'Thu, May 13,2021 09:53am', ' The request to change class schedule for <b>Class with Abdullah Waleed</b> was Approved.', 1, '2021-05-13 03:53:26', '2021-05-13 01:55:33'),
(1171, 'Admin', 'Thu, May 13,2021 11:59am', 'You have a new request from hellowaleed@hotmail.com', 1, '2021-05-13 05:59:01', '2021-05-13 02:00:21'),
(1174, '64', 'Thu, May 13,2021 12:06pm', ' The request of delete class <b>New Class</b> was Approved.', 1, '2021-05-13 06:06:00', '2021-05-13 02:07:44');
INSERT INTO `notifications` (`id`, `user`, `time`, `content`, `read`, `created_at`, `updated_at`) VALUES
(1175, 'Admin', 'Thu, May 13,2021 10:06am', ' The request of delete class <b>New Class</b> was Approved.', 1, '2021-05-13 04:06:00', '2021-05-13 10:09:32'),
(1176, 'Admin', 'Thu, May 13,2021 12:07pm', 'You have a new request from hellowaleed@hotmail.com', 1, '2021-05-13 06:07:41', '2021-05-13 10:09:32'),
(1179, '64', 'Thu, May 13,2021 12:08pm', ' The request of delete class <b>New Class</b> was Approved.', 1, '2021-05-13 06:08:08', '2021-05-13 10:09:10'),
(1180, 'Admin', 'Thu, May 13,2021 10:08am', ' The request of delete class <b>New Class</b> was Approved.', 1, '2021-05-13 04:08:09', '2021-05-13 10:09:32'),
(1181, 'Admin', 'Thu, May 13,2021 12:09pm', 'You have a new request from hellowaleed@hotmail.com', 1, '2021-05-13 06:09:01', '2021-05-13 10:09:32'),
(1182, '64', 'Thu, May 13,2021 12:09pm', 'You requested to change a schedule. <br> Timezone: Asia/Dubai<br>Pre Class Time:01:00pm 18 May 2021<br>Change Time: 02:00pm 18 May 2021<br>Class Title:Class with Abdullah Waleed<br>Subject:Quran Memorization', 1, '2021-05-13 06:09:01', '2021-05-13 10:09:10'),
(1185, '64', 'Thu, May 13,2021 12:09pm', ' The request to change class schedule for <b>Class with Abdullah Waleed</b> was Approved.', 1, '2021-05-13 06:09:18', '2021-05-13 10:09:10'),
(1186, 'Admin', 'Thu, May 13,2021 10:09am', ' The request to change class schedule for <b>Class with Abdullah Waleed</b> was Approved.', 1, '2021-05-13 04:09:18', '2021-05-13 10:09:32'),
(1187, 'Admin', 'Thu, May 13,2021 12:09pm', 'You have a new request from hellowaleed@hotmail.com', 1, '2021-05-13 06:09:45', '2021-05-13 10:09:32'),
(1188, '64', 'Thu, May 13,2021 12:09pm', 'You requested to change a schedule. <br> Timezone: Asia/Dubai<br>Pre Class Time:01:00pm 18 May 2021<br>Change Time: 03:00pm 18 May 2021<br>Class Title:Class with Abdullah Waleed<br>Subject:Quran Memorization', 1, '2021-05-13 06:09:45', '2021-05-13 10:09:10'),
(1191, '64', 'Thu, May 13,2021 12:09pm', ' The request to change class schedule for <b>Class with Abdullah Waleed</b> was Approved.', 1, '2021-05-13 06:09:50', '2021-05-13 10:09:10'),
(1192, 'Admin', 'Thu, May 13,2021 10:09am', ' The request to change class schedule for <b>Class with Abdullah Waleed</b> was Approved.', 1, '2021-05-13 04:09:50', '2021-05-13 10:09:32'),
(1193, 'Admin', 'Thu, May 13,2021 10:13am', 'You have a new request from abdullahomar2011@gmail.com', 1, '2021-05-13 04:13:21', '2021-05-13 10:09:32'),
(1194, '21', 'Thu, May 13,2021 10:13am', 'You requested to change a schedule. <br> Timezone: Africa/Cairo<br>Pre Class Time:06:00pm 13 May 2021<br>Change Time: 08:00pm 13 May 2021<br>Class Title:Class with Saad Mohamed<br>Subject:Quran Memorization', 1, '2021-05-13 04:13:21', '2021-05-13 02:13:24'),
(1195, '65', 'Thu, May 13,2021 04:13am', '<b>Abdullah Omar <i>(abdullahomar2011@gmail.com)</i></b> requested to change a schedule. <br> Timezone: Africa/Cairo<br>Pre Class Time:06:00pm 13 May 2021<br>Change Time: 08:00pm 13 May 2021<br>Class Title:Class with Saad Mohamed<br>Subject:Quran Memorization', 0, '2021-05-12 22:13:21', '2021-05-12 22:13:21'),
(1196, 'Admin', 'Thu, May 13,2021 10:15am', 'You have a new request from abdullahomar2011@gmail.com', 1, '2021-05-13 04:15:37', '2021-05-13 10:09:32'),
(1197, '21', 'Thu, May 13,2021 10:15am', 'You requested to change a schedule. <br> Timezone: Africa/Cairo<br>Pre Class Time:08:00pm 13 May 2021<br>Change Time: 09:00pm 13 May 2021<br>Class Title:Class with Saad Mohamed<br>Subject:Quran Memorization', 1, '2021-05-13 04:15:37', '2021-05-13 02:15:39'),
(1198, '65', 'Thu, May 13,2021 04:15am', '<b>Abdullah Omar <i>(abdullahomar2011@gmail.com)</i></b> requested to change a schedule. <br> Timezone: Africa/Cairo<br>Pre Class Time:08:00pm 13 May 2021<br>Change Time: 09:00pm 13 May 2021<br>Class Title:Class with Saad Mohamed<br>Subject:Quran Memorization', 0, '2021-05-12 22:15:37', '2021-05-12 22:15:37'),
(1199, '21', 'Thu, May 13,2021 10:15am', ' The request to change class schedule for <b>Class with Saad Mohamed</b> was Approved.', 1, '2021-05-13 04:15:53', '2021-05-13 02:16:43'),
(1200, '65', 'Thu, May 13,2021 04:15am', ' The request to change class schedule for <b>Class with Saad Mohamed</b> was Approved.', 0, '2021-05-12 22:15:53', '2021-05-12 22:15:53'),
(1201, 'Admin', 'Thu, May 13,2021 10:15am', ' The request to change class schedule for <b>Class with Saad Mohamed</b> was Approved.', 1, '2021-05-13 04:15:53', '2021-05-13 10:09:32'),
(1202, 'Admin', 'Thu, May 13,2021 10:16am', 'You have a new request from abdullahomar2011@gmail.com', 1, '2021-05-13 04:16:17', '2021-05-13 10:09:32'),
(1203, '62', 'Thu, May 13,2021 12:16am', '<b>Abdullah Omar <i>(abdullahomar2011@gmail.com)</i></b> sent a request to cancel the class \'Classe with lena  Mostavic', 0, '2021-05-12 18:16:17', '2021-05-12 18:16:17'),
(1204, '21', 'Thu, May 13,2021 10:16am', ' The request of delete class <b>Classe with lena  Mostavic</b> was Approved.', 1, '2021-05-13 04:16:37', '2021-05-13 02:16:43'),
(1205, '62', 'Thu, May 13,2021 12:16am', ' The request of delete class <b>Classe with lena  Mostavic</b> was Approved.', 0, '2021-05-12 18:16:37', '2021-05-12 18:16:37'),
(1206, 'Admin', 'Thu, May 13,2021 10:16am', ' The request of delete class <b>Classe with lena  Mostavic</b> was Approved.', 1, '2021-05-13 04:16:37', '2021-05-13 10:09:32'),
(1207, '64', 'Thu, May 13,2021 08:04pm', 'You have -165 minutes in your account. You should Purchase hour now.', 1, '2021-05-13 14:04:01', '2021-05-13 10:09:10'),
(1208, 'Admin', 'Thu, May 13,2021 08:04pm', 'Abdullah Waleed has -165 minutes remaining. You can contact him by hellowaleed@hotmail.com or +971 50 763 5105', 1, '2021-05-13 14:04:01', '2021-05-13 10:09:32'),
(1209, '21', 'Thu, May 13,2021 06:04pm', 'Abdullah Waleed has -165 minutes remaining. You can contact him by hellowaleed@hotmail.com or +971 50 763 5105', 1, '2021-05-13 12:04:01', '2021-05-13 10:14:33'),
(1210, 'Admin', 'Thu, May 13,2021 08:09pm', 'You have a new request from hellowaleed@hotmail.com', 1, '2021-05-13 14:09:05', '2021-05-13 10:09:32'),
(1211, '21', 'Thu, May 13,2021 06:09pm', '<b>Abdullah Waleed <i>(hellowaleed@hotmail.com)</i></b> sent a request to cancel the class(1619280461426043543) \'Class with Abdullah Waleed', 1, '2021-05-13 12:09:05', '2021-05-13 10:14:33'),
(1212, '21', 'Thu, May 13,2021 06:10pm', ' The request of delete class <b>Class with Abdullah Waleed</b> was Approved.', 1, '2021-05-13 12:10:03', '2021-05-13 10:14:33'),
(1213, '64', 'Thu, May 13,2021 08:10pm', ' The request of delete class <b>Class with Abdullah Waleed</b> was Approved.', 1, '2021-05-13 14:10:03', '2021-05-16 09:21:03'),
(1214, 'Admin', 'Thu, May 13,2021 06:10pm', ' The request of delete class <b>Class with Abdullah Waleed</b> was Approved.', 1, '2021-05-13 12:10:03', '2021-05-16 02:51:35'),
(1215, 'Admin', 'Thu, May 13,2021 06:14pm', 'You have a new request from abdullahomar2011@gmail.com', 1, '2021-05-13 12:14:31', '2021-05-16 02:51:35'),
(1216, '21', 'Thu, May 13,2021 06:14pm', 'You requested to change a schedule. <br> Timezone: Africa/Cairo<br>Pre Class Time:08:00pm 13 May 2021<br>Change Time: 10:00pm 13 May 2021<br>Class Title:Class with Saad Mohamed<br>Subject:Quran Memorization', 1, '2021-05-13 12:14:31', '2021-05-13 10:14:33'),
(1217, '65', 'Thu, May 13,2021 12:14pm', '<b>Abdullah Omar <i>(abdullahomar2011@gmail.com)</i></b> requested to change a schedule. <br> Timezone: Africa/Cairo<br>Pre Class Time:08:00pm 13 May 2021<br>Change Time: 10:00pm 13 May 2021<br>Class Title:Class with Saad Mohamed<br>Subject:Quran Memorization', 0, '2021-05-13 06:14:31', '2021-05-13 06:14:31'),
(1218, '21', 'Thu, May 13,2021 06:16pm', ' The request to change class schedule for <b>Class with Saad Mohamed</b> was Approved.', 1, '2021-05-13 12:16:48', '2021-05-18 00:59:09'),
(1219, '65', 'Thu, May 13,2021 12:16pm', ' The request to change class schedule for <b>Class with Saad Mohamed</b> was Approved.', 0, '2021-05-13 06:16:48', '2021-05-13 06:16:48'),
(1220, 'Admin', 'Thu, May 13,2021 06:16pm', ' The request to change class schedule for <b>Class with Saad Mohamed</b> was Approved.', 1, '2021-05-13 12:16:48', '2021-05-16 02:51:35'),
(1221, 'Admin', 'Thu, May 13,2021 12:24pm', 'You have a new request from askchairmenkapow@gmail.com', 1, '2021-05-13 06:24:45', '2021-05-16 02:51:35'),
(1222, '41', 'Thu, May 13,2021 12:24pm', 'You requested to change a schedule. <br> Timezone: America/New_York<br>Pre Class Time:04:00pm 15 May 2021<br>Change Time: 05:00pm 18 May 2021<br>Class Title:Class wih Ammon Winder<br>Subject:Quran Recitation', 1, '2021-05-13 06:24:45', '2021-05-13 10:24:48'),
(1223, '59', 'Thu, May 13,2021 06:24pm', '<b>Ammon Winder <i>(askchairmenkapow@gmail.com)</i></b> requested to change a schedule. <br> Timezone: America/New_York<br>Pre Class Time:04:00pm 15 May 2021<br>Change Time: 05:00pm 18 May 2021<br>Class Title:Class wih Ammon Winder<br>Subject:Quran Recitation', 0, '2021-05-13 12:24:45', '2021-05-13 12:24:45'),
(1224, '59', 'Thu, May 13,2021 06:26pm', ' The request to change class schedule for <b>Class wih Ammon Winder</b> was Approved.', 0, '2021-05-13 12:26:53', '2021-05-13 12:26:53'),
(1225, '41', 'Thu, May 13,2021 12:26pm', ' The request to change class schedule for <b>Class wih Ammon Winder</b> was Approved.', 1, '2021-05-13 06:26:53', '2021-05-13 11:24:25'),
(1226, 'Admin', 'Thu, May 13,2021 06:26pm', ' The request to change class schedule for <b>Class wih Ammon Winder</b> was Approved.', 1, '2021-05-13 12:26:53', '2021-05-16 02:51:35'),
(1228, '41', 'Thu, May 13,2021 01:24pm', 'You requested to change a schedule. <br> Timezone: America/New_York<br>Pre Class Time:10:00am 15 May 2021<br>Change Time: 11:00am 15 May 2021<br>Class Title:Class wih Ammon Winder<br>Subject:Quran Recitation', 1, '2021-05-13 07:24:23', '2021-05-13 11:24:25'),
(1229, '59', 'Thu, May 13,2021 07:24pm', '<b>Ammon Winder <i>(askchairmenkapow@gmail.com)</i></b> requested to change a schedule. <br> Timezone: America/New_York<br>Pre Class Time:10:00am 15 May 2021<br>Change Time: 11:00am 15 May 2021<br>Class Title:Class wih Ammon Winder<br>Subject:Quran Recitation', 0, '2021-05-13 13:24:23', '2021-05-13 13:24:23'),
(1230, '62', 'Sun, May 16,2021 12:51am', 'You have -180 in your account. You should Purchase hour now.', 0, '2021-05-15 18:51:51', '2021-05-15 18:51:51'),
(1232, '21', 'Sun, May 16,2021 10:51am', 'lena  Mostavic has -180 remaining. You can contact him by smostafavi@gmail.com or +1 (510) 684-3068', 1, '2021-05-16 04:51:51', '2021-05-18 00:59:09'),
(1233, '65', 'Sun, May 16,2021 04:51am', 'You have -60 in your account. You should Purchase hour now.', 0, '2021-05-15 22:51:51', '2021-05-15 22:51:51'),
(1235, '21', 'Sun, May 16,2021 10:51am', 'Saad Mohamed has -60 remaining. You can contact him by fahadasad1@gmail.com or +1 (309) 989-7155', 1, '2021-05-16 04:51:51', '2021-05-18 00:59:09'),
(1236, '64', 'Sun, May 16,2021 12:51pm', 'You have -195 in your account. You should Purchase hour now.', 1, '2021-05-16 06:51:51', '2021-05-16 09:21:03'),
(1238, '21', 'Sun, May 16,2021 10:51am', 'Abdullah Waleed has -195 remaining. You can contact him by hellowaleed@hotmail.com or +971 50 763 5105', 1, '2021-05-16 04:51:51', '2021-05-18 00:59:09'),
(1239, '64', 'Sun, May 16,2021 07:04pm', 'You have -240 minutes in your account. You should Purchase hour now.', 1, '2021-05-16 13:04:41', '2021-05-16 09:21:03'),
(1240, 'Admin', 'Sun, May 16,2021 07:04pm', 'Abdullah Waleed has -240 minutes remaining. You can contact him by hellowaleed@hotmail.com or +971 50 763 5105', 1, '2021-05-16 13:04:41', '2021-05-16 09:23:37'),
(1241, '21', 'Sun, May 16,2021 05:04pm', 'Abdullah Waleed has -240 minutes remaining. You can contact him by hellowaleed@hotmail.com or +971 50 763 5105', 1, '2021-05-16 11:04:41', '2021-05-18 00:59:09'),
(1242, 'Admin', 'Sun, May 16,2021 07:20pm', 'You have a new request from hellowaleed@hotmail.com', 1, '2021-05-16 13:20:56', '2021-05-16 09:23:37'),
(1244, '21', 'Sun, May 16,2021 05:20pm', '<b>Abdullah Waleed <i>(hellowaleed@hotmail.com)</i></b> requested to change a schedule. <br> Timezone: Asia/Dubai<br>Pre Class Time:07:00pm 18 May 2021<br>Change Time: 07:00pm 18 May 2021<br>Class Title:Class with Abdullah Waleed<br>Subject:Quran Memorization', 1, '2021-05-16 11:20:56', '2021-05-18 00:59:09'),
(1245, 'Admin', 'Sun, May 16,2021 07:21pm', 'You have a new request from hellowaleed@hotmail.com', 1, '2021-05-16 13:21:32', '2021-05-16 09:23:37'),
(1246, '64', 'Sun, May 16,2021 07:21pm', 'You requested to change a schedule. <br> Timezone: Asia/Dubai<br>Pre Class Time:07:00pm 18 May 2021<br>Change Time: 08:00pm 18 May 2021<br>Class Title:Class with Abdullah Waleed<br>Subject:Quran Memorization', 1, '2021-05-16 13:21:32', '2021-05-16 09:21:34'),
(1247, '21', 'Sun, May 16,2021 05:21pm', '<b>Abdullah Waleed <i>(hellowaleed@hotmail.com)</i></b> requested to change a schedule. <br> Timezone: Asia/Dubai<br>Pre Class Time:07:00pm 18 May 2021<br>Change Time: 08:00pm 18 May 2021<br>Class Title:Class with Abdullah Waleed<br>Subject:Quran Memorization', 1, '2021-05-16 11:21:32', '2021-05-18 00:59:09'),
(1248, '21', 'Sun, May 16,2021 05:23pm', ' The request to change class schedule for <b>Class with Abdullah Waleed</b> was Approved.', 1, '2021-05-16 11:23:50', '2021-05-18 00:59:09'),
(1249, '64', 'Sun, May 16,2021 07:23pm', ' The request to change class schedule for <b>Class with Abdullah Waleed</b> was Approved.', 1, '2021-05-16 13:23:50', '2021-05-16 09:36:00'),
(1250, 'Admin', 'Sun, May 16,2021 05:23pm', ' The request to change class schedule for <b>Class with Abdullah Waleed</b> was Approved.', 1, '2021-05-16 11:23:50', '2021-05-16 09:49:21'),
(1251, 'Admin', 'Sun, May 16,2021 07:40pm', 'You have a new request from hellowaleed@hotmail.com', 1, '2021-05-16 13:40:45', '2021-05-16 09:49:21'),
(1252, '21', 'Sun, May 16,2021 05:40pm', '<b>Abdullah Waleed <i>(hellowaleed@hotmail.com)</i></b> sent a request to cancel the class(New Class) \'New Class', 1, '2021-05-16 11:40:45', '2021-05-18 00:59:09'),
(1253, '21', 'Sun, May 16,2021 05:41pm', ' The request of delete class <b>New Class</b> was Approved.', 1, '2021-05-16 11:41:02', '2021-05-18 00:59:09'),
(1254, '64', 'Sun, May 16,2021 07:41pm', ' The request of delete class <b>New Class</b> was Approved.', 1, '2021-05-16 13:41:02', '2021-05-16 09:55:47'),
(1255, 'Admin', 'Sun, May 16,2021 05:41pm', ' The request of delete class <b>New Class</b> was Approved.', 1, '2021-05-16 11:41:02', '2021-05-16 09:49:21'),
(1256, '59', 'Sun, May 16,2021 05:50pm', '<b>Test</b> added a class for you. <br> <b>Last class</b><br><p>Hard class</p><br> Class Duration: 30 <br>Class Link: <a href=\'hellowaleed@zoom.com\'>hellowaleed@zoom.com</a> <br>Class Starting at: 2021-05-18 <br>Class Time: 02:00am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Mohamed Ismail<br>Students name: Abdullah Waleed', 0, '2021-05-16 11:50:21', '2021-05-16 11:50:21'),
(1257, '64', 'Sun, May 16,2021 07:50pm', '<b>Test</b> added a class for you. <br> <b>Last class</b><br><p>Hard class</p><br> Class Duration: 30 <br>Class Link: <a href=\'hellowaleed@zoom.com\'>hellowaleed@zoom.com</a> <br>Class Starting at: 2021-05-18 <br>Class Time: 02:00am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Mohamed Ismail<br>Students name: Abdullah Waleed', 1, '2021-05-16 13:50:21', '2021-05-16 09:55:47'),
(1258, 'Admin', 'Sun, May 16,2021 05:50pm', '<b>Test</b> added a class for you. <br> <b>Last class</b><br><p>Hard class</p><br> Class Duration: 30 <br>Class Link: <a href=\'hellowaleed@zoom.com\'>hellowaleed@zoom.com</a> <br>Class Starting at: 2021-05-18 <br>Class Time: 02:00am <br>Repeat:No Repeat <br>guests: No Guests <br>Assigned Teacher: Mohamed Ismail<br>Students name: Abdullah Waleed', 0, '2021-05-16 11:50:21', '2021-05-16 11:50:21'),
(1259, 'Admin', 'Sun, May 16,2021 07:55pm', 'You have a new request from hellowaleed@hotmail.com', 0, '2021-05-16 13:55:44', '2021-05-16 13:55:44'),
(1260, '64', 'Sun, May 16,2021 07:55pm', 'You requested to change a schedule. <br> Timezone: Asia/Dubai<br>Pre Class Time:02:00am 18 May 2021<br>Change Time: 10:00pm 18 May 2021<br>Class Title:Last class<br>Subject:Islamic Studies', 1, '2021-05-16 13:55:44', '2021-05-16 09:55:47'),
(1261, '59', 'Sun, May 16,2021 05:55pm', '<b>Abdullah Waleed <i>(hellowaleed@hotmail.com)</i></b> requested to change a schedule. <br> Timezone: Asia/Dubai<br>Pre Class Time:02:00am 18 May 2021<br>Change Time: 10:00pm 18 May 2021<br>Class Title:Last class<br>Subject:Islamic Studies', 0, '2021-05-16 11:55:44', '2021-05-16 11:55:44'),
(1262, '59', 'Sun, May 16,2021 06:01pm', ' The request to change class schedule for <b>Last class</b> was Approved.', 0, '2021-05-16 12:01:10', '2021-05-16 12:01:10'),
(1263, '64', 'Sun, May 16,2021 08:01pm', ' The request to change class schedule for <b>Last class</b> was Approved.', 1, '2021-05-16 14:01:10', '2021-05-16 10:09:32'),
(1264, 'Admin', 'Sun, May 16,2021 06:01pm', ' The request to change class schedule for <b>Last class</b> was Approved.', 0, '2021-05-16 12:01:10', '2021-05-16 12:01:10'),
(1265, 'Admin', 'Sun, May 16,2021 08:09pm', 'You have a new request from hellowaleed@hotmail.com', 0, '2021-05-16 14:09:29', '2021-05-16 14:09:29'),
(1266, '64', 'Sun, May 16,2021 08:09pm', 'You requested to change a schedule. <br> Timezone: Asia/Dubai<br>Pre Class Time:02:00am 18 May 2021<br>Change Time: 10:00pm 18 May 2021<br>Class Title:Last class<br>Subject:Islamic Studies', 1, '2021-05-16 14:09:29', '2021-05-16 10:09:32'),
(1267, '59', 'Sun, May 16,2021 06:09pm', '<b>Abdullah Waleed <i>(hellowaleed@hotmail.com)</i></b> requested to change a schedule. <br> Timezone: Asia/Dubai<br>Pre Class Time:02:00am 18 May 2021<br>Change Time: 10:00pm 18 May 2021<br>Class Title:Last class<br>Subject:Islamic Studies', 0, '2021-05-16 12:09:29', '2021-05-16 12:09:29'),
(1268, '59', 'Sun, May 16,2021 06:09pm', ' The request to change class schedule for <b>Last class</b> was Approved.', 0, '2021-05-16 12:09:46', '2021-05-16 12:09:46'),
(1270, 'Admin', 'Sun, May 16,2021 06:09pm', ' The request to change class schedule for <b>Last class</b> was Approved.', 0, '2021-05-16 12:09:46', '2021-05-16 12:09:46');

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
(9, '2021-05-01', '64', 'Student', 'Mohamed Ismail', '3.75', '96', '37.5', '', '', 'Africa/Cairo', '2021-05-01 17:58:45', '2021-05-01 17:58:45'),
(10, '2021-05-01', '161901672829', 'Client', 'Mohamed Ismail', '3.75', '96', '37.5', '', '', 'Africa/Cairo', '2021-05-01 17:59:32', '2021-05-01 17:59:32'),
(11, '2021-05-01', '41', 'Student', 'Mohamed Ismail', '6', '90', '60', '', '', 'Africa/Cairo', '2021-05-01 18:02:27', '2021-05-01 18:02:27'),
(12, '2021-05-01', '16198706598', 'Client', 'Mohamed Ismail', '6', '90', '60', '', '', 'Africa/Cairo', '2021-05-01 18:04:54', '2021-05-01 18:04:54'),
(13, '2021-05-01', '49', 'Student', 'Mohamed Ismail', '0.75', '89', '7.5', '', '', 'Africa/Cairo', '2021-05-01 18:07:07', '2021-05-01 18:07:07'),
(14, '2021-05-01', '161987094278', 'Client', 'Mohamed Ismail', '0.75', '89', '7.5', '', '', 'Africa/Cairo', '2021-05-01 18:09:43', '2021-05-01 18:09:43'),
(15, '2021-05-01', '29', 'Student', 'Mohamed Ismail', '-6', '94', '-60', '', '', 'Africa/Cairo', '2021-05-01 18:15:20', '2021-05-01 18:15:20'),
(16, '2021-05-01', '161904960123', 'Client', 'Mohamed Ismail', '-6', '94', '-60', '', '', 'Africa/Cairo', '2021-05-01 18:17:18', '2021-05-01 18:17:18'),
(17, '2021-05-01', '42', 'Student', 'Mohamed Ismail', '1', '85', '10', '', '', 'Africa/Cairo', '2021-05-01 18:20:12', '2021-05-01 18:20:12'),
(18, '2021-05-01', '161901891361', 'Client', 'Mohamed Ismail', '4', '85', '40', '', '', 'Africa/Cairo', '2021-05-01 18:21:44', '2021-05-01 18:21:44'),
(19, '2021-05-01', '61', 'Student', 'Mohamed Ismail', '2', '92', '20', '', '', 'Africa/Cairo', '2021-05-01 18:22:54', '2021-05-01 18:22:54'),
(20, '2021-05-01', '161901719165', 'Client', 'Mohamed Ismail', '3', '92', '30', '', '', 'Africa/Cairo', '2021-05-01 18:23:56', '2021-05-01 18:23:56'),
(21, '2021-05-01', '53', 'Student', 'Mohamed Ismail', '6.5', 'Ria', '65', '', '', 'Africa/Cairo', '2021-05-01 18:29:15', '2021-05-01 18:29:15'),
(22, '2021-05-01', '161901812147', 'Client', 'Mohamed Ismail', '16', 'Ria', '160', '', '', 'Africa/Cairo', '2021-05-01 18:30:34', '2021-05-01 18:30:34'),
(23, '2021-05-01', '40', 'Student', 'Mohamed Ismail', '1', '85', '10', '', '', 'Africa/Cairo', '2021-05-01 18:31:25', '2021-05-01 18:31:25'),
(24, '2021-05-01', '48', 'Student', 'Mohamed Ismail', '1', '92', '10', '', '', 'Africa/Cairo', '2021-05-01 18:32:17', '2021-05-01 18:32:17'),
(25, '2021-05-01', '32', 'Student', 'Mohamed Ismail', '2', '93', '20', '', '', 'Africa/Cairo', '2021-05-01 18:34:35', '2021-05-01 18:34:35'),
(26, '2021-05-01', '161987262637', 'Client', 'Mohamed Ismail', '2', '93', '20', '', '', 'Africa/Cairo', '2021-05-01 18:37:42', '2021-05-01 18:37:42'),
(27, '2021-05-01', '38', 'Student', 'Mohamed Ismail', '6', '86', '60', '', '', 'Africa/Cairo', '2021-05-01 18:39:18', '2021-05-01 18:39:18'),
(28, '2021-05-01', '161902051658', 'Client', 'Mohamed Ismail', '8', '86', '80', '', '', 'Africa/Cairo', '2021-05-01 18:40:08', '2021-05-01 18:40:08'),
(29, '2021-05-01', '36', 'Student', 'Mohamed Ismail', '2', '', '20', '', '', 'Africa/Cairo', '2021-05-01 18:41:59', '2021-05-01 18:41:59'),
(30, '2021-05-01', '161901902154', 'Client', 'Mohamed Ismail', '-10', '', '-110', '', '', 'Africa/Cairo', '2021-05-01 18:45:18', '2021-05-01 18:45:18'),
(31, '2021-05-01', '51', 'Student', 'Mohamed Ismail', '9.5', 'Ria', '95', '', '', 'Africa/Cairo', '2021-05-01 18:46:50', '2021-05-01 18:46:50'),
(32, '2021-05-01', '46', 'Student', 'Mohamed Ismail', '9', '', '-90', '', '', 'Africa/Cairo', '2021-05-01 18:51:04', '2021-05-01 18:51:04'),
(33, '2021-05-01', '44', 'Student', 'Mohamed Ismail', '2', '87', '20', '', '', 'Africa/Cairo', '2021-05-01 18:55:42', '2021-05-01 18:55:42'),
(34, '2021-05-01', '161902036212', 'Client', 'Mohamed Ismail', '4', '87', '40', '', '', 'Africa/Cairo', '2021-05-01 18:57:13', '2021-05-01 18:57:13'),
(35, '2021-05-01', '45', 'Student', 'Mohamed Ismail', '1', '87', '10', '', '', 'Africa/Cairo', '2021-05-01 18:57:53', '2021-05-01 18:57:53'),
(36, '2021-05-01', '30', 'Student', 'Mohamed Ismail', '1', '95', '10', '', '', 'Africa/Cairo', '2021-05-01 19:00:48', '2021-05-01 19:00:48'),
(37, '2021-05-01', '47', 'Student', 'Mohamed Ismail', '1', '87', '10', '', '', 'Africa/Cairo', '2021-05-01 19:01:32', '2021-05-01 19:01:32'),
(38, '2021-05-01', '34', 'Student', 'Mohamed Ismail', '3', '91', '30', '', '', 'Africa/Cairo', '2021-05-01 19:02:40', '2021-05-01 19:02:40'),
(39, '2021-05-01', '161904978711', 'Client', 'Mohamed Ismail', '3', '91', '30', '', '', 'Africa/Cairo', '2021-05-01 19:03:20', '2021-05-01 19:03:20'),
(40, '2021-05-01', '65', 'Student', 'Mohamed Ismail', '7.5', '101', '75', '', '', 'Africa/Cairo', '2021-05-01 19:14:54', '2021-05-01 19:14:54'),
(41, '2021-05-01', '161901828089', 'Client', 'Mohamed Ismail', '7.5', '101', '75', '', '', 'Africa/Cairo', '2021-05-01 19:15:57', '2021-05-01 19:15:57'),
(42, '2021-05-01', '35', 'Student', 'Mohamed Ismail', '0', '84', '', '', '', 'Africa/Cairo', '2021-05-01 19:17:42', '2021-05-01 19:17:42'),
(43, '2021-05-01', '161901922713', 'Client', 'Mohamed Ismail', '0', '84', '', '', '', 'Africa/Cairo', '2021-05-01 19:18:33', '2021-05-01 19:18:33'),
(44, '2021-05-01', '37', 'Student', 'Mohamed Ismail', '0', '84', '', '', '', 'Africa/Cairo', '2021-05-01 19:18:55', '2021-05-01 19:18:55'),
(45, '2021-05-01', '54', 'Student', 'Mohamed Ismail', '1', '81', '10', '', '', 'Africa/Cairo', '2021-05-01 19:19:34', '2021-05-01 19:19:34'),
(46, '2021-05-01', '161901962765', 'Client', 'Mohamed Ismail', '1', '81', '10', '', '', 'Africa/Cairo', '2021-05-01 19:21:18', '2021-05-01 19:21:18'),
(47, '2021-05-01', '39', 'Student', 'Mohamed Ismail', '2', '85', '20', '', '', 'Africa/Cairo', '2021-05-01 19:22:33', '2021-05-01 19:22:33');

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

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `title`, `description`, `link`, `subject`, `duration`, `timezone`, `starting`, `teacher`, `student`, `t_id`, `s_id`, `guest`, `guest_active`, `repeat`, `ras`, `notes`, `assignment`, `status`, `lastclass`, `created_at`, `updated_at`) VALUES
(37, 'class with Sundus Jaafer', 'Quran memorization and recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Memorization', 30, 'Africa/Cairo', '2021-04-24 21:00:00', 'lamiaaali1997@gmail.com', 'SundusJaafar@khouse.com', '60', '37', '1', '1', ',Saturday', '1619264923813023671', '* Previous assignment: the letters from letter Alif to letter خ and revision on surah Al fatiha.\r\n* Lesson topic       :  the letters  د/ذ/ر/ز/س/ش and Revision on sursh Al masad, al nasr and surah Al kaferon\r\n* Class performance  : good she did not do the homework for the previous class.\r\n* New assignment     :practice the letters till letter ش and revision on suraht Al kaferon.', '', '1', '2021-05-01 00:00:00', '2021-04-25 04:33:45', '2021-04-25 02:43:55'),
(38, 'class with Sinan Jaafer', 'Quran memorization and recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Memorization', 30, 'Africa/Cairo', '2021-04-24 21:30:00', 'lamiaaali1997@gmail.com', 'dahlia_jaffer@yahoo.com', '60', '35', '1', '1', ',Saturday', '16192650291487421430', '* Previous assignment: Sinan did not do the last assignment which was to memorize 3 verses from Surat alKaferoun\r\n* Lesson topic       : repeated the same 3 verses and practiced some word with the sukun sign\r\n* Class performance  : Good\r\n* New assignment     : the same assignment of the last class + reading the assigned words from page 43 from the book', '', '1', '2021-04-24 21:30:00', '2021-04-25 04:33:45', '2021-04-25 02:47:42'),
(39, 'class with Leya Qureshi', 'Quran recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 20:00:00', 'lamiaaali1997@gmail.com', 'leyaqureshi@khouse.com', '60', '55', '1', '1', ',Sunday,Saturday', '1619265587653001529', '* Previous assignment: It was our first class\r\n* Lesson topic       : Arabic alphabet and their shapes in different position + reciting Quran\r\n* Class performance  : Excellent\r\n* New assignment     : Revising the Arabic alphabet + revising Surat al Fatihah listening and repeating after the shiekh in this video: https://www.youtube.com/watch?v=MHUGR3Ejly8', '', '1', '2021-04-24 20:00:00', '2021-04-25 04:33:45', '2021-04-25 02:50:53'),
(40, 'class with  Manahil Qureshi', 'Quran recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 20:30:00', 'lamiaaali1997@gmail.com', 'drjamshed@gmail.com', '60', '52', '1', '1', ',Sunday,Saturday', '16192656451227564799', '* Previous assignment: did not do today\'s class. It was only Leya\r\n* Lesson topic       :\r\n* Class performance  :\r\n* New assignment     :', '', '1', '2021-04-24 20:30:00', '2021-04-25 04:33:45', '2021-04-25 02:51:34'),
(47, 'Class with Fatimh zahra markwith', 'Quran recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 22:00:00', 'lamiaaali1997@gmail.com', 'rand_abbas@yahoo.ca', '60', '50', '1', '1', ',Monday,Saturday,Wednesday', '1619298314661381492', '* Previous assignment: the letter و as a medd letter\r\n* Lesson topic       : revision over the medd letters\r\n* Class performance  : Very good\r\n* New assignment     : revision over the medd letters و ا ي', '', '1', '2021-04-24 22:00:00', '2021-04-25 05:05:38', '2021-04-25 03:07:31'),
(48, 'class with Fatimah farooq', 'Arabic language classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Arabic language', 60, 'Africa/Cairo', '2021-04-24 11:00:00', 'lamiaaali1997@gmail.com', 'fatimanaveed21@gmail.com', '60', '48', '1', '1', ',Sunday,Wednesday', '1619265852649305878', '* Previous assignment:to listen to this video and translate it https://youtu.be/Tff433H4Duw\r\n* Lesson topic       : doing the home work and do a question in page 31 from Al knooz book and a text page 52\r\n* Class performance  : very good\r\n* New assignment     : to continue this video https://youtu.be/Tff433H4Duw', '', '1', '2021-04-25 11:00:00', '2021-04-25 18:02:13', '2021-04-25 16:06:05'),
(49, 'Class with Awais Khan', 'Arabic language classes.', 'https://us05web.zoom.us/j/2320923569?pwd=YVVQVk56c3k3K1dYc283Q2JGSmVodz099', 'Arabic language', 60, 'Africa/Cairo', '2021-04-25 04:00:00', 'saleh2ef@gmail.com', 'mrawaisalikhan2006@gmail.com', '22', '29', '1', '1', ',Sunday', '1619286278612551243', '* Previous assignment:كتابة محادثة باللغة العربية\r\n* Lesson topic       :الاعداد\r\n* Class performance  :ممتاز\r\n* New assignment     :كتابة محادثة وترقيم السطور', '', '1', '2021-04-25 04:00:00', '2021-04-25 18:37:40', '2021-05-02 01:28:37'),
(50, 'Class with Kamal Southall', 'Quran Recitation  classes.', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-25 12:00:00', 'fodafoda34@gmail.com', 'Southallgroup@gmail.com', '19', '31', '1', '1', ',Monday,Wednesday,Friday,Saturday', '161928125788940211', '* Previous assignment: Studying rule of Idgam\r\n* Lesson topic       : Practice Izhar and Idgam  \r\n* Class performance  : V Good\r\n* New assignment     : Preparing new verses from verse no. 17 Sura albaqara', '', '1', '2021-04-25 12:00:00', '2021-04-25 18:40:11', '2021-04-26 17:06:16'),
(51, 'class with Leya Qureshi', 'Quran recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 20:00:00', 'lamiaaali1997@gmail.com', 'leyaqureshi@khouse.com', '60', '55', '1', '1', ',Sunday,Saturday', '1619265587653001529', '* Previous assignment: she attended the class yesterday\r\n* Lesson topic       :\r\n* Class performance  :\r\n* New assignment     :', '', '1', '2021-04-25 20:00:00', '2021-04-26 03:01:59', '2021-04-26 01:03:02'),
(52, 'class with  Manahil Qureshi', 'Quran recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 20:30:00', 'lamiaaali1997@gmail.com', 'drjamshed@gmail.com', '60', '52', '1', '1', ',Sunday,Saturday', '16192656451227564799', '* Previous assignment: It was our first class \r\n* Lesson topic       :Arabic alphabet and their shapes in different position + reciting Quran\r\n* Class performance  :Excellent\r\n* New assignment     :Revising the Arabic alphabet + revising Surat al Fatihah listening and repeating after the shiekh in this video: https://www.youtube.com/watch?v=MHUGR3Ejly8', '', '1', '2021-04-25 20:30:00', '2021-04-26 03:01:59', '2021-04-26 01:05:12'),
(78, 'Class with Fatimh zahra markwith', 'Quran recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 22:00:00', 'lamiaaali1997@gmail.com', 'rand_abbas@yahoo.ca', '60', '50', '0', '1', ',Monday,Saturday,Wednesday', '1619298314661381492', '* Previous assignment:\r\n* Lesson topic       : she did not attend the class because she was ill, her mom told me at the time of the class\r\n* Class performance  :\r\n* New assignment     :', '', '1', '2021-04-26 22:00:00', '2021-04-27 04:04:15', '2021-04-27 02:05:57'),
(79, 'Class with Tasneef', 'Quran  Memorization  classes.', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-25 20:00:00', 'fodafoda34@gmail.com', 'tasneefm@gmail.com', '19', '54', '1', '1', ',Monday', '16192851511706967376', '* Previous assignment: Taking lesson four from book of Imam Muhammad bin Saud University series 2nd level\r\n* Lesson topic       : Types of pronouns specifically for verbs and nouns and common between them\r\n* Class performance  : Excellent \r\n* New assignment     : Complete the exercises', '', '1', '2021-04-26 20:00:00', '2021-04-27 04:26:10', '2021-04-28 04:07:47'),
(80, 'class with Farrah Waseem', 'Quran recitation with Tajweed classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 05:00:00', 'lamiaaali1997@gmail.com', 'FarrahButt@khouse.com', '60', '40', '1', '1', ',Tuesday,Wednesday', '16192661681057687647', '* Previous assignment: to memorize 4 verses from surat al nas\r\n* Lesson topic       : recite surat al nas and do revision on sokoon sign\r\n* Class performance  : good he did not do the homework \r\n* New assignment     :same assignment for the last class', '', '1', '2021-04-27 05:00:00', '2021-04-27 12:15:36', '2021-04-27 10:18:48'),
(81, 'class with Danial Waseem', 'Quran recitation with Tajweed classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 05:30:00', 'lamiaaali1997@gmail.com', 'Danialbutt@khouse.com', '60', '42', '1', '1', ',Tuesday,Wednesday', '16192662371837333792', '* Previous assignment: to memorize 4 verses from surat al nas\r\n* Lesson topic       : recite surat al nas and do revision on sokoon sign\r\n* Class performance  : good he did not do the homework \r\n* New assignment     :same assignment for the last class', '', '1', '2021-04-27 05:30:00', '2021-04-27 12:15:36', '2021-04-27 10:19:23'),
(82, 'Class wih Waseem Butt', 'Quran recitation with Tajweed classes', 'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09', 'Quran Recitation', 60, 'Africa/Cairo', '2021-04-27 05:00:00', 'mo7amed2225@gmail.com', 'suuper7@gmail.com', '59', '39', '1', '1', ',Tuesday,Wednesday', '1619443582755386844', '* Previous assignment: none\r\n* Lesson topic       : Surat Hud from verse 66\r\n* Class performance  : Very good\r\n* New assignment     : none', '', '1', '2021-04-27 05:00:00', '2021-04-27 17:04:03', '2021-04-27 15:05:32'),
(84, 'Class with Ibrahem Wasif', 'Arabic language classes', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Arabic language', 30, 'Europe/London', '2021-04-25 18:00:00', 'fodafoda34@gmail.com', 'ibrahim@khouse.com', '19', '51', '1', '1', ',Tuesday,Thursday', '16192760641000530377', '* Previous assignment: Writing verbs in command form\r\n* Lesson topic       : Revision o three types of verbs\r\n* Class performance  : V Good\r\n* New assignment     :  Write the verb شرب in all forms if all verbs', '', '1', '2021-04-27 18:00:00', '2021-04-28 06:03:49', '2021-04-28 04:11:14'),
(86, 'class with Farrah Waseem', 'Quran recitation with Tajweed classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 05:00:00', 'lamiaaali1997@gmail.com', 'FarrahButt@khouse.com', '60', '40', '1', '1', ',Tuesday,Wednesday', '16192661681057687647', '* Previous assignment: memorize surat korish and do the difference between اخفاء شفوي و الاقلاب \r\n* Lesson topic       : revision on some previous rules and do surat الفيل اول 3 ايات\r\n* Class performance  :very good\r\n* New assignment     : memorize surat Al pheel', '', '1', '2021-04-28 05:00:00', '2021-04-28 12:03:56', '2021-04-28 10:08:10'),
(87, 'class with Danial Waseem', 'Quran recitation with Tajweed classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 05:30:00', 'lamiaaali1997@gmail.com', 'Danialbutt@khouse.com', '60', '42', '1', '1', ',Tuesday,Wednesday', '16192662371837333792', '* Previous assignment: to memorize 4 verses from surat AL nas\r\n* Lesson topic       :\r\n* Class performance  : he did not do the homework becouse he has some tests to do\r\n* New assignment     : same assignment for the last class', '', '1', '2021-04-28 05:30:00', '2021-04-28 12:03:56', '2021-04-28 10:10:08'),
(88, 'class with Fatimah farooq', 'Arabic language classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Arabic language', 60, 'Africa/Cairo', '2021-04-24 11:00:00', 'lamiaaali1997@gmail.com', 'fatimanaveed21@gmail.com', '60', '48', '1', '1', ',Sunday,Wednesday', '1619265852649305878', '* Previous assignment:was to do the listening to this video https://youtu.be/Tff433H4Duw\r\n* Lesson topic       : do the exercise page 34 in knooz book and the text page 150 in نحو book \r\n* Class performance  : very good\r\n* New assignment     : page 35 from knooz book and to do the listening https://youtu.be/Tff433H4Duw', '', '1', '2021-04-28 11:00:00', '2021-04-28 18:03:09', '2021-04-28 16:06:28'),
(89, 'Class with Kamal Southall', 'Quran Recitation  classes.', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-25 12:00:00', 'fodafoda34@gmail.com', 'Southallgroup@gmail.com', '19', '31', '1', '1', ',Monday,Wednesday,Friday,Saturday', '161928125788940211', '* Previous assignment: Reading and practicing Iqlab rule\r\n* Lesson topic       : Ikhfa Rule\r\n* Class performance  : V Good\r\n* New assignment     : Reading and practicing Ikhfa rule', '', '1', '2021-04-28 12:00:00', '2021-04-28 19:50:45', '2021-04-29 09:38:36'),
(90, 'Class with Fatimh zahra markwith', 'Quran recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 22:00:00', 'lamiaaali1997@gmail.com', 'rand_abbas@yahoo.ca', '60', '50', '1', '1', ',Monday,Saturday,Wednesday', '1619298314661381492', '* Previous assignment:\r\n* Lesson topic       : بعض الكلمات وعكسها\r\n* Class performance  :\r\n* New assignment     :', '', '1', '2021-04-28 22:00:00', '2021-04-29 04:33:14', '2021-04-29 02:33:58'),
(93, 'Class with Kareem Jaafar', 'Quran Memorization  classes.', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-29 05:00:00', 'fodafoda34@gmail.com', 'Kareem@khouse.com', '19', '46', '1', '1', ',Thursday', '1619281490952495838', '* Previous assignment: Surat al takathir\r\n* Lesson topic       : Rehearse surat al takathur \r\n* Class performance  : Good\r\n* New assignment     : Memorize surat al takathur all again with Surat al Asr', '', '1', '2021-04-29 05:00:00', '2021-04-29 11:35:18', '2021-04-29 10:04:42'),
(97, 'Class with Ibrahem Wasif', 'Arabic language classes', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Arabic language', 30, 'Europe/London', '2021-04-25 18:00:00', 'fodafoda34@gmail.com', 'ibrahim@khouse.com', '19', '51', '1', '1', ',Tuesday,Thursday', '16192760641000530377', '* Previous assignment: Write verbs in all forms \r\n* Lesson topic       : Definite and indefinite nouns\r\n* Class performance  : V good\r\n* New assignment     : Identify definite and indefinite nouns in the given mouns', '', '1', '2021-04-29 18:00:00', '2021-04-30 01:36:25', '2021-04-29 23:38:09'),
(99, 'Class with Kamal Southall', 'Quran Recitation  classes.', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-25 12:00:00', 'fodafoda34@gmail.com', 'Southallgroup@gmail.com', '19', '31', '0', '0', ',Monday,Wednesday,Friday,Saturday', '161928125788940211', '', '', '1', '2021-04-30 12:00:00', '2021-05-01 07:05:05', '2021-05-01 07:05:05'),
(100, 'Class with Anu Kmt', 'Quran Recitation   classes.', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Quran Recitation', 45, 'Africa/Cairo', '2021-04-30 14:00:00', 'fodafoda34@gmail.com', 'Anukemet@hotmail.com', '19', '49', '1', '1', ',Friday,Saturday', '16192817121549497391', '* Previous assignment: Done\r\n* Lesson topic       : Recitation from from verse 53 to 59\r\n* Class performance  : V Good\r\n* New assignment     : Prepare new verses from verse 60', '', '1', '2021-04-30 14:00:00', '2021-05-01 07:05:05', '2021-05-01 05:07:03'),
(101, 'test', 'class', 'zoom', 'Quran Memorization', 60, 'America/New_York', '2021-04-29 05:00:00', 'mo7amed2225@gmail.com', 'Student@test', '59', '70', '0', '0', ',Thursday,Friday,Saturday', '1619688914842337352', '', '', '1', '2021-04-30 05:00:00', '2021-05-01 13:47:09', '2021-05-01 13:47:09'),
(102, 'test', 'class', 'zoom', 'Quran Memorization', 60, 'America/New_York', '2021-04-29 05:00:00', 'mo7amed2225@gmail.com', 'Student@test', '59', '70', '0', '0', ',Thursday,Friday,Saturday', '1619688914842337352', '', '', '0', '2021-05-01 05:00:00', '2021-05-01 19:47:11', '2021-05-01 19:47:11'),
(103, 'Class with Kamal Southall', 'Quran Recitation  classes.', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-25 12:00:00', 'fodafoda34@gmail.com', 'Southallgroup@gmail.com', '19', '31', '0', '0', ',Monday,Wednesday,Friday,Saturday', '161928125788940211', '', '', '1', '2021-05-01 12:00:00', '2021-05-01 19:57:08', '2021-05-01 19:57:08'),
(104, 'Class with Anu Kmt', 'Quran Recitation   classes.', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Quran Recitation', 45, 'Africa/Cairo', '2021-04-30 14:00:00', 'fodafoda34@gmail.com', 'Anukemet@hotmail.com', '19', '49', '1', '1', ',Friday,Saturday', '16192817121549497391', '* Previous assignment: Done\r\n* Lesson topic       : Recitation \r\n* Class performance  : V good\r\n* New assignment     : Reading from verse 65', '', '1', '2021-05-01 14:00:00', '2021-05-01 20:55:06', '2021-05-01 18:56:18'),
(105, 'class with Sundus Jaafer', 'Quran memorization and recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Memorization', 30, 'Africa/Cairo', '2021-04-24 21:00:00', 'lamiaaali1997@gmail.com', 'SundusJaafar@khouse.com', '60', '37', '1', '1', ',Saturday', '1619264923813023671', '* Previous assignment:  to memorize surat AL kaferon and korish  الكافرون و قريش\r\n* Lesson topic       : same for the last class\r\n* Class performance  : fair she did not do the homework she needs to et some help from her mom to do her assignment\r\n* New assignment     : same assignment for the last class', '', '1', '2021-05-01 21:00:00', '2021-05-02 03:02:18', '2021-05-02 01:39:47'),
(106, 'class with Leya Qureshi', 'Quran recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 20:00:00', 'lamiaaali1997@gmail.com', 'leyaqureshi@khouse.com', '60', '55', '1', '1', ',Sunday,Saturday', '1619265587653001529', '* Previous assignment:to memorize surat al Fatiha and the letters till letter ز\r\n* Lesson topic       : letters till letter ظ and surat Al Naas\r\n* Class performance  : very good she needs to know the names of the surah and to read very slowly \r\n* New assignment     : to memorize surat AL naas and the letters till letter   ظ', '', '1', '2021-05-01 20:00:00', '2021-05-02 03:02:18', '2021-05-02 01:10:24'),
(107, 'class with  Manahil Qureshi', 'Quran recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 20:30:00', 'lamiaaali1997@gmail.com', 'drjamshed@gmail.com', '60', '52', '1', '1', ',Sunday,Saturday', '16192656451227564799', '* Previous assignment: to memorize surat al Fatiha and the letters till letter ز\r\n* Lesson topic       : letters till letter ظ and surat Al Naas\r\n* Class performance  : very good she needs to know the names of the surah and to read very slowly \r\n* New assignment     : to memorize surat AL naas and the letters till letter   ظ', '', '1', '2021-05-01 20:30:00', '2021-05-02 03:02:18', '2021-05-02 01:09:51'),
(108, 'Class with Haaris Abdul sattar', 'Quran  Recitation   classes.', 'https://us05web.zoom.us/j/2320923569?pwd=YVVQVk56c3k3K1dYc283Q2JGSmVodz099', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-27 02:30:00', 'saleh2ef@gmail.com', 'drtariqsattar@gmail.com', '22', '32', '0', '0', ',Saturday,Tuesday,Wednesday,Thursday,Friday', '16192856561614025181', '', '', '1', '2021-04-28 02:30:00', '2021-05-02 03:22:08', '2021-05-02 03:22:08'),
(109, 'Class with Awais Khan', 'Arabic language classes.', 'https://us05web.zoom.us/j/2320923569?pwd=YVVQVk56c3k3K1dYc283Q2JGSmVodz099', 'Arabic language', 60, 'Africa/Cairo', '2021-05-01 15:00:00', 'saleh2ef@gmail.com', 'mrawaisalikhan2006@gmail.com', '22', '29', '1', '1', ',Saturday', '1619286234699589830', '* Previous assignment: كتابة محادثة وترقيم السطور\r\n* Lesson topic       :تطبيق على الارقام والضمائر والصفات\r\n* Class performance  : Excellent\r\n* New assignment     :كتابة محادثة كاملة وكتابة ارقام تليفونات وقراءتها', '', '1', '2021-05-01 15:00:00', '2021-05-02 03:22:08', '2021-05-02 01:26:02'),
(110, 'Class with Haaris Abdul sattar', 'Quran  Recitation   classes.', 'https://us05web.zoom.us/j/2320923569?pwd=YVVQVk56c3k3K1dYc283Q2JGSmVodz099', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-27 02:30:00', 'saleh2ef@gmail.com', 'drtariqsattar@gmail.com', '22', '32', '0', '0', ',Saturday,Tuesday,Wednesday,Thursday,Friday', '16192856561614025181', '', '', '1', '2021-04-29 02:30:00', '2021-05-02 03:26:38', '2021-05-02 03:26:38'),
(111, 'Class with Haaris Abdul sattar', 'Quran  Recitation   classes.', 'https://us05web.zoom.us/j/2320923569?pwd=YVVQVk56c3k3K1dYc283Q2JGSmVodz099', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-27 02:30:00', 'saleh2ef@gmail.com', 'drtariqsattar@gmail.com', '22', '32', '0', '0', ',Saturday,Tuesday,Wednesday,Thursday,Friday', '16192856561614025181', '', '', '1', '2021-04-30 02:30:00', '2021-05-02 03:27:27', '2021-05-02 03:27:27'),
(112, 'class with Sinan Jaafer', 'Quran memorization and recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Memorization', 30, 'Africa/Cairo', '2021-04-24 21:30:00', 'lamiaaali1997@gmail.com', 'dahlia_jaffer@yahoo.com', '60', '35', '1', '1', ',Saturday', '16192650291487421430', '* Previous assignment: to memorize the first 3 verses from sural Al kaferon الكافون\r\n* Lesson topic       : surat AL kaferon\r\n* Class performance  : fair he did not do the assignment \r\n* New assignment     : to memorize surat Al kaferon الكافرون', '', '1', '2021-05-01 21:30:00', '2021-05-02 03:35:44', '2021-05-02 01:42:28'),
(113, 'Class with Fatimh zahra markwith', 'Quran recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 22:00:00', 'lamiaaali1997@gmail.com', 'rand_abbas@yahoo.ca', '60', '50', '1', '1', ',Monday,Saturday,Wednesday', '1619298314661381492', '* Previous assignment: to do revision on maad letters \r\n* Lesson topic       : singular and dual words\r\n* Class performance  : very good\r\n* New assignment     : this video https://youtu.be/jrLCQYxEPkY', '', '1', '2021-05-01 22:00:00', '2021-05-02 04:32:26', '2021-05-02 02:34:13'),
(116, 'Class with Essa Wasif', 'Arabic language conversation  classes .', 'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09', 'Arabic language', 60, 'Europe/London', '2021-05-01 11:00:00', 'dodyhelmy911@gmail.com', 'essa@khouse.com', '20', '53', '1', '1', ',Sunday', '1619276604604074386', '* Previous assignment:\r\n* Lesson topic       :Conversation\r\n* Class performance  :Very good\r\n* New assignment     :Introduc yourself قدم نفسك https://docs.google.com/document/d/1i7Ok9CLPUYXxGEoioSeswkGm2GZAr5dzvvl7TuYdpzY/edit?usp=sharing', '', '1', '2021-05-01 11:00:00', '2021-05-02 03:33:42', '2021-05-02 16:44:19'),
(118, 'Class with Haaris Abdul sattar', 'Quran  Recitation   classes.', 'https://us05web.zoom.us/j/2320923569?pwd=YVVQVk56c3k3K1dYc283Q2JGSmVodz099', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-27 02:30:00', 'saleh2ef@gmail.com', 'drtariqsattar@gmail.com', '22', '32', '0', '0', ',Saturday,Tuesday,Wednesday,Thursday,Friday', '16192856561614025181', '', '', '0', '2021-05-01 02:30:00', '2021-05-02 06:46:36', '2021-05-02 06:46:36'),
(119, 'class with Fatimah farooq', 'Arabic language classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Arabic language', 60, 'Africa/Cairo', '2021-04-24 11:00:00', 'lamiaaali1997@gmail.com', 'fatimanaveed21@gmail.com', '60', '48', '1', '1', ',Sunday,Wednesday', '1619265852649305878', '* Previous assignment:to continue this video https://youtu.be/Tff433H4Duw\r\n* Lesson topic       : finishing this video https://youtu.be/Tff433H4Duw and learning some about the time\r\n* Class performance  : very good\r\n* New assignment     : to do the story page no 35 from Al knouz book and to learn these sentences in arabic \r\n/https://englishwithomnia.com/%D8%AC%D9%85%D9%84-%D8%A7%D9%86%D8%AC%D9%84%D9%8A%D8%B2%D9%8A%D8%A9-%D9%85%D8%AA%D8%B1%D8%AC%D9%85%D8%A9-%D9%84%D9%84%D8%B9%D8%B1%D8%A8%D9%8A%D8%A9/', '', '0', '2021-05-02 11:00:00', '2021-05-02 18:08:12', '2021-05-02 16:13:56'),
(120, 'Class wih Ammon Winder', 'Quran recitation classes', 'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09', 'Quran Recitation', 60, 'Africa/Cairo', '2021-05-01 16:00:00', 'mo7amed2225@gmail.com', 'askchairmenkapow@gmail.com', '59', '41', '1', '1', ',Sunday,Saturday', '1619443792356597289', '* Previous assignment: None\r\n\r\n* Lesson topic       : Revision over all what we have studied\r\n\r\n* Class performance  : Very good\r\n\r\n* New assignment     : complete reading page number 47 .', '', '1', '2021-05-01 16:00:00', '2021-05-02 18:15:04', '2021-05-02 16:16:31'),
(121, 'Class with Ibrahem Wasif', 'Arabic language conversation  classes .', 'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09', 'Arabic language', 60, 'Europe/London', '2021-05-02 10:00:00', 'dodyhelmy911@gmail.com', 'ibrahim@khouse.com', '20', '51', '1', '1', ',Sunday,Saturday', '16192764801228365725', '* Previous assignment:\r\n* Lesson topic       :Conversation\r\n* Class performance  :Excellent\r\n* New assignment     :\r\nIntroduce yourself قدم نفسك\r\n https://docs.google.com/document/d/1i7Ok9CLPUYXxGEoioSeswkGm2GZAr5dzvvl7TuYdpzY/edit?usp=sharing\r\nArabic colors with questions ما لون هذا؟\r\nما لون هذه؟\r\nhttps://youtu.be/LocumA_zI0c', '', '1', '2021-05-01 10:00:00', '2021-05-02 17:24:11', '2021-05-02 17:16:59'),
(123, 'Class with Essa Wasif', 'Arabic language conversation  classes .', 'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09', 'Arabic language', 60, 'Europe/London', '2021-05-01 11:00:00', 'dodyhelmy911@gmail.com', 'essa@khouse.com', '20', '53', '1', '1', ',Sunday', '1619276604604074386', '* Previous assignment:\r\n* Lesson topic       :Conversation\r\n* Class performance  :Excellent\r\n* New assignment     :Introduce yourself     قدم نفسك                                                    https://docs.google.com/document/d/1i7Ok9CLPUYXxGEoioSeswkGm2GZAr5dzvvl7TuYdpzY/edit?usp=sharing', '', '1', '2021-05-02 11:00:00', '2021-05-02 17:24:11', '2021-05-02 16:44:05'),
(125, 'Class with Ibrahem Wasif', 'Arabic language conversation  classes .', 'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09', 'Arabic language', 60, 'Europe/London', '2021-05-02 10:00:00', 'dodyhelmy911@gmail.com', 'ibrahim@khouse.com', '20', '51', '1', '1', ',Sunday,Saturday', '16192764801228365725', '* Previous assignment:\r\n* Lesson topic       :Conversation\r\n* Class performance  :Excellent\r\n* New assignment     :\r\nIntroduce yourself قدم نفسك\r\n https://docs.google.com/document/d/1i7Ok9CLPUYXxGEoioSeswkGm2GZAr5dzvvl7TuYdpzY/edit?usp=sharing\r\nArabic colors with questions ما لون هذا؟\r\nما لون هذه؟\r\nhttps://youtu.be/LocumA_zI0c', '', '1', '2021-05-02 10:00:00', '2021-05-02 17:24:12', '2021-05-02 17:15:55'),
(128, 'Class with Awais Khan', 'Arabic language classes.', 'https://us05web.zoom.us/j/2320923569?pwd=YVVQVk56c3k3K1dYc283Q2JGSmVodz099', 'Arabic language', 60, 'Africa/Cairo', '2021-04-25 04:00:00', 'saleh2ef@gmail.com', 'mrawaisalikhan2006@gmail.com', '22', '29', '0', '0', ',Sunday', '1619286278612551243', '', '', '1', '2021-05-02 04:00:00', '2021-05-02 19:49:23', '2021-05-02 19:49:23'),
(129, 'Classe with lena  Mostavic', 'Quran Recitation classes.', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-29 23:30:00', 'abdullahomar2011@gmail.com', 'smostafavi@gmail.com', '21', '62', '0', '0', ',Thursday', '16192784691319367549', '', '', '1', '2021-04-29 23:30:00', '2021-05-02 23:47:02', '2021-05-02 23:47:02'),
(130, 'Class with Ala  Mostavic', 'Arabic language classes.', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Arabic language', 60, 'Africa/Cairo', '2021-04-26 20:30:00', 'abdullahomar2011@gmail.com', 'lena@khouse', '21', '63', '0', '0', ',Monday', '1619279708101837764', '', '', '1', '2021-04-26 20:30:00', '2021-05-02 23:47:02', '2021-05-02 23:47:02'),
(131, 'Class with Saad Mohamed', 'Quran Memorization classes.', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-25 20:00:00', 'abdullahomar2011@gmail.com', 'fahadasad1@gmail.com', '21', '65', '0', '0', ',Monday,Sunday,Wednesday,Thursday', '1619280152767481636', '', '', '1', '2021-04-26 20:00:00', '2021-05-02 23:47:02', '2021-05-02 23:47:02'),
(132, 'Class with Abdullah Waleed', 'Quran Memorization classes.', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 45, 'Africa/Cairo', '2021-04-25 17:00:00', 'abdullahomar2011@gmail.com', 'hellowaleed@hotmail.com', '21', '64', '0', '0', ',Sunday,Thursday,Tuesday', '1619280461426043543', '', '', '1', '2021-04-29 17:00:00', '2021-05-02 23:47:02', '2021-05-02 23:47:02'),
(133, 'Class with Saad Mohamed', 'Quran Memorization classes.', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-25 20:00:00', 'abdullahomar2011@gmail.com', 'fahadasad1@gmail.com', '21', '65', '0', '0', ',Monday,Sunday,Wednesday,Thursday', '1619280152767481636', '', '', '1', '2021-04-28 20:00:00', '2021-05-02 23:47:12', '2021-05-02 23:47:12'),
(134, 'Class with Abdullah Waleed', 'Quran Memorization classes.', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 45, 'Africa/Cairo', '2021-04-25 17:00:00', 'abdullahomar2011@gmail.com', 'hellowaleed@hotmail.com', '21', '64', '1', '1', ',Sunday,Thursday,Tuesday', '1619280461426043543', '* Previous assignment: Done\r\n* Lesson topic       : Madd\r\n* Class performance  : Very good\r\n* New assignment     :Memorizing', '', '1', '2021-05-02 17:00:00', '2021-05-02 23:47:12', '2021-05-02 21:48:07'),
(135, 'Class with Saad Mohamed', 'Quran Memorization classes.', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-25 20:00:00', 'abdullahomar2011@gmail.com', 'fahadasad1@gmail.com', '21', '65', '1', '1', ',Monday,Sunday,Wednesday,Thursday', '1619280152767481636', '* Previous assignment: Done\r\n* Lesson topic       : Quran\r\n* Class performance  : Very good\r\n* New assignment     : Reading', '', '1', '2021-04-29 20:00:00', '2021-05-02 23:48:12', '2021-05-02 21:48:44'),
(136, 'class with Leya Qureshi', 'Quran recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 20:00:00', 'lamiaaali1997@gmail.com', 'leyaqureshi@khouse.com', '60', '55', '1', '1', ',Sunday,Saturday', '1619265587653001529', '* Previous assignment:* Previous assignment:to memorize surat AL naas and the letters till letter ظ	\r\n* Lesson topic       : finishing the different shapes of Arabic letters and sign fatha\r\n* Class performance  : very good\r\n* New assignment     : to do the letters with sign fatah till letter ض  page no 6', '', '1', '2021-05-02 20:00:00', '2021-05-03 02:31:41', '2021-05-03 01:06:26'),
(137, 'class with  Manahil Qureshi', 'Quran recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 20:30:00', 'lamiaaali1997@gmail.com', 'drjamshed@gmail.com', '60', '52', '1', '1', ',Sunday,Saturday', '16192656451227564799', '* Previous assignment:to memorize surat AL naas and the letters till letter ظ	\r\n* Lesson topic       : finishing the different shapes of Arabic letters and sign fatha\r\n* Class performance  : very good she need to focus during the class\r\n* New assignment     : to do the letters with sign fatah till letter ض', '', '1', '2021-05-02 20:30:00', '2021-05-03 02:31:41', '2021-05-03 01:05:22'),
(138, 'Class with Awais Khan', 'Arabic language classes.', 'https://us05web.zoom.us/j/2320923569?pwd=YVVQVk56c3k3K1dYc283Q2JGSmVodz099', 'Arabic language', 60, 'Africa/Cairo', '2021-05-02 16:00:00', 'saleh2ef@gmail.com', 'mrawaisalikhan2006@gmail.com', '22', '29', '1', '1', ',Sunday', '1619990361379409526', '* Previous assignment: محادثة وترقيم السطور\r\n* Lesson topic       :تدريب ومحادثة\r\n* Class performance  :ممتاز\r\n* New assignment     :كتابة محادثة بين امرأتين واستخدام هذا وهذة', '', '1', '2021-05-02 16:00:00', '2021-05-03 18:05:48', '2021-05-04 03:04:28'),
(139, 'Class with Kareem Jaafar', 'Quran  Memorization  classes.', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-25 20:00:00', 'fodafoda34@gmail.com', 'Kareem@khouse.com', '19', '46', '0', '0', ',Sunday', '16192821211682561850', '', '', '1', '2021-05-02 20:00:00', '2021-05-03 19:48:00', '2021-05-03 19:48:00'),
(140, 'Class with Kamal Southall', 'Quran', '\"https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09 \"', 'Quran Memorization', 30, 'Africa/Cairo', '2021-05-01 00:00:00', 'fodafoda34@gmail.com', 'Southallgroup@gmail.com', '19', '31', '0', '0', ',Saturday,Sunday,Tuesday,Thursday', '16199894921742815004', '', '', '1', '2021-05-01 00:00:00', '2021-05-03 19:48:00', '2021-05-03 19:48:00'),
(141, 'Class with Kamal Southall', 'Quran', '\"https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09 \"', 'Quran Memorization', 30, 'Africa/Cairo', '2021-05-01 00:00:00', 'fodafoda34@gmail.com', 'Southallgroup@gmail.com', '19', '31', '1', '1', ',Saturday,Sunday,Tuesday,Thursday', '16199894921742815004', '* Previous assignment: Done\r\n* Lesson topic       : Revision of Noon sakinaa and tanween rules\r\n* Class performance  : V Good\r\n* New assignment     : Reading new verses', '', '1', '2021-05-02 00:00:00', '2021-05-03 19:48:14', '2021-05-03 18:12:17'),
(142, 'Class with Ibrahiem Wasif', 'Ibrahiem', 'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09', 'Arabic language', 60, 'Africa/Cairo', '2021-05-01 10:00:00', 'dodyhelmy911@gmail.com', 'ibrahim@khouse.com', '20', '51', '0', '0', ',Saturday', '1620045324978411757', '', '', '1', '2021-05-01 10:00:00', '2021-05-03 20:37:20', '2021-05-03 20:37:20'),
(143, 'Class with Ibrahiem Wasif', 'Ibrahiem', 'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09', 'Arabic language', 60, 'Africa/Cairo', '2021-05-02 09:00:00', 'dodyhelmy911@gmail.com', 'ibrahim@khouse.com', '20', '51', '0', '0', ',Sunday', '1620045360242700294', '', '', '1', '2021-05-02 09:00:00', '2021-05-03 20:37:20', '2021-05-03 20:37:20'),
(144, 'Class with Essa Wasif', 'Essa', 'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09', 'Arabic language', 60, 'Africa/Cairo', '2021-05-02 10:00:00', 'dodyhelmy911@gmail.com', 'essa@khouse.com', '20', '53', '0', '0', ',Sunday', '16200457001923520783', '', '', '1', '2021-05-02 10:00:00', '2021-05-03 20:41:47', '2021-05-03 20:41:47'),
(145, 'Class with Essa Wasif', 'Essa \r\nMs / Dina Helmy', 'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09', 'Arabic language', 60, 'Africa/Cairo', '2021-05-01 11:00:00', 'dodyhelmy911@gmail.com', 'essa@khouse.com', '20', '53', '0', '0', ',Saturday', '162004583480237871', '', '', '0', '2021-05-01 11:00:00', '2021-05-03 20:44:07', '2021-05-03 20:44:07'),
(146, 'Class with Danial Farooq', 'Quran', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-26 07:00:00', 'abdullahomar2011@gmail.com', 'danialf64@gmail.com', '21', '61', '1', '1', ',Monday,Tuesday', '16192793551444855414', '* Previous assignment: Done\r\n* Lesson topic       : Arabic\r\n* Class performance  : Excellent \r\n* New assignment     :', '', '1', '2021-05-03 07:00:00', '2021-05-03 20:52:34', '2021-05-04 02:38:55'),
(147, 'Class with Saad Mohamed', 'Quran Memorization classes.', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-25 20:00:00', 'abdullahomar2011@gmail.com', 'fahadasad1@gmail.com', '21', '65', '0', '0', ',Monday,Sunday,Wednesday,Thursday', '1619280152767481636', '', '', '1', '2021-05-02 20:00:00', '2021-05-03 20:52:34', '2021-05-03 20:52:34'),
(148, 'Class with Ala  Mostavic', 'Arabic language classes.', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Arabic language', 60, 'Africa/Cairo', '2021-04-26 20:30:00', 'abdullahomar2011@gmail.com', 'lena@khouse', '21', '63', '1', '1', ',Monday', '1619279708101837764', '* Previous assignment:\r\n* Lesson topic       :\r\n* Class performance  :\r\n* New assignment     :', '', '1', '2021-05-03 20:30:00', '2021-05-04 04:31:10', '2021-05-04 02:32:31'),
(149, 'Class with Saad Mohamed', 'Quran Memorization classes.', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-25 20:00:00', 'abdullahomar2011@gmail.com', 'fahadasad1@gmail.com', '21', '65', '1', '1', ',Monday,Sunday,Wednesday,Thursday', '1619280152767481636', '* Previous assignment: Done\r\n* Lesson topic       : Quran\r\n* Class performance  : Very good\r\n* New assignment     :', '', '1', '2021-05-03 20:00:00', '2021-05-04 04:31:10', '2021-05-04 02:31:40'),
(150, 'class with Madinah Mir', 'Quran memorization classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Memorization', 30, 'Africa/Cairo', '2021-04-29 06:00:00', 'lamiaaali1997@gmail.com', 'MadinahMir@khouse.com', '60', '44', '1', '1', ',Monday', '16192659471397979304', '* Previous assignment:Done\r\n* Lesson topic       : surat al takathour and the maad letter yaa\r\n* Class performance  : very good\r\n* New assignment     :surat al takathour and the maad letter yaa', '', '1', '2021-05-03 06:00:00', '2021-05-04 04:35:38', '2021-05-06 12:08:21'),
(151, 'class with Maria Mir', 'Quran recitation with tajweed classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 45, 'Africa/Cairo', '2021-04-24 06:30:00', 'lamiaaali1997@gmail.com', 'MariaMir@khouse.com', '60', '45', '1', '1', ',Monday', '1619266032402560240', '* Previous assignment: Done\r\n* Lesson topic       : the articulation points of letters ف\\و\\م\\ب the fourth organ the tongue\r\n* Class performance  :very good\r\n* New assignment     : the articulation points of letters ف\\و\\م\\ب the fourth organ the tongue', '', '1', '2021-05-03 06:30:00', '2021-05-04 04:35:38', '2021-05-06 12:07:05'),
(152, 'class with Omar Mir', 'Quran recitation with Tajweed classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 45, 'Africa/Cairo', '2021-04-24 07:15:00', 'lamiaaali1997@gmail.com', 'lmftmaria@gmail.com', '60', '47', '1', '1', ',Monday', '1619266097307330879', '* Previous assignment: done\r\n* Lesson topic       : the articulation points of letters  ل \\ن\\ض some versrs from surat Al emran till verse number62 \r\n* Class performance  :very good\r\n* New assignment     :the articulation points of letters  ل \\ن\\ض', '', '1', '2021-05-03 07:15:00', '2021-05-04 04:35:38', '2021-05-06 12:05:13'),
(153, 'Class with Fatimh zahra markwith', 'Quran recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 22:00:00', 'lamiaaali1997@gmail.com', 'rand_abbas@yahoo.ca', '60', '50', '1', '1', ',Monday,Saturday,Wednesday', '1619298314661381492', '* Previous assignment:this video https://youtu.be/jrLCQYxEPkY\r\n* Lesson topic       : some words to practice madd latter و\r\n* Class performance  : very good\r\n* New assignment     : to practice on madd latter و', '', '1', '2021-05-03 22:00:00', '2021-05-04 04:35:38', '2021-05-04 02:38:55'),
(154, 'Class wih Ammon Winder', 'Quran recitation classes', 'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09', 'Quran Recitation', 60, 'Africa/Cairo', '2021-05-01 16:00:00', 'mo7amed2225@gmail.com', 'askchairmenkapow@gmail.com', '59', '41', '1', '1', ',Sunday,Saturday', '1619443792356597289', '* Previous assignment: Partially done\r\n* Lesson topic       : Tanwween +Surat al-Nasr\r\n* Class performance  : very good\r\n* New assignment     : memorizing Surat al-Nasr and practicing all words up to Tanween with Kasrah', '', '1', '2021-05-02 16:00:00', '2021-05-04 05:00:14', '2021-05-04 03:03:26'),
(155, 'Class with Essa Wasif', 'Arabic language classes', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Arabic language', 30, 'Europe/London', '2021-04-25 18:00:00', 'fodafoda34@gmail.com', 'essa@khouse.com', '19', '53', '1', '1', ',Monday,Wednesday,Friday', '161927590777748476', '* Previous assignment: Done\r\n* Lesson topic       : Revision on definite and indefinite nouns and Dual in Arabic \r\n* Class performance  : V good\r\n* New assignment     : Doing the given exercise', '', '1', '2021-05-03 18:00:00', '2021-05-04 05:42:00', '2021-05-04 07:10:31'),
(156, 'Class with Tasneef', 'Quran  Memorization  classes.', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-25 20:00:00', 'fodafoda34@gmail.com', 'tasneefm@gmail.com', '19', '54', '1', '1', ',Monday', '16192851511706967376', '* Previous assignment: Done\r\n* Lesson topic       : Ismayya and Felyyah sentence \r\n* Class performance  : V good\r\n* New assignment     : Doing the exercises of lesson 5', '', '0', '2021-05-03 20:00:00', '2021-05-04 05:42:00', '2021-05-04 07:08:32'),
(157, 'Class with Kamal Southall', 'Quran', '\"https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09 \"', 'Quran Memorization', 30, 'Africa/Cairo', '2021-05-01 00:00:00', 'fodafoda34@gmail.com', 'Southallgroup@gmail.com', '19', '31', '1', '1', ',Saturday,Sunday,Tuesday,Thursday', '16199894921742815004', '* Previous assignment: Done\r\n* Lesson topic       : Qalqala rule\r\n* Class performance  : V good\r\n* New assignment     : Reading from verse no 26 surat albaqarah', '', '1', '2021-05-04 00:00:00', '2021-05-04 09:00:57', '2021-05-04 07:02:51'),
(158, 'class with Farrah Waseem', 'Quran recitation with Tajweed classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 05:00:00', 'lamiaaali1997@gmail.com', 'FarrahButt@khouse.com', '60', '40', '1', '1', ',Tuesday,Wednesday', '16192661681057687647', '* Previous assignment: Done\r\n* Lesson topic       : do revision over the previous rules and do surat Al fill\r\n* Class performance  : very good\r\n* New assignment     : memorize surat al fill', '', '1', '2021-05-04 05:00:00', '2021-05-04 23:42:43', '2021-05-04 21:47:04'),
(159, 'class with Danial Waseem', 'Quran recitation with Tajweed classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 05:30:00', 'lamiaaali1997@gmail.com', 'Danialbutt@khouse.com', '60', '42', '1', '1', ',Tuesday,Wednesday', '16192662371837333792', '* Previous assignment: partially done \r\n* Lesson topic       : revision over the madd letters and do surat Al naas\r\n* Class performance  : good he needs to do the home work\r\n* New assignment     : to memorize surat AL naas', '', '1', '2021-05-04 05:30:00', '2021-05-04 23:42:43', '2021-05-04 21:45:42'),
(160, 'Class with Danial Farooq', 'Quran', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-26 07:00:00', 'abdullahomar2011@gmail.com', 'danialf64@gmail.com', '21', '61', '1', '1', ',Monday,Tuesday', '16192793551444855414', '* Previous assignment: Done\r\n* Lesson topic       : Arabic\r\n* Class performance  : Excellent\r\n* New assignment     :', '', '0', '2021-05-04 07:00:00', '2021-05-05 00:00:12', '2021-05-04 22:01:02'),
(161, 'Class with Abdullah Waleed', 'Quran Memorization classes.', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 45, 'Africa/Cairo', '2021-04-25 17:00:00', 'abdullahomar2011@gmail.com', 'hellowaleed@hotmail.com', '21', '64', '0', '0', ',Sunday,Thursday,Tuesday', '1619280461426043543', '', '', '1', '2021-05-04 17:00:00', '2021-05-05 00:00:12', '2021-05-05 00:00:12'),
(162, 'Class with Ibrahem Wasif', 'Arabic language classes', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Arabic language', 30, 'Europe/London', '2021-04-25 18:00:00', 'fodafoda34@gmail.com', 'ibrahim@khouse.com', '19', '51', '1', '1', ',Tuesday,Thursday', '16192760641000530377', '* Previous assignment: Not done\r\n* Lesson topic       : Revision on definite and indefinite nouns and Dual in Arabic\r\n* Class performance  : V Good\r\n* New assignment     : Do the exercise given', '', '1', '2021-05-04 18:00:00', '2021-05-05 07:15:02', '2021-05-05 19:26:48'),
(163, 'class with Farrah Waseem', 'Quran recitation with Tajweed classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 05:00:00', 'lamiaaali1997@gmail.com', 'FarrahButt@khouse.com', '60', '40', '1', '1', ',Tuesday,Wednesday', '16192661681057687647', '* Previous assignment:  done\r\n* Lesson topic       : surat Al homaza\r\n* Class performance  :very good\r\n* New assignment     : to memrize surat Al homaza', '', '0', '2021-05-05 05:00:00', '2021-05-05 12:00:50', '2021-05-05 10:02:44'),
(164, 'class with Danial Waseem', 'Quran recitation with Tajweed classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 05:30:00', 'lamiaaali1997@gmail.com', 'Danialbutt@khouse.com', '60', '42', '1', '1', ',Tuesday,Wednesday', '16192662371837333792', '* Previous assignment: not done\r\n* Lesson topic       : surat Al nass\r\n* Class performance  :good\r\n* New assignment     : to memorize surat Al naas', '', '0', '2021-05-05 05:30:00', '2021-05-05 12:00:50', '2021-05-05 10:03:29'),
(165, 'Class wih Waseem Butt', 'Quran recitation with Tajweed classes', 'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09', 'Quran Recitation', 60, 'Africa/Cairo', '2021-04-27 05:00:00', 'mo7amed2225@gmail.com', 'suuper7@gmail.com', '59', '39', '1', '1', ',Tuesday,Wednesday', '1619443582755386844', '* Previous assignment: no\r\n* Lesson topic       : The end of Surat Hud\r\n* Class performance  : very good\r\n* New assignment     : no', '', '1', '2021-05-04 05:00:00', '2021-05-05 17:48:35', '2021-05-05 15:49:51'),
(166, 'Gretchen Head', 'Arabic class', 'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09', 'Arabic language', 60, 'Africa/Cairo', '2021-05-04 04:00:00', 'mo7amed2225@gmail.com', 'gretchen.head@yale-nus.edu.sg', '59', '71', '1', '1', ',Tuesday,Thursday', '1619703245351318975', '* Previous assignment: no\r\n* Lesson topic       :   discussing Awzan al Tasreef in the Arabic language\r\n* Class performance  : Very good\r\n* New assignment     : no', '', '1', '2021-05-04 04:00:00', '2021-05-05 17:48:35', '2021-05-05 15:51:24'),
(167, 'Class wih Waseem Butt', 'Quran recitation with Tajweed classes', 'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09', 'Quran Recitation', 60, 'Africa/Cairo', '2021-04-27 05:00:00', 'mo7amed2225@gmail.com', 'suuper7@gmail.com', '59', '39', '1', '1', ',Tuesday,Wednesday', '1619443582755386844', '* Previous assignment: no\r\n* Lesson topic       : The beginning of Surat Yusuf\r\n* Class performance  : Very good\r\n* New assignment     : no', '', '0', '2021-05-05 05:00:00', '2021-05-05 17:48:43', '2021-05-05 15:52:09'),
(168, 'class with Fatimah farooq', 'Arabic language classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Arabic language', 60, 'Africa/Cairo', '2021-04-24 11:00:00', 'lamiaaali1997@gmail.com', 'fatimanaveed21@gmail.com', '60', '48', '1', '1', ',Sunday,Wednesday', '1619265852649305878', '* Previous assignment: done\r\n* Lesson topic       : learning how to set the time\r\n* Class performance  : very good\r\n* New assignment     : to do exercises on page no 57 and 58 and the sentences in this link /https://englishwithomnia.com/%D8%AC%D9%85%D9%84-%D8%A7%D9%86%D8%AC%D9%84%D9%8A%D8%B2%D9%8A%D8%A9-%D9%85%D8%AA%D8%B1%D8%AC%D9%85%D8%A9-%D9%84%D9%84%D8%B9%D8%B1%D8%A8%D9%8A%D8%A9/', '', '1', '2021-05-05 11:00:00', '2021-05-05 19:02:00', '2021-05-05 18:06:36'),
(169, 'Class with Fatimh zahra markwith', 'Quran recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 22:00:00', 'lamiaaali1997@gmail.com', 'rand_abbas@yahoo.ca', '60', '50', '1', '1', ',Monday,Saturday,Wednesday', '1619298314661381492', '* Previous assignment: done\r\n* Lesson topic       : https://youtu.be/b6tpZ00V2IY\r\n* Class performance  : very good\r\n* New assignment     :https://youtu.be/b6tpZ00V2IY', '', '1', '2021-05-05 22:00:00', '2021-05-06 04:09:29', '2021-05-06 02:33:00');
INSERT INTO `reports` (`id`, `title`, `description`, `link`, `subject`, `duration`, `timezone`, `starting`, `teacher`, `student`, `t_id`, `s_id`, `guest`, `guest_active`, `repeat`, `ras`, `notes`, `assignment`, `status`, `lastclass`, `created_at`, `updated_at`) VALUES
(170, 'Class with Essa Wasif', 'Arabic language classes', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Arabic language', 30, 'Europe/London', '2021-04-25 18:00:00', 'fodafoda34@gmail.com', 'essa@khouse.com', '19', '53', '0', '0', ',Monday,Wednesday,Friday', '161927590777748476', '', '', '1', '2021-05-05 18:00:00', '2021-05-06 04:29:15', '2021-05-06 04:29:15'),
(171, 'Class with Kareem Jaafar', 'Quran Memorization  classes.', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Quran Memorization', 30, 'Africa/Cairo', '2021-04-29 05:00:00', 'fodafoda34@gmail.com', 'Kareem@khouse.com', '19', '46', '1', '1', ',Thursday', '1619281490952495838', '* Previous assignment: Done\r\n* Lesson topic       : Alqareaa\r\n* Class performance  : V good\r\n* New assignment     : First 5 verses of surat Alqareaa', '', '1', '2021-05-06 05:00:00', '2021-05-06 11:27:18', '2021-05-06 10:02:28'),
(172, 'Class with Kamal Southall', 'Quran', '\"https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09 \"', 'Quran Memorization', 30, 'Africa/Cairo', '2021-05-01 00:00:00', 'fodafoda34@gmail.com', 'Southallgroup@gmail.com', '19', '31', '0', '0', ',Saturday,Sunday,Tuesday,Thursday', '16199894921742815004', '', '', '1', '2021-05-06 00:00:00', '2021-05-06 11:27:18', '2021-05-06 11:27:18'),
(173, 'Class with Saad Mohamed', 'Quran Memorization\r\nQuran Memorization Saad \r\nTeacher: abdullahomar2011@gmail.com\r\nStudent: fahadasad1@gmail.com\r\nDuration: 30Minutes\r\nStatus: Open', 'Join Zoom Meeting https://us04web.zoom.us/j/71560932874?pwd=SHdTY0E5dEpEeUg0RWVwMHFxNlkxUT09  Meeting ID: 715 6093 2874 Passcode: 37NZaW', 'Quran Memorization', 30, 'Africa/Cairo', '2021-05-05 20:00:00', 'abdullahomar2011@gmail.com', 'fahadasad1@gmail.com', '21', '65', '0', '0', ',Wednesday,Thursday,Sunday,Monday', '16200879081422042968', '', '', '1', '2021-05-05 20:00:00', '2021-05-06 17:43:21', '2021-05-06 17:43:21'),
(174, 'Class with Abdullah Waleed', 'Quran Memorization classes.', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 45, 'Africa/Cairo', '2021-04-25 17:00:00', 'abdullahomar2011@gmail.com', 'hellowaleed@hotmail.com', '21', '64', '0', '0', ',Sunday,Thursday,Tuesday', '1619280461426043543', '', '', '0', '2021-05-06 17:00:00', '2021-05-07 05:03:24', '2021-05-07 05:03:24'),
(175, 'Class with Saad Mohamed', 'Quran Memorization\r\nQuran Memorization Saad \r\nTeacher: abdullahomar2011@gmail.com\r\nStudent: fahadasad1@gmail.com\r\nDuration: 30Minutes\r\nStatus: Open', 'Join Zoom Meeting https://us04web.zoom.us/j/71560932874?pwd=SHdTY0E5dEpEeUg0RWVwMHFxNlkxUT09  Meeting ID: 715 6093 2874 Passcode: 37NZaW', 'Quran Memorization', 30, 'Africa/Cairo', '2021-05-05 20:00:00', 'abdullahomar2011@gmail.com', 'fahadasad1@gmail.com', '21', '65', '1', '1', ',Wednesday,Thursday,Sunday,Monday', '16200879081422042968', '* Previous assignment: Done\r\n* Lesson topic       : Quran\r\n* Class performance  : Very good\r\n* New assignment     :', '', '1', '2021-05-06 20:00:00', '2021-05-07 05:03:24', '2021-05-07 03:04:06'),
(176, 'Class with Ibrahem Wasif', 'Arabic language classes', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Arabic language', 30, 'Europe/London', '2021-04-25 18:00:00', 'fodafoda34@gmail.com', 'ibrahim@khouse.com', '19', '51', '1', '1', ',Tuesday,Thursday', '16192760641000530377', '* Previous assignment: Done\r\n* Lesson topic       : Plural in Arabic\r\n* Class performance  : V Good\r\n* New assignment     : Do the exercise given', '', '1', '2021-05-06 18:00:00', '2021-05-07 04:45:52', '2021-05-07 03:47:32'),
(177, 'Gretchen Head', 'Arabic class', 'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09', 'Arabic language', 60, 'Africa/Cairo', '2021-05-04 04:00:00', 'mo7amed2225@gmail.com', 'gretchen.head@yale-nus.edu.sg', '59', '71', '0', '0', ',Tuesday,Thursday', '1619703245351318975', '', '', '1', '2021-05-06 04:00:00', '2021-05-07 22:27:38', '2021-05-07 22:27:38'),
(178, 'Class with Anu Kmt', 'Quran Recitation   classes.', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Quran Recitation', 45, 'Africa/Cairo', '2021-04-30 14:00:00', 'fodafoda34@gmail.com', 'Anukemet@hotmail.com', '19', '49', '0', '0', ',Friday,Saturday', '16192817121549497391', '', '', '1', '2021-05-07 14:00:00', '2021-05-07 22:45:23', '2021-05-07 22:45:23'),
(179, 'Class with Essa Wasif', 'Arabic language classes', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Arabic language', 30, 'Europe/London', '2021-04-25 18:00:00', 'fodafoda34@gmail.com', 'essa@khouse.com', '19', '53', '0', '0', ',Monday,Wednesday,Friday', '161927590777748476', '', '', '1', '2021-05-07 18:00:00', '2021-05-08 19:26:46', '2021-05-08 19:26:46'),
(180, 'Class with Kamal Southall', 'Quran', '\"https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09 \"', 'Quran Memorization', 30, 'Africa/Cairo', '2021-05-01 00:00:00', 'fodafoda34@gmail.com', 'Southallgroup@gmail.com', '19', '31', '0', '0', ',Saturday,Sunday,Tuesday,Thursday', '16199894921742815004', '', '', '1', '2021-05-08 00:00:00', '2021-05-08 19:26:46', '2021-05-08 19:26:46'),
(181, 'class with Leya Qureshi', 'Quran recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 20:00:00', 'lamiaaali1997@gmail.com', 'leyaqureshi@khouse.com', '60', '55', '0', '0', ',Sunday,Saturday', '1619265587653001529', '', '', '1', '2021-05-08 20:00:00', '2021-05-09 02:03:34', '2021-05-09 02:03:34'),
(182, 'class with Sundus Jaafer', 'Quran memorization and recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Memorization', 30, 'Africa/Cairo', '2021-04-24 21:00:00', 'lamiaaali1997@gmail.com', 'SundusJaafar@khouse.com', '60', '37', '0', '0', ',Saturday', '1619264923813023671', '', '', '1', '2021-05-08 21:00:00', '2021-05-09 06:26:02', '2021-05-09 06:26:02'),
(183, 'class with Sinan Jaafer', 'Quran memorization and recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Memorization', 30, 'Africa/Cairo', '2021-04-24 21:30:00', 'lamiaaali1997@gmail.com', 'dahlia_jaffer@yahoo.com', '60', '35', '0', '0', ',Saturday', '16192650291487421430', '', '', '1', '2021-05-08 21:30:00', '2021-05-09 06:26:02', '2021-05-09 06:26:02'),
(184, 'class with  Manahil Qureshi', 'Quran recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 20:30:00', 'lamiaaali1997@gmail.com', 'drjamshed@gmail.com', '60', '52', '0', '0', ',Sunday,Saturday', '16192656451227564799', '', '', '1', '2021-05-08 20:30:00', '2021-05-09 06:26:02', '2021-05-09 06:26:02'),
(185, 'Class with Fatimh zahra markwith', 'Quran recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 22:00:00', 'lamiaaali1997@gmail.com', 'rand_abbas@yahoo.ca', '60', '50', '0', '0', ',Monday,Saturday,Wednesday', '1619298314661381492', '', '', '1', '2021-05-08 22:00:00', '2021-05-09 06:26:02', '2021-05-09 06:26:02'),
(186, 'Class with Anu Kmt', 'Quran Recitation   classes.', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Quran Recitation', 45, 'Africa/Cairo', '2021-04-30 14:00:00', 'fodafoda34@gmail.com', 'Anukemet@hotmail.com', '19', '49', '0', '0', ',Friday,Saturday', '16192817121549497391', '', '', '1', '2021-05-08 14:00:00', '2021-05-09 06:52:11', '2021-05-09 06:52:11'),
(187, 'Class with Kamal Southall', 'Quran', '\"https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09 \"', 'Quran Memorization', 30, 'Africa/Cairo', '2021-05-01 00:00:00', 'fodafoda34@gmail.com', 'Southallgroup@gmail.com', '19', '31', '0', '0', ',Saturday,Sunday,Tuesday,Thursday', '16199894921742815004', '', '', '1', '2021-05-09 00:00:00', '2021-05-09 06:52:11', '2021-05-09 06:52:11'),
(188, 'class with Fatimah farooq', 'Arabic language classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Arabic language', 60, 'Africa/Cairo', '2021-04-24 11:00:00', 'lamiaaali1997@gmail.com', 'fatimanaveed21@gmail.com', '60', '48', '0', '0', ',Sunday,Wednesday', '1619265852649305878', '', '', '1', '2021-05-09 11:00:00', '2021-05-09 20:33:25', '2021-05-09 20:33:25'),
(189, 'class with Leya Qureshi', 'Quran recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 20:00:00', 'lamiaaali1997@gmail.com', 'leyaqureshi@khouse.com', '60', '55', '0', '0', ',Sunday,Saturday', '1619265587653001529', '', '', '1', '2021-05-09 20:00:00', '2021-05-10 05:26:44', '2021-05-10 05:26:44'),
(190, 'class with  Manahil Qureshi', 'Quran recitation classes', 'https://zoom.us/j/2914082514?pwd=Tm05Y29meW9NYkltU2psVzl0cnhnUT09', 'Quran Recitation', 30, 'Africa/Cairo', '2021-04-24 20:30:00', 'lamiaaali1997@gmail.com', 'drjamshed@gmail.com', '60', '52', '0', '0', ',Sunday,Saturday', '16192656451227564799', '', '', '1', '2021-05-09 20:30:00', '2021-05-10 05:26:44', '2021-05-10 05:26:44'),
(191, 'Class with Abdullah Waleed', 'Quran Memorization classes.', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 45, 'Africa/Cairo', '2021-04-25 17:00:00', 'abdullahomar2011@gmail.com', 'hellowaleed@hotmail.com', '21', '64', '0', '0', ',Sunday,Thursday,Tuesday', '1619280461426043543', '', '', '1', '2021-05-09 17:00:00', '2021-05-12 07:54:44', '2021-05-12 07:54:44'),
(192, 'Class with Abdullah Waleed', 'Quran Memorization classes.', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 45, 'Africa/Cairo', '2021-04-25 17:00:00', 'abdullahomar2011@gmail.com', 'hellowaleed@hotmail.com', '21', '64', '0', '0', ',Sunday,Thursday,Tuesday', '1619280461426043543', '', '', '1', '2021-05-11 17:00:00', '2021-05-12 07:54:44', '2021-05-12 07:54:44'),
(193, 'Classe with lena  Mostavic', 'Quran Recitation classes.', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-29 23:30:00', 'abdullahomar2011@gmail.com', 'smostafavi@gmail.com', '21', '62', '0', '0', ',Thursday', '16192784691319367549', '', '', '1', '2021-05-06 23:30:00', '2021-05-12 14:38:15', '2021-05-12 14:38:15'),
(194, 'Class with Danial Farooq', 'Quran', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-26 07:00:00', 'abdullahomar2011@gmail.com', 'danialf64@gmail.com', '21', '61', '0', '0', ',Monday,Tuesday', '16192793551444855414', '', '', '1', '2021-05-10 07:00:00', '2021-05-12 14:38:15', '2021-05-12 14:38:15'),
(195, 'Class with Ala  Mostavic', 'Arabic language classes.', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Arabic language', 60, 'Africa/Cairo', '2021-04-26 20:30:00', 'abdullahomar2011@gmail.com', 'lena@khouse', '21', '63', '0', '0', ',Monday', '1619279708101837764', '', '', '1', '2021-05-10 20:30:00', '2021-05-12 14:38:15', '2021-05-12 14:38:15'),
(196, 'Class with Saad Mohamed', 'Quran Memorization\r\nQuran Memorization Saad \r\nTeacher: abdullahomar2011@gmail.com\r\nStudent: fahadasad1@gmail.com\r\nDuration: 30Minutes\r\nStatus: Open', 'Join Zoom Meeting https://us04web.zoom.us/j/71560932874?pwd=SHdTY0E5dEpEeUg0RWVwMHFxNlkxUT09  Meeting ID: 715 6093 2874 Passcode: 37NZaW', 'Quran Memorization', 30, 'Africa/Cairo', '2021-05-05 20:00:00', 'abdullahomar2011@gmail.com', 'fahadasad1@gmail.com', '21', '65', '0', '0', ',Wednesday,Thursday,Sunday,Monday', '16200879081422042968', '', '', '1', '2021-05-09 20:00:00', '2021-05-12 14:38:15', '2021-05-12 14:38:15'),
(197, 'Class with Danial Farooq', 'Quran', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-26 07:00:00', 'abdullahomar2011@gmail.com', 'danialf64@gmail.com', '21', '61', '0', '0', ',Monday,Tuesday', '16192793551444855414', '', '', '1', '2021-05-11 07:00:00', '2021-05-12 14:38:15', '2021-05-12 14:38:15'),
(198, 'Class with Saad Mohamed', 'Quran Memorization\r\nQuran Memorization Saad \r\nTeacher: abdullahomar2011@gmail.com\r\nStudent: fahadasad1@gmail.com\r\nDuration: 30Minutes\r\nStatus: Open', 'Join Zoom Meeting https://us04web.zoom.us/j/71560932874?pwd=SHdTY0E5dEpEeUg0RWVwMHFxNlkxUT09  Meeting ID: 715 6093 2874 Passcode: 37NZaW', 'Quran Memorization', 30, 'Africa/Cairo', '2021-05-05 20:00:00', 'abdullahomar2011@gmail.com', 'fahadasad1@gmail.com', '21', '65', '0', '0', ',Wednesday,Thursday,Sunday,Monday', '16200879081422042968', '', '', '0', '2021-05-10 20:00:00', '2021-05-12 14:38:15', '2021-05-12 14:38:15'),
(199, 'Class with Saad Mohamed', 'Quran Memorization\r\nQuran Memorization Saad \r\nTeacher: abdullahomar2011@gmail.com\r\nStudent: fahadasad1@gmail.com\r\nDuration: 30Minutes\r\nStatus: Open', 'Join Zoom Meeting https://us04web.zoom.us/j/71560932874?pwd=SHdTY0E5dEpEeUg0RWVwMHFxNlkxUT09  Meeting ID: 715 6093 2874 Passcode: 37NZaW', 'Quran Memorization', 30, 'Africa/Cairo', '2021-05-05 20:00:00', 'abdullahomar2011@gmail.com', 'fahadasad1@gmail.com', '21', '65', '0', '0', ',Wednesday,Thursday,Sunday,Monday', '16200879081422042968', '', '', '1', '2021-05-12 20:00:00', '2021-05-12 14:38:19', '2021-05-12 14:38:19'),
(200, 'New Class', 'The class is about testing class', 'https://us04web.zoom.us/j/73698704689?pwd=MDY2cGVyNlhwNGZNUTQraUd6TEV4dz09', 'Arabic language', 30, 'Africa/Cairo', '2021-05-13 08:00:00', 'abdullahomar2011@gmail.com', 'hellowaleed@hotmail.com', '21', '64', '0', '0', ',Wednesday,Thursday,Friday', '16208343291250152768', '', '', '1', '2021-05-13 08:00:00', '2021-05-13 02:00:13', '2021-05-13 02:00:13'),
(201, 'Class with Abdullah Waleed', 'Quran Memorization classes.', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 45, 'Africa/Cairo', '2021-04-25 17:00:00', 'abdullahomar2011@gmail.com', 'hellowaleed@hotmail.com', '21', '64', '0', '0', ',Sunday,Thursday,Tuesday', '1619280461426043543', '', '', '1', '2021-05-13 17:00:00', '2021-05-13 12:04:01', '2021-05-13 12:04:01'),
(202, 'Class wih Ammon Winder', 'Quran recitation classes', 'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09', 'Quran Recitation', 60, 'Africa/Cairo', '2021-05-01 16:00:00', 'mo7amed2225@gmail.com', 'askchairmenkapow@gmail.com', '59', '41', '0', '0', ',Sunday,Saturday', '1619443792356597289', '', '', '1', '2021-05-08 16:00:00', '2021-05-13 12:17:27', '2021-05-13 12:17:27'),
(203, 'Class wih Ammon Winder', 'Quran recitation classes', 'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09', 'Quran Recitation', 60, 'Africa/Cairo', '2021-05-01 16:00:00', 'mo7amed2225@gmail.com', 'askchairmenkapow@gmail.com', '59', '41', '0', '0', ',Sunday,Saturday', '1619443792356597289', '', '', '1', '2021-05-09 16:00:00', '2021-05-13 12:17:27', '2021-05-13 12:17:27'),
(204, 'Classe with lena  Mostavic', 'Quran Recitation classes.', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 60, 'Africa/Cairo', '2021-04-29 23:30:00', 'abdullahomar2011@gmail.com', 'smostafavi@gmail.com', '21', '62', '0', '0', ',Thursday', '16192784691319367549', '', '', '1', '2021-05-13 23:30:00', '2021-05-16 04:51:51', '2021-05-16 04:51:51'),
(205, 'Class with Saad Mohamed', 'Quran Memorization\r\nQuran Memorization Saad \r\nTeacher: abdullahomar2011@gmail.com\r\nStudent: fahadasad1@gmail.com\r\nDuration: 30Minutes\r\nStatus: Open', 'Join Zoom Meeting https://us04web.zoom.us/j/71560932874?pwd=SHdTY0E5dEpEeUg0RWVwMHFxNlkxUT09  Meeting ID: 715 6093 2874 Passcode: 37NZaW', 'Quran Memorization', 30, 'Africa/Cairo', '2021-05-05 20:00:00', 'abdullahomar2011@gmail.com', 'fahadasad1@gmail.com', '21', '65', '0', '0', ',Wednesday,Thursday,Sunday,Monday', '16200879081422042968', '', '', '1', '2021-05-13 20:00:00', '2021-05-16 04:51:51', '2021-05-16 04:51:51'),
(206, 'New Class', 'The class is about testing class', 'https://us04web.zoom.us/j/73698704689?pwd=MDY2cGVyNlhwNGZNUTQraUd6TEV4dz09', 'Arabic language', 30, 'Africa/Cairo', '2021-05-13 08:00:00', 'abdullahomar2011@gmail.com', 'hellowaleed@hotmail.com', '21', '64', '0', '0', ',Wednesday,Thursday,Friday', '16208343291250152768', '', '', '1', '2021-05-14 08:00:00', '2021-05-16 04:51:51', '2021-05-16 04:51:51'),
(207, 'Class with Abdullah Waleed', 'Quran Memorization classes.', 'https://us04web.zoom.us/j/74632729458?pwd=eWZyVTd2SlJMTlJHek81cUlSKy9jdz09', 'Quran Memorization', 45, 'Africa/Cairo', '2021-04-25 17:00:00', 'abdullahomar2011@gmail.com', 'hellowaleed@hotmail.com', '21', '64', '0', '0', ',Sunday,Thursday,Tuesday', '1619280461426043543', '', '', '1', '2021-05-16 17:00:00', '2021-05-16 11:04:41', '2021-05-16 11:04:41');

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
  `cancel_request` int(11) NOT NULL DEFAULT 0,
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
(19, 'Mohamed Nasir', '', 0, 1, 'Monday-\r\nTuesday-\r\nWednesday-\r\nThursday-\r\nFriday-\r\nSaturday-\r\nSunday-', NULL, NULL, '$2y$10$byKeVmDQagwJfJBlOlFlmO0AFPfbJLXN.umIEESS1iIDsgVBWRZBm', 'Naser city', 'Egypt', 'Africa/Cairo', '', 'Graduate', '285', 'Faculty of Languages and Translation, Al-Azhar University', '29411111100453', '', '', '', '', '', '', 0, 'https://calendar.google.com/calendar/embed?src=lutr0fjmn6ef99tguhb8d8427o%40group.calendar.google.com&ctz=Africa%2FCairo', 'https://drive.google.com/file/d/1T_Tm9YxX_nakofAl0byBB8FDsxiGJCup/view', 'https://us05web.zoom.us/j/3782706098?pwd=ckRKbFJzeVp5clpUYWlFTEkzZnFHUT09', 'Male', '1994-11-11', 'tbTCAC1fVTdiag7ZzdOREZhnKBNXUEXEqPua1cYAnbPBkUYDLUDLavb7Ck4C', '2021-04-21 15:13:27', '2021-05-07 03:47:32', '01011539544', 'fodafoda34@gmail.com'),
(20, 'Dina Helmy', '', 0, 1, 'Monday-\r\nTuesday-\r\nWednesday-\r\nThursday-\r\nFriday-\r\nSaturday-\r\nSunday-', NULL, NULL, '$2y$10$aLOPWqTTUOn.hw1hzdyT4.gQnRuol1smdhbTsRFgDc2E1D1e8i0C2', 'Zagazig Al - Sharqya - Egypt', 'Egypt', 'Africa/Cairo', '', 'Graduate', '240', 'Languages Literature ​​Zagazig University', '28693041300045', '16189982071354915261IMG_20210124_155701 - learn Arabic with Dolly(1).jpg', '1618998207220620146IMG_20210124_155701 - learn Arabic with Dolly.jpg', '', '', '', '16189982071109173936Resume - learn Arabic with Dolly.pdf', 0, 'https://calendar.google.com/calendar/embed?src=oh4te5crrv1b90ke646h4148r8%40group.calendar.google.com&ctz=Africa%2FCairo', 'https://drive.google.com/file/d/1z47RYqZoRYdBAA57kGOGdGA1myjk2qQi/view', 'https://us04web.zoom.us/j/9180039565?pwd=QitxbGdjV1dZbmE4U1lWdkhkb0pOZz09', 'Female', '1986-09-30', 'RLJ4YiS2GF1lufNO5q2894ac0MjLdsPKv3yLCnBO6RhGgnSyb3IRGxc44vC2', '2021-04-21 15:43:27', '2021-05-02 17:16:59', '01065287420', 'dodyhelmy911@gmail.com'),
(21, 'Abdullah Omar', '16194445191047288522IMG_8058.jpg', 0, 1, 'Monday-\r\nTuesday-\r\nWednesday-\r\nThursday-\r\nFriday-\r\nSaturday-\r\nSunday-', NULL, NULL, '$2y$10$qdkSdVR/lAhgQxSOG7Ttmuzpss7JB2.ksGPXrBoHYNq1YQSSdsstW', 'بنى سويف - منشأة هديب - مركز ناصر', 'Egypt', 'Africa/Cairo', '', 'Graduate', '435', 'Faculty of languages and Translation - Department of Islamic Studies in English', '29606192200754', '1618998921870993392102695108_1121440761567680_3926974970525122560_n - Abdullah Omar.jpg', '16189989211646265032102695108_1121440761567680_3926974970525122560_n - Abdullah Omar.jpg', '', '', '', '1619444519431790330New Microsoft 155Word Document.pdf', 1, 'https://calendar.google.com/calendar/embed?src=q44djfacvmg93rmuidqjsue89c%40group.calendar.google.com&ctz=Africa%2FCairo', 'I am graduated for AL-azhar University. My field of study was Islamic Studies in English. I am a Hafiz of Quran in Hafs Qiraat. I have been teaching online since 3 years; however I have an experience in teaching for 6 years. I have an experience in Quran in Hafs Qiraat, teaching Arabic and Islamic Studies. I have been teaching for all ages especially for young children.', 'https://us04web.zoom.us/j/71560932874?pwd=SHdTY0E5dEpEeUg0RWVwMHFxNlkxUT09', 'Male', '1996-06-19', 'ZZeVaH1ppMHTIxMDxSJ3V0Exrwt4iL0yqPshEYcTUoInEOWdK646ZjSXdk75', '2021-04-21 15:55:21', '2021-05-12 18:16:17', '01008214371', 'abdullahomar2011@gmail.com'),
(22, 'Saleh Ahmed', '', 0, 1, 'Monday-\r\nTuesday-\r\nWednesday-\r\nThursday-\r\nFriday-\r\nSaturday-\r\nSunday-', NULL, NULL, '$2y$10$o9SXdmhtARUuz7e2parnneZhb5al6npb/iGafmF.m9ij3orYamn9K', 'القاهره- 3شارع السعاده ارض الجنينه الزاوية الحمراء', 'Egypt', 'Africa/Cairo', '', 'Graduate', '120', 'Faculty of languages and Translation - Department of Islamic Studies in English', '29504080102353', '16189993581982798441IMG_20210222_220059 - saleh ahmed.jpg', '1618999358489662423IMG_20210222_220059 - saleh ahmed.jpg', '', '', '', '1618999358498422073Islamic Studies Tutor Saled Ahmed - saleh ahmed.pdf', 0, 'https://calendar.google.com/calendar/embed?src=qkfiicjqlni2usrpe1990ovpqs%40group.calendar.google.com&ctz=Africa%2FCairo', '', 'https://us05web.zoom.us/j/2320923569?pwd=YVVQVk56c3k3K1dYc283Q2JGSmVodz099', 'Male', '1995-04-08', 'Tp6ENpLN6Ls1Y5pIBjF384jDt2jkfgghfAffu7LcknB4Bn2485Vxzd1S6EJt', '2021-04-21 16:02:38', '2021-05-04 03:04:28', '01115734146', 'saleh2ef@gmail.com'),
(25, 'Mohamed Ismail', '', 0, 3, '0', NULL, NULL, '$2y$10$qnIaxBadWPRmFr6rf1lj9e/AGFT8vGD/x6.nOfOUKfLr1dd8HWjW.', '', 'Egypt', 'Africa/Cairo', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '2020-04-22', 'zeQWNPtcg09iZa6rgYDLyhOqmKnPu5fav4YzbmFUjCKJeqhMaPX2KlKtZgy9', '2021-04-21 16:31:36', '2021-04-21 16:31:36', '0000', 'Ahmed@khouse.com'),
(26, 'Iman Mahmoud', '', 0, 3, '0', NULL, NULL, '$2y$10$wkTl..fVqKo9tqk3vDQcdOmYDJffNG2bWzF4MIG8g0ibZTJKP5VJ.', '', 'Egypt', 'Africa/Cairo', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '2020-04-22', 'G2sy4aiVhN23W6bt7suq9FQ8HNnLCJ2HP9EzF1i9IrMCok8e2n1eq7C7iBt0', '2021-04-21 16:32:22', '2021-04-21 16:32:22', '00000', 'Iman@khouse.com'),
(27, 'Admin', '16191206291160117832FB icon.jpg', 0, 3, '0', NULL, NULL, '$2y$10$FlLDwYVWl16hYI4jeArjjuoxyQAtMld65xVpjvzi9TaoIHzbaeU/e', '', 'Egypt', 'Africa/Cairo', '', 'Graduate', '', '', '', '', '', '', '', '', '', 0, '', '', '', 'Male', '2020-04-22', 'oLY4HpiV0gjV2MbLN3VfuWlX1CeBQwEsFVXymGC0LpHKbuwNIj5MY1AQalyl', '2021-04-21 16:38:38', '2021-04-23 01:43:49', '000', 'admin@khouse.com'),
(29, 'Awais Khan', '', 0, 2, '0', NULL, NULL, '$2y$10$ynG3B7PLNkFtWBYGPZP0yeQXTiYKv6J.m64izKzX1tXPr2ze5UG12', '', 'United Kingdom', 'Europe/London', '', '', '180', '', '', '', '', 'Active', '\"الطالب حفظ جزء عم وسورتي الملك والقلم.\r\nقراءته خالية من احكام التجويد.\r\nلكنه لا يريد دراسة القران بل اللغة العربية العربية. يريد أن بصل إلى مستوى  يمكنه من قراءة  كتب الحديث والفقه. لا يعرف اي شيء عن اللغة العربية لكنه يستطيع القراءة والكتابة بسرعة جيدة.\r\nسيدرس مم كتاب العربية بين يديك من المستوى الاول.  الطالب متحمس جدا للدراسة. عمره ١٤ عاما.\r\nسيدرس مرتين اسبوعيا كل مرة ساعة. قال انه متاح في اوقات مدرسته من ٩ صباحا وحتى ٣ مساء.\"', '', '', 0, '', '', '', '', '2006-04-22', 'APJscXY4nLLIo0iAE0RQlD5VwxdJbKlWppogx2lcK2c8DB2i2km08utg9uQT', '2021-04-21 19:06:35', '2021-05-06 18:00:51', '+4407365063606', 'mrawaisalikhan2006@gmail.com'),
(30, 'Nick Orzech', '16191287441393452522pp (1).jfif', 0, 2, '0', NULL, NULL, '$2y$10$dVNUuRf9lyJjVeeTtwesbu0dKpVRIibQYn/1.y4QoepRYEcR6tGK6', '', 'United States', 'America/North_Dakota/Center', '', '', '60', '', '', '', '', 'Active', 'Studying Arabic language from 50 short stories book.', '', '', 0, '', '', '', '', '1997-04-22', 'Q79DqIvPnQ5dj3bB22UUNuPJtkBJMSy998VojqGSTFwfLV3K9xoijx71hkbC', '2021-04-21 19:17:15', '2021-05-01 19:00:48', '+15129192529', 'nickorzech1@gmail.com'),
(31, 'Kamal Southall', '', 0, 2, '0', NULL, NULL, '$2y$10$wIleO2T/EwG0hUkxZbyh3OMVyc3Rc/TAm3F5OXwBqcJHyK21Htjoq', 'Greenwich Mean', 'United States', 'America/Chicago', '', '', '270', '', '', '', '', 'Active', 'لم يدرس التجويد قبل ذلك مع شيخ ولكن بعض زملاءه علموه قراءة القران منذ وقت طويل\r\nوالداه اعتنقا الإسلام منذ 50 عاما، يعمل IT ولكن عمله غير مستقر هذه الأيام بسبب كورونا\r\nعنده ضعف في الترقيق والتفخيم لكن قراءته سريعة بشكل جيد ولكن فقط يريد تصحيح التلاوة ويمكن تحسين سرعة القراءة لديه بشكل ملحوظ. فهو يقرأ كالعرب بدون أحكام.\r\nسيبدأ بدراسة أحكام التجويد من النون الساكنة والتنوين إن شاء الله.\r\nيريد أيضا الحفظ لكن عدد قليل من الآيات لو آية واحدة أو اثنتين حسب ما يتثنى له.\r\nيحفظ الناس والفلق والإخلاص والتين والقدر وعدد من آيات من سور أخرى. سيراجع ما يحفظه في بداية كل درس حتى يثبته وسيضيف عدد قليل من الايات في كل مرة.\r\nسيدرس 4 مرات في الأسبوع . نصف ساعة في كل مرة وينوي أن يزيد المدة بعد عدد قليل من الدروس.\r\nمتاح أيام', '', '', 0, '', '', '', '', '2020-04-22', 'IK8DjDtOnUlrcEn9YauNRFkD9taqeFrWM2VkzKkAc5CfhsNqryodRv7RyuIk', '2021-04-21 19:34:39', '2021-05-09 06:52:11', '+15135466267', 'Southallgroup@gmail.com'),
(32, 'Haaris Abdul sattar', '', 0, 2, '0', NULL, NULL, '$2y$10$1snrqrfcbnI52z2AKP32wONpB3JhIoB0zWCYquiRahzlLHkdkkxxK', '', 'United States', 'America/Chicago', '', '', '0', '', '', '', '', 'Active', 'ذكي يستوعب بسرعة. قرأ القرآن مرة مع أكثر من معلم ومعلمة لكنهم لم يكونوا يصححون تلاوته فقرأه بدون احكام وانتهى من في رمضان الماضي.ويريد أن يقرأه مرة أخرى لكن مع ضبط الأحكام وتصحيحها.  عمره ١٢ عاما. يقرأ بسرعة جيدة لكن ليس لديه ضبط للحروف أو لاحكام التجويد. يقرأ بدون غنن ولا يعرف اسماء الحركات ولكن يعرف استخدامها. لا يعرف أحكام النون ولا التنوين.', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-04-21 19:43:48', '2021-05-02 06:46:36', '+14053145072', 'drtariqsattar@gmail.com'),
(34, 'Rumi', '', 0, 2, '0', NULL, NULL, '$2y$10$yqLA6/tUUfHY1w.Gg03SweFtSxIjCvsum33obB9s.wNhOklO6OJD.', '', 'United States', 'America/Anchorage', '161904978711', '', '60', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-04-22 06:13:37', '2021-05-02 18:24:19', '(415) 722-4420', 'ayesha_mattu@yahoo.com'),
(35, 'Sinan Jaafar', '', 0, 2, '0', NULL, NULL, '$2y$10$NPqB5T0yy8y7nHMa5wsAg.sg6Gu.HNyI9XBQX9WD9.9gFd1pejEkG', 'california', 'United States', 'America/Los_Angeles', '', '', '-60', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '2005-04-22', 'CQZYNofuYOBn56QFQOUMrwtikcqLKTp4bpR3JzaINVitxBbo8IHsZpaWzGJI', '2021-04-23 02:43:55', '2021-05-09 06:26:02', '+19515006084', 'dahlia_jaffer@yahoo.com'),
(36, 'Huda Al-Marashi', '1619124333142879353538490805_10156454912299976_998953970791612416_n[1].jpg', 0, 2, '0', NULL, NULL, '$2y$10$daP7DhtNIX/nGnuZMYzUHO1b5ZsB4w7FTmmxLRiNgLPWcVS0eLq.W', 'California, US', 'United States', 'America/Los_Angeles', '', '', '', '', '', '', '', 'Active', 'Studying Arabic conversation and Quranic recitation', '', '', 0, '', '', '', '', '1980-05-22', 'IuTXl4hZKfj8lnqFM5xcbcpyMq6aqqIeTTq8AEplS4ul0qgwSoKrlZWeb5AU', '2021-04-23 02:45:33', '2021-05-07 20:41:41', '+19519666126', 'huda.almarashi@gmail.com'),
(37, 'Sundus Jaafar', '', 0, 2, '0', NULL, NULL, '$2y$10$vu1JqDv.6K9IQcK9XHcZEOGqr.nbDGEj.GcHVyBU5zb3h/TtSsE/G', 'california', 'USA', 'America/Los_Angeles', '', '', '-60', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '2009-04-22', 'p96ziTpVZWENMxzJWjDZSZRnpwqRoZzCSG0NTcZpn6cEXQ5eofen1lBtBjID', '2021-04-23 02:59:42', '2021-05-09 06:26:02', '+19515006084', 'SundusJaafar@khouse.com'),
(38, 'Hina Gueizmir', '1619125301159500221212933153_10156755671395644_4572836946981982259_n[1].jpg', 0, 2, '0', NULL, NULL, '$2y$10$gWB/qaILp0lFrL.4WfrOs.8EhOQbcj5jZriFdss3bdM7PSjRJt9fK', 'Loma Linda, US', 'United States', 'America/Los_Angeles', '', '', '360', '', '', '', '', 'Active', 'Studying Quranic recitation and Arabic language from Al-Arabya Bayn Yadaik.', '', '', 0, '', '', '', '', '1980-03-05', NULL, '2021-04-23 03:01:41', '2021-05-01 18:39:18', '+15044447832', 'lymphnode@live.com'),
(39, 'Wassem Butt', '1619125846467591294pp.jfif', 0, 2, '0', NULL, NULL, '$2y$10$vIiRJsMQ4U8giYb8GIQTxOvP5lkyBBpqLeDI0YtRGVbfekseQHW..', 'Los Angeles, US', 'United States', 'America/Los_Angeles', '', '', '0', '', '', '', '', 'Active', 'Studying Quranic recitation. Started from al-Fatihah.', '', '', 0, '', '', '', '', '1980-04-22', NULL, '2021-04-23 03:10:46', '2021-05-05 17:48:43', '+19513128633', 'suuper7@gmail.com'),
(40, 'Farrah Butt', '', 0, 2, '0', NULL, NULL, '$2y$10$57H8z5ksw..esqZ36Rrp1O1y5OK2H6iUswI922sJe4hdWjMYBcK2O', 'Los angeles', 'USA', 'America/Los_Angeles', '', '', '0', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '2009-04-22', 'oL33WBV56z8nxDtxBgX5DhfDkOpmWj12W7ato3reDFnvLRmswPYI3A7thFqi', '2021-04-23 03:17:24', '2021-05-05 12:00:50', '+19515006084', 'FarrahButt@khouse.com'),
(41, 'Ammon Winder', '1619126725400327441167436792_1455291281490686_2415386072960381274_n.jpg', 0, 2, '0', NULL, NULL, '$2y$10$HUjAlg8Hry0tZ7bSUzux..WxYpTUpmx.e/TE1NwryaIPOEH0NBclG', 'Charlottesville, Virginia, US', 'United States', 'America/New_York', '', '', '120', '', '', '', '', 'Active', 'Studying Quranic memorization. started from the Arabic Alphabet.', '', '', 0, '', '', '', '', '1996-09-29', 'hVDdpyyLbbBpA2a5RRgREvbizup1GD8Q1Ns23q0kwKnEOFv5R7lOkxhdyhdQ', '2021-04-23 03:25:25', '2021-05-13 12:17:27', '+1804 914 0739', 'askchairmenkapow@gmail.com'),
(42, 'Danial Butt', '', 0, 2, '0', NULL, NULL, '$2y$10$roDCXDEqozDu45EqFIFMf.BxkWiFxS96OwjTeMgTO6FCHtz68fGv6', 'Los angeles', 'United States', 'America/Los_Angeles', '', '', '0', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '2011-04-22', 'IhsqGqrRByzds08Nww8CoM2y5rMebyamKlH5YTEYXEODzvf0glRacutbbFj6', '2021-04-23 03:35:24', '2021-05-05 12:00:50', '+19513128633', 'Danialbutt@khouse.com'),
(43, 'Marwa Nauman', '', 0, 2, '0', NULL, NULL, '$2y$10$LV7WngEVbWn6UR9lo.HFG.yfFEl0PfHKz5Ep//dSn0.6kEXUNmk4G', 'Los angeles', 'United States', 'America/Los_Angeles', '', '', '0', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '1999-04-22', NULL, '2021-04-23 03:38:47', '2021-04-23 03:38:47', '+15044447832', 'marwanauman@gmail.com'),
(44, 'Madinah Mir', '', 0, 2, '0', NULL, NULL, '$2y$10$Rf/lXu3Rh5lVGm381abACOkBdVDz5dvaxHAobdWEcNQAxnw//hVcO', 'Los angeles', 'United States', 'America/Los_Angeles', '', '', '90', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '2016-04-22', NULL, '2021-04-23 03:43:36', '2021-05-04 04:35:38', '+19095681412', 'MadinahMir@khouse.com'),
(45, 'Maria Mir', '', 0, 2, '0', NULL, NULL, '$2y$10$gItXCigcIVzAvMYGFjAT5eTaELlihbI60v1Xp9v2n864aCTj./tGq', 'Los angeles', 'United States', 'America/Los_Angeles', '', '', '15', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '1984-04-22', NULL, '2021-04-23 03:47:13', '2021-05-04 04:35:38', '+19095681412', 'MariaMir@khouse.com'),
(46, 'Kareem Jaafar', '', 0, 2, '0', NULL, NULL, '$2y$10$Ryw4DClOlN1YILT60A6JqOnOo2KbQm916MTkV1qFTy64vx0bFtp8e', 'California', 'United States', 'America/Anchorage', '161901902154', '', '450', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '2020-04-22', '7PjfaeMe002RQZIodezQEOcOd0vZlfG3UQ8Cvi5WdSpDoJ9PhlKV8zQ4wlpQ', '2021-04-23 03:48:50', '2021-05-06 11:27:18', '(951) 966-6126', 'Kareem@khouse.com'),
(47, 'Omar Mir', '', 0, 2, '0', NULL, NULL, '$2y$10$70yBqUN.R8WhVkuXcfgVZ.yIi3X8Tx/QWWSV7jQi6EoAmU.WIZM5C', 'Los angeles', 'United States', 'America/Los_Angeles', '', '', '15', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '1982-04-22', 't1fTMp5JEJwQEuEW9Ew9jFbqPRWHpRTcXSPQC0nrKqIXKExT72nERXTYkdIM', '2021-04-23 03:50:03', '2021-05-04 04:35:38', '+19095681412', 'lmftmaria@gmail.com'),
(48, 'Fatimah Farooq', '', 0, 2, '0', NULL, NULL, '$2y$10$nxD18mwQJyvF471u2qbZPulY8OhOrE9XlO24YR/AtJoBb47ToZy5W', 'London', 'United Kingdom', 'Europe/London', '', '', '-120', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '1998-04-22', 'ijpMwbd6MBPI2h9et58u2Xc9IgLhhc1yIaFeJe3XEueEXx8LHbw03xliDzDG', '2021-04-23 03:53:42', '2021-05-09 20:33:25', '+447368155209', 'fatimanaveed21@gmail.com'),
(49, 'Anu', '', 0, 2, '0', NULL, NULL, '$2y$10$od4pVrJJZNExiwbGnm07zeg6SPvUNX5NcFo1HNcjyEXSuZIKssvnK', '', 'United States', 'America/Chicago', '', '', '165', '', '', '', '', 'Active', '\"لم يولد مسلما ولكنه اعتنق الاسلام منذ فترة. يعمل محاميا في امريكا لديه أولاد. اهتم بدراسة القران لقرب شهر رمضان ونستطيع إن كان المحتوى جيدا أن نجعله يستمر إن شاء الله.\r\nيعرف الحروف جيدا ودرس تجويد قبل ذلك ولكنه لم يطبقه بالشكل المناسب ولذلك يحتاج إلى مراجعته على هامش الدروس ففي المقام الأول هو يهتم بتصحيح التلاوة\r\nيريد أن يحفظ عدد قليل من الايات في كل درس حتى لا يرهقه ولا يفوته أجر الحفظ. سيدرس مرتين أسبوعيا مواعيده الصباحية هي الأفضل له متاح من الساعة 7:30 صباحا حتى 9 ص بتوقيته يوميا من الاثنين للجمعة \r\nويومي السبت والأحد متاح من 8 وحتى 10 صباحا\r\nومتاح أيضا من الساعة 9م مساء كل يوم\"', '', '', 0, '', '', '', '', '2020-04-22', 'ZLYfZ1QHDcpsKhNL1dEEjcpn9G28nUUxMto0EEGQhXdA5XcQN1T3ut3X7hRn', '2021-04-23 03:54:41', '2021-05-09 06:52:11', '13018065122', 'Anukemet@hotmail.com'),
(50, 'Fatimah zahra markwith', '', 0, 2, '0', NULL, NULL, '$2y$10$zdyIhZh0EkDb4ZYEnarVdOJt07sweSNNlddXR7OXQFwGEwkVZbW5u', 'Los angeles', 'United States', 'America/Los_Angeles', '', '', '-120', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '2016-04-22', 'SVkDrzwuXdBrDHI5SfNIRe36ogapHADbys5hV81dI06dkUflzJuu4imkZ5S5', '2021-04-23 03:59:00', '2021-05-09 06:26:02', '+15593609357', 'rand_abbas@yahoo.ca'),
(51, 'Ibrahiem Wasif', '', 0, 2, '0', NULL, NULL, '$2y$10$pjWGd9dKzZCX3f5Na4JlvOdyWh/Pcb1b.zi3ptMjiuR1KCtM4Sm.G', '', 'United Kingdom', 'Europe/London', '', '', '180', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-04-23 04:02:30', '2021-05-07 04:45:52', '44 7930 363826', 'ibrahim@khouse.com'),
(52, 'Manahil Qureshi', '', 0, 2, '0', NULL, NULL, '$2y$10$aeFcnHP.39EJhDbHNhJvYeRtjTT5OCEivBh3OdBjUnPdBkYsqYP1m', 'Illinois, US', 'United States', 'America/Chicago', '161925521542', '', '180', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '2008-04-22', 'H5KSyn76d1gBKIrmP1pJYwlF93nD3PevVX4QTD4Puc3Sbz6gz22FxvLw0Tfc', '2021-04-23 04:06:48', '2021-05-10 05:26:44', '+12025960902', 'drjamshed@gmail.com'),
(53, 'Essa Wasif', '', 0, 2, '0', NULL, NULL, '$2y$10$XzKz4j6Wm0Ol9W/wjEwWB.BBoiEulnO7dOWHP6CpCIiU7Hsrgn8Ny', '', 'United Kingdom', 'Europe/London', '', '', '-90', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-04-23 04:07:59', '2021-05-08 18:26:46', '+44 7939 313903', 'essa@khouse.com'),
(54, 'Tasneef', '', 0, 2, '0', NULL, NULL, '$2y$10$yE34C7J/wmNJShAPOI8WI.qrAW05YJtHYyQjxJ4sl2co.qmeGK7WC', 'United Kingdom', 'United Kingdom', 'Europe/London', '', '', '0', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-04-23 04:12:33', '2021-05-04 05:42:00', '+44 7896 273337', 'tasneefm@gmail.com'),
(55, 'Leya Qureshi', '16192555561361159773FB icon.jpg', 0, 2, '0', NULL, NULL, '$2y$10$DQpIwjdndJo8fMdFV3LjJ.kdKp4YK21k.OSjuw4Go1cx.IO16C4h6', 'Illinois, US', 'United States', 'America/Chicago', '161925521542', '', '180', '', '', '', '', 'Active', 'Leya already knows the letters but she might have forgotten some of them. That is why she will start with reviewing the letters and diacritics quickly before studying Tajweed rules. The class should be divided between theoretical and practical study. She wants to recite Quran while she is correcting her recitation.', '', '', 0, '', '', '', '', '2008-04-22', 'tVq7CMRUPhngagUn7Y2V9uTLf4N4Pe93x7sPFw4ovaeIuTovOzQ2naMrQdhK', '2021-04-23 04:14:11', '2021-05-10 05:26:44', '12025960902', 'leyaqureshi@khouse.com'),
(56, 'Zohan Iftekhar', '', 0, 2, '0', NULL, NULL, '$2y$10$D5nA7iFgHEd9p6OaPcdtjuteQzOvt8vYuowICXxwbewx1C/Kq.kci', '', 'Select Your Country', 'Africa/Cairo', '', '', '0', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-04-23 04:18:40', '2021-04-23 04:18:40', '+1 (484) 686-6841', 'firdoszohan@yahoo.com'),
(57, 'Zain and Aayaan', '', 0, 2, '0', NULL, NULL, '$2y$10$wRx1PzzKR53va2AyJYq8aeU3pc34Jh5a9w3V6VfS7DR/4kxwsgpf2', '', 'United States', 'America/Chicago', '', '', '0', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-04-23 04:29:04', '2021-04-23 04:29:04', '(732) 692-4131', 'zain@khouse.com'),
(59, 'Mohamed Ismail', '1619168172553272314محمد.jpg', 0, 1, 'Monday-\r\nTuesday-\r\nWednesday-\r\nThursday-\r\nFriday-\r\nSaturday-\r\nSunday-', NULL, NULL, '$2y$10$7c.zBqwpOAgkEUd1QOt4WuwuTexWceg/UHkz.H/BUFDdU/JDOQIPq', 'Abees 2-8 Muharram Beh, Alexandria', 'Egypt', 'Africa/Cairo', '', 'Graduate', '300', 'Faculty of Languages and Translation - Department of Islamic Studies in English', '29410301801958', '', '', '', '', '', '1619168172837622340view[1]', 1, 'https://calendar.google.com/calendar/embed?src=mo7amed2225%40gmail.com&ctz=Africa%2FCairo', 'I am a hard working person who does not give up easily. During my degree, I have developed an excellent eye for detail due to the heavy demands of assignments and research. As a result, I am also able to work under pressure and this enhances my determination and provokes me to complete the required job in the best and the most precise form. \r\nIn 2011, I was a student council president. I also took part in a number of the al-Azhar academic retreats and workshops in collaboration with international institutions; like the Dutch institute in El-Zamalek, Cairo; the Embassy of Netherlands in Cairo, etc…', 'https://us04web.zoom.us/j/7874054018?pwd=UDJzdFpZVWlUYWxGa2ZmeDE3WHp0UT09', 'Male', '1994-10-30', 'NGAIovTxilbBpEFewQg2AyOYrf0bTgZcXXB8uKzDA1zi87oeZ3FGJJGlJ8nh', '2021-04-23 14:56:12', '2021-05-05 15:52:09', '+201030663326', 'mo7amed2225@gmail.com'),
(60, 'Lamiaa Ali', '', 0, 1, 'Monday-\r\nTuesday-\r\nWednesday-\r\nThursday-\r\nFriday-\r\nSaturday-\r\nSunday-', NULL, NULL, '$2y$10$ahsuntv0FLtzWvxEE7mQqOIvoW52JdrSjEy.Wfc4KeAow/F9uEeDa', 'Abees 2-8 Muharram Beh, Alexandria', 'Egypt', 'Africa/Cairo', '', 'Graduate', '630', 'Faculty of veterinary medicine', '29709141802648', '', '', '', '', '', '', 0, 'https://calendar.google.com/calendar/embed?src=t83us4o8qiks8l0dc7m94m30ag%40group.calendar.google.com&ctz=Africa%2FCairo', '', 'https://zoom.us/j/2914082514?pwd=K09GVmcrcVdVQWtjM255UThBaWNsZz09', 'Female', '1997-09-14', 'DAtcdwmIkg8b8Gz3KXLkfkT4b27et1Q8WzgTvr6cu4MeYG3sYrIDW4anH3Ju', '2021-04-24 02:30:14', '2021-05-06 12:08:21', '+201203211908', 'lamiaaali1997@gmail.com'),
(61, 'Danial Farooq', '', 0, 2, '0', NULL, NULL, '$2y$10$hRXYFIH.G6zz/42.900Hcuw00Apo.ZqOmrIZJi3kRqTVTmxcOnyr2', 'United Kingdom', 'United Kingdom', 'Europe/London', '', '', '-120', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '2020-04-22', 'sN9n9HtkabtggLWAziXnJhYzuyftz52nVXrqeWB1F88LxsmFY9G7lBrWzh08', '2021-04-24 07:28:10', '2021-05-12 14:38:15', '+44 7576 725527', 'danialf64@gmail.com'),
(62, 'lena  Mostavic', '', 0, 2, '0', NULL, NULL, '$2y$10$mpY64RgzFlpfcNQKwMW4yOt5wDxC2RMRnRdzfms95.Ovh0BME7UKC', '', 'United States', 'America/Anchorage', '', '', '-180', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-04-24 07:36:39', '2021-05-16 04:51:51', '+1 (510) 684-3068', 'smostafavi@gmail.com'),
(63, 'lena  Mostavic', '', 0, 2, '0', NULL, NULL, '$2y$10$WUH04jClHofddToPhV5fdOPr2Ys7kUto2BQkcIoYVKNbYzwawwZkm', 'California', 'United States', 'America/Anchorage', '', '', '-180', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-04-24 07:40:29', '2021-05-12 14:38:15', '684-3068', 'lena@khouse'),
(64, 'Abdullah Waleed', '', 0, 2, '0', NULL, NULL, '$2y$10$kKk2AKE0Tue.HYdBXLE.b.QB3yWOjMyv/jyLF1Sbs1IglGm7G8aM6', '', 'Afghanistan', 'Asia/Dubai', '', '', '-240', '', '', '', '', 'Active', '', '', '', 4, '', '', '', '', '2020-04-22', 'w8DVZplyxtgXLmp6JfoKnixmSRJVtDY8SrDzFIQHGWQ2n2IJ3Uz3Ax97hZFp', '2021-04-24 07:45:18', '2021-05-16 11:40:45', '+971 50 763 5105', 'hellowaleed@hotmail.com'),
(65, 'Saad Mohamed', '', 0, 2, '0', NULL, NULL, '$2y$10$IT74POWd6KYWJoZyh3x/.uccK/0B3mWNxd1wx22ns9ijGRAKLXFbu', '', 'United States', 'America/New_York', '', '', '-60', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-04-24 07:49:20', '2021-05-16 04:51:51', '+1 (309) 989-7155', 'fahadasad1@gmail.com'),
(67, 'Test', '', 0, 3, '0', NULL, NULL, '$2y$10$v35GudueZOpXZoApzs6Fruxfai49bvMS8Hq8RGQgD.c1X8e71qZWq', '', 'Egypt', 'Africa/Cairo', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '2020-04-22', 'ECtqSe05SEzahCzdlqc5eyzB6Y4IP6h1njAdPjpTJOeMVSEvfvnaL3LmEQMI', '2021-04-24 22:24:22', '2021-04-24 22:24:22', '00', 'a@a'),
(68, 'Omar Hamoda', '', 0, 2, '0', NULL, NULL, '$2y$10$SdnCTspjoATspe1BuaF5iuLueKpZYT2OyEdaPaO8G0Nox7k64iI9q', 'Boston MA US', 'United States', 'America/New_York', '', '', '', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '2006-06-13', 'fUP3AE00zychb60GyR8c9sVAfn9yvXsNkRmike6OJmX2SOotzZrnhjFwK6FT', '2021-04-26 04:06:07', '2021-05-01 17:29:04', '+18572696915', 'omarrocks922@gmail.com'),
(69, 'Ahmed Ismail', '16193889991914564901AHD.png', 0, 1, 'Monday-\r\nTuesday-\r\nWednesday-\r\nThursday-\r\nFriday-\r\nSaturday-\r\nSunday-', NULL, NULL, '$2y$10$2okzr1wQOm0eFuYnxQx3bODE15KZoncLaSjophtP4dGeNsizvhkue', 'Alexandria', 'Egypt', 'Africa/Cairo', '', 'Graduate', '0', 'Al-Azhar University College of Sharia and Law', '54598765426586', '', '', '', '', '', '', 0, 'https://calendar.google.com/calendar/embed?src=deeec6mvncmh2kq6vgp46agnp0%40group.calendar.google.com&ctz=Africa%2FCairo', '', 'https://us04web.zoom.us/j/2503526540?pwd=OWxJYXRKU1NDNm9TN3BVWVVrMTUyUT09', 'Male', '1991-02-11', 'UNfs9fBIqUg1BFEbtjTXDVxXlcCB13X67vPfZdTW3rorQxQVzgMps26Tivrj', '2021-04-26 04:16:39', '2021-04-26 04:16:39', '+101222501445', 'a7med0122@gmail.com'),
(70, 'Student', '', 0, 2, '0', NULL, NULL, '$2y$10$mG7HYhf2QSCbUBAxzT85NOTXx5nk8ieRh42lX5S60GbV7RBwAEU2a', '', 'Egypt', 'America/New_York', '', '', '0', '', '', '', '', '', '', '', '', 1, '', '', '', '', '2020-04-22', 'ElQLQ35TVc1iIjYlD8NBgCWDk3vb6sX2D9rAD4wbzP2T6JJ6RH4WcKfh7ae7', '2021-04-26 19:32:02', '2021-05-01 13:47:11', '1111', 'Student@test'),
(71, 'Gretchen Head', '', 0, 2, '0', NULL, NULL, '$2y$10$l4QYsF0TpcrMZlCEvc7A9ewvoFjfj8Oaa7I3B0jQWRVmBhUoqCBuW', 'Singapore', 'Singapore', 'Asia/Singapore', '', '', '420', '', '', '', '', 'Active', '', '', '', 0, '', '', '', '', '2020-04-22', '34I7ggc4dGHTcvxxUoy6aALOOfqP8WNOgjJWUStAY5pBshlfEtba6AstXCdX', '2021-04-29 19:24:19', '2021-05-07 22:27:38', '+6590262443', 'gretchen.head@yale-nus.edu.sg'),
(72, '2222', '', 0, 3, '0', NULL, NULL, '$2y$10$Rjedf9GbG4kINsql9Cf/xOzfU0K0feE5KnvK375XhL1Vit4HGgMX6', '', 'United States', 'America/New_York', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '2020-04-22', NULL, '2021-05-09 19:25:18', '2021-05-09 19:25:18', '2222', 'b@b');

-- --------------------------------------------------------

--
-- Table structure for table `waitings`
--

CREATE TABLE `waitings` (
  `id` int(11) UNSIGNED NOT NULL,
  `student_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `done` int(11) NOT NULL DEFAULT 0,
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
(4, 'Rahil Akhdar', '* Email  :\r\n    * Mobile :\r\n    * FB     :\r\n    *  Other :', 0, 'Others', 'Mr/ mohamed  Ismail', '2021-06-01', '2021-04-28 16:44:23', '2021-04-28 16:44:23'),
(5, 'Malik ibn Dinar', '* Email  :\r\n    * Mobile :\r\n    * FB     :\r\n    *  Other :', 1, 'Whatsapp', 'Mr/ mohamed  Ismail', '2021-05-01', '2021-04-28 16:45:10', '2021-05-01 16:45:48'),
(6, 'Mairaj Sayed', '* Email  :\r\n    * Mobile :\r\n    * FB     :\r\n    *  Other :', 0, 'Whatsapp', 'Mr/ mohamed  Ismail', '2021-06-15', '2021-04-28 16:45:30', '2021-04-28 16:45:30'),
(7, 'sifat raihan', '* Email  :\r\n    * Mobile :\r\n    * FB     :\r\n    *  Other :', 0, 'Whatsapp', 'Mr/ mohamed  Ismail', '2021-05-10', '2021-04-28 16:46:51', '2021-04-28 16:46:51'),
(8, 'Sara', '* Email  :\r\n    * Mobile :\r\n    * FB     :\r\n    *  Other :', 0, 'Whatsapp', 'Mr/ mohamed  Ismail', '2021-04-01', '2021-04-28 16:47:23', '2021-04-28 16:47:23'),
(9, 'Munib Ismail', '* Email  :\r\n    * Mobile :\r\n    * FB     :\r\n    *  Other :', 1, 'Whatsapp', 'Mr/ mohamed  Ismail', '2021-04-29', '2021-04-28 16:48:21', '2021-04-29 09:14:45'),
(10, 'Kasad', '* Email  :\r\n    * Mobile :\r\n    * FB     :\r\n    *  Other :', 1, 'Whatsapp', 'Mr/ mohamed  Ismail', '2021-05-01', '2021-04-28 16:49:36', '2021-05-01 16:45:48'),
(11, 'Raida A Wilson', '* Email  :\r\n    * Mobile :\r\n    * FB     :\r\n    *  Other :', 1, 'Whatsapp', 'Mr/ mohamed  Ismail', '2021-05-13', '2021-05-06 15:35:40', '2021-05-12 23:01:33'),
(12, 'Rahil Akhdar', '* Email  :\r\n    * Mobile :\r\n    * FB     :\r\n    *  Other :', 0, 'Whatsapp', 'Mr/ mohamed  Ismail', '2021-06-01', '2021-05-06 15:36:16', '2021-05-06 15:36:16');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1271;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `requestds`
--
ALTER TABLE `requestds`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `waitings`
--
ALTER TABLE `waitings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
