-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2024 at 09:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave_management_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `annual_leaves`
--

CREATE TABLE `annual_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `year` year(4) NOT NULL,
  `total_casual_leaves` int(11) NOT NULL,
  `total_medical_leaves` int(11) NOT NULL,
  `balance_casual_leaves` int(11) NOT NULL,
  `balance_medical_leaves` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `annual_leaves`
--

INSERT INTO `annual_leaves` (`id`, `employee_id`, `year`, `total_casual_leaves`, `total_medical_leaves`, `balance_casual_leaves`, `balance_medical_leaves`, `created_at`, `updated_at`) VALUES
(1, 2, '2024', 12, 12, 12, 12, '2024-07-03 04:37:09', '2024-07-03 04:37:09'),
(2, 3, '2024', 21, 12, 21, 12, '2024-07-04 02:11:43', '2024-07-04 02:11:43'),
(3, 4, '2024', 21, 12, 21, 12, '2024-07-04 11:34:08', '2024-07-04 11:34:08'),
(4, 5, '2024', 21, 21, 21, 21, '2024-07-04 11:38:26', '2024-07-04 11:38:26'),
(5, 6, '2024', 21, 21, 21, 21, '2024-07-05 10:23:25', '2024-07-05 10:23:25'),
(6, 7, '2024', 21, 12, 21, 12, '2024-07-05 10:26:19', '2024-07-05 10:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'IT', '2024-07-02 14:31:07', '2024-07-02 14:31:07'),
(2, 'HR', '2024-07-02 14:35:22', '2024-07-02 14:35:22'),
(3, 'Com', '2024-07-05 10:22:59', '2024-07-05 10:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Intern', '2024-07-02 14:35:32', '2024-07-02 14:35:32'),
(2, 'Junior', '2024-07-03 23:28:36', '2024-07-03 23:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `First_Name` varchar(45) NOT NULL,
  `Last_Name` varchar(45) NOT NULL,
  `Full_Name` varchar(45) NOT NULL,
  `LNIC` varchar(45) NOT NULL,
  `Gender` varchar(45) NOT NULL,
  `Contact_no1` varchar(45) NOT NULL,
  `Contact_no2` varchar(45) DEFAULT NULL,
  `Address` varchar(945) NOT NULL,
  `Active_Status` varchar(45) NOT NULL,
  `Permenent_date` date NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `designation_id` bigint(20) UNSIGNED NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `First_Name`, `Last_Name`, `Full_Name`, `LNIC`, `Gender`, `Contact_no1`, `Contact_no2`, `Address`, `Active_Status`, `Permenent_date`, `department_id`, `designation_id`, `Email`, `Password`, `created_at`, `updated_at`) VALUES
(2, 'Ays', 'Moh', 'Ays Moh', '231213231231', 'Male', '1232113', '123213132', 'mw', 'Active', '2024-07-03', 1, 1, 'ays@g.c', '$2y$12$jiTKAw1OXfIYtx7mJN5E3ueLe6dLRf9tuRh28Aqdc4Fyoybw6d7Xi', '2024-07-03 04:37:09', '2024-07-03 04:37:09'),
(3, 'Moh', 'Zam', 'Moh Zam', '321123', 'Male', '123123213', '132231231', 'Col', 'Active', '2024-07-05', 1, 1, 'moh@g.c', '$2y$12$2i9aKWuULpgcDjS4Dur7WuIZByMHJ0UvnFlqT.OI9lmfYNUIQXkse', '2024-07-04 02:11:43', '2024-07-04 02:11:43'),
(4, 'Ahm', 'Bro', 'Ahm Bro', '22313232', 'Male', '32132132', '32213213', 'Mw', 'Active', '2024-07-04', 1, 2, 'ahm@g.c', '$2y$12$BZMNevsXUVBppCAF3q47leUYyG52tH1SRzJxP.ym3QeZsi7QOuiQm', '2024-07-04 11:34:08', '2024-07-04 11:34:08'),
(5, 'Sir', 'Ig', 'Sir Ig', '23213121', 'Female', '231311', '321333332', 'Mw', 'Active', '2024-07-05', 1, 1, 'ig@g.c', '$2y$12$0H51sq.4ZOkk9Ina1v6YDeiFNqDQbGnkh576UyBEwLhmNMbxP6ocm', '2024-07-04 11:38:26', '2024-07-04 11:38:26'),
(6, 'Ajmal', 'Nasir', 'Ajmal Nasir', '23132132', 'Female', '233232312', '32213312321', 'Madawala', 'Active', '2024-07-01', 3, 1, 'aj@g.c', '$2y$12$E3VNwwWoh.LCjz9e1PCNy.epYRi7I0CUk3XzuTI2bxykqB4CGjIOq', '2024-07-05 10:23:25', '2024-07-05 10:23:25'),
(7, 'Moh', 'JJ', 'Moh JJ', '3212321321', 'Male', '321313', '21321313', 'Md', 'Inactive', '2024-07-19', 3, 1, 'jjj@g.c', '$2y$12$QIaLu4nImx4vysISYFDwvuBP9V8hYoCm9rcVxYoTJInizfrJKLcda', '2024-07-05 10:26:19', '2024-07-05 10:26:19');

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
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `Date` varchar(45) NOT NULL,
  `Leave_Type` varchar(45) NOT NULL,
  `Requested_Leave_Date_from` varchar(45) NOT NULL,
  `Requested_Leave_Date_to` varchar(45) DEFAULT NULL,
  `Description` varchar(945) NOT NULL,
  `Confirmed_status` varchar(45) DEFAULT NULL,
  `Confirmed_Leave_Date_from` varchar(45) DEFAULT NULL,
  `Confirmed_Leave_Date_to` varchar(45) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_requests`
