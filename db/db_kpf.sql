-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 24, 2025 at 09:49 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kpf`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `image`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(18, 'Layanan Terbaik', 'Kami akan selalu memberikan layanan terbaik bagi seluruh calon nasabah dan nasabah terutama dalam\r\nhal kemudahan bertransaksi real account maupun demo account didukung oleh SDM berkualitas\r\nyang telah resmi menjadi wakil pialang berjangka melalui fit dan proper test dari Bappebti', 'banners/OYkg6tVC0p23tZib0Snux2jStj9Ey0DsEcSZUZfk.png', 1, 1, '2025-07-29 06:17:24', '2025-08-08 07:07:11'),
(22, 'testing', 'testing', 'banners/spw1pZEt4CrJG61YTJhq6Bgtbqpn5H7IkI8FMkLZ.png', 2, 1, '2025-08-08 07:06:23', '2025-08-08 07:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text NOT NULL,
  `kategori` enum('Info & Kegiatan','Pengumuman') NOT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft',
  `judul` varchar(100) NOT NULL,
  `slug` text NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `image`, `kategori`, `status`, `judul`, `slug`, `isi`, `created_at`, `updated_at`) VALUES
(4, '2025-08-07-09-09-42-real-time-online-trading.png', 'Info & Kegiatan', 'published', 'Real Time Online Trading', 'real-time-online-trading', '<p>Bergabunglah dan cobalah alat perdagangan online kami di manapun Anda berada.<br>Hubungi marketing kami untuk memulai panduan yang tepat tentang online trading kami.</p>', '2025-08-07 01:55:31', '2025-08-07 02:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jfxes`
--

