-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2022 at 01:36 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `allowances`
--

CREATE TABLE `allowances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `spend` int(11) NOT NULL,
  `discount_rate` int(11) NOT NULL,
  `allowance` int(11) DEFAULT NULL,
  `increment` int(11) DEFAULT NULL,
  `equivalent` int(11) DEFAULT NULL,
  `annual_saving` int(11) DEFAULT NULL,
  `pre_discount_tier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `allowances`
--

INSERT INTO `allowances` (`id`, `created_at`, `updated_at`, `user_id`, `spend`, `discount_rate`, `allowance`, `increment`, `equivalent`, `annual_saving`, `pre_discount_tier`) VALUES
(22, '2022-11-29 12:40:41', '2022-11-30 10:34:29', 8, 5000, 10, 500, 5000, 5500, 6000, 5500),
(23, '2022-11-29 12:40:53', '2022-11-30 10:34:29', 8, 7500, 20, 500, 2500, 8500, 12000, 3000),
(24, '2022-11-29 12:41:03', '2022-11-30 10:34:29', 8, 10000, 30, 750, 2500, 11750, 21000, 3250),
(25, '2022-11-29 12:41:14', '2022-11-30 10:34:29', 8, 12500, 40, 1000, 2500, 15250, 33000, 3500),
(26, '2022-11-29 12:41:25', '2022-11-30 10:34:29', 8, 15000, 50, 1250, 2500, 19000, 48000, 3750);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `brandname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactive',
  `impressions` int(11) NOT NULL,
  `products` int(11) NOT NULL,
  `languages` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `units` int(11) NOT NULL,
  `attributes` int(11) NOT NULL DEFAULT 10,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `created_at`, `updated_at`, `brandname`, `url`, `status`, `impressions`, `products`, `languages`, `price`, `units`, `attributes`, `user_id`) VALUES
(35, '2022-11-30 10:53:51', '2022-11-30 10:55:07', 'advanced commerce', 'https://advancedcommerce.io', 'Active', 100000, 1000, 1, 2500, 17, 10, '8'),
(37, '2022-11-30 10:54:30', '2022-11-30 10:55:07', 'advanced commerce', 'https://www.advancedcommerce.io/', 'Active', 1000000, 3000, 1, 2650, 65, 10, '8'),
(38, '2022-11-30 10:54:53', '2022-11-30 10:55:01', 'advanced commerce', 'https://www.advancedcommerce.io/', 'Active', 10000, 100000, 0, 12000, 1000, 10, '8');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_11_103137_create_brands_table', 1),
(6, '2022_11_11_124851_add_price_to_brands_table', 2),
(7, '2022_11_14_123220_create_statuses_table', 3),
(8, '2022_11_14_144243_add_column_to_brands_table', 4),
(9, '2022_11_14_145001_create_settings_table', 5),
(10, '2022_11_15_114232_create_allowances_table', 5),
(11, '2022_11_16_141946_add_column_to_users_table', 6),
(12, '2022_11_17_141528_add_attributes_to_brands_table', 7),
(13, '2022_11_17_152819_add_columns_to_allowances_table', 8),
(14, '2022_11_17_153753_add_user_id_to_allowances', 9),
(15, '2022_11_24_133021_add_columns_to_settings_table', 10),
(16, '2022_11_25_133451_create_allowances_table', 11),
(18, '2022_11_28_132921_add_column_to_allowances_table', 12),
(21, '2022_11_28_153040_add_another_column_to_allowances_table', 13),
(22, '2022_11_30_104256_add_user_id_to_brands_table', 14);

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
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit_price` int(11) NOT NULL,
  `min_price` int(11) NOT NULL,
  `att_adj` int(11) NOT NULL,
  `language_adj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `unit_price`, `min_price`, `att_adj`, `language_adj`) VALUES
(1, '2022-11-24 13:39:32', '2022-11-24 13:47:46', 10, 2500, 20, 50),
(3, '2022-11-24 13:45:30', '2022-11-24 13:45:30', 13, 2500, 20, 50),
(4, '2022-11-24 13:45:41', '2022-11-24 13:45:41', 12, 2500, 20, 50);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `accountType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'standard',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `accountType`, `first_name`, `last_name`, `company_name`) VALUES
(6, 'Advanced Commerce', 'martin.adams@advancedcommerce.io', NULL, '$2y$10$I2DF5btOwuynWrlqQk5oRe8BrPswwcMHmHEz/75X.VCNrMTisiCdO', NULL, '2022-11-16 14:59:53', '2022-11-16 14:59:53', 'admin', 'Martin', 'Adams', 'Advanced Commerce'),
(7, 'AndreBrown', 'andre@advancedcommerce.io', NULL, '$2y$10$npHBxIHcRxYJvlTyuLlltuAuupNzlVSUQ6Q9F6VgKy20FJ8Gnkd16', NULL, '2022-11-16 15:02:53', '2022-11-16 15:02:53', 'admin', 'André', 'Brown', 'Advanced Commerce'),
(8, 'martinTest', 'martin@enterprise.com', NULL, '$2y$10$ixNbGQ1RowLCllk21yuH/O1Ey4tXhQTZL0tzQJJWqi7TpD.zUZJB2', NULL, '2022-11-17 10:40:15', '2022-11-17 10:40:15', 'enterprise', 'Martin', 'Adams', 'Advanced Commerce Ltd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allowances`
--
ALTER TABLE `allowances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allowances`
--
ALTER TABLE `allowances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
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
