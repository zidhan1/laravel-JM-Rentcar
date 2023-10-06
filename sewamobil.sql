-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2023 at 03:56 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewamobil`
--

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
(5, '2022_05_22_081852_buat_tabel_mobil', 1),
(6, '2022_05_22_153448_add_role_as_to_users_table', 1),
(7, '2022_05_27_155000_buat_tabel_transaksi', 1),
(8, '2022_05_28_041131_add_bukti_to_transaksi_table', 1),
(9, '2022_06_11_010405_buat_tabel_ulasan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/img/',
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id`, `nama`, `merek`, `tahun`, `harga`, `gambar`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Mercedes-AMG GT', 'Mercedes-Benz', '1901', 320000, 'Mercedes-Benz.jpeg', 'Mercedes-AMG GT Dengan kap mesin besar yang memanjang serta tenaga kuda sebesar 577', 'Ready', '2022-06-09 23:49:33', '2022-06-09 23:49:33'),
(6, 'Toyota New Vellfire', 'Toyota', '2001', 203000, 'Toyota.jpg', 'lebih fokus kepada sisi sporty, modern, dan high-tech, terlihat dari eksteriornya yang memiliki dengan desain grille dan bumper yang elegan', 'Ready', '2022-06-10 00:06:47', '2022-06-10 00:06:47'),
(7, 'Jaguar F-PACE', 'Jaguar', '2003', 320000, 'jaguar.jpeg', 'Jaguar dikenal dengan nama Swallow Sidecar Company dan menghasilkan motorcycle sidecar, serta bodi mobil berpenumpang.', 'Ready', '2022-06-10 00:08:47', '2022-06-10 00:08:47'),
(9, 'FERARI gta', 'FERARI', '2004', 340000, 'Ferrari.jpeg', 'BERTANAGA 24000 KUDA', 'Ready', '2022-06-10 00:56:16', '2022-06-10 00:56:16');

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
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_mobil` bigint(20) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `amount` float(25,0) NOT NULL,
  `jaminan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snap_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `id_mobil`, `tgl_sewa`, `tgl_kembali`, `amount`, `jaminan`, `status`, `snap_token`, `invoice`, `created_at`, `updated_at`) VALUES
(16, 6, 7, '2022-11-25', '2022-11-26', 320000, 'KTP', 'settlement', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/85513f0b-99b8-40c4-ace7-4d305b6a7e06/pdf', '2022-11-24 23:58:39', '2022-11-24 23:58:39'),
(17, 6, 4, '2022-11-28', '2022-11-30', 960000, 'KTP', 'pending', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/c2ae1241-5998-4daa-8e16-fdf563a5ec18/pdf', '2022-11-28 04:36:53', '2022-11-28 04:36:53'),
(18, 6, 9, '2022-11-28', '2022-11-29', 340000, 'KTP', 'settlement', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/903b18ca-4369-4ddf-a280-16ebb21686ab/pdf', '2022-11-28 04:42:23', '2022-11-28 04:42:23'),
(19, 6, 9, '2022-12-02', '2022-12-04', 680000, 'KTP', 'settlement', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/c286ff36-64d1-433d-8b97-a442a5b456a8/pdf', '2022-12-01 20:04:59', '2022-12-01 20:04:59'),
(20, 6, 7, '2022-12-02', '2022-12-03', 640000, 'KTP', 'settlement', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/080ed0c0-ce1b-44af-9723-baf77e60c474/pdf', '2022-12-01 20:27:04', '2022-12-01 20:27:04'),
(21, 6, 6, '2022-12-05', '2022-12-06', 406000, 'KTP', 'settlement', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/445537bb-3ded-46d7-906f-4f900c54aec5/pdf', '2022-12-04 23:43:41', '2022-12-04 23:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_mobil` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ulasan` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id`, `id_user`, `id_mobil`, `nama`, `ulasan`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '', 'bagus', '2022-06-10 21:40:03', '2022-06-10 21:40:03'),
(13, 2, 6, 'robby', 'mobilnya keren banget', '2022-06-10 22:22:25', '2022-06-10 22:22:25'),
(14, 2, 6, 'KIiller', 'Kursinya empuk enak untuk keluarga', '2022-06-10 22:23:07', '2022-06-10 22:23:07'),
(15, 2, 6, 'superman', 'kursi empuk cocok untuk ehem ehem', '2022-06-11 09:21:05', '2022-06-11 09:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/img/2031730012-GTAAZn.jpeg',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`) VALUES
(3, 'duvan', 'duvan@gmail.com', 'img/1654843036.png', NULL, '$2y$10$Czsh0az9pTCtIE7lOZRxyujPb4JiD3x8w5JNuhi1CwmvPauzloccC', NULL, '2022-06-09 23:37:16', '2022-06-09 23:37:16', 1),
(6, 'zidanrobby', 'zidanrobby@gmail.com', 'img/1668332799.jpeg', NULL, '$2y$10$CLGIpblnWJIa9BiFlSF5QeEfaZ3aGXjah6Ri63bzbfgBn8YRD7l5y', NULL, '2022-11-13 02:46:39', '2022-11-13 02:46:39', 0),
(7, 'Fikri Wahyu', 'fikri@gmail.com', 'img/1669636818.jpeg', NULL, '$2y$10$rhyPKyy.Qa8Y4ceOQP/2rO/SzkXMco.BYJtn00Yc1oihfUl5UqFlO', NULL, '2022-11-28 05:00:18', '2022-11-28 05:00:18', 1);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
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
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
