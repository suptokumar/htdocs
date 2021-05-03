-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 09:43 AM
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
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `addpayments`
--

CREATE TABLE `addpayments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `em_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `adder` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_register` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addpayments`
--

INSERT INTO `addpayments` (`id`, `em_id`, `adder`, `total`, `paid`, `room_register`, `date`, `created_at`, `updated_at`) VALUES
(1, '1', 'm', '100', '0', '1', '2021-05-02', '2021-05-01 23:47:53', '2021-05-01 23:47:53'),
(2, '2', 'm', '100', '0', '2', '2021-05-02', '2021-05-01 23:48:16', '2021-05-01 23:48:16'),
(3, '1', 'm', '600', '0', '0', '', '2021-05-01 23:48:42', '2021-05-01 23:48:42'),
(4, '1', 'm', '400', '0', '0', '', '2021-05-01 23:48:51', '2021-05-01 23:48:51'),
(5, '1', 'm', '0', '100', '0', '', '2021-05-01 23:50:17', '2021-05-01 23:50:17'),
(6, '1', 'm', '0', '100', '0', '', '2021-05-01 23:57:34', '2021-05-01 23:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `em_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `village` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thana` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `consultant` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `con_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reffered` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `room` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `discharge` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admissions`
--

INSERT INTO `admissions` (`id`, `em_id`, `name`, `age`, `contact`, `gender`, `village`, `thana`, `district`, `date`, `consultant`, `con_id`, `reffered`, `room_id`, `room`, `total`, `paid`, `discharge`, `created_at`, `updated_at`) VALUES
(1, '', 'h', 'h', '', 'Male', '', '', '', '2021-05-02', '', '', '', '1', '354', '100', '0', '0', '2021-05-01 23:47:53', '2021-05-01 23:47:53'),
(2, '', 'i', 'i', 'i', 'Male', '', '', '', '2021-05-02', '', '', '', '2', '55', '100', '0', '0', '2021-05-01 23:48:16', '2021-05-01 23:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `adtests`
--

CREATE TABLE `adtests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `em_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_amount` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_discount` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_total` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_paid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `adder` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adtests`
--

INSERT INTO `adtests` (`id`, `em_id`, `test_name`, `test_amount`, `test_discount`, `test_total`, `test_paid`, `test_time`, `adder`, `date`, `created_at`, `updated_at`) VALUES
(1, '1', '```Room Fee', ',100', '0', '100', '100', 'Sun, May 02, 2021 05:47 am', 'm', '2021-05-02', '2021-05-01 23:47:53', '2021-05-01 23:50:17'),
(2, '2', '```Room Fee', ',100', '0', '100', '0', 'Sun, May 02, 2021 05:48 am', 'm', '2021-05-02', '2021-05-01 23:48:16', '2021-05-01 23:48:16'),
(3, '1', '```room clean```nurse sheba```x-ray```ecg```glucose```bilirubin', ',100,100,100,100,100,100', '0', '600', '100', 'Sun, May 02, 2021 05:48 am', 'm', '', '2021-05-01 23:48:42', '2021-05-01 23:57:34'),
(4, '1', '```room clean```nurse sheba```x-ray```ecg', ',100,100,100,100', '0', '400', '0', 'Sun, May 02, 2021 05:48 am', 'm', '', '2021-05-01 23:48:51', '2021-05-01 23:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `apoinments`
--

CREATE TABLE `apoinments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `em_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `village` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thana` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `consultant` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `con_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reffered` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `past` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apoinments`
--

INSERT INTO `apoinments` (`id`, `em_id`, `name`, `age`, `contact`, `gender`, `village`, `thana`, `district`, `date`, `consultant`, `con_id`, `reffered`, `token`, `total`, `paid`, `past`, `created_at`, `updated_at`) VALUES
(1, '', 'hh', 'h', 'h', 'Male', '', '', '', '2021-05-02', 'arif', '1', '', '1', '100', '100', '2021-05-02 05:41:54', '2021-05-01 23:39:36', '2021-05-01 23:41:54'),
(2, '', 'ertg', 'r', 'r', 'Male', '', '', '', '2021-05-02', 'supto', '2', '', '1', '100', '100', '2021-05-02 05:42:03', '2021-05-01 23:39:45', '2021-05-01 23:42:03'),
(3, '', 'reer', 't', 't', 'Male', '', '', '', '2021-05-02', 'arif', '1', '', '2', '100', '100', '2021-05-02 05:41:54', '2021-05-01 23:39:55', '2021-05-01 23:41:54'),
(4, '', 'j', 'j', 'j', 'Male', '', '', '', '2021-05-02', 'supto', '2', '', '2', '100', '100', '2021-05-02 05:42:03', '2021-05-01 23:40:04', '2021-05-01 23:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `contact` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `designation` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `fees` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `contact`, `email`, `designation`, `fees`, `created_at`, `updated_at`) VALUES
(1, 'arif', '01770', 'arif@arif.com', 'consulant', '100', '2021-05-01 23:37:37', '2021-05-01 23:37:37'),
(2, 'supto', '11', '', 'co', '100', '2021-05-01 23:37:57', '2021-05-01 23:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `emargencies`
--

CREATE TABLE `emargencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `village` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `thana` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `district` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `consultant` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `reffered` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emargencies`
--

INSERT INTO `emargencies` (`id`, `name`, `age`, `contact`, `gender`, `village`, `thana`, `district`, `date`, `consultant`, `reffered`, `created_at`, `updated_at`) VALUES
(1, 'y', '12', 'y', 'Male', '', '', '', '1619912566', 'arif', 'rtr', '2021-05-01 23:42:46', '2021-05-01 23:42:46'),
(2, 'u', 'u', 'u', 'Male', '', '', '', '1619912573', '', '', '2021-05-01 23:42:53', '2021-05-01 23:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `imagetests`
--

CREATE TABLE `imagetests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pathologies`
--

CREATE TABLE `pathologies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `book` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `type`, `cost`, `book`, `created_at`, `updated_at`) VALUES
(1, '354', 'Single Bed', '100', '1', '2021-05-01 23:38:08', '2021-05-01 23:47:53'),
(2, '55', 'AC', '100', '1', '2021-05-01 23:38:19', '2021-05-01 23:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `type`, `rate`, `created_at`, `updated_at`) VALUES
(1, 'room clean', 'Service', '100', '2021-05-01 23:36:12', '2021-05-01 23:36:12'),
(2, 'nurse sheba', 'Service', '100', '2021-05-01 23:36:22', '2021-05-01 23:36:22'),
(3, 'glucose', 'Pathology', '100', '2021-05-01 23:36:35', '2021-05-01 23:36:35'),
(4, 'bilirubin', 'Pathology', '100', '2021-05-01 23:36:44', '2021-05-01 23:36:44'),
(5, 'x-ray', 'ImageTest', '100', '2021-05-01 23:36:58', '2021-05-01 23:36:58'),
(6, 'ecg', 'ImageTest', '100', '2021-05-01 23:37:09', '2021-05-01 23:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `testpayments`
--

CREATE TABLE `testpayments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `em_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `adder` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testpayments`
--

INSERT INTO `testpayments` (`id`, `em_id`, `adder`, `total`, `paid`, `created_at`, `updated_at`) VALUES
(1, '2', 'm', '600', '0', '2021-05-01 23:43:46', '2021-05-01 23:43:46'),
(2, '2', 'm', '400', '0', '2021-05-01 23:44:09', '2021-05-01 23:44:09'),
(3, '1', 'm', '600', '0', '2021-05-01 23:45:06', '2021-05-01 23:45:06'),
(4, '1', 'm', '400', '0', '2021-05-01 23:45:17', '2021-05-01 23:45:17'),
(5, '2', 'm', '0', '500', '2021-05-01 23:46:25', '2021-05-01 23:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `em_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_amount` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_discount` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_total` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_paid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `adder` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `em_id`, `test_name`, `test_amount`, `test_discount`, `test_total`, `test_paid`, `test_time`, `adder`, `created_at`, `updated_at`) VALUES
(1, '2', '```room clean```nurse sheba```x-ray```ecg```glucose```bilirubin', ',100,100,100,100,100,100', '0', '600', '500', 'Sun, May 02, 2021 05:43 am', 'm', '2021-05-01 23:43:46', '2021-05-01 23:46:25'),
(2, '2', '```room clean```nurse sheba```x-ray```ecg', ',100,100,100,100', '0', '400', '0', 'Sun, May 02, 2021 05:44 am', 'm', '2021-05-01 23:44:09', '2021-05-01 23:44:09'),
(3, '1', '```room clean```nurse sheba```x-ray```ecg```glucose```bilirubin', ',100,100,100,100,100,100', '0', '600', '0', 'Sun, May 02, 2021 05:45 am', 'm', '2021-05-01 23:45:06', '2021-05-01 23:45:06'),
(4, '1', '```room clean```nurse sheba```x-ray```ecg', ',100,100,100,100', '0', '400', '0', 'Sun, May 02, 2021 05:45 am', 'm', '2021-05-01 23:45:17', '2021-05-01 23:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pass` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `pass`) VALUES
(1, 'Momin', 'a@a', '01778728473', 'Ullapara', 'Admin', NULL, '$2y$10$X09YGYR7XEDF2h3jnZHjKeTWr0CXKxxyQQ8xRI5xqsvGIKBuQQaIq', 'WH4Kc0qNZLgttAGXqBK99jQfIJ4vtWTrglKJnMUy5yePipw20GP5uY9aO3Bc', NULL, '2021-05-02 07:32:21', 'aaa'),
(8, 'm', 'm@m', '01778', '', 'Reciptionist', NULL, '$2y$10$cyfzVwCG0LnieENFWdgEJuwjOyXfO3hdr5Odwz.6dygAaIxO1ipIW', '2wQmAqCE3UspIwg73L1ddTxmTjtn9Jb8Qa5jUtHKkr0K7MrBER37vOc0PhxD', '2021-05-01 23:25:29', '2021-05-02 07:33:33', 'bbb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addpayments`
--
ALTER TABLE `addpayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adtests`
--
ALTER TABLE `adtests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apoinments`
--
ALTER TABLE `apoinments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emargencies`
--
ALTER TABLE `emargencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `imagetests`
--
ALTER TABLE `imagetests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pathologies`
--
ALTER TABLE `pathologies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testpayments`
--
ALTER TABLE `testpayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addpayments`
--
ALTER TABLE `addpayments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `adtests`
--
ALTER TABLE `adtests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `apoinments`
--
ALTER TABLE `apoinments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emargencies`
--
ALTER TABLE `emargencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imagetests`
--
ALTER TABLE `imagetests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pathologies`
--
ALTER TABLE `pathologies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testpayments`
--
ALTER TABLE `testpayments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
