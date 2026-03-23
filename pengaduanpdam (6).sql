-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2026 at 05:02 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduanpdam`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspirasis`
--

CREATE TABLE `aspirasis` (
  `id_aspirasi` bigint UNSIGNED NOT NULL,
  `id_pelaporan` bigint UNSIGNED NOT NULL,
  `aspirasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_pengaduans`
--

CREATE TABLE `chat_pengaduans` (
  `id` bigint UNSIGNED NOT NULL,
  `pengaduan_id` bigint UNSIGNED NOT NULL,
  `pengirim` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dibaca` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_pengaduans`
--

INSERT INTO `chat_pengaduans` (`id`, `pengaduan_id`, `pengirim`, `pesan`, `dibaca`, `created_at`, `updated_at`) VALUES
(1, 16, 'admin', 'tunggu sebentar', 0, '2026-02-03 18:51:01', '2026-02-03 18:51:01'),
(2, 16, 'admin', 'tunggu sebentar', 0, '2026-02-03 18:51:11', '2026-02-03 18:51:11'),
(3, 16, 'admin', 'tunggu', 0, '2026-02-03 18:52:35', '2026-02-03 18:52:35'),
(4, 16, 'admin', 'selesai', 0, '2026-02-03 18:53:31', '2026-02-03 18:53:31'),
(5, 16, 'admin', 'tiwhd', 0, '2026-02-03 18:53:41', '2026-02-03 18:53:41'),
(6, 16, 'admin', 'sebentar', 0, '2026-02-03 19:07:55', '2026-02-03 19:07:55'),
(7, 16, 'admin', 'sebentar', 0, '2026-02-03 19:09:33', '2026-02-03 19:09:33'),
(8, 16, 'admin', 'rf', 0, '2026-02-03 20:38:00', '2026-02-03 20:38:00'),
(10, 21, 'admin', 'tunggu sebntar', 0, '2026-02-04 00:06:24', '2026-02-04 00:06:24'),
(11, 21, 'admin', 'tolong secepat nya', 0, '2026-02-04 19:08:23', '2026-02-04 19:08:23'),
(12, 23, 'admin', 'ini kenapa mampet', 0, '2026-02-04 21:19:24', '2026-02-04 21:19:24'),
(13, 21, 'user', 'perkiraan berapa jam', 1, '2026-02-04 23:27:01', '2026-02-05 00:25:01'),
(14, 21, 'user', 'perkiraan jam berapa selesai', 1, '2026-02-04 23:37:03', '2026-02-05 00:25:01'),
(15, 21, 'user', 'perkiraan jam berapa selesai', 1, '2026-02-04 23:37:10', '2026-02-05 00:25:01'),
(16, 21, 'user', 'wretwert', 1, '2026-02-04 23:37:55', '2026-02-05 00:25:01'),
(17, 21, 'user', 'dfedf', 1, '2026-02-04 23:40:18', '2026-02-05 00:25:01'),
(18, 21, 'user', 'dfedf', 1, '2026-02-04 23:42:37', '2026-02-05 00:25:01'),
(19, 21, 'user', 'EQWRE', 1, '2026-02-04 23:42:43', '2026-02-05 00:25:01'),
(20, 21, 'user', 'ewfe', 1, '2026-02-04 23:43:25', '2026-02-05 00:25:01'),
(21, 21, 'user', 'qedwe', 1, '2026-02-04 23:43:47', '2026-02-05 00:25:01'),
(22, 21, 'user', 'qedwe', 1, '2026-02-04 23:44:22', '2026-02-05 00:25:01'),
(23, 21, 'user', 'qedwe', 1, '2026-02-04 23:44:31', '2026-02-05 00:25:01'),
(24, 21, 'user', 'qedwe', 1, '2026-02-04 23:45:24', '2026-02-05 00:25:01'),
(25, 21, 'user', 'qedwe', 1, '2026-02-04 23:46:08', '2026-02-05 00:25:01'),
(26, 21, 'user', 'DWFS', 1, '2026-02-04 23:46:11', '2026-02-05 00:25:01'),
(27, 16, 'user', 'selesai barusan', 0, '2026-02-04 23:52:56', '2026-02-04 23:52:56'),
(28, 16, 'user', 'selesai barusan', 0, '2026-02-04 23:54:30', '2026-02-04 23:54:30'),
(29, 16, 'user', 'selesai barusan', 0, '2026-02-04 23:57:01', '2026-02-04 23:57:01'),
(30, 16, 'user', 'wsefd', 0, '2026-02-04 23:57:56', '2026-02-04 23:57:56'),
(31, 16, 'user', 'wsefd', 0, '2026-02-05 00:00:41', '2026-02-05 00:00:41'),
(32, 23, 'admin', 'tunggu', 0, '2026-02-05 00:18:00', '2026-02-05 00:18:00'),
(33, 23, 'admin', 'erger', 0, '2026-02-05 00:22:25', '2026-02-05 00:22:25'),
(34, 21, 'admin', 'PDAM-20260204-021', 0, '2026-02-05 00:23:09', '2026-02-05 00:23:09'),
(35, 21, 'user', '123234', 1, '2026-02-05 00:24:38', '2026-02-05 00:25:01'),
(36, 21, 'admin', 'oke', 0, '2026-02-05 00:25:01', '2026-02-05 00:25:01'),
(37, 21, 'user', '123234', 0, '2026-02-05 00:25:14', '2026-02-05 00:25:14'),
(38, 21, 'user', 'apa aja', 0, '2026-02-05 00:32:29', '2026-02-05 00:32:29'),
(39, 24, 'admin', 'tunggu sebentar', 0, '2026-02-05 20:22:31', '2026-02-05 20:22:31'),
(40, 24, 'user', 'oke siap', 1, '2026-02-05 20:23:01', '2026-02-05 20:23:45'),
(41, 24, 'admin', 'bentar lagi beres', 0, '2026-02-05 20:23:17', '2026-02-05 20:23:17'),
(42, 24, 'user', 'oke siap', 1, '2026-02-05 20:23:23', '2026-02-05 20:23:45'),
(43, 24, 'user', 'oke', 1, '2026-02-05 20:23:27', '2026-02-05 20:23:45'),
(44, 24, 'admin', 'selesai', 0, '2026-02-05 20:23:45', '2026-02-05 20:23:45'),
(46, 35, 'admin', 'tunggu sebentar', 0, '2026-02-07 00:44:51', '2026-02-07 00:44:51'),
(47, 35, 'user', 'oke', 0, '2026-02-07 00:45:15', '2026-02-07 00:45:15'),
(48, 14, 'user', 'masih lama ga??', 1, '2026-02-08 19:28:47', '2026-02-11 01:00:46'),
(49, 44, 'admin', 'tunggu sebentar', 0, '2026-02-09 19:58:56', '2026-02-09 19:58:56'),
(50, 44, 'admin', 'aduan selesai', 0, '2026-02-09 19:59:02', '2026-02-09 19:59:02'),
(51, 14, 'user', 'p aya magnum', 1, '2026-02-11 01:00:08', '2026-02-11 01:00:46'),
(52, 14, 'admin', 'aya', 0, '2026-02-11 01:00:46', '2026-02-11 01:00:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inputs`
--

CREATE TABLE `inputs` (
  `id` bigint UNSIGNED NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` bigint UNSIGNED DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Dikirim','Diproses','Selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Dikirim',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id_kategori` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_03_09_014845_create_kategoris_table', 1),
(5, '2023_03_09_015038_create_penggunas_table', 1),
(6, '2023_03_09_015241_create_inputs_table', 1),
(7, '2023_03_09_015309_create_aspirasis_table', 1),
(8, '2025_10_16_065454_create_pengaduans_table', 1),
(9, '2025_11_15_015655_create_pengaduan_trackings_table', 1),
(10, '2025_11_17_063240_add_nik_to_pengaduans_table', 2),
(11, '2025_11_17_063944_add_missing_fields_to_pengaduans_table', 2),
(12, '2026_01_08_020836_add_ket_to_pengaduans_table', 3),
(13, '2026_01_08_022539_update_status_enum_in_pengaduan_trackings_table', 4),
(14, '2026_01_15_015536_add_password_to_penggunas_table', 5),
(15, '2026_01_23_025402_add_feedback_to_pengaduan_trackings_table', 6),
(16, '2026_01_29_030635_add_lat_long_to_pengaduans_table', 7),
(17, '2026_01_29_032057_add_share_lokasi_to_pengaduans_table', 8),
(18, '2026_01_29_033105_add_nama_no_hp_to_pengaduans_table', 9),
(19, '2026_02_03_073837_create_chat_pengaduans_table', 10),
(20, '2026_02_04_014754_create_chat_pengaduans_table', 11),
(21, '2026_02_05_021000_add_dibaca_to_chat_pengaduans', 12),
(22, '2026_02_05_043856_fix_chat_pengaduans_pengirim', 13),
(23, '2019_12_14_000001_create_personal_access_tokens_table', 14),
(24, '2026_02_07_021831_add_is_active_to_penggunas', 15),
(25, '2026_02_07_021941_add_role_to_penggunas', 1),
(26, '2026_02_07_023437_add_petugas_id_to_pengaduans', 1),
(27, '2026_02_07_060050_add_petugas_id_to_pengaduan_trackings', 16);

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
-- Table structure for table `pengaduans`
--

CREATE TABLE `pengaduans` (
  `id` bigint UNSIGNED NOT NULL,
  `no_sa` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_lengkap` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` bigint UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('menunggu','proses','selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `tingkat_masalah` enum('kecil','sedang','besar') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi_daerah_cabang` enum('cabang1','cabang2','cabang3','cabang4','pusat_bhayangkara') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `share_lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `petugas_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaduans`
--

INSERT INTO `pengaduans` (`id`, `no_sa`, `nama`, `no_hp`, `alamat_lengkap`, `id_kategori`, `email`, `ket`, `foto`, `kode`, `status`, `tingkat_masalah`, `lokasi_daerah_cabang`, `created_at`, `updated_at`, `latitude`, `longitude`, `share_lokasi`, `petugas_id`) VALUES
(1, '', '', '', 'Jl. Contoh', NULL, 'Pompa rusak', 'Pompa tidak berfungsi', NULL, NULL, 'selesai', 'sedang', 'cabang1', '2026-01-15 02:37:21', '2026-01-29 19:08:19', NULL, NULL, NULL, NULL),
(2, '', '', '', 'jalan 123', NULL, 'jln12345', 'dfgdfg', NULL, 'PDAM-20260115-002', 'selesai', 'sedang', 'pusat_bhayangkara', '2026-01-14 21:02:41', '2026-01-29 19:08:21', NULL, NULL, NULL, NULL),
(3, '', '', '', 'jalan 123456', NULL, 'jln123', 'kebocoran', NULL, 'PDAM-20260119-003', 'selesai', 'besar', 'cabang4', '2026-01-18 19:09:46', '2026-01-29 19:08:16', NULL, NULL, NULL, NULL),
(4, '', '', '', 'jalan b1', NULL, 'depan jalan b1', 'bocor banjir', 'uploads/pengaduan/M6gMvRLUE2rzz7xLqkAnOQ3kYwrbURlS6pZo96mZ.png', 'PDAM-20260119-004', 'selesai', 'besar', 'cabang1', '2026-01-18 19:33:17', '2026-01-25 23:40:59', NULL, NULL, NULL, NULL),
(5, '', '', '', 'jalan 123456', NULL, 'depan jalan b2', 'banjir peralon', 'uploads/pengaduan/W9JmOz53mjRKCQzpG9i1w8qt9ZSBt3MqWn83oPAn.png', 'PDAM-20260119-005', 'selesai', 'besar', 'cabang4', '2026-01-18 19:47:33', '2026-01-25 23:40:48', NULL, NULL, NULL, NULL),
(6, '', '', '', 'jalan satudua', NULL, 'depan jalan', 'kebocoran', NULL, 'PDAM-20260123-006', 'selesai', 'besar', 'cabang1', '2026-01-22 19:04:26', '2026-01-25 23:40:47', NULL, NULL, NULL, NULL),
(7, '', '', '', 'jalan bhayangkara', NULL, 'depan gang', 'keboicoran sangat besar', 'uploads/pengaduan/yHbtUvFbtHY9pUvST08phohX09AE3kaYxDaOMwUN.jpg', 'PDAM-20260123-007', 'selesai', 'besar', 'pusat_bhayangkara', '2026-01-22 20:03:38', '2026-01-25 23:40:46', NULL, NULL, NULL, NULL),
(8, '', 'Yusuf M', '082120976556', 'jalan bhayangkara', NULL, 'ull4775@gmail.com', 'bocor', 'uploads/pengaduan/upcbj9gt8zLItBtPm7rPeqKrKRqz0ZL5Mjswy8wu.jpg', 'PDAM-20260129-008', 'selesai', 'besar', 'pusat_bhayangkara', '2026-01-28 21:00:54', '2026-01-29 19:08:13', NULL, NULL, NULL, NULL),
(9, '', 'Yusuf M', '08323232324', 'jalan bhayangkara', NULL, 'ull4775@gmail.com', 'kebocoran', 'uploads/pengaduan/tCHmzKgRhgEtIpk2w6rFEfdcEgtjvkuyNjmIyg86.jpg', 'PDAM-20260129-009', 'selesai', 'sedang', 'pusat_bhayangkara', '2026-01-28 21:28:09', '2026-01-29 18:55:38', NULL, NULL, NULL, NULL),
(10, '', 'maul', '089786765123', 'jalan bhayangkara', NULL, 'depan jalan', 'patah pipa', 'uploads/pengaduan/IFe9OPeb3O8mrPMysbfq79FKUO2zbpFKIS9BvIT7.jpg', 'PDAM-20260130-010', 'selesai', 'sedang', 'pusat_bhayangkara', '2026-01-29 19:26:13', '2026-02-09 19:43:08', NULL, NULL, NULL, NULL),
(11, '', 'Yusuf M', '082120976666', 'jalan bhayangkara', NULL, 'ull4775@gmail.com', 'pipa patah', 'uploads/pengaduan/92KP1zGjqsilKZauhosCwcwLoJP64WZ7WIFu7tjM.jpg', 'PDAM-20260130-011', 'selesai', 'kecil', 'pusat_bhayangkara', '2026-01-29 19:37:15', '2026-02-11 19:12:09', '-6.9108750', '106.9213320', 'https://www.google.com/maps?q=-6.9108750368430645,106.9213319762428', NULL),
(12, '', 'marup', '085524376655', 'jalan 123', NULL, 'depan gang', 'pipa patah', 'uploads/pengaduan/6cUrnzVQkW3oxrMgEHfAhkfyLc41pzUaKUDqwChw.jpg', 'PDAM-20260130-012', 'selesai', 'besar', 'cabang1', '2026-01-29 20:14:54', '2026-02-11 19:12:09', '-6.9186044', '106.9267511', 'https://www.google.com/maps?q=-6.91860439889133,106.92675107728202', NULL),
(13, '', 'Yusuf M', '082120976666', 'jalan 123456', NULL, 'ull4775@gmail.com', 'dwqd', 'uploads/pengaduan/yXO8hQ4GnY1eDZhdqZMKJ9ZVfl1SnFWgTeZ4LzhT.jpg', 'PDAM-20260130-013', 'selesai', 'sedang', 'cabang2', '2026-01-29 20:38:58', '2026-02-11 19:12:09', '-6.9184076', '106.9263030', 'https://www.google.com/maps?q=-6.918407641586593,106.92630303306576', NULL),
(14, '', 'Yusuf M', '089786765123', 'jalan b1', NULL, 'ull4775@gmail.com', 'qwdqsd', NULL, 'PDAM-20260130-014', 'selesai', 'sedang', 'cabang3', '2026-01-29 20:39:35', '2026-02-11 19:12:09', '-6.9182585', '106.9260885', 'https://www.google.com/maps?q=-6.9182585315373615,106.92608845634457', NULL),
(15, '', 'maulana', '086134240901', 'jalan 0808', NULL, 'depan jalan', 'bocor', 'uploads/pengaduan/q7mdETXLByl6aIPJjrQ1LnPK8VyTWduwOFRO7EGf.jpg', 'PDAM-20260203-015', 'selesai', 'sedang', 'pusat_bhayangkara', '2026-02-02 20:43:25', '2026-02-11 19:12:09', '-6.9190139', '106.9261905', 'https://www.google.com/maps?q=-6.919013926273123,106.92619052392888', NULL),
(16, '', 'Yusuf M', '089786765123', 'jalan 123', NULL, 'ull4775@gmail.com', 'eghtfg', 'uploads/pengaduan/67EzXP3kh1J5YjAWqngsrTt0gx3OXZYEc2EjdvbI.jpg', 'PDAM-20260204-016', 'selesai', 'besar', 'cabang2', '2026-02-03 18:33:22', '2026-02-11 19:12:09', '-6.9166138', '106.9120764', 'https://www.google.com/maps?q=-6.916613808130874,106.91207639563166', NULL),
(17, '86787987878', 'Yusuf M', '08323232324', 'jalan 123', NULL, 'ull4775@gmail.com', 'uyuyuy', 'uploads/pengaduan/9WyD6JoGpVYlfhpQDb4SKA5odQBGsEUUz3qR5ezl.jpg', 'PDAM-20260204-017', 'selesai', 'kecil', 'cabang3', '2026-02-03 21:13:45', '2026-02-11 19:12:09', '-6.9090700', '106.9263492', 'https://www.google.com/maps?q=-6.9090700362723965,106.92634923984309', NULL),
(18, '96789687780', 'ull', '082120976666', 'jalan 123456', NULL, 'depan jalan b2', 'oluiklihyl', 'uploads/pengaduan/BEHFgOhiEGuaealC5rygqDGm6p76CBi3E7WZUxH9.png', 'PDAM-20260204-018', 'proses', 'sedang', 'cabang2', '2026-02-03 21:14:47', '2026-02-12 00:41:02', '-6.9048889', '106.9010328', 'https://www.google.com/maps?q=-6.904888857958957,106.90103284981372', NULL),
(19, '36563456452', 'Yusuf M', '082120976556', 'jalan 123456', NULL, 'ull4775@gmail.com', 'wrfgwdg', 'uploads/pengaduan/clMulqJEwCXRyhAUHJDX24BvmqrcKjCMYCoev1iq.png', 'PDAM-20260204-019', 'selesai', 'kecil', 'pusat_bhayangkara', '2026-02-04 00:03:49', '2026-02-11 19:12:09', '-6.9203000', '106.9355000', 'https://www.google.com/maps?q=-6.9203,106.9355', NULL),
(20, '23542342342', 'ullll', '082120976666', 'jalan 123456', NULL, 'depan jalan b1', '7utdyujt', 'uploads/pengaduan/iGNXsJhI8yJM0m8zIbO5kfySwdPh50rj2iV2NkfG.png', 'PDAM-20260204-020', 'selesai', 'sedang', 'cabang4', '2026-02-04 00:05:09', '2026-02-11 19:12:09', '-6.9203000', '106.9355000', 'https://www.google.com/maps?q=-6.9203,106.9355', NULL),
(21, '36563456452', 'ulllllll', '082120976666', 'jalan 123456', NULL, 'jln123', 'fdghdfg', 'uploads/pengaduan/OD2AXvYXWMcyHb71WkP11hpej69cX7c06zVOGlDy.png', 'PDAM-20260204-021', 'selesai', 'besar', 'cabang2', '2026-02-04 00:05:51', '2026-02-11 19:12:09', '-6.9203000', '106.9355000', 'https://www.google.com/maps?q=-6.9203,106.9355', NULL),
(22, '96789687780', 'suff', '08323232324', 'jalan bhayangkara', NULL, 'depan mochi kaswari', 'bocor', NULL, 'PDAM-20260205-022', 'selesai', 'besar', 'pusat_bhayangkara', '2026-02-04 20:42:49', '2026-02-11 19:12:09', '-6.9118351', '106.9288724', 'https://www.google.com/maps?q=-6.911835067507763,106.92887241352041', NULL),
(23, '61374629876', 'ucup', '08323232324', 'jalan bhayangkara', NULL, 'depan jalan', 'air mampet/macet', 'uploads/pengaduan/cmkLTrOHobDFqSRVIa7TrFvq0BYH3UWBBGIRoyJu.png', 'PDAM-20260205-023', 'selesai', 'sedang', 'pusat_bhayangkara', '2026-02-04 21:18:33', '2026-02-11 19:12:09', '-6.9175000', '106.9267000', 'https://www.google.com/maps?q=-6.9175,106.9267', NULL),
(24, '00100020003', 'ul', '082120976666', 'jalan bhayangkara', NULL, 'depan jalan', 'bocor', 'uploads/pengaduan/wcnY5uqjD25JX4vkVUVfbZ5bfSc5iqVwEkZ3CXvq.jpg', 'PDAM-20260206-024', 'selesai', 'besar', 'pusat_bhayangkara', '2026-02-05 20:21:35', '2026-02-11 19:12:09', '-6.9117097', '106.9289298', 'https://www.google.com/maps?q=-6.911709671901406,106.92892975704122', NULL),
(25, '96789687780', 'Yusuf M', '089786765123', 'jalan 123456', NULL, 'ull4775@gmail.com', 'efwef', 'uploads/pengaduan/ayRZA6qMnzVn61JXxFpu6y6hzkCvaNw0SiOcbT31.png', 'PDAM-20260207-025', 'selesai', 'besar', 'cabang3', '2026-02-06 23:16:29', '2026-02-11 19:12:09', '-6.9183118', '106.9242216', 'https://www.google.com/maps?q=-6.918311785131783,106.92422163887021', NULL),
(26, '00100020003', 'Yusuf M', '08323232324', 'jalan 123', NULL, 'ull4775@gmail.com', 'gdfsg', 'uploads/pengaduan/hhEtoCAJHRmCdVc7TU3EjQvNNYDZvOjo0wKabhMc.png', 'PDAM-20260207-026', 'selesai', 'sedang', 'cabang3', '2026-02-06 23:31:49', '2026-02-11 19:12:09', '-6.9147331', '106.9222690', 'https://www.google.com/maps?q=-6.914733130230791,106.92226899070737', NULL),
(27, '00100020003', 'Yusuf M', '089786765123', 'jalan bhayangkara', NULL, 'ull4775@gmail.com', 'azxaz', 'uploads/pengaduan/ZFvYbyCFW4rVfYEnTzNImiDzf9EsdDFy4OeYo73s.png', 'PDAM-20260207-027', 'selesai', 'sedang', 'cabang3', '2026-02-06 23:45:44', '2026-02-11 19:12:09', '-6.9162412', '106.9212606', 'https://www.google.com/maps?q=-6.916241214391623,106.92126064775583', NULL),
(28, '96789687780', 'Yusuf M', '082120976556', 'jalan bhayangkara', NULL, 'ull4775@gmail.com', 'qwedwd', 'uploads/pengaduan/NloJuumokphA3cLjyLsYfLZFGXeqMs2BHdXDJ9a3.png', 'PDAM-20260207-028', 'selesai', 'sedang', 'cabang3', '2026-02-06 23:49:46', '2026-02-11 19:12:09', '-6.9203000', '106.9355000', 'https://www.google.com/maps?q=-6.9203,106.9355', NULL),
(29, '96789687780', 'Yusuf M', '08323232324', 'jalan bhayangkara', NULL, 'ull4775@gmail.com', 'yfyh', 'uploads/pengaduan/6xyOqRDQM6EuUOckv5icowhMgFGfsShmhbh9MHE1.png', 'PDAM-20260207-029', 'selesai', 'sedang', 'cabang4', '2026-02-06 23:56:09', '2026-02-11 19:12:09', '-6.9161773', '106.9216040', 'https://www.google.com/maps?q=-6.916177309797438,106.92160397050974', NULL),
(30, '96789687780', 'Yusuf M', '08323232324', 'jalan 123456', NULL, 'ull4775@gmail.com', 'sds', 'uploads/pengaduan/oDshOiEBLyBfmMudqRF1IRukmzW3sMeJTdHSERUY.png', 'PDAM-20260207-030', 'selesai', 'sedang', 'cabang3', '2026-02-07 00:06:28', '2026-02-11 19:12:09', '-6.9149418', '106.9201448', 'https://www.google.com/maps?q=-6.914941819277196,106.92014484880563', NULL),
(31, '96789687780', 'Yusuf M', '089786765123', 'jalan satudua', NULL, 'ull4775@gmail.com', 'sdsd', 'uploads/pengaduan/tTZKMYPkVMk4bC2iodUtU3YyySA8fms5QAufhCoO.png', 'PDAM-20260207-031', 'selesai', 'sedang', 'cabang4', '2026-02-07 00:23:41', '2026-02-11 19:12:09', '-6.9182329', '106.9220117', 'https://www.google.com/maps?q=-6.918232903242909,106.92201166628', NULL),
(32, '23542342342', 'Yusuf M', '08323232324', 'jalan bhayangkara', NULL, 'ull4775@gmail.com', 'fddf', 'uploads/pengaduan/DC4vLZch1Phg4gYjvuAzYAMHAEa1uC0UsmBUszxn.png', 'PDAM-20260207-032', 'selesai', 'sedang', 'cabang4', '2026-02-07 00:34:45', '2026-02-11 19:12:09', '-6.9203560', '106.9207478', 'https://www.google.com/maps?q=-6.920356002972672,106.92074775695801', NULL),
(33, '96789687780', 'ull', '08323232324', 'jalan 123', NULL, 'jln12345', 'wasdsda', 'uploads/pengaduan/xmPOXf1H0G3RLiLYPaBFaC8nsIOWDSctNx7L1J8z.png', 'PDAM-20260207-033', 'menunggu', 'sedang', 'cabang4', '2026-02-07 00:38:39', '2026-02-11 19:12:09', '-6.9144945', '106.9206598', 'https://www.google.com/maps?q=-6.914494485705889,106.9206598329365', NULL),
(34, '00100020003', 'ull', '08323232324', 'jalan bhayangkara', NULL, 'depan gang', 'dsADas', 'uploads/pengaduan/vD9kB052x40n8O2jb9NEXCRjYsfEHjXoDYSw65JO.png', 'PDAM-20260207-034', 'selesai', 'sedang', 'cabang4', '2026-02-07 00:42:50', '2026-02-11 19:12:09', '-6.9154105', '106.9221190', 'https://www.google.com/maps?q=-6.915410453992841,106.9221189546406', NULL),
(35, '96789687780', 'Yusuf M', '08323232324', 'jalan bhayangkara', NULL, 'ull4775@gmail.com', 'wsASa', 'uploads/pengaduan/ygCUfPvVIoRMCv1RdV4joh26nsfHGDh3j1Dg8vsR.png', 'PDAM-20260207-035', 'selesai', 'besar', 'cabang4', '2026-02-07 00:44:22', '2026-02-11 19:12:09', '-6.9175406', '106.9209173', 'https://www.google.com/maps?q=-6.917540605931488,106.92091732500192', NULL),
(36, '00100020003', 'ull', '089786765123', 'jalan satudua', NULL, 'depan jalan b1', 'qwedad', 'uploads/pengaduan/M0uVbASyw0u9LlLPjCw7MIdfrauFwymEaNMk3V6g.png', 'PDAM-20260207-036', 'selesai', 'besar', 'cabang4', '2026-02-07 01:13:17', '2026-02-11 19:12:09', '-6.9209914', '106.9212821', 'https://www.google.com/maps?q=-6.920991431680252,106.92128210542795', NULL),
(37, '00100020003', 'Yusuf M', '08323232324', 'jalan 123456', NULL, 'ull4775@gmail.com', 'ertert', 'uploads/pengaduan/jKLP1XPUlEWL3XOHiZbZTxYsoucpSbsPn1LDzQzF.png', 'PDAM-20260207-037', 'selesai', 'sedang', 'cabang4', '2026-02-07 01:17:40', '2026-02-11 19:12:09', '-6.9150696', '106.9207457', 'https://www.google.com/maps?q=-6.915069628791203,106.92074566362497', NULL),
(38, '96789687780', 'ullll', '08323232324', 'jalan 123456', NULL, 'depan jalan b1', 'wsfdsf', 'uploads/pengaduan/pg3qwyYbrJvkBd8934rcorZ19mB1F4N4N1ie3fYA.png', 'PDAM-20260207-038', 'selesai', 'sedang', 'cabang4', '2026-02-07 01:20:51', '2026-02-11 19:12:09', '-6.9156448', '106.9217113', 'https://www.google.com/maps?q=-6.915644771176325,106.92171125887033', NULL),
(39, '00100020003', 'Yusuf M', '089786765123', 'jalan 123456', NULL, 'ull4775@gmail.com', 'dsfdasf', 'uploads/pengaduan/jhONLyoBbPGlslHTdtVwZcNox0KsY1CZcF9Wd4MH.png', 'PDAM-20260207-039', 'selesai', 'sedang', 'cabang4', '2026-02-07 02:07:21', '2026-02-11 19:12:09', '-6.9151122', '106.9204238', 'https://www.google.com/maps?q=-6.915112231954851,106.92042379854318', NULL),
(40, '00100020003', 'Yusuf M', '082120976666', 'jalan bhayangkara', NULL, 'ull4775@gmail.com', 'wefwdf', 'uploads/pengaduan/LOtONSeJvEFOeTW62VtApCDIjQZA9QGPddOtPTdn.png', 'PDAM-20260207-040', 'selesai', 'sedang', 'cabang4', '2026-02-07 02:33:26', '2026-02-11 19:12:09', '-6.9152400', '106.9218400', 'https://www.google.com/maps?q=-6.915240041422753,106.92184000490305', NULL),
(41, '00100020003', 'Yusuf M', '089786765123', 'jalan satudua', NULL, 'ull4775@gmail.com', 'sdfsdf', 'uploads/pengaduan/bWO9dtozosFvpba6bShtVb1T86rzz6CvnOKv2a8k.png', 'PDAM-20260207-041', 'selesai', 'sedang', 'cabang4', '2026-02-07 02:37:56', '2026-02-11 19:12:09', '-6.9147288', '106.9210032', 'https://www.google.com/maps?q=-6.9147288033436825,106.9210031556904', NULL),
(42, '00100020003', 'Yusuf M', '08323232324', 'jalan 123456', NULL, 'ull4775@gmail.com', 'dfsdf', 'uploads/pengaduan/OECTccQxLCee09RTrdQMIDI7PfhuC3RrmwqxiE1V.png', 'PDAM-20260207-042', 'selesai', 'besar', 'cabang4', '2026-02-07 02:45:35', '2026-02-11 19:12:09', '-6.9148566', '106.9199517', 'https://www.google.com/maps?q=-6.914856612915322,106.91995172975656', NULL),
(43, '00100020003', 'Yusuf M', '089786765123', 'jalan 123456', NULL, 'ull4775@gmail.com', 'safsf', 'uploads/pengaduan/zty6aGK9p2yUo9hRK0KeRzrLA9QUOkVEGJ82UYFw.png', 'PDAM-20260207-043', 'selesai', 'sedang', 'cabang4', '2026-02-07 02:46:00', '2026-02-11 19:12:09', '-6.9141324', '106.9226339', 'https://www.google.com/maps?q=-6.9141323582189065,106.92263393877145', NULL),
(44, '36563456452', 'Yusuf M', '089786765123', 'jalan 123456', NULL, 'ull4775@gmail.com', 'ff', 'uploads/pengaduan/VZZKlDcshP3xiiD99dGiRwb5iOUgkPIBFq6aJZvj.png', 'PDAM-20260207-044', 'selesai', 'sedang', 'cabang4', '2026-02-07 02:46:28', '2026-02-11 19:12:09', '-6.9158365', '106.9213679', 'https://www.google.com/maps?q=-6.915836485149089,106.92136793611643', NULL),
(45, '00100020003', 'Yusuf', '082120976666', 'jalan 123456', NULL, 'depan jalan b1', 'r5tert', 'uploads/pengaduan/4kXN5j14s2nE513HHf9MJrhP0xdtzJrbpHMsL68g.png', 'PDAM-20260210-045', 'selesai', 'sedang', 'cabang1', '2026-02-09 21:33:05', '2026-02-11 19:12:09', '-6.9152400', '106.9213036', 'https://www.google.com/maps?q=-6.915240041422753,106.92130356310007', NULL),
(46, '00100020003', 'Yusuf M', '082120976666', 'jalan bhayangkara', NULL, 'ull4775@gmail.com', 'sw', 'uploads/pengaduan/jE7ih0NogKxPYNYacvtWMKOBzeofEAR0sW0aYT6e.png', 'PDAM-20260210-046', 'selesai', 'besar', 'cabang1', '2026-02-09 23:59:12', '2026-02-11 19:12:09', '-6.9198448', '106.9267988', 'https://www.google.com/maps?q=-6.91984477043185,106.9267988204956', NULL),
(47, '96789687780', 'Yusuf M', '085135352323', 'jalan 123', NULL, 'ull4775@gmail.com', 'qwdw', 'uploads/pengaduan/QEkWYi6vcBIvHTkwI6pNyqEi6Wbl20wwvBM4YUPx.png', 'PDAM-20260210-047', 'selesai', 'besar', 'pusat_bhayangkara', '2026-02-10 00:00:57', '2026-02-11 19:12:09', '-6.9203000', '106.9355000', 'https://www.google.com/maps?q=-6.9203,106.9355', NULL),
(48, '00100020003', 'Maula', '082120976666', 'jalan 123456', NULL, 'maull@gmail.com', 'qws', 'uploads/pengaduan/52KRXpSDlLmBVpqhYR8fQLtd15vMa80DiFWj22zI.png', 'PDAM-20260211-048', 'menunggu', 'besar', 'cabang1', '2026-02-10 19:24:22', '2026-02-11 19:12:09', '-6.9163943', '106.9306697', 'https://www.google.com/maps?q=-6.916394319113352,106.93066966934201', NULL),
(49, '23542342342', 'ull', '082120976666', 'jalan bhayangkara', NULL, 'pdam@kotasmi.go.id', 'ull', 'uploads/pengaduan/A4CDwBeVC11EQtbtXBp9t44gsAcncaHwkbMsAemb.jpg', 'PDAM-20260211-049', 'menunggu', 'sedang', 'pusat_bhayangkara', '2026-02-10 19:32:03', '2026-02-11 19:12:09', '-6.9198235', '106.9267988', 'https://www.google.com/maps?q=-6.919823469063957,106.9267988204956', NULL),
(50, '00100020003', 'Yusuf M', '085135352323', 'jalan bhayangkara', NULL, 'ull4775@gmail.com', 'edsd', 'uploads/pengaduan/N7dfF0sMsXzJHzpKBnC4ex4kAznbNzoXQcAL4PWe.jpg', 'PDAM-20260211-050', 'proses', 'besar', 'pusat_bhayangkara', '2026-02-10 19:45:40', '2026-02-11 19:12:09', '-6.9183967', '106.9265498', 'https://www.google.com/maps?q=-6.918396658035461,106.92654979629513', NULL),
(51, '23542342342', 'Yusuf M', '085135352323', 'jalan bhayangkara', NULL, 'ull4775@gmail.com', 'ed', 'uploads/pengaduan/LkvCzm79AgKLOt7SzjbmA2hPTZ0zWCMNEhz35uRl.jpg', 'PDAM-20260211-051', 'selesai', 'sedang', 'cabang3', '2026-02-10 19:55:52', '2026-02-13 19:33:19', '-6.9147541', '106.9220008', 'https://www.google.com/maps?q=-6.914754098990818,106.92200076980588', NULL),
(52, '00100020003', 'Yusuf M', '085135352323', 'jalan bhayangkara', NULL, 'ull4775@gmail.com', 'hjk,j', 'uploads/pengaduan/GYnbElyejnGGPMqgiEaq1nWjRhSZonFTAdIW71rX.png', 'PDAM-20260211-052', 'menunggu', 'besar', 'pusat_bhayangkara', '2026-02-11 00:12:15', '2026-02-11 19:12:09', '-6.9104314', '106.9237692', 'https://www.google.com/maps?q=-6.910431365572143,106.9237692171134', NULL),
(53, '96789687780', 'Yusuf M', '085135352323', 'jalan bhayangkara', NULL, 'ull4775@gmail.com', '7ui', 'uploads/pengaduan/DDMphB9SowTaeKvrk9DUoborhd9txIBjhfaMiD9D.png', 'PDAM-20260211-053', 'proses', 'sedang', 'pusat_bhayangkara', '2026-02-11 00:17:12', '2026-02-11 23:31:40', '-6.9104462', '106.9238649', 'https://www.google.com/maps?q=-6.910446158681777,106.92386487617203', NULL),
(54, '36563456452', 'Yusuf M', '085135352323', 'jalan 123456', NULL, 'ull4775@gmail.com', 'wefsdf', 'uploads/pengaduan/xud1jk48nKr0bBqHS1MJShkPC6txuZm9EdTy1hrS.png', 'PDAM-20260212-054', 'selesai', 'sedang', 'cabang4', '2026-02-11 20:35:27', '2026-02-11 23:31:33', '-6.9254971', '106.9506432', 'https://www.google.com/maps?q=-6.925497107697457,106.95064315467752', NULL),
(55, '00100020003', 'Yusuf M', '0856654657', 'jalan satudua', NULL, 'ull4775@gmail.com', 'dsf', 'uploads/pengaduan/K7Mxdu8SvLSxDeGE60uhwAarsUkOrzxx4EtFkXZ5.jpg', 'PDAM-20260212-055', 'selesai', 'besar', 'cabang3', '2026-02-12 00:34:27', '2026-02-13 19:33:12', '-6.9271049', '106.9319466', 'https://www.google.com/maps?q=-6.9271048696726165,106.93194656847116', NULL),
(56, '00100020003', 'Yusuf M', '085135352323', 'jalan 123456', NULL, 'ull4775@gmail.com', 'dfdf', 'uploads/pengaduan/kR8kAsfsbyTlIb7vgEjZsl1yAWy6bpbCMVuCveXu.png', 'PDAM-20260213-056', 'proses', 'besar', 'cabang2', '2026-02-12 18:52:53', '2026-02-13 18:34:12', '-6.9173186', '106.9246079', 'https://www.google.com/maps?q=-6.917318604607575,106.92460787696835', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan_trackings`
--

CREATE TABLE `pengaduan_trackings` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_unik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengaduan_id` bigint UNSIGNED NOT NULL,
  `status` enum('menunggu','proses','selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `petugas_id` bigint UNSIGNED DEFAULT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaduan_trackings`
--

INSERT INTO `pengaduan_trackings` (`id`, `kode_unik`, `pengaduan_id`, `status`, `petugas_id`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 'TRK-0001', 1, 'selesai', 3, NULL, '2026-02-07 09:06:21', '2026-02-07 09:06:21'),
(2, 'PDAM-20260207-035', 35, 'proses', 7, NULL, '2026-02-07 01:11:58', '2026-02-07 01:11:58'),
(3, 'PDAM-20260207-033', 33, 'menunggu', NULL, NULL, '2026-02-07 01:12:05', '2026-02-07 01:12:05'),
(4, 'PDAM-20260207-035', 35, 'selesai', 7, NULL, '2026-02-07 01:12:18', '2026-02-07 01:12:18'),
(5, 'PDAM-20260207-036', 36, 'menunggu', 7, NULL, '2026-02-07 01:13:17', '2026-02-07 01:13:17'),
(6, 'PDAM-20260207-036', 36, 'selesai', 7, NULL, '2026-02-07 01:13:48', '2026-02-07 01:13:48'),
(7, 'PDAM-20260207-037', 37, 'menunggu', 7, NULL, '2026-02-07 01:17:40', '2026-02-07 01:17:40'),
(8, 'PDAM-20260207-037', 37, 'proses', 7, NULL, '2026-02-07 01:17:56', '2026-02-07 01:17:56'),
(9, 'PDAM-20260207-037', 37, 'selesai', 7, NULL, '2026-02-07 01:17:59', '2026-02-07 01:17:59'),
(10, 'PDAM-20260207-038', 38, 'menunggu', 7, NULL, '2026-02-07 01:20:51', '2026-02-07 01:20:51'),
(11, 'PDAM-20260207-038', 38, 'selesai', 7, NULL, '2026-02-07 01:21:16', '2026-02-07 01:21:16'),
(12, 'PDAM-20260207-039', 39, 'menunggu', NULL, NULL, '2026-02-07 02:07:21', '2026-02-07 02:07:21'),
(13, 'PDAM-20260207-039', 39, 'selesai', NULL, NULL, '2026-02-07 02:07:37', '2026-02-07 02:07:37'),
(14, 'PDAM-20260207-039', 39, 'proses', NULL, NULL, '2026-02-07 02:08:01', '2026-02-07 02:08:01'),
(15, 'PDAM-20260207-038', 38, 'proses', 7, NULL, '2026-02-07 02:08:02', '2026-02-07 02:08:02'),
(16, 'PDAM-20260207-037', 37, 'proses', 7, NULL, '2026-02-07 02:08:04', '2026-02-07 02:08:04'),
(17, 'PDAM-20260207-039', 39, 'selesai', NULL, NULL, '2026-02-07 02:08:18', '2026-02-07 02:08:18'),
(18, 'PDAM-20260207-038', 38, 'selesai', 7, NULL, '2026-02-07 02:08:21', '2026-02-07 02:08:21'),
(19, 'PDAM-20260207-039', 39, 'proses', NULL, NULL, '2026-02-07 02:19:18', '2026-02-07 02:19:18'),
(20, 'PDAM-20260207-039', 39, 'menunggu', NULL, NULL, '2026-02-07 02:19:20', '2026-02-07 02:19:20'),
(21, 'PDAM-20260207-038', 38, 'menunggu', 7, NULL, '2026-02-07 02:19:21', '2026-02-07 02:19:21'),
(22, 'PDAM-20260207-039', 39, 'selesai', NULL, NULL, '2026-02-07 02:19:35', '2026-02-07 02:19:35'),
(23, 'PDAM-20260207-040', 40, 'menunggu', NULL, NULL, '2026-02-07 02:33:26', '2026-02-07 02:33:26'),
(24, 'PDAM-20260207-040', 40, 'selesai', NULL, NULL, '2026-02-07 02:33:40', '2026-02-07 02:33:40'),
(25, 'PDAM-20260207-041', 41, 'menunggu', NULL, NULL, '2026-02-07 02:37:56', '2026-02-07 02:37:56'),
(26, 'PDAM-20260207-041', 41, 'selesai', NULL, NULL, '2026-02-07 02:39:20', '2026-02-07 02:39:20'),
(27, 'PDAM-20260207-041', 41, 'proses', NULL, NULL, '2026-02-07 02:43:19', '2026-02-07 02:43:19'),
(28, 'PDAM-20260207-041', 41, 'selesai', NULL, NULL, '2026-02-07 02:43:41', '2026-02-07 02:43:41'),
(29, 'PDAM-20260207-042', 42, 'menunggu', NULL, NULL, '2026-02-07 02:45:35', '2026-02-07 02:45:35'),
(30, 'PDAM-20260207-043', 43, 'menunggu', NULL, NULL, '2026-02-07 02:46:00', '2026-02-07 02:46:00'),
(31, 'PDAM-20260207-044', 44, 'menunggu', NULL, NULL, '2026-02-07 02:46:28', '2026-02-07 02:46:28'),
(32, 'PDAM-20260207-044', 44, 'selesai', NULL, NULL, '2026-02-07 02:47:08', '2026-02-07 02:47:08'),
(33, 'PDAM-20260207-043', 43, 'proses', NULL, NULL, '2026-02-07 02:47:10', '2026-02-07 02:47:10'),
(34, 'PDAM-20260207-043', 43, 'selesai', NULL, NULL, '2026-02-07 03:02:41', '2026-02-07 03:02:41'),
(35, 'PDAM-20260207-038', 38, 'selesai', NULL, NULL, '2026-02-07 03:02:47', '2026-02-07 03:02:47'),
(36, 'PDAM-20260207-037', 37, 'selesai', NULL, NULL, '2026-02-07 03:03:24', '2026-02-07 03:03:24'),
(37, 'PDAM-20260207-042', 42, 'selesai', NULL, NULL, '2026-02-07 03:03:26', '2026-02-07 03:03:26'),
(38, 'PDAM-20260207-026', 26, 'selesai', NULL, NULL, '2026-02-07 03:03:30', '2026-02-07 03:03:30'),
(39, 'PDAM-20260207-044', 44, 'proses', NULL, NULL, '2026-02-07 03:04:03', '2026-02-07 03:04:03'),
(40, 'PDAM-20260207-043', 43, 'proses', NULL, NULL, '2026-02-07 03:04:07', '2026-02-07 03:04:07'),
(41, 'PDAM-20260207-044', 44, 'selesai', NULL, NULL, '2026-02-08 19:12:56', '2026-02-08 19:12:56'),
(42, 'PDAM-20260207-044', 44, 'menunggu', NULL, NULL, '2026-02-08 19:24:05', '2026-02-08 19:24:05'),
(43, 'PDAM-20260207-042', 42, 'menunggu', NULL, NULL, '2026-02-08 19:24:07', '2026-02-08 19:24:07'),
(44, 'PDAM-20260207-041', 41, 'proses', NULL, NULL, '2026-02-08 19:24:09', '2026-02-08 19:24:09'),
(45, 'PDAM-20260207-044', 44, 'selesai', NULL, NULL, '2026-02-08 19:25:14', '2026-02-08 19:25:14'),
(46, 'PDAM-20260207-043', 43, 'selesai', NULL, NULL, '2026-02-08 19:25:25', '2026-02-08 19:25:25'),
(47, 'PDAM-20260207-035', 35, 'proses', NULL, NULL, '2026-02-09 18:51:56', '2026-02-09 18:51:56'),
(48, 'PDAM-20260207-041', 41, 'selesai', NULL, NULL, '2026-02-09 18:51:59', '2026-02-09 18:51:59'),
(49, 'PDAM-20260130-010', 10, 'selesai', NULL, NULL, '2026-02-09 19:43:08', '2026-02-09 19:43:08'),
(50, 'PDAM-20260207-042', 42, 'selesai', NULL, NULL, '2026-02-09 20:47:28', '2026-02-09 20:47:28'),
(51, 'PDAM-20260207-035', 35, 'selesai', NULL, NULL, '2026-02-09 21:31:53', '2026-02-09 21:31:53'),
(52, 'PDAM-20260210-045', 45, 'menunggu', NULL, NULL, '2026-02-09 21:33:05', '2026-02-09 21:33:05'),
(53, 'PDAM-20260210-046', 46, 'menunggu', NULL, NULL, '2026-02-09 23:59:12', '2026-02-09 23:59:12'),
(54, 'PDAM-20260210-047', 47, 'menunggu', NULL, NULL, '2026-02-10 00:00:57', '2026-02-10 00:00:57'),
(55, 'PDAM-20260210-047', 47, 'proses', NULL, NULL, '2026-02-10 00:05:22', '2026-02-10 00:05:22'),
(56, 'PDAM-20260210-047', 47, 'selesai', NULL, NULL, '2026-02-10 00:07:00', '2026-02-10 00:07:00'),
(57, 'PDAM-20260210-046', 46, 'selesai', NULL, NULL, '2026-02-10 00:11:00', '2026-02-10 00:11:00'),
(58, 'PDAM-20260210-047', 47, 'menunggu', NULL, NULL, '2026-02-10 00:16:37', '2026-02-10 00:16:37'),
(59, 'PDAM-20260210-047', 47, 'selesai', NULL, NULL, '2026-02-10 00:16:38', '2026-02-10 00:16:38'),
(60, 'PDAM-20260210-047', 47, 'proses', NULL, NULL, '2026-02-10 00:17:38', '2026-02-10 00:17:38'),
(61, 'PDAM-20260210-047', 47, 'selesai', NULL, NULL, '2026-02-10 00:17:40', '2026-02-10 00:17:40'),
(62, 'PDAM-20260210-047', 47, 'menunggu', NULL, NULL, '2026-02-10 00:40:46', '2026-02-10 00:40:46'),
(63, 'PDAM-20260210-047', 47, 'selesai', NULL, NULL, '2026-02-10 00:40:48', '2026-02-10 00:40:48'),
(64, 'PDAM-20260210-045', 45, 'selesai', NULL, NULL, '2026-02-10 00:47:52', '2026-02-10 00:47:52'),
(65, 'PDAM-20260210-047', 47, 'menunggu', NULL, NULL, '2026-02-10 18:25:12', '2026-02-10 18:25:12'),
(66, 'PDAM-20260210-046', 46, 'menunggu', NULL, NULL, '2026-02-10 18:25:14', '2026-02-10 18:25:14'),
(67, 'PDAM-20260130-014', 14, 'selesai', NULL, NULL, '2026-02-10 18:25:27', '2026-02-10 18:25:27'),
(68, 'PDAM-20260207-030', 30, 'proses', NULL, NULL, '2026-02-10 18:25:54', '2026-02-10 18:25:54'),
(69, 'PDAM-20260207-028', 28, 'proses', NULL, NULL, '2026-02-10 18:26:04', '2026-02-10 18:26:04'),
(70, 'PDAM-20260207-030', 30, 'selesai', NULL, NULL, '2026-02-10 18:26:15', '2026-02-10 18:26:15'),
(71, 'PDAM-20260207-028', 28, 'selesai', NULL, NULL, '2026-02-10 18:26:17', '2026-02-10 18:26:17'),
(72, 'PDAM-20260210-047', 47, 'selesai', NULL, NULL, '2026-02-10 18:29:31', '2026-02-10 18:29:31'),
(73, 'PDAM-20260210-046', 46, 'selesai', NULL, NULL, '2026-02-10 18:29:33', '2026-02-10 18:29:33'),
(74, 'PDAM-20260211-048', 48, 'menunggu', NULL, NULL, '2026-02-10 19:24:22', '2026-02-10 19:24:22'),
(75, 'PDAM-20260211-049', 49, 'menunggu', NULL, NULL, '2026-02-10 19:32:03', '2026-02-10 19:32:03'),
(76, 'PDAM-20260211-049', 49, 'proses', NULL, NULL, '2026-02-10 19:32:25', '2026-02-10 19:32:25'),
(77, 'PDAM-20260211-049', 49, 'selesai', NULL, NULL, '2026-02-10 19:32:28', '2026-02-10 19:32:28'),
(78, 'PDAM-20260211-049', 49, 'proses', NULL, NULL, '2026-02-10 19:35:05', '2026-02-10 19:35:05'),
(79, 'PDAM-20260211-049', 49, 'selesai', NULL, NULL, '2026-02-10 19:35:06', '2026-02-10 19:35:06'),
(80, 'PDAM-20260211-049', 49, 'proses', NULL, NULL, '2026-02-10 19:42:17', '2026-02-10 19:42:17'),
(81, 'PDAM-20260211-049', 49, 'selesai', NULL, NULL, '2026-02-10 19:42:19', '2026-02-10 19:42:19'),
(82, 'PDAM-20260211-049', 49, 'menunggu', NULL, NULL, '2026-02-10 19:45:16', '2026-02-10 19:45:16'),
(83, 'PDAM-20260211-050', 50, 'menunggu', NULL, NULL, '2026-02-10 19:45:40', '2026-02-10 19:45:40'),
(84, 'PDAM-20260211-050', 50, 'proses', NULL, NULL, '2026-02-10 19:45:58', '2026-02-10 19:45:58'),
(85, 'PDAM-20260211-051', 51, 'menunggu', NULL, NULL, '2026-02-10 19:55:52', '2026-02-10 19:55:52'),
(86, 'PDAM-20260211-051', 51, 'proses', NULL, NULL, '2026-02-10 19:56:03', '2026-02-10 19:56:03'),
(87, 'PDAM-20260211-051', 51, 'selesai', NULL, NULL, '2026-02-10 19:56:06', '2026-02-10 19:56:06'),
(88, 'PDAM-20260211-051', 51, 'proses', NULL, NULL, '2026-02-10 20:04:59', '2026-02-10 20:04:59'),
(89, 'PDAM-20260211-051', 51, 'selesai', NULL, NULL, '2026-02-10 20:05:01', '2026-02-10 20:05:01'),
(90, 'PDAM-20260211-052', 52, 'menunggu', NULL, NULL, '2026-02-11 00:12:15', '2026-02-11 00:12:15'),
(91, 'PDAM-20260211-053', 53, 'menunggu', NULL, NULL, '2026-02-11 00:17:12', '2026-02-11 00:17:12'),
(92, 'PDAM-20260212-054', 54, 'menunggu', NULL, NULL, '2026-02-11 20:35:27', '2026-02-11 20:35:27'),
(93, 'PDAM-20260212-054', 54, 'selesai', NULL, NULL, '2026-02-11 23:31:33', '2026-02-11 23:31:33'),
(94, 'PDAM-20260211-053', 53, 'proses', NULL, NULL, '2026-02-11 23:31:40', '2026-02-11 23:31:40'),
(95, 'PDAM-20260211-051', 51, 'proses', NULL, NULL, '2026-02-11 23:52:10', '2026-02-11 23:52:10'),
(96, 'PDAM-20260211-051', 51, 'selesai', NULL, NULL, '2026-02-11 23:52:12', '2026-02-11 23:52:12'),
(97, 'PDAM-20260212-055', 55, 'menunggu', NULL, NULL, '2026-02-12 00:34:27', '2026-02-12 00:34:27'),
(98, 'PDAM-20260212-055', 55, 'proses', NULL, NULL, '2026-02-12 00:34:50', '2026-02-12 00:34:50'),
(99, 'PDAM-20260212-055', 55, 'selesai', NULL, NULL, '2026-02-12 00:35:13', '2026-02-12 00:35:13'),
(100, 'PDAM-20260204-018', 18, 'proses', NULL, NULL, '2026-02-12 00:41:02', '2026-02-12 00:41:02'),
(101, 'PDAM-20260213-056', 56, 'menunggu', NULL, NULL, '2026-02-12 18:52:53', '2026-02-12 18:52:53'),
(102, 'PDAM-20260212-055', 55, 'proses', NULL, NULL, '2026-02-13 18:34:10', '2026-02-13 18:34:10'),
(103, 'PDAM-20260213-056', 56, 'proses', NULL, NULL, '2026-02-13 18:34:12', '2026-02-13 18:34:12'),
(104, 'PDAM-20260211-051', 51, 'proses', NULL, NULL, '2026-02-13 18:34:22', '2026-02-13 18:34:22'),
(105, 'PDAM-20260212-055', 55, 'selesai', NULL, NULL, '2026-02-13 19:33:12', '2026-02-13 19:33:12'),
(106, 'PDAM-20260211-051', 51, 'selesai', NULL, NULL, '2026-02-13 19:33:19', '2026-02-13 19:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `penggunas`
--

CREATE TABLE `penggunas` (
  `id_pengguna` bigint UNSIGNED NOT NULL,
  `nik` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','petugas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cabang` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penggunas`
--

INSERT INTO `penggunas` (`id_pengguna`, `nik`, `username`, `nama`, `alamat`, `no_hp`, `email`, `password`, `role`, `created_at`, `updated_at`, `cabang`, `is_active`) VALUES
(1, '1234567890', 'admin', 'Administrator', '-', '-', '-', '$2y$10$YcPUMFinIvJQG6JmXXcNTuT54hnxvHZqkk.v3EzXqhYf2UXYdHn.u', 'admin', '2026-01-14 19:10:45', '2026-01-14 19:10:45', NULL, 1),
(3, '7878787878787878', 'petugascabang1', 'petugascabang1', 'jl kadudampit', '082120976666', 'petugascabang@gmail.com', '$2y$10$whBGwM3CR9kaHMvo1AcL7e5yHoWp0HYcDPX0zBnxE5mKDoI8FzC8i', 'petugas', '2026-02-02 23:38:28', '2026-02-09 18:51:46', 'cabang1', 1),
(6, '4545454545454545', 'adminpusat', 'Yusuf M', 'jl bhayangkara', '082120976666', 'ull4775@gmail.com', '$2y$10$wOM0sPI/cPaGGoBB9vrWDedR7lcFXvKste.fBGkVKBZM0msKfcFAi', 'admin', '2026-02-04 00:33:11', '2026-02-04 00:33:11', NULL, 1),
(7, '5876757656754654', 'ptgscabang3', 'petugascabang3', 'kadudampit', '08323232324', 'petugascabang3@gmail.com', '$2y$10$qPE2ExG9JoL9qzBcgEo19O.2uFywY96Atrpdzn3uUuyEyM4pGo9Vu', 'petugas', '2026-02-06 19:28:04', '2026-02-09 19:31:33', 'cabang3', 1),
(10, '4444444444444444', 'ptgscabang4', 'Aep', 'cisaat', '0856654657', 'cabang4@gmail.com', '$2y$10$dTM2JTxzTxsW52ZX6yBW7OTzpDxBAetMSGaOPL0HwzMv2EE/15rsm', 'petugas', '2026-02-08 23:57:48', '2026-02-09 19:31:21', 'cabang4', 1),
(11, '11111111111111112', 'ptgscabang1', 'bogeg', 'selabintana', '085135352323', 'cabang1@gmail.com', '$2y$10$4SfPHhk7JeUyEUZdtaejjOoTMJdcY0FP28ILH5/CKc168hrNE1i2G', 'petugas', '2026-02-08 23:59:08', '2026-02-09 19:31:02', 'cabang1', 1),
(12, '1212121212121212', 'ptgspusat', 'inan', 'bhayangkara', '088366557788', 'pusat@gmail.com', '$2y$10$dgSMDbXjKw1lDgnZAxDDbusvMIgYypUG72lLk5mM9z1cNNIoZjTzW', 'petugas', '2026-02-09 00:00:36', '2026-02-09 00:00:36', 'pusat_bhayangkara', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petugas_locations`
--

CREATE TABLE `petugas_locations` (
  `id` bigint NOT NULL,
  `pengguna_id` bigint DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `status` enum('aktif','istirahat','offline') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspirasis`
--
ALTER TABLE `aspirasis`
  ADD PRIMARY KEY (`id_aspirasi`),
  ADD KEY `aspirasis_id_pelaporan_foreign` (`id_pelaporan`);

--
-- Indexes for table `chat_pengaduans`
--
ALTER TABLE `chat_pengaduans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_pengaduans_pengaduan_id_foreign` (`pengaduan_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inputs`
--
ALTER TABLE `inputs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inputs_kode_unique` (`kode`),
  ADD KEY `inputs_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id_kategori`);

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
-- Indexes for table `pengaduans`
--
ALTER TABLE `pengaduans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengaduans_id_kategori_foreign` (`id_kategori`),
  ADD KEY `pengaduans_petugas_id_foreign` (`petugas_id`);

--
-- Indexes for table `pengaduan_trackings`
--
ALTER TABLE `pengaduan_trackings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_petugas` (`petugas_id`),
  ADD KEY `pengaduan_trackings_pengaduan_id_foreign` (`pengaduan_id`);

--
-- Indexes for table `penggunas`
--
ALTER TABLE `penggunas`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `penggunas_nik_unique` (`nik`),
  ADD UNIQUE KEY `penggunas_username_unique` (`username`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `petugas_locations`
--
ALTER TABLE `petugas_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspirasis`
--
ALTER TABLE `aspirasis`
  MODIFY `id_aspirasi` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_pengaduans`
--
ALTER TABLE `chat_pengaduans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inputs`
--
ALTER TABLE `inputs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id_kategori` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pengaduans`
--
ALTER TABLE `pengaduans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `pengaduan_trackings`
--
ALTER TABLE `pengaduan_trackings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `penggunas`
--
ALTER TABLE `penggunas`
  MODIFY `id_pengguna` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas_locations`
--
ALTER TABLE `petugas_locations`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aspirasis`
--
ALTER TABLE `aspirasis`
  ADD CONSTRAINT `aspirasis_id_pelaporan_foreign` FOREIGN KEY (`id_pelaporan`) REFERENCES `inputs` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `chat_pengaduans`
--
ALTER TABLE `chat_pengaduans`
  ADD CONSTRAINT `chat_pengaduans_pengaduan_id_foreign` FOREIGN KEY (`pengaduan_id`) REFERENCES `pengaduans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inputs`
--
ALTER TABLE `inputs`
  ADD CONSTRAINT `inputs_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategoris` (`id_kategori`) ON DELETE SET NULL;

--
-- Constraints for table `pengaduans`
--
ALTER TABLE `pengaduans`
  ADD CONSTRAINT `pengaduans_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategoris` (`id_kategori`) ON DELETE SET NULL,
  ADD CONSTRAINT `pengaduans_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `penggunas` (`id_pengguna`) ON DELETE SET NULL;

--
-- Constraints for table `pengaduan_trackings`
--
ALTER TABLE `pengaduan_trackings`
  ADD CONSTRAINT `fk_petugas` FOREIGN KEY (`petugas_id`) REFERENCES `penggunas` (`id_pengguna`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengaduan_trackings_pengaduan_id_foreign` FOREIGN KEY (`pengaduan_id`) REFERENCES `pengaduans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengaduan_trackings_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `penggunas` (`id_pengguna`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
