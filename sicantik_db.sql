-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2024 at 08:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sicantik_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `answer` text NOT NULL,
  `pos` int(5) NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `pos`, `question_id`, `created_at`, `updated_at`) VALUES
(7, '2', 0, 2, '2024-06-07 03:44:56', '2024-06-07 03:44:56'),
(8, '3', 1, 2, '2024-06-07 03:44:56', '2024-06-07 03:44:56'),
(9, '4', 2, 2, '2024-06-07 03:44:56', '2024-06-07 03:44:56'),
(10, '5', 3, 2, '2024-06-07 03:44:56', '2024-06-07 03:44:56'),
(11, 'Plastik adalah plastik', 0, 1, '2024-06-07 04:11:31', '2024-06-07 04:11:31'),
(12, 'Plastik adalah tumbuhan', 1, 1, '2024-06-07 04:11:31', '2024-06-07 04:11:31'),
(13, 'Plastik adalah makhluk hidup', 2, 1, '2024-06-07 04:11:31', '2024-06-07 04:11:31'),
(14, 'Plastik adalah benda hidup', 3, 1, '2024-06-07 04:11:31', '2024-06-07 04:11:31'),
(15, 'Plastik A, Plastik B, Plastik C', 0, 3, '2024-06-07 20:36:18', '2024-06-07 20:36:18'),
(16, 'Plastik D, Plastik C, Plastik F', 1, 3, '2024-06-07 20:36:18', '2024-06-07 20:36:18'),
(17, 'Plastik C, Plastik A, Plastik F', 2, 3, '2024-06-07 20:36:18', '2024-06-07 20:36:18'),
(18, 'Plastik A, Plastik D, Plastik F', 3, 3, '2024-06-07 20:36:18', '2024-06-07 20:36:18'),
(19, '6', 0, 4, '2024-06-07 20:41:42', '2024-06-07 20:41:42'),
(20, '4', 1, 4, '2024-06-07 20:41:42', '2024-06-07 20:41:42'),
(21, '8', 2, 4, '2024-06-07 20:41:42', '2024-06-07 20:41:42'),
(22, '1', 3, 4, '2024-06-07 20:41:42', '2024-06-07 20:41:42'),
(23, 'ls -l|grep “^d”', 0, 5, '2024-06-07 20:42:22', '2024-06-07 20:42:22'),
(24, 'ls -ld', 1, 5, '2024-06-07 20:42:22', '2024-06-07 20:42:22'),
(25, 'ls --dir', 2, 5, '2024-06-07 20:42:22', '2024-06-07 20:42:22'),
(26, 'ls -d', 3, 5, '2024-06-07 20:42:22', '2024-06-07 20:42:22'),
(27, '// commented code to end of line', 0, 6, '2024-06-07 20:43:09', '2024-06-07 20:43:09'),
(28, '/* commented code here */', 1, 6, '2024-06-07 20:43:09', '2024-06-07 20:43:09'),
(29, '# commented code to end of line', 2, 6, '2024-06-07 20:43:09', '2024-06-07 20:43:09'),
(30, 'all of the above', 3, 6, '2024-06-07 20:43:09', '2024-06-07 20:43:09'),
(31, 'item', 0, 7, '2024-06-07 20:43:56', '2024-06-07 20:43:56'),
(32, 'itemgroup', 1, 7, '2024-06-07 20:43:56', '2024-06-07 20:43:56'),
(33, 'itemcheck', 2, 7, '2024-06-07 20:43:56', '2024-06-07 20:43:56'),
(34, 'itemprop', 3, 7, '2024-06-07 20:43:56', '2024-06-07 20:43:56'),
(35, '< Body Text = Red>', 0, 8, '2024-06-07 20:44:32', '2024-06-07 20:44:32'),
(36, '< Body Colour = Red>', 1, 8, '2024-06-07 20:44:32', '2024-06-07 20:44:32'),
(37, '< Body Bgcolour = Red>', 2, 8, '2024-06-07 20:44:32', '2024-06-07 20:44:32'),
(38, 'None Of These', 3, 8, '2024-06-07 20:44:32', '2024-06-07 20:44:32'),
(39, 'docker run -it -d <image_name>', 0, 9, '2024-06-07 20:45:21', '2024-06-07 20:45:21'),
(40, 'docker --run -it -d <image_name>', 1, 9, '2024-06-07 20:45:21', '2024-06-07 20:45:21'),
(41, 'docker run it d <image_name>', 2, 9, '2024-06-07 20:45:21', '2024-06-07 20:45:21'),
(42, 'none of these above', 3, 9, '2024-06-07 20:45:21', '2024-06-07 20:45:21'),
(43, 'php artisan create:model ModelName', 0, 10, '2024-06-07 20:45:58', '2024-06-07 20:45:58'),
(44, 'php artisan model:make ModelName', 1, 10, '2024-06-07 20:45:58', '2024-06-07 20:45:58'),
(45, 'php artisan model create ModelName', 2, 10, '2024-06-07 20:45:58', '2024-06-07 20:45:58'),
(46, 'php artisan make:model ModelName', 3, 10, '2024-06-07 20:45:58', '2024-06-07 20:45:58');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_02_045954_create_courses_table', 1),
(6, '2024_03_02_050228_create_questions_table', 1),
(7, '2024_03_02_055700_create_answers_table', 1),
(8, '2024_03_02_060040_create_read_course_log_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `module_content` varchar(255) NOT NULL,
  `barcode_link` varchar(255) DEFAULT NULL,
  `qr_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `title`, `thumbnail`, `module_content`, `barcode_link`, `qr_link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(28, 'MEMAHAMI MASYARAKAT DAN PERSPEKTIFNYA', 'PVECBUs7uTRQVvDlaILZ.png', 'dfBX4S1SCkEjexwy91D2.pdf', NULL, '33', '2024-06-07 00:16:22', '2024-06-07 00:16:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'api-login', '1099110e4a00c437e9b43a2e02cc1727e5a560f8560f000bfd3d30b884b1aa2c', '[\"*\"]', NULL, '2024-05-31 06:53:27', '2024-05-31 06:53:27'),
(2, 'App\\Models\\User', 1, 'sicantik_admin@admin.com', '01cade64fa55c8f47e8126a9a34f7da26b4275e9c8311c2bc30466fcc1e14075', '[\"*\"]', '2024-05-31 06:55:42', '2024-05-31 06:53:55', '2024-05-31 06:55:42'),
(4, 'App\\Models\\User', 1, 'sicantik_admin@admin.com', 'c39903dc76680e9539551e656211120a65e742296f861eaab8df2dd67e8dee1b', '[\"*\"]', '2024-06-08 00:22:36', '2024-05-31 07:34:37', '2024-06-08 00:22:36'),
(5, 'App\\Models\\User', 4, 'johndoe@admin.com', '70196d119d1012fc35bd4a49bdde466f3ae71dcddd71000a9dbd9b515739d687', '[\"*\"]', NULL, '2024-05-31 08:50:39', '2024-05-31 08:50:39'),
(6, 'App\\Models\\User', 1, 'sicantik_admin@admin.com', 'c2a1c74aa1aa5d1a1c17c01c8cc848f4ab94ff80ad96cb5f6ced3adbc1a82b96', '[\"*\"]', NULL, '2024-05-31 09:21:50', '2024-05-31 09:21:50'),
(7, 'App\\Models\\User', 1, 'sicantik_admin@admin.com', '0cf7f876632f15762531bf614385f277f52c72d6b766b17cb769dc80ffd868ad', '[\"*\"]', NULL, '2024-05-31 09:32:10', '2024-05-31 09:32:10'),
(8, 'App\\Models\\User', 1, 'sicantik_admin@admin.com', 'e8ce61a8af10ea6abc54969b1959d4a0f04f9fa376119979eb0fd2d4f87839ab', '[\"*\"]', '2024-05-31 11:08:37', '2024-05-31 11:04:54', '2024-05-31 11:08:37'),
(9, 'App\\Models\\User', 1, 'sicantik_admin@admin.com', 'b06086c56ac2d4a764ebd0182fcbc86672b4ed34ab4662f7f5d349c9ba11e60d', '[\"*\"]', NULL, '2024-06-01 04:31:45', '2024-06-01 04:31:45'),
(10, 'App\\Models\\User', 1, 'sicantik_admin@admin.com', '51ff4df6588674dabda23717be45e19ac3a2ecf9119f813f54e0d3c4420171b2', '[\"*\"]', NULL, '2024-06-01 04:35:29', '2024-06-01 04:35:29'),
(11, 'App\\Models\\User', 1, 'sicantik_admin@admin.com', '37fe5fa122e37f199eb1377bb869c3e18607350f5f8b814dd1a86297c1bb6503', '[\"*\"]', NULL, '2024-06-01 04:38:41', '2024-06-01 04:38:41'),
(12, 'App\\Models\\User', 1, 'sicantik_admin@admin.com', 'f741a7d6be8d78b3a7cca502e7561ff449142759dbd28ac3d3a0ca08367f4a19', '[\"*\"]', NULL, '2024-06-01 04:40:00', '2024-06-01 04:40:00'),
(14, 'App\\Models\\User', 1, 'sicantik_admin@admin.com', '96406e5e2a5545869620ae0be6ee3763ef57459996b90da3ed4167a00f30729d', '[\"*\"]', '2024-06-08 01:28:20', '2024-06-01 04:42:33', '2024-06-08 01:28:20'),
(15, 'App\\Models\\User', 1, 'sicantik_admin@admin.com', '85286cb2912c1995f1dcb677d25dc6a725310c7adfb4347f7383f575f52123a3', '[\"*\"]', '2024-06-08 06:22:18', '2024-06-05 06:45:57', '2024-06-08 06:22:18'),
(16, 'App\\Models\\User', 1, 'sicantik_admin@admin.com', '7bd7f5fd7dd9c38d5050544abb93d38a5e4a8ad992f2857e896ad6869f414d08', '[\"*\"]', '2024-06-08 01:13:12', '2024-06-08 00:28:01', '2024-06-08 01:13:12'),
(19, 'App\\Models\\User', 1, 'sicantik_admin@admin.com', 'cb5c1923c2c58c36aee14aa8b0e8fe9e7b4361404dac5c40280834a2691e6de5', '[\"*\"]', '2024-06-15 08:28:07', '2024-06-08 01:34:40', '2024-06-15 08:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer_key` bigint(20) UNSIGNED DEFAULT NULL,
  `point` int(11) NOT NULL DEFAULT 20,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer_key`, `point`, `created_at`, `updated_at`) VALUES
(1, 'Apa itu Plastik?', 11, 20, '2024-06-07 01:02:14', '2024-06-08 01:37:25'),
(2, '1 + 1 = ?', 7, 20, '2024-06-07 01:15:25', '2024-06-07 06:01:10'),
(3, 'Jenis Jenis Plastik', 18, 20, '2024-06-07 05:42:58', '2024-06-07 20:41:23'),
(4, '2+2 = ?', 20, 20, '2024-06-07 20:15:16', '2024-06-07 20:41:45'),
(5, 'How can you list only the directories in your current directory using ls command?', 26, 20, '2024-06-07 20:32:07', '2024-06-07 20:42:30'),
(6, 'How can we add comments in PHP?', 27, 20, '2024-06-07 20:32:41', '2024-06-07 20:43:20'),
(7, 'Which of the following attribute is used to group elements?', 32, 20, '2024-06-07 20:32:55', '2024-06-07 20:44:00'),
(8, 'If you want to change the text color to red which of the following tags you\'ll use?', 37, 20, '2024-06-07 20:33:05', '2024-06-07 20:44:40'),
(9, 'How do you create a docker container from an image?', 39, 20, '2024-06-07 20:33:13', '2024-06-07 20:45:25'),
(10, 'Which artisan command would you use to create a new Laravel Model?', 46, 20, '2024-06-07 20:33:22', '2024-06-07 20:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `read_modules_log`
--

CREATE TABLE `read_modules_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `read_modules_log`
--

INSERT INTO `read_modules_log` (`id`, `user_id`, `module_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 28, 'User1telah membaca module id : 28', '2024-06-15 08:10:21', '2024-06-15 08:10:21'),
(2, 1, 28, 'User id: [1] telah membaca module id: [28]', '2024-06-15 08:14:13', '2024-06-15 08:14:13'),
(3, 1, 28, 'User id: [1] telah membaca module id: [28]', '2024-06-15 08:14:56', '2024-06-15 08:14:56'),
(4, 1, 28, 'User id: [1] telah membaca module id: [28]', '2024-06-15 08:28:07', '2024-06-15 08:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('0','1','2') NOT NULL DEFAULT '0',
  `pre_score` int(11) DEFAULT NULL,
  `post_score` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `level`, `pre_score`, `post_score`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin Admin', 'sicantik_admin@admin.com', '$2y$10$nzfAh.TPmVM6NKRSbEwveeqWbukMmKF2Mm51yY74ItxkubSiwWBre', '1', 40, 40, '2024-05-31 10:55:18', '2024-06-12 23:36:37', NULL),
(3, 'Alexander Joy', 'alexjoy99@admin.com', '$2y$10$HqKnuoR9R6CShG4CALhj.OkbVl4h0eMsMczL.hf1IR.A7bHtWYZOi', '0', NULL, NULL, '2024-05-31 08:07:26', '2024-05-31 08:33:39', NULL),
(17, 'Matt Shadow', 'matt@a7x.com', '$2y$10$JBr9eYcMklX5/ewIydaCT.vWsnTqZjqh/Vn5BzBz1Zfgo9z9So.VW', '0', NULL, NULL, '2024-05-31 10:28:11', '2024-05-31 10:46:56', NULL),
(22, 'Khrisna Yudha Pratama', '911piero@gmail.com', '$2y$10$D2FNMvX1OXwmMhVAnBdaEedumgCvCPbP9ANFSZKm3eavap.8LiUgy', '0', NULL, NULL, '2024-06-01 04:45:20', '2024-06-01 04:45:20', NULL);

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
-- Indexes for table `modules`
--
ALTER TABLE `modules`
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
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `read_modules_log`
--
ALTER TABLE `read_modules_log`
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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `read_modules_log`
--
ALTER TABLE `read_modules_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
