-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2022 at 11:25 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatives`
--

CREATE TABLE `alternatives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatives`
--

INSERT INTO `alternatives` (`id`, `app_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Papuyu', '2022-07-02 03:20:09', '2022-07-02 03:20:09'),
(2, 1, 'Haruan', '2022-07-02 03:20:09', '2022-07-02 03:20:09'),
(3, 1, 'Patin', '2022-07-02 03:20:09', '2022-07-02 03:20:09'),
(4, 1, 'Saluang', '2022-07-02 03:20:09', '2022-07-02 03:20:09'),
(5, 1, 'Sapat', '2022-07-02 03:20:09', '2022-07-02 03:20:09'),
(6, 1, 'Nila', '2022-07-02 03:20:46', '2022-07-02 03:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE `apps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Budidaya Ikan', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'exist', '2022-07-02 03:20:09', '2022-07-02 03:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` bigint(20) UNSIGNED DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `type` enum('cost','benefit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `app_id`, `code`, `name`, `weight`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'C1', 'PH Air', 25, 'benefit', '2022-07-02 03:20:09', '2022-07-02 03:20:09'),
(2, 1, 'C2', 'Suhu', 15, 'benefit', '2022-07-02 03:20:09', '2022-07-02 03:20:09'),
(3, 1, 'C3', 'Oksigen Terlarut', 15, 'benefit', '2022-07-02 03:20:09', '2022-07-02 03:20:09'),
(4, 1, 'C4', 'Amoniak', 15, 'benefit', '2022-07-02 03:20:09', '2022-07-02 03:20:09'),
(5, 1, 'C5', 'Nitrit', 15, 'benefit', '2022-07-02 03:20:09', '2022-07-02 03:20:09'),
(6, 1, 'C6', 'Kecerahan Air', 15, 'benefit', '2022-07-02 03:20:09', '2022-07-02 03:20:09');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(5, '2022_06_15_081357_create_apps_table', 1),
(6, '2022_06_15_081421_create_alternatives_table', 1),
(7, '2022_06_26_131347_create_criterias_table', 1),
(8, '2022_06_28_035959_create_scores_table', 1),
(9, '2022_06_29_031157_create_results_table', 1);

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` bigint(20) UNSIGNED DEFAULT NULL,
  `alternative_id` bigint(20) UNSIGNED DEFAULT NULL,
  `result` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternative_id` bigint(20) UNSIGNED DEFAULT NULL,
  `criteria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `alternative_id`, `criteria_id`, `score`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '5', '2022-07-02 03:20:09', '2022-07-02 03:20:09'),
(2, 1, 2, '26', '2022-07-02 03:20:09', '2022-07-02 03:20:09'),
(3, 1, 3, '2', '2022-07-02 03:20:09', '2022-07-02 03:20:09'),
(4, 1, 4, '0.1', '2022-07-02 03:20:09', '2022-07-02 03:20:09'),
(5, 1, 5, '1', '2022-07-02 03:20:09', '2022-07-02 03:20:09'),
(6, 1, 6, '20', '2022-07-02 03:20:09', '2022-07-02 03:20:09'),
(7, 2, 1, '6', '2022-07-02 03:20:09', '2022-07-02 03:20:09'),
(8, 2, 2, '25', '2022-07-02 03:20:09', '2022-07-02 03:20:09'),
(9, 2, 3, '2', '2022-07-02 03:20:09', '2022-07-02 03:20:09'),
(10, 2, 4, '0.1', '2022-07-02 03:20:09', '2022-07-02 03:20:09'),
(11, 2, 5, '1', '2022-07-02 03:20:09', '2022-07-02 03:20:09'),
(12, 2, 6, '20', '2022-07-02 03:20:10', '2022-07-02 03:20:10'),
(13, 3, 1, '6.5', '2022-07-02 03:20:10', '2022-07-02 03:20:10'),
(14, 3, 2, '27', '2022-07-02 03:20:10', '2022-07-02 03:20:10'),
(15, 3, 3, '3', '2022-07-02 03:20:10', '2022-07-02 03:20:10'),
(16, 3, 4, '0.1', '2022-07-02 03:20:10', '2022-07-02 03:20:10'),
(17, 3, 5, '1', '2022-07-02 03:20:11', '2022-07-02 03:20:11'),
(18, 3, 6, '50', '2022-07-02 03:20:11', '2022-07-02 03:20:11'),
(19, 4, 1, '6.5', '2022-07-02 03:20:11', '2022-07-02 03:20:11'),
(20, 4, 2, '24', '2022-07-02 03:20:11', '2022-07-02 03:20:11'),
(21, 4, 3, '3', '2022-07-02 03:20:11', '2022-07-02 03:20:11'),
(22, 4, 4, '0.1', '2022-07-02 03:20:11', '2022-07-02 03:20:11'),
(23, 4, 5, '1', '2022-07-02 03:20:11', '2022-07-02 03:20:11'),
(24, 4, 6, '20', '2022-07-02 03:20:11', '2022-07-02 03:20:11'),
(25, 5, 1, '6', '2022-07-02 03:20:11', '2022-07-02 03:20:11'),
(26, 5, 2, '24', '2022-07-02 03:20:11', '2022-07-02 03:20:11'),
(27, 5, 3, '3', '2022-07-02 03:20:11', '2022-07-02 03:20:11'),
(28, 5, 4, '0.1', '2022-07-02 03:20:11', '2022-07-02 03:20:11'),
(29, 5, 5, '1', '2022-07-02 03:20:11', '2022-07-02 03:20:11'),
(30, 5, 6, '20', '2022-07-02 03:20:11', '2022-07-02 03:20:11'),
(31, 6, 1, '6', '2022-07-02 03:20:47', '2022-07-02 03:20:47'),
(32, 6, 2, '26', '2022-07-02 03:20:47', '2022-07-02 03:20:47'),
(33, 6, 3, '3', '2022-07-02 03:20:47', '2022-07-02 03:20:47'),
(34, 6, 4, '0.1', '2022-07-02 03:20:47', '2022-07-02 03:20:47'),
(35, 6, 5, '1', '2022-07-02 03:20:47', '2022-07-02 03:20:47'),
(36, 6, 6, '20', '2022-07-02 03:20:47', '2022-07-02 03:20:47');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2022-07-02 03:20:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4rdJfqLVQB', '2022-07-02 03:20:09', '2022-07-02 03:20:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatives_app_id_foreign` (`app_id`);

--
-- Indexes for table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criterias_app_id_foreign` (`app_id`);

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
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_app_id_foreign` (`app_id`),
  ADD KEY `results_alternative_id_foreign` (`alternative_id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scores_alternative_id_foreign` (`alternative_id`),
  ADD KEY `scores_criteria_id_foreign` (`criteria_id`);

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
-- AUTO_INCREMENT for table `alternatives`
--
ALTER TABLE `alternatives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD CONSTRAINT `alternatives_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `apps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `criterias`
--
ALTER TABLE `criterias`
  ADD CONSTRAINT `criterias_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `apps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_alternative_id_foreign` FOREIGN KEY (`alternative_id`) REFERENCES `alternatives` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `apps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_alternative_id_foreign` FOREIGN KEY (`alternative_id`) REFERENCES `alternatives` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scores_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
