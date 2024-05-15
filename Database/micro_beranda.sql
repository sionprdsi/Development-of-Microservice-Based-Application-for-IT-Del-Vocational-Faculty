-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Waktu pembuatan: 15 Bulan Mei 2024 pada 15.51
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `micro_beranda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `profils`
--

CREATE TABLE `profils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `karir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kenapa_vokasi` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profils`
--

INSERT INTO `profils` (`id`, `nama`, `alamat`, `kode_pos`, `telepon`, `email`, `karir`, `logo`, `video`, `peta`, `kenapa_vokasi`, `facebook`, `twitter`, `youtube`, `instagram`, `created_at`, `updated_at`) VALUES
(1, 'Institut Teknologi Del', 'Institut Teknologi Del\r\nJl. Sisingamangaraja, Sitoluama\r\nLaguboti, Toba Samosir\r\nSumatera Utara, Indonesia', 22312, '082632331234', 'info@del.ac.id', 'karir@del.ac.id', 'public/logos/g9yOz67DYDyxcxdwMWEBi6sPy7JDEUENJJApgLVo.png', 'public/videos/8W7AN3SuiNUURWJYMOZCgBqHyr4pR9JPxoSN52JZ.mp4', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.367330226955!2d99.14605787586032!3d2.383220557381434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e00fdad2d7341%3A0xf59ef99c591fe451!2sInstitut%20Teknologi%20Del!5e0!3m2!1sid!2sid!4v1715324361059!5m2!1sid!2sid\"', 'Beberapa keunggulan dari pendidikan vokasi adalah: belajar di program studi yang spesifik, belajar sesuai minat dan profesi yang diinginkan, siap kerja karena dibekali kemampuan praktik yang tinggi, sehingga lulusan pendidikan vokasi banyak dibutuhkan perusahaan. Menyelenggarakan proses pendidikan vokasi yang unggul, didukung dengan tenaga pendidik yang memiliki kompetensi pada bidang informatika dan komputer, serta melibatkan dunia usaha dan dunia industri dalam pengembangan kemampuan peserta didik.', 'https://web.facebook.com/Institut.Teknologi.Del/', 'https://twitter.com/intent/follow?original_referer=https%3A%2F%2Fwww.del.ac.id%2F&ref_src=twsrc%5Etfw%7Ctwcamp%5Ebuttonembed%7Ctwterm%5Efollow%7Ctwgr%5Einstitut_del&region=follow_link&screen_name=institut_del', 'https://www.youtube.com/@institutteknologidel1337', 'https://www.instagram.com/vokasi.itdel?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw%3D%3D', '2024-05-09 13:54:21', '2024-05-10 19:08:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `profils`
--
ALTER TABLE `profils`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
