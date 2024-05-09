-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Bulan Mei 2024 pada 11.51
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatives`
--

CREATE TABLE `alternatives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `wisata_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_id` bigint(20) UNSIGNED NOT NULL,
  `alternative_value` decimal(10,1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alternatives`
--

INSERT INTO `alternatives` (`id`, `criteria_id`, `wisata_id`, `jenis_id`, `alternative_value`, `created_at`, `updated_at`) VALUES
(76, 1, 4, 5, 5.0, '2024-03-24 10:36:38', '2024-04-01 06:05:27'),
(77, 2, 4, 5, 5.0, '2024-03-24 10:36:38', '2024-04-01 06:05:27'),
(78, 3, 4, 5, 5.0, '2024-03-24 10:36:38', '2024-04-01 06:05:27'),
(79, 4, 4, 5, 4.0, '2024-03-24 10:36:39', '2024-04-01 06:05:27'),
(80, 5, 4, 5, 4.0, '2024-03-24 10:36:39', '2024-04-01 06:05:27'),
(81, 1, 5, 5, 4.0, '2024-03-24 10:37:08', '2024-03-24 10:37:08'),
(82, 2, 5, 5, 5.0, '2024-03-24 10:37:08', '2024-03-24 10:37:08'),
(83, 3, 5, 5, 5.0, '2024-03-24 10:37:09', '2024-03-24 10:37:09'),
(84, 4, 5, 5, 4.0, '2024-03-24 10:37:09', '2024-03-24 10:37:09'),
(85, 5, 5, 5, 4.0, '2024-03-24 10:37:09', '2024-03-24 10:37:09'),
(86, 1, 15, 3, 1.0, '2024-03-24 10:37:52', '2024-03-24 10:37:52'),
(87, 2, 15, 3, 4.0, '2024-03-24 10:37:52', '2024-03-24 10:37:52'),
(88, 3, 15, 3, 2.0, '2024-03-24 10:37:52', '2024-03-24 10:37:52'),
(89, 4, 15, 3, 5.0, '2024-03-24 10:37:52', '2024-03-24 10:37:52'),
(90, 5, 15, 3, 4.0, '2024-03-24 10:37:52', '2024-03-24 10:37:52'),
(91, 1, 6, 3, 2.0, '2024-03-24 10:38:16', '2024-03-24 10:38:16'),
(92, 2, 6, 3, 5.0, '2024-03-24 10:38:16', '2024-03-24 10:38:16'),
(93, 3, 6, 3, 5.0, '2024-03-24 10:38:17', '2024-03-24 10:38:17'),
(94, 4, 6, 3, 4.0, '2024-03-24 10:38:17', '2024-03-24 10:38:17'),
(95, 5, 6, 3, 4.0, '2024-03-24 10:38:17', '2024-03-24 10:38:17'),
(96, 1, 1, 6, 2.0, '2024-03-24 10:38:43', '2024-03-24 10:38:43'),
(97, 2, 1, 6, 2.0, '2024-03-24 10:38:44', '2024-03-24 10:38:44'),
(98, 3, 1, 6, 5.0, '2024-03-24 10:38:44', '2024-03-24 10:38:44'),
(99, 4, 1, 6, 5.0, '2024-03-24 10:38:44', '2024-03-24 10:38:44'),
(100, 5, 1, 6, 4.0, '2024-03-24 10:38:44', '2024-03-24 10:38:44'),
(101, 1, 2, 6, 1.0, '2024-03-24 10:39:09', '2024-03-24 10:39:09'),
(102, 2, 2, 6, 2.0, '2024-03-24 10:39:09', '2024-03-24 10:39:09'),
(103, 3, 2, 6, 5.0, '2024-03-24 10:39:09', '2024-03-24 10:39:09'),
(104, 4, 2, 6, 5.0, '2024-03-24 10:39:09', '2024-03-24 10:39:09'),
(105, 5, 2, 6, 4.0, '2024-03-24 10:39:09', '2024-03-24 10:39:09'),
(106, 1, 3, 5, 3.0, '2024-03-24 10:39:47', '2024-03-24 10:39:47'),
(107, 2, 3, 5, 2.0, '2024-03-24 10:39:47', '2024-03-24 10:39:47'),
(108, 3, 3, 5, 5.0, '2024-03-24 10:39:47', '2024-03-24 10:39:47'),
(109, 4, 3, 5, 4.0, '2024-03-24 10:39:47', '2024-03-24 10:39:47'),
(110, 5, 3, 5, 4.0, '2024-03-24 10:39:47', '2024-03-24 10:39:47'),
(111, 1, 13, 2, 2.0, '2024-03-24 10:40:09', '2024-03-24 10:40:09'),
(112, 2, 13, 2, 2.0, '2024-03-24 10:40:09', '2024-03-24 10:40:09'),
(113, 3, 13, 2, 5.0, '2024-03-24 10:40:09', '2024-03-24 10:40:09'),
(114, 4, 13, 2, 4.0, '2024-03-24 10:40:09', '2024-03-24 10:40:09'),
(115, 5, 13, 2, 4.0, '2024-03-24 10:40:09', '2024-03-24 10:40:09'),
(141, 1, 14, 3, 1.0, '2024-03-24 10:42:42', '2024-03-24 10:42:42'),
(142, 2, 14, 3, 4.0, '2024-03-24 10:42:42', '2024-03-24 10:42:42'),
(143, 3, 14, 3, 1.0, '2024-03-24 10:42:42', '2024-03-24 10:42:42'),
(144, 4, 14, 3, 5.0, '2024-03-24 10:42:42', '2024-03-24 10:42:42'),
(145, 5, 14, 3, 4.0, '2024-03-24 10:42:42', '2024-03-24 10:42:42'),
(146, 1, 12, 13, 1.0, '2024-03-24 10:43:01', '2024-03-24 10:43:01'),
(147, 2, 12, 13, 2.0, '2024-03-24 10:43:01', '2024-03-24 10:43:01'),
(148, 3, 12, 13, 5.0, '2024-03-24 10:43:01', '2024-03-24 10:43:01'),
(149, 4, 12, 13, 4.0, '2024-03-24 10:43:01', '2024-03-24 10:43:01'),
(150, 5, 12, 13, 3.0, '2024-03-24 10:43:01', '2024-03-24 10:43:01'),
(171, 1, 65, 6, 3.0, '2024-04-20 13:00:50', '2024-04-20 13:00:50'),
(172, 2, 65, 6, 5.0, '2024-04-20 13:00:51', '2024-04-20 13:00:51'),
(173, 3, 65, 6, 5.0, '2024-04-20 13:00:51', '2024-04-20 13:00:51'),
(174, 4, 65, 6, 4.0, '2024-04-20 13:00:51', '2024-04-20 13:00:51'),
(175, 5, 65, 6, 4.0, '2024-04-20 13:00:51', '2024-04-20 13:00:51'),
(176, 1, 66, 6, 1.0, '2024-04-20 13:01:34', '2024-04-20 13:01:34'),
(177, 2, 66, 6, 5.0, '2024-04-20 13:01:35', '2024-04-20 13:01:35'),
(178, 3, 66, 6, 5.0, '2024-04-20 13:01:35', '2024-04-20 13:01:35'),
(179, 4, 66, 6, 4.0, '2024-04-20 13:01:36', '2024-04-20 13:01:36'),
(180, 5, 66, 6, 4.0, '2024-04-20 13:01:36', '2024-04-20 13:01:36'),
(181, 1, 67, 6, 2.0, '2024-04-20 13:02:24', '2024-04-20 13:02:24'),
(182, 2, 67, 6, 5.0, '2024-04-20 13:02:24', '2024-04-20 13:02:24'),
(183, 3, 67, 6, 5.0, '2024-04-20 13:02:24', '2024-04-20 13:02:24'),
(184, 4, 67, 6, 4.0, '2024-04-20 13:02:24', '2024-04-20 13:02:24'),
(185, 5, 67, 6, 4.0, '2024-04-20 13:02:24', '2024-04-20 13:02:24'),
(186, 1, 68, 6, 1.0, '2024-04-20 13:03:13', '2024-04-20 13:03:13'),
(187, 2, 68, 6, 5.0, '2024-04-20 13:03:13', '2024-04-20 13:03:13'),
(188, 3, 68, 6, 5.0, '2024-04-20 13:03:13', '2024-04-20 13:03:13'),
(189, 4, 68, 6, 3.0, '2024-04-20 13:03:13', '2024-04-20 13:03:13'),
(190, 5, 68, 6, 4.0, '2024-04-20 13:03:13', '2024-04-20 13:03:13'),
(191, 1, 69, 6, 3.0, '2024-04-20 13:03:39', '2024-04-20 13:03:39'),
(192, 2, 69, 6, 5.0, '2024-04-20 13:03:39', '2024-04-20 13:03:39'),
(193, 3, 69, 6, 5.0, '2024-04-20 13:03:39', '2024-04-20 13:03:39'),
(194, 4, 69, 6, 3.0, '2024-04-20 13:03:39', '2024-04-20 13:03:39'),
(195, 5, 69, 6, 4.0, '2024-04-20 13:03:39', '2024-04-20 13:03:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobots`
--

CREATE TABLE `bobots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `criteria_analysis_id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `value` decimal(10,9) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bobots`
--

INSERT INTO `bobots` (`id`, `criteria_analysis_id`, `criteria_id`, `value`, `created_at`, `updated_at`) VALUES
(6, 13, 1, 0.166666667, '2024-03-24 10:32:29', '2024-03-24 10:33:58'),
(7, 13, 2, 0.166666667, '2024-03-24 10:32:29', '2024-03-24 10:33:58'),
(8, 13, 3, 0.250000000, '2024-03-24 10:32:29', '2024-03-24 10:33:58'),
(9, 13, 4, 0.166666667, '2024-03-24 10:32:29', '2024-03-24 10:33:58'),
(10, 13, 5, 0.250000000, '2024-03-24 10:32:29', '2024-03-24 10:33:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `criterias`
--

CREATE TABLE `criterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `skala1` varchar(255) NOT NULL,
  `skala2` varchar(255) NOT NULL,
  `skala3` varchar(255) NOT NULL,
  `skala4` varchar(255) NOT NULL,
  `skala5` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `criterias`
--

INSERT INTO `criterias` (`id`, `nama_kriteria`, `slug`, `kategori`, `keterangan`, `skala1`, `skala2`, `skala3`, `skala4`, `skala5`, `created_at`, `updated_at`) VALUES
(1, 'Jarak', 'jarak', 'COST', 'Jarak dihitung dari titik 0 Kota Malang terhadap destinasi wisata.', 'x ≥ 3 km', '2 km < x ≤ 3 km', '1 km < x ≤ 2 km', '500 m < x ≤ 1 km', 'x ≤ 500 m', '2024-01-26 01:12:19', '2024-05-04 12:49:16'),
(2, 'Waktu Operasional', 'waktu-operasional', 'BENEFIT', 'Waktu operasional dihitung berdasarkan lama waktu buka destinasi wisata.', 'x ≤ 4 jam', '4 jam ≤ x < 8 jam', '8 jam ≤ x < 12 jam', '12 jam ≤ x < 16 jam', 'x ≥ 16 jam', '2024-01-26 01:13:19', '2024-05-04 12:50:56'),
(3, 'Biaya', 'biaya', 'COST', 'Biaya dihitung berdasarkan biaya masuk.', 'x > Rp 40.000', 'Rp 30.000 < x ≤ Rp 40.000', 'Rp 20.000 < x ≤ Rp 30.000', 'Rp 10.000 < x ≤ Rp 20.000', 'x ≤ Rp 10.000', '2024-01-26 01:13:38', '2024-05-04 12:51:21'),
(4, 'Fasilitas', 'fasilitas', 'BENEFIT', 'Fasilitas dihitung berdasarkan kelengkapan fasilitas yang disediakan pengelola wisata.', 'Belum ada', 'Fasilitas Parkir Kendaraan, dan Lain-lain', 'Kamar Mandi, Fasilitas Parkir Kendaraan, dan Lain-Lain', 'Protokol Kesehatan, Kamar Mandi, Fasilitas Parkir Kendaraan, dan Lain-lain', 'Protokol Kesehatan, Kamar Mandi, Kantin, Fasilitas Parkir Kendaraan, dan Lain-lain', '2024-01-26 01:13:55', '2024-05-04 12:53:26'),
(5, 'Rating', 'rating', 'BENEFIT', 'Rating dihitung berdasarkan jumlah bintang yang didapatkan dari review google.', 'Bintang 1', 'Bintang 2', 'Bintang 3', 'Bintang 4', 'Bintang 5', '2024-01-26 01:14:04', '2024-05-04 12:52:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `criteria_analyses`
--

CREATE TABLE `criteria_analyses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `criteria_analyses`
--

INSERT INTO `criteria_analyses` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(13, 1, '2024-03-24 10:29:33', '2024-03-24 10:29:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `criteria_analysis_details`
--

CREATE TABLE `criteria_analysis_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `criteria_analysis_id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id_first` bigint(20) UNSIGNED NOT NULL,
  `criteria_id_second` bigint(20) UNSIGNED NOT NULL,
  `comparison_value` decimal(10,9) NOT NULL DEFAULT 1.000000000,
  `comparison_result` decimal(10,9) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `criteria_analysis_details`
--

INSERT INTO `criteria_analysis_details` (`id`, `criteria_analysis_id`, `criteria_id_first`, `criteria_id_second`, `comparison_value`, `comparison_result`, `created_at`, `updated_at`) VALUES
(196, 13, 1, 1, 1.000000000, 1.000000000, '2024-03-24 10:29:34', '2024-03-24 10:32:27'),
(197, 13, 1, 2, 2.000000000, 2.000000000, '2024-03-24 10:29:34', '2024-03-24 10:32:27'),
(198, 13, 1, 3, 5.000000000, 5.000000000, '2024-03-24 10:29:34', '2024-03-24 10:32:27'),
(199, 13, 1, 4, 4.000000000, 4.000000000, '2024-03-24 10:29:34', '2024-03-24 10:32:27'),
(200, 13, 1, 5, 4.000000000, 4.000000000, '2024-03-24 10:29:34', '2024-03-24 10:32:27'),
(201, 13, 2, 1, 2.000000000, 0.500000000, '2024-03-24 10:29:34', '2024-03-24 10:32:28'),
(202, 13, 2, 2, 1.000000000, 1.000000000, '2024-03-24 10:29:34', '2024-03-24 10:32:28'),
(203, 13, 2, 3, 1.000000000, 1.000000000, '2024-03-24 10:29:34', '2024-03-24 10:32:27'),
(204, 13, 2, 4, 4.000000000, 4.000000000, '2024-03-24 10:29:34', '2024-03-24 10:32:27'),
(205, 13, 2, 5, 3.000000000, 3.000000000, '2024-03-24 10:29:34', '2024-03-24 10:32:27'),
(206, 13, 3, 1, 5.000000000, 0.200000000, '2024-03-24 10:29:34', '2024-03-24 10:32:28'),
(207, 13, 3, 2, 1.000000000, 1.000000000, '2024-03-24 10:29:34', '2024-03-24 10:32:28'),
(208, 13, 3, 3, 1.000000000, 1.000000000, '2024-03-24 10:29:34', '2024-03-24 10:32:28'),
(209, 13, 3, 4, 4.000000000, 4.000000000, '2024-03-24 10:29:34', '2024-03-24 10:32:27'),
(210, 13, 3, 5, 2.000000000, 2.000000000, '2024-03-24 10:29:34', '2024-03-24 10:32:27'),
(211, 13, 4, 1, 4.000000000, 0.250000000, '2024-03-24 10:29:34', '2024-03-24 10:32:28'),
(212, 13, 4, 2, 4.000000000, 0.250000000, '2024-03-24 10:29:35', '2024-03-24 10:32:28'),
(213, 13, 4, 3, 4.000000000, 0.250000000, '2024-03-24 10:29:35', '2024-03-24 10:32:28'),
(214, 13, 4, 4, 1.000000000, 1.000000000, '2024-03-24 10:29:35', '2024-03-24 10:32:28'),
(215, 13, 4, 5, 1.000000000, 1.000000000, '2024-03-24 10:29:35', '2024-03-24 10:32:27'),
(216, 13, 5, 1, 4.000000000, 0.250000000, '2024-03-24 10:29:35', '2024-03-24 10:32:28'),
(217, 13, 5, 2, 3.000000000, 0.333333333, '2024-03-24 10:29:35', '2024-03-24 10:32:28'),
(218, 13, 5, 3, 2.000000000, 0.500000000, '2024-03-24 10:29:35', '2024-03-24 10:32:28'),
(219, 13, 5, 4, 1.000000000, 1.000000000, '2024-03-24 10:29:35', '2024-03-24 10:32:28'),
(220, 13, 5, 5, 1.000000000, 1.000000000, '2024-03-24 10:29:35', '2024-03-24 10:32:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `keterangan` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id`, `jenis_name`, `slug`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'Pariwisata Agro', 'pariwisata-agro', 'Pariwisata agro atau Agro tourism dikenal juga sebagai rural tourism atau farm tourism merupakan jenis pariwisata yang mulai menuai kepopuleran. Biasanya, agro wisata dilakukan di desa-desa dengan tujuan untuk mempelajari kegiatan pertanian, perkebunan, atau peternakan di daerah tersebut. Wisatawan bisa turut terlibat aktif dalam kegiatan-kegiatan pertanian, perkebunan, dan peternakan dengan cara memberi makan binatang ternak, memetik hasil pertanian, sampai ikut mengolah hasil panen menjadi oleh-oleh yang bisa dibawa pulang.', '2024-01-26 01:34:59', '2024-04-20 14:29:35'),
(3, 'Pariwisata Kota', 'pariwisata-kota', 'Pariwisata kota atau city tourism dilakukan dengan tujuan untuk mengenal seluk-beluk perkotaan lengkap dengan hingar bingar kebudayaannya. Wisata kota biasanya dikaitkan dengan kunjungan-kunjungan ke berbagai landmark kota, juga berbagai tempat perbelanjaan dan hiburan baik siang maupun malam.', '2024-01-26 01:35:15', '2024-04-20 11:16:16'),
(4, 'Pariwisata Etnik', 'pariwisata-etnik', 'Pariwisata etnik atau ethnic tourism merupakan perjalanan wisata yang bertujuan untuk mengamati kebudayaan dan gaya hidup masyarakat di daerah tujuan wisata. Selain untuk hiburan, pariwisata etnik biasanya dilakukan untuk kepentingan studi atau penelitian. Wisatawan tidak hanya datang dan berkunjung untuk melihat-lihat tapi juga ikut tinggal bersama masyarakat setempat untuk mempelajari budaya dan gaya hidup mereka.', '2024-01-26 01:35:41', '2024-04-20 11:02:50'),
(5, 'Pariwisata Maritim', 'pariwisata-maritim', 'Pariwisata maritim atau wisata bahari berkaitan erat dengan kegiatan di laut. Kegiatan yang bisa dilakukan dalam wisata bahari termasuk memancing, berenang di laut, menyelam, berlayar, berselancar, sampai ikut terlibat dalam konservasi laut, seperti menanam terumbu karang.', '2024-01-26 01:36:34', '2024-04-20 11:45:37'),
(6, 'Pariwisata Rekreasi', 'pariwisata-rekreasi', 'Pariwisata rekreasi adalah kegiatan wisata yang dilakukan dengan tujuan rekreasional. Pariwisata rekreasi cocok dilakukan bersama keluarga atau kelompok. Kegiatan ini bisa dilakukan di berbagai tempat seperti hutan, atau yang paling sering adalah di taman hiburan tempat banyak wahana permainan tersedia.', '2024-01-26 01:39:37', '2024-04-20 14:37:51'),
(9, 'Pariwisata Budaya', 'pariwisata-budaya', 'Pariwisata budaya atau culture tourism bertujuan untuk mempelajari kebudayaan masyarakat di daerah tujuan wisata pada rentang waktu tertentu. Yang membedakan wisata budaya dengan wisata etnik, pada wisata budaya wisatawan tidak harus tinggal bersama masyarakat. Wisata ini bisa dilakukan dengan cara mengamati serta mengunjungi berbagai museum dan situs-situs sejarah, sehingga wisatawan mendapatkan gambaran yang lebih baik mengenai kebudayaan masyarakat daerah tersebut.', '2024-01-26 01:40:29', '2024-04-20 11:14:20'),
(13, 'Pariwisata Alam', 'pariwisata-alam', 'Pariwisata alam atau eco tourism akhir-akhir ini menuai ketenaran. Berkat tayangan-tayangan wisata jelajah alam, banyak anak muda yang kemudian tertarik mengunjungi lokasi-lokasi yang masih alami dan belum tercemar. Tujuan dari wisata alam adalah untuk mengagumi keindahan alam yang masih murni sekaligus untuk mengambil jeda sejenak dari beraneka macam kebisingan dan kesibukan perkotaan. Sering kali, wisatawan juga terlibat dalam kegiatan konservasi alam.', '2024-01-27 10:01:02', '2024-04-20 11:15:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_27_121522_create_criterias_table', 1),
(6, '2024_01_27_121702_create_jenis_table', 1),
(7, '2024_01_27_121944_create_wisata_table', 1),
(8, '2024_01_27_122211_create_alternatives_table', 1),
(9, '2024_01_27_122421_create_criteria_analyses_table', 1),
(10, '2024_01_27_122610_create_criteria_analysis_details_table', 1),
(11, '2024_01_27_122813_create_priority_values_table', 1),
(12, '2024_02_14_111054_create_bobots_table', 2),
(13, '2024_02_19_175959_create_bobots_details_table', 3),
(14, '2024_03_25_170546_create_comments_table', 4),
(15, '2024_03_25_170546_create_saran_table', 5),
(16, '2024_04_26_164738_create_skalas_table', 5),
(17, '2024_04_26_165803_create_subcriterias_table', 5),
(18, '2024_04_26_164738_create_skala_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `priority_values`
--

CREATE TABLE `priority_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `criteria_analysis_id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `value` decimal(10,9) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `priority_values`
--

INSERT INTO `priority_values` (`id`, `criteria_analysis_id`, `criteria_id`, `value`, `created_at`, `updated_at`) VALUES
(27, 13, 1, 0.437084206, '2024-03-24 10:32:29', '2024-03-24 10:32:29'),
(28, 13, 2, 0.226585672, '2024-03-24 10:32:29', '2024-03-24 10:32:29'),
(29, 13, 3, 0.181131126, '2024-03-24 10:32:29', '2024-03-24 10:32:29'),
(30, 13, 4, 0.072555508, '2024-03-24 10:32:29', '2024-03-24 10:32:29'),
(31, 13, 5, 0.082643485, '2024-03-24 10:32:29', '2024-03-24 10:32:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL DEFAULT 'USER',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin1', 'admin@gmail.com', NULL, '$2y$10$HfXv0nSEVnN.edAG14GbV.8GKX9fpxQcWnP7bczMUejL4rU4ObyZe', 'ADMIN', 'rEQWrFz4YhpyYK3mumhVqOpsXAPH38Ua8iYktNAJROBdg0TU2LDKTkZrCNez', '2024-01-26 00:41:22', '2024-03-03 13:32:08'),
(2, 'Wisatawan 1', 'wisatawan1', 'wisatawan1@gmail.com', NULL, '$2y$10$FzMIG6gf50j4LEWHHW3ype3IJVu6vUF5BlYGvC52YjwsG5sYjXhXi', 'USER', NULL, '2024-01-26 00:41:22', '2024-03-31 10:44:37'),
(5, 'Wisatawan 2', 'wisatawan2', 'wisatawan2@gmail.com', NULL, '$2y$10$mKmVZB0zHi4hWqEUkSlXcemKid263oAbCOF8WN7oe0oJX2vzj8A8G', 'USER', NULL, '2024-03-31 08:29:18', '2024-03-31 08:29:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisatas`
--

CREATE TABLE `wisatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_wisata` varchar(255) NOT NULL,
  `lokasi_maps` varchar(255) NOT NULL,
  `link_foto` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `fasilitas` varchar(255) NOT NULL,
  `biaya` int(11) NOT NULL,
  `situs` varchar(255) NOT NULL,
  `validasi` int(11) NOT NULL,
  `tampil` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `wisatas`
--

INSERT INTO `wisatas` (`id`, `jenis_id`, `user_id`, `nama_wisata`, `lokasi_maps`, `link_foto`, `keterangan`, `fasilitas`, `biaya`, `situs`, `validasi`, `tampil`, `created_at`, `updated_at`) VALUES
(1, 9, 1, 'Museum Brawijaya', 'https://maps.app.goo.gl/qq1Qp9nRASdtALSE9', 'https://lh5.googleusercontent.com/p/AF1QipMwzblRgzRwyMN3el6yVWzYZ86tcar-M8FFAaal=w408-h544-k-no', '-', 'Protokol Kesehatan, Kamar Mandi, Kantin, Fasilitas Parkir Kendaraan, dan Lain-lain', 10000, '-', 2, 2, '2024-01-26 13:52:58', '2024-04-20 11:53:27'),
(2, 9, 1, 'Museum Mpu Purwa', 'https://maps.app.goo.gl/DC2m18bTD7Zimah89', 'https://lh5.googleusercontent.com/p/AF1QipNKjNcJHpSh7hfZTRvckJW_rHf5dwIGdjudUFQ7=w408-h306-k-no', '-', 'Protokol Kesehatan, Kamar Mandi, Kantin, Fasilitas Parkir Kendaraan, dan Lain-lain', 0, '-', 2, 2, '2024-01-26 14:15:17', '2024-04-20 11:54:34'),
(3, 9, 1, 'Museum Musik Indonesia', 'https://maps.app.goo.gl/JPgTLwhARqP3HLDw6', 'https://lh5.googleusercontent.com/p/AF1QipNWaaxJEuH_aHIyaYNF4h0BWI-o17U9td-GPyd3=w426-h240-k-no', '-', 'Protokol Kesehatan, Kamar Mandi, Fasilitas Parkir Kendaraan, dan Lain-lain', 10000, '-', 2, 2, '2024-01-26 14:27:30', '2024-04-20 12:04:32'),
(4, 3, 1, 'Alun-Alun Kota Malang', 'https://maps.app.goo.gl/6YRPUvhgkyKzigcw5', 'https://lh5.googleusercontent.com/p/AF1QipNfQVEIIsGhRtFapETywE64G-evI2aD035MZkPz=w408-h306-k-no', '-', 'Protokol Kesehatan, Kamar Mandi, Fasilitas Parkir Kendaraan, dan Lain-lain', 0, '-', 2, 2, '2024-01-27 09:50:50', '2024-04-20 11:47:35'),
(5, 3, 1, 'Alun-Alun Tugu Balaikota', 'https://maps.app.goo.gl/vEQh8WnLwNTpdK276', 'https://lh5.googleusercontent.com/p/AF1QipP85I11wPOa0U-RBu_FrCdkplFHBCMla1HSewjE=w408-h272-k-no', '-', 'Protokol Kesehatan, Kamar Mandi, Fasilitas Parkir Kendaraan, dan Lain-lain', 0, '-', 2, 2, '2024-01-27 09:51:45', '2024-04-20 11:49:18'),
(6, 6, 1, 'Idjen Boulevard', 'https://maps.app.goo.gl/JthHcEx724CsycBw8', 'https://lh5.googleusercontent.com/p/AF1QipPeSbaPLf2cKKYgnB97uJIxKUCfUWVJOxEiCPoQ=w408-h545-k-no', '-', 'Protokol Kesehatan, Kamar Mandi, Fasilitas Parkir Kendaraan, dan Lain-lain', 0, '-', 2, 2, '2024-01-27 09:53:57', '2024-04-20 11:52:48'),
(12, 6, 1, 'Wisata Gantangan Burung', 'https://maps.app.goo.gl/rbm3YoXyZwY2pYQD9', 'https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=aoI-eBra95S4jj2ud8Etjw&cb_client=search.gws-prod.gps&w=408&h=240&yaw=180.46297&pitch=0&thumbfov=100', '-', 'Protokol Kesehatan, Kamar Mandi, Fasilitas Parkir Kendaraan, dan Lain-lain', 0, '-', 2, 2, '2024-01-27 10:00:22', '2024-04-20 12:05:09'),
(13, 9, 1, 'Perpustakaan Kota Malang', 'https://maps.app.goo.gl/G8LSkSrtzEAT69eQ9', 'https://lh5.googleusercontent.com/p/AF1QipOddLcwcM_ORBRyXLUOWKgawFInvAjv_n9PyjHO=w408-h725-k-no', '-', 'Protokol Kesehatan, Kamar Mandi, Fasilitas Parkir Kendaraan, dan Lain-lain', 0, '-', 2, 2, '2024-01-27 10:02:20', '2024-05-04 15:10:56'),
(14, 6, 1, 'Trans Studio Mini', 'https://maps.app.goo.gl/13gZzztqqJ84Wgei9', 'https://lh5.googleusercontent.com/p/AF1QipMLJsBBj6L0URJZl3yrPPy8zIjT43IBLXeDnsic=w408-h543-k-no', '-', 'Protokol Kesehatan, Kamar Mandi, Kantin, Fasilitas Parkir Kendaraan, dan Lain-lain', 60000, '-', 2, 2, '2024-01-27 10:03:54', '2024-04-20 12:04:52'),
(15, 6, 1, 'Club House Istana Dieng', 'https://maps.app.goo.gl/WVJsgGGZhH6JF3F58', 'https://lh5.googleusercontent.com/p/AF1QipOrt5hFdZ1ELcU16eSYZhcWJjMuvRld3mxuRIN8=w408-h306-k-no', '-', 'Protokol Kesehatan, Kamar Mandi, Kantin, Fasilitas Parkir Kendaraan, dan Lain-lain', 35000, '-', 2, 2, '2024-01-27 10:04:52', '2024-04-20 11:51:48'),
(37, 6, 2, 'Jatim Park I', '-', '-', '-', '-', 0, '-', 2, 1, '2024-04-01 08:15:23', '2024-05-04 16:02:39'),
(38, 3, 2, 'Jatim Park II', '-', '-', '-', '-', 0, '-', 1, 1, '2024-04-01 08:19:18', '2024-04-01 08:20:17'),
(39, 3, 2, 'Museum Angkut +', '-', '-', '-', '-', 0, '-', 0, 1, '2024-04-01 08:19:32', '2024-04-16 10:56:10'),
(65, 6, 1, 'Taman Cerdas Trunojoyo', 'https://maps.app.goo.gl/qVLgtd7Z5jjFV4xB6', 'https://lh5.googleusercontent.com/p/AF1QipOd9Di7BFBXlw-YgzMLoS00Au3rukdYZC5ayu9g=w408-h306-k-no', '-', 'Protokol Kesehatan, Kamar Mandi, Fasilitas Parkir Kendaraan, dan Lain-lain', 0, '-', 2, 2, '2024-04-20 12:10:15', '2024-04-20 12:10:15'),
(66, 6, 1, 'Taman Kunang-Kunang', 'https://maps.app.goo.gl/GnfQdxrZ2BNhx1ns9', 'https://lh5.googleusercontent.com/p/AF1QipMmsNlmcgM5EMHI4TN6M4qbggFczKKq2CK9eJ_n=w408-h306-k-no', '-', 'Protokol Kesehatan, Kamar Mandi, Fasilitas Parkir Kendaraan, dan Lain-lain', 0, '-', 2, 2, '2024-04-20 12:17:43', '2024-04-20 12:17:43'),
(67, 6, 1, 'Taman Merbabu', 'https://maps.app.goo.gl/1t7fxaMYJRjjebUS9', 'https://lh5.googleusercontent.com/p/AF1QipNsAzAewNrVq0af8BUi0UoKW73X5Og4MlNN-fzZ=w408-h271-k-no', '-', 'Protokol Kesehatan, Kamar Mandi, Fasilitas Parkir Kendaraan, dan Lain-lain', 0, '-', 2, 2, '2024-04-20 12:23:58', '2024-04-20 12:23:58'),
(68, 6, 1, 'Taman Singha Merjosari', 'https://maps.app.goo.gl/6fysej8Epp9iEZ9k8', 'https://lh5.googleusercontent.com/p/AF1QipOOOJFVGoQtRD1zd_Xffq9pFHK17_nCoqGNhfwG=w408-h268-k-no', '-', 'Kamar Mandi, Fasilitas Parkir Kendaraan, dan Lain-lain', 0, '-', 2, 2, '2024-04-20 12:30:28', '2024-04-20 12:30:28'),
(69, 6, 1, 'Taman Slamet', 'https://maps.app.goo.gl/UKskN6m6MA5N9Xyr9', 'https://lh5.googleusercontent.com/p/AF1QipObU9-aO9B1ulsnAXjvxXZrUEGspaVHmwImWfEz=w408-h306-k-no', '-', 'Kamar Mandi, Fasilitas Parkir Kendaraan, dan Lain-lain', 0, '-', 2, 2, '2024-04-20 12:57:24', '2024-04-20 12:57:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatives`
--
ALTER TABLE `alternatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatives_criteria_id_foreign` (`criteria_id`),
  ADD KEY `alternatives_wisata_id_foreign` (`wisata_id`) USING BTREE,
  ADD KEY `alternatives_jenis_id_foreign` (`jenis_id`) USING BTREE;

--
-- Indeks untuk tabel `bobots`
--
ALTER TABLE `bobots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bobots_criteria_analysis_id_foreign` (`criteria_analysis_id`),
  ADD KEY `bobots_criteria_id_foreign` (`criteria_id`);

--
-- Indeks untuk tabel `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `criterias_name_unique` (`nama_kriteria`),
  ADD UNIQUE KEY `criterias_slug_unique` (`slug`);

--
-- Indeks untuk tabel `criteria_analyses`
--
ALTER TABLE `criteria_analyses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criteria_analyses_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `criteria_analysis_details`
--
ALTER TABLE `criteria_analysis_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criteria_analysis_details_criteria_analysis_id_foreign` (`criteria_analysis_id`),
  ADD KEY `criteria_analysis_details_criteria_id_first_foreign` (`criteria_id_first`),
  ADD KEY `criteria_analysis_details_criteria_id_second_foreign` (`criteria_id_second`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jenis_jenis_name_unique` (`jenis_name`) USING BTREE,
  ADD UNIQUE KEY `jenis_slug_unique` (`slug`) USING BTREE;

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `priority_values`
--
ALTER TABLE `priority_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `priority_values_criteria_analysis_id_foreign` (`criteria_analysis_id`),
  ADD KEY `priority_values_criteria_id_foreign` (`criteria_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `wisatas`
--
ALTER TABLE `wisatas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wisata_jenis_id_foreign` (`jenis_id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatives`
--
ALTER TABLE `alternatives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT untuk tabel `bobots`
--
ALTER TABLE `bobots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `criteria_analyses`
--
ALTER TABLE `criteria_analyses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `criteria_analysis_details`
--
ALTER TABLE `criteria_analysis_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `priority_values`
--
ALTER TABLE `priority_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `wisatas`
--
ALTER TABLE `wisatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alternatives`
--
ALTER TABLE `alternatives`
  ADD CONSTRAINT `alternatives_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alternatives_kelas_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alternatives_student_id_foreign` FOREIGN KEY (`wisata_id`) REFERENCES `wisatas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bobots`
--
ALTER TABLE `bobots`
  ADD CONSTRAINT `bobots_criteria_analysis_id_foreign` FOREIGN KEY (`criteria_analysis_id`) REFERENCES `criteria_analyses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bobots_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `criteria_analyses`
--
ALTER TABLE `criteria_analyses`
  ADD CONSTRAINT `criteria_analyses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `criteria_analysis_details`
--
ALTER TABLE `criteria_analysis_details`
  ADD CONSTRAINT `criteria_analysis_details_criteria_analysis_id_foreign` FOREIGN KEY (`criteria_analysis_id`) REFERENCES `criteria_analyses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `criteria_analysis_details_criteria_id_first_foreign` FOREIGN KEY (`criteria_id_first`) REFERENCES `criterias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `criteria_analysis_details_criteria_id_second_foreign` FOREIGN KEY (`criteria_id_second`) REFERENCES `criterias` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `priority_values`
--
ALTER TABLE `priority_values`
  ADD CONSTRAINT `priority_values_criteria_analysis_id_foreign` FOREIGN KEY (`criteria_analysis_id`) REFERENCES `criteria_analyses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `priority_values_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wisatas`
--
ALTER TABLE `wisatas`
  ADD CONSTRAINT `students_kelas_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