CREATE TABLE `jfxes` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text,
  `name` varchar(50) NOT NULL,
  `slug` text NOT NULL,
  `deskripsi` text NOT NULL,
  `specs` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jfxes`
--

INSERT INTO `jfxes` (`id`, `image`, `name`, `slug`, `deskripsi`, `specs`, `created_at`, `updated_at`) VALUES
(1, 'jfx/07072025-mengenal-minyak-sawit-merah-dan-manfaatnya-bagi-tubuh-tingkatkan-kesehatan-otak.jpg', 'Kontrak Berjangka Olein (OLE)', 'kontrak-berjangka-olein-ole', 'Kontrak Berjangka Olein (OLE) adalah produk perdagangan berjangka berbasis komoditas minyak kelapa sawit olahan (RBD Olein) yang diperdagangkan di Bursa Berjangka Jakarta (JFX). Produk ini memberikan kesempatan kepada investor untuk memperoleh keuntungan dari pergerakan harga komoditas sekaligus berfungsi sebagai sarana lindung nilai (hedging) terhadap volatilitas harga pasar. Dengan tingkat likuiditas yang baik dan transparansi harga, Kontrak Berjangka Olein menjadi salah satu pilihan investasi menarik di sektor komoditas, khususnya bagi para pelaku pasar yang ingin memanfaatkan potensi pasar minyak sawit yang terus berkembang.', '<p><strong>Spesifikasi Kontrak Berjangka Olein</strong></p>\r\n<div align=\"center\">\r\n<p>&nbsp;</p>\r\n<table border=\"1\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p><strong>Kode Kontrak</strong></p>\r\n</td>\r\n<td>\r\n<p>OLE</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>Dasar Kontrak</strong></p>\r\n</td>\r\n<td>\r\n<p>Olein dengan kualitas Standar Pasar</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>Satuan Kontrak</strong></p>\r\n</td>\r\n<td>\r\n<p>20 ton (20.000 Kg)</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>Bulan Kontrak</strong></p>\r\n</td>\r\n<td>\r\n<p>6 (enam) bulan berturut-turut, sehingga setiap hari perdagangan terdapat enam Bulan Kontrak</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>Hari &amp; Jam Perdagangan</strong></p>\r\n</td>\r\n<td>\r\n<p>Setiap hari perdagangan</p>\r\n<p>Pukul 09.30 &ndash; 17.30 wib</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>Pasca Penutupan</strong></p>\r\n</td>\r\n<td>\r\n<p>Sesi Pasca Penutupan dilaksanakan setiap hari perdagangan, yaitu mulai pukul 17.45 WIB sampai dengan 18.00 WIB.</p>\r\n<p>Amanat beli dan jual yang dimasukkan ke dalam JAFeTS adalah pada Harga Penyelesaian hari itu.</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>Tukar Fisik dengan Berjangka</strong></p>\r\n</td>\r\n<td>\r\n<p>Pihak-pihak yang melakukan transaksi jual/beli Olein, PPO lainnya dan CPO diluar bursa dapat mendaftarkannya ke Bursa untuk ditukar dengan transaksi berjangka bagi kedua belah pihak.</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>Hari Perdagangan Terakhir</strong></p>\r\n</td>\r\n<td>\r\n<p>Perdagangan untuk suatu Bulan Kontrak berakhir pada akhir sesi Pasca Penutupan tanggal 15 bulan yang bersangkutan, jika tanggal 15 bukan merupakan hari perdagangan, maka perdagangan berakhir pada hari perdagangan sesudahnya.</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>Harga</strong></p>\r\n</td>\r\n<td>\r\n<p>Rupiah per kilogram (termasuk PPN)</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>Perubahan Harga Minimum</strong></p>\r\n</td>\r\n<td>\r\n<p>Rp 5,- /kg (termasuk PPN)</p>\r\n<p>Rp. 100.000,- per lot (termasuk PPN)</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>Batas Perubahan Harga</strong></p>\r\n</td>\r\n<td>\r\n<p>Rp.150,- per kilogram diatas atau dibawah Harga Penyelesaian hari perdagangan sebelumnya. Batas perubahan harga ini tidak berlaku untuk Bulan Berjalan dan Bulan Terdekat, kalau Bulan Berjalan sudah tidak diperdagangkan lagi.</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>Penyelesaian Akhir</strong></p>\r\n</td>\r\n<td>\r\n<p>Penyerahan DO Terdaftar dengan kualitas Standar Pasar</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>Waktu Pemberitahuan Penyerahan</strong></p>\r\n</td>\r\n<td>\r\n<p>5 (lima) hari perdagangan terakhir. Kalau tanggal 15 itu bukan hari perdagangan maka hari perdagangan sesudahnya menjadi hari Pemberitahuan Penyerahan terakhir.</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>Waktu Pemberitahuan Alokasi</strong></p>\r\n</td>\r\n<td>\r\n<p>Sebelum sesi pertama hari perdagangan pertama setelah hari pemberitahuan penyerahan</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>Waktu Serah</strong></p>\r\n</td>\r\n<td>\r\n<p>Sebelum sesi pertama hari perdagangan kedua setelah dilakukan pemberitahuan penyerahan</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>Mutu</strong></p>\r\n</td>\r\n<td>\r\n<p>Standard PASAR</p>\r\n<p>Free Fatty Acids (FFA) &lt; 0,15% AOCS Method Ca 5a-40</p>\r\n<p>Moisture &amp; Impurities &lt; 0,1% AOCS Method Ca 2b-38</p>\r\n<p>AOCS Method Ca 3a-46</p>\r\n<p>Iodine Value (WIJS) &gt; 56 AOCS Method Cd 1d-92</p>\r\n<p>Warna Merah (Lovibond 5,25 inci) &lt; 4 Red AOCS Method Cc 13b-45</p>\r\n<p>Slip Melt Point &lt; 24o C AOCS Method Cc 1-25</p>\r\n<p>Cloud Point 10,75o</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>Tempat Penyerahan</strong></p>\r\n</td>\r\n<td>\r\n<p>Pilihan DO berada pada Penjual dengan batas maksimum 5 (lima) lot per penerbit DO Tangki Terdaftar per hari penyerahan</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>Satuan Penyerahan</strong></p>\r\n</td>\r\n<td>\r\n<p>20 ton dengan toleransi + 2%</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>Posisi Wajib Lapor</strong></p>\r\n</td>\r\n<td>\r\n<p>150 lot</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><strong>Batas Posisi</strong></p>\r\n</td>\r\n<td>\r\n<p>500 lot</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>', '2025-07-07 15:01:38', '2025-07-24 06:17:19'),
(3, 'jfx/30072025-27042025_122418-680e21f24188c-emas-3_169.jpeg', 'Kontrak Berjangka Emas (GOL)', 'kontrak-berjangka-emas-gol', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'', '<p>s</p>', '2025-07-30 07:56:25', '2025-07-30 08:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_wakil_pialang`
--

