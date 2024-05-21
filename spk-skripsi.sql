-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Bulan Mei 2024 pada 07.44
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
(1, 1, 1, 5, 5.0, '2024-05-18 12:01:12', '2024-05-18 12:01:12'),
(2, 2, 1, 5, 5.0, '2024-05-18 12:01:12', '2024-05-18 12:01:12'),
(3, 3, 1, 5, 5.0, '2024-05-18 12:01:12', '2024-05-18 12:01:12'),
(4, 4, 1, 5, 5.0, '2024-05-18 12:01:13', '2024-05-18 12:01:13'),
(5, 5, 1, 5, 4.0, '2024-05-18 12:01:13', '2024-05-18 12:01:13'),
(6, 1, 2, 5, 1.0, '2024-05-18 12:02:14', '2024-05-18 12:02:14'),
(7, 2, 2, 5, 5.0, '2024-05-18 12:02:14', '2024-05-18 12:02:14'),
(8, 3, 2, 5, 5.0, '2024-05-18 12:02:14', '2024-05-18 12:02:14'),
(9, 4, 2, 5, 5.0, '2024-05-18 12:02:14', '2024-05-18 12:02:14'),
(10, 5, 2, 5, 4.0, '2024-05-18 12:02:14', '2024-05-18 12:02:14'),
(11, 1, 3, 7, 1.0, '2024-05-18 12:02:49', '2024-05-18 12:02:49'),
(12, 2, 3, 7, 3.0, '2024-05-18 12:02:49', '2024-05-18 12:02:49'),
(13, 3, 3, 7, 1.0, '2024-05-18 12:02:49', '2024-05-18 12:02:49'),
(14, 4, 3, 7, 5.0, '2024-05-18 12:02:49', '2024-05-18 12:02:49'),
(15, 5, 3, 7, 4.0, '2024-05-18 12:02:50', '2024-05-18 12:02:50'),
(16, 1, 4, 7, 4.0, '2024-05-18 12:03:25', '2024-05-18 12:03:25'),
(17, 2, 4, 7, 5.0, '2024-05-18 12:03:25', '2024-05-18 12:03:25'),
(18, 3, 4, 7, 4.0, '2024-05-18 12:03:25', '2024-05-18 12:03:25'),
(19, 4, 4, 7, 5.0, '2024-05-18 12:03:25', '2024-05-18 12:03:25'),
(20, 5, 4, 7, 4.0, '2024-05-18 12:03:25', '2024-05-18 12:03:25'),
(21, 1, 5, 3, 1.0, '2024-05-18 12:03:54', '2024-05-18 12:03:54'),
(22, 2, 5, 3, 3.0, '2024-05-18 12:03:54', '2024-05-18 12:03:54'),
(23, 3, 5, 3, 5.0, '2024-05-18 12:03:54', '2024-05-18 12:03:54'),
(24, 4, 5, 3, 5.0, '2024-05-18 12:03:54', '2024-05-18 12:03:54'),
(25, 5, 5, 3, 4.0, '2024-05-18 12:03:54', '2024-05-18 12:03:54'),
(26, 1, 6, 3, 1.0, '2024-05-18 12:04:23', '2024-05-18 12:04:23'),
(27, 2, 6, 3, 3.0, '2024-05-18 12:04:23', '2024-05-18 12:04:23'),
(28, 3, 6, 3, 5.0, '2024-05-18 12:04:23', '2024-05-18 12:04:23'),
(29, 4, 6, 3, 5.0, '2024-05-18 12:04:23', '2024-05-18 12:04:23'),
(30, 5, 6, 3, 4.0, '2024-05-18 12:04:23', '2024-05-18 12:04:23'),
(31, 1, 7, 3, 1.0, '2024-05-18 12:04:44', '2024-05-18 12:04:44'),
(32, 2, 7, 3, 3.0, '2024-05-18 12:04:44', '2024-05-18 12:04:44'),
(33, 3, 7, 3, 5.0, '2024-05-18 12:04:44', '2024-05-18 12:04:44'),
(34, 4, 7, 3, 5.0, '2024-05-18 12:04:44', '2024-05-18 12:04:44'),
(35, 5, 7, 3, 4.0, '2024-05-18 12:04:44', '2024-05-18 12:04:44'),
(36, 1, 8, 7, 1.0, '2024-05-18 12:05:25', '2024-05-18 12:05:25'),
(37, 2, 8, 7, 3.0, '2024-05-18 12:05:25', '2024-05-18 12:05:25'),
(38, 3, 8, 7, 1.0, '2024-05-18 12:05:25', '2024-05-18 12:05:25'),
(39, 4, 8, 7, 5.0, '2024-05-18 12:05:25', '2024-05-18 12:05:25'),
(40, 5, 8, 7, 4.0, '2024-05-18 12:05:26', '2024-05-18 12:05:26'),
(41, 1, 9, 7, 1.0, '2024-05-18 12:05:51', '2024-05-18 12:05:51'),
(42, 2, 9, 7, 3.0, '2024-05-18 12:05:51', '2024-05-18 12:05:51'),
(43, 3, 9, 7, 1.0, '2024-05-18 12:05:51', '2024-05-18 12:05:51'),
(44, 4, 9, 7, 5.0, '2024-05-18 12:05:51', '2024-05-18 12:05:51'),
(45, 5, 9, 7, 4.0, '2024-05-18 12:05:51', '2024-05-18 12:05:51'),
(46, 1, 10, 7, 1.0, '2024-05-18 12:06:17', '2024-05-18 12:06:17'),
(47, 2, 10, 7, 3.0, '2024-05-18 12:06:17', '2024-05-18 12:06:17'),
(48, 3, 10, 7, 1.0, '2024-05-18 12:06:17', '2024-05-18 12:06:17'),
(49, 4, 10, 7, 5.0, '2024-05-18 12:06:17', '2024-05-18 12:06:17'),
(50, 5, 10, 7, 4.0, '2024-05-18 12:06:17', '2024-05-18 12:06:17'),
(51, 1, 11, 7, 1.0, '2024-05-18 12:06:47', '2024-05-18 12:06:47'),
(52, 2, 11, 7, 3.0, '2024-05-18 12:06:47', '2024-05-18 12:06:47'),
(53, 3, 11, 7, 1.0, '2024-05-18 12:06:47', '2024-05-18 12:06:47'),
(54, 4, 11, 7, 5.0, '2024-05-18 12:06:47', '2024-05-18 12:06:47'),
(55, 5, 11, 7, 4.0, '2024-05-18 12:06:48', '2024-05-18 12:06:48'),
(56, 1, 12, 7, 1.0, '2024-05-18 12:07:15', '2024-05-18 12:07:15'),
(57, 2, 12, 7, 2.0, '2024-05-18 12:07:15', '2024-05-18 12:07:15'),
(58, 3, 12, 7, 1.0, '2024-05-18 12:07:15', '2024-05-18 12:07:15'),
(59, 4, 12, 7, 5.0, '2024-05-18 12:07:15', '2024-05-18 12:07:15'),
(60, 5, 12, 7, 4.0, '2024-05-18 12:07:15', '2024-05-18 12:07:15'),
(61, 1, 13, 3, 2.0, '2024-05-18 12:07:43', '2024-05-18 12:07:43'),
(62, 2, 13, 3, 2.0, '2024-05-18 12:07:43', '2024-05-18 12:07:43'),
(63, 3, 13, 3, 5.0, '2024-05-18 12:07:43', '2024-05-18 12:07:43'),
(64, 4, 13, 3, 5.0, '2024-05-18 12:07:43', '2024-05-18 12:07:43'),
(65, 5, 13, 3, 4.0, '2024-05-18 12:07:44', '2024-05-18 12:07:44'),
(66, 1, 14, 6, 1.0, '2024-05-18 12:08:11', '2024-05-18 12:08:11'),
(67, 2, 14, 6, 5.0, '2024-05-18 12:08:11', '2024-05-18 12:08:11'),
(68, 3, 14, 6, 5.0, '2024-05-18 12:08:11', '2024-05-18 12:08:11'),
(69, 4, 14, 6, 5.0, '2024-05-18 12:08:11', '2024-05-18 12:08:11'),
(70, 5, 14, 6, 4.0, '2024-05-18 12:08:11', '2024-05-18 12:08:11'),
(71, 1, 15, 6, 1.0, '2024-05-18 12:08:29', '2024-05-18 12:08:29'),
(72, 2, 15, 6, 5.0, '2024-05-18 12:08:29', '2024-05-18 12:08:29'),
(73, 3, 15, 6, 5.0, '2024-05-18 12:08:29', '2024-05-18 12:08:29'),
(74, 4, 15, 6, 5.0, '2024-05-18 12:08:29', '2024-05-18 12:08:29'),
(75, 5, 15, 6, 4.0, '2024-05-18 12:08:30', '2024-05-18 12:08:30');

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
(1, 1, 1, 0.178082192, '2024-05-19 02:45:45', '2024-05-20 10:54:10'),
(2, 1, 2, 0.178082192, '2024-05-19 02:45:46', '2024-05-20 10:54:10'),
(3, 1, 3, 0.191780822, '2024-05-19 02:45:46', '2024-05-20 10:54:10'),
(4, 1, 4, 0.246575342, '2024-05-19 02:45:46', '2024-05-20 10:54:10'),
(5, 1, 5, 0.205479452, '2024-05-19 02:45:46', '2024-05-20 10:54:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `criterias`
--

CREATE TABLE `criterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `kategori` longtext NOT NULL,
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
(1, 'Jarak', 'jarak', 'COST', 'Jarak dihitung dari titik 0 Kota Malang terhadap destinasi wisata.', 'x ≥ 3 km', '2 km < x ≤ 3 km', '1 km < x ≤ 2 km', '500 m < x ≤ 1 km', 'x ≤ 500 m', '2024-05-18 10:16:55', '2024-05-18 12:28:10'),
(2, 'Waktu Operasional', 'waktu-operasional', 'BENEFIT', 'Waktu operasional dihitung berdasarkan lama waktu buka destinasi wisata.', 'x ≤ 4 jam', '4 jam ≤ x < 8 jam', '8 jam ≤ x < 12 jam', '12 jam ≤ x < 16 jam', 'x ≥ 16 jam', '2024-05-18 10:17:50', '2024-05-18 10:17:50'),
(3, 'Biaya', 'biaya', 'COST', 'Biaya dihitung berdasarkan biaya masuk.', 'x > Rp 40.000', 'Rp 30.000 < x ≤ Rp 40.000', 'Rp 20.000 < x ≤ Rp 30.000', 'Rp 10.000 < x ≤ Rp 20.000', 'x ≤ Rp 10.000', '2024-05-18 10:19:08', '2024-05-18 10:19:08'),
(4, 'Fasilitas', 'fasilitas', 'BENEFIT', 'Fasilitas dihitung berdasarkan kelengkapan fasilitas yang disediakan pengelola wisata.', 'Belum ada', 'Fasilitas Parkir Kendaraan, dan Lain-lain', 'Kamar Mandi, Fasilitas Parkir Kendaraan, dan Lain-Lain', 'Protokol Kesehatan, Kamar Mandi, Fasilitas Parkir Kendaraan, dan Lain-lain', 'Protokol Kesehatan, Kamar Mandi, Kantin, Fasilitas Parkir Kendaraan, dan Lain-lain', '2024-05-18 10:20:10', '2024-05-18 10:20:10'),
(5, 'Rating', 'rating', 'BENEFIT', 'Rating dihitung berdasarkan jumlah bintang yang didapatkan dari review google.', 'Bintang 1', 'Bintang 2', 'Bintang 3', 'Bintang 4', 'Bintang 5', '2024-05-18 10:20:48', '2024-05-18 10:20:48');

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
(1, 1, '2024-05-19 02:44:28', '2024-05-19 02:44:28');

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
(1, 1, 1, 1, 1.000000000, 1.000000000, '2024-05-19 02:44:29', '2024-05-20 10:50:24'),
(2, 1, 1, 2, 2.000000000, 2.000000000, '2024-05-19 02:44:29', '2024-05-20 10:50:24'),
(3, 1, 1, 3, 1.000000000, 1.000000000, '2024-05-19 02:44:29', '2024-05-20 10:50:24'),
(4, 1, 1, 4, 4.000000000, 4.000000000, '2024-05-19 02:44:30', '2024-05-20 10:50:24'),
(5, 1, 1, 5, 4.000000000, 4.000000000, '2024-05-19 02:44:30', '2024-05-20 10:50:24'),
(6, 1, 2, 1, 2.000000000, 0.500000000, '2024-05-19 02:44:30', '2024-05-20 10:50:24'),
(7, 1, 2, 2, 1.000000000, 1.000000000, '2024-05-19 02:44:30', '2024-05-20 10:50:24'),
(8, 1, 2, 3, 1.000000000, 1.000000000, '2024-05-19 02:44:30', '2024-05-20 10:50:24'),
(9, 1, 2, 4, 4.000000000, 4.000000000, '2024-05-19 02:44:30', '2024-05-20 10:50:24'),
(10, 1, 2, 5, 3.000000000, 3.000000000, '2024-05-19 02:44:30', '2024-05-20 10:50:24'),
(11, 1, 3, 1, 1.000000000, 1.000000000, '2024-05-19 02:44:30', '2024-05-20 10:50:24'),
(12, 1, 3, 2, 1.000000000, 1.000000000, '2024-05-19 02:44:31', '2024-05-20 10:50:24'),
(13, 1, 3, 3, 1.000000000, 1.000000000, '2024-05-19 02:44:31', '2024-05-20 10:50:24'),
(14, 1, 3, 4, 4.000000000, 4.000000000, '2024-05-19 02:44:31', '2024-05-20 10:50:24'),
(15, 1, 3, 5, 2.000000000, 2.000000000, '2024-05-19 02:44:31', '2024-05-20 10:50:24'),
(16, 1, 4, 1, 4.000000000, 0.250000000, '2024-05-19 02:44:31', '2024-05-20 10:50:24'),
(17, 1, 4, 2, 4.000000000, 0.250000000, '2024-05-19 02:44:31', '2024-05-20 10:50:25'),
(18, 1, 4, 3, 4.000000000, 0.250000000, '2024-05-19 02:44:32', '2024-05-20 10:50:25'),
(19, 1, 4, 4, 1.000000000, 1.000000000, '2024-05-19 02:44:32', '2024-05-20 10:50:25'),
(20, 1, 4, 5, 1.000000000, 1.000000000, '2024-05-19 02:44:32', '2024-05-20 10:50:24'),
(21, 1, 5, 1, 4.000000000, 0.250000000, '2024-05-19 02:44:34', '2024-05-20 10:50:25'),
(22, 1, 5, 2, 3.000000000, 0.333333333, '2024-05-19 02:44:34', '2024-05-20 10:50:25'),
(23, 1, 5, 3, 2.000000000, 0.500000000, '2024-05-19 02:44:35', '2024-05-20 10:50:25'),
(24, 1, 5, 4, 1.000000000, 1.000000000, '2024-05-19 02:44:35', '2024-05-20 10:50:25'),
(25, 1, 5, 5, 1.000000000, 1.000000000, '2024-05-19 02:44:35', '2024-05-20 10:50:25');

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
(1, 'Pariwisata Agro', 'pariwisata-agro', 'Pariwisata agro atau Agro tourism dikenal juga sebagai rural tourism atau farm tourism merupakan jenis pariwisata yang mulai menuai kepopuleran. Biasanya, agro wisata dilakukan di desa-desa dengan tujuan untuk mempelajari kegiatan pertanian, perkebunan, atau peternakan di daerah tersebut. Wisatawan bisa turut terlibat aktif dalam kegiatan-kegiatan pertanian, perkebunan, dan peternakan dengan cara memberi makan binatang ternak, memetik hasil pertanian, sampai ikut mengolah hasil panen menjadi oleh-oleh yang bisa dibawa pulang.', '2024-05-18 10:35:33', '2024-05-18 10:35:33'),
(2, 'Pariwisata Alam', 'pariwisata-alam', 'Pariwisata alam atau eco tourism akhir-akhir ini menuai ketenaran. Berkat tayangan-tayangan wisata jelajah alam, banyak anak muda yang kemudian tertarik mengunjungi lokasi-lokasi yang masih alami dan belum tercemar. Tujuan dari wisata alam adalah untuk mengagumi keindahan alam yang masih murni sekaligus untuk mengambil jeda sejenak dari beraneka macam kebisingan dan kesibukan perkotaan. Sering kali, wisatawan juga terlibat dalam kegiatan konservasi alam.', '2024-05-18 10:35:52', '2024-05-18 10:35:52'),
(3, 'Pariwisata Budaya', 'pariwisata-budaya', 'Pariwisata budaya atau culture tourism bertujuan untuk mempelajari kebudayaan masyarakat di daerah tujuan wisata pada rentang waktu tertentu. Yang membedakan wisata budaya dengan wisata etnik, pada wisata budaya wisatawan tidak harus tinggal bersama masyarakat. Wisata ini bisa dilakukan dengan cara mengamati serta mengunjungi berbagai museum dan situs-situs sejarah, sehingga wisatawan mendapatkan gambaran yang lebih baik mengenai kebudayaan masyarakat daerah tersebut.', '2024-05-18 10:36:11', '2024-05-18 10:36:11'),
(4, 'Pariwisata Etnik', 'pariwisata-etnik', 'Pariwisata etnik atau ethnic tourism merupakan perjalanan wisata yang bertujuan untuk mengamati kebudayaan dan gaya hidup masyarakat di daerah tujuan wisata. Selain untuk hiburan, pariwisata etnik biasanya dilakukan untuk kepentingan studi atau penelitian. Wisatawan tidak hanya datang dan berkunjung untuk melihat-lihat tapi juga ikut tinggal bersama masyarakat setempat untuk mempelajari budaya dan gaya hidup mereka.', '2024-05-18 10:36:31', '2024-05-18 10:36:31'),
(5, 'Pariwisata Kota', 'pariwisata-kota', 'Pariwisata kota atau city tourism dilakukan dengan tujuan untuk mengenal seluk-beluk perkotaan lengkap dengan hingar bingar kebudayaannya. Wisata kota biasanya dikaitkan dengan kunjungan-kunjungan ke berbagai landmark kota, juga berbagai tempat perbelanjaan dan hiburan baik siang maupun malam.', '2024-05-18 10:36:51', '2024-05-18 10:36:51'),
(6, 'Pariwisata Maritim', 'pariwisata-maritim', 'Pariwisata maritim atau wisata bahari berkaitan erat dengan kegiatan di laut. Kegiatan yang bisa dilakukan dalam wisata bahari termasuk memancing, berenang di laut, menyelam, berlayar, berselancar, sampai ikut terlibat dalam konservasi laut, seperti menanam terumbu karang.', '2024-05-18 10:37:08', '2024-05-18 10:37:08'),
(7, 'Pariwisata Rekreasi', 'pariwisata-rekreasi', 'Pariwisata rekreasi adalah kegiatan wisata yang dilakukan dengan tujuan rekreasional. Pariwisata rekreasi cocok dilakukan bersama keluarga atau kelompok. Kegiatan ini bisa dilakukan di berbagai tempat seperti hutan, atau yang paling sering adalah di taman hiburan tempat banyak wahana permainan tersedia.', '2024-05-18 10:37:24', '2024-05-18 10:37:24');

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
(12, '2024_02_14_111054_create_bobots_table', 1);

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
(1, 1, 1, 0.337142857, '2024-05-19 02:45:45', '2024-05-20 10:50:26'),
(2, 1, 2, 0.241991341, '2024-05-19 02:45:45', '2024-05-20 10:50:27'),
(3, 1, 3, 0.257142857, '2024-05-19 02:45:46', '2024-05-20 10:50:27'),
(4, 1, 4, 0.073376623, '2024-05-19 02:45:46', '2024-05-20 10:50:27'),
(5, 1, 5, 0.090346320, '2024-05-19 02:45:46', '2024-05-20 10:50:27');

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
(1, 'Administrator', 'admin1', 'admin@gmail.com', NULL, '$2y$10$drZh8FLSf7MhzK2W33au6eUkSY3rp9aTSptSpzq6cj4WIP0OvQAC6', 'ADMIN', NULL, '2024-05-18 10:01:14', '2024-05-18 10:01:14'),
(2, 'Wisatawan 1', 'wisatawan1', 'user@gmail.com', NULL, '$2y$10$KtKBDNHCKgqoY1ocvUPdz.aF7v517iX84gLsLzYi0RXd48Tm7FXs2', 'USER', NULL, '2024-05-18 10:01:14', '2024-05-18 10:01:14');

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
  `foto` varchar(255) NOT NULL,
  `keterangan` longtext NOT NULL,
  `fasilitas` longtext NOT NULL,
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

INSERT INTO `wisatas` (`id`, `jenis_id`, `user_id`, `nama_wisata`, `lokasi_maps`, `foto`, `keterangan`, `fasilitas`, `biaya`, `situs`, `validasi`, `tampil`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'Alun-alun Kota Malang', 'https://maps.app.goo.gl/sPcuN4pHHJq3ECkG9', 'foto_wisata/3SQjIuILndJlXGYaF6Zm7IzwDqarGFUDjeV8y58l.jpg', 'Alun-Alun Kota Malang adalah pusat kota yang menjadi tempat rekreasi favorit bagi warga setempat dan wisatawan. Dikelilingi oleh taman yang rapi, air mancur, serta dilengkapi dengan area bermain anak dan tempat duduk untuk bersantai.', 'Protokol Kesehatan, Kamar Mandi, Kantin, Fasilitas Parkir Kendaraan, dan Lain-lain', 0, '-', 2, 2, '2024-05-18 10:38:49', '2024-05-21 04:20:04'),
(2, 5, 1, 'Alun-alun Kota Wisata Batu', 'https://maps.app.goo.gl/jsPewoWgT4K1PMtM7', 'foto_wisata/jP1oWx2FK7iMmb760n9nKRiynvdmjZSXgOOTT0Qg.jpg', 'Terletak di pusat Kota Batu, alun-alun ini terkenal dengan bianglala besar dan berbagai wahana permainan anak. Alun-alun ini juga memiliki banyak penjual makanan dan minuman khas serta sering dijadikan tempat berkumpul dan berolahraga.', 'Protokol Kesehatan, Kamar Mandi, Kantin, Fasilitas Parkir Kendaraan, dan Lain-lain', 0, '-', 2, 2, '2024-05-18 10:45:16', '2024-05-21 04:22:42'),
(3, 7, 1, 'Batu Love Garden', 'https://maps.app.goo.gl/v6VotBapMcMnts9j8', 'foto_wisata/l9DslrsvXlgUufb9fioAaz6DTmXcSkCR7CU8XLwg.jpg', 'Batu Love Garden adalah taman bunga yang luas dengan berbagai jenis bunga yang indah dan ditata dengan artistik. Tempat ini sangat cocok untuk pecinta alam dan fotografi, serta memiliki berbagai spot foto menarik.', 'Protokol Kesehatan, Kamar Mandi, Kantin, Fasilitas Parkir Kendaraan, dan Lain-lain', 80000, 'https://jtp.id/batulovegarden/', 2, 2, '2024-05-18 11:01:55', '2024-05-21 04:29:43'),
(4, 7, 1, 'Brawijaya Edu Park', 'https://maps.app.goo.gl/1t8vUsyTfxEP8fiY9', 'foto_wisata/utJncgo1qzbvTASvr89yuKAExJmeFsBArJOlsnPm.jpg', 'Taman edukasi ini menggabungkan hiburan dan pendidikan dengan berbagai wahana interaktif yang mengajarkan ilmu pengetahuan dan teknologi kepada anak-anak. Ada juga berbagai atraksi permainan yang menyenangkan.', 'Protokol Kesehatan, Kamar Mandi, Kantin, Fasilitas Parkir Kendaraan, dan Lain-lain', 20000, 'https://www.facebook.com/brawijaya.edupark', 2, 2, '2024-05-18 11:03:01', '2024-05-21 04:38:05'),
(5, 3, 1, 'Candi Badut', 'https://maps.app.goo.gl/CYbRBUeeqABRHXLY7', 'foto_wisata/s8vEcnINW06lsUmrULW5F8GHMShs44oqG9Bz9Uwg.jpg', 'Candi Badut adalah candi Hindu yang terletak di Malang, dibangun pada abad ke-8. Candi ini memiliki arsitektur yang unik dan sejarah yang kaya, menjadi salah satu situs arkeologi penting di Jawa Timur.', 'Protokol Kesehatan, Kamar Mandi, Kantin, Fasilitas Parkir Kendaraan, dan Lain-lain', 0, '-', 2, 2, '2024-05-18 11:04:29', '2024-05-21 04:39:39'),
(6, 3, 1, 'Candi Kidal', 'https://maps.app.goo.gl/gximdwLbMVRj8pYx8', 'foto_wisata/SFYODNMBs6RFN59BDRn1iKq9e00ow35z3cgWioy7.jpg', 'Terletak di Kabupaten Malang, Candi Kidal adalah candi peninggalan Kerajaan Singhasari yang dibangun pada abad ke-13. Candi ini dikenal dengan relief cerita Garudeya yang mengisahkan perjalanan Garuda.', 'Protokol Kesehatan, Kamar Mandi, Kantin, Fasilitas Parkir Kendaraan, dan Lain-lain', 0, '-', 2, 2, '2024-05-18 11:05:58', '2024-05-21 04:40:31'),
(7, 3, 1, 'Candi Singosari', 'https://maps.app.goo.gl/b2LVhF31HPWZy3Js5', 'foto_wisata/0TTMCazE2Aex8I2RnzgoS4kA4qVO1YRoj2cdSonm.jpg', 'Candi ini merupakan peninggalan Kerajaan Singhasari yang didirikan pada abad ke-13. Terkenal dengan arsitektur khas dan relief yang menceritakan sejarah kerajaan, Candi Singosari adalah situs sejarah yang penting di Malang.', 'Protokol Kesehatan, Kamar Mandi, Kantin, Fasilitas Parkir Kendaraan, dan Lain-lain', 0, '-', 2, 2, '2024-05-18 11:06:55', '2024-05-21 04:41:51'),
(8, 7, 1, 'Hawai Waterpark', 'https://maps.app.goo.gl/AFcqo7GvV7pXhYQQ9', 'foto_wisata/K8DZ8MCuznQ8QoJ4cjJCHn05lGlfjG2IDDQUUDK6.jpg', 'Hawai Waterpark adalah taman bermain air yang luas dengan berbagai macam wahana seperti kolam ombak, seluncuran air, dan area bermain anak. Tempat ini ideal untuk rekreasi keluarga di Malang.', 'Protokol Kesehatan, Kamar Mandi, Kantin, Fasilitas Parkir Kendaraan, dan Lain-lain', 85000, 'https://hawaiwaterpark.com/', 2, 2, '2024-05-18 11:16:22', '2024-05-21 04:44:48'),
(9, 7, 1, 'Jatim Park I', 'https://maps.app.goo.gl/X62agCCGu2j2RjbK7', 'foto_wisata/nETTo6ImKdULVr4d8Wdg1fehvTx5HkMI7Ef3jfho.jpg', 'Jatim Park I adalah taman hiburan yang menawarkan berbagai wahana permainan dan edukasi. Dikenal dengan taman rekreasi yang menggabungkan konsep belajar sambil bermain, sangat cocok untuk anak-anak dan remaja.', 'Protokol Kesehatan, Kamar Mandi, Kantin, Fasilitas Parkir Kendaraan, dan Lain-lain', 115000, 'https://jtp.id/jatimpark1/', 2, 2, '2024-05-18 11:18:42', '2024-05-21 04:54:13'),
(10, 7, 1, 'Jatim Park II', 'https://maps.app.goo.gl/vmG9NCnv81BfHnSb8', 'foto_wisata/kY9njb4DNIrOmwvr1rLPU8TRVoqt0wI9mx5eac3n.jpg', 'Terdiri dari kebun binatang modern dan museum satwa, Jatim Park II menawarkan pengalaman edukasi dan hiburan yang menarik. Batu Secret Zoo memiliki berbagai jenis hewan, sedangkan Museum Satwa menampilkan koleksi fosil dan diorama satwa.', 'Protokol Kesehatan, Kamar Mandi, Kantin, Fasilitas Parkir Kendaraan, dan Lain-lain', 125000, 'https://jtp.id/jatimpark2/', 2, 2, '2024-05-18 11:30:49', '2024-05-21 05:05:02'),
(11, 7, 1, 'Jatim Park III', 'https://maps.app.goo.gl/swFnPdDd3jdvDAhF7', 'foto_wisata/h58brV1G3EOUHUjzz2qeQoiaAEYSEVBVYaVE1rGX.jpg', 'Jatim Park III adalah taman hiburan yang bertema dinosaurus dengan berbagai atraksi seperti Dino Park, The Legend Star, dan Fun Tech Plaza. Tempat ini menawarkan pengalaman interaktif dan edukatif tentang kehidupan prasejarah.', 'Protokol Kesehatan, Kamar Mandi, Kantin, Fasilitas Parkir Kendaraan, dan Lain-lain', 245000, 'https://jtp.id/jatimpark3/', 2, 2, '2024-05-18 11:32:44', '2024-05-21 05:22:28'),
(12, 7, 1, 'Malang Night Paradise', 'https://maps.app.goo.gl/XKBxtontEGHsXDzN8', 'foto_wisata/V8b7qpxgnmqeLTSIOO4KvwAc5h5p1X2PNCZYht20.jpg', 'Sebuah taman hiburan yang menampilkan berbagai instalasi cahaya spektakuler, pertunjukan air mancur menari, dan wahana permainan malam. Tempat ini sangat populer untuk rekreasi malam hari di Malang.', 'Protokol Kesehatan, Kamar Mandi, Kantin, Fasilitas Parkir Kendaraan, dan Lain-lain', 90000, 'https://malangnightparadise.com/', 2, 2, '2024-05-18 11:34:43', '2024-05-21 05:24:08'),
(13, 3, 1, 'Museum Brawijaya', 'https://maps.app.goo.gl/e2Mq6uwnouth6Y6b6', 'foto_wisata/YyzJloPmeUM20nHvbalqx6RCoR32i7bYO4eo5gsm.jpg', 'Museum ini menyimpan koleksi benda-benda bersejarah dari masa perjuangan kemerdekaan Indonesia. Terletak di Malang, museum ini memiliki banyak artefak militer dan dokumen penting dari zaman penjajahan dan revolusi.', 'Protokol Kesehatan, Kamar Mandi, Kantin, Fasilitas Parkir Kendaraan, dan Lain-lain', 5000, '-', 2, 2, '2024-05-18 11:35:47', '2024-05-21 05:25:32'),
(14, 6, 1, 'Pantai Batu Bengkung', 'https://maps.app.goo.gl/9a6e95FV9GQBGgFC6', 'foto_wisata/V0TWJnVyPEpmZsSuO99rYde4caEVts3fyk6GZtzj.jpg', 'Pantai yang terletak di pesisir selatan Malang ini terkenal dengan formasi batu karang yang unik dan ombak yang besar. Pantai ini cocok untuk menikmati pemandangan alam dan berfoto dengan latar belakang yang indah.', 'Protokol Kesehatan, Kamar Mandi, Kantin, Fasilitas Parkir Kendaraan, dan Lain-lain', 10000, '-', 2, 2, '2024-05-18 11:36:37', '2024-05-21 05:26:35'),
(15, 6, 1, 'Pantai Licin', 'https://maps.app.goo.gl/TKwxQotUGG7CFdqr9', 'foto_wisata/gPvkAyKusunpcQyXLCAM67knl4t3F6uR4D6Xl3Eq.jpg', 'Pantai Licin memiliki pasir hitam yang eksotis dan dikelilingi oleh batu karang yang memberikan pemandangan yang dramatis. Terletak agak terpencil, pantai ini menawarkan suasana yang tenang dan alami, ideal untuk pelarian dari keramaian.', 'Protokol Kesehatan, Kamar Mandi, Kantin, Fasilitas Parkir Kendaraan, dan Lain-lain', 0, '-', 2, 2, '2024-05-18 11:57:24', '2024-05-21 05:27:49'),
(16, 4, 2, 'Kampung Warna-Warni', '-', '', 'Sederetan rumah yang dicat dengan warna-warni terlihat mencolok di Kawasan Jodipan, Malang, Jawa Timur. Keunikan ini menjadikan Kampung Jodipan banyak dikunjungi wisatawan dari berbagai daerah bahkan luar negeri. Kebanyakan wisatawan datang ke kampung ini untuk mendapatkan foto yang menarik.', '-', 0, '-', 2, 0, '2024-05-19 03:30:04', '2024-05-21 04:01:35'),
(17, 7, 2, 'Eco Green Park', '-', '-', 'Tempat wisata yang tidak saja memberikan hiburan bagi keluarga tetapi juga mengedukasi bagi para pengunjung. Puluhan zona dan atraksi tentunya ada di Eco Park Batu Malang. Terutama bagi anak-anak pasti akan menyenangkan dan memberikan pengalaman baru tentang aneka satwa.', '-', 0, '-', 1, 0, '2024-05-19 03:32:56', '2024-05-19 03:37:24'),
(18, 6, 2, 'Pantai Gatra', '-', '-', 'Pantai Gatra adalah salah satu wisata bahari yang berada di Malang, Jawa Timur. Pantai yang satu ini masih berada di dalam lingkup Clungup Mangrove Conservation. Pantai ini pun berada di jajaran yang sama dengan Pantai Clungup dan Mini. Pantai ini juga masih sekawasan dengan pantai Tiga Warna, Sapana, dan Batu Pecah.', '-', 0, '-', 0, 0, '2024-05-19 03:36:00', '2024-05-19 11:35:04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatives`
--
ALTER TABLE `alternatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatives_criteria_id_foreign` (`criteria_id`),
  ADD KEY `alternatives_wisata_id_foreign` (`wisata_id`),
  ADD KEY `alternatives_jenis_id_foreign` (`jenis_id`);

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
  ADD UNIQUE KEY `criterias_nama_kriteria_unique` (`nama_kriteria`),
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
  ADD UNIQUE KEY `jenis_jenis_name_unique` (`jenis_name`),
  ADD UNIQUE KEY `jenis_slug_unique` (`slug`);

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
  ADD KEY `wisatas_jenis_id_foreign` (`jenis_id`),
  ADD KEY `wisatas_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatives`
--
ALTER TABLE `alternatives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `bobots`
--
ALTER TABLE `bobots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `criteria_analyses`
--
ALTER TABLE `criteria_analyses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `criteria_analysis_details`
--
ALTER TABLE `criteria_analysis_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `priority_values`
--
ALTER TABLE `priority_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `wisatas`
--
ALTER TABLE `wisatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alternatives`
--
ALTER TABLE `alternatives`
  ADD CONSTRAINT `alternatives_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alternatives_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alternatives_wisata_id_foreign` FOREIGN KEY (`wisata_id`) REFERENCES `wisatas` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `wisatas_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wisatas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
