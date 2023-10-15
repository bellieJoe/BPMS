-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 05:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `butterfly_permit_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `butterfly_id` int(11) NOT NULL,
  `address` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode_of_transport` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_transport` date NOT NULL,
  `purpose` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('approved','pending','declined','canceled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `butterfly_id`, `address`, `mode_of_transport`, `date_of_transport`, `purpose`, `details`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 8, 'Tabi, Boac, Marinduque', 'sdfsdf', '2023-06-13', 'changed', 'dfsdf', 'approved', '2023-06-15 07:40:01', '2023-06-16 05:46:19'),
(3, 1, 8, 'Tabi, Boac, Marinduque', '2', '2023-06-27', 'fsdf', 'sdf', 'declined', '2023-06-16 04:44:08', '2023-06-16 05:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `user_id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, 1, 'MSC', 'Tanza', '2023-06-15 03:41:52', '2023-06-15 03:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `butterflies`
--

CREATE TABLE `butterflies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `species` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local_name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_rare` tinyint(1) NOT NULL,
  `is_threatened` tinyint(1) NOT NULL,
  `is_vulnerable` tinyint(1) NOT NULL,
  `input_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wing_span` int(11) NOT NULL,
  `male_img_url` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `female_img_url` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caterpillar_img_url` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pupa_img_url` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `butterflies`
--

INSERT INTO `butterflies` (`id`, `species`, `local_name`, `is_rare`, `is_threatened`, `is_vulnerable`, `input_code`, `wing_span`, `male_img_url`, `female_img_url`, `caterpillar_img_url`, `pupa_img_url`, `created_at`, `updated_at`) VALUES
(8, 'sdf', 'sdfsd', 1, 0, 0, 'fsdfsd', 3, 'male-8.png', 'female-8.png', 'caterpillar-8.png', 'pupa-8.png', '2023-06-15 06:22:06', '2023-06-15 06:22:06'),
(9, 'adsf', 'asdfasdf', 1, 1, 1, 'asd', 3, 'male-9.png', 'female-9.png', 'caterpillar-9.png', 'pupa-9.png', '2023-06-15 06:24:14', '2023-06-15 06:24:14'),
(10, 'fsdfs', 'dfsdf', 1, 0, 0, 'sfsdf', 4, 'male-10.png', 'female-10.png', 'caterpillar-10.png', 'pupa-10.png', '2023-06-16 06:32:29', '2023-06-16 06:32:29');

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
(4, '2023_06_13_102552_create_businesses_table', 1),
(5, '2023_06_13_133312_create_butterflies_table', 1),
(6, '2023_06_13_133501_create_applications_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 2,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `contact_number`, `email_verified_at`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Diether Monsanto', 'testuser', 'user@gmail.com', '09493131426234234234', NULL, 'password', 2, NULL, '2023-06-15 03:41:52', '2023-06-15 03:41:52'),
(2, 'admin', 'admin', 'admin@email.com', '2312312312', NULL, 'password', 1, NULL, '2023-06-15 14:28:35', '2022-06-07 13:47:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `butterflies`
--
ALTER TABLE `butterflies`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_contact_number_unique` (`contact_number`),
  ADD UNIQUE KEY `users_username_unique` (`username`) USING HASH,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `butterflies`
--
ALTER TABLE `butterflies`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