CREATE TABLE `kategori_wakil_pialang` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_wakil_pialang`
--

INSERT INTO `kategori_wakil_pialang` (`id`, `nama_kategori`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Jakarta', 'jakarta', '2025-07-31 06:19:50', '2025-07-31 06:20:43'),
(2, 'Yogyakarta', 'yogyakarta', '2025-07-31 06:38:30', '2025-07-31 06:38:30'),
(3, 'Bali', 'bali', '2025-07-31 07:54:12', '2025-07-31 07:54:12'),
(4, 'Makasar', 'makasar', '2025-07-31 07:54:38', '2025-07-31 07:54:38'),
(5, 'Bandung', 'bandung', '2025-07-31 07:54:43', '2025-07-31 07:54:43'),
(6, 'Semarang', 'semarang', '2025-07-31 07:54:54', '2025-07-31 07:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '0001_01_01_000000_create_users_table', 1),
(11, '0001_01_01_000001_create_cache_table', 1),
(12, '0001_01_01_000002_create_jobs_table', 1),
(13, '2025_04_25_060913_create_kategori_wakil_pialangs_table', 1),
(14, '2025_04_25_062529_create_wakil_pialangs_table', 1),
(15, '2025_04_27_052036_create_jfxes_table', 1),
(16, '2025_04_27_114838_create_spas_table', 1),
(17, '2025_04_28_053826_create_beritas_table', 1),
(18, '2025_04_29_154000_create_profiles_table', 1),
(19, '2025_07_24_100019_create_banners_table', 2);

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
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spas`
--

