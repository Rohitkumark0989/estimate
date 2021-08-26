-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2021 at 02:18 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estimate_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `questions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `interview_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interview_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excel_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `questions`, `answers`, `user_name`, `user_id`, `interview_date`, `interview_time`, `excel_file`, `created_at`, `updated_at`) VALUES
(1, 'Are you Student?', 'Yes I am student', 'rohitm', 48, '08/26/2021', '7:00 PM', 'rohitm_08-19-2021-02-00-58.xlsx', '2021-08-19 09:00:58', '2021-08-19 09:00:58'),
(2, 'Your country name', 'Pakistan', 'rohitm', 48, '08/26/2021', '7:00 PM', 'rohitm_08-19-2021-02-00-58.xlsx', '2021-08-19 09:00:58', '2021-08-19 09:00:58'),
(3, 'What is your name?', 'Rohit kumar', 'rohitm', 48, '08/26/2021', '7:00 PM', 'rohitm_08-19-2021-02-00-58.xlsx', '2021-08-19 09:00:58', '2021-08-19 09:00:58'),
(4, 'Are you Student?', 'No I am not', 'rohitm', 48, '08/19/2021', '5:48 PM', 'rohitm_08-20-2021-12-48-29.xlsx', '2021-08-20 07:48:31', '2021-08-20 07:48:31'),
(5, 'Your country name', 'Germany', 'rohitm', 48, '08/19/2021', '5:48 PM', 'rohitm_08-20-2021-12-48-29.xlsx', '2021-08-20 07:48:31', '2021-08-20 07:48:31'),
(6, 'What is your name?', 'John', 'rohitm', 48, '08/19/2021', '5:48 PM', 'rohitm_08-20-2021-12-48-29.xlsx', '2021-08-20 07:48:31', '2021-08-20 07:48:31');

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
(4, '2021_08_06_185947_laratrust_setup_tables', 2),
(5, '2021_08_06_205336_create_users_table', 3),
(6, '2021_08_07_154947_create_users_table', 4),
(7, '2021_08_11_172641_create_questions_table', 5),
(8, '2021_08_11_174132_create_questions_table', 6),
(9, '2021_08_12_160512_create_answers_table', 7),
(10, '2021_08_12_160946_create_answers_table', 8),
(11, '2021_08_12_161128_create_answers_table', 9),
(12, '2021_08_12_161557_create_answers_table', 10),
(13, '2021_08_15_095239_create_answers_table', 11),
(14, '2021_08_15_095542_create_answers_table', 12),
(20, '2016_06_01_000001_create_oauth_auth_codes_table', 13),
(21, '2016_06_01_000002_create_oauth_access_tokens_table', 13),
(22, '2016_06_01_000003_create_oauth_refresh_tokens_table', 13),
(23, '2016_06_01_000004_create_oauth_clients_table', 13),
(24, '2016_06_01_000005_create_oauth_personal_access_clients_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Estimate Personal Access Client', '1isr3XXYsbQRAj1BSzo50PS1ZLtMLo6VM9RpllWZ', NULL, 'http://localhost', 1, 0, 0, '2021-08-19 08:17:47', '2021-08-19 08:17:47'),
(2, NULL, 'Estimate Password Grant Client', '9CyiSQGvy7n5etf37D0d0aLHP3JnECFhaA2YZM20', 'users', 'http://localhost', 0, 1, 0, '2021-08-19 08:17:47', '2021-08-19 08:17:47'),
(3, NULL, 'Estimate Personal Access Client', 'blLqZ9iJcyCv9Pcfp7X8gtVjLhNP3e64VLnJunf0', NULL, 'http://localhost', 1, 0, 0, '2021-08-19 09:16:53', '2021-08-19 09:16:53'),
(4, NULL, 'Estimate Password Grant Client', 'mftqsniM5BS0pYfYRI7XdwSMkB9ym3gOp0MEihDq', 'users', 'http://localhost', 0, 1, 0, '2021-08-19 09:16:53', '2021-08-19 09:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-08-19 08:17:47', '2021-08-19 08:17:47'),
(2, 3, '2021-08-19 09:16:53', '2021-08-19 09:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
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

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('aaa@gmail.com', '$2y$10$5qmpJ/QrTq2WObsyvh3yAurD4/iKHtZZCcwCp47ShJop4YtymLXIW', '2021-08-06 15:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2021-08-06 14:17:03', '2021-08-06 14:17:03'),
(2, 'users-read', 'Read Users', 'Read Users', '2021-08-06 14:17:03', '2021-08-06 14:17:03'),
(3, 'users-update', 'Update Users', 'Update Users', '2021-08-06 14:17:03', '2021-08-06 14:17:03'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2021-08-06 14:17:03', '2021-08-06 14:17:03'),
(5, 'payments-create', 'Create Payments', 'Create Payments', '2021-08-06 14:17:03', '2021-08-06 14:17:03'),
(6, 'payments-read', 'Read Payments', 'Read Payments', '2021-08-06 14:17:03', '2021-08-06 14:17:03'),
(7, 'payments-update', 'Update Payments', 'Update Payments', '2021-08-06 14:17:03', '2021-08-06 14:17:03'),
(8, 'payments-delete', 'Delete Payments', 'Delete Payments', '2021-08-06 14:17:03', '2021-08-06 14:17:03'),
(9, 'profile-read', 'Read Profile', 'Read Profile', '2021-08-06 14:17:03', '2021-08-06 14:17:03'),
(10, 'profile-update', 'Update Profile', 'Update Profile', '2021-08-06 14:17:03', '2021-08-06 14:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(10, 1),
(10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `questions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `questions`, `created_at`, `updated_at`) VALUES
(1, 'What is your name?', '2021-08-11 17:44:06', '2021-08-19 08:07:22'),
(2, 'Your country name', '2021-08-11 17:44:13', '2021-08-19 08:07:50'),
(7, 'Are you Student?', '2021-08-12 07:50:57', '2021-08-12 09:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', '2021-08-06 14:17:03', '2021-08-06 14:17:03'),
(2, 'user', 'User', 'User', '2021-08-06 14:17:03', '2021-08-06 14:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(2, 2, 'App\\Models\\User'),
(2, 4, 'App\\Models\\User'),
(2, 5, 'App\\Models\\User'),
(2, 6, 'App\\Models\\User'),
(2, 7, 'App\\Models\\User'),
(2, 8, 'App\\Models\\User'),
(2, 9, 'App\\Models\\User'),
(2, 10, 'App\\Models\\User'),
(2, 11, 'App\\Models\\User'),
(2, 12, 'App\\Models\\User'),
(2, 13, 'App\\Models\\User'),
(2, 14, 'App\\Models\\User'),
(2, 15, 'App\\Models\\User'),
(2, 16, 'App\\Models\\User'),
(2, 17, 'App\\Models\\User'),
(2, 18, 'App\\Models\\User'),
(2, 19, 'App\\Models\\User'),
(2, 20, 'App\\Models\\User'),
(2, 21, 'App\\Models\\User'),
(2, 22, 'App\\Models\\User'),
(2, 23, 'App\\Models\\User'),
(2, 39, 'App\\Models\\User'),
(2, 40, 'App\\Models\\User'),
(2, 41, 'App\\Models\\User'),
(2, 42, 'App\\Models\\User'),
(2, 43, 'App\\Models\\User'),
(2, 44, 'App\\Models\\User'),
(2, 45, 'App\\Models\\User'),
(2, 46, 'App\\Models\\User'),
(2, 47, 'App\\Models\\User'),
(2, 48, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `approved`, `password`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'aaa', 'aaa@gmail.com', NULL, 0, '$2y$10$CSG8QBh3QQutmowzIzrZJ.bvnOGKgJUiWLe1/4fmu7d4HRvAUnmIy', '334555', NULL, '2021-08-07 10:54:28', '2021-08-07 10:54:28'),
(2, 'bb', 'rohit.k@allshorestaffing.com', NULL, 1, 'OsA8if1GY3', '838484', NULL, '2021-08-07 10:55:20', '2021-08-11 03:35:26'),
(21, 'dd', 'dd@gmail.com', NULL, 1, '$2y$10$yfCDQXNJHqfDvsMIniNMBeuVptqNTUfhZ/gDg7iwXZ5szbfcj9WR6', '4234', NULL, '2021-08-08 03:50:14', '2021-08-10 15:19:12'),
(22, 'asf', 'sdfsd@g.com', NULL, 1, '$2y$10$KzGT5Evv5MmQc2z6c8.QpuA59eT.AMHnBmVXi36KAEhxpWEUNKHIu', '34234', NULL, '2021-08-08 03:59:17', '2021-08-10 10:13:23'),
(23, 'ali', 'ali@gmail.com', NULL, 0, '$2y$10$3VZml6USpB5KbySjh2WU9ef4o4AC33.6t.O27pE0E1Xr/hzd52kOW', '324234', NULL, '2021-08-08 03:59:28', '2021-08-08 03:59:28'),
(29, 'rohitk', 'rohitk@gmail.com', NULL, 0, '$2y$10$3VZml6USpB5KbySjh2WU9ef4o4AC33.6t.O27pE0E1Xr/hzd52kOW', '123456', NULL, '2021-08-10 10:43:15', '2021-08-10 10:43:15'),
(43, 'bbb', 'bbb@gmail.com', NULL, 0, '$2y$10$maX7kNHFfTCSga17N8wmdOcZt.uD6PX/HKVja.W4a.wW4Q.sE2tJ6', '3424234', NULL, '2021-08-12 12:04:21', '2021-08-12 12:04:21'),
(44, 'ravi', 'rohitk0989@gmail.com', NULL, 1, '$2y$10$cpiN40rWGgY4d4M7YTHh9uvBkdRn.TsBhjelY/sOa3JnP5rj5O3XG', '32322', NULL, '2021-08-12 13:46:18', '2021-08-16 11:43:41'),
(46, 'dd', 'ddmalhi79@gmail.com', NULL, 1, '$2y$10$EVrLzuNbWrDsK2vLLI9KI.8rhEVzITO0ya3jBXYg6RDpYJO0pT2aO', 'sdfdsfsd', NULL, '2021-08-12 13:51:05', '2021-08-12 13:54:39'),
(47, 'roohtkk', 'rohit.kumark0989@gmail.com', NULL, 0, '$2y$10$E0luF0VUFtfWcZ9SdfG/0.oGTOml4o6wukejGb3oHHgLLx7ZPnq0K', '3424234', NULL, '2021-08-12 13:53:45', '2021-08-12 13:59:09'),
(48, 'rohitm', 'rohatmalhi@gmail.com', NULL, 1, '$2y$10$3VZml6USpB5KbySjh2WU9ef4o4AC33.6t.O27pE0E1Xr/hzd52kOW', '123455', NULL, '2021-08-19 08:27:58', '2021-08-19 08:28:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