--

INSERT INTO `leave_requests` (`id`, `employee_id`, `Date`, `Leave_Type`, `Requested_Leave_Date_from`, `Requested_Leave_Date_to`, `Description`, `Confirmed_status`, `Confirmed_Leave_Date_from`, `Confirmed_Leave_Date_to`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2024-07-04', 'Casual Leave', '2024-07-04', '2024-07-05', 'sick', 'approved', NULL, NULL, 1, '2024-07-04 10:43:28', '2024-07-04 13:15:28'),
(2, 2, '2024-07-04', 'Casual Leave', '2024-07-09', '2024-07-13', 'For Fun', 'approved', NULL, NULL, 1, '2024-07-04 10:58:10', '2024-07-04 13:19:09'),
(3, 2, '2024-07-04', 'Casual Leave', '2024-07-05', '2024-07-18', 'd', 'rejected', NULL, NULL, 1, '2024-07-04 11:13:18', '2024-07-04 13:16:53'),
(4, 2, '2024-07-04', 'Casual Leave', '2024-07-05', '2024-07-12', 'cx', 'approved', NULL, NULL, 1, '2024-07-04 11:19:24', '2024-07-04 13:26:32'),
(5, 2, '2024-07-04', 'Casual Leave', '2024-07-11', '2024-07-18', 'c', 'approved', NULL, NULL, 1, '2024-07-04 11:19:42', '2024-07-04 13:19:20'),
(6, 2, '2024-07-04', 'Medical Leave', '2024-07-05', '2024-07-06', 'One last time', 'approved', NULL, NULL, 1, '2024-07-04 11:27:23', '2024-07-04 13:27:38'),
(7, 5, '2024-07-04', 'Medical Leave', '2024-07-22', '2024-07-24', 'd', 'rejected', NULL, NULL, 4, '2024-07-04 13:30:37', '2024-07-04 14:02:50'),
(8, 5, '2024-07-04', 'Casual Leave', '2024-07-06', '2024-07-15', 'dwqe', 'approved', NULL, NULL, 4, '2024-07-04 13:31:59', '2024-07-04 14:03:14'),
(9, 2, '2024-07-04', 'Medical Leave', '2024-07-08', '2024-07-10', 'd', 'rejected', NULL, NULL, 1, '2024-07-04 14:07:12', '2024-07-04 14:15:09'),
(10, 2, '2024-07-04', 'Medical Leave', '2024-07-17', '2024-07-20', 'ds', 'rejected', NULL, NULL, 1, '2024-07-04 14:16:55', '2024-07-04 14:21:55'),
(11, 5, '2024-07-04', 'Medical Leave', '2024-07-19', '2024-07-20', 'ds', 'approved', NULL, NULL, 4, '2024-07-04 14:23:18', '2024-07-04 14:25:05'),
(12, 2, '2024-07-05', 'Medical Leave', '2024-07-16', '2024-07-20', 'Sick', 'rejected', NULL, NULL, 1, '2024-07-05 10:21:27', '2024-07-05 10:24:36'),
(13, 6, '2024-07-05', 'Medical Leave', '2024-07-31', '2024-08-01', 'ddw', 'pending', NULL, NULL, 5, '2024-07-05 10:27:31', '2024-07-05 10:27:31');

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
(4, '0001_01_01_000000_create_users_table', 1),
(17, '0001_01_01_000001_create_cache_table', 2),
(18, '0001_01_01_000002_create_jobs_table', 2),
(19, '2024_07_02_115913_create_departments_table', 2),
(20, '2024_07_02_115914_create_designations_table', 2),
(21, '2024_07_02_190259_create_employees_table', 2),
(24, '2024_07_02_190822_create_annual_leaves_table', 3),
(25, '2024_07_02_193330_create_users_table', 4),
(26, '2024_07_02_193851_create_leave_requests_table', 5);

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
('apQOtHDCWSZKpDzMSZzaq60DemkhCr73TWm5O6JZ', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWHhrQ2pXc0FsOHJ2NjZzMmF2U3BUSENvRmhoUHBWeUxsWm0wZFVRMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sZWF2ZS1yZXF1ZXN0cyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1720195079),
('NQmoyCLDNhXQrrBrU9K1yOLFplEek4sqTUzZWCX9', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWGhXbnM4QmR2Y2hjaExBbG1wZ3pYc0NrcXJIVDdPUXZWY3Nwd0syTSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kZXNpZ25hdGlvbnMvbGlzdCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1720125696),
('qCkYmyhdBrSrtOXSJDcbXpbVlf1dJgqVvK7LgUzl', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVFpyNGpjQ1Z4VExRNHhMWTRYWDA3RmpJNjZoallyTjZwbzJ1Q2FJbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1720206772);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `User_name` varchar(45) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Privilage_status` varchar(45) NOT NULL,
  `Active_Status` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `employee_id`, `User_name`, `Password`, `Privilage_status`, `Active_Status`, `created_at`, `updated_at`) VALUES
(1, 2, 'ays', '$2y$12$WQUldRTKC7Bdil2NFrE8.OzwOaQHfb30JFew5nA4vyS0cHQCBjj/W', 'employee', 'active', '2024-07-03 23:39:31', '2024-07-03 23:39:31'),
(2, 3, 'zam', '$2y$12$7vrg2/jBGDqPyH2cPx2QG.rKBRhYpfd8xA7JqwzTBl/YtUxAAQCu6', 'admin', 'active', '2024-07-04 02:12:05', '2024-07-04 02:12:05'),
(3, 4, 'ahm', '$2y$12$Cqq.EdWdVF9GuotLIXA1meXbNNBGLsTrJNBl8ApR2uvJgZipUV1SW', 'admin', 'active', '2024-07-04 11:34:41', '2024-07-04 11:34:41'),
(4, 5, 'sir', '$2y$12$RsMvpnPKLHaj7h7ZHiye1ugTjRwr6BqLpy8cUwau1MwiyK3cGVlYK', 'employee', 'active', '2024-07-04 11:38:55', '2024-07-04 11:38:55'),
(5, 6, 'ajmal', '$2y$12$W0znNNKUwOq7ap1lICsfGegkvL8FzTwttHHI.L5eHmYr5czmOpTKG', 'employee', 'active', '2024-07-05 10:24:15', '2024-07-05 10:24:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annual_leaves`
--
ALTER TABLE `annual_leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `annual_leaves_employee_idemployee_foreign` (`employee_id`);

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
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_department_id_foreign` (`department_id`),
  ADD KEY `employees_designation_id_foreign` (`designation_id`);

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
-- Indexes for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leave_requests_employee_id_foreign` (`employee_id`),
  ADD KEY `leave_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_employee_id_foreign` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annual_leaves`
--
ALTER TABLE `annual_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `annual_leaves`
--
ALTER TABLE `annual_leaves`
  ADD CONSTRAINT `annual_leaves_employee_idemployee_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD CONSTRAINT `leave_requests_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leave_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