CREATE TABLE `spas` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text,
  `name` varchar(50) NOT NULL,
  `slug` text NOT NULL,
  `deskripsi` text NOT NULL,
  `specs` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spas`
--

INSERT INTO `spas` (`id`, `image`, `name`, `slug`, `deskripsi`, `specs`, `created_at`, `updated_at`) VALUES
(1, 'spa/07072025_223049-686be829f04df-images (1).jpeg', 'AU1010_BBJ & AU10F_BBJ', 'au1010-bbj-au10f-bbj', 'Kontrak derivatif yang diperdagangkan di Bursa Berjangka Jakarta (JFX), berfokus pada pergerakan nilai tukar Dolar Australia (AUD) terhadap Dolar AS (USD). Keduanya dirancang untuk memberikan fleksibilitas bagi trader dalam memilih mata uang transaksi, yaitu IDR Tetap dan USD Mengambang.', '<h3 style=\"text-align: center;\"><strong>FOREX TRADE TABLE</strong></h3>\r\n<h4 style=\"text-align: center;\"><strong>AU10F_BBJ &nbsp;&amp; &nbsp;AU1010_BBJ</strong></h4>\r\n<table class=\"table-auto w-full border border-gray-300\" style=\"border-collapse: collapse; width: 100%; height: 431.064px; border-width: 1px; margin-left: auto; margin-right: auto;\" border=\"1\"><colgroup><col style=\"width: 33.3333%;\"><col style=\"width: 33.3333%;\"><col style=\"width: 33.3333%;\"></colgroup>\r\n<tbody>\r\n<tr style=\"height: 19.5938px;\">\r\n<td style=\"height: 58.7814px; text-align: center; background-color: rgb(53, 152, 219); vertical-align: middle;\" rowspan=\"3\"><strong>SPESIFICATIONS</strong></td>\r\n<td style=\"height: 19.5938px; text-align: center; background-color: rgb(53, 152, 219); vertical-align: middle;\" colspan=\"2\"><strong>REMARKS</strong></td>\r\n</tr>\r\n<tr style=\"height: 19.5938px;\">\r\n<td style=\"height: 19.5938px; text-align: center; background-color: rgb(53, 152, 219); vertical-align: middle;\" colspan=\"2\"><strong>AUSTRALIAN DOLLAR</strong></td>\r\n</tr>\r\n<tr style=\"height: 19.5938px;\">\r\n<td style=\"text-align: center; height: 19.5938px; background-color: rgb(53, 152, 219); vertical-align: middle;\" colspan=\"2\"><strong>AUD/USD</strong></td>\r\n</tr>\r\n<tr style=\"height: 19.5938px;\">\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\"><strong>Trade Code</strong></td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"center\" valign=\"BOTTOM\">AU10F_BBJ</td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"center\" valign=\"BOTTOM\">&nbsp;AU1010_BBJ</td>\r\n</tr>\r\n<tr style=\"height: 19.5938px;\">\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\" bgcolor=\"#f3f3f3\"><strong>Rate</strong></td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\"><strong>Floating ( USD )</strong></td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\"><strong>( USD 1 = IDR 10.000 )</strong></td>\r\n</tr>\r\n<tr style=\"height: 19.5938px;\">\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\"><strong>Contract Size</strong></td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\">AUD 100,000</td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\">AUD 100,000</td>\r\n</tr>\r\n<tr style=\"height: 19.5938px;\">\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\" bgcolor=\"#f3f3f3\"><strong>Trading Days</strong></td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">Senin - Jumat</td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">Senin - Jumat</td>\r\n</tr>\r\n<tr style=\"height: 19.5938px;\">\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\"><strong>Trading Hours</strong></td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"BOTTOM\">&nbsp;</td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 19.5938px;\">\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\" bgcolor=\"#f3f3f3\"><strong>- Summer (Daylight Saving Time)</strong></td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">07:00-03:00 WIB</td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">07:00-03:00 WIB</td>\r\n</tr>\r\n<tr style=\"height: 19.5938px;\">\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\"><strong>- Winter</strong></td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\">07:00-04:00 WIB</td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\">07:00-04:00 WIB</td>\r\n</tr>\r\n<tr style=\"height: 19.5938px;\">\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\" bgcolor=\"#f3f3f3\">&nbsp;</td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">&nbsp;</td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 19.5938px;\">\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\"><strong>Initial Margin for Daytrade</strong></td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\">USD 1,000 / Lot</td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\">IDR 10.000.000 / Lot</td>\r\n</tr>\r\n<tr style=\"height: 19.5938px;\">\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\" bgcolor=\"#f3f3f3\"><strong>Initial Margin for Overnight</strong></td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">USD 2,000 / Lot</td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">IDR 20.000.000 / Lot</td>\r\n</tr>\r\n<tr style=\"height: 19.5938px;\">\r\n<td style=\"vertical-align: middle; background-color: rgb(53, 152, 219); height: 19.5938px;\"><strong>&nbsp;</strong></td>\r\n<td style=\"vertical-align: middle; background-color: rgb(53, 152, 219); height: 19.5938px;\">&nbsp;</td>\r\n<td style=\"vertical-align: middle; background-color: rgb(53, 152, 219); height: 19.5938px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 19.5938px;\">\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\" bgcolor=\"#f3f3f3\"><strong>Facility Fee</strong></td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">USD15/Lot/Side</td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">IDR 150.000/Lot/Side</td>\r\n</tr>\r\n<tr style=\"height: 19.5938px;\">\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\"><strong>Rollover Fee For Buy/Sell</strong></td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\">USD5/Lot/Night</td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\">IDR 50.000/Lot/Night</td>\r\n</tr>\r\n<tr style=\"height: 19.5938px;\">\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\" bgcolor=\"#f3f3f3\"><strong>Value Added Tax (VAT)*</strong></td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">11% of Commission Fee</td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">11% of Commission Fee</td>\r\n</tr>\r\n<tr style=\"height: 19.5938px;\">\r\n<td style=\"vertical-align: middle; background-color: rgb(53, 152, 219); height: 19.5938px;\"><strong>&nbsp;</strong></td>\r\n<td style=\"vertical-align: middle; background-color: rgb(53, 152, 219); height: 19.5938px;\">&nbsp;</td>\r\n<td style=\"vertical-align: middle; background-color: rgb(53, 152, 219); height: 19.5938px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 19.5938px;\">\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\" bgcolor=\"#f3f3f3\"><strong>Maintenance Margin</strong></td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">70% of Initial Margin</td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">70% of Initial Margin</td>\r\n</tr>\r\n<tr style=\"height: 19.5938px;\">\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\"><strong>Auto Liquidation</strong></td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\">30% of Initial Margin</td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\">30% of Initial Margin</td>\r\n</tr>\r\n<tr style=\"height: 19.5938px;\">\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\" bgcolor=\"#f3f3f3\">&nbsp;</td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">&nbsp;</td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 19.5938px;\">\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\"><strong>Price Source</strong></td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\">Telequote</td>\r\n<td style=\"height: 19.5938px; vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\">Telequote</td>\r\n</tr>\r\n<tr>\r\n<td style=\"vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\" bgcolor=\"#f3f3f3\"><strong>Price Guidance</strong></td>\r\n<td style=\"vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">Last Trade</td>\r\n<td style=\"vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">Last Trade</td>\r\n</tr>\r\n<tr>\r\n<td style=\"background-color: rgb(53, 152, 219); vertical-align: middle;\"><strong>&nbsp;</strong></td>\r\n<td style=\"background-color: rgb(53, 152, 219); vertical-align: middle;\">&nbsp;</td>\r\n<td style=\"background-color: rgb(53, 152, 219); vertical-align: middle;\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\" bgcolor=\"#f3f3f3\"><strong>Minimum Price Spread Quote</strong></td>\r\n<td style=\"vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">4 pips/side</td>\r\n<td style=\"vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">4 pips/side</td>\r\n</tr>\r\n<tr>\r\n<td style=\"vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\"><strong>Hectic Price Spread Quote</strong></td>\r\n<td style=\"vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\">Based on Market</td>\r\n<td style=\"vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\">Based on Market</td>\r\n</tr>\r\n<tr>\r\n<td style=\"vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\" bgcolor=\"#f3f3f3\"><strong>Minimum Price Movement</strong></td>\r\n<td style=\"vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">0.0001 pip (Tick value : USD 10)</td>\r\n<td style=\"vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">0.0001 pip (Tick value : USD 10)</td>\r\n</tr>\r\n<tr>\r\n<td style=\"vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\"><strong>Range for limit and stop order</strong></td>\r\n<td style=\"vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\">20-2000 Points/pips</td>\r\n<td style=\"vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\">20-2000 Points/pips</td>\r\n</tr>\r\n<tr>\r\n<td style=\"vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\" bgcolor=\"#f3f3f3\"><strong>Hectic Range Price For Limit &amp; Stop Order</strong></td>\r\n<td style=\"vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">Base On Market</td>\r\n<td style=\"vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\" bgcolor=\"#f3f3f3\">Base On Market</td>\r\n</tr>\r\n<tr>\r\n<td style=\"vertical-align: middle;\" align=\"LEFT\" valign=\"BOTTOM\"><strong>Delivery By</strong></td>\r\n<td style=\"vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\">Cash Settlement</td>\r\n<td style=\"vertical-align: middle;\" align=\"CENTER\" valign=\"MIDDLE\">Cash Settlement</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\"text-align: justify;\">* Changes in VAT fees to 11% (Effective as of April 01<sup>st</sup>, 2022)</p>', '2025-07-07 15:12:58', '2025-07-08 03:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Faturrahman', 'Putra', 'faturrahman86.fr@gmail.com', NULL, '$2y$12$mpJzNXGRljkc6S2T5Y7D/ux.3BIM8/7bWGQvb8Hn.3HAgWJQv/Oiq', '6XLD9gXvNqkXgGsQ8FpczOvh8r5iJ3v5bbD5kXDYoXv2V97mwLB2CpxgdtEA', NULL, '2025-07-23 05:43:43'),
(2, 'Ranca', 'Pramuditha', 'ranca632@gmail.com', NULL, '$2y$12$pbw4VguXUjZtHwsAeDiWUufVZAZ.YqbusL.ibI/bSG3oNi1kfIXYu', 'A56tbsisWa9D80wiLFqGyTISBWbDuL7JVd2n9Jn6IzO3wCF7IpcY7YU5qYqD', '2025-07-23 06:08:06', '2025-07-23 08:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `wakil_pialangs`
--

CREATE TABLE `wakil_pialangs` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_izin` text NOT NULL,
  `status` enum('aktif','non-aktif') NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wakil_pialangs`
--

INSERT INTO `wakil_pialangs` (`id`, `nama`, `nomor_izin`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Wahyu Setiawan', '136/UPTP/SI/10/2021', 'aktif', 1, '2025-07-31 06:21:18', '2025-08-20 06:16:05'),
(2, 'Untari', '561/BAPPEBTI/SI/10/2008', 'aktif', 2, '2025-07-31 06:38:50', '2025-07-31 06:38:50'),
(3, 'NG JOHNSON', '1365/BAPPEBTI/ SI/8/2007', 'aktif', 3, '2025-07-31 07:56:01', '2025-07-31 07:56:01'),
(4, 'SRI MULYANTI', '0034/UPTP/SI/2/2020', 'aktif', 4, '2025-07-31 07:57:27', '2025-07-31 07:57:27'),
(5, 'DIDI DHARMANSYAH', '200/UPTP/SI/9/2024', 'aktif', 5, '2025-07-31 07:58:10', '2025-07-31 07:58:10'),
(6, 'UTAMI NINGSIH', '233/UPTP/SI/10/2020', 'aktif', 6, '2025-07-31 07:59:04', '2025-07-31 07:59:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jfxes`
--
ALTER TABLE `jfxes`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `kategori_wakil_pialang`
--
ALTER TABLE `kategori_wakil_pialang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori_wakil_pialang_slug_unique` (`slug`);

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
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `spas`
--
ALTER TABLE `spas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wakil_pialangs`
--
ALTER TABLE `wakil_pialangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wakil_pialangs_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jfxes`
--
ALTER TABLE `jfxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_wakil_pialang`
--
ALTER TABLE `kategori_wakil_pialang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spas`
--
ALTER TABLE `spas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wakil_pialangs`
--
ALTER TABLE `wakil_pialangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wakil_pialangs`
--
ALTER TABLE `wakil_pialangs`
  ADD CONSTRAINT `wakil_pialangs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `kategori_wakil_pialang` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
