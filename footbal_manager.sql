-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.1.1.0
-- Generation Time: Jan 28, 2024 at 04:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `footbal_manager`
--

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
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_date` datetime NOT NULL,
  `home_team_id` bigint(20) UNSIGNED NOT NULL,
  `away_team_id` bigint(20) UNSIGNED NOT NULL,
  `home_team_score` int(11) NOT NULL DEFAULT 0,
  `away_team_score` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `match_date`, `home_team_id`, `away_team_id`, `home_team_score`, `away_team_score`, `created_at`, `updated_at`) VALUES
(2, '2024-01-28 03:19:32', 1, 8, 0, 0, NULL, NULL),
(12, '2024-01-28 03:20:09', 11, 9, 2, 0, NULL, NULL),
(13, '2024-01-28 03:20:09', 11, 9, 2, 0, NULL, NULL),
(14, '2024-01-28 03:20:26', 6, 10, 3, 0, NULL, NULL),
(15, '2024-01-28 03:20:26', 6, 10, 3, 0, NULL, NULL),
(16, '2024-01-28 03:20:39', 5, 12, 2, 2, NULL, NULL),
(17, '2024-01-28 03:20:39', 5, 12, 2, 2, NULL, NULL),
(19, '2023-01-28 03:33:32', 11, 9, 2, 2, NULL, NULL),
(20, '2023-01-28 03:33:32', 11, 9, 2, 2, NULL, NULL),
(21, '2024-03-10 00:00:00', 6, 13, 0, 0, '2024-01-28 09:34:57', '2024-01-28 10:46:18'),
(22, '2024-01-29 00:00:00', 5, 8, 0, 0, '2024-01-28 11:07:21', '2024-01-28 11:07:21'),
(23, '2024-01-29 00:00:00', 12, 11, 0, 0, '2024-01-28 11:07:53', '2024-01-28 11:07:53'),
(24, '2024-01-29 00:00:00', 6, 5, 0, 0, '2024-01-28 11:55:24', '2024-01-28 11:55:24'),
(25, '2024-01-28 00:00:00', 5, 9, 0, 0, '2024-01-28 12:07:31', '2024-01-28 12:07:31');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_27_214548_create_teams_table', 2),
(6, '2024_01_27_214622_create_players_table', 3),
(7, '2024_01_27_214803_create_matches_table', 4),
(8, '2024_01_27_215026_create_player_match_table', 5);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `date_of_birth` year(4) DEFAULT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `first_name`, `last_name`, `date_of_birth`, `team_id`, `created_at`, `updated_at`) VALUES
(2, 'John ', 'Doe', '1995', 1, '2024-01-17 22:22:09', '2024-01-17 22:20:40'),
(6, 'Roberto', 'Junior', '1995', 5, '2024-01-10 22:20:40', '2024-01-17 22:20:40'),
(15, 'Emilija', 'Stojanoska', '1993', 1, '2024-01-28 00:37:35', '2024-01-28 00:37:35'),
(16, 'Sasho', 'Gjorgjiev', '1995', 12, '2024-01-28 01:29:52', '2024-01-28 01:29:52'),
(17, 'Stefam', 'Stojanoski', '2000', 11, '2024-01-28 01:30:18', '2024-01-28 01:30:18'),
(18, 'Milan', 'Milanovski', '1998', 10, '2024-01-28 01:30:34', '2024-01-28 01:30:34'),
(19, 'Simeon', 'Gjorgjiev', '1997', 9, '2024-01-28 01:30:46', '2024-01-28 01:30:46'),
(20, 'Vedran', 'Mesovski', '1992', 8, '2024-01-28 01:31:10', '2024-01-28 01:31:10'),
(21, 'Johnny', 'Bravo', '1993', 6, '2024-01-28 01:31:24', '2024-01-28 01:31:24'),
(22, 'Charlie', 'Sheen', '1991', 5, '2024-01-28 01:31:38', '2024-01-28 01:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `player_match`
--

CREATE TABLE `player_match` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `player_match`
--

INSERT INTO `player_match` (`id`, `player_id`, `match_id`, `created_at`, `updated_at`) VALUES
(7, 22, 2, NULL, NULL),
(8, 22, 2, NULL, NULL),
(10, 2, 14, NULL, NULL),
(11, 2, 14, NULL, NULL),
(12, 18, 14, NULL, NULL),
(13, 18, 14, NULL, NULL),
(14, 6, 20, NULL, NULL),
(15, 6, 20, NULL, NULL),
(16, 17, 20, NULL, NULL),
(17, 17, 20, NULL, NULL),
(18, 20, 17, NULL, NULL),
(19, 20, 17, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `year_of_foundation` year(4) NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `year_of_foundation`, `created_at`, `updated_at`) VALUES
(1, 'Bayer Munich', '1914', '2024-01-10 22:20:40', '2024-01-17 22:20:40'),
(5, 'Vardar', '1945', '2024-01-27 23:24:40', '2024-01-27 23:24:40'),
(6, 'Olimpiakos', '1928', '2024-01-27 23:24:56', '2024-01-27 23:24:56'),
(8, 'Lazio', '1952', '2024-01-28 01:15:50', '2024-01-28 01:15:50'),
(9, 'Milan', '1988', '2024-01-28 01:15:59', '2024-01-28 01:15:59'),
(10, 'PSG', '1998', '2024-01-28 01:16:09', '2024-01-28 01:16:09'),
(11, 'Lyon', '1995', '2024-01-28 01:16:18', '2024-01-28 01:16:18'),
(12, 'Napoli', '1999', '2024-01-28 01:16:28', '2024-01-28 01:16:28'),
(13, 'Rabotnicki Skopje', '1992', '2024-01-28 09:35:19', '2024-01-28 10:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'admin@admin.com', NULL, '$2y$12$SS45s.dDhkluvJ7z/wP4hu3g4RrHH/6DORH9peW1d0ty9DoDYSlcG', 1, NULL, '2024-01-27 21:02:48', '2024-01-27 21:02:48'),
(4, 'Simo', 'simo@mail.com', NULL, '$2y$12$T32RREhlTw725VhxGo8MNemG/qAOTG3sUat3MoB9mTQsUEBH4Xqly', 0, NULL, '2024-01-27 21:04:55', '2024-01-27 21:04:55'),
(5, 'teodora', 'teodora@mail.com', NULL, '$2y$12$Wbx4CeZUntofTfChG2cawe5tqIf64G635ryAOshPS.OcFDVPo/iUq', 0, NULL, '2024-01-27 22:00:04', '2024-01-27 22:00:04'),
(6, 'Guest', 'guest@guest.com', NULL, '$2y$12$ecgNKsSBW38TQIFop1wSgOM/cdK1/A27c7l/GZTE.e7rug/moQN2O', 0, NULL, '2024-01-28 14:03:30', '2024-01-28 14:03:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matches_away_team_id_foreign` (`away_team_id`),
  ADD KEY `matches_home_team_id_foreign` (`home_team_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `players_team_id_foreign` (`team_id`) USING BTREE;

--
-- Indexes for table `player_match`
--
ALTER TABLE `player_match`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_match_player_id_foreign` (`player_id`),
  ADD KEY `player_match_match_id_foreign` (`match_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `player_match`
--
ALTER TABLE `player_match`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_away_team_id_foreign` FOREIGN KEY (`away_team_id`) REFERENCES `teams` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `matches_home_team_id_foreign` FOREIGN KEY (`home_team_id`) REFERENCES `teams` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `player_match`
--
ALTER TABLE `player_match`
  ADD CONSTRAINT `player_match_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`),
  ADD CONSTRAINT `player_match_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
